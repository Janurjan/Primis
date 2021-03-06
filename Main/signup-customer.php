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
    
    <title>SignUp - Customer</title>
    <!-- add icon link -->
    <link rel="apple-touch-icon" sizes="180x180" href="http://localhost/primis/main/favicon_package_v0.16/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="http://localhost/primis/main/favicon_package_v0.16/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="http://localhost/primis/main/favicon_package_v0.16/favicon-16x16.png">
    <link rel="manifest" href="http://localhost/primis/main/favicon_package_v0.16/site.webmanifest">
    <link rel="mask-icon" href="http://localhost/primis/main/favicon_package_v0.16/safari-pinned-tab.svg" color="#12333d">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    
    <!-- <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script> -->

    <script language="javascript" type="text/javascript">

        function validateCustomerName()
        {
          var name = document.getElementById("cusname").value;
          if((name=="")||(name==null))
          {
            alert("Enter a name");
            return false;
          }
          else{
            return true;
          }

        }

        function validateCustomerEmail()
        {
          var email = document.getElementById("cusemail").value;
			    var len = email.length;
			    var at = email.indexOf("@");
			    var dot = email.lastIndexOf(".");
			    if((at<=1)|| ((dot-at)<1)||(len<=dot))
				  {
					  alert("Please enter a correct email");
					  return false;					
				  }
          else
          {
            return true;
          }
	      }

        function validateCustomerPassword()
        {
          var password = document.getElementById("cuspwd").value;
          var confirmpassword = document.getElementById("cusconfpwd").value;
          if((password != confirmpassword) || (password.length<5))
          {
            alert("Please enter a password properly");
            return false;
          }
          else{
            return true;
          }
        }

        function validateCustomerGender()
        {
          var rdo1 = document.getElementById("rdoMale").checked;
          var rdo2 = document.getElementById("rdoFemale").checked;

          if((rdo1=="")&&(rdo2==""))
          {
            alert("Select either male or female");
            return false;
          }
          else
          {
            return true;
          }
        }

        function validateCustomerAddress()
        {
          var address = document.getElementById("cusaddress").value;
          if((address=="") || (address==null))
          {
            alert("Please enter an address");
            return false;
          }
          else
          {
            return true;
          }
        }

        function validateCustomerContact()
        {
          var number = document.getElementById("cusnumber").value;
          if(isNaN(number)|| (number.length!=10))
          {
            alert("Please enter a Valid Contact Number");
            return false;
          }
          else
          {
            return true;
          }
        }

        function validate()
        {
          if(validateCustomerName() && validateCustomerEmail() && validateCustomerPassword() && validateCustomerGender() && validateCustomerAddress() && validateCustomerContact())
          {
            alert("Registration is Completed");
          }
          else
          {
            event.preventDefault()
          }
        }
    </script>
  </head>
  
  <body data-spy="scroll" data-target="#navbarResponsive">
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
    <!-- End of Navigation Bar -->
  
  <!--Registation Form Section -------------------------------------->
  <section class="mt-5">
    <div class="container">
      <div class="jumbotron">
        <h2 class="pb-3">Customer Register Form</h2>
        <form method="post" action="addcustomer.php">

          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="cusname" placeholder="Enter Name" name="cusname"  autocomplete="off" required autofocus>
          </div>

          <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="cusemail" placeholder="Enter email" name="cusemail" autocomplete="off" required>
          </div>
            
          <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="cuspwd" placeholder="Enter password" name="cuspwd" autocomplete="off" required>
          </div>

          <div class="form-group">
            <label for="confpwd">Confirm Password:</label>
            <input type="password" class="form-control" id="cusconfpwd" placeholder="Enter Confirm password" name="cusconfpwd" autocomplete="off" required>
          </div>

          <div class="form-group-inline" style="padding: 1em 0 1em 0;">
            <label for="gender" style="padding-right: 1em;" >Gender:</label>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input" id="rdoMale" name="cusgender" value="Male">
              <label class="custom-control-label" for="rdoMale">Male</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input" id="rdoFemale" name="cusgender" value="Female">
              <label class="custom-control-label" for="rdoFemale">Female</label>
            </div>
          </div>

          <div class="form-group">
            <label for="address">Address:</label>
            <textarea class="form-control" rows="5" id="cusaddress" name="cusaddress" placeholder="Enter Address Here!" autocompelte="off" required></textarea>
          </div>

          <div class="form-group">
            <label for="number">Phone Number:</label>
            <input type="text" class="form-control" id="cusnumber" placeholder="Enter Phone Number" name="cusnumber" autocomplete="off" required>
          </div>
          <input type="submit" class="btn btn-primary btn-lg" value="Submit" onclick="validate()">
        </form>
      </div>
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
                    <p class="text-left py-2">From the beginning, we???ve believed that change doesn???t happen without leadership. 
                        That???s why we keep on forging new, innovative pathways in the industry we helped transform.
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