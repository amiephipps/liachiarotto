$(function(){

	console.log("It's working! I love when it works!");

	$("#tabs").tabs();

	$('header .siteMenu li a').addClass('hvr-underline-reveal');

	$('.hamburger').on('click', function() {
		$('.siteMenu').toggle("slide", { direction: "up" }, 500);
	});

	$(document).on( 'keydown', function (e) {
	    if ( e.keyCode === 27 ) { // ESC
	        $('.siteMenu').hide();
	    }
	});

	// $(document).on('click', function(event) {
	//   if (!$(event.target).closest('.siteMenu').length) {
	//     $('.siteMenu').hide();
	//   }
	// });

});