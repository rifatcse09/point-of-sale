<?php 
require_once("include/header.php");
/*if($user_type != "admin")
{
   echo "<script>location.replace('dashboard');</script>"; 
}*/
?>
<div class="contentpanel">
    <!--\\\\\\\ contentpanel start\\\\\\-->
    <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
            <h1>Report</h1>
            <h2 class="">Available Stock</h2>
        </div>
        <div class="pull-right">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">Report</a></li>
                <li class="active">Available Stock</li>
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
                                <h3 class="content-header">Available Stock</h3>
                            </div>
                            <div class="porlets-content">
                                <div class="table-responsive">
                                   <div id="result">
                                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                                        <thead>
                                            <tr>
                                                <th>SL No</th>
                                                <th>Category</th>
                                                <th>Item Name</th>
                                                <th>Item Code</th>
                                                <th>Size</th>
                                                <th>Avail Stock (Qty)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sl = 1;
                                            $stock_q = $cls_stock->view_stock();
                                            while ($stock_row = $stock_q->fetch_assoc()) {
                                                ?>
                                                <tr class="gradeX">
                                                    <td><?php echo $sl++; ?></td>
                                                    <td><?php echo $stock_row['cat_name']; ?></td>
                                                    <td><?php echo $stock_row['item_name']; ?></td>
                                                    <td><?php echo $stock_row['item_code']; ?></td>
                                                    <td><?php echo $stock_row['size']; ?></td>
                                                    <td><?php if($stock_row['available_stock'] < 20) { ?><span style="color:red;font-weight:bold;"><?php echo $stock_row['available_stock'].' ('. $stock_row['unit'] .')'; ?></span><?php } else { echo $stock_row['available_stock'].' ('. $stock_row['unit'] .')'; } ?></td>
                                                </tr>     
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>SL No</th>
                                                <th>Category</th>
                                                <th>Item Name</th>
                                                <th>Item Code</th>
                                                <th>Size</th>
                                                <th>Avail Stock (Qty)</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    </div>
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