$(document).ready(function(){

  // Scroll to Anchor
  $(document).on('click', '.jumplinks li a[href^="#"]', function(event){
    event.preventDefault();
    $('html, body').animate({
      scrollTop: $($.attr(this, 'href')).offset().top -70
    }, '1500');
  });

});
