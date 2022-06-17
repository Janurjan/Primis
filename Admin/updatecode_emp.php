<?php

include('../Main/database.php');

if(isset($_POST['updatedata']))
{
  $id = $_POST['update_id'];

  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $number = $_POST['number'];
  $gender = $_POST['gender'];
  $dob = $_POST['date'];
  $speciality = $_POST['skill'];

  $sql = "UPDATE employee SET e_name ='$name', e_email='$email',e_password='$password',e_dob='$dob',e_gender='$gender',e_speciality='$speciality',e_number='$number' WHERE eid='$id'  ";

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
