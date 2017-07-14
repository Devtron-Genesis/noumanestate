<?php



add_action('init', 'portfolio_register', 1);



/* Portfolio Register */

function portfolio_register() 

{

	global $cl_redata;

	$labels = array(

		'name' => _x('Portfolio Items', 'post type general name', 'codeless'),

		'singular_name' => _x('Portfolio Entry', 'post type singular name', 'codeless'),

		'add_new' => _x('Add New', 'portfolio', 'codeless'),

		'add_new_item' => __('Add New Portfolio Entry', 'codeless'),

		'edit_item' => __('Edit Portfolio Entry', 'codeless'),

		'new_item' => __('New Portfolio Entry', 'codeless'),

		'view_item' => __('View Portfolio Entry', 'codeless'),

		'search_items' => __('Search Portfolio Entries', 'codeless'),

		'not_found' =>  __('No Portfolio Entries found', 'codeless'),

		'not_found_in_trash' => __('No Portfolio Entries found in Trash', 'codeless'), 

		'parent_item_colon' => ''

	);

	

	$slugRule = (isset($cl_redata["portfolio_slug"]) ? $cl_redata["portfolio_slug"] : '');

	

	$args = array(

		'labels' => $labels,

		'public' => true,

		'show_ui' => true,

		'capability_type' => 'post',

		'hierarchical' => false,

		'rewrite' => array('slug'=>$slugRule,'with_front'=>true),

		'query_var' => true,

		'show_in_nav_menus'=> false,

		'supports' => array('title','thumbnail','excerpt','editor','comments')

	);

	

	

	

	register_post_type( 'portfolio' , $args );

	

	

	register_taxonomy("portfolio_entries", 

		array("portfolio"), 

		array(	"hierarchical" => true, 

		"label" => "Portfolio Categories", 

		"singular_label" => "Portfolio Categories", 

		"rewrite" => true,

		"query_var" => true

	));  

}



add_filter("manage_edit-portfolio_columns", "prod_edit_columns");

add_action("manage_posts_custom_column",  "prod_custom_columns");


function prod_edit_columns($columns)

{

	$newcolumns = array(

		"cb" => "<input type=\"checkbox\" />",

		

		"title" => "Title",

		"portfolio_entries" => "Categories"

	);

	

	$columns= array_merge($newcolumns, $columns);

	

	return $columns;

}


function prod_custom_columns($column)

{

	global $post;

	switch ($column)

	{

	

		case "description":

		

		break;

		case "price":

		

		break;

		case "portfolio_entries":

		echo get_the_term_list($post->ID, 'portfolio_entries', '', ', ','');

		break;

	}

}

?>