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
						<li class="breadcrumb-item"><a href="{{route('admin.products')}}">Products</a></li>
						<li class="breadcrumb-item active">Edit</li>
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
								<h1>Edit Product</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{route('admin.products')}}" class="btn btn-primary">Back</a>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
                        <form action="{{route('products.update', $products->id)}}" method="post" enctype="multipart/form-data">
							@csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card mb-3">
                                        <div class="card-body">								
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="title">Title</label>
                                                        <input type="text" name="name" value="{{$products->name}}" id="name" class="form-control" placeholder="Title" required>	
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="description">Description</label>
                                                        <textarea name="description" id="description" cols="30" rows="10" class="summernote" placeholder="Description">{{$products->description}}</textarea>
                                                    </div>
                                                </div>                                            
                                            </div>
                                        </div>	                                                                      
                                    </div>
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h2 class="h4 mb-3">Media</h2>								
                                                    <br>Drop files here or click to upload.<br><br>   
                                                    <input type="file" name="img" class="form-control">                                         
                                        </div>	                                                                      
                                    </div>
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h2 class="h4 mb-3">Pricing</h2>								
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="price">Price</label>
                                                        <input type="text" value="{{$products->price}}" name="price" id="price" class="form-control" placeholder="Price">	
                                                    </div>
                                                </div>
                                                {{-- <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="compare_price">Compare at Price</label>
                                                        <input type="text" name="compare_price" id="compare_price" class="form-control" placeholder="Compare Price">
                                                        <p class="text-muted mt-3">
                                                            To show a reduced price, move the product’s original price into Compare at price. Enter a lower value into Price.
                                                        </p>	
                                                    </div>
                                                </div>                                             --}}
                                            </div>
                                        </div>	                                                                      
                                    </div>
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h2 class="h4 mb-3">Inventory</h2>								
                                            <div class="row">
                                                {{-- <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="sku">SKU (Stock Keeping Unit)</label>
                                                        <input type="text" name="code" id="sku" class="form-control" placeholder="sku">	
                                                    </div>
                                                </div> --}}
                                                {{-- <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="barcode">Barcode</label>
                                                        <input type="text" name="barcode" id="barcode" class="form-control" placeholder="Barcode">	
                                                    </div>
                                                </div>    --}}
                                                <div class="col-md-12">
                                                    {{-- <div class="mb-3">
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input"  type="checkbox" id="track_qty" name="quantity" checked>
                                                            <label for="track_qty" class="custom-control-label">Track Quantity</label>
                                                        </div>
                                                    </div> --}}
                                                    <div class="mb-3">
                                                        <input type="number" min="0" value="{{$products->quantity}}" name="quantity" id="quantity" class="form-control" placeholder="Qty">	
                                                    </div>
                                                </div>                                         
                                            </div>
                                        </div>	                                                                      
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card mb-3">
                                        <div class="card-body">	
                                            <h2 class="h4 mb-3">Product status</h2>
                                            <div class="mb-3">
                                                <select name="status" id="status" class="form-control">
                                                    @foreach([1 => 'Active', 0 => 'Block'] as $value => $label)
                                                        <option value="{{ $value }}" {{ $products->status == $value ? 'selected' : '' }}>{{ $label }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="card">
                                        <div class="card-body">	
                                            <h2 class="h4  mb-3">Product category</h2>
                                            <div class="mb-3">
                                                <label for="category">Category</label>
                                                <select name="category_id" id="category_id" class="form-control">
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="category">Sub category</label>
                                                <select name="sub_category_id" id="sub_category" class="form-control">
                                                    @foreach($subcategories as $subcategory)
                                                        <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                                    @endforeach
                                                    
                                                </select>
                                            </div>
                                            
                                        </div>
                                    </div> 
                                    <div class="card mb-3">
                                        <div class="card-body">	
                                            <h2 class="h4 mb-3">Product brand</h2>
                                            <div class="mb-3">
                                                <select name="brand_id" id="brand_id" class="form-control">
                                                    @foreach($brands as $brand)
                                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div> 
                                    {{-- <div class="card mb-3">
                                        <div class="card-body">	
                                            <h2 class="h4 mb-3">Featured product</h2>
                                            <div class="mb-3">
                                                <select name="status" id="status" class="form-control">
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>                                                
                                                </select>
                                            </div>
                                        </div>
                                    </div>                                  --}}
                                </div>
                            </div>
                            
                            <div class="pb-5 pt-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{route('admin.products')}}" class="btn btn-outline-dark ml-3">Cancel</a>
                            </div>
                        </form>
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
        <script>
            Dropzone.autoDiscover = false;    
            $(function () {
                // Summernote
                $('.summernote').summernote({
                    height: '300px'
                });
               
                const dropzone = $("#image").dropzone({ 
                    url:  "create-product.html",
                    maxFiles: 5,
                    addRemoveLinks: true,
                    acceptedFiles: "image/jpeg,image/png,image/gif",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }, success: function(file, response){
                        $("#image_id").val(response.id);
                    }
                });

            });
        </script>
	</body>
</html>