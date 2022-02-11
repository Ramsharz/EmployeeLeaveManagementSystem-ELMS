
<?php

require_once'connection.php';

//getting data from form
$name = $_POST["fname"];
$des = $_POST["des"];
$sec = $_POST["sec"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$cb = $_POST["cb"];
$id = $_GET["id"];

//echo $name.$lname.$phone.$pwd.$email;
//exit();
//check if record already exists


  $sqlquery = "UPDATE employee SET emp_name = ?,phone=?, email = ?, created_by = ?,  des_code = ?, section_code =? WHERE emp_id = '$id' ";
  $query = $conn->prepare($sqlquery);
  
  // Query Execution
  $query->execute(array($name,$phone,$email,$cb,$des,$sec));
  echo $sqlquery;
  // Check that the insertion really worked. If the last inserted id is greater than zero, the insertion worked.
  
  // Message for successfull insertion
  echo "Record inserted successfully";
  header("Location: employee.php"); 
 



?>




