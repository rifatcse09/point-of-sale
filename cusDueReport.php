<?php 
require_once("include/header.php");
//if($user_type != "admin")
//{
//   echo "<script>location.replace('dashboard');</script>";
//}
?>
    <div class="contentpanel">
      <!--\\\\\\\ contentpanel start\\\\\\-->
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>customer</h1>
          <h2 class="">customer Due</h2>
        </div>
        <div class="pull-right">
          <ol class="breadcrumb">
            <li><a href="dashboard">Home</a></li>
            <li>Customer</li>
            <li class="active">Customer Due Report</li>
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
              <div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a> <a class="refresh" href="#"><i class="fa fa-repeat"></i></a> <a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
              <h3 class="content-header">Customer List with Due</h3>
            </div>
         <div class="porlets-content">
            <div class="table-responsive">
                <table class="display table table-bordered table-striped" id="dynamic-table">
                  <thead>
                    <tr>
                      <th>SL.</th>
                      <th>Customer Name</th>
                      <th>Invoice No.</th>
                      <th>Total Amount</th>
                      <th>Paid Amount</th>
                      <th>Due Amount</th>
                      <th>Date</th>    
                      <th class="hidden-phone">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php
                    $sl = 1;
                    $total_due = 0.00;
                    $cusdue_q = $cls_customer->customer_due();
                    while($cusdu_row = $cusdue_q->fetch_assoc())
                    {
                        $total_due = $total_due + $cusdu_row['due'];
?>
                    <tr class="gradeC">
                      <td><?php if($sl < 10) { echo '0'; echo $sl++;} ?></td>
                      <td><?php echo $cusdu_row['cus_name']; ?></td>
                      <td><?php echo $cusdu_row['invoice_id']; ?></td>
                      <td><?php echo number_format($cusdu_row['g_total'], 2, '.', ','); ?></td>
                      <td><?php echo number_format($cusdu_row['paid'], 2, '.', ','); ?></td>
                      <td><?php echo number_format($cusdu_row['due'], 2, '.', ','); ?></td>
                      <td><?php echo $cusdu_row['tra_date']; ?></td>
                      <td class="center hidden-phone">
                      <a style="font-size:12px;" class="btn btn-primary" href="invoiceDetails/invoice/<?php echo $cusdu_row['invoice_id']; ?>">Details</a>
<!--                      <a style="font-size:12px;" class="btn btn-primary" href="">Payment</a>-->
                      </td>
                    </tr>
                    <?php
                    }
?>
                </tbody>
                  <tfoot>
                    <tr class="gradeC">
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td align="right"><strong>Total Due</strong></td>
                      <td><strong><?php echo number_format($total_due, 2, '.', ','); ?></strong></td>
                      <td></td>
                      <td class="center hidden-phone"></td>
                    </tr>
                  </tfoot>
                </table>
              </div><!--/table-responsive-->
            </div><!--/porlets-content-->
            
            
          </div><!--/block-web--> 
        </div><!--/col-md-12--> 
      </div><!--/row-->
      
          </div>
        </section>
      </div>
    </div>
    
    
    <!--\\\\\\\ content panel end \\\\\\-->

<?php require_once("include/footer.php"); ?>