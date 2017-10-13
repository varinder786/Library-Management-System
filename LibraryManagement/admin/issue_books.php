
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
  
<?php
session_start();
include "connection1.php";
?>

 
<form name="form1" action="" method="post" >
	<div style="margin: 50px 0 50px 500px;">
	<table>
		
		
		<tr>
			<td>
				<select name="enr" class="form-control selectpicker"> 
					<?php 
						$res= mysqli_query($link,"select student_id from studentmaster");
						while($row=mysqli_fetch_array($res)) 
						{
							echo "<option>";
							echo $row["student_id"];
							echo "</option>";
						}
					?>
				</select>
			</td>
			<td>
				<input type="submit" value="search" name="submit1"
				class="form-control btn btn-default" style="margin-top: 5px;">
			</td>
		</tr>
	</table>
<?php
	if (isset($_POST["submit1"])) {

		$res5=mysqli_query($link,"select * from studentmaster where student_id ='$_POST[enr]'");
		while($row5=mysqli_fetch_array($res5)) 
						{
							$name = $row5["name"];
							$username =  $row5["username"];
							$email =  $row5["email"];
							$course =  $row5["course"];
							$student_id =  $row5["student_id"];
							$username =  $row5["username"];
							$_SESSION["student_id"] = $student_id;
							$_SESSION["student_username"] = $username;
						}
		
		?>
		<table>
		<tr>
			<td>
				<input type="text" class="form-control" placeholder="StudentID" value="<?php echo $student_id; ?>" name="student_id" disabled>
			</td>
		</tr>
		<tr>
			<td>
				<input type="text" class="form-control" value="<?php echo $name; ?>" placeholder="Student Name" name="student_name" >
			</td>
		</tr>
		<tr>
			<td>
				<input type="text" class="form-control" value="<?php echo $course; ?>" placeholder="Course" name="student_course" >
			</td>
		</tr>
		<tr>
			<td>
				<input type="text" class="form-control" value="<?php echo $email; ?>" placeholder="Student Email" name="student_email" >
			</td>
		</tr>
		<tr>
			<td>
				<select name="booksname" class="form-control selectpicker">
					<?php
						$res=mysqli_query($link,"select booktitle from bookmaster");
						while($row=mysqli_fetch_array($res)) 
						{
							echo "<option>";
							echo $row["booktitle"];
							echo "</option>";
						}
					?>


				</select>
			</td>
		</tr>
		<tr>
			<td>
				<input type="text" class="form-control" placeholder="bookissuedate" value="<?php echo date("d-m-Y"); ?>" name="bookissuedate" required>
			</td>
		</tr>
		<tr>
			<td>
				<input type="text" class="form-control" value="<?php echo $username; ?>" placeholder="Student UserName" name="student_username" disabled >
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" class="form-control" name="submit2" class="form-control btn btn-default" name="issue books">
			</td>
		</tr>
		</table>
		<?php
}

		?>

</form>
		<?php
	
if (isset($_POST["submit2"])) {


	mysqli_query($link,"insert into issue_books values ('','$_SESSION[student_id]','$_POST[student_name]','$_POST[student_course]','$_POST[student_email]','$_POST[booksname]','$_POST[bookissuedate]','','$_SESSION[student_username]')");

		
?>
<script type="text/javascript">
	alert("books issued successfully");
	window.location.href=window.location.href;
</script>
<?php

}

?>
</div>
  
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






