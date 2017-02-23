<?php
    session_start();
    $user_id = $_SESSION['user_id']; 
    require_once('../functions/cls_dbconfig.php');

	function __autoload($class_name){
		require_once("../functions/$class_name.class.php");
	}
	
	$cls_item = new cls_item();
    $item_code = "$_POST[item_code]";

    $code = $cls_item->get_id_by_code($item_code);
    echo $code;
?>