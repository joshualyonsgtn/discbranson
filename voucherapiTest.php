<?php /* Template Name: vouchersapiTestTemplate */ 
	

// single cache clear param
$path    = './write';
// $path    = './wp-content/cache/voucherCache';

if(!empty($_GET['wipe']) && $_GET['wipe'] =='yes'){
	$garbageFiles = glob($path.'/*'); // get all file names
	foreach($garbageFiles as $garbageFile){ // iterate files
	  if(is_file($garbageFile)) {
		  unlink($garbageFile); // delete file
	  }
  }
}


// Get Auth Token Function
function getAuthToken() {
// 	Access_Token
	$access_token = '';
// 	Curling Refresh Token Endpoint 
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://accounts.zoho.com/oauth/v2/token?refresh_token=1000.0042dba869f9494c90c248b0cb7a4cdc.5fa7cbb19bdc31c4302c2e5a4ba6dc18&client_id=1000.14WT4T4G0H1RX6JL9S1RAM5X1RIKCN&client_secret=e2e7f2115a680e9a9f4fc5f4ce266d8a223c53d228&grant_type=refresh_token');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	$response = curl_exec($ch);
	$err = curl_error($ch);
	curl_close($ch);
	$json = json_decode($response, true);
// 	Getting Response & Checking if access_token exist
	if ($err) {
		echo $err;
	} else {
		$access_token = $json['access_token'];
	}
	return $access_token;
}


$record_id = '';
if(empty($_GET['record_id'])) {
  echo "<div class='content' id='spinner'><h1>Missing voucher ID</h1></div>";die;
}
$record_id = $_GET['record_id'];

$currentDirectory = basename(dirname(__FILE__));
 
$files = scandir($path);
$files = array_diff(scandir($path), array('.', '..'));

$filename = $path .'/'.$record_id.'-voucher.txt';

if (file_exists($filename)) {
	$response = json_decode(file_get_contents($filename), true);
} else {
	// Get Auth Token Function
	$token = getAuthToken();
  
  // Curl
  $url = 'https://creator.zoho.com/api/v2/discoverbranson417/sales-log/report/All_Sales_For_Dev_Access/'.$record_id;

  //	echo $url;
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Authorization: Zoho-oauthtoken". " " .$token
  ));
  $raw = curl_exec($ch);
  $response = json_decode($raw, true);
  curl_close($ch);
  
  if($response['code'] !== 3000){
    echo "<div class='content' id='spinner'><h1>No Vouchers Found</h1></div>";die;
  }
  
  
	if ($response['data']['Lodging_Source']=="Discover Branson"){
		  
		  $url2 = 'https://creator.zoho.com/api/v2/discoverbranson417/sales-log/report/Lodging_List_For_Dev_Use/'.$response['data']['Discover_Branson_Lodging']['ID'];
			
		  $ch2 = curl_init($url2);
		  curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
		  curl_setopt($ch2, CURLOPT_HTTPHEADER, array(
			  "Authorization: Zoho-oauthtoken". " " .$token
		  ));
		  $raw2 = curl_exec($ch2);
		  $response2 = json_decode($raw2, true);
		  curl_close($ch2);
		  $response['lodging'] = $response2;
		  $i=0;
		foreach(($response['data']['Premium_Info'] ?? []) as $k=>$v){
		  $premiumDetails = explode('^^^',$v['display_value']);
			$url3 = 'https://creator.zoho.com/api/v2/discoverbranson417/sales-log/report/Premium_List_For_Dev_Only?Name='.urlencode($premiumDetails[0]);
// 			$url3 = 'https://creator.zoho.com/api/v2/discoverbranson417/sales-log/report/Premium_List_For_Dev_Only/'.$v['ID'];
			$url3encoded = str_replace(' ', '%20', $url3);
			$ch3 = curl_init($url3encoded);
				  curl_setopt($ch3, CURLOPT_RETURNTRANSFER, true);
				  curl_setopt($ch3, CURLOPT_HTTPHEADER, array(
					  "Authorization: Zoho-oauthtoken". " " .$token
				  ));
				  $raw3 = curl_exec($ch3);
				  $response3 = json_decode($raw3, true);
				  $err3 = curl_error($ch3);
				  curl_close($ch3);
		//		  echo $url3;
				  if ($err3) {
						echo $err3;
					}
			$response['premium'][$v['ID']] = $response3['data'][0];
			$i=$i+1;
		}
	}  
 	
	
	
    $myfile = fopen($filename, "w+") or die(" Unable to open file!");
	file_put_contents($filename, print_r(json_encode($response), true));
	fclose($myfile);
}


if(isset($_GET['debug'])){
  die(json_encode($response));
}

$voucherCount = 0;


$premiumInfoHtml = '   <style>
@import url(\'https://fonts.googleapis.com/css?family=Oswald\');
body *{
  font-family: \'Oswald\', sans-serif;
}
.bg-voucher-img{
  background-size: cover;
  background-position:center center;
  background-repeat:no-repeat;
  border-radius: 0.25rem;
  -webkit-print-color-adjust: exact;
  color-adjust: exact !important;
}

.limit-string{
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
  text-overflow: ellipsis;
}
.smaller-text{
  font-size:65%;
}
.img-top-text,.img-bottom-text{
  max-width: 400px;
  width: 400px;
}
.img-top-text{height:48px;}
.img-bottom-text{height:39px;}
.vcard-body{
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}
.confirmation-section{
  display: flex;
  flex-direction: column;
  justify-content: end;
}

@media print {
.pagebreak { page-break-before: always; clear: both;} /* page-break-after works, as well */
}

.mdc-card {
border-radius: 4px;
background-color: #fff;
background-color: var(--mdc-theme-surface, #fff);
box-shadow: 0px 2px 1px -1px rgb(0 0 0 / 20%), 0px 1px 1px 0px rgb(0 0 0 / 14%), 0px 1px 3px 0px rgb(0 0 0 / 12%);
display: flex;
flex-direction: column;
box-sizing: border-box;
}
.mb-1{
  margin-bottom: 0.20rem!important;
}
</style>';
$premiumInfoHtml .= '<div class="no-print" style="padding:20px;"><button class="btn btn-primary" onClick="window.print()">Print this page
</button></div>';

if($response['data']['Lodging_Source']=="Discover Branson"){
  $voucherCount++;

  $premiumInfoHtml .='

  <div class="voucher card border-0 my-2">
<div class="card-body p-1 vcard-body">

  <div class="row">
    <div class="col-5 px-0">
      <div class="row mb-1">
        <div class="col-12 mt-1">
          <img class="w-100" style="max-width:185px;" src="https://discoverbranson.com/wp-content/uploads/2018/11/voucher.jpg" alt="...">
        </div>
      </div>

      <div class="row mb-1">
        <div class="col-3 px-0">
          <div class="font-smaller text-secondary text-end">PRESENT TO:</div>
        </div>
        <div class="col-9 px-2">
          <div class="font-smaller fw-bold limit-string">'.$response['lodging']['data']['Hotel_Name'].'</div>
        </div>
      </div>
      <div class="row mb-1">
        <div class="col-3 px-0">
          <div class="font-smaller text-secondary text-end">ISSUED DATE:</div>
        </div>
        <div class="col-9 px-2">
          <div class="font-smaller fw-bold">'.date("m/d/y").'</div>
        </div>
      </div>

      <div class="row mb-1">
        <div class="col-3 px-0">
          <div class="font-smaller text-secondary text-end">
            CONFIRMATION #:
          </div>
        </div>
        <div class="col-9 px-2">
          <div class="font-smaller fw-bold">'.$response['data']['Lodging_Confirmation'].'</div>
        </div>
      </div>



      <div class="row mb-1">
        <div class="col-3 px-0">
          <div class="font-smaller text-secondary text-end">GUEST NAME:</div>
        </div>
        <div class="col-9 px-2">
          <div class="font-smaller fw-bold limit-string">'.$response['data']['Guest_Name_s']['display_value'].'</div>
        </div>
      </div>
      <div class="row mb-1">
        <div class="col-3 px-0">
          <div class="font-smaller text-secondary text-end">DATE:</div>
        </div>
        <div class="col-6 px-2">
          <div class="font-smaller fw-bold">'.$response['data']['Arrival_Date'].'</div>
        </div>
      </div>




      <div class="row mb-1">
        <div class="col-3 px-0">
          <div class="font-smaller text-secondary text-end">ROOM TYPE:</div>
        </div>
        <div class="col-3 px-2">
          <div class="font-smaller fw-bold">'.$response['lodging']['data']['Room_Type'].'</div>
        </div>
      </div>
  <div class="row mb-1">
        <div class="col-3 px-0">
          <div class="font-smaller text-secondary text-end"># OF NIGHTS:</div>
        </div>
        <div class="col-3 px-2">
          <div class="font-smaller fw-bold">'.$response['data']['Number_of_Nights'].'</div>
        </div>
      </div>



    </div>
    <div class="col-7 px-0">

      <div class="text-center">
      <div class="fw-bold limit-string img-top-text mx-auto">'.$response['lodging']['data']['Hotel_Name'].'</div>
      </div>
      <div class="bg-voucher-img mx-auto" style="width:400px;height:160px;background-image:url(\'https://d3qvqlc701gzhm.cloudfront.net/full/5359a32b22307cc2fc19241a113c3ffcb648d9666c2f088d6fa94080e55077d8.jpg\');"></div>
      <div class="text-center">
        <div class="text-secondary small limit-string img-bottom-text mx-auto">'.$response['lodging']['data']['Hotel_Address'].'</div>
      </div>

    </div>
  </div>


  <div class="row h-100">
    <div class="col-12 px-0">
      <div class="row mb-1 h-100">
        <div class="col-6 d-flex align-items-center">
          <div class="font-smaller text-secondary">AUTHORIZED SIGNATURE</div>
        </div>
        <div class="col-6">
          <div class="font-smaller fw-bold"></div>
        </div>
      </div>
    </div>
  </div>



</div>
<div style="position:absolute;right:5px;bottom:5px;">
  <div class="">
    <div class="smaller-text text-secondary text-end">*Present this voucher at the attraction/theater listed below. Not Redeemable for Cash Issued on</div>
    <div class="smaller-text text-secondary text-end">1105 W. 76 Country Blvd, Branson, MO 65616 | www.DiscoverBranson.com | info@discoverbranson.com</div>
  </div>

</div>
</div>


  ';

}

$additionalPremiumInfoHtml = '';

foreach(($response['data']['Premium_Info'] ?? []) as $k=>$v){
  $premiumDetails = explode('^^^',$v['display_value']);
	
	$timestamp = strtotime($premiumDetails[6]);
	$date = date('d-m-Y', $timestamp);
	$time = date('g:ia', $timestamp);
  	$premiumInfoHtml .= '

		  
		<div class="voucher card border-0 my-2">
    <div class="card-body p-1 vcard-body">
      
      <div class="row">
        <div class="col-5 px-0">
          <div class="row mb-1">
            <div class="col-12 mt-1">
              <img class="w-100" style="max-width:185px;" src="https://discoverbranson.com/wp-content/uploads/2018/11/voucher.jpg" alt="...">
            </div>
          </div>

          <div class="row mb-1">
            <div class="col-3 px-0">
              <div class="font-smaller text-secondary text-end">PRESENT TO:</div>
            </div>
            <div class="col-9 px-2">
              <div class="font-smaller fw-bold limit-string">'.$premiumDetails[0].'</div>
            </div>
          </div>
          <div class="row mb-1">
            <div class="col-3 px-0">
              <div class="font-smaller text-secondary text-end">ISSUED DATE:</div>
            </div>
            <div class="col-9 px-2">
              <div class="font-smaller fw-bold">'.$date.'</div>
            </div>
          </div>
          <div class="row mb-1">
            <div class="col-3 px-0">
              <div class="font-smaller text-secondary text-end">VOUCHER #:</div>
            </div>
            <div class="col-9 px-2">
              <div class="font-smaller fw-bold">'.$response['data']['Voucher_IDs'].'</div>
            </div>
          </div>
          <div class="row mb-1">
            <div class="col-3 px-0">
              <div class="font-smaller text-secondary text-end">
                CONFIRMATION #:
              </div>
            </div>
            <div class="col-9 px-2">
              <div class="font-smaller fw-bold">'.$premiumDetails[5].'</div>
            </div>
          </div>
          
          

          <div class="row mb-1">
            <div class="col-3 px-0">
              <div class="font-smaller text-secondary text-end">GUEST NAME:</div>
            </div>
            <div class="col-9 px-2">
              <div class="font-smaller fw-bold limit-string">'.$response['data']['Guest_Name_s']['display_value'].'</div>
            </div>
          </div>
          <div class="row mb-1">
            <div class="col-3 px-0">
              <div class="font-smaller text-secondary text-end">DATE:</div>
            </div>
            <div class="col-3 px-2">
              <div class="font-smaller fw-bold">'.$date.'</div>
            </div>
            <div class="col-3 px-0">
              <div class="font-smaller text-secondary text-end">TIME:</div>
            </div>
            <div class="col-3 px-2">
              <div class="font-smaller fw-bold">'.$time.'</div>
            </div>
          </div>
          
          <div class="row mb-1">
            
            <div class="col-3 px-0">
              <div class="font-smaller text-secondary text-end"># ADULTS:</div>
            </div>
            <div class="col-3 px-2">
              <div class="font-smaller fw-bold">'.$premiumDetails[1].'</div>
            </div>
            <div class="col-3 px-0">
              <div class="font-smaller text-secondary text-end"># CHILDREN:</div>
            </div>
            <div class="col-3 px-2">
              <div class="font-smaller fw-bold">'.$premiumDetails[2].'</div>
            </div>
          </div>      
          
          <div class="row mb-1">
            
            <div class="col-3 px-0">
              <div class="font-smaller text-secondary text-end">FREE:</div>
            </div>
            <div class="col-3 px-2">
              <div class="font-smaller fw-bold">'.$premiumDetails[3].'</div>
            </div>
            <div class="col-3 px-0">
              <div class="font-smaller text-secondary text-end">FAMILY PASS:</div>
            </div>
            <div class="col-3 px-2">
              <div class="font-smaller fw-bold"></div>
            </div>
          </div>  
          
          
          


        
        </div>
        <div class="col-7 px-0">
          
          <div class="text-center">
          <div class="fw-bold limit-string img-top-text mx-auto">'.$premiumDetails[0].'</div>
          </div>
          <div class="bg-voucher-img mx-auto" style="width:400px;height:160px;background-image:url(\'https://d3qvqlc701gzhm.cloudfront.net/full/5359a32b22307cc2fc19241a113c3ffcb648d9666c2f088d6fa94080e55077d8.jpg\');"></div>
          <div class="text-center">
            <div class="text-secondary small limit-string img-bottom-text mx-auto">'.$response['premium'][$v['ID']]['Theater_Address'].'</div>
          </div>
          
        </div>
      
      
      </div>
      
      
			<div class="row h-100">
				<div class="col-12 px-0">
          <div class="row mb-1 h-100">
            <div class="col-6 d-flex align-items-center">
              <div class="font-smaller text-secondary">AUTHORIZED SIGNATURE</div>
            </div>
            <div class="col-6">
              <div class="font-smaller fw-bold"></div>
            </div>
          </div>
				</div>
			</div>
      
      

    </div>
    <div style="position:absolute;right:5px;bottom:5px;">
      <div class="">
        <div class="smaller-text text-secondary text-end">*Present this voucher at the attraction/theater listed below. Not Redeemable for Cash Issued on '.$date.'</div>
        <div class="smaller-text text-secondary text-end">1105 W. 76 Country Blvd, Branson, MO 65616 | www.DiscoverBranson.com | info@discoverbranson.com</div>
      </div>
      
    </div>
  </div>
    
		
  ';
	$voucherCount++;
	if($voucherCount >= 3){
		$voucherCount = 0;
		$premiumInfoHtml .= '<div class="pagebreak"></div>';
	}
}

echo $premiumInfoHtml;


