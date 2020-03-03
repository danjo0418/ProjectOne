@extends('layouts.app')
@section('title')<title>{{ $detail->fname.' '.$detail->lname }} - {{ config('app.name') }} </title>@endsection
@section('page')	
	@include('layouts.sidebar')
				<div class="col-md-10 pt-3 text-left">
					<section class="container">
				        <div class="row">
				        	<div class="col-md-12">
			        			<h3>{{ $detail->fname.' '.$detail->lname }}</h3>
								<nav aria-label="breadcrumb">
								  	<ol class="breadcrumb cstm-breadcrumb">
								    	<li class="breadcrumb-item"><a href="{{ URL::previous() }}"><i class="fa fa-angle-double-left "></i> Back to previous</a></li>
								    	<li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $detail->fname.' '.$detail->lname }}</a></li>
								 	</ol>
								</nav>
			        		</div>
				        	<div class="col-md-12 mb-3">
							  	<div class="dropdownht">
								  	<a href="javascript:void(0)" class="dropdown-toggle btn btn-keyland" id="dropdownMenuButton" data-toggle="dropdown"><i class="fa fa-cogs"></i> Actions</a>
								  	<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								  		@if($detail->is_approved == 1)
									    	<a class="dropdown-item" href="{{ URL::to('update-agents/'.$detail->code) }}">
									    		Update Details
									    	</a>
									    	@if($detail->status == 'inactive')
										    	<a class="dropdown-item" href="javascript:void(0)" onclick="activeAgent({{ $detail }})">
										    		Activate
										    	</a>
										    @else
										    	<a class="dropdown-item" href="javascript:void(0)" onclick="inactiveAgent({{ $detail }})">
										    		Inactive
										    	</a>
										    @endif
										@else
											<a onclick="approve({{ $detail }})" class="dropdown-item" href="javascript:void(0)">
												Approve
											</a>
											@if($detail->is_approved != 2)
												<a onclick="decline({{ $detail }})" class="dropdown-item" href="javascript:void(0)">
													Decline
												</a>
											@endif
										@endif
								  	</div>
								</div>
							</div>
				        </div>
				        <div class="row">
				        	<div class="col-md-12 mb-5">
			        			<div class="card {{ $detail->status == 'inactive' ? 'border-danger':'' }}">
				        			<div class="card-body">
				        				<div class="row">
				        					<div class="col-md-3">
				        						<div id="settings-img">
						        					@if(is_null($detail->profile))
		                            					<img src="{{ asset('assets/img/users/placeholder.png') }}" class="file-upload-img" alt="{{ $detail->fname }}">
		                            				@else
		                            					<img src="{{ asset('assets/img/users/'.$detail->profile) }}" class="file-upload-img" alt="{{ $detail->fname }}">
		                            				@endif
						        				</div>
				        					</div>
				        					<div class="col-md-8">
				        						<div class="row">
				        							<div class="col-md-6">
				        								<p><strong>Firstname:</strong> <br> {{ $detail->fname }}</p>
				        							</div>
				        							<div class="col-md-6">
				        								<p><strong>Lastname:</strong> <br> {{ $detail->lname }}</p>
				        							</div>
				        						</div>
				        						<div class="row">
				        							<div class="col-md-6">
				        								<p><strong>Email:</strong> <br> {{ $detail->email }} </p>
				        							</div>
				        							<div class="col-md-6">
				        								<p><strong>Phone Number:</strong> <br>  {{ $detail->phone }}</p>
				        							</div>
				        						</div>
				        						<div class="row">
				        							<div class="col-md-6">
				        								<p><strong>Facebook URL:</strong> <br> <a href="{{ $detail->socialmedia }}" target="_blank">{{ $detail->socialmedia }}</a></p>
				        							</div>
				        							<div class="col-md-6">
				        								<p>
				        									<strong>Status:</strong> <br> 
				        									@if($detail->is_approved == 2)
																<span class="text-danger">
														   			Declined
														   		</span>
															@else
																<span class="text-danger">
																	<span class="text-success {{ $detail->status == 'active' ? 'text-success':'text-danger' }}">{{ ucwords($detail->status) }}</span>
																</span>
															@endif
				        								</p>
				        							</div>
				        						</div>
				        						<div class="row">
				        							<div class="col-md-6">
				        								<p class="m-0"><strong>Teamlead:</strong></p>
				        								@if($detail->is_teamlead == 1)
															<p>A team leader</p>
														@else
															<p>
																<?php
																	$teamlead = App\Modules\Helpers::findTeamLead($detail->teamlead_id);
																	
																	if(is_object($teamlead)) echo $teamlead->fname.' '.$teamlead->lname;
																	else echo "<small class='text-danger'>Not Applicable</small>";
																?>
															</p>
														@endif
				        							</div>
				        							<div class="col-md-6">
				        								<p>
				        									<strong>Date Register</strong><br>
				        									{{ date('M d,Y', strtotime($detail->created_at)) }}
				        								</p>
				        							</div>
				        						</div>
				        					</div>
				        				</div>
				        			</div>
				        		</div>
				        	</div>
							<div class="col-md-12">
								<h5>Properties</h5>
								<ul id="tabsJustified" class="nav nav-tabs">
				                    <li class="nav-item"><a href="javascript:void(0)" data-target="#assigned" data-toggle="tab" class="nav-link small text-uppercase active">List of Properties</a></li>
				                    <li class="nav-item"><a href="javascript:void(0)" data-target="#listed" data-toggle="tab" class="nav-link small text-uppercase">Assigned Properties</a></li>
				                </ul>
				                <div id="tabsJustifiedContent" class="tab-content">
					                <div id="assigned" class="tab-pane fade active show">
										<div class="col-md-12 p-0">
											<table class="table keyland-tbl bg-white border-top-0">
												<thead class="thead-warning">
													<tr>	
														<th class="border-top-0" width="7%"></th>
														<th class="border-top-0" width="32%">Property</th>
														<th class="border-top-0 text-center">Type</th>
														<th class="border-top-0 text-center">Status</th>
														<th class="border-top-0">Agent</th>
														<th class="border-top-0 text-center">Date Listed</th>
														<th class="border-top-0 text-center">List Status</th>
														{{-- <th class="border-top-0">Listed By</th> --}}
														<th class="border-top-0"></th>
													</tr>
												</thead>
												<tbody>
													@foreach($listed as $property)
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
																@endif
															</td>
															{{-- <td>
																{{ $property->author->fname.' '.$property->author->lname }}
															</td> --}}
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
											@if(count($listed) == 0)
										  		<div class="col-12 p-5">
											  		<div class="error-message text-center mt-5">
											  			<h1><i class="icon icon-property"></i></h1>
											  			<h4 class="mb-0"><strong>NO RESULTS FOUND</strong></h4>
														<small>There is no list of property.</small>
											  		</div>
												</div>
											@endif
										</div>
										<div class="col-md-12 p-0">
											<nav class="cstm-paginate cstm-right" aria-label="Page navigation example">
											   {{ $listed->links() }}
											</nav>
										</div>
				                	</div>
				                	<div id="listed" class="tab-pane fade">
						        		<div class="col-md-12 p-0">
											<table class="table keyland-tbl border-top-0" style="background: #fff;">
												<thead class="thead-warning">
													<tr>
														<th class="border-top-0" width="7%"></th>	
														<th class="border-top-0" width="32%">Property</th>
														<th class="text-center border-top-0">Type</th>
														<th class="text-center border-top-0">Status</th>
														<th>Agent</th>
														<th class="text-center border-top-0">Date Listed</th>
														{{-- <th class="border-top-0">Listed By</th> --}}
														<th class="border-top-0"></th>
													</tr>
												</thead>
												<tbody>
													@foreach($assigned as $assign)
														<tr>
															<td>
																@php
																	$file = App\Modules\Helpers::thumbnail($assign->id);
																@endphp

																@if(is_object($file))
																	<img src="{{ asset('assets/img/properties/thumb/'.$file->filename) }}" class="property-thumbnail" alt="{{ $assign->name }}">
																@else
																	<img src="{{ asset('assets/img/properties/placeholder.png') }}" class="property-thumbnail" alt="{{ $assign->name }}">
																@endif
															</td>
															<td>
																<strong class="text-primary">{{ $assign->name }}</strong><br>
																<small>
																	<i class="fa fa-map-marker"></i>
																	{{ ucwords($assign->street_barangay).', '.ucwords($assign->city_municipality).', '.$assign->province }}
																</small>
															</td>
															<td  class="text-center">
																<span>{{ $assign->type }}</span><br>
																@if($assign->offer_type == 'buy')
																	<span class="text-success">For Sell</span>
																@else
																	<span class="text-warning">For Rent</span>
																@endif
															</td>
															<td class="text-center">{{ $assign->status }}</td>
															<td>
																{{-- <ul class="list-unstyled">
																	@foreach(App\Modules\Helpers::propertyAgents($assign->id) as $agent)
																		<li>
																			<small>
																				<i class="fa fa-check text-success"></i>
																				{{ ucwords($agent->details->fname).' '.ucwords($agent->details->lname) }}
																			</small>
																		</li>
																	@endforeach
																	@if(count(App\Modules\Helpers::propertyAgents($assign->id)) == 0)
																		<li>
																			<small class="text-danger">No agent assigned</small>
																		</li>
																	@endif
																</ul> --}}
																{{ $assign->listed_fname.' '.$assign->listed_lname }}
															</td>
															<td class="text-center">
																{{ date('M d,Y', strtotime($assign->created_at)) }}
															</td>
															{{-- <td>
																{{ $assign->listed_fname.' '.$assign->listed_lname }}
															</td> --}}
															<td class="text-center px-2">
																<div class="dropdown hamburger">
																  	<a href="javascript:void(0)" class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
																 	<div class="dropdown-menu cstm-menu" aria-labelledby="dropdownMenuButton">
																 		<a class="dropdown-item" href="{{ URL::to('list-of-properties/'.$assign->code) }}"><i class="fa fa-eye"></i> View Details</a>
																  	</div>
																</div>
															</td>
														</tr>
													@endforeach
												</tbody>
											</table>
											@if(count($assigned) == 0)
										  		<div class="col-12 p-5">
											  		<div class="error-message text-center mt-5">
											  			<h1><i class="icon icon-property"></i></h1>
											  			<h4 class="mb-0"><strong>NO RESULTS FOUND</strong></h4>
														<small>There is no list of property.</small>
											  		</div>
												</div>
											@endif
										</div>
										<div class="col-md-12 p-0">
											<nav class="cstm-paginate cstm-right" aria-label="Page navigation example">
											   {{ $assigned->links() }}
											</nav>
										</div>
				                	</div>
				                </div>
							</div>
				        </div>
				    </section>
				</div>
			</div>
		</div>
	</div>
	<div class="spacer"></div>
	@include('modal.agent.active')
	@include('modal.agent.inactive')
	@include('modal.agent.approve')
	@include('modal.agent.decline')
@endsection
@section('script')
	<script type="text/javascript">
		
		function activeAgent(agent) {
			$('.js-agentid').val(agent.id);
			$('.js-ac-name').val(agent.fname+' '+agent.lname);
			$('.js-activename').append(agent.fname+' '+agent.lname);
			$('#activeAgent').modal('show');
		}

		function inactiveAgent(agent) {
			$('.js-agentid').val(agent.id);
			$('.js-in-name').val(agent.fname+' '+agent.lname);
			$('.js-inactivename').append(agent.fname+' '+agent.lname);
			$('#inactiveAgent').modal('show');
		}

		function approve(agent) {
			
			$('.app-name').append(agent.fname+' '+agent.lname);
			$('.app-email').append(agent.email);
			$('.approve-id').val(agent.id);
			$('.approve-name').val(agent.fname+' '+agent.lname);
			$('#approveAgent').modal('show');
		}

		function decline(agent) {
			$('.dec-name').append(agent.fname+' '+agent.lname);
			$('.dec-email').append(agent.email);
			$('.decline-id').val(agent.id);
			$('.decline-name').val(agent.fname+' '+agent.lname);
			$('#declineAgent').modal('show');
		}

	</script>
@endsection

