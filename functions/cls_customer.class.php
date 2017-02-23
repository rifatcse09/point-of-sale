<?php
	class cls_customer{
        
        //customer add//
        public function customer_add($user_id, $cus_name, $email, $mobile, $address){    
        $cls_datetime = new cls_datetime();
        $datetime = $cls_datetime->datetime();
            
        $result = DB::query("INSERT into tbl_customer_info (cus_name, address, email, mobile, saved_by, saved_date) values ('$cus_name', '$address', '$email', '$mobile', '$user_id', '$datetime')");
            
            if($result)
			{
				   return "0|Customer Added";
			}
			return "1|Error";
        }
        
        //customer add end here//
        
           public function get_all_customer(){
        $result = DB::query("select * from tbl_customer_info where status = 1 order by cus_name asc");
        //$result = DB::query("select * from tbl_customer_info where saved_by = '$user' order by cus_name asc");
        return $result;
        }
        //get customer for profile//
        public function get_customer($user){
        $result = DB::query("call abc('$user')");
        //$result = DB::query("select * from tbl_customer_info where saved_by = '$user' order by cus_name asc");
        return $result;
        }
        
        //get customer by id//
        public function viewCusbyid($customer){
        $result = DB::query("select * from tbl_customer_info where id = '$customer'");

        return $result;
        }
		
		public function view_customer_by_name($customer) {
        $result = DB::query("select * from tbl_customer_info where cus_name like '%$customer%' and status = '1' order by cus_name asc ");
        return $result;
		}
		
			
		public function due_invoice($customer_id) {
        $result = DB::query("select * from tbl_sales_transaction where cus_id = '$customer_id' and invoice_status = 'Due' order by invoice_id asc ");
        return $result;
		}
		public function due_invoice_details($invoice){
			
			 $result = DB::query("select (select g_total FROM tbl_sales_transaction where invoice_id='$invoice') as total,sum(amount) as paid  from tbl_sales_payment where invoice_id = '$invoice' ");
        return $result;
			
		}

        //customer profile update//
        
        public function customer_update($user_id, $cus_id, $cus_name, $email, $mobile, $address){
        $result = DB::query("update tbl_customer_info set cus_name = '$cus_name', address = '$address', email = '$email', mobile = '$mobile',saved_by = '$user_id' where id = '$cus_id'");
            
            if($result)
			{
				   return "0|Updated";
			}
			return "1|Error";
        
        
        }
        
        //update end//
        
        
        /*customer due*/
        public function customer_due(){
			
        $result = DB::query("select invoice_id, g_total, tra_date, c.cus_name,
        (select sum(amount) from tbl_sales_payment where invoice_id = t.invoice_id) as paid, 
        (select g_total-paid) as due from tbl_sales_transaction as t join tbl_customer_info as c on t.cus_id = c.id and invoice_status = 'Due' order by invoice_id asc");
            
            return $result;
        }
		
		public function customer_payment($cus_id,$invoice,$pay_type1,$trans_num1,$trans_amt1,$pay_type2,$trans_num2,$trans_amt2,$f_due,$due,$user_id)
		{
			  
		$cls_datetime = new cls_datetime();
        $datetime = $cls_datetime->datetime();
		$sales_date=date('Y-m-d');
			  	if($f_due >'0')
		{
			$status = 'Due';
		}
		else{
			$status = 'Paid';
		}
		if($due>0)
		{
		
		if($pay_type1 != "")
			 {
			   $result = DB::query("
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
					'$pay_type1', 
					'$trans_num1', 
					'$trans_amt1', 
					'$sales_date',
					'$user_id',
					'$datetime'
				)
			 ");
			 }
			 if($pay_type2 != "")
			 {
			   $result = DB::query("
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
			 
			 $result = DB::query("update tbl_sales_transaction set invoice_status = '$status' where invoice_id = '$invoice' and cus_id = '$cus_id'");
    //echo $due;
		}
    if ($result) {
    return "Payment Inserted Successfully";
    } else {
    return "Error";
    }
			  
		  }
        
        /*customer due end*/

}
?>