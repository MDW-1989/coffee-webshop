<!DOCTYPE html>

@extends('layouts.app')

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Edit Product Form</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
	</head>
	<body>
		@section('content')
		<div class="container mt-2">
			<div class="row">
				<div class="col-lg-12 margin-tb">
					<div class="pull-left">
						<h2>Edit Product</h2>
					</div>
					<div class="pull-right">
						<a class="btn btn-primary" href="/products" enctype="multipart/form-data"> Back</a>
					</div>
				</div>
			</div>
			@if(session('status'))
			<div class="alert alert-success mb-1 mt-1">
				{{ session('status') }}
			</div>
			@endif
			<form action="" method="POST" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Name:</strong>
						<input type="text" name="name" class="form-control" value="{{ $prod->name }}" placeholder="name">
						@error('name')
						<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
						@enderror
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Description:</strong>
						<input type="text" name="description" class="form-control" value="{{ $prod->description }}" placeholder="description">
						@error('description')
						<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
						@enderror
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Image:</strong>
						<input type="text" name="image" class="form-control" value="{{ $prod->image }}" placeholder="image">
						@error('image')
						<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
						@enderror
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Price:</strong>
						<input type="decimal" name="price" class="form-control" value="{{ $prod->price }}" placeholder="price">
						@error('price')
						<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
						@enderror
					</div>
				</div>				
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Category:</strong>
						<input type="text" name="category" class="form-control" value="{{ $prod->category }}" placeholder="category">
						@error('category')
						<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
						@enderror
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Stock:</strong>
						<input type="text" name="stock" class="form-control" value="{{ $prod->stock }}" placeholder="stock">
						@error('stock')
						<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
						@enderror
					</div>
				</div>					
				<button type="submit" class="btn btn-primary ml-3">Submit</button>
			</div>
			</form>
		</div>
		@endsection
	</body>
</html>