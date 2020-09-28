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
            let tag = actions = '';
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
              <td>${data.users.data[user].lastName}, ${data.users.data[user].firstName} ${data.users.data[user].middleInitial}</td>
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

  function retrieveCollege(e, userCollege) {
    $('#college').empty();
    if (e == 'add') {
      $('#college').append(`
        <option value="" disabled selected>Select a college</option>
        `);
    }
    $.ajax({
      type: 'POST',
      url: 'colleges',
      data: {data:'users'},
      datatype: 'JSON',
      success: function(data) {
        for (college in data) {
          if (data[college].id == userCollege)
            selected = 'selected';
          else
            selected = '';
          $('#college').append(`
            <option value="${data[college].id}" ${selected}>${data[college].abbrev}</option>
            `);
        }
        Swal.close();
        $('#userform').addClass('is-active');
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

  var modal;
  $('.pageloader .title').text('Loading Accounts');
  retrieveUsers();
  if (window.matchMedia('only screen and (min-width: 769px) and (max-width: 1023px)').matches) $('th button').addClass('is-small');
  $(window).resize(function() {
    window.matchMedia('only screen and (min-width: 769px) and (max-width: 1023px)').matches ? $('th button').addClass('is-small') : $('th button').removeClass('is-small');
  });

  $('#add').click(function() {
    if ($('#loading').hasClass('is-hidden')) {
      modal = 'add';
      Swal.fire({
        html: `<span class="icon is-large">
        <i class="fas fa-spinner fa-spin fa-lg"></i>
        </span>`,
        showConfirmButton: false,
        allowOutsideClick: false,
        allowEscapeKey: false
      });
      $('#username').removeClass('is-danger').removeClass('is-success').removeAttr('data-id');
      $('#submit').removeAttr('disabled');
      $('.help').removeClass('has-text-danger').text('Only alphanumeric characters, underscore, and period are allowed');
      $('#userform input').val('');
      retrieveCollege('add', null);
      $('#userform .modal-card-title').text('Add Account');
      $('#pass-field').removeClass('is-hidden');
      $('#submit').empty().append(`
        <span class="icon">
        <i class="fas fa-plus"></i>
        </span>
        <span>Add</span>
        `);
    }
  });

  $('body').delegate('.edit', 'click', function() {
    if ($('#loading').hasClass('is-hidden')) {
      modal = 'edit';
      Swal.fire({
        html: `<span class="icon is-large">
        <i class="fas fa-spinner fa-spin fa-lg"></i>
        </span>`,
        showConfirmButton: false,
        allowOutsideClick: false,
        allowEscapeKey: false
      });
      $('#username').removeClass('is-danger').removeClass('is-success').removeAttr('data-id');
      $('#submit').removeAttr('disabled');
      $('.help').removeClass('has-text-danger').text('Only alphanumeric characters, underscore, and period are allowed');
      let id = $(this).data('id');
      $('#userform .modal-card-title').text('Edit Account');
      $('#pass-field').addClass('is-hidden');
      $('#submit').empty().append(`
        <span class="icon">
        <i class="fas fa-edit"></i>
        </span>
        <span>Edit</span>
        `);
      $.ajax({
        type: 'POST',
        url: 'accounts/' + id,
        datatype: 'JSON',
        success: function(data) {
          $('#firstName').val(data.firstName);
          $('#mifield input').val(data.middleInitial);
          $('#lastName').val(data.lastName);
          $('#username').val(data.username).attr('data-id', id);
          retrieveCollege('edit', data.collegeID);
        },
        error: function(err) {
          ajaxError(err);
        }
      });
    }
  });

  $('.remove').click(function() {
    if ($('#loading').hasClass('is-hidden')) {
      // Do stuffs
    }
  });

  $('.delete').click(function() {
    $('#userform').removeClass('is-active');
  });

  $('#cancel').click(function() {
    $('#userform').removeClass('is-active');
  });

  $('#username').change(function() {
    let username = $(this).val(), input = this, id = $(this).attr('data-id');
    $('#submit').attr('disabled', true);
    $('#username-control').addClass('is-loading');
    $.ajax({
      type: 'POST',
      url: 'accounts',
      data: {data:modal, username:username, id:id},
      datatype: 'JSON',
      success: function(response) {
        $('#username-control').removeClass('is-loading');
        if (response.status == 'success') {
          $(input).addClass('is-success');
          $('#submit').removeAttr('disabled');
        } else {
          $(input).addClass('is-danger');
          $('.help').text(response.msg).addClass('has-text-danger');
        }
      },
      error: function(err) {
        ajaxError(err);
        $('#submit').removeAttr('disabled');
        $('#username-control').removeClass('is-loading');
      }
    });
  });

  $('#username').keyup(function() {
    $('#submit').removeAttr('disabled');
    $(this).removeClass('is-success').removeClass('is-danger');
    $('.help').removeClass('has-text-danger').text('Only alphanumeric characters, underscore, and period are allowed');
  });

  $('#search').submit(function(e) {
    e.preventDefault();
    if ($('#loading').hasClass('is-hidden')) {
      // Do stuffs
    }
  });
});
