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

function parseMeal($query){
	if(!mysqli_num_rows($query)) return;
	$aryRet = array();
	while($rs = mysqli_fetch_array($query)){
		$aryRet[$rs['order_date']] = array($rs['cust_id'], $rs['L2_cust_id']);
	}
		
	return $aryRet;
}
?>