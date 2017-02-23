<?php
	class cls_store{     
        //view store//
        public function viewstore($user=false){
        $result = DB::query("select * from tbl_company_info");
            return $result;
        }
		
		 public function view_vat(){
        $result = DB::query("select vat from tbl_company_info where vat_status = '1' limit 1");
            return $result;
        }
        
		public function update_storinfo($userid, $company_name, $address, $phone, $mobile, $email, $website, $vat, $vat_reg_no, $vat_area_code, $invoice_size){
            
            $cls_datetime = new cls_datetime();
            $datetime = $cls_datetime->datetime();
            
            $result = DB::query("select * from tbl_company_info order by id desc");
            $row = $result->num_rows;
            
            if($row == 0)
            {
            
                $result = DB::query("insert into tbl_company_info (company_name, address, phone, mobile, email, website, vat, vat_reg_no, vat_area_code, invoice_size, saved_by, saved_date) values ('$company_name', '$address', '$phone', '$mobile', '$email', '$website', '$vat', '$vat_reg_no', '$vat_area_code', '$invoice_size', '$userid', '$datetime')");
            } else {
            
			$result = DB::query("update tbl_company_info set company_name = '$company_name', address = '$address', phone = '$phone', mobile = '$mobile', email = '$email', website = '$website', vat = '$vat', vat_reg_no = '$vat_reg_no', vat_area_code = '$vat_area_code', invoice_size = '$invoice_size'");
            
            }
            
            if($result){
				return "<font style='color:green'>Data Save successfully.</font>";
			}
			else{
				return "<font style='color:red'>Error in data inserting</font>";
			}

	}

}
?>