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
						<li class="breadcrumb-item"><a href="{{route('admin.orders')}}">Orders</a></li>
						<li class="breadcrumb-item active">List</li>
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
								<h1>Orders</h1>
							</div>
							<div class="col-sm-6 text-right">
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
							<div class="card-header">
								<div class="card-tools">
									<div class="input-group input-group" style="width: 250px;">
										<input type="text" name="table_search" class="form-control float-right" placeholder="Search">
					
										<div class="input-group-append">
										  <button type="submit" class="btn btn-default">
											<i class="fas fa-search"></i>
										  </button>
										</div>
									  </div>
								</div>
							</div>
							<div class="card-body table-responsive p-0">								
								<table class="table table-hover text-nowrap">
									<thead>
										<tr>
											<th>Orders #</th>											
                                            <th>Customer</th>
                                            <th>Email</th>
                                            <th>Phone</th>
											<th>Status</th>
                                            <th>Total</th>
                                            <th>Date Purchased</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><a href="{{route('admin.order_detail')}}">OR756374</a></td>
											<td>Mohit Singh</td>
                                            <td>example@example.com</td>
                                            <td>12345678</td>
                                            <td>
												<span class="badge bg-success">Delivered</span>
											</td>
											<td>$400</td>
                                            <td>Nov 20, 2022</td>																				
										</tr>
										<tr>
											<td><a href="{{route('admin.order_detail')}}">OR756374</a></td>
											<td>Mohit Singh</td>
                                            <td>example@example.com</td>
											<td>12345678</td>
                                            <td>
												<span class="badge bg-success">Delivered</span>
											</td>
											<td>$400</td>
                                            <td>Nov 20, 2022</td>																				
										</tr>
										<tr>
											<td><a href="{{route('admin.order_detail')}}">OR756374</a></td>
											<td>Mohit Singh</td>
                                            <td>example@example.com</td>
											<td>12345678</td>
                                            <td>
												<span class="badge bg-success">Delivered</span>
											</td>
											<td>$400</td>
                                            <td>Nov 20, 2022</td>																				
										</tr>
										<tr>
											<td><a href="order-detail.html">OR756374</a></td>
											<td>Mohit Singh</td>
                                            <td>example@example.com</td>
											<td>12345678</td>
                                            <td>
												<span class="badge bg-success">Delivered</span>
											</td>
											<td>$400</td>
                                            <td>Nov 20, 2022</td>																				
										</tr>
										<tr>
											<td><a href="order-detail.html">OR756374</a></td>
											<td>Mohit Singh</td>
                                            <td>example@example.com</td>
											<td>12345678</td>
                                            <td>
												<span class="badge bg-success">Delivered</span>
											</td>
											<td>$400</td>
                                            <td>Nov 20, 2022</td>																				
										</tr>
                                        <tr>
											<td><a href="order-detail.html">OR756374</a></td>
											<td>Mohit Singh</td>
                                            <td>example@example.com</td>
											<td>12345678</td>
                                            <td>
												<span class="badge bg-success">Delivered</span>
											</td>
											<td>$400</td>
                                            <td>Nov 20, 2022</td>																				
										</tr>
									</tbody>
								</table>										
							</div>
							<div class="card-footer clearfix">
								<ul class="pagination pagination m-0 float-right">
								  <li class="page-item"><a class="page-link" href="#">«</a></li>
								  <li class="page-item"><a class="page-link" href="#">1</a></li>
								  <li class="page-item"><a class="page-link" href="#">2</a></li>
								  <li class="page-item"><a class="page-link" href="#">3</a></li>
								  <li class="page-item"><a class="page-link" href="#">»</a></li>
								</ul>
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