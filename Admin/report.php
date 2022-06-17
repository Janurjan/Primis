<?php
    include('../Main/database.php');
    session_start();
    $admin="";
    if (!isset($_SESSION["a_name"])) {
      header('Location:http://localhost/primis/Main/login.php');
    }
    else
    {
      $admin = $_SESSION["a_name"];
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

     <!--fontawesome CDN-->
     <script src="https://kit.fontawesome.com/059aa68f35.js" crossorigin="anonymous"></script>

     <!--Custom CSS--->
    <link rel="stylesheet" href="adminstyle.css"/>

    <title>Report</title>

  </head>
  <body>

  <!--navbar--->
  <nav class="navbar navbar-expand-md navbar-light">
    <button class="navbar-toggler ml-auto mb-2 bg-light" type="button" data-toggle="collapse" data-target="#myNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
      <div class="collapse navbar-collapse" id="myNavbar">
        <div class="container-fluid">
          <div class="row">
            <!-- sidebar -->
            <div class=" col-xl-2 col-lg-3  col-md-4 sidebar fixed-top">
              <p class="navbar-brand text-white d-block mx-auto text-center py-3 mb-2 bottom-border">Primis</p>
              <div class="bottom-border">
                <img src="Images/Admin.jpg" width="50" class="rounded-circle mr-3 mx-auto d-block" />
                <br>
                <p class="text-white  text-center" style="text-decoration:none;"><?php echo $admin; ?></p>
              </div>
              <ul class="navbar-nav flex-column mt-2">

                <li class="nav-item">
                  <a class="nav-link text-white p-3 mb-2 sidebar-link" href="index.php">
                    <i class="fas fa-home text-light fa-lg mr-3"></i>Dashboard</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link text-white p-3 mb-2 current" href="report.php">
                    <i class="far fa-chart-bar text-light fa-lg mr-3"></i>Report</a>
                </li> 

                <li class="nav-item">
                  <a class="nav-link text-white p-3 mb-2 sidebar-link" href="jobs.php">
                    <i class="fas fa-table text-light fa-lg mr-3"></i>Jobs</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link text-white p-3 mb-2 sidebar-link" href="Services.php">
                    <i class="fas fa-table text-light fa-lg mr-3"></i>Services</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link text-white p-3 mb-2 sidebar-link" href="customer.php">
                    <i class="fas fa-table text-light fa-lg mr-3"></i>Customers</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link text-white p-3 mb-2 sidebar-link" href="Employee.php">
                    <i class="fas fa-table text-light fa-lg mr-3"></i>Employees</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link text-white p-3 mb-2 sidebar-link" href="freelancer.php">
                    <i class="fas fa-table text-light fa-lg mr-3"></i>FreeLancers</a>
                </li>

              </ul>
            </div>
              <!--End of sidebar--->

              <!--Top Nav--->
              <div class="col-xl-10 col-lg-9 col-md-8 ml-auto bg-dark fixed-top py-2 top-navbar">
                <div class="row align-items-center">
                  <div class="col-md-4">
                    <h4 class="text-light text-uppercase mb-0">Dashboard</h4>
                  </div>
                <div class="col-md-5">
              </div>
              <div class="col-md-3">
                <ul class="navbar-nav">
                  <li class="nav-item ml-md-auto "><a href="logout.php" class="nav-link">
                    <i class="fas fa-sign-out-alt text-white logout fa-lg">Logout</i></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <!-- end of top-nav--->
        </div>
      </div>
    </div>
  </nav>
  <!--end of nav bar-->


    <section class="mt-5 pt-2" style="margin-left:16em;">
      <div class="container-fluid ">
        <div class="row text-center mt-5">
          <div class="col">
            <h1 style="color:#463F57;">Report</h1>
          </div>
        </div>
        <table class="table table-hover mt-3">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Subject</th>
              <th scope="col" style="padding-left:4em;">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Percentage of Male and Female Customer Report</td>
              <td>
                <a href="genderchart.php" class="btn btn-info" role="button" style="width:10em;">View</a>
              </td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Appointments Per Service Report</td>
              <td>
                <a href="appointmentchart.php" class="btn btn-info" role="button" style="width:10em;">View</a>
              </td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Percentage of Defined and Undefined Freelancers Report</td>
              <td>
                <a href="fl_requestchart.php" class="btn btn-info" role="button" style="width:10em;">View</a>
              </td>
            </tr>
            <tr>
              <th scope="row">4</th>
              <td>Percentage of Skills for Undefined Freelancers Report</td>
              <td>
                <a href="fl_servicechart.php" class="btn btn-info" role="button" style="width:10em;">View</a>
              </td>
            </tr>
            <tr>
              <th scope="row">5</th>
              <td>Jobs Per Service Report</td>
              <td>
                <a href="jobchart.php" class="btn btn-info" role="button" style="width:10em;">View</a>
              </td>
            </tr>
    </tbody>
  </table>
      </div>
    </section>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>