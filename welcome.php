
<?php
// include database connection file
require_once'connection.php';
require("create.php");

//getting data from form
$name = $_POST["uname"];
$lname = $_POST["lname"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$pwd = $_POST["pwd"];

//create_admin($name,$lname,$phone,$email,$pwd);


echo $pwd." ".$email;
//check if record already exists
$stmt = $conn->prepare("SELECT* FROM Admin WHERE  email='$email' OR phone_no ='$phone' ");
  //echo "SELECT first_name, last_name FROM registered WHERE  email='$name' AND password='$pwd1'";
  $stmt->execute();
  $result= $stmt->rowCount();
if($result  == false ){
  $sqlquery = "INSERT INTO Admin(first_name,last_name,phone_no,email,password)VALUES(:fn,:ln,:cno,:eml,:pwd)";
  $query = $conn->prepare($sqlquery);
  $query->bindParam(':fn',$name,PDO::PARAM_STR);
  $query->bindParam(':ln',$lname,PDO::PARAM_STR);
  $query->bindParam(':eml',$email,PDO::PARAM_STR);
  $query->bindParam(':cno',$phone,PDO::PARAM_STR);
  $query->bindParam(':pwd',$pwd,PDO::PARAM_STR);
  // Query Execution
  $query->execute();
  echo $sqlquery;
  // Check that the insertion really worked. If the last inserted id is greater than zero, the insertion worked.
  $lastInsertId = $conn->lastInsertId();
  if($lastInsertId)
  {
  // Message for successfull insertion
  echo "Record inserted successfully";
  $_SESSION["success"] = "true";
  header("Location: admin.php"); 
  }
  else 
  {
  // Message for unsuccessfull insertion
  echo "Error!! Record Not Saved!";
  header("Location: addAdmin.php?error=none");
  }

}
else {

  header("Location: addAdmin.php?error=recordexist");

}

?>