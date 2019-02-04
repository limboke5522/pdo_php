<?php
include 'condb.php';

$fname= $_POST['user_name'];
$pass= $_POST['user_psw'];
$email= $_POST['user_lname'];
$add= $_POST['user_address'];
$fp=$_POST['file_pdf'];




		

if(!empty($_FILES['pro_pdf']['name'])){
$ext = pathinfo(basename($_FILES['pro_pdf']['name']), PATHINFO_EXTENSION);
$new_pdf_name = 'pdf_'.uniqid().".".$ext;
$pdf_path = "pdf/";
$upload_path = $pdf_path.$new_pdf_name;


//uploading

	//if($ext==".pdf"){

		$success = move_uploaded_file($_FILES['pro_pdf']['tmp_name'], $upload_path);
		if ($success==FALSE) {
				echo "<script>alert('Files ไม่ถูกต้อง');</script>";
		echo "<script>window.location='formInsert.php'</script>";
		exit();
		}

$pro_pdf = $new_pdf_name;
}
else{ //ถ้าไม่มีการ browse ไฟล์รูป
		$pro_pdf = $fp;
		
	}


$id= $_POST['Id'];


$sql = "update users set faname=:p1,pass=:p2,email=:p3, addss=:p4, pro_pdf=:p5 where id =:p6";


$stm=$con->prepare($sql);
$stm->bindParam(':p1',$fname);
$stm->bindParam(':p2',$pass);
$stm->bindParam(':p3',$email);
$stm->bindParam(':p4',$add);
$stm->bindParam(':p5',$pro_pdf);
$stm->bindParam(':p6',$id);





 try{
 	$stm->execute();
 	echo "<script>alert('แก้ไขข้อมูลเรียบร้อยแล้ว');</script>";
 echo "<script>window.location='formselect.php'</script>";
 }catch(Exception $exc){
 	echo $exc->getTraceAsString();

 }

?>