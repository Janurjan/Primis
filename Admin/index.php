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

    <!--Jquery CDN--->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

    <!--Custom CSS--->
    <link rel="stylesheet" href="adminstyle.css"/>

    <title>Admin Panel</title>
    <!-- add icon link -->
    <link rel="apple-touch-icon" sizes="180x180" href="http://localhost/primis/main/favicon_package_v0.16/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="http://localhost/primis/main/favicon_package_v0.16/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="http://localhost/primis/main/favicon_package_v0.16/favicon-16x16.png">
    <link rel="manifest" href="http://localhost/primis/main/favicon_package_v0.16/site.webmanifest">
    <link rel="mask-icon" href="http://localhost/primis/main/favicon_package_v0.16/safari-pinned-tab.svg" color="#12333d">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    
    <style>
      .box{
        margin-left: 15em;
      }
    </style>
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
                  <a class="nav-link text-white p-3 mb-2 current" href="index.php">
                    <i class="fas fa-home text-light fa-lg mr-3"></i>Dashboard</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link text-white p-3 mb-2 sidebar-link" href="report.php">
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


    <?php

      //Getting the count of customers
      $sql="SELECT * FROM customer";
      if ($result=mysqli_query($conn,$sql))
      {
        // Return the number of rows in result set
        $count_customer=mysqli_num_rows($result);
      }

      //Getting the count of Requested freelancers
      $sql2 = "SELECT * FROM freelancer WHERE fl_status = 'undefined'";
      if ($result2=mysqli_query($conn,$sql2))
      {
        // Return the number of rows in result set
        $count_fl_request=mysqli_num_rows($result2);
      }

      //Getting the count of new Messages
       $sql3 = "SELECT * FROM `contact` WHERE `status` = 'new'";
       if ($result3=mysqli_query($conn,$sql3))
       {
         // Return the number of rows in result set
         $count_msg_request=mysqli_num_rows($result3);
       }

       //Getting the count of new Jobs
       $sql4 = "SELECT * FROM `job` WHERE `status2` = 'not accepted'";
       if ($result4=mysqli_query($conn,$sql4))
       {
         // Return the number of rows in result set
         $count_new_jobs=mysqli_num_rows($result4);
       }

        //Getting the count of new Appointments
       $sql5 = "SELECT * FROM `appointment` WHERE `status` = 'not accepted'";
       if ($result5=mysqli_query($conn,$sql5))
       {
         // Return the number of rows in result set
         $count_new_appointments=mysqli_num_rows($result5);
       }

        //Getting the count of Employees
        $sql6 = "SELECT * FROM `employee`";
        if ($result6=mysqli_query($conn,$sql6))
        {
          // Return the number of rows in result set
          $count_employees=mysqli_num_rows($result6);
        }

    ?>

      <section>
        <div class="container-fluid">
          <div class="row my-5 pt-5 box">

            <!--Count of Customers ----------------------------->
            <div class="col mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon text-center">
                    <i class="fas fa-user-alt" style="font-size:24px"></i>
                      <?php echo $count_customer ?> Customers
                  </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="customer.php">
                  <span class="float-center">View Details</span>
                  <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <!---End of Count of Customers--------------------------------------------->

            <!--Count of Requested Freelancers--------------------->
            <div class="col mb-3">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon text-center">
                    <i class="fas fa-user-alt" style="font-size:24px"></i>
                      <?php echo $count_fl_request ?> Freelancer Requests
                  </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="request_freelancer.php">
                  <span class="float-center">View Details</span>
                  <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <!--End of Count of Requested Freelancers---------------------------------------------->

            <!---Count of New Messages---------------------------->
            <div class="col mb-3">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon text-center">
                    <i class="fa fa-fw fa-comments"></i>
                      <?php echo $count_msg_request ?> New Messages
                  </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="request_message.php">
                  <span class="float-center">View Details</span>
                  <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <!---End of Count of New Messages----------------------------->

          </div>
        </div>
      </section>

      <section>
        <div class="container-fluid">
          <div class="row my-5 pt-5 box">

              <!---Count of New Jobs---------------------------->
              <div class="col mb-3">
                <div class="card text-white bg-danger o-hidden h-100">
                  <div class="card-body">
                    <div class="card-body-icon text-center">
                      <i class="fas fa-cart-arrow-down" style="font-size:24px"></i>
                        <?php echo $count_new_jobs; ?> New Jobs
                    </div>
                  </div>
                  <a class="card-footer text-white clearfix small z-1" href="jobs.php">
                    <span class="float-center">View Details</span>
                    <span class="float-right">
                      <i class="fa fa-angle-right"></i>
                    </span>
                  </a>
                </div>
              </div>
              <!---End of Count of New Jobs----------------------------->

              <!---Count of New Appointments ---------------------------->
              <div class="col mb-3">
                <div class="card text-white bg-info o-hidden h-100">
                  <div class="card-body">
                    <div class="card-body-icon text-center">
                      <i class="far fa-calendar-check" style="font-size:24px"></i>
                        <?php echo $count_new_appointments; ?> New Appointments
                    </div>
                  </div>
                  <a class="card-footer text-white clearfix small z-1" href="new_appointment.php">
                    <span class="float-center">View Details</span>
                    <span class="float-right">
                      <i class="fa fa-angle-right"></i>
                    </span>
                  </a>
                </div>
              </div>
              <!---End of Count of New Appointments ----------------------------->


              <!---Count of Employees ---------------------------->
              <div class="col mb-3">
                <div class="card text-white bg-dark o-hidden h-100">
                  <div class="card-body">
                    <div class="card-body-icon text-center">
                      <i class="fas fa-user-alt" style="font-size:24px"></i>
                        <?php echo $count_employees; ?> Employees
                    </div>
                  </div>
                  <a class="card-footer text-white clearfix small z-1" href="employee.php">
                    <span class="float-center">View Details</span>
                    <span class="float-right">
                      <i class="fa fa-angle-right"></i>
                    </span>
                  </a>
                </div>
              </div>
              <!---End of Count of Employees ----------------------------->

          </div>
        </div>
      </section>

      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
