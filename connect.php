<?php
    $servername = 'localhost';
    $dbuser = 'root';
    $dbpassword = '';
    // Create connection
    $conn = new mysqli($servername, $dbuser, $dbpassword);
    // Check connection
    if($conn->connect_error){
        die("Connection failed: ".$conn->connect_error);
    }
    $sql = "SET NAMES UTF8";
    $conn->query($sql);
    $sql = "USE itsdb";
    $conn->query($sql);
?>