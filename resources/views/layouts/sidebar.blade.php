@php
	$summary = ['summary'];
	$property_url = ['list-of-properties','list-your-property','update-property','assign-properties'];
	$agent_url = ['list-of-agents'];
	$mailer_url = ['inbox'];
	$inbox_url = ['inbox'];
	$linkproperty_url = ['link-properties'];
	$profile_url = ['profile'];
	$history_url = ['history'];
	$restore_url = ['agents','properties'];
	$restore_property_url = ['properties'];
	$restore_agent_url = ['agents'];
@endphp
<div class="bgwhite pt-0" id="dashboard">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2 pt-3 text-left">
				<aside>
					<ul class="list-unstyled mainmenu">
						@if(Auth::user()->role_id == 1)
							<li>
								<a class="{{ in_array(request()->segment(1), $summary) ? 'active':''}}" href="{{ URL::to('summary') }}">
									<i class="icon fa fa-desktop"></i>
								    Summary
								</a>
							</li>
						@endif
						<li>
							<a href="{{ URL::to('list-of-properties') }}" class="{{ in_array(request()->segment(1), $property_url) ? 'active':''}}"><i class="icon icon-property"></i> Properties</a>
						</li>
						@if(Auth::user()->role_id == 1)
							<li>
								<a class="{{ in_array(request()->segment(1), $agent_url) ? 'active':''}}" href="{{ URL::to('list-of-agents') }}"><i class="icon icon-agents"></i> Agents </a>
							</li>
						@endif
						<li>
							<a class="nav-mailer {{ in_array(request()->segment(2), $inbox_url) ? 'active':''}}" href="javascript:void(0)">
								<i class="fa fa-envelope-o"></i> Mailer
								<i class="fa fa-angle-down css-angle"></i>
							</a>
							<ul class="list-unstyled subm subm-mailer {{ in_array(request()->segment(2), $mailer_url) ? 'd-block':''}}">
								<li>
									<a class="{{ in_array(request()->segment(2), $inbox_url) ? 'active':''}}" href="{{ URL::to('mail/inbox') }}">Inbox <span class="ml-4 badge badge-primary">{{ App\Modules\Helpers::countInboxMessage() }}</span></a>
								</li>
							</ul>
						</li>
						<li>
							<a href="{{ URL::to('profile') }}" class="{{ in_array(request()->segment(1), $profile_url) ? 'active':''}}"><i class="icon fa fa-user-circle-o"></i> Profile</a>
						</li>
						<li>
							<a class="nav-restore {{ in_array(request()->segment(2), $restore_url) ? 'active':''}}" href="javascript:void(0)">
								<i class="fa fa-recycle"></i> Restore Data
								<i class="fa fa-angle-down css-angle"></i>
							</a>
							<ul class="list-unstyled subm subm-restore {{ in_array(request()->segment(2), $restore_url) ? 'd-block':''}}">
								<li>
									<a class="{{ in_array(request()->segment(2), $restore_property_url) ? 'active':''}}"  href="{{ URL::to('restore/properties') }}">Properties</a>
								</li>
								<li>
									<a class="{{ in_array(request()->segment(2), $restore_agent_url) ? 'active':''}}"  href="{{ URL::to('restore/agents') }}">Agents</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="{{ URL::to('history') }}" class="{{ in_array(request()->segment(1), $history_url) ? 'active':''}}"><i class="icon fa fa-history"></i> History</a>
						</li>
					</ul>
				</aside>
			</div>

