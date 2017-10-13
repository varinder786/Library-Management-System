<?php
require_once"database/db.php";
$obj = new db();
if(@$_SESSION['username'] != ''){
  header('Location:index.php');
}
if(isset($_POST['login'])){
  $username = trim($_POST['username']);
  $password = $_POST['password'];
  if(!empty($username) && !empty($password)){
    $result = $obj->dashboardLogin($username,$password);
    if($result == true){
      if(!empty($_POST['checked'])){
          setcookie('username' , $username, time()+86400*30);
          setcookie('password' , $password, time()+86400*30);
        }else{
          setcookie('username' , $username, time()-86400);
          setcookie('password' , $password, time()-86400);
        }
      $_SESSION['username'] = $username;
      header('Location:adminindex.php');
    }else{
      $message = 'Incorrect username or password';
    }
  }else{
    $message = "Please fill all required fields";
  }



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

  <title>Admin Login</title>

  
  <link rel="stylesheet" type="text/css" href="style.css">
  
  
  
</head>
<body class="bg-picture">
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
                <a aria-expanded="false" aria-haspopup="true" role="button" class="dropdown-toggle" title="Admin SignIn" href="#">Admin SignIn</a>
              </li>
              <li><a title="User SignUp" href="usersignup.php">User SignUp</a></li>
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
            <label for="username">Username <span class="text-danger">*</span></label>
            <input class="form-control" type="text" aria-describedby="emailHelp" placeholder="Username" name="username" value="<?=@$_COOKIE['username']?>" id="username">
            <label class="text hidden small-font-size" id="username-message"></label>
          </div>
          <div class="form-group">
            <label for="password">Password <span class="text-danger">*</span></label>
            <input class="form-control" type="password" placeholder="Password" name="password" value="<?=@$_COOKIE['password']?>" id="password">
            <label class="text hidden small-font-size" id="password-message"></label>
          </div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="checked" <?=(!empty(@$_COOKIE['username'] && @$_COOKIE['password'])) ? 'checked' : ''?>> Remember Password</label>
            </div>
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
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="admin/vendor/jquery/jquery.min.js"></script>
  <script src="admin/vendor/popper/popper.min.js"></script>
  <script src="admin/vendor/bootstrap/js/bootstrap.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="admin/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script type="text/javascript">
    $('#login').on('submit' , function(e){
      var username = $('#username').val().trim();
      var password = $('#password').val();
      /*username*/
      if(username  == ''){
        $('#username-message').html('Required').addClass('text-danger').removeClass('hidden');
        e.preventDefault();  
      }else{
        $('#username-message').addClass('hidden').removeClass('text-danger');
      }
      /*username*/

      /*password*/
      if(password  == ''){
        $('#password-message').html('Required').addClass('text-danger').removeClass('hidden');
        e.preventDefault();  
      }else{
        $('#password-message').addClass('hidden').removeClass('text-danger');
      }
      /*password*/
      
    });
  </script>
</body>

</html>
