<header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
	<!-- mini logo for sidebar mini 50x50 pixels -->
	<span class="logo-mini"><b>CMS</b></span>
	<!-- logo for regular state and mobile devices -->
	<span class="logo-lg"><b>CMS</b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
	<!-- Sidebar toggle button-->
	<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
	</a>
	<!-- Navbar Right Menu -->
	<div class="navbar-custom-menu">
            <ul class="nav navbar-nav">		    
		<li class="dropdown tasks-menu">
		    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			<i>Hi Admin</i>
		    </a>
		    <ul class="dropdown-menu">
			<li><a href="#"
			       onclick="event.preventDefault();document.getElementById('logout-form').submit();">
			    <i class="fa fa-circle-o text-red"></i> <span>Logout</span></a>
			</li>
			<form id="logout-form" action="#" method="POST" style="display: none;">
			    @csrf
			</form>
		    </ul>
		</li>
            </ul>
	</div>

    </nav>
</header>
