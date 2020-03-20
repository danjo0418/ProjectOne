<div class="getintouch">
	<div class="container">
		<h1 class="text-center pb-3">Get In Touch</h1>
		<div class="row">
			<div class="col-md-6">
				<div class="maps">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3925.214948971139!2d123.90625641413298!3d10.324675692629006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a99917f926d251%3A0xfe14b58b767716c3!2sThe%20Greenery!5e0!3m2!1sen!2sph!4v1578445787063!5m2!1sen!2sph" width="100%" height="444" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
				</div>
			</div>
			<div class="col-md-6">
				<div class="contactinfo">
					<h4>Contact Us</h4>
					<form method="POST" action="{{ URL::to('postContactUs') }}">
						@csrf
						<div class="row">
							<div class="col-md-6">
								<input class="form-control mb-3 mt-3" type="text" placeholder="Firstname" name="fname" required/>
							</div>
							<div class="col-md-6">
								<input class="form-control mb-3 mt-3" type="text" placeholder="Lastname" name="lname" required/>
							</div>
						</div>
						<input class="form-control mb-3" type="email" placeholder="Email" name="email" required/>
						<div class="form-group">
						   <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="Write your message" name="message" required></textarea>
						</div>
						<button class="btn btn-keyland px-4 mt-4 float-left" href="#">SUBMIT</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<footer>
	<div class="container prelative">
		<div class="cinfo">
			<h4>Contact Information</h4>
			Address: The Greenery bldg. unit #5<br/>
			3rd floor Mabolo Cebu City<br/>
			Globe Phone #: 0927 302 4773<br/>
			Sun Phone #: +63 951 587 7870<br/>
			Email Address: <a href="mailto:keylandbrokerage@gmail.com">keylandbrokerage@gmail.com</a><br/>
		</div>
		<div class="footerline"><a href="#"><img src="{{ asset('assets/img/icons/footerline.png') }}" alt="line"></a></div>
		
		<div class="footerlinks">
			<h4>Footer Links</h4>
			<ul class="list-unstyled">
				<li><a href="{{ URL::to('/') }}">Home</a></li>
				<li><a href="{{ URL::to('properties/buy') }}">Buy</a></li>
				<li><a href="{{ URL::to('properties/rent') }}">Rent</a></li>
				<li><a href="{{ URL::to('sell-your-properties') }}">Sell Your Properties</a></li>
			</ul>
			<ul class="list-unstyled">
				<li><a href="{{ URL::to('be-an-agent') }}">Be An Agent</a></li>
				<li><a href="{{ URL::to('our-agents') }}">Our Agents</a></li>
				{{-- <li><a href="https://blog.keylandrealty.com" target="_blank">News and Updates</a></li> --}}
				<li><a href="{{ URL::to('news-and-updates') }}">News and Updates</a></li>
				<li><a href="{{ URL::to('contact-us') }}">Contact Us</a></li>
			</ul>
		</div>
		<div class="footerline"><a href="#"><img src="{{ asset('assets/img/icons/footerline.png') }}" alt="line"></a></div>
		<div class="followus">
			<h4>Follow Us</h4>
			<ul>
				<li><a href="https://www.facebook.com/Keylandrealtyy/" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
				<li><a href="https://www.instagram.com/keylandrealty/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
				<li><a href="https://www.linkedin.com/company/keyland-realty/" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
			</ul>
		</div>

		<div class="footerlogo">
			<a href="#"><img src="{{ asset('assets/img/icons/footerlogo.png') }}" alt="footer logo" width="220px" class="img-fluid"></a>
		</div>

		<div class="languagetrans mr-3">
			<!-- GTranslate: https://gtranslate.io/ -->
			<a href="#" onclick="doGTranslate('en|en');return false;" title="English" class="gflag nturl" style="background-position:-0px -0px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="English" /></a><a href="#" onclick="doGTranslate('en|fr');return false;" title="French" class="gflag nturl" style="background-position:-200px -100px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="French" /></a><a href="#" onclick="doGTranslate('en|de');return false;" title="German" class="gflag nturl" style="background-position:-300px -100px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="German" /></a><a href="#" onclick="doGTranslate('en|it');return false;" title="Italian" class="gflag nturl" style="background-position:-600px -100px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Italian" /></a><a href="#" onclick="doGTranslate('en|pt');return false;" title="Portuguese" class="gflag nturl" style="background-position:-300px -200px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Portuguese" /></a><a href="#" onclick="doGTranslate('en|ru');return false;" title="Russian" class="gflag nturl" style="background-position:-500px -200px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Russian" /></a><a href="#" onclick="doGTranslate('en|es');return false;" title="Spanish" class="gflag nturl" style="background-position:-600px -200px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Spanish" /></a>
			<br /><select onchange="doGTranslate(this);"><option value="">Select Language</option><option value="en|af">Afrikaans</option><option value="en|sq">Albanian</option><option value="en|ar">Arabic</option><option value="en|hy">Armenian</option><option value="en|az">Azerbaijani</option><option value="en|eu">Basque</option><option value="en|be">Belarusian</option><option value="en|bg">Bulgarian</option><option value="en|ca">Catalan</option><option value="en|zh-CN">Chinese (Simplified)</option><option value="en|zh-TW">Chinese (Traditional)</option><option value="en|hr">Croatian</option><option value="en|cs">Czech</option><option value="en|da">Danish</option><option value="en|nl">Dutch</option><option value="en|en">English</option><option value="en|et">Estonian</option><option value="en|tl">Filipino</option><option value="en|fi">Finnish</option><option value="en|fr">French</option><option value="en|gl">Galician</option><option value="en|ka">Georgian</option><option value="en|de">German</option><option value="en|el">Greek</option><option value="en|ht">Haitian Creole</option><option value="en|iw">Hebrew</option><option value="en|hi">Hindi</option><option value="en|hu">Hungarian</option><option value="en|is">Icelandic</option><option value="en|id">Indonesian</option><option value="en|ga">Irish</option><option value="en|it">Italian</option><option value="en|ja">Japanese</option><option value="en|ko">Korean</option><option value="en|lv">Latvian</option><option value="en|lt">Lithuanian</option><option value="en|mk">Macedonian</option><option value="en|ms">Malay</option><option value="en|mt">Maltese</option><option value="en|no">Norwegian</option><option value="en|fa">Persian</option><option value="en|pl">Polish</option><option value="en|pt">Portuguese</option><option value="en|ro">Romanian</option><option value="en|ru">Russian</option><option value="en|sr">Serbian</option><option value="en|sk">Slovak</option><option value="en|sl">Slovenian</option><option value="en|es">Spanish</option><option value="en|sw">Swahili</option><option value="en|sv">Swedish</option><option value="en|th">Thai</option><option value="en|tr">Turkish</option><option value="en|uk">Ukrainian</option><option value="en|ur">Urdu</option><option value="en|vi">Vietnamese</option><option value="en|cy">Welsh</option><option value="en|yi">Yiddish</option></select><div id="google_translate_element2"></div>
			<script type="text/javascript">
			function googleTranslateElementInit2() {new google.translate.TranslateElement({pageLanguage: 'en',autoDisplay: false}, 'google_translate_element2');}
			</script><script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>
		</div>
	</div>
	<div class="container clearfix pt-5">
		<p class="text-center">Copyright © 2011-{{ date('Y') }} by Keylandrealty.com,  All Rights Reserved.</p>
	</div>

	<!--audio controls>
	  <source src="youtube.com/watch?v=pX7yN4rTRww" type="audio">
	</audio-->
</footer>
