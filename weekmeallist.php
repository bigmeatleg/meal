<!doctype html>
<html>
<head>
<script src="jquery/jquery.js"></script>
<script src="jquery/jquery-ui.min.js"></script>
<script src="js/menu.js"></script>
<script src="jquery/chosen/chosen.jquery.min.js"></script>
<script src="js/weekmeallist.js"></script>
<link rel="stylesheet" type="text/css" href="jquery/jquery-ui.min.css">
<link rel="stylesheet" type="text/css" href="css/admin.css">
<link rel="stylesheet" type="text/css" href="jquery/chosen/chosen.min.css">
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

$aryCust = $db->getCustList2Array();

function custSelect($id, $selectitem){
	global $aryCust;
	$output = "<select id='$id' name='$id' class='chosen-single'>";
	if($aryCust){
		$output .= "<option value='-1'></option>";
		foreach($aryCust as $keyname=>$value){
			if($value == $selectitem){
				$output .= "<option value='$value' selected>$keyname</option>";
			} else {
				$output .= "<option value='$value'>$keyname</option>";
			}
		}
	}
	$output .= "</select>";
	
	return $output;
}
?>
<div>
	<form id="stdform" name="stdform" method="post" action="weekmeallistscript.php">
  <p><button id="btnupdate" style="width:80px; height: 30px">更新</button></p>
	<table width="100%">
  	<thead>
  	<tr>
    	<td>類別</td>
      <?php
			for($i = 0; $i < count($aryWeekName); $i++){
				if($i > 0) $startDate->modify('+1 day');
				echo "<td>".$startDate->format('Y-m-d')."</br>".$aryWeekName[$i]."</td>";
			}
			?>
    </tr>
    </thead>
    <tbody>
    <?php
		echo "<tr>";
		echo "<td class='rowtitlefield'>是否要訂</td>";
		for($i = 1; $i <= 5; $i++){
			echo "<td>";
			echo "<input type=\"checkbox\" id=\"enabled[]\" name=\"enabled[]\" value='$i' checked><label for=\"enabled[]\">開啟</label>";
		}
		echo "</tr>";
		
		echo "<tr>";
		echo "<td class='rowtitlefield'>中餐</td>";
		$startDate = new DateTime($wd['week_start']);
		for($i = 1; $i <=5; $i++){
			$noonvalue = $aryDate[$startDate->format('Y-m-d')][0];
			echo "<td>".custSelect('noon[]', $noonvalue)."</td>";
			$startDate->modify('+1 day');
		}
		echo "</tr>";
		
		echo "<tr>";
		echo "<td class='rowtitlefield'>晚餐</td>";
		$startDate = new DateTime($wd['week_start']);
		for($i = 1; $i <=5; $i++){
			$dinnervalue = $aryDate[$startDate->format('Y-m-d')][1];
			echo "<td>".custSelect('dinner[]', $dinnervalue)."</td>";
			$startDate->modify('+1 day');
		}
		
		echo "</tr>";
		?>
    </tbody>
  </table>
  <?php
	echo "<input type='hidden' id='start_date' name='start_date' value='".$wd['week_start']."'>";
	?>
  </form>
</div>
</body>
</html>
