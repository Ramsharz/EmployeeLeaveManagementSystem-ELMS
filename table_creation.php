<?php  
//setting up connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ELMS";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // sql to create table
  $query = 'CREATE TABLE Admin( 
    user_id   INT AUTO_INCREMENT,
    first_name  VARCHAR(100) NOT NULL, 
    last_name   VARCHAR(100) NULL,
    phone_no VARCHAR(50) NULL,
    email VARCHAR(50) NULL,
    password VARCHAR(10) NOT NULL,  
    PRIMARY KEY(user_id)
);';
  // use exec() because no results are returned
  $conn->exec($query);
  echo "Table created successfully";
} catch(PDOException $e) {
  echo $query . "<br>" . $e->getMessage();
}
$conn = null;
?>
