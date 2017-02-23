<?php require_once("include/header.php"); ?>
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
            <h2 class="">Supplier Registration Form</h2>
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
                                <h3 class="content-header">Supplier Registration Form</h3>
                            </div>
                            <div class="porlets-content">
                                <form action="" id="supplier_add" method="post" class="form-horizontal row-border">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Company Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="company_name" required placeholder="Company Name">
                                        </div>
                                    </div><!--/form-group-->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Address</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="address" placeholder="Address"></textarea>
                                        </div>
                                    </div><!--/form-group--> 

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Mobile</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="mobile" placeholder="Mobile">
                                        </div>
                                    </div><!--/form-group-->


                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" name="email" placeholder="Email">
                                        </div>
                                    </div><!--/form-group-->


                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Contact Person</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="contact_person" placeholder="Contact Person">
                                        </div>
                                    </div><!--/form-group-->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Mobile</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="contact_person_mobile" placeholder="Contact Person Mobile">
                                        </div>
                                    </div><!--/form-group-->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Payable Amount</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="payable_amount" placeholder="0.00" value="0.00">
                                        </div>
                                    </div><!--/form-group-->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Remarks</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="remarks"></textarea>
                                        </div>
                                    </div><!--/form-group-->

                                    <input type="hidden" name="saved_by" value="<?php echo $_SESSION['user_id'] ?>">


                                    <div>
                                        <input type="submit" name="supplier_add" value="Submit" class="btn btn-primary">
										   <a type="button" href="supplierManage" class="btn btn-default">Cancel</a>

                                    
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