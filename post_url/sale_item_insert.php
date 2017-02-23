<?php
	session_start();
    require_once('../functions/cls_dbconfig.php');
	function __autoload($classname){
		require_once("../functions/$classname.class.php");
	}

	$cls_sales = new cls_sales();
	$cls_datetime = new cls_datetime();
	//$inovice_num = $cls_datetime->show_datetime();
	
	$inovice_num = (int)$cls_datetime->show_datetime() . rand(1111, 9999);
	//$inovice_num = trim(guid(), '{}') ;
	
    $user_id = $_SESSION['user_id'];
	$array =  $_POST['arr'];
	$cus_id =  $_POST['cus_id'];

	$sale_total_price =  $_POST['sale_total_price_in'];
	$total_vat = $_POST['total_vat'];
	$total_discount = $_POST['total_discount'];
	$rounding_amt = $_POST['rounding_amt'];
	$sale_net_payable =  $_POST['sale_net_payable'];
	$pay_type1  =  $_POST['pay_type1'];
    $trans_num1 = $_POST['trans_num1'];
    $trans_amt1 = $_POST['trans_amt1'];
    $pay_type2  =  $_POST['pay_type2'];
    $trans_num2 = $_POST['trans_num2'];
    $trans_amt2 = $_POST['trans_amt2'];
	$return_amt = $_POST['return_amt'];
	$sale_amt_due = $_POST['sale_amt_due'];
	
	$result = json_decode($array);
	
	echo $cls_sales->sale_insert($user_id, $result, $cus_id, $inovice_num, $sale_total_price, $total_vat, $total_discount, $rounding_amt, $sale_net_payable, $pay_type1,  $trans_num1, $trans_amt1, $pay_type2, $trans_num2, $trans_amt2, $return_amt, $sale_amt_due);


?>