<!DOCTYPE html>
<html class="">
<head>
	<meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

	<title>User Home Page</title>

	
	<link rel="stylesheet" type="text/css" href="style.css">
	
	
	
</head>

<body data-offset="200" data-spy="scroll" data-target=".ow-navigation">
	






<?php
     $Epassword="";
     $Cpassword="";
     

     $EpasswordErr="";
     $CpasswordErr="";
     

     if($_SERVER["REQUEST_METHOD"]=="POST"){
        if (empty($_POST["Cpassword"])) {
            $CpasswordErr = "Cpassword is required";
          } else {
            $Cpassword = test_input($_POST["Cpassword"]);
           
          }

        
         
        
         
   
         include("connection.php");


      



                $Cpassword = $conn->real_escape_string($_POST["Cpassword"]);

                 $sql="INSERT INTO `studentmaster` (`name`)
                  VALUES('$name')";
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
	  <?php
  	require_once"assets/header1.php";
  ?>
	
	<main>
		
		
  <div class="container">
    <div class="card card-login mx-auto mt-5"></br>
      <div class="card-header" style="font-size: 48px; border-bottom: 1px solid silver;">Change Password</div></br></br>
      <div class="card-body">
        <form method="post" id="login">
          <div class="form-group">
            <label for="username">Enter New Password <span class="text-danger">*</span></label>
            <input class="form-control" type="text" aria-describedby="emailHelp" placeholder="Enter Password" name="Epassword" value="<?=@$_COOKIE['username']?>" id="Epassword">
            <label class="text hidden small-font-size" id="username-message"></label>
          </div>
          <div class="form-group">
            <label for="password">Confirm New Password <span class="text-danger">*</span></label>
            <input class="form-control" type="password" placeholder="Confirm Password" name="Cpassword" value="<?=@$_COOKIE['password']?>" id="Cpassword">
            <label class="text hidden small-font-size" id="password-message"></label>
          </div>

         
          <input type="submit" name="login" class="btn btn-primary login-button" id="login-button"></br></br>
        </form>
        <!-- <div class="text-center">
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div> -->
      </div>
    </div>
  </div>
		
	</main>
	
    <?php
    require_once"assets/Footer.php";
  ?>
  
	
	<!-- JQuery v1.11.3 -->
	<script src="js/jquery.min.js"></script>

	<!-- Library - Js -->
	<script src="libraries/lib.js"></script><!-- Bootstrap JS File v3.3.5 -->

	<!-- RS5.0 Core JS Files -->
	<script type="text/javascript" src="revolution/js/jquery.themepunch.tools.min.js?rev=5.0"></script>
	<script type="text/javascript" src="revolution/js/jquery.themepunch.revolution.min.js?rev=5.0"></script>
	<script type="text/javascript" src="revolution/js/extensions/revolution.extension.video.min.js"></script>
	<script type="text/javascript" src="revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
	<script type="text/javascript" src="revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
	<script type="text/javascript" src="revolution/js/extensions/revolution.extension.navigation.min.js"></script>
	
	<!-- Library - Google Map API -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDW40y4kdsjsz714OVTvrw7woVCpD8EbLE"></script>
	
	<!-- Library - Theme JS -->
	<script src="js/functions.js"></script>
</body>
</html>