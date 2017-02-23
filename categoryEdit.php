<?php require_once("include/header.php");
    $cat_id = htmlspecialchars($_REQUEST['cat_id'], ENT_QUOTES, 'UTF-8');
    $category = $cls_category->category_by_id($cat_id);
    $category_info = $category->fetch_assoc(); 
?>
<div class="contentpanel">
    <!--\\\\\\\ contentpanel start\\\\\\-->
    <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
            <h1>CATEGORY</h1>
            <h2 class="">Edit Category</h2>
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
                                <h3 class="content-header">Edit Category </h3>
                            </div>

                            <div class="porlets-content">
                                <form  id="caegory_edit" action="" method="post" class="form-horizontal row-border">

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label"> Category Name </label>
                                        <div class="col-sm-9">
                                            <input name="CategoryName" type="text" required  class="form-control" id="CategoryName" value="<?php echo $category_info['cat_name'];?>" >
                                        </div>
                                    </div><!--/form-group-->

                                    <div>
									    <input type="hidden"  name="cat_id" value="<?php echo $category_info['id'] ?>">
                                        <input type="submit" id="caegory_edit" name="caegory_edit" class="btn btn-primary" value="Update">
										   <a type="button" href="categoryManage" class="btn btn-default">Cancel</a>

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