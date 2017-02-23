<?php 
require_once("include/header.php");
$pur_id = htmlspecialchars($_REQUEST['pur_id'], ENT_QUOTES, 'UTF-8');
$query_details = $cls_purchase->pur_report_detailssupp($pur_id);
$query_row = $query_details->fetch_assoc();
?>
<div class="contentpanel">
    <!--\\\\\\\ contentpanel start\\\\\\-->
    <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
            <h1>PURCHASE</h1>
            <h2 class="">PURCHASE REPORT DETAILS</h2>
        </div>
        <div class="pull-right">
            <ol class="breadcrumb">
                <li><a href="dashboard">Home</a></li>
                <li><a href="#">Report</a></li>
                <li class="active">Purchase Report details</li>
            </ol>
        </div>
    </div>
    <div class="container clear_both padding_fix">
        <section class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="block-web">
                            <div class="header">
                                <div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a><a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
                                <h3 class="content-header">Purchase Report</h3>
                            </div>

                        <div class="porlets-content">
            <div class="table-responsive">
               <h6 class="content-header"><strong>PURCHASE ID. : <?php echo $pur_id; ?></strong> </h6>
               <h6 class="content-header"><strong>SUPPLIER : <?php echo $query_row['c_name'] ;?></strong> </h6>
              <h6 class="content-header"><strong>SUPPLIER INVOICE : <?php echo $query_row['invoice'] ;?></strong> </h6>
               
                <table class="display table table-bordered table-striped" id="">
                  <thead>
                    <tr>
                      <th>SL.</th>
                      <th class="hidden-phone">Date</th>
                      <th>Item</th>
                      <th>Quantity</th>
                      
                      <th>Price</th>
                      <th style="text-align:center;" class="hidden-phone">Total Price</th>
  
                    </tr>
                  </thead>
                  <tbody>
                   <?php
                    $sl = 1;
                    $g_total = 0.00;
                    $query_details = $cls_purchase->pur_report_details($pur_id);
                    while($rep_row1 = $query_details->fetch_assoc()){
                
                  //  $g_total = $g_total + $rep_row1['total'];
                        $total_amount = $rep_row1['total_amount'];
                        $paid = $rep_row1['paid'];
                        $invoice_due = $rep_row1['invoice_due'];

?>
                    <tr class="gradeC">
                      <td><?php if($sl < 10) { echo '0';} echo $sl++; ?></td>
                      <td class="center"><?php echo $rep_row1['pur_date']; ?></td>
                      <td class="left"><?php echo $rep_row1['item_name']; ?></td>
                      <td><?php echo $rep_row1['quantity'] .' '.$rep_row1['unit']; ?></td>
                      
                      <td><?php echo $rep_row1['price']; ?></td>
                      <td class="center" style="text-align:right;">
                      <?php echo number_format($rep_row1['ttl_price'], 2, '.', ','); ?></td>
                    </tr>
                <?php
                    }
?>  
                 
                  </tbody>

                </table><br>
                <div align="right">
                <h6 class="content-header"><strong>Total : <?php echo number_format($total_amount, 2, '.', ','); ?></strong> </h6>
               <h6 class="content-header"><strong>Paid : <?php echo number_format($paid, 2, '.', ','); ?></strong> </h6>
               <h6 class="content-header"><strong>Due : <?php echo number_format($invoice_due, 2, '.', ','); ?></strong> </h6>
               </div>
              </div><!--/table-responsive-->
            </div><!--/porlets-content-->

                        </div><!--/block-web--> 
                    </div><!--/col-md-12-->
                </div>

            </div>
        </section>
    </div>
</div>
<!--\\\\\\\ content panel end \\\\\\-->

<?php require_once("include/footer.php"); ?>