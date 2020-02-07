$(document).ready(function(){
    $('.header-slider').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        pauseOnHover: true,
        autoplay: true,
        autoplaySpeed: 3000,
        dots: true,
        responsive: [
          {
              breakpoint: 769,
              settings: {
                arrows: false,
                dots: true
              }
            },
            {
              breakpoint: 380,
              settings: {
                arrows: false,
                dots: true,
               
              }
            }
        ],
        nextArrow:'<button class="slider-next slick-arrow"><img src="../assets/img/arrow-right.png"></button>',
        prevArrow:'<button class="slider-prev slick-arrow"><img src="../assets/img/arrow-left.png"></button>'
    });
    $('.slider-rooms').slick({
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        centerMode: true,
        variableWidth: true,  
        centerPadding: '100px',
        speed: 1000,
        pauseOnHover: true,
        autoplay: true,
        autoplaySpeed: 5000,
        arrows: true,
        dots: false,
        responsive: [
          {
            breakpoint: 480,
            settings: {
              arrows: false
            }
          }
        ],
        accessibility: true,
        nextArrow: $('.slick-next'),
        prevArrow: $('.slick-prev')
    });
    $('.advantages-slider').slick({
        infinite: true,
        slidesToShow: 6,
        slidesToScroll: 1,
        pauseOnHover: true,
        autoplay: true,
        autoplaySpeed: 4000,
        speed: 1000,
        arrows: true,
        dots: false,
        accessibility: true,
        responsive: [
            {
              breakpoint: 992,
              settings: {
                slidesToShow: 3
              }
            },
            {
                breakpoint: 769,
                settings: {
                  slidesToShow: 3,
                  arrows: false,
                  dots: true
                }
              },
            {
              breakpoint: 480,
              settings: {
                arrows: false,
                dots: true,
                slidesToShow: 1
              }
            }
          ],
        nextArrow:'<button class="slick-next slick-arrow"><img src="../assets/img/arrow-rightb.png"></button>',
        prevArrow:'<button class="slick-prev slick-arrow"><img src="../assets/img/arrow-leftb.png"></button>'
    });
    //inputs
    (function($){
        function floatLabel(inputType){
            $(inputType).each(function(){
                var $this = $(this);
                $this.focus(function(){
                    $this.next().addClass("active");
                });
                $this.blur(function(){
                    if($this.val() === '' || $this.val() === 'blank'){
                        $this.next().removeClass();
                    }
                });
            });
        }

        floatLabel(".floatLabel");
    })(jQuery);

    $('.video').click(function(event){
      event.preventDefault();
      $('#popup-header').addClass("is-visible").animate({display: 'block', opacity: 1}, 200);
      $('.overlay').addClass('is-visible');
      $("body").css("overflow","hidden"); 
    
    });
    $('.overlay').click(function(event){
        event.preventDefault();
         $('#popup-header').removeClass('is-visible');
         $('.overlay').removeClass('is-visible');
         $("body").css("overflow","auto"); 
      });
    $('.close').click(function(event){
        event.preventDefault();
        console.log(333)
        $('#popup-header').removeClass('is-visible');
        $('.overlay').removeClass('is-visible');
        $("body").css("overflow","auto"); 
    });

    //menu fixed
    var header = $('.main-nav'),
	      scrollPrev = 0;

    $(window).scroll(function() {
        var scrolled = $(window).scrollTop();
        
        if ( scrolled > 100 && scrolled < scrollPrev ) {
            $('.main-nav').addClass('fixed');
           
        } else {
            $('.main-nav').removeClass('fixed');
        }
        scrollPrev = scrolled;
        });

    //mob menu
    var $btn = document.getElementById('show');
    var $nav = document.getElementById('nav');
    var $body = document.querySelector('body');
    $btn.addEventListener('click', function() {
        $nav.classList.toggle('active-nav');
        $body.classList.toggle('overflow');
        })
   
    //bar mobile
    var toggles = document.querySelectorAll(".toggle-hamburger");

    for (var i = toggles.length - 1; i >= 0; i--) {
      var toggle = toggles[i];
      toggleHandler(toggle);
    };
  
    function toggleHandler(toggle) {
      toggle.addEventListener( "click", function(e) {
        e.preventDefault();
        (this.classList.contains("is-active") === true) ? this.classList.remove("is-active") : this.classList.add("is-active");
      });
    }
   
      
   
});



jQuery(document).ready(function(){
      
    // 	$(document).ready(function(){
    //         $('.cc-stats').slick({
    // 		infinite: true,
    // 		slidesToShow: 3,
    // 	  slidesToScroll: 1,
    // 	  autoplay: true,
    // 	  autoplaySpeed: 500,
    // 	  speed: 5000,
    // 	  responsive: [
    // 		{
    // 		  breakpoint: 600,
    // 		  settings: {
    // 			slidesToShow: 2,
    // 			slidesToScroll: 1,
    // 			infinite: true
    // 		  }
    // 		}
    // 	  ]	
    // 	}); 

		var header = $('#masthead'),
		scrollPrev = 0;

    $(window).scroll(function() {
      var scrolled = $(window).scrollTop();

      if ( scrolled > 100 && scrolled > scrollPrev ) {
        header.addClass('fixed');
      } else {
        header.removeClass('fixed');
      }
      scrollPrev = scrolled;
    });


		$(function (){
			$("#back-top").hide();
			$(window).scroll(function (){
				if ($(this).scrollTop() > 100){
					$("#back-top").fadeIn();
				} else{
					$("#back-top").fadeOut();
				}
      });
      $("#back-top a").click(function (){
          $("body,html").animate({
            scrollTop:0
          }, 800);
          return false;
        });
		});

	//  scroll
	$(window).on("scroll resize", function() {
		var o = $(window).scrollTop() / ($(document).height() - $(window).height());

		 var progress = $(".progress-bar");

		 $.each(progress, function(element) {
			$(element).css({
				"width": (100 * o | 0) + "%"
			});
			$('progress')[0].value = o; 
		 })
	})
	//scroll

	//likes
	jQuery(document).ready(function() {
    jQuery(".post-like a").click(function(){
      heart = jQuery(this);
      // Retrieve post ID from data attribute
      post_id = heart.data("post_id");
      // Ajax call
      jQuery.ajax({
        type: "post",
        url: ajax_var.url,
        data: "action=post-like&nonce="+ajax_var.nonce+"&post_like=&post_id="+post_id,
        success: function(count){
          // If vote successful
          if(count != "already") {
            heart.addClass("voted");
            heart.siblings(".count").text(count);
          }
        }
      });
      return false;
    })
	 })
	
});