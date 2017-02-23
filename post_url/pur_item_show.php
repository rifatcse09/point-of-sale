<?php
	require_once('../functions/cls_dbconfig.php');
	function __autoload($classname){
		require_once("../functions/$classname.class.php");
	}
	
	$cls_item = new cls_item();
	$itemName = "$_POST[itemName]";

   $query = $cls_item->viewitembycat($itemName);
    $row_c = $query->num_rows;
if($row_c == 0)
{ 
?>
   <option>No result found</option>
<?php
 exit;
}

    while($row  = $query->fetch_assoc())
    {
?>

<option value="<?php echo $row['id']; ?>"><?php echo $row['item_name']; ?></option>
<?php } ?>