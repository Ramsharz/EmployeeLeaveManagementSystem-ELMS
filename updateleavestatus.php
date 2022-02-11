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
function get_leave()
{  $id =  $_GET["id"] ;
	require 'connection.php';
	
	$stmt = $conn->prepare("SELECT* FROM main_leave_table WHERE  main_id ='$id' ");
	 
	  $stmt->execute();
    
	  return $stmt->fetch(PDO::FETCH_ASSOC);

	 
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
				<li class="active">Update Leave Status</li>
			</ol>
		</div><!--/.row-->	
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Update Leave Status</h1>
               
			</div>
        
     	<?php  
         $data = get_leave();
         ?>
   <div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-2">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Leave Application Form</div>
				<div class="panel-body">
					<form role="form" name="loginForm"  method = "post" action="">
						<fieldset>

                        <div class = "form-group">
                        <label>Leave Type</label>
                        <input class="form-control" placeholder="Applied By" name="uname" type="text" autofocus="" value = "<?=leave_type($data['leave_id'])?>" disabled = "disabled" >
</div>
                        <div class="form-group">
								<input class="form-control" placeholder="Applied By" name="uname" type="text" autofocus="" value = "<?=$data['applied_by']?>"disabled = "disabled" >
							
                            </div>
                            <div class="form-group">
								<input class="form-control" disabled = "disabled" placeholder="Employee Id"   value = "<?=$data['emp_id']?>" name="empid" type="text" autofocus=""  >
							</div>
                            <div class="form-group">
                                <label > From: </label>
								<input class="form-control" disabled = "disabled" placeholder="From" name="start" type="date" autofocus=""  value = "<?=$data['start_date']?>">
							</div>
                            <div class="form-group">
                            <label > Till: </label>
								<input class="form-control" disabled = "disabled" placeholder="Till" name="end" type="date" autofocus=""   value = "<?=$data['end_date']?>">
							</div>
							<div class="form-group">
                            <label>Reason</label>
								<input type ="text" class="form-control" disabled = "disabled"  rows = "2" placeholder="Reason" name="rsn" type="text" autofocus=""  value = "<?=$data['reason']?>">
                                
                            </div>
							<div class="form-group">
							<label>Address</label>
								<input type="text" class="form-control" disabled = "disabled" rows = "3"  placeholder="Address" name="address" type="text" autofocus=""  value = "<?=$data['address_on_leave']?>">
							</div>		
						</fieldset>
					
						 
					</form>
				</div>
			</div>
		</div><!-- /.col-->


        <div class="col-xs-10 col-xs-offset-0 col-sm-8 col-sm-offset-0 col-md-4 col-md-offset-0">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Update Status</div>
				<div class="panel-body">
					<form role="form" name="loginForm"  method = "post" action="updatelstatus.php?id=<?=$_GET["id"]?>">
						<fieldset>

                        <div class = "form-group">
                        <label>Update Status</label>
                        <select class = "form-control "id="status" name= "status" onchange = "showDiv()">
                        <option value="Pending"  selected>
								Pending
								</option>
                                <option value="Approved">
								Approved
								</option>
                                <option value="Rejected">
								Rejected
								</option>
                        
                    </select>
</div>
<div class="form-group" id = "hidden" style= "display: none;">
<label > Approved By: </label>
								<input class="form-control" placeholder="Approved By" name="approvedby" type="text"  autofocus="" value="<?= $_SESSION["fname"]." ".$_SESSION["lname"]?>" readonly="readonly">
</div>
<div class="form-group" id = "hidden2" style= "display: none;">
<label > Recommended By: </label>
								<input class="form-control" placeholder="Rec By" name="rcby" type="text" autofocus="" value="">
</div><div class="form-group" id = "hidden3" style= "display: none;">
<label > Assigned To: </label>
								<input class="form-control" placeholder="Assigned To" name="assigned" type="text" autofocus="" value="">
</div><div class="form-group" id = "hidden4" style= "display: none;">
<label > Feedback: </label>
								<input class="form-control" placeholder="Feedback" name="fb" type="text" autofocus="" value="">
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
       $("#vla").addClass("active");
    });
</script>
<script type="text/javascript">
  
//   $("#status").on("change", function() {
//     $("#" + $(this).val()).show().siblings().hide();
// })
function showDiv(){
var val = document.getElementById('status').value;
if(val == "Approved"){
   document.getElementById('hidden').style.display = "block";
   document.getElementById('hidden2').style.display = "block";
   document.getElementById('hidden3').style.display = "block";
   document.getElementById('hidden4').style.display = "block";
}
else if( val == "Rejected"){

   document.getElementById('hidden').style.display = "none";
   document.getElementById('hidden2').style.display = "none";
   document.getElementById('hidden3').style.display = "none";
   document.getElementById('hidden4').style.display = "none";
}

else if( val == "Pending")
{
   document.getElementById('hidden').style.display = "none";
   document.getElementById('hidden2').style.display = "none";
   document.getElementById('hidden3').style.display = "none";
   document.getElementById('hidden4').style.display = "none";
}


}

</script>

</body>
<footer>
<?php include("footer.php");?>		
</footer>
</html>