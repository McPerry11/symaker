$(function() {
	// Edit these two lines according to assigned module. 
	// Check _navbar and _sidebar to know the id of the module
	$('#sb-learning-outcomes').addClass('is-active').removeAttr('href');
	$('#nb-learning-outcomes').addClass('is-active').removeAttr('href');
	let color = $('html').css('background-color');
	$('h1').css('border-bottom', '2px solid ' + color); // Adds accent to sidebar
	$('#nb-learning-outcomes').css('border-left', '3px solid ' + color); // Adds accent to the navbar menu
	$('#sb-learning-outcomes').css('background-color', color);
	$('.breadcrumb ul').append('<li><a href="localhost/symaker2/public"><span class="icon is-medium"><i class="fas fa-columns"></i></span>Dashboard</a></li><li><a>AAA 1101</a></li><li class="is-active"><a><span class="icon"><i class="fas fa-lightbulb"></i></span>Learning Outcomes</a></li>');
});