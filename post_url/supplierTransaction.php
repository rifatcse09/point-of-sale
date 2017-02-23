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
    $query = $cls_supplier->view_supplier_by_id($supp_id);
	$row = $query->fetch_assoc();

    echo $json = json_encode($row);

?>