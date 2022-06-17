<?php

include('../Main/database.php');

if(isset($_POST['insertdata']))
{
  $name = $_POST['name'];
  $image = $_POST['image'];
  $title = $_POST['title'];
  $price = $_POST['price'];


  $sql = "INSERT INTO services(sid,s_name,s_cover,s_text,price)
   VALUES (NULL,'$name','$image','$title','$price')";

  $query_run = mysqli_query($conn,$sql);

  if($query_run)
  {
    echo '<script> alert("Data Saved"); </script>';
    header('Location:http://localhost/primis/Admin/Services.php');
  }
  else {
      echo("Error description: " . mysqli_error($conn));
  }
}


?>
