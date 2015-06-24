<?php
session_start(600);
if(!isset($_SESSION['user_id'])){
	echo '<meta http-equiv=REFRESH CONTENT=1;url=login.php>';
	die('not login system');
}
?>
<!doctype html>
<html>
<head>
<script src="jquery/jquery.js"></script>
<script src="jquery/jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" href="jquery/jquery-ui.min.css">
<meta charset="UTF-8">
<title>餐點訂購</title>
</head>
<body>
<div>
<h1>餐點管理</h1>

</div>
</body>
</html>