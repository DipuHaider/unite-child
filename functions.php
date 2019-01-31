<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
 
    $parent_style = 'parent-style';
 
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}

add_action( 'init', 'post_type_films' );

function post_type_films() {
	register_post_type( 'Films',
		array(
			'labels' => array(
				'name' => __( 'Films' ),
				'singular_name' => __( 'Film' ),
				'all_items'           => __( 'All Films'),
				'add_new_item'        => __( 'Add New Films')
			),
			'public' => true,
		)
	);
	$labels = array(
		'name' => __( 'Genre' ),
		'singular_name' => __( 'Genre' ),
		'all_items' => __( 'All Genre' ),
		'choose_from_most_used' => __( 'Choose from the most used Genre' ),
		'add_new_item' => __( 'Add New Genre' ),
		'menu_name' => __( 'Genre' ),
	); 
	register_taxonomy('genre','films',array(
		'hierarchical' => false,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var' => true,
		'rewrite' => array( 'slug' => 'genre' ),
  ));
}
?>