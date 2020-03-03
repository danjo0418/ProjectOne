@extends('layouts.app')
@section('title')<title> {{ config('app.name') }} - Summary</title>@endsection
@section('page')	
	@include('layouts.sidebar')
				<div class="col-md-10 pt-3 text-left" style="background: #eee;">
					<section class="container">
				        <div class="row">
				        	<div class="col-md-12 mb-5">
				        		<h5>Summary</h5>
				        		<div class="row">
				        			<div class="col-md-4">
				        				<div class="card box">
				        					<div class="card-body">
			        							<span class="icon-property text-warning"></span>
			        							<h1 class="text-warning m-0">{{ $count_property }}</h1>
			        							<p>Total Properties</p>
		        								<div class="form-group">
		        									<select class="form-control form-control-sm js-property-filter">
		        										<option selected disabled>Filter by Status</option>
		        										@foreach(App\Modules\Helpers::propertyStatus() as $status)
												    		<option value="{{ $status->status }}" {{ request()->get('property') == $status->status ? 'selected':'' }}>{{ $status->status }}</option>
												    	@endforeach
		        									</select>
		        								</div>
				        					</div>
				        				</div>
				        			</div>
				        			<div class="col-md-4">
				        				<div class="card box">
				        					<div class="card-body">
			        							<span class="icon-agents text-primary"></span>
			        							<h1 class="text-primary m-0">{{ $count_agent }}</h1>
			        							<p>Total Agents</p>
		        								<div class="form-group">
		        									<select class="form-control form-control-sm js-agent-filter">
		        										<option selected disabled>Filter by Status</option>
		        										<option value="active" {{ request()->get('agent') == 'active' ? 'selected':'' }}>Active</option>
		        										<option value="inactive" {{ request()->get('agent') == 'inactive' ? 'selected':'' }}>Inactive</option>
		        									</select>
		        								</div>
				        					</div>
				        				</div>
				        			</div>
				        		</div>
				        	</div>
				        	<div class="col-md-12 table-responsive-sm">
			        			<h5>Recent Properties</h5>
								<table class="table keyland-tbl bg-white">
									<thead class="thead-warning">
										<tr>	
											<th width="7%"></th>
											<th width="32%">Property</th>
											<th class="text-center">Type</th>
											<th class="text-center">Status</th>
											<th>Agent</th>
											<th class="text-center">Date Listed</th>
											<th>List Status</th>
										</tr>
									</thead>
									<tbody>
										@foreach($properties as $property)
											<tr>
												<td>
													@if(is_null($property->thumbnail))
														<img src="{{ asset('assets/img/properties/placeholder.png') }}" class="property-thumbnail" alt="{{ $property->name }}">
													@else
														<img src="{{ asset('assets/img/properties/thumb/'.$property->thumbnail->filename) }}" class="property-thumbnail" alt="{{ $property->name }}">
													@endif
												</td>
												<td>
													<a data-toggle="tooltip" data-placement="top" title="View Details" href="{{ URL::to('list-of-properties/'.$property->code) }}"><strong class="text-primary">{{ $property->name }}</strong></a><br>
													<small>
														<i class="fa fa-map-marker"></i>
														{{ $property->street_barangay.', '.$property->city_municipality.', '.$property->province }}
													</small>
												</td>
												<td  class="text-center">
													<span>{{ $property->type->type }}</span><br>
													@if($property->offer_type == 'buy')
														<span class="text-success">For Sell</span>
													@else
														<span class="text-warning">For Rent</span>
													@endif
												</td>
												<td class="text-center">{{ $property->status->status }}</td>
												<td>
													{{ $property->author->fname.' '.$property->author->lname }}
												</td>
												<td class="text-center">{{ date('M d,Y', strtotime($property->created_at)) }}</td>
												<td>
													@if($property->is_approved == 0)
														<span class="text-warning">Pending</span>
													@elseif($property->is_approved == 1)
														<span class="text-success">Approved</span>
													@elseif($property->is_approved == 2)
														<span class="text-danger">Declined</span>
													@endif
												</td>
											</tr>
										@endforeach
									</tbody>
								</table>
								@if(count($properties) == 0)
									<div class="col-12">
								  		<div class="error-message text-center mb-5">
								  			<h2><i class="icon icon-property"></i></h2>
								  			<h5 class="mb-0"><strong>NO RESULTS FOUND</strong></h5>
											<small>There is no recent property.</small>
								  		</div>
									</div>
								@endif
							</div>
				        </div>
				    </section>
				    <section class="spacer"></section>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('script')
	<script type="text/javascript">
		jQuery(document).ready(function() {
			$('.js-property-filter').on('change', function() {
				var filter = $(this).val();
				window.location.href = BASE_URL+'/summary?property='+filter;
			});

			$('.js-agent-filter').on('change', function() {
				var filter = $(this).val();
				window.location.href = BASE_URL+'/summary?agent='+filter;
			});
		});
	</script>
@endsection