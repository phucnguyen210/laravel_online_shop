<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Laravel Shop :: Administrative Panel</title>
		<!-- Google Font: Source Sans Pro -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
		<!-- Font Awesome -->
		@include('../includes.css')
	</head>
	<body class="hold-transition sidebar-mini">
		<!-- Site wrapper -->
		<div class="wrapper">
			<!-- Navbar -->
			<nav class="main-header navbar navbar-expand navbar-white navbar-light">
				<!-- Right navbar links -->
				<ul class="navbar-nav">
					<li class="nav-item">
					  	<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
					</li>					
				</ul>
				<div class="navbar-nav pl-2">
					<!-- <ol class="breadcrumb p-0 m-0 bg-white">
						<li class="breadcrumb-item active">Dashboard</li>
					</ol> -->
				</div>
				
					@include('../includes.navbar')
			</nav>
			<!-- /.navbar -->
			<!-- Main Sidebar Container -->
			<aside class="main-sidebar sidebar-dark-primary elevation-4">
				<!-- Brand Logo -->
				<a href="#" class="brand-link">
					<img src="img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
					<span class="brand-text font-weight-light">LARAVEL SHOP</span>
				</a>
				<!-- Sidebar -->
				@include('../includes.sidebar')
				
				<!-- /.sidebar -->
         	</aside>
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">					
					<div class="container-fluid">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Dashboard</h1>
							</div>
							<div class="col-sm-6">
								
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-4 col-6">							
								<div class="small-box card">
									<div class="inner">
										<h3>150</h3>
										<p>Total Orders</p>
									</div>
									<div class="icon">
										<i class="ion ion-bag"></i>
									</div>
									<a href="#" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
								</div>
							</div>
							
							<div class="col-lg-4 col-6">							
								<div class="small-box card">
									<div class="inner">
										<h3>50</h3>
										<p>Total Customers</p>
									</div>
									<div class="icon">
										<i class="ion ion-stats-bars"></i>
									</div>
									<a href="#" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
								</div>
							</div>
							
							<div class="col-lg-4 col-6">							
								<div class="small-box card">
									<div class="inner">
										<h3>$1000</h3>
										<p>Total Sale</p>
									</div>
									<div class="icon">
										<i class="ion ion-person-add"></i>
									</div>
									<a href="javascript:void(0);" class="small-box-footer">&nbsp;</a>
								</div>
							</div>
						</div>
					</div>					
					<!-- /.card -->
				</section>
				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->
			<footer class="main-footer">
				
				<strong>Copyright &copy; 2014-2022 AmazingShop All rights reserved.
			</footer>
			
		</div>
		<!-- ./wrapper -->
		<!-- jQuery -->
		@include('../includes.jquery')
	</body>
</html>