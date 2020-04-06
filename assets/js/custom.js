jQuery(document).ready(function($){

  if($('.homepage_slider').length>0){
    $('.homepage_slider').slick({
      arrows:true,
      loop: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: true,
      prevArrow:"<div class='a-left control-c prev slick-prev'></div>",
      nextArrow:"<div class='a-right control-c next slick-next'></div>",
      responsive: [
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });
  }

  $(".other-websites").click(function(){
    $("#other-websites").modal("show");
  })

  $('a[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
      && 
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000, function() {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
          };
        });
      }
    }
  });

	if($('.publications-slider').length>0){
		 $('.publications-slider').slick({
        arrows:true,
        loop: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        dots: true,
        prevArrow:"<div class='a-left control-c prev slick-prev'></div>",
        nextArrow:"<div class='a-right control-c next slick-next'></div>",
        responsive: [
          {
            breakpoint: 992,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1,
              infinite: true,
              dots: true
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
          // You can unslick at a given breakpoint now by adding:
          // settings: "unslick"
          // instead of a settings object
        ]
      });
	}
   
	if($(".learning_and_development").length>0){
		    $(".learning_and_development").slick({
			  slidesToShow: 1,
			  slidesToScroll: 1,
			  dots: true,
			})
	}
	if($(".news-slider").length>0){
		  $(".news-slider").slick({
        arrows:true,
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: false,
        autoplay:false,
        cssEase: 'linear',
        loop:true,
        prevArrow:"<div class='a-left control-c prev slick-prev'></div>",
        nextArrow:"<div class='a-right control-c next slick-next'></div>",
        responsive: [
          {
            breakpoint: 992,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1,
              dots: true
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
          // You can unslick at a given breakpoint now by adding:
          // settings: "unslick"
          // instead of a settings object
        ]
      });
	}
  

    /*Sticky Header*/
	$(window).scroll(function($){
	  var sticky = jQuery('.header'),
	      scroll = jQuery(window).scrollTop()
	  if (scroll >= 140) sticky.addClass('fixed');
	  else sticky.removeClass('fixed');
    });

  $(".search-opener").click(function(){
    $('.header').toggleClass("search-opnened");
  })

  $("ul#primary-menu li.menu-item-has-children").click(function(){
    $(this).toggleClass("show-submenu");
  })

  $(document).on('click', '.sdpi-dropdown', function (e) {
    e.stopPropagation();
  });
  
  var src;
  $(".play-button").click(function(){
      src = $(this).attr('data-src');
      $("#video_in_modal").attr("src",src);
      $("#videoModal").modal("show");
  })
  
})