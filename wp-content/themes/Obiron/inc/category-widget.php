<?php // Creating the widget 

class category_news_widget extends WP_Widget {

function __construct() {
	parent::__construct(
	// Base ID of your widget
	'category_news_widget', 

	// Widget name will appear in UI
	__('Custom Category Widget', 'fabthemes'), 

	// Widget description
	array( 'description' => __( 'Widget to display post items from categories', 'fabthemes' ), ) 
	);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {


$title = apply_filters( 'widget_title', $instance['title'] );
$category = apply_filters( 'widget_category', $instance['category'] );

// before and after widget arguments are defined by themes
	echo $args['before_widget'];
	echo "<div class='category-stories'>";

	if ( ! empty( $title ) )
	echo $args['before_title'] . $title . $args['after_title'];

		global $post;
		$argos = array('posts_per_page' => 5, 'cat' => $category );
		$i = 0;
		$loop = new WP_Query( $argos );

		echo "<div class='row'>";

		while ( $loop->have_posts() ) : $loop->the_post(); ?>

		<div class="col-sm-12 cat-blocks">
			<div class="widgpic">
				<?php 
				$thumb = get_post_thumbnail_id();
				$img_url = wp_get_attachment_url( $thumb,'full' ); //get full URL to image (use "large" or "medium" if the images too big)
				$image = aq_resize( $img_url, 80, 80, true,true,true ); //resize & crop the image
				?>
				<?php if($image) : ?>
					<a href="<?php the_permalink() ?>"> <img class="widget-postimg"  src="<?php echo $image ?>" alt="<?php the_title(); ?>" /> </a>
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
			<div class="category-entry-content">
				<h2> <a href="<?php the_permalink();?>"> <?php the_title(); ?> </a></h2>
				<span class="category">
					<?php the_category(' '); ?>
				</span>
			</div>
	  	</div>



	    <?php endwhile;

	    echo "</div>";
	    wp_reset_postdata();
	    echo "</div>";

	echo $args['after_widget'];

}

// Widget Backend 
public function form( $instance ) {

if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'Category title', 'fabthemes' );
}

if ( isset( $instance[ 'category' ] ) ) {
$category = $instance[ 'category' ];
}
else {
$category = __( '1', 'fabthemes' );
}

// Widget admin form
?>
<p>
	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:','fabthemes' ); ?></label> 
	<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e( 'Category', 'fabthemes' ); ?>:</label><br/>
	<?php
	$categories_args = array(
		'name'            => $this->get_field_name( 'category' ),
		'selected'        => $instance['category'],
		'orderby'         => 'Name',
		'hierarchical'    => 1,
		'show_option_all' => __( 'All Categories', 'fabthemes' ),
		'hide_empty'      => '0',
		'class'           => 'widefat',
	);
	wp_dropdown_categories( $categories_args ); ?>
</p>



<?php }

// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
	$instance = array();
	$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
	$instance['category'] = ( ! empty( $new_instance['category'] ) ) ? strip_tags( $new_instance['category'] ) : '';
	return $instance;
	}
} 

// Register and load the widget
function news_load_widget() {
	register_widget( 'category_news_widget' );
}
add_action( 'widgets_init', 'news_load_widget' );