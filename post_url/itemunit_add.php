<?php 
    session_start();
    $user_id = $_SESSION['user_id'];

    require_once('../functions/cls_dbconfig.php');
        function __autoload($class_name){
            require_once("../functions/$class_name.class.php");
        }
	$db = new DB();
	$cls_itemunit = new cls_itemunit();
	
	$unit_name = $db->con()->real_escape_string("$_POST[unit_name]");
	
	echo $cls_itemunit->itumunit_add($user_id, $unit_name);

?>