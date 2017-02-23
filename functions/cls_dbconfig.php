<?php
	class DB{
		public function con(){
			$db = new mysqli("127.0.0.1", "root", "", "db_shop_fixed");
			return $db;
		}
        
        public function query($q){
         $result = self::con()->query($q);
            return $result;
        }
	}
?>