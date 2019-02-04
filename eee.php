<?php
include 'condb.php';

$fname= $_POST['user_name'];
$pass= $_POST['user_psw'];
$email= $_POST['user_lname'];
$add= $_POST['user_address'];



if(!empty($_FILES['pro_pdf']['name'])){ //ตรวจสอบว่ามีการ browse ไฟล์ หรือไม่
	$time_name=str_shuffle(date("YmdHis")); //ใช้วันเวลาในการตั้งชื่อไฟล์ใหม่
	$file_name=$time_name."_".$_FILES['pro_pdf']['name']; //ตั้งชื่อไฟล์ใหม่
	$temp_name=$_FILES['pro_pdf']['tmp_name']; //ตำแหน่งของ temp file
	copy($temp_name,"./pdf/$file_name"); //copy file ไปไว้ใน folder images
	$uppic=",pro_pdf='$file_name' "; //แก้ไข product_pic
	}
	else{ //ถ้าไม่มีการ browse ไฟล์รูป
		$file_name="";
		$uppic="";
	}


$id= $_POST['Id'];


$sql = "update users set faname=:p1,pass=:p2,email=:p3, addss=:p4, pro_pdf=:p5 where id =:p6";


$stm=$con->prepare($sql);
$stm->bindParam(':p1',$fname);
$stm->bindParam(':p2',$pass);
$stm->bindParam(':p3',$email);
$stm->bindParam(':p4',$add);
$stm->bindParam(':p5',$uppic);
$stm->bindParam(':p6',$id);





 try{
 	$stm->execute();
 	echo "<script>alert('แก้ไขข้อมูลเรียบร้อยแล้ว');</script>";
 echo "<script>window.location='formselect.php'</script>";
 }catch(Exception $exc){
 	echo $exc->getTraceAsString();

 }

?>