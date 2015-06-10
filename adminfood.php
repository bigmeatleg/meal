<!doctype html>
<html>
<head>
<script src="jquery/jquery.js"></script>
<script src="jquery/jquery-ui.min.js"></script>
<script src="js/menu.js"></script>
<script src="js/adminfood.js"></script>
<link rel="stylesheet" type="text/css" href="jquery/jquery-ui.min.css">
<link rel="stylesheet" type="text/css" href="css/admin.css">
<meta charset="UTF-8">
<title>菜單管理</title>
</head>

<body>
<div id="toolbar" class="ui-widget-header ui-corner-all">
<button id="btnAdminCust">廠商管理</button>
<button id="btnAdminFood">菜單管理</button>
<button id="btnAdminMan">人員管理</button>
</div>
<h1>菜單管理</h1>
<div>
	<table id="admin_list" name="admin_list" width="100%">
  	<thead>
  	<tr>
    <td width="20%">廠商列表</td>
    <td width="80%">菜單列表</td>
    </tr>
    </thead>
    <tbody>
    <tr>
    <td valign="top">
    <?php
		include('dbclass.php');
		$db = new DB();
		$result = $db->getCustList();
		if(mysqli_num_rows($result)){
			echo "<table id='cust_list' name='cust_list'>";
			while($rs = mysqli_fetch_array($result)){
				echo "<tr><td><a class='mealclass' href='adminmeal.php?id=".$rs['cust_id']."'>".$rs['cust_name']."</a></td></tr>";
			}
			echo "</table>";
		}
		?>
    </td>
    <td valign="top">
    <div>
    <p id="showadd" style="visibility:hidden"><a href="#" id="meal_add" name="meal_add">新增菜單</a></p>
    <iframe id="meal_list" name="meal_list" src="" frameborder="0" width="100%" height="360 px"></iframe>
    </div>
    </td>
    </tr>
    </tbody>
  </table>
</div>
</body>
<div id="dialog_detail" name="dialog_detail" style="visibility:hidden">
<iframe id="iframe_detail" name="="iframe_detail" src=""></iframe>
</div>
</html>
