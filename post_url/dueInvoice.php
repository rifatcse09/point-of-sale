<?php 
session_start();
$saved_by= $_SESSION['user_id']; 
require_once('../functions/cls_dbconfig.php');
	function __autoload($class_name){
		require_once("../functions/$class_name.class.php");
	}
	
	$db= new DB();
	$cls_customer = new cls_customer();
	$invoice = $db->con()->real_escape_string("$_POST[invoice]");
    $query = $cls_customer->due_invoice_details($invoice);
	$row = $query->fetch_assoc();

    echo $json = json_encode($row);

?>