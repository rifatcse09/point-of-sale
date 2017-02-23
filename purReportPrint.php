<?php
	require_once('functions/cls_dbconfig.php');
	function __autoload($classname){
		require_once("functions/$classname.class.php");
	}
	
	$cls_purchase = new cls_purchase();
	$cls_supplier = new cls_supplier();
	$cls_item = new cls_item();

	$supplier_id = "$_POST[supplier_id]";
	$item_id = "$_POST[item_id]";
	$from_date = "$_POST[from_date]";
	$to_date = "$_POST[to_date]";

    $query = $cls_purchase->view_per_report($supplier_id, $item_id, $from_date, $to_date);
    $row_c = $query->num_rows;
    if($row_c > 0)
    { 
?>
<div class="porlets-content">
            <div class="table-responsive">
                <table class="display table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>SL NO.</th>
                      <th class="hidden-phone">Purchase Date</th>
                      <th>Purchase ID</th>
                      <th>Supplier Name</th>
                      <th>Invoice</th>
                      <th>Item</th>
                      <th>Quantity</th>
                      <th class="hidden-phone">Item Price</th>
                      <th class="hidden-phone">Total</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                   <?php
                    $sl = 1;
                    while($rep_row = $query->fetch_assoc()){
                    $supp = $rep_row['sup_id'];
                    $item = $rep_row['item_id'];
                    $s_query = $cls_supplier->view_byid($supp);
                    $s_row = $s_query->fetch_assoc();
                    $item_query = $cls_item->viewitemby_id($item);
                    $item_row = $item_query->fetch_assoc();

?>
                    <tr class="gradeC">
                      <td><?php if($sl < 10) { echo '0';} echo $sl++; ?></td>
                      <td class="center"><?php echo $rep_row['pur_date']; ?></td>
                      <td class="center"><?php echo $rep_row['pur_id']; ?></td>
                      <td><?php echo $s_row['c_name']; ?></td>
                      <td><?php echo $rep_row['invoice']; ?></td>
                      <td><?php echo $item_row['item_name']; ?></td>
                      <td><?php echo $rep_row['quantity']; ?></td>
                      <td class="center"><?php echo $rep_row['price']; ?></td>
                      <td class="center"><?php echo $rep_row['ttl_price']; ?></td>
                    </tr>
                <?php
                    }
?>
                 
                  </tbody>
                  <tfoot>
                    <tr>
                      
                    </tr>
                  </tfoot>
                </table>
              </div><!--/table-responsive-->
            </div><!--/porlets-content-->
            
           
          <?php
    }
?>
<script type="text/javascript">
window.print();
</script>