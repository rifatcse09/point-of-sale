<?php 
require_once('../functions/cls_dbconfig.php');
	function __autoload($class_name){
		require_once("../functions/$class_name.class.php");
	}
	$db = new DB();
	$cls_user_info = new cls_user_info();
	
    $user_id = $_POST['user_id'];
	$name = $db->con()->real_escape_string("$_POST[name]");
	$email = $db->con()->real_escape_string("$_POST[email]");
	$mobile = $db->con()->real_escape_string("$_POST[mobile]");
	$password = $db->con()->real_escape_string($_POST['password']);
	$about = $db->con()->real_escape_string("$_POST[about]");
	$saved_by = "$_POST[saved_by]";
	
	echo $cls_user_info->userProfileUpdate($user_id, $name, $email, $mobile, trim($password), $about);

?>