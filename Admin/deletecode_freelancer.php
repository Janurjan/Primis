<?php

include('../Main/database.php');


if(isset($_POST['deletedata']))
{

  $id = $_POST['delete_id'];

  $sql = "DELETE FROM freelancer WHERE fid = '$id'";

  $query_run = mysqli_query($conn,$sql);

  if($query_run)
  {
    echo '<script> alert("Data Deleted"); </script>';
    header('Location:freelancer.php');
  }
  else {
      echo("Error description: " . mysqli_error($conn));
  }
}


?>
