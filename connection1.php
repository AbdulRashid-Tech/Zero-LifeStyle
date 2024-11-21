<?php

$serverName = "localhost";
$username = "root";
$password = "";
$database = "zero lifestyle";

$conn = mysqli_connect($serverName,$username,$password,$database);


if($conn){
    // echo "connection successfully";
}
else{
    echo "not connected";
}

?>