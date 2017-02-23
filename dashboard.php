<?php 
    require_once("include/header.php");
/*today sale query*/
if($user_type == "admin")
{
    $today_q = $cls_sales->today_sale_count();
	$total_sale_q = $cls_sales->total_sale_count();
    // $total_sale_q = $cls_sales->total_sale_count_admin();
	//$total_sale_row = $total_sale_q->fetch_assoc();
    
    $total_pur_q = $cls_purchase->total_pur_count_admin();
	$total_pur_row = $total_pur_q->fetch_assoc();
    
} else {
    $today_q = $cls_sales->today_sale_count($user_id);
    $total_sale_q = $cls_sales->total_sale_count($user_id);
    
    $today_sales_item = $cls_sales->today_sale_item($user_id);
    $today_item_sale_row = $today_sales_item->fetch_assoc();    
    
	
	$total_sales_item = $cls_sales->total_sale_item_user($user_id);
    $total_item_sale_row = $total_sales_item->fetch_assoc();
}

    $today_row = $today_q->fetch_assoc();
    $total_sale_row = $total_sale_q->fetch_assoc();
	
	

/*end*/

?>
    <div class="contentpanel">
      <!--\\\\\\\ contentpanel start\\\\\\-->
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>Dashboard</h1>
          <h2 class="">Subtitle goes here...</h2>
        </div>
        <div class="pull-right">
          <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="dashboard">DASHBOARD</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </div>
      </div>
      <div class="container clear_both padding_fix">
        <!--\\\\\\\ container  start \\\\\\-->
        <div class="row">
          <div class="col-sm-3 col-sm-6">
            <div class="information green_info">   
              <div class="information_inner">
              	<div class="info green_symbols"><i class="fa fa-users icon"></i></div>
                <span>TODAY SALES </span>
                <h2 class="bolded"><?php echo number_format($today_row['today_sale']).'/='; ?></h2>
                <div class="infoprogress_green">
                  <div class="greenprogress"></div>
                </div>
                <b class=""><small>Better than yesterday ( 7,5% )</small></b>
                <div class="pull-right" id="work-progress1">
                  <canvas style="display: inline-block; width: 47px; height: 25px; vertical-align: top;" width="47" height="25"></canvas>
                </div>
              </div>
            </div>
          </div>
           <?php
    if($user_type == "admin")
    {
?>
          <div class="col-sm-3 col-sm-6">
            <div class="information green_info">   
              <div class="information_inner">
              	<div class="info green_symbols"><i class="fa fa-users icon"></i></div>
                <span>TOTAL SALES </span>
                <h2 class="bolded"><?php echo number_format($total_sale_row['total_sale']).'/='; ?></h2>
                <div class="infoprogress_green">
                  <div class="greenprogress"></div>
                </div>
                <b class=""><small>Better than yesterday ( 7,5% )</small></b>
                <div class="pull-right" id="work-progress1">
                  <canvas style="display: inline-block; width: 47px; height: 25px; vertical-align: top;" width="47" height="25"></canvas>
                </div>
              </div>
            </div>
          </div>
          <?php
    }
    if($user_type == "employee")
    {
?>
          <div class="col-sm-3 col-sm-6">
            <div class="information blue_info">
              <div class="information_inner">
              <div class="info blue_symbols"><i class="fa fa-shopping-cart icon"></i></div>
                <span>TODAY SALES ITEMS</span>
                <h1 class="bolded"><?php echo $today_item_sale_row['today_item']?> </h1>
                <div class="infoprogress_blue">
                  <div class="blueprogress"></div>
                </div>
                <b class=""><small>Better than yesterday ( 7,5% )</small></b>
                <div class="pull-right" id="work-progress2">
                  <canvas style="display: inline-block; width: 47px; height: 25px; vertical-align: top;" width="47" height="25"></canvas>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-sm-3 col-sm-6">
            <div class="information blue_info">
              <div class="information_inner">
              <div class="info blue_symbols"><i class="fa fa-shopping-cart icon"></i></div>
                <span>TOTAL SALES ITEMS</span>
                <h1 class="bolded"><?php echo $total_item_sale_row['total_item']?> </h1>
                <div class="infoprogress_blue">
                  <div class="blueprogress"></div>
                </div>
                <b class=""><small>Better than yesterday ( 7,5% )</small></b>
                <div class="pull-right" id="work-progress2">
                  <canvas style="display: inline-block; width: 47px; height: 25px; vertical-align: top;" width="47" height="25"></canvas>
                </div>
              </div>
            </div>
          </div>
          
          <?php } if($user_type == "admin") { ?>
          <div class="col-sm-3 col-sm-6">
            <div class="information red_info">
              <div class="information_inner">
              <div class="info red_symbols"><i class="fa fa-comments icon"></i></div>
                <span>TOTAL PURCHASE</span>
                <h2 class="bolded"><?php echo number_format($total_pur_row['total_purchase']).'/='; ?></h2>
                <div class="infoprogress_red">
                  <div class="redprogress"></div>
                </div>
                <b class=""><small>Better than yesterday ( 7,5% )</small></b>
                <div class="pull-right" id="work-progress3">
                  <canvas style="display: inline-block; width: 47px; height: 25px; vertical-align: top;" width="47" height="25"></canvas>
                </div>
              </div>
            </div>
          </div>
          <?php } if($user_type == "employee") { ?>
          <div class="col-sm-3 col-sm-6">
            <div class="information green_info">   
              <div class="information_inner">
              	<div class="info green_symbols"><i class="fa fa-users icon"></i></div>
                <span>TOTAL SALES </span>
                <h2 class="bolded"><?php echo number_format($total_sale_row['total_sale']).'/='; ?></h2>
                <div class="infoprogress_green">
                  <div class="greenprogress"></div>
                </div>
                <b class=""><small>Better than yesterday ( 7,5% )</small></b>
                <div class="pull-right" id="work-progress1">
                  <canvas style="display: inline-block; width: 47px; height: 25px; vertical-align: top;" width="47" height="25"></canvas>
                </div>
              </div>
            </div>
          </div> <?php } ?>
        </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="block-web">
                            <div class="header">
                                <div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a> <a class="refresh" href="#"><i class="fa fa-repeat"></i></a> <a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
                                <h3 class="content-header">Item Low Stock Limit</h3>
                            </div>
                            <div class="porlets-content">
                                <div style="overflow:auto; height:400px;" class="table-responsive">
                                   <div id="result">
                                    <table class="display table table-bordered table-striped" id="dynamic-table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Item Name</th>
                                                <th>Item Code</th>
                                                <th>Size</th>
                                                <th>Unit</th>
												<th>Stock</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $item = $cls_stock->low_stock();
											$i = 1;
                                            $alerm=0;
                                            while ($item_list = $item->fetch_assoc()) {
                                                $alerm++;
                                                if($alerm == 1){ ?>
                                                <script>
                                                    var audio = new Audio('alert_tone/dingadongb_ho18zrjk.mp3');
                                                    audio.play();
                                                </script>
                                                <?php  } ?>
                                                <tr class="gradeX">
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo $item_list['item_name'] ?></td>
                                                    <td><?php echo $item_list['item_code'] ?></td>
                                                    <td><?php echo $item_list['size'] ?></td>
                                                    <td><?php echo $item_list['unit'] ?></td>
													<td style="color:red;"><?php echo $item_list['available_stock']; ?></td>
                                                </tr>     
                                            <?php } ?>
                                        </tbody>
                                       
                                    </table>
                                    </div>
                                </div><!--/table-responsive-->
                            </div><!--/porlets-content-->
                        </div><!--/block-web--> 
                    </div><!--/col-md-12--> 
                </div><!--/row-->

    
        
        <div class="row">
          <div class="col-md-12">
            <div class="block-web">
              <div class="header">
                <h3 class="content-header">Graph</h3>
              </div>
              <div class="porlets-content">
                <div id="graph"></div>
              </div>
              <!--/porlets-content-->
            </div>
            <!--/block-web-->
          </div>
          <!--/col-md-12-->
        </div>
        <!--/row-->
        
        
        
        
     <div class="row">
          <div class="col-md-6">
            <div class="multi-stat-box">
              <div class="header">
                <div class="left">
                  <h2>Pageviews</h2>
                  <a><i class="fa fa-chevron-down"></i> </a> </div>
                <div class="right">
                  <h2>NOV 14 - DEC 15</h2>
                  <div class="percent"><i class="fa fa-angle-double-down"></i> 34%</div>
                </div>
              </div>
              <div class="content">
                <div class="left">
                  <ul>
                    <li> <span class="date">Overall</span> <span class="value">1,104</span> </li>
                    <li class="active"> <span class="date">This week</span> <span class="value">486</span> </li>
                    <li> <span class="date">Yesterday</span> <span class="value">364</span> </li>
                    <li> <span class="date">Today</span> <span class="value">254</span> </li>
                  </ul>
                </div>
                <div class="right">
                  <div class="sparkline" data-type="line" data-resize="true" data-height="130" data-width="90%" data-line-width="1" data-line-color="#ddd" data-spot-color="#ccc" data-fill-color="" data-highlight-line-color="#ddd" data-spot-radius="4" data-data="[200,135,667,333,526,996,564,123,890,564,455,150,530,140]"></div>
                  <div class="ticket-lebel">SUN</div>
                  <div class="ticket-lebel">MON</div>
                  <div class="ticket-lebel">TUE</div>
                  <div class="ticket-lebel">WED</div>
                  <div class="ticket-lebel">THR</div>
                  <div class="ticket-lebel">FRI</div>
                  <div class="ticket-lebel">SAT</div>
                  <div class="ticket-lebel">SUN</div>
                </div>
              </div>
            </div>
            <br/>
            <div class="panel">
              <div class="panel-body">
                <div class="chart">
                  <div class="heading"> <span>June</span> <strong>15 Days | 57%</strong> </div>
                  <div id="barchart"></div>
                </div>
              </div>
              <div class="chart-tittle"> <span class="title text-muted">Total Earning</span> <span class="value-pie text-muted">$, 87,34,577</span> </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h4>Jaguar 'E' Type vehicles in the UK</h4>
              </div>
              <div class="panel-body">
                <div id="hero-graph" class="graph"></div>
              </div>
            </div>
          </div>
        </div>   
        
        
        
        	
        <div class="row">
          <div class="col-md-4 ">
            <div class="block-web green-bg-color">
              <h3 class="content-header ">Most Important Task</h3>
              <div class="porlets-content">
                <ul class="list-group task-list no-margin collapse in">
                  <li class="list-group-item green-light-bg-color">
                    <label class="label-checkbox inline">
                    <input type="checkbox" checked="" class="task-finish">
                    <span class="custom-checkbox"></span> </label>
                    New frontend layout <span class="pull-right"> <a class="task-del" href="#"><i class="fa fa-times"></i></a> </span> </li>
                  <li class="list-group-item">
                    <label class="label-checkbox inline">
                    <input type="checkbox" class="task-finish">
                    <span class="custom-checkbox"></span> </label>
                    Windows Phone App <span class="pull-right"> <a class="task-del" href="#"><i class="fa fa-times"></i></a> </span> </li>
                  <li class="list-group-item">
                    <label class="label-checkbox inline">
                    <input type="checkbox" class="task-finish">
                    <span class="custom-checkbox"></span> </label>
                    Mobile Development <span class="pull-right"> <a class="task-del" href="#"><i class="fa fa-times"></i></a> </span> </li>
                  <li class="list-group-item">
                    <label class="label-checkbox inline">
                    <input type="checkbox" class="task-finish">
                    <span class="custom-checkbox"></span> </label>
                    SEO Optimisation <span class="label label-warning m-left-xs">1:30PM</span> <span class="pull-right"> <a class="task-del" href="#"><i class="fa fa-times"></i></a> </span> </li>
                  <li class="list-group-item">
                    <label class="label-checkbox inline">
                    <input type="checkbox" class="task-finish">
                    <span class="custom-checkbox"></span> </label>
                    Windows Phone App <span class="pull-right"> <a class="task-del" href="#"><i class="fa fa-times"></i></a> </span> </li>
                  <li class="list-group-item">
                    <label class="label-checkbox inline">
                    <input type="checkbox" class="task-finish">
                    <span class="custom-checkbox"></span> </label>
                    Bug Fixes <span class="label label-danger m-left-xs">4:40PM</span> <span class="pull-right"> <a class="task-del" href="#"><i class="fa fa-times"></i></a> </span> </li>
                  <form class="form-inline margin-top-10" role="form">
                    <input type="text" class="form-control" placeholder="Enter tasks here...">
                    <button class="btn btn-default btn-warning pull-right" type="submit"><i class="fa fa-plus"></i> Add Task</button>
                  </form>
                </ul>
                <!-- /list-group -->
              </div>
              <!--/porlets-content-->
            </div>
            <!--/block-web-->
          </div>
          <!--/col-md-4-->
          <div class="col-md-4 ">
            <div class="block-web">
              <h3 class="content-header">Note</h3>
              <div class="block widget-notes">
                <div contenteditable="true" class="paper"> Send e-mail to supplier<br>
                  <s>Conference at 4 pm.</s><br>
                  <s>Order a pizza</s><br>
                  <s>Buy flowers</s><br>
                  Buy some coffee.<br>
                  Dinner at Plaza.<br>
                  Take Alex for walk.<br>
                  Buy some coffee.<br>
                </div>
              </div>
              <!--/widget-notes-->
            </div>
            <!--/block-web-->
          </div>
          <!--/col-md-4 -->
          <div class="col-md-4 ">
            <div class="kalendar"></div>
            <div class="list-group"> <a class="list-group-item" href="#"> <span class="badge bg-danger">7:50</span> Consectetuer </a> <a class="list-group-item" href="#"> <span class="badge bg-success">10:30</span> Lorem ipsum dolor sit amet </a> <a class="list-group-item" href="#"> <span class="badge bg-light">11:40</span> Consectetuer adipiscing </a> </div>
            <!--/calendar end-->
          </div>
          <!--/col-md-4 end-->
        </div>
        <!--/row end-->
        
        
        
        
        
         <!--row start-->
        <div class="row">        
          <div class="col-md-8">
        <div class="block-web">
          <h3 class="content-header"> Quick Stats
            <div class="button-group pull-right" data-toggle="buttons"> <a href="javascript:;" class="btn active border-gray right-margin"> <span class="button-content">
              
              Top this week </span> </a> <a href="javascript:;" class="btn border-gray right-margin"> <span class="button-content">
          
              Refering </span> </a> <a href="javascript:;" class="btn border-gray"> <span class="button-content">
             
              Others </span> </a> 
            </div><!--/button-group-->
          </h3>
          <div class="custom-bar-chart">
            <ul class="y-axis">
              <li><span>100</span></li>
              <li><span>80</span></li>
              <li><span>60</span></li>
              <li><span>40</span></li>
              <li><span>20</span></li>
              <li><span>0</span></li>
            </ul>
            <div class="bar">
              <div class="value tooltips" data-original-title="30%" data-toggle="tooltip" data-placement="top">30%</div>
              <div class="title">Jan</div>
            </div><!--/bar-->
            <div class="bar">
              <div class="value tooltips bar-bg-color" data-original-title="50%" data-toggle="tooltip" data-placement="top">50%</div>
              <div class="title">Fab</div>
            </div><!--/bar-->
            <div class="bar ">
              <div class="value tooltips" data-original-title="40%" data-toggle="tooltip" data-placement="top">40%</div>
              <div class="title">Mar</div>
            </div><!--/bar-->
            <div class="bar ">
              <div class="value tooltips" data-original-title="80%" data-toggle="tooltip" data-placement="top">80%</div>
              <div class="title">Apr</div>
            </div><!--/bar-->
            <div class="bar">
              <div class="value tooltips bar-bg-color" data-original-title="70%" data-toggle="tooltip" data-placement="top">70%</div>
              <div class="title">May</div>
            </div><!--/bar-->
            <div class="bar ">
              <div class="value tooltips" data-original-title="50%" data-toggle="tooltip" data-placement="top">50%</div>
              <div class="title">Jun</div>
            </div><!--/bar-->
            <div class="bar">
              <div class="value tooltips" data-original-title="40%" data-toggle="tooltip" data-placement="top">40%</div>
              <div class="title">Jul</div>
            </div><!--/bar-->
            <div class="bar">
              <div class="value tooltips" data-original-title="35%" data-toggle="tooltip" data-placement="top">35%</div>
              <div class="title">Aug</div>
            </div><!--/bar-->
            
            <div class="bar ">
              <div class="value tooltips" data-original-title="80%" data-toggle="tooltip" data-placement="top">80%</div>
              <div class="title">Sep</div>
            </div><!--/bar-->
            <div class="bar">
              <div class="value tooltips bar-bg-color" data-original-title="70%" data-toggle="tooltip" data-placement="top">70%</div>
              <div class="title">Oct</div>
            </div><!--/bar-->
            <div class="bar ">
              <div class="value tooltips" data-original-title="50%" data-toggle="tooltip" data-placement="top">50%</div>
              <div class="title">Nov</div>
            </div><!--/bar-->
            <div class="bar">
              <div class="value tooltips" data-original-title="40%" data-toggle="tooltip" data-placement="top">40%</div>
              <div class="title">Dec</div>
            </div><!--/bar-->

            
          </div>
          <!--/custom-bar-chart-->
        </div><!--/block-web-->
      </div><!--/col-md-8-->
      
        <div class="col-md-4">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h4>Donut flavours</h4>
              </div>
              <div class="panel-body">
                <div id="hero-donut" class="graph"></div>
              </div>
            </div>
          </div>
      
      
      
        </div>
        <!--row end--> 
 
        
      </div>
      <!--\\\\\\\ container  end \\\\\\-->
    </div>
    <!--\\\\\\\ content panel end \\\\\\-->
  </div>
  <!--\\\\\\\ inner end\\\\\\-->
</div>
<!--\\\\\\\ wrapper end\\\\\\-->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Compose New Task</h4>
      </div>
      <div class="modal-body"> content </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<!-- sidebar chats -->
<nav class="atm-spmenu atm-spmenu-vertical atm-spmenu-right side-chat">
	<div class="header">
    <input type="text" class="form-control chat-search" placeholder=" Search">
  </div>
  <div href="#" class="sub-header">
    <div class="icon"><i class="fa fa-user"></i></div> <p>Online (4)</p>
  </div>
  <div class="content">
    <p class="title">Family</p>
    <ul class="nav nav-pills nav-stacked contacts">
      <li class="online"><a href="#"><i class="fa fa-circle-o"></i> Steven Smith</a></li>
      <li class="online"><a href="#"><i class="fa fa-circle-o"></i> John Doe</a></li>
      <li class="online"><a href="#"><i class="fa fa-circle-o"></i> Michael Smith</a></li>
      <li class="busy"><a href="#"><i class="fa fa-circle-o"></i> Chris Rogers</a></li>
    </ul>
    
    <p class="title">Friends</p>
    <ul class="nav nav-pills nav-stacked contacts">
      <li class="online"><a href="#"><i class="fa fa-circle-o"></i> Vernon Philander</a></li>
      <li class="outside"><a href="#"><i class="fa fa-circle-o"></i> Kyle Abbott</a></li>
      <li><a href="#"><i class="fa fa-circle-o"></i> Dean Elgar</a></li>
    </ul>   
    
    <p class="title">Work</p>
    <ul class="nav nav-pills nav-stacked contacts">
      <li><a href="#"><i class="fa fa-circle-o"></i> Dale Steyn</a></li>
      <li><a href="#"><i class="fa fa-circle-o"></i> Morne Morkel</a></li>
    </ul>
    
  </div>
  <div id="chat-box">
    <div class="header">
      <span>Richard Avedon</span>
      <a class="close"><i class="fa fa-times"></i></a>    </div>
    <div class="messages nano nscroller has-scrollbar">
      <div class="content" tabindex="0" style="right: -17px;">
        <ul class="conversation">
          <li class="odd">
            <p>Hi John, how are you?</p>
          </li>
          <li class="text-right">
            <p>Hello I am also fine</p>
          </li>
          <li class="odd">
            <p>Tell me what about you?</p>
          </li>
          <li class="text-right">
            <p>Sorry, I'm late... see you</p>
          </li>
          <li class="odd unread">
            <p>OK, call me later...</p>
          </li>
        </ul>
      </div>
    <div class="pane" style="display: none;"><div class="slider" style="height: 20px; top: 0px;"></div></div></div>
    <div class="chat-input">
      <div class="input-group">
        <input type="text" placeholder="Enter a message..." class="form-control">
        <span class="input-group-btn">
        <button class="btn btn-danger" type="button">Send</button>
        </span>      </div>
    </div>
  </div>
</nav>
<!-- /sidebar chats -->   














<!-- sidebar chats -->
<nav class="atm-spmenu atm-spmenu-vertical atm-spmenu-right side-chat">
	<div class="header">
    <input type="text" class="form-control chat-search" placeholder=" Search">
  </div>
  <div href="#" class="sub-header">
    <div class="icon"><i class="fa fa-user"></i></div> <p>Online (4)</p>
  </div>
  <div class="content">
    <p class="title">Family</p>
    <ul class="nav nav-pills nav-stacked contacts">
      <li class="online"><a href="#"><i class="fa fa-circle-o"></i> Steven Smith</a></li>
      <li class="online"><a href="#"><i class="fa fa-circle-o"></i> John Doe</a></li>
      <li class="online"><a href="#"><i class="fa fa-circle-o"></i> Michael Smith</a></li>
      <li class="busy"><a href="#"><i class="fa fa-circle-o"></i> Chris Rogers</a></li>
    </ul>
    
    <p class="title">Friends</p>
    <ul class="nav nav-pills nav-stacked contacts">
      <li class="online"><a href="#"><i class="fa fa-circle-o"></i> Vernon Philander</a></li>
      <li class="outside"><a href="#"><i class="fa fa-circle-o"></i> Kyle Abbott</a></li>
      <li><a href="#"><i class="fa fa-circle-o"></i> Dean Elgar</a></li>
    </ul>   
    
    <p class="title">Work</p>
    <ul class="nav nav-pills nav-stacked contacts">
      <li><a href="#"><i class="fa fa-circle-o"></i> Dale Steyn</a></li>
      <li><a href="#"><i class="fa fa-circle-o"></i> Morne Morkel</a></li>
    </ul>
    
  </div>
  <div id="chat-box">
    <div class="header">
      <span>Richard Avedon</span>
      <a class="close"><i class="fa fa-times"></i></a>    </div>
    <div class="messages nano nscroller has-scrollbar">
      <div class="content" tabindex="0" style="right: -17px;">
        <ul class="conversation">
          <li class="odd">
            <p>Hi John, how are you?</p>
          </li>
          <li class="text-right">
            <p>Hello I am also fine</p>
          </li>
          <li class="odd">
            <p>Tell me what about you?</p>
          </li>
          <li class="text-right">
            <p>Sorry, I'm late... see you</p>
          </li>
          <li class="odd unread">
            <p>OK, call me later...</p>
          </li>
        </ul>
      </div>
    <div class="pane" style="display: none;"><div class="slider" style="height: 20px; top: 0px;"></div></div></div>
    <div class="chat-input">
      <div class="input-group">
        <input type="text" placeholder="Enter a message..." class="form-control">
        <span class="input-group-btn">
        <button class="btn btn-danger" type="button">Send</button>
        </span>      </div>
    </div>
  </div>
</nav>
<!-- /sidebar chats -->

   <script src="js/jquery-2.1.0.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/common-script.js"></script>
   
<script src="js/jquery.slimscroll.min.js"></script>
<script src="js/jquery.sparkline.js"></script>
<script src="js/sparkline-chart.js"></script>
<script src="js/graph.js"></script>
<script src="js/edit-graph.js"></script>


<script src="plugins/kalendar/kalendar.js" type="text/javascript"></script>
<script src="plugins/kalendar/edit-kalendar.js" type="text/javascript"></script>

<!--for chart-->
<script src="plugins/sparkline/jquery.sparkline.js" type="text/javascript"></script>
<script src="plugins/sparkline/jquery.customSelect.min.js" ></script> 
<script src="plugins/sparkline/sparkline-chart.js"></script> 
<script src="plugins/sparkline/easy-pie-chart.js"></script>

<script>
/*refresh*/
    $('.refresh').click(function(e){
      var h = $(this).parents(".header");
      var p = h.parent();
      var loading = $('<div class="loading"><i class="fa fa-refresh fa-spin"></i></div>');
      
      loading.appendTo(p);
      loading.fadeIn();
      setTimeout(function() {
        loading.fadeOut();
      }, 1000);
      
      e.preventDefault();
    });
    
    /*refresh end*/
</script>

<script src="plugins/morris/morris.min.js" type="text/javascript"></script> 
<script src="plugins/morris/raphael-min.js" type="text/javascript"></script>  
<script src="plugins/morris/morris-script.js"></script> 

<script src="js/jPushMenu.js"></script> 
<script src="js/side-chats.js"></script>
<script src="js/jquery.slimscroll.min.js"></script>
<script src="plugins/scroll/jquery.nanoscroller.js"></script>

<!--chart end-->


<?php //require_once("include/footer.php"); ?>
