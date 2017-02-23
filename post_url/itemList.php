<?php
	require_once('../functions/cls_dbconfig.php');
	function __autoload($classname){
		require_once("../functions/$classname.class.php");
	}
	
	$cls_item = new  cls_item();
	$supplier_id = "$_POST[supplier_id]";

   $query = $cls_item->item_list_supplierwise($supplier_id);
    $row_c = $query->num_rows;
if($row_c == 0)
{ 
?>
   <option>No result found</option>
<?php
 exit;
}
?>
<option value=""><?php echo 'Selected' ?></option>
<?php

    while($row  = $query->fetch_assoc())
    {
?>

<option value="<?php echo $row['id']; ?>"><?php echo $row['item_name']; ?></option>
<?php } ?>