<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lumino - Login</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
<div class="container-lg">
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation" style ="background-color: #e9ecf2;">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
					<a class="navbar-brand" href="#">
      <img src="pitc.png" alt="" width="30" height="24" class="img img-circle">
    </a>

				<a class="navbar-brand" href="#"><span>PITC-ELMS</span> </a>
			
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in </div>
				<div class="panel-body">
					<form role="form" name="loginForm" action="loginPage.php" method = "post">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="uname" type="email" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="pwd" type="password" value="">
							</div>
							<div class = "form-group" >
							<div class="radio">
											<label>
												<input type="radio" name="optionsRadios" id="optionsRadios" value="employee">
                                               Login as Employee
											</label>
										</div>
</div>	

							
							<div class="form-group">
								<input class="btn btn-primary"  name="login" type="submit" >
								<br>
							
									
								
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
</div>	

<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
<footer>
<?php include("footer.php");?>		
</footer>
</html>
