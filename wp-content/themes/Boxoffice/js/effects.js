jQuery(document).ready(function() {

jQuery('.squarebanner ul li:nth-child(even)').addClass('rbanner');

/* scorebar animation */

jQuery(".scorebar").hide();

jQuery(window).load(function()  {
jQuery('.scorebar').animate({width: "toggle", opacity: "toggle"});

});


/* Navigation */
jQuery('#submenu ul.sfmenu').superfish({ 
		delay:       500,								// 0.1 second delay on mouseout 
		animation:   {opacity:'show',height:'show'},	// fade-in and slide-down animation 
		dropShadows: true								// disable drop shadows 
	});	

/* Prettyphoto */
  
		jQuery("a[rel^='prettyPhoto']").prettyPhoto({theme: 'pp_default',overlay_gallery: true });


/* image overlay */

jQuery('.mposter').hover( function() {
			jQuery(this).find('.boximg').animate({ opacity: 0.7 }, 300);
			jQuery(this).find('.overlay').fadeIn(150);
		
			}, function() {
		
			jQuery(this).find('.overlay').fadeOut(150);
			jQuery(this).find('.boximg').animate({ opacity: 1.0 }, 300);
		});	
		
});
