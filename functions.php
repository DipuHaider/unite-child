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
//add new type of post "Films"
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
// new taxonomy in post type film	- Genre
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
// new taxonomy in post type film	- Country
	$labels = array(
		'name' => __( 'Country' ),
		'singular_name' => __( 'Country' ),
		'all_items' => __( 'All Country' ),
		'choose_from_most_used' => __( 'Choose from the most used Country' ),
		'add_new_item' => __( 'Add New Country' ),
		'menu_name' => __( 'Country' ),
	); 
	register_taxonomy('country','films',array(
		'hierarchical' => false,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var' => true,
		'rewrite' => array( 'slug' => 'country' ),
	));
// new taxonomy in post type film	- Year
	$labels = array(
		'name' => __( 'Year' ),
		'singular_name' => __( 'Year' ),
		'all_items' => __( 'All Year' ),
		'choose_from_most_used' => __( 'Choose from the most used Year' ),
		'add_new_item' => __( 'Add New Year' ),
		'menu_name' => __( 'Year' ),
	); 
	register_taxonomy('year','films',array(
		'hierarchical' => false,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var' => true,
		'rewrite' => array( 'slug' => 'year' ),
	));
// new taxonomy in post type film	- Actors
	$labels = array(
		'name' => __( 'Actors' ),
		'singular_name' => __( 'Actor' ),
		'all_items' => __( 'All Actors' ),
		'choose_from_most_used' => __( 'Choose from the most used Actors' ),
		'add_new_item' => __( 'Add New Actors' ),
		'menu_name' => __( 'Actors' ),
	); 
	register_taxonomy('actors','films',array(
		'hierarchical' => false,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var' => true,
		'rewrite' => array( 'slug' => 'actors' ),
	));
}
?>