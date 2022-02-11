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

				<a class="navbar-brand" href="#"><span>PITC-ELMS</span> </a>
				<ul class="nav navbar-top-links navbar-right">
					<li class="dropdown">
					<?session_unset();
            session_destroy();
            ?>
                         <button type="button" class="btn btn-danger btn-sm" onclick="location.href='login.php'">
          <span class="glyphicon glyphicon-log-out"></span> Log out
        </button>
			     
					
						
						
					</li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>