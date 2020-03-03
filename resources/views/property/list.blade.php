@extends('layouts.app')
@section('title')<title>List of Properties - {{ config('app.name') }}</title>@endsection
@section('page')	
	@include('layouts.carousel')
	@include('layouts.filter')
				<div class="col-md-9 col-sm-12 p-0">
					<div class="row ListCell-wrap">
						@foreach($properties as $property)
							<div class="col-md-11 mb-4">
								<div class="card shadow">
									<div class="ListCell-row">
										<div class="ListCell-img">
											@if(is_null($property->thumbnail))
												<img src="{{ asset('assets/img/properties/placeholder.png') }}" alt="{{ $property->name }}"/>
											@else
												<img src="{{ asset('assets/img/properties/'.$property->thumbnail->filename) }}" alt="{{ $property->name }}"/>
											@endif
										</div>
										<div class="ListCell-info">
											<small>{{ date('M d,Y', strtotime($property->created_at)) }}</small>
											<h5 class="title">{{ $property->name }}</h5>
											<p class="address fontsmall"><i class="fa fa-map-marker"></i> {{ ucwords($property->street_barangay).', '.ucwords($property->city_municipality).', '.ucwords($property->province) }}</p>

											<h5 class="price">
												@if($property->offer_type == 'buy')
													&#8369; {{ number_format($property->price) }}
												@else
													&#8369; {{ number_format($property->price) }}<span style="font-size: 13px;"> / {{ ucwords($property->price_condition) }}</span>
												@endif
											</h5>
											<ul class="list-unstyled">
												@if(!empty($property->bedrooms))
													<li>
														Bedrooms: {{ $property->bedrooms }}
													</li>
												@endif
												@if(!empty($property->bathrooms))
													<li>
														Bathrooms: {{ $property->bathrooms }}
													</li>
												@endif
												@if(!empty($property->floor_area))
													<li>
														Floor Area: {{ $property->floor_area }} (sqm)
													</li>
												@endif
												@if(!empty($property->land_size))
													<li>
														Land Size: {{ $property->land_size }} (sqm)
													</li>
												@endif 
												@if(!empty($property->rooms))
													<li>
														Rooms: {{ $property->rooms }}
													</li>
												@endif 
												@if(!empty($property->car_space))
													<li>
														Car Space: {{ $property->car_space }} 
													</li>
												@endif 
												@if(!empty($property->building_name))
													<li>
														Building Name: {{ $property->building_name }}
													</li>
												@endif 
												@if(!empty($property->build_year))
													<li>
														Build Year: {{ $property->build_year }}
													</li>
												@endif 
												@if(!empty($property->deposit_bond))
													<li>
														Deposit/ Bond: {{ $property->deposit_bond }}
													</li>
												@endif 
												@if(!empty($property->block_lotnum))
													<li>
														Block and Lot/Unit/Floor:{{ $property->block_lotnum }}
													</li>
												@endif 

												@guest 
												@else
													@if(!empty($property->developer))
														<li>
															Developer: {{ $property->developer }}
														</li>
													@endif 
												@endguest
											</ul>
											<p class="mb-0 mt-2 view-btn"><a href="{{ URL::to('property-details/'.$property->code) }}" class="btn btn-keyland fontsmall">View Details</a></p>
										</div>
									</div>
								</div>
							</div>
						@endforeach
						@if(count($properties) == 0)
							<div class="col-12 p-5">
						  		<div class="error-message text-center mt-5">
						  			<h1><i class="icon icon-property"></i></h1>
						  			<h4 class="mb-0"><strong>NO RESULTS FOUND</strong></h4>
									<small>There is no list of property.</small>
						  		</div>
							</div>
						@endif
					</div>
					<div class="col-sm-12">
						<nav class="cstm-paginate cstm-center" aria-label="Page navigation example">
						    {{ $properties->links() }}
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
	@include('layouts.footer')
@endsection