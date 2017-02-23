<?php require_once("include/header.php"); ?>
<script>
$(function() {
  $("[name='customerName']").focus();
});
</script>
    <div class="contentpanel">
      <!--\\\\\\\ contentpanel start\\\\\\-->
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>customer</h1>
          <h2 class="">customer payment</h2>
        </div>
        <div class="pull-right">
          <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li>Customer</li>
            <li class="active">Customer Payment</li>
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
              <h3 class="content-header">Customer Payment</h3>
            </div>
            <div class="porlets-content">
              <form action=""  method="post" id="customer_due_pay" class="form-horizontal row-border" enctype="multipart/form-data">
               <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
              <div class="form-group" style="margin-bottom:0px;">
                  <label class="col-sm-3 control-label">Customer</label>
                  <div class="col-sm-9">
                   <input type="text" class="form-control" name="customerName" id="customerName" placeholder="Search by Customer name">
				
                  </div>
                </div><!--/form-group--> 
				<div class="form-group" id="customer_search_div">
				      <label class="col-sm-3 control-label"></label>
                  <div  class="col-sm-9">
                        <select id="cutomer_show" required name="customer_id" size="10" style="height:100px!important;width:100%">
						
                            
                        </select>
                  </div>
                </div><!--/form-group-->
				<div class="form-group">
                  <label class="col-sm-3 control-label">Due Invoice</label>
                  <div class="col-sm-9">
                    <select id="invoice_show" name="invoice" style="width:100%">
						
                            
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
                                       <label  class="col-sm-3 control-label">Type</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="pay_type1_dis" name="pay_type1" required>
                                                    <option value="Cash" selected>Cash</option> 
                                                    <option value="Card">Card</option> 
                                                    <option value="Bkash">Bkash</option> 
                                                    <option value="DBBL-MB">DBBL-MB</option> 
                                            </select>
                                        </div>
                                    </div>
                                      <div id="trans_num1" class="form-group" style="display:none;">
                                       <label class="col-sm-3 control-label">Trans. no</label>
										<div  class="col-sm-9">
										<input type="text" class="form-control" name="trans_num1" placeholder="Transaction No.">
                                        </div>
                                    </div>
                                        <div class="form-group">
                                        <label class="col-sm-3 control-label">Amt.</label>
										<div class="col-sm-9">
                                           <input type="text" class="form-control" required name="trans_amt1"  onkeypress="return OnlyNumberKey(event);" value="0.00"> 
                                        </div>
                                    </div>
									
									<div class="form-group">
                                       <label class="col-sm-3 control-label">Type</label>
                                        <div class="col-sm-9">
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
										<label class="col-sm-3 control-label">Tra. No.</label>
                                          <div class="col-sm-9">
                                           <input type="text" class="form-control" name="trans_num2" placeholder="Transaction No.">
                                        </div>
                                    </div>
                                    <div class="form-group"  id="trans_amt2" style="display:none;">
										<label  class="col-sm-3 control-label">Amt.</label>
										<div class="col-sm-9"> 
                                           <input type="text" class="form-control" value="0.00" name="trans_amt2" onkeypress="return OnlyNumberKey(event);"> 
                                        </div>
                                    </div>
									<div class="form-group">
										<!--<label class="col-sm-3 control-label">Due</label>-->
										
										<div class="col-sm-9">
                                        <!--<input type="text" class="form-control" name="sale_amt_due" readonly placeholder="Due" ><br> -->
										<input type="submit" name="cus_due_payment" value="Receive" class="btn btn-primary">
                                       </div>
									</div>
                <!--<div class="form-group">
                  <label class="col-sm-3 control-label">Amount</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="amount"  placeholder="0.00" required>
                  </div>
                </div><!--/form-group-->
                
				<!--<div class="form-group">
                  <label class="col-sm-3 control-label">Remarks</label>
                  <div class="col-sm-9">
                     <textarea class="form-control" name="remarks" placeholder="Remarks"></textarea>
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