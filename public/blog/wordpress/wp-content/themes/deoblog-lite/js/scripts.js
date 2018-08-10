(function($){
  "use strict";

  var $window = $(window);

  $window.on('load', function() {
    $window.trigger("resize");
  });

  // Init
  initMasonry();


  $window.resize(function(){
    stickyNavRemove();
  });


  /* Detect Browser Size
  -------------------------------------------------------*/
  var minWidth;
  if (Modernizr.mq('(min-width: 0px)')) {
    // Browsers that support media queries
    minWidth = function (width) {
      return Modernizr.mq('(min-width: ' + width + 'px)');
    };
  }
  else {
    // Fallback for browsers that does not support media queries
    minWidth = function (width) {
      return $window.width() >= width;
    };
  }


  /* Mobile Detect
  -------------------------------------------------------*/
  if (/Android|iPhone|iPad|iPod|BlackBerry|Windows Phone/i.test(navigator.userAgent || navigator.vendor || window.opera)) {
     $("html").addClass("mobile");
     $('.dropdown-toggle').attr('data-toggle', 'dropdown');
  }
  else {
    $("html").removeClass("mobile");
  }

  /* IE Detect
  -------------------------------------------------------*/
  if(Function('/*@cc_on return document.documentMode===10@*/')()){ $("html").addClass("ie"); }



  /* Sticky Navigation / Back to top
  -------------------------------------------------------*/
  $window.scroll(function(){

    scrollToTop();
    var $stickyNav = $('#sticky-nav');


    if ($window.scrollTop() > 190 & minWidth(992)) {
      $stickyNav.addClass('sticky');
    } else {
      $stickyNav.removeClass('sticky');
    }

    if ($window.scrollTop() > 200 & minWidth(992)) {
      $stickyNav.addClass('offset');
    } else {
      $stickyNav.removeClass('offset');
    }

    if ($window.scrollTop() > 500 & minWidth(992)) {
      $stickyNav.addClass('scrolling');
    } else {
      $stickyNav.removeClass('scrolling');
    }
    
  });


  function stickyNavRemove() {
    if (!minWidth(992)) {
      $('#sticky-nav').removeClass('sticky offset scrolling');
    }
  }


  /* Mobile Navigation
  -------------------------------------------------------*/
  var $dropdownTrigger = $('.nav-dropdown-trigger');
  $dropdownTrigger.on('click', function() {

    if ($(this).hasClass("active")) {
      $(this).removeClass("active");
    }

    else {
      $(this).addClass("active");
    }
  });

  if ( $('html').hasClass('mobile') ) {
    $('body').on('click',function() {
      $('.nav-dropdown-menu').addClass('hide-dropdown');
    });

    $('.nav-dropdown').on('click',function(e) {
      e.stopPropagation();
      $('.nav-dropdown-menu').removeClass('hide-dropdown');
    });
  }



  /* Search
  -------------------------------------------------------*/
  var $navSearchWrap = $('.nav-search-wrap');
  var $navSearchTrigger = $('#nav-search-trigger');
  var $navSearchClose = $('#nav-search-close');

  $navSearchTrigger.on('click',function(e){
    e.preventDefault();
    $navSearchWrap.animate({opacity: 'toggle'},500);
    $navSearchTrigger.add($navSearchClose).addClass("open");
    $('.nav-search-input').focus();
  });

  $navSearchClose.on('click',function(e){
    e.preventDefault();
    $navSearchWrap.animate({opacity: 'toggle'},500);
    $navSearchTrigger.add($navSearchClose).removeClass("open");
  });

  function closeSearch(){
    $navSearchWrap.fadeOut(200);
    $navSearchTrigger.add($navSearchClose).removeClass("open");
  }
    
  $(document.body).on('click',function(e) {
    closeSearch();
  });

  $("#nav-search-trigger, .nav-search-input").on('click',function(e) {
    e.stopPropagation();
  });


  /* Blog Masonry / FlexSlider
  -------------------------------------------------------*/
  function initMasonry() {
    var $grid = $('#isotope-grid').imagesLoaded( function() {
      $grid.masonry({
        itemSelector: '.masonry-item',
        layoutMode: 'masonry',
        percentPosition: true
      });
    });
  }


  $('.gallery-slider').flexslider({
    animation: "slide",
    directionNav: true,
    controlNav: true,
    touch: true,
    slideshow: false,
    prevText: ["<i class='ui-angle-left'></i>"],
    nextText: ["<i class='ui-angle-right'></i>"],
    start: function(){
      initMasonry();
    }
  });

  $('#hero-slider').flexslider({
    animation: "slide",
    controlNav: false,
    directionNav: true,
    touch: true,
    slideshow: false,
    prevText: ["<i class='ui-angle-left'></i>"],
    nextText: ["<i class='ui-angle-right'></i>"],
  });


  /* Skip Link Focus Fix
  -------------------------------------------------------*/
  var is_webkit = navigator.userAgent.toLowerCase().indexOf( 'webkit' ) > -1,
      is_opera  = navigator.userAgent.toLowerCase().indexOf( 'opera' )  > -1,
      is_ie     = navigator.userAgent.toLowerCase().indexOf( 'msie' )   > -1;

  if ( ( is_webkit || is_opera || is_ie ) && document.getElementById && window.addEventListener ) {
    window.addEventListener( 'hashchange', function() {
      var element = document.getElementById( location.hash.substring( 1 ) );

      if ( element ) {
        if ( ! /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) )
          element.tabIndex = -1;

        element.focus();
      }
    }, false );
  }



  /* Scroll to Top
  -------------------------------------------------------*/
  function scrollToTop() {
    var scroll = $window.scrollTop();
    var $backToTop = $("#back-to-top");
    if (scroll >= 50) {
      $backToTop.addClass("show");
    } else {
      $backToTop.removeClass("show");
    }
  }

  $('a[href="#top"]').on('click',function(){
    $('html, body').animate({scrollTop: 0}, 1350, "easeInOutQuint");
    return false;
  });


})(jQuery);