<?php
	require_once('../functions/cls_dbconfig.php');
	function __autoload($classname){
		require_once("../functions/$classname.class.php");
	}
	
	$cls_item = new cls_item();
	$cls_damage = new cls_damage();
	$item_id = "$_POST[item_id]";

    $query = $cls_item->item_info($item_id);
    $row = $query->fetch_assoc();

    $query1 = $cls_damage->damage_qty($item_id);
    $row1 = $query1->fetch_assoc();
    
    $array = array();
	$array['size'] = $row['size'];
	$array['unit'] = $row['unit'];
	$array['available_stock'] = $row['available_stock'];
	$array['qnty'] = $row1['qnty'];
	

    $json = json_encode($array);
    echo $json;
?>
