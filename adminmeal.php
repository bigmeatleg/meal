<!doctype html>
<html>
<head>
<script src="jquery/jquery.js"></script>
<script src="jquery/jquery-ui.min.js"></script>
<script src="js/menu.js"></script>
<script src="js/adminmeal.js"></script>
<link rel="stylesheet" type="text/css" href="jquery/jquery-ui.min.css">
<link rel="stylesheet" type="text/css" href="css/admin.css">
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>
<?php
if(!isset($_GET['id'])) die('');
?>
<div>
	<table width="100%">
  	<tr>
    	<td class="titlefield" width="5%">ID</td>
    	<td class="titlefield" width="20%">名稱</td>
      <td class="titlefield" width="5%">價格</td>
      <td class="titlefield" width="70%" valign="top">說明</td> 
    </tr>
    <?php
		include('dbclass.php');
		$db = new DB();
		$result = $db->getFoodByCustID($_GET['id']);
		if(mysql_num_rows($result)){
			while($rs = mysql_fetch_array($result)){
				echo "<tr>";
				//echo "<td><a href='detailmeail.php?id='".$rs['food_id']."'>".$rs['food_name']."</a></td>";
				echo "<td>".$rs['food_id']."</td>";
				echo "<td>".$rs['food_name']."</td>";
				echo "<td>".$rs['food_price']."</td>";
				echo "<td>".$rs['food_desc']."</td>";
				echo "</tr>";
			}
		}
		?>
  </table>
  <input type="hidden" id="cust_id" name="cust_id" value="<?php echo $_GET['id']; ?>">
</div>
</body>
</html>
