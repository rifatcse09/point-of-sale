<?php
class cls_item {

    public function insert_item($category, $item_name, $item_code, $size, $unit, $description, $user_id, $fileName) {

        $cls_datetime = new cls_datetime();
        $datetime = $cls_datetime->datetime();
        $query = $this->viewitemby_name($item_name,$size);
        $row = $query->num_rows;
        if ($row > 0) {
            return "This Item Already Exist";
        }
        $sql = $this->viewitemidbycode($item_code);
        $row_result = $sql->num_rows;
        if($row_result>0)
        {
            return "This Item Code Already  Exist";
        }


        else {
            if ($fileName == '') {
                $fileName = "no_image.png";
            }

            $result = DB::query("insert into tbl_items(item_code,cat_id,item_name,size,unit,photo,description,saved_by,saved_date) values ('$item_code','$category','$item_name','$size','$unit','$fileName','$description','$user_id','$datetime')");

            if ($result) {
                return "Inserted Successfully";
            } else {
                return "Not Inserted";
            }
        }
    }

    //item view all//
    public function viewitemAll() {
        $restul = DB::query("select * from tbl_items where status = '1' order by item_name asc");
        return $restul;

    }

    //item view all//
    public function viewitembyid($itemName) {
        $restul = DB::query("select * from tbl_items where item_name like '%$itemName%' and status = '1'");
        return $restul;
    }

    //item view by id//
    public function pur_item_show($item_id) {
        $restul = DB::query("SELECT a.*,b.cat_name FROM tbl_items as a join tbl_category as b on a.cat_id=b.id and a.id='$item_id' and a.status = '1'");
        return $restul;
    }

    public function sale_item_show($item_id) {
//        $restul = DB::query("SELECT a.*,b.cat_name,(select available_stock from tbl_stock where item_id='$item_id')as stock,(select price from tbl_item_price where item_id='$item_id' order by id desc limit 1 ) as price,IFNULL((select  discount from tbl_item_price where item_id='$item_id' and CURDATE() between promo_from and promo_to order by id desc limit 1 ),0.00)as discount FROM tbl_items as a join tbl_category as b   where a.cat_id=b.id  and a.status = '1' and a.id='$item_id'");
        $restul = DB::query("SELECT a.*,b.cat_name,(select available_stock from tbl_stock where item_id='$item_id')as stock,(select price from tbl_purchase where item_id='$item_id' order by id desc limit 1 ) as pur_price,(select price from tbl_item_price where item_id='$item_id' order by id desc limit 1 ) as price,IFNULL((select  discount from tbl_item_price where item_id='$item_id' and CURDATE() between promo_from and promo_to order by id desc limit 1 ),0.00)as discount FROM tbl_items as a join tbl_category as b   where a.cat_id=b.id  and a.status = '1' and a.id='$item_id'");
        return $restul;
    }
    //
    //item view all//
    public function viewitembycat($itemName) {
        $restul = DB::query("select * from tbl_items where item_name like '%$itemName%' and status = '1' order by item_name asc");
        return $restul;
    }

    public function viewitemby_id($item_id) {
        $result = DB::query("select a.*,b.cat_name,c.name FROM tbl_items as a  join tbl_category as b join tbl_user_info as c on a.cat_id=b.id and a.id='$item_id' and a.saved_by=c.id");
        return $result;
    }

    public function  viewitemby_name($item_name,$size) {
        $result = DB::query("select * from tbl_items where item_name = '$item_name' and size='$size' and status = '1'");
        return $result;
    }

    //item id by code//
    public function  viewitemidbycode($item_code) {
        $result = DB::query("select * from tbl_items where item_code = '$item_code' and status = '1'");
        return $result;
    }

    public function update_item($item_id, $category, $item_name, $item_code, $size, $unit, $description, $user_id, $fileName) {

        $cls_datetime = new cls_datetime();
        $datetime = $cls_datetime->datetime();

        $sq=DB::query("select * from tbl_items where ((item_name = '$item_name' and size = '$size') or item_code='$item_code') and id!='$item_id'");
        $row_count=$sq->num_rows;
        if($row_count>0)
        {
            return "Item Name and Size or Code  Already Exist";
        }
        else{

            if ($fileName == '') {

                $result = DB::query("update tbl_items set item_code='$item_code',cat_id='$category',item_name='$item_name',size='$size',unit='$unit',description='$description',saved_by='$user_id',saved_date='$datetime' where id='$item_id'");

            } else {
                $result = DB::query("update tbl_items set item_code='$item_code',cat_id='$category',item_name='$item_name',size='$size',unit='$unit',description='$description',photo='$fileName',saved_by='$user_id',saved_date='$datetime' where id='$item_id'");
            }

            if ($result) {
                return "Updated Successfully";
            } else {
                return "Not Possible Updated";
            }
        }
    }

    public function itemUnit()
    {
        $result = DB::query("select * from tbl_item_unit where status=1");
        return $result;

    }

    public function item_by_category($cat_id)
    {
        $result = DB::query("select * from tbl_items where status=1 and cat_id='$cat_id'");
        return $result;

    }

    public function item_price_info($item_id)
    {
        
        $result = DB::query("
            SELECT tbl_items.*,
            IFNULL((select price from tbl_purchase 
                where item_id='$item_id' 
                order by id desc limit 1),0.00) as price 
            FROM tbl_items 
            where id=$item_id
            ");
        
        
        return $result;

    }


    public function item_price_add($item_id, $slaes_price, $pur_price, $discount, $promo_from, $promo_to, $saved_by)
    {
        $cls_datetime = new cls_datetime();
        $datetime = $cls_datetime->datetime();
        if($pur_price == 0.00){
            return "This Item has no Purchase Price";
        }
        else {
            $result = DB::query("insert into tbl_item_price(item_id,price,discount,promo_from,promo_to,saved_by,saved_date) values ('$item_id','$slaes_price','$discount','$promo_from','$promo_to','$saved_by','$datetime')");

        }
        if ($result) {
            return "Item Price Inserted Successfully";
        } else {
            return "Not Inserted";
        }


    }

    public function item_promo($item_id)
    {
        $result=DB::query("select promo_from,promo_to,discount,price from tbl_item_price  where item_id='$item_id' order by id desc limit 1");
        return $result;
    }

    public function item_list_supplierwise($supp_id)
    {
        $result=DB::query("SELECT a.id,a.item_name FROM tbl_items as a join tbl_purchase as b on a.id=b.item_id where b.sup_id='$supp_id' group by a.item_name order by a.item_name asc");
        return $result;
    }

    public function item_info($item_id)
    {
        $result=DB::query("select a.size,a.unit,b.available_stock from tbl_items as a join tbl_stock as b on a.id = b.item_id where a.id = '$item_id'");
        return $result;
    }
    
    public function get_id_by_code($item_code){
        $result = DB::query("select id, concat(item_name, ' ', size) as item_name from tbl_items where item_code = '$item_code'");
        $row = $result->fetch_assoc();
        $json = json_encode($row);
        return $json;
    }


}

?>