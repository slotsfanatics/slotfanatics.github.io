<div id="right">


<div class="featbox">
<h3 class="sidetitl "> Top Rated Movies </h3>
<?php
$rate_query =  new WP_Query( array ( 'post_type' => 'movies', 'orderby' => 'meta_value', 'meta_key' => 'wtf_rscore','posts_per_page'=>'5' ) );
while ( $rate_query->have_posts() ) : $rate_query->the_post();
?>

<div class="fblock clearfix">
	<?php
		if ( has_post_thumbnail() ) { ?>
			<img class="thumbim" src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php get_image_url(); ?>&amp;h=60&amp;w=80&amp;zc=1" alt=""/>
	<?php } else { ?>
			<img class="thumbim" src="<?php bloginfo('template_directory'); ?>/images/dummy.png" alt="" />
	<?php } ?>
	
	<div class="rinfo clearfix">	
	<h3><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php echo short_title('...', 4); ?></a></h3>
		<span class="sholder"> <span class="scorebar score-<?php $rscore=get_post_meta($post->ID, 'wtf_rscore', true); echo $rscore; ?>"> </span>    </span>
	<p><span class="mgenre"><?php echo get_the_term_list( $post->ID, 'movie-genre', '', ', ', '' ); ?></span></p>
	</div>
</div>
<?php endwhile; ?>
</div>


<div class="featbox">
<h3 class="sidetitl "> Popular Stories  </h3>

	<?php 
		$my_query = new WP_Query('orderby=comment_count&showposts=5');
		while ($my_query->have_posts()) : $my_query->the_post();
	?>
	
	<div class="fblock">
	<?php
		if ( has_post_thumbnail() ) { ?>
			<img class="thumbim" src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php get_image_url(); ?>&amp;h=60&amp;w=80&amp;zc=1" alt=""/>
	<?php } else { ?>
			<img class="thumbim" src="<?php bloginfo('template_directory'); ?>/images/dummy.png" alt="" />
	<?php } ?>
		<h3><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php echo short_title('...', 5); ?></a></h3>
		<p><span class="clock">  Posted on <?php the_time('M - j - Y'); ?></span></p>
		<p><span class="comm"><?php comments_popup_link('0 Comment', '1 Comment', '% Comments'); ?></span></p>
		<div class="clear"></div>
	</div>
	<?php endwhile; ?>
</div>

<!-- 125px banners -->	
<?php include (TEMPLATEPATH . '/sponsors.php'); ?>	

<!-- Sidebar widgets -->
<div class="sidebar">
<ul>
	<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar') ) : else : ?>
	<?php endif; ?>
</ul>
</div>

</div>