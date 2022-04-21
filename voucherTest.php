<?php /* Template Name: vouchersTestTemplate */ 
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
<body>
		<div class="content" id="spinner">
			<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
		</div>
    	<script>
		var xhttp = new XMLHttpRequest();
		xhttp.open("GET", "/discbr/voucherapiTest.php?record_id=<?php echo $record_id ?>", true);
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