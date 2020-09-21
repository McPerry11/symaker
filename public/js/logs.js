$(function() {
	$('#sb-logs').addClass('is-active').removeAttr('href');
	$('#nb-logs').addClass('is-active').removeAttr('href');
	let color = $('html').css('background-color');
	$('#header').css('border-bottom', '2px solid ' + color);
	$('#nb-logs').css('border-left', '3px solid ' + color);
	$('#sb-logs').css('background-color', color);
	$('.breadcrumb ul').append('<li class="is-active"><a><span class="icon is-medium"><i class="fas fa-stream"></i></span>Logs</a></li>');
});