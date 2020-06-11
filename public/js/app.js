$(function() {
	// The "click event" of the class navbar-burger will trigger the function.
	// If nabar-burger has the class 'is-active', it will remove it; otherwise, it will add it.
	$('.navbar-burger').click(function() {
		if ($(this).hasClass('is-active')) {
			$(this).removeClass('is-active');
			$('#mobile').removeClass('is-active');
		} else {
			$(this).addClass('is-active');
			$('#mobile').addClass('is-active');
		}
	});

	$('#profile a').click(function() {
		$('#profile').hasClass('is-active') ? $('#profile').removeClass('is-active') : $('#profile').addClass('is-active');
	});
});