@extends('layouts.app')
@section('title')<title> {{ config('app.name') }} - Resources</title>@endsection
@section('page')	
	@include('layouts.carousel')
	<div class="page-content">
		<div class="container">
			<h1>News and Updates</h1>
			<p>Coming Soon.</p>
		</div>
	</div>
	@include('layouts.footer')
@endsection