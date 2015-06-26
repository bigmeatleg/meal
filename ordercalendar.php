<?php
session_start(600);
if(!isset($_SESSION['user_id'])){
	echo '<meta http-equiv=REFRESH CONTENT=1;url=login.php>';
	die('not login system');
}

$_SESSION['user_id'] = $_SESSION['user_id'];
?>
<!doctype html>
<html>
<head>
<script src="jquery/jquery.js"></script>
<script src="jquery/jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" href="jquery/jquery-ui.min.css">
<script src="js/ordercalendar.js"></script>
<meta charset="UTF-8">
<title>餐點訂購</title>
<style>
.ui-widget-header{
	padding: 4px;
}

.ui-menu { width: 100%; }

table{
	width: 100%;
	height: 100%;
}

iframe{
	width: 100%;
	height: 100%;
}

td{
	padding: 8px;
}

iframe
{
	border: none;
}
</style>
</head>
<body>
<div>
<h1>餐點管理</h1>
<div>
<table>
	<tr>
  	<td id="weekselect" width="16%" valign="top">
    	<ul id="weekmenu">
        <li class="ui-widget-header">訂餐</li>
        <?php
				$weeknum = date('W');
				echo "<li><a href='#'>當日晚餐</a></li>";
				echo "<li><a href=".$weeknum.">本週訂餐</a></li>";
				echo "<li><a href=".($weeknum+1).">下週訂餐</a></li>";
				?>
        <li class="ui-widget-header">歷史記錄</li>
      </ul>
    </td>
    
    <td valign="top">
    <iframe id="w_content" name="w_content"></iframe>
    </td>
  </tr>
</table>
</div>
</div>
</body>
</html>