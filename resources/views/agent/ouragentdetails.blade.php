@extends('layouts.app')
@section('title')<title>{{ $detail->fname.' '.$detail->lname }} - {{ config('app.name') }}</title>@endsection
@section('page')
	<div class="container">
		<div class="col-md-12 mt-4">
			<nav aria-label="breadcrumb">
			  	<ol class="breadcrumb">
			    	<li class="breadcrumb-item">
			    		<a href="{{ URL::to('our-agents') }}">
			    			Our Agents
			    		</a>
			    	</li>
	    			<li class="breadcrumb-item active">
	    				<a href="javscript:void(0)">
	    					{{ $detail->fname.' '.$detail->lname }}
	    				</a>
	    			</li>
			  	</ol>
			</nav>
		</div>
		<div class="col-md-12">
			<div class="headprofile">
				<div class="row">
					<div class="col-md-3">
						@if(is_null($detail->profile))
        					<img src="{{ asset('assets/img/users/placeholder.png') }}" class="img-fluid" width="220" alt="{{ $detail->fname }}">
        				@else
        					<img src="{{ asset('assets/img/users/'.$detail->profile) }}" class="img-fluid" width="220" alt="{{ $detail->fname }}">
        				@endif
					</div>
					<div class="col-md-9">
						<div class="agent-details">
							<div class="agent-name">
								<strong>{{ strtoupper($detail->fname).' '.strtoupper($detail->lname) }}</strong> -  
								<small style="padding:0;">
									@if($detail->is_teamlead == 1)
										Team Leader
									@else
										<?php
											$teamlead = App\Modules\Helpers::findTeamLead($detail->teamlead_id);
											
											if(is_object($teamlead)) echo $teamlead->fname.' '.$teamlead->lname;
											else echo "<small class='text-danger'>Not Applicable</small>";
										?>
									@endif
								</small>
							</div>

							<div class="agent-contact pt-4">
								<strong>Contact Information</strong><br/>
								<table style="width:100%;">
									<tr>
										<td>Contact Number: <a href="tel:{{ $detail->phone }}">{{ $detail->phone }}</a></td>
									</tr>
									<tr>
										<td>Email Address: <a href="mailto:{{ $detail->email }}">{{ $detail->email }}</a> </td>
									</tr>
									<tr>
										<td>Facebook: <a href="{{ $detail->socialmedia }}" target="_blank">{{ $detail->socialmedia }}</a></td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<h5>Properties</h5>
			<ul id="tabsJustified" class="nav nav-tabs">
                <li class="nav-item"><a href="javascript:void(0)" data-target="#listed" data-toggle="tab" class="nav-link small text-uppercase active">List of Properties</a></li>
                <li class="nav-item"><a href="javascript:void(0)" data-target="#assigned" data-toggle="tab" class="nav-link small text-uppercase">Assigned Properties</a></li>
            </ul>
            <div id="tabsJustifiedContent" class="tab-content">
            	 <div id="listed" class="tab-pane fade active show">
	            	<div class="col-md-10 col-sm-12 p-0 my-4">
	            		<div class="row">
							@foreach($listed as $list)
								<div class="col-md-10 mb-4">
									<div class="card shadow">
										<div class="ListCell-row">
											<div class="ListCell-img">
												@if(is_null($list->thumbnail))
													<img src="{{ asset('assets/img/properties/placeholder.png') }}" alt="{{ $list->name }}"/>
												@else
													<img src="{{ asset('assets/img/properties/'.$list->thumbnail->filename) }}" alt="{{ $list->name }}"/>
												@endif
											</div>
											<div class="ListCell-info">
												<small>{{ date('M d,Y', strtotime($list->created_at)) }}</small>
												<h5 class="title">{{ $list->name }}</h5>
												<p class="address fontsmall"><i class="fa fa-map-marker"></i> {{ ucwords($list->street_barangay).', '.ucwords($list->city_municipality).', '.ucwords($list->province) }}</p>

												<h5 class="price">
													@if($list->offer_type == 'buy')
														&#8369; {{ number_format($list->price) }}
													@else
														&#8369; {{ number_format($list->price) }}<span style="font-size: 13px;"> / {{ ucwords($list->price_condition) }}</span>
													@endif
												</h5>
												<ul class="list-unstyled">
													@if(!empty($list->bedrooms))
														<li>
															Bedrooms: {{ $list->bedrooms }}
														</li>
													@endif
													@if(!empty($list->bathrooms))
														<li>
															Bathrooms: {{ $list->bathrooms }}
														</li>
													@endif
													@if(!empty($list->floor_area))
														<li>
															Floor Area: {{ $list->floor_area }} (sqm)
														</li>
													@endif
													@if(!empty($list->land_size))
														<li>
															Land Size: {{ $list->land_size }} (sqm)
														</li>
													@endif 
													@if(!empty($list->rooms))
														<li>
															Rooms: {{ $list->rooms }}
														</li>
													@endif 
													@if(!empty($list->car_space))
														<li>
															Car Space: {{ $list->car_space }} 
														</li>
													@endif 
													@if(!empty($list->building_name))
														<li>
															Building Name: {{ $list->building_name }}
														</li>
													@endif 
													@if(!empty($list->build_year))
														<li>
															Build Year: {{ $list->build_year }}
														</li>
													@endif 
													@if(!empty($list->deposit_bond))
														<li>
															Deposit/ Bond: {{ $list->deposit_bond }}
														</li>
													@endif 
													@if(!empty($list->block_lotnum))
														<li>
															Block and Lot/Unit/Floor:{{ $list->block_lotnum }}
														</li>
													@endif 

													@guest 
													@else
														@if(!empty($list->developer))
															<li>
																Developer: {{ $list->developer }}
															</li>
														@endif 
													@endguest
												</ul>
												<p class="mb-0 mt-2 view-btn"><a href="{{ URL::to('property-details/'.$list->code) }}" class="btn btn-keyland fontsmall">View Details</a></p>
											</div>
										</div>
									</div>
								</div>
							@endforeach
						</div>
						<div class="col-md-12 p-0">
							<nav class="cstm-paginate cstm-left" aria-label="Page navigation example">
							    {{ $listed->links() }}
							</nav>
						</div>
	            	</div>
	            	@if(count($listed) == 0)
						<div class="col-md-12">
					  		<div class="error-message text-center mt-5">
					  			<h1><i class="icon icon-property"></i></h1>
					  			<h4 class="mb-0"><strong>NO RESULTS FOUND</strong></h4>
								<small>There is no list of property.</small>
					  		</div>
						</div>
					@endif
	            </div>
            	<div id="assigned" class="tab-pane fade">
            		<div class="col-md-10 col-sm-12 p-0 my-4">
            			<div class="row">
							@foreach($assigned as $assign)
								<div class="col-md-10 mb-4">
									<div class="card shadow">
										<div class="ListCell-row">
											<div class="ListCell-img">
												@php
													$file = App\Modules\Helpers::thumbnail($assign->id);
												@endphp

												@if(is_object($file))
													<img src="{{ asset('assets/img/properties/thumb/'.$file->filename) }}" alt="{{ $assign->name }}">
												@else
													<img src="{{ asset('assets/img/properties/placeholder.png') }}" alt="{{ $assign->name }}">
												@endif
											</div>
											<div class="ListCell-info">
												<small>{{ date('M d,Y', strtotime($assign->created_at)) }}</small>
												<h5 class="title">{{ $assign->name }}</h5>
												<p class="address fontsmall"><i class="fa fa-map-marker"></i> {{ ucwords($assign->street_barangay).', '.ucwords($assign->city_municipality).', '.ucwords($assign->province) }}</p>

												<h5 class="price">
													@if($assign->offer_type == 'buy')
														&#8369; {{ number_format($assign->price) }}
													@else
														&#8369; {{ number_format($assign->price) }}<span style="font-size: 13px;"> / {{ ucwords($assign->price_condition) }}</span>
													@endif
												</h5>
												<ul class="list-unstyled">
													@if(!empty($assign->bedrooms))
														<li>
															Bedrooms: {{ $assign->bedrooms }}
														</li>
													@endif
													@if(!empty($assign->bathrooms))
														<li>
															Bathrooms: {{ $assign->bathrooms }}
														</li>
													@endif
													@if(!empty($assign->floor_area))
														<li>
															Floor Area: {{ $assign->floor_area }} (sqm)
														</li>
													@endif
													@if(!empty($assign->land_size))
														<li>
															Land Size: {{ $assign->land_size }} (sqm)
														</li>
													@endif 
													@if(!empty($assign->rooms))
														<li>
															Rooms: {{ $assign->rooms }}
														</li>
													@endif 
													@if(!empty($assign->car_space))
														<li>
															Car Space: {{ $assign->car_space }} 
														</li>
													@endif 
													@if(!empty($assign->building_name))
														<li>
															Building Name: {{ $assign->building_name }}
														</li>
													@endif 
													@if(!empty($assign->build_year))
														<li>
															Build Year: {{ $assign->build_year }}
														</li>
													@endif 
													@if(!empty($assign->deposit_bond))
														<li>
															Deposit/ Bond: {{ $assign->deposit_bond }}
														</li>
													@endif 
													@if(!empty($assign->block_lotnum))
														<li>
															Block and Lot/Unit/Floor:{{ $assign->block_lotnum }}
														</li>
													@endif 

													@guest 
													@else
														@if(!empty($assign->developer))
															<li>
																Developer: {{ $assign->developer }}
															</li>
														@endif 
													@endguest
												</ul>
												<p class="mb-0 mt-2 view-btn"><a href="{{ URL::to('property-details/'.$assign->code) }}" class="btn btn-keyland fontsmall">View Details</a></p>
											</div>
										</div>
									</div>
								</div>
							@endforeach
						</div>
						<div class="col-md-12 p-0">
							<nav class="cstm-paginate cstm-left" aria-label="Page navigation example">
							    {{ $assigned->links() }}
							</nav>
						</div>
            		</div>
            		@if(count($assigned) == 0)
						<div class="col-md-12">
					  		<div class="error-message text-center mt-5">
					  			<h1><i class="icon icon-property"></i></h1>
					  			<h4 class="mb-0"><strong>NO RESULTS FOUND</strong></h4>
								<small>There is no list of property.</small>
					  		</div>
						</div>
					@endif
            	</div>
	        </div>
		</div>
	</div>
	@include('layouts.footer')
@endsection