<div class="propertynav">
	<div class="container">
		<div class="row">
			<div class="col-md-12 p-0">
				<form class="form-inline justify-content-md-end">
					<div class="form-group s-input m-0 mr-1">
						<input type="text" list="queue" value="{{ request()->get('city') }}" class="form-control" placeholder="Search by city or building" name="city">
						<datalist id="queue">
					    	@foreach(App\Modules\Helpers::queue() as $queue)
					    		<option value="{{ $queue->city_municipality }}"></option>
					    	@endforeach
					  	</datalist>
					</div>
					<div class="form-group s-button m-0">
						@if(request()->has('city'))
					  		<a href="{{ URL::to('properties') }}" class="btn btn-danger"><i class="fa fa-search-minus"></i></a>
						@else
					  		<button type="submit" class="btn btn-warning"><i class="fa fa-search"></i></button>
					  	@endif
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="feature bgwhite">
	<div class="container">
		<div class="row">
			<div class="bs-filter-button mb-3">
				<a href="javascript:void(0)" class="btn btn-keyland btn-block"><i class="fa fa-search"></i> Filter Property</a>
			</div>
			<div class="bs-filter-form col-md-3 col-sm-12">
				<div class="filter text-left">
					<form id="js-filter-form">
						<h5 class="mb-1 mt-2">Offer Type</h5>
						<div class="cstm-radio">
						    <input type="radio" class="js-offer" id="All" value="all" name="offer" 
						    @if(request()->segment(1) == 'properties') checked @endif />
						  	<label for="All">All</label>
						</div>
						<div class="cstm-radio">
						    <input type="radio" class="js-offer" id="buy" value="buy" name="offer" 
						    @if(request()->segment(2) == 'buy') checked @endif />
						  	<label for="buy">Buy</label>
						</div>
						<div class="cstm-radio">
						    <input type="radio" class="js-offer" id="rent" value="rent" name="offer"
						    @if(request()->segment(2) == 'rent') checked @endif />
						  	<label for="rent">Rent</label>
						</div>

						<h5 class="mb-1 mt-3">Property Type</h5>
						@foreach(App\Modules\Helpers::propertyType() as $type)
							@php
								$getType = str_replace(' ', '-', $type->type);
								$array =  request()->get('type');
							    $array_type = explode(',', $array);
							@endphp
							<label class="cstm-checkbox"> {{ $type->type }}
								 <input type="checkbox" class="js-type" value="{{ $getType }}" name="type"
								 @if(in_array($getType, $array_type)) checked @endif>
								 <span class="checkmark"></span>
							</label>
						@endforeach
						
						<p>
						</p>
						<h5 class="mb-1 mt-2">Price</h5>
						@php
							$value = request()->get('price');
							$range = explode('-', $value);
						@endphp
						<div class="form-group mr-5">
							<input type="text" class="form-control form-control-sm js-min" placeholder="&#8369; Minimum"
							@if(request()->has('price')) value="{{ $range[0] }}"  @endif>
						</div>
						<div class="form-group mr-5">
							<input type="text" class="form-control form-control-sm js-max" placeholder="&#8369; Maximum"
							@if(request()->has('price')) value="{{ $range[1] }}"  @endif>
						</div>
						<div class="form-group mr-5">
							<button class="btn btn-keyland btn-sm btn-block">APPLY FILTER</button>
						</div>
					</form>
					<form method="GET">
						<h5 class="mb-1 mt-3">Location</h5>
						@if(request()->has('type'))
							<input type="hidden" value="{{ request()->get('type') }}" name="type">
						@endif

						@if(request()->has('price'))
							<input type="hidden" value="{{ request()->get('price') }}" name="price">
						@endif

						<div class="form-group mr-5">
							<select class="form-control form-control-sm js-province" name="province">
								<option selected disabled>Province</option>
								@foreach(App\Modules\Helpers::province() as $prov)
									<option value="{{ $prov->province }}" {{ $prov->province == request()->get('province') ? 'selected':'' }}>{{ $prov->province }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group mr-5">
							<select class="form-control form-control-sm js-municipality" name="city">
								<option selected disabled>Cities/Municipality</option>
								@if(request()->has('province'))
									@foreach(App\Modules\Helpers::cities(request()->get('province')) as $city)
										<option value="{{ $city->city_municipality }}" {{ $city->city_municipality == request()->get('city') ? 'selected':'' }}>{{ $city->city_municipality }}</option>
									@endforeach
								@endif
							</select>
						</div>
						<div class="form-group mr-5">
							<button class="btn btn-keyland btn-sm btn-block">SEARCH LOCATION</button>
							{{-- <a href="{{ URL::to('properties') }}" class="btn btn-outline-keyland btn-sm btn-block">CLEAR FILTER</a> --}}
						</div>
					</form>
				</div>
			</div>
			
			@section('script')
				<script type="text/javascript">
					jQuery(document).ready(function() {

						$('.bs-filter-button').on('click', function() {
			                $('.bs-filter-form').toggle();
			           	});


						$('.js-province').on('change', function(e) {
				     		e.preventDefault();

				     		var option = "";
				     		var province = $(this).val();

				     		$.get(BASE_URL+'/find-city',{ province:province }, function(response) {
				     			option +="<option selected disabled>Cities/Municipality</option>";
				     			$.each(response, function(index, data) {
				     				option +="<option value='"+data.city_municipality+"'>"+data.city_municipality+"</option>";
				     			});

				     			$('.js-municipality').html(option);
				     		});
					   });

						$('#js-filter-form').on('submit', function(e) {
							e.preventDefault();

							var offer = $('.js-offer:checked').val();
							var type = [];

						    $('.js-type:checked').each(function(i,v) {
						        type[i++] = $(this).val();
						    }); 

						    var min = $('.js-min').val();
						 	var max = $('.js-max').val();
						 	var pricerange;
			
							if(min != '' && max != '') {
								
								if(type.length > 0) pricerange = '&price='+min+'-'+max;
								else pricerange = '?price='+min+'-'+max;

							} else pricerange = '';

						    var url = BASE_URL+'/properties';

						    if(offer != 'all') {

						    	if(type.length > 0 ) window.location.href = url+'/'+offer+'?type='+type+pricerange;
						    	else window.location.href = url+'/'+offer+pricerange;

							} else { 

								if(type.length > 0) window.location.href = url+'?type='+type+pricerange;
								else window.location.href = url+pricerange;

							}

						});
					});
				</script>
			@endsection

