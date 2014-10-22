/*
 * Copyright albertaroseeducation.com
 * All rights reserved.
 */


$(function() {
	if (window.matchMedia("(min-width: 768px)").matches) {
	} else {
		/* the view port is less than 400 pixels wide */
		alert('hello');
	}

	// set navbar to affix if on large screen
	var tableSize = window.matchMedia("(min-width: 768px)");
	tableSize.addListener(handleWidthChange);
	handleWidthChange(tableSize);

	// enable scrollspy for nav
	$('body').scrollspy({
		target: '.side-navbar'
	});


});

function handleWidthChange(tableSize) {
	if (tableSize.matches) {
		// affix side nav menu
		$('#servNav').affix({
			offset: {top: $('#servNav').offset().top}
		});
	} else {
		// remove affix
		$(window).off('.affix');
		$("#servNav")
				  .removeClass("affix affix-top affix-bottom")
				  .removeData("bs.affix");
	}
}