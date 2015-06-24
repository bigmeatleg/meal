<!doctype html>
<html>
<head>
<script src="jquery/jquery.js"></script>
<script src="jquery/jquery-ui.min.js"></script>
<script src="js/login.js"></script>
<link rel="stylesheet" type="text/css" href="jquery/jquery-ui.min.css">
<script src="jquery/Validation-Engine/js/jquery.validationEngine.js"></script>
<script src="jquery/Validation-Engine/js/languages/jquery.validationEngine-zh_TW.js"></script>
<link rel="stylesheet" type="text/css" href="jquery/Validation-Engine/css/validationEngine.jquery.css">
<meta charset="UTF-8">
<title>Login System</title>
</head>
<style type="text/css">
body{
	padding-top: 20px;
}

table{
	width: 600px;
	height: 400px;
	border-collapse:collapse;
	border: solid 1px #938C8C;
}

tbody tr td{
	padding-top: 10px;
	padding-left: 20px;
	padding-bottom: 10px;
	padding-right: 20px;
}

input{
	width: 100%;
}

</style>
<body>
<div style="width:100%; height:100%" align="center">
<form id="stdform" name="stdform" method="post" action="loginscript.php">
<table>
	<tr style="height: 50%">
  	<td align="center"><h1>系統登錄</h1></td>
  </tr>
  <tbody>
  <tr>
  	<td>ID<br><input type="text" id="user_id" name="user_id" class="validate[required]"></td>
  </tr>
  <tr>
  	<td>password<br><input type="password" id="user_password" name="user_password" class="validate[required]"></td>
  </tr>
  <tr>
  	<td align="center"><button>登入</button></td>
  </tr>
  </tbody>
</table>
</form>
</div>
</body>
</html>