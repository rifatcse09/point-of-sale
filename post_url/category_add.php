<?php 
    session_start();
    $saved_by = $_SESSION['user_id'];
require_once('../functions/cls_dbconfig.php');
	function __autoload($class_name){
		require_once("../functions/$class_name.class.php");
	}
	$db = new DB();
	$cls_category = new cls_category();
	
	$user_id = $saved_by;
	
	$CategoryName = $db->con()->real_escape_string("$_POST[CategoryName]");

	echo $cls_category->category_add($user_id, $CategoryName);

?>