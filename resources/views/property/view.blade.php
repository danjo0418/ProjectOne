@extends('layouts.app')
@section('title')<title>{{ $detail->name }} - {{ config('app.name') }}</title>@endsection
@section('page')	
	@include('layouts.sidebar')
				<div class="col-md-10 pt-3 text-left" style="background: #eee;">
					<section class="container p-3 border rounded bg-white">
				        <div class="row">
				        	<div class="col-md-12">
				        		<div class="row">
				        			<div class="col-md-12">
				        				@if($detail->is_approved == 0)
				        					<span class="badge badge-warning fontsmall">Pending</span>
				        				@elseif($detail->is_approved == 1)
				        					<span class="badge badge-success fontsmall">Approved</span>
				        				@elseif($detail->is_approved == 2)
				        					<span class="badge badge-danger fontsmall">Declined</span>
				        				@elseif($detail->is_approved == 3)
											<span class="badge badge-secondary fontsmall">Removed</span>
				        				@endif
					        			<h3 class="m-0">{{ $detail->name }}</h3>
										<nav aria-label="breadcrumb">
										  	<ol class="breadcrumb cstm-breadcrumb">
										    	<li class="breadcrumb-item"><a href="{{ URL::previous() }}"><i class="fa fa-angle-double-left "></i> Back to previous</a></li>
										    	<li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $detail->name }}</a></li>
										 	</ol>
										</nav>
					        		</div>
									<div class="col-md-12 mb-3">
										@if(Auth::user()->role_id == 1)
										  	<div class="dropdownht">
											  	<a href="javascript:void(0)" class="dropdown-toggle btn btn-keyland" id="dropdownMenuButton" data-toggle="dropdown"><i class="fa fa-cogs"></i> Actions</a>
											  	<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
											    	@if($detail->is_approved == 1)
											    		<a class="dropdown-item" href="{{ URL::to('update-property/'.$detail->code) }}">
												    		Update Details
												    	</a>
												    	<a class="dropdown-item" href="javascript:void(0)" onclick="changeStatus({{ $detail }})">
												    		Change Status
												    	</a>
												    	<a class="dropdown-item" href="javascript:void(0)" onclick="assignAgent({{ $detail }})">
												    		Assign Agent
												    	</a>
												    	<a class="dropdown-item" href="javascript:void(0)" onclick="removed({{ $detail }})">
												    		Remove
												    	</a>
												    @elseif($detail->is_approved == 0)
												    	<a class="dropdown-item" href="javascript:void(0)" onclick="approve({{ $detail }})">
												    		Approve
												    	</a>
												    	<a class="dropdown-item" href="javascript:void(0)" onclick="decline({{ $detail }})">
												    		Decline
												    	</a>
												    @elseif($detail->is_approved == 2)
												    	<a class="dropdown-item" href="javascript:void(0)" onclick="approve({{ $detail }})">
												    		Approve
												    	</a>
												    @elseif($detail->is_approved == 3)
												    	<a class="dropdown-item" href="javascript:void(0)" onclick="archive({{ $detail }})">
												    		Archive
												    	</a>
												    @endif
											  	</div>
											</div>
										@else
											<a class="btn btn-keyland" href="{{ URL::to('update-property/'.$detail->code) }}">
												<i class="fa fa-pencil-square-o"></i>	Update Details
											</a>
										@endif
									</div>
				        		</div>
				        	</div>
				        	<div class="col-md-7">
								<div id="slider" class="m-0">
									<ul>
										@foreach($detail->photos as $photo)
											<li><img src="{{ asset('assets/img/properties/'.$photo->filename) }}" class="img-fluid"></li>
										@endforeach
									</ul>
									<a href="#" id="sliderNext">></a>
									<a href="#" id="sliderPrev"><</a>
								</div>

								<div class="price text-center mt-4">
									<h2>
										@if($detail->offer_type == 'buy')
											&#8369; {{ number_format($detail->price) }}
										@else
											&#8369; {{ number_format($detail->price) }} <span style="font-size: 15px;"> / {{ ucwords($detail->price_condition) }} </span>
										@endif
									</h2>
								</div>

								<h5 class="pt-3">About:</h5>
								<div class="about-content">{!! $detail->about !!}</div>
								
								<h5 class="pt-3">Location:</h5>
								<p>{{ $detail->street_barangay.', '.$detail->city_municipality.', '.ucwords($detail->province) }}</p>

								<h5 class="pt-3">Additional Information:</h5>
								<ul class="list-unstyled">
									@if(!empty($detail->bedrooms))
										<li>
											Bedrooms:
											<span class="ml-2">{{ $detail->bedrooms }}</span>
										</li>
									@endif
									@if(!empty($detail->bathrooms))
										<li>
											Bathrooms: 
											<span class="ml-2">{{ $detail->bathrooms }}</span>
										</li>
									@endif
									@if(!empty($detail->floor_area))
										<li>
											Floor Area (sqm): 
											<span class="ml-2">{{ $detail->floor_area }}</span>
										</li>
									@endif
									@if(!empty($detail->land_size))
										<li>
											Land Size (sqm): 
											<span class="ml-2">{{ $detail->land_size }}</span>
										</li>
									@endif 
									@if(!empty($detail->rooms))
										<li>
											Rooms: 
											<span class="ml-2">{{ $detail->rooms }}</span>
										</li>
									@endif 
									@if(!empty($detail->car_space))
										<li>
											Car Space: 
											<span class="ml-2">{{ $detail->car_space }} </span>
										</li>
									@endif 
									@if(!empty($detail->building_name))
										<li>
											Building Name: 
											<span class="ml-2">{{ $detail->building_name }}</span>
										</li>
									@endif 
									@if(!empty($detail->build_year))
										<li>
											Build Year: 
											<span class="ml-2">{{ $detail->build_year }}</span>
										</li>
									@endif 
									@if(!empty($detail->deposit_bond))
										<li>
											Deposit/ Bond: 
											<span class="ml-2">{{ $detail->deposit_bond }}</span>
										</li>
									@endif 
									@if(!empty($detail->block_lotnum))
										<li>
											Block and Lot/Unit/Floor:
											<span class="ml-2">{{ $detail->block_lotnum }}</span>
										</li>
									@endif 
									@if(!empty($detail->developer))
										<li>
											Developer: 
											<span class="ml-2">{{ $detail->developer }}</span>
										</li>
									@endif 
								</ul>
								<ul class="list-unstyled">
									<li>Status: {{ $detail->status->status }}</li>
									<li>Date Posted: {{ date('M d, Y', strtotime($detail->updated_at)) }}</li>
									@if($detail->furnished == 'Fully Furnished')
										<li class="text-success">
											<i class="fa fa-check"></i>
									@elseif($detail->furnished == 'Semi Furnished')
										<li class="text-primary">
											<i class="fa fa-check"></i>
									@elseif($detail->furnished == 'Unfurnished')
										<li class="text-warning">
											<i class="fa fa-check"></i>
									@else
										<li class="text-dark">
											<i class="fa fa-check"></i>
									@endif
											{{ $detail->furnished }}
										</li>
								</ul>

								<h5 class="pt-3">Google Map:</h5>
								<div class="googlemap">
									{!! $detail->map !!}
								</div>
				        	</div>
				        	<div class="col-md-5">
				        		<div class="bg-dark py-2 px-1 mb-3">
				        			<p class="text-center text-white m-0">ASSIGN AGENTS</p>
				        		</div>
				        		@foreach($detail->agents as $agent)
					        		<div class="card property-agents">
					        			<div class="card-body px-3 py-2">
					        				@if(Auth::user()->role_id == 1)
					        					<a href="javascript:void(0)" class="removeAgent" onclick="removeAgent({{ $agent }})" data-toggle="tooltip" data-placement="top" title="Remove Agent">
					        					<i class="fa fa-times-circle"></i></a>
					        				@endif
					        				<div class="pull-left mr-3">
					        					@if(is_null($agent->details->profile))
					        						<img src="{{ asset('assets/img/users/placeholder.png') }}" class="agent-thumbnail" alt="{{ $agent->details->fname}}">
					        					@else
					        						<img src="{{ asset('assets/img/users/'.$agent->details->profile ) }}" class="agent-thumbnail" alt="{{ $agent->details->fname}}">
					        					@endif
					        				</div>
					        				<strong class="text-primary">{{ $agent->details->fname.' '.$agent->details->lname }}</strong><br>
					        				<span>{{ $agent->details->email }}</span>
					        			</div>
					        		</div>
					        	@endforeach
						        @if(count($detail->agents) == 0)
					        		<div class="card property-noagents">
					        			<div class="card-body">
					        				<span class="icon icon-agents"></span>
					        				<h5 class="mb-0"><strong>NO AGENTS</strong></h5>
					        				<p>There's no agent assign on this property.</p>
					        			</div>
					        		</div>
					        	@endif
				        	</div>
				        </div>
				    </section>
				</div>
			</div>
		</div>
	</div>
	<div class="spacer"></div>
	@include('modal.property.status')
	@include('modal.property.assign')
	@include('modal.property.remove')
	@include('modal.property.approve')
	@include('modal.property.decline')
	@include('modal.property.delete')
	@include('modal.property.archive')
@endsection
@section('script')
	<script type="text/javascript">
		$(function(){
			var slider = $('#slider');
			var sliderWrap = $('#slider ul');
			var sliderImg = $('#slider ul li');
			var prevBtm = $('#sliderPrev');
			var nextBtm = $('#sliderNext');
			var length = sliderImg.length;
			var width = sliderImg.width();
			var thumbWidth = width/length;

			sliderWrap.width(width*(length+2));

			//Set up
			slider.after('<div id="' + 'pager' + '"></div>');
			var dataVal = 1;
			sliderImg.each(
				function(){
					$(this).attr('data-img',dataVal);
					$('#pager').append('<a data-img="' + dataVal + '"><img src=' + $('img', this).attr('src') + ' width=' + thumbWidth + '></a>');
				dataVal++;
			});
			
			//Copy 2 images and put them in the front and at the end
			$('#slider ul li:first-child').clone().appendTo('#slider ul');
			$('#slider ul li:nth-child(' + length + ')').clone().prependTo('#slider ul');

			sliderWrap.css('margin-left', - width);
			$('#slider ul li:nth-child(2)').addClass('active');

			var imgPos = pagerPos = $('#slider ul li.active').attr('data-img');
			$('#pager a:nth-child(' +pagerPos+ ')').addClass('active');


			//Click on Pager  
			$('#pager a').on('click', function() {
				pagerPos = $(this).attr('data-img');
				$('#pager a.active').removeClass('active');
				$(this).addClass('active');

				if (pagerPos > imgPos) {
					var movePx = width * (pagerPos - imgPos);
					moveNext(movePx);
				}

				if (pagerPos < imgPos) {
					var movePx = width * (imgPos - pagerPos);
					movePrev(movePx);
				}
				return false;
			});

			//Click on Buttons
			nextBtm.on('click', function(){
				moveNext(width);
				return false;
			});

			prevBtm.on('click', function(){
				movePrev(width);
				return false;
			});

			//Function for pager active motion
			function pagerActive() {
				pagerPos = imgPos;
				$('#pager a.active').removeClass('active');
				$('#pager a[data-img="' + pagerPos + '"]').addClass('active');
			}

			//Function for moveNext Button
			function moveNext(moveWidth) {
				sliderWrap.animate({
		    		'margin-left': '-=' + moveWidth
		  			}, 500, function() {
		  				if (imgPos==length) {
		  					imgPos=1;
		  					sliderWrap.css('margin-left', - width);
		  				}
		  				else if (pagerPos > imgPos) {
		  					imgPos = pagerPos;
		  				} 
		  				else {
		  					imgPos++;
		  				}
		  				pagerActive();
		  		});
			}

			//Function for movePrev Button
			function movePrev(moveWidth) {
				sliderWrap.animate({
		    		'margin-left': '+=' + moveWidth
		  			}, 500, function() {
		  				if (imgPos==1) {
		  					imgPos=length;
		  					sliderWrap.css('margin-left', -(width*length));
		  				}
		  				else if (pagerPos < imgPos) {
		  					imgPos = pagerPos;
		  				} 
		  				else {
		  					imgPos--;
		  				}
		  				pagerActive();
		  		});
			}

		});

		 function changeStatus(property) {
		 	
        	$('.js-statusid').val(property.status_id);
        	$('.js-propertyid').val(property.id);
        	$('.js-propname').val(property.name);
        	$('.js-statusprop').append(property.name);

        	$('#statusProperty').modal('show');
        }

        function removeAgent(agent) {

        	$('.2r-agent').html(agent.details.fname+' '+agent.details.lname);
        	$('.2r-property').html("{{ $detail->name }}");

        	$('.js-proid').val(agent.id);
        	$('.js-proname').val("{{ $detail->name }}");
        	$('.js-proagent').val(agent.details.fname+' '+agent.details.lname);

        	$('#removeAgent').modal('show');
        }

        function assignAgent(assign) {

        	var agents = [];
        	$.each(assign.agents, function(index, data) {
        		agents.push(data.agent_id);
        	});

        	$.get(BASE_URL+'/assign-agent-validation', { agents:agents }, function(response) {

    			var html = "";

    			if(response.length > 0) {

	        		$.each(response, function(index, data) {
	        			html+="<div class='col-md-6 agent-validator'>";
	                        html+="<table>";
	                          	html+="<tr>";
	                             	html+="<td><input type='checkbox' class='cstm-checkbox singleAgent' id='"+data.id+"' value='"+data.id+"' name='agent_id[]'></td>";
	                             	if(data.profile == null || data.profile == '') {
	                             		html+="<td><img src='"+BASE_URL+"/assets/img/users/placeholder.png' class='valid-img' alt=''></td>";
	                             	} else {
	                             		html+="<td><img src='"+BASE_URL+"/assets/img/users/"+data.profile+"' class='valid-img' alt=''></td>";
	                             	}
	                             	html+="<td>";
	                                	html+="<label for='"+data.id+"'>";
	                                   		html+="<span class='text-primary'>"+data.fname+" "+data.lname+"</span><br>"; 
	                                   		html+="<small>"+data.email+"</small>";
	                                	html+="</label>";
	                             	html+="</td>";
	                          	html+="</tr>";
	                        html+="</table>";
	                    html+="</div>";
	        		});

	        	} else {

	        		html+="<div class='col-md-12'>";
				  		html+="<div class='error-message text-center mb-5'>";
				  			html+="<h2><i class='icon icon-agents'></i></h2>";
				  			html+="<h5 class='mb-0'><strong>NO RESULTS FOUND</strong></h5>";
							html+="<small>There is no agents available on this property.</small>";
				  		html+="</div>";
					html+="</div>";

					$('.js-assigntoall').addClass('d-none');

	        	}
        		$('.js-listing-agents').html(html);
        	});

        	$('.js-pname').html(assign.name);
        	$('.js-valpname').val(assign.name);
        	$('#agentAssign').modal('show');
        }

        jQuery(document).ready(function($){
        	$("#selectall").change(function() {
		        if (this.checked) {
		            $(".singleAgent").each(function() {
		                this.checked=true;
		            });
		        } else {
		            $(".singleAgent").each(function() {
		                this.checked=false;
		            });
		        }
		    });
        });

        function approve(property) {

        	$('.approve-name').append(property.name);
        	$('.app-property-id').val(property.id);
        	$('.app-property-name').val(property.name);
        	$('#approveProperty').modal('show');
        }

        function decline(property) {

        	$('.decline-name').append(property.name);
        	$('.dec-property-id').val(property.id);
        	$('.dec-property-name').val(property.name);
        	$('#declineProperty').modal('show');
        }

        function removed(property) {
        	$('.removed-name').append(property.name);
        	$('.rem-property-id').val(property.id);
        	$('.rem-property-name').val(property.name);
        	$('#removedProperty').modal('show');
        }

        function archive(property) {
        	$('.archive-name').append(property.name);
        	$('.arc-property-id').val(property.id);
        	$('.arc-property-name').val(property.name);
        	$('#archiveProperty').modal('show');
        }

	</script>
@endsection

