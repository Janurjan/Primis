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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!--fontawesome CDN-->
    <script src="https://kit.fontawesome.com/059aa68f35.js" crossorigin="anonymous"></script>

    <!--Jquery CDN--->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

    <!--Custom CSS--->
    <link rel="stylesheet" href="adminstyle.css"/>

    <title>Services</title>
    <!-- add icon link -->
    <link rel="apple-touch-icon" sizes="180x180" href="http://localhost/primis/main/favicon_package_v0.16/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="http://localhost/primis/main/favicon_package_v0.16/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="http://localhost/primis/main/favicon_package_v0.16/favicon-16x16.png">
    <link rel="manifest" href="http://localhost/primis/main/favicon_package_v0.16/site.webmanifest">
    <link rel="mask-icon" href="http://localhost/primis/main/favicon_package_v0.16/safari-pinned-tab.svg" color="#12333d">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
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
                    <p class="text-white text-center" style="text-decoration:none;"><?php echo $admin; ?></p>
                  </div>
                  <ul class="navbar-nav flex-column mt-2">

                    <li class="nav-item">
                      <a class="nav-link text-white p-3 mb-2 sidebar-link" href="index.php">
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
                      <a class="nav-link text-white p-3 mb-2 current" href="Services.php">
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

                  <!--Top Nav-->
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

      <!--modal--->
      <div class="modal" id="sign-out">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Want to leave?</h4>
              <button type="button" class="close" data-dismiss="modal">&times;
              </button>
            </div>
            <div class="modal-body">
              Press logout to leave
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success"
              data-dismiss="modal">Stay Here</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Logout</button>
            </div>
          </div>
        </div>
      </div>
      <!--end of modal-->



      <p class="ml-3 mt-5">&nbsp;</p>


      <!--tables--->

      <!-- Insert data Modal -->
      <div class="modal fade" id="ServiceAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Service Data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <form action="insertcode_service.php" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Name" autocomplete="off">
                    </div>


                    <div class="form-group">
                        <label>Image</label>
                        <input type="text" name="image" class="form-control" placeholder="Enter the url of the image" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label>Text</label>
                        <input type="text" name="title"  class="form-control" placeholder="Enter the sub title" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" name="price" class="form-control" placeholder="Enter the Price" autocomplete="off">
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="insertdata" class="btn btn-primary">Save Data</button>
                    </div>
              </div>
            </form>
        </div>
      </div>
    </div>

<!--##############################################################################################################################--->
<!--- End of Insert Data Modal ----->

<!--##############################################################################################################################--->
<!-- Edit Data Modal -->
<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Service Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="updatecode_service.php" method="POST">
          <div class="modal-body">

            <input type="hidden" name="update_id" id="update_id">
              <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" autocomplete="off">
              </div>

              <div class="form-group">
                  <label>Cover</label>
                  <input type="text" name="image" id="image" class="form-control" placeholder="Enter the url of the image" autocomplete="off">
              </div>

              <div class="form-group">
                  <label>Text</label>
                  <input type="text" name="title" id="title" class="form-control" placeholder="Enter the sub title" autocomplete="off">
              </div>

              <div class="form-group">
                  <label>Price</label>
                  <input type="text" name="price" id="price" class="form-control" placeholder="Enter the Price" autocomplete="off">
              </div>

              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" name="updatedata" class="btn btn-primary">Save Data</button>
              </div>
        </div>
      </form>
  </div>
</div>
</div>

<!--##############################################################################################################################-->
<!---End of Edit Modal----->


<!--##############################################################################################################################--->
<!---Delete Data Modal -->
<div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Delete Service Data</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="deletecode_service.php" method="POST">
          <div class="modal-body">

            <input type="hidden" name="delete_id" id="delete_id">

            <h5>Do you want to Delete this Data ??</h5>

              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                  <button type="submit" name="deletedata" class="btn btn-primary">Yes !! Delete it</button>
              </div>
        </div>
      </form>
  </div>
</div>
</div>

<!--##############################################################################################################################-->
<!--- End of Delete Modal ---->

<!--Section ---->
      <section>
        <div class="container-fluid">
          <div class="row mb-5">
            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
              <div class="row">
                <div class="col-12">
                  <h3 class="text-muted text-center mb-3">Service Table</h3>
                  <div class="card">
                    <div class="card-body">
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ServiceAddModal">
                        Add Service
                      </button>
                      <button type="button" class="btn btn-primary"><a href="ServiceBox.php" class="text-white" style="text-decoration: none;">  View Service List</a>
                      </button>
                    </div>
                  </div>

                  <div class="card">
                      <div class="card-body">
                         <?php
                             $query = "SELECT * FROM  services";
                             $query_run = mysqli_query($conn,$query);
                         ?>
                         <div class="table-responsive">

                              <table class="table" id="service_tbl">
                                  <thead class="thead-dark">
                                    <tr>
                                      <th scope="col">ID</th>
                                      <th scope="col">Name</th>
                                      <th scope="col">Cover</th>
                                      <th scope="col">Text</th>
                                      <th scope="col">Price</th>
                                      <th scope="col">Edit</th>
                                      <th scope="col">Delete</th>
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
                                        <td><?php echo $row['sid']; ?></td>
                                        <td><?php echo $row['s_name']; ?></td>
                                        <td><?php echo $row['s_cover']; ?></td>
                                        <td><?php echo $row['s_text']; ?></td>
                                        <td><?php echo $row['price']; ?></td>
                                        <td>
                                              <button type="button" class="btn btn-success editbtn">EDIT </button>
                                        </td>
                                        <td>
                                              <button type="button" class="btn btn-danger deletebtn">DELETE </button>
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

<!---End of section--->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <script>

    $(document).ready(function () {
       $('.deletebtn').on('click', function(){

         $('#deletemodal').modal('show');


               $tr = $(this).closest('tr');

               var data = $tr.children("td").map(function()
               {
                     return $(this).text();
               }).get();

               console.log(data);

               $('#delete_id').val(data[0]);


       });
  });

    </script>


    <script>
     $(document).ready(function () {
        $('.editbtn').on('click', function(){

          $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function()
                {
                      return $(this).text();
                }).get();
                console.log(data);

                $('#update_id').val(data[0]);
                $('#name').val(data[1]);
                $('#image').val(data[2]);
                $('#title').val(data[3]);
                $('#price').val(data[4]);

        });
   });
    </script>
  </body>
</html>
