@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>	
		
		<!-- Styles -->
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">		
    </head>
	
    <body>
		<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
			<div class="carousel-indicators">
				<button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
				<button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
				<button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
			</div>
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img class="bd-placeholder-img" width="100%" height="100%" src="{{ asset('images/priscilla-du-preez-ELnxUDFs6ec-unsplash.jpg') }}" alt="First slide">
				
					<div class="container">
						<div class="carousel-caption text-start">
							<h1>Latte.</h1>
							<p>Try our new Latte, made the way it's meant to be.</p>
							<p><a class="btn btn-lg btn-primary" href="{{ url('/hot_products') }}">Browse for more</a></p>
						</div>
					</div>
				</div>
				<div class="carousel-item">
					<img class="bd-placeholder-img" width="100%" height="100%" src="{{ asset('images/farhad-ibrahimzade-DEovggNHhe0-unsplash.jpg') }}" alt="Second slide">

					<div class="container">
						<div class="carousel-caption">
							<h1>Coffee ice Cream.</h1>
							<p>The perfect coffee, for those hot summer days.</p>
							<p><a class="btn btn-lg btn-primary" href="{{ url('/cold_products') }}">Browse for more</a></p>
						</div>
					</div>
				</div>
				<div class="carousel-item">
					<img class="bd-placeholder-img" width="100%" height="100%" src="{{ asset('images/demi-deherrera-L-sm1B4L1Ns-unsplash.jpg') }}" alt="Third slide">

					<div class="container">
						<div class="carousel-caption text-end">
							<h1>Iced Tea.</h1>
							<p>Try some iced tea like you never had before.</p>
							<p><a class="btn btn-lg btn-primary" href="#">Browse for more</a></p>
						</div>
					</div>
				</div>
			</div>
			<button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Next</span>
			</button>
		</div>
    </body>
</html>
@endsection