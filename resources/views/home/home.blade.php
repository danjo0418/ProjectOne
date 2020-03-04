@extends('layouts.app')
@section('title')<title>The Key to Your Dream Home - {{ config('app.name') }}</title>@endsection
@section('page')	
	<div class="banner">
		<div class="container">
	      	<div class="whitebox float-right mt-4 py-4">
	      		<h1><span>The Key to your<br> Better Home</span></h1>
	      		<div class="box-nav">
	      			<form id="js-search-form">
		          		<ul class="list-unstyled">
		          			<li>
		          				<div class="cstm-radio">
								    <input type="radio" id="buy"  value="buy" class="js-search-offer" name="offer_type" checked/> 
								    <label for="buy">Buy</label>
								</div>
		          			</li>
		          			<li>
								<div class="cstm-radio">
								    <input type="radio" id="rent"  value="rent" class="js-search-offer" name="offer_type"/> 
								    <label for="rent">Rent</label>
								</div>
		          			</li>
		          		</ul>
						<div class="form-group mt-2">
						    <select class="form-control js-search-type" name="type" required>
						    	<option selected disabled>Select Property Type</option>
						    	@foreach(App\Modules\Helpers::propertyType() as $type)
						    		<option value="{{ str_replace(' ', '-', $type->type) }}">{{ $type->type }}</option>
						    	@endforeach
						    </select>
						</div>
						<div class="input-group md-form form-sm form-1 pl-0">
						  	<div class="input-group-prepend">
						    	<span>
									<img src="{{ asset('assets/img/icons/key.png') }}" alt="" class="img-fluid" width="25" style=" position: absolute;top: 15px;left:5px;z-index: 99;"/>
						    	</span>
						  	</div>
						  	<input class="form-control my-0 py-1 js-search-queue" list="home-queue" type="text" placeholder="Search by city or building" aria-label="Search" style="text-indent:25px; border-radius:5px;">
						  	<datalist id="home-queue">
						    	@foreach(App\Modules\Helpers::queue() as $queue)
						    		<option value="{{ $queue->city_municipality }}">{{ $queue->name }}</option>
						    	@endforeach
						  	</datalist>
						</div>

						<button class="btn btn-keyland px-4 mt-4">Search</button>
	          		</form>
	      		</div>
	      	</div>
	    </div>
	</div>

	@include('layouts.carousel')

	<div class="feature">
		<h1 class="text-center pb-3">Featured Properties</h1>
		<div class="container">
			<div class="row">
				@foreach($featured as $feature)
					<div class="col-md-3 col-sm-12 mb-4">
						<a href="{{ URL::to('property-details/'.$feature->code) }}">
							@if(is_object($feature->thumbnail))
								<img src="{{ asset('assets/img/properties/'.$feature->thumbnail->filename) }}" alt="{{ $feature->name }}" class="img-fluid property-img"/>
							@else
								<img src="{{ asset('assets/img/properties/placeholder.png') }}" alt="{{ $feature->name }}" class="img-fluid property-img"/>
							@endif
							<div class="middle">
							    <p class="text-center">
							   		{{ $feature->name }} <br> 
							   		{{ ucwords($feature->province) }}
							   	</p>
							   <span class="btn btn-keyland px-4 mt-4" href="javascript:void(0)">View Details</span><br>
								<small class="text-dark">{{ date('M d,Y', strtotime($feature->created_at)) }}</small>
							</div>
						</a>
					</div>
				@endforeach
				@if(count($featured) == 0)
					<div class="col-12">
						<div class="error-message text-center mt-5">
				  			<h1><i class="icon icon-property"></i></h1>
				  			<h4 class="mb-0"><strong>NO DATA FOUND</strong></h4>
							<small>There's no Featured Property posted.</small><br><br>
				  		</div>
					</div>
				@endif
				<div class="col-md-12">
					<nav class="cstm-paginate cstm-center" aria-label="Page navigation example">
					   {{ $featured->links() }}
					</nav>
				</div>
			</div>
		</div>
		<a class="btn btn-keyland px-4 mt-4" href="{{ URL::to('properties') }}">View All Properties</a>
	</div>

	<div class="properties">
		<div class="container">
			<h1 class="text-center pb-3">Sell Your Properties with Us! </h1>
			<div class="row">
				<div class="col-md-6 col-sm-12">
					<img src="{{ asset('assets/img/img-prop.jpg') }}" alt ="property image" width="100%"  height="100%"/>
				</div>

				<div class="col-md-6 col-sm-12 pcont">
					<h5 class="pb-2">Have any properties to sell or buy?</h5>

					<p>Home selling is a complicated process and there's a lot of factors to consider. Selling your property will most likely be one of the biggest financial decisions you will ever make and we're here to guide you make that decision. Our job is to simplify the whole process for you and get you the best possible price for your property.</p>

					<p>We provide free evaluation of your property and answer any questions you might have. Our agents are equipped with the best marketing and real estate promotion tools available in order to reach the right client for your property.</p>
					<div class="text-center-sm">
						<a class="btn btn-keyland px-4 mt-4" href="{{ URL::to('sell-your-properties') }}">Get in Touch</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="locations">
		<div class="container">
			<h1 class="text-center pb-3">Our Locations</h1>
			<div class="row">
				<div class="col-md-4 col-sm-12">
					<a href="{{ URL::to('properties?province=Cebu') }}">
						<img src="{{ asset('assets/img/img-cebu.jpg') }}" alt ="image cebu" class="img-fluid"/>
						<div class="middle">
						   <p class="text-center">CEBU</p>
						</div>
					</a>
				</div>
				<div class="col-md-4 col-sm-12">
					<a href="{{ URL::to('properties?province=Bohol') }}">
						<img src="{{ asset('assets/img/img-bohol.jpg') }}" alt ="image bohol" class="img-fluid"/>
						<div class="middle">
						   <p class="text-center">BOHOL</p>
						</div>
					</a>
				</div>
				<div class="col-md-4 col-sm-12">
					<a href="javascript:void(0)">
						<img src="{{ asset('assets/img/img-manila.jpg') }}" alt ="image manila" class="img-fluid"/>
						<div class="middle">
						   <p class="text-center mb-0">Manila</p>
						   <small class="text-dark">Coming Soon</small>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
	@include('layouts.footer')
@endsection
