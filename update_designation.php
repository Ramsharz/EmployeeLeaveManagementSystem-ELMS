<?php

require_once'connection.php';

//getting data from form
$name = $_POST["dname"];
//$section_id = $_POST["section_id"];
$esc = $_POST["esc_lvl"];
$grade = $_POST["grade"];


$id = $_GET["id"];




  $sqlquery = "UPDATE designation_lookup SET designation_name = ?,escalation_level=?,grade=?  WHERE designation_id = '$id' ";
  $query = $conn->prepare($sqlquery);
  
  // Query Execution
  $query->execute(array($name,$esc,$grade));
  echo $sqlquery;
  // Check that the insertion really worked. If the last inserted id is greater than zero, the insertion worked.
  
  // Message for successfull insertion
  echo "Record inserted successfully";
  header("Location: designation.php"); 
 



?>