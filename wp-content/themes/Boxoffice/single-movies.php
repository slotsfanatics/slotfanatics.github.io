<?php get_header(); ?>

<div id="content" >

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<div class="post" id="post-<?php the_ID(); ?>">
<div class="title">
<h2><?php the_title(); ?></h2>
</div>

<div class="entry">

<div class="mposter">
<div class="theposter">
<span class="overlay"></span>
<?php $video=get_post_meta($post->ID, 'wtf_video', true); ?>
<?php
if ( has_post_thumbnail() ) { ?>
	<a rel="prettyPhoto[gallery]" href="<?php echo stripslashes ($video); ?>"><img class="boximg posthov" src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php get_image_url(); ?>&amp;h=270&amp;w=180&amp;zc=1" alt=""/></a>
<?php } else { ?>
	<a rel="prettyPhoto" href="<?php echo stripslashes ($video); ?>"><img class="boximg posthov" src="<?php bloginfo('template_directory'); ?>/images/dummy.png" alt="" /></a>
<?php } ?>
</div>

<div class="postermeta">
<span>Year : <?php $ryear=get_post_meta($post->ID, 'wtf_ryear', true); echo $ryear; ?></span>
<span>Director : <?php $director=get_post_meta($post->ID, 'wtf_dirctr', true); echo $director; ?></span>
<span>Running Time : <?php $runtime=get_post_meta($post->ID, 'wtf_runtime', true); echo $runtime; ?></span>
<span>Genre : <?php echo get_the_term_list( $post->ID, 'movie-genre', '', ', ', '' ); ?></span>
</div>
</div>

<div class="mainscore clearfix">
<div class="revscore">
<span class="revscoretitle">Movie review score </span>
<span class="single-sholder"> <span class="single-scorebar score-<?php $rscore=get_post_meta($post->ID, 'wtf_rscore', true); echo $rscore; ?>"> </span>    </span>
</div>
<div class="revscorebox"> <?php $rscore=get_post_meta($post->ID, 'wtf_rscore', true); echo $rscore; ?>/5 </div>
</div>
<?php the_content('Read the rest of this entry &raquo;'); ?>
<div class="clear"></div>
<?php wp_link_pages(array('before' => '<p><strong>Pages: </strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
</div>


</div>

<?php comments_template(); ?>
<?php endwhile; else: ?>

		<h1 class="title">Not Found</h1>
		<p>I'm Sorry,  you are looking for something that is not here. Try a different search.</p>

<?php endif; ?>

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>