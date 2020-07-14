$(function() {
    // Edit these two lines according to assigned module.
    // Check _navbar and _sidebar to know the id of the module
    $('#sb-course-content').addClass('is-active').removeAttr('href');
    $('#nb-course-content').addClass('is-active').removeAttr('href');
    let color = $('html').css('background-color');
    $('#header').css('border-bottom', '2px solid ' + color); // Adds accent to sidebar
    $('#nb-course-content').css('border-left', '3px solid ' + color); // Adds accent to the navbar menu
    $('.breadcrumb ul').append('<li><a href="localhost/symaker2/public"><span class="icon is-medium"><i class="fas fa-columns"></i></span>Dashboard</a></li><li><a>AAA 1101</a></li><li class="is-active"><a><span class="icon"><i class="fas fa-lightbulb"></i></span>Course Content</a></li>');

    // form field ids
    let input_ids = ['weeks', 'hours', 'learning_outcomes',
        'topics', 'activities', 'assessment'];

    let $section = $('section.modal-card-body'); // form modal

    let $confirmation_text = $('.confirmation-text'); // editing confirmation modal texts

    function closeModal(modal) {modal.closest('.modal').removeClass('is-active');};

    function formIsTotallyEmpty(formID) {
        let $form = $('#'+formID);
        let formIsTotallyEmpty = true;
        $.each($form.children(), function(i, form_div) {
            val = $.trim($form.children().eq(i).find('.input, .textarea').val());
            if (val) formIsTotallyEmpty = false;
        });
        return formIsTotallyEmpty;
    };

    function cleanInputs() {
        // maybe edit this to take in form IDs
        $.each(input_ids, function(i, input_id) {
            $('#'+input_id).val('');
        });
    };

    function submitContent(content) {
        let row_template = $('#row-template').html();
        $('#row-content').append(Mustache.render(row_template, content));
    };

    // activate modals
    $('.btn-modal').on('click', function() {
        $confirmation_text.html('Cancel adding content?');
        let modal_id = $(this).attr('modal-id');
        let formID = 'course-content-form';
        if (modal_id == 'confirm' && formIsTotallyEmpty(formID)) {
            cleanInputs();
            $section.scrollTop(0);
            closeModal($(this));
        } else {
            $('#'+modal_id).addClass('is-active');
            $('#'+input_ids[0]).focus(); // default focus at weeks field
        };
    });

    // cancel adding content
    $('#confirm.modal .button').on('click', function () {
        closeModal($(this));
        if ($(this).hasClass('cancel')) {
            let $main_modal = $(this).closest('.modal').prev('.modal');
            cleanInputs();
            $section.scrollTop(0);
            closeModal($main_modal);
        };
    });

    // add content
    $('.btn-submit').on('click', function() {
        // verify form
        let complete_form = true;
        $.each(input_ids, function (i, input_id) {
            if (! $.trim($('#'+input_id).val())) {
                $confirmation_text.html('Form incomplete. Cancel adding content?');
                let modal_id = $('.btn-submit').attr('modal-id');
                $('#'+modal_id).addClass('is-active');
                complete_form = false;
            };
        });

        if (complete_form) {
            let $content = $('#row-content');
            let content = {
                "id": $content.children().length++,
                "weeks": $('#weeks').val(),
                "hours": $('#hours').val(),
                "learning_outcomes": $('#learning_outcomes').val(),
                "topics": $('#topics').val(),
                "activities": $('#activities').val(),
                "assessment": $('#assessment').val(),
            };

            submitContent(content);

            cleanInputs();
            $section.scrollTop(0);
            closeModal($(this));
        };
    });
});
