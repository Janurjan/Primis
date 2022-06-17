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

    <title>About us</title>
    <!-- add icon link -->
    <link rel="apple-touch-icon" sizes="180x180" href="http://localhost/primis/main/favicon_package_v0.16/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="http://localhost/primis/main/favicon_package_v0.16/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="http://localhost/primis/main/favicon_package_v0.16/favicon-16x16.png">
    <link rel="manifest" href="http://localhost/primis/main/favicon_package_v0.16/site.webmanifest">
    <link rel="mask-icon" href="http://localhost/primis/main/favicon_package_v0.16/safari-pinned-tab.svg" color="#12333d">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <style>
        .container1
        {
            background: url(Images/about.jpg);
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            height: 75vh;
            width: 100%;
            padding: 6em;
            
        }

        .about-intro{
            color: white;
            margin-top: 3em;
        }

        .about-heading1{
            font-size: 1.75em;;
        }

        .about-heading2{
            font-size: 2.5em;
            font-weight: 600;
            padding-bottom: .5rem;
        }

        .company-info{
            font-size: 1.5em;
            font-weight: 500;
        }

        .mission-info{
            font-size: 3.3em;
            font-weight: bold;
        }

        #culture{
            background-color: rgb(36, 11, 79);;
        }

        .culture-info{
            color: white;
        }

        .culture-heading1{
            font-size: 1.75em;
        }

        .culture-heading2{
            font-size: 3em;
            font-weight: 700;
        }

        .history-info1{
            font-size: 4em;
            font-weight: bolder;
        }

        .history-info2{
            font-size: 1.5em;
        }

        .team{
            font-size: 4em;
            color:#087F8c;
            font-weight: 600;
        }

        .p1{
            color: #999;
        }

        .p2{
            color: #999;
            font-size:1.5em;
        }
        .bio{
            padding:1.625em;
        }

        .bio-name{
            font-size: 1em;
            color: #262d3d;
            font-weight: 600;
            line-height: 1em;
        }

        .bio-speciality{
            margin-top:  0.5em;
            font-size: 0.875em;
            color: #84888e;
            line-height: 0.875em;
        }
        @media screen and (max-width: 768px){

            .about-intro{
                margin-top: 5em;
            }
            .about-heading1{
                font-size: 1.rem;
            }

            .about-heading2{
                font-size: 2.5em;
                font-weight: 600;
                padding-bottom: .5rem;
            }
            
            .company-info{
                font-size: 1.25em;
                font-weight: 500;
            }
            .mission-info{
                font-size: 3.7em;
                font-weight: bold;
            }

            .history-info1{
                font-size: 3em;
                font-weight: bolder;
            }
        }

        @media screen and (max-width: 480px) {

            .about-intro{
              margin-top: 0em;
            }
            .container1{
                height: 50vh;
            }
            .about-heading1{
                font-size: 1em;
            }
            .about-heading2{
        
                font-size: 1.75em;
                font-weight: 600;
                padding-bottom: .5em;
            }

            .company-info{
                font-size: 1.1em;
                font-weight: 500;
            }
            .container{
                padding-left: 2.5em;
                padding-right: 2.5em;
            }

            .mission-info{
                font-size: 2.5em;
                font-weight: bold;
            }

            .culture-heading2{
                font-size: 2em;
                font-weight: 700;
            }

            .history-info1{
                font-size: 2.5em;
                font-weight: bolder;
            }

            .history-info2{
                font-size: 1.25em;
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

    <!---Background Image-->
    <section id="background">
        <div class="container-fluid container1">   
            <div class="row ">
                <div class="col about-intro float-left">
                    <span class="about-heading1">About KarmaValley</span><br>
                    <span class="about-heading2">We empower people worldwide to live their work dream building their business from the ground up and becoming financially and professionally independent.</span>
                </div>
            </div>    
        </div>
    </section>
    <!---------------------------------------------------------------------------------------->

    <!---Company Information-->
    <section id="Company">
        <div class="container py-5 mt-5">
            <div class="row text-justify ">
                <p class="p1">Our Company</p>
                <span class="company-info">We are a global workforce solutions company that helps organizations find, grow, and support their most valuable resource people. 
                    More than 2 years ago, we invented the creative and marketing staffing specialty and continue to be the largest in the world. 
                    By challenging conventional wisdom, we continuously innovate across talent, services, and technology within the creative space and beyond.</span>
            </div>
        </div>
    </section>
    <!---------------------------------------------------------------------------------------->

    <!---Misssion Information-->
    <section id="mission">
        <div class="container py-5">
            <div class="row text-justify">
                <p class="p1">Our mission</p>
            </div>
            <div class="row">
                <span class="mission-info">All jobs are temporary. We make them better.</span>
            </div>
        </div>
    </section>
    <!---------------------------------------------------------------------------------------->
    
    <!---Culture Information-->
    <section id="culture" class="mt-5">
        <div class="container py-5">   
            <div class="row py-5">
                <div class="col culture-info float-left">
                    <span class="culture-heading1">Our culture</span><br>
                    <span class="culture-heading2">We love what we do and collaborate every day hungry to change the world of work</span>
                </div>
            </div>    
        </div>
    </section>
    <!---------------------------------------------------------------------------------------->
    
    <!---Hsitory Information-->
    <section>
        <div class="container py-5 my-5">
            <div class="row">
                <div class="col">
                    <span class="history-info1">Our history creates our future.</span><br>
                    <span class="history-info2">We’re committed to developing breakthrough solutions, challenging how things are traditionally done, and transforming work for the better.</span>
                </div>
            </div>
        </div>
    </section>
    <!---------------------------------------------------------------------------------------->


    <section>
        <div class="container ">
            <div class="row">
                <div class="col">
                    <span class="team">Our Team</span><br><br>
                    <p class="p2">Employees</p>
                </div>
            </div>
        </div>
        <div class="container py-4">
            <?php 
                    $sql = "SELECT * FROM `employee`";
                    $result = mysqli_query($conn,$sql);
                    $count = 0;
                    if(mysqli_num_rows($result)>0){
                        while($row=mysqli_fetch_assoc($result)){
                            if($count%4==0){
                                if($count>0){
                                    echo '</div>';
                                }
                                echo "<div class='row'>";
                            }
                            $eid=$row['eid'];
                            $eimg=$row['e_img'];
                            $ename=$row['e_name'];
                            $specilaity=$row['e_speciality'];

            ?>
            <div class="col-lg-3 col-md-6">
                <div class="bio-img">
                    <img src="<?php echo $eimg;?>" class="img-fluid">
                </div>
                <div class="bio">
                    <p class="bio-name"><?php echo $ename?></p>
                    <p class="bio-speciality"><?php echo $specilaity?>
                </div>
            </div>
            <?php
                    $count++;
                }
                }else{
                    echo 'No bio';
                }
        ?>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="p2">Freelancers</p>
                </div>
            </div>
        </div>
        <div class="container py-4">
            <?php 
                    $sql2 = "SELECT * FROM `freelancer` WHERE fl_status = 'defined' ";
                    $result2 = mysqli_query($conn,$sql2);
                    $count_2 = 0;
                    if(mysqli_num_rows($result2)>0){
                        while($row=mysqli_fetch_assoc($result2)){
                            if($count_2%4==0){
                                if($count_2>0){
                                    echo '</div>';
                                }
                                echo "<div class='row'>";
                            }
                            $fid=$row['fid'];
                            $flimg=$row['fl_img'];
                            $flname=$row['fl_name'];
                            $skill=$row['fl_skills'];

            ?>
            <div class="col-lg-3 col-md-6">
                <div class="bio-img">
                    <img src="<?php echo $flimg;?>" class="img-fluid">
                </div>
                <div class="bio">
                    <p class="bio-name"><?php echo $flname?></p>
                    <p class="bio-speciality"><?php echo $skill?>
                </div>
            </div>
            <?php
                    $count_2++;
                }
                }else{
                    echo 'No bio';
                }
        ?>
        </div>
    </section>

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