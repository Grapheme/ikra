/* требует, чтобы у элементов был общий родитель */
(function EqualHeightSiblings()
{

	// Equal height columns
	// A fork of Micah Godbolt's original pen:
	// http://codepen.io/micahgodbolt/pen/FgqLc

	// Adapted by Matt Hill to not use jQuery
	// For IE8+ - older browsers will get ragged columns

	// If we need any small jQuery functionality replicated, we
	// can use some vanilla JS, in IE8 and above
	// http://youmightnotneedjquery.com/ 

	// Replicate jQuery .height method
	function outerHeight(el, includeMargin){
		var height = el.offsetHeight;

		if(includeMargin){
			var style = el.currentStyle || getComputedStyle(el);
			height += parseInt(style.marginTop) + parseInt(style.marginBottom);
		} 
		return height;
	}
	// Replicate jQuery .each method
	function forEachElement(selector, fn) {
		var elements = document.querySelectorAll(selector);
		for (var i = 0; i < elements.length; i++)
			fn(elements[i], i);
	}


	equalheight = function(container){

		var currentTallest = 0,
		currentRowStart = 0,
		rowDivs = new Array(),
		el,	topPosition = 0;

		// Loop for each container element to match their heights
		forEachElement(container, function(el, i){

			el.style.height = 'auto';
			topPosition = el.offsetTop;

			if (currentRowStart != topPosition) {
				for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
			 		rowDivs[currentDiv].style.height = currentTallest + "px";
				}
				rowDivs.length = 0; // empty the array
				currentRowStart = topPosition;
				currentTallest = outerHeight(el, false);
				rowDivs.push(el);
			} else {
				rowDivs.push(el);
				currentTallest = (currentTallest < outerHeight(el, false)) ? (outerHeight(el, false)) : (currentTallest);
			}
			for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
				rowDivs[currentDiv].style.height = currentTallest + "px";
			}
		});

	}
	window.onload = function() {
		equalheight('[data-equalheight]');
	};

	var timer = null,
		callback = function()
		{
			equalheight('[data-equalheight]');
		},
		start = function()
		{
			if (timer) clearTimeout(timer);
			timer = setTimeout(callback, 300);
		};

	window.onresize = start;

})();









/* не требует, чтобы у элементов был общий родитель */
function EqualHeightAny(selector)
{
	if (typeof $ == "undefined") return;

	var M = [];
	$(selector)
		.each(function(index, el){ M.push($(el).height()) })
		.height(Math.max.apply(Math,M))
};