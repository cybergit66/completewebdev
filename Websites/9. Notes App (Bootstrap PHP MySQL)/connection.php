<?php
    $link = mysqli_connect("localhost","terencet_notes","&TN1hWR+0Dmi","terencet_onlinenotes");
    if(mysqli_connect_error()){
        die("Error connecting to database: " . mysqli_connect_error());
    }
?>