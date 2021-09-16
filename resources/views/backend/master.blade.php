<!DOCTYPE html>
<html lang="en">
<head>
	@include('backend.elements.head')
</head>
<body>
	<div id="wrapper">
		<!-- Navigation -->
		<nav class="navbar navbar-expand-md fixed-top navbar-dark">
			@include('backend.elements.top_nav')
			<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
			@include('backend.elements.sidebar')
		</nav>
	  <div id="page-wrapper">
		  <div class="container-fluid ">
				@yield('content')
		  </div>
		  <!-- /.container-fluid -->
			<footer class="footer">
				<div class="container-fluid">
						<div class="row">
								<div class="col-sm-6">
										2020 - 2021 © Admin .
								</div>
								<div class="col-sm-6">
										<div class="text-sm-right d-none d-sm-block">
												Được viết <i class="fas fa-heart" style="color: #d0021b"></i> bởi Tiến Nguyễn
										</div>
								</div>
						</div>
				</div>
		</footer>
		</div>
		<!-- /#page-wrapper -->
	</div>
	<!-- /#wrapper -->
	@include('backend.elements.script')
</body>
</html>