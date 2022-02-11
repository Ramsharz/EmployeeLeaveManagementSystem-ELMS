<?php
if(isset($_POST['submit'])){
 
 require_once'connection.php';

 //getting data from form
 $name = $_POST["fname"];
 $des = $_POST["des"];
 $phone = $_POST["phone"];
 $email = $_POST["email"];
 $sec = $_POST["sec"];
 $cb = $_POST["cb"];

 //check if record already exists
 $stmt = $conn->prepare("SELECT* FROM employee WHERE  email='$email' OR phone ='$phone' ");
   //echo "SELECT first_name, last_name FROM registered WHERE  email='$name' AND password='$pwd1'";
   $stmt->execute();
   $result= $stmt->rowCount();
 if($result  == false ){
   $sqlquery = "INSERT INTO employee(emp_name,email,phone,created_by,des_code,section_code)VALUES(:fn,:eml,:cno,:cb,:ds,:sc)";
   $query = $conn->prepare($sqlquery);
   $query->bindParam(':fn',$name,PDO::PARAM_STR);
   $query->bindParam(':eml',$email,PDO::PARAM_STR);
   $query->bindParam(':cno',$phone,PDO::PARAM_STR);
   $query->bindParam(':cb',$cb,PDO::PARAM_STR);
   $query->bindParam(':ds',$des,PDO::PARAM_STR);
   $query->bindParam(':sc',$sec,PDO::PARAM_STR);
   // Query Execution
   $query->execute();
   echo $sqlquery;
   // Check that the insertion really worked. If the last inserted id is greater than zero, the insertion worked.
   $lastInsertId = $conn->lastInsertId();
   if($lastInsertId)
   {
    $balc =25;
    $bale =45;
    $rnr = 15;
    $sqlquery = "INSERT INTO employee_leave_balance(emp_id,balance_casual,balance_earned,created_by,balance_rnr)VALUES(:id,:balc,:bale,:cb,:rnr)";
    $query = $conn->prepare($sqlquery);
    $query->bindParam(':id',$lastInsertId,PDO::PARAM_STR);
    $query->bindParam(':balc',$balc,PDO::PARAM_STR);
    $query->bindParam(':bale',$bale,PDO::PARAM_STR);
    $query->bindParam(':cb',$cb,PDO::PARAM_STR);
    $query->bindParam(':rnr',$rnr,PDO::PARAM_STR);
    
    // Query Execution
    $query->execute();

$lastid =  $conn->lastInsertId();
if($lastid)
{
 // Message for successfull insertion
   echo "Record inserted successfully";
   $_SESSION["success"] = "true";
   ob_start();
   header("Location: employee.php");
   ob_end_flush();
}
    
   }
   else 
   {
   // Message for unsuccessfull insertion
   ob_start();
   header("Location: emp_form.php?error=none");
   }
   ob_end_flush();
 }
 else {
 ob_start();
header ("Location: emp_form.php?error=recordexist");
ob_end_flush();
 }
 
}
?>