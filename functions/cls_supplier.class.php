<?php

class cls_supplier {

    //view store//
    public function insert_supplier($company_name, $address, $mobile, $email, $contact_person, $contact_person_mobile, $payable_amount, $saved_by, $remarks) {
        $cls_datetime = new cls_datetime();
        $datetime = $cls_datetime->datetime();
		
		$query = $this->get_supplier_by_name($company_name);
		$row = $query->num_rows;
		if($row>0)
		{
			return "1|This Supplier Already Exist";
		}
		else{

        $result = DB::query("call supplier_insert('$company_name','$address','$mobile','$email','$contact_person','$contact_person_mobile','$saved_by','$payable_amount','$remarks','$datetime')");

        if ($result) {
            return "0|Inserted";
        }
        return "1|error";
		}
    }

    //view all//
    public function view_all() {
        $result = DB::query("select * from tbl_supplier where status = '1' order by c_name asc");
        return $result;
    }
    
    //view by id all//
    public function view_byid($supp) {
        $result = DB::query("select * from tbl_supplier where id = '$supp' and status = '1'");
        return $result;
    }

    public function view_supplier() {
        $result = DB::query("SELECT a.id,a.c_name,a.address,a.mobile,a.email,a.contact_person,a.cp_mobile,(select sum(total_amount) from tbl_supplier_trans as c where c.supp_id=a.id) as total_amount,(select sum(paid) from tbl_supplier_trans as c where c.supp_id=a.id) as paid,(select balance from tbl_supplier_trans as c where c.supp_id=a.id order by c.id desc limit 1 ) as balance,b.name,b.usertype,a.saved_date FROM tbl_supplier as a join tbl_user_info as b on a.saved_by=b.id order by a.id asc");
        return $result;
    }

    public function view_supplier_by_id($supp_id) {
        $result = DB::query("SELECT a.id,a.c_name,a.address,a.mobile,a.email,a.contact_person,a.cp_mobile,(select sum(total_amount) from tbl_supplier_trans as c where c.supp_id=a.id) as total_amount,(select sum(paid) from tbl_supplier_trans as c where c.supp_id=a.id) as paid,(select balance from tbl_supplier_trans as c where c.supp_id=a.id order by c.id desc limit 1 ) as balance,b.name,b.usertype,a.saved_date FROM tbl_supplier as a join tbl_user_info as b on a.saved_by=b.id and a.id='$supp_id'");
        return $result;
    }
	
	public function view_supplier_by_name($supp_name) {
        $result = DB::query("select * from tbl_supplier where c_name like '%$supp_name%' and status = '1' order by c_name asc ");
        return $result;
    }
	public function get_supplier_by_name($supp_name)
	{
		 $result = DB::query("select * from tbl_supplier where c_name ='$supp_name' and status = '1'");
         return $result;
	}

    public function update_supplier($supp_id, $company_name, $address, $mobile, $email, $contact_person, $contact_person_mobile, $saved_by) {
        $cls_datetime = new cls_datetime();
        $datetime = $cls_datetime->datetime();
		$sql=DB::query("select id from  tbl_supplier where c_name='$company_name' and id!='$supp_id'");
		$row_count=$sql->num_rows;
		if($row_count>0){
			return "1|This Category Name ALready Exist";
		}
		else{
        $result = DB::query("update tbl_supplier set c_name='$company_name',address='$address',mobile='$mobile',email='$email',contact_person='$contact_person',cp_mobile='$contact_person_mobile',saved_by='$saved_by',saved_date='$datetime' where id='$supp_id'");
        if ($result) {
            return "0|Updated Successfully";
        }
        return "1|error";
		}
    }
	
    //supplier payment//
	    public function supplier_payment($supp_id,$amount,$balance,$remarks,$saved_by){
			
        $cls_datetime = new cls_datetime();
        $datetime = $cls_datetime->datetime();
        $payment_date=date('Y-m-d');
	      
			 $result =DB::query("insert into tbl_supplier_trans(supp_id,paid,balance,remarks,payment_date,saved_by,saved_date) values ('$supp_id','$amount','$balance','$remarks','$payment_date','$saved_by','$datetime')");
     
			if($result)
			{
				   return "Payment Inserted Successfully";
			}
			if(!isset($supp_id))
			{
					return "Select Supplier";
			}
			else{
				return "Not Inserted";
			}

        }
    //supplier payment end//
    
    
    /*supplier due report*/
    public function supp_due_report(){ 
    $result = DB::query("SELECT a.supp_id,b.c_name,sum(total_amount) as t_amount, sum(paid) as paid_amount,(select balance from tbl_supplier_trans where tbl_supplier_trans.supp_id = a.supp_id order by id desc limit 1) as balance,
(select payment_date from tbl_supplier_trans where tbl_supplier_trans.supp_id = a.supp_id order by id desc limit 1) as payment_date   
FROM tbl_supplier_trans as a join tbl_supplier as b on a.supp_id = b.id group by a.supp_id order by a.supp_id asc");
        return $result;
    
    }
    /*supplier due report end*/
    
    /*supplier payment history*/
    public function supp_payment_his($supp_id){
    $result = DB::query("SELECT a.*, b.c_name from tbl_supplier_trans as a join tbl_supplier as b on a.supp_id = b.id and a.supp_id = '$supp_id'");
    return $result;
    }
	
	public function invoice_list($supp_id)
	{
		$result = DB::query("select distinct invoice from tbl_purchase where sup_id='$supp_id'");
        return $result;
	}
    
    /*supplier payment history end*/

}
?>