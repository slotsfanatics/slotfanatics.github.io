<?php 

/* Movies post type*/

function post_type_movies() {
register_post_type(
                    'movies', 
                    array( 'public' => true,
					 		'publicly_queryable' => true,
							'has_archive' => true, 
							'hierarchical' => false,
							'menu_icon' => get_stylesheet_directory_uri() . '/images/movie.png',
                    		'labels'=>array(
    									'name' => _x('Movies', 'post type general name'),
    									'singular_name' => _x('Movie', 'post type singular name'),
    									'add_new' => _x('Add New', 'Movies'),
    									'add_new_item' => __('Add New Movie'),
    									'edit_item' => __('Edit Movie'),
    									'new_item' => __('New Movie'),
    									'view_item' => __('View Movie'),
    									'search_items' => __('Search Movies'),
    									'not_found' =>  __('No Movies found'),
    									'not_found_in_trash' => __('No Movie found in Trash'), 
    									'parent_item_colon' => ''
  										),							 
                            'show_ui' => true,
							'menu_position'=>5,
							'query_var' => true,
							'rewrite' => TRUE,
							'rewrite' => array( 'slug' => 'movie', 'with_front' => FALSE,),
							'register_meta_box_cb' => 'mytheme_add_box',
							'supports' => array(
							 			'title',
										'thumbnail',
										'comments',
										'editor'
										)
							) 
					);
				} 
add_action('init', 'post_type_movies');

/* Movie genre taxonomy */

function create_movie_genre_taxonomy() 
{
$labels = array(
	  						  'name' => _x( 'Movie Genre', 'taxonomy general name' ),
    						  'singular_name' => _x( 'movie-genre', 'taxonomy singular name' ),
    						  'search_items' =>  __( 'Search movie genres' ),
   							  'all_items' => __( 'All movie genres' ),
    						  'parent_item' => __( 'Parent movie genre' ),
   					   		  'parent_item_colon' => __( 'Parent movie genre:' ),
   							  'edit_item' => __( 'Edit movie genre' ), 
  							  'update_item' => __( 'Update movie genre' ),
  							  'add_new_item' => __( 'Add New Movie Genre' ),
  							  'new_item_name' => __( 'New movie genre Name' ),
); 	
register_taxonomy('movie-genre',array('movies'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'movie-genre' ),
  ));
}

add_action( 'init', 'create_movie_genre_taxonomy', 0 );

?>