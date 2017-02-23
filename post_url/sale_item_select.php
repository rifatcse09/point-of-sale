<?php
	require_once('../functions/cls_dbconfig.php');
	function __autoload($classname){
		require_once("../functions/$classname.class.php");
	}
	
	$cls_item = new cls_item();
	$item_id = "$_POST[item_id]";

   $query = $cls_item->sale_item_show($item_id);
    $row = $query->fetch_assoc();

    echo $json = json_encode($row);
?>