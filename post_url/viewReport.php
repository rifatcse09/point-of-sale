<?php
	session_start();
	require_once('../functions/cls_dbconfig.php');
	function __autoload($classname){
		require_once("../functions/$classname.class.php");
	}
	
    $user_id = $_SESSION['user_id'];
	$cls_purchase = new cls_purchase();
	$cls_supplier = new cls_supplier();
	$cls_item = new cls_item();

	$supplier_id = "$_POST[supplier_id]";
	$item_id = "$_POST[item_id]";
	$from_date = "$_POST[from_date]";
	$to_date = "$_POST[to_date]";

    $query = $cls_purchase->view_per_report($supplier_id, $item_id, $from_date, $to_date);
    $row_c = $query->num_rows;

    //$query1 = $cls_purchase->view_report_supp($supplier_id);
   // $row_c1 = $query1->num_rows;

    if($row_c > 0)
    {
?>
<div class="porlets-content">
            <div class="table-responsive">
                <table class="display table table-bordered table-striped" id="dynamic-table">
                  <thead>
                    <tr>
                      <th>SL.</th>
                      <th class="hidden-phone">Date</th>
                      <th>Supplier</th>
                      <th>Invoice</th>
                      <th>Item</th>
                      <th>Qty</th>
                      
                      <th class="hidden-phone">Item Price</th>
                      <th style="text-align:center;" class="hidden-phone">Total</th>
                      <th class="hidden-phone">Saved by</th>
                      <th class="hidden-phone">Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                   <?php
                    $sl = 1;
                    $g_total = 0.00;
                    while($rep_row = $query->fetch_assoc()){
                    $supp = $rep_row['sup_id'];
                    $item = $rep_row['item_id'];
                        
                    $s_query = $cls_supplier->view_byid($supp);
                    $s_row = $s_query->fetch_assoc();
                        
                    $item_query = $cls_item->viewitemby_id($item);
                    $item_row = $item_query->fetch_assoc();
                        
                    $g_total = $g_total + $rep_row['ttl_price'];

?>
                    <tr class="gradeC">
                      <td><?php if($sl < 10) { echo '0';} echo $sl++; ?></td>
                      <td class="center"><?php echo $rep_row['pur_date']; ?></td> 
                      <td><?php echo $s_row['c_name']; ?></td>
                      <td><?php echo $rep_row['invoice']; ?></td>
                      <td><?php echo $item_row['item_name']; ?></td>
                      <td><?php echo $rep_row['quantity']; ?></td>
                      
                      <td class="center"><?php echo $rep_row['price']; ?></td>
                      <td class="center" style="text-align:right;"><?php echo number_format($rep_row['ttl_price'], 2, '.', ','); ?></td>
                      <td class="center"><?php echo $rep_row['name']; ?></td>
                      <td class="center">
                      <input type="button" id="" name="abcd" class="btn btn-primary" onclick="javascript:window.location = 'purdetails/pur_id/<?php echo $rep_row['pur_id']; ?>'" value="Details"></td>
                    </tr>
                <?php
                    }
?>
                <tr class="gradeC">
                      <td></td>
                      <td class="center"></td>
                      <td class="center"></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td class="center"></td>
                    <td class="center" style="text-align:center;"><span style="font-weight:bold;">Total: <?php echo number_format($g_total, 2, '.', ','); ?></span></td>
                      <td class="center"></td>
                      <td class="center"></td>
                    </tr>
                 
                  </tbody>
                  <tfoot>
                    <tr>
                      
                    </tr>
                  </tfoot>
                </table>
                <input type="button" name="pur_report_print" class="btn btn-primary" value="Print" onclick="javascript:location.replace('purReportPrint');">
              </div><!--/table-responsive-->
            </div><!--/porlets-content-->
            
           
          <?php
    } else { 
        echo "<h6 style='padding:14px 0 0 0;font-weight:bold;'>No Result Found!</h6>";
    }
?>

<script src="js/jquery-2.1.0.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/common-script.js"></script>



<!--date picker-->
<script type="text/javascript" src="plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script> 
<script type="text/javascript" src="js/form-components.js"></script> 
<!--date picker end-->


<script>
/*==Porlets Actions==*/
    $('.minimize').click(function(e){
      var h = $(this).parents(".header");
      var c = h.next('.porlets-content');
      var p = h.parent();
      
      c.slideToggle();
      
      p.toggleClass('closed');
      
      e.preventDefault();
    });
    
    $('.refresh').click(function(e){
      var h = $(this).parents(".header");
      var p = h.parent();
      var loading = $('&lt;div class="loading"&gt;&lt;i class="fa fa-refresh fa-spin"&gt;&lt;/i&gt;&lt;/div&gt;');
      
      loading.appendTo(p);
      loading.fadeIn();
      setTimeout(function() {
        loading.fadeOut();
      }, 1000);
      
      e.preventDefault();
    });
    
    $('.close-down').click(function(e){
      var h = $(this).parents(".header");
      var p = h.parent();
      
      p.fadeOut(function(){
        $(this).remove();
      });
      e.preventDefault();
    });
	
	$('#promo_from').datepicker({format: 'yyyy-mm-dd'});
         $('#promo_from').on('changeDate', function(ev){
             $(this).datepicker('hide');
        });
 $('#promo_to').datepicker({format: 'yyyy-mm-dd'});
         $('#promo_to').on('changeDate', function(ev){
             $(this).datepicker('hide');
        });


</script>

<!--date table-->

<script src="plugins/data-tables/jquery.dataTables.js"></script>
<script src="plugins/data-tables/DT_bootstrap.js"></script>
<script src="plugins/data-tables/dynamic_table_init.js"></script>
<script src="plugins/edit-table/edit-table.js"></script>
<script>
          jQuery(document).ready(function() {
              EditableTable.init();
          });
 </script>


<script src="plugins/demo-slider/demo-slider.js"></script>
<script src="plugins/knob/jquery.knob.min.js"></script> 
 
<?php //require_once("../include/footer.php"); ?>