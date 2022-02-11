<?php

require_once'connection.php';

//getting data from form
$code = $_POST["scode"];
$dp = $_POST["dp"];

$id = $_GET["id"];


//exit();
//check if record already exists


  $sqlquery = "UPDATE app_status SET app_status_code = ?,app_status_description=?  WHERE status_id = '$id' ";
  $query = $conn->prepare($sqlquery);
  
  // Query Execution
  $query->execute(array($code,$dp));
  echo $sqlquery;
  // Check that the insertion really worked. If the last inserted id is greater than zero, the insertion worked.
  
  // Message for successfull insertion
  echo "Record inserted successfully";
  header("Location: app_status.php"); 
 



?>