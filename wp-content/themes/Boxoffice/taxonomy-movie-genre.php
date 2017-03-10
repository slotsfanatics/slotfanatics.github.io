<?php get_header(); ?>

<div id="content">

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
		
<div class="box " id="post-<?php the_ID(); ?>">

<div class="boxim">
<?php
if ( has_post_thumbnail() ) { ?>
	<a href="<?php the_permalink() ?>"><img class="boximg" src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php get_image_url(); ?>&amp;h=270&amp;w=180&amp;zc=1" alt=""/></a>
<?php } else { ?>
	<a href="<?php the_permalink() ?>"><img class="boximg" src="<?php bloginfo('template_directory'); ?>/images/dummy.png" alt="" /></a>
<?php } ?>

<div class="scorebox">
<span class="sholder"> <span class="scorebar score-<?php $rscore=get_post_meta($post->ID, 'wtf_rscore', true); echo $rscore; ?>"> </span>    </span>
</div>

</div>

<div class="boxentry">
<div class="btitle">
	<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
</div>
<div class="bmeta">
<span class="mgenre"><?php echo get_the_term_list( $post->ID, 'movie-genre', '', ', ', '' ); ?></span> <span class="mcom"><?php comments_popup_link('0', '1', '%'); ?></span>
</div>
<div class="clear"></div>
</div>
</div>

<?php if(++$counter % 3 == 0) : ?>
<div class="clear"></div>
<?php endif; ?>
<?php endwhile; ?>

<?php getpagenavi(); ?>

<?php else : ?>

	<h1 class="title">Not Found</h1>
	<p>Sorry, but you are looking for something that isn't here.</p>

<?php endif; ?>

</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>