/*---------------------------------
[Master Javascript]
Project: Church
-------------------------------------------------------------------*/
(function ($) {
	"use strict";
	var Church = {
		initialised: false,
		version: 1.0,
		mobile: false,
		init: function () {
			if (!this.initialised) {
				this.initialised = true;
			} else {
				return;
			}
			/*-------------- Church Functions Calling ---------------------------------------------------
			------------------------------------------------------------------------------------------------*/
			this.Datepicker();
			this.Slider();
			this.Testimonial_Slider();
			this.Responsive_Menu();
			this.Dropdown_Menu();
			// this.Skill_Counter();
			this.Wow_Animation();
		},
		/*-------------- Church Functions definition ---------------------------------------------------
		---------------------------------------------------------------------------------------------------*/
		//Datepicker
		Datepicker: function () {
			if ($(".datepicker").length > 0) {
				$(".datepicker").datepicker({
					dateFormat: "dd-mm-yy"
				});
			}
		},

        //  owl-theme owl-responsive-1000 owl-loaded
        //slider
		Slider: function () {
			if ($(".ch_home_slider").length > 0) {
				$('.ch_home_slider').owlCarousel({
					loop: true,
					margin: 0,
					items: 1,
                    center: true,
					singleItem: true,
					autoplay: true,
					autoplayTimeout: 6000,
					autoplaySpeed: 500,
					smartSpeed: 1500,
					dots: false,
					nav: false,
					// navText: ["<img src='images/icon/nav_left.png' alt='icon'/>", "<img src='images/icon/nav_right.png' alt='icon'/>"],
					responsiveClass: true,
					responsive: {
						0: {
							items: 1
						},
						600: {
							items: 1
						},
						768: {
							items: 1
						},
						1000: {
							items: 1
						}
					},
					animateIn: "fadeIn",
					animateOut: "fadeOut",
				})
			}
		},
		//Testmonial Crousel
		Testimonial_Slider: function () {
			if ($(".testimonial_crousel").length > 0) {
				$('.testimonial_crousel').owlCarousel({
					loop: true,
					items: 2,
					margin: 30,
					autoplay: true,
					nav: true,
					// navText:["<img src='images/icon/nav_left.png' alt='icon'/>","<img src='images/icon/nav_right.png' alt='icon'/>"],
					// navText: [&#x27;next&#x27;,&#x27;prev&#x27;],
					navText: [
                        '<i class="fa-solid fa-2x text-church-template-blue fa-circle-chevron-left" aria-label="Left"></i>',
                        '<i class="fa-solid fa-2x text-church-template-blue fa-circle-chevron-right" aria-label="Right"></i>'
                    ],
					autoplayTimeout: 5000,
					autoplaySpeed: 2000,
					smartSpeed: 1500,
					responsiveClass: true,
                    stageClass: 'owl-stage d-flex align-items-stretch',
					responsive: {
						0: {
							items: 1,
						},
						600: {
							items: 1,
						},
						768: {
							items: 1,
						},
						992: {
							items: 2,
						}
					},
				})
			}
		},
		//Responsive Menu
		Responsive_Menu: function () {
			$(".nav_toggle").on('click', function () {
				$(this).toggleClass("toggle_open");
				$(".header_right_menu").toggleClass("menu_open");
			});
		},
		//dropdown menu
		Dropdown_Menu: function () {
			if ($(window).width() <= 991) {
				$(".header_right_menu ul li ul.sub-menu").parents("li").addClass("dropdown_toggle");
				$(".dropdown_toggle").append("<span class='caret_down'></span>");
				$(".caret_down").on("click", function () {
					$(this).toggleClass("caret_up");
					$(this).prev("ul").slideToggle();
				});
			}
			else {

			}
		},
		//counter
		Skill_Counter: function () {
			if ($('.counter_num').length > 0) {
				$('.counter_num').appear(function () {
					$('.counter_num').each(count);
					function count(options) {
						var $this = $(this);
						options = $.extend({}, options || {}, $this.data('countToOptions') || {});
						$this.countTo(options);
					}
				});
			}
		},
		//animation on scrolling page
		Wow_Animation: function () {
			var wow = new WOW({
				boxClass: 'wow',      // default
				animateClass: 'animated', // default
				offset: 0,          // default
				mobile: true,       // default
				live: true        // default
			})
			wow.init();
		},
	};

	Church.init();

    //window load function
	$(window).on("load", function () {
		// $(".preloader").fadeOut("slow").delay("300");
		$(".preloader").fadeOut("slow");
	});

	//window scroll function
	$(window).on('scroll', function () {
        // if($(this).scrollTop() !== 0) {
        //     $('#toTop').fadeIn(400);
        // } else {
        //     $('#toTop').fadeOut(1000);
        // }

        var wind_scroll = $(window).scrollTop();
		var slider_height = $(".ch_slider_wrapper").outerHeight();
		var slider_div = $(".ch_slider_wrapper");

        if (wind_scroll > slider_height && slider_div.length > 0) {
			$('.header_menu_section').addClass('sticky_header');
		} else if (wind_scroll > 200) {
			$('.header_menu_section').addClass('sticky_header');
		} else {
			$('.header_menu_section').removeClass('sticky_header');
		}
	});

    $('#toTop').on('click', function(){
        $('body,html').animate({scrollTop:0}, 1000);
    });

	$('#search-form').on('submit', function(event) {
		event.preventDefault();
		var search_frase = $('#search-form-q').val();
		window.location.replace('/hladat-v-clankoch/' + search_frase);
	})

    $('#search-form-all').on('submit', function(event) {
		event.preventDefault();
		var search_frase_B = $('#inputSearch').val();
		window.location.replace('/hladat/' + search_frase_B);
	})

    $('#search-form-all2').on('submit', function(event) {
		event.preventDefault();
		var search_frase_B = $('#inputSearch2').val();
		window.location.replace('/hladat/' + search_frase_B);
	})

    // $('.collapse').collapse();

})(jQuery);


const tooltips = document.querySelectorAll('.tt')
tooltips.forEach(t => {
    new bootstrap.Tooltip(t)
})
