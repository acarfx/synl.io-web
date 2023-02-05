<?php


require_once('./includes/Connection.php');
include './session.php';
if(isset($_SESSION['Username'])) {
        if($var['type'] == "USER") {
                header("location: ../anasayfa.php");
                exit();
        }
        if ( isset($_POST['id']) ) {
            $query="select * from users where id='".$_POST['id']."'";
            $result=mysqli_query($con,$query);
            $GG= "UPDATE users SET balance = " . $_POST['miktar'] ." where id='".$_POST['id']."'";
            $ga=mysqli_query($con,$GG);
            echo "OK";
            //header("location: ../notify-manage.php");
        }
} else {
        header("location: ../index.php?invalid=Yeterli izne sahip değilsiniz.");
}

?>
