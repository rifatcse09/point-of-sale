<?php require_once("include/header.php"); 
$supplier = $cls_supplier->view_all();
?>
<style>
            #per_outer{width:300px;min-height:30px;background:#5cb85c;margin-top:5px;text-align:center;}
            #per_inner{width:0%;min-height:inherit;background:red;text-align:center;line-height:30px;}
        </style>
		<script>
$(function() {
  $("[name='supplierName']").focus();
});
</script>
    <div class="contentpanel">
      <!--\\\\\\\ contentpanel start\\\\\\-->
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>Supplier</h1>
          <h2 class="">Add Supplier Payment Form</h2>
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
              <h3 class="content-header">Supplier Payment</h3>
            </div>
            <div class="porlets-content">
               <form action=""  method="post" id="payment_add" class="form-horizontal row-border" enctype="multipart/form-data"> 
		         <div class="form-group" style="margin-bottom:0px;">
                  <label class="col-sm-3 control-label">Supplier</label>
                  <div class="col-sm-9">
                   <input type="text" class="form-control" name="supplierName" id="supplierName" placeholder="Search by Supplier name">
				
                  </div>
                </div><!--/form-group--> 
				<div class="form-group" id="search_div" >
				      <label class="col-sm-3 control-label"></label>
                  <div  class="col-sm-9" id="itemShow">
                        <select id="supplier_show" required name="supplier_id" size="10" style="height:100px!important;width:100%">
						
                            
                        </select>
                   </div>
                </div><!--/form-group-->
			
                <div class="form-group">
                  <label class="col-sm-3 control-label">Total Amount</label>
                  <div class="col-sm-9">
                    <input type="text" id="total_amount" readonly class="form-control" name="total_amount"  value=<?php echo 0.00?>>
                  </div>
                </div><!--/form-group-->
		
                <div class="form-group">
                  <label class="col-sm-3 control-label">Paid Amount</label>
                  <div class="col-sm-9">
                    <input type="text" id="paid" readonly class="form-control" name="paid" value="<?php echo 0.00?>" >
                  </div>
                </div><!--/form-group-->
				
				 <div class="form-group">
                  <label class="col-sm-3 control-label">Due Amount</label>
                  <div class="col-sm-9">
                    <input type="text" id="due" readonly class="form-control" name="due"  placeholder="0.00"  value="0.00" required>
                  </div>
                </div><!--/form-group-->
                
                <div class="form-group">
                  <label class="col-sm-3 control-label">Amount</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="amount"  placeholder="0.00" required>
                  </div>
                </div><!--/form-group-->
                
				<div class="form-group">
                  <label class="col-sm-3 control-label">Remarks</label>
                  <div class="col-sm-9">
                     <textarea class="form-control" name="remarks" placeholder="Remarks"></textarea>
                  </div>
                </div><!--/form-group--> 
              
			
                <div>
                  <input type="submit" name="item_add" value="Submit" class="btn btn-primary" value="Submit">
               <!--   <button type="button" class="btn btn-default">Cancel</button>-->
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