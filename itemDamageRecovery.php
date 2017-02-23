<?php require_once("include/header.php"); 
$cls_supplier=$cls_supplier->view_all();
?>
<style>
            #per_outer{width:300px;min-height:30px;background:#5cb85c;margin-top:5px;text-align:center;}
            #per_inner{width:0%;min-height:inherit;background:red;text-align:center;line-height:30px;}
        </style>
		<script>
$(function() {
  $("[name='supplier_id']").focus();
});
</script>
    <div class="contentpanel">
      <!--\\\\\\\ contentpanel start\\\\\\-->
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>Items</h1>
          <h2 class="">Recover Damage Items</h2>
        </div>
        <div class="pull-right">
          <ol class="breadcrumb">
            <li><a href="dashboard.php">Home</a></li>
            <li><a href="javascript:void(0);">Item</a></li>
            <li class="active">Recover Damage</li>
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
              <h3 class="content-header">Recover Damage Items</h3>
            </div>
            <div class="porlets-content">
               <form action=""  method="post" id="itm_recover_add" class="form-horizontal row-border" enctype="multipart/form-data"> 
			     <div class="form-group">
                  <label class="col-sm-3 control-label">Supplier</label>
                  <div class="col-sm-9">
                    <select class="form-control" name="supplier_id" id="supplier_id" required>
					<option value="">Select</option>
					<?php  
					while($supplierName = $cls_supplier->fetch_assoc()){
						      echo "<option  value='" . $supplierName['id'] . "'>" . $supplierName['c_name'] . "</option>";
					}?>
				
					</select>
                  </div>
                </div><!--/form-group-->
			    <div class="form-group">
                  <label class="col-sm-3 control-label">Item Name</label>
                  <div class="col-sm-9">
                    <select id="item_list" name="item_name" style="width:100%">
						
                            
                    </select>
                  </div>
                </div><!--/form-group-->
         
                <div class="form-group">
                  <label class="col-sm-3 control-label">Size</label>
                  <div class="col-sm-9">
                    <input type="text" name="size" class="form-control" readonly />
                  </div>
                </div><!--/form-group-->
                
               <div class="form-group">
                  <label class="col-sm-3 control-label">Unit</label>
                  <div class="col-sm-9">
                    <input type="text" name="unit" class="form-control" readonly />
                  </div>
                </div><!--/form-group-->
                
				<div class="form-group">
                  <label class="col-sm-3 control-label">Stock Qty.</label>
                  <div class="col-sm-9">
                    <input type="text" name="stock_qnty" class="form-control" readonly />
                  </div>
                </div><!--/form-group-->
				<div class="form-group">
                  <label class="col-sm-3 control-label">Damage Qty.</label>
                  <div class="col-sm-9">
                   <input type="text" class="form-control" name="damage_qnty" readonly required />
                  </div>
                </div><!--/form-group-->
                <div class="form-group">
                  <label class="col-sm-3 control-label">Recover Qty.</label>
                  <div class="col-sm-9">
                   <input type="text" class="form-control" name="recover_qnty" required onkeypress="return OnlyNumberKey(event);"/>
                  </div>
                </div><!--/form-group-->

	            <div class="form-group">
                  <label class="col-sm-3 control-label">Remarks</label>
                  <div class="col-sm-9">
                   <textarea class="form-control" name="remarks"></textarea>
                  </div>
                </div><!--/form-group-->				
                <div>
                  <input type="submit" name="submit" value="Submit" class="btn btn-primary" value="Submit"/>
         
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