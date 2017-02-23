<?php require_once("include/header.php"); 

$item_id = htmlspecialchars($_REQUEST['item_id'], ENT_QUOTES, 'UTF-8');
 $item = $cls_item->viewitemby_id($item_id);      	  
       $item_info = $item->fetch_assoc();
	  $cat_id=$item_info['cat_id'];
?>
<style>
            #per_outer{width:300px;min-height:30px;background:#5cb85c;margin-top:5px;text-align:center;}
            #per_inner{width:0%;min-height:inherit;background:red;text-align:center;line-height:30px;}
        </style>
		<script>
$(function() {
  $("[name='category']").focus();
});
</script>
    <div class="contentpanel">
      <!--\\\\\\\ contentpanel start\\\\\\-->
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>Items</h1>
          <h2 class="">Add Edit Form</h2>
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
              <h3 class="content-header">Add Edit Form</h3>
            </div>
            <div class="porlets-content">
               <form action=""  method="post" id="item_edit" class="form-horizontal row-border" enctype="multipart/form-data"> 
			   <input type="hidden" name="item_id" value=<?php echo $item_id?>>
			     <div class="form-group">
                  <label class="col-sm-3 control-label">Category</label>
                  <div class="col-sm-9">
                    <select class="form-control" name="category" required>
					<?php 				
					$category = $cls_category->cat_by_name();
					while($categoryName=$category->fetch_assoc()){
					?>
						<option <?php if($item_info['cat_id'] == $categoryName['id']) { ?> selected <?php } ?> value="<?php echo $categoryName['id']; ?>"><?php echo $categoryName['cat_name']; ?></option>
						<?php
					}
					?>		
					</select>
                  </div>
                </div><!--/form-group-->
                <div class="form-group">
                  <label class="col-sm-3 control-label">Item Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="item_name" required value="<?php echo $item_info['item_name'];?>">
                  </div>
                </div><!--/form-group-->
				 <div class="form-group">
                  <label class="col-sm-3 control-label">Item Code</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="item_code"  value="<?php echo $item_info['item_code'];?>">
                  </div>
                </div><!--/form-group-->
                
              
                <div class="form-group">
                  <label class="col-sm-3 control-label">Size</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="size" value="<?php echo $item_info['size'];?>">
                  </div>
                </div><!--/form-group-->
                
                <div class="form-group">
                  <label class="col-sm-3 control-label">Unit</label>
                  <div class="col-sm-9">
				    <select name="unit" class="form-control" required>
				 
				  <?php 
				  $sql=$cls_item->itemUnit();
				  while($row=$sql->fetch_assoc())
				  {
				  ?>
				   <option <?php if( $item_info['unit']==$row['name']){ echo 'Selected';}?> value="<?php echo $row['name']?>"><?php echo $row['name']?></option>
				  
				  <?php }?>
				  </select>
                  
                  </div>
                </div><!--/form-group-->
                
				<div class="form-group">
                  <label class="col-sm-3 control-label">Description</label>
                  <div class="col-sm-9">
                     <textarea class="form-control" name="description" ><?php echo $item_info['description'];?></textarea>
                  </div>
                </div><!--/form-group--> 
               
                <div class="form-group">
                  <label class="col-sm-3 control-label">Logo</label>
                  <div class="col-sm-9">
                    <span class="btn btn-success fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span>Add files...</span>
                    <input type="file" name="logo" onchange="PreviewImage('logo', 'logo_preview')">
                    </span><br><br>
                    <img id="logo_preview" src="images/itemimages/<?php echo $item_info['photo'];?>" style="height:100px;">
                  </div>
               
                </div><!--/form-group--> 
				
				    <div class="form-group">
                  <label class="col-sm-3 control-label"></label>
                  <div class="col-sm-9">
                        <div id="per_outer">
                           <div id="per_inner"></div>
                       <div>
                  </div>
               
                </div><!--/form-group--> 
            
                
                <div>
                  <input type="submit" name="item_edit" value="Update" class="btn btn-primary" value="Update">
                  <a type="button" href="itemManage" class="btn btn-default">Cancel</a>
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