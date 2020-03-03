@extends('layouts.app')
@section('title')<title>List of Properties - {{ config('app.name') }}</title>@endsection
@section('page')	
	@include('layouts.sidebar')
				<div class="col-md-10 pt-3" style="background: #eee; min-height: 600px;">
					<section class="container">
				        <div class="row">
				        	<div class="col-md-12 mb-3">
				        		@if(Auth::user()->role_id == 1)
				        			<h5>List of Properties</h5>
				        		@else
				        			<h5>Properties</h5>
				        		@endif
				        		<a href="{{ URL::to('list-your-property') }}" class="btn btn-sm btn-keyland">
			        				<i class="fa fa-plus-circle"></i>
			        				List Your Property
			        			</a>
				        	</div>
				        	<div class="col-md-12">
				        		<div class="pull-right">
				        			<form class="form-inline">
				        				<div class="form-group mr-2">
											<select class="form-control form-control-sm" name="agent">
												<option selected disabled>Listed By</option>
												@foreach(App\Modules\Helpers::agents() as $agent)
													@php
														$subject = strtolower($agent->fname.' '.$agent->lname);
														$name_slug = str_replace(' ', '-', $subject);
													@endphp
													@if(Auth::user()->id != $agent->id)
										    			<option value="{{ $name_slug }}" {{ request()->get('agent') == $name_slug ? 'selected':'' }}>{{ $agent->fname.' '.$agent->lname }}</option>
										    		@endif
										    	@endforeach
											</select>
										</div>
										<button class="btn btn-sm btn-warning"><i class="icon icon-agents"></i></button>
				        			</form>
				        		</div>
				        	</div>
				        	@if(Auth::user()->role_id == 2)
					        	<div class="col-md-12">
					        		<ul id="tabsJustified" class="nav nav-tabs">
						                <li class="nav-item"><a href="{{ URL::to('list-of-properties') }}" class="nav-link small text-uppercase">List of Properties</a></li>
						                <li class="nav-item"><a href="{{ URL::to('assign-properties') }}" class="nav-link small text-uppercase active">Assigned Properties</a></li>
						            </ul>
					        	</div>
					        @endif
				            <div class="col-md-12">
								<table class="table keyland-tbl border-top-0" style="background: #fff;">
									<thead class="thead-warning">
										<tr>
											<th class="border-top-0" width="7%"></th>	
											<th class="border-top-0" width="32%">Property</th>
											<th class="text-center border-top-0">Type</th>
											<th class="text-center border-top-0">Status</th>
											<th>Agent</th>
											<th class="text-center border-top-0">Date Listed</th>
										</tr>
									</thead>
									<tbody>
										@foreach($properties as $property)
											<tr>
												<td>
													@php
														$file = App\Modules\Helpers::thumbnail($property->id);
													@endphp
													@if(is_object($file))
														<img src="{{ asset('assets/img/properties/thumb/'.$file->filename) }}" class="property-thumbnail" alt="{{ $property->name }}">
													@else
														<img src="{{ asset('assets/img/properties/placeholder.png') }}" class="property-thumbnail" alt="{{ $property->name }}">
													@endif
												</td>
												<td>
													<strong class="text-primary">{{ $property->name }}</strong><br>
													<small>
														<i class="fa fa-map-marker"></i>
														{{ ucwords($property->street_barangay).', '.ucwords($property->city_municipality).', '.$property->province }}
													</small>
												</td>
												<td  class="text-center">
													<span>{{ $property->type }}</span><br>
													@if($property->offer_type == 'buy')
														<span class="text-success">For Sell</span>
													@else
														<span class="text-warning">For Rent</span>
													@endif
												</td>
												<td class="text-center">{{ $property->status }}</td>
												<td>
													{{ $property->listed_fname.' '.$property->listed_lname }}
												</td>
												<td class="text-center">
													{{ date('M d,Y', strtotime($property->created_at)) }}
												</td>
											</tr>
										@endforeach
									</tbody>
								</table>
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
							<div class="col-md-12">
								<nav class="cstm-paginate cstm-right" aria-label="Page navigation example">
								   {{ $properties->links() }}
								</nav>
							</div>
				        </div>
				    </section>
				    <section class="spacer"></section>
				</div>
			</div>
		</div>
	</div>
@endsection

