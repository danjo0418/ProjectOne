@extends('layouts.app')
@section('title')<title>{{ $detail->fname.' '.$detail->lname }} - {{ config('app.name') }} </title>@endsection
@section('page')	
	@include('layouts.sidebar')
				<div class="col-md-10 pt-3 text-left">
					<section class="container">
				        <div class="row">
				        	<div class="col-md-12">
				        		<h5>Update {{ $detail->fname."'s" }} Profile</h5>
				        		<nav aria-label="breadcrumb">
								  	<ol class="breadcrumb cstm-breadcrumb">
								    	<li class="breadcrumb-item"><a href="{{ URL::to('list-of-agents/'.$detail->code) }}"><i class="fa fa-angle-double-left "></i> Back to previous</a></a></li>
								    	<li class="breadcrumb-item active"><a href="javascript:void(0)">Update {{ $detail->fname."'s" }} profile</a></li>
								 	</ol>
								</nav>
				        		<form method="POST" action="{{ URL::to('update-agent') }}"  enctype="multipart/form-data">
									@csrf
									<input type="hidden" value="{{ $detail->id }}" name="userid">
									<div class="row">
										<div class="col-md-3">
											<div id="settings-img">
	                            				@if(is_null($detail->profile))
	                            					<img src="{{ asset('assets/img/users/placeholder.png') }}" class="file-upload-img" alt="{{ $detail->fname }}">
	                            				@else
	                            					<img src="{{ asset('assets/img/users/'.$detail->profile) }}" class="file-upload-img" alt="{{ $detail->fname }}">
	                            				@endif
												<div id="settings-img-overlay">
													<span class="upload-button file-upload-btn">Update Picture</span>
												</div>
												<input type="file" accept="image/*" name="file" class="file-upload hidden">
											</div>
											<small>Images must be JPG or PNG.</small>
										</div>
										<div class="col-md-9">
											<div class="row">
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
														<label for="">Firstname</label>
														<input type="text" class="form-control" value="{{ $detail->fname }}" name="fname" required>
													</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
														<label for="">Lastname</label>
														<input type="text" class="form-control" value="{{ $detail->lname }}" name="lname" required>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
														<label for="">Email</label>
														<input type="email" class="form-control" value="{{ $detail->email }}" name="email" disabled>
													</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
														<label for="">Phone Number</label>
														<input type="number" class="form-control" value="{{ $detail->phone }}" minlength="11" name="mobile" required>
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
													    <input type="text" class="form-control" placeholder="e.g https://www.facebook.com/KeylandRealty" value="{{ $detail->socialmedia }}" name="socialmedia" required>
													</div>
												</div>
											</div>
											<div class="row js-teamlead-row js-hidden-{{ $detail->is_teamlead }}">
												<div class="col-md-8 col-sm-12">
													<div class="form-group">
														@if($detail->is_teamlead == 1)
															<label for="">Find Team Leader</label>
														@else
															<label for="">Team Leader</label>
														@endif
														<select class="form-control form-control-sm js-teamlead_id" name="teamlead_id">
															<option value="" selected disabled> -- Select --</option>
															@foreach(App\Modules\Helpers::filterTeamLeader($detail->id) as $lead)
													    		<option value="{{ $lead->id }}" {{ $lead->id == $detail->teamlead_id ? 'selected':'' }}>{{ $lead->fname.' '.$lead->lname }}</option>
													    	@endforeach
														</select>
													</div>
												</div>
											</div>
											<div class="clearfix">
												<input type="hidden" value="{{ $detail->is_teamlead }}" name="current_is_teamlead">
				                                <div class="form-check float-left">
				                                    <input type="checkbox" class="form-check-input js-is_teamlead" value="1" id="is_teamlead" name="is_teamlead" {{ $detail->is_teamlead == 1 ? 'checked':''}}>
				                                    <label class="form-check-label pl-1" for="is_teamlead">
				                                    	@if($detail->is_teamlead == 1)
				                                    		<p>Team Leader.</p>
				                                    	@else
				                                    		<p>Mark as team leader?</p>
				                                    	@endif
				                                    </label>
				                                </div>
				                            </div>
											<button class="btn btn-keyland">Save Changes</button>
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


