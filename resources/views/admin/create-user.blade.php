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
					<ol class="breadcrumb p-0 m-0 bg-white">
						<li class="breadcrumb-item"><a href="{{route('admin.users')}}">Users</a></li>
						<li class="breadcrumb-item active">Create</li>
					</ol>
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
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Create User</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{route('admin.users')}}" class="btn btn-primary">Back</a>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
						<div class="card">
							<div class="card-body">								
								<div class="row">
									<div class="col-md-6">
										<div class="mb-3">
											<label for="name">Name</label>
											<input type="text" name="name" id="name" class="form-control" placeholder="Name">	
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-3">
											<label for="email">Email</label>
											<input type="text" name="email" id="email" class="form-control" placeholder="Email">	
										</div>
									</div>
									<div class="col-md-12">
										<div class="mb-3">
											<label for="phone">Phone</label>
											<input type="text" name="phone" id="phone" class="form-control" placeholder="Phone">	
										</div>
									</div>
									<div class="col-md-12">
										<div class="mb-3">
											<label for="phone">Address</label>
											<textarea name="address" id="address" class="form-control" cols="30" rows="5"></textarea>
										</div>
									</div>
								</div>
							</div>							
						</div>
						<div class="pb-5 pt-3">
							<button class="btn btn-primary">Create</button>
							<a href="{{route('admin.users')}}" class="btn btn-outline-dark ml-3">Cancel</a>
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