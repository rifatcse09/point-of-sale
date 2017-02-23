<?php 
require_once("include/header.php");
if($user_type != "admin")
{
   echo "<script>location.replace('dashboard');</script>"; 
}
?>
    <div class="contentpanel">
      <!--\\\\\\\ contentpanel start\\\\\\-->
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>Setting</h1>
          <h2 class="">Store Setting</h2>
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
              <h3 class="content-header">Company Information</h3>
            </div>
            <div class="porlets-content">
              <form action="post_url/storeupdate" id="storeadd" method="post" class="form-horizontal row-border" enctype="multipart/form-data">
               <input type="hidden" name="userid" value="<?php echo $user_id; ?>">
                <div class="form-group">
                  <label class="col-sm-3 control-label">Company Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="company_name" value="<?php echo $row['company_name']; ?>" placeholder="Company Name">
                  </div>
                </div><!--/form-group-->
                
                 <div class="form-group">
                  <label class="col-sm-3 control-label">Address</label>
                  <div class="col-sm-9">
                     <textarea class="form-control" name="address" placeholder="Address"><?php echo $row['address']; ?></textarea>
                  </div>
                </div><!--/form-group--> 
                <div class="form-group">
                  <label class="col-sm-3 control-label">Phone</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="phone" value="<?php echo $row['phone']; ?>" placeholder="Phone">
                  </div>
                </div><!--/form-group-->
                
                <div class="form-group">
                  <label class="col-sm-3 control-label">Mobile</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="mobile" value="<?php echo $row['mobile']; ?>" placeholder="Mobile">
                  </div>
                </div><!--/form-group-->
                
                
                <div class="form-group">
                  <label class="col-sm-3 control-label">Email</label>
                  <div class="col-sm-9">
                    <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>" placeholder="Email">
                  </div>
                </div><!--/form-group-->
                
                <div class="form-group">
                  <label class="col-sm-3 control-label">Website</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="website" value="<?php echo $row['website']; ?>" placeholder="Website">
                  </div>
                </div><!--/form-group-->
                
                <div class="form-group">
                  <label class="col-sm-3 control-label">Vat (%)</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="vat" value="<?php echo $row['vat']; ?>" placeholder="Vat">
                  </div>
                </div><!--/form-group-->
                <div class="form-group">
                  <label class="col-sm-3 control-label">Vat Reg No.</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="vat_reg_no" value="<?php echo $row['vat_reg_no']; ?>" placeholder="Vat Reg No.">
                  </div>
                </div><!--/form-group-->
                <div class="form-group">
                  <label class="col-sm-3 control-label">Vat area code</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="vat_area_code" value="<?php echo $row['vat_area_code']; ?>" placeholder="Vat area code">
                  </div>
                </div><!--/form-group-->
                
                <div class="form-group">
                  <label class="col-sm-3 control-label">Invoice Size</label>
                  <div class="col-sm-9">
                   <input type="radio" name="invoice_size" <?php if($row['invoice_size'] == 's') { ?> checked <?php  } ?> value="s"> Small 
                   <input type="radio" name="invoice_size" <?php if($row['invoice_size'] == 'm') { ?> checked <?php  } ?> value="m"> Medium 
                    <input type="radio" name="invoice_size" <?php if($row['invoice_size'] == 'l') { ?> checked <?php  } ?> value="l"> Large
                  </div>
                </div><!--/form-group-->

                
                <div class="form-group">
                  <label class="col-sm-3 control-label">Logo</label>
                  <div class="col-sm-9">
                    <span class="btn btn-success fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span>Add files...</span>
                    <input type="file" name="logo" onchange="PreviewImage('logo', 'logo_preview')" accept="image/*">
                    </span><br><br>
                    <img id="logo_preview" src="images/logo.png" style="height:100px;">
                  </div>
                  <!--/image preview and status bar-->
                  
					<br><br>
					<div class="progress">
						<div class="bar"></div>
						<div class="percent">0%</div>
					</div>

					<div id="status"></div>
					
					<script src="js/jquery.form.js"></script>
					<script>
						(function() {
							var bar = $('.bar');
							var percent = $('.percent');
							var status = $('#status');

							$('#storeadd').ajaxForm({
								beforeSend: function() {
									status.empty();
									var percentVal = '0%';
									bar.width(percentVal)
									percent.html(percentVal);
									$('#upbtn').attr('disabled','disabled');
									
								},
								uploadProgress: function(event, position, total, percentComplete) {
									var percentVal = percentComplete + '%';
									bar.width(percentVal)
									percent.html(percentVal);
								},
								complete: function(xhr) {
									bar.width("100%");
									percent.html("100%");
									status.html(xhr.responseText);
								}
							}); 
						})();       
					</script>
                  <!--/image preview and status bar end-->
                </div><!--/form-group--> 
                
                
                
                  <input type="submit" id="upbtn" class="btn btn-primary" value="Submit">
                  <button type="button" class="btn btn-default">Cancel</button>
                <!--/form-group-->
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