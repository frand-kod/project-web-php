<?php

// intialize connection

$host ="localhost";
$user = "root";
$pass ="";
$db = "db_showroom";

// connecting

$conn = mysqli_connect($host, $user, $pass, $db);

if(!$conn){
    echo "connecting failed";
}