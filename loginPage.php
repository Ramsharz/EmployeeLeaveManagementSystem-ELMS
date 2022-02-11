<?php 
// include database connection file
require_once'connection.php';
//getting data from form


$uname = $_POST["uname"];
$pwd1 = $_POST["pwd"];
echo $uname." ".$pwd1;
$check = $_POST["optionsRadios"];

if($check == "employee"){

  require_once'connection.php';
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
  $stmt = $conn->prepare("SELECT* FROM employee WHERE  email='$uname' AND password='$pwd1'");
  //echo "SELECT first_name, last_name FROM registered WHERE  email='$name' AND password='$pwd1'";
  $stmt->execute();
  
  $result= $stmt->rowCount();

  //explore rowCount()

  // set the resulting array to associative
  //$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
 
  if($result == true) {
    //echo $result;
    
    $fname = $stmt->fetchColumn(1);
    $stmt->execute();
    //$lname = $stmt->fetchColumn(2);
    $stmt->execute();
    $user_id = $stmt->fetchColumn(0);
    echo "Login Successful!";
    session_start();
    $_SESSION["user_name"] = $uname;  
     $_SESSION["time_start_login"] = time(); 
     
     $_SESSION["name"] = $fname ;
    
     $_SESSION["user_id"]= $user_id;

     $_SESSION["user_type"] = "employee";
     //echo $_SESSION["user_name"];
     
    header("Location: index.php?error=none");
    
  }
  else {
    //require_once 'login.php';   
   //$show = "block";
   //$_SESSION['message']="Incorrect Username or Password."; 
   header("location:login.php?error=login");
   
   //header("Location: form.php");
   //echo "can't login!";
   
  
  }



}
else {
//setting up connection
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "UserData";


  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
  $stmt = $conn->prepare("SELECT* FROM Admin WHERE  email='$uname' AND password='$pwd1'");
  //echo "SELECT first_name, last_name FROM registered WHERE  email='$name' AND password='$pwd1'";
  $stmt->execute();
  
  $result= $stmt->rowCount();

  //explore rowCount()

  // set the resulting array to associative
  //$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
 
  if($result == true) {
    //echo $result;
    
    $fname = $stmt->fetchColumn(1);
    $stmt->execute();
    $lname = $stmt->fetchColumn(2);
    $stmt->execute();
    $user_id = $stmt->fetchColumn(0);
    echo "Login Successful!";
    session_start();
    $_SESSION["user_name"] = $uname;  
     $_SESSION["time_start_login"] = time(); 
     
     $_SESSION["lname"] = $lname ;
     $_SESSION["fname"]= $fname;
     $_SESSION["name"] = $fname." ".$lname;
     $_SESSION["user_id"]= $user_id;
     //echo $_SESSION["user_name"];
     $_SESSION["user_type"] = "admin";
     
    header("Location: index.php?error=none");
    
  }
  else {
    //require_once 'login.php';   
   //$show = "block";
   //$_SESSION['message']="Incorrect Username or Password."; 
   header("location:login.php?error=login");
   
   //header("Location: form.php");
   //echo "can't login!";
   
  
  }
}
?>