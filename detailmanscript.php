<?php
include('dbclass.php');
if(isset($_POST['action'])){
	if($_POST['action'] == 'addnew'){
		$user_id = $_POST['user_id'];
		$user_name = $_POST['user_name'];
		$user_department = $_POST['user_department'];
		$user_email = $_POST['user_email'];
		$user_password = $_POST['user_password'];
		$db = new DB();

		if($db->addMan($user_id, $user_name, $user_password, $user_department, $user_email) == -1){
			echo "<script language='javascript'>";
			echo "alert('使用者ID己新增');";
			echo "</script>	";
		}
		echo "新增資料";
	}
}
?>

<script language="javascript">
window.parent.jQuery('#dialog_detail').dialog('close');
</script>
