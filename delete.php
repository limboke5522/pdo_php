<?php
include 'condb.php';

$strid=null ;
if(isset($_GET["id"]))
{
  $strid = $_GET["id"];
}


$id= $strid;

$sql="delete from users where id =:p6";
$stm=$con->prepare($sql);
$stm->bindParam(":p6",$id);

try{
$stm->execute();
echo "<script>alert('ลบข้อมูลเรียบร้อยแล้ว');</script>";
echo "<script>window.location='formselect.php'</script>";
}catch(Exception $exc){
	echo $exc->getTraceAsString();
}