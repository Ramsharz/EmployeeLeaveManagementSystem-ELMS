<?php
if(isset($_POST['submit'])){
  require_once'connection.php';
  //require 'updateAdmin.php';
  //getting data from form
  $name = $_POST["uname"];
  $lname = $_POST["lname"];
  $phone = $_POST["phone"];
  $email = $_POST["email"];
  $pwd = $_POST["pwd"];
  //$id = $_GET["id"];
  
  //check if record already exists
  
  
    $sqlquery = "UPDATE Admin SET first_name = ?,last_name=?, email = ?, phone_no = ?, password = ? WHERE user_id = '$id' ";
    $query = $conn->prepare($sqlquery);
    
    // Query Execution
    $query->execute(array($name,$lname,$email,$phone,$pwd));
    echo $sqlquery;
    // Check that the insertion really worked. If the last inserted id is greater than zero, the insertion worked.
    
    // Message for successfull insertion
    echo "Record inserted successfully";
    ob_start();
    header("Location: admin.php"); 
   ob_end_flush();
  
 
}

?>
<?php
//session_start();

function update_admin($id)
{
  if(isset($_POST['submit'])){
    require_once'connection.php';
    //require 'updateAdmin.php';
    //getting data from form
    $name = $_POST["uname"];
    $lname = $_POST["lname"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    //$id = $_GET["id"];
    
    //check if record already exists
    
    
      $sqlquery = "UPDATE Admin SET first_name = ?,last_name=?, email = ?, phone_no = ?, password = ? WHERE user_id = '$id' ";
      $query = $conn->prepare($sqlquery);
      
      // Query Execution
      $query->execute(array($name,$lname,$email,$phone,$pwd));
      echo $sqlquery;
      // Check that the insertion really worked. If the last inserted id is greater than zero, the insertion worked.
      
      // Message for successfull insertion
      echo "Record inserted successfully";
      ob_start();
      header("Location: admin.php"); 
     ob_end_flush();
    
   
}
}

function update_section(){
  if(isset($_POST['submit'])){
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
      ob_start();
      header("Location: section.php"); 
      ob_end_flush();
}
}
function update_designation(){
  if(isset($_POST['submit'])){
 
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
  ob_start();
  header("Location: designation.php"); 
  ob_end_flush();
}
}

function update_status(){
  if(isset($_POST['submit'])){
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
      ob_start();
      header("Location: app_status.php"); 
      ob_end_flush();
    
}
}
function update_leave(){

  if(isset($_POST['submit'])){
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
  ob_start();
  header("Location: leave_lookup.php"); 
  ob_end_flush();
 
}
}





?>