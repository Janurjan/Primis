<?php
    include('../Main/database.php');
    session_start();
    $emp_name = "";
    if (!isset($_SESSION["e_name"])) {
      header('Location:http://localhost/primis/Main/login.php');
    }
    else
    {
      $emp_name=$_SESSION["e_name"];
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
        <link rel="stylesheet" href="../Admin/adminstyle.css"/>

        <title>Employee Panel</title>
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

  <?php
  $sql = "SELECT * FROM `employee` WHERE `e_name` = '$emp_name'";
  $result = mysqli_query($conn,$sql);
      if(mysqli_num_rows($result)>0)
      {
        while($row=mysqli_fetch_assoc($result))
        {
            $e_img=$row['e_img'];      
        }
      }
  ?>
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
                <p class="navbar-brand text-white d-block mx-auto text-center py-3 mb-4 bottom-border">Primis</p>
                <div class="bottom-border">
                  <img src="<?php echo $e_img; ?>" width="50" class="rounded-circle mr-3 mx-auto d-block" />
                  <br>
                  <p class="text-white pb-3 text-center" style="text-decoration:none;"><?php echo $emp_name?></p>
                </div>
                <ul class="navbar-nav flex-column mt-4">

                    <li class="nav-item">
                      <a class="nav-link text-white p-3 mb-2 sidebar-link current" href="index.php">
                        <i class="fas fa-home text-light fa-lg mr-3"></i>Dashboard</a>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link text-white p-3 mb-2 sidebar-link" href="myappointments.php">
                        <i class="fas fa-table text-light fa-lg mr-3"></i>My Appointments</a>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link text-white p-3 mb-2 sidebar-link" href="works.php">
                        <i class="fas fa-table text-light fa-lg mr-3"></i>My Works</a>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link text-white p-3 mb-2 sidebar-link" href="logout.php">
                        <i class="fas fa-sign-out-alt text-light fa-lg mr-3"></i>LogOut
                      </a>
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

      $sql2 = "SELECT * FROM `employee` WHERE `e_name` = '$emp_name'";
      $result2 = mysqli_query($conn,$sql2);
      if(mysqli_num_rows($result2)>0)
      {
        while($row=mysqli_fetch_assoc($result2))
        {
            $service=$row['e_speciality'];      
        }
      }

    
      $sql3 = "SELECT * FROM `services` WHERE `s_name` = '$service'";
      $result3 = mysqli_query($conn,$sql3);
      if(mysqli_num_rows($result3)>0)
      {
        while($row=mysqli_fetch_assoc($result3))
        {
            $sid = $row['sid'];     
        }
      }

      $sql4 = "SELECT * FROM `appointment` WHERE `status` = 'not accepted' and `s_name` = '$service'";
      if ($result4=mysqli_query($conn,$sql4))
      {
        // Return the number of rows in result set
         $count_appointment = mysqli_num_rows($result4);
      }

      $sql5 = "SELECT * FROM `job` WHERE `status2` = 'not accepted' and `sid` = '$sid'";
      if ($result5=mysqli_query($conn,$sql5))
      {
        // Return the number of rows in result set
         $count_job = mysqli_num_rows($result5);
      }

    ?>

    <!---Main Section----->
      <section>
        <div class="container-fluid">
          <div class="row mt-5 pt-5 box">

            <div class="col mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon text-center">
                    <i class="fas fa-user-alt" style="font-size:24px"></i>
                    <?php echo $count_appointment; ?> New Appointments
                  </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="newappointments.php">
                  <span class="float-center">View Details</span>
                  <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>

            <div class="col mb-3">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon text-center">
                    <i class="fas fa-user-alt" style="font-size:24px"></i>
                    <?php echo $count_job; ?> New Jobs
                  </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="index.php">
                  <span class="float-center">View Details</span>
                  <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>


          </div>
        </div>
      </section>

      <p class="ml-3 mt-2">&nbsp;</p>


      <!--tables--->

      <!--Section ---->
      <section>
        <div class="container-fluid">
          <div class="row mb-5">
            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
              <div class="row">
                <div class="col-12">
                  <h3 class="text-muted text-center mb-3">Works Request Table</h3>

                  <div class="card">
                      <div class="card-body">
                         <?php
                             $query = "SELECT * FROM  `job` WHERE `sid` = '$sid' and `status1` = 'paid' and `status2` = 'not Accepted'";
                             $query_run = mysqli_query($conn,$query);
                         ?>
                         <input type="hidden" name="empN" id="empName" value="<?php echo $emp_name; ?>">
                         <div class="table-responsive">

                              <table class="table" id="workreq_tbl">
                                  <thead class="thead-dark">
                                    <tr>
                                      <th scope="col">Work ID</th>
                                      <th scope="col">Customer ID</th>
                                      <th scope="col">Document</th>
                                      <th scope="col">Requested Date</th>
                                      <th scope="col">Status</th>
                                      <th scope="col">Accept</th>
                                    </tr>
                                  </thead>

                          <?php
                              if($query_run)
                              {
                                foreach ($query_run as $row)
                                {
                          ?>
                                    <tbody>
                                      <tr>
                                        <td><?php echo $row['job_id']; ?></td>
                                        <td><?php echo $row['cid']; ?></td>
                                        <td><?php echo $row['doc_path']; ?></td>
                                        <td><?php echo $row['date']; ?></td>
                                        <td><?php echo $row['status2']; ?></td>
                                        <td>
                                          <button type="button" name="accept" class="btn btn-success acpt_btn1"   id="<?php echo $row['job_id'];?>">ACCEPT </button>
                                        </td>
                                      </tr>
                                    </tbody>
                            <?php
                                      }
                                  }
                                  else {
                                    echo "No Record Found";
                                  }
                             ?>
                          </table>
                        </div>
                      </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

    <script>
    $(".acpt_btn1").click(function()
    {
        var id = this.id;
        var empName = $('#empName').val();
        $.ajax({
            url: "test_mywork.php",
            type: "POST",
            data: {'workID': id, 'empName': empName},
            success: function (result) {
                console.log(result);
                location.reload();
            },

        });
    });

    <!---End of section--->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    // <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>