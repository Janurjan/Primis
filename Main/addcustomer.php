<?php
include('database.php');
?>

<?php

$name = $_POST["cusname"];
$email = $_POST["cusemail"];
$password = $_POST["cuspwd"];
$gender = $_POST["cusgender"];
$address = $_POST["cusaddress"];
$number = $_POST["cusnumber"];

$sql = "INSERT INTO `customer` (`cid`, `c_name`, `c_email`, `c_pwd`, `c_gender`,`c_address`,`c_number`,`check`) VALUES (NULL, '$name', '$email', '$password','$gender','$address', '$number',0);";

if(mysqli_query($conn,$sql))
{
    header('Location:login.php');
}

mysqli_close($conn);

?>