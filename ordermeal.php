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
<link rel="stylesheet" type="text/css" href="css/admin.css">
<meta charset="UTF-8">
<title>訂餐</title>
<style>
button{
	width: 120px;
	height: 30px;
}
</style>
</head>

<body>
<div>
<form id="stdform" name="stdform" method="post" action="">
<p><button>更新</button></p>
<?php
if(!isset($_GET['w'])) die("not set week");

include('common.php');
include('dbclass.php');

$db = new DB();
$user_id = $_SESSION['user_id'];
$weeknum = $_GET['w'];
$yearnum = date('Y');
$aryResult = getStartAndEndDate($weeknum, $yearnum);
$startDate = new DateTime($aryResult['week_start']);
$aryWeekName = array("星期一", "星期二", "星期三", "星期四", "星期五");

echo "<table width='100%'>";
echo "<tr>";
for($i = 0; $i < 5; $i++){
	echo "<td class='titlefield' width='20%'>".$startDate->format('Y-m-d')."<br>".$aryWeekName[$i]."</td>";
	$startDate->modify('+1 day');
}
echo "</tr>";
$query = $db->getWeekOrderByUserID($user_id, $aryResult['week_start'], $aryResult['week_end']);
$userorder = parseQuery($query);
echo "<tr>";
$startDate = new DateTime($aryResult['week_start']);
for($i = 0; $i < 5; $i ++){
	echo "<td>";
	$aryData = $userorder[$startDate->format('Y-m-d')."-1"];
	if($aryData){
		echo "中餐: ".$aryData['cust_name']." - ".$aryData['food_name']."($".$aryData['food_price'].")<br>";
	} else {
		echo "中餐: 未訂<br>";
	}
	
	$aryData = $userorder[$startDate->format('Y-m-d')."-2"];
	if($aryData){
		echo "晚餐: ".$aryData['cust_name']."-".$aryData['food_name']."($".$aryData['food_price'].")<br>";
	} else {
		echo "晚餐: 未訂<br>";
	}
	echo "</td>";
	
	$startDate->modify('+1 day');
}
echo "</tr>";
echo "</table>";

function parseQuery($sqlQuery){
	if(!mysqli_num_rows($sqlQuery)) return;
	$aryRet = array();
	while($rs = mysqli_fetch_array($sqlQuery)){
		$aryData = array('cust_name' => $rs['cust_name'], 'food_name'=>$rs['food_name'], 'food_price' => $rs['food_price']);
		$strkey = $rs['order_date'] . "-". $rs['order_type'];
		$aryRet[$strkey] = $aryData;
	}
	
	return $aryRet;
}
?>
</form>
</div>
</body>
</html>
