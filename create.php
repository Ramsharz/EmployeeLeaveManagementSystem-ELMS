
<?php
//session_start();

function create_admin()
{   
   if(isset($_POST['submit'])){
    require_once'connection.php';
    
    //getting data from form
    $name = $_POST["uname"];
    $lname = $_POST["lname"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
 
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
      ob_start();
      header("Location: admin.php");
      ob_end_flush();
       
      }
      else 
      {
      // Message for unsuccessfull insertion
      ob_start();
      header("Location: addAdmin.php?error=none");
      }
      ob_end_flush();
    }
    else {
    ob_start();
   header ("Location: addAdmin.php?error=recordexist");
   ob_end_flush();
    }
    
}
}

function create_employee()
{
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
      $query->bindParam(':cb',$cb,PDO::PARAM_STR);
      $query->bindParam(':eml',$email,PDO::PARAM_STR);
      $query->bindParam(':cno',$phone,PDO::PARAM_STR);
      $query->bindParam(':ds',$des,PDO::PARAM_STR);
      $query->bindParam(':sc',$sec,PDO::PARAM_STR);
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
      ob_start();
      header("Location: employee.php");
      ob_end_flush();
       
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
}


function create_section(){
  if(isset($_POST['submit'])){
  require_once'connection.php';

  //getting data from form
  $name = $_POST["sname"];
  $cb = $_POST["cb"];
  
  //check if record already exists
  $stmt = $conn->prepare("SELECT* FROM section WHERE  section_name ='$name' ");
    //echo "SELECT first_name, last_name FROM registered WHERE  email='$name' AND password='$pwd1'";
    $stmt->execute();
    $result= $stmt->rowCount();
  if($result  == false ){
    $sqlquery = "INSERT INTO section(section_name,created_by)VALUES(:sn,:cb)";
    $query = $conn->prepare($sqlquery);
    $query->bindParam(':sn',$name,PDO::PARAM_STR);
    $query->bindParam(':cb',$cb,PDO::PARAM_STR);
    
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

    ob_start();
    header("Location: section.php"); 
  ob_end_flush();  
  }
    else 
    {
    // Message for unsuccessfull insertion
    echo "Error!! Record Not Saved!";
    ob_start();
    header("Location: addSection.php?error=none");
    ob_end_flush();
    }
  
  }
  else {
  ob_start();
    header("Location: addSection.php?error=recordexist");
  ob_end_flush();
  }


}
}
function create_designation(){
  if(isset($_POST['submit'])){
  require_once'connection.php';

  //getting data from form
  $name = $_POST["dname"];
  $section_id = $_POST["section_id"];
  $esc = $_POST["esc_lvl"];
  $grade = $_POST["grade"];
  
  //check if record already exists
  $stmt = $conn->prepare("SELECT* FROM designation_lookup WHERE  designation_name ='$name' ");
    //echo "SELECT first_name, last_name FROM registered WHERE  email='$name' AND password='$pwd1'";
    $stmt->execute();
    $result= $stmt->rowCount();
  if($result  == false ){
    $sqlquery = "INSERT INTO designation_lookup(designation_name, grade, escalation_level)VALUES(:dn,:gr,:esc)";
    $query = $conn->prepare($sqlquery);
    $query->bindParam(':dn',$name,PDO::PARAM_STR);
    
    $query->bindParam(':gr',$grade,PDO::PARAM_STR);
    $query->bindParam(':esc',$esc,PDO::PARAM_STR);
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
    $_SESSION["Sid"] = $lastInsertId;
    ob_start();
    header("Location: designation.php"); 
    ob_end_flush();  
  }
    else 
    {
    // Message for unsuccessfull insertion
    echo "Error!! Record Not Saved!";
    ob_start();
    header("Location: addDesignation.php?error=none");
    ob_end_flush();  
  }
  
  }
  else {
    ob_start();
    header("Location: addDesignation.php?error=recordexist");
    ob_end_flush();
  }
    
}
}

function create_status(){
  if(isset($_POST['submit'])){
  require_once'connection.php';

  //getting data from form
  $code = $_POST['scode'];
  $dp = $_POST['dp'];
  
  //check if record already exists
  $stmt = $conn->prepare("SELECT* FROM app_status WHERE  app_status_code ='$scode' ");
    //echo "SELECT first_name, last_name FROM registered WHERE  email='$name' AND password='$pwd1'";
    $stmt->execute();
    $result= $stmt->rowCount();
  if($result  == false ){
    $sqlquery = "INSERT INTO app_status(app_status_code,app_status_description)VALUES(:ac,:ad)";
    $query = $conn->prepare($sqlquery);
    $query->bindParam(':ac',$code,PDO::PARAM_STR);
    $query->bindParam(':ad',$dp,PDO::PARAM_STR);
    
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
    ob_start();
    header("Location: app_status.php"); 
  ob_end_flush();  
  }
    else 
    {
    // Message for unsuccessfull insertion
    echo "Error!! Record Not Saved!";
    ob_start();
    header("Location: addAppStatus.php?error=none");
  ob_end_flush();  
  }
  
  }
  else {
  ob_start();
    header("Location: addAppStatus.php?error=recordexist");
  ob_end_flush();
  }
    
}
}
function create_leave(){

  if(isset($_POST['submit'])){
  // include database connection file
require_once'connection.php';

//getting data from form
$dp = $_POST["dp"];
$days = $_POST["days"];
$cb = $_POST["cb"];




//check if record already exists
$stmt = $conn->prepare("SELECT* FROM leave_lookup WHERE  leave_description ='$dp' AND days = '$days' ");
  //echo "SELECT first_name, last_name FROM registered WHERE  email='$name' AND password='$pwd1'";
  $stmt->execute();
  $result= $stmt->rowCount();
if($result  == false ){
  $sqlquery = "INSERT INTO leave_lookup(leave_description, days, created_by)VALUES(:dp,:dy,:cb)";
  $query = $conn->prepare($sqlquery);
  $query->bindParam(':dp',$dp,PDO::PARAM_STR);
  $query->bindParam(':dy',$days,PDO::PARAM_STR);
  $query->bindParam(':cb',$cb,PDO::PARAM_STR);
 
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
  ob_start();
  header("Location: leave_lookup.php"); 
ob_end_flush();  
}
  else 
  {
  // Message for unsuccessfull insertion
  echo "Error!! Record Not Saved!";
  ob_start();
  header("Location: addleavelookup.php?error=none");
ob_end_flush();  
}

}
else {
ob_start();
  header("Location: addleavelookup.php?error=recordexist");
ob_end_flush();
}
  
}
}
function dateDiffInDays($date1, $date2) 
  {
     
      // Calculating the difference in timestamps
      $diff = strtotime($date2) - strtotime($date1);
  
      // 1 day = 24 hours
      // 24 * 60 * 60 = 86400 seconds
      return abs(round($diff / 86400));
  }
function apply_leave()
{

  if(isset($_POST['submit'])){
    // include database connection file
  require'connection.php';
  
  //getting data from form
  $uname = $_POST["uname"];
  $eid = $_POST["empid"];
  $start = $_POST["start"];
  $end = $_POST["end"];
  $rsn = $_POST["rsn"];
  $adrs = $_POST["address"];
 $leavetype = $_POST["optionsRadios"];
 $days = dateDiffInDays($start,$end); 
$lid = 1;

 $sqlquery = "INSERT INTO main_leave_table(emp_id, applied_by,start_date, end_date,days,address_on_leave,reason, leave_id)VALUES(:eid,:aby,:sd,:ed,:dd,:adrs,:rsn,:lid)";
 $query = $conn->prepare($sqlquery);
 $query->bindParam(':eid',$eid,PDO::PARAM_STR);
 $query->bindParam(':aby',$uname,PDO::PARAM_STR);
 $query->bindParam(':sd',$start,PDO::PARAM_STR);
 $query->bindParam(':ed',$end,PDO::PARAM_STR);
 $query->bindParam(':dys',$days,PDO::PARAM_STR);
 $query->bindParam(':adrs',$start,PDO::PARAM_STR);
 $query->bindParam(':rsn',$rsn,PDO::PARAM_STR);
 $query->bindParam(':lid',$lid,PDO::PARAM_STR);
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
 ob_start();
 header("Location: AleaveForm.php"); 
ob_end_flush();  
}
 else 
 {
 // Message for unsuccessfull insertion
 echo "Error!! Record Not Saved!";
 ob_start();
 header("Location: AleaveForm.php?error=none");
ob_end_flush();  
}

  




}  

}
?>