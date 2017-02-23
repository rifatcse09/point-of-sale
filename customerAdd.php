<?php require_once("include/header.php"); ?>
	<script>
$(function() {
  $("[name='cus_name']").focus();
});
</script>
    <div class="contentpanel">
      <!--\\\\\\\ contentpanel start\\\\\\-->
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>customer</h1>
          <h2 class="">add customer</h2>
        </div>
        <div class="pull-right">
          <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li>Customer</li>
            <li class="active">CUSTOMER ADD</li>
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
              <h3 class="content-header">Customer Add</h3>
            </div>
            <div class="porlets-content">
              <form action="" method="post" class="form-horizontal row-border" id="customer_add">
       
                <div class="form-group">
                  <label class="col-sm-3 control-label">Full Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" required name="cus_name" placeholder="Full Name">
                  </div>
                </div><!--/form-group-->
                
                <div class="form-group">
                  <label class="col-sm-3 control-label">Email</label>
                  <div class="col-sm-9">
                    <input type="email" class="form-control" name="email" placeholder="Email">
                  </div>
                </div><!--/form-group-->
                
                <div class="form-group">
                  <label class="col-sm-3 control-label">Mobile</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" required name="mobile" placeholder="Mobile">
                  </div>
                </div><!--/form-group-->
                
                <div class="form-group">
                  <label class="col-sm-3 control-label">Address</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" name="address" style="height: 125px;"></textarea>
                  </div>
                </div><!--/form-group-->
               
                <div class="form-group">
                  <label class="col-sm-3 control-label"></label>
                  <div class="col-sm-9">
                   <input type="submit" name="cutomer_add" class="btn btn-primary" value="Submit">
                  </div>
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