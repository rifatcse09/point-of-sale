<?php
session_start();
$user_type = $_SESSION['usertype'];
if($user_type =='admin'){
	session_destroy();
	header('location:../index');
}else{
	session_destroy();
	header('location:../index');
}

?>