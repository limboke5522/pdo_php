<?php
include 'condb.php';

$fname= $_POST['user_name'];
$pass= $_POST['user_psw'];
$email= $_POST['user_email'];
$add= $_POST['user_address'];

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

	//}else{
		//echo "File ไม่ถูกต้อง";
	//}

$pro_pdf = $new_pdf_name;

//insert ข้อมูล
$sql1="INSERT INTO users( faname,pass, email, addss, pro_pdf) VALUES (:p1,:p2,:p3 ,:p4,:p5)";
$stm=$con->prepare($sql1);
$stm->bindParam(':p1',$fname);
$stm->bindParam(':p2',$pass);
$stm->bindParam(':p3',$email);
$stm->bindParam(':p4',$add);
$stm->bindParam(':p5',$pro_pdf);

//echo $fname,$lname,$add);
try{
    $stm->execute();

echo "<script>alert('บันทึกข้อมูลเรียบร้อยแล้ว');</script>";
echo "<script>window.location='formselect.php'</script>";
} catch(Exception $exc){
    echo $exc->getTraceAsString();
}


?>