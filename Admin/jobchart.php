<?php
include('../Main/database.php');


$count_ld_jobs = 0;
$count_wd_jobs = 0;
$count_ve_jobs = 0;
$count_dm_jobs = 0;

//Getting the count of jobs regarding logo design
$sql1 = "SELECT * FROM job WHERE sid = 1";
if ($result1 = mysqli_query($conn,$sql1))
{
    // Return the number of rows in result set
    $count_ld_jobs = mysqli_num_rows($result1);
}



//Getting the count of jobs regarding web design
$sql2 = "SELECT * FROM job WHERE sid = 2";
if ($result2 = mysqli_query($conn,$sql2))
{
    // Return the number of rows in result set
    $count_wd_jobs = mysqli_num_rows($result2);
}




//Getting the count of jobs regarding  video editing
$sql3 = "SELECT * FROM job WHERE sid = 3";
if ($result3=mysqli_query($conn,$sql3))
{
    // Return the number of rows in result set
    $count_ve_jobs = mysqli_num_rows($result3);
}




//Getting the count of jobs regarding  digital marketing
$sql4="SELECT * FROM job WHERE sid = 4";
if ($result4 = mysqli_query($conn,$sql4))
{
    // Return the number of rows in result set
    $count_dm_jobs = mysqli_num_rows($result4);
}

?>


<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css" rel="stylesheet">
    
  </head>

  <body>

        <div class="container-fluid">
            <button type="button" class="btn btn-secondary mt-3" style="width:10em;"><a href="report.php" class="text-white" style="text-decoration: none;"><i class="far fa-hand-point-left fa-lg mr-1"></i>Go Back</a>
            </button>
            <div style=" margin-left:10em;" class="mt-5">

                <canvas id="jobChart" style="height:auto; width:500px;"></canvas>
            </div>
        </div>

        <?php
            echo "<input type='hidden' id='jobld' value='$count_ld_jobs'>";
            echo "<input type='hidden' id='jobwd' value='$count_wd_jobs'>";
            echo "<input type='hidden' id='jobve' value='$count_ve_jobs'>";
            echo "<input type='hidden' id='jobdm' value='$count_dm_jobs'>";
        ?>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>

   <script>
        var ld = document.getElementById("jobld").value;
        var wd = document.getElementById("jobwd").value;
        var ve = document.getElementById("jobve").value;
        var dm = document.getElementById("jobdm").value;

        window.onload = function()
        {

            var config = {
                type:'bar',
                data: {
                    borderColor : "#fffff",
                    datasets: [{
                        data: [
                            ld,
                            wd,
                            ve,
                            dm
                        ],
                        borderColor : "#fff",
                        borderwidth : "3",
                        hoverBorderColor : "#000",

                        label: 'Jobs Per Service Report',

                        backgroundColor: [
                            "#0190ff",
						    "#56d798",
						    "#ff8397",
						    "#6970d5"
                        ],

                        hoverBackgroundColor: [
						    "#f38b4a",
						    "#ff0060",
						    "#f312cb",
						    "#ffe400"
						]

                    }],

                        labels:[
                            'Logo Design',
                            'Web Design',
                            'Video Editing',
                            'Digital Marketing'
                        ]
                },

                options:{
					responsive: true
				}
            };
            var ctx = document.getElementById('jobChart').getContext('2d');
		    window.myPie = new Chart(ctx,config);
        };
  </script> 
     
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
  </body>
</html>