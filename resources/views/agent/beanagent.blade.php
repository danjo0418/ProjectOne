@extends('layouts.app')
@section('title')<title>Be an Agents - {{ config('app.name') }}</title>@endsection
@section('page')	
	@include('layouts.carousel')
	<div class="page-content">
		<div class="container">
			<div class="row">
			   	<div class="col-md-12">
				   	<h1>Be one of our Real Estate Professionals!</h1>
				   	<p>Working as a real estate sales agent or broker can be a fulfilling and financially rewarding career. The Philippine Real-Estate market is continually growing and it's the best time to be part of an emerging market.</p>

				   	<h5>Why Choose Us?</h5>
				   	<ul class="fontsmall pl-5" style="list-style-type: disc;">
				   		<li>We're a fast ermerging company that's constantly expanding!</li>
				   		<li>We provide above average commision schemes and a wide list of marketable properties to sell.</li>
				   		<li>We provide trainings and equip your with the best marketing tools to help you succeed.</li>
				   		<li>You get to work as an independent contractor and at your own pace. </li>
				   		<li>You get to decide what projects to sell and how to manage your time and priorities.</li>
				   		<li>You're not limited in terms of income. Your earning potential would depend on your effort.</li>
				   	</ul>
				   	<hr/>
				   	<div class="agentform border p-4">
						<h5 class="d-block">Contact Us and we'll get your career started!</h5>
						<form method="POST" action="{{ URL::to('postApplicant') }}" enctype="multipart/form-data">
							@csrf
							<div class="row">
								<div class="col col-xs-12">
									<div class="row">
										<div class="col-md-6 col-xs-12">
											<div class="form-group">	
											    <input type="text" class="form-control" placeholder="Firstname" name="fname" required/>
											</div>
										</div>
										<div class="col-md-6 col-xs-12">
											<div class="form-group">	
											    <input type="text" class="form-control" placeholder="Lastname" name="lname" required/>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6 col-xs-12">
											<div class="form-group">	
											    <input type="email" class="form-control" placeholder="Email" name="email" required/>
											</div>
										</div>
										<div class="col-md-6 col-xs-12">
											<div class="form-group">	
											    <input type="number" class="form-control" placeholder="Phone Number" name="phone" required/>
											</div>
										</div>
									</div>

									<div class="form-group">
										<label for="FormControlFileResume" class="fontsmall font-italic">Upload Resume</label>
									    <input type="file" class="form-control-file" name="img" accept="image/*" required/>
									</div>
									<div class="form-group">
							    		<textarea class="form-control" id="FormControlTextarea" rows="5" placeholder="Write your message" name="message" required></textarea>
									</div>
								</div>
							</div>
							<button class="btn btn-keyland px-4 mt-4 text-center btnmobile d-block" style="width:20%;">SUBMIT</button>
						</form>
					</div>
			   </div>
			</div>
		</div>
	</div>
	@include('layouts.footer')
@endsection