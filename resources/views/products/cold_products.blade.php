<!DOCTYPE html>

@extends('layouts.app')

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Cold Beverages</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
	</head>
	<body>
		@section('content')
		<div class="container mt-2">
			<div class="row">
				<div class="col-lg-12 margin-tb">
					<div class="pull-left">
						<h2>Cold Beverages</h2>
					</div>
				</div>
			</div>

			<div class="row">
				@foreach ($product as $prod)
				<div class="col-sm-6 mb-3">
					<div class="card text-center">
						<img class="card-img-top" src="{{ $prod->image }}" alt="Product Image">
						<div class="card-body">
							<h5 class="card-title">{{ $prod->name }}</h5>
							<p class="card-text">{{ $prod->description }}</p>
							
							<form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
								@csrf
								<input type="hidden" value="{{ $prod->id }}" name="id">
								<input type="hidden" value="{{ $prod->name }}" name="name">
								<input type="hidden" value="{{ $prod->description }}" name="description">
								<input type="hidden" value="{{ $prod->price }}" name="price">
								<input type="hidden" value="{{ $prod->image }}"  name="image">
								<input type="hidden" value="1" name="quantity">
								<a href="customize/{{$prod->id}}" class="btn btn-primary">Customize</a>
								<button class="px-4 py-2 text-white bg-success rounded">Add To Cart</button>
							</form>
							
						</div>
					</div>
				</div>

				@endforeach
			</div>	
		</div>
		@endsection		
	</body>
</html>