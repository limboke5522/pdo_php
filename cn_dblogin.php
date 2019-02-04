<?php
$dbc='mysql:host=localhost;dbname=db_login';//ชือฐานข้อมูล
//$CHAR_SET = "charset=utf8";

$username='root';   //  =ชื่อผู้ใช้
$pass='';


try{
$con = new PDO($dbc,$username,$pass, array(PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES 'utf8' COLLATE 'utf8_unicode_ci' "  ));
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo 'เชื่อมต่อแล้ว';
}
catch(Exception $ex){
    echo 'ไม่ได้'.$ex->getMessage();
}
?>