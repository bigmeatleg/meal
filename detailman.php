<!doctype html>
<html>
<head>
<script src="jquery/jquery.js"></script>
<script src="jquery/jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" href="jquery/jquery-ui.min.css">
<link rel="stylesheet" type="text/css" href="css/detail.css">
<script src="jquery/Validation-Engine/js/jquery.validationEngine.js"></script>
<script src="jquery/Validation-Engine/js/languages/jquery.validationEngine-zh_TW.js"></script>
<link rel="stylesheet" type="text/css" href="jquery/Validation-Engine/css/validationEngine.jquery.css">
<script src="js/detailman.js"></script>
<meta charset="UTF-8">
<title>Detail man</title>
</head>

<body>
<form id="stdform" name="stdform" method="post" action="detailmanscript.php">
<table>
	<tr>
  	<td>登入ID</td>
    <td><input type="text" id="user_id" name="user_id" class="validate[required]"></td>
    <td>姓名</td>
    <td><input type="text" id="user_name" name="user_name" class="validate[required]"></td>
  </tr>
  <tr>
  	<td>部門</td>
    <td><input type="text" id="user_department" name="user_department" class="validate[required]"></td>
    <td>Email</td>
    <td><input type="text" id="user_email" name="user_email" class="validate[required, custom[email]]"></td>
  </tr>
  <tr>
  	<td>密碼</td>
    <td colspan="3"><input type="text" id="user_password" name="user_password">
    <button id="btnRandPWD" name="btnRandPWD" style="width:100px; height: 24px">隨機密碼</button>
    </td>
  </tr>
</table>
<input type="hidden" id="action" name="action" value="">
</form>
<?php
if(isset($_GET['id'])){
	include('dbclass.php');
	$db = new DB();
	$query = $db->getManByID($_GET['id']);
	$rs = mysqli_fetch_array($query);
	echo "<script language='javascript'>";
	echo "$('#user_id').attr('value', '".$rs['user_id']."').prop('disabled', true);";
	echo "$('#user_name').attr('value', '".$rs['user_name']."');";
	echo "$('#user_department').attr('value', '".$rs['user_department']."');";
	echo "$('#user_email').attr('value', '".$rs['user_email']."');";
	echo "$('#user_password').attr('value', '".$db->des_decrypt($rs['user_password'])."');";
	echo "</script>";
}
?>
</body>
</html>
