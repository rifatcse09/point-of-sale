<?php
require_once("include/header.php");
$supp_id = htmlspecialchars($_REQUEST['supp_id'], ENT_QUOTES, 'UTF-8');
$supplier = $cls_supplier->view_supplier_by_id($supp_id);
$supplier_info = $supplier->fetch_assoc();
?>
<script>
$(function() {
  $("[name='company_name']").focus();
});
</script>
<div class="contentpanel">
    <!--\\\\\\\ contentpanel start\\\\\\-->
    <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
            <h1>Supplier</h1>
            <h2 class="">Supplier Edit Form</h2>
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
                                <h3 class="content-header">Supplier Edit Form</h3>
                            </div>
                            <div class="porlets-content">
                                <form action="" id="supplier_edit"  method="post" class="form-horizontal row-border">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Company Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="company_name" required value="<?php echo $supplier_info['c_name'] ?>">
                                        </div>
                                    </div><!--/form-group-->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Address</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="address"><?php echo $supplier_info['address'] ?></textarea>
                                        </div>
                                    </div><!--/form-group--> 


                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Mobile</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="mobile" value="<?php echo $supplier_info['mobile'] ?>">
                                        </div>
                                    </div><!--/form-group-->


                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" name="email" value="<?php echo $supplier_info['email'] ?>">
                                        </div>
                                    </div><!--/form-group-->


                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Contact Person</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="contact_person" value="<?php echo $supplier_info['contact_person'] ?>">
                                        </div>
                                    </div><!--/form-group-->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Mobile</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="contact_person_mobile" value="<?php echo $supplier_info['cp_mobile'] ?>">
                                        </div>
                                    </div><!--/form-group-->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Total Amount</label>
                                        <div class="col-sm-9">
                                            <input type="text"  readonly class="form-control" name="payable_amount" value="<?php echo $supplier_info['total_amount'] ?>">
                                        </div>
                                    </div><!--/form-group-->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Payed Amount</label>
                                        <div class="col-sm-9">
                                            <input type="text" readonly class="form-control" name="payable_amount" value="<?php echo $supplier_info['paid'] ?>">
                                        </div>
                                    </div><!--/form-group-->
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Payable Amount</label>
                                        <div class="col-sm-9">
                                            <input type="text" readonly class="form-control" name="payable_amount" value="<?php echo $supplier_info['balance'] ?>">
                                        </div>
                                    </div><!--/form-group-->
                                    <input type="hidden" name="supp_id" value="<?php echo $supp_id ?>">
                                    <input type="submit" name="supplier_edit" value="Update" class="btn btn-primary">
                                    <a href="supplierManage" class="btn btn-default">Cancel</a>
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