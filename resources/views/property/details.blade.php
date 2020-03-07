@extends('layouts.app')
@section('title')<title>{{ $detail->name }} - {{ config('app.name') }}</title>@endsection
@section('page')	
	@include('layouts.carousel')
	<div class="propertycontent">
		<div class="container pl-0 pr-0">
			<nav aria-label="breadcrumb">
			  	<ol class="breadcrumb">
			  		<li class="breadcrumb-item">
			    		<a href="{{ URL::previous() }}">
							Back to previous
			    		</a>
			    	</li>
			    	<li class="breadcrumb-item">
			    		<a href="{{ URL::to('properties/'.$detail->offer_type) }}">
							{{ ucwords($detail->offer_type) }}
			    		</a>
			    	</li>
			    	<li class="breadcrumb-item">
			    		<a href="{{ URL::to('properties/'.$detail->offer_type.'?province='.$detail->province) }}">
							{{ ucwords($detail->province) }}
			    		</a>
			    	</li>
	    			<li class="breadcrumb-item active">
	    				<a href="javscript:void(0)">
	    					{{ $detail->name }} - {{ ucwords($detail->province) }}
	    				</a>
	    			</li>
			  	</ol>
			</nav>

			<hr/>

			<h1>{{ $detail->name }} - {{ ucwords($detail->province) }}</h1>

			<div class="row">
				<div class="col-md-6 col-sm-12">
					<div class="img-prop">
						<div id="slider" class="m-0">
							<ul>
								@foreach($detail->photos as $photo)
									<li><img src="{{ asset('assets/img/properties/'.$photo->filename) }}" class="img-fluid"></li>
								@endforeach
							</ul>
							<a href="#" id="sliderNext">></a>
							<a href="#" id="sliderPrev"><</a>
						</div>

						<h5 class="pt-3">About:</h5>
						<div class="about-content">{!! $detail->about !!}</div>
						
						<h5 class="pt-3">Location:</h5>
						<p>{{ $detail->street_barangay.', '.$detail->city_municipality.', '.ucwords($detail->province) }}</p>
						@if(!empty($detail->map))
							<h5 class="pt-3">Google Map:</h5>
							<div class="googlemap">
								{!! $detail->map !!}
							</div>
						@endif
					</div>
				</div>
				<div class="col-md-6 col-sm-12">
					<div class="box-white">
						<h4 class="text-center d-block pb-3">
							@if($detail->offer_type == 'buy')
								&#8369; {{ number_format($detail->price) }}
							@else
								&#8369; {{ number_format($detail->price) }} <span style="font-size: 15px;"> / {{ ucwords($detail->price_condition) }}</span>
							@endif
						</h4>
						<div class="row">
							<div class="col-md-12">
								<ul class="list-unstyled">
									@if(!empty($detail->bedrooms))
										<li>
											Bedrooms:
											<span class="ml-2">{{ $detail->bedrooms }}</span>
										</li>
									@endif
									@if(!empty($detail->bathrooms))
										<li>
											Bathrooms: 
											<span class="ml-2">{{ $detail->bathrooms }}</span>
										</li>
									@endif
									@if(!empty($detail->floor_area))
										<li>
											Floor Area (sqm): 
											<span class="ml-2">{{ $detail->floor_area }}</span>
										</li>
									@endif
									@if(!empty($detail->land_size))
										<li>
											Land Size (sqm): 
											<span class="ml-2">{{ $detail->land_size }}</span>
										</li>
									@endif 
									@if(!empty($detail->rooms))
										<li>
											Rooms: 
											<span class="ml-2">{{ $detail->rooms }}</span>
										</li>
									@endif 
									@if(!empty($detail->car_space))
										<li>
											Car Space: 
											<span class="ml-2">{{ $detail->car_space }} </span>
										</li>
									@endif 
									@if(!empty($detail->building_name))
										<li>
											Building Name: 
											<span class="ml-2">{{ $detail->building_name }}</span>
										</li>
									@endif 
									@if(!empty($detail->build_year))
										<li>
											Build Year: 
											<span class="ml-2">{{ $detail->build_year }}</span>
										</li>
									@endif 
									@if(!empty($detail->deposit_bond))
										<li>
											Deposit/ Bond: 
											<span class="ml-2">{{ $detail->deposit_bond }}</span>
										</li>
									@endif 
									@if(!empty($detail->block_lotnum))
										<li>
											Block and Lot/Unit/Floor:
											<span class="ml-2">{{ $detail->block_lotnum }}</span>
										</li>
									@endif 

									@guest 
									@else
										@if(!empty($detail->developer))
											<li>
												Developer: 
												<span class="ml-2">{{ $detail->developer }}</span>
											</li>
										@endif 
									@endguest
								</ul>
							</div>
							<div class="col-md-12">
								<ul class="list-unstyled">
									<li>Status: {{ $detail->status->status }}</li>
									<li>Date Posted: {{ date('M d, Y', strtotime($detail->updated_at)) }}</li>
									@if(!empty($detail->furnished))
										@if($detail->furnished == 'Fully Furnished')
											<li class="text-success">
												<i class="fa fa-check"></i>
										@elseif($detail->furnished == 'Semi Furnished')
											<li class="text-primary">
												<i class="fa fa-check"></i>
										@elseif($detail->furnished == 'Unfurnished')
											<li class="text-warning">
												<i class="fa fa-check"></i>
										@else
											<li class="text-dark">
												<i class="fa fa-check"></i>
										@endif
												{{ $detail->furnished }}
											</li>
									@endif
								</ul>
							</div>
						</div>	
						<div class="row">
							<div class="col-md-8">
								<a class="btn btn-keyland px-4 mt-4 text-center d-inlineblock" href="#" style="width:100%; margin:0 auto;"  data-toggle="modal" data-target="#schedulesiteview">Schedule a Free Site Viewing</a>
							</div>
							<div class="col-md-4">
								<a class="btn btn-keyland px-4 mt-4 text-center d-inlineblock" href="tel:09273024773" style="width:100%; margin:0 auto;">Call Us Now!</a>
							</div>
						</div>	
						<div class="bottomborderyellow mt-3 mb-3"></div>

						<div class="propform">
							<h5 class="text-center d-block mb-3 mt-4">Ask About Property</h5>
							<form method="POST" action="{{ URL::to('postAskProperty') }}"> 
								@csrf
								<input type="hidden" value="{{ $detail->created_by }}" name="to">
								<input type="hidden" value="{{ $detail->name }}" name="property_name">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">	
										    <input type="text" class="form-control" id="FormControlName" placeholder="Firstname" name="fname" required/>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">	
										    <input type="text" class="form-control" id="FormControlName" placeholder="Lastname" name="lname"required/>
										</div>
									</div>
								</div>
								<div class="form-group">	
								    <input type="email" class="form-control" id="FormControlEmail" placeholder="Email" name="email" required/>
								</div>
								<div class="form-group">	
								    <input type="number" class="form-control" id="FormControlEmail" placeholder="Phone Number" name="phone" required/>
								</div>
								<div class="form-group">
								    <textarea class="form-control" id="FormControlTextarea" rows="5" placeholder="Message" name="message"></textarea>
								</div>

								<button class="btn btn-keyland px-4 mt-4 text-center d-block" href="#" style="width:50%; margin:0 auto">SUBMIT</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@include('layouts.footer')
	@include('modal.property.schedule')
@endsection
@section('script')
	<script type="text/javascript">

		$(function(){
			var slider = $('#slider');
			var sliderWrap = $('#slider ul');
			var sliderImg = $('#slider ul li');
			var prevBtm = $('#sliderPrev');
			var nextBtm = $('#sliderNext');
			var length = sliderImg.length;
			var width = sliderImg.width();
			var thumbWidth = width/length;

			sliderWrap.width(width*(length+2));

			//Set up
			slider.after('<div id="' + 'pager' + '"></div>');
			var dataVal = 1;
			sliderImg.each(
				function(){
					$(this).attr('data-img',dataVal);
					$('#pager').append('<a data-img="' + dataVal + '"><img src=' + $('img', this).attr('src') + ' width=' + thumbWidth + '></a>');
				dataVal++;
			});
			
			//Copy 2 images and put them in the front and at the end
			$('#slider ul li:first-child').clone().appendTo('#slider ul');
			$('#slider ul li:nth-child(' + length + ')').clone().prependTo('#slider ul');

			sliderWrap.css('margin-left', - width);
			$('#slider ul li:nth-child(2)').addClass('active');

			var imgPos = pagerPos = $('#slider ul li.active').attr('data-img');
			$('#pager a:nth-child(' +pagerPos+ ')').addClass('active');


			//Click on Pager  
			$('#pager a').on('click', function() {
				pagerPos = $(this).attr('data-img');
				$('#pager a.active').removeClass('active');
				$(this).addClass('active');

				if (pagerPos > imgPos) {
					var movePx = width * (pagerPos - imgPos);
					moveNext(movePx);
				}

				if (pagerPos < imgPos) {
					var movePx = width * (imgPos - pagerPos);
					movePrev(movePx);
				}
				return false;
			});

			//Click on Buttons
			nextBtm.on('click', function(){
				moveNext(width);
				return false;
			});

			prevBtm.on('click', function(){
				movePrev(width);
				return false;
			});

			//Function for pager active motion
			function pagerActive() {
				pagerPos = imgPos;
				$('#pager a.active').removeClass('active');
				$('#pager a[data-img="' + pagerPos + '"]').addClass('active');
			}

			//Function for moveNext Button
			function moveNext(moveWidth) {
				sliderWrap.animate({
		    		'margin-left': '-=' + moveWidth
		  			}, 500, function() {
		  				if (imgPos==length) {
		  					imgPos=1;
		  					sliderWrap.css('margin-left', - width);
		  				}
		  				else if (pagerPos > imgPos) {
		  					imgPos = pagerPos;
		  				} 
		  				else {
		  					imgPos++;
		  				}
		  				pagerActive();
		  		});
			}

			//Function for movePrev Button
			function movePrev(moveWidth) {
				sliderWrap.animate({
		    		'margin-left': '+=' + moveWidth
		  			}, 500, function() {
		  				if (imgPos==1) {
		  					imgPos=length;
		  					sliderWrap.css('margin-left', -(width*length));
		  				}
		  				else if (pagerPos < imgPos) {
		  					imgPos = pagerPos;
		  				} 
		  				else {
		  					imgPos--;
		  				}
		  				pagerActive();
		  		});
			}

		});
	</script>

@endsection
