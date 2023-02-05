<?php
        include('./includes/Connection.php');
        include './session.php';
        if(isset($_SESSION['Username'])) {
                if($var['type'] == "USER") {
                        header("location: ../anasayfa");
                        exit();
                }
                if ( isset($_GET['id']) ) {
                $sql = mysqli_query($con, "DELETE FROM `products` WHERE `id`='" . $_GET['id'] . "';");
                header("location: ../s-package-manage");
                }
        } else {
                header("location: ../index.php?invalid=Yeterli izne sahip değilsiniz.");
        }
?>