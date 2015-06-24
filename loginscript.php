<?php
if(isset($_POST['user_id']) && isset($_POST['user_password'])){
	include('dbclass.php');
	session_start($lifeTime);
	
	$user_id = $_POST['user_id'];
	$user_password = $_POST['user_password'];
	
	$db = new DB();
	$query = $db->Login($user_id, $user_password);
	$rs = mysqli_fetch_array($query);
	if($rs['success']){
		$_SESSION['user_id'] = $user_id;
		$_SESSION['user_password'] = $user_password;
		echo '<meta http-equiv=REFRESH CONTENT=1;url=ordercalendar.php>'; 
	} else {
		echo '登入失敗';
		echo '<meta http-equiv=REFRESH CONTENT=1;url=login.php>';
	}
} else {
	echo '登入失敗';
	echo '<meta http-equiv=REFRESH CONTENT=1;url=login.php>';
}
?>