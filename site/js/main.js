(function($) {
  "use strict"; // Start of use strict

  $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: (target.offset().top - 54)
        }, 1000, "easeInOutExpo");
        return false;
      }
    }
  });

  $(window).on("scroll", function () {
    if ($(this).scrollTop() > 100) {
      $("#show-top").addClass( "show-top" );
    }
    else {
      $("#show-top").removeClass( "show-top" );    
    }
  });

  var current_width = $(window).width();

  if(current_width > 1050){
    $(".dropdown-toggle").removeAttr('data-toggle');
  }


  // menu sticky
  $(window).on("scroll", function () {
    if(current_width > 1050){
      if ($(this).scrollTop() > 100) {
        $("header").addClass( "sticky" );
      }
      else {
        $("header").removeClass( "sticky" );     
      }
    }
    else{
      if ($(this).scrollTop() > 100) {
        $("header").addClass( "sticky-mobile" );
      }
      else {
        $("header").removeClass( "sticky-mobile" );     
      }
    }
  });

  $('ul.nav li.dropdown').hover(function() {
      $(this).addClass("open");
    }, function() {
      $(this).removeClass("open");
  });

  $(".list-toggle").click(function(event) {
    event.preventDefault();
    $(this).next("ul.inner").slideToggle();
    
  });

})(jQuery); // End of use strict
