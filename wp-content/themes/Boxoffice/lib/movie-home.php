
<div id="content">
<?php
$temp = $wp_query;
$wp_query= null;
$wp_query = new WP_Query();
$wp_query->query('post_type=movies'.'&paged='.$paged);
?>
<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>	

<div class="box " id="post-<?php the_ID(); ?>">

<div class="boxim">
<?php
if ( has_post_thumbnail() ) { ?>
	<a href="<?php the_permalink() ?>"><img class="boximg" src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php get_image_url(); ?>&amp;h=90&amp;w=135&amp;zc=1" alt=""/></a>
<?php } else { ?>
	<a href="<?php the_permalink() ?>"><img class="boximg" src="<?php bloginfo('template_directory'); ?>/images/dummy.png" alt="" /></a>
<?php } ?>

<div class="scorebox">
<span class="sholder"> <span class="scorebar score-<?php $rscore=get_post_meta($post->ID, 'wtf_rscore', true); echo $rscore; ?>"> </span>    </span>
</div>

</div>

<div class="boxentry">
<div class="btitle">
	<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php echo get_post_meta($post->ID, 'wtf_ryear', true);?></a></h2>
</div>
<div class="bmeta">
<span class="mgenre"><?php echo get_post_meta($post->ID, 'wtf_dirctr', true); ?></span> <span class="mcom"><?php comments_popup_link('0', '1', '%'); ?></span>
</div>
<div class="clear"></div>
</div>
</div>

<?php if(++$counter % 3 == 0) : ?>
<div class="clear"></div>
<?php endif; ?>

<?php endwhile; ?>

<div class="clear"></div>
<?php getpagenavi(); ?>
<?php $wp_query = null; $wp_query = $temp;?>
</div>