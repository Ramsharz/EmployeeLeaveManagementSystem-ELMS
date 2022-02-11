<?php
session_start();
//require("read.php");

// function deleteAdmin($id){

    require_once "connection.php";
    $id = $_GET['id'];
    //$pdo = pdo_connect_mysql();
    
        // Make sure the user confirms beore deletion
        
            
                // User clicked the "Yes" button, delete record
                $stmt = $conn->prepare("DELETE FROM employee WHERE emp_id = '$id'");
                $stmt->execute();
                $stmt = $conn->prepare("DELETE FROM employee_leave_balance WHERE emp_id = '$id'");
                $stmt->execute();
                $msg = 'You have deleted the contact!';



                echo $msg;
                ob_start();
                header("location: employee.php?error=none");
                ob_end_flush();    
             
        
        






?>
