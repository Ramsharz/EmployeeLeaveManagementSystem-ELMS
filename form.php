<?php
session_start();
include("header.php");
include("create.php");
include ("read.php");



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
	
<?php include("nav-bar.php");?>


	<div class="panel panel-default">	
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		
		
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Forms</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Leave Application Form</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-10 col-lg-offset-1">
				
				
				<div class="panel panel-default">
					<div class="panel-heading">Forms</div>
					<div class="panel-body">
						<div class="col-md-8 col-lg-offset-2">
							<form role="form">
							
                            <fieldset>

<div class = "form-group">
<label>Leave Type</label>
<div class="radio">
                

<?php $leaves = leave();
foreach($leaves as $leave):?>
                <div class="radio-inline">
                    <label>
                        <input type="radio" name="optionsRadios" id="<?=$leave["leave_id"]?>" value="<?=$leave["leave_id"]?>">
                        <?= $leave["leave_description"];?>
                    </label>
                </div>

<?php endforeach; ?>
                
</div>
</div>
<div class="form-group">
<label > Applied By: </label>        
<input class="form-control" placeholder="Applied By" name="uname" type="text" autofocus="" value = "<?=$_SESSION["name"]?>" >
    
    </div>
    <div class="form-group">
    <label > Employee Id: </label>
        <input class="form-control" placeholder="Employee Id"   value = "<?=$_SESSION["user_id"]?>" name="empid" type="text" autofocus=""  >
    </div>
    <div class="form-group">
        <label > From: </label>
        <input class="form-control" placeholder="From" name="start" type="date" autofocus="" required>
    </div>
    <div class="form-group">
    <label > Till: </label>
        <input class="form-control" placeholder="Till" name="end" type="date" autofocus=""  required>
    </div>
    <div class="form-group">
    <label>Reason</label>
        <textarea class="form-control"  rows = "2" placeholder="Reason" name="rsn" type="text" autofocus="" required>
        </textarea>
    </div>
    <div class="form-group">
    <label>Address</label>
        <textarea class="form-control"  rows = "3"  placeholder="Address" name="address" type="text" autofocus="" required>
        </textarea>	
    
    </div>
    
    <div class="form-group">
    <button class="btn btn-primary btn-md" type ="submit" name="submit"  >
    Send
    </button>
    </div>
    
</fieldset>
							</form>
						</div>
					</div>
				</div><!-- /.panel-->
			</div><!-- /.col-->
			
		</div><!-- /.row -->
	<?php include("footer.php");?>				</div>
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
       $("#lf").addClass("active");
    });
</script>

</body>
<footer>
		
</footer>
</html>