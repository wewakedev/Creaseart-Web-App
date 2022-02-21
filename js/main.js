
/////////////////////Water JS ////////////////

particlesJS('par-js',
  
  {
    "particles": {
      "number": {
        "value": 80,
        "density": {
          "enable": true,
          "value_area": 800
        }
      },
      "color": {
        "value": "#ffffff"
      },
      "shape": {
        "type": "circle",
        "stroke": {
          "width": 0,
          "color": "#000000"
        },
        "polygon": {
          "nb_sides": 5
        },
        "image": {
          "src": "img/github.svg",
          "width": 100,
          "height": 100
        }
      },
      "opacity": {
        "value": 0.5,
        "random": false,
        "anim": {
          "enable": false,
          "speed": 1,
          "opacity_min": 0.1,
          "sync": false
        }
      },
      "size": {
        "value": 30,
        "random": true,
        "anim": {
          "enable": false,
          "speed": 40,
          "size_min": 0.1,
          "sync": false
        }
      },
      "line_linked": {
        "enable": false,
        "distance": 150,
        "color": "#ffffff",
        "opacity": 0.4,
        "width": 1
      },
      "move": {
        "enable": true,
        "speed": 5,
        "direction": "top",
        "random": false,
        "straight": false,
        "out_mode": "out",
        "attract": {
          "enable": false,
          "rotateX": 600,
          "rotateY": 1200
        }
      }
    },
    "interactivity": {
      "detect_on": "canvas",
      "events": {
        "onhover": {
          "enable": false,
          "mode": "repulse"
        },
        "onclick": {
          "enable": false,
          "mode": "push"
        },
        "resize": true
      },
      "modes": {
        "grab": {
          "distance": 400,
          "line_linked": {
            "opacity": 1
          }
        },
        "bubble": {
          "distance": 400,
          "size": 40,
          "duration": 2,
          "opacity": 8,
          "speed": 3
        },
        "repulse": {
          "distance": 200
        },
        "push": {
          "particles_nb": 4
        },
        "remove": {
          "particles_nb": 2
        }
      }
    },
    "retina_detect": true,
    "config_demo": {
      "hide_card": false,
      "background_color": "#b61924",
      "background_image": "",
      "background_position": "50% 50%",
      "background_repeat": "no-repeat",
      "background_size": "cover"
    }
  }

);
      
//////////////Incremnet button////////





/////////////ADDONS SLIDER ////////////////


$(document).ready(function(){
  $('.carousel').slick({
    speed: 500,
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    dots:true,
    centerMode: true,
    responsive: [{
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        // centerMode: true,

      }

    }, {
      breakpoint: 800,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
        dots: true,
        infinite: true,

      }
    },  {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 2000,
      }
    }]
  });
});



$(document).ready(function() {

  $(".toggle-accordion").on("click", function() {
    var accordionId = $(this).attr("accordion-id"),
      numPanelOpen = $(accordionId + ' .collapse.in').length;
    
    $(this).toggleClass("active");

    if (numPanelOpen == 0) {
      openAllPanels(accordionId);
    } else {
      closeAllPanels(accordionId);
    }
  })

  openAllPanels = function(aId) {
    console.log("setAllPanelOpen");
    $(aId + ' .panel-collapse:not(".in")').collapse('show');
  }
  closeAllPanels = function(aId) {
    console.log("setAllPanelclose");
    $(aId + ' .panel-collapse.in').collapse('hide');
  }
     
});



// Increent decrement 


















// ADDONCHECKSTAT



                        function yesno(thecheckbox, thelabel) {
    
    var checkboxvar = document.getElementById(thecheckbox);
    var labelvar = document.getElementById(thelabel);
    if (!checkboxvar.checked) {
        labelvar.innerHTML = "Add +";
    }
    else {
        labelvar.innerHTML = "&#10003;";
    }
}
              
//COPY COUPON

function copyText(element) {
  var $copyText = document.getElementById(element).innerText;
  var button = document.getElementById(element + '-button');
  navigator.clipboard.writeText($copyText).then(function() {
    var originalText = button.innerText;
    button.innerText = 'Copied!';
    setTimeout(function(){
      button.innerText = originalText;
      }, 750);
  }, function() {
    button.style.cssText = "background-color: var(--red);";
    button.innerText = 'Error';
  });
}




/* Create the popover with Header Content and Footer */
$('.popover-markup>[data-toggle="popover"]').popover({
    html: true,
    title: function() {
      return $(this).parent().find('.head').html();
    },
    /********** 
      In the content method, return a class 'popover-content1' wrapping the actual 'contents', 
      concatenated with a class 'popover-footer' wrapping the footer.
    ************/
    content: function() {
        return '<div class="popover-content1">' + $(this).parent().find('.content').html() +
          '</div><div class="popover-footer">' + $(this).parent().find('.footer').html() +
          '</div>';
      }    
  });
  
  /**
    Allow the popover to be closed by clicking anywhere outside it.
  **/
  $('body').on('click', function(e) {
    $('.popover-markup>[data-toggle="popover"]').each(function() {
      //the 'is' for buttons that trigger popups
      //the 'has' for icons within a button that triggers a 
      if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
        $(this).popover('hide');
      }
    });
  });

  
  /****************TIMELINE**************/

  $(function () {
    // Smooth Scroll
    $('.navbar a[href*=#]').bind('click', function(e){
      var anchor = $(this);
      $('html, body').stop().animate({
        scrollTop: $(anchor.attr('href')).offset().top
      }, 1000);
      e.preventDefault();
    });
  });
  
  jQuery(document).ready(function() {
      // code from: https://www.sitepoint.com/community/t/collapsible-bootstrap-panels-not-collapsing-after-another-panel-is-selected/225826/2
      jQuery(".panel-heading").click(function() {
          jQuery('#accordion .panel-heading').not(this).removeClass('isOpen');
          jQuery(this).toggleClass('isOpen');
          jQuery(this).next(".panel-collapse").addClass('thePanel');
          jQuery('#accordion .panel-collapse').not('.thePanel').slideUp(300);
          jQuery(".thePanel").slideToggle(800).removeClass('thePanel');
      });
  });




 //////////////// Auto Complete Address ///////////////////

// 









































