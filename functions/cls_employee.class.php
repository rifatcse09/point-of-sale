<?php
	class cls_employee{
        
        //employee add//
       public function employee_add($user_id, $name, $email, $mobile, $username, $password, $usertype, $about){    
       $cls_datetime = new cls_datetime();
       $datetime = $cls_datetime->datetime();
	   $sql = DB::query("select id from tbl_user_info where username='$username'");
	   $row_count=$sql->num_rows;
	   if($row_count>0){
		 
             return "1|Change Username";		 
		   
	   }
	   else{
        $result = DB::query("INSERT into tbl_user_info (name, email, mobile, username, password, about, usertype, saved_by, saved_date) values ('$name', '$email', '$mobile', '$username', '$password', '$about', '$usertype', '$user_id', '$datetime')");
            
            if($result)
			{
				   return "0|Employee Added";
			}
			return "1|Error";
        }
	   }
	   
        
        //employee add end here//
        
        
        //get user for profile//
        public function get_emp($user){
        $result = DB::query("select * from tbl_user_info where saved_by = '$user' and usertype = 'employee' order by id desc");
        return $result;
        }
        
        //get emp by id//
        public function get_empbyid($employee, $user_id){
        $result = DB::query("select * from tbl_user_info where id = '$employee' and saved_by = '$user_id'");
        return $result;
        }
        
         //get emp by id//
        public function empbyid($emp){
        $result = DB::query("select * from tbl_user_info where id = '$emp'");
        return $result;
        }
        
        /*get emp by name*/
        public function view_emp_by_name($empName){
            $result = DB::query("select * from tbl_user_info where name like '%$empName%' and status = '1' order by name asc");
            return $result;
        }
        
         public function view_emp_by_nameand_id($user_id){
            $result = DB::query("select * from tbl_user_info where id = '$user_id' and status = '1' order by name asc");
            return $result;
        }
        
        /*end*/
        
        
        
        //user profile update//
        
        public function employee_update($user_id, $emp_id, $name, $email, $mobile, $username, $password, $usertype, $about){
            if($password != "")
            {
                $pass = md5($password);
                $result = DB::query("update tbl_user_info set name = '$name', email = '$email', mobile = '$mobile', password = '$pass', about = '$about' where id = '$emp_id' and saved_by = '$user_id'");
            } else {
            $result = DB::query("update tbl_user_info set name = '$name', email = '$email', mobile = '$mobile', usertype = '$usertype', about = '$about' where id = '$emp_id' and saved_by = '$user_id'");
            }
            
            if($result)
			{
				   return "0|Updated";
			}
			return "1|error";
        
        
        }
        
        /*email chk*/
        public function employee_chk($email){
        $result = DB::query("select * from tbl_user_info where email = '$email'");
        $row = $result->num_rows;

     if ($row > 0) {
            $arr['is_exist'] = false;
        }
        else{
            $arr['is_exist'] = true;
        }

        echo json_encode($arr);

                return $result;
            }
        /*end*/
        
}
?>