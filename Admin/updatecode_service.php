<?php

include('../Main/database.php');


if(isset($_POST['updatedata']))
{
  $id = $_POST['update_id'];

  $name = $_POST['name'];
  $image = $_POST['image'];
  $title = $_POST['title'];
  $price = $_POST['price'];


  $sql = "UPDATE services SET s_name ='$name', s_cover='$image',s_text = '$title',price = '$price' WHERE sid='$id'  ";

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
