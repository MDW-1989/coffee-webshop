@extends('layouts.app')

@section('content')

<head>
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
  
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
</head>

<section class="h-100 h-custom" style="background-color: #0d6efd;">
	<div class="container py-5 h-100">
		<div class="row d-flex justify-content-center align-items-center h-100">
			<div class="col-12">
				<div class="card card-registration card-registration-2" style="border-radius: 15px;">
					<div class="card-body p-0">
						<div class="row g-0">
							<div class="col-lg-8">
								<div class="p-5">
									<div class="d-flex justify-content-between align-items-center mb-5">
										@if ($message = Session::get('success'))
											<div class="p-4 mb-3 bg-green-400 rounded">
												<p class="text-green-800">{{ $message }}</p>
											</div>
										@endif	
										
										<h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
										<h6 class="mb-0 text-muted">{{ Cart::getTotalQuantity()}} items</h6>
									</div>
									<hr class="my-4">
									
									@foreach ($cartItems as $item)
									<div class="row mb-4 d-flex justify-content-between align-items-center">
										<div class="col-md-2 col-lg-2 col-xl-2">
											<img
												src="{{ $item->attributes->image }}"
												class="img-fluid rounded-3" alt="{{ $item->name }}">
										</div>
										<div class="col-md-3 col-lg-3 col-xl-3">
											<h6 class="text-muted">{{ $item->name }}</h6>
											<h6 class="text-black mb-0">{{ $item->description }}</h6>
										</div>
										<div class="col-md-3 col-lg-3 col-xl-2 d-flex">
											
											<form class="form-inline" action="{{ route('cart.update') }}" method="POST">
												
												<div class="form-group">
													
													@csrf
													<button class="form-control" type="submit" class="btn btn-link px-2"
														onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
														<i class="bi bi-plus"></i>
													</button>

													<input type="hidden" name="id" value="{{ $item->id}}" >
													<input type="number" name="quantity" value="{{ $item->quantity }}" 
													class="w-8 text-center bg-gray-300 form-control" />

													<button class="form-control" type="submit" class="btn btn-link px-2"
														onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
														<i class="bi bi-dash"></i>
													</button>
												
												</div>
											</form>
												
										</div>
										<div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
											<h6 class="mb-0">€ {{ $item->price }}</h6>
										</div>
										<div class="col-md-1 col-lg-1 col-xl-1 text-end">
										
										<form action="{{ route('cart.remove') }}" method="POST">
											@csrf
											<input type="hidden" value="{{ $item->id }}" name="id">
											<button class="px-4 py-2 text-white bg-red-600"><i class="bi bi-trash3"></i></button>
										</form>
											
										</div>
									</div>

									<hr class="my-4">
									@endforeach
									
									<div class="pt-5">
										<h6 class="mb-0"><a href="{{ url('/') }}" class="text-body"><i
											class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
									</div>
								</div>
							</div>
							<div class="col-lg-4 bg-grey">
								<div class="p-5">
									<h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
									<hr class="my-4">

									<div class="d-flex justify-content-between mb-4">
										<h5 class="text-uppercase">items {{ Cart::getTotalQuantity()}}</h5>
										<h5>€ {{ Cart::getTotal() }}</h5>
									</div>

									<h5 class="text-uppercase mb-3">Give code</h5>

									<div class="mb-5">
										<div class="form-outline">
											<input type="text" id="form3Examplea2" class="form-control form-control-lg" />
											<label class="form-label" for="form3Examplea2">Enter your code</label>
										</div>
									</div>

									<hr class="my-4">

									<div class="d-flex justify-content-between mb-5">
										<h5 class="text-uppercase">Total price</h5>
										<h5>€ {{ Cart::getTotal() }}</h5>
									</div>

									<button type="button" class="btn btn-dark btn-block btn-lg"
										data-mdb-ripple-color="dark">Submit Order</button>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection
