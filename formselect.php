

<?php
 
	include 'condb.php';
 
?>






<!DOCTYPE html>
<html>
<head>
	<title>Select Form</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

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
	<link rel="stylesheet" type="text/css" href="cssj.css">
</head>
<body>


	
<div class="container-contact100">
		<div class="tablebg1">
			<form class="contact100-form validate-form" action="indb.php" id="formUser" method="post" enctype="multipart/form-data">
				<span class="contact100-form-title">
					ข้อมูลผู้ใช้งาน
				</span>
				
				<div class="wrap-input100 validate-input" data-validate="Name is required">

							<table class="table table-condensed table-hover">
						  
						    <thead >
						    <tr>
						        <th>ID</th>
						        <th>User Name</th>
						        <th>PassWord</th>
						        <th>E-mail</th>
						        <th>Address</th>
						        <th>Files PDF</th>
						         <th>Edit</th>
						          <th>Delete</th>


						    </tr>
						    </thead>
						  
					<?php 


						$sql = "SELECT *FROM users";
	
						$stm = $con->prepare($sql);

						try{
							$stm->execute();
	
						}catch(Exception $exc){
						echo $exc->getTraceAsString();
						}
						
						while($row = $stm->fetch(PDO::FETCH_ASSOC)){?>

							<tr align="center">
								<td><?php echo $row['id']; ?></td>
								<td><?php echo $row['faname']; ?></td>
								<td><?php echo $row['pass']; ?></td>
								<td><?php echo $row['email']; ?></td>
								<td><?php echo $row['addss']; ?></td>
								<td><?php echo $row['pro_pdf']; ?></td>
								

								<td> <a href=formedit.php?id=<?php echo $row["id"]?>><img src='images/icons/writing.png'></a></td>

						

								<td><a href=delete.php?id=<?php echo $row["id"]?>><img src='images/icons/delete.png'></a></td>
							</tr>
						

						<?php  }?>
					
						    
						</table>


				</div>
	
						<p align = "right"><a href="formInsert.php" >เพิ่มข้อมูลผู้ใช้งาน</a></p>
			</form>
		</div>
	</div>






</body>
</html>