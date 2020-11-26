$(function() {
	$('#sb-course-info').addClass('is-active').removeAttr('href');
	$('#nb-course-info').addClass('is-active').removeAttr('href');
	let color = $('html').css('background-color');
	$('h1').css('border-bottom', '2px solid ' + color); // Adds accent to sidebar
	$('#nb-course-info').css('border-left', '3px solid ' + color); // Adds accent to the navbar menu
	$('#sb-course-info').css('background-color', color);
	$('.breadcrumb ul').append('<li><a href="/symaker2/public"><span class="icon is-medium"><i class="fas fa-columns"></i></span>Dashboard</a></li><li><p class="mx-2">AAA 1101</p></li><li class="is-active"><a><span class="icon"><i class="fas fa-info"></i></span>Course Information</a></li>');
	$('.input, .textarea').val(''); //Clears all fields at the start

	$('#addPrerequisite').click(function() { //Adds field when clicking add pre-requisite btn
		if($('.select select').last().val() === null) {
			$('.select').last().addClass('is-danger');
			if(!$('.select').next('p').length) //Avoids duplication of error message every time button is clicked
				$('.select').last().after('<p class="help is-danger">This field is required.</p>');
		} else {
			$('.select').removeClass('is-danger');
			$('.select').next('.help').remove();
			$('.select').last().clone(true).insertAfter('.select:last').css('margin-top', '.25em');
			$('.select:last').find('option[value="rem"]').removeAttr('disabled');
			$('.select:last').find('option[value=""]').removeClass('is-hidden');
		}
	});

	var counter = 2;
	$('#addOutcome').click(function() { //Adds field when clicking add outcome btn
		var outcomeInput = $('.outcomeField').last().find('.input');
		if(outcomeInput.val().length === 0) {
			outcomeInput.addClass('is-danger').focus();
			if(!outcomeInput.next('p').length) //Avoids duplication of error message every time button is clicked
				outcomeInput.after('<p class="help is-danger">This field is required.</p>');
		} else {
			outcomeInput.removeClass('is-danger');
			outcomeInput.next('.help').remove();
			$('#outcomeButtonDiv').prev().clone(true).insertBefore('#outcomeButtonDiv').find('.input').val('').focus();
			$('#outcomeButtonDiv').prev().find('.button').text('CO' + counter);
			counter++;
		}
	});

	$('.control.has-icons-right').hover(function() { //Toggles the 'x' icon when hovering
		$(this).find('span.icon').toggleClass('is-hidden-desktop'); 
		if($(this).parents('.outcomeField').length) { //Removes course outcome field
			if($(this).parents('.outcomeField').siblings('.outcomeField').length === 0) {
				$(this).find('span.icon').removeClass('x-icon').addClass('x-icon-disabled').off('click'); //Disables removal of course outcome field when there is only one
			} else {
				$(this).find('span.icon').removeClass('x-icon-disabled').addClass('x-icon');
				$('span.icon').click(function() {
					let newNumber = 1;
					$(this).parents('.outcomeField').remove();
					$('.outcomeField .control .button').each(function() { //Updates the course outcome number when removing fields
						$(this).text('CO' + newNumber);
						newNumber++;
					});
					counter = newNumber;
				});
			}
		} else { //Removes pre-requisite field
			if($(this).siblings('.control.has-icons-right').length === 0) {
				$(this).find('span.icon').removeClass('x-icon').addClass('x-icon-disabled').off('click'); //Disables removal of pre-requisite field when there is only one
			} else {
				$(this).find('span.icon').removeClass('x-icon-disabled').addClass('x-icon');
				$('span.icon').click(function() {
					$(this).parent('.control.has-icons-right').remove();
				});
			}
		}
	});

	$('select').change(function() {
		$('.select').last().removeClass('is-danger');
		$('.select').siblings('.help').remove();
		$(this).find('option[value=""]').addClass('is-hidden');
		if ($(this).val() == 'rem')
			$(this).parent().remove();
	});

	$('.outcomeField').last().find('.input').keyup(function() {
		$(this).removeClass('is-danger');
		$(this).next('.help').remove();
	});
});
