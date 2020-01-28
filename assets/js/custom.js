jQuery(document).ready(function($){
    $('.publications-slider').slick({
        arrows:true,
        infinite: true,
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
    $(".news-slider").slick({
        arrows:true,
        infinite: true,
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
              slidesToScroll: 2,
              infinite: true,
              dots: true
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
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
  
})