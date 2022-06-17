<?php
session_start();
include('database.php');
$user="";
if(isset($_SESSION["cid"])){
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!--fontawesome CDN-->
    <script src="https://kit.fontawesome.com/059aa68f35.js" crossorigin="anonymous"></script>

    <!---Extrenal CSS--->
    <link rel="stylesheet" href="style.css">

    <!-- Internal CSS -->
    <style>
        .container1
        {
            background: url(Images/home.jpeg);
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            height: 75vh;
            width: 100%;
            padding: 10em 6em;
            color: white;
        } 

        .heading1
        {
            font-size: 3.5em;
        }

        .heading2{
            font-size: 1.75rem;
        }
        .jumbotron
        {
            background: white;
        }

        .sen{
            color: white;
        }

        .servicebox{
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            cursor: pointer;
        }


        @media screen and (max-width: 768px)
        {
            .container1{
                height:50vh;
            }
        }
        @media screen and (max-width: 480px){

            .container1{
                height: 60vh
            }
            .heading1
            {
                font-size: 3em;
            }

            .heading2
            {
                font-size: 1.5rem;
            }
        }
    </style>

    <title>Karma Valley</title>
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
            <a class="navbar-brand" href="home.php"><img src="Images/logo.png" alt="Logo" ></a>
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

    <!---Background Image-->
    <div class="container-fluid container1">   
        <div class="row">
            <div class="col">
                <span class="heading1">Live your work dream</span><br>
                <span class="heading2">Our community of expert gives you the power
                    to find the right person for any project in minutes.</span>
            </div>
        </div>    
    </div>
    <!---------------------------------------------------------------------------------------->
    

    <!--Why choose us-->
    <div class="jumbotron">    
        <div class="row">
            <div class="col-12 text-center">
                <h3 class="heading3">Why choose us</h3>
                <div class="heading-underline"></div>
            </div>
        </div>
        <div class="container pt-5">
            <div class="row">
                <div class="col">
                    <img class="mx-auto d-block" src="Images/service.png" >
                    <div>
                        <h4 class="text-center">We are passionate</h4>
                        <p class="text-center">Some example text.</p>
                    </div>
                </div>
                <div class="col">
                    <img class="mx-auto d-block" src="Images/time.png">
                    <div>
                        <h4 class="text-center">We are passionate</h4>
                        <p class="text-center">Some example text.</p>
                    </div>
                </div>
                <div class="col">
                    <img class="mx-auto d-block" src="Images/heart.png">
                    <div>
                        <h4 class="text-center">We are passionate</h4>
                        <p class="text-center">Some example text.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--------------------------------------------------------------------->

    <!--Services-->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <div id="services">
                <div class="row">
                    <div class="col-12 text-center ">
                        <h3 class="heading3">Services</h3>
                        <div class="heading-underline"></div>
                    </div>
                </div>
                <?php 
                    $sql = "SELECT * FROM `services`";
                    $result = mysqli_query($conn,$sql);
                    $count = 0;
                    if(mysqli_num_rows($result)>0){
                        while($row=mysqli_fetch_assoc($result)){
                            if($count%6==0){
                                if($count>0){
                                    echo '</div>';
                                }
                                echo "<div class='row'>";
                            }
                            $id=$row['sid'];
                            $name=$row['s_name'];
                            $cover=$row['s_cover'];
                            $text=$row['s_text'];

                ?>
                    <div class="col-sm-6 pt-5">
                    <a href="services.php?id=<?php echo $id; ?>">
                        <div class="card img-fluid servicebox">
                            <img class="card-img-top" src="<?php echo $cover;?>" alt="Card image" style="width:100%; height: 18.75em;">
                            <div class="card-img-overlay">
                                <h4 class="card-text sen"><?php echo $text ?></h4>
                                <h1 class="card-title sen"><?php echo $name ?></h1>
                              </div>
                        </div>
                    </a>
                    </div>  
                    <?php
                    $count++;
                }
            }else{
                echo 'No Services';
            }
            ?>
            </div>
        </div>
    </div>
    </div>
    <!------------------------------------------------------------------------------------------------------------>

    <!-----Customer Message-->
    <div class="container-fluid mt-5">
        <div class="row py-5">
            <div class="col-lg-6">
                <img src="Images/customer.png" class="img-fluid mx-auto d-block" alt="customer" > 
            </div>
            <div class="col-lg-6 py-5">
                <blockquote class="blockquote">
                    <h2 class="text-center pb-3">"What are members saying?</h2>
                    <h4 class="text-justify" style="letter-spacing:0.1em;">Your service is wonderful. Thank you so much for making employment easy to find in such a complicated world. I love you and will surely spread the word about your service!</h4>
                    <span class="blockquote-footer text-justify" style="font-size:1em;">Lawrence B.</span>
                </blockquote>
            </div>
        </div>
    </div>
    <!-------------------------------------------------------------------------------------------------------------------------------->
    <!--Working Process-->
    <div class="jumbotron">    
        <div class="row">
            <div class="col-12 text-center">
                <h3 class="heading3">Working Process</h3>
                <div class="heading-underline"></div>
            </div>
        </div>
        <div class="container pt-5">
            <div class="row">
                <div class="col-sm-3">
                    <img class="mx-auto d-block" src="Images/idea.png">
                    <div>
                        <p class="text-center">Some example text.</p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <img class="mx-auto d-block" src="Images/process.png">
                    <div>
                        <p class="text-center">Some example text.</p>
                    </div>
                </div>
                <div class="col-sm-3">                    
                    <img class="mx-auto d-block" src="Images/development.png">
                    <div>
                        <p class="text-center">Some example text.</p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <img class="mx-auto d-block"src="Images/launch.png">
                    <div>
                        <p class="text-center">Some example text.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                            <a href="contact.php">Contact</a>
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>