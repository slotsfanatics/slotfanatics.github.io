<?php
/**
 * The template for displaying all single posts.
 *
 * @package fabthemes
 */

get_header(); ?>
<div class="container"> <div class="row"> 

	<div id="media-box" class="col-md-12">

		<?php $url = esc_url( get_post_meta( get_the_ID(), 'game_video', 1 ) ); ?>

		<?php if($url){ 

			echo wp_oembed_get( $url );

		 } else { ?>

	 		<?php 
				$thumb = get_post_thumbnail_id();
				$img_url = wp_get_attachment_url( $thumb,'full' ); //get full URL to image (use "large" or "medium" if the images too big)
				$image = aq_resize( $img_url, 1200, 600, true,true,true ); //resize & crop the image
			?>
			<?php if($image) : ?>
					<img class="single-pic" src="<?php echo $image ?>" alt="<?php the_title(); ?>" />
			<?php endif; ?>		

		 <?php } ?>

	</div>	

	<div class="col-md-8">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>


			<?php $entries = get_post_meta( get_the_ID(), 'review_criteria', true );
			if ($entries){ ?>

			<div class="review-box">
				<div class="row">
					<div class="col-md-12">
						<h3> 
							<?php _e('Review Scores ','fabthemes');?></h3>
							<span class="average">
								<?php echo average_score();?>
							</span>

					</div>

					<div class="col-xs-12">
						<div class="review-bars">
							<ul>

							<?php 
								$sum = 0;
								foreach ( (array) $entries as $key => $entry ) {

								    $criteria = $score  = '';
								    if ( isset( $entry['crit_name'] ) )
								        $criteria = esc_html( $entry['crit_name'] );
								    if ( isset( $entry['crit_score'] ) )
								        $score = esc_html( $entry['crit_score'] );

								    echo'<li>'.$criteria.' - '.$score.' <span class="rbar"> <span class="score score-'.$score.'"> </span> </span></li>';

									$sum += $score;
							} ?>

							</ul>
						</div>
					</div>

				</div>
			</div>
			<?php }	?>


			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	</div>

	<div class="col-md-4">
	<?php get_sidebar(); ?>
	</div>

</div></div>
<?php get_footer(); ?>