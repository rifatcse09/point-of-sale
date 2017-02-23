<?php
	require_once('../functions/cls_dbconfig.php');
	function __autoload($classname){
		require_once("../functions/$classname.class.php");
	}
	
    //$user_id = $_SESSION['user_id'];
	$cls_profit_loss = new cls_profit_loss();
	$cls_employee = new cls_employee();
	$cls_item = new cls_item();

	$emp_id = "$_POST[emp_id]";
	$item_id = "$_POST[item_id]";
	$from_date = "$_POST[from_date]";
	$to_date = "$_POST[to_date]";

    $query = $cls_profit_loss->view_profit_loss_report($emp_id, $item_id, $from_date, $to_date);
    $row_c = $query->num_rows;
    if($row_c > 0)
    { 
?>
<div class="porlets-content">
            <div class="table-responsive">
                <table class="display table table-bordered table-striped" id="dynamic-table">
                  <thead>
                    <tr>
                      <th>SL.</th>
                      <th>Item Name</th>
                  
                     
                      <th>Avg.Pur.Price</th>
                      <th> Avg.Sales Price</th> 
					  <th>Sales Qnty.</th> 
					
					  <th>Tl. Purchase</th> 
					  <th>Tl. Sales</th>
					  <th>Tl. VAT</th>
					  <th>Tl. Discount</th> 
					  <th>Tl. Profit</th> 
                    </tr>
                  </thead>
                  <tbody>
                   <?php
                    $sl = 1;
					$i=1;
                    while($rep_row = $query->fetch_assoc()){
                    //$emp = $rep_row['saved_by'];
                   // $invoice_id = $rep_row['invoice_id'];
                   // $item = $rep_row['item_id'];
?>
                    <tr class="gradeC">
                      <td><?php echo $i++;?></td>
                      <td ><?php echo $rep_row['item_name'].'-'.$rep_row['size'].$rep_row['unit']; ?></td>
                
                      <td style="text-align:right"><?php echo $rep_row['avg_purchase_price']; ?></td>
                      <td style="text-align:right"><?php echo $rep_row['avg_sales_price']; ?></td>
                      <td style="text-align:right"><?php echo $rep_row['total_qnty']; ?></td>
					 
					  <td style="text-align:right"><?php echo $rep_row['total_purchase_price']; ?></td>
					  <td style="text-align:right"><?php echo $rep_row['total_sales_price']; ?></td>
					  <td style="text-align:right"><?php echo $rep_row['total_vat']; ?></td>
				      <td style="text-align:right"><?php echo $rep_row['total_discount']; ?></td>				 
					  <td style="text-align:right"><?php echo $rep_row['total_profit']; ?></td>
                     
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