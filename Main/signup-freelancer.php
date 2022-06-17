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

<!---Jquery CDN----------------------->
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

    <!---Extrenal CSS--->
    <link rel="stylesheet" href="style.css">

    <title>Signup - Freelancer</title>
    <!-- add icon link -->
    <link rel="apple-touch-icon" sizes="180x180" href="http://localhost/primis/main/favicon_package_v0.16/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="http://localhost/primis/main/favicon_package_v0.16/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="http://localhost/primis/main/favicon_package_v0.16/favicon-16x16.png">
    <link rel="manifest" href="http://localhost/primis/main/favicon_package_v0.16/site.webmanifest">
    <link rel="mask-icon" href="http://localhost/primis/main/favicon_package_v0.16/safari-pinned-tab.svg" color="#12333d">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">


    <!---Validation for Register Form----->
<script>
    
    function validateName()
    {
        var name = document.getElementById("name").value;
        if((name=="")|| (name==null))
        {
            alert("Please Enter your Name ");
            return false;
        }
        else
        {
            return true;
        }
    }
    
    function validateEmail()
    {
        var email = document.getElementById("email").value;
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

    function validatePassword()
    {
      var password = document.getElementById("pwd").value;
      var confirmpassword = document.getElementById("confpwd").value;
      if((password != confirmpassword) || (password.length<5))
      {
          alert("Please enter a password properly");
          return false;
      }
      else
      {
          return true;
      }
    }

    function validateSkill()
    {
        var skill = document.getElementById("skill").value;
        if(skill=="Select a Skill")
        {
            alert("Please select a skill!");
            return false;
        }
        else
        {
            return true;
        }
    }

    function validateGender()
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

    function validateAddress()
    {
        var address = document.getElementById("address").value;
        if((address=="")||(address==null))
        {
            alert("Please enter an address");
            return false;
        }
        else
        {
            return true;
        }
    }

    function validateContact()
    {
      var number = document.getElementById("number").value;
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
      if( validateName() && validateEmail() && validatePassword() &&  validateSkill() && validateGender() && validateAddress() && validateContact())
      {
          alert("Registration is Completed")
      }
      else
      {
          event.preventDefault();
      }
    }
</script>
<!--End of Validation for Register Form--------------------------------------------------------------------->
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
  <!--End of Navigation Bar-->

    <!---Register Form------------------------------------------>
    <section class="mt-5">
      <div class="container">
        <div class="jumbotron">
          <h2>Freelancer Register Form</h2>
          <form name="form2" id="form2" method="post" action="addfreelancer.php">

            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" autocomplete="off" required autofocus>
            </div>

            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" autocomplete="off" required>
            </div>
            
            <div class="form-group">
              <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" autocomplete="off" required>
            </div>

            <div class="form-group">
              <label for="confpwd">Confirm Password:</label>
                <input type="password" class="form-control" id="confpwd" placeholder="Enter Confirm password" name="confpwd" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label for="skill">Skill (select one):</label>
                <select class="form-control" id="skill" name="skill">
                    <option selected>Select a Skill</option>
                    <option value="Logo Design">Logo Design</option>
                    <option value="Web Design">Web Design</option>
                    <option value="Video Editing">Video Editing</option>
                    <option value="Digital Marketing">Digital Marketing</option>
                </select>
            </div>

            <div class="form-group-inline" style="padding: 1em 0 1em 0;">
              <label for="gender" style="padding-right: 1em;" >Gender:</label>
              <div class="custom-control custom-radio custom-control-inline" >
                <input type="radio" class="custom-control-input" id="rdoMale" name="gender" value="Male">
                <label class="custom-control-label" for="rdoMale">Male</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="rdoFemale" name="gender" value="Female">
                <label class="custom-control-label" for="rdoFemale">Female</label>
              </div>
            </div>

            <div class="form-group">
              <label for="address">Address:</label>
              <textarea class="form-control" rows="5" id="address" name="address" placeholder="Enter Address Here!" autocomplete="off" required></textarea>
            </div>

            <div class="form-group">
              <label for="number">Phone Number:</label>
                <input type="text" class="form-control" id="number" placeholder="Enter Phone Number" name="number" autocomplete="off" required>
            </div>
            

            <button type="submit" class="btn btn-primary btn-lg" onclick="validate()">Submit</button>
          </form>
        </div>
      </div>      
    </section>
  <!--End of Register Form -------------------------------------------------------------------------------------------------------------------->

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
