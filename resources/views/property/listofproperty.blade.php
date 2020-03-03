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
				        	<div class="col-md-12 mb-3">
				        		<div class="pull-left mr-4">
				        			<form class="form-inline">
				        				<div class="form-group mr-2">
											<select class="form-control form-control-sm" name="status">
												<option selected disabled>List Status</option>
												<option value="approved" {{ request()->get('status') == 'approved' ? 'selected':'' }}>Approved</option>
												<option value="pending" {{ request()->get('status') == 'pending' ? 'selected':'' }}>Pending</option>
											</select>
										</div>
										<button class="btn btn-sm btn-warning"><i class="fa fa-filter"></i></button>
				        			</form>
				        		</div>
				        		@if(Auth::user()->role_id == 1)
					        		<div class="pull-left">
					        			<form class="form-inline">
					        				<div class="form-group mr-2">
												<select class="form-control form-control-sm" name="agent">
													<option selected disabled>Listed By</option>
													@foreach(App\Modules\Helpers::agents() as $agent)
														@php
															$subject = strtolower($agent->fname.' '.$agent->lname);
															$name_slug = str_replace(' ', '-', $subject);
														@endphp
											    		<option value="{{ $name_slug }}" {{ request()->get('agent') == $name_slug ? 'selected':'' }}>{{ $agent->fname.' '.$agent->lname }}</option>
											    	@endforeach
												</select>
											</div>
											<button class="btn btn-sm btn-warning"><i class="icon icon-agents"></i></button>
					        			</form>
					        		</div>
					        	@endif
				        		<div class="pull-right">
				        			<form class="form-inline">
				        				<div class="input-group mr-2" style="width: 300px;">
									    	<input type="text" list="queue" class="form-control form-control-sm" placeholder="Search by city or building" value="{{ request()->get('q') }}" name="q">
									    	<datalist id="queue" style="width: 200px;">
										    	@foreach(App\Modules\Helpers::queue() as $queue)
										    		<option value="{{ $queue->province.', '.$queue->city_municipality }}">{{ $queue->name }}</option>
										    	@endforeach
										  	</datalist>
									  	</div>
									  	<button class="btn btn-sm btn-warning"><i class="fa fa-search"></i></button>
				        			</form>
				        		</div>
				        	</div>
				        	@if(Auth::user()->role_id == 2)
					        	<div class="col-md-12">
					        		<ul id="tabsJustified" class="nav nav-tabs">
						                <li class="nav-item"><a href="{{ URL::to('list-of-properties') }}" class="nav-link small text-uppercase active">List of Properties</a></li>
						                <li class="nav-item"><a href="{{ URL::to('assign-properties') }}" class="nav-link small text-uppercase">Assigned Properties</a></li>
						            </ul>
					        	</div>
					        @endif
				            <div class="col-md-12">
								<table class="table keyland-tbl bg-white border-top-0">
									<thead class="thead-warning">
										<tr>	
											<th class="{{ Auth::user()->role_id == 2 ? 'border-top-0':'' }}" width="7%"></th>
											<th class="{{ Auth::user()->role_id == 2 ? 'border-top-0':'' }}" width="32%">Property</th>
											<th class="{{ Auth::user()->role_id == 2 ? 'border-top-0':'' }} text-center">Type</th>
											<th class="{{ Auth::user()->role_id == 2 ? 'border-top-0':'' }} text-center">Status</th>
											<th class="{{ Auth::user()->role_id == 2 ? 'border-top-0':'' }}">Agent</th>
											<th class="{{ Auth::user()->role_id == 2 ? 'border-top-0':'' }} text-center">Date Listed</th>
											<th class="{{ Auth::user()->role_id == 2 ? 'border-top-0':'' }} text-center">List Status</th>
											{{-- <th class="{{ Auth::user()->role_id == 2 ? 'border-top-0':'' }}">Listed By</th> --}}
											<th class="{{ Auth::user()->role_id == 2 ? 'border-top-0':'' }}"></th>
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
													{{-- <ul class="list-unstyled">
														@foreach($property->agents as $agent)
															<li>
																<small>
																	<i class="fa fa-check text-success"></i>
																	{{ $agent->details->fname.' '.$agent->details->lname }}
																</small>
															</li>
														@endforeach
														@if(count($property->agents) == 0)
															<li>
																<small class="text-danger">No agent assigned</small>
															</li>
														@endif
													</ul> --}}
													{{ $property->author->fname.' '.$property->author->lname }}
												</td>
												<td class="text-center">{{ date('M d,Y', strtotime($property->created_at)) }}</td>
												<td class="text-center">
													@if($property->is_approved == 0)
														<span class="text-warning">Pending</span>
													@elseif($property->is_approved == 1)
														<span class="text-success">Approved</span>
													@elseif($property->is_approved == 2)
														<span class="text-danger">Declined</span>
													@elseif($property->is_approved == 3)
														<span class="text-secondary">Removed</span>
													@endif
												</td>
												{{-- <td>{{ $property->author->fname.' '.$property->author->lname }}</td> --}}
												<td class="text-center px-2">
													<div class="dropdown hamburger">
													  	<a href="javascript:void(0)" class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
													 	<div class="dropdown-menu cstm-menu" aria-labelledby="dropdownMenuButton">
													 		<a class="dropdown-item" href="{{ URL::to('list-of-properties/'.$property->code) }}"><i class="fa fa-eye"></i> View Details</a>
													  	</div>
													</div>
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

