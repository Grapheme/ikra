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
		$(".owl-carousel").owlCarousel(
		{
			nav: true,
			navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
			dots: false,
			loop: true,
			slideSpeed: 300,
			items: 4,
			responsive :
			{
				0 : {items: 1 },
				480 : {items: 2 },
				1024 : {items: 3 },
				1280 : {items: 4 }
			}
		});
	})();



});