<?php 
   include('./includes/Connection.php');   
   session_start();
      
    $username = $_SESSION['Username'];
      
    $sql = "DELETE FROM `notification` WHERE `forUser`='" . $username . "';";  
      
    $result = $con->query( $sql );  
    
?>