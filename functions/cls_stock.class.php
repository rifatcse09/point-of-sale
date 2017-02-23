<?php
class cls_stock {

    //purchase insert//
    public function view_stock() {
      // $result = DB::query("select a.*,b.item_name from tbl_stock as a join tbl_items as b on a.item_id = b.id");
        $result = DB::query("
            select stock.*,item.item_name, item.item_code, item.unit, item.size, cat.cat_name
            from tbl_stock as stock 
            join tbl_items as item on stock.item_id = item.id
            join tbl_category as cat on cat.id = item.cat_id
            order by cat.cat_name asc
        ");
        return $result;
    }    
	
	public function low_stock()
	{
		$result=DB::query("select stock.*,item.item_code,item.item_name,item.size,item.unit,cat.cat_name
            from tbl_stock as stock 
            join tbl_items as item on stock.item_id = item.id and stock.available_stock<20
            join tbl_category as cat on cat.id = item.cat_id
            order by stock.available_stock asc");
			 return $result;
	}

}
?>