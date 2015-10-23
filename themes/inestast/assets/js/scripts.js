(function($) {
"use strict";

	var height_menu = $("#nav-main").css("height");

/* ======== CURRENT MENU ITEM ======== */		
	$(document).scroll(function(){
		$.currentItem();
	});

	$(document).ready(function(){
		$.currentItem();
	});

	


	$(document).ready(function() {	
/* ======== GO TO SECTION HASH ======== */
		var hash = window.location.hash;
		$(window).load(function() {
			if(hash) $("html, body").animate({ scrollTop: $(hash).offset().top - height_menu });
		});
		
		
		
		/* ======= VIDEO BG ======= */
		if($('#video-background').length > 0) {
			$('#video-background').appear(function() {
			if (isMobile.any()) jQuery('#video-background').remove();
			else jQuery('#video-background').get(0).play();
			});
		}
		

/* ======== CLIENT CAROUSEL HIDDEN ======== */
		//$(".client-carousel").css("display","block");
		
/* ======== STICKY MENU ======== */
		$("#backtop").click(function() {
			$("html, body").animate({scrollTop: 0},1000);
		});

/* ======== COUNT DOWN ======== */	
$('.number-container').appear(function() {
	var count_element = $(".number", this).html();
	$(".number", this).countTo({
		from: 0,
		to: count_element,
		speed: 2500,
		refreshInterval: 50,
	});
});



/* ============== CHROME BUG ADMIN BAR HOME PARALLAX ============== */
	$.browser.chrome = /chrom(e|ium)/.test(navigator.userAgent.toLowerCase()); 
	if($.browser.chrome && $("#wpadminbar").length > 0 && $("#header-main").length > 0){
		$("html").css("cssText", "margin-top: 0 !important;");
	}


		
/* ============== HEADER BACKGROUND SLIDER ============== */
		$(function () {
			var $anchors = $('.bg-slider');
			(function _loop(idx) {
				$anchors.removeClass('slider-current').eq(idx).addClass('slider-current');
				setTimeout(function () {
				_loop((idx + 1) % $anchors.length);
				}, 5000);
			}(0));
		});
		
/* ======== SCROLL MENU ======== */
		height_menu = parseInt(height_menu,10);
		$('.sticky-menu').localScroll({offset: {top: -height_menu},duration: 1000});
		$('.nosticky').localScroll({offset: {top: 0},duration: 1000});
		$('#mobile-menu ul').localScroll({offset: {top: 0},duration: 1000});
		
/* ======== TWITTER PLUGIN ======== */
		$("#twitter-plugin ul").responsiveSlides({
			nav: true,
			auto: false,
			prevText: "<i class='fa fa-angle-left'></i>",
			nextText: "<i class='fa fa-angle-right'></i>",
			navContainer: "#twitter-plugin nav"
		});
		
		$(".date-tweet").timeago();
		
/* ======== POST SLIDES ======== */
		$(".media .rslides").responsiveSlides({
			nav: true,
			auto: true,
			prevText: "<i class='fa fa-angle-left'></i>",
			nextText: "<i class='fa fa-angle-right'></i>",
		});
		
/* ======= PORTFOLIO SECTION ======= */
		var $container = $('#works-list');
		$container.isotope({
			filter: '*',
			animationOptions: {
				duration: 750,
				easing: 'linear',
				queue: false
			},
		});
 
		$('#portfolio-categories ul li a').click(function(){
			$('#portfolio-categories ul li').removeClass('current-cat');
			$(this).parent().addClass('current-cat');
	 
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
		var filtertoggle = jQuery('body');
		$(window).load(function() {
			$container.isotope('reLayout');
			
			
			$(function(){
				setTimeout(function() {
					$container.isotope('reLayout');
				}, filtertoggle.hasClass("") ? 755: 755);
			});
		});
		
		$(window).resize(function() {
			$(function(){
				setTimeout(function() {
					$container.isotope('reLayout');
				}, filtertoggle.hasClass("") ? 755: 755);
			});
			$container.isotope('reLayout');
		});
/* ======= PORTFOLIO LOAD ======= */		
		var toLoad;
		$('#works-list a').click(function(){
			$("html, body").scrollTo("#portfolio-categories", 1000, { offset: -height_menu } );
			toLoad = $(this).attr('href');　
			$("#portfolio-loader").fadeIn(500);
			$.ajax({
				url: toLoad,
				success: function(data) {
					var content_ajax = jQuery(data).find('#content-ajax').html();
					$("#portfolio-item").html(content_ajax);
					$("#portfolio-loader").slideUp(500, function() { $("#portfolio-item").slideDown(500); } );
					
				}
			});
			return false;
		});
		
		
		
		$('#close-button').live('click', function(){
			$('#portfolio-item').html('');
			$('#portfolio-item').slideUp(500);
			$('#portfolio-loader').fadeOut(500);
		});
		
/* ======= CLEAR AJAX FORM ======= */
		if($("#form-ajax").is('*')) {
			$('#form-ajax')[0].reset();
		}
		
/* ======= VALIDATE FORM BEFORE SEND ======= */
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		
		$("#form-ajax #personal").blur(function() {
			if($(this).val() === '') {
				$(this).addClass('error-input');
			}
			else {
				$(this).removeClass('error-input');
			}
		});
		
		$("#form-ajax #message-contact").blur(function() {
			if($(this).val() === '') {
				$(this).addClass('error-input');
			}
			else {
				$(this).removeClass('error-input');
			}
		});
		
		$("#form-ajax #email").blur(function() {
			if($(this).val() === '' || !emailReg.test($.trim($(this).val()))) {
				$(this).addClass('error-input');
			}
			else {
				$(this).removeClass('error-input');
			}
		});
		
/* ======= CONTACT FORM AJAX ======= */
		$('#form-ajax').submit(function() {
			var errors = false;
			var email_field = $("#email");
			var personal_field = $("#personal");
			var message_text = $("#message-contact");
			var website_field = $("#website");
			
            if(!emailReg.test($.trim(email_field.val())) || email_field.val() == '') {
				email_field.addClass("error-input");
				errors = true;
			}
			
			if(personal_field.val() === '') {
				personal_field.addClass("error-input");
				errors = true;
			}
			
			if(message_text.val() === '') {
				message_text.addClass("error-input");
				errors = true;
			}
			
			if($.cookie("send_mail") == 1) {
				alert("Wait..");
				errors = true;
			}
			
			
			if(errors === false) {
				message_text.removeClass("error-input");
				email_field.removeClass("error-input");
				personal_field.removeClass("error-input");
				var formInput = $(this).serialize();
				$('input', this).attr('disabled','disabled');
				
				$.ajax({  
							type: "POST",  
							url: form_url,
							data: formInput,  
							success: function(response) {
								if (response == "success")
								{
									$("#contact-form-script").slideUp(200);
									$("#contact-success").slideDown(1000);
									var date = new Date();
									var minutes = 2;
									date.setTime(date.getTime() + (minutes * 60 * 1000));
									jQuery.cookie('send_mail', 1, { expires: date });
									
								}

								else
								{
									alert('Problem with send email');
								}
							}
						});  
			}
			return false;
		});
		
/* ======= FIT VIDS BLOG ======= */
		$(".media").fitVids();
		$(".text-edit").fitVids();
		$(".fit").fitVids();
/* ============== INFOBOX SLIDER ============== */

		$("#box1").flexisel({
			autoPlay: false,
			visibleItems: 3,
			responsiveBreakpoints: {
				portrait: {
					changePoint:480,
					visibleItems: 1
				}, 
				landscape: {
					changePoint:640,
					visibleItems: 1
				},
				tablet: {
					changePoint:767,
					visibleItems: 1
				}
			}
			
		});

		/* ======= CLIENTS POPUP ======= */
		// 순서중요: CLIENTS CAROUSEL 보다 먼저 실행되야 함.
		// 이미지를 삽입 할 클라이언트 팝업 컨텐츠
		var clientPopupContent = $('#client_contents');

		// 팝업 안에 클라이언트 이미지 복사
		$('.client-carousel').find('img').clone().appendTo(clientPopupContent);

/* ======= CLIENTS CAROUSEL ======= */		
		$(".client-carousel").flexisel({
			visibleItems: 5,
			autoPlay: true,
			autoPlaySpeed: 2000,
			pauseOnHover: false,
			clone: true,
			enableResponsiveBreakpoints: true,
			responsiveBreakpoints: {
				tablet: {
					changePoint: 995,
					visibleItems: 3
				},
				portrait: {
					changePoint:480,
					visibleItems: 1
				}, 
				landscape: {
					changePoint:640,
					visibleItems: 2
				}
				
			}
		});
		
/* ======= MOBILE MENU ======= */	
		var mobile_menu = $("#mobile-menu");
		$("#mobile-menu-button").click(function() {
			if(mobile_menu.css("display") === "none") {
				mobile_menu.slideDown(400);
			}
			else {
				mobile_menu.slideUp(400);
			}
		});
		
		$("#mobile-menu a").click(function() {
			mobile_menu.slideUp(400);
		});
		
/* ======= EFFECTS APPEAR && CSS3 CLASSES ======= */

		$('.effect-1').appear(function() {
			$(this).addClass("fadeIn");
		});
		
		$('.my-animation').appear(function() {
			$(this).addClass("animated");
		});
		
		
	
		$('.effect-2').appear(function() {
			$(this).addClass("fadeInUpBig");
		});
		
		
		$("#works-list").appear(function() {
			$("a",this).each(function(i, el){
				$(el).css({'opacity':0});

				setTimeout(function(){
				   $(el).animate({
						'opacity':1.0
				   }, 250);
				},300 + ( i * 300 ));
			});
		});

		
		
/* ============== SHORTCODES ============== */

/* ======= TOGGLES & ACCORDIONS ======= */
		$(".toggle").click(function() {
			var parent = $(this).parent();
			var content = $(".toggle-content",this);
				if(parent.hasClass("single-toggles")) {
					$(".toggle-title-text",parent).addClass("hover-icon");
					$(".toggle-arrow",parent).html("+");
				}
				if(content.css("display") === "none") {
					if(parent.hasClass("single-toggles")) {
						$(".toggle-content",parent).slideUp(200);
						$(".toggle-arrow",parent).html("+");
						$(".toggle-title-text",parent).addClass("hover-icon");
					}
					content.slideDown(200);
					$(".toggle-title-text",this).removeClass("hover-icon");
					$(".toggle-arrow",this).html("-");
				}
				else {
					content.slideUp(200);
					$(".toggle-title-text",this).addClass("hover-icon");
					$(".toggle-arrow",this).html("+");
				}
		});
		
/* ======= TABS ======= */
		$('.tabs-menu').each(function() {
            var $ul = $(this);
            var $li = $ul.children('li');
			
            $li.each(function() { 
                var $trescTaba = $($(this).children('a').attr('href'));
                if ($(this).hasClass('active-tab')) {
                    $trescTaba.show();
                } else {
                    $trescTaba.hide();
                }
            });
            $li.click(function() {$(this).children('a').click();});
            $li.children('a').click(function() {
                $li.removeClass('active-tab');         
                $li.each(function() {
                    $($(this).children('a').attr('href')).hide();
                });
                $(this).parent().addClass('active-tab');
                $($(this).attr('href')).show();
                return false;
            });
        });
		
/* ======= ALERTS ======= */
		$(".close-alert").click(function() {
			$(this).parent().hide(400);
		});
		
		
	});

	/* ======= Team member set id: 팝업에서 선택자로 사용하기 위해 ======= */
    var memberImg = $('.team-member > .photo-member > img');
	if(memberImg.length>0){
        $(memberImg).each(function(i, el){
            var memberImgSrc, memberImgId;

            // 팀원의 각 이미지의 이름을 가져온다.
            memberImgSrc = $(el).attr('src').split('/').pop();

            // 이미지 이름에서 확장자를 분리한 이름만 가져온다.
            memberImgId = memberImgSrc.split('.').shift();

            // 각 이미지에 id로 이미지명 삽입.
            $(el).attr('id', memberImgId);
        });
    }



	
})(jQuery);