<?php
session_start();
include('database.php');
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


    <!---Jquery CDN----------------------->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>


    <!---Extrenal CSS--->
    <link rel="stylesheet" href="style.css">

    <title>My Account</title>
    <!-- add icon link -->
    <link rel="apple-touch-icon" sizes="180x180" href="http://localhost/primis/main/favicon_package_v0.16/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="http://localhost/primis/main/favicon_package_v0.16/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="http://localhost/primis/main/favicon_package_v0.16/favicon-16x16.png">
    <link rel="manifest" href="http://localhost/primis/main/favicon_package_v0.16/site.webmanifest">
    <link rel="mask-icon" href="http://localhost/primis/main/favicon_package_v0.16/safari-pinned-tab.svg" color="#12333d">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <style>
        .para1{
            color:  rgba(0, 0, 0, .6);
            font-size: 1.5em;
        }

        .account-head{
            font-size:2.5em;
        }

        @media screen and (max-width: 768px){
        .para1{
                font-size: 1.25em !important;
            }
        
        }

        @media screen and (max-width: 480px) {
            .para1{
                font-size: 1em !important;
            }
        }
        
        .bt{
            width:100%;
        } 
    </style>
  </head>
  <body data-spy="scroll" data-target="#navbarResponsive">
  <?php
    
    $sql1 = "SELECT * FROM `customer` WHERE `cid` = '$user'";
    $result1 = mysqli_query($conn,$sql1);
        if(mysqli_num_rows($result1)>0)
        {
          while($row=mysqli_fetch_assoc($result1))
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

    <div class="container my-5">
        <div class="row">
            <div class="col text-center">
                <span class="account-head" style="color:#087F8C">My Account</span>
            </div>
        </div>
    </div>
    
    <div class="container my-5 py-5">
        <div class="row">
            <div class="col-sm-2 col-lg col-md my-3">
                <button type="button" class="btn btn-outline-dark btn-lg bt" data-toggle="collapse" data-target="#general">General</button>
            </div>
            <div class="col-sm-2 col-lg col-md my-3">
                <button type="button" class="btn btn-outline-dark btn-lg bt" data-toggle="collapse" data-target="#myCard">Card Deatils</button>
            </div>
            <div class="col-sm-2 col-lg col-md my-3">
                <button type="button" class="btn btn-outline-dark btn-lg bt" data-toggle="collapse" data-target="#myJobs">My Jobs</button>
            </div>
            <div class="col-sm-2 col-lg col-md my-3">
                <button type="button" class="btn btn-outline-dark btn-lg bt" data-toggle="collapse" data-target="#myAppointments">My Appointments</button>
                
            </div>
            <div class="col-sm-2 col-lg col-md my-3">
                <a href="logout.php" class="btn btn-outline-danger btn-lg float-right bt" role="button">Log out</a> 
            </div>
        </div>
    </div>


<!----Displaying General Information ------->
<?php
    $query1 = "SELECT * FROM  customer WHERE `cid` = $user ";
    $query_run1 = mysqli_query($conn,$query1);
    if($query_run1)
    {
        foreach ($query_run1 as $row)
        {
?>
            <div class="collapse" id="general">
                <div class="container">
                    <div class="row my-5 ">
                        <div class="col">
                            <span class="para1">Name</span>
                        </div>
                        <div class="col">
                            <span class="lead para1"><?php echo $row['c_name']; ?></span>
                        </div>
                        <div class="col text-center">
                            <button type="button" class="btn btn-outline-secondary btn-md" data-toggle="modal" data-target="#nameModal">Edit</button>
                        </div>
                    </div>
                    <div class="row my-5 ">
                        <div class="col">
                            <span class="para1">Email</span>
                        </div>
                        <div class="col">
                            <span class="lead para1"><?php echo $row['c_email']; ?></span>
                        </div>
                        <div class="col text-center">
                            <button type="button" class="btn btn-outline-secondary btn-md" data-toggle="modal" data-target="#emailModal">Edit</button>
                        </div>
                    </div>
                    <div class="row my-5 ">
                        <div class="col">
                            <span class="para1">Password</span>
                        </div>
                        <div class="col">
                            <span class="lead para1"><?php echo $row['c_pwd']; ?></span>
                        </div>
                        <div class="col text-center">
                            <button type="button" class="btn btn-outline-secondary btn-md " data-toggle="modal" data-target="#pwdModal">Edit</button>
                        </div>
                    </div>
                    <div class="row my-5 ">
                        <div class="col">
                            <span class="para1">Address</span>
                        </div>
                        <div class="col">
                            <span class="lead para1"><?php echo $row['c_address']; ?></span>
                        </div>
                        <div class="col text-center">
                            <button type="button" class="btn btn-outline-secondary btn-md"data-toggle="modal" data-target="#addressModal">Edit</button>
                        </div>
                    </div>
                    <div class="row my-5 ">
                        <div class="col">
                            <span class="para1">Phone Number</span>
                        </div>
                        <div class="col">
                            <span class="lead para1"><?php echo $row['c_number']; ?></span>
                        </div>
                        <div class="col text-center">
                            <button type="button" class="btn btn-outline-secondary btn-md" data-toggle="modal" data-target="#numberModal">Edit</button>
                        </div>
                    </div>
            
                </div>
            </div>

            
<?php
        }
    }
?>
<!---------------------------------------------------------------------------------------------------------------------------------------------------------->


<!-- Update Username Modal -->
<div class="modal fade" id="nameModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="post" action="">      
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Update UserName</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
            
                <!-- Modal body -->
                
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name">
                    </div>
                </div>
                
            
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="updateName" class="btn btn-primary">Save Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Update Username Modal --------------------------------------------------------------------------------------->


<!---Php Code for updating UserName ----->
<?php
    if(isset($_POST['updateName']))
    {
        $name = $_POST['name'];
        $sql2 = "UPDATE customer SET `c_name`='$name' WHERE `cid`=$user";
        if ($conn->query($sql2) === TRUE) {
            echo "<script>alert('UserName updated successfully');</script>";
            //header('Location:http://localhost/primis/Main/account.php');
        
        } else {
            echo "Error updating record: " . $conn->error;
        }

    }
?>
<!---End of Php Code for updating UserName ------------------------------------------------------->






<!-- Update Email Modal -->
<div class="modal fade" id="emailModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="post" action="">      
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Update Email</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
            
                <!-- Modal body -->
                
                <div class="modal-body">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email">
                    </div>
                </div>
                
            
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="updateEmail" class="btn btn-primary">Save Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Update Email Modal ------------------------------------------------------------------------------------->


<!---Php Code for updating Email ----->
<?php
    if(isset($_POST['updateEmail']))
    {
        $email = $_POST['email'];
        $sql3 = "UPDATE customer SET `c_email`='$email' WHERE `cid`=$user";
        if ($conn->query($sql3) === TRUE) {
            echo "<script>alert('Email updated successfully');</script>";
            //header('Location:http://localhost/primis/Main/account.php');
        
        } else {
            echo "Error updating record: " . $conn->error;
        }

    }
?>
<!---End of Php Code for updating Email ------------------------------------------------------->






<!--  Update Password Modal -->
<div class="modal fade" id="pwdModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="post" action="">      
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Update Password</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
            
                <!-- Modal body -->
                
                <div class="modal-body">
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="pwd" id="pwd" class="form-control" placeholder="Enter Password">
                    </div>
                </div>
                
            
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="updatePwd" class="btn btn-primary">Save Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Update Password Modal ------------------------------------------------------------------------------------------>


<!---Php Code for updating Password ----->
<?php
    if(isset($_POST['updatePwd']))
    {
        $pwd = $_POST['pwd'];
        $sql4 = "UPDATE customer SET `c_pwd`='$pwd' WHERE `cid`=$user";
        if ($conn->query($sql4) === TRUE) {
            echo "<script>alert('Password updated successfully');</script>";
            //header('Location:http://localhost/primis/Main/account.php');
        
        } else {
            echo "Error updating record: " . $conn->error;
        }

    }
?>
<!---End of Php Code for updating Password ------------------------------------------------------->







<!-- Update Address Modal -->
<div class="modal fade" id="addressModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="post" action="">      
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Update Address</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
            
                <!-- Modal body -->
                
                <div class="modal-body">
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" id="address" class="form-control" placeholder="Enter Address">
                    </div>
                </div>
                
            
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="updateAddress" class="btn btn-primary">Save Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Update Address Modal ------------------------------------------------------------------------------------------->


<!---Php Code for updating Address ----->
<?php
    if(isset($_POST['updateAddress']))
    {
        $address = $_POST['address'];
        $sql5 = "UPDATE customer SET `c_address`='$address' WHERE `cid`=$user";
        if ($conn->query($sql5) === TRUE) {
            echo "<script>alert('Address updated successfully');</script>";
            //header('Location:http://localhost/primis/Main/account.php');
        
        } else {
            echo "Error updating record: " . $conn->error;
        }

    }
?>
<!---End of Php Code for updating Address --------------------------------->





<!-- Update Phone Number Modal -->
<div class="modal fade" id="numberModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="post" action="">      
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
            
                <!-- Modal body -->
        
                <div class="modal-body">
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" name="number" id="number" class="form-control" placeholder="Enter Phone Number">
                    </div>
                </div>
                
            
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="updateNumber" class="btn btn-primary">Save Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Update Phone Number Modal --------------------------------------------------------------------------------------->


<!---Php Code for updating Phone Number ----->
<?php
    if(isset($_POST['updateNumber']))
    {
        $number = $_POST['number'];
        $sql6 = "UPDATE customer SET `c_number`='$number' WHERE `cid`=$user";
        if ($conn->query($sql6) === TRUE) {
            echo "<script>alert('Phone Number updated successfully');</script>";
            //header('Location:http://localhost/primis/Main/account.php');
        
        } else {
            echo "Error updating record: " . $conn->error;
        }

    }
?>
<!---End of Php Code for updating Phone Number -------------------------------------------->
<!----#########################################################################################################################--->


<!-----Credit Card Details Button------------------------------->

<?php
    $query2 = "SELECT * FROM  `card` WHERE `cid` = $user ";
    $query_run2 = mysqli_query($conn,$query2);
    if($query_run2)
    {
        foreach ($query_run2 as $row)
        {
?>
    <div class="collapse" id="myCard">
        <div class="container">

            <div class="row my-5 ">
                <div class="col">
                    <span class="para1">Card Holder Name</span>
                </div>
                <div class="col">
                    <span class="lead para1"><?php echo $row['cc_name']; ?></span>
                </div>
                <div class="col text-center">
                    <button type="button" class="btn btn-outline-secondary btn-md" data-toggle="modal" data-target="#holderName">Edit</button>
                </div>
            </div>
    
            <div class="row my-5 ">
                <div class="col">
                    <span class="para1">Credit Card Number</span>
                </div>
                <div class="col">
                    <span class="lead para1"><?php echo $row['cc_no']; ?></span>
                </div>
                <div class="col text-center">
                    <button type="button" class="btn btn-outline-secondary btn-md " data-toggle="modal" data-target="#cardNumber">Edit</button>
                </div>
            </div>

            <div class="row my-5 ">
                <div class="col">
                    <span class="para1">Card Security code</span>
                </div>
                <div class="col">
                    <span class="lead para1"><?php echo $row['cc_ccv']; ?></span>
                </div>
                <div class="col text-center">
                    <button type="button" class="btn btn-outline-secondary btn-md"data-toggle="modal" data-target="#securityCode">Edit</button>
                </div>
            </div>

            <div class="row my-5 ">
                <div class="col">
                    <span class="para1">Expiry Date</span>
                </div>
                <div class="col">
                    <span class="lead para1"><?php echo $row['cc_expiry']; ?></span>
                </div>
                <div class="col text-center">
                    <button type="button" class="btn btn-outline-secondary btn-md" data-toggle="modal" data-target="#expiryDate">Edit</button>
                </div>
            </div>
            
        </div>
    </div>          
<?php
        }
    }
?>
<!---------End of Card Details Button---------------------------------------------------------------------------------------------------------------------------------------->


<!-- Update HolderName Modal -->
<div class="modal fade" id="holderName">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="post" action="">      
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Update your credit card holder name</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
            
                <!-- Modal body -->
                
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="holder_name" id="holder_name" class="form-control" placeholder="Enter Name">
                    </div>
                </div>
                
            
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="updateholderName" class="btn btn-primary">Save Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Update holderName Modal --------------------------------------------------------------------------------------->


<!---Php Code for updating card holdername ----->
<?php
    if(isset($_POST['updateholderName']))
    {
        $cc_name = $_POST['holder_name'];
        $sql7 = "UPDATE `card` SET `cc_name`='$cc_name' WHERE `cid`=$user";
        if ($conn->query($sql7) === TRUE) {
            echo "<script>alert('Your Credit Card Holder Name updated successfully');</script>";
            //header('Location:http://localhost/primis/Main/account.php');
        
        } else {
            echo "Error updating record: " . $conn->error;
        }

    }
?>
<!---End of Php Code for updating card holdername ------------------------------------------------------->



<!-- Update Credit Card Number Modal -->
<div class="modal fade" id="cardNumber">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="post" action="">      
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Update your credit card number</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
            
                <!-- Modal body -->
                
                <div class="modal-body">
                    <div class="form-group">
                        <label>Credit Card Number</label>
                        <input type="text" name="card_number" id="card_number" class="form-control" placeholder="Enter Credit Card Number" data-mask="0000 0000 0000 0000" autocomplete="off">
                    </div>
                </div>
                
            
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="updatecardNumber" class="btn btn-primary">Save Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Update Credit Card Number Modal --------------------------------------------------------------------------------------->


<!---Php Code for updating Credit Card Number ----->
<?php
    if(isset($_POST['updatecardNumber']))
    {
        $cc_no = $_POST['card_number'];
        $sql8 = "UPDATE `card` SET `cc_no`='$cc_no' WHERE `cid`=$user";
        if ($conn->query($sql8) === TRUE) {
            echo "<script>alert('Your Credit Card Number updated successfully');</script>";
            //header('Location:http://localhost/primis/Main/account.php');
        
        } else {
            echo "Error updating record: " . $conn->error;
        }

    }
?>
<!---End of Php Code for updating Credit Card Number ------------------------------------------------------->



<!-- Update Security Code Modal -->
<div class="modal fade" id="securityCode">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="post" action="">      
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Update your credit card security code</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
            
                <!-- Modal body -->
                
                <div class="modal-body">
                    <div class="form-group">
                        <label>Security Code</label>
                        <input type="text" name="security_code" id="security_code" class="form-control" placeholder="Enter Credit Card Security Code">
                    </div>
                </div>
                
            
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="updateSecurityCode" class="btn btn-primary">Save Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Update Security Code Modal --------------------------------------------------------------------------------------->


<!---Php Code for updating Security Code ----->
<?php
    if(isset($_POST['updateSecurityCode']))
    {
        $cc_cvc = $_POST['security_code'];
        $sql9 = "UPDATE `card` SET `cc_ccv`='$cc_cvc' WHERE `cid`=$user";
        if ($conn->query($sql9) === TRUE) {
            echo "<script>alert('Your Credit Card Security Code updated successfully');</script>";
            //header('Location:http://localhost/primis/Main/account.php');
        
        } else {
            echo "Error updating record: " . $conn->error;
        }

    }
?>
<!---End of Php Code for updating Security Code ------------------------------------------------------->



<!-- Update Expiry Date Modal -->
<div class="modal fade" id="expiryDate">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="post" action="">      
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Update your credit card expiry date</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
            
                <!-- Modal body -->
                
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="expiry_date" id="expiry_date" class="form-control" placeholder="Enter Expiry Date">
                    </div>
                </div>
                
            
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="update_expiryDate" class="btn btn-primary">Save Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Update Expiry Date Modal --------------------------------------------------------------------------------------->


<!---Php Code for updating expiry Date ----->
<?php
    if(isset($_POST['update_expiryDate']))
    {
        $cc_date = $_POST['expiry_date'];
        $sql10 = "UPDATE `card` SET `cc_expiry`='$cc_date' WHERE `cid`=$user";
        if ($conn->query($sql10) === TRUE) {
            echo "<script>alert('Your Credit Card Expiry Date updated successfully');</script>";
            //header('Location:http://localhost/primis/Main/account.php');
        
        } else {
            echo "Error updating record: " . $conn->error;
        }

    }
?>
<!---End of Php Code for updating expiry Date ------------------------------------------------------->

<!-----#################################################################################################---------------------------------->



<!-----My Jobs Button Section -------->
    <div class="collapse" id="myJobs">
        <div class="container my-5">
            <div class="row">
                <div class="col">
                    <span class="lead para1" style="color:#087F8C">Dear Customer, We Will Accept your job very soon.Once we accept your job we will display the accepted date in your job details and from that date on words, we submit your jobs with in delivery time.
                            We delivery your job through your email. Once we submitted to you, we will displayed it as Finished status in that particular job. Thank You!.
                    </span>
                </div>
            </div>
            <?php 
                $sql11 = "SELECT * FROM `job` WHERE `cid` = '$user' and `status1` = 'Paid'";
                    $result11 = mysqli_query($conn,$sql11);
                    $count = 0;
                    $num =0;
                    if(mysqli_num_rows($result11)>0){
                        while($row=mysqli_fetch_assoc($result11)){
                            if($count%1==0){
                                if($count>0){
                                    echo '</div>';
                                }
                                echo "<div class='row'>";
                                $num++;
                            }
                            $jid=$row['job_id'];
                            $sid=$row['sid'];
                            $date=$row['date'];
                            $total=$row['total'];
                            $status=$row['status2'];
                            $acpt_date = $row['acpt_date'];
                            $status_2 = $row['status3'];
                            $finish_date = $row['finish_date'];


        
            ?>

            <?php
                $sql12 = "SELECT * FROM `services` WHERE `sid` = '$sid'";
                $result12 = mysqli_query($conn,$sql12);
                if(mysqli_num_rows($result12)>0)
                {
                    while($row=mysqli_fetch_assoc($result12))
                    {
                        $sname = $row['s_name'];
                    }

                }
            ?>

                <div class="col-sm pt-5">
                    <div class="card ">
                        <div class="card-header">
                            <h3>Job <?php echo $num ?></h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <P class="lead py-1 para1">Service Name :&nbsp;<?php echo $sname?></p>
                                    <P class="lead py-1 para1">Toatl Amount :&nbsp;<?php echo "$$total"?></p>
                                    <P class="lead py-1 para1">Ordered Date :&nbsp;<?php echo $date?></p>
                                </div>
                                <div class="col">
                                    <P class="lead py-1 para1 text-right" style="color:red;">1st Status :&nbsp;<?php echo $status?></p>
                                    <P class="lead py-1 para1 text-right" style="color:red;">Accepted Date :&nbsp;<?php echo $acpt_date?></p>
                                    <P class="lead py-1 para1 text-right" style="color:red;">2nd Status :&nbsp;<?php echo $status_2?></p>
                                    <P class="lead py-1 para1 text-right" style="color:red;">Finished Date :&nbsp;<?php echo $finish_date?></p>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>  
                    <?php
                    $count++;
                }
            }else{
                echo 'No Jobs';
            }
            ?>
        </div>
    </div>
        </div>
    <!----End of My Jobs Button Section --------->



        <div class="collapse" id="myAppointments">
            <div class="container my-5">
                <div class="row">
                    <div class="col">
                        <span class="lead para1" style="color:#087F8C">
                            Dear Customer, We Will Accept your Appointment very soon.Once we accept your appointment we will display the meeting details in the particular appointment section. Finally, the meeting will be done through Zoom. Thank You!.
                        </span>
                    </div>
                </div>
                <?php 
                    $sql = "SELECT * FROM `appointment` WHERE `cid` = '$user'";
                        $result = mysqli_query($conn,$sql);
                        $count = 0;
                        $num =0;
                        if(mysqli_num_rows($result)>0){
                            while($row=mysqli_fetch_assoc($result)){
                                if($count%1==0){
                                    if($count>0){
                                        echo '</div>';
                                    }
                                    echo "<div class='row'>";
                                    $num++;
                                }
                                $appt_id=$row['appointment_id'];
                                $c_name=$row['c_name'];
                                $subject=$row['s_name'];
                                $purpose=$row['purpose'];
                                $date=$row['meeting_date'];
                                $details = $row['details'];
                                $e_name = $row['e_name'];
                                $status1 = $row['status'];
                                $status2 = $row['status2'];


            
                ?>


                    <div class="col-sm pt-5">
                        <div class="card ">
                            <div class="card-header">
                                <h3>Appointment <?php echo $num ?></h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <P class="lead py-1 para1">From :&nbsp;<?php echo $c_name;?></p>
                                        <P class="lead py-1 para1">To :&nbsp;<?php echo $e_name; ?></p>
                                        <P class="lead py-1 para1">Subject :&nbsp;<?php echo $subject?></p>
                                        <P class="lead py-1 para1">Purpose :&nbsp;<?php echo $purpose?></p>
                                        <P class="lead py-1 para1">Requested Date :&nbsp;<?php echo $date?></p>
                                    </div>
                                    <div class="col">
                                        <P class="lead py-1 para1 text-right" style="color:red;">1st Status :&nbsp;<?php echo $status1?></p>
                                        <P class="lead py-1 para1 text-right" style="color:red;">Meeting Details :&nbsp;<?php echo $details?></p>
                                        <P class="lead py-1 para1 text-right" style="color:red;">2nd Status :&nbsp;<?php echo $status2?></p>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>  
                        <?php
                        $count++;
                    }
                }else{
                    echo 'No Appointments';
                }
                ?>
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>