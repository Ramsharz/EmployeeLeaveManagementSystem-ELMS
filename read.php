<?php
 // include database connection file

function admin(){
  require_once'connection.php';
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
  $stmt = $conn->prepare("SELECT* FROM Admin");
  $stmt->execute(); 
  $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $contacts;
}

function section(){
  include'connection.php';
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
  $stmt = $conn->prepare("SELECT* FROM section");
  $stmt->execute();
  $sections = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $sections;
}
function employee(){
  require_once'connection.php';
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
  $stmt2 = $conn->prepare("SELECT* FROM employee");
  $stmt2->execute();
  $employees = $stmt2->fetchAll(PDO::FETCH_ASSOC);
  return $employees;
}
function designation(){
  require_once'connection.php';
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
  $stmt3= $conn->prepare("SELECT* FROM designation_lookup");
  $stmt3->execute();
  $designations = $stmt3->fetchAll(PDO::FETCH_ASSOC);
  return $designations;
}

function app_status(){
  require_once'connection.php';
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
  $stmt4= $conn->prepare("SELECT* FROM app_status");
  $stmt4->execute();
  $apps = $stmt4->fetchAll(PDO::FETCH_ASSOC);
  return $apps;
}

function leave(){
require_once'connection.php';
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
  $stmt4= $conn->prepare("SELECT* FROM leave_lookup");
  $stmt4->execute();
  $leaves = $stmt4->fetchAll(PDO::FETCH_ASSOC);
  return $leaves;
}

function leave_app(){
  require_once'connection.php';
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    $stmt4= $conn->prepare("SELECT* FROM main_leave_table");
    $stmt4->execute();
    $leaves = $stmt4->fetchAll(PDO::FETCH_ASSOC);
    return $leaves;
  }
  
  function leave_history($id)
  {
    require_once'connection.php';
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    $stmt= $conn->prepare("SELECT* FROM leave_history_table WHERE emp_id = '$id'");
    $stmt->execute();
    $leaves = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $leaves;

  }


?>
