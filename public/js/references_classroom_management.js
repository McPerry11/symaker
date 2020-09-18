$(function () {
	$('#sb-rcm').addClass('is-active').removeAttr('href');
	$('#nb-rcm').addClass('is-active').removeAttr('href');
	let color = $('html').css('background-color');
	$('h1').css('border-bottom', '2px solid ' + color); // Adds accent to sidebar
	$('#nb-rcm').css('border-left', '3px solid ' + color); // Adds accent to the navbar menu
	$('.breadcrumb ul').append('<li><a href="localhost/symaker2/public"><span class="icon is-medium"><i class="fas fa-columns"></i></span>Dashboard</a></li><li><a>AAA 1101</a></li><li class="is-active"><a><span class="icon"><i class="fas fa-info"></i></span>References & Classroom Management</a></li>');


});