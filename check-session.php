<?php 
require_once('./includes/Connection.php');
include('./notify.php');
session_start();

       if(empty($_POST['username']) || empty($_POST['password']))
       {
            header("location:index.php?invalid=Lütfen kullanıcı kimliğini veya parolayı boş bırakmayın.");
       }
       else
       {
            $query="select * from users where username='".$_POST['username']."' and password='".$_POST['password']."'";
            $result=mysqli_query($con,$query);

            if(mysqli_fetch_assoc($result))
            {
                $ipgetir = $_SERVER['REMOTE_ADDR'];                                        
                $anlikgiris = date("Y-m-d H:i:s");
                $updatelastlogin = "UPDATE users SET last_login='". $anlikgiris ."' WHERE username='" . $_POST['username'] . "';";
                mysqli_query($con,$updatelastlogin); 
                $updateip = "UPDATE users SET ip='". $ipgetir ."' WHERE username='" . $_POST['username'] . "';";
                mysqli_query($con,$updateip); 
                $_SESSION['Username'] = $_POST['username'];
                $postID = rand(0, 237727);
                notify("comment", $_POST['username'], $postID, "Sistemsel", "Hesabınıza " . $ipgetir . " numaralı ip adresi ile bir giriş gerçekleşti.", "warning" );  
                setcookie("first_login", "1");
                $_SESSION['login_time'] = time();
                header("location:anasayfa");
            }
            else
            {
                header("location:index.php?invalid=Geçersiz kullanıcı kimliği veya parola.");
                die();
            }
       }
    


?>