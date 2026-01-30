<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "ngo";

$con = mysqli_connect($host,$user,$password) or die("Could not connect to database");
mysqli_select_db($con,$db) or die("No database selected");

?>