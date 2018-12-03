
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Blog System</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Gelios Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="/css/bootstrap.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/js/jquery-1.11.1.min.js"></script>
<!-- Custom Theme files -->
<link href="/css/style.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<!----start-top-nav-script---->
		<script>
			$(function() {
				var pull 		= $('#pull');
					menu 		= $('nav ul');
					menuHeight	= menu.height();
				$(pull).on('click', function(e) {
					e.preventDefault();
					menu.slideToggle();
				});
				$(window).resize(function(){
	        		var w = $(window).width();
	        		if(w > 320 && menu.is(':hidden')) {
	        			menu.removeAttr('style');
	        		}
					});
					
			});
		</script>
		<!----//End-top-nav-script---->
<script src="/js/jquery.easydropdown.js"></script>
</head>
<body>

	@include ('layouts.nav')

<div class="services">
	<div class="container">

		@if ($flash = session('message'))
			<div id="flash-message" class="alert alert-info" role="alert">
				{{ $flash }}
				<span id="flash-message-btn" class="close"></span>
			</div>
		@endif

		@yield ('content')
		@include ('layouts.sidebar')
	</div>
</div>
	@include ('layouts.footer')
	<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
</body>
</html>	