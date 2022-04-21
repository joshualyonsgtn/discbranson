<?php /* Template Name: vouchersTemplate */ 
	if (isset($_GET['record_id'])) {
		$record_id = $_GET['record_id'];
	}
?>
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
    <!-- font-family: 'Nunito', sans-serif; -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>DiscoverBranson.com</title>
    <style>
		.main-container{
			max-width:850px;
		}
        .lds-roller {
		  display: inline-block;
		  position: relative;
		  width: 80px;
		  height: 80px;
		}
		.lds-roller div {
		  animation: lds-roller 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
		  transform-origin: 40px 40px;
		}
		.lds-roller div:after {
		  content: " ";
		  display: block;
		  position: absolute;
		  width: 7px;
		  height: 7px;
		  border-radius: 50%;
		  background: #000;
		  margin: -4px 0 0 -4px;
		}
		.lds-roller div:nth-child(1) {
		  animation-delay: -0.036s;
		}
		.lds-roller div:nth-child(1):after {
		  top: 63px;
		  left: 63px;
		}
		.lds-roller div:nth-child(2) {
		  animation-delay: -0.072s;
		}
		.lds-roller div:nth-child(2):after {
		  top: 68px;
		  left: 56px;
		}
		.lds-roller div:nth-child(3) {
		  animation-delay: -0.108s;
		}
		.lds-roller div:nth-child(3):after {
		  top: 71px;
		  left: 48px;
		}
		.lds-roller div:nth-child(4) {
		  animation-delay: -0.144s;
		}
		.lds-roller div:nth-child(4):after {
		  top: 72px;
		  left: 40px;
		}
		.lds-roller div:nth-child(5) {
		  animation-delay: -0.18s;
		}
		.lds-roller div:nth-child(5):after {
		  top: 71px;
		  left: 32px;
		}
		.lds-roller div:nth-child(6) {
		  animation-delay: -0.216s;
		}
		.lds-roller div:nth-child(6):after {
		  top: 68px;
		  left: 24px;
		}
		.lds-roller div:nth-child(7) {
		  animation-delay: -0.252s;
		}
		.lds-roller div:nth-child(7):after {
		  top: 63px;
		  left: 17px;
		}
		.lds-roller div:nth-child(8) {
		  animation-delay: -0.288s;
		}
		.lds-roller div:nth-child(8):after {
		  top: 56px;
		  left: 12px;
		}
		@keyframes lds-roller {
		  0% {
			transform: rotate(0deg);
		  }
		  100% {
			transform: rotate(360deg);
		  }
		}
		.content {
		  position: absolute;
		  left: 50%;
		  top: 50%;
		  -webkit-transform: translate(-50%, -50%);
		  transform: translate(-50%, -50%);
		}
		* {
            margin: 0 !important;
        }
        body{
            font-family: 'Nunito', sans-serif !important;
            font-weight: 300 !important;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        img{
/*             width:350px; */
        }
        .voucher{
/*             margin: 20px 0 20px 0 !important; */
/*             background-color: white; */
            width: 850px;
          height: 332.22px;
/*             border: 0.2rem solid black; */
        }
        .font-bigger{
            font-size: 1rem !important;
        }
        .font-smaller{
            font-size: 0.8rem !important;
        }
        .c-p {
            padding: 0 !important;
        }
		  {
            /* padding: 0% !important; */
/*             margin: 0% !important; */
        }
		.btn {
			padding: 14px 24px;
			border: 0 none;
			font-weight: 700;
			letter-spacing: 1px;
			text-transform: uppercase;
		}

		.btn:focus, .btn:active:focus, .btn.active:focus {
			outline: 0 none;
		}

		.btn-primary {
			background: #46b866;
			color: #ffffff;
		}

		.btn-primary:hover, .btn-primary:focus, .btn-primary:active, .btn-primary.active, .open > .dropdown-toggle.btn-primary {
			background: #46b866;
		}

		.btn-primary:active, .btn-primary.active {
			background: #46b866;
			box-shadow: none;
		}
					.pagebreak { clear: both;
        page-break-after: always; } /* page-break-after works, as well */
		@media print{    
			body {display:block;}
			.voucher{
				width:100%;
			}
			.no-print, .no-print *
				{
					display: none !important;
				}

		}
    </style>
	
</head>
<body class="">
  
    
  <style>
  @import url('https://fonts.googleapis.com/css?family=Oswald');
    body *{
      font-family: 'Oswald', sans-serif;
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
  </style>
  
  
  
  
  <div class="voucher card my-2 d-none">
    <div class="card-body pt-2 pb-2 px-2 vcard-body">
      
      <div class="row">
        <div class="col-5 px-0">
          <div class="row mb-2">
            <div class="col-12 mt-1">
              <img class="" style="height:51.06px;" src="https://discoverbranson.com/wp-content/uploads/2018/11/discoverBransonLogoNew.jpg" alt="...">
            </div>
<!--             <div class="col-8">
              <div class="row m-1">
                <div class="col d-flex justify-content-center align-content-center">
                <h4 class="font-smaller fw-bold">CONFIRMATION #</h4>
                </div>
                <div class="col d-flex justify-content-end align-content-center">
                <p class="font-smaller fw-bold"></p>
                </div>
              </div>
            </div> -->
          </div>

          <div class="row mb-1">
            <div class="col-3 ps-0">
              <div class="font-smaller text-secondary text-end">PRESENT TO:</div>
            </div>
            <div class="col-9 ps-0">
              <div class="font-smaller fw-bold limit-string">OPEN - DELUXE LODGING</div>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-3 ps-0">
              <div class="font-smaller text-secondary text-end">VALID FOR:</div>
            </div>
            <div class="col-9 ps-0">
              <div class="font-smaller fw-bold limit-string">Willy Doan &amp; Michelle Doa</div>
            </div>
          </div>
          <div class="row mb-1">
            <div class="col-3 ps-0">
              <div class="font-smaller text-secondary text-end">DATE:</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller fw-bold">01-01-2023</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller text-secondary text-end">TIME:</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller fw-bold">9:00 PM</div>
            </div>
          </div>
          
          <div class="row mb-1">
            
            <div class="col-3 ps-0">
              <div class="font-smaller text-secondary text-end"># ADULTS:</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller fw-bold">2</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller text-secondary text-end"># CHILDREN:</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller fw-bold">2</div>
            </div>
          </div>      
          
          <div class="row mb-1">
            
            <div class="col-3 ps-0">
              <div class="font-smaller text-secondary text-end">FREE:</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller fw-bold">2</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller text-secondary text-end">FAMILY PASS:</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller fw-bold">4</div>
            </div>
          </div>  
          
          
          <div class="row mb-1">
            
            <div class="col-3 ps-0">
              <div class="font-smaller text-secondary text-end"># OF NIGHTS:</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller fw-bold">2</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller text-secondary text-end">ROOM TYPE:</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller fw-bold">4</div>
            </div>
          </div>


        
        </div>
        <div class="col-7 px-0">
          
          <div class="text-center">
          <div class="fw-bold limit-string img-top-text mx-auto">OPEN - DELUXE LODGING</div>
          </div>
          <div class="bg-voucher-img mx-auto" style="width:400px;height:160px;background-image:url('https://d3qvqlc701gzhm.cloudfront.net/full/5359a32b22307cc2fc19241a113c3ffcb648d9666c2f088d6fa94080e55077d8.jpg');"></div>
          <div class="text-center">
            <div class="text-secondary small limit-string img-bottom-text mx-auto">123 Main St, Branson MO 32554</div>
          </div>
          
        </div>
      
      
      </div>
      
      
			<div class="row">
				<div class="col-6 px-0">
          
          <div class="row mb-1 h-100">
            <div class="col-6 d-flex align-items-center">
              <div class="font-smaller text-secondary">AUTHORIZED SIGNATURE</div>
            </div>
            <div class="col-6">
              <div class="font-smaller fw-bold"></div>
            </div>
            <div class="col-12 pt-3 pe-0">
              <div class="font-smaller text-secondary">www.DiscoverBranson.com | info@discoverbranson.com</div>
              <div class="smaller-text text-secondary">*Present this voucher at the attraction/theater listed below. Not Redeemable for Cash Issued on</div>
            </div>
          </div>
				</div>
				<div class="col-6 px-0 confirmation-section">
          <div class="row mb-1">
            <div class="col-6 px-0 text-end">
              <div class="font-smaller text-secondary">1105 W. 76 Country Blvd</div>
              <div class="font-smaller text-secondary">Branson, MO 65616</div>
            </div>
            <div class="col-6 px-0 text-end">
              <div class="row">
                <div class="col-6 font-smaller text-secondary pe-0">Issue Date</div>
                <div class="col-6 font-smaller text-secondary px-1">03/21/22</div>
              </div>
              <div class="row">
                <div class="col-6 font-smaller text-secondary pe-0">Confirmation #</div>
                <div class="col-6 font-smaller text-dark fw-bold px-1">000000000000</div>
              </div>
            </div>
          </div>
				</div>
			</div>
    </div>
    
  </div>
  
  
  <div class="voucher card my-2 d-none">
    <div class="card-body pt-2 pb-2 px-2 vcard-body">
      
      <div class="row">
        <div class="col-5 px-0">
          <div class="row mb-2">
            <div class="col-12 mt-1">
              <img class="w-100" style="max-width:185px;" src="https://discoverbranson.com/wp-content/uploads/2018/11/voucher.jpg" alt="...">
            </div>
<!--             <div class="col-8">
              <div class="row m-1">
                <div class="col d-flex justify-content-center align-content-center">
                <h4 class="font-smaller fw-bold">CONFIRMATION #</h4>
                </div>
                <div class="col d-flex justify-content-end align-content-center">
                <p class="font-smaller fw-bold"></p>
                </div>
              </div>
            </div> -->
          </div>

          <div class="row mb-1">
            <div class="col-3 ps-0">
              <div class="font-smaller text-secondary text-end">PRESENT TO:</div>
            </div>
            <div class="col-9 ps-0">
              <div class="font-smaller fw-bold limit-string">OPEN - DELUXE LODGING</div>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-3 ps-0">
              <div class="font-smaller text-secondary text-end">VALID FOR:</div>
            </div>
            <div class="col-9 ps-0">
              <div class="font-smaller fw-bold limit-string">Willy Doan &amp; Michelle Doa</div>
            </div>
          </div>
          <div class="row mb-1">
            <div class="col-3 ps-0">
              <div class="font-smaller text-secondary text-end">DATE:</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller fw-bold">01-01-2023</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller text-secondary text-end">TIME:</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller fw-bold">9:00 PM</div>
            </div>
          </div>
          
          <div class="row mb-1">
            
            <div class="col-3 ps-0">
              <div class="font-smaller text-secondary text-end"># ADULTS:</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller fw-bold">2</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller text-secondary text-end"># CHILDREN:</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller fw-bold">2</div>
            </div>
          </div>      
          
          <div class="row mb-1">
            
            <div class="col-3 ps-0">
              <div class="font-smaller text-secondary text-end">FREE:</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller fw-bold">2</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller text-secondary text-end">FAMILY PASS:</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller fw-bold">4</div>
            </div>
          </div>  
          
          
          <div class="row mb-1">
            
            <div class="col-3 ps-0">
              <div class="font-smaller text-secondary text-end"># OF NIGHTS:</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller fw-bold">2</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller text-secondary text-end">ROOM TYPE:</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller fw-bold">4</div>
            </div>
          </div>


        
        </div>
        <div class="col-7 px-0">
          
          <div class="text-center">
          <div class="fw-bold limit-string img-top-text mx-auto">OPEN - DELUXE LODGING</div>
          </div>
          <div class="bg-voucher-img mx-auto" style="width:400px;height:160px;background-image:url('https://d3qvqlc701gzhm.cloudfront.net/full/5359a32b22307cc2fc19241a113c3ffcb648d9666c2f088d6fa94080e55077d8.jpg');"></div>
          <div class="text-center">
            <div class="text-secondary small limit-string img-bottom-text mx-auto">123 Main St, Branson MO 32554</div>
          </div>
          
        </div>
      
      
      </div>
      
      
			<div class="row">
				<div class="col-6 px-0">
          
          <div class="row mb-1 h-100">
            <div class="col-6 d-flex align-items-center">
              <div class="font-smaller text-secondary">AUTHORIZED SIGNATURE</div>
            </div>
            <div class="col-6">
              <div class="font-smaller fw-bold"></div>
            </div>
            <div class="col-12 pt-3 pe-0">
              <div class="font-smaller text-secondary">www.DiscoverBranson.com | info@discoverbranson.com</div>
              <div class="smaller-text text-secondary">*Present this voucher at the attraction/theater listed below. Not Redeemable for Cash Issued on</div>
            </div>
          </div>
				</div>
				<div class="col-6 px-0 confirmation-section">
          <div class="row mb-1">
            <div class="col-6 px-0 text-end">
              <div class="font-smaller text-secondary">1105 W. 76 Country Blvd</div>
              <div class="font-smaller text-secondary">Branson, MO 65616</div>
            </div>
            <div class="col-6 px-0 text-end">
              <div class="row">
                <div class="col-6 font-smaller text-secondary pe-0">Issue Date</div>
                <div class="col-6 font-smaller text-secondary px-1">03/21/22</div>
              </div>
              <div class="row">
                <div class="col-6 font-smaller text-secondary pe-0">Confirmation #</div>
                <div class="col-6 font-smaller text-dark fw-bold px-1">000000000000</div>
              </div>
            </div>
          </div>
				</div>
			</div>
    </div>
    
  </div>
    
  
  
  <div class="voucher card my-2 d-none">
    <div class="card-body pt-2 pb-2 px-2 vcard-body">
      
      <div class="row">
        <div class="col-5 px-0">
          <div class="row mb-2">
            <div class="col-12 mt-1">
              <img class="w-100" style="max-width:185px;" src="https://discoverbranson.com/wp-content/uploads/2018/11/voucher.jpg" alt="...">
            </div>
<!--             <div class="col-8">
              <div class="row m-1">
                <div class="col d-flex justify-content-center align-content-center">
                <h4 class="font-smaller fw-bold">CONFIRMATION #</h4>
                </div>
                <div class="col d-flex justify-content-end align-content-center">
                <p class="font-smaller fw-bold"></p>
                </div>
              </div>
            </div> -->
          </div>

          <div class="row mb-1">
            <div class="col-3 ps-0">
              <div class="font-smaller text-secondary text-end">PRESENT TO:</div>
            </div>
            <div class="col-9 ps-0">
              <div class="font-smaller fw-bold limit-string">OPEN - DELUXE LODGING</div>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-3 ps-0">
              <div class="font-smaller text-secondary text-end">VALID FOR:</div>
            </div>
            <div class="col-9 ps-0">
              <div class="font-smaller fw-bold limit-string">Willy Doan &amp; Michelle Doa</div>
            </div>
          </div>
          <div class="row mb-1">
            <div class="col-3 ps-0">
              <div class="font-smaller text-secondary text-end">DATE:</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller fw-bold">01-01-2023</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller text-secondary text-end">TIME:</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller fw-bold">9:00 PM</div>
            </div>
          </div>
          
          <div class="row mb-1">
            
            <div class="col-3 ps-0">
              <div class="font-smaller text-secondary text-end"># ADULTS:</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller fw-bold">2</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller text-secondary text-end"># CHILDREN:</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller fw-bold">2</div>
            </div>
          </div>      
          
          <div class="row mb-1">
            
            <div class="col-3 ps-0">
              <div class="font-smaller text-secondary text-end">FREE:</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller fw-bold">2</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller text-secondary text-end">FAMILY PASS:</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller fw-bold">4</div>
            </div>
          </div>  
          
          
          <div class="row mb-1">
            
            <div class="col-3 ps-0">
              <div class="font-smaller text-secondary text-end"># OF NIGHTS:</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller fw-bold">2</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller text-secondary text-end">ROOM TYPE:</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller fw-bold">4</div>
            </div>
          </div>


        
        </div>
        <div class="col-7 px-0">
          
          <div class="text-center">
          <div class="fw-bold limit-string img-top-text mx-auto">OPEN - DELUXE LODGING</div>
          </div>
          <div class="bg-voucher-img mx-auto" style="width:400px;height:160px;background-image:url('https://d3qvqlc701gzhm.cloudfront.net/full/5359a32b22307cc2fc19241a113c3ffcb648d9666c2f088d6fa94080e55077d8.jpg');"></div>
          <div class="text-center">
            <div class="text-secondary small limit-string img-bottom-text mx-auto">123 Main St, Branson MO 32554</div>
          </div>
          
        </div>
      
      
      </div>
      
      
			<div class="row">
				<div class="col-9 px-0">
          
          <div class="row mb-1 h-100">
            <div class="col-6 d-flex align-items-center">
              <div class="font-smaller text-secondary">AUTHORIZED SIGNATURE</div>
            </div>
            <div class="col-6">
              <div class="font-smaller fw-bold"></div>
            </div>
            <div class="col-12 pt-3 pe-0">
              <div class="smaller-text text-secondary">*Present this voucher at the attraction/theater listed below. Not Redeemable for Cash Issued on</div>
              <div class="smaller-text text-secondary">1105 W. 76 Country Blvd, Branson, MO 65616 | www.DiscoverBranson.com | info@discoverbranson.com</div>
            </div>
          </div>
				</div>
				<div class="col-3 px-0 confirmation-section">
          <div class="row mb-1">
            <div class="col-12 px-0 text-end">
              <div class="row">
                <div class="col-6 font-smaller text-secondary pe-0">Issue Date</div>
                <div class="col-6 font-smaller text-secondary px-1">03/21/22</div>
              </div>
              <div class="row">
                <div class="col-6 font-smaller text-secondary pe-0">Confirmation #</div>
                <div class="col-6 font-smaller text-dark fw-bold px-1">000000000000</div>
              </div>
            </div>
          </div>
				</div>
			</div>
    </div>
    
  </div>
  
 <div class="pagebreak"> </div>  
  
 
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
              <div class="font-smaller fw-bold limit-string">OPEN - DELUXE LODGING</div>
            </div>
          </div>
          <div class="row mb-1">
            <div class="col-3 px-0">
              <div class="font-smaller text-secondary text-end">ISSUED DATE:</div>
            </div>
            <div class="col-9 px-2">
              <div class="font-smaller fw-bold">03/12/22</div>
            </div>
          </div>
          <div class="row mb-1">
            <div class="col-3 px-0">
              <div class="font-smaller text-secondary text-end">VOUCHER #:</div>
            </div>
            <div class="col-9 px-2">
              <div class="font-smaller fw-bold">15935274584</div>
            </div>
          </div>
          <div class="row mb-1">
            <div class="col-3 px-0">
              <div class="font-smaller text-secondary text-end">
                CONFIRMATION #:
              </div>
            </div>
            <div class="col-9 px-2">
              <div class="font-smaller fw-bold">TLC547859647</div>
            </div>
          </div>
          
          

          <div class="row mb-1">
            <div class="col-3 px-0">
              <div class="font-smaller text-secondary text-end">GUEST NAME:</div>
            </div>
            <div class="col-9 px-2">
              <div class="font-smaller fw-bold limit-string">Willy Doan &amp; Michelle Doa</div>
            </div>
          </div>
          <div class="row mb-1">
            <div class="col-3 px-0">
              <div class="font-smaller text-secondary text-end">DATE:</div>
            </div>
            <div class="col-3 px-2">
              <div class="font-smaller fw-bold">01-01-2023</div>
            </div>
            <div class="col-3 px-0">
              <div class="font-smaller text-secondary text-end">TIME:</div>
            </div>
            <div class="col-3 px-2">
              <div class="font-smaller fw-bold">9:00 PM</div>
            </div>
          </div>
          
          <div class="row mb-1">
            
            <div class="col-3 px-0">
              <div class="font-smaller text-secondary text-end"># ADULTS:</div>
            </div>
            <div class="col-3 px-2">
              <div class="font-smaller fw-bold">2</div>
            </div>
            <div class="col-3 px-0">
              <div class="font-smaller text-secondary text-end"># CHILDREN:</div>
            </div>
            <div class="col-3 px-2">
              <div class="font-smaller fw-bold">2</div>
            </div>
          </div>      
          
          <div class="row mb-1">
            
            <div class="col-3 px-0">
              <div class="font-smaller text-secondary text-end">FREE:</div>
            </div>
            <div class="col-3 px-2">
              <div class="font-smaller fw-bold">2</div>
            </div>
            <div class="col-3 px-0">
              <div class="font-smaller text-secondary text-end">FAMILY PASS:</div>
            </div>
            <div class="col-3 px-2">
              <div class="font-smaller fw-bold">4</div>
            </div>
          </div>  
          
          
          <div class="row mb-1">
            
            <div class="col-3 px-0">
              <div class="font-smaller text-secondary text-end"># OF NIGHTS:</div>
            </div>
            <div class="col-3 px-2">
              <div class="font-smaller fw-bold">2</div>
            </div>
            <div class="col-3 px-0">
              <div class="font-smaller text-secondary text-end">ROOM TYPE:</div>
            </div>
            <div class="col-3 px-2">
              <div class="font-smaller fw-bold">4</div>
            </div>
          </div>


        
        </div>
        <div class="col-7 px-0">
          
          <div class="text-center">
          <div class="fw-bold limit-string img-top-text mx-auto">OPEN - DELUXE LODGING</div>
          </div>
          <div class="bg-voucher-img mx-auto" style="width:400px;height:160px;background-image:url('https://d3qvqlc701gzhm.cloudfront.net/full/5359a32b22307cc2fc19241a113c3ffcb648d9666c2f088d6fa94080e55077d8.jpg');"></div>
          <div class="text-center">
            <div class="text-secondary small limit-string img-bottom-text mx-auto">123 Main St, Branson MO 32554</div>
          </div>
          
        </div>
      
      
      </div>
      
      
			<div class="row">
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
    

  <div class="voucher card border-0 my-2 d-none">
    <div class="card-body pt-2 pb-2 px-2 vcard-body">
      
      <div class="row">
        <div class="col-5 px-0">
          <div class="row mb-2">
            <div class="col-12 mt-1">
              <img class="w-100" style="max-width:185px;" src="https://discoverbranson.com/wp-content/uploads/2018/11/voucher.jpg" alt="...">
            </div>
<!--             <div class="col-8">
              <div class="row m-1">
                <div class="col d-flex justify-content-center align-content-center">
                <h4 class="font-smaller fw-bold">CONFIRMATION #</h4>
                </div>
                <div class="col d-flex justify-content-end align-content-center">
                <p class="font-smaller fw-bold"></p>
                </div>
              </div>
            </div> -->
          </div>

          <div class="row mb-1">
            <div class="col-3 ps-0">
              <div class="font-smaller text-secondary text-end">PRESENT TO:</div>
            </div>
            <div class="col-9 ps-0">
              <div class="font-smaller fw-bold limit-string">OPEN - DELUXE LODGING</div>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-3 ps-0">
              <div class="font-smaller text-secondary text-end">VALID FOR:</div>
            </div>
            <div class="col-9 ps-0">
              <div class="font-smaller fw-bold limit-string">Willy Doan &amp; Michelle Doa</div>
            </div>
          </div>
          <div class="row mb-1">
            <div class="col-3 ps-0">
              <div class="font-smaller text-secondary text-end">DATE:</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller fw-bold">01-01-2023</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller text-secondary text-end">TIME:</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller fw-bold">9:00 PM</div>
            </div>
          </div>
          
          <div class="row mb-1">
            
            <div class="col-3 ps-0">
              <div class="font-smaller text-secondary text-end"># ADULTS:</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller fw-bold">2</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller text-secondary text-end"># CHILDREN:</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller fw-bold">2</div>
            </div>
          </div>      
          
          <div class="row mb-1">
            
            <div class="col-3 ps-0">
              <div class="font-smaller text-secondary text-end">FREE:</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller fw-bold">2</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller text-secondary text-end">FAMILY PASS:</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller fw-bold">4</div>
            </div>
          </div>  
          
          
          <div class="row mb-1">
            
            <div class="col-3 ps-0">
              <div class="font-smaller text-secondary text-end"># OF NIGHTS:</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller fw-bold">2</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller text-secondary text-end">ROOM TYPE:</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller fw-bold">4</div>
            </div>
          </div>


        
        </div>
        <div class="col-7 px-0">
          
          <div class="text-center">
          <div class="fw-bold limit-string img-top-text mx-auto">OPEN - DELUXE LODGING</div>
          </div>
          <div class="bg-voucher-img mx-auto" style="width:400px;height:160px;background-image:url('https://d3qvqlc701gzhm.cloudfront.net/full/5359a32b22307cc2fc19241a113c3ffcb648d9666c2f088d6fa94080e55077d8.jpg');"></div>
          <div class="text-center">
            <div class="text-secondary small limit-string img-bottom-text mx-auto">123 Main St, Branson MO 32554</div>
          </div>
          
        </div>
      
      
      </div>
      
      
			<div class="row">
				<div class="col-9 px-0">
          
          <div class="row mb-1 h-100">
            <div class="col-6 d-flex align-items-center">
              <div class="font-smaller text-secondary">AUTHORIZED SIGNATURE</div>
            </div>
            <div class="col-6">
              <div class="font-smaller fw-bold"></div>
            </div>
            <div class="col-12 pt-3 pe-0">
              <div class="smaller-text text-secondary">*Present this voucher at the attraction/theater listed below. Not Redeemable for Cash Issued on</div>
              <div class="smaller-text text-secondary">1105 W. 76 Country Blvd, Branson, MO 65616 | www.DiscoverBranson.com | info@discoverbranson.com</div>
            </div>
          </div>
				</div>
				<div class="col-3 px-0 confirmation-section">
          <div class="row mb-1">
            <div class="col-12 px-0 text-end">
              <div class="row">
                <div class="col-6 font-smaller text-secondary pe-0">Issue Date</div>
                <div class="col-6 font-smaller text-secondary px-1">03/21/22</div>
              </div>
              <div class="row">
                <div class="col-6 font-smaller text-secondary pe-0">Confirmation #</div>
                <div class="col-6 font-smaller text-dark fw-bold px-1">000000000000</div>
              </div>
            </div>
          </div>
				</div>
			</div>
    </div>
    
  </div>
      
  <div class="voucher card border-0 my-2 d-none">
    <div class="card-body pt-2 pb-2 px-2 vcard-body bg-light">
      
      <div class="row">
        <div class="col-5 px-0">
          <div class="row mb-2">
            <div class="col-12 mt-1">
              <img class="w-100" style="max-width:185px;" src="https://discoverbranson.com/wp-content/uploads/2018/11/voucher.jpg" alt="...">
            </div>

          </div>

          <div class="mdc-card">
            <div class="row mb-1">
              <div class="col-3 ps-0">
                <div class="font-smaller text-secondary text-end">PRESENT TO:</div>
              </div>
              <div class="col-9 ps-0">
                <div class="font-smaller fw-bold limit-string">OPEN - DELUXE LODGING</div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-3 ps-0">
                <div class="font-smaller text-secondary text-end">VALID FOR:</div>
              </div>
              <div class="col-9 ps-0">
                <div class="font-smaller fw-bold limit-string">Willy Doan &amp; Michelle Doa</div>
              </div>
            </div>
            <div class="row mb-1">
              <div class="col-3 ps-0">
                <div class="font-smaller text-secondary text-end">DATE:</div>
              </div>
              <div class="col-3 ps-0">
                <div class="font-smaller fw-bold">01-01-2023</div>
              </div>
              <div class="col-3 ps-0">
                <div class="font-smaller text-secondary text-end">TIME:</div>
              </div>
              <div class="col-3 ps-0">
                <div class="font-smaller fw-bold">9:00 PM</div>
              </div>
            </div>

            <div class="row mb-1">

              <div class="col-3 ps-0">
                <div class="font-smaller text-secondary text-end"># ADULTS:</div>
              </div>
              <div class="col-3 ps-0">
                <div class="font-smaller fw-bold">2</div>
              </div>
              <div class="col-3 ps-0">
                <div class="font-smaller text-secondary text-end"># CHILDREN:</div>
              </div>
              <div class="col-3 ps-0">
                <div class="font-smaller fw-bold">2</div>
              </div>
            </div>      

            <div class="row mb-1">

              <div class="col-3 ps-0">
                <div class="font-smaller text-secondary text-end">FREE:</div>
              </div>
              <div class="col-3 ps-0">
                <div class="font-smaller fw-bold">2</div>
              </div>
              <div class="col-3 ps-0">
                <div class="font-smaller text-secondary text-end">FAMILY PASS:</div>
              </div>
              <div class="col-3 ps-0">
                <div class="font-smaller fw-bold">4</div>
              </div>
            </div>  


            <div class="row mb-1">

              <div class="col-3 ps-0">
                <div class="font-smaller text-secondary text-end"># OF NIGHTS:</div>
              </div>
              <div class="col-3 ps-0">
                <div class="font-smaller fw-bold">2</div>
              </div>
              <div class="col-3 ps-0">
                <div class="font-smaller text-secondary text-end">ROOM TYPE:</div>
              </div>
              <div class="col-3 ps-0">
                <div class="font-smaller fw-bold">4</div>
              </div>
            </div>

          </div>
        
        </div>
        <div class="col-7 px-0">
          
          <div class="text-center">
          <div class="fw-bold limit-string img-top-text mx-auto">OPEN - DELUXE LODGING</div>
          </div>
          <div class="bg-voucher-img mx-auto" style="width:400px;height:160px;background-image:url('https://d3qvqlc701gzhm.cloudfront.net/full/5359a32b22307cc2fc19241a113c3ffcb648d9666c2f088d6fa94080e55077d8.jpg');"></div>
          <div class="text-center">
            <div class="text-secondary small limit-string img-bottom-text mx-auto">123 Main St, Branson MO 32554</div>
          </div>
          
        </div>
      
      
      </div>
      
      
			<div class="row">
				<div class="col-9 px-0">
          
          <div class="row mb-1 h-100">
            <div class="col-6 d-flex align-items-center">
              <div class="font-smaller text-secondary">AUTHORIZED SIGNATURE</div>
            </div>
            <div class="col-6">
              <div class="font-smaller fw-bold"></div>
            </div>
            <div class="col-12 pt-3 pe-0">
              <div class="smaller-text text-secondary">*Present this voucher at the attraction/theater listed below. Not Redeemable for Cash Issued on</div>
              <div class="smaller-text text-secondary">1105 W. 76 Country Blvd, Branson, MO 65616 | www.DiscoverBranson.com | info@discoverbranson.com</div>
            </div>
          </div>
				</div>
				<div class="col-3 px-0 confirmation-section">
          <div class="row mb-1">
            <div class="col-12 px-0 text-end">
              <div class="row">
                <div class="col-6 font-smaller text-secondary pe-0">Issue Date</div>
                <div class="col-6 font-smaller text-secondary px-1">03/21/22</div>
              </div>
              <div class="row">
                <div class="col-6 font-smaller text-secondary pe-0">Confirmation #</div>
                <div class="col-6 font-smaller text-dark fw-bold px-1">000000000000</div>
              </div>
            </div>
          </div>
				</div>
			</div>
    </div>
    
  </div>
    
  <div class="pagebreak"> </div>
    
  <div class="voucher card mdc-card my-2 d-none">
    <div class="card-body pt-2 pb-2 px-2 vcard-body">
      
      <div class="row">
        <div class="col-5 px-0">
          <div class="row mb-2">
            <div class="col-12 mt-1">
              <img class="w-100" style="max-width:185px;" src="https://discoverbranson.com/wp-content/uploads/2018/11/voucher.jpg" alt="...">
            </div>
<!--             <div class="col-8">
              <div class="row m-1">
                <div class="col d-flex justify-content-center align-content-center">
                <h4 class="font-smaller fw-bold">CONFIRMATION #</h4>
                </div>
                <div class="col d-flex justify-content-end align-content-center">
                <p class="font-smaller fw-bold"></p>
                </div>
              </div>
            </div> -->
          </div>

          <div class="row mb-1">
            <div class="col-3 ps-0">
              <div class="font-smaller text-secondary text-end">PRESENT TO:</div>
            </div>
            <div class="col-9 ps-0">
              <div class="font-smaller fw-bold limit-string">OPEN - DELUXE LODGING</div>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-3 ps-0">
              <div class="font-smaller text-secondary text-end">VALID FOR:</div>
            </div>
            <div class="col-9 ps-0">
              <div class="font-smaller fw-bold limit-string">Willy Doan &amp; Michelle Doa</div>
            </div>
          </div>
          <div class="row mb-1">
            <div class="col-3 ps-0">
              <div class="font-smaller text-secondary text-end">DATE:</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller fw-bold">01-01-2023</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller text-secondary text-end">TIME:</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller fw-bold">9:00 PM</div>
            </div>
          </div>
          
          <div class="row mb-1">
            
            <div class="col-3 ps-0">
              <div class="font-smaller text-secondary text-end"># ADULTS:</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller fw-bold">2</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller text-secondary text-end"># CHILDREN:</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller fw-bold">2</div>
            </div>
          </div>      
          
          <div class="row mb-1">
            
            <div class="col-3 ps-0">
              <div class="font-smaller text-secondary text-end">FREE:</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller fw-bold">2</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller text-secondary text-end">FAMILY PASS:</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller fw-bold">4</div>
            </div>
          </div>  
          
          
          <div class="row mb-1">
            
            <div class="col-3 ps-0">
              <div class="font-smaller text-secondary text-end"># OF NIGHTS:</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller fw-bold">2</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller text-secondary text-end">ROOM TYPE:</div>
            </div>
            <div class="col-3 ps-0">
              <div class="font-smaller fw-bold">4</div>
            </div>
          </div>


        
        </div>
        <div class="col-7 px-0">
          
          <div class="text-center">
          <div class="fw-bold limit-string img-top-text mx-auto">OPEN - DELUXE LODGING</div>
          </div>
          <div class="bg-voucher-img mx-auto" style="width:400px;height:160px;background-image:url('https://d3qvqlc701gzhm.cloudfront.net/full/5359a32b22307cc2fc19241a113c3ffcb648d9666c2f088d6fa94080e55077d8.jpg');"></div>
          <div class="text-center">
            <div class="text-secondary small limit-string img-bottom-text mx-auto">123 Main St, Branson MO 32554</div>
          </div>
          
        </div>
      
      
      </div>
      
      
			<div class="row">
				<div class="col-9 px-0">
          
          <div class="row mb-1 h-100">
            <div class="col-6 d-flex align-items-center">
              <div class="font-smaller text-secondary">AUTHORIZED SIGNATURE</div>
            </div>
            <div class="col-6">
              <div class="font-smaller fw-bold"></div>
            </div>
            <div class="col-12 pt-3 pe-0">
              <div class="smaller-text text-secondary">*Present this voucher at the attraction/theater listed below. Not Redeemable for Cash Issued on</div>
              <div class="smaller-text text-secondary">1105 W. 76 Country Blvd, Branson, MO 65616 | www.DiscoverBranson.com | info@discoverbranson.com</div>
            </div>
          </div>
				</div>
				<div class="col-3 px-0 confirmation-section">
          <div class="row mb-1">
            <div class="col-12 px-0 text-end">
              <div class="row">
                <div class="col-6 font-smaller text-secondary pe-0">Issue Date</div>
                <div class="col-6 font-smaller text-secondary px-1">03/21/22</div>
              </div>
              <div class="row">
                <div class="col-6 font-smaller text-secondary pe-0">Confirmation #</div>
                <div class="col-6 font-smaller text-dark fw-bold px-1">000000000000</div>
              </div>
            </div>
          </div>
				</div>
			</div>
    </div>
    
  </div>
    
  
  
		<div class="content" id="spinner">
			<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
		</div>
    	<script>
		var xhttp = new XMLHttpRequest();
		xhttp.open("GET", "/test-csr-api.php?record_id=<?php echo $record_id ?>", true);
		xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
		xhttp.onreadystatechange = function() {
		   if (this.readyState == 4 && this.status == 200) {

			  // Response
			  var response = this.responseText; 
				var el = document.getElementById('spinner');
				el.remove();
			   document.body.innerHTML = document.body.innerHTML + response;
			  
			
		   }
		};
		xhttp.send();
		
	</script>
</body>
</html>