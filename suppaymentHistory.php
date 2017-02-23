<?php 
    require_once("include/header.php");
   $supp_id1 = htmlspecialchars($_REQUEST['supplier'], ENT_QUOTES, 'UTF-8');
?>
    <div class="contentpanel">
      <!--\\\\\\\ contentpanel start\\\\\\-->
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>reports</h1>
          <h2 class="">Supplier Due</h2>
        </div>
        <div class="pull-right">
          <ol class="breadcrumb">
            <li><a href="dashboard">Home</a></li>
            <li>Reports</li>
            <li class="active">Supplier Due Report</li>
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
              <h3 class="content-header">Supplier Payment History</h3>
            </div>
         <div class="porlets-content">
            <div class="table-responsive">
                <table class="display table table-bordered table-striped" id="dynamic-table">
                  <thead>
                    <tr>
                      <th>SL NO.</th>
                      <th>Supplier Name</th>
                      <th>Total Amount</th>
                      <th>Paid Amount</th>
                      <th>Due Amount</th>
                      <th>Payment Date</th>
                      <th>Remarks</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php
                    $sl = 1;
                    $supppay_q = $cls_supplier->supp_payment_his($supp_id1);
                    while($supppay_row = $supppay_q->fetch_assoc())
                    {
?>
                    <tr class="gradeC">
                      <td><?php if($sl < 10) { echo '0'; echo $sl++;} ?></td>
                      <td><?php echo $supppay_row['c_name']; ?></td>
                      <td><?php echo $supppay_row['total_amount']; ?></td>
                      <td><?php echo $supppay_row['paid']; ?></td>
                      <td><?php echo $supppay_row['balance']; ?></td>
                      <td><?php echo $supppay_row['payment_date']; ?></td>
                      <td><?php echo $supppay_row['remarks']; ?></td>
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
            
            
          </div><!--/block-web--> 
        </div><!--/col-md-12--> 
      </div><!--/row-->
      
          </div>
        </section>
      </div>
    </div>
    
    
    <!--\\\\\\\ content panel end \\\\\\-->

<?php require_once("include/footer.php"); ?>