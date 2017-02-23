<?php
	session_start();
	require_once('../functions/cls_dbconfig.php');
	function __autoload($classname){
		require_once("../functions/$classname.class.php");
	}
	
    $user_id = $_SESSION['user_id'];
	$cls_sales = new cls_sales();
	$cls_employee = new cls_employee();
	$cls_item = new cls_item();
    $cls_store = new cls_store();

	$emp_id = "$_POST[emp_id]";
	$item_id = "$_POST[item_id]";
	$from_date = "$_POST[from_date]";
	$to_date = "$_POST[to_date]";

    $query = $cls_sales->view_salse_report($user_id, $emp_id, $item_id, $from_date, $to_date);
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
                      <th class="hidden-phone">Sales Date</th>
                      <th>Invoice ID</th>
                      <th style="text-align:center;">Total Amount</th>
                      <th style="text-align:center;">Due</th>
                      <th class="hidden-phone">Saved by</th>
                      <th class="hidden-phone">Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                   <?php
                    $sl = 1;
                    $g_total = 0.00;
                    while($rep_row = $query->fetch_assoc()){
                    $emp = $rep_row['saved_by'];
                    $invoice_id = $rep_row['invoice_id'];
                    $item = $rep_row['item_id'];
                        
                        $g_total = $g_total + $rep_row['payed_total'];
                   ?>
                    <tr class="gradeC">
                      <td align="center"><?php if($sl < 10) { echo '0';} echo $sl++; ?></td>
                      <td class="center"><?php echo $rep_row['sales_date']; ?></td>
                      <td class="center"><?php echo $invoice_id; ?></td>
                      <td align="right"><?php echo number_format($rep_row['payed_total'], 2, '.', ','); ?></td>
                      <td align="right"><?php echo $rep_row['due_amount']; ?></td>
                      <td><?php echo $rep_row['name']; ?></td>
                      <td class="center"><a href="invoiceDetails/invoice/<?php echo $invoice_id; ?>"><input type="button" id="" name="abcd" class="btn btn-primary" value="Details"></a></td>
                    </tr>
                <?php
                    }
?>
                <tr class="gradeC">
                      <td align="center"></td>
                      <td class="center"></td>
                      <td class="center"></td>
                      <td align="right">
                      <span style="font-weight:bold;">Total: <?php echo number_format($g_total, 2, '.', ','); ?></span></td>
                      <td align="right"></td>
                      <td></td>
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


        <br><br>
        <br><br>
<?php

        $query5 = $cls_store->viewstore();
        $com_info = $query5->fetch_assoc();
        ?>

        <!--invoice report-->
        <div class="row" id="sales_print_">
            <div class="col-md-12" style="!border:1px dashed #333;">
                <div class="block-web">
                    <div class="header">
                        <div style="width:100%;height:auto;border-bottom:1px dashed #000;padding:5px; padding-bottom:10px;text-align:center;font-size:11px;">

                            <img src="images/logo.png" alt="" height="50" width="50" style="border-radius: 30px;">
                            <br>
                            <?php echo $com_info['company_name']; ?><br><?php echo $com_info['address']; ?>
                        </div>
                        <div align="center" style="border-bottom:1px dashed #333;font-size:11px;font-weight:bold;">SALES REPORT</div>
                        <div style="border-bottom:1px dashed #333;"></div>
                    </div>
                    <div class="porlets-content">
                        <div class="table-responsive">
                            <table class="table table-hover font_sml">
                                <thead>
                                <tr>
                                    <th>SL.</th>
                                    <th class="hidden-phone">Sales Date</th>
                                    <th>Invoice ID</th>
                                    <th style="text-align:center;">Total Amount</th>
                                    <th style="text-align:center;">Due</th>
                                    <th class="hidden-phone">Saved by</th>
<!--                                    <th class="hidden-phone">Action</th>-->

                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                $sl = 1;
                                $g_total = 0.00;


                                $query2 = $cls_sales->view_salse_report($user_id, $emp_id, $item_id, $from_date, $to_date);
//                                print_r($query2);
                                while($rep_row2 = $query2->fetch_assoc()){
//                                    print_r($rep_row);
                                $emp = $rep_row2['saved_by'];
                                $invoice_id = $rep_row2['invoice_id'];
                                $item = $rep_row2['item_id'];

                                $g_total = $g_total + $rep_row2['payed_total'];
                                ?>
                                    <tr class="gradeC">
                                        <td align="center"><?php if($sl < 10) { echo '0';} echo $sl++; ?></td>
                                        <td class="center"><?php echo $rep_row2['sales_date']; ?></td>
                                        <td class="center"><?php echo $invoice_id; ?></td>
                                        <td align="right"><?php echo number_format($rep_row2['payed_total'], 2, '.', ','); ?></td>
                                        <td align="right"><?php echo $rep_row2['due_amount']; ?></td>
                                        <td><?php echo $rep_row2['name']; ?></td>
<!--                                        <td class="center"><a href="invoiceDetails/invoice/--><?php //echo $invoice_id; ?><!--"><input type="button" id="" name="abcd" class="btn btn-primary" value="Details"></a></td>-->
                                    </tr>
                                    <?php
                                }
                                ?>
                                <tr class="gradeC">
                                    <td align="center"></td>
                                    <td class="center"></td>
                                    <td class="center"></td>
                                    <td align="right">
                                        <span style="font-weight:bold;">Total: <?php echo number_format($g_total, 2, '.', ','); ?></span></td>
                                    <td align="right"></td>
                                    <td></td>
                                    <td class="center"></td>
                                </tr>


                                </tbody>
                            </table>


                        </div><!--/table-responsive-->
                    </div><!--/porlets-content-->


                </div><!--/block-web-->
            </div><!--/col-md-12-->
        </div>

        <!--invoice report End -->
           
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