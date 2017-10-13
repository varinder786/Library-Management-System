<?php
require_once"database/db.php";
$obj = new db();
if(!empty($_GET['book_id'])){
  $book_id = base64_decode($_GET['book_id']);
  $edit = $obj->getBookDataById($book_id);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Book list</title>
  <?php
    require_once"assets/head.php";
  ?>
  <!DOCTYPE html>
<html class="">
<head>
  <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

  <title>Update Book Data</title>

  
  <link rel="stylesheet" type="text/css" href="style.css">
  
  
  
</head>

<body data-offset="200" data-spy="scroll" data-target=".ow-navigation">
  
  <!-- Header Section -->
    <?php
    require_once"assets/header.php";
  ?>
  
  




  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Employees</a>
        </li>
        <li class="breadcrumb-item active">Edit</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card">
        <div class="row">
          <div class="col-md-12">
            <div class="card-header" style="font-size: 30px; border-bottom: 1px solid silver;"">
              <i class="fa fa-table"></i> Update Book Information</div> </br>
              <div class="card-body">
                <!-- form -->
                  <div class="form">
                    <form method="post" id="emp-form" role="form" action="form_action.php">
                      <?php
                      if(@$_SESSION['message'] != ''){ ?>
                        <div class="form-group">
                          <p class="alert alert-info">
                            <?php 
                              echo $_SESSION['message'];
                              $_SESSION['message'] = '';
                            ?>
                          </p>
                        </div>
                      <?php } ?>
                      <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="inputName" class="label-control">Book Title</label>
                              <input type="hidden" name="editid" value="<?=$_GET['book_id']?>">
                              <input type="text" name="booktitle" class="form-control" required placeholder="Book Title" id="inputBookTitle" value="<?=$edit[0]['booktitle']?>">
                              <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                            <label>Author</label>
                            <input type="text" name="author" required class="form-control" placeholder="Yukon" value="<?=$edit[0]['author']?>">
                            <div class="help-block with-errors"></div>
                          </div>
                        </div>
                      </div> <!-- /row -->
                     
                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Publisher</label>
                            <input type="text" name="publisher" class="form-control" required value="<?=$edit[0]['publisher']?>">
                            <div class="help-block with-errors"></div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Edition</label>
                            <input type="text" name="edition" class="form-control" required value="<?=$edit[0]['edition']?>">
                          </div>
                        </div>
                      </div><!-- row -->
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>ISBN No.</label>
                            <input type="text" name="isbnno" class="form-control" placeholder="whitehorse" required value="<?=$edit[0]['isbnno']?>">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Price</label>
                            <input type="text" name="postal_code" required placeholder="Price" class="form-control" minlength="5" maxlength="7" value="<?=$edit[0]['price']?>">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>No of Copies</label>
                            <input type="text" name="noofcopies" placeholder="email" class="form-control" required value="<?=$edit[0]['noofcopies']?>">
                          </div>
                        </div>
                        
                      </div>
                     
                      
                      <input type="submit" name="update" class="btn btn-info">  
                      <input type="reset" name="reset" value="Cancel" class="btn btn-default">
                    </form>
                  </div>
                <!-- /form -->
              </div>
              <br>
              <br>
            <div class="card-footer small text-muted">click here to </div>
          </div>
          </div>
        </div>
    </div>
    <!-- /.con













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