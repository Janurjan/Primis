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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!--Font Awesome5 Icons-->
    <script src="https://kit.fontawesome.com/059aa68f35.js" crossorigin="anonymous"></script>


    <!---Extrenal CSS--->
    <link rel="stylesheet" href="style.css">

    <title>Order</title>
    <!-- add icon link -->
    <link rel="apple-touch-icon" sizes="180x180" href="http://localhost/primis/main/favicon_package_v0.16/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="http://localhost/primis/main/favicon_package_v0.16/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="http://localhost/primis/main/favicon_package_v0.16/favicon-16x16.png">
    <link rel="manifest" href="http://localhost/primis/main/favicon_package_v0.16/site.webmanifest">
    <link rel="mask-icon" href="http://localhost/primis/main/favicon_package_v0.16/safari-pinned-tab.svg" color="#12333d">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <!---Jquery CDN----------------------->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

    
    <!---Validation for Credit Card -------------------->
    <script>
        function validateCCNumber()
        {
            var ccnum = document.getElementById("cc-number").value;
            var arr = ccnum.split(" ");
            var num = "";
            for(i=0;i<arr.length;i++)
            {
                num = num.concat(arr[i]);
            }
            if(isNaN(num)||(num.length!=16))
            {
                alert("Please enter a Valid Credit Number");
                return false;
            }
            else
            {
                return true;
            }
            
        }

        function validateExpiryDate()
        {
            var expiryDate = document.getElementById("cc-exp").value;
            var arr = expiryDate.split("/");
            var date = new Date();
            var year = date.getFullYear();
            var mon = date.getMonth()+1;
            var expiryMon = parseInt(arr[0]);
            var expiryYear = parseInt(arr[1]);

            if ((expiryMon >12) || (expiryYear <year ) || (expiryYear == year && expiryMon <= mon))
            {
                alert("Your Credit card has expired please renew it and do the payment.");
                return false;
            }
            else
            {
                return true;
            }
        }


        function validateCCV()
        {
            var ccv = document.getElementById("cc-ccv").value;
            if(isNaN(ccv)|| (ccv.length!=3))
            {
                alert("Please enter a correct Security Code");
                return false;
            }
            else
            {
                return true;
            }

        }

        function validateholderName()
        {
            var holderName = document.getElementById("holderName").value;
            if((holderName=="") || (holderName==null))
            {
                alert("Please enter the card holder name correctly");
                return false;
            }
            else{
                return true;
            }
        }

        function Card_Validate()
        {
            if(validateCCNumber() && validateExpiryDate() && validateCCV() && validateholderName())
            {
                alert("Card Details Entered Correctly!!!");
            }
            else
            {
                event.preventDefault();
            }
        }

    </script>
    <!----End of Validation for Credit Card------------------------------------------------------------------------------------------------>

    <!----Internal CSS------------------------------------------------------------------------------------------->
    <style>
        
        /**Form CSS */
        .form-control{
            text-align: center;
        }

        .form-control:focus{

            box-shadow: 0.625em 0em 0em 0em #fff !important;
            border-color: #4ca746;
        }
        .icon-relative{
            position: relative;
        }

        .icon-relative .fas,
        .icon-relative .far{
            position: absolute;
            bottom: 0.45em;
            left: 0.9375em;
            font-size: 1.25em;
            color: #555555;
        }
        /**End of Form CSS */

    </style>
    <!---------End of Internal CSS------------------------------------------------------------------------------------------------------------>
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
    
    <!--Navigation-->
    <header>
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

    
    <!--Main Section--->
    <div class="padding my-5">
        <div class="container">
            <div class="row" id="payDetails">

            <?php
            $query = "SELECT * FROM `customer`WHERE `cid` = $user ";
            $query_run = mysqli_query($conn,$query);
            if($query_run)
            {
                foreach ($query_run as $row)
                {
                    if($row['check']=='1')
                    {
                        $sql = "SELECT * FROM `card` WHERE cid = '$user'";
                        $result = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($result)>0)
                        {
                            while($row=mysqli_fetch_assoc($result))
                            {
                                $a = $row['cc_no'];
                                $b = $row['cc_ccv'];
                                $c = $row['cc_name'];
                                $d = $row['cc_expiry'];
                            }
                        }

            ?>

                <div class="col-lg-7 mr-5">
                    <div class="mb-5">
                        <span class="lead mb-5" style="font-size:1.5em; color: #087F8C">To update your card details click on the "Hi, your name" link on the menu bar.<br>
                                        Then click on the "Card Details" section to update your card details. Thank you.
                        </span>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-6">
                                    <span>CREDIT CARD PAYMENT</span>
                                </div>
                                <div class="col-lg-6 text-right">
                                    <img src="Images/visa.png">
                                    <img src="Images/mastercard.png">
                                    <img src="Images/amex.png">

                                </div>
                            </div>
                        </div>
                        <!---Credit Card Form ----------------->
                        <form>
                            <div class="card-body">
                                <div class="form-group icon-relative">
                                    <label for="cc-number" class="control-label">CARD NUMBER</label>
                                    <input type="text" id="cc-number" class="input-lg form-control " value="<?php echo $a; ?>"
                                    name="cc-number" data-mask="0000 0000 0000 0000" autocomplete="off"  disabled>
                                    <i class="far fa-credit-card "></i>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group icon-relative">
                                            <label for="cc-exp" class="control-label">CARD EXPIRY</label>
                                            <input type="text" id="cc-exp" class="input-lg form-control " value="<?php echo $d; ?>" name="cc-exp" data-mask="00 / 0000" autocomplete="off" disabled>
                                            <i class="far fa-calendar-alt"></i>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group icon-relative">
                                            <label for="cc-ccv" class="control-label">CARD CVC</label>
                                            <input type="text" id="cc-ccv" class="input-lg form-control " autocomplete="off" value="<?php echo $b; ?>" name="cc-ccv" data-mask="000" disabled>
                                            <i class="fas fa-lock"></i>
                                        </div>
                                    </div> 
                                </div>

                                <div class="form-group icon-relative">
                                    <label for="holderName" class="control-label">CARD HOLDER NAME</label>
                                    <input type="text" id="holderName" class="input-lg form-control" autocomplete="off" name="holderName" value="<?php echo $c; ?>" disabled>
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                        </form>    
                    </div>
                </div>
                <?php
                    }
                    else
                    {
                            
                ?>
                <div class="col-lg-7 mr-5">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-6">
                                    <span>CREDIT CARD PAYMENT</span>
                                </div>
                                <div class="col-lg-6 text-right">
                                    <img src="Images/visa.png">
                                    <img src="Images/mastercard.png">
                                    <img src="Images/amex.png">

                                </div>
                            </div>
                        </div>
                        <!---Credit Card Form ----------------->
                        <form method="post" action="">
                            <div class="card-body">
                                <div class="form-group icon-relative">
                                    <label for="cc-number" class="control-label">CARD NUMBER</label>
                                    <input type="text" id="cc-number" class="input-lg form-control "  placeholder="**** **** **** **** ****" 
                                    name="cc-number" data-mask="0000 0000 0000 0000" autocomplete="off" required>
                                    <i class="far fa-credit-card "></i>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group icon-relative">
                                            <label for="cc-exp" class="control-label">CARD EXPIRY</label>
                                            <input type="text" id="cc-exp" class="input-lg form-control "  placeholder="MM / YYYY" name="cc-exp" data-mask="00 / 0000" autocomplete="off" required>
                                            <i class="far fa-calendar-alt"></i>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group icon-relative">
                                            <label for="cc-ccv" class="control-label">CARD CVC</label>
                                            <input type="text" id="cc-ccv" class="input-lg form-control " autocomplete="off" placeholder="***" name="cc-ccv" data-mask="000" required>
                                            <i class="fas fa-lock"></i>
                                        </div>
                                    </div> 
                                </div>

                                <div class="form-group icon-relative">
                                    <label for="holderName" class="control-label">CARD HOLDER NAME</label>
                                    <input type="text" id="holderName" class="input-lg form-control" autocomplete="off" name="holderName" placeholder="YOUR NAME ON CARD " required>
                                    <i class="fas fa-user"></i>
                                </div>

                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary btn-lg form-control" value="Save" onclick="Card_Validate()" name="card">
                                </div>

                            </div>
                        </form>
                        
                    </div>
                </div>
                <?php
                            }
                        }
                    }
                ?>

                <!--Php code for creadit card inserting--->
                <?php
                    if(isset($_POST["card"]))
                    {

                        $cc_no = $_POST["cc-number"];
                        $cc_exp = $_POST["cc-exp"];
                        $cc_ccv = $_POST["cc-ccv"];
                        $cc_name = $_POST["holderName"];
                        $sql11= "UPDATE `customer` SET `check` = '1' WHERE `cid` = '$user';";
                        $result11= mysqli_query($conn,$sql11);
                        $sql3 = "INSERT INTO `card` (`cc_id`, `cid`, `cc_no`, `cc_ccv`, `cc_expiry`,`cc_name`) VALUES (NULL, '$user', '$cc_no', '$cc_ccv', '$cc_exp', '$cc_name');";
                        $result2 = mysqli_query($conn,$sql3);
                        if($result2>0)
                        {
                            echo "<script>alert('Saved Successfully');</script>";
                        }            
                    }
                ?>
                <!----End of Php code for creadit card inserting ------------------------->

            
                
                <!--Php code for retrieving the service box details ---->
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
                <!--End of Php code for retrieving the service box details ---->

                <!---Php code for retrieving the service details ----->
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
                <!--- End of Php code for retrieving the service details ---->

                
                <!----Total Amount Display Section ------>
                <div class="col-lg-4">
                    <div class="card mb-5">

                        <div>
                            <img src="<?php echo $pic1;?>" class="img-fluid mx-auto d-block">
                        </div>

                        <div class="my-3 mx-3">
                            <span class="lead" style="padding-right: 6.5em;"><?php echo $name; ?></span>
                            <span class="lead"><?php echo "$$price"?></span>
                        </div>

                        <div class="mx-3">
                            <?php echo $text2; ?>
                            <hr>
                        </div>

                        <div class="mx-3"> 
                            <span  style="padding-right: 8.5em; font-size: large;">Service Fee</span>
                            <span class="lead">$5</span>
                            <hr>
                        </div>

                        <div class="mx-3 mb-3" style="font-size: 1.5em; font-weight: bold;">
                            <span style="padding-right: 7.5em;">Total</span>
                            <span>
                            <!--Calculating Total Amount Section------>
                            <?php $total = $price +  5;
                                echo "$$total";
                            ?>
                            <!--End of Calculating Total Amount Section---->
                            </span>
                        </div>

                        <div class="mx-3 mb-4" style="font-size: large;">
                            <span style="padding-right: 5em;">Total Delivery Time</span>
                            <span><?php  echo $delivery?></span>
                        </div>

                        <div class="mx-3">
                            <form method="post" action="">
                                <input type="submit" class="btn btn-success btn-block" name="payment" value="Confirm & Pay" id="payBtn">
                            </form> 
                        </div>

                        <div class=" mt-3 mb-5 mx-3 text-center" style="font-size: medium; color: #463F57;">
                            <i class="far fa-calendar-alt"></i>
                            <span>SSL Secure Payment</span>
                        </div>

                    </div>
                </div>
                <!--- End of Total Amount Display Section --->

                <!---Php code for File Uploading------------>
                <?php
            
                    if(isset($_POST["payment"]))
                    {   

                        $date = date("Y/m/d");

                        $sql4 = "INSERT INTO `job`(`job_id`,`cid`,`sid`,`total`,`date`,`status1`)VALUES (NULL,'$user','$service','$total','$date','Paid');";
                        $result4 = mysqli_query($conn,$sql4);
                        if($result4>0)
                        {
                            echo "<script>alert('Paid Successfully');</script>";
                        }
                        else
                        {
                            echo("Error description: " . mysqli_error($conn));
                        }     
                        
                    }
                ?>
                <!--------End of Php code for File Uploading-------------------------------------------------------------------------------------->
            
            </div>
        </div>
    </div>


    <!--Jquery cdn for File uploading----->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <!--End of Jquery cdn for File uploading----->


    <!--File Upload Form ------------>
    <div class="padding my-5" id="docx">
        <div class="container">
            <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <span>REQUIREMENT GATHERING</span>
                            </div>
                            <div class="card-body">
                                <form method="post" enctype="multipart/form-data" action="">
                                    <p class="lead">Attach the document with your requirements for the order/project</p>
                                    <div class="custom-file my-3">
                                    <input type="file" class="custom-file-input" id="file" name="file">
                                    <label class="custom-file-label" for="file">Choose file</label>
                                    </div>
                                    <input type="submit" class="btn btn-primary btn-lg float-right " value="Submit" name="requirement">
                                </form>
                                <?php
                            
                                    if(isset($_POST["requirement"]))
                                    {
                                        $file_name = $_FILES['file']['name'];
                                        $file_size =$_FILES['file']['size'];
                                        $file_tmp =$_FILES['file']['tmp_name'];
                                        $file_type=$_FILES['file']['type'];

                                        $tmp = explode('.', $file_name);
                                        $file_ext = end($tmp);

                                        $extensions= array("jpeg","jpg","png","doc","docx");
                                        
                                        if(in_array($file_ext,$extensions)=== false)
                                        {
                                           $errors[]="Upload only Images or Word Documents";
                                        }


                                        if(empty($errors)==true)
                                        {
                                            move_uploaded_file($file_tmp,"uploads/".$file_name);

                                        }
                                        else
                                        {
                                            print_r($errors);
                                        }
                                        
                                        
                                        $details = "localhost/primis/Main/uploads/".$file_name;
                                    
                                        $sql= "UPDATE `job` SET `doc_path` = '$details',`status2` = 'Not Accepted' WHERE `cid` = '$user' and `sid` = '$service';";
                                        
                                        $result5 = mysqli_query($conn,$sql);
                                        if($result5>0)
                                        {
                                            echo "<script>alert('File Uploaded Successfully & Check Your Job in My Account Section!');</script>";
                                            //  header('Location:http://localhost/primis/Main/myaccount.php');
                                        }
                                        
                                        else
                                        {
                                            echo("Error description: " . mysqli_error($conn));
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!----End of file upload form ----------------------------------------------------------------------------------------------------------------------------------->

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

    
      
    <!--Jquery for showing the file name in file uploading--------------------->  
    <script>
      // Add the following code if you want the name of the file appear on select
      $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
      });
    </script>
    <!--End of Jquery for showing the file name in file uploading--------------------->  
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>