$(function() {
  function ajaxError(err) {
    console.log(err);
    Swal.fire({
      icon: 'error',
      title: 'Cannot Connect to Server',
      text: 'Something went wrong. Please try again later.'
    });
  }

  function checkInputs(inputs) {
    $('#submit').removeAttr('disabled');
    for (let i in inputs) {
      if (!inputs[i]) {
        $('#submit').attr('disabled', true);
        break;
      }
    }
  }

  function pagination(current, prev, next, lastpage) {
    $('#body').append('<nav class="pagination is-right"></nav>');
    if (prev != null) $('.pagination').append('<a class="pagination-previous" data-url="' + prev + '">Previous</a>');
    if (next != null) $('.pagination').append('<a class="pagination-next" data-url="' + next + '">Next</a>');
    if (lastpage >= 3) $('.pagination').append('<form class="pagination-list"><div class="field has-addons"><div class="control"><button id="goto" class="button is-info" type="submit">Go to</button></div><div id="page" class="control"><input type="number" class="input" min="1" max="' + lastpage + '" value="' + current + '" placeholder="Page #"></div><div class="control"><a class="button is-static">/ ' + lastpage + '</a></div></div></form>');
  }

  function retrieveUsers(search) {
    $('#loading').removeClass('is-hidden');
    $('#loading').siblings().remove();
    let col = access == 'SYSTEM_ADMIN' ? 4 : 3;
    $.ajax({
      type: 'POST',
      url: 'accounts',
      data: {data:'users', search:search},
      datatype: 'JSON',
      success: function(data) {
        if (data.users.total == 0) {
          $('tbody').append(`
            <tr>
            <td colspan="${col}" class="has-text-centered">
            <span class="icon">
            <i class="fas fa-info-circle"></i>
            </span>
            <div>No accounts found</div>
            </td>
            </tr>
            `);
        } else {
          for (user in data.users.data) {
            let tag = actions = '', color;
            if (access == 'SYSTEM_ADMIN') {
              for (college in data.colleges) {
                if (data.colleges[college].id == data.users.data[user].collegeID) {
                  color = data.colleges[college].colorCode;
                  college = data.colleges[college].abbrev;
                  break;
                }
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

            if (access == 'SYSTEM_ADMIN')
              $('tbody').append(`
                <tr>
                <td><div class="tag has-text-white" style="background-color:${color}">${college}</div></td>
                <td>${tag} ${data.users.data[user].username}</td>
                <td>${data.users.data[user].lastName}, ${data.users.data[user].firstName} ${data.users.data[user].middleInitial}</td>
                <td>${actions}</td>
                </tr>
                `);
            else
              $('tbody').append(`
                <tr>
                <td>${tag} ${data.users.data[user].username}</td>
                <td>${data.users.data[user].lastName}, ${data.users.data[user].firstName} ${data.users.data[user].middleInitial}</td>
                <td>${actions}</td>
                </tr>
                `);
          }
          if (data.users.total > 20) {
            pagination(data.users.current_page, data.users.last_page_url, data.users.next_page_url, data.users.last_page);
          }
        }
        $('#results').text(data.users.total);
        $('#search').find('button').removeClass('is-loading');
        $('#loading').addClass('is-hidden');
      },
      error: function(err) {
        $('#loading').addClass('is-hidden');
        $('#search').find('button').removeClass('is-loading');
        $('tbody').append(`
          <tr>
          <td colspan="${col}" class="has-text-centered">
          <span class="icon">
          <i class="fas fa-info-circle"></i>
          </span>
          <div>Cannot retrieve accounts</div>
          </td>
          </tr>
          `);
        ajaxError(err);
      }
    });
  }

  function retrieveCollege(e, userCollege) {
    if (access == 'SYSTEM_ADMIN') {
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
          $('html').addClass('is-clipped');
        },
        error: function(err) {
          ajaxError(err);
        }
      });
    } else {
      Swal.close();
      $('#userform').addClass('is-active');
      $('html').addClass('is-clipped');
    }
  }

  $('#sb-accounts').addClass('is-active').removeAttr('href');
  $('#nb-accounts').addClass('is-active').removeAttr('href');
  let color = $('html').css('background-color');
  $('#header').css('border-bottom', '2px solid ' + color);
  $('#nb-accounts').css('border-left', '3px solid ' + color);
  $('#sb-accounts').css('background-color', color);
  $('.breadcrumb ul').append('<li class="is-active"><a><span class="icon is-medium"><i class="fas fa-users"></i></span>Accounts</a></li>');

  var modal, inputs = {'username':true, 'password':true};
  $('.pageloader .title').text('Loading Accounts');
  retrieveUsers('');
  if (window.matchMedia('only screen and (min-width: 769px) and (max-width: 1023px)').matches) $('th button').addClass('is-small');
  $(window).resize(function() {
    window.matchMedia('only screen and (min-width: 769px) and (max-width: 1023px)').matches ? $('th button').addClass('is-small') : $('th button').removeClass('is-small');
  });

  $('#add').click(function() {
    if ($('#loading').hasClass('is-hidden')) {
      $('input[type="password"]').attr('required', true);
      modal = 'add';
      Swal.fire({
        html: `<span class="icon is-large">
        <i class="fas fa-spinner fa-spin fa-lg"></i>
        </span>`,
        showConfirmButton: false,
        allowOutsideClick: false,
        allowEscapeKey: false
      });
      if ($('#type option[value=""]').length == 0)
        $('#type').prepend(`<option value="" selected disabled>Select a role</option>`);
      $('#username').removeClass('is-danger').removeClass('is-success').removeAttr('data-id');
      $('#pass-field input').removeClass('is-danger');
      $('#pass-field .help').removeClass('has-text-danger');
      $('#submit').removeAttr('disabled');
      $('#username-control .help').removeClass('has-text-danger').text('Username must be between 5 to 20 characters with at least 1 alphabetical character');
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
      $('input[type="password"]').removeAttr('required');
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
      $('#username-control .help').removeClass('has-text-danger').text('Username must be between 5 to 20 characters with at least 1 alphabetical character');
      let id = $(this).data('id');
      $('#username').attr('data-id', id);
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
          $('#type option[value="' + data.type + '"]').attr('selected', true);
          $('#type option[value=""]').remove();
          retrieveCollege('edit', data.collegeID);
        },
        error: function(err) {
          ajaxError(err);
        }
      });
    }
  });

  $('.delete').click(function() {
    if (!$('#submit').hasClass('is-loading')) {
      $('#userform').removeClass('is-active');
      $('html').removeClass('is-clipped');
    }
  });

  $('#cancel').click(function() {
    if (!$('#submit').hasClass('is-loading')) {
      $('#userform').removeClass('is-active');
      $('html').removeClass('is-clipped');
    }
  });

  $('#username').focusout(function() {
    if (!$('#submit').hasClass('is-loading')) {
      let username = $(this).val(), input = this, id = $(this).attr('data-id');
      let expr = /^(?=.{5,20})[\w\.]*[a-z0-9]+[\w\.]*$/i;
      if (expr.test(username)) {
        inputs['username'] = false;
        checkInputs(inputs);
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
              inputs['username'] = true;
              checkInputs(inputs);
            } else {
              $(input).addClass('is-danger');
              $('#username-control .help').text(response.msg).addClass('has-text-danger');
              inputs['username'] = false;
              checkInputs(inputs);
            }
          },
          error: function(err) {
            ajaxError(err);
            inputs['username'] = true;
            checkInputs(inputs);
            $('#username-control').removeClass('is-loading');
          }
        });
      } else {
        $(this).addClass('is-danger');
        $('#username-control .help').addClass('has-text-danger');
        inputs['username'] = false;
        checkInputs(inputs);
      }
    }
  });

  $('#username').keyup(function() {
    $('#submit').removeAttr('disabled');
    $(this).removeClass('is-success').removeClass('is-danger');
    $('#username-control .help').removeClass('has-text-danger').text('Username must be between 5 to 20 characters with at least 1 alphabetical character');
    inputs['username'] = true;
    checkInputs(inputs);
  });

  $('select').change(function() {
    $(this).find('option[ value=""]').remove();
  });

  $('#pass-field input').focusout(function() {
    if ($(this).val().length < 8) {
      $(this).addClass('is-danger');
      $('#pass-field').addClass('has-text-danger');
      inputs['password'] = false;
      checkInputs(inputs);
    }
  });

  $('#pass-field input').keyup(function() {
    $(this).removeClass('is-danger');
    $('#pass-field').removeClass('has-text-danger');
    inputs['password'] = true;
    checkInputs(inputs);
  });

  $('#pass-field button').click(function() {
    $('#pass-field input').attr('type', function() {
      return $(this).attr('type') == 'password' ? 'text' : 'password';
    });
    if ($('#pass-field input').attr('type') == 'password') {
      $(this).addClass('has-background-grey-lighter').removeClass('has-background-grey').removeClass('has-text-white');
      $(this).find('svg').addClass('fa-eye').removeClass('fa-eye-slash');
    } else {
      $(this).removeClass('has-background-grey-lighter').addClass('has-background-grey').addClass('has-text-white');
      $(this).find('svg').removeClass('fa-eye').addClass('fa-eye-slash');
    }
  });

  $('#userform form').submit(function(e) {
    e.preventDefault();
    if ($('#pass-field input').attr('type') != 'password') {
      $('#pass-field input').attr('type', 'password');
      $('#pass-field button').addClass('has-background-grey-lighter').removeClass('has-background-grey').removeClass('has-text-white');
      $('#pass-field button').find('svg').addClass('fa-eye').removeClass('fa-eye-slash');
    }
    let link = modal == 'add' ? 'accounts/create' : 'accounts/' + $('#username').attr('data-id') + '/update';
    var data = $(this).serialize();
    $('#submit').addClass('is-loading');
    $('#userform select').attr('disabled', true);
    $('#userform input').attr('readonly', true);
    $('#userform button').attr('disabled', true);
    $.ajax({
      type: 'POST',
      url: link,
      data: data,
      datatype: 'JSON',
      success: function(response) {
        if (response.status == 'error') {
          $('#submit').removeClass('is-loading');
          $('#userform select').removeAttr('disabled', true);
          $('#userform input').removeAttr('readonly');
          $('#userform button').removeAttr('disabled');
          Swal.fire({
            icon: 'error',
            title: 'Invalid ' + response.data,
            text: response.msg
          });
          if (response.data == 'username') {
            $('#username').addClass('is-danger');
            $('#username-control help').addClass('has-text-danger').text(response.msg);
            inputs['username'] = false;
            checkInputs(inputs);
          } else if (response.data == 'password') {
            $('#pass-field input').addClass('is-danger');
            $('#pass-field .help').addClass('has-text-danger').text(response.msg);
            inputs['password'] = false;
            checkInputs(inputs);
          }
        } else  {
          Swal.fire({
            icon: 'success',
            title: response.msg,
            showConfirmButton: false,
            timer: 2500
          }).then(function() {
            $('#userform').removeClass('is-active');
            $('html').removeClass('is-clipped');
            $('#submit').removeClass('is-loading');
            $('#userform select').removeAttr('disabled', true);
            $('#userform input').removeAttr('readonly');
            $('#userform button').removeAttr('disabled');
            retrieveUsers('');
          });
        }
      },
      error: function(err) {
        $('#submit').removeClass('is-loading');
        $('#userform select').removeAttr('disabled', true);
        $('#userform input').removeAttr('readonly');
        $('#userform button').removeAttr('disabled');
        ajaxError(err);
      }
    });
  });

  $('body').delegate('.remove', 'click', function() {
    if ($('#loading').hasClass('is-hidden')) {
      Swal.fire({
        html: `<span class="icon is-large">
        <i class="fas fa-spinner fa-spin fa-lg"></i>
        </span>`,
        showConfirmButton: false,
        allowOutsideClick: false,
        allowEscapeKey: false
      });
      let id = $(this).attr('data-id');
      $.ajax({
        type: 'POST',
        url: 'accounts/' + id,
        datatype: 'JSON',
        success: function(data) {
          Swal.fire({
            icon: 'question',
            title: 'Confirm Delete',
            html: `
            <div>Are you sure you want to delete user [${data.username}]?</div>
            <div class='help'>${data.lastName}, ${data.firstName} ${data.middleInitial}</div>
            `,
            showCancelButton: true,
            confirmButtonText: 'Confirm',
            cancelButtonText: 'Cancel'
          }).then((result) => {
            if (result.isConfirmed) {
              Swal.fire({
                html: `<span class="icon is-large">
                <i class="fas fa-spinner fa-spin fa-lg"></i>
                </span>`,
                showConfirmButton: false,
                allowOutsideClick: false,
                allowEscapeKey: false
              });
              $.ajax({
                type: 'POST',
                url: 'accounts/' + id + '/delete',
                datatype: 'JSON',
                success: function(response) {
                  Swal.fire({
                    icon: 'success',
                    title: response.msg,
                    showConfirmButton: false,
                    timer: 2500
                  }).then(function() {
                    retrieveUsers('');
                  });
                },
                error: function(err) {
                  ajaxError(err);
                }
              });
            }
          });
        },
        error: function(err) {
          ajaxError(err);
        }
      });
    }
  });

  $('#search').submit(function(e) {
    e.preventDefault();
    if ($('#loading').hasClass('is-hidden')) {
      $(this).find('button').addClass('is-loading');
      let search = $(this).find('input').val();
      retrieveUsers(search);
    }
  });
});
