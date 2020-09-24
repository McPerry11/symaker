$(function() {
  function ajaxError(err) {
    console.log(err);
    Swal.fire({
      icon: 'error',
      title: 'Cannot Connect to Server',
      text: 'Something went wrong. Please try again later.'
    });
  }

  function pagination(current, prev, next, lastpage) {
    $('#body').append('<nav class="pagination is-right"></nav>');
    if (prev != null) $('.pagination').append('<a class="pagination-previous" data-url="' + prev + '">Previous</a>');
    if (next != null) $('.pagination').append('<a class="pagination-next" data-url="' + next + '">Next</a>');
    if (lastpage >= 3) $('.pagination').append('<form class="pagination-list"><div class="field has-addons"><div class="control"><button id="goto" class="button is-info" type="submit">Go to</button></div><div id="page" class="control"><input type="number" class="input" min="1" max="' + lastpage + '" value="' + current + '" placeholder="Page #"></div><div class="control"><a class="button is-static">/ ' + lastpage + '</a></div></div></form>');
  }

  function retrieveUsers() {
    $.ajax({
      type: 'POST',
      url: 'accounts',
      data: {data:'users'},
      datatype: 'JSON',
      success: function(data) {
        console.log(data);
        if (data.length == 0) {
          $('tbody').append(`
            <tr>
            <td>
            <span class="icon">
            <i class="fas fa-info-circle"></i>
            </span>
            <div>No accounts found</div>
            </td>
            </tr>
            `);
        } else {
          for (user in data.users.data) {
            let tag = actions = column = '';
            for (college in data.colleges) {
              if (data.colleges[college].id == data.users.data[user].collegeID) {
                college = data.colleges[college].abbrev;
                break;
              }
            }

            if (data.users.data[user].type == 'SYSTEM_ADMIN')
              tag = '<div class="tag is-dark">System Admin</div>';
            else if (data.users.data[user].type == 'COLLEGE_ADMIN')
              tag = '<div class="tag is-info">College Admin</div>';

            if (access == 'SYSTEM_ADMIN' || (access == 'COLLEGE_ADMIN' && data.users.data[user].type != 'SYSTEM_ADMIN')) {
              actions = `<div class="buttons is-right">
              <button class="button edit" data-id="${data.users.data[user].id}">
              <span class="icon">
              <i class="fas fa-edit"></i>
              </span>
              </button>
              <button class="button is-danger is-inverted remove" data-id="${data.users.data[user].id}">
              <span class="icon">
              <i class="fas fa-trash"></i>
              </span>
              </button>
              </div>`;
            }

            $('tbody').append(`
              <tr>
              <td>${college}</td>
              <td>${tag} ${data.users.data[user].username}</td>
              <td ${column}>${data.users.data[user].lastName}, ${data.users.data[user].firstName} ${data.users.data[user].middleInitial}</td>
              <td>${actions}</td>
              </tr>
              `);
          }
          $('#results').text(data.users.total);

          if (data.users.total > 20) {
            pagination(data.users.current_page, data.users.last_page_url, data.users.next_page_url, data.users.last_page);
          }
        }
        $('#loading').addClass('is-hidden');
      },
      error: function(err) {
        ajaxError(err);
      }
    });
  }

  $('#sb-accounts').addClass('is-active').removeAttr('href');
  $('#nb-accounts').addClass('is-active').removeAttr('href');
  let color = $('html').css('background-color');
  $('#header').css('border-bottom', '2px solid ' + color);
  $('#nb-accounts').css('border-left', '3px solid ' + color);
  $('#sb-accounts').css('background-color', color);
  $('.breadcrumb ul').append('<li class="is-active"><a><span class="icon is-medium"><i class="fas fa-users"></i></span>Accounts</a></li>');

  $('.pageloader .title').text('Loading Accounts');
  retrieveUsers();
  if (window.matchMedia('only screen and (min-width: 769px) and (max-width: 1023px)').matches) $('th button').addClass('is-small');
  $(window).resize(function() {
    window.matchMedia('only screen and (min-width: 769px) and (max-width: 1023px)').matches ? $('th button').addClass('is-small') : $('th button').removeClass('is-small');
  });

  $('#add').click(function() {
    if ($('#loading').hasClass('is-hidden')) {
      // Do stuffs
    }
  });

  $('#search').submit(function(e) {
    e.preventDefault();
    if ($('#loading').hasClass('is-hidden')) {
      // Do stuffs
    }
  });
});
// var editClose = document.getElementById('editCloseBtn');
// var editModal = document.getElementById('editModal')
// var addButton = document.getElementById('addBtn');
// var addModal = document.getElementById('addModal');
// var addClose = document.getElementById('addCloseBtn')
// var deleteModal = document.getElementById('deleteModal');
// var editClose = document.getElementById('editCloseBtn');
// var deleteCloseButton = document.getElementById('deleteCloseBtn');
// addButton.onclick = function (){
//   addModal.style.display= 'block';
// }
// addClose.onclick = function (){
//   addModal.style.display = 'none';
// }
// $('.edit').click(function (){
//   editModal.style.display = 'block';
// });
// $('.delete').click(function (){
//   deleteModal.style.display = 'block';
// });

// $(document).ready(function (){

//   var table = $('#accountstable').DataTable();

//   table.on('click','.edit', function(){

//     $tr = $(this).closest('tr');
//     if ($($tr).hasClass('child')){
//       $tr = $tr.prev('parent');
//     }

//     var data = table.row($tr).data();
//     console.log(data);
//     $('#college').val(data[1]);
//     $('#username').val(data[2]);
//     $('#lastName').val(data[3]);
//     $('#firstName').val(data[4]);
//     $('#middleInitial').val(data[5]);
//     $('#email').val(data[6]);

//     $('#editForm').attr('action','/accounts/'+data[0]);
//     $('#editModal').style.display='block';
//   });

//   table.on('click','.delete', function(){

//     $tr = $(this).closest('tr');
//     if ($($tr).hasClass('child')){
//       $tr = $tr.prev('parent');
//     }

//     var data = table.row($tr).data();
//     console.log(data);

//     $('#deleteForm').attr('action','/accounts/'+data[0]);
//     $('#deleteModal').style.display='block';
//   });
// });
