<?php
session_start();
include("header.php");
function count_emp()
{
	require_once'connection.php';
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
	$stmt2 = $conn->prepare("SELECT COUNT(*) FROM employee");
	$stmt2->execute();
	
	 $employees = $stmt2->fetchColumn();
     return $employees;
}

function count_leaves()
{
	require 'connection.php';
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
	$stmt2 = $conn->prepare("SELECT COUNT(*) FROM main_leave_table");
	$stmt2->execute();
	
	 $employees = $stmt2->fetchColumn();
     return $employees;
}

function count_pending()
{
	require 'connection.php';
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
	$stmt2 = $conn->prepare("SELECT COUNT(*) FROM main_leave_table WHERE status = 'Pending'");
	$stmt2->execute();
	
	 $employees = $stmt2->fetchColumn();
     return $employees;
}
?>
<!DOCTYPE html>
<html>
<head>
<link href="assets/images/favicon.ico" rel="shortcut icon">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ELMS - Dashboard</title>
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
	
<?php include("nav-bar.php");?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->	
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->	
		<div class="panel panel-container">
			<div class="row">
				<div class="col-xs-6 col-md-4 col-lg-4 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
							<div class="large"><?php echo count_emp(); ?></div>
							<div class="text-muted">Employees</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-4 col-lg-4 no-padding">
					<div class="panel panel-blue panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-plane color-orange"></em>
							<div class="large"><?php echo count_leaves(); ?></div>
							<div class="text-muted">Leave</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-4 col-lg-4 no-padding">
					<div class="panel panel-orange panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-check text-info"></em>
							<div class="large">4</div>
							<div class="text-muted">Approved</div>
						</div>
					</div>
				</div>	
			</div><!--/.row-->
		</div>
		<div class="panel panel-container">
		<div class = "row">
		<div class="col-xs-6 col-md-6 col-lg-6 no-padding">
					<div class="panel panel-red panel-widget border-right ">
						<div class="row no-padding"><em class="fa fa-info text-warning fa-xl"></em>
							<div class="large"><?php echo count_pending(); ?></div>
							<div class="text-muted">Pending</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-6 col-lg-6 no-padding">
					<div class="panel panel-red panel-widget ">
						<div class="row no-padding"><em class="fa fa-trash text-danger fa-xl color-red"></em>
							<div class="large">3</div>
							<div class="text-muted">Canceled</div>
						</div>
					</div>
				</div>
</div>
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
       $("#db2").addClass("active");
    });
</script>

</body>

<?php include("footer.php");?>		

</html>