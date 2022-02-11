<?php
session_start();
require("read.php");
require_once "connection.php";
$id = $_GET['id'];
//$pdo = pdo_connect_mysql();
$msg = '';
// Check that the contact ID exists

    // Select the record that is going to be deleted
    $stmt = $conn->prepare("SELECT * FROM designation_lookup WHERE designation_id = '$id'");

    $stmt->execute();
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Contact doesn\'t exist with that ID!');
    }else{
    // Make sure the user confirms beore deletion
    
        
            // User clicked the "Yes" button, delete record
            $stmt = $conn->prepare("DELETE FROM designation_lookup WHERE designation_id = '$id'");
            $stmt->execute();
            $msg = 'You have deleted the contact!';
            echo $msg;
            header("location: designation.php?error=none");

         
    }
    
?>
