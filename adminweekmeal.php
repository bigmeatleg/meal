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
				echo "<td><a href='".$yearnum."-".($weeknum + $i)."'>";
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
      <td width="84%">
      <iframe width="100% id="weekmeal" namd="weekmeal" src="" style="border:none"></iframe>
      </td>
    </tr>
    </tbody>
  </table>
</div>

<?php
function getStartAndEndDate($week, $year)
{
	$dto = new DateTime();
  $dto->setISODate($year, $week);
  $ret['week_start'] = $dto->format('Y-m-d');
  $dto->modify('+6 days');
  $ret['week_end'] = $dto->format('Y-m-d');
  return $ret;
}

function getIsoWeeksInYear($year) {
    $date = new DateTime;
    $date->setISODate($year, 53);
    return ($date->format("W") === "53" ? 53 : 52);
}
?>
</body>
</html>
