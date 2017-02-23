<?php
	class cls_datetime{
		function datetime(){
			$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
			$datetime = $dt->format('Y-m-d h:m:s');
			
			return $datetime;
		}
		
		function exat_date(){
			$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
			$datetime = $dt->format('Y-m-d');
			
			return $datetime;
		}
		
		function show_date(){
			$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
			$datetime = $dt->format('d M Y');
			
			return $datetime;
		}
		
		function show_datetime(){
			$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
			//$datetime = $dt->format('mdhis');
			//$datetime = $dt->format('ymdhms');
			$datetime = $dt->format('hms');
			
			return $datetime;
		}
		
		
	}
?>