<!DOCTYPE html>
<html>
<head lang="{{ str_replace('_', '-', app()->getLocale()) }}">

	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-160023384-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-160023384-1');
	</script>
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

	@yield('title')
	
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,500i,600,600i,700,700i&display=swap">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dancing+Script|Supermercado+One&display=swap">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i&display=swap">
	<link rel="stylesheet" href="{{ asset('assets/css/keylandicon.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/media.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">
	
	@yield('stylesheet')

	<script>
	    window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};
	    window.Laravel.BASE_URL = {!! json_encode(url('/')) !!};

	    var token = window.Laravel.csrfToken;
	    var BASE_URL = window.Laravel.BASE_URL;
	</script>
</head>
<body>

	
	<div class="container-fluid p-0">
		@include('layouts.header')
		@yield('page')
	</div>
		
	@include('modal.login')
	@include('modal.register')
	
	<script type="text/javascript">
		/* <![CDATA[ */
		eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}',43,43,'||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'),0,{}))
		/* ]]> */
	</script>
	
	<script src="//widget.manychat.com/108740947141652.js" async="async"></script>
	<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/js/popper.min.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/js/plugin.js') }}"></script>
	<script src="{{ asset('assets/js/toastr.min.js') }}"></script>
	<script src="{{ asset('assets/js/custom.js') }}"/></script>
    <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"/></script>
    
	@yield('script')
	
    @if(session('success'))
        <script>
        	toastr.success('{{ session("success") }}', 'Success.', { 
	        	"closeButton": true, 
	        	"showDuration": "500" 
	        });
        </script>
    @elseif(session('warning'))
        <script>
        	toastr.warning('{{ session("warning") }}', 'Warning.', { 
	        	"closeButton": true, 
	        	"showDuration": "500" 
	        });
        </script>
    @elseif(session('error'))
        <script>
        	toastr.error('{{ session("error") }}', 'Error', { 
	        	"closeButton": true, 
	        	"showDuration": "500" 
	        });
        </script>
    @elseif(session('exist'))
        <script>
       		toastr.error('{{ session("exist") }}', 'Invalid Credentials', { 
	        	"closeButton": true, 
	        	"showDuration": "500" 
	        });
        </script>

    @elseif(session('mail'))
        <script>
        	toastr.success('{{ session("mail") }}', 'Mail Sent', { 
	        	"closeButton": true, 
	        	"showDuration": "500" 
	        });
	    </script>
    @endif


  
</body>
</html>