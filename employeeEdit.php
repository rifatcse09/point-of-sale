<?php 
    require_once("include/header.php");
    if($user_type != "admin")
{
   echo "<script>location.replace('dashboard');</script>"; 
}
    $employee = htmlspecialchars($_REQUEST['employee'], ENT_QUOTES, 'UTF-8');
    
    $query = $cls_employee->get_empbyid($employee, $user_id);
    $emp_row = $query->fetch_assoc();
?>
    <div class="contentpanel">
      <!--\\\\\\\ contentpanel start\\\\\\-->
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>employee</h1>
          <h2 class="">Update employee</h2>
        </div>
        <div class="pull-right">
          <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li>Employee</li>
            <li class="active">EMPLOYEE UPDATE</li>
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
              <h3 class="content-header">Employee Update</h3>
            </div>
            <div class="porlets-content">
              <form action="post_url/storeupdate" id="storeadd" method="post" class="form-horizontal row-border" enctype="multipart/form-data">
               <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
               <input type="hidden" name="emp_id" value="<?php echo $emp_row['id']; ?>">
                <div class="form-group">
                  <label class="col-sm-3 control-label">Full Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="name" value="<?php echo $emp_row['name']; ?>" placeholder="Full Name">
                  </div>
                </div><!--/form-group-->
                
                <div class="form-group">
                  <label class="col-sm-3 control-label">Email</label>
                  <div class="col-sm-9">
                    <input type="email" class="form-control" name="email" value="<?php echo $emp_row['email']; ?>" placeholder="Email">
                  </div>
                </div><!--/form-group-->
                
                <div class="form-group">
                  <label class="col-sm-3 control-label">Mobile</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="mobile" value="<?php echo $emp_row['mobile']; ?>" placeholder="Mobile">
                  </div>
                </div><!--/form-group-->
                
                
                <div class="form-group">
                  <label class="col-sm-3 control-label">Username</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" readonly name="username" value="<?php echo $emp_row['username']; ?>" placeholder="Username">
                  </div>
                </div><!--/form-group-->
                
                <div class="form-group">
                  <label class="col-sm-3 control-label">Password</label>
                  <div class="col-sm-9">
                    <input type="password" class="form-control" name="password" value="<?php echo $emp_row['']; ?>" placeholder="6 - 15 Characters">
                  </div>
                </div><!--/form-group-->
                <div class="form-group">
                  <label class="col-sm-3 control-label">Re-Password</label>
                  <div class="col-sm-9">
                    <input type="password" class="form-control" name="repassword" placeholder="6 - 15 Characters">
                  </div>
                </div><!--/form-group-->
                
                <div class="form-group">
                  <label class="col-sm-3 control-label">User Type</label>
                  <div class="col-sm-9">
                     <select class="form-control" name="usertype" required>
					<option value="">Select</option>
					<option <?php if($emp_row['usertype'] == "admin") { ?> selected <?php } ?> value="admin">Admin</option>
					<option <?php if($emp_row['usertype'] == "employee") { ?> selected <?php } ?> value="employee">Employee</option>
                      </select>
                  </div>
                </div><!--/form-group-->
                
                <div class="form-group">
                  <label class="col-sm-3 control-label">About</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" name="about" style="height: 125px;"><?php echo $emp_row['about']; ?></textarea>
                  </div>
                </div><!--/form-group-->
                <div class="">
                <div class="form-group">
                  <label class="col-sm-3 control-label"></label>
                  <div class="col-sm-9">
                   <input type="button" name="emp_update" class="btn btn-primary" value="Update">
                   <a type="button" href="employeemanage" class="btn btn-default">Cancel</a>
                  </div>
                </div><!--/form-group-->
                  </div>
                
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