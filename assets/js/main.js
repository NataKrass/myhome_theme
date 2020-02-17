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
        nextArrow: $('.slick-next-head'),
        prevArrow: $('.slick-prev-head')
    });
    $('.slider-rooms').slick({
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        centerMode: true,
        variableWidth: true,  
        centerPadding: '0',
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
        nextArrow: $('.slick-next-room'),
        prevArrow: $('.slick-prev-room')
    });
    
    $('.slider-for').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: true,
      fade: true,
      asNavFor: '.room-slider',
      nextArrow: $('.next-for'),
      prevArrow: $('.prev-for')
    });
    $('.room-slider').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      asNavFor: '.slider-for',
      dots: true,
      arrows: false,
      centerMode: true,
      centerPadding: '30px',
      variableWidth: true,
      focusOnSelect: true
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
          nextArrow: $('.next-adv'),
          prevArrow: $('.prev-adv')
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
   //popup-video
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
    
   //popup-form
   $('.header-form-btn').click(function(event){
    event.preventDefault();
    $('#popup-form').addClass("is-visible").animate({display: 'block', opacity: 1}, 200);
    $('.overlay').addClass('is-visible');
   
  
  });
  $('.overlay').click(function(event){
      event.preventDefault();
       $('#popup-form').removeClass('is-visible');
       $('.overlay').removeClass('is-visible');
      
    });
  $('.close').click(function(event){
      event.preventDefault();
      console.log(333)
      $('#popup-form').removeClass('is-visible');
      $('.overlay').removeClass('is-visible');
     
  });


    //menu fixed
    $(window).scroll(function() {
        var scrolled = $(window).scrollTop(),
        scrollPrev = 0;
        
        if ( scrolled > 500 && scrolled > scrollPrev ) {
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
   
    //bar
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
   

    // form
    const arrive = document.querySelector('#arrive'),
          arriveForm = document.querySelector('input[name="date-865"]'),
          depart = document.querySelector('#depart'),
          departForm = document.querySelector('input[name="date-823"]'),
          selectRoom = document.querySelector('.select-room'),
          roomForm = document.querySelector('.order-roomtype'),
          selectPeople = document.querySelector('.select-people'),
          peopleForm = document.querySelector('input[name="number-10"]');
    
    arrive.addEventListener('blur', () => {
      arriveForm.value = arrive.value; 
    })
    depart.addEventListener('blur', () => {
      departForm.value = depart.value; 
    })
    selectRoom.addEventListener('blur', () => {
      roomForm.value = selectRoom.value; 
      console.log(selectRoom.value)
      console.log(roomForm.value)
    })
    selectPeople.addEventListener('blur', () => {
      peopleForm.value = selectPeople.value; 
    })
    
  
 
   
});


  