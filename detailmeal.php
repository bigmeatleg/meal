<!doctype html>
<html>
<head>
<script src="jquery/jquery.js"></script>
<script src="jquery/jquery-ui.min.js"></script>
<script src="jquery/Validation-Engine/js/jquery.validationEngine.js"></script>
<script src="jquery/Validation-Engine/js/languages/jquery.validationEngine-zh_TW.js"></script>
<script src="js/detailmeal.js"></script>
<link rel="stylesheet" type="text/css" href="jquery/jquery-ui.min.css">
<link rel="stylesheet" type="text/css" href="css/detail.css">
<link rel="stylesheet" type="text/css" href="jquery/Validation-Engine/css/validationEngine.jquery.css">
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>
<div>
	<form id="stdform" name="stdform" method="post" action="detailmealscript.php">
  <table>
  	<tr>
    	<td width="120px" class="titlefield">名稱</td><td width="300px"><input type="text" id="food_name" name="food_name"  style="width:300px" value="" class="validate[required]"></td>
    </tr>
    <tr>
    	<td class="titlefield">價格</td><td><input type="text" id="food_price" name="food_price" style="width:300px" value="" class="validate[required, custom[integer]]"></td>
    </tr>
    <tr>
    	<td class="titlefield">說明</td><td><textarea id="food_desc" name="food_desc" style="width:300px; height:100px; resize:none"></textarea></td>
    </tr>
  </table>
  <input type="hidden" id="cust_id" name="cust_id" value=""><input type="hidden" id="food_id" name="food_id" value=""><input type="hidden" id="action" name="action" value="">
  </form>
 </div>
 <?php
 echo "<script>";
 if(isset($_GET['id'])){
	 echo "$('#cust_id').attr('value', '". $_GET['id']."');";
 }
 
 if(isset($_GET['fid'])){
	 include('dbclass.php');
	 $db = new DB();
	 $result = $db->getFoodByID($_GET['fid']);
	 $rs = mysql_fetch_array($result);
	 echo "$('#food_name').attr('value', '". $rs['food_name']."');";
	 echo "$('#food_price').attr('value', '". $rs['food_price']."');";
	 echo "$('#food_desc').text('".$rs['food_desc']."');";
	 echo "$('#food_id').attr('value', '". $rs['food_id']."');";
 }
 echo "</script>";
 ?>
</body>
</html>
