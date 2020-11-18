$(function() {
  function ajaxError(err) {
    console.log(err);
    Swal.fire({
      icon: 'error',
      title: 'Cannot Connect to Server',
      text: 'Something went wrong. Please try again later.'
    });
  }

  function retrieveColleges(search) {

  }

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
    // do something
  });

  $('body').delegate('.edit', 'click', function() {
    // do something
  });

  $('body').delegate('.remove', 'click', function() {
    // do something
  });

  $('#search').submit(function(e) {
    e.preventDefault();
    // do something
  });
});
