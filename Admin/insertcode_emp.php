<?php

include('../Main/database.php');

if(isset($_POST['insertdata']))
{
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $number = $_POST['number'];
  $gender = $_POST['gender'];
  $dob = $_POST['date'];
  $speciality = $_POST['skill'];



  $sql = "INSERT INTO employee(eid, e_name, e_email, e_password, e_number, e_dob, e_gender, e_speciality)
   VALUES (NULL,'$name','$email','$password','$number','$dob','$gender','$speciality')";

  $query_run = mysqli_query($conn,$sql);

  if($query_run)
  {
    echo '<script> alert("Data Saved"); </script>';
    header('Location:employee.php');
  }
  else {
      echo("Error description: " . mysqli_error($conn));
  }
}


?>
