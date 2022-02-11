
<?php

require_once'connection.php';

//getting data from form
$name = $_POST["uname"];
$lname = $_POST["lname"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$pwd = $_POST["pwd"];
$id = $_GET["id"];

echo $name.$lname.$phone.$pwd.$email;
//exit();
//check if record already exists


  $sqlquery = "UPDATE Admin SET first_name = ?,last_name=?, email = ?, phone_no = ?, password = ? WHERE user_id = '$id' ";
  $query = $conn->prepare($sqlquery);
  
  // Query Execution
  $query->execute(array($name,$lname,$email,$phone,$pwd));
  echo $sqlquery;
  // Check that the insertion really worked. If the last inserted id is greater than zero, the insertion worked.
  
  // Message for successfull insertion
  echo "Record inserted successfully";
  header("Location: admin.php"); 
 



?>




