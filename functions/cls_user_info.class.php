<?php
	class cls_user_info{
        //user login//
		public function login($username, $password){
			$result = DB::query("select * from tbl_user_info where email = '$username' or username = '$username' and password = '$password' and status = '1'");
            $count = $result->num_rows;
			if($count == 0){
				return "1|Invalid login";
			}
			
			$row = $result->fetch_assoc();
			
			session_start();
			$_SESSION['user_id'] = "$row[id]";
			$_SESSION['usertype'] = "$row[usertype]";
			$_SESSION['name'] = "$row[name]";
			
			return "0|none";
	}
        
        //get user for profile//
        
        public function get_user($user, $user_type){
        $result = DB::query("select * from tbl_user_info where id = '$user' and usertype = '$user_type'");
        return $result;
        }
        
        //user profile update//
        
        public function userProfileUpdate($user_id, $name, $email, $mobile, $password, $about){
            if($password != "")
            {
                $pass = md5($password);
                $result = DB::query("update tbl_user_info set name = '$name', email = '$email', mobile = '$mobile', password = '$pass', about = '$about' where id = '$user_id'");
            } else {
            $result = DB::query("update tbl_user_info set name = '$name', email = '$email', mobile = '$mobile', about = '$about' where id = '$user_id'");
            }
            
            if($result)
			{
				   return "0|Updated";
			}
			return "1|Error";
        
        
        }
}
?>