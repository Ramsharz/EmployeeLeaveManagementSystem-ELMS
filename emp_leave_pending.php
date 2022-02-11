<?php
session_start();
include("header.php");
include("create.php");
include ("read.php");
function leave_type($id)
{
	require 'connection.php';
	//check if record already exists
	$stmt = $conn->prepare("SELECT leave_description FROM leave_lookup WHERE  leave_id ='$id' ");
	  //echo "SELECT first_name, last_name FROM registered WHERE  email='$name' AND password='$pwd1'";
	  $stmt->execute();
    //   echo $stmt ->fetchColumn();
	//   exit();
	  return $stmt->fetchColumn();

	 
}


?>
<!DOCTYPE html>
<html>
<head>
<link href="assets/images/favicon.ico" rel="shortcut icon">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ELMS - Apply Leave</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
<div class="container-lg">	
<?php include("nav-bar.php");?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Leave Requests</li>
			</ol>
		</div><!--/.row-->	
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Leave Requests</h1>
               
			</div>
        
            <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Employee ID</th>
      <th scope="col">Full Name</th>
      <th scope="col">Leave Type</th>
      <th scope="col">Days</th>
      <th scope="col">From</th>
      <th scope="col">Till</th>
      <th scope="col">Reason</th>
      <th scope="col">Address</th>
      <th scope="col">Assigned To</th>
      <th scope="col">Recommended By</th>
      <th scope="col">Approved By</th>
      <th scope="col">Status</th>
      <th scope="col">Feedback</th>

      <th scope="col"> </th>
    </tr>
  </thead>



  <tbody>
    <?php 
	$leaves = leave_app();
	foreach ($leaves as $leave): ?>
            <tr>
                <?php if($leave['emp_id'] == $_SESSION["user_id"]){?>
            <td><?=$leave['main_id']?></td>
                <td><?=$leave['emp_id']?></td>
                <td><?=$leave['applied_by']?></td>
                <td><?=leave_type($leave['leave_id']);?></td>
                <td><?=$leave['days']?></td>
                <td><?=$leave['start_date']?></td>
                <td><?=$leave['end_date']?></td>
                <td><?=$leave['reason']?></td> 
                <td><?=$leave['address_on_leave']?></td> 
                <td> <?=$leave['assigned_to']?></td>       
                <td> <?=$leave['recommended_by']?></td>       
                <td> <?=$leave['approved_by']?></td>       
                <td> <?=$leave['status']?></td> 
                <td> <?=$leave['feedback']?></td>                      
                <td class="actions">
                  
               
                <button type="button" class="btn btn-warning btn-sm" onclick="location.href='updateleavestatus.php?id=<?=$leave['main_id']?>'">
          <span class="glyphicon glyphicon-edit"></span> Delete
        </button>


                
               

				</td>
                <?php }?>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
  </tbody>
</table>	
				</div>	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script>
		window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
};
	</script>

</script>
		<script type="text/javascript">
    $(document).ready( function(){
       $("#pl").addClass("active");
    });
</script>

</body>
<footer>
<?php include("footer.php");?>		
</footer>
</html>