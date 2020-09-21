$(function() {
    // Edit these two lines according to assigned module.
    // Check _navbar and _sidebar to know the id of the module
    $('#sb-course-content').addClass('is-active').removeAttr('href');
    $('#nb-course-content').addClass('is-active').removeAttr('href');
    let color = $('html').css('background-color');
    $('#header').css('border-bottom', '2px solid ' + color); // Adds accent to sidebar
    $('#nb-course-content').css('border-left', '3px solid ' + color); // Adds accent to the navbar menu
    $('#sb-course-content').css('background-color', color);
    $('.breadcrumb ul').append('<li><a href="/symaker2/public"><span class="icon is-medium"><i class="fas fa-columns"></i></span>Dashboard</a></li><li><p class="mx-2">AAA 1101</p></li><li class="is-active"><a><span class="icon"><i class="fas fa-clipboard-list"></i></span>Course Content</a></li>');

    let content_form_id = 'course-content-form';
    let input_ids = ['weeks', 'hours', 'learning_outcomes',
    'topics', 'activities', 'assessment'];

    let $confirmation_text = $('.confirmation-text'); // for changing confirmation modal texts
    let $form_header = $('#add-content .modal-card-title'); // for changing header if adding or editing content

    function closeModal(modal) {
        let $modal = modal.closest('.modal');
        if ($modal.attr('id') == 'add-content') {
            cleanInputs(content_form_id);
            $('section.modal-card-body').scrollTop(0); // default to top
        }
        $modal.removeClass('is-active');
    };

    function deleteContent(contentID) {
        $('#content-'+contentID).remove();
        // fixing bug for duplicate content id #s
        let $next_rows = $('#row-content').children('tr').slice(content_id-1);
        $.each($next_rows, function(i, row) {
            $next_rows.eq(i).attr('id', 'content-'+(i + Number(content_id)))
        });
    }

    function formHasNoChanges(content_id, form_id) {
        let $content = $('#content-'+content_id);
        let $form = $('#'+form_id);
        let has_no_changes = true;
        $.each(input_ids, function(i, input_id) {
            if ($content.find('.'+input_id).html() != $form.find('#'+input_id).val()) {
                has_no_changes = false;
            };
        });

        return has_no_changes;
    }

    function formIsTotallyEmpty(form_id) {
        let $form = $('#'+form_id);
        let form_is_totally_empty = true;
        $.each($form.children(), function(i, form_div) {
            let val = $.trim($form.children().eq(i).find('.input, .textarea').val());
            if (val) form_is_totally_empty = false;
        });
        return form_is_totally_empty;
    };

    function formIsComplete(form_id) {
        let $form = $('#'+form_id);
        let form_is_complete = true;
        $.each($form.children(), function (i, input_id) {
            let val = $.trim($form.children().eq(i).find('.input, .textarea').val());
            if (! val) form_is_complete = false;
        });
        return form_is_complete
    };

    function cleanInputs(form_id) {
        let $form = $('#'+form_id);
        $.each($form.children(), function(i, form_div) {
            $form.children().eq(i).find('.input, .textarea').val('');
        });
    };

    function submitContent(content, is_editing=false) {
        let row_template = $('#row-template').html();
        if (is_editing) {
            let $form = $('#course-content-form');
            let $row_content = $('#content-'+content_id);
            let field_value;
            $.each(input_ids, function(i, field) {
                field_value = $form.find('#'+field).val();
                $row_content.find('.'+field).html(field_value);
            });
        } else {
            $('#row-content').append(Mustache.render(row_template, content));
        }
    };

    function exitEditMode() {
        $('#add-content.modal, #confirm.modal').removeClass('is-editing');
        $('#add-content #delete-content').hide();
        $form_header.html('Add Content');
    }

   // cancel adding content
   $('#confirm.modal .button').on('click', function () {
    closeModal($(this));
    if ($(this).hasClass('cancel')) {
            // also closes form-modal if confirmed instead of
            // just the confirm-modal
            let $form_modal = $(this).closest('.modal').prev('.modal');
            closeModal($form_modal);

            if ($('#confirm').hasClass('is-editing')) exitEditMode();
            if ($('#confirm').hasClass('is-deleting')) {
                deleteContent(content_id);
            };
        };
        $('#add-content.modal, #confirm.modal').removeClass('is-deleting');
    });

    // activate modals
    let content_id; // for use in edit mode, when submitting content
    $('body').delegate('.btn-modal', 'click', function() {
        let modal_id = $(this).attr('modal-id');

        if ($(this).attr('id') == 'delete-content') {
            $('#'+modal_id).addClass('is-active');
            $('#confirm').addClass('is-deleting');
            $confirmation_text.html('Delete current course content?');

        } else if (modal_id == 'confirm' && (formIsTotallyEmpty(content_form_id) || formHasNoChanges(content_id, content_form_id))) {
            // close empty form modal w/o prompting user
            closeModal($(this));
            if ($('#'+modal_id).hasClass('is-editing')) exitEditMode();

        } else {
            if (! $('#'+modal_id).hasClass('is-editing')) {
                $confirmation_text.html('Cancel adding content?');
            };
            $('#'+modal_id).addClass('is-active'); // activate modal (either add-modal or cancel-modal)

            if ($(this).hasClass('edit-rowcontent')) { // edit mode
                $form_header.html('Edit Content');
                let $row_content = $(this).closest('tr');
                let $form = $('#'+content_form_id);
                let field_value;
                // set field values
                content_id = $row_content.attr('id').match(/(\d+)/)[1]; // gets id #
                console.log(content_id);
                $.each(input_ids, function(i, field) {
                    field_value = $row_content.find('.'+field).html();
                    $form.find('#'+field).val(field_value);
                });

                // modal buttons change to edit mode
                $('.btn-submit').siblings('#delete-content').show();
                $('#add-content.modal, #confirm.modal').addClass('is-editing');
                $confirmation_text.html('Cancel editing content?');
            };

            $('#'+input_ids[0]).focus(); // default focus
        };
    });

    // add content
    $('.btn-submit').on('click', function() {
        let modal_id = $('.btn-submit').attr('modal-id');

        if (formIsComplete(content_form_id)) {
            let content = {
                "id": $('#row-content').children().length++,
                "weeks": $('#weeks').val(),
                "hours": $('#hours').val(),
                "learning_outcomes": $('#learning_outcomes').val(),
                "topics": $('#topics').val(),
                "activities": $('#activities').val(),
                "assessment": $('#assessment').val(),
            };

            let is_editing = $('#'+modal_id).hasClass('is-editing');
            if (is_editing) {
                content['id'] = content_id;
                submitContent(content, is_editing=true);
                exitEditMode();
            } else {
                submitContent(content);
            }

            closeModal($(this));

        } else {
            $confirmation_text.html('Form incomplete. Cancel adding content?');
            $('#'+modal_id).addClass('is-active');
        };
    });
});
