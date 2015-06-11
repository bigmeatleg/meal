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
		$sql = "SELECT * FROM customer_tbl ORDER BY cust_name";
		$query = mysqli_query($this->link, $sql) or die('Error:'. mysqli_error($this->link));
		return $query;
	}
	
	function getCustList2Array(){
		$sql = "SELECT cust_id, cust_name FROM customer_tbl ORDER BY cust_name";
		$query = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
		
		if(!mysqli_num_rows($query)) return;
		
		$aryRet = array();
		while($rs = mysqli_fetch_array($query)){
			$aryRet[$rs['cust_name']] = $rs['cust_id'];
		}
		
		return $aryRet;
	}
	
	function getCustByID($id){
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
	
	function addMealByArray($aryDate, $aryType, $aryCust){
		$sql = "REPLACE INTO mealmanage_tbl (order_date, order_type, cust_id) VALUE (?, ?, ?)";
		$stmt = $this->link->prepare($sql);
		$stmt->bind_param('sss', $order_date, $order_type, $cust_id);
		for($i = 0; $i < count($aryDate); $i ++){
			$order_date = $aryDate[$i];
			$order_type = $aryType[$i];
			$cust_id = $aryCust[$i];
			//echo "data: $order_date - $order_type - $cust_id'<br>";
			$stmt->execute();
		}
		$stmt->close();
	}
}
?>