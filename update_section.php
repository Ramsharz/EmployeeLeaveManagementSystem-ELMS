<?php

require_once'connection.php';

//getting data from form
$sname = $_POST["sname"];
$cb = $_POST["cb"];

$id = $_GET["id"];


//exit();
//check if record already exists


  $sqlquery = "UPDATE section SET section_name = ?,created_by=?  WHERE section_id = '$id' ";
  $query = $conn->prepare($sqlquery);
  
  // Query Execution
  $query->execute(array($sname,$cb));
  echo $sqlquery;
  // Check that the insertion really worked. If the last inserted id is greater than zero, the insertion worked.
  
  // Message for successfull insertion
  echo "Record inserted successfully";
  header("Location: section.php"); 
 



?>