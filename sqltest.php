<?php function des_name($des)
{
	require 'connection.php';
	//check if record already exists
	$stmt = $conn->prepare("SELECT designation_name FROM designation_lookup WHERE  designation_id ='$des' ");
	  //echo "SELECT first_name, last_name FROM registered WHERE  email='$name' AND password='$pwd1'";
	  $stmt->execute();
    //   echo $stmt ->fetchColumn();
	//   exit();
	  return $stmt->fetchColumn();

	 
}


echo des_name(1);
echo des_name(4);
echo des_name(3);
?>