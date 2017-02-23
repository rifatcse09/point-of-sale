<?php require_once("include/header.php"); ?>
<div class="contentpanel">
    <!--\\\\\\\ contentpanel start\\\\\\-->
    <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
            <h1>CATEGORY</h1>
            <h2 class="">Manage Category</h2>
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
                    <div class="col-md-7">
                        <div class="block-web">
                            <div class="header">
                                <div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a><a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
                                <h3 class="content-header">Manage Category </h3>
                            </div>
                            <div class="porlets-content">
                                <form action="post_url/storeadd" id="storeadd" method="post" class="form-horizontal row-border" enctype="multipart/form-data">

                                    <table class="table table-striped table-hover table-bordered dataTable" id="editable-sample" aria-describedby="editable-sample_info">
                                        <thead>
                                            <tr role="row">
                                                <th width="167" colspan="1" rowspan="1" class="sorting_disabled" style="width: 169px;" role="columnheader" aria-label="Username">SL.</th>
                                                <th width="267" colspan="1" rowspan="1" class="sorting" style="width: 265px;" role="columnheader" tabindex="0" aria-controls="editable-sample" aria-label="Full Name: activate to sort column ascending">Category Name</th>
                                                <th class="center hidden-phone" width="82" colspan="1" rowspan="1" class="sorting" style="width: 82px;" role="columnheader" tabindex="0" aria-controls="editable-sample" aria-label="Edit: activate to sort column ascending">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody role="alert" aria-live="polite" aria-relevant="all">

                                            <?php
                                            $i = 1;
                                            $allcat_q = $cls_category->get_all_cat();
                                            while ($allcat_view = $allcat_q->fetch_assoc()) {
                                                ?>  
                                                <tr class="even">
                                                    <td class=" sorting_1"><?php echo $i++; ?></td>
                                                    <td class=" "> <?php echo $allcat_view['cat_name']; ?></td>
                                                    <td class="center hidden-phone"><a class="btn btn-primary" href="categoryEdit/cat_id/<?php echo $allcat_view ['id'] ?>">Edit</a></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>  
                                        </tbody></table>
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