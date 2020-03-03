@extends('layouts.app')
@section('title')<title>History - {{ config('app.name') }}</title>@endsection
@section('page')	
	@include('layouts.sidebar')
				<div class="col-md-10 pt-3 text-left" style="background: #eee;">
					<section class="container">
				        <div class="row">
				        	<div class="col-md-12">
				        		<h5>History</h5>
				        	</div>
				        	<div class="col md-12 table-responsive-sm">
				        		@if(count($history) > 0)
									<div class="card">
										<div class="card-body">
											@foreach($history as $key => $logs)
												<div class="activity-log">
													<p class="m-0">{!! $logs->description !!}</p>
													<span>Save by <label>{{ $logs->user->fname.' '.$logs->user->lname }}</label> <i>< {{ $logs->user->email }} ></i></span>
													<span>{{ date('M d,Y h:i A', strtotime($logs->created_at)) }}</span>
												</div>
											@endforeach
										</div>
									</div> 
								@else
									<div class="col-12">
								  		<div class="error-message text-center mb-5">
								  			<h2><i class="icon fa fa-history mb-4"></i></h2>
								  			<h5 class="mb-0"><strong>NO RESULTS FOUND</strong></h5>
											<small>There are no results found in your history.</small>
								  		</div>
									</div>
								@endif
							</div>
							<div class="col-md-12 mt-3">
								<nav class="cstm-paginate cstm-right" aria-label="Page navigation example">
								    {{ $history->links() }}
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