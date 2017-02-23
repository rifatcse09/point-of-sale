<?php
	session_start();
    require_once('../functions/cls_dbconfig.php');
	function __autoload($classname){
		require_once("../functions/$classname.class.php");
	}

	$user_id = $_SESSION['user_id'];
    $user_type = $_SESSION['usertype'];

    if($user_type == "employee")
    {
        echo "<option value='$user_id'>$_SESSION[name]</option>";
        exit;
    }

	$cls_employee = new cls_employee();
	$empName = "$_POST[empName]";

    $query = $cls_employee->view_emp_by_name($empName);
    
    $row_c = $query->num_rows;
if($row_c == 0)
{ 
?>
   <option value="">No result found</option>
<?php
 exit;
}
    while($row  = $query->fetch_assoc())
    {
?>
<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
<?php 
    }
?>