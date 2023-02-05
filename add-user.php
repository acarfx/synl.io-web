<?php


require_once('./includes/Connection.php');
include './session.php';
if(isset($_SESSION['Username'])) {
        if($var['type'] == "USER") {
                header("location: ../anasayfa.php");
                exit();
        }

        $username=$_POST['username'];
        $password=$_POST['password'];
        $name=$_POST['name'];
        $surname=$_POST['surname'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];
        $sql_e = "SELECT * FROM users WHERE username='" . $_POST['username'] . "'";
        $res_u = mysqli_query($con, $sql_e);
    
        if (mysqli_num_rows($res_u) > 0)
        {
                echo 'YES-USER';
        }
        else
        {
                $log =  "INSERT INTO users (username ,password ,name, surname, phone, email) VALUES('$username', '$password', '$name', '$surname', '$phone', '$email');";
                $quar = mysqli_query($con, $log);
                if($quar) {
                        echo 'OK';
                } else {
                        echo 'ERROR';
                }
        }
    

} else {
        header("location: ../index.php?invalid=Yeterli izne sahip değilsiniz.");
}

?>
