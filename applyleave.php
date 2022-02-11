<?php
function dateDiffInDays($date1, $date2) 
{
   
    // Calculating the difference in timestamps
    $diff = strtotime($date2) - strtotime($date1);

    // 1 day = 24 hours
    // 24 * 60 * 60 = 86400 seconds
    return abs(round($diff / 86400));
}?>

<?php
require'connection.php';
  
  //getting data from form
  // $uname = $_POST["uname"];
  // $eid = $_POST["empid"];
  $fname = $_POST["uname"];
  $empid = $_POST["emp"];
  $start = $_POST["start"];
  $end = $_POST["end"];
  $rsn = $_POST["rsn"];
  $adrs = $_POST["address"];
 $lid = $_POST["optionsRadios"];
 $days = dateDiffInDays($start,$end); 


 $sqlquery = "INSERT INTO main_leave_table(emp_id, applied_by,start_date, end_date,days,address_on_leave,reason, leave_id)VALUES(:eid,:aby,:sd,:ed,:dd,:adrs,:rsn,:lid)";
 $query = $conn->prepare($sqlquery);
 $query->bindParam(':eid',$empid,PDO::PARAM_STR);
 $query->bindParam(':aby',$fname,PDO::PARAM_STR);
 $query->bindParam(':sd',$start,PDO::PARAM_STR);
 $query->bindParam(':ed',$end,PDO::PARAM_STR);
 $query->bindParam(':dd',$days,PDO::PARAM_STR);
 $query->bindParam(':adrs',$adrs,PDO::PARAM_STR);
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

  





?>