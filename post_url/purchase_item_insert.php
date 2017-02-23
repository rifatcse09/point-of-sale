<?php
	session_start();
    require_once('../functions/cls_dbconfig.php');
	function __autoload($classname){
		require_once("../functions/$classname.class.php");
	}
	
	$cls_purchase = new cls_purchase();
	
    $user_id = $_SESSION['user_id'];
	$array =  $_POST['arr'];
	$supplier_id =  $_POST['supplier_id'];
	$inovice_num =  $_POST['inovice_num'];
	$pur_total_price_in =  $_POST['pur_total_price_in'];
	$pur_net_payable =  $_POST['pur_net_payable'];
	$pur_amt_due =  $_POST['pur_amt_due'];
	
	$result = json_decode($array);
	
	echo $cls_purchase->purchase_insert($user_id, $result, $supplier_id, $inovice_num, $pur_total_price_in, $pur_net_payable, $pur_amt_due);
?> 