<?php
include('database.php');
?>

<?php

    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["pwd"];
    $skill = $_POST["skill"];
    $gender = $_POST["gender"];
    $address = $_POST["address"];
    $number = $_POST["number"];

    


$sql = "INSERT INTO `freelancer` (`fid`, `fl_name`, `fl_email`, `fl_password`,`fl_skills`,`fl_gender`,`fl_address`,`fl_number`,`fl_status`) VALUES (NULL, '$name', '$email', '$password','$skill','$gender','$address', '$number','undefined');";

if(mysqli_query($conn,$sql))
{
    header('Location:login.php');
}

mysqli_close($conn);


?>