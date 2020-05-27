$(function() {
	$('#sb-dashboard').addClass('is-active');
	$('#nb-dashboard').addClass('is-active');
	// Fetches the color set in the background to match the theme color
	let color = $('html').css('background-color');
	$('#header').css('border-bottom', '2px solid ' + color);
	$('#nb-dashboard').css('border-left', '3px solid ' + color);
	// If the viewport is mobile, #filter will flex to provide better UI
	if (window.matchMedia('only screen and (max-width: 760px)').matches) $('#filter .field').removeClass('is-grouped is-grouped-right');

	// Once #btnfilter is clicked, #filter will be visible; otherwise hidden.
	$('#btnfilter').click(function() {
		$('#btnfilter svg').toggleClass('fa-chevron-down').toggleClass('fa-chevron-up');
		$('#filter').slideToggle('fast');
	});
});