<?php
    session_start();
    include('database.php');
    if(isset($_GET["id"])){
        $service=$_GET["id"];
    }

    $user="";
    if(!isset($_SESSION["cid"])){
        header('Location:login.php');
    }else{
        $user=$_SESSION["cid"];
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!--fontawesome CDN-->
    <script src="https://kit.fontawesome.com/059aa68f35.js" crossorigin="anonymous"></script>

    <!---Extrenal CSS--->
    <link rel="stylesheet" href="style.css">

    <style>
        .contact-head{
            font-size: 3em;
            font-weight: 500;
            color: #087F8C;
        }
        
    </style>

    <title>Appointment</title>
    <!-- add icon link -->
    <link rel="apple-touch-icon" sizes="180x180" href="http://localhost/primis/main/favicon_package_v0.16/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="http://localhost/primis/main/favicon_package_v0.16/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="http://localhost/primis/main/favicon_package_v0.16/favicon-16x16.png">
    <link rel="manifest" href="http://localhost/primis/main/favicon_package_v0.16/site.webmanifest">
    <link rel="mask-icon" href="http://localhost/primis/main/favicon_package_v0.16/safari-pinned-tab.svg" color="#12333d">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

  </head>
    <body data-spy="scroll" data-target="#navbarResponsive">

    <?php
    
    $sql = "SELECT * FROM `customer` WHERE `cid` = '$user'";
    $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0)
        {
          while($row=mysqli_fetch_assoc($result))
          {
              $username=$row['c_name'];      
          }
        }

  ?>
        <header>
            <!--Navigation-->
            <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
                <!-- Brand/Logo -->
                <a class="navbar-brand" href="home.php"><img src="Images/logo.png" alt="Logo"></a>
                <!-- Toggler/collapsibe Button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
                </button>
        
                <!-- Navbar links -->
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                    <?php
                    if($user != "")
                    {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="myaccount.php" style="text-transform:none;"><?php echo"Hi ".$username; ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php" style="text-transform:none;">Logout</a>
                        </li>
                        <?php
                    }
                    else{
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php" style="text-transform:none;">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="signup.php" style="text-transform:none;">SignUp</a>
                        </li>
                    <?php
                    }
                    ?>
                    </ul>
                </div>
            </nav>
        </header>
        <!--End of Navigation Bar-->

    <div class="container py-5">
        <div class="row">
            <div class="col text-center">
                <span class="contact-head">Make Appointments</span>
            </div>
        </div>
    </div>

    <div class="container" class="note">
        <div class="row">
            <div class="col">
                <span class="lead" style="color:#999;">Note: Fill out the form below and a will contact you as soon as possible.</span><br>
                <span class="lead" style="color:#999;">Average Response Time is One Day</span>
            </div>
        </div>
    </div>


    <?php 
        $sql1 = "SELECT * FROM `services` WHERE `sid` = $service";
        $result = mysqli_query($conn,$sql1);
        if(mysqli_num_rows($result)>0)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                $serviceName = $row['s_name'];
                            
            }
        }

        $sql8 = "SELECT * from `employee` WHERE  `e_speciality` = '$serviceName'";
        $result8 = mysqli_query($conn,$sql8);
        if(mysqli_num_rows($result8)>0)
        {
            while($row = mysqli_fetch_assoc($result8))
            {
                $ename = $row['e_name'];
            }
        }
        
    ?>
    

    <div class="container my-5">
        <div class="row">
            <div class="col">
                <form  method="post" action="">
                    <div class="row">
                        <div class="col">
                            <p class="lead">Full Name</p> 
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $username; ?>" disabled>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <p class="lead">Service Name</p>
                            <input type="text" class="form-control" id="serviceName"  name="serviceName" value="<?php echo $serviceName; ?>" disabled>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <p class="lead">Date of Meeting</p>
                            <input type="date" name="date" id="date" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <p class="lead">Purpose</p> 
                            <textarea class="form-control" rows="5" name="purpose" placeholder="Purpose of the Meeting *" autocomplete="off" required></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info my-3 float-right" name="appointment" style="width: 150px; font-size: 1em;">Send</button>
                </form>
            </div>
        </div>
    </div>

    <?php
        if(isset($_POST["appointment"]))
        {
            $purpose = $_POST["purpose"];
            $date = $_POST["date"];
            $sql3 = "INSERT INTO `appointment`(`appointment_id`,`cid`,`c_name`,`s_name`,`purpose`,`status`,`meeting_date`,`e_name`) VALUES (NULL,'$user','$username','$serviceName','$purpose','not accepted','$date','$ename');";
            $result3 = mysqli_query($conn,$sql3);
            if($result3>0)
            {
                echo "<script>alert('You sucessfully made an appointment for meeting,Our Employee will accept your request very soon. So please be in online and see the update about the meeting');</script>";
                // header('Location:http://localhost/primis/main/home.php');
            }
            else
            {
                echo("Error description: " . mysqli_error($conn));
            }            
        }
    ?>

    <!--Footer----->
    <footer class="page-footer bg-dark">
        <div class="container">
            <div class="row pb-3">
                <div class="col">
                    <img src="Images/logo.png" style="width:15em; height: 7.5em;">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 footer1 pb-3">
                    <h6 class="footer-head">FIND OUT WHO WE ARE</h6>
                    <hr class="mb-4 mt-0 d-inline-block " style="width:175px;">
                    <p class="text-left py-2">From the beginning, we’ve believed that change doesn’t happen without leadership. 
                        That’s why we keep on forging new, innovative pathways in the industry we helped transform.
                    </p>
                </div>

                <div class="col-lg-3 col-md-6 footer2">
                    <h6 class="footer-head">Company</h6>
                    <hr class="mb-4 mt-0 d-inline-block " style="width:70px;">
                    <ul class="footer-links list-unstyled">
                        <li class="py-2">
                            <a href="home.php">Home</a>
                        </li>
                        <li class="py-2">
                            <a href="about.php">About Us</a>
                        </li>
                        <li class="py-2">
                            <a href="contact.php">contact</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer3">
                    <h6 class="footer-head">Services</h6>
                    <hr class="mb-4 mt-0 d-inline-block " style="width:70px;">
                    <ul class="footer-links list-unstyled">
                        <li class="py-2">
                            <a href="services.php?id=1">Logo Design</a>
                        </li>
                        <li class="py-2">
                            <a href="services.php?id=2">Web Design</a>
                        </li>
                        <li class="py-2">
                            <a href="services.php?id=3">Video Editing</a>
                        </li>
                        <li class="py-2">
                            <a href="services.php?id=4">Digital Marketing</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer4">
                    <h6 class="footer-head">Contact</h6>
                    <hr class="mb-4 mt-0 d-inline-block " style="width:70px;">
                    <ul class="footer-links list-unstyled">
                        <li class="py-2">
                            <i class="fas fa-home mr-3"></i>17 Wattla,SriLanka
                        </li>
                        <li class="py-2">
                            <i class="far fa-envelope mr-3"></i>karmavalley2020@gmail.com
                        </li>
                        <li class="py-2">
                            <i class="fas fa-phone mr-3"></i>+94112941685
                        </li>
                        <li class="py-2">
                            <i class="fas fa-print mr-3"></i>+002233467788
                        </li>
                    </ul>
                </div>
            </div>
            <hr>
        </div>
        <div class="container pt-2 pb-3">
            <div class="row">
                <div class="col-md-8">
                    <p class="copyright-text">
                        Copyright 2020 &copy;KARMAVALLEY Pvt. Ltd. All Rights Reserved.
                    </p>
                </div>
                <div class="col-md-4">
                    <ul class="social-icons list-unstyled">
                        <li class="mr-3">
                            <a class="facebook" href="https://www.facebook.com/">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li class="mr-3">
                            <a class="twitter" href="https://twitter.com/">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li class="mr-3">
                            <a class="instagram" href="https://www.instagram.com/">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                        <li class="mr-3">
                            <a class="linkedin" href="https://www.linkedin.com/">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!---End of Footer---------------------------------------------------------->



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>