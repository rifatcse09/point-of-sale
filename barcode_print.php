<?php require_once("include/header.php"); ?>
<script>
$('document').ready(function(){
    barcode.bar_inv_control_dis();
});
$(function() {
  $("[name='bar_item_code']").focus();
});
</script>
<div class="contentpanel">
    <!--\\\\\\\ contentpanel start\\\\\\-->
    <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
            <h1>Barcode</h1>
            <h2 class="">Item Barcode</h2>
        </div>
        <div class="pull-right">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li>Barcode</li>
                <li class="active">Barcode Item</li>
            </ol>
        </div>
    </div>
    <div class="container clear_both padding_fix">
        <section class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="block-web">
                            <div class="header">
                                <div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a><a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
                                <h3 class="content-header">Search Item</h3>
                            </div>
                            <div class="porlets-content">
                                <form action=""  method="post" class="form-horizontal row-border">
                                    <div class="form-group">
                                        <!--<input type="text" class="form-control" name="pur_item_code" id="pur_item_code" placeholder="Item Code">-->
                                        <input type="text" class="form-control" name="bar_item_code"  placeholder="Item Code">
                                    </div><!--/form-group-->
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="bar_itemName" placeholder="Search by Item name">
                                    </div><!--/form-group-->
                                    <div class="form-group">
                                        <div id="itemShow" style="width:100%;border:1px solid #ccc;height:auto;">
                                            <select id="bar_item_show" size="20" style="height:270px!important; width:100%;">

                                            </select>
                                        </div>
                                    </div><!--/form-group-->

                                </form>
                            </div><!--/porlets-content-->
                        </div><!--/block-web-->
                    </div><!--/col-md-4-->
                    <div class="col-md-4">
                        <div class="block-web">
                            <div class="header">
                                <div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a><a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
                                <h3 class="content-header">Item Barcode Form</h3>
                            </div>
                            <div class="porlets-content">
                                <form action="barcode_print_single" id="bar_item_add_form"  method="post" class="form-horizontal row-border">

                                    <!--select info-->
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">
                                        <span id="pur_item_photo"><img src="images/itemimages/no_image.png" style="width:100%;" /></span>
                                        </label>
                                        <div class="col-sm-8">
                                         <span style="font-size:16px;font-weight:bold;" id="bar_item_name">Product Name</span><br>
                                          <span id="bar_item_barcode"></span>
                                         Category: <span id="bar_item_catname"></span><br>
                                          <span style="font-size:11px;line-height:15px;color:#334559;" id="bar_item_des">Product Description</span><br>
                                        </div>

                                    </div><!--/form-group-->
                                    <hr>


                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Print Quantity</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" required name="print_quantity" placeholder="0" onkeypress="return OnlyNumberKey(event);">
                                        </div>
                                    </div>

                                    
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label"></label>
                                        <div class="col-sm-5">
                                            <input type="button" style="display:none;" name="bar_item_update" value="Item Update" class="btn btn-primary">
                                            <input type="button" style="display:none;" name="bar_item_cancel" value="Cancel" class="btn btn-primary">
                                            <input type="submit" name="bar_item_add" value="Print Barcode" class="btn btn-primary">

                                            
                                            <input type="hidden" name="bar_tr_index" value="">
                                            <input type="hidden" name="bar_item_id" value="">
                                        </div>
                                    </div><!--/form-group-->

                                </form>
                                
                                
                            </div><!--/porlets-content-->
                        </div><!--/block-web--> 
                    </div><!--/col-md-6-->
                    <div class="col-md-4">
                        <div class="block-web">
                            <div class="header">
                                <div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a><a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
                                <h3 class="content-header">Print All Barcode</h3>
                            </div>
                            <div class="porlets-content">
                                <br>
                                <h4>Print  barcode by date..</h4>
<!--                                <div class="col-sm-3">-->
                                <form method="post" action="barcode_print_by_date" id="datebarcode_form">
                                    <label class="control-label">Date</label>
                                    <div data-date-format="yyyy-mm-dd" data-date="2015-08-12" class="input-group input-large">
                                        <input type="text" name="from_date" placeholder="From" class="form-control dpd1" value="<?php echo date('Y-m-d'); ?>" required>
                                        <span class="input-group-addon">To</span>
                                        <input type="text" name="to_date" placeholder="To" class="form-control dpd2"  value="<?php echo date('Y-m-d'); ?>" required>
                                    </div>
                                    <br>
                                <input type="submit" name="datebarcode" class="btn btn-primary" value="Print Barcode">
                                </form>
<!--                                <br>-->
<!--                                <br>-->
<!--                                <br>-->
<!--                                <h4>Print all barcode here..</h4>-->
<!--<!--                                </div>-->
<!---->
<!--                                <a href="barcode_print_all.php" class="btn btn-primary">Print all</a>-->
                            </div><!--/porlets-content-->
                        </div><!--/block-web-->
                    </div><!--/col-md-4-->

                </div>
            

            </div>
        </section>
    </div>
</div>
<!--\\\\\\\ content panel end \\\\\\-->

<?php require_once("include/footer.php"); ?>