<?php
include('../Main/database.php');

$freelancerID = $_POST['freelancerid'];
// echo $fetched;


    $sql = "UPDATE freelancer SET fl_status = 'defined' WHERE  fid = '$freelancerID'";
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