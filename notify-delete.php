<?php
        include('./includes/Connection.php');
        include './session.php';
        if(isset($_SESSION['Username'])) {
                if($var['type'] == "USER") {
                        header("location: ../anasayfa");
                        exit();
                }
                if ( isset($_GET['id']) ) {
                $sql = mysqli_query($con, "DELETE FROM `notification` WHERE `notificationID`='" . $_GET['id'] . "';");
                header("location: ../notify-manage");
                }
        } else {
                header("location: ../index.php?invalid=Yeterli izne sahip değilsiniz.");
        }
?>