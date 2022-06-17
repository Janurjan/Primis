<?php
    include('../Main/database.php');

    $work = $_POST['jobID'];
    $date = date("Y/m/d");


    $sql = "UPDATE `job` SET `status3` = 'finished',`finish_date` = '$date' WHERE  `job_id` = '$work'";
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
