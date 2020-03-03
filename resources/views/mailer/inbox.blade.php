@extends('layouts.app')
@section('title')<title>Messages - {{ config('app.name') }}</title>@endsection
@section('page')	
	@include('layouts.sidebar')
				<div class="col-md-10 pt-3 text-left">
					<section class="container">
				        <div class="row">
				        	<div class="col-md-12">
				        		<h5>Inbox </h5>
				        	</div>
				        	<div class="col-md-12">
				        		<div class="pull-left">
				        			<div class="paginate">
					        			<nav class="cstm-paginate" aria-label="Page navigation example">
										  	{{ $messages->links() }}
										</nav>
					        		</div>
				        		</div>
				        		<div class="pull-right">
					        		<form class="form-inline" method="GET">
					        			<div class="form-group mr-2">
											<input type="text" placeholder="Date From" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control form-control-sm" name="from" value="{{ request()->get('from') }}"  required>
										</div>
										<div class="form-group mr-2">-</div>
										<div class="form-group mr-2">
											<input type="text" placeholder="Date To" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control form-control-sm" name="to" value="{{ request()->get('to') }}" required>
										</div>
										@if(request()->has('from'))
											<a href="{{ URL::to('mail/inbox') }}" class="btn btn-sm btn-danger"><i class="fa fa-search-minus"></i></a>
										@else
											<button class="btn btn-sm btn-warning"><i class="fa fa-filter"></i></button>
										@endif
					        		</form>
				        		</div>
				        	</div>
				        	<div class="col-md-12 mt-3">
				        		<div class="mail-box">
					                <div class="inbox-body">
					                	@if(count($messages) > 0)
						                   	<table class="table table-inbox table-hover">
						                        <tbody>
						                        	@foreach($messages as $message)
							                            <tr class="{{ $message->is_read == 0 ? '':'unread' }} removed_id_{{ $message->id }}">
							                                <td class="inbox-small-cells">
							                                    <a href="javascript:void(0)" onclick="removeMessage({{ $message }})">
							                                    	<div class="radius" data-toggle="tooltip" data-placement="left" title="Remove"><i class="fa fa-trash"></i></div>
							                                    </a>
							                                </td>
							                            	<td class="view-message">
							                            		<a href="{{ URL::to('mail/inbox/u/'.$message->code) }}">
							                            			<div class="row">
							                            				<div class="col-md-2 ">
							                            					<p class="mb-0 fontsmall"><strong>{{ ucwords($message->title) }}</strong></p>
							                            				</div>
							                            				<div class="col-md-8">
							                            					<p class="mb-0 fontsmall">{{ substr($message->message, 0, 150) }}</p>
							                            					<div class="attachment">
							                            						@if(!is_null($message->property_sketch))
								                            						<span>
								                            							@if($message->property_sketch_extention == 'pdf')
								                            								<i class="fa fa-file-pdf-o text-danger"></i> 
								                            							@else
								                            								<i class="fa fa-file-word-o text-primary"></i> 
								                            							@endif
								                            							{{ $message->property_sketch }}
								                            						</span>
								                            					@endif
							                            					</div>		
							                            				</div>
							                            				<div class="col-md-2 text-right">
							                            					@php
							                            						$datenow = date('mdy');
							                            						$datesent = date('mdy', strtotime($message->date_sent));
							                            					@endphp

							                            					@if($datenow == $datesent)
																				<small>{{ date('H:i A', strtotime($message->date_sent)) }}</small>
							                            					@else
							                            						<small>{{ date('M d, Y', strtotime($message->date_sent)) }}</small>
							                            					@endif
							                            				</div>
							                            			</div>
							                            		</a>
							                            	</td>
							                            </tr>
							                        @endforeach
						                      	</tbody>
						                    </table>
						                @else
						                	<div class="col-12">
										  		<div class="error-message text-center mb-5">
										  			<h2 class="mb-4"><i class="fa fa-envelope-o"></i></h2>
										  			<h5 class="mb-0"><strong>NO EMAILS</strong></h5>
													<small>There is no emails found.</small>
										  		</div>
											</div>
						                @endif
					                </div>
					            </div>
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
		
		function removeMessage(message)
		{
			$.get(BASE_URL+'/getRemoveMessage',{id:message.id}, function(response) {
		
				if(response.status == 'success') {

					toastr.success('Email was successfully removed', 'Success.', { 
			        	"closeButton": true, 
			        	"showDuration": "500",
			        });

					$('.removed_id_'+message.id).hide();
				}
			});
		}

	</script>
@endsection

