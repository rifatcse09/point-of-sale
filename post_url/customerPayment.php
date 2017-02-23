<?php 
session_start();
$saved_by= $_SESSION['user_id']; 
require_once('../functions/cls_dbconfig.php');
	function __autoload($class_name){
		require_once("../functions/$class_name.class.php");
	}
	
	$db= new DB();
	$cls_customer = new cls_customer();
	$customer_id = $db->con()->real_escape_string("$_POST[customer_id]");
	$invoice = $db->con()->real_escape_string("$_POST[invoice]");
	$due  =  $_POST['due'];
	$pay_type1  =  $_POST['pay_type1'];
    $trans_num1 = $_POST['trans_num1'];
    $trans_amt1 = $_POST['trans_amt1'];
    $pay_type2  =  $_POST['pay_type2'];
    $trans_num2 = $_POST['trans_num2'];
    $trans_amt2 = $_POST['trans_amt2'];
	$f_due = $due - ($trans_amt1 + $trans_amt2);
	echo $cls_customer->customer_payment($customer_id,$invoice,$pay_type1,$trans_num1,$trans_amt1,$pay_type2,$trans_num2,$trans_amt2,$f_due,$due,$saved_by);

?>