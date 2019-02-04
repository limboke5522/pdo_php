

<?php
session_start();
include("cn_dblogin.php");
$username = $_POST['username'];
$password = md5($_POST['password']);


    $sql="SELECT *FROM login WHERE username = :username AND password = :password";
    $stm=$con->prepare($sql);
    $stm->execute(array(':username'=>$username, ':password'=>$password));
    $row_count = $stm->rowCount();

    if($row_count <= 0){
    	echo "<script>alert('Username หรือ Password ไม่ถูกต้อง');</script>";
    	echo "<script>window.location='Login/index.html'</script>";
        // header('location: Login/index.html');


    }else{
        while($user = $stm->fetch(PDO::FETCH_ASSOC)){

            if($user['level'] == 1)
            {
                $_SESSION['id'] = session_id();
                $_SESSION['username'] = $user['username'];
                $_SESSION['level'] = 1;
				$_SESSION['email'] = $user['email'];
                header('location: formselect.php');

            } else if($user['level'] == 2) {
                $_SESSION['id'] = session_id();
                $_SESSION['username'] = $user['username'];
                $_SESSION['level'] = 2;
                $_SESSION['email'] = $user['email'];

                header('location: formselect.php');
            }


        }
    }


	



//  session_start();
// include 'cn_dblogin.php';

 
  
//     $username = $_POST['username'];
//     $password = md5 ($_POST['password']);
//     $query = "SELECT * FROM login WHERE :login IN (username , email)  AND password = :password ";
//     $lek =$con ->prepare($query);
//     $lek->execute(
//       array(':login' => $username ,
//       'password' => $password
//     )
//   );
//   $result =$lek->fetch();
//   $count = $lek ->rowCount();
//   if ($count > 0) {
//     $_SESSION["username"] = $username;
//     $_SESSION["password"] = $password;
//     $_SESSION["level"] = $result['level'];
//     $_SESSION["email"] = $result['email'];
//     if ($_SESSION["level"] == "1" || ($_SESSION["level"] == "2"))
//     {
//       header("location: formselect.php");
// }  else {
//     echo "<script>alert('Username หรือ Password ไม่ถูกต้อง');</script>";
//     	echo "<script>window.location='Login/index.html'</script>";
// }
//   }


?>