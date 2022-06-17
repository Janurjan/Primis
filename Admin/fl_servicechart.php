<?php
include('../Main/database.php');
$query = "SELECT fl_skills, count(*) as number FROM freelancer WHERE fl_status = 'undefined' GROUP BY fl_skills";
$result = mysqli_query($conn,$query);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- <title>Hello, world!</title> -->

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Skills', 'Number'],
          <?php
          while($row = mysqli_fetch_array($result))
          {
              echo "['".$row["fl_skills"]."', ".$row["number"]."],";
          }
          ?>
          
        ]);

        var options = {
          title: 'Percentage of Skills for Undefined Freelancers'
        };

        var chart = new google.visualization.PieChart(document.getElementById('flpiechart'));

        chart.draw(data, options);
      }
    </script>
  </head>

  <body>
    <!-- <h1>Hello, world!</h1> -->

    <div class="container-fluid">
      <button type="button" class="btn btn-secondary mt-3" style="width:10em;"><a href="report.php" class="text-white" style="text-decoration: none;"><i class="far fa-hand-point-left fa-lg mr-1"></i>Go Back</a>
      </button>
      <div class="row">
        <div id="flpiechart" style="width: 900px; height: 600px;" class="mx-auto d-block"></div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>