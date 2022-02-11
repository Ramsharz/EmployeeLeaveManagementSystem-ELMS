<?php
session_start();
require("read.php");
require_once "connection.php";
$id = $_GET['id'];
//$pdo = pdo_connect_mysql();
$msg = '';
// Check that the contact ID exists

    // Select the record that is going to be deleted
    $stmt = $conn->prepare("SELECT * FROM app_status WHERE status_id = '$id'");

    $stmt->execute();
    $section = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$section) {
        exit('Section doesn\'t exist with that ID!');
    }else{
    // Make sure the user confirms beore deletion
    
        
            // User clicked the "Yes" button, delete record
            $stmt = $conn->prepare("DELETE FROM app_status WHERE status_id = '$id'");
            $stmt->execute();
            $msg = 'You have deleted the contact!';
            echo $msg;
            header("location: app_status.php?error=none");

         
    }
    
?>
