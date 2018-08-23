// smooth scroll to div
$('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
  $('[data-skill]').each(function(){
  
      var item = $(this),
          skill = item.data('skill'),
          size = item.data('skill-size'),
          border = 5,
          radius = (size / 2) - border,
          circumference = 2 * Math.PI * radius,
          progress = circumference - ((circumference / 100) * skill),
          speed = 1000;
      
      item.append('<h4>0</h4><svg><circle class="back" /><circle class="front" /></svg>');
      
      $({Counter: 0}).animate({
              Counter: skill
          }, {
              duration: speed,
              easing: 'swing',
              step: function () {
              item.find('h4').text(Math.ceil(this.Counter) + '%');
          }
      });
      
      item.find('svg').width(size).height(size);
      
      item.find('circle').attr({
          'r' : radius,
          'cy' : radius + border,
          'cx' : radius + border
      });
      
      item.find('.front').css({
          'stroke-dasharray' : circumference,
          'stroke-dashoffset' : circumference
      }).animate({
          'stroke-dashoffset' : progress
      }, speed);
  
  });
  var cfg = {
          easing: [0.165, 0.84, 0.44, 1],
          duration: 2500,
          delay: 700,
          layerDelay: 10000,
          width: 28,
          positioning: true,
          colors: [
                  '#027CA5',
                  '#75B5C6',
                  '#00FFD0',
                  '#00B994',
                  '#BEF5FE'
          ]
  }
  
  $('.shape-layer').each(function(i) {
          var $this = $(this);
  
          setTimeout(function() {
                  var $paths = $this.find('path');
  
                  strokeSetup($paths);
                  strokeOut($paths);
  
          }, cfg.layerDelay * i);
  });
  
  function strokeSetup($el) {
          $el.each(function(i) {
                  var $this = $(this),
                          pLen = Math.ceil($this.get(0).getTotalLength());
  
                  $this.css({
                          'stroke-dasharray': pLen,
                          'stroke-dashoffset': pLen,
                          'stroke-width': cfg.width
                  });
          });
  }
  
  function strokeOut($el) {
          var pathCount = $el.length,
                  iterationCount = pathCount;
  
          $el.each(function(i) {
                  var $this = $(this),
                          pLen = Math.ceil($this.get(0).getTotalLength()),
                          color = cfg.colors[getRandom(0, cfg.colors.length)];
  
                  setTimeout(function() {
                          $this.css({
                                  'stroke': color
                          });
  
                          if (cfg.positioning) {
                                  var side = ['top', 'bottom', 'left', 'right'],
                                          cssO = {};
  
                                  $this.parent().css({
                                          top: 'auto',
                                          bottom: 'auto',
                                          left: 'auto',
                                          right: 'auto'
                                  });
  
                                  cssO[side[getRandom(0, 1)]] = getRandom(0, 40) + '%';
  
                                  var firstPos = cssO[Object.keys(cssO)[0]],
                                          sideAmount = (parseInt(firstPos) < 20) ? 100 : 20;
  
                                  cssO[side[getRandom(2, 3)]] = getRandom(0, sideAmount) + '%';
  
                                  $this.parent().css(cssO);
                          }
  
                          $this.velocity({
                                  'stroke-dashoffset': 0,
                          }, {
                                  duration: cfg.duration,
                                  easing: cfg.easing
                          });
  
                          if (!--iterationCount) {
                                  strokeIn($el);
                          }
                  }, cfg.delay * i);
          });
  
  }
  
  function strokeIn($el) {
          var pathCount = $el.length,
                  iterationCount = pathCount;
  
          $el.each(function(i) {
                  var $this = $(this),
                          pLen = Math.ceil($this.get(0).getTotalLength());
  
                  setTimeout(function() {
  
                          $this.velocity({
                                  'stroke-dashoffset': pLen
                          }, {
                                  duration: cfg.duration,
                                  easing: cfg.easing
                          });
  
                          if (!--iterationCount) {
                                  strokeOut($el);
                          }
                  }, cfg.delay * i);
          });
  }
  
  function getRandom(min, max) {
          return Math.floor(Math.random() * (max - min + 1)) + min;
  }

  //count

  // PreLoader
jQuery.noConflict();
(function($) {
	$(window).on('load', function() { // makes sure the whole site is loaded
		$('#status').fadeOut(); // will first fade out the loading animation
		$('#preloader').delay(200).fadeOut('slow'); // will fade out the white DIV that covers the website.
	});
})(jQuery);

// Scroll to Top
jQuery.noConflict();
(function($) {
	$(window).scroll(function() {
		if ($(this).scrollTop() >= 50) { // If page is scrolled more than 50px
			$('#return-to-top').fadeIn(200); // Fade in the arrow
		} else {
			$('#return-to-top').fadeOut(200); // Else fade out the arrow
		}
	});
	$('#return-to-top').click(function() { // When arrow is clicked
		$('body,html').animate({
			scrollTop: 0 // Scroll to top of body
		}, 500);
	});
})(jQuery);

// jQuery for page scrolling feature - requires jQuery Easing plugin
jQuery.noConflict();
(function($) {
	$(function() {
		$('a.page-scroll').bind('click', function(event) {
			var $anchor = $(this);
			$('html, body').stop().animate({
				scrollTop: $($anchor.attr('href')).offset().top
			}, 1500, 'easeInOutExpo');
			event.preventDefault();
		});
	});
})(jQuery);

// typer for hello
window.onload = function() {
	var elements = document.getElementsByClassName('txt-rotate');
	for (var i = 0; i < elements.length; i++) {
		var toRotate = elements[i].getAttribute('data-rotate');
		var period = elements[i].getAttribute('data-period');
		if (toRotate) {
			new TxtRotate(elements[i], JSON.parse(toRotate), period);
		}
	}
	// INJECT CSS
	var css = document.createElement("style");
	css.type = "text/css";
	css.innerHTML = ".txt-rotate > .wrap { border-right: 10px solid #40E0D0 }";
	document.body.appendChild(css);
};

var TxtRotate = function(el, toRotate, period) {
	this.toRotate = toRotate;
	this.el = el;
	this.loopNum = 0;
	this.period = parseInt(period, 1) || 1000;
	this.txt = '';
	this.tick();
	this.isDeleting = false;
};

TxtRotate.prototype.tick = function() {
	var i = this.loopNum % this.toRotate.length;
	var fullTxt = this.toRotate[i];

	if (this.isDeleting) {
		this.txt = fullTxt.substring(0, this.txt.length - 1);
	} else {
		this.txt = fullTxt.substring(0, this.txt.length + 1);
	}

	this.el.innerHTML = '<span class="wrap">' + this.txt + '</span>';

	var that = this;
	var delta = 200 - Math.random() * 100;

	if (this.isDeleting) {
		delta /= 2;
	}

	if (!this.isDeleting && this.txt === fullTxt) {
		delta = this.period;
		this.isDeleting = true;
	} else if (this.isDeleting && this.txt === '') {
		this.isDeleting = false;
		this.loopNum++;
		delta = 200;
	}

	setTimeout(function() {
		that.tick();
	}, delta);
};

// number count for stats
jQuery.noConflict();
(function($) {
	$('.counter').each(function() {
		var $this = $(this),
			countTo = $this.attr('data-count');

		$({
			countNum: $this.text()
		}).animate({
				countNum: countTo
			},

			{
				duration: 3000,
				easing: 'linear',
				step: function() {
					$this.text(Math.floor(this.countNum));
				},
				complete: function() {
					$this.text(this.countNum);
					//alert('finished');
				}
			});
	});
})(jQuery);

// update footer copyright year

var today = new Date();
var year = today.getFullYear();

var copyright = document.getElementById("copyright");
copyright.innerHTML = '© Marina Marques '+ year;