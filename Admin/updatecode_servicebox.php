<?php

include('../Main/database.php');


if(isset($_POST['updatedata']))
{
  $id = $_POST['update_id'];

  $sid = $_POST['sid'];
  $img1 = $_POST['image1'];
  $img2 = $_POST['image2'];
  $img3 = $_POST['image3'];
  $img4 = $_POST['image4'];
  $img5 = $_POST['image5'];
  $content = $_POST['content'];
  $details = $_POST['details'];
  $delivery = $_POST['delivery'];
  $revision = $_POST['revision'];

  $sql = "UPDATE servicebox SET sid ='$sid', pic1='$img1', pic2='$img2', pic3='$img3', pic4='$img4', pic5='$img5', sb_text1='$content', sb_text2='$details', delivery='$delivery', revision='$revision' WHERE sb_id='$id'  ";

  $query_run = mysqli_query($conn,$sql);

  if($query_run)
  {
    echo '<script> alert("Data Saved"); </script>';
    header('Location:http://localhost/primis/Admin/ServiceBox.php');
  }
  else {
      echo("Error description: " . mysqli_error($conn));
  }
}


?>
