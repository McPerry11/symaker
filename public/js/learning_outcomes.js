$(function() {
	// Edit these two lines according to assigned module.
	// Check _navbar and _sidebar to know the id of the module
	$('#sb-learning-outcomes').addClass('is-active').removeAttr('href');
	$('#nb-learning-outcomes').addClass('is-active').removeAttr('href');
	let color = $('html').css('background-color');
	$('h1').css('border-bottom', '2px solid ' + color); // Adds accent to sidebar
	$('#nb-learning-outcomes').css('border-left', '3px solid ' + color); // Adds accent to the navbar menu
	$('.breadcrumb ul').append('<li><a href="localhost/symaker2/public"><span class="icon is-medium"><i class="fas fa-columns"></i></span>Dashboard</a></li><li><a>AAA 1101</a></li><li class="is-active"><a><span class="icon"><i class="fas fa-lightbulb"></i></span>Learning Outcomes</a></li>');


    let buttons = `<a class="edit-row button"><span class="icon"><i class="fas fa-edit"></i></span></a>
    <a class="delete-row button is-danger is-inverted"><span class="icon"><i class="fas fa-trash"></i></span></a>`;

    function idToClass(text) {
        // for converting table's id into the current row's appropriate class
        // e.g. id learning-outcomes > class outcome
        //      id notes > class note
        return text.split('-').reverse()[0].replace(/s/gm, '');
    }

    function removeRow(selector) {
        // where selector is any element within the desired row 
        let $table = $(selector).closest("tbody");
        let $current_row = $(selector).closest("tr");
        $current_row.remove();

        $.each($table.children(), function(i, row) {
            $(row).attr("id", i);
            $(row).find("td.id").html("LO"+(i+1));
        });
    }

    function addRow(table_id) {
        table_id = '#'+table_id;
        if ($(table_id+" input.input.new").length == 1 || $(table_id+" input").hasClass("edit-input")) {
            $(table_id+" .help").removeClass("is-hidden");
        } else {

            let $table_body = $(table_id+" tbody");
            let template = $(table_id+"-template").html();
            let content = {"id": $table_body.children().length + 1};
            $table_body.append(Mustache.render(template, content));
            $(table_id+" input.new").last().focus();
            $(table_id+" .help").addClass("is-hidden");
        }
    }


    $(".input").on("focus", function() {
        addRow($(this).attr("data-table-id"));
    });


    $("body").delegate("input.new", "change", function() {
        $(this).closest("tr").find(".submit").click();
    });

    
    $("body").delegate(".submit", "click", function() {
        let table_id = $(this).attr("data-table-id");
        let $current_row = $(this).closest("tr");

        let $input_elem = $current_row.find("input.new");
        let content = $input_elem.val();
        if (!content.trim()) {
            removeRow(this);
        } else {
            let html = "<td class='" + idToClass(table_id) + "'>";
            html += content + "</td>";

            $input_elem.closest("td").before(html); // insert html content after .id elem

            $current_row.find("td div.buttons").append(buttons);
            $input_elem.closest("td").remove();
            $(this).remove();
        }

        $('#'+table_id+" .help").addClass("is-hidden");
    });
    
    $("body").delegate(".delete-row", "click", function() { removeRow(this)})


    function switchButtons(rowSelector) {
        // from edit+delete to confirm+cancel-edits and vice versa
        let $buttons = rowSelector.find("td div.buttons");
        $buttons.children().eq(0).find(".icon svg").toggleClass("fa-edit fa-check");
        $buttons.find(".edit-row,.edit.confirm").eq(0).toggleClass("edit-row edit confirm");

        $buttons.children().eq(1).find(".icon svg").toggleClass("fa-trash fa-times");
        $buttons.find(".delete-row,.edit.cancel").eq(0).toggleClass("delete-row edit cancel");
    }

    window.editing_content = "";
    $("body").delegate(".edit-row", "click", function() {
        let $row = $(this).closest("tr");
        let row_content = $row.find(".outcome,.note").eq(0).text();
        window.editing_content = row_content;
        $row.find(".outcome,.note").eq(0).html('<input type="text" class="input edit-input" value="' + row_content + '">')
        $(".edit-input").select().focus();
        switchButtons($row);
    });

    $("body").delegate(".edit", "click", function() {
        let $row = $(this).closest("tr");
        if($(this).hasClass("confirm")) {
            let new_content = $row.find(".edit-input").val();
            $row.find(".outcome,.note").eq(0).html(new_content);
        } else {
            $row.find(".outcome,.note").eq(0).html(window.editing_content);
        }
        switchButtons($row);
    });

});

/*
- js function for converting template
- create another template at html file
- change input into data cell

*/
