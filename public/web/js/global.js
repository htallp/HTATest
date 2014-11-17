//<![CDATA[
$(function() {

	//Controls the Core Value cicles and corresponding overlays.
	$("section#home div.core-values li").click(function() {
		$("div#values").fadeIn("fast");
		$("div#values div#lightbox-" + $(this).attr('id')).show();

		var imgw = '-' + ($("div#values div#lightbox-" + $(this).attr('id') + " img").width() / 2) + 'px';
		var imgh = '-' + ($("div#values div#lightbox-" + $(this).attr('id') + " img").height() / 2) + 'px';

		$('div#values div.value').css('margin-left', imgw);
		$('div#values div.value').css('margin-top', imgh);
	});

	//Listens for the click event to fadeout the core values
	$("div#values").click(function() {
		$("div#values").fadeOut("fast");
		$("div#values div.value").hide();
	});

	//Sets diagonal containers based on the window width
	$('.team-top,.team-bottom,.contact-top,.partnership-top').css('border-right', $(window).width() + 'px solid transparent');
	$('.us-top,.us-bottom,.projects-top').css('border-left', $(window).width() + 'px solid transparent');

	//Adjusts diagonal containers when window is resized
	$(window).resize(function() {
		$('.team-top,.team-bottom,.contact-top,.partnership-top').css('border-right', $(window).width() + 'px solid transparent');
		$('.us-top,.us-bottom,.projects-top').css('border-left', $(window).width() + 'px solid transparent');

		var imgw = '-' + ($("div#values div.value img").width() / 2) + 'px';
		var imgh = '-' + ($("div#values div.value img").height() / 2) + 'px';

		$('div#values div.value').css('margin-left', imgw);
		$('div#values div.value').css('margin-top', imgh);
	});

	//Closes mobile menu when section is selected
	function collapse() {$('.navbar-collapse.collapse').removeClass("in");}

	//Smooth scrolling
	$('a[href*=#]:not([href=#])').click(function() {
		if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
			if ($(this).attr('href') === '#home') {
				collapse();
				$('html,body').animate({
					scrollTop: 0
				}, 500);
				return false;
			} else {
				if ($(window).width() > 321) {
					collapse();
					$('html,body').animate({
						scrollTop: target.offset().top
					}, 500);
					return false;
				} else {
					collapse();
					$('html,body').animate({
						scrollTop: target.offset().top - $('header .navbar-inverse').outerHeight()
					}, 500);
					return false;
				}

			}
		}
	});

	//Carousel initiate
	$('#teamCarousel,#projectsCarousel').carousel({interval: false});

	//Listens for the click event of the team section
	$("div#teamCarousel ul li").click(function() {
		$("div#teamMoreInfo").addClass("open");
		$("div#teamMoreInfo ul li").hide();
		var member = $(this).attr("id");
		$("li#mi-" + $(this).attr("id")).slideDown("slow");
		$("li#mi-" + $(this).attr("id")).css('opacity', 0).slideDown('slow').animate({opacity: 1}, {queue: false, duration: 'slow'});
		$("section#team div#teamCarousel ul li img").css('opacity', 1).animate({opacity: 0.2}, {queue: false, duration: 'slow'});
	});

	//If statement to determine the fadeIn of team thumbnails
	if ($("div#teamMoreInfo").hasClass("open")) {
		.mouseenter(function() {$("li#" + $(this).attr("id") + " img").fadeTo("fast", 0.2);});
		.mouseleave(function() {$("li#" + $(this).attr("id") + " img").fadeTo("fast", 1);});
	} else {
		.mouseenter(function() {$("li#" + $(this).attr("id") + " img").fadeTo("fast", 1);});
		.mouseleave(function() {$("li#" + $(this).attr("id") + " img").fadeTo("fast", 0.2);});
	}

});

//Two functions for the next and prev buttons
function prevClick(id) {$(id).carousel('prev');}
function nextClick(id) {$(id).carousel('next');return false;}

//Detects whether device is above 320 pixels in width
/*if ($(window).width() > 320) {
 //If the window goes past 100 pixels it will apply a new class to the header
 $(window).scroll(function() {if ($(window).scrollTop() > 100) {$("header").addClass('fixed');}else {$("header").removeClass('fixed');}});
 }*/

//]]>