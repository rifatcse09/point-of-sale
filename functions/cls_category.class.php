<?php
	class cls_category{
        
        //category add//
        public function category_add($user_id,$CategoryName){		
        //$datetime = date('Y-m-d h:m:s');
		$cls_datetime = new cls_datetime();
        $datetime = $cls_datetime->datetime();
		$query = $this->category_by_name($CategoryName);
		$row = $query->num_rows;
		
		if($row>0)
		{
			return "1|This Category Already Exist"; 
		}
		
		else{
        $result = DB::query("INSERT into tbl_category (cat_name, saved_by, saved_date) values ('$CategoryName', '$user_id', '$datetime')");
            
            if($result)
			{
				   return "0|Category Added";
			} 
			return "1|Error"; 
			
		}
	
	}
	
	     public function get_all_cat(){
        $result = DB::query("select * from tbl_category where status = 1 order by id asc");
        return $result;
        }
		
		/*  Edit by Rifat category name for Drop down Order by Name ASC*/
	     public function cat_by_name(){
        $result = DB::query("select * from tbl_category where status = '1' order by cat_name asc");
        return $result;
        }
		 public function category_by_id($cat_id){
        $result = DB::query("select * from tbl_category where id='$cat_id' and status=1");
        return $result;
        }
		 public function category_by_name($category_by_name){
        $result = DB::query("select * from tbl_category where cat_name = '$category_by_name' and status = 1");
        return $result;
        }
		public function cat_for_select($cat_id){
        $result = DB::query("select * from tbl_category where id!='$cat_id'");
        return $result;
        }
		 public function update_category($cat_id,$CategoryName,$saved_by){
		 $cls_datetime = new cls_datetime();
         $datetime = $cls_datetime->datetime();
		 $sql=DB::query("select * from tbl_category where cat_name='$CategoryName' and id!='$cat_id'");
		 $row_count=$sql->num_rows;
		 if($row_count>0)
		 {
			 return "1|This Category Name Already Exist"; 
		 }
		 else{
         $result = DB::query("update tbl_category  set cat_name='$CategoryName',saved_by='$saved_by',saved_date='$datetime' where id='$cat_id'");
           if($result)
			{
				   return "0|Category Updated";
			} 
			return "1|Error"; 
		 }
        }
}
?>