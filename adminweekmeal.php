<!doctype html>
<html>
<head>
<script src="jquery/jquery.js"></script>
<script src="jquery/jquery-ui.min.js"></script>
<script src="js/menu.js"></script>
<script src="js/adminweekmeal.js"></script>
<link rel="stylesheet" type="text/css" href="jquery/jquery-ui.min.css">
<link rel="stylesheet" type="text/css" href="css/admin.css">
<meta charset="UTF-8">
<title>週餐點管理</title>
</head>

<body>
<?php
include('common.php');
?>
<h1>每週餐點管理</h1>
<div>
	<table width="100%">
  	<thead>
  	<tr>
    	<td width="10%">週列表</td>
      <td width="90%">週餐點管理</td>
    </tr>
    </thead>
    <tbody>
    <tr>
    	<td width="16%">
      <table id="week_list">
      <?php
			$weeknum = date('W');
			$yearnum = date('Y');
			for($i = 0 ; $i < 10; $i++){
				echo "<tr>";
				echo "<td><a href='y=".$yearnum."&w=".($weeknum + $i)."'>";
				echo $yearnum. "年-第 ".($weeknum + $i)." 週<br>";
				$result = getStartAndEndDate($weeknum+$i, $yearnum);
				echo date('m-d', strtotime($result['week_start']))." - ".date('m-d', strtotime($result['week_end']));
				echo "</a></td>";
				echo "</tr>";
				
				if(getIsoWeeksInYear($yearnum) == ($weeknum +$i)){
					$yearnum++;
					$weeknum = ($i) *(-1);
				}
			}
			?>
      </table> 
      </td>
      <td width="84%" valign="top">
      <iframe width="100%" id="weekmeal" name="weekmeal" src="" style="border:none"></iframe>
      </td>
    </tr>
    </tbody>
  </table>
</div>
</body>
</html>
