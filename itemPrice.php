<?php
require_once("include/header.php");
$category = $cls_category->cat_by_name();
?>
<script>
$(function() {
  $("[name='category']").focus();
});
</script>
<style>
    #per_outer{width:300px;min-height:30px;background:#5cb85c;margin-top:5px;text-align:center;}
    #per_inner{width:0%;min-height:inherit;background:red;text-align:center;line-height:30px;}
</style>
<div class="contentpanel">
    <!--\\\\\\\ contentpanel start\\\\\\-->
    <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
            <h1>Items</h1>
            <h2 class="">Setting Item Price Form</h2>
        </div>
        <div class="pull-right">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">Dashboard</a></li>
                <li class="active">Settings</li>
            </ol>
        </div>
    </div>
    <div class="container clear_both padding_fix">
        <section class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="block-web">
                            <div class="header">
                                <div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a><a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
                                <h3 class="content-header">Setting Item Price Form</h3>
                            </div>
                            <div class="porlets-content">
                                <form action=""  method="post" id="item_price_add" class="form-horizontal row-border" enctype="multipart/form-data"> 
                                   <div class="form-group">
                                        <label class="col-sm-3 control-label">Item Code</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="item_code">
                                        </div>
                                    </div><!--/form-group-->
                                        <div class="form-group">
                                        <label class="col-sm-3 control-label">Category</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="category" id="category_select" size="10" style="height:100px!important;width:100%">
                                                <option value="">Select</option>
                                                <?php
                                                while ($categoryName = $category->fetch_assoc()) {
                                                    echo "<option  value='" . $categoryName['id'] . "'>" . $categoryName['cat_name'] . "</option>";
                                                }
                                                ?>

                                            </select>
                                        </div>
                                    </div><!--/form-group-->
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Item Name</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="item_id" id="item_select" size="10" style="height:100px!important;width:100%">
                                            </select>
                                        </div>
                                    </div><!--/form-group-->
                                    

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Purchase Price</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" required name="pur_price"  readonly>
                                        </div>
                                    </div><!--/form-group-->
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Sales Price</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="slaes_price" required >
                                        </div>
                                    </div><!--/form-group-->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Discount</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="discount"  placeholder="0.00">
                                        </div>
                                    </div><!--/form-group-->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Promo Date From</label>
                                        <div class="input-append date col-sm-9 default-date-picker" id="promo_from" data-date-viewmode="date" data-date-format="yyyy-mm-dd" data-date="<?php echo date('Y-m-d')?>">

                                            <input class="form-control" type="text" readonly=""  name="promo_from"  size="30">
                                            <span class="input-group-btn add-on">
                                                <button class="btn btn-danger" type="button">
                                                    <i class="fa fa-calendar"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div><!--/form-group-->


                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Promo Date To</label>
		                                  <div class="input-append date col-sm-9 default-date-picker" id="promo_to" data-date-viewmode="date" data-date-format="yyyy-mm-dd" data-date="<?php echo date('Y-m-d')?>">

                                            <input class="form-control" type="text" readonly=""  name="promo_to"  size="30">
                                            <span class="input-group-btn add-on">
                                                <button class="btn btn-danger" type="button">
                                                    <i class="fa fa-calendar"></i>
                                                </button>
                                            </span>
                                        </div>
                                        <!--<div class="input-append date dpYears col-sm-9" data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="<?php echo date('Y-m-d')?>">

                                            <input class="form-control" type="text" readonly=""   name="promo_to"  size="30">
                                            <span class="input-group-btn add-on">
                                                <button class="btn btn-danger" type="button">
                                                    <i class="fa fa-calendar"></i>
                                                </button>
                                            </span>
                                        </div>-->
                                    </div><!--/form-group-->


                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Size</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="size" value="" readonly>
                                        </div>
                                    </div><!--/form-group-->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Unit</label>
                                        <div class="col-sm-9">	
                                            <input type="text" class="form-control" name="unit" readonly>
                                        </div>
                                    </div><!--/form-group-->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Description</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="description" readonly></textarea>
                                        </div>
                                    </div><!--/form-group--> 

                                    <div>
                                        <input type="submit" name="item_price_add" value="Submit" class="btn btn-primary" value="Submit">
                                        <a type="button" href="itemManage" class="btn btn-default">Cancel</a>
                                    </div><!--/form-group-->
                                </form>
                            </div><!--/porlets-content-->
                        </div><!--/block-web--> 
                    </div><!--/col-md-6-->
                </div>

            </div>
        </section>
    </div>
</div>
<!--\\\\\\\ content panel end \\\\\\-->

<?php require_once("include/footer.php"); ?>