<?php
require_once('../functions/cls_dbconfig.php');
function __autoload($classname){
    require_once("../functions/$classname.class.php");
}

$cls_item = new cls_item();
$item_code = "$_POST[item_code]";

$query = $cls_item->viewitemidbycode($item_code);
$row = $query->fetch_assoc();
$item_id =  $row['id'];
$array = array();

$array['id'] = $row['id'];
$array['option'] = "<option selected value=$row[id]>$row[item_name]</option>";
$json = json_encode($array);
echo $json;
?>
