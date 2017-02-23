<?php 
session_start();
$saved_by= $_SESSION['user_id']; 
require_once('../functions/cls_dbconfig.php');
	function __autoload($class_name){
		require_once("../functions/$class_name.class.php");
	}
	
	$db= new DB();
	$cls_supplier = new cls_supplier();
	$supp_id = $db->con()->real_escape_string("$_POST[supplier_id]");
	$due = $db->con()->real_escape_string("$_POST[due]");
	$amount = $db->con()->real_escape_string("$_POST[amount]");
	$balance = $due - $amount ;
	$remarks = $db->con()->real_escape_string("$_POST[remarks]");

	echo $cls_supplier->supplier_payment($supp_id,$amount,$balance,$remarks,$saved_by);

?>