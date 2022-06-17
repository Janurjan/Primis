<?php

include('../Main/database.php');


if(isset($_POST['deletedata']))
{

  $id = $_POST['delete_id'];

  $sql = "DELETE FROM servicebox WHERE sb_id = '$id'";

  $query_run = mysqli_query($conn,$sql);

  if($query_run)
  {
    echo '<script> alert("Data Deleted"); </script>';
    header('Location:http://localhost/primis/Admin/ServiceBox.php');
  }
  else {
      echo("Error description: " . mysqli_error($conn));
  }
}


?>
