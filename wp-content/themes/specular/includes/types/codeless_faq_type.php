<?php

add_action('init', 'faq_register', 4);



/* FAQ REGISTER */

function faq_register() 

{



	$labels = array(

		'name' => _x('Faq', 'post type general name','codeless'),

		'singular_name' => _x('Faq Entry', 'post type singular name', 'codeless'),

		'add_new' => _x('Add New', 'faq', 'codeless'),

		'add_new_item' => __('Add New Faq Entry', 'codeless'),

		'edit_item' => __('Edit Faq Entry', 'codeless'),

		'new_item' => __('New Faq Entry', 'codeless'),

		'view_item' => __('View Faq Entry', 'codeless'),

		'search_items' => __('Search Faq Entries', 'codeless'),

		'not_found' =>  __('No Faq Entries found', 'codeless'),

		'not_found_in_trash' => __('No Faq Entries found in Trash', 'codeless'), 

		'parent_item_colon' => ''

	);

	

	$slugRule = "faq";

	

	$args = array(

		'labels' => $labels,

		'public' => true,

		'show_ui' => true,

		'capability_type' => 'post',

		'hierarchical' => false,

		'rewrite' => array('slug'=>$slugRule,'with_front'=>true),

		'query_var' => true,

		'show_in_nav_menus'=> false,

		'supports' => array('title','thumbnail','editor')

	);

	

	

	

	register_post_type( 'faq' , $args );

	

	

	register_taxonomy("faq_entries", 

		array("faq"), 

		array(	"hierarchical" => true, 

		"label" => "Faq Categories", 

		"singular_label" => "Faq Categories", 

		"rewrite" => true,

		"query_var" => true

	));  


}



add_filter("manage_edit-faq_columns", "prod_edit_faq_columns");

add_action("manage_posts_custom_column",  "prod_custom_faq_columns");


function prod_edit_faq_columns($columns)

{

	$newcolumns = array(

		"cb" => "<input type=\"checkbox\" />",

		

		"title" => "Title",

		"faq_entries" => "Categories"

	);

	

	$columns= array_merge($newcolumns, $columns);

	

	return $columns;

}


function prod_custom_faq_columns($column)

{

	global $post;

	switch ($column)

	{

		

	

		case "description":

		

		break;

		case "price":

		

		break;

		case "faq_entries":

		echo get_the_term_list($post->ID, 'faq_entries', '', ', ','');

		break;

	}

}

?>