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
    for (i in inputs)  {
      if (!inputs[i]) {
        $('#submit').attr('disabled', true);
        break;
      }
    }
  }

  function retrieveColleges(search) {
    $('#loading').removeClass('is-hidden');
    $('#loading').siblings().remove();
    $.ajax({
      type: 'POST',
      url: 'colleges',
      data: {data:'colleges', search:search},
      datatype: 'JSON',
      success: function(data) {
        $('#loading').addClass('is-hidden');
        $('#search button').removeClass('is-loading');
        if (data.length == 0) {
          $('tbody').append(`
            <tr>
            <td colspan="4" class="has-text-centered">
            <span class="icon">
            <i class="fas fa-info-circle"></i>
            </span>
            <span>No colleges found</span>
            </td>
            </tr>
            `);
        } else {
          $('#results').text(data.length);
          for (i in data) {
            $('tbody').append(`
              <tr>
              <td>${data[i].abbrev}</td>
              <td>${data[i].collegeName}</td>
              <td>
              <div class="tag has-text-white" style="background-color:${data[i].colorCode}">${data[i].colorCode}</div>
              </td>
              <td>
              <div class="buttons is-right">
              <button class="button edit" data-id="${data[i].id}">
              <span class="icon">
              <i class="fas fa-edit"></i>
              </span>
              </button>
              <button class="button is-danger is-inverted remove" data-id="${data[i].id}">
              <span class="icon">
              <i class="fas fa-trash"></i>
              </span>
              </button>
              </div>
              </td>
              </tr>
              `);
          }
        }
      },
      error: function(err) {
        $('#loading').addClass('is-hidden');
        $('#search button').removeClass('is-loading');
        $('tbody').append(`
          <tr>
          <td colspan="4" class="has-text-centered">
          <span class="icon">
          <i class="fas fa-info-circle"></i>
          </span>
          <span>Cannot retrieve colleges</span>
          </td>
          </tr>
          `);
        ajaxError(err);
      }
    });
  }

  var modal = '', inputs = {'abbrev':true, 'name':true, 'color':true};
  $('#sb-colleges').addClass('is-active').removeAttr('href');
  $('#nb-colleges').addClass('is-active').removeAttr('href');
  let color = $('html').css('background-color');
  $('#header').css('border-bottom', '2px solid ' + color);
  $('#nb-colleges').css('border-left', '3px solid ' + color);
  $('#sb-colleges').css('background-color', color);
  $('.breadcrumb ul').append('<li class="is-active"><a><span class="icon is-medium"><i class="fas fa-chalkboard"></i></span>Colleges</a></li>')

  if (window.matchMedia('only screen and (min-width: 769px) and (max-width: 1023px)').matches) $('th button').addClass('is-small');
  $(window).resize(function() {
    window.matchMedia('only screen and (min-width: 769px) and (max-width: 1023px)').matches ? $('th button').addClass('is-small') : $('th button').removeClass('is-small');
  });

  $('#add').click(function() {
    modal = 'add';
    $('.modal-card-title').text('Add College');
    $('#collegeForm .control').removeClass('is-loading');
    $('#collegeForm input').val('').removeAttr('readonly').removeClass('is-danger').removeClass('is-success').removeAttr('data-id');
    $('button').removeClass('is-loading').removeAttr('disabled');
    $('#submit').empty().append(`
      <span class="icon">
      <i class="fas fa-plus"></i>
      </span>
      <span>Add</span>
      `);
    $('#collegeForm').addClass('is-active');
    $('html').addClass('is-clipped');
  });

  $('body').delegate('.edit', 'click', function() {
    modal = 'edit';
    $('.modal-card-title').text('Edit College');
    $('#collegeForm .control').removeClass('is-loading');
    $('#collegeForm input').attr('data-id', $(this).attr('data-id'));
    $('input').val('').removeAttr('readonly').removeClass('is-danger').removeClass('is-success');
    $('button').removeClass('is-loading').removeAttr('disabled');
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
      url: 'colleges/' + $(this).attr('data-id'),
      datatype: 'JSON',
      success: function(data) {
        $('#abbrev').val(data.abbrev);
        $('#name').val(data.collegeName);
        $('#color').val(data.colorCode);
        Swal.close();
        $('#submit').empty().append(`
          <span class="icon">
          <i class="fas fa-edit"></i>
          </span>
          <span>Edit</span>
          `);
        $('#collegeForm').addClass('is-active');
        $('html').addClass('is-clipped');
      },
      error: function(err) {
        ajaxError(err);
      }
    });
  });

  $('.delete').click(function() {
    if (!$('#submit').hasClass('is-loading')) {
      $('#collegeForm').removeClass('is-active');
      $('html').removeClass('is-clipped');
    }
  });

  $('#cancel').click(function() {
    if (!$('#submit').hasClass('is-loading')) {
      $('#collegeForm').removeClass('is-active');
      $('html').removeClass('is-clipped');
    }
  });

  $('#collegeForm input').focusout(function() {
    if (!$('#submit').hasClass('is-loading')) {
      $(this).attr('readonly', true);
      $(this).parent().addClass('is-loading');
      inputs[$(this).attr('id')] = false;
      checkInputs(inputs);
      var elem = this, id = $(this).attr('data-id');
      $.ajax({
        type: 'POST',
        url: 'colleges',
        data: {data:$(elem).val(), field:$(elem).attr('id'), modal:modal, id:id},
        datatype: 'JSON',
        success: function(response) {
          $(elem).parent().removeClass('is-loading');
          $(elem).removeAttr('readonly');
          if (response.status == 'error') {
            $(elem).addClass('is-danger');
            $(elem).parent().next().text(response.msg);
          } else {
            $(elem).addClass('is-success').removeClass('is-danger');
            $(elem).parent().next().text('');
            inputs[$(elem).attr('id')] = true;
            checkInputs(inputs);
          }
        },
        error: function(err) {
          ajaxError(err);
          $(elem).parent().removeClass('is-loading');
          $(elem).removeAttr('readonly');
          inputs[$(elem).attr('id')] = true;
          checkInputs(inputs);
        }
      });
    }
  });

  $('#collegeForm input').keyup(function() {
    if (!$('#submit').hasClass('is-loading')) {
      $(this).removeClass('is-danger').removeClass('is-success');
      $(this).parent().next().text('');
      inputs[$(this).attr('id')] = true;
      checkInputs(inputs);
    }
  });

  $('#collegeForm form').submit(function(e) {
    e.preventDefault();
    $('#submit').addClass('is-loading');
    $('input').attr('readonly', true);
    $('#color').attr('disabled', true);
    $('button').attr('disabled', true);
    let link = modal == 'add' ? 'colleges/create' : 'colleges/' + $('#abbrev').attr('data-id') + '/update';
    let abbrev = $('#abbrev').val(), name = $('#name').val(), color = $('#color').val();
    $.ajax({
      type: 'POST',
      url: link,
      data: {abbrev:abbrev, name:name, color:color},
      datatype: 'JSON',
      success: function(response) {
        $('#submit').removeClass('is-loading');
        $('input').removeAttr('readonly', true);
        $('#color').removeAttr('disabled', true);
        $('button').removeAttr('disabled', true);
        if (response.status == 'error') {
          $('#' + response.data).addClass('is-danger');
          inputs[response.data] = false;
          checkInputs(inputs);
          Swal.fire({
            icon: 'error',
            title: 'Invalid ' + response.data,
            text: response.msg
          });
        } else {
          Swal.fire({
            icon: 'success',
            title: response.msg,
            showConfirmButton: false,
            timer: 2500
          }).then(function() {
            retrieveColleges('');
            $('#collegeForm').removeClass('is-active');
            $('html').removeClass('is-clipped');
          });
        }
      },
      error: function(err) {
        $('#submit').removeClass('is-loading');
        $('input').removeAttr('readonly', true);
        $('#color').removeAttr('disabled', true);
        $('button').removeAttr('disabled', true);
        ajaxError(err);
      }
    });
  })

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
        url: 'colleges/' + id,
        datatype: 'JSON',
        success: function(data) {
          Swal.fire({
            icon: 'question',
            title: 'Confirm Delete',
            html: `
            <div>Are you sure you want to delete college [${data.abbrev}]?</div>
            <div class='help'>${data.collegeName}</div>
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
                url: 'colleges/' + id + '/delete',
                datatype: 'JSON',
                success: function(response) {
                  Swal.fire({
                    icon: 'success',
                    title: response.msg,
                    showConfirmButton: false,
                    timer: 2500
                  }).then(function() {
                    retrieveColleges('');
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
      retrieveColleges(search);
    }
  });
});
