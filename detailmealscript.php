<?php
if(!isset($_POST['action'])) CloseForm();

include('dbclass.php');
$db = new DB();

$cust_id = $_POST['cust_id'];
$food_name = $_POST['food_name'];
$food_price = $_POST['food_price'];
$food_desc = $_POST['food_desc'];
$food_id = $_POST['food_id'];

if($_POST['action'] == "addnew"){
	$db->addFoodRS($cust_id, $food_name, $food_price, $food_desc);
}

if($_POST['action'] == "delete"){
	$db->deleteFoodByID($food_id);
}

if($_POST['action'] == "update"){
	$db->updateFoodByID($food_id, $food_name, $food_price, $food_desc);
}

function CloseForm(){
	die('no parameter is there');
}
?>

<script language="javascript">
window.parent.jQuery('#dialog_detail').dialog('close');
</script>
