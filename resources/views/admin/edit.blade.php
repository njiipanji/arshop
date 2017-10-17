<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>ARShop - Edit Product</title>
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
			</header>
			<div class="main">
				<div class="row">
					<div class="col-12">
						<form action="/home/product/{{ $product->id }}" enctype="multipart/form-data" method="POST">
							{{ csrf_field() }}
							<div class="row">
								<div class="col-8">
									<div class="form-group">
										<label for="productname">Product Name</label>
										<input type="text" class="form-control" id="productname" name="productname" placeholder="Enter product name" value="{{ $product->product_name }}">
									</div>
									<div class="form-group">
										<label for="productprice">Product Price</label>
										<div class="input-group mb-2 mb-sm-0">
											<div class="input-group-addon">Rp</div>
											<input type="number" class="form-control" id="productprice" name="productprice" placeholder="Enter product price" min="0" value="{{ $product->product_price }}">
										</div>
									</div>
									<div class="form-group">
										<label for="productstock">Product Stock</label>
										<input type="number" class="form-control" id="productstock" name="productstock" placeholder="Enter number of product" min="0" max="1000" value="{{ $product->product_stock }}">
									</div>
									<div class="form-group">
										<label for="productdesc">Product Description</label>
										<textarea class="form-control" id="productdesc" rows="3" placeholder="Enter product description" name="productdesc">{{ $product->product_desc }}</textarea>
									</div>
									<button type="submit" class="btn btn-primary">Update</button>
									<a href="{{ URL::previous() }}" class="btn btn-danger">Back</a>
								</div>
								<div class="col-4">
									<div class="form-group">
										<img class="img-thumbnail" src="{{ url('/') }}/{{ $product->product_thumb }}" alt="{{ $product->product_name }}" style="height: 170px;">
									</div>
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
							<input type="hidden" name="_method" value="PUT">
						</form>
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