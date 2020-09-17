$(function() {
	$('#sb-colleges').addClass('is-active').removeAttr('href');
	$('#nb-colleges').addClass('is-active').removeAttr('href');
	let color = $('html').css('background-color');
	$('#header').css('border-bottom', '2px solid ' + color);
	$('nb-colleges').css('border-left', '3px solid ' + color);
	$('.breadcrumb ul').append('<li class="is-active"><a><span class="icon is-medium"><i class="fas fa-chalkboard"></i></span>Colleges</a></li>')

	if (window.matchMedia('only screen and (min-width: 769px) and (max-width: 1023px)').matches) $('th button').addClass('is-small');

	$(window).resize(function() {
		window.matchMedia('only screen and (min-width: 769px) and (max-width: 1023px)').matches ? $('th button').addClass('is-small') : $('th button').removeClass('is-small');
	});
});
$(document).ready(function (){

    var addBtn = document.getElementById('addBtn');
    var addmodal = document.getElementById('addModal');
    var addCloseBtn = document.getElementById('addCloseBtn');

    addBtn.onclick = function (){
      addmodal.style.display = 'block';
    };
    addCloseBtn.onclick = function (){
      addmodal.style.display = 'none';
    };
    $('.edit').click(function (){
        editModal.style.display = 'block';
    });
    $('.delete').click(function (){
        deleteModal.style.display = 'block';
    });
    var table = $('#collegestable').DataTable();

    table.on('click','.edit', function() {

        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')) {
            $tr = $tr.prev('parent');
        }

        var data = table.row($tr).data();
        console.log(data);
        $('#abbrev').val(data[1]);
        $('#collegeName').val(data[2]);
        $('#colorCode').val(data[3]);

        $('#editForm').attr('action', '/colleges/' + data[0]);
        $('#editModal').style.display = 'block';
    });
    table.on('click','.delete', function(){

        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')){
            $tr = $tr.prev('parent');
        }

        var data = table.row($tr).data();
        console.log(data);

        $('#deleteForm').attr('action','/colleges/'+data[0]);
        $('#deleteModal').style.display='block';
    });
});
