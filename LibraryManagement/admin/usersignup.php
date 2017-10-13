


<!DOCTYPE html>
<html class="">
<head>
  <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

  <title>User Login</title>

  
  <link rel="stylesheet" type="text/css" href="style.css">
  
  
  
</head>
<body class="bg-picture">










<?php
     $name="";
     $username="";
     $password="";
     $gender="";
     $birthdate="";
     $email="";
     $course="";
     $address="";
     $city="";
     $province="";
     $postalcode="";
     

     $nameErr="";
     $usernameErr="";
     $passwordErr="";
     $genderErr="";
     $birthdateErr="";
     $emailErr="";
     $courseErr="";
     $addressErr="";
     $cityErr="";
     $provinceErr="";
     $postalcodeErr="";
     

     if($_SERVER["REQUEST_METHOD"]=="POST"){
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
          } else {
            $name = test_input($_POST["name"]);
           
          }

        
         
            if (empty($_POST["username"])) {
                $usernameErr = "Username is required";
              } else {
                $username = test_input($_POST["username"]);
         }
         
         if(empty($_POST["password"])){
            $passwordErr = "Password is required";
        } else {
          $password = test_input($_POST["password"]);
          // check if e-mail address is well-formed
         
        }
         
        
            if (empty($_POST["gender"])) {
                $genderErr = "Gender is required";
              } else {
                $gender = test_input($_POST["gender"]);
         }
        
        
            if (empty($_POST["birthdate"])) {
                $birthdateErr = "Birthdate is required";
              } else {
                $birthdate = test_input($_POST["birthdate"]);
         }
         
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
          } else {
            $email = test_input($_POST["email"]);
         }
         
         if(empty($_POST["course"])){
            $courseErr = "Course is required";
        } else {
          $course = test_input($_POST["course"]);
          
        }
      
         
        if (empty($_POST["address"])) {
            $addressErr = "Address is required";
          } else {
            $address = test_input($_POST["address"]);
         }
        
         if (empty($_POST["city"])) {
            $cityErr = "City is required";
          } else {
            $city = test_input($_POST["city"]);
         }
         
         if (empty($_POST["province"])) {
            $provinceErr = "Province is required";
          } else {
            $province = test_input($_POST["province"]);
         }
        
         if (empty($_POST["postalcode"])) {
            $postalcodeErr = "Postalcode is required";
          } else {
            $postalcode = test_input($_POST["postalcode"]);
         }
        
         
   
         include("connection.php");


      



                $name = $conn->real_escape_string($_POST["name"]);
                $username = $conn->real_escape_string($_POST["username"]);
                $password = $conn->real_escape_string($_POST["password"]);
                $gender = $conn->real_escape_string($_POST["gender"]);
                $birthdate = $conn->real_escape_string($_POST["birthdate"]);
                $email = $conn->real_escape_string($_POST["email"]);
                $course = $conn->real_escape_string($_POST["course"]);
                $address = $conn->real_escape_string($_POST["address"]);
                $city = $conn->real_escape_string($_POST["city"]);
                $province = $conn->real_escape_string($_POST["province"]);
                $postalcode = $conn->real_escape_string($_POST["postalcode"]);

                 $sql="INSERT INTO `studentmaster` (`name`,`username`,`password`, `gender`, `birthdate`,`email`,`course`, `address`, `city`, `province`, `postalcode`)
                  VALUES('$name','$username','$password', '$gender', '$birthdate','$email','$course', '$address', '$city', '$province', '$postalcode')";
                   $success = $conn->query($sql);





        }
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }
        
  ?>













  <!-- Header Section -->
    <header id="header" class="header-section container-fluid no-padding">
    <!-- Menu Block -->
    <div class="container-fluid no-padding menu-block">
      <!-- Container -->
      <div class="container">
        <!-- nav -->
        <nav class="navbar navbar-default ow-navigation">
          <div class="navbar-header">
            <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a href="index.html" class="navbar-brand">Lambton<span>Library</span></a>
          </div>
          <!-- Menu Icon -->
          
          <div class="navbar-collapse collapse navbar-right" id="navbar">
            <ul class="nav navbar-nav">
              
              <li class="dropdown">
                <a aria-expanded="false" aria-haspopup="true" role="button" class="dropdown-toggle" title="Admin SignIn" href="index.php">Admin SignIn</a>
              </li>
              <li><a title="User SignUp" href="logout.php">User SignUp</a></li>
              <li><a title="User SignIn" href="usersignin.php">User SignIn</a></li>
              
            </ul>
          </div><!--/.nav-collapse -->
        </nav><!-- nav /- -->
        
      </div><!-- Container /- -->
    </div><!-- Menu Block /- -->
  </header><!-- Header Section /- -->


  <div class="container">
    <div class="card card-login mx-auto mt-5"></br>
      <div class="card-header" style="font-size: 48px; border-bottom: 1px solid silver;">Login</div></br></br>
      <div class="card-body">
        <form method="post" id="login">
          <div class="form-group">
            <label for="username">Name <span class="text-danger">* <?php echo $nameErr;?></span></label>
            <input class="form-control" type="text" aria-describedby="emailHelp" placeholder="name" name="name" value="<?php echo $name; ?>" id="name">
            <label class="text hidden small-font-size" id="username-message"></label>
          </div> 
          <div class="form-group">
            <label for="username">Username <span class="text-danger">* <?php echo $usernameErr;?></span></label>
            <input class="form-control" type="text" aria-describedby="emailHelp" placeholder="Username" name="username" value="<?php echo $username; ?>" id="username">
            <label class="text hidden small-font-size" id="username-message"></label>
          </div>
          <div class="form-group">
            <label for="password">Password <span class="text-danger">* <?php echo $passwordErr;?></span></label>
            <input class="form-control" type="password" placeholder="Password" name="password" value="<?php echo $password; ?>" id="password">
            <label class="text hidden small-font-size" id="password-message"></label>
          </div>
           <div class="form-group">
            <label for="username">Gender <span class="text-danger">* <?php echo $genderErr;?></span></label>
            <input class="form-control" type="text" aria-describedby="emailHelp" placeholder="Gender" name="gender" value="<?php echo $gender; ?>" id="username">
            <label class="text hidden small-font-size" id="username-message"></label>
          </div> <div class="form-group">
            <label for="username">Birthdate <span class="text-danger">* <?php echo $birthdateErr;?></span></label>
            <input class="form-control" type="text" aria-describedby="emailHelp" placeholder="Username" name="birthdate" value="<?php echo $birthdate; ?>" id="username">
            <label class="text hidden small-font-size" id="username-message"></label>
          </div> <div class="form-group">
            <label for="username">Email <span class="text-danger">* <?php echo $emailErr;?></span></label>
            <input class="form-control" type="text" aria-describedby="emailHelp" placeholder="Username" name="email" value="<?php echo $email; ?>" id="username">
            <label class="text hidden small-font-size" id="username-message"></label>
          </div> <div class="form-group">
            <label for="username">Course <span class="text-danger">* <?php echo $courseErr;?></span></label>
            <input class="form-control" type="text" aria-describedby="emailHelp" placeholder="Username" name="course" value="<?php echo $course; ?>" id="username">
            <label class="text hidden small-font-size" id="username-message"></label>
          </div> <div class="form-group">
            <label for="username">Address <span class="text-danger">* <?php echo $addressErr;?></span></label>
            <input class="form-control" type="text" aria-describedby="emailHelp" placeholder="Username" name="address" value="<?php echo $address; ?>" id="username">
            <label class="text hidden small-font-size" id="username-message"></label>
          </div> <div class="form-group">
            <label for="username">City <span class="text-danger">* <?php echo $cityErr;?></span></label>
            <input class="form-control" type="text" aria-describedby="emailHelp" placeholder="Username" name="city" value="<?php echo $city; ?>" id="username">
            <label class="text hidden small-font-size" id="username-message"></label>
          </div> <div class="form-group">
            <label for="username">Province <span class="text-danger">* <?php echo $provinceErr;?></span></label>
            <input class="form-control" type="text" aria-describedby="emailHelp" placeholder="Username" name="province" value="<?php echo $province; ?>" id="username">
            <label class="text hidden small-font-size" id="username-message"></label>
          </div> <div class="form-group">
            <label for="username">PostalCode <span class="text-danger">* <?php echo $postalcodeErr;?></span></label>
            <input class="form-control" type="text" aria-describedby="emailHelp" placeholder="Username" name="postalcode" value="<?php echo $postalcode; ?>" id="username">
            <label class="text hidden small-font-size" id="username-message"></label>
          </div>
          
         
          <?php
          if(@$message != ''){ ?>
          <p class="alert alert-danger"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <?=$message?></p>
          <?php } ?>
          <input type="submit" name="login" class="btn btn-primary login-button" id="login-button">
        </form>
        <!-- <div class="text-center">
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div> -->
      </div>
    </div>
    
    <?php
    require_once"assets/Footer.php";
  ?>
  
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="admin/vendor/jquery/jquery.min.js"></script>
  <script src="admin/vendor/popper/popper.min.js"></script>
  <script src="admin/vendor/bootstrap/js/bootstrap.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="admin/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script type="text/javascript">
 
  </script>
</body>

</html>
