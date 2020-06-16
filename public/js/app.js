$(window).on('load', function() {
	// Fetch color of background to match theme color.
	let color = $('html').css('background-color');
	$('.menu-list .is-active').css('background-color', color);
});

$(function() {
	// The "click event" of the class navbar-burger will trigger the function.
	// If nabar-burger has the class 'is-active', it will remove it; otherwise, it will add it.
	$('.navbar-burger').click(function() {
		$(this).toggleClass('is-active');
		$('#mobile').slideToggle('fast', function() {
			$('#mobile').toggleClass('is-active');
		});
	});

	$('#profile a').click(function() {
		$('.navbar-dropdown').slideToggle('fast', function() {
			$('#profile').toggleClass('is-active');
		});
	});
});