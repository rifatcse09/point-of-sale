<?php
	require_once('../functions/cls_dbconfig.php');
	function __autoload($classname){
		require_once("../functions/$classname.class.php");
	}
	
	$cls_customer = new  cls_customer();
	$customer_id = "$_POST[customer_id]";

   $query = $cls_customer->due_invoice($customer_id);
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

<option value="<?php echo $row['invoice_id']; ?>"><?php echo $row['invoice_id']; ?></option>
<?php } ?>