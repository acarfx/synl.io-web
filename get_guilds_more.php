<?php
 $curl = curl_init();
 curl_setopt($curl, CURLOPT_URL,'http://api.synl.io/sunucu/' . $_GET['kim'] . '');
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
 
 curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
 curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
 $response = curl_exec($curl);
 if($e = curl_error($curl)) {
    echo $e;
} else {

    echo $response;
}
 curl_close($curl);
?>