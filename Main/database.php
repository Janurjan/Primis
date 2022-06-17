<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "primis";

//create connection
$conn = mysqli_connect($servername,$username,$password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



?>

