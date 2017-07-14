<?php

add_action('init', 'codeless_slider_register', 1);


function codeless_slider_register() 

{



	$labels = array(

		'name' => _x('Slides', 'post type general name', 'codeless'),

		'all_items'	=> __('Slides','codeless' ),

		'singular_name' => _x('Slide', 'post type singular name', 'codeless'),

		'menu_name'	=> __('Codeless Slider','codeless' ),

		'add_new' => _x('Add New Slide', 'slide', 'codeless'),

		'add_new_item' => __('Add New Slide', 'codeless'),

		'edit_item' => __('Edit Slide', 'codeless'),

		'new_item' => __('New Slide', 'codeless'),

		'view_item' => __('View Slide', 'codeless'),

		'search_items' => __('Search Slides', 'codeless'),

		'not_found' =>  __('No Slides found', 'codeless'),

		'not_found_in_trash' => __('No Slides found in Trash', 'codeless'), 

		'parent_item_colon' => ''

	);



	$args = array(

		'labels' => $labels,

		'public' => true,

		'show_ui' => true,

		'capability_type' => 'post',

		'hierarchical' => false,

		'rewrite' => array('slug'=>'slides','with_front'=>true),

		'query_var' => true,

		'show_in_nav_menus'=> false,

		'supports' => array('title')

	);

	

	

	

	register_post_type( 'slide' , $args );

	

	$labels = array(
			
			'menu_name' => __( 'Sliders','codeless' ),

			'name' => __( 'Sliders', 'taxonomy general name', 'codeless' ),

			'singular_name' => __( 'Slider', 'taxonomy singular name', 'codeless' ),

			'all_items' => __( 'All Sliders','codeless' ),

			'search_items' =>  __( 'Search Sliders','codeless' ),

			'parent_item' => __( 'Parent Slider','codeless' ),

			'parent_item_colon' => __( 'Parent Slider:','codeless' ),

			'update_item' => __( 'Update Slider','codeless' ),

			'add_new_item' => __( 'Add New Slider','codeless' ),

			'edit_item' => __( 'Edit Slider','codeless' ), 

			'new_item_name' => __( 'New Slider Name','codeless' )

			
	 );     

	register_taxonomy("slider", 

		array("slide"), 

		array(	"hierarchical" => true, 

		"labels" => $labels, 

		"singular_label" => "Slider", 

		"rewrite" => true,

		"query_var" => true

	));  

}



add_filter("manage_edit-slide_columns", "slide_edit_columns");

add_action("manage_posts_custom_column",  "slide_custom_columns");



function slide_edit_columns($columns)

{

	$newcolumns = array(

		"cb" => "<input type=\"checkbox\" />",

		

		"title" => "Title",

		"slides" => "Sliders"

	);

	

	$columns= array_merge($newcolumns, $columns);

	

	return $columns;

}



/**

 * prod_custom_columns()

 * 

 * @param mixed $column

 * @return

 */

function slide_custom_columns($column)

{

	global $post;

	switch ($column)

	{

	

		case "description":

		

		break;

		case "price":

		

		break;

		case "slider":

		echo get_the_term_list($post->ID, 'slider', '', ', ','');

		break;

	}

}

?>