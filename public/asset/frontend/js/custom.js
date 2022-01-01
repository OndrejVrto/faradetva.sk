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
			this.RTL();
			this.Datepicker();
			this.slider();
			this.Testimonialslider();
			this.Responsive_menu();
			this.Dropdown_Menu();
			this.skill_counter();
			this.wowanimation();
			this.MailFunction();
		},
		/*-------------- Church Functions definition ---------------------------------------------------
		---------------------------------------------------------------------------------------------------*/
		RTL: function () {
			// On Right-to-left(RTL) add class
			var rtl_attr = $("html").attr('dir');
			if (rtl_attr) {
				$('html').find('body').addClass("rtl");
			}
		},
		//Datepicker
		Datepicker: function () {
			if ($(".datepicker").length > 0) {
				$(".datepicker").datepicker({
					dateFormat: "dd-mm-yy"
				});
			}
		},
		//slider
		slider: function () {
			if ($(".ch_home_slider").length > 0) {
				$('.ch_home_slider').owlCarousel({
					loop: true,
					margin: 0,
					items: 1,
					singleItem: true,
					autoplay: true,
					autoplayTimeout: 4000,
					autoplaySpeed: 500,
					smartSpeed: 1500,
					dots: false,
					nav: true,
					navText: ["<img src='images/icon/nav_left.png' alt='icon'/>", "<img src='images/icon/nav_right.png' alt='icon'/>"],
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
		Testimonialslider: function () {
			if ($(".testimonial_crousel").length > 0) {
				$('.testimonial_crousel').owlCarousel({
					loop: true,
					items: 2,
					margin: 30,
					autoplay: true,
					nav: true,
					// navText:["<img src='images/l-arrow.png' alt='icon'/>","<img src='images/r-arrow.png' alt='icon'/>"],
					navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
					autoplayTimeout: 1500,
					autoplaySpeed: 1500,
					smartSpeed: 1500,
					responsiveClass: true,
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
		Responsive_menu: function () {
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
		skill_counter: function () {
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
		wowanimation: function () {
			var wow = new WOW({
				boxClass: 'wow',      // default
				animateClass: 'animated', // default
				offset: 0,          // default
				mobile: true,       // default
				live: true        // default
			})
			wow.init();
		},
		//contact form mail script
		MailFunction: function () {
			$('.submit_btn').on('click', function () {
				var name = $('#u_name').val();
				var email = $('#u_email').val();
				var phone = $('#u_phone').val();
				var address = $('#u_address').val();
				var u_msg = $('#u_message').val();
				$.ajax({
					type: "POST",
					url: "contactmail.php",
					data: {
						'username': name,
						'useremail': email,
						'userphone': phone,
						'useraddress': address,
						'usermsg': u_msg,
					},
					success: function (msg) {
						var full_msg = msg.split("#");
						if (full_msg[0] == '1') {
							$('#u_name').val("");
							$('#u_email').val("");
							$('#u_phone').val("");
							$('#u_address').val("");
							$('#u_message').val("");
							$('#err_msg').html(full_msg[1]);
						}
						else {
							$('#u_name').val(name);
							$('#u_email').val(email);
							$('#u_phone').val(phone);
							$('#u_subject').val(address);
							$('#u_message').val(u_msg);
							$('#err_msg').html(full_msg[1]);
						}
					}
				});
			});
		},
	};
	Church.init();
	//window load function
	$(window).load(function () {
		$(".preloader").fadeOut("slow").delay("400");
	});
	//window scroll function
	$(window).bind('scroll', function () {
		var wind_scroll = $(window).scrollTop();
		var slider_height = $(".ch_slider_wrapper").outerHeight();
		var slider_div = $(".ch_slider_wrapper");
		if (wind_scroll > slider_height && slider_div.length > 0) {
			$('.header_menu_section').addClass('sticky_header');
		}
		else if (wind_scroll > 200) {
			$('.header_menu_section').addClass('sticky_header');
		}
		else {
			$('.header_menu_section').removeClass('sticky_header');
		}
		console.log(slider_height);
	});

	$('#search-form').on('submit', function(event) {
		event.preventDefault();
		var search_frase = $('#search-form-q').val();
		window.location.replace('/search/' + search_frase);
	})

})(jQuery);
