<?php
	require_once('../functions/cls_dbconfig.php');
	function __autoload($classname){
		require_once("../functions/$classname.class.php");
	}
	
	$cls_customer = new  cls_customer();
	$customerName = "$_POST[customerName]";

   $query = $cls_customer->view_customer_by_name($customerName);
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

<option value="<?php echo $row['id']; ?>"><?php echo $row['cus_name']; ?></option>
<?php } ?>