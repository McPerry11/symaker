$(function() {
	$('#sb-course-info').addClass('is-active').removeAttr('href');
	$('#nb-course-info').addClass('is-active').removeAttr('href');
	let color = $('html').css('background-color');
	$('h1').css('border-bottom', '2px solid ' + color); // Adds accent to sidebar
	$('#nb-course-info').css('border-left', '3px solid ' + color); // Adds accent to the navbar menu
	$('.breadcrumb ul').append('<li><a href="/symaker2/public"><span class="icon is-medium"><i class="fas fa-columns"></i></span>Dashboard</a></li><li><p class="mx-2">AAA 1101</p></li><li class="is-active"><a><span class="icon"><i class="fas fa-info"></i></span>Course Information</a></li>');

	$('.input, .textarea').val(''); //Clears all fields at the start

	$('#addPrerequisite').click(function() { //Adds field when clicking add pre-requisite btn
		var $prerequisiteInput = $('#prerequisiteField').find('.input').last();

		if($prerequisiteInput.val().length === 0) { //if user did not fill-out the inputbox
			$prerequisiteInput.addClass('is-danger').focus();
			if(!$prerequisiteInput.next('p').length) { //Avoids duplication of error message every time button is clicked
				$prerequisiteInput.after('<p class="help is-danger">This field is required.</p>');
			}
		} else {
			$prerequisiteInput.removeClass('is-danger');
			$prerequisiteInput.next('.help').remove();
			$prerequisiteInput.parent().clone(true).appendTo('#prerequisiteField').find('.input').val('').focus();
			$('#prerequisiteField').children('.control').last().css('margin-top', '.25em');
		}
	});


	var $counter = 2;
	$('#addOutcome').click(function() { //Adds field when clicking add outcome btn
		var $outcomeInput = $('.outcomeField').last().find('.input');
		if($outcomeInput.val().length === 0) {
			$outcomeInput.addClass('is-danger').focus();
			if(!$outcomeInput.next('p').length) { //Avoids duplication of error message every time button is clicked
				$outcomeInput.after('<p class="help is-danger">This field is required.</p>');
			}
		} else {
			$outcomeInput.removeClass('is-danger');
			$outcomeInput.next('.help').remove();
			$('#outcomeButtonDiv').prev().clone(true).insertBefore('#outcomeButtonDiv')
			.find('.input').val('').focus();
			$('#outcomeButtonDiv').prev().find('.button').text('CO' + $counter);
			$counter++;
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
					var $newNumber = 1;
					$(this).parents('.outcomeField').remove();
					$('.outcomeField .control .button').each(function() { //Updates the course outcome number when removing fields
						$(this).text('CO' + $newNumber);
						$newNumber++;
					})
					$counter = $newNumber;
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

});