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
	(function NaturalLanguageSelectbox()
	{
		$('[data-nl]').each(function() {
			var nlform = new NLForm($(this)[0]);
		});
	})();

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

	// Анимация смены текста
	// function Typed() {
	// 	$('._max-text').typed(
	// 		{
	// 			strings: ["Digital-креатор", "Digital-стратег", "Креативный копирайтер", "Digital-продюсер", "Digital-креатор", "Digital-стратег", "Креативный копирайтер", "Digital-продюсер", "Digital-креатор", "Digital-стратег", "Креативный копирайтер", "Digital-продюсер"],
	// 			typeSpeed: 0,
	// 			showCursor: false,
	// 			backDelay: 3000 // pause before backspacing
	// 		});
	// }();

	// var currentTime = 0,
	// 	proTimeOut = 100;

	// function proRollOut(eq, time) {
	// 	setTimeout(function(){
	// 		$('.sliding-profession').eq(eq).animate(
	// 			{ "left": "-=110%" }, {
	// 				complete: function () {
	// 					$this.css('opacity', '0')
	// 				}
	// 					// .animate(
	// 					// 	{ "right": "-=110%" }, {
	// 					// 		complete: function () {
	// 					// 			$this.css('opacity', '1').animate(
	// 					// 				{ "right": "inherit" }, 1000);
	// 					// 		}, 1000);
	// 						}, 1000);
	// 				}
	// 			}, 1000)
	// 	}, time);
	// }

	// setTimeout(function () {
	// 	for(var i = 0; i < $('.sliding-profession').length; i++) {
	// 		proRollOut(i, i*proTimeOut);
	// 	};
	// }, 3000);

	function showAnimation(block) {
		block.addClass('pro-transition pro-transformLeft');
		setTimeout(function(){
			block.removeClass('pro-transition');
			setTimeout(function(){
				block.removeClass('pro-transformLeft');
				block.addClass('pro-transformRight');
				setTimeout(function(){
					block.addClass('pro-transition');
					block.removeClass('pro-transformRight');
				}, 50);
			}, 50);
		}, 510);
	}

	function timeoutShow(eq) {
		if(!$('.sliding-profession').eq(eq).length) return;
		showAnimation($('.sliding-profession').eq(eq));
		setTimeout(function(){
			timeoutShow(eq+1);
		}, 300);
	}

	function animationLoop() {
		timeoutShow(0);
		setTimeout(function(){
			animationLoop();
		}, 5000);
	}
	animationLoop();
	
	

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
		});
	}

	google.maps.event.addDomListener(window, 'load', mapInit);

	// CITIES OBJECT DISMEMBERMENT

	var citiesArray = [];
	$.map(__SITE.cities, function(value, index) {
	    citiesArray.push(value);
	});
	
	$('.nl-form ul li').click(function() {
		var curentCity = $('#city_selection').val(),
			thisCity = __SITE.cities[curentCity],
			thisCityName = thisCity['name'] || false,
			thisCityId = thisCity['id'] || false,
			thisCityAddress = thisCity['address'] || 'Адрес не указан',
			thisCityLat = thisCity['lat'] || false,
			thisCityLng = thisCity['lng'] || false,
			thisCityManager_1_fio = thisCity['Manager_1_fio'] || false,
		    thisCityManager_1_position = thisCity['Manager_1_position'] || false,
		    thisCityManager_1_phone = thisCity['Manager_1_phone'] || false,
		    thisCityManager_1_email = thisCity['Manager_1_email'] || false,
		    thisCityManager_2_fio = thisCity['Manager_2_fio'] || false,
		    thisCityManager_2_position = thisCity['Manager_2_position'] || false,
		    thisCityManager_2_phone = thisCity['Manager_2_phone'] || false,
		    thisCityManager_2_email = thisCity['Manager_2_email'] || false,
		    thisCityManager_3_fio = thisCity['Manager_3_fio'] || false,
		    thisCityManager_3_position = thisCity['Manager_3_position'] || false,
		    thisCityManager_3_phone = thisCity['Manager_3_phone'] || false,
		    thisCityManager_3_email = thisCity['Manager_3_email'] || false,
		    thisCityFb_link = thisCity['fb_link'] || false,
		    thisCityVk_link = thisCity['vk_link'] || false,
		    thisCityIg_link = thisCity['ig_link'] || false,
		    thisCityTw_link = thisCity['tw_link'] || false,
		    thisCityYt_link = thisCity['yt_link'] || false;

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
		
		$('.col-md-6 ._mb30').html();
		$('.col-md-6 ._mb30').html(cityContactBlock.join(''));
	});
	
	// MAIN PAGE COURSES FILTER FORM

	$('#courses-filter-form ul li').click(function() {

		var thisCourseColor = $('#course-direction').find(':selected').attr('data-color');
		$('#courses-filter-form .nl-field-toggle').css('color', thisCourseColor);

		// Sending filter reques
		$('#courses-filter-form').validate({
	        submitHandler: function (form) {
	            var options = {
	                success: function (data) {

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

						$('#filtered-course').html('');
						$('#filtered-course').prepend(fiveFirstCourses.join(''));
						$('#filtered-course').append(allCoursesButton);
					},

					error: function (data) {
						console.log('Серверная ошибка');
					}
				};
				$(form).ajaxSubmit(options);
			}
		});
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

    // DIRECT COURSE FORM VALIDATION

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
    $(function() {
	    $('.jcarousel').jcarousel({
	        // Configuration goes here
	    });
	});

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
		$('#teachers-filter-form .nl-field-toggle').css('color', teacherCourseColor);
	});

	// TEACHERS OVERKILL FILTER
	$('.js-teach-select').on('change', function(){
		$('ul.b-teachers__list').html();
		var cityId = $('#teacher-city').val();
		var subjectId = $('[name="teach-subject"]').val();
		console.log('City: ' + cityId + '; Subject: ' + subjectId);

		// TEACHERS OBJECT DISMEMBERMENT
		var teachersArray = [];
		$.map(__SITE.teachers, function(value, index) {
			teachersArray.push(value);
		});

		var thisTeacherCity = $('#teacher-city').val(),
			thisTeacherDirection = $('#derection-teacher').val();

		var teachersSortArray = [];
		$.each(__SITE.teachers, function(i, v){
			if(v.city_id == thisTeacherCity && v.direction == thisTeacherDirection) {
				teachersSortArray.push('<li class="col-sm-4 _mb70">');

				

				teachersSortArray.push('</li>');
			}
		});
		console.log(teachersSortArray);

	});

});