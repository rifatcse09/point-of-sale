<?php require_once("include/header.php");

$vat = $cls_store->view_vat();
$vat_row = $vat->fetch_assoc();

?>
<script>
    $('document').ready(function(){
        sale.sale_inv_control_dis();
    });
    $(function() {
        $("[name='sale_item_code']").focus();
    });

</script>
<div class="contentpanel">
    <!--\\\\\\\ contentpanel start\\\\\\-->
    <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
            <h1>sale</h1>
            <h2 class="">Item Sale</h2>
        </div>
        <div class="pull-right">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">sale</a></li>
                <li class="active">sale Item</li>
            </ol>
        </div>
    </div>
    <div class="container clear_both padding_fix">
        <section class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="block-web">
                            <div class="header">
                                <div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a><a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
                                <h3 class="content-header">Search Item</h3>
                            </div>
                            <div class="porlets-content">
                                <form action=""  method="post" class="form-horizontal row-border">
                                    <div class="form-group">
                                        <input type="checkbox" checked="checked" name="auto_cart" id="sales_checkbox"><label for="sales_checkbox">Check the box</label>
                                        <input type="hidden" id="sal_add_cart" >
                                    </div><!--/form-group--> 
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="sale_item_code" id="sale_item_code" placeholder="Item Code">
                                    </div><!--/form-group-->
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="itemName" placeholder="Search by Item name">
                                    </div><!--/form-group-->
                                    <div class="form-group">
                                        <span id="stock_empty"></span>
                                        <div id="itemShow" style="width:100%;border:1px solid #ccc;height:auto;">
                                            <select id="sale_item_show" size="20" style="height:270px!important; width:100%;">

                                            </select>
                                        </div>
                                    </div><!--/form-group-->

                                </form>
                            </div><!--/porlets-content-->
                        </div><!--/block-web--> 
                    </div><!--/col-md-4-->
                    <div class="col-md-5">
                        <div class="block-web">
                            <div class="header">
                                <div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a><a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
                                <h3 class="content-header">Item Sale Form</h3>
                            </div>
                            <div class="porlets-content">
                                <form action=""  method="post" id="sale_item_form" class="form-horizontal row-border">

                                    <!--select info-->
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label"> 
                                            <span id="sale_item_photo"><img src="images/itemimages/no_image.png" style="width:100%;" /></span>
                                        </label>
                                        <div class="col-sm-5">
                                            <span style="font-size:16px;font-weight:bold;" id="sale_item_name">Product Name</span><br> 
                                            <span id="sale_item_barcode"></span>
                                            Category: <span id="sale_item_catname"></span><br>
                                            <span style="font-size:11px;line-height:15px;color:#334559;" id="sale_item_des">Product Description</span><br>
                                        </div>

                                    </div><!--/form-group-->
                                    <hr>

                                    <!--purchase info end-->
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">purchase Price</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="purchase_price" id="purchase_price" required placeholder="0.00" onkeypress="return OnlyNumberKey(event);" readonly>
                                        </div>

                                    </div><!--/form-group-->

                                    <!--select info end-->
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Sale Price</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="sale_price" required placeholder="0.00" onkeypress="return OnlyNumberKey(event);" readonly>
                                        </div>

                                    </div><!--/form-group-->   

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Discount</label>
                                        <div class="col-sm-4">
                                            <input type="text" readonly class="form-control" name="sale_discount" placeholder="0.00" onkeypress="return OnlyNumberKey(event);">
                                        </div>

                                    </div><!--/form-group-->  
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Available Qty. (<span name="sale_item_unit"></span>)</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" readonly name="stock_quantity" placeholder="0" required onkeypress="return OnlyNumberKey(event);">
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Quantity (<span name="sale_item_unit"></span>)</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control"  name="sale_quantity" required  value="1" onkeypress="return OnlyNumberKey(event);">
                                        </div>

                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Total Price</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="sale_subtotal_price" readonly placeholder="0.00" onkeypress="return OnlyNumberKey(event);">
                                        </div>

                                    </div><!--/form-group-->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label"></label>
                                        <div class="col-sm-9">
                                            <input type="button" style="display:none;" name="sale_item_update" value="Item Update" class="btn btn-primary">
                                            <input type="button" style="display:none;" name="sale_item_cancel" value="Cancel" class="btn btn-primary">
                                            <input type="submit" name="sale_item_add" value="Item Add" class="btn btn-primary">

                                            <input type="hidden"  name="sale_tr_index" value="">
                                            <input type="hidden" name="sale_item_id" value="">
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
                                <h3 class="content-header">Inovice Information</h3>
                            </div>
                            <div class="porlets-content">
                                <form action="" id="item_sale_form"  method="post" class="form-horizontal row-border">
                                    <div class="form-group">
                                        <label style="text-align:left;" class="col-sm-4 control-label">Customer</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="cus_id_dis" name="cus_id">
                                                <option value="">Select</option>

                                            </select>
                                            <a  class="btn btn-default btn-icon" href="customerAdd" target='_blank' style="margin-top:10px">Add new</a>
                                            <!--<a href="amar_matha.php">Add New</a>-->
                                        </div>


                                    </div><!--/form-group-->
                                   

                                    <div class="form-group">
                                        <label style="text-align:left;" class="col-sm-4 control-label">Total</label>
                                        <div class="col-sm-5">
                                            <input type="text" readonly class="form-control" name="sale_total_price" placeholder="0.00">
                                        </div>

                                    </div><!--/form-group-->
                                    <input type="hidden" class="form-control"  name="vat_hidden" value = "<?php echo $vat_row['vat']?>">
                                    <div class="form-group">
                                        <label style="text-align:left;" class="col-sm-4 control-label">VAT</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="vat" readonly placeholder="0.00" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label style="text-align:left;" class="col-sm-4 control-label">Discount</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" readonly  name="discount" style="width:100%;" placeholder="0.00" >
                                        </div>  
                                    </div>
                                    <div class="form-group">
                                        <label style="text-align:left;" class="col-sm-4 control-label">Rounding</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" readonly id="abcd" name="rounding_amt" placeholder="0.00">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label style="text-align:left;color:#ff0000;" class="col-sm-4 control-label">Payable</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" readonly id="abcd" name="sale_net_payable" placeholder="0.00" style="border:1px solid #ff0000;">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label style="text-align:left;" class="col-sm-4 control-label">Type</label>
                                        <div class="col-sm-5">
                                            <select class="form-control" id="pay_type1_dis" name="pay_type1">
                                                <option value="Cash" selected>Cash</option> 
                                                <option value="Card">Card</option> 
                                                <option value="Bkash">Bkash</option> 
                                                <option value="DBBL-MB">DBBL-MB</option> 
                                            </select>
                                        </div>
                                    </div>
                                    <div id="trans_num1" class="form-group" style="display:none;">
                                        <label style="text-align:left;" class="col-sm-3 control-label">Trans. no</label>
                                        <div  class="col-sm-5">
                                            <input type="text" class="form-control" name="trans_num1" placeholder="Transaction No.">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label style="text-align:left;color:red;" class="col-sm-4 control-label"><b>Amt.</b></label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="trans_amt1"  onkeypress="return OnlyNumberKey(event);" placeholder="0.00"  style="border:1px solid #ff0000">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label style="text-align:left;" class="col-sm-4 control-label">Type</label>
                                        <div class="col-sm-5">
                                            <select class="form-control"  name="pay_type2">
                                                <option value="" selected>Select</option> 
                                                <!-- <option value="Cash">Cash</option>  -->
                                                <option value="Card">Card</option> 
                                                <option value="Bkash">Bkash</option> 
                                                <option value="DBBL-MB">DBBL-MB</option> 
                                            </select>
                                        </div>
                                    </div>
                                    <div id="trans_num2" style="display:none;" class="form-group">
                                        <label style="text-align:left;" class="col-sm-4 control-label">Tra. No.</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="trans_num2" placeholder="Transaction No.">
                                        </div>
                                    </div>
                                    <div class="form-group"  id="trans_amt2" style="display:none;">
                                        <label style="text-align:left;"  class="col-sm-4 control-label">Amt.</label>
                                        <div class="col-sm-5"> 
                                            <input type="text" class="form-control" value="0.00" name="trans_amt2" onkeypress="return OnlyNumberKey(event);">
                                        </div>
                                    </div>
                                    <div class="form-group" id="">
                                        <label style="text-align:left;"  class="col-sm-4 control-label">Return Amt.</label>
                                        <div class="col-sm-5"> 
                                            <input type="text" class="form-control" value="0.00" name="return_amt" onkeypress="return OnlyNumberKey(event);" readonly> 
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label style="text-align:left;" class="col-sm-4 control-label">Due</label>
                                        <?php //echo date('Ymd').$cls_datetime->show_datetime()?>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="sale_amt_due" readonly placeholder="0.00" ><br> 
                                            <input type="submit" name="sale_item_insert" value="sale" class="btn btn-primary">
                                        </div>
                                    </div>

                                </form>
                            </div><!--/porlets-content-->
                        </div><!--/block-web--> 
                    </div><!--/col-md-7-->
                </div>
                <table class="table table-hover" id="sale_item_table">
                    <thead>
                        <tr>
                            <th style="display:none;"></th>
                            <th class="text-center">SL NO.</th>
                            <th>ITEM</th>
                            <th>DESCRIPTION</th>
                            <th>QUANTITY</th>
                            <th>PRICE</th>
                            <th>DISCOUNT (Per Qty.)</th>
                            <th>SUBTOTAL</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--  <tr class="tr_border">
<th style="display:none;"></th>
<td class="text-center"><strong>1</strong></td>
<td><a href="javascript:void(0);">Invoice 1</a></td>
<td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
<td>5</td>
<td>720</td>
<td>720</td>
<td><a style="line-height:15px!important;" class="btn btn-primary" href="">Edit</a>&nbsp;&nbsp;
<a style="line-height:15px!important;background:#f00;" class="btn btn-primary" href="">Remove</a></td>
</tr>-->


                        <tr>
                            <td style="display:none;"><strong></strong></td>
                            <td><strong></strong></td>
                            <td><strong></strong></td>
                            <td><strong></strong></td>
                            <td><strong></strong></td>
                            <td><strong></strong></td>
                            <td>Total</td>

                            <td><strong><span id="sale_total_price">0.00</span></strong></td>

                            <td><strong></strong></td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>
<!--\\\\\\\ content panel end \\\\\\-->

<?php require_once("include/footer.php"); ?>