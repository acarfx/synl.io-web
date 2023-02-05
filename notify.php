<?php 


function notify( $type, $forUser, $entityID, $author, $text, $warning ){   
    include('./includes/Connection.php');       
    $sql = "SELECT `notificationID` FROM `notification` WHERE `forUser`='" . $forUser . "' AND `entityID`=" . $entityID . " AND `type`='" . $type . "';";   
    $result = $con->query( $sql );   
        
    if( $result->num_rows > 0 ){   
    $sql = "UPDATE `notification` SET `read`=0, `time`=NOW() WHERE `forUser`='" . $forUser . "' AND `entityID`=" . $entityID . " AND `type`='" . $type . "';";   
    $con->query( $sql );   
    }   
    else{  
    $sql = "INSERT INTO `notification`( `type`, `forUser`, `entityID`, `author`, `text`, `warning` ) VALUES( '" . $type . "','" . $forUser . "','" . $entityID . "','" . $author. "', '" . $text ."','" . $warning . "' );";   
    $con->query( $sql ); 
   
    }  
    $con->close();  
    } 

?>