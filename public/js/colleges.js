$(function() {
	if (window.matchMedia('only screen and (max-width: 700px)').matches) {
		$('.hidden-mobile').addClass('is-hidden-mobile');
		$('#addCollege').addClass('addCollegeMobile');
	}

	$(window).resize(function() {
		if (window.matchMedia('only screen and (max-width: 700px)').matches) {
			if (!$('.hidden-mobile').hasClass('is-hidden-mobile')) $('.hidden-mobile').addClass('is-hidden-mobile');
			$('#addCollege').addClass('addCollegeMobile');
		} else {
			$('.hidden-mobile').removeClass('is-hidden-mobile');
			$('#addCollege').removeClass('addCollegeMobile');
 		}
	});

	$('td .image').hover(function() {
		$(this).css('outline', '2px solid #cfdcc8');
	}, function() {
		$(this).css('outline', '');
	});
});