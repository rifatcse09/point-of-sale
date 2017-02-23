<?php
session_start();
require_once('../functions/cls_dbconfig.php');
function __autoload($classname){
	require_once("../functions/$classname.class.php");
}
$cls_dbconfig = new DB();
$cls_store = new cls_store();

$saved_by= $_SESSION['user_id'];
$company_name = $cls_dbconfig->con()->real_escape_string("$_POST[company_name]");
$address = $cls_dbconfig->con()->real_escape_string("$_POST[address]");
$phone = $cls_dbconfig->con()->real_escape_string("$_POST[phone]");
$mobile = $cls_dbconfig->con()->real_escape_string("$_POST[mobile]");
$email = $cls_dbconfig->con()->real_escape_string("$_POST[email]");
$website = $cls_dbconfig->con()->real_escape_string("$_POST[website]");
$vat = $cls_dbconfig->con()->real_escape_string("$_POST[vat]");
$vat_reg_no = $cls_dbconfig->con()->real_escape_string("$_POST[vat_reg_no]");
$vat_area_code = $cls_dbconfig->con()->real_escape_string("$_POST[vat_area_code]");
$invoice_size = $cls_dbconfig->con()->real_escape_string("$_POST[invoice_size]");



echo "> " . $cls_store->update_storinfo($saved_by, $company_name, $address, $phone, $mobile, $email, $website, $vat, $vat_reg_no, $vat_area_code, $invoice_size) . "<br>";

if(isset($_FILES['logo']['name'])){
	$target_path = "../images/";
	$ext = pathinfo(basename($_FILES['logo']['name']), PATHINFO_EXTENSION);

	/* $filename = $_FILES['uploadedfile']['name'];
	$target_path = $target_path . $_FILES['uploadedfile']['name']; */

	$filename = "logo.png";
	$target_path = $target_path . $filename;

	if(move_uploaded_file($_FILES['logo']['tmp_name'], $target_path)){
		echo "> <font style='color:green'>The file ".  basename( $_FILES['logo']['name']). " has been uploaded.</font>";
		echo "<br>";
	} else{
		echo "> <font style='color:red'>There was an error uploading the file, please try again!</font>";
	}
}
?>