<?php
class cls_purchase {

    //purchase insert//
    public function purchase_insert($user_id, $result, $supplier_id, $inovice_num, $pur_total_price_in, $pur_net_payable, $pur_amt_due) {
        $cls_datetime = new cls_datetime();
        $datetime = $cls_datetime->datetime();
       // $pur_id = $cls_datetime->show_datetime();
        $pur_id = rand(1111, 9999). (int)$cls_datetime->show_datetime();
        $pur_date = $cls_datetime->exat_date();
        
      //  try{
            
           // DB::beginTranstion();
        foreach($result as $values)
			{
				//$data  = "'" . implode("','", $values) . "'";
				//$data  = $data.",'$supplier_id', '$pur_ID', '$inovice_num', '$pur_date', '$user_id', '$datetime''";
	
				$resultt = DB::query("insert into tbl_purchase(item_id, quantity, bonus_quantity, price, ttl_price, sup_id, pur_id, invoice, pur_date, saved_by, saved_date) values ('$values[0]', '$values[1]', '$values[2]', '$values[3]', '$values[4]', '$supplier_id', '$pur_id', '$inovice_num', '$pur_date', '$user_id', '$datetime')");
            
            /*for stock*/
            $item_id = $values[0];
           // $item_qnty = $values[1];
            $item_qnty = $values[1] + $values[2];
            
            $stock = 0;
            $item_q = DB::query("SELECT * from tbl_stock where item_id = '$item_id'");
            $it_row_count = $item_q->num_rows;            
            if($it_row_count != 0)
            {
               //$result = DB::query("update tbl_stock set available_stock = '$stock' where item_id = '$item_id'");
               $resultt = DB::query("update tbl_stock set available_stock = (available_stock + $item_qnty) where item_id = '$item_id'");
                
            } else {
            
            $resultt = DB::query("insert into tbl_stock (item_id, available_stock, last_tra_date, saved_by, saved_date) values ('$item_id', '$item_qnty', '$pur_date', '$user_id', '$datetime')");
            }
        
        }
        
        $tr_row_balnce = 0.00;
        $result = DB::query("select balance from tbl_supplier_trans where supp_id = '$supplier_id' order by id desc limit 1");
        $tr_row = $result->fetch_assoc();
        $tr_row_balnce = $tr_row['balance'];
        
        $pur_total_price = $pur_total_price_in - $pur_net_payable;
        
        $total_balance = $pur_total_price + $tr_row_balnce;
        
        $resultt = DB::query("insert into tbl_supplier_trans (supp_id, pur_id, total_amount, paid, balance, invoice_due, remarks, payment_date, saved_by, saved_date) values ('$supplier_id', '$pur_id', '$pur_total_price_in', '$pur_net_payable', '$total_balance', '$pur_amt_due', 'Purchase', '$pur_date', '$user_id', '$datetime')");
      
        
        if ($resultt) {
        return "0|Inserted";
        } else {
       return "1|Error";
        }
            
        
    }
    
    //purchase insert end//
    
    
    //purchase report//
     public function view_per_report($supplier_id, $item_id, $from_date, $to_date){
         
         $supplier_q = "";
         $item_q = "";
         $date_q = "";
         //$all_q = "";
        
         if($supplier_id != "null")
         {
            $supplier_q = "&& pur.sup_id = '$supplier_id'";
         }
         if($item_id != "null"){
             
            $item_q = "&& pur.item_id = '$item_id'";
         }
         if($from_date != "" || $to_date != ""){
             
            $date_q = "&& pur.pur_date between '$from_date' and '$to_date'";
         }
         
         $result = DB::query("select pur.*, user.name
         from tbl_purchase as pur 
         join tbl_user_info as user on user.id = pur.saved_by where pur.id != '' $supplier_q $item_q $date_q");
         
         return $result;
     }
    
    
    //supp wise report//
    public function view_report_supp($supplier_id, $from_date, $to_date){
        
        $supplier_q1 = "";
        $date_q1 = "";
        
        if($supplier_id != "null")
        {
            $supplier_q1 = "&& pur.sup_id = '$supplier_id'";
        }
        if($from_date != "" || $to_date != ""){
             
            $date_q1 = "&& pur.pur_date between '$from_date' and '$to_date'";
         }
        
    $result = DB::query("
        SELECT sum(ttl_price) as total, supp.c_name, us.name, pur.pur_id, pur.invoice, pur.pur_date
        FROM `tbl_purchase` as pur
        join tbl_supplier as supp on supp.id = pur.sup_id
        join tbl_user_info as us on us.id = pur.saved_by
        where pur.id != '' $supplier_q1 $date_q1
        group by pur.invoice
    ");
    
        return $result;
    }
    
    /*total purchase count admin*/
    public function total_pur_count_admin(){
    $result = DB::query("SELECT sum(ttl_price) as total_purchase FROM tbl_purchase");
        return $result;
    }
    
    /*end*/
    
    /*purchase report details*/
    public function pur_report_details($pur_id){
        
    $result = DB::query("SELECT  supp.c_name, us.name, it.item_name, it.unit, pur.quantity, pur.price, pur.pur_date, pur.pur_id, pur.bonus_quantity, stra.invoice_due, stra.total_amount, stra.paid, pur.invoice, (pur.quantity * pur.price) as ttl_price 
    FROM `tbl_purchase` as pur
    join tbl_items as it on it.id = pur.item_id
    join tbl_supplier as supp on supp.id = pur.sup_id
    join tbl_user_info as us on us.id = pur.saved_by
    join tbl_supplier_trans as stra on stra.pur_id = pur.pur_id
    where pur.pur_id = '$pur_id' ORDER BY pur_date");
    
        return $result;
    }
    
    
    public function pur_report_detailssupp($pur_id){
        
    $result = DB::query("SELECT  supp.c_name, pur.invoice
    FROM `tbl_purchase` as pur
    join tbl_supplier as supp on supp.id = pur.sup_id
    where pur.pur_id = '$pur_id' ORDER BY pur_date");
    
        return $result;
    }
    /*end*/
    

}
?>