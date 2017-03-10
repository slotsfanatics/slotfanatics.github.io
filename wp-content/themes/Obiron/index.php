<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package fabthemes
 */

get_header(); ?>

<?php get_template_part('inc/review-slider') ?>

<div class="container"> <div class="row"> 
	<div class="col-md-8">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>
			
			<div class="paginate"> 
				<?php paginate_numeric_posts_nav(); ?>
			</div>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	</div>

	<div class="col-md-4">
		<?php get_sidebar(); ?>
	</div>

</div></div>

<div class="footer-slider">
	<div class="container"> <div class="row">

		<div class="col-xs-8">
			<div class="callout-text">
			<?php echo ft_of_get_option('fabthemes_ctatext','Welcome to Obiron, a Gamer WordPress Theme from fabthemes.com');?>
			</div>
		</div>
		
			<div class="callout-button">
				<a href="<?php echo ft_of_get_option('fabthemes_ctalink','#');?>"> <?php echo ft_of_get_option('fabthemes_ctabutton','Check it out');?></a>
			</div>
		
	</div></div>
</div>
<?php get_footer(); ?>
