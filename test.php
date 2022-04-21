<?php /* Template Name: testCache */ 


// single cache clear param
$path    = './wp-content/cache/voucherCache';
// $path    = './wp-content/cache/voucherCache';

if(isset($_GET['wipe'])){
	$garbageFiles = glob($path.'/*'); // get all file names
	foreach($garbageFiles as $garbageFile){ // iterate files
	  if(is_file($garbageFile)) {
		  unlink($garbageFile); // delete file
	  }
  }
}

$htmlArray = [];

$htmlArray['error'] = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://discoverbranson.com/wp-content/uploads/2018/10/cropped-852491_ticket_512x512.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300&display=swap" rel="stylesheet">
    <title>DiscoverBranson.com</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: black;
        }
        h1 {
            font-family: \'Nunito\', sans-serif;
            color: whitesmoke;
        }
    </style>
</head>
<body>
    <h1>404: Something went wrong, please retry your request...</h1>
</body>
</html>';

$htmlArray['openDated'] = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://discoverbranson.com/wp-content/uploads/2018/10/cropped-852491_ticket_512x512.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300&display=swap" rel="stylesheet">
    <title>DiscoverBranson.com</title>
	<script>
		function printExternal(url) {
			var printWindow = window.open( url, \'Print\', \'left=200, top=200, width=950, height=500, toolbar=0, resizable=0\');

			printWindow.addEventListener(\'load\', function() {
				if (Boolean(printWindow.chrome)) {
					printWindow.print();
					setTimeout(function(){
						printWindow.close();
					}, 500);
				} else {
					printWindow.print();
					printWindow.close();
				}
			}, true);
		}
	</script>
    <style>
      /* Global */
      * {
          margin: 0;
          padding: 0;
      }
      main {
          padding: 1% 0 1% 0;
          display: flex;
          flex-direction: column;
          justify-content: center;
          align-items: center;
          max-width:820px;
          margin: 0 auto;
      }
	  .line2 {
          background-color: black;
          width: 100%;
          height: 0.5px;
          margin: 3% 0 3% 0;
          border-radius: 0.5rem;
      }
      h3, p { 
          font-family: \'Nunito\', sans-serif;
          font-weight: 300;
      }
      h3 {
          font-weight: bold;
      }
      /* Lines */
      .line {
          background-color: black;
          width: 100%;
          height: 2px;
          margin: 3% 0 3% 0;
          border-radius: 0.5rem;
      }
      /* Header */
      .header {
          width: 100%;
      }
      .header div img {
          max-width: 100%;
          max-height: 100%;
      }
      .header h3 {
          margin-bottom: 3%;
      }
      .header p {
          font-size: 1.1rem;
          margin-bottom: 3%;
      }
      /* Section 1 */
      .section-1 {
          width: 100%;
      }
      .section-1 h3 { 
          margin-bottom: 3%;
      }
      .section-1 p {
          font-size: 1.1rem;
      }
      .section-1 p:last-child {
          margin: 3% 0 0 0;
      }
      /* Section 2 */
      .section-2 {
          width: 100%;
      }
      .section-2 h3 {
          margin-bottom: 3%;
      }
      .section-2 p {
          font-size: 1.1rem;
          margin-bottom: 3%;
      }
      .section-2 p:last-child {
          margin: 0;
      }
      /* Section 3 */
      .section-3 {
          width: 100%;
      }
      .section-3 p {
          font-size: 1.1rem;
      }
      .section-3 p:nth-child(4) {
          margin: 3% 0 3% 0;
      }
      /* Media */

      @media(max-width: 600px) {
          .header, .section-1, .section-2, .section-3, .line {
              width: 95%;
          }
      }


      </style>
</head>
<body>
  <main>
    <!-- Header -->
    <header class="header">
		
		
        <div>
            <img src="https://discoverbranson.com/wp-content/uploads/2018/11/discoverBransonOpen.jpg" alt="...">
        </div>
        <h3>CONGRATULATIONS ON YOUR BRANSON VACATION PURCHASE</h3>
        <p>We look forward to serving you!</p>
        <p>Branson Customer Service & Reservations <b>1-800-808-8045</b></p>
        <p>Thank you so much for your order!  Below is your order information and package summary.</p>
        <p>
            Your enjoyment is our top priority, and saving you money is our mission!   
            Please do not hesitate to contact us for your Branson ticket needs.  As a VIP customer, we extend special pricing to you on anything you need in Branson.  You also receive our special coupon bundles. 
        </p>
        <p>If you have any questions or concerns, please call us at <b>1-800-808-8045</b>!</p>
    </header>
    <!-- Section 1 -->
    <section class="section-1">
        <h3>CUSTOMER INFO:</h3>
<!--         <p>%FIRSTNAME%    %LASTNAME%  & %SPOUSE_FIRST_NAME%   %SPOUSE_LAST_NAME%</p> -->
        <p>%GUEST_NAMES%</p>
        <p>%ADDRESS_STREET_ADDRESS%</p>
<!--         <p>%ADDRESS_CITY%,   %ADDRESS_STATE%,   %ADDRESS_ZIP_CODE%</p> -->
        <p>%PHONE%</p>
        <p><b>Package Price:</b>   %DEAL_PACKAGE_PRICE%  <b>Customer Order #:</b>   %SUBSCRIBERID%</p>
    </section>
    <!-- Line Break -->
    <div class="line"></div>
    <!-- Section 2 -->
    <section class="section-2">
        <h3>YOUR VACATION PACKAGE INCLUDES:</h3>
        %PREMIUM_INFO_DETAILS%
        %ADDITIONAL_PREMIUM_INFO_DETAILS%
<!--         <p>-  %DEAL_LETTER_PACKAGE_LINE_1%</p>
        <p>-  %DEAL_LETTER_PACKAGE_LINE_2%</p>
        <p>-  %DEAL_LETTER_PACKAGE_LINE_3%</p>
        <p>-  %DEAL_LETTER_PACKAGE_LINE_4%</p>
        <p>-  %DEAL_CHECK_TO_ADD_OLD_TIME_PHOTO%</p>
        <p>-  %DEAL_CHECK_TO_ADD_BRANSON_GUEST_CARD%</p>
        <p>-  %DEAL_CHECK_TO_ADD_43_BONUS_VACATION%</p>
        <p><b>- 120 Minute Travel Preview/Tour</b></p> -->
    </section>
    <!-- Line Break -->
    <div class="line"></div>
    <!-- Section 3 -->
    <section class="section-3">
		%OPEN_DATED_NO_HOOKED_BUT_WITH_ARRIVAL_DATE_SECTION%
        <p>This amazing deal is non-refundable; however, you will have %PACKAGE_DURATION% months from the date of purchase to set your travel dates.  </p>
        <p>Please call 1-800-808-8045 to check availability and request your travel dates.  Orders take up to 72 hours to process.</p>
        <p>While we can book last minute travel, please provide 2 or more weeks’ notice for reservations, when possible.  If you would like to travel during peak season or a holiday, please provide 30 days or more notice, when possible. </p>
    </section>
  </main>
</body>
</html>';

$htmlArray['hookLetter'] = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://discoverbranson.com/wp-content/uploads/2018/10/cropped-852491_ticket_512x512.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300&display=swap" rel="stylesheet">
    <title>DiscoverBranson.com</title>
	<script>
		function printExternal(url) {
			var printWindow = window.open( url, \'Print\', \'left=200, top=200, width=950, height=500, toolbar=0, resizable=0\');

			printWindow.addEventListener(\'load\', function() {
				if (Boolean(printWindow.chrome)) {
					printWindow.print();
					setTimeout(function(){
						printWindow.close();
					}, 500);
				} else {
					printWindow.print();
					printWindow.close();
				}
			}, true);
		}
	</script>
    <style>
      * {
        margin: 0;
        padding: 0;
      }
      main {
          padding: 1% 0 1% 0;
          display: flex;
          flex-direction: column;
          justify-content: center;
          align-items: center;
          max-width:820px;
          margin: 0 auto;
      }
      h3, p { 
          font-family: \'Nunito\', sans-serif;
          font-weight: 300;
      }
      h3 {
          font-weight: bold;
      }
      /* Lines */
      .line {
          background-color: black;
          width: 100%;
          height: 1.3px;
          margin: 3% 0 3% 0;
          border-radius: 0.5rem;
      }
      .line2 {
          background-color: black;
          width: 100%;
          height: 0.5px;
          margin: 3% 0 3% 0;
          border-radius: 0.5rem;
      }
      /* Header */
      .header {
          width: 100%;
      }
      .header p {
          margin: 3% 0 3% 0;
      }
      .header p:last-child {
          margin: 0 0 3% 0;
      }
      .header img {
          max-width: 100%;
          max-height: 100%;
      }
      /* Section 1 */
      .section-1 {
          width: 100%;
      }
      .section-1 p:last-child {
          margin: 3% 0 0 0;
      }
      /* Section 1.5 */
      .noSection {
          width: 100%;
      }
      /* Section 2 */
      .section-2 {
          width: 100%;
      }
      .section-2 h3 {
          margin: 3% 0 3% 0;
      }
      /* Section 3 */
      .section-3 {
          width: 100%;
      }
      .section-3 p {
          margin: 3% 0 0 0;
      }
      /* Section 4 */
      .section-4 {
          width: 100%;
      }
      .section-4 h3 {
          margin: 2% 0 2% 0;
      }
      .section-4 p {
          margin: 1% 0 1% 0;
      }
      .section-4 p:first-child {
          margin: 0 0 3% 0;
      }
      .section-4 p:nth-child(4) {
          margin: 0 0 3% 0;
      }
      /* Media */
      @media(max-width: 600px) {
          .header, .section-1, .section-2, .section-3, .section-4, .noSection, .line {
              width: 95%;
          }
      }
    </style>
</head>
<body>
  <main>
    <!-- Header -->
    <header class="header">
		
        <h3>BRANSON VACATION CONFIRMATION LETTER </h3>
        <p>CUSTOMER ASSISTANCE HOTLINE 9AM-6PM <b>1-800-808-8045</b></p>
        <img src="https://discoverbranson.com/wp-content/uploads/2018/11/discoverBransonHook.jpg" alt="...">
        <p><b>FIRST STOP:</b> Vacation Package Check In at <a href="https://goo.gl/maps/RcTzRdJbsyGSYRHz7" target="_blank"> 1105 W. 76 Country Blvd. Branson, MO 65616</a></p>
    </header>
    <!-- Section 1 -->
    <section class="section-1">
        <h3>CUSTOMER INFORMATION:</h3>
<!--         <p>%FIRSTNAME% %LASTNAME% & %SPOUSE_FIRST_NAME% %SPOUSE_LAST_NAME%</p> -->
        <p>%GUEST_NAMES%</p>
        <p>%ADDRESS_STREET_ADDRESS%</p>
<!--         <p>%ADDRESS_CITY%, %ADDRESS_STATE%, %ADDRESS_ZIP_CODE%</p> -->
        <p>%PHONE%</p>
        <p><b>Package Price:</b> %DEAL_PACKAGE_PRICE%</p>
    </section>
    <!-- Line Break -->
    <div class="line"></div>
    <!-- No Section-->
    <section class="noSection">
        <p>Thank you for your order! We appreciate and value your business, along with your choice to visit Branson, Missouri.</p>
        <p>
            As a customer, you will receive our lowest rates on additional shows, activities and attractions.
            Please contact us with any questions or concerns. Also be certain to call us about any additional tickets <b>1-800-808-8045</b>!
        </p>
    </section>
    <!-- Section 2 -->
    <section class="section-2">
        <h3>VACATION ORDER DETAILS:</h3>
        %LODGING_DETAILS%
        %PREMIUM_INFO_DETAILS%
        %ADDITIONAL_PREMIUM_INFO_DETAILS%
<!--         <h3>%DEAL_SHOW_ATTRACTION_1%</h3>
        <p>%DEAL_SHOW_ATTRACTION_1_DATE% | <b>#AD:</b> %DEAL_SHOW_ATTRACTION_1_ADULTS% | <b>#CH:</b> %DEAL_SHOW_ATTRACTION_1_CHILD% | <b>Confo # :</b> %DEAL_SHOW_ATTRACTION_1_CONFO%</p>
        <div class="line2"></div>
        <h3>%DEAL_SHOW_ATTRACTION_2%</h3>
        <p>%DEAL_SHOW_ATTRACTION_2_DATE% | <b>#AD:</b> %DEAL_SHOW_ATTRACTION_2_ADULTS% | <b>#CH:</b> %DEAL_SHOW_ATTRACTION_2_CHILD% | <b>Confo # :</b> %DEAL_SHOW_ATTRACTION_2_CONFO%</p>
        <div class="line2"></div>
        <h3>%DEAL_SHOW_ATTRACTION_3%</h3>
        <p>%DEAL_SHOW_ATTRACTION_3_DATE% | <b>#AD:</b> %DEAL_SHOW_ATTRACTION_3_ADULTS% | <b>#CH:</b> %DEAL_SHOW_ATTRACTION_3_CHILD% | <b>Confo # :</b> %DEAL_SHOW_ATTRACTION_3_CONFO%</p>
        <div class="line2"></div> 
        <h3>%DEAL_SHOW_ATTRACTION_4%</h3>
        <p>%DEAL_SHOW_ATTRACTION_4_DATE% | <b>#AD:</b> %DEAL_SHOW_ATTRACTION_4_ADULTS% | <b>#CH:</b> %DEAL_SHOW_ATTRACTION_4_CHILD% | <b>Confo # :</b> %DEAL_SHOW_ATTRACTION_4_CONFO%</p>
        <div class="line2"></div>
        <h3>%DEAL_SHOW_ATTRACTION_5%</h3>
        <p>%DEAL_SHOW_ATTRACTION_5_DATE% | <b>#AD:</b> %DEAL_SHOW_ATTRACTION_5_ADULTS% | <b>#CH:</b> %DEAL_SHOW_ATTRACTION_5_CHILD% | <b>Confo # :</b> %DEAL_SHOW_ATTRACTION_5_CONFO%</p>
        <div class="line2"></div>
        <p>%DEAL_CHECK_TO_ADD_BRANSON_GUEST_CARD%</p>
        <p>%DEAL_CHECK_TO_ADD_OLD_TIME_PHOTO%</p>
        <p>%DEAL_CHECK_TO_ADD_43_BONUS_VACATION%</p> -->
    </section>
    <!-- Line Break -->
    <div class="line"></div>
    <!-- Section 3 -->
    <section class="section-3">
        <h3>VIP RESORT TOUR:</h3>
        <p>During your stay, your attendance is required for a no obligation, fun, exciting resort preview and Vacation Club presentation</p>
        <p>%DEAL_PRESENTATION_LOCATION%</p>
        <p>%DEAL_PRESENTATION_ADDRESS%</p>
        <p>Tour Date & Time: %DEAL_PRESENTATION_DATE_TIME%</p>
    </section>
    <!-- Line Break -->
    <div class="line"></div>
    <!-- Section 4 -->
    <section class="section-4">
        <p><a href="https://goo.gl/maps/3pLHM8tZj8hFnznT7" target="_blank">Click for Directions to Check in Center</a></p>
        <h3>Discover Branson Visitors Center</h3>
        <p><b>1105 W. 76 Country Blvd</b></p>
        <p><b>Branson, MO 65616</b></p>
        <h3>Terms and Conditions (Please Review)</h3>
        <p>Limited events, specialty lodging and other non-refundable items may not be cancelled.</p>
        <p>100% travel credit for future use if cancelled within 72 hours prior to arrival.</p>
        <p>Any cancellation or changes made within 7 days of arrival subject to $50 change fee.</p>
        <p>Failure to arrive on scheduled date will result in no show penalty of up to $500.</p>
        <p>Smoking in a non-smoking room, bringing pets to a non-pet unit and or damages to a unit are not included in any rates and are the responsibility of the guest.  Discover Branson is not liable for any additional fees for violation of policies.</p>
        <p>Any questions should be directed to customer service at 800-808-8045</p>
        <p>Packages sold are non-refundable. Failure to attend or qualify for the scheduled preview/presentation will result in additional charges of up to $500.  The included preview/presentation is required.</p>
        <h3>Qualifications & Requirements </h3>
        %DEAL_PRESENTATION_QUALIFICATIONS%
    </section>
  </main>
</body>
</html>
';


$htmlArray['noHookLetter'] = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://discoverbranson.com/wp-content/uploads/2018/10/cropped-852491_ticket_512x512.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300&display=swap" rel="stylesheet">
    <title>DiscoverBranson.com</title>
	<script>
		function printExternal(url) {
			var printWindow = window.open( url, \'Print\', \'left=200, top=200, width=950, height=500, toolbar=0, resizable=0\');

			printWindow.addEventListener(\'load\', function() {
				if (Boolean(printWindow.chrome)) {
					printWindow.print();
					setTimeout(function(){
						printWindow.close();
					}, 500);
				} else {
					printWindow.print();
					printWindow.close();
				}
			}, true);
		}
	</script>
    <style>
      * {
          margin: 0;
          padding: 0;
      }
      main {
          padding: 1% 0 1% 0;
          display: flex;
          flex-direction: column;
          justify-content: center;
          align-items: center;
          max-width:820px;
          margin: 0 auto;
      }
      h3, p { 
          font-family: \'Nunito\', sans-serif;
          font-weight: 300;
      }
      h3 {
          font-weight: bold;
      }
      /* Lines */
      .line {
          background-color: black;
          width: 100%;
          height: 1.3px;
          margin: 3% 0 3% 0;
          border-radius: 0.5rem;
      }
      .line2 {
          background-color: black;
          width: 100%;
          height: 0.5px;
          margin: 3% 0 3% 0;
          border-radius: 0.5rem;
      }
      /* Header */
      .header {
          width: 100%;
      }
      .header p {
          margin: 3% 0 3% 0;
      }
      .header p:last-child {
          margin: 0 0 3% 0;
      }
      .header img {
          max-width: 100%;
          max-height: 100%;
      }
      /* Section 1 */
      .section-1 {
          width: 100%;
      }
      .section-1 p:last-child {
          margin: 3% 0 0 0;
      }
      /* Section 1.5 */
      .noSection {
          width: 100%;
      }
      /* Section 2 */
      .section-2 {
          width: 100%;
      }
      .section-2 h3 {
          margin: 3% 0 3% 0;
      }
      /* Section 3 */
      .section-3 {
          width: 100%;
      }
      .section-3 p {
          margin: 3% 0 0 0;
      }
      /* Section 4 */
      .section-4 {
          width: 100%;
      }
      .section-4 h3 {
          margin: 2% 0 2% 0;
      }
      .section-4 p {
          margin: 1% 0 1% 0;
      }
      .section-4 p:first-child {
          margin: 0 0 3% 0;
      }
      .section-4 p:nth-child(4) {
          margin: 0 0 3% 0;
      }
      /* Media */

      @media(max-width: 600px) {
          .header, .section-1, .section-2, .section-3, .section-4, .noSection, .line {
              width: 95%;
          }
      }
    </style>
</head>
<body>
  <main>
    <!-- Header -->
		
    <header class="header">
        <h3>BRANSON VACATION CONFIRMATION LETTER </h3>
        <p>CUSTOMER ASSISTANCE HOTLINE 9AM-6PM <b>1-800-808-8045</b></p>
        <img src="https://discoverbranson.com/wp-content/uploads/2018/11/discoverBransonHook.jpg" alt="...">
        <p><b>FIRST STOP:</b> Vacation Package Check In at <a href="https://goo.gl/maps/RcTzRdJbsyGSYRHz7" target="_blank"> 1105 W. 76 Country Blvd. Branson, MO 65616</a></p>
    </header>
    <!-- Section 1 -->
    <section class="section-1">
        <h3>CUSTOMER INFORMATION:</h3>
<!--         <p>%FIRSTNAME% %LASTNAME% & %SPOUSE_FIRST_NAME% %SPOUSE_LAST_NAME%</p> -->
        <p>%GUEST_NAMES%</p>
        <p>%ADDRESS_STREET_ADDRESS%</p>
<!--         <p>%ADDRESS_CITY%, %ADDRESS_STATE%, %ADDRESS_ZIP_CODE%</p> -->
        <p>%PHONE%</p>
        <p><b>Package Price:</b> %DEAL_PACKAGE_PRICE%</p>
    </section>
    <!-- Line Break -->
    <div class="line"></div>
    <!-- No Section-->
    <section class="noSection">
        <p>Thank you for your order! We appreciate and value your business, along with your choice to visit Branson, Missouri.</p>
        <p>
            As a customer, you will receive our lowest rates on additional shows, activities and attractions.
            Please contact us with any questions or concerns. Also be certain to call us about any additional tickets <b>1-800-808-8045</b>!
        </p>
    </section>
    <!-- Section 2 -->
    <section class="section-2">
        <h3>VACATION ORDER DETAILS:</h3>
        %LODGING_DETAILS%
        %PREMIUM_INFO_DETAILS%
        %ADDITIONAL_PREMIUM_INFO_DETAILS%
<!--         <h3>%DEAL_SHOW_ATTRACTION_1%</h3>
        <p>%DEAL_SHOW_ATTRACTION_1_DATE% | <b>#AD:</b> %DEAL_SHOW_ATTRACTION_1_ADULTS% | <b>#CH:</b> %DEAL_SHOW_ATTRACTION_1_CHILD% | <b>Confo # :</b> %DEAL_SHOW_ATTRACTION_1_CONFO%</p>
        <div class="line2"></div>
        <h3>%DEAL_SHOW_ATTRACTION_2%</h3>
        <p>%DEAL_SHOW_ATTRACTION_2_DATE% | <b>#AD:</b> %DEAL_SHOW_ATTRACTION_2_ADULTS% | <b>#CH:</b> %DEAL_SHOW_ATTRACTION_2_CHILD% | <b>Confo # :</b> %DEAL_SHOW_ATTRACTION_2_CONFO%</p>
        <div class="line2"></div>
        <h3>%DEAL_SHOW_ATTRACTION_3%</h3>
        <p>%DEAL_SHOW_ATTRACTION_3_DATE% | <b>#AD:</b> %DEAL_SHOW_ATTRACTION_3_ADULTS% | <b>#CH:</b> %DEAL_SHOW_ATTRACTION_3_CHILD% | <b>Confo # :</b> %DEAL_SHOW_ATTRACTION_3_CONFO%</p>
        <div class="line2"></div> 
        <h3>%DEAL_SHOW_ATTRACTION_4%</h3>
        <p>%DEAL_SHOW_ATTRACTION_4_DATE% | <b>#AD:</b> %DEAL_SHOW_ATTRACTION_4_ADULTS% | <b>#CH:</b> %DEAL_SHOW_ATTRACTION_4_CHILD% | <b>Confo # :</b> %DEAL_SHOW_ATTRACTION_4_CONFO%</p>
        <div class="line2"></div>
        <h3>%DEAL_SHOW_ATTRACTION_5%</h3>
        <p>%DEAL_SHOW_ATTRACTION_5_DATE% | <b>#AD:</b> %DEAL_SHOW_ATTRACTION_5_ADULTS% | <b>#CH:</b> %DEAL_SHOW_ATTRACTION_5_CHILD% | <b>Confo # :</b> %DEAL_SHOW_ATTRACTION_5_CONFO%</p>
        <div class="line2"></div>
        <p>%DEAL_CHECK_TO_ADD_BRANSON_GUEST_CARD%</p>
        <p>%DEAL_CHECK_TO_ADD_OLD_TIME_PHOTO%</p>
        <p>%DEAL_CHECK_TO_ADD_43_BONUS_VACATION%</p> -->
    </section>
    <!-- Line Break -->
    <div class="line"></div>
    <!-- Section 3 -->
    <section class="section-3">
        <h3>NEED MORE TICKETS? WANT ANOTHER NIGHT?</h3>
        <p>
            We are always here to help. Keep it simple and book it all from Discover Branson.
            <b>800-808-8045</b>
        </p>
    </section>
    <!-- Line Break -->
    <div class="line"></div>
    <!-- Section 4 -->
    <section class="section-4">
        <p><a href="https://goo.gl/maps/3pLHM8tZj8hFnznT7" target="_blank">Click for Directions to Check in Center</a></p>
        <h3>Discover Branson Visitors Center</h3>
        <p><b>1105 W. 76 Country Blvd</b></p>
        <p><b>Branson, MO 65616</b></p>
        <h3>Terms and Conditions (Please Review)</h3>
        <p>Limited events, specialty lodging and other non-refundable items may not be cancelled.</p>
        <p>100% travel credit for future use if cancelled within 72 hours prior to arrival.</p>
        <p>Any cancellation or changes made within 7 days of arrival subject to $50 change fee.</p>
        <p>Failure to arrive on scheduled date will result in no show penalty of up to $300.</p>
        <p>Smoking in a non-smoking room, bringing pets to a non-pet unit and or damages to a unit are not included in any rates and are the responsibility of the guest.  Discover Branson is not liable for any additional fees for violation of policies.</p>
        <p>Any questions should be directed to customer service at <b>800-808-8045</b></p>
    </section>
  </main>
</body>
</html>';

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


$filename = $path .'/'.$record_id.'-confirmation.txt';


if(isset($_GET['clearsinglerecord'])){
  unlink($filename); // delete file
}

$currentDirectory = basename(dirname(__FILE__));
 
$files = scandir($path);
$files = array_diff(scandir($path), array('.', '..'));

if (file_exists($filename) &&  (filemtime($filename)+3600) > microtime(true)) {
	$response = json_decode(file_get_contents($filename), true);
}else{
	// Curling
	$url = 'https://creator.zoho.com/api/v2/discoverbranson417/sales-log/report/All_Sales_For_Dev_Access/'.$record_id;

	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			"Authorization: Zoho-oauthtoken". " " .getAuthToken()
			));
	$raw = curl_exec($ch);
	$response = json_decode($raw, true);
	curl_close($ch);
	if($response['code'] !== 3000){
		die($htmlArray['error']);
	}
	
	$myfile = fopen($filename, "w+") or die($htmlArray['error']);
	file_put_contents($filename, json_encode($response));
	fclose($myfile);
	
}

if (isset($_GET['debug'])) {
  echo json_encode($response);
  die;
}

// conditions to decided which template
$template = 'openDated';
if(!empty($response['data']['Arrival_Date'])){
  $template = 'noHookLetter';
  if($response['data']['Hooked'] === 'Yes'){
    $template = 'hookLetter';
  }
}


$tourInformation = '';
if($template === 'openDated' && $response['data']['Hooked'] === 'Yes'){
	$tourInformation = '<p>Your vacation package includes a vacation sales presentation that is typically scheduled for the day after you arrive in Branson. </p>
        <p>We will schedule this when your vacation has been booked and your schedule is confirmed. </p>
        <p>We are excited to share this wonderful program with you.  There is no cost or obligation to purchase anything.  Come ready to have fun and learn about new opportunities in the travel industry.</p>';
}

try{
  $file_contents = $htmlArray[$template]; // replace with proper names
}catch(\Exception $ex){
  echo $htmlArray['error'];
}

// echo $file_contents;
// die;
// $premiumInfoHtml = '';
// foreach(($response['data']['Premium_Info'] ?? []) as $k=>$v){
//   $premiumInfoHtml .= '<p> - '.$v['display_value'].'<p>';
// }

function parsePremiumDetails($arr){
	$parser = [
		'premium' => $arr[0], // 0
		'adults_count' => $arr[1], // 1
		'children_count' => $arr[2], 
		'family_passes_count' => $arr[3], 
		'teen_count' => $arr[4], 
		'confirmation' => $arr[5],
		'date_time' => $arr[6], 
		'voucher' => $arr[7],
	];
	
	foreach($parser as $k=>$v){
		if(in_array($k,['adults_count','children_count','family_passes_count','teen_count',]) && empty($v)){unset($parser[$k]);}
	}
	return $parser;
}

$premiumInfoHtml = '';
$additionalPremiumInfoHtml = '';
foreach(($response['data']['Premium_Info'] ?? []) as $k=>$v){
  $premiumDetails = explode('^^^',$v['display_value']);
	$premiumDetails = parsePremiumDetails($premiumDetails);

  if(in_array($premiumDetails['premium'], ['Branson Guest Card', '4/3 Bonus Vacation', 'Old Time Photo Session & Photo'])){
    $additionalPremiumInfoHtml .= '
    <h3>'.$premiumDetails['premium'];
	  if(!empty($premiumDetails['adults_count'])){
		  $additionalPremiumInfoHtml .= ' ('.$premiumDetails['adults_count'].')';	  
	  }
	$additionalPremiumInfoHtml .=	'</h3>';
    continue;
  }
//   die(json_encode($premiumDetails));
  $premiumInfoHtml .= '
  <h3>'.$premiumDetails['premium'].'</h3>';
  $premiumInfoHtml .= '<p>'.(!empty($premiumDetails['date_time'])?$premiumDetails['date_time'].' ':' ');
  $premiumInfoHtml2 = '';
  if(isset($premiumDetails['adults_count'])){
    $premiumInfoHtml2 .= ' | <b>#AD:</b> '.$premiumDetails['adults_count'];
  }
    
  if(isset($premiumDetails['children_count'])){
    $premiumInfoHtml2 .= ' | <b>#CH:</b> '.$premiumDetails['children_count'];
  }    
  
  if(isset($premiumDetails['family_passes_count'])){
    $premiumInfoHtml2 .= ' | <b>#FAMILY:</b> '.$premiumDetails['family_passes_count'];
  }    
  if(isset($premiumDetails['teen_count'])){
    $premiumInfoHtml2 .= ' | <b>#TEEN:</b> '.$premiumDetails['teen_count'];
  }
  
  $premiumInfoHtml2 .=' | <b>Confo # :</b> '.(!empty($premiumDetails['confirmation'])?$premiumDetails['confirmation']:'PENDING').'</p>
  <div class="line2"></div>';
  $premiumInfoHtml2 = trim($premiumInfoHtml2);
  if(empty($premiumDetails['date_time'])){
    $premiumInfoHtml2 = ltrim($premiumInfoHtml2, '|');
  }
  $premiumInfoHtml2 = trim($premiumInfoHtml2);
  $premiumInfoHtml .= $premiumInfoHtml2;
}


$lodgingDetailsHtml = '';
if(!empty($response['data']['Arrival_Date']) && $response['data']['Lodging_Source'] === 'Discover Branson'){
	$discoverBransonLogding  = '';
	if(isset($response['data']['Discover_Branson_Lodging']['display_value']) &&  !empty($response['data']['Discover_Branson_Lodging']['display_value'])){
		$discoverBransonLogding = $response['data']['Discover_Branson_Lodging']['display_value'];
	}
  $lodgingDetailsHtml .= '
  <p><b>ARRIVAL DATE:</b> '.$response['data']['Arrival_Date'].'<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; DEPARTURE DATE:</b> '.$response['data']['Departure_Date'].'</p>
  <p><b>LODGING:</b> '.$discoverBransonLogding.'<b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;# OF NIGHTS:</b> '.$response['data']['Number_of_Nights'].'<b><br>CONFIRMATION #:</b> '.$response['data']['Lodging_Confirmation'].'</p>
  <div class="line2"></div>';
}

if(!empty($additionalPremiumInfoHtml)){
//   $additionalPremiumInfoHtml .= '<div class="line2"></div>';
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
	'DEAL_PRESENTATION_QUALIFICATIONS' => $response['data']['Tour_Location.Qualifications'],
  
  'LODGING_DETAILS' => $lodgingDetailsHtml,
	'OPEN_DATED_NO_HOOKED_BUT_WITH_ARRIVAL_DATE_SECTION' => $tourInformation,
  
];

foreach($textReplacers as $k=>$v){
  $file_contents = str_replace('%'.$k.'%', $v, $file_contents);
}

echo $file_contents;

$garbageFilesNames = glob($path.'/*'); // get all file names
foreach($garbageFilesNames as $garbageFileName){ // iterate files
	$garbageTime = (filemtime($garbageFileName)) + 3600;
	if ($garbageTime < time()){
		unlink($garbageFileName);
	}
}

