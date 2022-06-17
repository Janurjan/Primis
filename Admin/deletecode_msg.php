<?php

include('../Main/database.php');


if(isset($_POST['deletedata']))
{

  $id = $_POST['delete_id'];

  $sql = "DELETE FROM contact WHERE contact_id = '$id'";

  $query_run = mysqli_query($conn,$sql);

  if($query_run)
  {
    echo '<script> alert("Data Deleted"); </script>';
    header('Location:index.php');
  }
  else {
      echo("Error description: " . mysqli_error($conn));
  }
}


?>
