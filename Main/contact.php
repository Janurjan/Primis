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

    <title>Contact</title>
    <!-- add icon link -->
    <link rel="apple-touch-icon" sizes="180x180" href="http://localhost/primis/main/favicon_package_v0.16/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="http://localhost/primis/main/favicon_package_v0.16/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="http://localhost/primis/main/favicon_package_v0.16/favicon-16x16.png">
    <link rel="manifest" href="http://localhost/primis/main/favicon_package_v0.16/site.webmanifest">
    <link rel="mask-icon" href="http://localhost/primis/main/favicon_package_v0.16/safari-pinned-tab.svg" color="#12333d">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <style>
        .contact-head{
            font-size: 3em;
            font-weight: 500;
            color: #087F8C;
        }
        .contact-sub{
            font-size: 1.65em;
        }

        .side-head{
            font-size:3em;
            font-weight:700;
        }

        .sidecontact-head{
            font-size:1em;
            text-transform:Uppercase;
            letter-spacing:0.125em;
        }

        .sidecontact-sub{
            color:#999;
        }

        .side-contact{
            padding-left:3em;
        }

        @media screen and (max-width: 768px)
        {
            .contact-sub{
                font-size: 1.25em;
            }

            .side-head{
                font-size:2em;
            }
            .side-contact{
                padding-left:1.5em;
            }

        }

        @media screen and (max-width: 480px)
        {
            .contact-head
            {
                font-size: 2em;
            }
            
            .contact-sub{
                font-size: 1em;
            }

            .side-head{
                font-size:2em;
            }

            .side-contact{
                margin-top:5em;
            }
        }
    </style>
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
                <span class="contact-head">Get in touch</span>
            </div>
        </div>
        <div class="row py-5">
            <div class="col text-center">
                <span class="contact-sub">Fill out the form below and a KarmaValley representative will contact you as soon as possible. For immediate assistance, please call our sales line or email our customer support.</span>
            </div>
        </div>
    </div>


    <!---Main Contact Section--->
    <div class="container mb-5">
        <div class="row ">
            <div class="col-md-8 mt-3">
                <form method="POST" action="">
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control"  placeholder="Full Name *" name="name" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col">
                            <input type="email" class="form-control" placeholder="Email *" name="email" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col">
                            <input type="text" class="form-control"  placeholder="Subject *" name="subject" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col">
                            <textarea class="form-control" name="message" placeholder="I would like to know about... *" rows="5" autocomplete="off" required></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info my-3 float-right" name="send" style="width: 150px; font-size: 1em;">Message</button>
                </form>
            </div>
            <div class="col-md-4 side-contact">
                <p class="side-head mb-5">Get Support:</p>
                <p class="sidecontact-head">Call us:</p>
                <p class="sidecontact-sub">+94112941685</p>
                <p class="sidecontact-head mt-5">Email us:</p>
                <p class="sidecontact-sub">karmavalley2020@gmail.com<p>
                <p class="sidecontact-head mt-5">Visit us:</p>
                <p class="sidecontact-sub">17 Wattla, SriLanka</p>
            </div>
        </div>
    </div>
    <!---End of Main Contact Section--------------------------------->
        <?php
            if(isset($_POST["send"]))
            {
                $name = $_POST["name"];
                $email = $_POST["email"];
                $subject = $_POST["subject"];
                $message = $_POST["message"];

                $sql = "INSERT INTO `contact`(`contact_id`,`contact_name`,`contact_email`,`contact_subject`,`contact_message`,`status`) VALUES (NULL,'$name','$email','$subject','$message','new');";
                $result = mysqli_query($conn,$sql);
                if($result>0)
                {
                    echo "<script>alert('Message Sent Successfully');</script>";
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