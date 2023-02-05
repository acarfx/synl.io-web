<?php

    $con=mysqli_connect('localhost','synltnxd_root','1234567890Selo','synltnxd_root');

    if(!$con)
    {
        die(' Please Check Your Connection'.mysqli_error($con));
    }
?>