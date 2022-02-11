<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="pitc.png" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><?php echo $_SESSION["name"]?></div>
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
		<ul class="nav menu" id= "nav menu">
		<li id = "db" ><a href="index2.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			
			<li id = "lf"><a href="AleaveForm.php"><em class="fa fa-search">&nbsp;</em> Leave Form</a></li>
			<li id = "vla"><a href="ViewLeaveApps.php"><em class="fa fa-search">&nbsp;</em> Leave Applications</a></li>
			<li id = "aps"><a href="app_status.php"><em class="fa fa-bug">&nbsp;</em> Add Application Status</a></li>
			<li><a href="login.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->