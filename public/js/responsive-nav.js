// const _ = require('lodash');
// window.Pusher = require('pusher-js');
// import Echo from "laravel-echo";

// const PUSHER_KEY = '227bb60553d4fa6fefbe';

// const NOTIFICATION_TYPES = {
//     follow: 'App\\Notifications\\UserFollowed',
//     newPost: 'App\\Notifications\\NewPost'
// };

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: PUSHER_KEY,
//     cluster: 'ap3',
//     encrypted: true
// });
var ww = document.body.clientWidth;

$(document).ready(function() {
	$(".nav li a").each(function() {
		if ($(this).next().length > 0) {
			$(this).addClass("parent");
		};
	})
	
	$(".toggleMenu").click(function(e) {
		e.preventDefault();
		$(this).toggleClass("active");
		$(".nav").toggle();
	});
	adjustMenu();

	$('#flash-message-btn').click(function(){
			$('#flash-message').animate({'top':'-200px'},500,function(){
					$('#flash-message').fadeOut('fast');
			});
	});

	$(".submenu-link").hover(function(){
		$("#icon").toggleClass('fa-arrow-down');
		$("#icon").toggleClass('fa-arrow-left');
	});

	$(".submenu li a").each(function() {
		$(this).hover(function() {
			$(this).find('#sub').toggleClass('deactive');
		});
	});
});

$(window).bind('resize orientationchange', function() {
	ww = document.body.clientWidth;
	adjustMenu();
});

var adjustMenu = function() {
	if (ww < 800) {
		$(".toggleMenu").css("display", "inline-block");
		if (!$(".toggleMenu").hasClass("active")) {
			$(".nav").hide();
		} else {
			$(".nav").show();
		}
		$(".nav li").unbind('mouseenter mouseleave');
		$(".nav li a.parent").unbind('click').bind('click', function(e) {
			// must be attached to anchor element to prevent bubbling
			e.preventDefault();
			$(this).parent("li").toggleClass("hover");
		});
	} 
	else if (ww >= 800) {
		$(".toggleMenu").css("display", "none");
		$(".nav").show();
		$(".nav li").removeClass("hover");
		$(".nav li a").unbind('click');
		$(".nav li").unbind('mouseenter mouseleave').bind('mouseenter mouseleave', function() {
		 	// must be attached to li so that mouseleave is not triggered when hover over submenu
		 	$(this).toggleClass('hover');
		});
	}
}
