@extends('layouts.app')
@section('title')
	<title>List Your Property - {{ config('app.name') }}</title>
@endsection
@section('stylesheet')
	<link rel="stylesheet" href="{{ asset('assets/css/richtext.css') }}">
@endsection
@section('page')
	@include('layouts.sidebar')
				<div class="col-md-10 pt-3 text-left">
					<section class="container">
				        <div class="row">
				        	<div class="col-md-9 col-sm-12">
				        		<h5>List Your Property</h5>
				        		<nav aria-label="breadcrumb">
								  	<ol class="breadcrumb cstm-breadcrumb">
								    	<li class="breadcrumb-item"><a href="{{ URL::to('list-of-properties') }}"><i class="fa fa-angle-double-left "></i> Back to previous</a></a></li>
								    	<li class="breadcrumb-item active"><a href="javascript:void(0)">List Your Property</a></li>
								 	</ol>
								</nav>
				        		<form method="POST" action="{{ URL::to('create-property') }}" enctype="multipart/form-data">
									@csrf
									<input type="hidden" class="js-status_id" name="status_id">
									<input type="hidden" value="{{ Auth::user()->id }}" name="created_by">
									<div class="section-1">
										<h5 class="m-0">What type of property do you want to offer?</h5>
										<p>Let's start with the basic listing of property so that seekers can find it under the right category.</p>
										<div class="row">
											<div class="col-6">
												<div class="form-group">
													<label for="offer_type">Offer Type <span class="text-danger">*</span></label>
													<select class="form-control js-offer-type" name="offer_type" required>
														<option value="" selected disabled>Select</option>
														<option value="buy">Sell</option>
														<option value="rent">Rent</option>
													</select>
												</div>
											</div>
											<div class="col-6">
												<div class="form-group">
													<label for="property_type">Property Type <span class="text-danger">*</span></label>
													<select class="form-control js-prop-type" name="property_type" required>
														<option value="" selected disabled>Select</option>
														@foreach(App\Modules\Helpers::propertyType() as $type)
															<option value="{{ $type->id }}">{{ $type->type }}</option>
														@endforeach
													</select>
												</div>
											</div>
											<div class="col-12">
												<div class="form-group">
													<label for="property_name">Property Title <span class="text-danger">*</span></label>
													<input type="text" class="form-control" name="property_name" required/>
												</div>
											</div>
											<div class="col-12">
												<div class="form-group">
													<label for="about">About</label>
													<textarea class="js-about-property" name="about" required></textarea>
												</div>
											</div>
										</div>
									</div>
									<hr>
									<div class="section-2">
										<h5 class="m-0">Additional  Information</h5>
										<p>Please provide further information to have a qualified leads to the property seekers.</p>
										<div class="row">
											<div class="col-3">
												<div class="form-group">
													<label for="bedrooms">Bedrooms</label>
													<input type="number" class="form-control" name="bedrooms"/>
												</div>
											</div>
											<div class="col-3">
												<div class="form-group">
													<label for="bathrooms">Bathrooms</label>
													<input type="number" class="form-control" name="bathrooms"/>
												</div>
											</div>
											<div class="col-3">
												<div class="form-group">
													<label for="floor_area">Floor Area (sqm)</label>
													<input type="number" class="form-control" name="floor_area"/>
												</div>
											</div>
											<div class="col-3">
												<div class="form-group">
													<label for="land_size">Land Size (sqm)</label>
													<input type="number" class="form-control" name="land_size"/>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-6">
												<div class="form-group">
													<label for="building_name">Building Name</label>
													<input type="text" class="form-control" name="building_name"/>
												</div>
											</div>
											<div class="col-6">
												<div class="form-group">
													<label for="block_lot">Block and Lot/Unit/Floor</label>
													<input type="text" class="form-control" name="block_lot"/>
												</div>
											</div>
											<div class="col-6">
												<div class="form-group">
													<label for="developer">Developer</label>
													<input type="text" class="form-control" name="developer"/>
												</div>
											</div>
											<div class="col-6">
												<div class="form-group">
													<label for="furnished">Furnished <span class="text-danger">*</span></label>
													<select class="form-control" name="furnished" required>
														<option selected disabled>Select</option>
														<option value="Fully Furnished">Fully Furnished</option>
														<option value="Semi Furnished">Semi Furnished</option>
														<option value="Fully Finished">Fully Finished</option>
														<option value="Semi Finished">Semi Finished</option>
														<option value="Bare">Bare</option>
													</select>
												</div>
											</div>
										</div>
									</div>
									<a href="javascript:void(0)" class="btn btn-outline-secondary btn-sm mb-3 js-moreinfo">
										<i class="fa fa-plus-square-o"></i>
										More information
									</a>
									<div class="section-3" style="display: none;">
										<div class="row">
											<div class="col-4">
												<div class="form-group">
													<label for="rooms">Rooms (Total)</label>
													<input type="number" class="form-control" name="rooms"/>
												</div>
											</div>
											<div class="col-4">
												<div class="form-group">
													<label for="car_space">Car Space</label>
													<input type="number" class="form-control" name="car_space"/>
												</div>
											</div>
											<div class="col-4">
												<div class="form-group">
													<label for="build_year">Build Year</label>
													<input type="number" class="form-control" name="build_year"/>
												</div>
											</div>
											<div class="col-4">
												<div class="form-group">
													<label for="deposit_bond">Deposit/ Bond</label>
													<input type="text" class="form-control" name="deposit_bond"/>
												</div>
											</div>
										</div>
									</div>
									<div class="section-4">
										<div class="row">
											<div class="col-4">
												<div class="form-group">
													<label for="price">Price <span class="text-danger">*</span></label>
													<input type="number" class="form-control" placeholder="" name="price" required/>
												</div>

											</div>
											<div class="col-3 pl-0" id="js-condition" style="display: none;">
												<div class="form-group">
													<label for="price_condition">&nbsp;</label>
													<select class="form-control js-price_condition" name="price_condition">
														<option value="" selected disabled>Select</option>
														<option value="yearly">Yearly</option>
														<option value="monthly">Monthly</option>
													</select>
												</div>
											</div>
										</div>
									</div>
									<hr>
									<div class="section-5">
										<h5 class="m-0">Location of Property</h5>
										<p>Give us as much information about the location of your property as you can so that users can find property easily.</p>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label for="">Geographic</label>
													<input type="text" class="form-control js-geographical" name="geographical" readonly>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="province">Province <span class="text-danger">*</span></label>
													<select class="form-control js-province" name="province" required>
														<option value="" selected disabled>Select Province</option>
														@foreach($province as $prov)
															<option value="{{ $prov->province }}">{{ $prov->province }}</option>
														@endforeach
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="city">City/Municipality <span class="text-danger">*</span></label>
													<select class="form-control js-municipality" name="city_municipality" required>
														<option selected disabled>Select City/Municipality</option>
													</select>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label for="street">House No. Street/Barangay <span class="text-danger">*</span></label>
													<input type="text" class="form-control js-street" name="street_barangay" required/>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-12">
												<label for="latitude">Google Map Iframe<span class="text-danger">*</span></label>
												<small class="ml-1">
													<a href="javascript:void(0)" onclick="googlemap()" rel="nofollow" class="search-map" target="_blank">
														<i class="fa fa-map-marker"></i>
														Search Location in google map
													</a>
												</small>
												<textarea class="form-control fontsmall" name="google_iframe" rows="5"></textarea>
											</div>		
										</div>
									</div>
									<hr>
									<div class="section-6">
										<h5 class="m-0">Upload photos</h5>
										<p>Make your property stand out by uploading photos.</p>
										<div class="row">
											<div class="col-md-12">
												<div class="cstm-group b-dash">
													<div class="add-fileupload">
														<input type="file" id='files' class="cstm-file" name="file[]" multiple accept="images/*" required/>
														<p class="file-text">Click here to upload images<br> Upload images as jpg, png, and tiff</p>
													</div>
												 	<div class="remove-fileupload mt-5" style="display: none;">
												 		<p>
												 			<a href="javascript:void(0)" class="file-text">
												 				<i class="fa fa-cloud-upload"></i>
												 				<span class="fa fa-times-circle text-danger"></span><br>	
												 				Removed Uploaded photos.
												 			</a>
												 		</p>
												 	</div>
													<div class="row js-preview px-3">
						
													</div>
												</div>
											</div>
										</div>
									</div>
									@if(Auth::user()->role_id == 1)
										<div class="section-6 mt-4">
											<div class="row">
												<div class="col-md-12">
													<div class="form-check">
													    <input type="checkbox" class="form-check-input" id="is_featured" name="is_featured">
													    <label class="form-check-label" for="is_featured">Mark this property as Featured</label>
													</div>
												</div>
											</div>
										</div>
									@endif
									<div class="section-7 mt-4">
										<button class="btn btn-keyland">Create Property</button>
									</div>
								</form>
				        	</div>
				        </div>
				    </section>

				</div>
			</div>
		</div>
	</div>
	<div class="spacer"></div>
@endsection

@section('script')

	<script src="{{ asset('assets/js/richtext.js') }}"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {

			// Add More Info Toggle
			$('.js-moreinfo').click(function() {
		 		$('.section-3').toggle();
			});

			// Add value on status
			$('.js-offer-type').on('change', function() {

				var offer = $(this).val();

				if(offer == 'buy') { 
					$('.js-status_id').val(1);
					$('#js-condition').hide();
					$('.js-price_condition').attr("required", false);
				} else {
					$('.js-status_id').val(2);
					$('#js-condition').show();
					$('.js-price_condition').attr("required", true);
				} 
			});

			// Files Preview
			$("#files").on("change", function(e) {

			   var files = e.target.files;
			   var getFiles = [];

		      for (var i = 0; i < files.length; i++) {

		        	var f = files[i];
		        	var validExtention = ["image/jpg","image/jpeg", "image/png", "image/tiff"];

		        	if(jQuery.inArray(f.type, validExtention) >= 1) {

		        		//getFiles.push(f.name);
		        		var fileReader = new FileReader();
		        		fileReader.onload = (function(e) {

				          	var preview = "";
			          			preview +="<div class='col-md-3 preview-wrap'>";
									preview +="<img src='"+e.target.result+"' class='thumb'><br>";
									//preview +="<span class='preview-remove'><i class='preview-remove fa fa-times-circle'></i></span>";
								preview +="</div>";

				            $('.js-preview').append(preview);

				           // $(".preview-remove").click(function(){
				           //  	$(this).parent(".preview-wrap").remove();
				           // });
				        });

			        	fileReader.readAsDataURL(f);
		        	}
	      	}

	      	var callself = $(this).val();

	      	if(callself.length > 0) {
	      		$('.remove-fileupload').show();
	      		$('.add-fileupload').hide();
	      	}
		   });

		   // Remove file
		   $('.remove-fileupload').on('click', function() {
		    	$("#files").val("");
		    	$('.preview-wrap').remove();
		    	$('.remove-fileupload').hide();
		      $('.add-fileupload').show();
		   });

		   // Text editor
		   $('.js-about-property').richText();

		   //City Municipality
		   $('.js-province').on('change', function(e) {
	     		e.preventDefault();

	     		var option = "";
	     		var province = $(this).val();

	     		$.get(BASE_URL+'/find-city',{ province:province }, function(response) {
	     			option +="<option selected disabled>Cities/Municipality</option>";
	     			$.each(response, function(index, data) {
	     				option +="<option value='"+data.city_municipality+"'>"+data.city_municipality+"</option>";
	     			});

	     			$('.js-municipality').html(option);
	     		});

	     		$.get(BASE_URL+'/geographical',{ province:province }, function(response) {
	     			$('.js-geographical').val(response.geographical);
	     		});

		   });

		});


		// Search Google Map
		function googlemap() {
			var street = $('.js-street').val();
			var municipality = $('.js-municipality').val();
			var province = $('.js-province').val();

			var location = street+' '+municipality+' '+province;

			$('.search-map').attr('href','https://www.google.com/maps/search/'+location);
		}

	</script>
@endsection