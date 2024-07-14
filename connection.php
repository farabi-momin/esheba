<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbName = "esheba";

    $connection = new mysqli($servername, $username, $password, $dbName);

    if($connection->connect_error){
        die("Connection Failed".$connection->connect_error);
    }
?>