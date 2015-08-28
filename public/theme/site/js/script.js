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
		$('[data-nl]').each(function(index, element)
		{
			var nlform = new NLForm($(element)[0]),
				$this = $(this);
		});
	})();
	

	

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









	// Видео в шапке
	(function VideoHeader()
	{
		if (typeof $.fn.mb_YTPlayer != "undefined")
		{
			$("#videoheader").mb_YTPlayer();
		}
	})();







	// Анимация смены текста
	// (function Typed()
	// {

	// 	$('.element').typed(
	// 		{
	// 			strings: ["Digital-креатор", "Digital-стратег", "Креативный копирайтер", "Digital-продюсер"],
	// 			typeSpeed: 0,
	// 			showCursor: false
	// 			// backDelay: 3000 // pause before backspacing
	// 		});
	// })();

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
			thisCityName = thisCity['name'] || null,
			thisCityId = thisCity['id'] || null,
			thisCityAddress = thisCity['address'] || 'Адрес не указан',
			thisCityLat = thisCity['lat'] || null,
			thisCityLng = thisCity['lng'] || null,
			thisCityManager_1_fio = thisCity['Manager_1_fio'],
		    thisCityManager_1_position = thisCity['Manager_1_position'],
		    thisCityManager_1_phone = thisCity['Manager_1_phone'],
		    thisCityManager_1_email = thisCity['Manager_1_email'],
		    thisCityManager_2_fio = thisCity['Manager_2_fio'],
		    thisCityManager_2_position = thisCity['Manager_2_position'],
		    thisCityManager_2_phone = thisCity['Manager_2_phone'],
		    thisCityManager_2_email = thisCity['Manager_2_email'],
		    thisCityManager_3_fio = thisCity['Manager_3_fio'],
		    thisCityManager_3_position = thisCity['Manager_3_position'],
		    thisCityManager_3_phone = thisCity['Manager_3_phone'],
		    thisCityManager_3_email = thisCity['Manager_3_email'],
		    thisCityFb_link = thisCity['fb_link'],
		    thisCityVk_link = thisCity['vk_link'],
		    thisCityIg_link = thisCity['ig_link'],
		    thisCityTw_link = thisCity['tw_link'],
		    thisCityYt_link = thisCity['yt_link'];

		$('.b-footer__map > div').html('<div class="b-footer__map-text-valign h4">' + thisCityName + '<br>' + thisCityAddress + '</div>');
		$('input#city_id').val(thisCityId);

		if(thisCityLat != null && thisCityLat != null) {
			$('.b-footer__map').attr('data-lat', thisCityLat);
			$('.b-footer__map').attr('data-lng', thisCityLng);
			mapInit();
		} else {
			$('#footer_gmap').text('Адрес не указан');
		}

		// BUILDING CONTACT INFO

		var cityContactBlock = [],
			ContactBlockManager1 = [],
			ContactBlockManager2 = [],
			ContactBlockManager3 = [],
			ContactBlockSocial = [];

			ContactBlockManager1.push('<div class="_mb30"><h3>');
			ContactBlockManager1.push(thisCityManager_1_phone);
			ContactBlockManager1.push(' /<strong class="_text-red"><a href="mailto:');
			ContactBlockManager1.push(thisCityManager_1_email);
			ContactBlockManager1.push('">');
			ContactBlockManager1.push(thisCityManager_1_email);
			ContactBlockManager1.push('</a></strong></h3><small>');
			ContactBlockManager1.push(thisCityManager_1_position);
			ContactBlockManager1.push(', ');
			ContactBlockManager1.push(thisCityManager_1_fio);
			ContactBlockManager1.push('</small></div>');
			
			ContactBlockManager1.join('');
			cityContactBlock.push(ContactBlockManager1);

			ContactBlockManager2.push('<div class="_mb30"><h3>');
			ContactBlockManager2.push(thisCityManager_2_phone);
			ContactBlockManager2.push(' /<strong class="_text-red"><a href="mailto:');
			ContactBlockManager2.push(thisCityManager_2_email);
			ContactBlockManager2.push('">');
			ContactBlockManager2.push(thisCityManager_2_email);
			ContactBlockManager2.push('</a></strong></h3><small>');
			ContactBlockManager2.push(thisCityManager_2_position);
			ContactBlockManager2.push(', ');
			ContactBlockManager2.push(thisCityManager_2_fio);
			ContactBlockManager2.push('</small></div>');
			
			ContactBlockManager2.join('');
			cityContactBlock.push(ContactBlockManager2);

			ContactBlockManager3.push('<div class="_mb30"><h3>');
			ContactBlockManager3.push(thisCityManager_3_phone);
			ContactBlockManager3.push(' /<strong class="_text-red"><a href="mailto:');
			ContactBlockManager3.push(thisCityManager_3_email);
			ContactBlockManager3.push('">');
			ContactBlockManager3.push(thisCityManager_3_email);
			ContactBlockManager3.push('</a></strong></h3><small>');
			ContactBlockManager3.push(thisCityManager_3_position);
			ContactBlockManager3.push(', ');
			ContactBlockManager3.push(thisCityManager_3_fio);
			ContactBlockManager3.push('</small></div>');
			
			ContactBlockManager3.join('');
			cityContactBlock.push(ContactBlockManager3);

			// VK link
			ContactBlockSocial.push('<div class="b-social"><a class="_facebook" href="');
			ContactBlockManager3.push(thisCityFb_link);
			ContactBlockManager3.push('" target="_blank"><i class="fa fa-facebook"></i></a>');

			// FB link
			ContactBlockSocial.push('<div class="b-social"><a class="_vkontakte" href="');
			ContactBlockManager3.push(thisCityVk_link);
			ContactBlockManager3.push('" target="_blank"><i class="fa fa-vk"></i></a>');

			// IG link
			ContactBlockSocial.push('<div class="b-social"><a class="_instagram" href="');
			ContactBlockManager3.push(thisCityVk_link);
			ContactBlockManager3.push('" target="_blank"><i class="fa fa-instagram"></i></a>');

			// TW link
			ContactBlockSocial.push('<div class="b-social"><a class="_twitter" href="');
			ContactBlockManager3.push(thisCityVk_link);
			ContactBlockManager3.push('" target="_blank"><i class="fa fa-twitter"></i></a>');

			// YT link
			ContactBlockSocial.push('<div class="b-social"><a class="_youtube" href="');
			ContactBlockManager3.push(thisCityVk_link);
			ContactBlockManager3.push('" target="_blank"><i class="fa fa-youtube"></i></a>');
			
			ContactBlockSocial.join('');
			cityContactBlock.push(ContactBlockSocial)
			
			$('.col-md-6 ._mb30').html(cityContactBlock);

	});

});
