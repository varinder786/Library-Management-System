<?php
require_once"database/db.php";
$obj = new db();
if($_GET['book_id'] != ''){
	$obj->deleteBookdata($_GET['book_id']);
}
header('Location:editbook.php');
?>