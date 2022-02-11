<?php
require 'connection.php';

function get_balance($eid, $leave_type)
{
if($leave_type == 1){
    require 'connection.php';
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    $stmt= $conn->prepare("SELECT balance_casual FROM employee_leave_balance WHERE emp_id = '$eid'");
    $stmt->execute();
    $bal = $stmt->fetch(PDO::FETCH_ASSOC);
    return $bal['balance_casual'];
}
else if($leave_type == 2){
    require 'connection.php';
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    $stmt= $conn->prepare("SELECT balance_earned FROM employee_leave_balance WHERE emp_id = '$eid'");
    $stmt->execute();
    $bal = $stmt->fetch(PDO::FETCH_ASSOC);
    return $bal['balance_earned'];
}
else {
    require 'connection.php';
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    $stmt= $conn->prepare("SELECT balance_rnr FROM employee_leave_balance WHERE emp_id = '$eid'");
    $stmt->execute();
    $bal = $stmt->fetch(PDO::FETCH_ASSOC);
    return $bal['balance_rnr'];
}

}

$status = $_POST["status"];
$id = $_GET["id"];
//$approvedby = $_POST["approvedby"];

if($status == "Approved")
{   $approvedby = $_POST["approvedby"];
    $recby = $_POST["rcby"];
    $assignedto = $_POST["assigned"];
    $fb = $_POST["fb"];

    // if the application is approved by the admin after providing few remining fields, 
    // 1- save the remaining fields in the main_leave_table
    // 2- copy all the fields to leave_history table.
    // 3- update employee_leave_balance table.
    // 4- delete current record from main leave table.
//****** 
//getting form data


$sqlquery = "UPDATE main_leave_table SET status = ?, approved_by=? , recommended_by=?, assigned_to=?, feedback=? WHERE main_id = '$id' ";
$query = $conn->prepare($sqlquery);


// Query Execution
$query->execute(array($status, $approvedby,$recby,$assignedto,$fb));
//echo $sqlquery;
$sqlquery = "INSERT INTO leave_history_table SELECT* FROM main_leave_table WHERE main_id = '$id'";
$query = $conn->prepare($sqlquery);
$query->execute();

$stmt = $conn->prepare("SELECT* FROM main_leave_table WHERE  main_id ='$id' ");
$stmt->execute();
$leave = $stmt->fetch(PDO::FETCH_ASSOC);
$leave_type = $leave['leave_id'];
$days = $leave['days'];
$eid = $leave['emp_id'];
$current = get_balance($eid, $leave_type);
if($leave_type == 1){

$sqlquery = "UPDATE employee_leave_balance SET  balance_casual =? WHERE emp_id = '$eid' ";
$query = $conn->prepare($sqlquery);
$new_bal = $current - $days; 
// Query Execution
$query->execute(array($new_bal));

}

else if($leave_type == 2){

    $sqlquery = "UPDATE employee_leave_balance SET  balance_earned =? WHERE emp_id = '$eid' ";
    $query = $conn->prepare($sqlquery);
    $new_bal = $current - $days; 
    //echo $eid.$current.$new_bal.$days;
    //exit();
    // Query Execution
    $query->execute(array($new_bal));
    
    } 

else {

    $sqlquery = "UPDATE employee_leave_balance SET  balance_rnr =? WHERE emp_id = '$eid' ";
    $query = $conn->prepare($sqlquery);
    $new_bal = $current - $days; 
    // Query Execution
    
    $query->execute(array($new_bal));
    
    }
// $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
//   $stmt = $conn->prepare("SELECT* FROM main_leave_table WHERE main_id = '$id'");
//   $stmt->execute();
//   $data = $stmt->fetch(PDO::FETCH_ASSOC);
  

$stmt = $conn->prepare("DELETE FROM main_leave_table WHERE main_id  = '$id'");
$stmt->execute();

header("location: ViewLeaveApps.php?error=none");

}
else if($status == "Rejected")
{
 #if leave is rejected, update status to rejected.
 $sqlquery = "UPDATE main_leave_table SET status = ? WHERE main_id = '$id' ";
$query = $conn->prepare($sqlquery);


// Query Execution
$query->execute(array($status));
//echo $sqlquery;
$sqlquery = "INSERT INTO leave_history_table SELECT* FROM main_leave_table WHERE main_id = '$id'";
$query = $conn->prepare($sqlquery);
$query->execute();

$stmt = $conn->prepare("DELETE FROM main_leave_table WHERE main_id  = '$id'");
$stmt->execute();


header("location: ViewLeaveApps.php?error=none");
}
else {
    header("location: ViewLeaveApps.php?error=none");
    
}

?>