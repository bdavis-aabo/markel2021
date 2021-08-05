$(document).ready(function(){

  // Scroll to Anchor
  $(document).on('click', '.jumplinks li a[href^="#"]', function(event){
    event.preventDefault();
    $('html, body').animate({
      scrollTop: $($.attr(this, 'href')).offset().top -70
    }, '1500');
  });

  $('.hamburger').click(function(){
    $('.hamburger').toggleClass('is-active');
  });

  // set Tile Height min-height so all columns are same height
  var tileH = $('.community-tile').innerHeight();
  $('.tile-container .tile').css('min-height', tileH + 'px');
  $(window).resize(function(){
    var tileH = $('.community-tile').innerHeight();
    $('.tile-container .tile').css('min-height', tileH + 'px');
  })

});
