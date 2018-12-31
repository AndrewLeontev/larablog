
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
{{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content=""/>
{{-- <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script> --}}
<link rel="stylesheet" href="/css/app.css">
<link rel="stylesheet" href="/css/modal.css">
<link href="/css/bootstrap.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<!-- Custom Theme files -->
<link href="/css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="/css/component.css">
<!-- Custom Theme files -->
<link rel="stylesheet" type="text/css" href="/css/markup.css">
<link rel="stylesheet" type="text/css" href="/css/responsive.css">
{{-- <link rel="stylesheet" href="/css/animate.css"> --}}
<link rel="stylesheet" href="/css/colors.css">
<link rel="stylesheet" href="/css/404.css">
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
			window.Laravel = <?php echo json_encode([
				'csrfToken' => csrf_token(),
			]); ?>;
		</script>

		@if (!auth()->guest())
			<script>
				window.Laravel.userId = <?php echo auth()->user()->id; ?>
			</script>
		@endif
		<!----//End-top-nav-script---->
<script src="/js/jquery.easydropdown.js"></script>
</head>
<body>
	<div id="app">
	@include ('layouts.nav')
	</div>

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
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

	<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>


	<script src="http://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="http://demos.creative-tim.com/fresh-bootstrap-table/assets/js/bootstrap-table.js"></script>
	{{-- <script src="/js/jquery.custom-file-input.js"></script> --}}
	<script src="/js/custom-file-input.js"></script>
	<script  src="/js/modal.js"></script>
	<script src="/js/plugins.js"></script>
	<script src="/js/app.js"></script>
</body>
</html>	