<?php
class cls_sales {

    //purchase insert//
    public function sale_insert(
	$user_id, $resulttt, $cus_id, $inovice_num, $sale_total_price, $total_vat, $total_discount, $rounding_amt,
	$sale_net_payable, $pay_type1,  $trans_num1, $trans_amt1, $pay_type2,
	$trans_num2, $trans_amt2, $return_amt, $sale_amt_due) {
        
        if($return_amt > 0)
        {
            $trans_amt1 = $sale_net_payable;
        }
        
    $cls_datetime = new cls_datetime();
    $datetime = $cls_datetime->datetime();
    //$date = date("ymd");
    $invoice = $inovice_num;
    //$invoice = rand();

    $sales_date = $cls_datetime->exat_date();
    $payed_total = $trans_amt1 + $trans_amt2;
	$status=null;
    //$invoice = date('Ymd').time();
    // DB::con()->beginTransaction();
	 
        foreach($resulttt as $values)
			{
				$vat_result = DB::query("select vat FROM tbl_company_info limit 1");
				$vat = $vat_result->fetch_assoc();
				//$data  = "'" . implode("','", $values) . "'";
				//$data  = $data.",'$supplier_id', '$pur_ID', '$inovice_num', '$pur_date', '$user_id', '$datetime''";
	            $item_vat = ($vat['vat']*$values[2])/100;
				$resultt = DB::query("insert into tbl_sales(invoice_id, item_id, qnty, price, total_price, discount, saved_by, saved_date, sales_date,vat) values 
				('$invoice','$values[0]', '$values[1]', '$values[2]', '$values[4]', '$values[3]', '$user_id', '$datetime', '$sales_date','$item_vat')");
        
		/*adjust stock*/
		$item_id =  $values[0];
		$item_qty =  $values[1];		
		$resultt = DB::query("update tbl_stock set available_stock = (available_stock - $item_qty) where item_id = '$item_id'");
          
        }
		if($sale_amt_due>'0.00')
		{
			$status = 'Due';
		}
		else{
			$status = 'Paid';
		}
		   
		     $resultt = DB::query("
				insert into tbl_sales_transaction (
					invoice_id,
					cus_id,
					sub_total, 
					discount, 
					total_vat,
                    rounding,
					g_total, 
					payed_total,
					due_amount,
					remarks,
					saved_by,
                    tra_date,
					saved_date,
					invoice_status
				) values(
					'$invoice', 
					'$cus_id', 
					'$sale_total_price', 
					'$total_discount', 
					'$total_vat',
                    '$rounding_amt',
					'$sale_net_payable', 
					'$payed_total',
					'$sale_amt_due',
					'Sales',
					'$user_id',
                    '$sales_date',
					'$datetime',
					'$status'
				)
			 ");
			 
			 if($pay_type1 != "")
			 {
			   $resultt = DB::query("
				insert into tbl_sales_payment (
					invoice_id,
					cus_id,
					payment_type, 
					transc_no, 
					amount,
                    return_amt,
					pay_date, 
					saved_by, 
					saved_date
				) values(
					'$invoice', 
					'$cus_id', 
					'$pay_type1', 
					'$trans_num1', 
					'$trans_amt1',
                    '$return_amt',
					'$sales_date',
					'$user_id',
					'$datetime'
				)
			 ");
			 }
			 if($pay_type2 != "")
			 {
			   $resultt = DB::query("
				insert into tbl_sales_payment (
					invoice_id,
					cus_id,
					payment_type, 
					transc_no, 
					amount, 
					pay_date, 
					saved_by, 
					saved_date
				) values(
					'$invoice', 
					'$cus_id', 
					'$pay_type2', 
					'$trans_num2', 
					'$trans_amt2', 
					'$sales_date',
					'$user_id',
					'$datetime'
				)
			 ");
			 }
   
    if ($resultt) {
    return "0|Inserted|$invoice";
    } else {
    return "1|Error";
    }
         //DB::con()->commit();
    }
    //sale insert end//
    
    
    /*today sale count user wise*/
    public function today_sale_count($user_id=0){
		$cls_datetime = new cls_datetime();
        $tra_date = $cls_datetime->exat_date();
        if($user_id == 0){
            $user_q = "";
        } else {
            $user_q = "and saved_by='$user_id'";
        }
        $result = DB::query("SELECT sum(g_total) as today_sale from tbl_sales_transaction where tra_date = '$tra_date' $user_q");
        return $result;
    }
    
    /* today sales Item Count User Wise*/
	
	 public function today_sale_item($user_id=0){
		 $cls_datetime = new cls_datetime();
        $tra_date = $cls_datetime->exat_date();
        if($user_id == 0){
            $user_q = "";
        } else {
            $user_q = "and saved_by='$user_id'";
        }
        $result = DB::query("SELECT count(item_id) as today_item from tbl_sales where sales_date = '$tra_date' $user_q");
        return $result;
    }
	/* End today sales Item Count User Wise*/
    
    public function total_sale_count($user_id=0){
        $cls_datetime = new cls_datetime();
        $tra_date = $cls_datetime->exat_date();
        if($user_id == 0){
            $user_q = "";
        } else {
            $user_q = "and saved_by='$user_id'";
        }
        $result = DB::query("SELECT sum(g_total) as total_sale from tbl_sales_transaction where id !=0 $user_q");
        return $result;
    }
    
    /*today sale count end*/
    
     
	
	public function total_sale_item_user($user_id){
        $cls_datetime = new cls_datetime();
        $tra_date = $cls_datetime->exat_date();
        $result = DB::query("SELECT count(item_id) as total_item from tbl_sales where saved_by = '$user_id'");
        return $result;
    }
	
	/* Today Profit User Wise*/
    
	 public function today_profit_admin(){
        $cls_datetime = new cls_datetime();
        $tra_date = $cls_datetime->exat_date();
        $result = DB::query("SELECT count(item_id) as item_count from tbl_sales where sales_date = '$tra_date'");
        return $result;
    }
	
    /*salse report*/
     public function view_salse_report($user_id, $emp_id, $item_id, $from_date, $to_date){
         $emp_q = "";
         $item_q = "";
         $date_q = "";
         //$all_q = "";
        
         if($emp_id != "null")
         {
            $emp_q = "&& sale.saved_by = '$emp_id'";
         }
         if($item_id != "null"){
             
            $item_q = "&& sale.item_id = '$item_id'";
         }
         if($from_date != "" || $to_date != ""){
             
            $date_q = "&& sale.sales_date between '$from_date' and '$to_date'";
         }
         
         $result = DB::query("select sale.*, us.name, tra.invoice_id, tra.payed_total, tra.due_amount
         from tbl_sales as sale
         join tbl_user_info as us on us.id = sale.saved_by
         join tbl_sales_transaction as tra on tra.invoice_id = sale.invoice_id
         where sale.id != '' $emp_q $item_q $date_q group by sale.invoice_id");
         
         return $result;
     }
    /*view salse report end*/
    
    /*invoice details*/
    public function invoice_details($invoice_id){
   
        $result = DB::query("select sale.*, it.item_name,it.size, tra.sub_total, tra.discount, tra.total_vat, tra.g_total, tra.payed_total, tra.due_amount, tra.tra_date, user.name, tra.cus_id
        from tbl_sales as sale
        join tbl_items as it on it.id = sale.item_id
        join tbl_sales_transaction as tra on tra.invoice_id = sale.invoice_id
        join tbl_user_info as user on user.id = sale.saved_by
        where sale.invoice_id = '$invoice_id'
        ");
        
        return $result;
    
    }
    
    /*invoice details end*/
    
    
    /*get payment type*/
    public function getpayment_type($invoice_id, $tra_date){
    $result = DB::query("SELECT * FROM tbl_sales_payment where invoice_id = '$invoice_id' and pay_date = '$tra_date'");
    return $result;
    }
    /*end*/
    
    
     /*get discount type*/
    public function getdiscount($invoice_id){
    $result = DB::query("SELECT (sale.qnty * sale.discount) as t_discount, sale.*, it.item_name
    FROM tbl_sales as sale
    join tbl_items as it on it.id = sale.item_id
    where invoice_id = '$invoice_id'");
    return $result;
    }
    /*end*/
    
    /*total sale admin*/
     public function total_sale_count_admin(){
        $result = DB::query("SELECT sum(g_total) as total_sale from tbl_sales_transaction");
        return $result;
    }
    /*end*/

    /*total sale admin*/
    public function stock_show(){
        $result = DB::query("SELECT sum(g_total) as total_sale from tbl_sales_transaction");
        return $result;
    }
    /*end*/

}
?>