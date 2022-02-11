<?php
session_start();
require "read.php";
require_once "connection.php";
include("header.php");
$id = $_GET['id'];
$stmt = $conn->prepare("SELECT* FROM leave_lookup WHERE  leave_id='$id' ");

$result= $stmt->rowCount();

 
if($result == true) {
  //echo $result;
 

  // echo $cb;
  // echo $name;
}

  $stmt->execute();
  $dp = $stmt->fetchColumn(1);
  $stmt->execute();
$days = $stmt->fetchColumn(2);
$stmt->execute();
$cb = $stmt->fetchColumn(3);
$stmt->execute();
$co = $stmt->fetchColumn(4);

//echo $dp.$days.$cb.$co;
//exit();

  

 


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ELMS - Admin</title>
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
	<?php include("nav-bar.php"); ?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php">
					<em class="fa fa-home"></em>
				</a></li>
				<a href="leave_lookup.php">Leave Lookup /</a> <li class="active">Update Leave Lookup</li>
			</ol>
		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Update App Lookup</h1>	
              
            </div><!--/.row-->
        
            <div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Update Lookup</div>
				<div class="panel-body">
					<form role="form" name="LLForm"  method = "post" action="update_leave.php?id=<?=$_GET['id']?>">
						<fieldset>
                        <div class="form-group">
								<input class="form-control" placeholder="<?=$dp?>"
                                value="<?=$dp?>" name="dp" type="text" autofocus="" 
                        >
							</div>
                            <div class="form-group">
							<label for="days">Days</label>

<select class = "form-control "id="days" name="days">
<option value="15"<?php if($days == 15){echo 'selected';}?>>15</option>
<option value="25" <?php if($days == 25){echo 'selected';}?>>25</option>
<option value="45" <?php if($days == 45){echo 'selected';}?>>45</option>

</select>
    
							</div>
                            <div class="form-group">
                            <input class="form-control" placeholder="Created By" name="cb" type="text" autofocus=""
                            value = "<?=$_SESSION["fname"]." ".$_SESSION["lname"]?>" >
							</div>
                            <div class="form-group">
                            <label for = "date">Created On:</label>
                            <input class="form-control" placeholder="" name="date" type="date" autofocus=""
                            value = "getDate()" onload="getDate()" >
							</div>
							
							<div class="form-group">
                            <button class="btn btn-primary btn-md" type ="submit" >
                            Update Lookup
                            </button>
							</div>
							
						</fieldset>
					
                     
						 
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
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
		<script type="text/javascript">
    $(document).ready( function(){
       $("#leave").addClass("active");
    });
</script>
</body>
<footer>
<?php include("footer.php");?>		
</footer>
</html>