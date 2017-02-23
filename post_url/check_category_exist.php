<?php

require_once('../functions/cls_dbconfig.php');

function __autoload($classname) {
    require_once("../functions/$classname.class.php");
}

$cls_category = new cls_category();
$CategoryName = "$_POST[CategoryName]";

$query = $cls_category->category_by_name($CategoryName);
$count = $query->num_rows();
if ($count > 0) {
    $arr['is_exist_user_id'] = true;
} else {
    $arr['is_exist_user_id'] = false;
}

echo json_encode($arr);


?>