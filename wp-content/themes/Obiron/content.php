<?php
/**
 * @package fabthemes
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">

			<span class="comments">
				<?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?> 
			</span>
			<span class="category">
				<?php the_category(' '); ?>
			</span>
		</div><!-- .entry-meta -->
		<?php endif; ?>

		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>


	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="row">
			<div class="col-sm-4">
				<div class="postpic">
				<?php 
					$thumb = get_post_thumbnail_id();
					$img_url = wp_get_attachment_url( $thumb,'full' ); //get full URL to image (use "large" or "medium" if the images too big)
					$image = aq_resize( $img_url, 768, 550, true,true,true ); //resize & crop the image
				?>
				<?php if($image) : ?>
						<a href="<?php the_permalink();?>"> <img class="post-thumb" src="<?php echo $image ?>" alt="<?php the_title(); ?>" /> </a>
				<?php endif; ?>		

				<?php $entries = get_post_meta( get_the_ID(), 'review_criteria', true );
				if ($entries) { ?>
					<div class="scorebox">
						<?php echo average_score();?>
					</div>
						
				<?php } ?>


				<?php $url = esc_url( get_post_meta( get_the_ID(), 'game_video', 1 ) ); 
				if($url) { ?>
					<a class="popup-video" href="<?php echo $url ?>"><i class="fa fa-play"></i></a>
				<?php } ?>	
				
				</div>

			</div>
			<div class="col-sm-8">
				<?php the_excerpt(); ?>
				<a class="read-more" href="<?php the_permalink();?>"> <?php _e('Read More','fabthemes'); ?></a>
			</div>
		</div>
		
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php //fabthemes_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
