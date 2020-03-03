@php
    $home_url = [''];
    $buy_url = ['buy'];
    $rent_url = ['rent'];
    $sell_properties_url = ['sell-your-properties'];
    $agentlist_url = ['agents','be-an-agent'];
    $news_url = ['news-and-updates'];
    $contact_url = ['contact-us'];
@endphp

<nav id="myheader" class="navbar navbar-expand-lg navbar-light bottomborder pl-0 pr-0">	
	<button class="navbar-toggler ml-2" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<div class="container2 pl-0 pr-0">	
		  	<ul class="navbar-nav float-left pl-0 pr-0 list-unstyled">
		  		<li class="nav-item">
			  		<a class="navbar-brand mt-3 pt-0 pb-0" href="#">
				    	<img src="{{ asset('assets/img/icons/headerlogo.png') }}" alt="Logo" class="img-fluid" width="250">
				  	</a>
		  		</li>
			    <li class="nav-item {{ in_array(request()->segment(1), $home_url) ? 'active':''}}">
			      	<a class="nav-link" href="{{ URL::to('/') }}">Home</a>
			    </li>
			    <li class="nav-item {{ in_array(request()->segment(2), $buy_url) ? 'active':''}}">
			      	<a class="nav-link" href="{{ URL::to('/properties/buy') }}">Buy</a>
			    </li>
			    <li class="nav-item {{ in_array(request()->segment(2), $rent_url) ? 'active':''}}">
			      	<a class="nav-link" href="{{ URL::to('/properties/rent') }}">Rent</a>
			    </li>
			    <li class="nav-item {{ in_array(request()->segment(1), $sell_properties_url) ? 'active':''}}">
			      	<a class="nav-link" href="{{ URL::to('sell-your-properties') }}">Sell Your Properties</a>
			    </li>
			    <li class="dropdown nav-item {{ in_array(request()->segment(1), $agentlist_url) ? 'active':''}}">
			      	<a class="nav-link dropdown-toggle" href="{{ URL::to('agents') }}" id="navbarDropdownAgent" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Agent List</a>
			      	<div class="dropdown-menu" aria-labelledby="navbarDropdownAgent">
			          	<a class="nav-link" href="{{ URL::to('be-an-agent') }}">Be An Agent</a>
			          	<a class="nav-link" href="{{ URL::to('our-agents') }}">Our Agents</a>
			        </div>
				</li>
				<li class="nav-item {{ in_array(request()->segment(1), $news_url) ? 'active':''}}">
			      	<a class="nav-link" href="{{ URL::to('news-and-updates') }}">News and Updates</a>
				</li>
				<li class="nav-item {{ in_array(request()->segment(1), $contact_url) ? 'active':''}}">
			      	<a class="nav-link" href="{{ URL::to('contact-us') }}">Contact Us</a>
			    </li>
		  	</ul>
			<ul class="d-none d-xl-block list-unstyled">
				@guest 
					<li class="nav-item float-right pl-0 pr-0 mt-3">
						<a class="nav-link btn btn-outline-keyland fontsmall" href="#" data-toggle="modal" data-target="#registerModal" style="padding:6px;">REGISTER</a>
					</li>
				  	<li class="nav-item float-right pl-0 pr-0 mt-3 mr-2">
					    <a class="nav-link btn btn-keyland fontsmall" href="#" data-toggle="modal" data-target="#loginModal" style="padding:6px;">LOGIN</a>
					</li>
				@else
					<li class="nav-item float-right mt-3 pt-1">
					    <div class="dropdown credentials">
						  	<a class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						  		<i class="fa fa-user-circle-o"></i>
								<span>Welcome, <strong>{{ ucfirst(Auth::user()->fname) }}</strong></span>
						  	</a>
						  	<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						  		@if(Auth::user()->role_id == 1)
							  		<a class="dropdown-item" href="{{ URL::to('summary') }}">
							    		<i class="fa fa-desktop"></i>
							    		Summary
							    	</a>

						    	@else
						    		<a class="dropdown-item" href="{{ URL::to('list-of-properties') }}">
							    		<i class="icon icon-property"></i>
										Properties
							    	</a>
						    	@endif
						    	<a class="dropdown-item" href="{{ URL::to('profile') }}">
						    		<i class="fa fa-user-circle-o"></i>
						    		Profile
						    	</a>
						    	<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
						    		<i class="fa fa-sign-out"></i>
						    		Logout
						    	</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
						  	</div>
						</div>
					</li>
				@endguest
			</ul>	
		</div>
	</div>

	<div class="d-block d-xl-none mr-3 reslog">
		@guest 
			<a class="nav-link btn btn-keyland fontsmall" href="#" data-toggle="modal" data-target="#loginModal">LOGIN</a>
			<a class="nav-link btn btn-outline-keyland fontsmall" href="#" data-toggle="modal" data-target="#registerModal">REGISTER</a>
		@else
			<div class="dropdown credentials">
			  	<a class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  		<i class="fa fa-user-circle-o"></i>
					<span>Welcome, <strong>{{ ucfirst(Auth::user()->fname) }}</strong></span>
			  	</a>
			  	<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
			  		@if(Auth::user()->role_id == 1)
				  		<a class="dropdown-item" href="{{ URL::to('summary') }}">
				    		<i class="fa fa-desktop"></i>
				    		Summary
				    	</a>

			    	@else
			    		<a class="dropdown-item" href="{{ URL::to('list-of-properties') }}">
				    		<i class="icon icon-property"></i>
							Properties
				    	</a>
			    	@endif
			    	<a class="dropdown-item" href="{{ URL::to('profile') }}">
			    		<i class="fa fa-user-circle-o"></i>
			    		Profile
			    	</a>
			    	<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
			    		<i class="fa fa-sign-out"></i>
			    		Logout
			    	</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
			  	</div>
			</div>
		@endguest
	</div>
</nav>

