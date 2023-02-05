<?php


require_once('./includes/Connection.php');
include './session.php';
if(isset($_SESSION['Username'])) {
        if($var['type'] == "USER") {
                header("location: ../anasayfa.php");
                exit();
        }
        
        
        
        
           $id=$_POST['id'];
           $fname=$_POST['name'];
           $lname=$_POST['surname'];
           $email=$_POST['email'];
           
           $phone=$_POST['phone'];
           $select= "select * from users where id='$id'";
           $sql = mysqli_query($con,$select);
           $row = mysqli_fetch_assoc($sql);
           $res= $row['id'];
           if($res === $id)
           {
                if(isset($_POST['password'])) {
                        $password = $_POST['password'];
                        $update = "update users set name='$fname',phone='$phone',surname='$lname',password='$password',email='$email' where id='$id'";
                } else {
                        $update = "update users set name='$fname',phone='$phone',surname='$lname',email='$email' where id='$id'";
                }

              $sql2=mysqli_query($con,$update);
       if($sql2)
              { 
                  echo 'OK';
              }
              else
              {
                echo 'NOT';
              }
           }
           else
           {
                echo 'NOT-USER';
           }
        
    

} else {
        header("location: ../index.php?invalid=Yeterli izne sahip değilsiniz.");
}

?>
