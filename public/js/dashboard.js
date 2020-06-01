$(function() {
	$('#sb-dashboard').addClass('is-active');
	$('#nb-dashboard').addClass('is-active');
	// Fetches the color set in the background to match the theme color
	let color = $('html').css('background-color');
	$('#header').css('border-bottom', '2px solid ' + color);
	$('#nb-dashboard').css('border-left', '3px solid ' + color);

	// Since CSS cannot retrieve the theme color for the hover pseudo-class, JS will handle the hover event
	$('#tiles .box').hover(function() {
		$(this).css('border', '1px solid ' + color).css('border-left', '5px solid ' + color);
	}, function() {
		$(this).css({'border':'', 'border-left':''});
	});

	// If the viewport is mobile, #filter will flex to provide better UI
	if (window.matchMedia('only screen and (max-width: 600px)').matches) $('#filter .field').removeClass('is-grouped is-grouped-right');
	$(window).resize(function() {
		window.matchMedia('only screen and (max-width: 600px)').matches ? $('#filter .field').removeClass('is-grouped is-grouped-right') : $('#filter .field').hasClass('is-grouped is-grouped-right') ? null : $('#filter .field').addClass('is-grouped is-grouped-right');
	});

	// Once #btnfilter is clicked, #filter will be visible; otherwise hidden.
	$('#btnfilter').click(function() {
		$('#btnfilter svg').toggleClass('fa-chevron-down').toggleClass('fa-chevron-up');
		$('#filter').slideToggle('fast');
	});
});