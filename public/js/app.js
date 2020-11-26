$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
	}
});

$(window).on('load', function() {
	// Fetch color of background to match theme color.
	let color = $('html').css('background-color');
	$('.menu-list .is-active').css('background-color', color);
	$('.pageloader').removeClass('is-active');
});

$(function() {
	// The "click event" of the class navbar-burger will trigger the function.
	// If nabar-burger has the class 'is-active', it will remove it; otherwise, it will add it.
	$('.navbar-burger').click(function() {
		$(this).toggleClass('is-active');
		$('.navbar-mobile').slideToggle('fast', function() {
			$('.navbar-mobile').toggleClass('is-active');
		});
	});

	$('#profile .navbar-link').click(function() {
		$('.navbar-dropdown').slideToggle('fast', function() {
			$('#profile').toggleClass('is-active');
		});
	});

	$('aside .menu-list a').click(function() {
		$('.pageloader .title').text('Loading ' + $(this).text());
		$('.pageloader').addClass('is-active');
	});

	$('#logout').click(function() {
		$('.pageloader .title').text('Logging Out');
		$('.pageloader').addClass('is-active');
	});
});