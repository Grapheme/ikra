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






});
