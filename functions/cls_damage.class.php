<?php
class cls_damage {
	
	 public function damage_insert($supplier_id,$item_name,$damage_qnty,$remarks,$user_id)
	 {
		  $cls_datetime = new cls_datetime();
          $datetime = $cls_datetime->datetime();
		  $date = $cls_datetime->exat_date();
		  $result = DB::query("select count(item_id) as num_item from tbl_damage where item_id = '$item_name' ");
		  $query_result = $result->fetch_assoc();
		  if($query_result['num_item']> 0 )
		  {
			 $result = DB::query("update tbl_damage set qnty = qnty + $damage_qnty where item_id='$item_name'");  
		  }
		  else{
			   $result = DB::query("insert into tbl_damage(supp_id,item_id,qnty,remarks,saved_by,saved_date,damage_date) values ('$supplier_id','$item_name','$damage_qnty','$remarks','$user_id','$datetime','$date')");
		  }
		 
		  $result =   DB::query("update tbl_stock set available_stock = available_stock - $damage_qnty where item_id='$item_name'");
         
	   if ($result) {
                return "Inserted Successfully";
           } else {
                return "Not Inserted";
            }
	 }
    
    /*damage qty select*/
    public function damage_qty($item_id){
    $result = DB::query("SELECT * FROM tbl_damage where item_id = '$item_id'");
    return $result;
    }
    /*end*/
	 
    
    /*item recover*/
    public function damage_recover($supplier_id, $item_id, $damage_qnty, $recover_qnty, $remarks, $user_id){
        
        if($damage_qnty < $recover_qnty)
        {
            return "Recovery quantity is larger damage quantity";
        } else {
        
    $result = DB::query("UPDATE tbl_damage set qnty = qnty - $recover_qnty where item_id = '$item_id'");
        
    $result = DB::query("update tbl_stock set available_stock = available_stock + $recover_qnty where item_id = '$item_id'");
        }
       if ($result) {
                return "Inserted Successfully";
           } else {
                return "Not Inserted";
            }
    
        
    }
    
    /*item recover end*/
	
	
}
?>