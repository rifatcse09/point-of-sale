<?php
	session_start();
	require_once('functions/cls_dbconfig.php');
	function __autoload($classname){
		require_once("functions/$classname.class.php");
	}
	
	$user_id = $_SESSION['user_id'];
	
    $invoice_id = $_GET['invoice'];
    $cls_sales = new cls_sales();
    $cls_store = new cls_store();
    $cls_customer = new cls_customer();
    //store info//
    $query = $cls_store->viewstore($user_id);
    $row = $query->fetch_assoc();

    $invd_q = $cls_sales->invoice_details($invoice_id);
    $invd_row1 = $invd_q->fetch_assoc();
    $cashier = $invd_row1['name'];
?>
<base href="http://localhost/pos/">
    <link href="css/bootstrap.min2.css" rel="stylesheet" type="text/css" />
     <!--invoice print-->
      <style>
              .font_sml{ font-size:11px;}
          .table_tr_td {
            border-top: 1px solid #dddddd;
            line-height: 1.42857;
            padding: 7px;
            vertical-align: top;
        }
              </style>
      <div class="row">
        <div class="col-md-3" style="!border:1px dashed #333;">
          <div class="block-web">
           <div class="header">
              <div style="width:100%;height:auto;border-bottom:1px dashed #000;padding:5px; padding-bottom:10px;text-align:center;font-size:11px;">

                  <img src="images/logo.png" alt="" height="50" width="50" style="border-radius: 30px;">
                  <br>
                  <?php echo $row['company_name']; ?><br><?php echo $row['address']; ?>
              </div>
               <h6 class="content-header font_sml"><strong>VAT REG NO. :</strong> <?php echo $row['vat_reg_no']; ?></h6>
               <h6 class="content-header font_sml"><strong>VAT AREA CODE :</strong> <?php echo $row['vat_area_code']; ?></h6>
               <div align="center" style="border-bottom:1px dashed #333;font-size:11px;">RETAIL INVOICE</div>
              <h6 class="content-header font_sml"><strong>Cashier :</strong> <?php echo $cashier; ?></h6>
              <h6 class="content-header font_sml"><strong>Invoice Number :</strong> <?php echo $invoice_id; ?>&nbsp;&nbsp;&nbsp;Date: <?php echo $invd_row1['saved_date']; ?></h6>
              <div style="border-bottom:1px dashed #333;"></div>
            </div>
         <div class="porlets-content">
            <div class="table-responsive">
                <table class="table table-hover font_sml">
                  <thead>
                    <tr>
                      <th>SL</th>
                      <th>Item Description</th>
                      <th>Size</th>
                      <th>MRP</th>
                      <th>Qty</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php
                    $sl = 1;
                    $invd_q = $cls_sales->invoice_details($invoice_id);
                    while($invd_row = $invd_q->fetch_assoc())
                    {
                        $sub_total = $invd_row['sub_total'];
                        $discount = $invd_row['discount'];
                        $total_vat = $invd_row['total_vat'];
                       // $rounding = $invd_row['rounding'];
                        $g_total = $invd_row['g_total'];
                        $paid_total = $invd_row['payed_total'];
                        $due_amount = $invd_row['due_amount'];
                        $qnty = $invd_row['qnty'];
                        $tra_date = $invd_row['tra_date'];
                        $cashier = $invd_row['name'];
                        $custid = $invd_row['cus_id'];
                        
                        //get cust//
                        $cust_q = $cls_customer->viewCusbyid($custid);
                        $cus_row = $cust_q->fetch_assoc();
                            
                        $ttl_dis = $qnty * $discount;
?>
                    <tr class="">
                      <td><?php if($sl < 10) { echo '0'; echo $sl++;} ?></td>
                      <td><?php echo $invd_row['item_name']; ?></td>
                      <td><?php echo $invd_row['size']; ?></td>
                      <td><?php echo number_format($invd_row['price'], 2, '.', ','); ?></td>
                      <td><?php echo $qnty; ?></td>
                      <td style="text-align:right;"><?php echo number_format($invd_row['total_price'], 2, '.', ','); ?></td> 
                    </tr>
                    <?php
                    }
?>
               <tr class="">
                      <td colspan="3" align="right" style="height:12px;">Sub Total:</td>
                      <td></td>
                      <td></td>
                      <td align="right"><?php echo number_format($sub_total, 2, '.', ','); ?></td>
                    </tr>
                    <tr class="">
                      <td colspan="3" align="right">(+) VAT:</td>
                       <td></td>
                       <td></td>
                      <td align="right"><?php echo $total_vat; ?></td>
                    </tr>
                    <tr class="">
                      <td colspan="3" align="right">(-) Discount:</td>
                       <td></td>
                       <td></td>
                      <td align="right"><?php echo $discount; ?></td>
                    </tr>
                     <tr class="">
                      <td colspan="3" align="right">(+/-) Rounding:</td>
                       <td></td>
                       <td></td>
                      <td align="right"><?php //echo $rounding; ?></td>
                    </tr>
                    <tr class="">
                      <td colspan="3" align="right">Net Payable:</td>
                       <td></td>
                       <td></td>
                      <td align="right"><?php echo number_format($g_total, 2, '.', ','); ?></td>
                    </tr>
                    <?php
                        $pay_q = $cls_sales->getpayment_type($invoice_id, $tra_date);
                        while($pay_row = $pay_q->fetch_assoc())
                        {
                            $cash_paid = $pay_row['amount'] + $pay_row['return_amt'];
                    ?>
                    <tr class=""> 
                      <td colspan="3" align="right"><?php echo $pay_row['payment_type']; ?> Paid:</td>
                       <td></td>
                       <td></td>
                      <td align="right"><?php echo number_format($pay_row['amount'], 2, '.', ','); ?></td>
                    </tr>
                    <?php if($pay_row['return_amt'] > 0.00)
                    {
                        ?>
                    <tr class=""> 
                      <td colspan="3" align="right">Return Amount:</td>
                       <td></td>
                      <td align="right"><?php echo number_format($pay_row['return_amt'], 2, '.', ','); ?></td>
                    </tr>
                   <?php } } if($due_amount != "0.00") { ?>
                    <tr class="">
                      <td colspan="3" align="right">Due:</td>
                       <td></td>
                      <td><?php echo $due_amount; ?></td>
                    </tr>
                    <tr class="">
                      <td colspan="3" align="right">Customer:</td>
                      <td></td>
                      <td><?php echo $cus_row['cus_name']; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
                </table>
                <br>
                <?php if($discount != "0")
                        {
                ?>
                <div style="!height:50%;font-size:11px; widht:100%; border-top:1px dashed #333;border-bottom:1px dashed #222;padding:5px;">** DISCOUNT ITEMS **</div><br>
                <!--price-->
                <table class="table table-hover font_sml">
                  <tbody>
                   <?php
                        $sl1 = 1;
                        $dis_q = $cls_sales->getdiscount($invoice_id);
                        while($dis_row = $dis_q->fetch_assoc())
                        {
                            
                            if($dis_row['t_discount'] != "0")
                            {
                    ?>
                    <tr class="gradeC">
                      <td><?php if($sl < 10) { echo '0';} echo $sl1++; ?></td>
                      <td><?php echo $dis_row['item_name']; ?></td>
                      <td colspan=""></td>
                      <td colspan="2"></td>
                      <td colspan="2"></td>
                      <td  align="right"><?php echo number_format($dis_row['t_discount'], 2, '.', ','); ?></td>
                    </tr>
                    <?php
                            }
                        }
                    ?>
                    <tr>
                      <td colspan="2">Your total Savings today TK.</td>
                      <td colspan=""></td>
                      <td colspan="2"></td>
                      <td colspan="2"></td>
                      <td align="right"><?php echo $discount; ?></td>
                    </tr>

                  </tbody>
                </table>
                <?php } ?>
                <!--price end-->
                <div style="width:100%;margin-top:20px;!border:1px solid #333;font-size:11px;">
                    Thank u for shopping with <?php echo $row['company_name']; ?><br>
                    For any query, Please call<br>
                    <?php echo $row['phone'] .', '.$row['mobile']; ?><br>
                   <span style="text-align:center;">Please visit: <a href="<?php echo $row['website']; ?>" target="_blank"><?php echo $row['website']; ?></a></span><br>
                    Goods once sold can't be return.<br>
                    
                    Powered by: <a href="http://www.mdrifatul.info" target="_blank">MD Rifatul.</a>
                </div>
              </div><!--/table-responsive-->
            </div><!--/porlets-content-->
            
            
          </div><!--/block-web--> 
        </div><!--/col-md-12--> 
      </div><!--/row-->
      <!--inovice print-->