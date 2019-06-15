$(function () {
	
  $('.circle_drawer_button').click(function () {
		$(this).toggleClass('active');
		$('.zdo_drawer_bg').fadeToggle();
    $('#drawer_menu').toggleClass('open');
	})
	$('.zdo_drawer_bg').click(function () {
		$(this).fadeOut();
    $('.circle_drawer_button').removeClass('active');
    $('#drawer_menu').removeClass('open');
	});
})