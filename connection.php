<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "fullstack";
    
    $mysqli = new mysqli($host,$user,$password,$db);

    if($mysqli->connect_errno) {
        die ("Failed to connect to MySQL :". $mysqli->connect_errno);
    }

?>