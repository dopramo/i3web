$(document).ready(function(){   
    
    var scroll_start = 0;
    var startchange = $('#startchange');
    var offset = startchange.offset();
    
    if (startchange.length){
        $(document).scroll(function() { 
        scroll_start = $(this).scrollTop();
        if(scroll_start > offset.top) {
              $(".navbar-default").css('background-color', '#ffffff');
           } else {
              $('.navbar-default').css('background-color', 'transparent');
           }
       });
    } 
    
});


$(document).ready(function () {
    $( window ).scroll(function() {
      $(".arrow").addClass("hide");
    });
    //smoothscroll
    $('a[href^="#"]').on('click', function (e) {
        e.preventDefault();
        $(document).off("scroll");
        
        $('a').each(function () {
            $(this).removeClass('active');
        })
        $(this).addClass('active');
      
        var target = this.hash,
            menu = target;
        $target = $(target);
        $('html, body').stop().animate({
            'scrollTop': $target.offset().top+2
        }, 500, 'swing', function () {
            window.location.hash = target;
            $(document).on("scroll", onScroll);
        });
    });
});

function onScroll(event){
    var scrollPos = $(document).scrollTop();
    $('.navbar-nav li a').each(function () {
        var currLink = $(this);
        var refElement = $(currLink.attr("href"));
        if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
            $('.navbar-navli a').removeClass("active");
            currLink.addClass("active animated ");
        }
        else{
            currLink.removeClass("active animated ");
        }
    });
}
$(function(){ 
     var navMain = $("#bs-example-navbar-collapse-1");
     navMain.on("click", "a", null, function () {
         navMain.collapse('hide');
     });
 });



$(function() {

  var $window           = $(window),
      win_height_padded = $window.height() * 1.1,
      isTouch           = Modernizr.touch;

  if (isTouch) { $('.revealOnScroll').addClass('animated'); }

  $window.on('scroll', revealOnScroll);

  function revealOnScroll() {
    var scrolled = $window.scrollTop(),
        win_height_padded = $window.height() * 1.1;

    // Showed...
    $(".revealOnScroll:not(.animated)").each(function () {
      var $this     = $(this),
          offsetTop = $this.offset().top;

      if (scrolled + win_height_padded > offsetTop) {
        if ($this.data('timeout')) {
          window.setTimeout(function(){
            $this.addClass('animated ' + $this.data('animation'));
          }, parseInt($this.data('timeout'),10));
        } else {
          $this.addClass('animated ' + $this.data('animation'));
        }
      }
    });
    // Hidden...
   $(".revealOnScroll.animated").each(function (index) {
      var $this     = $(this),
          offsetTop = $this.offset().top;
      if (scrolled + win_height_padded < offsetTop) {
        $(this).removeClass('animated fadeInUp flipInX lightSpeedIn')
      }
    });
  }

  revealOnScroll();
});

function initMap() {
  var myLatLng = {lat: 6.908735396530885, lng: 79.89634321995959};
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom:18,
    center: myLatLng
  });

  var marker = new google.maps.Marker({
    position: myLatLng,
    map: map,
    title: 'I3CUBES (PVT) LTD',
    label: 'I3CUBES (PVT) LTD'
  });
}

//autoPlayYouTubeModal();
//
//  //FUNCTION TO GET AND AUTO PLAY YOUTUBE VIDEO FROM DATATAG
//  function autoPlayYouTubeModal() {
//      var trigger = $("body").find('[data-toggle="modal"]');
//      trigger.click(function () {
//          var theModal = $(this).data("target"),
//              videoSRC = $(this).attr("data-theVideo"),
//              videoSRCauto = videoSRC + "?autoplay=1";
//          $(theModal + ' iframe').attr('src', videoSRCauto);
//          $(theModal + ' button.close').click(function () {
//              $(theModal + ' iframe').attr('src', videoSRC);
//          });
//          $('.modal').click(function () {
//              $(theModal + ' iframe').attr('src', videoSRC);
//          });
//      });
//  }

$(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox();
}); 

jQuery(function($) {
    $('.slider').sss({
        showNav : true 
    });
});

