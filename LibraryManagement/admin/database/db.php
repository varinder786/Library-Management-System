<?php
class db{
	private $db;
	function __construct(){
		session_start();
		$this->db = new PDO('mysql:host=localhost;dbname=librarymanagement','root','');
	}
	function dashboardLogin($username,$password){
		$Query = $this->db->prepare('select * from admin where username = ? && password = ?');
		$Query->execute(array($username,md5($password)));
		if($Query->rowCount() == 1){
			return true;
		}else{
			return false;
		}
	}
	function userLogin($username,$password){
		$Query = $this->db->prepare('select * from studentmaster where username = ? && password = ?');
		$Query->execute(array($username,md5($password)));
		if($Query->rowCount() == 1){
			return true;
		}else{
			return false;
		}
	}
	function sessionDestroy(){
		$_SESSION['username'] == '';
		session_destroy();
	}
	function checkUserSession(){
		if($_SESSION['username'] == ''){
			header('Location:../adminindex.php');
		}
	}
	function getCurrentUser(){
		$Query = $this->db->prepare('select username, email,date,status from admin where username = ?');
		$Query->execute(array($_SESSION['username']));
		return $Query->fetchAll(PDO::FETCH_ASSOC);
	}
	function insertEmployeeInfo_entry($data, $annual_pay, $tax_calculate, $monthly_pay){
		$Query = $this->db->prepare('insert into employees (name,gender,province,dob,address,city,postal_code,email,website_link,	joining_date,annual_basic_pay,tax,monthly_salery,status)values(?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
		$Query->execute(array(
								$data['name'],
								$data['gender'],
								$data['province'],
								$data['dob'],
								$data['address'],
								$data['city'],
								$data['postal_code'],
								$data['email'],
								$data['website'],
								$data['joining-date'],
								$annual_pay,
								$tax_calculate,
								$monthly_pay,
								1
							));
		if($Query){
			return true;
		}else{
			return false;
		}
	}
	function getBookData(){
		$Query = $this->db->prepare('select * from bookmaster ORDER BY book_id DESC');
		$Query->execute();
		return $result = $Query->fetchAll(PDO::FETCH_ASSOC);
	}
	function getIssuedBookData(){
		$Query = $this->db->prepare('select * from issue_books ORDER BY issue_id DESC');
		$Query->execute();
		return $result = $Query->fetchAll(PDO::FETCH_ASSOC);
	}
	function deleteBookdata($book_id){
		$Query = $this->db->prepare('delete from bookmaster where book_id = ?');
		$Query->execute(array($book_id));
		if($Query){
			return true;
		}else{
			return false;
		}
	}
	function deleteIssuedBookdata($issue_id){
		$Query = $this->db->prepare('delete from issue_books where issue_id = ?');
		$Query->execute(array($issue_id));
		if($Query){
			return true;
		}else{
			return false;
		}
	}
	function getBookDataById($book_id){
		$Query = $this->db->prepare('select * from bookmaster where book_id = ?');
		$Query->execute(array($book_id));
		return $Query->fetchAll(PDO::FETCH_ASSOC);
	}
	function updateBookData($data){
		$Query = $this->db->prepare('update bookmaster set `booktitle` = ?,`author` = ? ,`publisher` = ? ,`edition`= ? ,`isbnno` = ? ,`price` = ? ,`noofcopies` = ?  where `book_id` = ?');
		$Query->execute(array(
								$data['booktitle'],
								$data['author'],
								$data['publisher'],
								$data['edition'],
								$data['isbnno'],
								$data['price'],
								$data['noofcopies'],
								1,
								base64_decode($_POST['editbook_id'])
							));
		if($Query){
			return true;
		}else{
			return false;
		}
	}
	function getEmployeeByEmployeeId($id){
		$Query = $this->db->prepare('select * from employees where employee_id = ?');
		$Query->execute(array($id));
		return $Query->fetchAll(PDO::FETCH_ASSOC);

	}
}
?>