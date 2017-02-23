<?php
	class cls_itemunit{
        
        //item unit add//
        public function itumunit_add($user_id, $unit_name){    
        $cls_datetime = new cls_datetime();
        $datetime = $cls_datetime->datetime();
            
            $result = DB::query("select * from tbl_item_unit where name = '$unit_name' and id != '$unit_id'");
            $chk = $result->num_rows;
            
            if($chk != 0)
            {
                return "2";
            }
            
        $result = DB::query("INSERT into tbl_item_unit (name, saved_by, saved_datetime) values ('$unit_name', '$user_id', '$datetime')");
            
            if($result)
			{
				   return "0|Unit Added";
			}
			return "1|Error";
        }
        
        //unit add end here//
        
        public function get_all(){
        $result = DB::query("select * from tbl_item_unit where status = 1 order by name asc");
        return $result;
        }
        
          public function get_byid($unit){
        $result = DB::query("select * from tbl_item_unit where id = '$unit' and status = 1 order by name asc");
        return $result;
        }
       
        //customer profile update//
        
        public function unit_update($user_id, $unit_id, $unit_name){
            
            $result = DB::query("select * from tbl_item_unit where name = '$unit_name' and id != '$unit_id'");
            $chk = $result->num_rows;
            
            if($chk != 0)
            {
                return "2";
            } 
            
        $result = DB::query("update tbl_item_unit set name = '$unit_name', saved_by = '$user_id' where id = '$unit_id'");
            
            
            if($result)
			{
				   return "0|Updated";
			}
			return "1|Error";
        
        }
        
        //update end//
}
?>