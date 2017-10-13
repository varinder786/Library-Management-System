<?php
require_once"database/db.php";
$obj = new db();
if($_GET['issue_id'] != ''){
	$obj->deleteIssuedBookdata($_GET['issue_id']);
}
header('Location:adminviewIssuedbook.php');
?>