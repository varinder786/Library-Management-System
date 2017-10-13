

<?php
     $booktitle="";
     $author="";
     $publisher="";
     $edition="";
     $isbnno="";
     $price="";
     $noofcopies="";
     

     $booktitleErr="";
     $authorErr="";
     $publisherErr="";
     $editionErr="";
     $isbnnoErr="";
     $priceErr="";
     $noofcopiesErr="";
     

     if($_SERVER["REQUEST_METHOD"]=="POST"){
        if (empty($_POST["booktitle"])) {
            $booktitleErr = "Booktitle is required";
          } else {
            $booktitle = test_input($_POST["booktitle"]);
           
          }

        
         
            if (empty($_POST["author"])) {
                $authorErr = "Author is required";
              } else {
                $author = test_input($_POST["author"]);
         }
         
         if(empty($_POST["publisher"])){
            $publisherErr = "Publisher is required";
        } else {
          $publisher = test_input($_POST["publisher"]);
          // check if e-mail address is well-formed
         
        }
         
        
            if (empty($_POST["edition"])) {
                $editionErr = "Edition is required";
              } else {
                $edition = test_input($_POST["edition"]);
         }
        
        
            if (empty($_POST["isbnno"])) {
                $isbnnoErr = "ISBN No. is required";
              } else {
                $isbnno = test_input($_POST["isbnno"]);
         }
         
        if (empty($_POST["price"])) {
            $priceErr = "Price is required";
          } else {
            $price = test_input($_POST["price"]);
         }
         
         if(empty($_POST["noofcopies"])){
            $noofcopiesErr = "Noofcopies is required";
        } else {
          $noofcopies = test_input($_POST["noofcopies"]);
          
        }
      
        
   
         include("connection.php");


      



                $booktitle = $conn->real_escape_string($_POST["booktitle"]);
                $author = $conn->real_escape_string($_POST["author"]);
                $publisher = $conn->real_escape_string($_POST["publisher"]);
                $edition = $conn->real_escape_string($_POST["edition"]);
                $isbnno = $conn->real_escape_string($_POST["isbnno"]);
                $price = $conn->real_escape_string($_POST["price"]);
                $noofcopies = $conn->real_escape_string($_POST["noofcopies"]);

                 $sql="INSERT INTO `bookmaster` (`booktitle`,`author`,`publisher`, `edition`, `isbnno`,`price`,`noofcopies`)
                  VALUES('$booktitle','$author','$publisher', '$edition', '$isbnno','$price','$noofcopies')";
                   $success = $conn->query($sql);





        }
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }
        
  ?>













<!DOCTYPE html>
<html class="">
<head>
	<meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

	<title>Admin Home Page</title>

	
	<link rel="stylesheet" type="text/css" href="style.css">
	
	
	
</head>

<body data-offset="200" data-spy="scroll" data-target=".ow-navigation">
	
	<!-- Header Section -->
	  <?php
  	require_once"assets/header.php";
  ?>
	
	<main>
		
		
  <div class="container">
    <div class="card card-login mx-auto mt-5"></br>
      <div class="card-header" style="font-size: 48px; border-bottom: 1px solid silver;">Add New Book</div></br></br>
      <div class="card-body">
        <form method="post" id="login">
          <div class="form-group">
            <label>Book Title <span class="text-danger">* <?php echo $booktitleErr;?></span></label>
            <input class="form-control" type="text" aria-describedby="emailHelp" placeholder="booktitle" name="booktitle" value="<?php echo $booktitle; ?>" id="booktitle">
            <label class="text hidden small-font-size" id="username-message"></label>
          </div> 
          <div class="form-group">
            <label>Author <span class="text-danger">* <?php echo $authorErr;?></span></label>
            <input class="form-control" type="text" aria-describedby="emailHelp" placeholder="author" name="author" value="<?php echo $author; ?>" id="author">
            <label class="text hidden small-font-size" id="username-message"></label>
          </div>
          <div class="form-group">
            <label>publisher <span class="text-danger">* <?php echo $publisherErr;?></span></label>
            <input class="form-control" type="text-danger" placeholder="Publisher" name="publisher" value="<?php echo $publisher; ?>" id="publisher">
            <label class="text hidden small-font-size" id="password-message"></label>
          </div>
           <div class="form-group">
            <label>Edition <span class="text-danger">* <?php echo $editionErr;?></span></label>
            <input class="form-control" type="text" aria-describedby="emailHelp" placeholder="Edition" name="edition" value="<?php echo $edition; ?>" id="edition">
            <label class="text hidden small-font-size" id="username-message"></label>
          </div> <div class="form-group">
            <label>ISBN No. <span class="text-danger">* <?php echo $isbnnoErr;?></span></label>
            <input class="form-control" type="text" aria-describedby="emailHelp" placeholder="ISBN No." name="isbnno" value="<?php echo $isbnno; ?>" id="isbnno">
            <label class="text hidden small-font-size" id="username-message"></label>
          </div> <div class="form-group">
            <label>Price <span class="text-danger">* <?php echo $priceErr;?></span></label>
            <input class="form-control" type="text" aria-describedby="emailHelp" placeholder="Price" name="price" value="<?php echo $price; ?>" id="price">
            <label class="text hidden small-font-size" id="username-message"></label>
          </div> <div class="form-group">
            <label>No of Copies <span class="text-danger">* <?php echo $noofcopiesErr;?></span></label>
            <input class="form-control" type="text" aria-describedby="emailHelp" placeholder="No of Copies" name="noofcopies" value="<?php echo $noofcopies; ?>" id="noofcopies">
            <label class="text hidden small-font-size" id="username-message"></label>
          </div> <div class="form-group">
          </div>
         
         
          <input type="submit" name="login" class="btn btn-primary login-button" id="login-button">
          </br>
          </br>
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