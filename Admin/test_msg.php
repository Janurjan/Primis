<?php
include('../Main/database.php');

$fetched = $_POST['contactid'];
// echo $fetched;


    $sql = "UPDATE `contact` SET `status` = 'old' WHERE  `contact_id` = '$fetched'";
    $query_run = mysqli_query($conn,$sql);
    if($query_run)
    {
        echo "Data Saved";
        // header('Location:request_message.php');
    }
    else
    {
        echo("Error description: " . mysqli_error($conn));
    }

?>