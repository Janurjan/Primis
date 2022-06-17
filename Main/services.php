<?php
    session_start();
    include('database.php');
    if(isset($_GET["id"])){
        $service=$_GET["id"];
    }
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




    <!--Services Page--->

    <div class="container py-5 ">
    <?php 
            $sql2 = "SELECT * FROM `servicebox`WHERE `sid` = $service";
            $result = mysqli_query($conn,$sql2);
            if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
                $pic1=$row['pic1'];
                $pic2=$row['pic2'];
                $pic3=$row['pic3'];
                $pic4=$row['pic4'];
                $pic5=$row['pic5'];
                $text1=$row['sb_text1'];
                $text2=$row['sb_text2'];
                $delivery=$row['delivery'];
                $revision=$row['revision'];
            }
        }
    ?>

    <?php 
            $sql = "SELECT * FROM `services` WHERE `sid`=$service";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    $id=$row['sid'];
                    $name=$row['s_name'];
                    $cover=$row['s_cover'];
                    $title=$row['s_text'];
                    $price=$row['price'];
                    }
            }
    ?>
        
        <p><h2 class="lead pb-3" style="font-size:3em"><?php echo $name ?></h2></p>
        <div class="row">
            <div class="col-lg-7 col-md pb-5">
                <img src="<?php echo $pic1;?>" id="featured">

                <div id="slide-wrapper">
                    <img id="slideLeft" class="arrow" src="Images/leftarrow.png">

                    <div id="slider">

                        <img class="img-thumbnail active" src="<?php echo $pic1;?>">
                        <img class="img-thumbnail" src="<?php echo $pic2;?>">
                        <img class="img-thumbnail" src="<?php echo $pic3;?>">
                        <img class="img-thumbnail" src="<?php echo $pic4;?>">
                        <img class="img-thumbnail" src="<?php echo $pic5;?>">
                    </div>

                    <img id="slideRight" class="arrow" src="Images/rightarrow.png">


                </div>
                        <!--Jquery for Image Slider -------->
                        <script type="text/javascript">
                            let thumbnails = document.getElementsByClassName('img-thumbnail')

                            let activeImages = document.getElementsByClassName('active')

                            for(var i=0;i<thumbnails.length;i++)
                            {
                                thumbnails[i].addEventListener('mouseover',function(){

                                    console.log(activeImages)
                                    if(activeImages.length > 0){
                                        activeImages[0].classList.remove('active')
                                    }

                                    this.classList.add('active')
                                    document.getElementById('featured').src = this.src
                                })
                            }

                            let buttonRight = document.getElementById('slideRight');
                            let buttonLeft = document.getElementById('slideLeft');

                            buttonLeft.addEventListener('click',function(){
                                document.getElementById('slider').scrollLeft -= 180
                            })

                            buttonRight.addEventListener('click',function(){
                                document.getElementById('slider').scrollLeft += 180
                            })


                        </script>
                     <!--End of Jquery for Image Slider -------->

            </div>
            <div class="col-lg-5 col-md">
                <h3 class="py-2">
                    <span>Price &nbsp; <?php echo "$$price" ?></span> 
                </h3>
                <p class="pb-3 lead"><?php echo $text1 ?></p>
                <p>
                    <img src="Images/delivery.png">
                    <span style="padding-left: 0.1em; padding-right: 1em;"><?php echo "$delivery Delivery" ?></span>
                    <img src="Images/revision.png"></img>
                    <span style="padding-left: 0.1em;"><?php echo $revision ?></span>
                </p>
                <span class="pb-3"><?php echo $text2 ?></span>
                
                 <!-- Button to Open the Modal -->
                <a href="order.php?id=<?php echo $id; ?>">
                    <button type="button" class="btn btn-success btn-lg mt-3" value="Continue" style="width: 100%;">
                        Continue&nbsp;<?php echo "($$price)"?>
                    </button>
                </a>
                <a href="appointment.php?id=<?php echo $id; ?>">
                    <button type="button" class="btn btn-outline-secondary btn-lg mt-3"  style="width: 100%;">
                        Contact Employee
                    </button>
                </a>
                
            </div>
        </div>
    </div>
    <!-------End of Services Page---------------------------------------------------------------------------------->

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>