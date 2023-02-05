<?php
function img_resize($target, $newcopy, $w, $h, $ext) {
    list($w_orig, $h_orig) = getimagesize($target);
    $scale_ratio = $w_orig / $h_orig;
    if (($w / $h) > $scale_ratio) {
           $w = $h * $scale_ratio;
    } else {
           $h = $w / $scale_ratio;
    }
    $img = "";
    $ext = strtolower($ext);
    if ($ext == "gif"){ 
      $img = imagecreatefromgif($target);
    } else if($ext =="png"){ 
      $img = imagecreatefrompng($target);
    } else { 
      $img = imagecreatefromjpeg($target);
    }
    $tci = imagecreatetruecolor($w, $h);
    // imagecopyresampled(dst_img, src_img, dst_x, dst_y, src_x, src_y, dst_w, dst_h, src_w, src_h)
    imagecopyresampled($tci, $img, 0, 0, 0, 0, $w, $h, $w_orig, $h_orig);
    imagejpeg($tci, $newcopy, 84);
}
?>

<?php
require_once('./includes/Connection.php');
include('./notify.php');
session_start();
if(isset($_SESSION['Username']))
{
	$query="select * from users where username='".$_SESSION['Username']."'";
	$result=mysqli_query($con,$query);
	if($query && $var = mysqli_fetch_array($result)) {
        if (isset($_POST['delete_avatar'])) {
            $updateavatar = "UPDATE users SET photo=NULL WHERE username='" . $var['username'] . "';";
            mysqli_query($con,$updateavatar); 
            $postID = rand(0, 237727);
            notify("comment", $var['username'], $postID, "Sistemsel", "Hesabınızın profil resmi kaldırıldı.", "success" );
            echo 'OK';
            exit();
        }
        if (isset($_POST['upload'])) {

            

            $filename = $_FILES["uploadfile"]["name"];
            $tempname = $_FILES["uploadfile"]["tmp_name"];
            $fileType = $_FILES["uploadfile"]["type"];
            $fileSize = $_FILES["uploadfile"]["size"];
            $fileErrorMsg = $_FILES["uploadfile"]["error"];
            $randcik = rand(2, 237344232343552377);
            $folder = "./profiles/" . $randcik . "-" . $filename;
            $kaboom = explode(".", $filename);
            $fileExt = end($kaboom);
            list($width, $height) = getimagesize($tempname);
            if($width < 10 || $height < 10){
                header("location:profile");
                exit();	
            }


            if (move_uploaded_file($tempname, $folder)) {
                $updateavatar = "UPDATE users SET photo='". $folder ."' WHERE username='" . $var['username'] . "';";
                mysqli_query($con,$updateavatar); 
                $postID = rand(0, 237727);
                notify("comment", $var['username'], $postID, "Sistemsel", "Hesabınızın profil resmi değiştirildi.", "success" );
                $target_file = $folder;
                $resized_file = $folder;
                $wmax = 300;
                $hmax = 300;
                img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);
                header("location:profile");
            } else {
                header("location:profile");
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

else 
{
	header("location:login");
}
?>