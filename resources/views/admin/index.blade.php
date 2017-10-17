<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>ARShop - Home</title>
		<meta name="description" content="ARShop is a modern website store that can make your shopping more easy and more real." />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" type="image/x-icon" href="{{ url('/') }}/favicon.png">
		<link rel="stylesheet" type="text/css" href="{{ url('/') }}/index/css/default.css" />
		<link rel="stylesheet" type="text/css" href="{{ url('/') }}/index/css/component.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<div class="codrops-top clearfix" style="color: #fff">Welcome, {{ Auth::user()->name }}</div>
			<header class="clearfix">
				<h1>ARShop <span>dashboard</span></h1>
				@if(Session::has('alert-success'))
				    <div class="alert alert-success alert-dismissible fade show" role="alert">
				    	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			            {{ Session::get('alert-success') }}
			        </div>
				@endif
			</header>
			<div class="main">
				<div class="row">
					<div class="col-2">
						<div class="list-group" id="list-tab" role="tablist">
							<a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">View Product</a>
							<a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Add Product</a>
							<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="list-group-item list-group-item-action" style="color: #dd2d3d; font-weight: 700;">Logout</a>
				            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				                {{ csrf_field() }}
				            </form>
						</div>
					</div>
					<div class="col-10">
						<div class="tab-content" id="nav-tabContent">
							{{-- product lists --}}
							<div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
								@php
									$idx = 0;
								@endphp

								@foreach ($products as $product)
									@if($idx % 3 == 0)
										<div class="card-deck" style="margin-bottom: 20px;">
									@endif

									<div class="card">
										<img class="card-img-top" src="{{ url('/') }}/{{ $product->product_img }}" alt="{{ $product->product_name }}">
										<div class="card-body">
											<h4 class="card-title" style="margin-bottom: 0;">{{ $product->product_name }}</h4>
											<p class="text-muted">Rp {{ $product->product_price }} | Stock {{ $product->product_stock }}</p>
											<p class="card-text">{{ $product->product_desc }}</p>
										</div>
										<div class="card-footer">
											<form method="POST" action="/home/product/{{ $product->id }}" accept-charset="UTF-8">
					                            <input name="_method" type="hidden" value="DELETE">
					                            {{ csrf_field() }}
					                            <a href="/home/product/{{ $product->id }}" class="btn btn-primary btn-sm" title="Edit data">Edit</a>
					                        	<input type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete {{ $product->product_name }} ?');" value="Delete" title="Delete product">
					                        </form>
										</div>
									</div>

									@if($idx % 3 == 2 && $idx >= 2)
										</div>
									@endif

									@php
										$idx++;
									@endphp
								@endforeach
							</div>
							{{-- /product lists --}}

							{{-- form --}}
							<div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
								<form action="/home/store" enctype="multipart/form-data" method="POST">
									{{ csrf_field() }}
									<div class="row">
										<div class="col-8">
											<div class="form-group">
												<label for="productname">Product Name</label>
												<input type="text" class="form-control" id="productname" name="productname" placeholder="Enter product name">
											</div>
											<div class="form-group">
												<label for="productprice">Product Price</label>
												<div class="input-group mb-2 mb-sm-0">
													<div class="input-group-addon">Rp</div>
													<input type="number" class="form-control" id="productprice" name="productprice" placeholder="Enter product price" min="0">
												</div>
											</div>
											<div class="form-group">
												<label for="productstock">Product Stock</label>
												<input type="number" class="form-control" id="productstock" name="productstock" placeholder="Enter number of product" min="0" max="1000">
											</div>
											<div class="form-group">
												<label for="productdesc">Product Description</label>
												<textarea class="form-control" id="productdesc" rows="3" placeholder="Enter product description" name="productdesc"></textarea>
											</div>
											<button type="submit" class="btn btn-primary">Submit</button>
										</div>
										<div class="col-4">
											<div class="form-group">
												<label for="productimg">Product Image</label>
												<input type="file" class="form-control-file" id="productimg" aria-describedby="imgHelp" name="productimg">
												<small id="imgHelp" class="form-text text-muted">Image must be 500*500px, JPG / PNG.</small>
											</div>
											<div class="form-group">
												<label for="productthumb">Product Thumbnail</label>
												<input type="file" class="form-control-file" id="productthumb" aria-describedby="thumbHelp" name="productthumb">
												<small id="thumbHelp" class="form-text text-muted">Image must be 250*250px, JPG / PNG.</small>
											</div>
										</div>
									</div>
								</form>
							</div>
							{{-- /form --}}
						</div>
					</div>
				</div>
				<p>Copyright &copy; <a href="#">ARShop</a></p>
			</div>
		</div>

		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
	</body>
</html>