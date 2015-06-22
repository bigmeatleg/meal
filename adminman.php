<!doctype html>
<html>
<head>
<script src="jquery/jquery.js"></script>
<script src="jquery/jquery-ui.min.js"></script>
<script src="js/menu.js"></script>
<script src="js/adminman.js"></script>
<link rel="stylesheet" type="text/css" href="jquery/jquery-ui.min.css">
<link rel="stylesheet" type="text/css" href="css/admin.css">
<meta charset="UTF-8">
<title>人員管理</title>
</head>

<body>
<div id="toolbar" class="ui-widget-header ui-corner-all">
<button id="btnAdminCust">廠商管理</button>
<button id="btnAdminFood">菜單管理</button>
<button id="btnAdminMan">人員管理</button>
</div>
<div>
<h1>人員管理</h1>
<p><button id="btnAdd" name="btnAdd" style="width:140px; height: 30px;">新增資料</button></p>
<?php
include('dbclass.php');
$db = new DB();
?>
<table>
	<thead>
	<tr>
  	<td>登入ID</td>
    <td>姓名</td>
    <td>部門</td>
    <td>Email</td>
    <td>密碼</td>
  </tr>
  </thead>
  <tbody>
  <?php
	$result = $db->getManList();
	while($rs = mysqli_fetch_array($result)){
		echo "<tr>";
		echo "<td>".$rs['user_id']."</td>";
		echo "<td>".$rs['user_name']."</td>";
		echo "<td>".$rs['user_department']."</td>";
		echo "<td>".$rs['user_email']."</td>";
		echo "<td>".$rs['user_password']."</td>";
		echo "</tr>";
	}
	?>
  </tbody>
</table>
</div>
<div id="dialog_detail" name="dialog_detail" style="visibility: hidden">
	<iframe id="iframe_detail" name="iframe_detail" src=""></iframe>
</div>
</body>
</html>