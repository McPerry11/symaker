$(function() {
  $('#sb-accounts').addClass('is-active').removeAttr('href');
  $('#nb-accounts').addClass('is-active').removeAttr('href');
  let color = $('html').css('background-color');
  $('#header').css('border-bottom', '2px solid ' + color);
  $('#nb-accounts').css('border-left', '3px solid ' + color);
  $('.breadcrumb ul').append('<li class="is-active"><a><span class="icon is-medium"><i class="fas fa-users"></i></span>Accounts</a></li>');

  if (window.matchMedia('only screen and (min-width: 769px) and (max-width: 1023px)').matches) $('th button').addClass('is-small');
  $(window).resize(function() {
    window.matchMedia('only screen and (min-width: 769px) and (max-width: 1023px)').matches ? $('th button').addClass('is-small') : $('th button').removeClass('is-small');
  });
});
var editClose = document.getElementById('editCloseBtn');
var editModal = document.getElementById('editModal')
var addButton = document.getElementById('addBtn');
var addModal = document.getElementById('addModal');
var addClose = document.getElementById('addCloseBtn')
var deleteModal = document.getElementById('deleteModal');
var editClose = document.getElementById('editCloseBtn');
var deleteCloseButton = document.getElementById('deleteCloseBtn');
addButton.onclick = function (){
    addModal.style.display= 'block';
}
addClose.onclick = function (){
    addModal.style.display = 'none';
}
$('.edit').click(function (){
    editModal.style.display = 'block';
});
$('.delete').click(function (){
    deleteModal.style.display = 'block';
});

$(document).ready(function (){

    var table = $('#accountstable').DataTable();

    table.on('click','.edit', function(){

        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')){
            $tr = $tr.prev('parent');
        }

        var data = table.row($tr).data();
        console.log(data);
        $('#college').val(data[1]);
        $('#username').val(data[2]);
        $('#lastName').val(data[3]);
        $('#firstName').val(data[4]);
        $('#middleInitial').val(data[5]);
        $('#email').val(data[6]);

        $('#editForm').attr('action','/accounts/'+data[0]);
        $('#editModal').style.display='block';
    });

    table.on('click','.delete', function(){

        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')){
            $tr = $tr.prev('parent');
        }

        var data = table.row($tr).data();
        console.log(data);

        $('#deleteForm').attr('action','/accounts/'+data[0]);
        $('#deleteModal').style.display='block';
    });
});



