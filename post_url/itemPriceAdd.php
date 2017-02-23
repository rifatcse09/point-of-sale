<?php 
    session_start();
    $saved_by= $_SESSION['user_id'];
    require_once('../functions/cls_dbconfig.php');
	function __autoload($class_name){
		require_once("../functions/$class_name.class.php");
	}
	
	$db = new DB();
	$cls_item = new cls_item();
	

	$item_id = $db->con()->real_escape_string("$_POST[item_id]");
	$slaes_price = $db->con()->real_escape_string("$_POST[slaes_price]");
	$pur_price = $db->con()->real_escape_string("$_POST[pur_price]");
	$discount = $db->con()->real_escape_string("$_POST[discount]");
	$promo_from = $db->con()->real_escape_string("$_POST[promo_from]");
	$promo_to = $db->con()->real_escape_string("$_POST[promo_to]");

	
	echo $cls_item->item_price_add($item_id,$slaes_price,$pur_price,$discount,$promo_from,$promo_to,$saved_by);

?>