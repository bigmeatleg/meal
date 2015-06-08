<!doctype html>
<html>
<head>
<script src="jquery/jquery.js"></script>
<script src="jquery/jquery-ui.min.js"></script>
<script src="js/menu.js"></script>
<script src="js/admincust.js"></script>
<link rel="stylesheet" type="text/css" href="jquery/jquery-ui.min.css">
<link rel="stylesheet" type="text/css" href="css/admin.css">
<meta charset="UTF-8">
<title>廠商管理</title>
</head>

<body>
<div id="toolbar" class="ui-widget-header ui-corner-all">
<button id="btnAdminCust">廠商管理</button>
<button id="btnAdminFood">菜單管理</button>
<button id="btnAdminMan">人員管理</button>
</div>
<?php
include('dbclass.php');
$obj = new DB();
?>
<div id="contents">
<h1>廠商管理</h1>
<div><button id="btnAdd">新增資料</button></div>
<table>
<thead>
	<tr>
  	<td>ID</td>
    <td>廠商名稱</td>
    <td>連絡人</td>
    <td>統編</td>
    <td>電話一</td>
    <td>電話二</td>
    <td>住址</td>
  </tr>
 </thead>
 <tbody>
 <?php 
 $result = $obj->getCustList();
 if(mysql_num_rows($result)){
	 while($row = mysql_fetch_array($result)){
		 echo "<tr>";
		 echo "<td>".$row['cust_id']."</td>";
		 echo "<td>".$row['cust_name']."</td>";
		 echo "<td>".$row['cust_contact']."</td>";
		 echo "<td>".$row['cust_no']."</td>";
		 echo "<td>".$row['cust_phone1']."</td>";
		 echo "<td>".$row['cust_phone2']."</td>";
		 echo "<td>".$row['cust_address']."</td>";
		 echo "</tr>";
	 }
 }
 ?>
 </tbody>
</table>
</div>
<div id="dialog_detail">
	<iframe id="iframe_detail"></iframe>
</div>
</body>
</html>
