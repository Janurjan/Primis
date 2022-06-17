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

    <!--Custom CSS--->
    <link rel="stylesheet" href="adminstyle.css"/>

    <title>Servicebox Details</title>
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

      <p class="ml-3 mt-5">&nbsp;</p>


      <!--tables--->

      <!-- Insert data Modal -->
      <div class="modal fade" id="ServiceBoxAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Service List Data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <form action="insertcode_servicebox.php" method="POST">
                <div class="modal-body">

                  <div class="form-group">
                      <label>Id</label>
                      <input type="text" name="sid" class="form-control" placeholder="Enter Service ID">
                  </div>

                  <div class="form-group">
                      <label>Image</label>
                      <input type="text" name="image1"  class="form-control" placeholder="Enter the url of the image">
                  </div>

                  <div class="form-group">
                      <label>Image</label>
                      <input type="text" name="image2"  class="form-control" placeholder="Enter the url of the image">
                  </div>

                  <div class="form-group">
                      <label>Image</label>
                      <input type="text" name="image3" class="form-control" placeholder="Enter the url of the image">
                  </div>

                  <div class="form-group">
                      <label>Image</label>
                      <input type="text" name="image4" class="form-control" placeholder="Enter the url of the image">
                  </div>

                  <div class="form-group">
                      <label>Image</label>
                      <input type="text" name="image5" class="form-control" placeholder="Enter the url of the image">
                  </div>

                  <div class="form-group">
                        <label>Content:</label>
                        <input type="text" name="content" class="form-control" placeholder="Enter Content">
                    </div>

                    <div class="form-group">
                        <label>Details:</label>
                        <input type="text" name="details" class="form-control" placeholder="Enter Details">
                    </div>

                    <div class="form-group">
                        <label>Delivery</label>
                        <input type="text" name="delivery" class="form-control" placeholder="Enter the Delivery detail">
                    </div>

                    <div class="form-group">
                        <label>Revision</label>
                        <input type="text" name="revision" class="form-control" placeholder="Enter the Revision detail">
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
        <h5 class="modal-title" id="exampleModalLabel">Edit Service List Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="updatecode_servicebox.php" method="POST">
          <div class="modal-body">

            <div class="form-group">
                <label>Id</label>
                <input type="text" name="sid" id="sid" class="form-control" placeholder="Enter Service ID">
            </div>

            <div class="form-group">
                <label>Image</label>
                <input type="text" name="image1" id="image1" class="form-control" placeholder="Enter the url of the image">
            </div>

            <div class="form-group">
                <label>Image</label>
                <input type="text" name="image2" id="image2" class="form-control" placeholder="Enter the url of the image">
            </div>

            <div class="form-group">
                <label>Image</label>
                <input type="text" name="image3" id="image3" class="form-control" placeholder="Enter the url of the image">
            </div>

            <div class="form-group">
                <label>Image</label>
                <input type="text" name="image4" id="image4" class="form-control" placeholder="Enter the url of the image">
            </div>

            <div class="form-group">
                <label>Image</label>
                <input type="text" name="image5" id="image5" class="form-control" placeholder="Enter the url of the image">
            </div>

            <div class="form-group">
                <label>Content:</label>
                <input type="text" name="content"  id="content" class="form-control" placeholder="Enter Content">
            </div>

            <div class="form-group">
                <label>Details:</label>
                <input type="text" name="details"  id="details" class="form-control" placeholder="Enter Details">
            </div>

            <div class="form-group">
                <label>Delivery</label>
                <input type="text" name="delivery" id="delivery" class="form-control" placeholder="Enter the Delivery detail">
            </div>

            <div class="form-group">
                <label>Revision</label>
                <input type="text" name="revision" id="revision" class="form-control" placeholder="Enter the Revision detail">
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
        <h6 class="modal-title" id="exampleModalLabel">Delete Servicebox Data</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="deletecode_servicebox.php" method="POST">
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
                  <h3 class="text-muted text-center mb-3">Service List Table</h3>
                  <div class="card">
                    <div class="card-body">
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ServiceBoxAddModal">
                        Add Service List
                      </button>
                    </div>
                  </div>

                  <div class="card">
                      <div class="card-body">
                         <?php
                             $query = "SELECT * FROM  servicebox";
                             $query_run = mysqli_query($conn,$query);
                         ?>
                         <div class="table-responsive">

                              <table class="table" id="servicebox_tbl">
                                  <thead class="thead-dark">
                                    <tr>
                                      <th scope="col">ID</th>
                                      <th scope="col">No</th>
                                      <th scope="col" style="width: 3em;">Image1</th>
                                      <th scope="col" style="width: 3em;">Image2</th>
                                      <th scope="col" style="width: 3em;">Image3</th>
                                      <th scope="col" style="width: 3em;">Image4</th>
                                      <th scope="col" style="width: 3em;">Image5</th>
                                      <th scope="col" style="width: 5em;">Content</th>
                                      <th scope="col" style="width: 10em;">Details</th>
                                      <th scope="col">Delivery</th>
                                      <th scope="col">Revision</th>
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
                                        <td><?php echo $row['sb_id']; ?></td>
                                        <td><?php echo $row['sid']; ?></td>
                                        <td><?php echo $row['pic1']; ?></td>
                                        <td><?php echo $row['pic2']; ?></td>
                                        <td><?php echo $row['pic3']; ?></td>
                                        <td><?php echo $row['pic4']; ?></td>
                                        <td><?php echo $row['pic5']; ?></td>
                                        <td><?php echo $row['sb_text1']; ?></td>
                                        <td><?php echo $row['sb_text2']; ?></td>
                                        <td><?php echo $row['delivery']; ?></td>
                                        <td><?php echo $row['revision']; ?></td>
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

               $('#delete_id').val(data[1]);


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
                $('#sid').val(data[1]);
                $('#image1').val(data[2]);
                $('#image2').val(data[3]);
                $('#image3').val(data[4]);
                $('#image4').val(data[5]);
                $('#image5').val(data[6]);
                $('#content').val(data[7]);
                $('#details').val(data[8]);
                $('#delivery').val(data[9]);
                $('#revision').val(data[10]);
        });
   });
    </script>
  </body>
</html>
