<?php 
   include('./includes/Connection.php');   
   session_start();
    if(isset($_SESSION['Username'])) {
        $username = $_SESSION['Username'];
          
        $sql = "SELECT * FROM `notification` WHERE `forUser`='" . $username . "' ORDER BY `time` DESC;";  
          
        $result = $con->query( $sql );  
          
        $notifications = array();
          
        if( $result->num_rows > 0 ){   
                while( $row = $result->fetch_assoc() ){  
                    $notifications[] = array( "id" => $row[ "notificationID" ],
                    "type" => $row[ "type" ],
                    "entityID" => $row[ "entityID" ],
                    "author" => $row[ "author" ],
                    "warning" => $row["warning"],
                    "text" =>  $row[ "text" ],
                    "time" => $row[ "time" ],
                    );  
                }
        } 
        echo( json_encode( $notifications ) ); 
    }
?>