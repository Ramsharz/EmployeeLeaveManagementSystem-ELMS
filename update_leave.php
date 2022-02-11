<?php

require_once'connection.php';
//getting data from form
$dp = $_POST["dp"];
$cb = $_POST["cb"];
$days = $_POST["days"];
$id = $_GET["id"];


$date = $_POST["date"];


//exit();
//check if record already exists


  $sqlquery = "UPDATE leave_lookup SET leave_description = ?,created_by=? ,days=?, created_on=? WHERE leave_id = '$id' ";
  $query = $conn->prepare($sqlquery);


  // Query Execution
  $query->execute(array($dp,$cb,$days,$date));
  echo $sqlquery;
  // Check that the insertion really worked. If the last inserted id is greater than zero, the insertion worked.
  
  // Message for successfull insertion
  echo "Record inserted successfully";
  header("Location: leave_lookup.php"); 
 



?>