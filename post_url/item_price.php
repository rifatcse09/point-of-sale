<?php
	require_once('../functions/cls_dbconfig.php');
	function __autoload($classname){
		require_once("../functions/$classname.class.php");
	}
	
	$cls_item = new cls_item();
	$item_id = "$_POST[item_id]";

    $query = $cls_item->item_price_info($item_id);
    $row = $query->fetch_assoc();
    
    $array = array();

    $array['item_code'] = $row['item_code'];
    $array['price'] = $row['price'];
	$array['size'] = $row['size'];
	$array['unit'] = $row['unit'];
	$array['description'] = $row['description'];
	
    $sql = $cls_item->item_promo($item_id);
    $row_data = $sql->fetch_assoc();
	$array['sales_price'] = $row_data ['price'];
	$array['discount'] = $row_data ['discount'];
	$array['promo_from'] = $row_data ['promo_from'];
	$array['promo_to'] = $row_data ['promo_to'];

    $json = json_encode($array);
    echo $json;
?>
