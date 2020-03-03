@extends('layouts.app')
@section('title')<title> {{ config('app.name') }} - Profile</title>@endsection
@section('page')	
	@include('layouts.sidebar')
				<div class="col-md-10 pt-3 text-left">
					<section class="container">
				        <div class="row">
				            <div class="col-md-12">
				                <h5>Profile Settings</h5>
				                <ul id="tabsJustified" class="nav nav-tabs">
				                    <li class="nav-item"><a href="" data-target="#profile" data-toggle="tab" class="nav-link small text-uppercase active">Profile</a></li>
				                    <li class="nav-item"><a href="" data-target="#changepassword" data-toggle="tab" class="nav-link small text-uppercase">Change Password</a></li>
				                </ul>
				                <br>
				                <div id="tabsJustifiedContent" class="tab-content">
				                    <div id="profile" class="tab-pane fade active show">
				                        <div class="row pb-2">
				                        	<div class="col-md-12">
				                        		<form method="POST" action="{{ URL::to('postUpdateProfile') }}" enctype="multipart/form-data">
				                        			@csrf
					                        		<div class="row">
					                        			<div class="col-md-3">
															<div id="settings-img">
										                    	@if(is_null(Auth::user()->profile))
					                            					<img src="{{ asset('assets/img/users/placeholder.png') }}" class="file-upload-img" alt="{{ Auth::user()->fname }}">
					                            				@else
					                            					<img src="{{ asset('assets/img/users/'.Auth::user()->profile) }}" class="file-upload-img" alt="{{ Auth::user()->fname }}">
					                            				@endif
																<div id="settings-img-overlay">
																	<span class="upload-button file-upload-btn">Update Picture</span>
																</div>
																<input type="file" accept="image/*" name="file" class="file-upload hidden">
															</div>
															<small>Images must be JPG or PNG.</small>
														</div>
														<div class="col-md-9">
															<input type="hidden" value="{{ Auth::user()->id }}" name="userid">
															<div class="row">
																<div class="col-md-6 col-sm-12">
																	<div class="form-group">
																		<label for="">Firstname <span class="text-danger">*</span></label>
																		<input type="text" class="form-control" value="{{ Auth::user()->fname }}" name="fname" required>
																	</div>
																</div>
																<div class="col-md-6 col-sm-12">
																	<div class="form-group">
																		<label for="">Lastname <span class="text-danger">*</span></label>
																		<input type="text" class="form-control" value="{{ Auth::user()->lname }}" name="lname" required>
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-6 col-sm-12">
																	<div class="form-group">
																		<label for="">Email <span class="text-danger">*</span></label>
																		<input type="email" class="form-control" value="{{ Auth::user()->email }}" name="email">
																	</div>
																</div>
																<div class="col-md-6 col-sm-12">
																	<div class="form-group">
																		<label for="">Phone Number <span class="text-danger">*</span></label>
																		<input type="number" class="form-control" value="{{ Auth::user()->phone }}" minlength="11" name="mobile" required>
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-12">
																	<label for="">Facebook URL</label>
																	<div class="input-group mb-3">
																	    <div class="input-group-prepend">
																	       <span class="input-group-text">
																				<a href="javascript:void(0)">
																					<i class="fa fa-facebook-official"></i>
																				</a>
																	       </span>
																	    </div>
																	    <input type="text" class="form-control" placeholder="e.g https://www.facebook.com/KeylandRealty" value="{{ Auth::user()->socialmedia }}" name="facebook_url">
																	</div>
																</div>
															</div>
															<button class="btn btn-keyland">Save Changes</button>
														</div>
					                        		</div>
					                        	</form>
				                        	</div>
				                        </div>
				                    </div>
				                    <div id="changepassword" class="tab-pane fade">
				                        <div class="row pb-2">
				                            <div class="col-md-12">
				                            	<form id="js-changepass-form">
				                            		@csrf
				                            		<input type="hidden" value="{{ Auth::user()->id }}" name="userid">
				                            		<div class="row">
				                            			<div class="col-md-3">
				                            				@if(is_null(Auth::user()->profile))
				                            					<img src="{{ asset('assets/img/users/placeholder.png') }}" class="file-upload-img" alt="{{ Auth::user()->fname }}">
				                            				@else
				                            					<img src="{{ asset('assets/img/users/'.Auth::user()->profile) }}" class="file-upload-img" alt="{{ Auth::user()->fname }}">
				                            				@endif
				                            			</div>
				                            			<div class="col-md-4 col-sm-12">
				                            				{{-- <div class="form-group">
																<label for="">New</label>
																<input type="password" class="form-control js-newpass" placeholder="New Password" minlength="8" name="newpass" required>
															</div> --}}
															<div class="form-group col-md-12">
																<label for="">New Password <span class="text-danger">*</span></label>
																<input type="password" id="newpass" class="form-control js-newpass" name="newpass" placeholder="New Password" required>
																<div class="showpass">
																	<a href="javascript:void(0)" onclick="newPassword()">
																		<i class="fa fa-eye"></i>
																	</a>
																</div>
															</div>
															<div class="form-group col-md-12">
																<label for="">Re-type New Password</label>
																<input type="password" id="retypepass" class="form-control js-retype" placeholder="Re-type Password" minlength="8" name="retype" required>
																<span class="cstm-mssg" role="alert">
								                                    <small class="js-changepass-error"></small>
								                                </span>
															</div>
															<button class="btn btn-keyland">Save Changes</button>
				                            			</div>
				                            		</div>
				                            	</form>
				                            </div>
				                        </div>
				                    </div>
				                </div>
				            </div>
				        </div>
				    </section>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('script')
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$('#js-changepass-form').on('submit', function(e) {
				e.preventDefault();
			
				$.ajax({
					url: BASE_URL+'/postChangePassword',
		           	type: 'POST',
		           	data: new FormData(this),
		           	contentType: false,
		           	cache: false,
		           	processData:false,
		           	success:function(response) {

		           		console.log(response);

		           		if(response.status == 'success') {

		           			$('.js-newpass').val('');
		           			$('.js-retype').val('');
		           			$('.js-retype').removeClass('border-danger');
		           			$('.js-changepass-error').html(' ');

		           			toastr.success('Your Password was successfully changed.', 'Success.', { 
					        	"closeButton": true, 
					        	"showDuration": "500",
					        });

		           		} else {

		           			$('.js-retype').val('');
		           			$('.js-retype').addClass('border-danger');
		           			$('.js-changepass-error').html(response.message);

		           		}
		           	}
				});
			});
		});

		function newPassword() {
		  	var x = document.getElementById("newpass");
		  	var y = document.getElementById("retypepass");
		  	if (x.type === "password") {
		        x.type = "text";
		        y.type = "text";
		        $('.fa').removeClass('fa-eye');
		        $('.fa').addClass('fa-eye-slash');
		    } else {
		        x.type = "password";
		        y.type = "password";
		        $('.fa').removeClass('fa-eye-slash');
		        $('.fa').addClass('fa-eye');
		    }
		}
	</script>
@endsection