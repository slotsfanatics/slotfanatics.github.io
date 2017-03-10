jQuery(document).ready(function() {

	 jQuery("#obiron").slicknav({
 		prependTo :'.resmenu',
 		allowParentLinks:true,

	 });

	jQuery('#review-slider').owlCarousel({
		items : 4,
		itemsDesktop : [1199,4],
		itemsDesktopSmall : [980,3],
		itemsTablet: [768,2],
		itemsTabletSmall: false,
		itemsMobile : [479,1],
		navigation :true,
		autoPlay : true,
		stopOnHover : true,
	});	

	jQuery("#media-box").fitVids();

	jQuery('.popup-video').magnificPopup({
		disableOn: 700,
		type: 'iframe',
		mainClass: 'mfp-fade',
		removalDelay: 160,
		preloader: false,
		fixedContentPos: false
	});	


});

