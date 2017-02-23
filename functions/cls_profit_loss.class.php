<?php
class cls_profit_loss{
	
	   public function view_profit_loss_report($emp_id, $item_id, $from_date, $to_date){
         $emp_q = "";
         $emp_q2 = "";
         $item_q = "i.id";
         $date_q = "";
         //$all_q = "";
        
         if($emp_id != "null")
         {
            $emp_q = "&& saved_by = '$emp_id'";
            $emp_q2= "&& sale.saved_by = '$emp_id'";
             
             
         }
         if($item_id != "null"){
             
            $item_q = $item_id;
         }
         if($from_date != "" || $to_date != ""){
             
            $date_q = "&& s.sales_date between '$from_date' and '$to_date'";
         }
         
           /*
         $result = DB::query("							
            select i.id,i.item_name,i.size,i.unit,
            IFNULL((select truncate(avg(p.price),2) from tbl_purchase as p  where p.item_id=i.id),0.00) as avg_purchase_price,
            IFNULL((select truncate(avg(a.price),2)	FROM tbl_sales as a where a.item_id=i.id),0.00) as avg_sales_price,

            IFNULL((select sum(qnty) from tbl_sales s where s.item_id=i.id),0.00) as total_qnty,
            (select total_qnty * avg_purchase_price) as total_purchase_price,
            (select total_qnty * avg_sales_price) as total_sales_price,

            IFNULL((select (sum(vat) * total_qnty) from tbl_sales s where s.item_id=i.id),0.00) as total_vat,
            IFNULL((select (sum(discount) * total_qnty) from tbl_sales as s where s.item_id=i.id),0.00) as total_discount,


            (select truncate(total_sales_price - (total_purchase_price + total_vat + total_discount),2)) as total_profit 

            from tbl_items as i ORDER BY id ASC
            ");
            */
           
           /*
           $result = DB::query("							
            select i.id,i.item_name,i.size,i.unit,
            IFNULL((select truncate(sum(p.ttl_price) / (sum(p.quantity) + sum(p.bonus_quantity)), 2) from tbl_purchase as p  where p.item_id=i.id),0.00) as avg_purchase_price,
            IFNULL((select truncate(avg(a.price),2)	FROM tbl_sales as a where a.item_id=i.id),0.00) as avg_sales_price,

            IFNULL((select sum(qnty) from tbl_sales s where s.item_id=i.id),0.00) as total_qnty,
            (select total_qnty * avg_purchase_price) as total_purchase_price,
            (select total_qnty * avg_sales_price) as total_sales_price,

            IFNULL((select (sum(vat) * total_qnty) from tbl_sales s where s.item_id=i.id),0.00) as total_vat,
            IFNULL((select (sum(discount) * total_qnty) from tbl_sales as s where s.item_id=i.id),0.00) as total_discount,


            (select truncate(total_sales_price - (total_purchase_price + total_vat + total_discount),2)) as total_profit 

            from tbl_items as i ORDER BY id ASC
            ");
            */
           
            $result = DB::query("							
                select distinct(i.id),i.item_name,i.size,i.unit,
                IFNULL((select truncate(sum(p.ttl_price) / (sum(p.quantity) + sum(p.bonus_quantity)), 2) from tbl_purchase as p  where p.item_id=$item_q),0.00) as avg_purchase_price,
                IFNULL((select truncate(avg(a.price),2)	FROM tbl_sales as a where a.item_id=$item_q),0.00) as avg_sales_price,

                IFNULL((select sum(qnty) from tbl_sales s where s.item_id=$item_q $emp_q),0.00) as total_qnty,
                (select total_qnty * avg_purchase_price) as total_purchase_price,
                (select total_qnty * avg_sales_price) as total_sales_price,

                IFNULL((select sum(vat * qnty) from tbl_sales s where s.item_id=$item_q $emp_q),0.00) as total_vat,
                IFNULL((select (sum(discount) * total_qnty) from tbl_sales as s where s.item_id=$item_q $emp_q),0.00) as total_discount,


                (select truncate(total_sales_price - (total_purchase_price + total_vat + total_discount),2)) as total_profit 

                from tbl_items as i 
                join tbl_sales as sale on sale.item_id = i.id
                where i.id = $item_q $emp_q2

                ORDER BY i.id ASC
            ");     
           
           
                        return $result;
     }
	
	
}
?>