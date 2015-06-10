<!doctype html>
<html>
<head>
<script src="jquery/jquery.js"></script>
<script src="jquery/jquery-ui.min.js"></script>
<script src="js/detailcust.js"></script>
<script src="jquery/Validation-Engine/js/jquery.validationEngine.js"></script>
<script src="jquery/Validation-Engine/js/languages/jquery.validationEngine-zh_TW.js"></script>
<link rel="stylesheet" type="text/css" href="jquery/jquery-ui.min.css">
<link rel="stylesheet" type="text/css" href="css/detail.css">
<link rel="stylesheet" type="text/css" href="jquery/Validation-Engine/css/validationEngine.jquery.css">

<meta charset="UTF-8">
<title>Detail</title>
</head>
<body>
<div>
<form id="stdform" method="post" action="detailcustscript.php" width="560">
<table>
	<tr>
  	<td class="titlefield">廠商名稱</td><td><input type="text" id="cust_name" name="cust_name" value="" class="validate[required]"></td>
    <td class="titlefield">連絡人</td><td><input type="text" id="cust_contact" name="cust_contact" value=""></td>
  </tr>
  <tr>
  	<td class="titlefield">統一編號</td><td colspan="3"><input type="text" id="cust_no" name="cust_no" value=""></td>
  </tr> 
  <tr>
  	<td class="titlefield">電話一</td><td><input type="text" id="cust_phone1" name="cust_phone1" value=""></td>
    <td class="titlefield">電話二</td><td><input type="text" id="cust_phone2" name="cust_phone2" value=""></td>
  </tr>
  <tr>
  	<td class="titlefield">住址</td><td colspan="3"><input type="text" id="cust_address" name="cust_address" value=""></td>
  </tr>
</table>
<input type="hidden" id="cust_id" name="cust_id" value=""><input type="hidden" id="action" name="action" value="default">
<p id="listbutton"></p>
</form>
</div>
<?php
if(isset($_GET['id'])){
	include('dbclass.php');
	$db = new DB();
	$result = $db->getCustByID($_GET['id']);
	if(mysqli_num_rows($result)){
		$rs = mysqli_fetch_array($result);
		echo "<script>";
		echo "$('#cust_id').attr('value', '".$rs['cust_id']."');";
		echo "$('#cust_name').attr('value', '".$rs['cust_name']."');";
		echo "$('#cust_contact').attr('value', '".$rs['cust_contact']."');";
		echo "$('#cust_no').attr('value', '".$rs['cust_no']."');";
		echo "$('#cust_phone1').attr('value', '".$rs['cust_phone1']."');";
		echo "$('#cust_phone2').attr('value', '".$rs['cust_phone2']."');";
		echo "$('#cust_address').attr('value', '".$rs['cust_address']."');";
		echo "</script>";
	}
}
?>
</body>
</html>
