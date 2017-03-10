<div id="review-slider">

			<?php 
				$count = ft_of_get_option('fabthemes_slidecount','6');
				$args = array( 'posts_per_page' => $count ,'category_name' => 'review');
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post(); 
			?>

			<div class="review-item">
				<?php 
					$thumb = get_post_thumbnail_id();
					$img_url = wp_get_attachment_url( $thumb,'full' ); //get full URL to image (use "large" or "medium" if the images too big)
					$image = aq_resize( $img_url, 768, 500, true,true,true ); //resize & crop the image
				?>
				<?php if($image) : ?>
						<a href="<?php the_permalink();?>"><img class="slide-thumb" src="<?php echo $image ?>" alt="<?php the_title(); ?>" /></a>
				<?php endif; ?>				
				<div class="review-data">
					<div class="review-average">
						<?php echo average_score(); ?>
					</div>
					<div class="review-title">
						<div class="categories"> <?php the_category(' '); ?> </div>
						<h2> <?php the_title(); ?> </h2>
					</div>
				</div>
			</div>


			<?php 
				endwhile;
			    wp_reset_postdata();
			?>			
</div>