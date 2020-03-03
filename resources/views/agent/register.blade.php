@extends('layouts.app')
@section('title')<title>Register Form - {{ config('app.name') }}</title>@endsection
@section('page')	
	@include('layouts.sidebar')
				<div class="col-md-10 pt-3 text-left">
					<section class="container">
				        <div class="row">
				        	<div class="col-md-12">
				        		<h5>Register Form</h5>
				        		<nav aria-label="breadcrumb">
								  	<ol class="breadcrumb cstm-breadcrumb">
								    	<li class="breadcrumb-item"><a href="{{ URL::to('list-of-agents') }}"><i class="fa fa-angle-double-left "></i> Back to previous</a></a></li>
								    	<li class="breadcrumb-item active"><a href="javascript:void(0)">Register Form</a></li>
								 	</ol>
								</nav>
				        		<form method="POST" action="{{ URL::to('register-agent') }}" enctype="multipart/form-data">
									@csrf
									<div class="row">
										<div class="col-md-3">
											<div id="settings-img">
	                            				<img src="{{ asset('assets/img/users/placeholder.png') }}" class="file-upload-img">
												<div id="settings-img-overlay">
													<span class="upload-button file-upload-btn">Upload Picture</span>
												</div>
												<input type="file" accept="image/*" name="file" class="file-upload hidden">
											</div>
											<small>Images must be JPG or PNG.</small>
										</div>
										<div class="col-md-9">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for="">Firstname <span class="text-danger">*</span></label>
														<input type="text" class="form-control" name="fname" required>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="">Lastname <span class="text-danger">*</span></label>
														<input type="text" class="form-control" name="lname" required>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for="">Email <span class="text-danger">*</span></label>
														<input type="email" class="form-control" name="email" required>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="">Phone Number <span class="text-danger">*</span></label>
														<input type="number" class="form-control" minlength="11" name="phone" required>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for="">Password <span class="text-danger">*</span></label>
														<input type="password" id="mypass" class="form-control" name="password" required>
														<div class="showpass">
															<a href="javascript:void(0)" onclick="showPassword()">
																<i class="fa fa-eye"></i>
															</a>
														</div>
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
													    <input type="text" class="form-control" placeholder="e.g https://www.facebook.com/KeylandRealty" name="socialmedia" required>
													</div>
												</div>
											</div>
											<div class="clearfix justify-content-center mb-3">
				                                <div class="form-check float-left">
				                                    <input type="radio" class="form-check-input js-radio" value="1" id="is_lead" name="is_teamlead" required>
				                                    <label class="form-check-label pl-1" for="is_lead">
				                                    	Mark as team leader
				                                    </label>
				                                </div>
				                                <div class="form-check float-left p-0 ml-4 mr-4">
				                                	<label class="form-check-label text-danger">OR</label>
				                                </div>
				                                <div class="form-check float-left">
				                                    <input type="radio" class="form-check-input js-radio" value="0" id="is_member" name="is_teamlead" required>
				                                    <label class="form-check-label pl-1" for="is_member">
				                                    	Find a team leader
				                                    </label>
				                                </div>
				                            </div>
				                            <div class="row js-teamlead-row" style="display: none;">
				                            	<div class="col-md-12">
													<div class="form-group">
														<select class="form-control js-teamlead-select" name="teamlead_id">
															<option value="" selected disabled>Find a team leader</option>
															@foreach(App\Modules\Helpers::filterTeamLeader() as $lead)
													    		<option value="{{ $lead->id }}">{{ $lead->fname.' '.$lead->lname }}</option>
													    	@endforeach
														</select>
													</div>
												</div>
				                            </div>
											<button class="btn btn-keyland">Save Agent</button>
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
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$('.js-radio').on('click', function() {
				var radio = $(this).val();

				if(radio == 0) {
					$('.js-teamlead-row').show();
					$('.js-teamlead-select').attr('required', 'required');
				} else {
					$('.js-teamlead-row').hide();
					$('.js-teamlead-select').val('');
				}
			});
		});

		function showPassword() {
		  	var x = document.getElementById("mypass");
		  	if (x.type === "password") {
		        x.type = "text";
		        $('.fa').removeClass('fa-eye');
		        $('.fa').addClass('fa-eye-slash');
		    } else {
		        x.type = "password";
		        $('.fa').removeClass('fa-eye-slash');
		        $('.fa').addClass('fa-eye');
		    }
		}
	</script>
@endsection


