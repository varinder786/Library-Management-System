<?php
// including the database connection file
include_once("connection.php");

if(isset($_POST['update']))
{ 

  
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']); 
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $birthdate = mysqli_real_escape_string($conn, $_POST['birthdate']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $course = mysqli_real_escape_string($conn, $_POST['course']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $province = mysqli_real_escape_string($conn, $_POST['province']);
    $postalcode = mysqli_real_escape_string($conn, $_POST['postalcode']);
    
  // checking empty fields
  if(empty($name) || empty($username) || empty($password) || empty($gender) || empty($birthdate) || empty($email) || empty($course) || empty($address) || empty($city) || empty($province) || empty($postalcode)) {  
      
    
      echo "<font color='red'>field is empty.</font><br/>";
  
      
  } else {  
    //updating the table
    $result = mysqli_query($conn, "UPDATE studentmaster SET name='$name',username='$username',password='$password',email='$email',course='$course',address='$address',city='$city',province='$province'
        ,postalcode='$postalcode' WHERE student_id =$student_id");
    
    //redirectig to the display page. In our case, it is 
    header("Location: edituserprofile.php");
  }
}
?>
<?php
//getting id from url
$student_id = $_GET['student_id'];

//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM studentmaster WHERE student_id=$student_id");

// echo "<table><tr><th>ID</th><th>Name</th><th>E-mail</th><th>Gender</th><th>Birth Date</th><th>Website</th><th>Address</th><th>Province</th><th>Zip Code</th><th>City</th><th>Join Date</th><th>Annual Basic Pay</th></tr>";

while($res = mysqli_fetch_array($result))
{
  $name = $res['name'];
  $username = $res['username'];
    $password = $res['password'];
    $gender = $res['gender'];
    $birthdate = $res['birthdate'];
    $email = $res['email'];
    $course = $res['course'];
    $address = $res['address'];
    $city = $res['city'];
    $province = $res['province'];
    $postalcode = $res['postalcode'];

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

	<title>User Home Page</title>

	
	<link rel="stylesheet" type="text/css" href="style.css">
	
	
	
</head>

<body data-offset="200" data-spy="scroll" data-target=".ow-navigation">
	
	<!-- Header Section -->
	  <?php
  	require_once"assets/header1.php";
  ?>
	
	<main>
		
  <div class="container">
    <div class="card card-login mx-auto mt-5"></br>
      <div class="card-header" style="font-size: 48px; border-bottom: 1px solid silver;">Login</div></br></br>
      <div class="card-body">
        <form method="post" id="login" role="form" action="edituserprofile.php">



        	 <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="inputName" class="label-control">Name</label>
                              <input type="hidden" name="editid" value="<?=$_GET['student_id']?>">
                              <input type="text" name="name" class="form-control" required placeholder="name" id="inputName" value="<?php echo $name; ?>">
                              <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                            <label>Course</label>
                            <input type="text" name="course" required class="form-control" placeholder="Course" value="<?php echo $course; ?>">
                            <div class="help-block with-errors"></div>
                          </div>
                        </div>
                </div> 
                 <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="label-control">UserName</label>
                              <input type="text" name="username" class="form-control" required placeholder="UserName" value="<?php echo $username; ?>">
                              <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" required class="form-control" placeholder="Address" value="<?php echo $address; ?>">
                            <div class="help-block with-errors"></div>
                          </div>
                        </div>
                </div> 
                 <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="label-control">Password</label>
                              <input type="text" name="password" class="form-control" required placeholder="Password" value="<?php echo $password; ?>">
                              <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                            <label>City</label>
                            <input type="text" name="city" required class="form-control" placeholder="City" value="<?php echo $city; ?>">
                            <div class="help-block with-errors"></div>
                          </div>
                        </div>
                </div> 
                 <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="label-control">Gender</label>
                              <input type="text" name="gender" class="form-control" required placeholder="Gender" value="<?php echo $gender; ?>">
                              <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                            <label>Province</label>
                            <input type="text" name="province" required class="form-control" placeholder="Province" value="<?php echo $province; ?>">
                            <div class="help-block with-errors"></div>
                          </div>
                        </div>
                </div> 
                 <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="label-control">BirthDate</label>
                              <input type="text" name="birthdate" class="form-control" required placeholder="BirthDate" value="<?php echo $birthdate; ?>">
                              <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                            <label>PostalCode</label>
                            <input type="text" name="postalcode" required class="form-control" placeholder="PostalCode" value="<?php echo $postalcode; ?>">
                            <div class="help-block with-errors"></div>
                          </div>
                        </div>
                </div> 
                 <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" required class="form-control" placeholder="Email" value="<?php echo $email; ?>">
                            <div class="help-block with-errors"></div>
                          </div>
                        </div>
                </div> 
  
                      <input type="submit" name="update" class="btn btn-info">

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