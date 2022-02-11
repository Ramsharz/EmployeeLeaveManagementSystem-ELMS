<?php
session_start();


?>
<!DOCTYPE html>
<html>
<head>
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
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
					<a class="navbar-brand" href="#">
      <img src="pitc.png" alt="" width="30" height="24" class="img img-circle">
    </a>

				<a class="navbar-brand" href="#"><span>PITC-ELMS</span> (Admin)</a>
				<ul class="nav navbar-top-links navbar-right">
					<li class="dropdown">
					<?session_unset();
            session_destroy();
            ?>
                         <button type="button" class="btn btn-primary btn-sm" onclick="location.href='login.php'">
          <span class="glyphicon glyphicon-log-out"></span> Log out
        </button>
			     
					
						
						
					</li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="pitc.png" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><?php echo $_SESSION["fname"]." ".$_SESSION["lname"]?></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li class=""><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li><a href="admin.php"><em class="fa fa-child">&nbsp;</em>Admin</a></li>
			<li class = "active"><a href="changepassword.php"><em class="fa fa-cog">&nbsp;</em> Change Password</a></li>
			<li><a href="login.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="">Change Password</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Change Password</h1>
			</div>
		</div><!--/.row-->
		
		
        <div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Update Password </div>
				<div class="panel-body">
					<form role="form" name="loginForm" action="loginPage.php" method = "post">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Old Password" name="opwd" type="password" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="npwd" type="password" value="">
							</div>
							<div class="checkbox">
								
							</div>
							<div class="form-group">
								<input class="btn btn-primary"  name="update" type="submit" >	
							</div>
							
						</fieldset>
						<div class="form-group" <?php if (isset($_GET['error'] )){?>style="display:block;"<?php }
                    else{?> style="display:none;"<?php } ?> >
                        <p class="p-3 mb-2 bg-warning text-white">Can't Login! Incorrect Password, Try Again.
                            
                          </p>
                     
                    </div>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->			
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
		
</body>
</html>