$(function() {
	$('#view').click(function() {
		if ($('#pass-control input').attr('type') == 'password') {
			$('#pass-control input').attr('type', 'text');
			$(this).removeClass('has-background-grey-lighter').addClass('has-background-grey').addClass('has-text-white');
			$('#view svg').removeClass('fa-eye').addClass('fa-eye-slash');
		} else {
			$('#pass-control input').attr('type', 'password');
			$(this).removeClass('has-background-grey').addClass('has-background-grey-lighter').removeClass('has-text-white');
			$('#view svg').removeClass('fa-eye-slash').addClass('fa-eye');
		}
	});

	$('form').submit(function() {
		$('#login').addClass('is-loading');
	});
});