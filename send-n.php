<?php 
include("notify.php");  
include('./includes/Connection.php');  

if(isset($_POST['sistem'])) {
    session_start();
    $postID = rand(0, 237727);
    notify("comment", $_SESSION['Username'], $postID, "Sistemsel", $_POST['mesaj'], $_POST['renk'] );  
    exit();
}

if(!$_POST['gidenisim'] || !$_POST['mesaj'] || !$_POST['gönderen'] || !$_POST['renk']) {
    echo 'HATA';
} else {
    $sql_e = "SELECT * FROM users WHERE username='" . $_POST['gidenisim'] . "'";
    $res_u = mysqli_query($con, $sql_e);

    if (mysqli_num_rows($res_u) > 0)
    {
        $postID = rand(0, 237727);
        notify("comment", $_POST['gidenisim'], $postID, $_POST['gönderen'], $_POST['mesaj'], $_POST['renk'] );  
        echo 'OK';
    }
    else
    {
        echo 'NO-USER';
    }
}
?>