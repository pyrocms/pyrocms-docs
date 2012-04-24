/* 
 * Author: Scott Parry - iKreativ
*/

jQuery(document).ready(function($) {
	
	// Control Bar
(function() {

	//settings
	var fadeSpeed = 200, fadeTo = 0.6, topDistance = 30;
	var topbarME = function() { $('.topbar').fadeTo(fadeSpeed,1); }, topbarML = function() { $('.topbar').fadeTo(fadeSpeed,fadeTo); };
	var inside = false;

	//do
	$(window).scroll(function() {
		position = $(window).scrollTop();
		
		if(position > topDistance && !inside) {

			//add events
			topbarML();
			$('.topbar').bind('mouseenter',topbarME);
			$('.topbar').bind('mouseleave',topbarML);
			inside = true;
		}

		else if (position < topDistance) {
			topbarME();
			$('.topbar').unbind('mouseenter',topbarME);
			$('.topbar').unbind('mouseleave',topbarML);
			inside = false;
		}
	});
})();
	
// Select menu for smaller screens
$("<select />").appendTo("nav");

// Create default option "Menu"
$("<option />", {
   "selected": "selected",
   "value"   : "",
   "text"    : "Menu"
}).appendTo("nav select");

// Populate dropdown with menu items
$("nav a").each(function() {
 var el = $(this);
 $("<option />", {
     "value"   : el.attr("href"),
     "text"    : el.text()
 }).appendTo("nav select");
});

$("nav select").change(function() {
  window.location = $(this).find("option:selected").val();
});

// Tipsy
$('.tooltip').tipsy({
	gravity: $.fn.tipsy.autoNS,
	fade: true,
	html: true
});

$('.tooltip-s').tipsy({
	gravity: 's',
	fade: true,
	html: true
});

$('.tooltip-e').tipsy({
	gravity: 'e',
	fade: true,
	html: true
});

$('.tooltip-w').tipsy({
	gravity: 'w',
	fade: true,
	html: true
});

// Prettyprint
//$('pre').addClass('prettyprint linenums');

});