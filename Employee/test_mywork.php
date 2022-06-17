<?php
    include('../Main/database.php');

    $work = $_POST['workID'];
    $Name = $_POST['empName'];
    $date = date("Y/m/d");


    $sql = "UPDATE `job` SET `status2` = 'accepted',`acpt_date` = '$date',`status3` = 'not finished',`accept_by` ='$Name' WHERE  `job_id` = '$work'";
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
