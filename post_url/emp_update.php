<?php 
require_once('../functions/cls_dbconfig.php');
	function __autoload($class_name){
		require_once("../functions/$class_name.class.php");
	}
	$db = new DB();
	$cls_datetime = new cls_datetime();
	$cls_employee = new cls_employee();
	
    $user_id = htmlspecialchars($_REQUEST['user_id'], ENT_QUOTES, 'UTF-8');
    $emp_id = htmlspecialchars($_REQUEST['emp_id'], ENT_QUOTES, 'UTF-8');
	$name = $db->con()->real_escape_string("$_POST[name]");
	$email = $db->con()->real_escape_string("$_POST[email]");
	$mobile = $db->con()->real_escape_string("$_POST[mobile]");
	$username = $db->con()->real_escape_string("$_POST[username]");
	$password = $db->con()->real_escape_string($_POST['password']);
	$usertype = $db->con()->real_escape_string("$_POST[usertype]");
	$about = $db->con()->real_escape_string("$_POST[about]");
	
	echo $cls_employee->employee_update($user_id, $emp_id, $name, $email, $mobile, $username, $password, $usertype, $about);

?>