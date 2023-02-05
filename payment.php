<?php


require_once('./includes/Connection.php');
session_start();
if(isset($_SESSION['Username']))
{
	$query="select * from users where username='".$_SESSION['Username']."'";
	$result=mysqli_query($con,$query);
	if($query && $var = mysqli_fetch_array($result)) {

        $urungetir ="select * from products where owner_id='".$var['id']."'";
        $urunfetch =mysqli_query($con,$urungetir);
        $dk = mysqli_fetch_array($urunfetch);
     
        if($dk) {
            $suankibakiye = $var['balance'];
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = $_POST['miktar'];
                if (empty($name)) {
                  echo "HATA";
                } else {
                   $tip = $_POST['tip'];
                   if(empty($tip)) {
                    echo "HATA";
                   } else {
                    if($tip == "+") {
                        $GG= "UPDATE users SET balance = balance + " . $_POST['miktar'] ." where username='".$_SESSION['Username']."'";
                        $ga=mysqli_query($con,$GG);
                        echo "OK";
                    } else {
                        if($suankibakiye < $name) {
                            echo "BAKIYE";
                        } else {
                                if(isset($_POST['package'])) {
                                    date_default_timezone_set('Europe/Istanbul');
                                    $nowDate = date($dk['timeout']);
                                    $newDate = strtotime('30 day',strtotime($nowDate));
                                    $newDate = date('Y-m-d' ,$newDate );
                                  

                                    $GAQW= "UPDATE products SET timeout = '" . $newDate ."' where owner_id='".$var['id']."'";
                                    $QWDDQWD=mysqli_query($con,$GAQW);

                                    $url = "" . $dk['api_url'] . "/package";
                                    $curl = curl_init($url);
                                    curl_setopt($curl, CURLOPT_URL, $url);
                                    curl_setopt($curl, CURLOPT_POST, true);
                                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                                    $headers = array(
                                    "Authorization: " . $dk['api_token'] . "",
                                    "Content-Type: application/json",
                                    );
                                    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
                                    
                                    $data = array(  
                                        "type" => "PAYMENT",
                                        "id" => rand(5, 600000),
                                        "Type" => $dk['package'],
                                        "payment" => "CÜZDAN",
                                        "price" => $name,
                                    );
                                   
                                    setcookie("end_time", $newDate, time() + (60*60*1));
                                    
                                    $postdata = json_encode($data);
                                    curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
                                    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
                                    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                                    $resp = curl_exec($curl);
                                    curl_close($curl);
                                } 
                                $GG= "UPDATE users SET balance = balance - " . $_POST['miktar'] ." where username='".$_SESSION['Username']."'";
                                $ga=mysqli_query($con,$GG);
                                echo "OK";
                        }
                    }
                   }
                }
              } else {
                echo 'HATA';
              }
           
      
        } else {
            header("location:login.php?invalid=Giriş yapılan hesap herhangi bir sunucuya bağlı değil.");
        }
             
    
      
       
	}
    
}
else 
{
	header("location:login.php");
}
?>
