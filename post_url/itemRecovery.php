<?php
session_start();
$user_id = $_SESSION['user_id']; 
require_once('../functions/cls_dbconfig.php');

	function __autoload($class_name){
		require_once("../functions/$class_name.class.php");
	}
	$db = new DB();
	$cls_damage = new cls_damage();

	$supplier_id = $db->con()->real_escape_string("$_POST[supplier_id]");
	$item_id = $db->con()->real_escape_string("$_POST[item_name]");
	$damage_qnty = $db->con()->real_escape_string("$_POST[damage_qnty]");
	$recover_qnty = $db->con()->real_escape_string("$_POST[recover_qnty]");
	$remarks = $db->con()->real_escape_string("$_POST[remarks]");


	echo $cls_damage->damage_recover($supplier_id, $item_id, $damage_qnty, $recover_qnty, $remarks, $user_id);
?>