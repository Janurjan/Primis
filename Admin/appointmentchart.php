<?php
include('../Main/database.php');


//Getting the count of appointments regarding logo design
$sql1 = "SELECT * FROM appointment WHERE s_name = 'Logo Design'";
if ($result1 = mysqli_query($conn,$sql1))
{
    // Return the number of rows in result set
    $count_ld_appointments = mysqli_num_rows($result1);
}



//Getting the count of appointments regarding web design
$sql2 = "SELECT * FROM appointment WHERE s_name = 'Web Design'";
if ($result2 = mysqli_query($conn,$sql2))
{
    // Return the number of rows in result set
    $count_wd_appointments = mysqli_num_rows($result2);
}




//Getting the count of appointments regarding  video editing
$sql3 = "SELECT * FROM appointment WHERE s_name = 'Video Editing'";
if ($result3=mysqli_query($conn,$sql3))
{
    // Return the number of rows in result set
    $count_ve_appointments = mysqli_num_rows($result3);
}




//Getting the count of appointments regarding  digital marketing
$sql4="SELECT * FROM appointment WHERE s_name = 'Digital Marketing'";
if ($result4 = mysqli_query($conn,$sql4))
{
    // Return the number of rows in result set
    $count_dm_appointments = mysqli_num_rows($result4);
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
        <div style="margin-left:10em;" class="mt-5">

            <canvas id="appointmentChart" style="height:auto; width:500px;"></canvas>
        </div>
    </div>
        <?php
        echo "<input type='hidden' id='apptld' value='$count_ld_appointments'>";
        echo "<input type='hidden' id='apptwd' value='$count_wd_appointments'>";
        echo "<input type='hidden' id='apptve' value='$count_ve_appointments'>";
        echo "<input type='hidden' id='apptdm' value='$count_dm_appointments'>";
        ?>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>

   <script>
        var apptld = document.getElementById("apptld").value;
        var apptwd = document.getElementById("apptwd").value;
        var apptve = document.getElementById("apptve").value;
        var apptdm = document.getElementById("apptdm").value;

        window.onload = function()
        {
            var config1 = {
                type:'bar',
                data: {
                    borderColor : "#fffff",
                    datasets: [{
                        data: [
                            apptld,
                            apptwd,
                            apptve,
                            apptdm
                        ],
                        borderColor : "#fff",
                        borderwidth : "3",
                        hoverBorderColor : "#000",

                        label: 'Appointments Per Service Report',

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
            var ctx1 = document.getElementById('appointmentChart').getContext('2d');
		    window.myPie = new Chart(ctx1,config1);
        };
  </script> 
     
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>