@extends('layouts.app')
@section('title')<title>Our Agents - {{ config('app.name') }}</title>@endsection
@section('page')
	<div class="col-md-12 allfeattext">
		<div class="container">
			<div class="row">
				<div class="col-md-12 p-0 mt-3 mb-3">
					<div class="float-left unset-float">
						<h1>Our Agents</h1>
					</div>
					<form class="form-inline justify-content-md-end">
						<div class="form-group s-input m-0 mr-1">
							<input type="text" list="queue" value="{{ request()->get('q') }}" class="form-control" placeholder="Type agent's name" name="q">
							<datalist id="queue">
					    		@foreach(App\Modules\Helpers::agents() as $queue)
					    			<option value="{{ $queue->lname.' '.$queue->fname }}">{{ $queue->email }}</option>
					    		@endforeach
					    	</datalist>
						</div>
						<div class="form-group s-button m-0">
							@if(request()->has('q'))
						  		<a href="{{ URL::to('properties') }}" class="btn btn-danger"><i class="fa fa-search-minus"></i></a>
							@else
						  		<button type="submit" class="btn btn-warning"><i class="fa fa-search"></i></button>
						  	@endif
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="homeprofiles" style="background: #eee; padding:30px 0; margin:0 auto; text-align: center; width:100%;">
			<div class="container">
				<div class="row">
					@if(count($agents) > 0)
						@foreach($agents as $agent)
							<div class="col-md-3 mb-3">
								<div class="shadow bg-white rounded p-3 mb-2" style="min-height: 200px; height: auto;">
									@if(is_null($agent->profile))
										<img src="{{ asset('assets/img/users/placeholder.png') }}"  alt="{{ $agent->fname }}" class="img-fluid" width="250" style="height: 211px !important; object-fit: cover;">
									@else
										<img src="{{ asset('assets/img/users/'.$agent->profile) }}" alt="{{ $agent->fname }}" class="img-fluid" width="250" style="height: 211px !important; object-fit: cover;">
									@endif
									<div class="middle">
									   <p class="text-center"><strong>{{ strtoupper($agent->fname).' '.strtoupper($agent->lname) }}</strong></p>
									   @php
									   		$subject = $agent->fname.'-'.$agent->lname;
									   		$name_slug = str_replace(' ', '-', $subject);
									   @endphp
									   <a href="{{ URL::to('our-agent/'.strtolower($name_slug)) }}" class="btn btn-keyland px-4 m-auto d-block">View Profile</a>
									</div>
								</div>
							</div>
						@endforeach
					@else
						<div class="col-md-12">
					  		<div class="error-message text-center mb-5">
					  			<h2><i class="icon icon-agents"></i></h2>
					  			<h5 class="mb-0"><strong>NO RESULTS FOUND</strong></h5>
								<small>There is no data for agents.</small>
					  		</div>
						</div>
					@endif
				</div>
				<div class="row">
					<div class="col-sm-3 text-center mx-auto my-4">
						<nav class="cstm-paginate" aria-label="Page navigation example">
							{{ $agents->links() }}
						</nav>
					</div>
				</div>
			</div>
		</div>

	</div>
	@include('layouts.footer')
@endsection