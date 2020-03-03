@extends('layouts.app')
@section('title')<title>Contact Us - {{ config('app.name') }}</title>@endsection
@section('page')	
	@include('layouts.carousel')
	<div class="page-content">
		<div class="container">
			<div class="row">
			    <div class="col-12 col-lg-8">
			        <div class="border p-3">
			            <div class="row">
			                <div class="col-12">
			                    <h1>We'd love to hear from you.</h1>
			                </div>
			            </div>
			            <div class="row">
			                <div class="col-12">
			                    <p class="hi-contact-us-page__p">Kindly fill out this form. It will help us process your inquiry faster.</p>
			                </div>
			            </div>

		                <div class="hi-contact-us-form__container">
		                    <form method="POST" action="{{ URL::to('postInquiry') }}">
		                    	@csrf
		                        <div class="row">
		                            <div class="col-12">
		                                <label class="hi-input-label">I am interested in...</label>
		                                <select class="form-control mt-1 js-interested" name="interested" required>
		                                    <option selected disabled>Choose Subject</option>
		                                    <option value="Buying/Renting Properties">Buying/Renting Properties</option>
		                                    <option value="Partner Broker Program">Partner Broker Program</option>
		                                    <option value="Investor Relations">Investor Relations</option>
		                                    <option value="Corporate Partnerships">Corporate Partnerships</option>
		                                    <option value="Listings">Listings</option>
		                                    <option value="Others">Others</option>
		                                </select>
		                            </div>
		                            <div class="col-12">
		                            	<input class="form-control hi-text-input js-others" type="text" placeholder="Others, please specify...." name="other">
		                            </div>
		                        </div>
		                        <div class="row mt-3">
		                            <div class="col-12 col-md-6">
		                                <div class="form-group">
		                                    <input class="form-control hi-text-input" type="text" placeholder="Firstname" name="fname" required/>
		                                </div>
		                            </div>
		                            <div class="col-12 col-md-6">
		                                <div class="form-group">
		                                    <input class="form-control hi-text-input" type="text" placeholder="Lastname" name="lname" required/>
		                                </div>
		                            </div>
		                        </div>
		                        <div class="row">
		                            <div class="col-12 col-md-6">
		                                <div class="form-group">
		                                    <input class="form-control hi-text-input" type="number" placeholder="Phone number" name="phone" required/>
		                                </div>
		                            </div>
		                            <div class="col-12 col-md-6">
		                                <div class="form-group">
		                                    <input class="form-control hi-text-input" type="text" placeholder="Email" name="email" required/>
		                                </div>
		                            </div>
		                        </div>
		                        <div class="row">
		                            <div class="col-12">
		                                <div class="form-group">
										    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Write your message" name="message"></textarea>
										</div>
		                            </div>
		                        </div>
		                        <button class="btn btn-keyland px-4 mt-4 btnmobile text-center d-block" style="width:20%;">INQUIRE</button>
		                    </form>
		                </div>
			        </div>
			    </div>
			    <div class="col-12 col-lg-4 mt-3 mt-lg-0 border p-3">
			        <div class="hi-contact-us-page__card">
			            <h5 class="">Connect with us.</h2>
		            	<p>
		            		Address: The Greenery bldg. unit #5 <br/>
							3rd floor Mabolo Cebu City <br/>
							<br/>
							Globe Phone #: 0927 302 4773<br/>
							Sun Phone #: +63 951 587 7870<br/>
							Email Address: <br/><a href="mailto:keylandbrokerage@gmail.com">keylandbrokerage@gmail.com</a><br/>
							<div class="contactSocial">
								<ul>
									<li><a href="https://www.facebook.com/Keylandrealtyy/" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
									<li><a href="https://www.instagram.com/keylandrealty/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
									<li><a href="https://www.linkedin.com/company/keyland-realty/" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
								</ul>
							</div>
		            	</p>
			        </div>
			    </div>
			</div>
		</div>
	</div>
	<div class="spacer"></div>
@endsection

@section('script')
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$('.js-others').hide();
			$('.js-interested').on('change', function() {

				var interested = $(this).val();

				if(interested === 'Others') {
					$('.js-others').show();
					$('.js-others').attr('required', true);
					$('.js-others').addClass('mt-3');
				} else { 
					$('.js-others').hide();
					$('.js-others').attr('required', false);
					$('.js-others').removeClass('mt-3');
				}
			});
		});
	</script>
@endsection