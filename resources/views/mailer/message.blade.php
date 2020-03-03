@extends('layouts.app')
@section('title')<title>{{ ucwords($detail->title) }} - {{ config('app.name') }}</title>@endsection
@section('page')	
	@include('layouts.sidebar')
	@php
		$code = $detail->code;
		$remove = App\Modules\Helpers::ReadMessage($code);
	@endphp
				<div class="col-md-10 pt-3 text-left">
					<section class="container">
				        <div class="row">
				        	<div class="col-md-12">
				        		<nav aria-label="breadcrumb">
								  	<ol class="breadcrumb cstm-breadcrumb">
								    	<li class="breadcrumb-item"><a href="{{ URL::to('mail/inbox') }}"><i class="fa fa-angle-double-left "></i> Back to inbox</a></a></li>
								    	<li class="breadcrumb-item active"><a href="javascript:void(0)">{{ ucwords($detail->title) }}</a></li>
								 	</ol>
								</nav>
				        	</div>
				        	<div class="col-md-12 mt-4">
				        		<div class="mail-message">
					                <div class="credentials">
					                	<div class="pull-left">
					                		<span>
					                			{{ ucwords($detail->fname).' '.ucwords($detail->lname) }}
					                			<small>
					                				<a href="mailto:{{ $detail->email }}">< {{ $detail->email }} ></a>
					                				@if(!is_null($detail->phone))
					                					<a href="tel:{{ $detail->phone }}">/ <i>{{ $detail->phone }}</i></a>
					                				@endif
					                			</small>
					                		</span>
					                		<div class="dropdown">
											  	<a class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #807d7d;">to me</a>
											  	<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
											    	<div class="dropdown-item">
											    		<p>
											    			From: {{ $detail->fname.' '.$detail->lname.' <'.$detail->email.'>' }}<br>
											    			@if(!is_null($detail->phone))
											    				Contact No: {{ $detail->phone }} <br>
											    			@endif
											    			To: {{ $detail->toagent->fname.' '.$detail->toagent->lname.' <'.$detail->toagent->email.'>' }}<br>
											    			Subject: {{ ucwords($detail->title) }}
											    		</p>
											    	</div>
											  	</div>
											</div>
					                	</div>
					                	<div class="pull-right">
					                		@php
                        						$datenow = date('mdy');
                        						$datesent = date('mdy', strtotime($detail->date_sent));
                        					@endphp

                        					@if($datenow == $datesent)
												<small>Today @ {{ date('H:i A', strtotime($detail->date_sent)) }}</small>
                        					@else
                        						<small>{{ date('M d, Y @ H:i A', strtotime($detail->date_sent)) }}</small>
                        					@endif
					                	</div>
					                </div>
					            </div>
				        	</div>
				        	<div class="col-md-12 mt-3">
				        		<div class="mail-message">
				        			<h5>{!! $detail->subject !!}</h5>
				        			@if(!is_null($detail->interested))
				        				<p><strong>I am interested in {{ $detail->interested }}</strong></p>
				        			@endif
				        			<p>
				        				{{ $detail->message }}.
				        				@if($detail->title === 'schedule a free site viewing')
				        					The requested date for viewing is on <strong>{{ $detail->appointment_date.' at '.$detail->appointment_time }}</strong><br/><br/>
				        					<a href="{{ URL::to('list-of-properties/'.$detail->property_code) }}" target="_blank">Click here to view property information.</a>
				        				@endif
				        			</p>
				        		</div>
				        	</div>
				        	@if($detail->title === 'sell your properties')
					        	<div class="col-md-12">
					        		<p class="m-0">Location of Property: {{ $detail->property_location }}</p>
					        		<p class="m-0">Lot size of Property: {{ $detail->property_lotsize }} sqm.</p>
					        		<div class="mail-file">
					        			Copy of Title and Property Sketch with Bounderies:
	            						<a class="text-secondary" href="{{ asset('assets/mail/sketch/'.$detail->property_sketch) }}" target="_blank">
	            							<span>
	            								@if($detail->property_sketch_extention == 'pdf')
                    								<i class="fa fa-file-pdf-o text-danger"></i> 
                    							@else
                    								<i class="fa fa-file-word-o text-primary"></i> 
                    							@endif
	            								{{ $detail->property_sketch }}
	            							</span>
	            						</a>
	            					</div>
					        	</div>
							@endif
				        </div>
				    </section>
				</div>
			</div>
		</div>
	</div>
	<div class="spacer"></div>
@endsection

