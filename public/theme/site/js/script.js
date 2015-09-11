"use strict";



$(function()
{
	var $window = $(window);
	var $body = $('body');


	/* независимые фрагменты кода - в раздельных самовызывающихся функциях. */

	// Боковое меню
	(function Menu()
	{
		$('#menu_open').click(function(event)
		{
			event.preventDefault();
			event.stopPropagation();
			$('.b-menu').addClass('_open');
			$body.one("click", function()
			{
				$('.b-menu').removeClass('_open');
			});
		});

		$('.b-menu').on("click", function(event)
		{
			event.stopPropagation();
		})


		$('#menu_close').click(function(event)
		{
			event.preventDefault();
			$('.b-menu').removeClass('_open');
		});


		$('#city_button').click(function(event)
		{
			event.preventDefault();
			event.stopPropagation();
			$('#city_list').fadeIn();
			$body.one('click', function(){ $('#city_list').fadeOut(); })
		});

		$('#city_list').find('a').click(function(event)
		{
			event.preventDefault();
			// $('#city_list').fadeOut();
		});


	})();



	
	// Селекты
	function NaturalLanguageSelectbox() {
		$('[data-nl]').each(function() {
			var nlform = new NLForm($(this)[0]);
		});
	};
	NaturalLanguageSelectbox();

	$('[data-nl] ul').on('click touchend', function(){
		setTimeout(function(){}, 10);
		$('#course-select div[data-nl=""] .nl-field-toggle').css('color', '#fff');
	});
	
	// Слайдер
	(function Slider()
	{
		$(".owl-carousel._large").owlCarousel(
		{
			nav: true,
			navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
			dots: false,
			loop: true,
			slideSpeed: 300,
			responsive :
			{
				0 : {items: 1 },
				768 : {items: 2 },
				1024 : {items: 3 },
				1280 : {items: 3 }
			}
		});

		$(".owl-carousel._medium").owlCarousel(
		{
			nav: true,
			navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
			dots: false,
			loop: true,
			slideSpeed: 300,
			responsive :
			{
				0 : {items: 1 },
				480 : {items: 2 },
				1024 : {items: 3 },
				1280 : {items: 4 }
			}
		});

		$(".owl-carousel._small").owlCarousel(
		{
			nav: true,
			navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
			dots: false,
			loop: true,
			slideSpeed: 300,
			responsive :
			{
				0 : {items: 1 },
				480 : {items: 2 },
				768 : {items: 3 },
				1024 : {items: 4 },
				1280 : {items: 6 }
			}
		});
	})();




	

	// Разворачивающиеся отзывы
	(function TextRoll()
	{
		$('.b-textroll').each(function(index, element)
		{
			var $this = $(element),
				$img = $this.find('.b-textroll__img'),
				$show = $this.find('.b-textroll__show'),
				$hide = $this.find('.b-textroll__hide');

			$show.on("click", function(event)
			{
				event.preventDefault();
				$this.addClass('_open');
				$img.slideUp(500);
			});

			$hide.on("click", function(event)
			{
				event.preventDefault();
				$this.removeClass('_open');
				$img.slideDown(500);
			});
		});
		
	})();

	$('.open-form').click(function(){
		$(this).fadeOut();
		$('.course-form-holder').slideDown();
	});

	$('.b-teacher__photo').click(function() {
		$('.teacher-sub-name').slideToggle();
	});


	// Видео в шапке
	(function VideoHeader()
	{
		if (typeof $.fn.mb_YTPlayer != "undefined")
		{
			$("#videoheader").mb_YTPlayer();
		}
	})();

	// Ugly
	function showAnimation(block) {
		block
			.addClass('pro-transition')
			.removeClass('pro-transformRight');
		setTimeout(function(){
			block.addClass('pro-transformLeft');
			setTimeout(function(){
				block
					.removeClass('pro-transition pro-transformLeft')
					.addClass('pro-transformRight');
			}, 1000);
		}, 5000);
	}

	function timeoutShow(eq) {
		if(eq == $('.sliding-profession').length) {
			var thisEq = 0;
		} else {
			var thisEq = eq;
		}
		showAnimation($('.sliding-profession').eq(thisEq));
		var newEq = thisEq + 1;
		setTimeout(function(){
			timeoutShow(newEq);
		}, 5000);
	}

	timeoutShow(0);

	// READ MORE STORIES
	$('.stories-holder ._hided').slice(0, 5).removeClass('_hided');
	$('#more_stories').click(function(e){
		e.preventDefault();
		$('.stories-holder ._hided').slice(0, 5).removeClass('_hided');
	});

	// VIEW MORE MODULES
	$('._modules ul ._hided').slice(0, 5).removeClass('_hided');
	$('#more_modules').click(function(e){
		e.preventDefault();
		$('._modules ul ._hided').slice(0, 5).removeClass('_hided');
	});

	// VIEW MORE INTENSIVES
	$('.intensives-list ul ._hided').slice(0, 5).removeClass('_hided');
	$('#more_intensives').click(function(e){
		e.preventDefault();
		$('.intensives-list ul ._hided').slice(0, 5).removeClass('_hided');
	});

	// GOOGLE MAP

	var map;

	function mapInit() {

		var cityX = $('.b-footer__map').data('lat'),
			cityY = $('.b-footer__map').data('lng');

		var myLatlng = new google.maps.LatLng(cityX, cityY);
		var mapOptions = {
			center: myLatlng,
			zoom: 17,
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			styles: self.style,
			scrollwheel: false, disableDoubleClickZoom: true
		};

		map = new google.maps.Map(document.getElementById("footer_gmap"), mapOptions);

		var marker = new google.maps.Marker({
			position: myLatlng,
			map: map,
			icon: '/theme/site/img/icon/map-marker.svg'
		});
	}

	google.maps.event.addDomListener(window, 'load', mapInit);

	// CITIES OBJECT DISMEMBERMENT

	var citiesArray = [];
	$.map(__SITE.cities, function(value, index) {
		citiesArray.push(value);
	});

	// CROSS FILTER FORM

	/*var sitiesSelectorValue = '';
	$('.js-city-select').on('change', function() {
		sitiesSelectorValue = $(this).val();
		$('.js-city-select').val(sitiesSelectorValue);
		var optionIndex = $('.js-city-select option[value="' + sitiesSelectorValue + '"]').index();
		var optionVal = $('.js-city-select option[value="' + sitiesSelectorValue + '"]').val();
		$('.nl-form ul li').eq(optionIndex).addClass('nl-dd-checked').siblings().removeClass('nl-dd-checked');
		$('.js-city-select').not($(this)).prev().find('.nl-field-toggle').html($('select').not($(this)).find('option[value="' + optionVal + '"]').html());

		if(window.location.pathname == '/contacts') {
			$('.b-title__text h1').html($('.js-city-select').not($(this)).find('option[value="' + optionVal + '"]').html());
		}
	});*/

	$('.js-city-select').on('change', function(){
		var others = $('.js-city-select').not($(this));
		var val = $(this).val();
		others.val(val);
		others.each(function(){
			$(this).siblings('.nl-field').remove();
			$(this).show();
			new NLForm($(this).parent()[0]);
		});

	});

	function buildingContactInfo() {
		var curentCity = $('.b-header__city-select').val(),
			thisCity = __SITE.cities[curentCity],
			thisCityName = thisCity.name || false,
			thisCityId = thisCity['id'] || false,
			thisCityAddress = thisCity['address'] || 'Адрес не указан',
			thisCityLat = thisCity['lat'] || false,
			thisCityLng = thisCity['lng'] || false,
			thisCityManager_1_fio = thisCity['manager_1_fio'] || false,
			thisCityManager_1_position = thisCity['manager_1_position'] || false,
			thisCityManager_1_phone = thisCity['manager_1_phone'] || false,
			thisCityManager_1_email = thisCity['manager_1_email'] || false,
			thisCityManager_2_fio = thisCity['manager_2_fio'] || false,
			thisCityManager_2_position = thisCity['manager_2_position'] || false,
			thisCityManager_2_phone = thisCity['manager_2_phone'] || false,
			thisCityManager_2_email = thisCity['manager_2_email'] || false,
			thisCityManager_3_fio = thisCity['manager_3_fio'] || false,
			thisCityManager_3_position = thisCity['manager_3_position'] || false,
			thisCityManager_3_phone = thisCity['manager_3_phone'] || false,
			thisCityManager_3_email = thisCity['manager_3_email'] || false,
			thisCityFb_link = thisCity['fb_link'] || false,
			thisCityVk_link = thisCity['vk_link'] || false,
			thisCityIg_link = thisCity['ig_link'] || false,
			thisCityTw_link = thisCity['tw_link'] || false,
			thisCityYt_link = thisCity['yt_link'] || false;
			console.log(curentCity);

		$('.b-footer__map > div').html('<div class="b-footer__map-text-valign h4">' + thisCityName + '<br>' + thisCityAddress + '</div>');
		$('input#city_id').val(thisCityId);

		if(thisCityLat != null && thisCityLat != null) {
			$('.b-footer__map').attr('data-lat', thisCityLat);
			$('.b-footer__map').attr('data-lng', thisCityLng);
			mapInit();
		} else {
			$('#footer_gmap').css('background: #00bf9b;');
		}

		// BUILDING CONTACT INFO

		var cityContactBlock = [],
			ContactBlockManager1 = [],
			ContactBlockManager2 = [],
			ContactBlockManager3 = [],
			ContactBlockSocial = [];


		//PUSHING MANAGER I
		if(thisCityManager_1_phone || thisCityManager_1_email || thisCityManager_1_position || thisCityManager_1_fio) {
			ContactBlockManager1.push('<div class="_mb30">');
			if(thisCityManager_1_phone || thisCityManager_1_email) {
				ContactBlockManager1.push('<h3>')
				if(thisCityManager_1_phone) {
					ContactBlockManager3.push('<a href="tel:' + thisCityManager_1_phone + '">' + thisCityManager_1_phone + '</a> /');
				}
				if(thisCityManager_1_email) {
					ContactBlockManager1.push('<strong class="_text-red"><a href="mailto:'+ thisCityManager_1_email + '">' + thisCityManager_1_email + '</a></strong>');
				}
				ContactBlockManager1.push('</h3>')
			} else {
				ContactBlockManager1.push('<h3>Контактная информация не указана</h3>');
			}
			if(thisCityManager_1_position || thisCityManager_1_fio) {
				ContactBlockManager1.push('<small>');
				if(thisCityManager_1_position) {
					ContactBlockManager1.push(thisCityManager_1_position);
				}
				if(thisCityManager_1_fio) {
					ContactBlockManager1.push(', ' + thisCityManager_1_fio);
				}
				ContactBlockManager1.push('</small>');
			} else {
				ContactBlockManager1.push('<h3>Медеджер не опознан</h3>');
			}
			ContactBlockManager1.push('</div>');
			cityContactBlock.push(ContactBlockManager1.join(''));
		}


		//PUSHING MANAGER II
		if(thisCityManager_2_phone || thisCityManager_2_email || thisCityManager_2_position || thisCityManager_2_fio) {
			ContactBlockManager2.push('<div class="_mb30">');
				if(thisCityManager_2_phone || thisCityManager_2_email) {
					ContactBlockManager2.push('<h3>')
					if(thisCityManager_2_phone) {
						ContactBlockManager2.push('<a href="tel:' + thisCityManager_2_phone + '">' + thisCityManager_2_phone + '</a> /');
					}
					if(thisCityManager_2_email) {
						ContactBlockManager2.push('<strong class="_text-red"><a href="mailto:'+ thisCityManager_2_email + '">' + thisCityManager_2_email + '</a></strong>');
					}
					ContactBlockManager2.push('</h3>')
				}
				if(thisCityManager_2_position || thisCityManager_2_fio) {
					ContactBlockManager2.push('<small>');
					if(thisCityManager_2_position) {
						ContactBlockManager2.push(thisCityManager_2_position);
					}
					if(thisCityManager_2_fio) {
						ContactBlockManager2.push(', ' + thisCityManager_2_fio);
					}
					ContactBlockManager2.push('</small>');
				}
			ContactBlockManager2.push('</div>');
			
			cityContactBlock.push(ContactBlockManager2.join(''));
		}


		//PUSHING MANAGER III
		if(thisCityManager_3_phone || thisCityManager_3_email || thisCityManager_3_position || thisCityManager_3_fio) {
			ContactBlockManager3.push('<div class="_mb30">');
				if(thisCityManager_3_phone || thisCityManager_3_email) {
					ContactBlockManager3.push('<h3>')
					if(thisCityManager_3_phone) {
						
						ContactBlockManager3.push('<a href="tel:' + thisCityManager_3_phone + '">' + thisCityManager_3_phone + '</a> /');
					}
					if(thisCityManager_3_email) {
						ContactBlockManager3.push('<strong class="_text-red"><a href="mailto:'+ thisCityManager_3_email + '">' + thisCityManager_3_email + '</a></strong>');
					}
					ContactBlockManager3.push('</h3>')
				}
				if(thisCityManager_3_position || thisCityManager_3_fio) {
					ContactBlockManager3.push('<small>');
					if(thisCityManager_3_position) {
						ContactBlockManager3.push(thisCityManager_3_position);
					}
					if(thisCityManager_3_fio) {
						ContactBlockManager3.push(', ' + thisCityManager_3_fio);
					}
					ContactBlockManager3.push('</small>');
				}
			ContactBlockManager3.push('</div>');
			
			cityContactBlock.push(ContactBlockManager3.join(''));
		}

		// PUSHING SOCIALS

		if(thisCityFb_link || thisCityVk_link || thisCityIg_link || thisCityTw_link || thisCityYt_link) {
			ContactBlockSocial.push('<div class="b-social">');

			// FB link
			if(thisCityFb_link) {
				ContactBlockSocial.push('<a class="_facebook" href="');
				ContactBlockSocial.push(thisCityFb_link);
				ContactBlockSocial.push('" target="_blank"><i class="fa fa-facebook"></i></a>');
			}

			// VK link
			if(thisCityVk_link) {
				ContactBlockSocial.push('<a class="_vkontakte" href="');
				ContactBlockSocial.push(thisCityVk_link);
				ContactBlockSocial.push('" target="_blank"><i class="fa fa-vk"></i></a>');
			}

			// IG link
			if(thisCityIg_link) {
				ContactBlockSocial.push('<a class="_instagram" href="');
				ContactBlockSocial.push(thisCityIg_link);
				ContactBlockSocial.push('" target="_blank"><i class="fa fa-instagram"></i></a>');
			}

			// TW link
			if(thisCityTw_link) {
				ContactBlockSocial.push('<a class="_twitter" href="');
				ContactBlockSocial.push(thisCityTw_link);
				ContactBlockSocial.push('" target="_blank"><i class="fa fa-twitter"></i></a>');
			}

			// YT link

			if(thisCityYt_link) {
				ContactBlockSocial.push('<a class="_youtube" href="');
				ContactBlockSocial.push(thisCityYt_link);
				ContactBlockSocial.push('" target="_blank"><i class="fa fa-youtube"></i></a>');
			}

			ContactBlockSocial.push('</div>');
			cityContactBlock.push(ContactBlockSocial.join(''));
		}
		
		$('.js-footer-contact-info').html(cityContactBlock.join(''));
	}
	
	$('.nl-form ul li').click(function(){
		setTimeout(function(){
			$('.js-footer-contact-info').empty();
			buildingContactInfo();
		}, 20);
	});
	
	// MAIN PAGE COURSES FILTER FORM

	$('#courses-filter-form ul li').click(function() {

		var thisCourseColor = $('#course-direction').find(':selected').attr('data-color');
		$('#courses-filter-form .js-course-recoloring .nl-field-toggle').css('color', thisCourseColor);

		// Sending filter reques
		var filteredCityId = $('#city-id').val();
		var filteredCourseId = $('#course-direction').val();

		var thisFormAction = $('#courses-filter-form').attr('action');

		var courseFilterRequest = $.ajax({
			method: "POST",
			url: thisFormAction,
			data: { city: filteredCityId, course: filteredCourseId }
		})

		courseFilterRequest.done(function(data) {
			if(data.status) {
				// Response courses array
	        	var coursesArray = [];
				$.map(__SITE.filteredDirections, function(value, index) {
				    coursesArray.push(value);
				});

				var thisCourse = __SITE.filteredDirections[curentCity],
					thisCourseName = thisCourse['name'] || false,
					thisCourseId = thisCourse['id'] || false,
					thisCourseDate_start = thisCourse['date_start'] || false,
					thisCourseDate_stop = thisCourse['date_stop'] || false,
					thisCourseDic_id = thisCourse['dic_id'] || false,
					thisCourseCity_id = thisCourse['city_id'] || false,
					thisCourseType_id = thisCourse['type_id'] || false,
					thisCourseDate_start = thisCourse['date_start'] || false,
					thisCourseDate_stop = thisCourse['date_stop'] || false,
					thisCourseWeekdays = thisCourse['weekdays'] || false,
					thisCoursePrice = thisCourse['price'] || false,
					thisCourseTeacher_id = thisCourse[''] || false,
					thisCourseDirection_id = thisCourse['direction_id'] || false,
					thisCourseDiscounts = thisCourse['discounts'] || false,
					thisCourseBlockquote = thisCourse['blockquote'] || false,
					thisCourseFor_who = thisCourse['for_who'] || false,
					thisCourseResult = thisCourse['result'] || false,
					thisCourseShort = thisCourse['short'] || false;

				// Filtered courses formation
				if(thisCourseName) {
					var i = 0,
						fiveFirstCourses = [];

					$.each(coursesListItem, function(){
						if(i < 5) {
							var coursesListItem =[],
								allCoursesButton = $('a.b-courses__link _all').clone();

							if(thisCourseName) {
								coursesListItem.push('<li class="text-center _mb30 col-sm-6 col-md-4" data-equalheight="" style="height: 180px;">');
								coursesListItem.push('<a href="' +  + '" class="b-courses__link" style="background-color: ' + thisCourseColor + ';">');
								if(thisCourseName){
									coursesListItem.push('<span class="h3"><strong>' + thisCourseName + '</strong></span>');
								}
								if(thisCourseShort){
									coursesListItem.push('<span class="h3"><strong>' + thisCourseShort + '</strong></span>');
								}

								if(thisCourseDate_start){
									coursesListItem.push('<time class="h5">' + thisCourseDate_start);
									if(thisCourseDate_stop) {
										coursesListItem.push(' — ' + thisCourseDate_start + '</time></a></li>');
									} else {
										coursesListItem.push('</time></a></li>');
									}
								}
								
								fiveFirstCourses.push(coursesListItem.join(''));

							}
							i++;
						}
					});
				}

				$('#filtered-course').empty();
				$('#filtered-course').prepend(fiveFirstCourses.join(''));
				$('#filtered-course').append(allCoursesButton);
			}
		});

		courseFilterRequest.fail(function() {
			console.log('Серверная ошибка');
		})
	});

	// COURSE FORM VALIDATION

	$('.course-form-holder form').validate({
        rules: {
            name: {
                required: true,
            },
            email: {
                required: true,
                email: true,
            },
            phone: {
                required: true,
            },
        },

        messages: {
            name: {
                required: 'Необходимо заполнить поле!',
            },
            email: {
                required: 'Необходимо заполнить поле!',
                email: 'Неверный адрес!',
            },
            phone: {
                required: 'Укажите ваш телефон!',
            },
        },
        submitHandler: function (form) {
            var options = {
                success: function (data) {
                    console.log('success')
                },
                error: function (data) {
                    console.log('server error')
                }
            };
            $(form).ajaxSubmit(options);
        }
    });

    // SELECT COURSE FORM VALIDATION

    $('form#course-select').validate({
        rules: {
            name: {
                required: true,
            },
            email: {
                required: true,
                email: true,
            },
            phone: {
                required: true,
            },
        },

        messages: {
            name: {
                required: 'Необходимо заполнить поле!',
            },
            email: {
                required: 'Необходимо заполнить поле!',
                email: 'Неверный адрес!',
            },
            phone: {
                required: 'Укажите ваш телефон!',
            },
        },
        submitHandler: function (form) {
						$(form).find('button[type="submit"]').prop('disabled', true);
						$(form).find('button[type="submit"]').attr('disabled', true);
					
            var options = {
                success: function (data) {
                    $('form#course-select').slideUp();
                    $('.form-holder h2._cta').fadeOut();
                    $('.form-holder .form-success').slideDown();
                    $('.form-holder .form-success h2._cta').fadeIn();
                },
                error: function (data) {
                    console.log('server error')
                }
            };
            $(form).ajaxSubmit(options);
        }
    });

    // DIRECT COURSE FORM VALIDATION

    $('form#curent-course-form').validate({
        rules: {
            name: {
                required: true,
            },
            email: {
                required: true,
                email: true,
            },
            phone: {
                required: true,
            },
        },

        messages: {
            name: {
                required: 'Необходимо заполнить поле!',
            },
            email: {
                required: 'Необходимо заполнить поле!',
                email: 'Неверный адрес!',
            },
            phone: {
                required: 'Укажите ваш телефон!',
            },
        },
        submitHandler: function (form) {
            var options = {
                success: function (data) {
                    console.log('success')
                },
                error: function (data) {
                    console.log('server error')
                }
            };
            $(form).ajaxSubmit(options);
        }
    });

    // COMUNITY TABS

	$('#tabs-head h3 a').click(function(){
		var linkParent = $(this).parent().parent();
		var tabBlock = $('[data-name="' + $(this).attr('href').substr(1) + '"]');
		linkParent.addClass('_text-red')
			.siblings().removeClass('_text-red');
		tabBlock.fadeIn()
			.siblings().fadeOut();
		return false;
	});

	// Active tab link
	function parseHash() {
        var hash = window.location.hash;
        if (hash == '#tab_blog') {
            $('#tab_blog').fadeIn();
            $('#tab_blog').siblings().fadeOut();
        }

        if (hash == '#tab_events') {
            $('#tab_events').fadeIn();
            $('#tab_events').siblings().fadeOut();
        }
        
        if (hash == '#tab_social') {
            $('#tab_social').fadeIn();
            $('#tab_social').siblings().fadeOut();
        }
    }
    parseHash();

    // JCOROUSEL TEACHERS
    
    $('.jcarousel').on('jcarousel:create jcarousel:reload', function() {
        var element = $(this),
            width = element.innerWidth();
    })



    .jcarousel({

    });

    //Responsive carousel
    function resizeCarousel() {
    	                var width = $('.jcarousel').innerWidth();
    	                var cof = 4;

    	                if (width >= 1900) {
    	                    cof = 4;
    	                    
    	                } else if (width <= 1224) {
    	                    cof = 3;
    	                    
    	                    if (width <= 1000) {
    	                	cof = 2;
    	                    
	    	                }
	    	                if (width <= 600) {
	    	                	cof = 1;
	    	                }
    	                }

    	$('.js-cElement').css({
    		width: $('.jcarousel').width()/cof
    	});
    	$('.js-cImage').css({
    		height: $('.jcarousel').width()/cof -20
    	});
    }
    $(window).on('resize', resizeCarousel);
    resizeCarousel();

	$('.jcarousel-nav-bar .arrow-left').click(function() {
	    $('.jcarousel').jcarousel('scroll', '-=3');
	});

	$('.jcarousel-nav-bar .arrow-right').click(function() {
	    $('.jcarousel').jcarousel('scroll', '+=3');
	});

	//Responsive teachers list
	function resizeTeachersList() {
		var teachersListItemSize = $('.b-teachers__list').width()/4 -20;
    	$('.teacher-list-avatar').css({
    		height: teachersListItemSize,
    		width: teachersListItemSize
    	});
    }
    $(window).on('resize', resizeTeachersList);
    resizeTeachersList();
    $('.b-teachers__list')

	// SMOOTH SCROLL
	//	var slugs = [kreativ, strategiya, prodyusirovanie, art-direkshn, media, menedjment]
	// $(function() {
	// 	$('.course-slug-jumper nl-field ul li').click(function() {
	// 		var target = $('section').attr('name');
	// 			$('html,body').animate({
	// 				scrollTop: target.offset().top
	// 			}, 1000);
	//     	return false;
	// 	});
	// });

	$(".course-slug-jumper ul li").click(function() {
	    $('html, body').animate({
	        scrollTop: 1030
	    }, 1000);
	});

	$('[data-nl]').on('click', '.nl-field ul li', function(){
		$(this).parents('.nl-field').first().next('select').trigger('change');
	});

	// TEACHERS FILTER RE-COLORING
	$('#teachers-filter-form ul li').click(function() {
		var teacherCourseColor = $('#derection-teacher').find(':selected').attr('data-color');
		$('#teachers-filter-form .js-course-recoloring .nl-field-toggle').css('color', teacherCourseColor);
	});


	// TEACHERS OVERKILL FILTER

	var defaultTeachers = $('ul.b-teachers__list').html();

	$('.js-teach-select').on('change', function(){
		$('ul.b-teachers__list').empty();

		var imgPath = __SITE.img_path_full,
		imgThumbPath = __SITE.img_path_thumb;

		var cityId = $('#teacher-city').val();
		var subjectId = $('[name="teach-subject"]').val();
		console.log('City: ' + cityId + '; Subject: ' + subjectId);

		// TEACHERS OBJECT DISMEMBERMENT

		var teachersArray = [];
		$.map(__SITE.teachers, function(value, index) {
			teachersArray.push(value);
		});

		var teachersSortArray = [];
		$.each(__SITE.teachers, function(i, v){
			var thisTeacherCity = $('#teacher-city').val(),
				thisTeacherDirection = $('#derection-teacher').val();
			
			function sortedTeachers() {
				var thisTeacherId = v['id'] || false,
					thisTeacherName = v['name'] || false,
					thisTeacherAvatar = v.avatar || false,
					thisTeacherPosition = v['position'] || false,
					thisTeacherCompany = v['company'] || false;

				teachersSortArray.push('<li class="col-sm-4 _mb70">');
				teachersSortArray.push('<a href="/teachers/' + thisTeacherId + '" class="_block _mb20">');
				teachersSortArray.push('<img src="' + imgPath + '/' + thisTeacherAvatar.name + '" alt="' + thisTeacherName + '">');
				teachersSortArray.push('</a>');
				teachersSortArray.push('<h3 class="_mb5">' + thisTeacherName + '</h3>');
				teachersSortArray.push('<div class="_block _mb10">' + thisTeacherPosition + ', ' + thisTeacherCompany + '</div>');
				teachersSortArray.push('<div class="text-right">');
				teachersSortArray.push('<a class="btn btn-readmore" href="/teachers/' + thisTeacherId + '">Подробнее</a>');
				teachersSortArray.push('</div>');
				teachersSortArray.push('</li>');

				$('ul.b-teachers__list').empty();
				$('ul.b-teachers__list').append(teachersSortArray.join(''));
			}

			if(v.city_id == thisTeacherCity && v.direction == thisTeacherDirection) {
				sortedTeachers();
			}

			if(subjectId == 0 && v.city_id == thisTeacherCity){
				sortedTeachers();
			}
		});
	});
	
	// SHOW ALL BLOSK'S TEACHERS

	// $('.b-primary__all-teachers .btn').click(function(){
	// 	var BlockTeachersArray = [];
	// 	$.map(__SITE.teachers, function(value, index) {
	// 		BlockTeachersArray.push(value);
	// 	});

	// 	var teachersBlockArray = [];
	// 	$.each(__SITE.teachers, function(i, v){
	// 		var thisTeacherCity = $('#teacher-city').val(),
	// 			thisTeacherDirection = $('#derection-teacher').val();
	// })

});