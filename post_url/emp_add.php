<?php 
require_once('../functions/cls_dbconfig.php');
	function __autoload($class_name){
		require_once("../functions/$class_name.class.php");
	}
	$db = new DB();
	$cls_datetime = new cls_datetime();
	$cls_employee = new cls_employee();
	
    $user_id = $_POST['user_id'];
	$name = $db->con()->real_escape_string("$_POST[name]");
	$email = $db->con()->real_escape_string("$_POST[email]");
	$mobile = $db->con()->real_escape_string("$_POST[mobile]");
	$username = $db->con()->real_escape_string("$_POST[username]");
	$password = $db->con()->real_escape_string(md5($_POST['password']));
	$usertype = $db->con()->real_escape_string($_POST['usertype']);
	$about = $db->con()->real_escape_string("$_POST[about]");
	
	echo $cls_employee->employee_add($user_id, $name, $email, $mobile, $username, $password, $usertype, $about);

?>