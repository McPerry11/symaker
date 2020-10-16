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
    let input_ids = ['week1', 'week2', 'hours', 'learning_outcomes',
    'topics', 'activities', 'assessment'];

    let $confirmation_text = $('.confirmation-text'); // for changing confirmation modal texts
    let $form_header = $('#add-content .modal-card-title'); // for changing header if adding or editing content

    // hours autocomplete && validation
    $("#week1,#week2").change(function() {
        let week1 = $("#week1").val();
        let week2 = $("#week2").val();
        let help;
        if (week1 && week2) {
            if (parseInt(week2) > parseInt(week1)) {
                $("#hours").val(3 * (week2 - week1));
                $("#weeks-help").addClass("is-hidden");
                $("#form-help").addClass("is-hidden");
            } else {
                $("#weeks-help").html("Please make sure the initial week is smaller than the final week.").removeClass("is-hidden");
            }
        }
    });

    function closeModal(modal) {
        let $modal = modal.closest('.modal');
        if ($modal.attr('id') == 'add-content') {
            cleanInputs(content_form_id);
            $('section.modal-card-body').scrollTop(0); // default to top
            $("#form-help").addClass("is-hidden");
        }
        $modal.removeClass('is-active');
    };

    function deleteRow(contentID) {
        $('#content-'+contentID).remove();
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
            let $input_elem = $form.find('#'+input_id);
            if ($input_elem.hasClass("input")) {
                if ($form.find('#'+input_id).val() != $content.find('.'+input_id).html()) {
                    has_no_changes = false;
                };
            } else if ($input_elem.hasClass("checkbox-input")) {
                let indices = "";
                $.each($('#'+input_id+' input[name^="lo-"]:checked'), function(i, child){
                    indices += $(this).parent().index();
                })
                if (indices != $('.'+input_id).attr('data-indices')) {
                    has_no_changes = false;
                };
            } else if ($input_elem.hasClass("editor-input")) {
                if ($('#'+input_id+' .ck-content').text() != $('.'+input_id).text()) {
                    has_no_changes = false;
                };
            }
        });

        return has_no_changes;
    }

    function formIsTotallyEmpty(form_id) {
        let $form = $('#'+form_id);
        let form_is_totally_empty = true;
        $.each(input_ids, function(i, input_id) {
            let $input_elem = $form.find('#'+input_id);
            let val = true;
            if ($input_elem.hasClass("input")) {
                val = $.trim($input_elem.val());
            } else if ($input_elem.hasClass("checkbox-input")) {
                val = $('input[name^="lo-"]:checked').length;
            } else if ($input_elem.hasClass("editor-input")) {
                val = $($input_elem.find('.ck-content')).text();
            }
            if (val) form_is_totally_empty = false;
        });
        return form_is_totally_empty;
    };

    function formIsComplete(form_id) {
        let $form = $('#'+form_id);
        let form_is_complete = true;
        $.each(input_ids, function (i, input_id) {
            let $input_elem = $form.find('#'+input_id);
            let val = true;
            if ($input_elem.hasClass("input")) {
                val = $.trim($input_elem.val());
            } else if ($input_elem.hasClass("checkbox-input")) {
                val = $('input[name^="lo-"]:checked').length;
            } else if ($input_elem.hasClass("editor-input")) {
                val = $input_elem.find('.ck-content').text();
            }
            if (! val) form_is_complete = false;
        });
        return form_is_complete
    };

    function cleanInputs(form_id) {
        let $form = $('#'+form_id);
        $.each(input_ids, function(i, input_id) {
            let $input_elem = $form.find('#'+input_id);
            if ($input_elem.hasClass("input")) {
                $input_elem.val('');
            } else if ($input_elem.hasClass("checkbox-input")) {
                $('input[name^="lo-"]').prop('checked', false);
            } else if ($input_elem.hasClass("editor-input")) {
                window.topicsEditor.setData('');
                window.activitiesEditor.setData('');
                window.assessmentEditor.setData('');
                return false;
            }
        });
    };

    function submitContent(content, is_editing=false) {
        let row_template = $('#row-template').html();
        let $form = $('#course-content-form');
        if (is_editing) {
            let $row_content = $('#content-'+content_id);
            let field_value;

            $.each(input_ids, function(i, input_id) {
                let $input_elem = $form.find('#'+input_id);
                if ($input_elem.hasClass("checkbox-input")) {
                    let $content_field = $row_content.find('.'+input_id); 

                    let learning_outcomes = '<ul>'
                    let outcome_indices = '';
                    $.each($('input[name^="lo-"]:checked'), function(i, child){
                        learning_outcomes += '<li>' + $(this).parent().text()
                        outcome_indices += ($(this).parent().index());
                    });
                    $('.'+input_id).attr('data-indices', outcome_indices)
                    learning_outcomes += '</ul>'
                    
                    let html = $.parseHTML(learning_outcomes);

                    $content_field.html('');
                    $content_field.append(html);

                } else if ($input_elem.hasClass("editor-input")) {
                    let html = $.parseHTML(content[input_id]);

                    $row_content.find('.'+input_id).html('');
                    $row_content.find('.'+input_id).append(html);

                } else { // normal input
                    field_value = $form.find('#'+input_id).val();
                    $row_content.find('.'+input_id).html(field_value);
                }
            });

        } else {
            $('#row-content').append(Mustache.render(row_template, content));

            // output for unique content (checkbox & ckeditor)
            $.each(input_ids, function(i, input_id) {
                let $input_elem = $form.find('#'+input_id);
                if ($input_elem.hasClass("checkbox-input")) {
                    let $content_field = $('#content-'+content['id']).find('.'+input_id); 

                    let learning_outcomes = '<ul>'
                    let outcome_indices = '';
                    $.each($('input[name^="lo-"]:checked'), function(i, child){
                        learning_outcomes += '<li>' + $(this).parent().text() + '</li>'
                        outcome_indices += ($(this).parent().index());
                    });
                    $('.'+input_id).attr('data-indices', outcome_indices)
                    learning_outcomes += '<ul>'
                    
                    $content_field.html($.parseHTML(learning_outcomes));

                } else if ($input_elem.hasClass("editor-input")) {
                    let $content_field = $('#content-'+content['id']).find('.'+input_id); 
                    let html = $.parseHTML(content[input_id]);

                    $content_field.html('');
                    $content_field.append(html);
                }
            });
        }
        $('ul, ol').css('margin-top', 0);
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
            $('#weeks-help').addClass('is-hidden');

            if ($('#confirm').hasClass('is-editing')) exitEditMode();
            if ($('#confirm').hasClass('is-deleting')) {
                deleteRow(content_id);
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

        } else if (modal_id == 'confirm' && ( formIsTotallyEmpty(content_form_id) 
            || ($('#add-content.modal').hasClass('is-editing') && formHasNoChanges(content_id, content_form_id) ) )) {
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
                $.each(input_ids, function(i, input_id) {
                    field_value = $row_content.find('.'+input_id).html();

                    let $input_elem = $form.find('#'+input_id);
                    if ($input_elem.hasClass("input")) {
                        $form.find('#'+input_id).val(field_value);
                    } else if ($input_elem.hasClass("checkbox-input")) {
                        // get indices of checked outcomes
                        let outcome_indices = $row_content.find('.'+input_id).attr('data-indices');
                        for (let i = 0; i < outcome_indices.length; i++) {
                            $('#learning_outcomes').children().eq(parseInt(outcome_indices[i])).find('input').prop('checked', true);
                        };
                    } else if ($input_elem.hasClass("editor-input")) {
                        if (input_id == 'topics') {
                            window.topicsEditor.setData(field_value);
                        } else if (input_id == 'activities') {
                            window.activitiesEditor.setData(field_value);
                        } else if (input_id == 'assessment') {
                            window.assessmentEditor.setData(field_value);
                        }
                    }
                });

                // modal buttons change to edit mode
                $('.btn-submit').text("Save");
                $('.btn-submit').siblings('#delete-content').show();
                $('#add-content.modal, #confirm.modal').addClass('is-editing');
                $confirmation_text.html('Cancel editing content?');

            } else if (modal_id == "add-content") { // for adding content
                $('.btn-submit').text("Add");
            };

            $('#'+input_ids[0]).focus(); // default focus
        };
    });

    // add content
    $('.btn-submit').on('click', function() {
        let modal_id = $('.btn-submit').attr('modal-id');

        if (! $('#weeks-help').hasClass('is-hidden')) {
            $('#form-help').text("Some of your input seems to be invalid.");
            $('#form-help').removeClass('is-hidden');
            $('#course-content-form #form-help').get(0).scrollIntoView();
        } else if (formIsComplete(content_form_id)) {
            let content = {
                "id": $('#row-content').children().length++,
                "week1": $('#week1').val(),
                "week2": $('#week2').val(),
                "hours": $('#hours').val(),
                "learning_outcomes": $('#learning_outcomes').text(),
                "topics": window.topicsEditor.getData(),
                "activities": window.activitiesEditor.getData(),
                "assessment": window.assessmentEditor.getData(),
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


    // learning outcomes form
    $.ajax({
        type: 'POST',
        url: 'course_content',
        data: {data: 'learning_outcome'},
        datatype: 'JSON',
        success: function(data) {
            let chkbox_template = $('#learning-outcomes-template').html();
            let form = "";

            $.each(data.learning_outcome, function(i, outcome) {
                form += Mustache.render(chkbox_template, outcome);
            });
            $("#learning_outcomes").html(form)

        },
        error: function(err) {
            alert("Error loading learning outcomes");
        }
    });
});
