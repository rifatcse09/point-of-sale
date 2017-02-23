<?php 
session_start();
$saved_by= $_SESSION['user_id']; 
require_once('../functions/cls_dbconfig.php');
	function __autoload($class_name){
		require_once("../functions/$class_name.class.php");
	}
	
	$db= new DB();
	$cls_category = new cls_category();
	$cat_id = $db->con()->real_escape_string("$_POST[cat_id]");
	$CategoryName = $db->con()->real_escape_string("$_POST[CategoryName]");

	echo $cls_category->update_category($cat_id,$CategoryName,$saved_by);

?>