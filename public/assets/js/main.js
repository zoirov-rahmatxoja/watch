(function ($) {
    "use strict";

      // loading
      $(window).on("load", function () {
        $("#loading").fadeOut(600);
        $('html').css('overflow-y', 'visible');
      });

      // sticky menu
      $(window).on("scroll", function() {
        var scroll = $(window).scrollTop();
          if (scroll >= 30) {
            $(".header-wrapper").addClass("sticky");
          } else {
            $(".header-wrapper").removeClass("sticky");
          }
      });
      
      // mobile menu
      $('.mobile-menu').on('click', function(){
        $('.main-menu').toggle('slow');
      });

      // one page nav
      $('.main-menu nav ul').onePageNav({
        currentClass: "active",
        scrollSpeed: 1200
      });

      //wow js active
      new WOW().init();

      //data background
      $("[data-background]").each(function(){
        $(this).css("background-image", "url(" + $(this).attr("data-background") + ")")
      });

      // popup video
      $('.v-play').magnificPopup({
        type: 'video'
      });

      // feature slider
      $(".feature-slider").owlCarousel({
        items:4,
        loop:true,
        autoplay:true,
        dots:true,
        nav:false,
        margin:30,
        responsive: {
          0: {
            items: 1,
          },
          600: {
            items: 2,
          },
          992: {
            items: 3,
          },
          1200: {
            items: 4,
          }
        }
      });

      // testimonial slider
      $(".b-testimonial").owlCarousel({
        items:2,
        loop:true,
        autoplay:false,
        dots:true,
        nav:false,
        margin:30,
        center:false,
        smartSpeed: 1500,
        animateIn: 'linear',
        animateOut: 'linear',
         responsive: {
          0: {
            items: 1,
          },
          991: {
            items: 2,
          }
        }
        
      });

      //scroll to top
      $(window).scroll(function(){
        if ($(this).scrollTop() > 600) {
          $('.scroll-to-top').fadeIn();
        }else {
          $('.scroll-to-top').fadeOut(0);
        }
      });
      $('.scroll-to-top').on('click', function(){
        $('body, html').animate({scrollTop: 0}, 2000);
        return false;
      });
      

}(jQuery)); 