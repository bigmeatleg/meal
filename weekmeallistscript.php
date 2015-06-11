<?php
if(isset($_POST['enabled'])){
	include('dbclass.php');
	$db = new DB();
	
	$enabled = $_POST['enabled'];
	$aryEnable = array();
	for($i =0; $i < 5; $i ++){
		$aryEnable[$i] = 0;
		for($j = 0; $j < count($enabled); $j++){
			if(($i+1) == $enabled[$j]){
				$aryEnable[$i] = 1;
				break;
			}
		}
	}
	
	$aryDate = array();
	$aryType = array();
	$aryCust = array();
	$startDate = new DateTime($_POST['start_date']);
	$noon = $_POST['noon'];
	for($i = 0; $i < 5; $i++){
		$aryDate[] = $startDate->format('Y-m-d');
		$aryType[] = '1'; //noon
		if($aryEnable[$i]){
			$aryCust[] = $noon[$i];
		} else {
			$aryCust[] = '-1';
		}
		
		$startDate->modify('+1 day');
	}
	
	$startDate = new DateTime($_POST['start_date']);
	$dinner = $_POST['dinner'];
	for($i = 0; $i < 5; $i++){
		$aryDate[] = $startDate->format('Y-m-d');
		$aryType[] = '2'; //dinner
		if($aryEnable[$i]){
			$aryCust[] = $dinner[$i];
		} else {
			$aryCust[] = '-1';
		}
		
		$startDate->modify('+1 day');
	}
	
	$db->addMealByArray($aryDate, $aryType, $aryCust);
}
?>