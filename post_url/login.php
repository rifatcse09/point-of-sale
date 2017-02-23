<?php
	require_once('../functions/cls_dbconfig.php');
	function __autoload($class_name){
		require_once("../functions/$class_name.class.php");
	}
	
	$cls_user_info = new cls_user_info();

    $username = $_POST['username'];
	$password = md5($_POST['password']);
	
	$result = $cls_user_info->login($username, $password);
	echo $result;

?>