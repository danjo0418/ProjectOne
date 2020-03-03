@extends('layouts.app')
@section('title')<title> {{ config('app.name') }} - The Key to Your Dream Home</title>@endsection
@section('page')	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-12 mt-5">
			  		<div class="error-message text-center mt-5">
			  			<h1>419</h1>
						<span>Your session has expired.</span>
						<p class="mt-3"><a href="{{ URL::to('/') }}" class="btn btn-keyland">GO BACK TO HOMEPAGE</a></p>
			  		</div>
				</div>
			</div>
		</div>
	</section>
@endsection
