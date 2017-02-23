<?php 
require_once('../functions/cls_dbconfig.php');
	function __autoload($class_name){
		require_once("../functions/$class_name.class.php");
	}
	
	$db= new DB();
	$cls_supplier = new cls_supplier();
	
	$company_name = $db->con()->real_escape_string("$_POST[company_name]");
	$address = $db->con()->real_escape_string("$_POST[address]");
	$mobile = $db->con()->real_escape_string("$_POST[mobile]");
	$email = $db->con()->real_escape_string("$_POST[email]");
	$contact_person = $db->con()->real_escape_string("$_POST[contact_person]");
	$contact_person_mobile = $db->con()->real_escape_string("$_POST[contact_person_mobile]");
	$payable_amount = $db->con()->real_escape_string("$_POST[payable_amount]");
	$remarks = $db->con()->real_escape_string("$_POST[remarks]");
	$saved_by = "$_POST[saved_by]";
	
	echo $cls_supplier->insert_supplier($company_name,$address,$mobile,$email,$contact_person,$contact_person_mobile,$payable_amount,$saved_by,$remarks);

?>