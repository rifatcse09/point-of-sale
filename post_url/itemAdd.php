<?php
session_start();
$user_id = $_SESSION['user_id']; 
$fileName = "";
require_once('../functions/cls_dbconfig.php');

	function __autoload($class_name){
		require_once("../functions/$class_name.class.php");
	}
	
	$db= new DB();
	$cls_item = new cls_item();
	
	 function guid() {

            if (function_exists('com_create_guid')) {
                return com_create_guid();
            } else {
                mt_srand((double) microtime() * 10000); //optional for php 4.2.0 and up.
                $charid = strtoupper(md5(uniqid(rand(), true)));
                $hyphen = chr(45); // "-"
                $uuid = chr(123)// "{"
                        . substr($charid, 0, 8) . $hyphen
                        . substr($charid, 8, 4) . $hyphen
                        . substr($charid, 12, 4) . $hyphen
                        . substr($charid, 16, 4) . $hyphen
                        . substr($charid, 20, 12)
                        . chr(125); // "}"
                return $uuid;
            }
        }
		if($_FILES["logo"]["name"])
		{
		      $path_parts = pathinfo($_FILES["logo"]["name"]);
        $ext = $path_parts['extension'];
        $fileName = trim(guid(), '{}') . '.' . $ext;
		}

    move_uploaded_file($_FILES['logo']['tmp_name'], "../images/itemimages/$fileName");
	$item_name = $db->con()->real_escape_string("$_POST[item_name]");
	$item_code = $db->con()->real_escape_string("$_POST[item_code]");
	$category = $db->con()->real_escape_string("$_POST[category]");
	$size = $db->con()->real_escape_string("$_POST[size]");
	$unit = $db->con()->real_escape_string("$_POST[unit]");
	$description = $db->con()->real_escape_string("$_POST[description]");

	echo $cls_item->insert_item($category,$item_name,$item_code,$size,$unit,$description,$user_id,$fileName);
?>