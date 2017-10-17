<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>ARShop | Home</title>
		<meta name="description" content="ARShop is a modern website store that can make your shopping more easy and more real." />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" type="image/x-icon" href="{{ url('/') }}/favicon.png">
		<link rel="stylesheet" type="text/css" href="{{ url('/') }}/index/css/default.css" />
		<link rel="stylesheet" type="text/css" href="{{ url('/') }}/index/css/component.css" />
		<script src="{{ url('/') }}/index/js/modernizr.custom.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="codrops-top clearfix" style="background-color: #ffdc04; color: #ffdc04;">.</div>
			<header class="clearfix">
				<h1>ARShop <span>make your shoping experience more <strong>easy</strong> and <strong>real</strong></span></h1>	
			</header>
			<div class="main">
				<ul id="og-grid" class="og-grid">
					@foreach ($products as $product)
						<li>
							<a href="#" data-largesrc="{{ url('/') }}/{{ $product->product_img }}" data-title="{{ $product->product_name }}" data-description="{{ $product->product_desc }}</br><h4 style='color: #595959; margin-top: 5px; font-size: 15px;'><strong>Rp {{ $product->product_price }},00 | available stocks : {{ $product->product_stock }}</strong></h4>">
								<img src="{{ url('/') }}/{{ $product->product_thumb }}" alt="{{ $product->product_name }}"/>
							</a>
						</li>
					@endforeach
				</ul>
				<p>Copyright &copy; <a href="#">ARShop</a></p>
			</div>
		</div>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="{{ url('/') }}/index/js/grid.js"></script>
		<script>
			$(function() {
				Grid.init();
			});
		</script>
	</body>
</html>