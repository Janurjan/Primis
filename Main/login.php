<?php
    include('database.php');
    session_start();
?>
<?php
$error = "";
    if(isset($_POST["aLogin"]))
    {
        $email = $_POST["email"];
        $password = $_POST["password"];
        
        $valid1 = false;
        $valid2 = false;
        $valid3 = false;
        $valid4 = false;
        $valid5 = false;

        $sql = "SELECT * FROM `admin` WHERE `a_email`= '$email' and `a_password` = '$password'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) >0)
		{
            $valid1 = true;
        }

        $sql2 ="SELECT * FROM `employee` WHERE `e_email`='$email' and `e_password`='$password'";
        $result2 = mysqli_query($conn,$sql2);
        if(mysqli_num_rows($result2)>0)
        {
            $valid2 = true;
        }

        $sql3 = "SELECT * FROM `customer` WHERE `c_email`= '$email' and `c_pwd` = '$password'";
        $result3 = mysqli_query($conn,$sql3);
        if(mysqli_num_rows($result3) >0)
		{
            $valid3 = true;
        }

        $sql4="SELECT * FROM `freelancer` WHERE `fl_email`='$email' and `fl_password`='$password' and `fl_status` = 'defined'";
        $result4 = mysqli_query($conn,$sql4);
        if(mysqli_num_rows($result4)>0)
        {
            $valid4 = true;
        }

        $sql5="SELECT * FROM `freelancer` WHERE `fl_email`='$email' and `fl_password`='$password' and `fl_status` = 'undefined'";
        $result5 = mysqli_query($conn,$sql5);
        if(mysqli_num_rows($result5)>0)
        {
            $valid5 = true;
        }


        if($valid1)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                $name=$row['a_name'];
                $id = $row['aid'];
            }
            $_SESSION["a_name"] = $name;
            $_SESSION["aid"] = $aid;
            if(isset($_POST['rememberme'])){
                setcookie('emailcookie',$email,time()+86400);
                setcookie('passwordcookie',$password,time()+86400);
            header('Location:http://localhost/primis/Admin/index.php');
            }else
            header('Location:http://localhost/primis/Admin/index.php');
		    $error = "Credentials Correct";
        }

        elseif ($valid2) 
        {
            while($row=mysqli_fetch_assoc($result2))
            {
                $name=$row['e_name'];
                $id = $row['eid'];
            }
            $_SESSION["e_name"] = $name;
            $_SESSION["eid"] = $eid;
            if(isset($_POST['rememberme'])){
                setcookie('emailcookie',$email,time()+86400);
                setcookie('passwordcookie',$password,time()+86400);
            header('Location:http://localhost/primis/Employee/index.php');
            }else
            header('Location:http://localhost/primis/Employee/index.php');
		    $error = "Credentials Correct";
        }

        elseif ($valid3) 
        {
            while($row=mysqli_fetch_assoc($result3))
            {
                $name=$row['c_name'];
                $cid = $row['cid'];
            }
            $_SESSION["c_name"] = $name;
            $_SESSION["cid"] = $cid;
            if(isset($_POST['rememberme'])){
                setcookie('emailcookie',$email,time()+86400);
                setcookie('passwordcookie',$password,time()+86400);
            header('Location:http://localhost/primis/main/home.php');
            }else
            header('Location:http://localhost/primis/main/home.php');
		    $error = "Credentials Correct";
        }

        elseif ($valid4) 
        {
            while($row=mysqli_fetch_assoc($result4))
            {
                $name=$row['fl_name'];
                $id = $row['fid'];
            }
            $_SESSION["fl_name"] = $name;
            $_SESSION["fid"] = $fid;
            if(isset($_POST['rememberme'])){
                setcookie('emailcookie',$email,time()+86400);
                setcookie('passwordcookie',$password,time()+86400);
            header('Location:http://localhost/primis/Freelancer/index.php');
            }else
            header('Location:http://localhost/primis/Freelancer/index.php');
		    $error = "Credentials Correct";
        }

        elseif ($valid5) 
        {
            echo "<script>alert('Your sign-up request shall be authorized by the Admin. Visit us a little later,sorry for the inconvience')</script>";
        }

        else
        {
            $error ="Incorrect Email or Password";
        }
        mysqli_close($conn);
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

    <title>Login</title>
    <!-- add icon link -->
    <link rel="apple-touch-icon" sizes="180x180" href="http://localhost/primis/main/favicon_package_v0.16/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="http://localhost/primis/main/favicon_package_v0.16/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="http://localhost/primis/main/favicon_package_v0.16/favicon-16x16.png">
    <link rel="manifest" href="http://localhost/primis/main/favicon_package_v0.16/site.webmanifest">
    <link rel="mask-icon" href="http://localhost/primis/main/favicon_package_v0.16/safari-pinned-tab.svg" color="#12333d">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <style>


        body{
            /*padding-top: 25vh;*/
        }
        .form-container
        {
            padding: 1.875em;
        }
        .forgotpwd
        {
            padding-left: 7em;
        }
        .incorrect{
            color: red;
        }
    </style>
  </head>
  <body>
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
                        <li class="nav-item">
                            <a class="nav-link" href="login.php" style="text-transform:none;">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="signup.php" style="text-transform:none;">SignUp</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!--End of Navigation Bar-->

        
        <!---Heading ------>
        <div class="container mt-5">
            <div class="row text-center">
                <div class="col">
                    <span style="font-size:2.5em; color:#463F57">Login</span>
                </div>
            </div>
        </div>
        <!------------------------------------------------------------------->


        

        <!---Login Form----->
        <section class="container-fluid mb-5 pb-5">
            <section class="row justify-content-center">
                <section class="col-12 col-sm-6 col-lg-4">
                    <form class="form-container" method="post" action="login.php">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Email address</label>
                          <input type="email" class="form-control" id="InputEmail" name="email" value="<?php if(isset($_COOKIE['emailcookie'])) {echo $_COOKIE['emailcookie'];} ?>" aria-describedby="emailHelp" placeholder="Enter email" autocomplete="off" autofocus required>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Password</label>
                          <input type="password" class="form-control" id="InputPassword" name="password" value="<?php if(isset($_COOKIE['passwordcookie'])) {echo $_COOKIE['passwordcookie'];} ?>" placeholder="Password" autocomplete="off" required>
                        </div>
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" id="rememberme" name="rememberme">
                          <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                        </div>
                        <span class="incorrect"><?php echo $error; ?></span><br/>
                        <button type="submit" class="btn btn-primary btn-block"  name="aLogin">Login</button>
                        <div class="form-group my-4 text-center">
                            <a href="signup.php"><span>Register to an account?</span></a>
                        </div>
                      </form>
                </section>
            </section>
        </section>
        <!--------------------------------------------------------------------------------------------------->

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
                                <a href="contact.php">Appointment</a>
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