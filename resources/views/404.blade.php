@extends('layouts.app')
@section('title')<title> {{ config('app.name') }} - The Key to Your Dream Home</title>@endsection
@section('page')	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-12 mt-5">
			  		<div class="error-message text-center mt-5">
			  			<h1>4<i class="fa fa-search"></i>4</h1>
			  			@if(isset($errorMessage))
						    <span>{{ $errorMessage }}</span>
						@endif
						<p class="mt-3"><a href="{{ URL::to($redirect) }}" class="btn btn-keyland">{{ $btnName }}</a></p>
			  		</div>
				</div>
			</div>
		</div>
	</section>
@endsection
