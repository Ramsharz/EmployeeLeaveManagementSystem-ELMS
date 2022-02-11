<?php
session_start();
include("header.php");
require "read.php";
require_once "connection.php";
$id = $_GET['id'];
$stmt = $conn->prepare("SELECT* FROM Admin WHERE  user_id='$id' ");
  
  $stmt->execute();
  
  $result= $stmt->rowCount();

 
  if($result == true) {
    //echo $result;
    $lname= $stmt->fetchColumn(2);
    $stmt->execute();
	$fname=$stmt->fetchColumn(1);
	$stmt->execute();
	$phone=$stmt->fetchColumn(3);
	$stmt->execute();
	$email=$stmt->fetchColumn(4);
	$stmt->execute();
	$pwd=$stmt->fetchColumn(5);


}
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
	<?php include("nav-bar.php");?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<a href="admin.php">Admin /</a> <li class="active">Update Admin</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Update Admin</h1>	
              
            </div><!--/.row-->
        
            <div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Update Admin Record</div>
				<div class="panel-body">
                <form role="form" name="loginForm"  method = "post" action="update.php?id=<?=$_GET['id']?>">
						<fieldset>
                        <div class="form-group">
								<input class="form-control" value="<?=$fname?>" placeholder="<?=$fname?>" name="uname" type="text" autofocus="" pattern="[A-Za-z]+"
                       title = "Only Alphabets" oninvalid="setCustomValidity('Invalid Value, Please Enter Alphabets Only')" required>
							</div>
                            <div class="form-group">
								<input class="form-control" value="<?=$lname?>" placeholder="<?=$lname?>" name="lname" type="text" autofocus="" pattern="[A-Za-z]+"
                       title = "Only Alphabets" oninvalid="setCustomValidity('Invalid Value, Please Enter Alphabets Only')" required>
							</div>
                            <div class="form-group">
								<input class="form-control" value="<?=$phone?>" placeholder="<?=$phone?>" name="phone" type="text" autofocus=""pattern="[0-9]{11}" required>
							</div>
							<div class="form-group">
								<input class="form-control" value="<?=$email?>" placeholder="<?=$email?>" name="email" type="email" autofocus="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title = "ex: user@info.com" 
                      required>
							</div>
							<div class="form-group">
								<input class="form-control" value="<?=$pwd?>" placeholder="<?=$pwd?>" name="pwd" type="password" value=""  pattern=".{6,}" title="Six or more characters" required >
							</div>
							
							<div class="form-group">
                            <button class="btn btn-primary btn-md" type ="submit" >
                            Update
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

</script>
		<script type="text/javascript">
    $(document).ready( function(){
       $("#admin").addClass("active");
    });
</script>
		
</body>
<footer>
<?php include("footer.php");?>		
</footer>
</html>