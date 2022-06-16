<!DOCTYPE html>

@extends('layouts.app')

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Create Product Form</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
	</head>
	<body>
		@section('content')
		<div class="container mt-2">
			<div class="row">
				<div class="col-lg-12 margin-tb">
					<div class="pull-left mb-2">
						<h2>Add Product</h2>  <i class="bi bi-apple"></i>
					</div>
					<div class="pull-right">
						<a class="btn btn-primary" href="/products"> Back</a>
					</div>
				</div>
			</div>
			@if(session('status'))
			<div class="alert alert-success mb-1 mt-1">
				{{ session('status') }}
			</div>
			@endif
			<form action="/products" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Name:</strong>
						<input type="text" name="name" class="form-control" placeholder="name">
						@error('name')
						<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
						@enderror
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Description:</strong>
						<input type="text" name="description" class="form-control" placeholder="description">
						@error('description')
						<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
						@enderror
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Image:</strong>
						<input type="text" name="image" class="form-control" placeholder="image">
						@error('image')
						<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
						@enderror
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Price:</strong>
						<input type="decimal" name="price" class="form-control" placeholder="price">
						@error('price')
						<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
						@enderror
					</div>
				</div>				
				
				<div class="form-group">
					<strong>Category:</strong><br>
					<select name="category" id="category">
						<option value="none" selected disabled hidden>Select an Option</option>
						<option value="Hot">Hot</option>
						<option value="Cold">Cold</option>						
					</select>
					@error('category')
					<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
					@enderror							
				</div>					
				
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Stock:</strong>
						<input type="text" name="stock" class="form-control" placeholder="stock">
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