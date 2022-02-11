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
		<ul class="nav menu">
			<?php
			if($_SESSION["user_type"] == "employee")
			{
				$display = "none";
			}
			else {
				$display = "block";
			}


			if($_SESSION["user_type"] == "admin")
			{
				$display2 = "none";
			}
			else {
				$display2 = "block";
			}


			?>
		<li id = "db"  ><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
		
		<li id = "admin" style="display: <?=$display?>" class=""><a href="admin.php"><em class="fa fa-child">&nbsp;</em> Add Admin</a></li>
            <li  id = "emp" style="display: <?=$display?>" class = ""><a href="employee.php"><em class="fa fa-user">&nbsp;</em>Add Employee</a></li>
			<li id = "sec" style="display: <?=$display?>"><a href="section.php"><em class="fa fa-puzzle-piece">&nbsp;</em> Add Section</a></li>
			<li id ="des"style="display: <?=$display?>"><a href="designation.php"><em class="fa fa-users">&nbsp;</em> Add Designation</a></li>
			<li id = "leave"style="display: <?=$display?>"><a href="leave_lookup.php"><em class="fa fa-search">&nbsp;</em> Add Leave</a></li>
			<li id = "lf" style="display: <?=$display2?>"><a href="AleaveForm.php" ><em class="fa fa-edit">&nbsp;</em> Leave Form</a></li>
			<li id = "vla" style="display: <?=$display?>"><a href="ViewLeaveApps.php"><em class="fa fa-list">&nbsp;</em> Leave Applications</a></li>

			<li id = "aps" style="display: <?=$display?>" ><a href="app_status.php"><em class="fa fa-bug">&nbsp;</em> Add Application Status</a></li>
			<li id = "lh" style="display: <?=$display2?>"><a href="emp_leave_history.php" ><em class="fa fa-calendar-check-o">&nbsp;</em> Leave History</a></li>
			<li id = "pl" style="display: <?=$display2?>"><a href="emp_leave_pending.php" ><em class="fa fa-exclamation-circle">&nbsp;</em> Pending Leaves</a></li>
			<li><a href="login.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->