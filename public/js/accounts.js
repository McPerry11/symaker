$(function() {
  $('#sb-accounts').addClass('is-active').removeAttr('href');
  $('#nb-accounts').addClass('is-active').removeAttr('href');
  let color = $('html').css('background-color');
  $('#header').css('border-bottom', '2px solid ' + color);
  $('#nb-accounts').css('border-left', '3px solid ' + color);
  $('.breadcrumb ul').append('<li class="is-active"><a><span class="icon is-medium"><i class="fas fa-users"></i></span>Accounts</a></li>');

  if (window.matchMedia('only screen and (max-width: 768px)').matches) $('.pagination').addClass('is-small');
  $(window).resize(function() {
    window.matchMedia('only screen and (max-width: 768px)').matches ? $('.pagination').addClass('is-small') : $('.pagination').removeClass('is-small');
  });
});
