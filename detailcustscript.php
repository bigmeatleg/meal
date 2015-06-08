<?php
include('dbclass.php');
if(isset($_POST['action'])){
	if($_POST['action'] == 'update'){
		$cust_id = $_POST['cust_id'];
		$cust_name = $_POST['cust_name'];
		$cust_contact = $_POST['cust_contact'];
		$cust_no = $_POST['cust_no'];
		$cust_phone1 = $_POST['cust_phone1'];
		$cust_phone2 = $_POST['cust_phone2'];
		$cust_address = $_POST['cust_address'];
		
		$db = new DB();
		$db->updateCustRSByID($cust_id, $cust_name, $cust_contact, $cust_no, $cust_phone1, $cust_phone2, $cust_address);
	} else if($_POST['action'] == 'delete'){
		$db = new DB();
		$db->deleteCustRSByID($_POST['cust_id']);
	} else {
		$cust_name = $_POST['cust_name'];
		$cust_contact = $_POST['cust_contact'];
		$cust_no = $_POST['cust_no'];
		$cust_phone1 = $_POST['cust_phone1'];
		$cust_phone2 = $_POST['cust_phone2'];
		$cust_address = $_POST['cust_address'];
	
		$db = new DB();
		$db->addCustRS($cust_name, $cust_contact, $cust_no, $cust_phone1, $cust_phone2, $cust_address);
	}
}
?>

<script language="javascript">
window.parent.jQuery('#dialog_detail').dialog('close');
</script>