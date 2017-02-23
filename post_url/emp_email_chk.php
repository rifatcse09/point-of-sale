<?php 
    session_start();
    $saved_by = $_SESSION['user_id'];
    require_once('../functions/cls_dbconfig.php');
	function __autoload($class_name){
		require_once("../functions/$class_name.class.php");
	}
	$db = new DB();
	$cls_employee = new cls_employee();
	
	$email = $db->con()->real_escape_string("$_POST[email]");

	$result = $cls_employee->employee_chk($email);
    

?>