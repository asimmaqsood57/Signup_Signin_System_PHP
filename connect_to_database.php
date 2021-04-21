<?php

$server = "localhost";
$username = "root";

$password = "";

$database = "users";


$con = mysqli_connect($server, $username , $password , $database);

if ($con) {
    // echo "Connection was Successful <br>";
}else{
    echo "There is an error " . mysqli_connect_error($con);
}






?>