<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>
<?php
if(!isset($_GET['y']) || !isset($_GET['w'])) die('');
include('common.php');
include('dbclass.php');

$weeknum = $_GET['w'];
$yearnum = $_GET['y'];
$wd = getStartAndEndDate($weeknum, $yearnum);
$startDate = new DateTime($wd['week_start']);
$aryWeekName = array("星期一", "星期二", "星期三", "星期四", "星期五");

$db = new DB();
$result = $db->getWeekMeal($wd['week_start'], $wd['week_end']);

$aryDate = parseMeal($result);
?>
<div>
	<form id="stdform" name="stdform" method="post" action="">
  <button>更新</button>
	<table width="100%">
  	<tr>
    	<td>類別</td>
      <?php
			for($i = 0; $i < count($aryWeekName); $i++){
				if($i > 0) $startDate->modify('+1 day');
				echo "<td>".$startDate->format('Y-m-d')."</br>".$aryWeekName[$i]."</td>";
			}
			?>
    </tr>
    <tr>
    	<td>中餐</td>
    	<td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
    	<td>晚餐</td>
    	<td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
  </table>
  <?php
	
	?>
  </form>
</div>
</body>
</html>
