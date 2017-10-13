<?php
require_once"database/db.php";
$obj = new db();
$data = $obj->getBookData();
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

  <title>Edit Book Page</title>

  
  <link rel="stylesheet" type="text/css" href="style.css">
  
  
  
</head>

<body data-offset="200" data-spy="scroll" data-target=".ow-navigation">
  
  <!-- Header Section -->
    <?php
    require_once"assets/header.php";
  ?>
  
  <main>
    
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="adminindex.php">Admin</a>
        </li>
        <li class="breadcrumb-item active">Edit Book</li>
      </ol>
     
      <div class="card mb-3">
        <div class="card-header" style="font-size: 30px;">
          <i class="fa fa-table"></i> Book List</div>
        <div class="card-body">
         
          <div class="table-responsive">
            <table class="table table-bordered" id="employees" width="100%" cellspacing="0" >
              <thead>
                <tr>
                  <th>Book ID</th>
                  <th>Book Title</th>
                  <th>Author</th>
                  <th>Publisher</th>
                  <th>Edition</th>
                  <th>ISBN No.</th>
                  <th>Price</th>
                  <th>No of Copies</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>

              </tfoot>
              <tbody>
                <?php
                  if(count($data) != 0){
                    foreach ($data as $key => $datalist) {
                      ?>
                      <tr>
                        <td><?=$datalist['book_id']?></td>
                        <td><?=ucwords($datalist['booktitle'])?></td>
                        <td><?=ucfirst($datalist['author'])?></td>
                        <td><?=$datalist['publisher']?></td>
                        <td><?=$datalist['edition']?></td>
                        <td><?=$datalist['isbnno']?></td>
                        <td><?=$datalist['price']?></td>
                        <td><?=$datalist['noofcopies']?></td>
                        <td>
                          <div class="btn-group">
                              <a href="updatebookdata.php?book_id=<?=base64_encode($datalist['book_id'])?>" class="btn btn-info" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                              <a href="deletebook.php?book_id=<?=$datalist['book_id']?>" class="btn btn-danger" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                          </div>
                          <hr>
                        </td>
                       </tr>
                      <?php
                    }
                  }else{
                    echo "empty";
                  }
                  ?>
                
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
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