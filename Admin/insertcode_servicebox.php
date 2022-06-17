<?php

include('../Main/database.php');

if(isset($_POST['insertdata']))
{
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


  $sql = "INSERT INTO servicebox(sb_id, sid, pic1, pic2, pic3, pic4, pic5, sb_text1, sb_text2, delivery, revision)
   VALUES (NULL,'$sid','$img1','$img2','$img3','$img4','$img5','$content','$details','$delivery','$revision')";

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
