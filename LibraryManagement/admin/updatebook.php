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

  <title>Edit Book Page</title>

  
  <link rel="stylesheet" type="text/css" href="style.css">
  
  
  
</head>

<body data-offset="200" data-spy="scroll" data-target=".ow-navigation">
  
	<?php
    require_once"assets/header.php";
  ?>
  <?php
$servername = "localhost";
$username="root";
$password="";
$dbname="librarymanagement";
$book_id="";
$booktitle="";
$author="";
$publisher="";
$edition="";
$isbnno="";
$price="";
$noofcopies="";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

//connect to mysql database
try{
	$conn =mysqli_connect($servername,$username,$password,$dbname);
}catch(MySQLi_Sql_Exception $ex){
	echo("error in connecting");
}
//get data from the form
function getData()
{
	$data = array();
	$data[0]=$_POST['booktitle'];
	$data[1]=$_POST['author'];
	$data[2]=$_POST['publisher'];
	$data[3]=$_POST['edition'];
	$data[4]=$_POST['isbnno'];
	$data[5]=$_POST['price'];
	$data[6]=$_POST['noofcopies'];
	return $data;
}
//edit
if(isset($_POST['update'])){
	$info = getData();
	$update_query="UPDATE `bookmaster` SET `booktitle`='$info[1]',author='$info[2]',publisher='$info[3]',edition='$info[4]',isbnno='$info[5]',price='$info[6]',noofcopies='$info[7]' WHERE book_id = '$info[0]'";
	try{
		$update_result=mysqli_query($conn, $update_query);
		if($update_result){
			if(mysqli_affected_rows($conn)>0){
				echo("data updated");
			}else{
				echo("data not updated");
			}
		}
	}catch(Exception $ex){
		echo("error in update".$ex->getMessage());
	}
}

?>
<form method ="post" action="updatebook.php">
	<input type="text" name="booktitle" placeholder="Roll No" value="<?=$_GET['booktitle']?>"><br><br>
	<input type="text" name="author" placeholder="First Name" value="<?php echo($author);?>"><br><br>
	<input type="text" name="publisher" placeholder="Last Name" value="<?php echo($publisher);?>"><br><br>
	<input type="text" name="edition" placeholder="Address" value="<?php echo($edition);?>"><br><br>
	<input type="text" name="isbnno" placeholder="example@example.com" value="<?php echo($isbnno);?>"><br><br>
	
	<input type="text" name="price" placeholder="Address" value="<?php echo($price);?>"><br><br>
	<input type="text" name="noofcopies" placeholder="example@example.com" value="<?php echo($noofcopies);?>"><br><br>

	<div>
		<input type="submit" name="update" value="Update">
		
	</div>
</form>

    <?php
    require_once"assets/Footer.php";
  ?>
  
</body>
</html>