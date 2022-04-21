<?php /* Template Name: vouchersapiTemplate */ 
	
  

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
$token = getAuthToken();
// 	Checking for record_id in params
$record_id = '';
if (isset($_GET['record_id'])) {
 	$record_id = $_GET['record_id'];
}

// Curling
$url = 'https://creator.zoho.com/api/v2/discoverbranson417/sales-log/report/All_Sales_For_Dev_Access/'.$record_id;
if (isset($_GET['dev_token'])){
	die(getAuthToken());
}
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
	echo "<div class='content' id='spinner'><h1>No Vouchers Found</h1></div>";
	die;
}
$voucherCount = 0;

	$premiumInfoHtml = '';
	$premiumInfoHtml .= '<div class="no-print" style="padding:20px;"><button class="btn btn-primary" onClick="window.print()">Print this page
</button></div>';
//    print("<pre>".print_r($response,true)."</pre>");
	  if ($response['data']['Lodging_Source']=="Discover Branson"){
		  $voucherCount++;
		  $url2 = 'https://creator.zoho.com/api/v2/discoverbranson417/sales-log/report/Lodging_List_For_Dev_Use/'.$response['data']['Discover_Branson_Lodging']['ID'];
			
		  $ch2 = curl_init($url2);
		  curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
		  curl_setopt($ch2, CURLOPT_HTTPHEADER, array(
			  "Authorization: Zoho-oauthtoken". " " .$token
		  ));
		  $raw2 = curl_exec($ch2);
		  $response2 = json_decode($raw2, true);
		  curl_close($ch2);
//		  print("<pre>".print_r($response2,true)."</pre>");
		  
		  
end;
		  
		  $premiumInfoHtml .='
		  <div class="voucher">
			<div class="container-fluid">
			   <div class="row">
				   <div class="col">
						<img src="https://discoverbranson.com/wp-content/uploads/2018/11/voucher.jpg" alt="...">
				   </div>
				   <div class="col">
					  <div class="row m-1">
						  <div class="col border border-2 border-dark d-flex justify-content-center align-content-center">
							<h4 class="font-smaller fw-bold">Confirmation #</h4>
						  </div>
						  <div class="col border border-2 border-dark d-flex justify-content-end align-content-center">
							<p class="font-smaller fw-bold">'.$response['data']['Lodging_Confirmation'].'</p>
						  </div>
					  </div>
				   </div>
			   </div>
			</div>
			<div class="row">
				<div class="col-3 text-center border border-1 border-dark">
					<h6 class="font-bigger fw-bold">Present to:</h6>
				</div>
				<div class="col-9 text-center border border-1 border-dark">
					<h4 class="font-smaller fw-bold">'.$response2['data']['Hotel_Name'].'</h4>
				</div>
			</div>
			<div class="row">
				<div class="col-3 text-center border border-1 border-dark">
					<h6 class="font-bigger fw-bold">Valid for:</h6>
				</div>
				<div class="col-9 text-center border border-1 border-dark">
					<h4 class="font-smaller fw-bold">'.$response['data']['Guest_Name_s']['display_value'].'</h4>
				</div>
			</div>
			<div class="row">
				<div class="col-3 text-center border border-1 border-dark">
					<h6 class="font-bigger fw-bold">Date:</h6>
				</div>
				<div class="col-2 text-center border border-1 border-dark">
					<h4 class="font-smaller fw-bold">'.$response['data']['Arrival_Date'].'</h4>
				</div>
				
				<div class="col-7 text-center border border-1 border-dark">
					<h4 class="font-smaller fw-bold"></h4>
				</div>
			</div>
			<div class="row">
				<div class="col p-0">
					<div class="row">
						<div class="col pe-4 text-center border border-1 border-dark">
							<h4 class="font-bigger fw-bold"># Adults:</h4>
						</div>
						<div class="col text-center border border-1 border-dark">
							<p class="fw-bold font-smaller">'.$response['data']['of_Adults'].'</p>
						</div>
					</div>
					<div class="row">
						<div class="col pe-4 text-center border border-1 border-dark">
							<h4 class="font-bigger fw-bold"># Children:</h4>
						</div>
						<div class="col text-center border border-1 border-dark">
							<p class="fw-bold font-smaller">'.$response['data']['of_Kids'].'</p>
						</div>
					</div>
					<div class="row">
						<div class="col pe-4 text-center border border-1 border-dark">
							<h4 class="font-bigger fw-bold">Free:</h4>
						</div>
						<div class="col text-center border border-1 border-dark">
							<p class="fw-bold font-smaller"></p>
						</div>
					</div>
					<div class="row">
						<div class="col pe-4 text-center border border-1 border-dark">
							<h4 class="font-bigger fw-bold">Family Pass:</h4>
						</div>
						<div class="col text-center border border-1 border-dark">
							<p class="fw-bold font-smaller"></p>
						</div>
					</div>
					<div class="row">
						<div class="col pe-4 text-center border border-1 border-dark">
							<h4 class="font-bigger fw-bold"># Of Nights:</h4>
						</div>
						<div class="col text-center border border-1 border-dark">
							<p class="fw-bold font-smaller">'.$response['data']['Number_of_Nights'].'</p>
						</div>
					</div>
					<div class="row">
						<div class="col pe-4 text-center border border-1 border-dark">
							<h4 class="font-bigger fw-bold">Room Type:</h4>
						</div>
						<div class="col text-center border border-1 border-dark">
							<p class="fw-bold font-smaller">'.$response2['data']['Room_Type'].'</p>
						</div>
					</div>
				</div>
				<div class="col d-flex flex-column justify-content-center align-items-center">
					<div class="row">
						<h4 class="font-bigger fw-bold">'.$response2['data']['Hotel_Name'].'</h4>
					</div>
					<div class="row">
						<h4 class="font-bigger fw-bold">Location: '.$response2['data']['Hotel_Address'].'</h4>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-4 text-center border border-1 border-dark">
					<h4 class="font-bigger fw-bold">Authorized Signature:</h4>
				</div>
				<div class="col-4 text-center border border-1 border-dark">
					<h4 class="font-smaller fw-bold"></h4>
				</div>
				<div class="col-4 text-center border border-1 border-dark">
					<h4 class="font-smaller fw-bold">Issued: '.date("m/d/y").'</h4>
				</div>
			</div>
			<div class="row">
				<div class="col text-center border border-1 border-dark">
					<h4 class="font-smaller fw-bold">1105 W. 76 COUNTRY BLVD., BRANSON, MO 65616 • www.discoverbranson.com • info@discoverbranson.com</h4>
				</div>
			</div>
		</div>
		  ';
		  
	  }else{
		  
	  }

// if (isset($_GET['debug'])) {
//   echo $raw;
//   die;
// }


$additionalPremiumInfoHtml = '';

foreach(($response['data']['Premium_Info'] ?? []) as $k=>$v){
  $premiumDetails = explode('^^^',$v['display_value']);
  	$url3 = 'https://creator.zoho.com/api/v2/discoverbranson417/sales-log/report/Premium_List_For_Dev_Only?Name='.$premiumDetails[0];
	$url3encoded = str_replace(' ', '%20', $url3);
	$ch3 = curl_init($url3encoded);
		  curl_setopt($ch3, CURLOPT_RETURNTRANSFER, true);
		  curl_setopt($ch3, CURLOPT_HTTPHEADER, array(
			  "Authorization: Zoho-oauthtoken". " " .$token
		  ));
		  $raw3 = curl_exec($ch3);
		  $response3 = json_decode($raw3, true);
		  curl_close($ch3);
//		  echo $url3;
//	print("<pre>".print_r($response3,true)."</pre>");
	$timestamp = strtotime($premiumDetails[6]);
	$date = date('d-m-Y', $timestamp);
	$time = date('g:ia', $timestamp);
  	$premiumInfoHtml .= '<div class="voucher">
			<div class="container-fluid">
			   <div class="row">
				   <div class="col">
						<img src="https://discoverbranson.com/wp-content/uploads/2018/11/voucher.jpg" alt="...">
				   </div>
				   <div class="col">
					  <div class="row m-1">
						  <div class="col border border-2 border-dark d-flex justify-content-center align-content-center">
							<h4 class="font-smaller fw-bold">Confirmation #</h4>
						  </div>
						  <div class="col border border-2 border-dark d-flex justify-content-end align-content-center">
							<p class="font-smaller fw-bold">'.$premiumDetails[5].'</p>
						  </div>
					  <div class="row">
						  <p style="font-size: 0.8rem !important; margin-top: 10px;">
								**Present this voucher at the attraction/theater listed below.
								Not Redeemable for Cash Issued on '.$date = $datetime[0].'**
							</p>
					  </div>
					  </div>
				   </div>
			   </div>
			</div>
			<div class="row">
				<div class="col-3 text-center border border-1 border-dark">
					<h6 class="font-bigger fw-bold">Customer Name:</h6>
				</div>
				<div class="col-9 text-center border border-1 border-dark">
					<h4 class="font-smaller fw-bold">'.$response['data']['Guest_Name_s']['display_value'].'</h4>
				</div>
			</div>
			<div class="row">
				<div class="col-3 text-center border border-1 border-dark">
					<h6 class="font-bigger fw-bold">Shows/Attractions:</h6>
				</div>
				<div class="col-9 text-center border border-1 border-dark">
					<h4 style="font-size: 1.2rem;" class="fw-bold">'.$premiumDetails[0].'</h4>
				</div>
			</div>
			<div class="row">
				<div class="col-3 text-center border border-1 border-dark">
					<h6 class="font-bigger fw-bold">Date:</h6>
				</div>
				<div class="col-4 text-center border border-1 border-dark">
					<h4 class="font-smaller fw-bold">'.$date.'</h4>
				</div>
				<div class="col-2 text-center border border-1 border-dark">
					<h4 class="font-bigger fw-bold">Time</h4>
				</div>
				<div class="col-3 text-center border border-1 border-dark">
					<h4 class="font-smaller fw-bold">'.$time.'</h4>
				</div>
			</div>
			<div class="row">
				<div class="col p-0">
					<div class="row">
						<div class="col pe-4 text-center border border-1 border-dark">
							<h4 class="font-bigger fw-bold"># Adults:</h4>
						</div>
						<div class="col text-center border border-1 border-dark">
							<p class="fw-bold font-smaller">'.$premiumDetails[1].'</p>
						</div>
					</div>
					<div class="row">
						<div class="col pe-4 text-center border border-1 border-dark">
							<h4 class="font-bigger fw-bold"># Children:</h4>
						</div>
						<div class="col text-center border border-1 border-dark">
							<p class="fw-bold font-smaller">'.$premiumDetails[2].'</p>
						</div>
					</div>
					<div class="row">
						<div class="col pe-4 text-center border border-1 border-dark">
							<h4 class="font-bigger fw-bold">Free:</h4>
						</div>
						<div class="col text-center border border-1 border-dark">
							<p class="fw-bold font-smaller">'.$premiumDetails[3].'</p>
						</div>
					</div>
					<div class="row">
						<div class="col pe-4 text-center border border-1 border-dark">
							<h4 class="font-bigger fw-bold">Family Pass:</h4>
						</div>
						<div class="col text-center border border-1 border-dark">
							<p class="fw-bold font-smaller"></p>
						</div>
					</div>
				</div>
				<div class="col d-flex flex-column justify-content-center align-items-center">
					<div class="row">
						<h4 class="font-bigger fw-bold">'.$response3['data'][0]['Theater_Name'].'</h4>
					</div>
					<div class="row">
						<h4 class="font-bigger fw-bold">Location: '.$response3['data'][0]['Theater_Address'].'</h4>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-4 text-center border border-1 border-dark">
					<h4 class="font-bigger fw-bold">Authorized Signature:</h4>
				</div>
				<div class="col-4 text-center border border-1 border-dark">
					<h4 class="font-smaller fw-bold"></h4>
				</div>
				<div class="col-4 text-center border border-1 border-dark">
					<h4 class="font-smaller fw-bold">V#: '.$response['data']['Voucher_IDs'].'</h4>
				</div>
			</div>
			<div class="row">
				<div class="col text-center border border-1 border-dark">
					<h4 class="font-smaller fw-bold">1105 W. 76 COUNTRY BLVD., BRANSON, MO 65616 • www.discoverbranson.com • info@discoverbranson.com</h4>
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


