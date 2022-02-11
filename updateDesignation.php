<?php
session_start();
require "read.php";
require_once "connection.php";
include("header.php");
$id = $_GET['id'];
$stmt = $conn->prepare("SELECT* FROM designation_lookup WHERE  designation_id='$id' ");

$result= $stmt->rowCount();

 
if($result == true) {
  //echo $result;
 

  // echo $cb;
  // echo $name;
}

  $stmt->execute();
  $name = $stmt->fetchColumn(1);
  $stmt->execute();

$esc = $stmt->fetchColumn(3);
$stmt->execute();
$grade = $stmt->fetchColumn(2);

//echo $name.$grade.$esc.$section_id;
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
	<?php include("nav-bar.php");?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<a href="designation.php">Designation /</a> <li class="active">Update Designation</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Update Designation</h1>	
              
            </div><!--/.row-->
        
            <div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Update Designation</div>
				<div class="panel-body">
                <form role="form" name="UpdateDesignationForm"  method = "post" action="update_designation.php?id=<?=$_GET['id']?>">
                <fieldset>
                        <div class="form-group">
								<input class="form-control" placeholder="<?=$name?>" value="<?=$name?>"
                                 name="dname" type="text" autofocus=""  
                        >
							</div>
                            <div class="form-group">
                            <label for="grade">Grade</label>

                            <select class = "form-control "id="grade" name="grade" value="<?=$grade?>">
                            <option value="15" <?php if($grade == 15){echo 'selected';}?>>15</option>
                            <option value="17" <?php if($grade == 17){echo 'selected';}?>>17</option>
                            <option value="18" <?php if($grade == 18){echo 'selected';}?>>18</option>
                            <option value="19" <?php if($grade == 19){echo 'selected';}?>>19</option>
                            </select>
							</div>
                            <div class="form-group">
                            <label for="esc_lvl">Escalation Level</label>
                            <select class = "form-control "id="esc_lvl" name="esc_lvl" value="<?=$esc?>">
                            <option value="2" <?php if($esc == 2){echo 'selected';}?>>2</option>
                            <option value="3" <?php if($esc == 3){echo 'selected';}?>>3</option>
                            </select>
							</div>
							
							
							
							<div class="form-group">
                            <button class="btn btn-primary btn-md" type ="submit" >
                            Create Designation
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
       $("#des").addClass("active");
    });
</script>	
</body>
<footer>
<?php include("footer.php");?>		
</footer>
</html>