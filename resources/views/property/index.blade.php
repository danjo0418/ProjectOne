@extends('layouts.app')
@section('title')<title>Properties - {{ config('app.name') }}</title>@endsection
@section('page')	
	@include('layouts.sidebar')
				<div class="col-md-10 pt-3 text-left">
					<section class="container">
				        <div class="row">
				        	<div class="col-md-12">
				        		<h5>Properties</h5>
				        	</div>
				        	<div class="col-md-12 mb-3">
				        		<div class="pull-left">
				        			<a href="{{ URL::to('site/create-property') }}" class="btn btn-sm btn-keyland">
				        				<i class="fa fa-plus-circle"></i>
				        				Post Property
				        			</a>
				        		</div>
								<form class="form-inline pull-right col-md-6">
								  	<div class="input-group mr-2" style="width: 70%;">
								    	<input type="text" list="queue" class="form-control form-control-sm pr-2" placeholder="Search by city or building" value="{{ request()->get('q') }}" name="q">
								    	<datalist id="queue" style="width: 200px;">
									    	@foreach(App\Modules\Helpers::queue() as $queue)
									    		<option value="{{ $queue->province.', '.$queue->city_municipality }}">{{ $queue->name }}</option>
									    	@endforeach
									  	</datalist>
								  	</div>
								  	@if(request()->has('q'))
									  	<a href="{{ URL::to('site/property') }}" class="btn btn-sm btn-danger"><i class="fa fa-search-minus"></i></a>
									@else
										<button class="btn btn-sm btn-warning"><i class="fa fa-search"></i></button>
									@endif
								  	<a href="javascript:void(0)" class="btn btn-sm btn-dark ml-3 toggle-btn">
								  		<i class="fa fa-indent"></i>
								  		Filter
								  	</a>
								</form>
				        	</div>
				            <div class="col md-12 table-responsive-sm">
								@if(count($properties) > 0)
									<table class="table keyland-tbl">
										<thead class="thead-warning">
											<tr>	
												<th width="7%"></th>
												<th>Property</th>
												<th class="text-center">Type</th>
												<th class="text-center">Status</th>
												<th>Agents</th>
												<th class="text-center">Date Posted</th>
												<th>Created By</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											@foreach($properties as $property)
												<tr>
													<td>
														@if(is_null($property->thumbnail))
															<img src="{{ asset('assets/img/properties/placeholder.png') }}" class="property-thumbnail" alt="{{ $property->name }}">
														@else
															<img src="{{ asset('assets/img/properties/thumb/'.$property->thumbnail->filename) }}" class="property-thumbnail" alt="{{ $property->name }}">
														@endif
													</td>
													<td>
														<strong class="text-primary">{{ $property->name }}</strong><br>
														<small>
															<i class="fa fa-map-marker"></i>
															{{ $property->street_barangay.', '.$property->city_municipality.', '.$property->province }}
														</small>
													</td>
													<td  class="text-center">
														<span>{{ $property->type->type }}</span><br>
														@if($property->offer_type == 'buy')
															<span class="text-success">For Sell</span>
														@else
															<span class="text-warning">For Rent</span>
														@endif
													</td>
													<td class="text-center">{{ $property->status->status }}</td>
													<td>
														<ul class="list-unstyled">
															@if(count($property->agents) > 0)
																@foreach($property->agents as $agent)
																	<li>
																		<small>
																			<i class="fa fa-check text-success"></i>
																			{{ $agent->details->fname.' '.$agent->details->lname }}
																		</small>
																	</li>
																@endforeach
															@else
																<li>
																	<small class="text-danger">No agent assigned</small>
																</li>
															@endif
														</ul>
													</td>
													<td class="text-center">{{ date('M d,Y', strtotime($property->created_at)) }}</td>
													<td>
														
													</td>
													<td class="text-center px-2">
														<div class="dropdown hamburger">
														  	<a href="javascript:void(0)" class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
														 	<div class="dropdown-menu cstm-menu" aria-labelledby="dropdownMenuButton">
														 		<a class="dropdown-item" href="{{ URL::to('site/property-details/'.$property->code) }}">
														    		<i class="fa fa-eye"></i> View Details
														    	</a>
														  	</div>
														</div>
													</td>
												</tr>
											@endforeach
										</tbody>
									</table>
								@else
									<div class="col-12">
								  		<div class="error-message text-center mb-5">
								  			<h2><i class="icon icon-property"></i></h2>
								  			<h5 class="mb-0"><strong>NO RESULTS FOUND</strong></h5>
											<small>There is no data for property.</small>
								  		</div>
									</div>
								@endif
							</div>
							<div class="col-md-12">
								<nav class="cstm-paginate" aria-label="Page navigation example">
								   {{ $properties->links() }}
								</nav>
							</div>
							<div class="toggle-box" style="display: none;">
				                <div class="toggle-header">
				                    <a href="javascript:void(0)" class="toggle-btn"><i class="fa fa-indent pull-left"></i></a>
				                    <h5>Filter Property</h5>
				                </div>
				                <div class="toggle-box-inner">
				                	<form id="js-filter-form">
										<h5 class="mb-1 mt-2">Offer Type</h5>
										<div class="cstm-radio">
										    <input type="radio" class="js-offer" id="All" value="all" name="offer" 
										    @if(request()->segment(2) == 'property') checked @endif />
										  	<label for="All">All</label>
										</div>
										<div class="cstm-radio">
										    <input type="radio" class="js-offer" id="buy" value="buy" name="offer" 
										    @if(request()->segment(3) == 'buy') checked @endif />
										  	<label for="buy">Buy</label>
										</div>
										<div class="cstm-radio">
										    <input type="radio" class="js-offer" id="rent" value="rent" name="offer"
										    @if(request()->segment(3) == 'rent') checked @endif />
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
										<div class="form-group">
											<input type="text" class="form-control form-control-sm js-min" placeholder="&#8369; Minimum"
											@if(request()->has('price')) value="{{ $range[0] }}"  @endif>
										</div>
										<div class="form-group">
											<input type="text" class="form-control form-control-sm js-max" placeholder="&#8369; Maximum"
											@if(request()->has('price')) value="{{ $range[1] }}"  @endif>
										</div>
										<div class="form-group">
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

										<div class="form-group">
											<select class="form-control form-control-sm js-province" name="province">
												<option selected disabled>Province</option>
												@foreach(App\Modules\Helpers::province() as $prov)
													<option value="{{ $prov->province }}" {{ $prov->province == request()->get('province') ? 'selected':'' }}>{{ $prov->province }}</option>
												@endforeach
											</select>
										</div>
										<div class="form-group">
											<select class="form-control form-control-sm js-municipality" name="city">
												<option selected disabled>Cities/Municipality</option>
												@if(request()->has('province'))
													@foreach(App\Modules\Helpers::cities(request()->get('province')) as $city)
														<option value="{{ $city->city_municipality }}" {{ $city->city_municipality == request()->get('city') ? 'selected':'' }}>{{ $city->city_municipality }}</option>
													@endforeach
												@endif
											</select>
										</div>
										<div class="form-group">
											<button class="btn btn-keyland btn-sm btn-block">SEARCH LOCATION</button>
											{{-- <a href="{{ URL::to('site/property') }}" class="btn btn-outline-keyland btn-sm btn-block">CLEAR FILTER</a> --}}
										</div>
									</form>
				                </div>
				            </div>
				        </div>
				    </section>
				</div>
			</div>
		</div>
	</div>
	<div class="spacer"></div>
@endsection

@section('script')
	<script type="text/javascript">

        jQuery(document).ready(function($) {
           	$('.toggle-btn').on('click', function() {
                $('.toggle-box').animate({width:'toggle'});
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

			    var url = BASE_URL+'/site/property';

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

