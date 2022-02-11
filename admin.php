<?php
session_start();
include("header.php");
require("read.php");
require("create.php");
//require("delete.php");

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
				<li><a href="index.php">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Admin</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Admin</h1>	
                <button class="btn btn-primary btn-md" type ="submit" onclick="location.href='addAdmin.php'" style="float: right;" >Add New Admin</button>
            </div><!--/.row-->
		
        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Full Name</th>
      <th scope="col">E-mail</th>
      <th scope="col">Phone</th>
      <th scope="col">Password</th>
      <th scope="col">Actions </th>
    </tr>
  </thead>



  <tbody>
    <?php 
	$contacts = admin();
	foreach ($contacts as $contact): ?>
            <tr>
                <td><?=$contact['user_id']?></td>
                <td><?=$contact['first_name']." ".$contact['last_name']?></td>
                <td><?=$contact['email']?></td>
                <td><?=$contact['phone_no']?></td>
                <td><?=$contact['password']?></td>
                
                <td class="actions">
               
                <a href="updateAdmin.php?id=<?=$contact['user_id']?>" title = "Update Record"><i class="fa fa-edit"></i></a>

				
                    <a href="delete.php?id=<?=$contact['user_id']?>" title = "Delete Record" onclick="return confirm('Are You Sure You Want To Delete This Admin ?')"
					name="submit"
					><i class="fa fa-trash"></i></a>

				</td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
  </tbody>
</table>

<!-- <div class="form-group" <?php if (isset($_SESSION )== "true"){?>style="display:block;"<?php }
                    else{?> style="display:none;"<?php } ?> >
                        <p class="p-3 mb-2 bg-warning text-white">Record Saved.
                            
                          </p>
</div>
						 -->
		
<div class="container-lg">
	
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
		<script>
		$(document).ready(function() {  
			var url = window.location;
        $('ul.nav a[href="'+ url +'"]').parent().addClass('active');
        $('ul.nav a').filter(function() {
             return this.href == url;
        }).parent().addClass('active');
});
		</script>
</body>
<footer>
<?php include("footer.php");?>		
</footer>
</html>