<?php 
session_start();
$saved_by= $_SESSION['user_id']; 
require_once('../functions/cls_dbconfig.php');
	function __autoload($class_name){
		require_once("../functions/$class_name.class.php");
	}
	
	$db= new DB();
	$cls_supplier = new cls_supplier();
	$supp_id = $db->con()->real_escape_string("$_POST[supp_id]");
	$company_name = $db->con()->real_escape_string("$_POST[company_name]");
	$address = $db->con()->real_escape_string("$_POST[address]");
	$mobile = $db->con()->real_escape_string("$_POST[mobile]");
	$email = $db->con()->real_escape_string("$_POST[email]");
	$contact_person = $db->con()->real_escape_string("$_POST[contact_person]");
	$contact_person_mobile = $db->con()->real_escape_string("$_POST[contact_person_mobile]");

	
	echo $cls_supplier->update_supplier($supp_id,$company_name,$address,$mobile,$email,$contact_person,$contact_person_mobile,$saved_by);

?>