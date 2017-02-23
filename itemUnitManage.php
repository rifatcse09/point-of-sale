<?php require_once("include/header.php"); ?>
<div class="contentpanel">
    <!--\\\\\\\ contentpanel start\\\\\\-->
    <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
            <h1>Items</h1>
            <h2 class="">Item Unit List</h2>
        </div>
        <div class="pull-right">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">Item</a></li>
                <li class="active">Item unit</li>
            </ol>
        </div>
    </div>
    <div class="container clear_both padding_fix">
        <section class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="block-web">
                            <div class="header">
                                <div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a> <a class="refresh" href="#"><i class="fa fa-repeat"></i></a> <a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
                                <h3 class="content-header">Unit List</h3>
                            </div>
                            <div class="porlets-content">
                                <div class="table-responsive">
                                   <div id="result">
                                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Unit Name</th>
                                                <th   class="center hidden-phone">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sl = 1;
                                            $itemunit = $cls_itemunit->get_all();
                                            while ($unit_list = $itemunit->fetch_assoc()) {
                                                ?>
                                                <tr class="gradeX">
                                                    <td><?php if($sl < 10) { echo "0"; } echo $sl++; ?></td>
                                                    <td><?php echo $unit_list['name'] ?></td>
                                                    <td class="center hidden-phone">
                                                        <a class="btn btn-primary" href="itemUnitEdit/unit/<?php echo $unit_list['id'] ?>">Edit</a>
<!--                                                        <a class="btn btn-primary" href="#">Active</a>-->
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Unit Name</th>
                                                <th  class="center hidden-phone">Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    </div>
                                </div><!--/table-responsive-->
                            </div><!--/porlets-content-->
                        </div><!--/block-web--> 
                    </div><!--/col-md-12--> 
                </div><!--/row-->

            </div>
        </section>
    </div>
</div>
<!--\\\\\\\ content panel end \\\\\\-->

<?php require_once("include/footer.php"); ?>