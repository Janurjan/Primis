<?php
include('../Main/database.php');

$appointment = $_POST['appointmentID'];



    $sql = "UPDATE `appointment` SET `status2` = 'finished' WHERE  `appointment_id` = '$appointment'";
    $query_run = mysqli_query($conn,$sql);
    if($query_run)
    {
        echo "Data Updated";
    }
    else
    {
        echo("Error description: " . mysqli_error($conn));
    }

?>

