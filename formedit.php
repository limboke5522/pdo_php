<?php
	include 'condb.php';


    $strid=null ;
if(isset($_GET["id"]))
{
  $strid = $_GET["id"];
}


$sql = "SELECT * FROM users WHERE id = ? ";
$params = array ($strid) ;

$stm= $con -> prepare($sql);
$stm->execute($params);

$result = $stm->fetch() ;


				/*$sql = "SELECT *FROM users WHERE id = ? ";
	
					
						$stm = $con->prepare($sql);

						try{
							$stm->execute();
	
						}catch(Exception $exc){
						echo $exc->getTraceAsString();
						}
						
						while($row = $stm->fetch(PDO::FETCH_ASSOC)){?>

     				*/?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Edit</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>


	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" action="edit.php" id="formUser" method="post" enctype="multipart/form-data">
				<span class="contact100-form-title">
					Edit Data
				</span>

				<div class="wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">User ID</span><br>
					<input type="text" name="user_id" value="<?=$result['id']; ?>" readonly><br>
  						<input type="hidden" id="Id" name="Id" value="<?=$result['id']; ?>">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">User Name</span>
					<input class="input100" type="text" name="user_name" value="<?=$result['faname']; ?>" >

					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">Pass Word</span>
					<input class="input100" type="text" name="user_psw" value="<?=$result['pass']; ?>" >
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<span class="label-input100">E-Mail*</span>
					<input class="input100" type="email" name="user_lname" value="<?=$result['email']; ?>" multiple >
					<span class="focus-input100"></span>
				</div>

				<!--<div class="wrap-input100 input100-select">
					<span class="label-input100">Needed Services</span>
					<div>
						<select class="selection-2" name="service">
							<option>Choose Services</option>
							<option>Online Store</option>
							<option>eCommerce Bussiness</option>
							<option>UI/UX Design</option>
							<option>Online Services</option>
						</select>
					</div>
					<span class="focus-input100"></span>
				</div>

				กำหนด ชนิดไฟล์accept="application/pdf"
-->
				
				<div class="wrap-input100 validate-input" data-validate = "Message is required">
					<span class="label-input100">Address</span>
					<textarea class="input100" name="user_address" ><?=$result['addss']; ?></textarea>
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 input100-select">
					<span class="label-input100">Fiel *PDF</span>
					<div>
						<input type="file" name="pro_pdf" value="<?=$result['pro_pdf']; ?>" />
						<input type="hidden" id="Id" name="file_pdf" value="<?=$result['pro_pdf']; ?>">
					</div>
					<span class="focus-input100"></span>
				</div>


				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button class="contact100-form-btn">
							<span>
								Submit
								<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
							</span>
						</button>
					</div>

				</div>
			</form>
			<br><br>
			<p align = "right"><a href="formselect.php" >กลับไปหน้าเดิม</a></p>
		</div>
	</div>



	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

</body>
</html>
