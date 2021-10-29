// function to make all carousel-items the same min-height as tallest element.
function carouselNormalization(){
  var items = $('#community-slide .carousel-item'),
    heights = [],
    tallest;

  var itemImages = $('#community-slide .carousel-item picture > img'),
    imageHeights = [],
    imageTallest;

  console.log(heights);

  if(items.length) {
    function normalizeHeights(){
      items.each(function(){
        heights.push($(this).height());
      });
      tallest = Math.max.apply(null, heights);
      items.each(function(){
        $(this).css('min-height', tallest + 'px');
      });
    }
    function setNavigationTop(){
      itemImages.each(function(){
        imageHeights.push($(this).height());
      });
      imageTallest = Math.max.apply(null, imageHeights);

      //console.log('tallest: ' + imageTallest);

      $('#community-slide .carousel-indicators').css('top', (imageTallest + 20) + 'px');
    }
    normalizeHeights();
    setNavigationTop();
       $(window).on('resize orientationchange', function(){
      tallest = 0, heights.length = 0;
      items.each(function(){
        $(this).css('min-height', '0');
      });
         imageTallest = 0, imageHeights.length = 0;
      itemImages.each(function(){
        $('#community-slide .carousel-indicators').css('top', '0');
      });
      normalizeHeights();
      setNavigationTop();
    });
  }
}

var scrollTopButton = document.getElementById('scrollTopButton');
var rootElement = document.documentElement;

function scrollToTop() {
  rootElement.scrollTo({
    top: 0,
    behavior: 'smooth'
  });
}
scrollTopButton.addEventListener('click', scrollToTop);


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
  if($(window).innerWidth() < 768){
    var tileH = $('.community-tile').innerHeight();
    $('.tile-container .tile').css('min-height', tileH + 'px');
    $(window).resize(function(){
      var tileH = $('.community-tile').innerHeight();
      $('.tile-container .tile').css('min-height', tileH + 'px');
    });
  }

  $('.contact-btn').click(function(){
    $('#contact-form').addClass('active');
    $('html body').addClass('noscroll');
  });

  $('.realtor-btn').click(function(){
    $('#realtor-form').addClass('active');
    $('html body').addClass('noscroll');
  });

  $('.close-contact-btn').click(function(){
    var target = $(this).attr('data-target');
    $(target).removeClass('active');
    $('html body').removeClass('noscroll');
  });

  $(window).scroll(function(){
    var scroll = $(window).scrollTop();
    if(scroll >= 300){
      $('.up-btn').addClass('visible');
    } else {
      $('.up-btn').removeClass('visible');
    }
  });

  //carouselNormalization();

  // Homepage Lightbox Functions
  function displayLightbox(){
    $('html body').addClass('is-active');
    $('#homepageLightbox').addClass('is-active');
  }
  function closeLightbox(){
    $('html body').removeClass('is-active');
    $('#homepageLightbox').removeClass('is-active');
  }

  if(window.location.pathname === '/'){
    setTimeout(function(){
      displayLightbox();
    }, 5000);
  }

  $('.closeLightbox').click(function(){
    closeLightbox();
  });
});
