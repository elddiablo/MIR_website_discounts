
var isLoadingScreenSeen;
function loadingScreen() {

  var delayingTime = Math.floor((Math.random() + 0.2) * 1000);
  // alert(delayingTime);

   if(!isLoadingScreenSeen) {
    $("#loading").fadeIn();
    isLoadingScreenSeen = true;
   }

    setTimeout(function() {
      $("#loading").fadeOut();
      isLoadingScreenSeen = false;
    }, delayingTime);
}

// window.on('load', function() {
//   loadingScreen();
//   /* Act on the event */
// });

(function($){
    "use strict"
    var Ciblog = {};

    /*--------------------
      * Pre Load
    ----------------------*/
    Ciblog.WebLoad = function(){
       loadingScreen();
      
    }

    /*--------------------
        * Header Class
    ----------------------*/
    Ciblog.HeaderSticky = function(){
        $(".navbar-toggler").on("click", function(a) {
            a.preventDefault(), $(".navbar").addClass("fixed-header")
        });
    }

    /*--------------------
        * Menu Close
    ----------------------*/
    Ciblog.MenuClose = function(){
      $('.navbar-nav .nav-link').on('click', function() {
       var toggle = $('.navbar-toggler').is(':visible');
       if (toggle) {
         $('.navbar-collapse').collapse('hide');
       }
      });
    }

    /*--------------------
        * Smooth Scroll
    ----------------------*/
    Ciblog.HeaderScroll = function(){
        $('a[href*="#"]:not([href="#"])').on('click', function() {
            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') || location.hostname == this.hostname) {
              var target = $(this.hash);
                  target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                  if (target.length) {
                    $('html,body').animate({
                      scrollTop: target.offset().top - 65,
                      }, 1000);
                      return false;
                  }
            }
        });
    }

    /*--------------------
        * Header Fixed
    ----------------------*/
    Ciblog.HeaderFixed = function(){
        if ($(window).scrollTop() >= 60) {
           $('.navbar').addClass('fixed-header');
        }
        else {
           $('.navbar').removeClass('fixed-header');
        }
    }    

    /*--------------------
        * Progress Bar 
    ----------------------*/
    Ciblog.ProgressBar = function(){
        $(".progress .progress-bar").each(function () {
          var bottom_object = $(this).offset().top + $(this).outerHeight();
          var bottom_window = $(window).scrollTop() + $(window).height();
          var progressWidth = $(this).attr('aria-valuenow') + '%';
          if(bottom_window > bottom_object) {
            $(this).css({
              width : progressWidth
            });
          }
        });
    }

    /*--------------------
    * Counter JS
    ----------------------*/
    var a = 0;
    Ciblog.Counter = function(){
      var oTop = $('.counter-box').offset().top - window.innerHeight;
        if (a == 0 && $(window).scrollTop() > oTop) {
          $('.count').each(function () {
                $(this).prop('Counter',0).animate({
                    Counter: $(this).text()
                }, {
                    duration: 4000,
                    easing: 'swing',
                    step: function (now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            });
          a = 1;
        }
    }

    /*--------------------
    * Isotope
    ----------------------*/
    Ciblog.MasoNry = function () {
      var portfolioWork = $('.portfolio-content');
        $(portfolioWork).isotope({
            resizable: false,
            itemSelector: '.portfolio-item',
            layoutMode: 'masonry',
            filter: '*'
          });
          //Filtering items on portfolio.html
          var portfolioFilter = $('.filter li');
          // filter items on button click
          $(portfolioFilter).on( 'click', function() {
            var filterValue = $(this).attr('data-filter');
            portfolioWork.isotope({ filter: filterValue });
          });
          //Add/remove class on filter list
          $(portfolioFilter).on( 'click', function() {
            $(this).addClass('active').siblings().removeClass('active');
          });
    }

    /*--------------------
    * owl Slider
    ----------------------*/
    Ciblog.BlogSlider = function(){
      var testimonials_slider = $('#blog-slider-single');
        testimonials_slider.owlCarousel({
            loop: true,
            margin: 30,
            nav:false,
            responsive: {
              0: {
                items: 1
              },
              768: {
                items: 2
              },
              991: {
                items: 3
              },
              1140: {
                items: 3
              }
            }
        });
    }

    Ciblog.ClientSlider = function(){
      var testimonials_slider = $('#client-slider-single');
        testimonials_slider.owlCarousel({
            loop: true,
            margin: 0,
            nav:false,
            items:1
        });
    }


    Ciblog.PopupVideo = function(){
      $('.popup-video').magnificPopup({
              disableOn: 700,
              type: 'iframe',
              mainClass: 'mfp-fade',
              removalDelay: 160,
              preloader: false,
              fixedContentPos: false
        });
    }

    Ciblog.LightboxGallery = function(){
      $('.portfolio-content').magnificPopup({
          delegate: '.lightbox-gallery',
          type: 'image',
          tLoading: '#%curr%',
          mainClass: 'mfp-fade',
          fixedContentPos: true,
          closeBtnInside: true,
          gallery: {
              enabled: true,
              navigateByImgClick: true,
              preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
          }
      });
    }

    
    // Window on Load
    $(window).on("load", function(){
      Ciblog.WebLoad();
    });

    $(document).on("ready", function(){
        Ciblog.MasoNry(),
        Ciblog.ClientSlider(),
        Ciblog.MenuClose(),
        Ciblog.BlogSlider(),
        Ciblog.Counter(),
        Ciblog.ProgressBar(),
        Ciblog.HeaderScroll(),
        Ciblog.PopupVideo(),
        Ciblog.LightboxGallery(),
        Ciblog.HeaderSticky();
    });

    $(window).on("scroll", function(){
        Ciblog.Counter(),
        Ciblog.ProgressBar(),
        Ciblog.HeaderFixed();
    });

})(jQuery);







$('.owl-carousel').owlCarousel({
    loop:true,
    margin:20,
    responsiveClass:true,
    items:1
});