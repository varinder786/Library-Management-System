<?php
require_once"database/db.php";
$obj = new db();
//update
if(isset($_POST['update'])){
 $booktitle = ($_POST['booktitle']);
  $author = ($_POST['author']);
  $publisher = $_POST['publisher'];
  $edition = $_POST['edition'];
  $isbnno = $_POST['isbnno'];
  $price = $_POST['price'];
  $noofcopies = $_POST['noofcopies'];
 
    $result = $obj->updateBookData($_POST);
    if($result == true){
      $_SESSION['message'] = 'Updated successfully';
    }else{
      $_SESSION['message'] = 'Request faile, please try again';
    }
  }else{
    $_SESSION['message'] = "Please fill all required field";
  }
header('Location:editbook.php?book_id='.$_POST['editbook_id']);

//update
?>