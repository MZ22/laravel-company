(function($) {
  "use strict";

  /*--------------------------
  preloader
  ---------------------------- */
  $(window).on('load', function() {
    var pre_loader = $('#preloader');
    pre_loader.fadeOut('slow', function() {
      $(this).remove();
    });
  });

  /*---------------------
   TOP Menu Stick
  --------------------- */
  var s = $("#sticker");
  var pos = s.position();
  $(window).on('scroll', function() {
    var windowpos = $(window).scrollTop() > 300;
    if (windowpos > pos.top) {
      s.addClass("stick");
    } else {
      s.removeClass("stick");
    }
  });

  /*----------------------------
   Navbar nav
  ------------------------------ */
  var main_menu = $(".main-menu ul.navbar-nav li ");
  main_menu.on('click', function() {
    main_menu.removeClass("active");
    $(this).addClass("active");
  });

  /*----------------------------
   wow js active
  ------------------------------ */
  new WOW().init();

  $(".navbar-collapse a:not(.dropdown-toggle)").on('click', function() {
    $(".navbar-collapse.collapse").removeClass('in');
  });

  //---------------------------------------------
  //Nivo slider
  //---------------------------------------------
  $('#ensign-nivoslider').nivoSlider({
    effect: 'random',
    slices: 15,
    boxCols: 12,
    boxRows: 8,
    animSpeed: 500,
    pauseTime: 5000,
    startSlide: 0,
    directionNav: true,
    controlNavThumbs: false,
    pauseOnHover: true,
    manualAdvance: false,
  });

  /*----------------------------
   Scrollspy js
  ------------------------------ */
  /*var Body = $('body');
  Body.scrollspy({
    target: '.navbar-collapse',
    offset: 80
  });*/

  /*---------------------
    Venobox
  --------------------- */
  var veno_box = $('.venobox');
  veno_box.venobox();

  /*----------------------------
  Page Scroll
  ------------------------------ */
  var page_scroll = $('a.page-scroll');
  page_scroll.on('click', function(event) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: $($anchor.attr('href')).offset().top - 55
    }, 1500, 'easeInOutExpo');
    event.preventDefault();
  });

  /*--------------------------
    Back to top button
  ---------------------------- */
  $(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
      $('.back-to-top').fadeIn('slow');
    } else {
      $('.back-to-top').fadeOut('slow');
    }
  });

  $('.back-to-top').click(function(){
    $('html, body').animate({scrollTop : 0},1500, 'easeInOutExpo');
    return false;
  });

  /*----------------------------
   Parallax
  ------------------------------ */
  var well_lax = $('.wellcome-area');
  well_lax.parallax("50%", 0.4);
  var well_text = $('.wellcome-text');
  well_text.parallax("50%", 0.6);

  /*--------------------------
   collapse
  ---------------------------- */
  var panel_test = $('.panel-heading a');
  panel_test.on('click', function() {
    panel_test.removeClass('active');
    $(this).addClass('active');
  });

  /*---------------------
   Testimonial carousel
  ---------------------*/
  var test_carousel = $('.testimonial-carousel');
  test_carousel.owlCarousel({
    loop: true,
    nav: false,
    dots: true,
    autoplay: true,
    responsive: {
      0: {
        items: 1
      },
      768: {
        items: 1
      },
      1000: {
        items: 1
      }
    }
  });
  /*----------------------------
   isotope active
  ------------------------------ */
  // portfolio start
  $(window).on("load", function() {
    var $container = $('.awesome-project-content');
    $container.isotope({
      filter: '*',
      animationOptions: {
        duration: 750,
        easing: 'linear',
        queue: false
      }
    });
    var pro_menu = $('.project-menu li a');
    pro_menu.on("click", function() {
      var pro_menu_active = $('.project-menu li a.active');
      pro_menu_active.removeClass('active');
      $(this).addClass('active');
      var selector = $(this).attr('data-filter');
      $container.isotope({
        filter: selector,
        animationOptions: {
          duration: 750,
          easing: 'linear',
          queue: false
        }
      });
      return false;
    });

  });
  //portfolio end

  /*---------------------
   Circular Bars - Knob
--------------------- */
  if (typeof($.fn.knob) != 'undefined') {
    var knob_tex = $('.knob');
    knob_tex.each(function() {
      var $this = $(this),
        knobVal = $this.attr('data-rel');

      $this.knob({
        'draw': function() {
          $(this.i).val(this.cv + '%')
        }
      });

      $this.appear(function() {
        $({
          value: 0
        }).animate({
          value: knobVal
        }, {
          duration: 2000,
          easing: 'swing',
          step: function() {
            $this.val(Math.ceil(this.value)).trigger('change');
          }
        });
      }, {
        accX: 0,
        accY: -150
      });
    });
  }

/*-------------------------- add to cart ajax ----------------------*/
$(".btn.add-to-cart").click(function(event) {
  event.preventDefault();   
  console.log("click eeee ");

  $.ajax({
      type: "GET",
      url: "add-to-cart/" + $(this).attr('prod-id'),
      data: '',
      success: function(resp) {
                $('.success-msg').prepend($('<div class="alert alert-success">Product added to cart successfully!</div>'));  
              },
      error: function(resp) {
                $('.success-msg').prepend($('<div class="alert alert-danger">Product not added to cart!</div>'));  
              }
  });

});

$(".cart_quantity_up").click(function(event) {
  event.preventDefault(); 
  var $val = $(this);
  
  $.ajax({
    type: "GET",
    url: "update-cart?product_id="+$(this).attr('prod-id')+"&increment=1",
    data: '',
    success:  function(resp) {
                var $qte = parseInt($val.parents('.cart_quantity_button').find('input').val());
                var $tot = parseInt($val.parents('.cart_quantity').next('.cart_total').find('.cart_total_price').text().replace('$', ''));
                var $prodprice = parseInt($val.parents('.cart_quantity').prev('.cart_price').find('p').text().replace('$', ''));
                var $tots = parseInt($tot+$prodprice);
               
                //console.log('text '+$val.parents('.cart_quantity_button').find('.cart_total_price').text().replace('$', ''));
                //console.log('tot '+$tot+' tots '+$tots);
                $val.parents('.cart_quantity_button').find('input').val($qte+1); 
                $val.parents('.cart_quantity').next('.cart_total').find('.cart_total_price').text('$'+$tots);
              }
  });
});



$(".cart_quantity_down").click(function(event) {
  event.preventDefault(); 
  var $val = $(this); 

  $.ajax({
    type: "GET",
    url: "update-cart?product_id="+$(this).attr('prod-id')+"&decrease=1",
    data: '',
    success:  function(resp) {
                var $qte = parseInt($val.parents('.cart_quantity_button').find('input').val());
                var $tot = parseInt($val.parents('.cart_quantity').next('.cart_total').find('.cart_total_price').text().replace('$', ''));
                var $prodprice = parseInt($val.parents('.cart_quantity').prev('.cart_price').find('p').text().replace('$', ''));
                var $tots = parseInt($tot-$prodprice);

                if($val.parents('.cart_quantity_button').find('input').val()>1){
                  $val.parents('.cart_quantity_button').find('input').val($qte-1); 
                  $val.parents('.cart_quantity').next('.cart_total').find('.cart_total_price').text('$'+$tots);
                }
                
              }
  });
});



/*$('.subscriptionform button').on('click', function (event) {
  event.preventDefault(); 

  console.log('subscriptionform');
  $.ajax({
    headers: {
    'X-CSRF-TOKEN': $('input[name="_token"]').val()
    },
    type: "POST",
    url: "/savecustomer",
    data: $('.subscriptionform').serialize()
    success:  function(resp) {
                location.href = "/orderconfirm/"+$val; 
              }
    
  });
});*/

$('.carrierform button').on('click', function (event) {
  event.preventDefault();  
  var $val = $(this); 
 console.log('carrierform'); 
  $.ajax({
    headers: {
    'X-CSRF-TOKEN': $('input[name="carrier_token"]').val()
    },
    type: "POST",
    url: "/savecarrier",
    data: $('.carrierform').serialize(),
    success:  function(resp) {
                $('.carrierform').prepend($('<div class="alert alert-success">Carrier saved!</div>')); 
              }
    
  });
});

$('.payform button').on('click', function (event) {
  event.preventDefault(); 
   
 console.log('payform');
  $.ajax({
    headers: {
    'X-CSRF-TOKEN': $('input[name="pay_token"]').val()
    },
    type: "POST",
    url: "/savepayment",
    data: $('.payform').serialize(),
    success:  function(resp) {
                $('.payform').prepend($('<div class="alert alert-success">Payment saved!</div>')); 
              }
    
  });
});

$('.saveorder').on('click', function (event) {
  event.preventDefault(); 
 
  console.log('orderform');
  var $val = $('#cartid').val();

  $.ajax({
    type: "GET",
    url: "/saveorder/"+$('#cartid').val(),
    data:'',
    success:  function(resp) {
                location.href = "/orderconfirm/"+$val; 
              }
    
  });
});


$(".cart_quantity_delete").click(function(event) {
  event.preventDefault(); 
  var $val = $(this); 

  $.ajax({
    type: "GET",
    url: "update-cart?product_id="+$(this).attr('prod-id')+"&delete=1",
    data: '',
    success:  function(resp) {
                $val.parents('tr').remove();
                $('.success-msg').prepend($('<div class="alert alert-success">Product deleted from cart successfully!</div>'));
              }
  });
});




})(jQuery);
