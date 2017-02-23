<?php require_once("include/header.php"); ?>
<style>
            #per_outer{width:300px;min-height:30px;background:#5cb85c;margin-top:5px;text-align:center;}
            #per_inner{width:0%;min-height:inherit;background:red;text-align:center;line-height:30px;}
        </style>
		<script>
$(function() {
  $("[name='unit_name']").focus();
});
</script>
    <div class="contentpanel">
      <!--\\\\\\\ contentpanel start\\\\\\-->
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>Items</h1>
          <h2 class="">Add Items Form</h2>
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
              <h3 class="content-header">Add Items Unit</h3>
            </div>
            <div class="porlets-content">
               <form action=""  method="post" id="itemunit_add" class="form-horizontal row-border" enctype="multipart/form-data"> 
			    
                <div class="form-group">
                  <label class="col-sm-3 control-label">Item Unit Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="unit_name" required placeholder="Item Unit Name">
                  </div>
                </div><!--/form-group-->
                
                <div>
                 <!-- <input type="submit" name="item_add" value="Submit" class="btn btn-primary" value="Submit">-->
                    <a type="button" href="itemUnitManage" class="btn btn-default">Cancel</a>
                    <input type="submit" name="item_add" value="Submit" class="btn btn-primary" value="Submit">
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