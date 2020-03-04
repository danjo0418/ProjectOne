@extends('layouts.app')
@section('title')
	<title> {{ $detail->name }} - {{ config('app.name') }}</title>
@endsection
@section('stylesheet')
	<link rel="stylesheet" href="{{ asset('assets/css/richtext.css') }}">
@endsection
@section('page')
	@include('layouts.sidebar')
				<div class="col-md-10 pt-3 text-left">
					<section class="container">
						<div class="row">
							<div class="col-md-12">
								<h5>Update {{ $detail->name }} Detail's</h5>
				        		<nav aria-label="breadcrumb">
								  	<ol class="breadcrumb cstm-breadcrumb">
								    	<li class="breadcrumb-item"><a href="{{ URL::to('list-of-properties/'.$detail->code) }}"><i class="fa fa-angle-double-left "></i> Back to previous</a></li>
								    	<li class="breadcrumb-item active">
								    		<a href="javascript:void(0)">Update {{ $detail->name }} Detail's</a>
								    	</li>
								 	</ol>
								</nav>
								<form method="POST" action="{{ URL::to('postUpdateProperty') }}" enctype="multipart/form-data">
									@csrf
									<div class="row">
										<div class="col-md-6">
											<h5 class="m-0">What type of property do you want to offer?</h5>
											<p>Let's start with the basic listing of property so that seekers can find it under the right category.</p>
											<input type="hidden" value="{{ $detail->id }}" name="property_id">
											<input type="hidden" class="js-status_id" value="{{ $detail->status_id }}" name="status_id">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for="offer_type">Offer Type <span class="text-danger">*</span></label>
														<select class="form-control js-offer-type" name="offer_type" required>
															<option value="" selected disabled>Select</option>
															<option value="buy" {{ $detail->offer_type == 'buy' ? 'selected':'' }}>Sell</option>
															<option value="rent" {{ $detail->offer_type == 'rent' ? 'selected':'' }}>Rent</option>
														</select>
													</div>
												</div>
												<div class="col-md-6 pl-0">
													<div class="form-group">
														<label for="property_type">Property Type <span class="text-danger">*</span></label>
														<select class="form-control js-prop-type" name="property_type" required>
															<option value="" selected disabled>Select</option>
															@foreach(App\Modules\Helpers::propertyType() as $type)
																<option value="{{ $type->id }}" {{ $detail->type_id == $type->id ? 'selected':'' }}>{{ $type->type }}</option>
															@endforeach
														</select>
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<label for="property_name">Property Title <span class="text-danger">*</span></label>
														<input type="text" class="form-control" value="{{ $detail->name }}" name="property_name" required/>
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<label for="about">About</label>
														<textarea class="js-about-property" name="about" required>{{ $detail->about }}</textarea>
													</div>
												</div>
											</div>
											<hr>
											<h5 class="m-0">Additional  Information</h5>
											<p>Please provide further information to have a qualified leads to the property seekers.</p>
											<div class="row">
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
														<label for="bedrooms">Bedrooms</label>
														<input type="number" class="form-control" value="{{ $detail->bedrooms }}" name="bedrooms"/>
													</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
														<label for="bathrooms">Bathrooms</label>
														<input type="number" class="form-control" value="{{ $detail->bathrooms }}" name="bathrooms"/>
													</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
														<label for="floor_area">Floor Area (sqm)</label>
														<input type="number" class="form-control" value="{{ $detail->floor_area }}" name="floor_area"/>
													</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
														<label for="land_size">Land Size (sqm)</label>
														<input type="number" class="form-control" value="{{ $detail->land_size }}" name="land_size"/>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
														<label for="building_name">Building Name</label>
														<input type="text" class="form-control" value="{{ $detail->building_name }}" name="building_name"/>
													</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
														<label for="block_lot">Block and Lot/Unit/Floor</label>
														<input type="text" class="form-control" value="{{ $detail->block_lotnum }}" name="block_lot"/>
													</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
														<label for="developer">Developer</label>
														<input type="text" class="form-control" value="{{ $detail->developer }}" name="developer"/>
													</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
														<label for="furnished">Furnished <span class="text-danger">*</span></label>
														<select class="form-control" name="furnished" required>
															<option selected disabled>Select</option>
															<option {{ $detail->furnished == 'Fully Furnished' ? 'selected':'' }} value="Fully Furnished">Fully Furnished</option>
															<option {{ $detail->furnished == 'Semi Furnished' ? 'selected':'' }} value="Semi Furnished">Semi Furnished</option>
															<option {{ $detail->furnished == 'Fully Finished' ? 'selected':'' }} value="Fully Finished">Fully Finished</option>
															<option {{ $detail->furnished == 'Semi Finished' ? 'selected':'' }} value="Semi Finished">Semi Finished</option>
															<option {{ $detail->furnished == 'Bare' ? 'selected':'' }} value="Bare">Bare</option>
														</select>
													</div>
												</div>
											</div>
											<div class="row section-3">
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
														<label for="rooms">Rooms (Total)</label>
														<input type="number" class="form-control" name="rooms"/>
													</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
														<label for="car_space">Car Space</label>
														<input type="number" class="form-control" name="car_space"/>
													</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
														<label for="build_year">Build Year</label>
														<input type="number" class="form-control" name="build_year"/>
													</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
														<label for="deposit_bond">Deposit/ Bond</label>
														<input type="text" class="form-control" name="deposit_bond"/>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
														<label for="price">Price <span class="text-danger">*</span></label>
														<input type="number" class="form-control" value="{{ $detail->price  }}" name="price" required/>
													</div>
												</div>
												<div class="col-md-6 col-sm-12" id="js-condition" style="display: {{ $detail->offer_type == 'buy' ? 'none':'block'  }};">
													<div class="form-group pl-0">
														<label for="price_condition">&nbsp;</label>
														<select class="form-control js-price_condition" name="price_condition">
															<option selected disabled>Select</option>
															<option value="yearly" {{ $detail->price_condition == 'yearly' ? 'selected':'' }}>Yearly</option>
															<option value="monthly" {{ $detail->price_condition == 'monthly' ? 'selected':'' }} >Monthly</option>
														</select>
													</div>
												</div>
											</div>


										</div>
										<div class="col-md-6">
											<h5 class="m-0">Location of Property</h5>
											<p>Give us as much information about the location of your property as you can so that users can find property easily.</p>
											<div class="row mb-4">
												<div class="col-md-12">
													<div class="form-group">
														<label for="province">Province <span class="text-danger">*</span></label>
														<select class="form-control js-province" name="province" required>
															<option value="" selected disabled>Select Province</option>
															@foreach($province as $prov)
																<option value="{{ $prov->province }}" {{ $prov->province == $detail->province ? 'selected':'' }}>{{ ucwords($prov->province) }}</option>
															@endforeach
														</select>
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<label for="city">City/Municipality <span class="text-danger">*</span></label>
														<select class="form-control js-municipality" name="city_municipality" required>
															@foreach($cities as $city)
																<option value="{{ $city->city_municipality }}" {{ $city->city_municipality == $detail->city_municipality ? 'selected':'' }}>{{ ucwords($city->city_municipality) }}</option>
															@endforeach
														</select>
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<label for="street">House No. Street/Barangay <span class="text-danger">*</span></label>
														<input type="text" class="form-control js-street" value="{{ $detail->street_barangay }}" name="street_barangay" required/>
													</div>
												</div>
												<div class="col-12">
													<label for="latitude">Google Map Iframe<span class="text-danger">*</span></label>
													<small class="ml-1">
														<a href="javascript:void(0)" onclick="googlemap()" rel="nofollow"  class="search-map" target="_blank">
															<i class="fa fa-map-marker"></i>
															Search Location in google map
														</a>
													</small>
													<textarea class="form-control fontsmall" name="map" rows="7">{{ $detail->map }}</textarea>
												</div>		
											</div>

											<h5 class="m-0">Upload photos</h5>
											<p>Make your property stand out by uploading photos.</p>
											<div class="row">
												<div class="col-md-12">
													<input type="hidden" class="form-control js-removephoto" name="photo_id">
													<div class="b-dash">
														<div class="row px-3 p-3">
															@foreach($detail->photos as $photo)
																<div class="col-md-4 existing-img js-removePhoto-{{ $photo->id }}">
																	<img src="{{ asset('assets/img/properties/thumb/'.$photo->filename) }}" class="thumbup mb-1 mt-3" alt="">	

																	<a class="removePhoto-{{ $photo->id }} btn btn-sm btn-danger btn-block" href="javascript:void(0)" onclick="removePhoto({{ $photo }})"><small>Remove</small></a>
																</div>
															@endforeach
														</div>
													</div>
													<div class="cstm-group b-dash mt-3">
														<div class="add-fileupload">
															<input type="file" id='files' class="cstm-file" name="file[]" multiple accept="images/*"/>
															<p class="file-text">Click here to add more images<br> Upload images as jpg, png, and tiff</p>
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
												@if(Auth::user()->role_id == 2)
													<div class="col-md-12 mt-3">
														<div class="form-check">
														    <input type="checkbox" class="form-check-input" id="is_featured" name="is_featured" @if($detail->is_featured == 1) checked @endif>
														    <label class="form-check-label" for="is_featured">Mark this property as Featured</label>
														</div>
													</div>
												@endif
												<div class="col-md-12 mt-3">
													<button class="btn btn-keyland">Save Changes</button>
												</div>
											</div>
										</div>
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

			// Files
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
			          			preview +="<div class='col-md-4 preview-wrap'>";
									preview +="<img src='"+e.target.result+"' class='thumbup'><br>";
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

	     			$.each(response, function(index, data) {
	     				option +="<option value='"+data.city_municipality+"'>"+data.city_municipality+"</option>";
	     			});

	     			$('.js-municipality').html(option);
		     	});
			});
		});


		var photoid = [];
		$('.js-removephoto').val(photoid);

		function removePhoto(photo) {
		  	photoid.push(photo.id);
		  	$('.js-removephoto').val(photoid);
		  	$('.js-removePhoto-'+photo.id).hide();
		}

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