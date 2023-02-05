<?php


require_once('./includes/Connection.php');
include './session.php';
if(isset($_SESSION['Username'])) {
        if($var['type'] == "USER") {
                header("location: ../anasayfa.php");
                exit();
        }

        $package=$_POST['code'];
        $timeout=$_POST['timeout'];
        $apiurl=$_POST['apiurl'];
        $apitoken=$_POST['apitoken'];
        $owner=$_POST['owner'];
         
        $sql_e = "SELECT * FROM products WHERE owner_id='" . $_POST['owner'] . "'";
        $res_u = mysqli_query($con, $sql_e);
    
        if (mysqli_num_rows($res_u) > 0)
        {
                echo 'YES-USER';
        }
        else
        {
                $log =  "INSERT INTO products (package ,owner_id ,api_url, api_token, timeout) VALUES('$package', '$owner', '$apiurl', '$apitoken', '$timeout');";
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
