<?php /* Template Name: emailConfirmationTemplate */ 
die('SAFETY START');
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

// 	Checking for record_id in params
$record_id = '';
if (isset($_GET['record_id'])) {
 	$record_id = $_GET['record_id'];
}
// Curling
$url = 'https://creator.zoho.com/api/v2/discoverbranson417/sales-log/report/All_Sales_For_Dev_Access/'.$record_id;
if (isset($_GET['all'])) {
  $url= 'https://creator.zoho.com/api/v2/discoverbranson417/sales-log/report/All_Sales_For_Dev_Access';
}
if (isset($_GET['location'])) {
  $url = 'https://creator.zoho.com/api/v2/discoverbranson417/sales-log/report/Tour_Locations_For_Dev/'.$record_id;
}
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Authorization: Zoho-oauthtoken". " " .getAuthToken()
        ));
$raw = curl_exec($ch);
$response = json_decode($raw, true);
curl_close($ch);

if (isset($_GET['debug'])) {
  echo $raw;
  die;
}


$template = 'openDated';
if(!empty($response['data']['Arrival_Date'])){
  $template = 'noHookLetter';
  if($response['data']['Hooked'] === 'Yes'){
    $template = 'hookLetter';
  }
}


// missing conditions to decided which template
try{
  $file_contents = file_get_contents('/var/www/html/invoice-emails-html/'.$template.'.html'); // replace with proper names
}catch(\Exception $ex){
  return false;
}

// echo $file_contents;
// die;
// $premiumInfoHtml = '';
// foreach(($response['data']['Premium_Info'] ?? []) as $k=>$v){
//   $premiumInfoHtml .= '<p> - '.$v['display_value'].'<p>';
// }

$premiumInfoHtml = '';
$additionalPremiumInfoHtml = '';
foreach(($response['data']['Premium_Info'] ?? []) as $k=>$v){
  $premiumDetails = explode('^^^',$v['display_value']);
  if(in_array($premiumDetails[0], ['Branson Guest Card', '4/3 Bonus Vacation', 'Old Time Photo Session & Photo'])){
    $additionalPremiumInfoHtml .= '
    <h3>'.$premiumDetails[0];
	  if(!empty($premiumDetails[1])){
		  $additionalPremiumInfoHtml .= ' ('.$premiumDetails[1].')';	  
	  }
	  $additionalPremiumInfoHtml .=	'</h3>';
    continue;
  }
//   die(json_encode($premiumDetails));
  $premiumInfoHtml .= '
  <h3>'.$premiumDetails[0].'</h3>
  <p>'.(!empty($premiumDetails[6])?$premiumDetails[6].' | ':'').' <b>#AD:</b> '.(!empty($premiumDetails[1])?$premiumDetails[1]:0).' | <b>#CH:</b> '.(!empty($premiumDetails[2])?$premiumDetails[2]:0).' | <b>Confo # :</b> '.(!empty($premiumDetails[5])?$premiumDetails[5]:'PENDING').'</p>
  <div class="line2"></div>';
}

$lodgingDetailsHtml = '';
if(!empty($response['data']['Arrival_Date']) && $response['data']['Lodging_Source'] === 'Discover Branson'){
  $lodgingDetailsHtml .= '
  <p><b>ARRIVAL DATE:</b> '.$response['data']['Arrival_Date'].'<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; DEPARTURE DATE:</b> '.$response['data']['Departure_Date'].'</p>
  <p><b>LODGING:</b> '.$response['data']['Discover_Branson_Lodging'].'<b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;# OF NIGHTS:</b> '.$response['data']['Number_of_Nights'].'<b><br>CONFIRMATION #:</b> '.$response['data']['Lodging_Confirmation'].'</p>
  <div class="line2"></div>';
}

if(!empty($additionalPremiumInfoHtml)){
  $additionalPremiumInfoHtml .= '<div class="line2"></div>';
}
  

$phone = $response['data']['Guest_Name_s.Cell_Phone'];
if(empty($phone)){$phone = $response['data']['Guest_Name_s.Home_Phone'];}
if(empty($phone)){$phone = $response['data']['Guest_Name_s.Alternate_Phone'];}

$textReplacers = [
//   'FIRSTNAME' => $response['data']['Guest_Name_s.Primary_Guest'],
//   'SPOUSE_FIRST_NAME' => $response['data']['Guest_Name_s.Secondary_Guest'],
  'GUEST_NAMES' => $response['data']['Guest_Name_s']['display_value'],
  'ADDRESS_STREET_ADDRESS' => $response['data']['Guest_Name_s.Address'],
  'PHONE' => $phone,
  'SUBSCRIBERID' => $response['data']['Auto_Number'],
  'DEAL_NIGHTS' => $response['data']['Number_of_Nights'] ?? '',
  'DEAL_LODGING' => $response['data']['Discover_Branson_Lodging']['display_value'] ?? '',
  'DEAL_LODGING_CONFIRMATION' => $response['data']['Lodging_Confirmation'] ?? '',
  
  'PREMIUM_INFO_DETAILS' => $premiumInfoHtml,
  'ADDITIONAL_PREMIUM_INFO_DETAILS' => $additionalPremiumInfoHtml,
  'DEAL_PACKAGE_CHECK_IN_DATE' => $response['data']['Arrival_Date'] ?? '',
  'DEAL_PACKAGE_DEPARTURE_DATE' => $response['data']['Departure_Date'] ?? '',
  
  'DEAL_PACKAGE_PRICE' => '$'.$response['data']['Amount_Sold_For'],
  'PACKAGE_DURATION' => $response['data']['Package_Duration'],
  
  'DEAL_PRESENTATION_LOCATION' => $response['data']['Tour_Location']['display_value'],
  'DEAL_PRESENTATION_ADDRESS' => $response['data']['Tour_Location.Address'],
  'DEAL_PRESENTATION_DATE_TIME' => $response['data']['Tour_Date_Time'],
  
  'LODGING_DETAILS' => $lodgingDetailsHtml,
  
];

foreach($textReplacers as $k=>$v){
  $file_contents = str_replace('%'.$k.'%', $v, $file_contents);
}

echo $file_contents;





