<?php
$servername="localhost";
$username="root";
$password="";

$conn = mysqli_connect($servername,$username,$password,'test');

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

//echo "Connected successfully";
?>