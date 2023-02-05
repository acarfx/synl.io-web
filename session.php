<?php

function kontrol($kayit,$bitis){
        $ilk = strtotime($kayit);
        $son = strtotime($bitis);
        if ($ilk-$son > 0)
        { return 1; } 
        else 
        { return 0; }    
}

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
        $bugun_tarih = date('Y-m-d');
        if($dk) {
            if(time() - $_SESSION['login_time'] >= (60 * 60 * 1)){
               
                session_destroy();
                setcookie("api_url", "re-login", time());
                setcookie("token", "re-login", time());
                setcookie("end_time", "re-login", time());
                header("Location: login");
                die();
            }
            else {        
               $_SESSION['login_time'] = time();
            }
            $bitis_tarihi = $dk['timeout']; 
            if(kontrol($bugun_tarih,$bitis_tarihi)) {
                if(!isset($_COOKIE["token"])) {
                    setcookie("token", $dk['api_token'], time() + (60*60*1));
                }
                if(!isset($_COOKIE["api_url"])) {
                    setcookie("api_url", $dk['api_url'], time() + (60*60*1));
                }
                if(!isset($_COOKIE["timeout"])) {
                  
                    setcookie("end_time", $dk['timeout'], time() + (60*60*1));
                } else {
                    setcookie("end_time", $dk['timeout'], time() + (60*60*1));
                }
                
                $suankibakiye = $var['balance'];
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
                    "type" => "NO-PAYMENT"
                );
                $postdata = json_encode($data);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                $resp = curl_exec($curl);
                curl_close($curl);

            } else {
                if(!isset($_COOKIE["token"])) {
                    setcookie("token", $dk['api_token'], time() + (60*60*1));
                }
                if(!isset($_COOKIE["api_url"])) {
                    setcookie("api_url", $dk['api_url'], time() + (60*60*1));
                }
                if(!isset($_COOKIE["timeout"])) {
                  
                    setcookie("end_time", $dk['timeout'], time() + (60*60*1));
                } else {
                    setcookie("end_time", $dk['timeout'], time() + (60*60*1));
                }
            }
        } else {
            session_destroy();
            setcookie("api_url", "re-login", time());
            setcookie("token", "re-login", time());
     
            header("location:login");
            die();
        }
             
    
      
       
	}
    
}
else 
{
	header("location:login");
}
?>
