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
	$from_date = "$_POST[from_date]";
	$to_date = "$_POST[to_date]";

    $query1 = $cls_purchase->view_report_supp($supplier_id, $from_date, $to_date);
    $row_c1 = $query1->num_rows;
 

if($row_c1 > 0)
{
    if(isset($supplier_id))
   {
        
?>
<div class="porlets-content">
            <div class="table-responsive">
                <table class="display table table-bordered table-striped" id="dynamic-table">
                  <thead>
                    <tr>
                      <th>SL.</th>
                      <th class="hidden-phone">Date</th>
                      <th>Pur.ID</th>
                      <th>Supplier</th>
                      <th>Invoice</th>
                      <th style="text-align:center;" class="hidden-phone">Total</th>
                      <th class="hidden-phone">Saved by</th>
                      <th class="hidden-phone">Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                   <?php
                    $sl = 1;
                    $g_total = 0.00;
                    while($rep_row1 = $query1->fetch_assoc()){
                    $supp = $rep_row1['sup_id'];
            
                    $s_query = $cls_supplier->view_byid($supp);
                    $s_row = $s_query->fetch_assoc();
                        
                    $g_total = $g_total + $rep_row1['total'];

?>
                    <tr class="gradeC">
                      <td><?php if($sl < 10) { echo '0';} echo $sl++; ?></td>
                      <td class="center"><?php echo $rep_row1['pur_date']; ?></td>
                      <td class="center"><?php echo $rep_row1['pur_id']; ?></td>
                      <td><?php echo $rep_row1['c_name']; ?></td>
                      <td><?php echo $rep_row1['invoice']; ?></td>
                      <td class="center" style="text-align:right;"><?php echo number_format($rep_row1['total'], 2, '.', ','); ?></td>
                      <td class="center"><?php echo $rep_row1['name']; ?></td>
                      <td class="center"><input type="button" id="" name="abcd" class="btn btn-primary" onclick="javascript:window.location = 'purdetails/pur_id/<?php echo $rep_row1['pur_id']; ?>'" value="Details"></td>
                    </tr>
                <?php
                    }
?>
                <tr class="gradeC">
                      <td></td>
                      <td class="center"></td>
                      <td class="center"></td>
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
                <a href="">
                    <input type="button" name="pur_report_print" class="btn btn-primary" value="Print"></a>
              </div><!--/table-responsive-->
            </div><!--/porlets-content-->
<?php
    }
} else { echo "<h6 style='font-weight:bold;padding:10px;'>No Result found!</h6>"; }
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