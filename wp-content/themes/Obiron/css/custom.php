<?php
	header("Content-type: text/css;");
	
	if( file_exists('../../../../wp-load.php') ) :
		include '../../../../wp-load.php';
	else:
		include '../../../../../wp-load.php';
	endif;
?>

<?php
	// Styles	
	$primary 	= ft_of_get_option('fabthemes_primary_color','#769A38');
	$secondary	= ft_of_get_option('fabthemes_secondary_color','');
	$link 		= ft_of_get_option('fabthemes_link_color','');
	$hover 		= ft_of_get_option('fabthemes_hover_color','');
	
?>

#review-slider .review-item .review-data .categories a,
.entry-header .entry-meta span.category a,
.category-stories .cat-blocks .category-entry-content .category a,
.category-stories .cat-blocks .widgpic .scorebox,
.entry-header .entry-meta span.comments,
.postpic a.popup-video,
.postpic .scorebox,
.footer-slider,.review-box h3,
.review-box .review-bars ul li span.rbar .score,
.category-stories .cat-blocks .widgpic a.popup-video,
#comments #respond p.form-submit input,
.paginate .navigation li a:hover, .paginate .navigation li.active a{
	background: <?php echo $primary ?>!important;
}

#secondary .widget h1.widget-title,
#comments h2.comments-title,
#secondary .squarebanner h3.sidetitl,
#comments #respond p.form-submit input{
	border-color:<?php echo $primary ?>!important;
}
.footer-slider .row .callout-button a{
	color:<?php echo $primary ?>!important;
}

#footer-widgets{
	background: <?php echo $secondary ?>!important;
}


/* Links */

a:link, a:visited {
	color: <?php echo $link ?>;
}

a:hover,
a:focus,
a:active {
	color:<?php echo $hover ?>;
	text-decoration: none;
}


