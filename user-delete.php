<?php
        include('./includes/Connection.php');
        include './session.php';
        if(isset($_SESSION['Username'])) {
                if($var['type'] == "USER") {
                        header("location: ../anasayfa.php");
                        exit();
                }
                if ( isset($_GET['id']) ) {
                        if($_GET['id'] == $var['id']) {
                                header("location: ../s-users-manage.php");
                               
                        } else {
                                $sql = mysqli_query($con, "DELETE FROM `users` WHERE `id`='" . $_GET['id'] . "';");
                                header("location: ../s-users-manage.php");
                        }
                } 
        } else {
                header("location: ../index.php?invalid=Yeterli izne sahip değilsiniz.");
        }
?>