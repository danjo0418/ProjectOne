@extends('layouts.app')
@section('title')<title>List your property with us! - {{ config('app.name') }}</title>@endsection
@section('page')	
	@include('layouts.carousel')
	<div class="page-content">
		<div class="container">
			<div class="row">
			   	<div class="col-md-12">
				   	<h1>List your property with us!</h1>
				   	<p>Home selling is a complicated process and there's a lot of factors to consider. Selling your property will most likely be one of the biggest financial decisions you will ever make and we're here to guide you make that decision. Our job is to simplify the whole process for you and get you the best possible price for your property.</p>

				   	<p>We provide free evaluation of your property and answer any questions you might have. Our agents are equipped with the best marketing and real estate promotion tools available in order to reach the right client for your property.”</p>

				   	<p></p>

				   	<hr/>
				   	<div class="agentform border p-4">
						<h5 class="d-block">Contact us for a free Evaluation</h5>
						<form method="POST" action="{{ URL::to('postSellProperty') }}" enctype="multipart/form-data">
							@csrf
							<div class="row">
								<div class="col-md-6 col-xs-12">
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
									<div class="form-group">	
									    <input type="email" class="form-control" placeholder="Email" name="email" required/>
									</div>
									<div class="form-group">	
									    <input type="number" class="form-control" placeholder="Phone Number" name="phone" required/>
									</div>
									<textarea class="form-control mb-3" id="FormControlTextarea" rows="7" name="message" placeholder="Write your message" required></textarea>
								</div>

								<div class="col-md-6 col-xs-12">
									<div class="form-group">	
									    <input type="text" class="form-control" placeholder="Location of property" name="location" required/>
									</div>
									<div class="form-group">	
									    <input type="number" class="form-control" placeholder="Lot Size of Property in (sqm)" name="lotsize" required/>
									</div>
									<div class="form-group border py-2 px-3">
										<label for="FormControlFiletitlesketch" class="fontsmall font-italic">Please attach a Copy of Title and Property Sketch with Bounderies <br> (File must be docx or pdf)</label>
									    <input type="file" class="form-control-file" name="img" required/>
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