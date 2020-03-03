@extends('layouts.app')
@section('title')<title>List of Agents - {{ config('app.name') }}</title>@endsection
@section('page')	
	@include('layouts.sidebar')
				<div class="col-md-10 pt-3 text-left" style="background: #eee;">
					<section class="container">
				        <div class="row">
				        	<div class="col-md-12 mb-3">
				        		<h5>List of Agents</h5>
				        		<a href="{{ URL::to('register-form') }}" class="btn btn-sm btn-keyland">
			        				<i class="fa fa-plus-circle"></i> Register Agent
			        			</a>
				        	</div>
				        	<div class="col-md-12 mb-3">
				        		<div class="pull-left">
				        			<form class="form-inline">
				        				<div class="form-group mr-2">
											<select class="form-control form-control-sm" name="status">
												<option selected disabled>Select Status</option>
												<option value="approved" {{ request()->get('status') == 'approved' ? 'selected':'' }}>Approved</option>
												<option value="pending" {{ request()->get('status') == 'pending' ? 'selected':'' }}>Pending</option>
											</select>
										</div>
										<button class="btn btn-sm btn-warning"><i class="fa fa-filter"></i></button>
				        			</form>
				        		</div>
				        		<div class="pull-right">
				        			<form class="form-inline">
										<div class="form-group mr-2">
											<select class="form-control form-control-sm" name="lead">
												<option selected disabled>Select Teamlead</option>
												@foreach(App\Modules\Helpers::filterTeamLeader() as $lead)
										    		<option value="{{ $lead->id }}" {{  $lead->id == request()->get('lead') ? 'selected':'' }}>{{ $lead->fname.' '.$lead->lname }}</option>
										    	@endforeach
											</select>
										</div>
									  	<div class="form-group mr-2">
									    	<input type="text" list="queue" class="form-control form-control-sm pr-2" placeholder="Search agent's name" value="{{ request()->get('q') }}" name="q">
									    	<datalist id="queue">
									    		@foreach(App\Modules\Helpers::searchAgentName(1) as $queue)
									    			<option value="{{ $queue->fname.' '.$queue->lname }}">{{ $queue->email }}</option>
									    		@endforeach
									    	</datalist>
									  	</div>
										<button class="btn btn-sm btn-warning"><i class="fa fa-search"></i></button>
									</form>
				        		</div>
				        	</div>
				         <div class="col md-12">
								<div class="row">
									@foreach($agents as $agent)
										<div class="col-md-3 mb-3">
											<div class="shadow bg-white rounded p-3 mb-2 border {{ $agent->is_teamlead == 1 ? 'border-warning':'' }}">
												@if(is_null($agent->profile))
													<img src="{{ asset('assets/img/users/placeholder.png') }}" alt="{{ $agent->fname }}" class="img-fluid" width="250" style="height: 211px !important; object-fit: cover;">
												@else
													<img src="{{ asset('assets/img/users/'.$agent->profile) }}" alt="{{ $agent->fname }}" class="img-fluid" width="250" style="height: 211px !important; object-fit: cover;">
												@endif
												<div class="middle">
												   <p class="text-center">
												   	<strong>{{ strtoupper($agent->fname).' '.strtoupper($agent->lname) }}</strong><br>
												   	@if($agent->is_approved == 0)
												   		<small class="text-danger">
												   			Pending
												   		</small>
												   	@elseif($agent->is_approved == 1)
												   		<small class="text-success">
												   			<i class="fa fa-check-circle"></i> Approved
												   		</small>
												   	@endif
												   </p>
												   <a href="{{ URL::to('list-of-agents/'.$agent->code) }}" class="btn btn-keyland px-4 m-auto d-block">View Profile</a>
												</div>
											</div>
										</div>
									@endforeach
									@if(count($agents) == 0)
								  		<div class="col-12">
								  			<div class="error-message text-center mb-5">
									  			<h2><i class="icon icon-agents"></i></h2>
									  			<h5 class="mb-0"><strong>NO RESULTS FOUND</strong></h5>
												<small>There is no data for agents.</small>
									  		</div>
								  		</div>
									@endif
								</div>
			            </div>
				         <div class="col-md-12">
								<nav class="cstm-paginate cstm-center" aria-label="Page navigation example">
								   {{ $agents->links() }}
								</nav>
							</div>
				      </div>
				   </section>
				</div>
			</div>
		</div>
	</div>
	<div class="spacer"></div>
@endsection

