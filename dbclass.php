<?php
include('config.php');
class DB
{
	var $link;
	
	function __construct(){
		$this->link = new mysqli(DB_HOST, DB_USER, DB_PWD, DB_NAME);
		if(mysqli_connect_errno()){
			die("error connect to db");
		}
	}
	
	function connectDB(){
		$link = new mysqli(DB_HOST, DB_USER, DB_PWD, DB_NAME);
		if(mysqli_connect_errno()){
			die("error connect to db");
		}
	}
	
	function getCustList(){
		global $link;
		//$sql = "SET NAMES 'utf8'";
		//$query = mysql_query($sql) or die(mysql_error());
		
		$sql = "SELECT * FROM customer_tbl ORDER BY cust_name";
		$query = mysqli_query($this->link, $sql) or die('Error:'. mysqli_error($this->link));
		return $query;
	}
	
	function getCustByID($id){
		//$sql = "SET NAMES 'utf8'";
		//$query = mysql_query($sql) or die(mysql_error());
		
		$sql = "SELECT * FROM customer_tbl WHERE cust_id='$id'";
		$query = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
		return $query;
	}
	
	function addCustRS($cust_name, $cust_contact, $cust_no, $cust_phone1, $cust_phone2, $cust_address){
		$sql = "INSERT INTO customer_tbl SET cust_name='$cust_name', cust_contact='$cust_contact', cust_no='$cust_no', cust_phone1='$cust_phone1', cust_phone2='$cust_phone2', cust_address='$cust_address'";
		mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
	}
	
	function updateCustRSByID($cust_id, $cust_name, $cust_contact, $cust_no, $cust_phone1, $cust_phone2, $cust_address){
		$sql = "UPDATE customer_tbl SET cust_name='$cust_name', cust_contact='$cust_contact', cust_no='$cust_no', cust_phone1='$cust_phone1', cust_phone2='$cust_phone2', cust_address='$cust_address' WHERE cust_id='$cust_id'";
		
		mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
	}
	
	function deleteCustRSByID($cust_id){
		$sql = "DELETE FROM customer_tbl WHERE cust_id='$cust_id'";
		mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
	}
	
	function getFoodByCustID($cust_id){
		$sql = "SELECT * FROM food_tbl WHERE cust_id='$cust_id'";
		$query = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
		return $query;
	}
	
	function addFoodRS($cust_id, $food_name, $food_price, $food_desc){
		$sql = "INSERT INTO food_tbl SET cust_id='$cust_id', food_name='$food_name', food_price='$food_price', food_desc='$food_desc'";
		mysql_query($this->link, $sql) or die(mysql_error($this->link));
	}
	
	function getFoodByID($food_id){
		$sql = "SELECT * FROM food_tbl WHERE food_id='$food_id'";
		$query = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
		return $query;
	}
	
	function deleteFoodByID($food_id){
		$sql = "DELETE FROM food_tbl WHERE food_id='$food_id'";
		mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
	}
	
	function updateFoodByID($food_id, $food_name, $food_price, $food_desc){
		$sql = "UPDATE food_tbl SET food_name='$food_name', food_price='$food_price', food_desc='$food_desc' WHERE food_id='$food_id'";
		//echo $sql;
		mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
	}
	
	function getWeekMeal($week_start, $week_end){
		$sql = "SELECT L1.*, L2.cust_id L2_cust_id FROM mealmanage_tbl L1 LEFT JOIN mealmanage_tbl L2 ON L1.order_date=L2.order_date AND L2.order_type='2' WHERE L1.order_type='1' AND L1.order_date between '$week_start' AND '$week_end' ORDER BY L1.order_date";
		$query = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
		return $query;
	}
}
?>