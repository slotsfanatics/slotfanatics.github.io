<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package fabthemes
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">


	<header id="masthead" class="site-header" role="banner">

		<div class="top-bar">
			<div class="container"> <div class="row">
				<div class="col-md-6">
					<span class="email"> 
						<i class="fa fa-envelope-o"></i> <?php echo ft_of_get_option('fabthemes_email','mymail@email.com');?>
					</span>
					<span class="phone">
						<i class="fa fa-phone"></i> <?php echo ft_of_get_option('fabthemes_phone','123456789');?>
					</span>
					<span class="skype">
						<i class="fa fa-skype"></i> <?php echo ft_of_get_option('fabthemes_skype','myskypeid');?>
					</span>
				</div>
				<div class="col-md-6">
					<ul class="social">
						<li> <a href="<?php echo ft_of_get_option('fabthemes_twitter','twitter');?>"><i class="fa fa-twitter"></i></a></li>
						<li> <a href="<?php echo ft_of_get_option('fabthemes_facebook','facebook');?>"><i class="fa fa-facebook"></i></a></li>
						<li> <a href="<?php echo ft_of_get_option('fabthemes_gplus','gplus');?>"><i class="fa fa-google-plus"></i></a></li>
						<li> <a href="<?php echo ft_of_get_option('fabthemes_linkedin','linkedin');?>"><i class="fa fa-linkedin"></i></a></li>
						<li> <a href="<?php echo ft_of_get_option('fabthemes_youtube','youtube');?>"><i class="fa fa-youtube"></i></a></li>
					</ul>
				</div>
			</div></div>
			
		</div>

		<div class="head">
			<div class="container"> <div class="row"> 
				<div class="col-md-6">
					<div class="site-branding">
						
	<?php if (get_theme_mod(FT_scope::tool()->optionsName . '_logo', '') != '') { ?>
				<h1 class="site-title logo"><a class="mylogo" rel="home" href="<?php bloginfo('siteurl');?>/" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><img relWidth="<?php echo intval(get_theme_mod(FT_scope::tool()->optionsName . '_maxWidth', 0)); ?>" relHeight="<?php echo intval(get_theme_mod(FT_scope::tool()->optionsName . '_maxHeight', 0)); ?>" id="ft_logo" src="<?php echo get_theme_mod(FT_scope::tool()->optionsName . '_logo', ''); ?>" alt="" /></a></h1>
	<?php } else { ?>
				<h1 class="site-title logo"><a id="blogname" rel="home" href="<?php bloginfo('siteurl');?>/" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
	<?php } ?>
	
					</div>
				</div>
				<div class="col-md-6">
					<div class="searchform">
						<?php get_search_form();?>
					</div>
				</div>
			</div></div>
		</div>
	</header><!-- #masthead -->
	<div class="resmenu"></div>
	<nav id="site-navigation" class="main-navigation" role="navigation">
		<div class="container"> <div class="row"> 
			<div class="col-md-12">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_id' => 'obiron') ); ?>
			</div>
		</div></div>
	</nav><!-- #site-navigation -->	

	<div id="content" class="site-content">

