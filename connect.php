<?php
    $connect = new mysqli("localhost","root","","online_shop");

    if(!$connect){
        die("Connection failed: " . $mysqli->connect_error());
    }
?>
