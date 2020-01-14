<?php

$servername = "localhost";
$dBUsername = "root";
$dbPassword = "";
$dBName = "finalproject";

$conn = mysqli_connect($servername, $dBUsername, $dbPassword, $dBName );

if(!$conn){
  die("Connection Failed");
}



 ?>
