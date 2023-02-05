<?php


require_once('./includes/Connection.php');
include './session.php';
if(isset($_SESSION['Username'])) {
        if($var['type'] == "USER") {
                header("location: ../anasayfa.php");
                exit();
        }
        if ( isset($_GET['id']) ) {
            $query="select * from users where id='".$_GET['id']."'";
            $result=mysqli_query($con,$query);
            $rows = array();
            while($r = mysqli_fetch_assoc($result)) {
                $rows[] = $r;
            }
            print json_encode($rows);
        } else {
                echo 'error';
        }
} else {
        header("location: ../index.php?invalid=Yeterli izne sahip değilsiniz.");
}

?>
