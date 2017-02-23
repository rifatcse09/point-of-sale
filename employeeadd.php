<?php 
require_once("include/header.php");
if($user_type != "admin")
{
   echo "<script>location.replace('dashboard');</script>"; 
}
?>
<script>
$(function() {
  $("[name='name']").focus();
});
</script>
    <div class="contentpanel">
      <!--\\\\\\\ contentpanel start\\\\\\-->
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>employee</h1>
          <h2 class="">add employee</h2>
        </div>
        <div class="pull-right">
          <ol class="breadcrumb">
            <li><a href="dashboard">Home</a></li>
            <li>Employee</li>
            <li class="active">EMPLOYEE ADD</li>
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
              <h3 class="content-header">Employee Add</h3>
            </div>
            <div class="porlets-content">
              <form action="" id="employee_add" method="post" class="form-horizontal row-border" enctype="multipart/form-data">
               <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                <div class="form-group">
                  <label class="col-sm-3 control-label">Full Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="name" required placeholder="Full Name">
                  </div>
                </div><!--/form-group-->
                
                <div class="form-group">
                  <label class="col-sm-3 control-label">Email</label>
                  <div class="col-sm-9">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                    <span id="email_chk"></span>
                  </div>
                </div><!--/form-group-->
                
                <div class="form-group">
                  <label class="col-sm-3 control-label">Mobile</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="mobile" placeholder="Mobile">
                  </div>
                </div><!--/form-group-->
                
                
                <div class="form-group">
                  <label class="col-sm-3 control-label">Username</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" required name="username" placeholder="Username">
                  </div>
                </div><!--/form-group-->
                
                <div class="form-group">
                  <label class="col-sm-3 control-label">Password</label>
                  <div class="col-sm-9">
                    <input type="password" class="form-control" required name="password" placeholder="6 - 15 Characters">
                  </div>
                </div><!--/form-group-->
                <div class="form-group">
                  <label class="col-sm-3 control-label">Re-Password</label>
                  <div class="col-sm-9">
                    <input type="password" class="form-control" required name="repassword" placeholder="6 - 15 Characters">
                  </div>
                </div><!--/form-group-->
                <div class="form-group">
                  <label class="col-sm-3 control-label">User Type</label>
                  <div class="col-sm-9">
                     <select class="form-control" name="usertype" required>
					<option value="">Select</option>
					<option value="admin">Admin</option>
					<option value="employee">Employee</option>
                      </select>
                  </div>
                </div><!--/form-group-->
                
                <div class="form-group">
                  <label class="col-sm-3 control-label">About</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" name="about" style="height: 125px;"></textarea>
                  </div>
                </div><!--/form-group-->
               
                <div class="form-group">
                  <label class="col-sm-3 control-label"></label>
                  <div class="col-sm-9">
                   <input type="submit" name="emp_add" class="btn btn-primary" value="Submit">
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