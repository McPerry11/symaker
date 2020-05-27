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