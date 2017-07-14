<?php
add_action('init', 'staff_register', 1);

/* Staff Register */

function staff_register() 
{

	$labels = array(
		'name' => _x('Team', 'post type general name', 'codeless'),
		'singular_name' => _x('Staff Entry', 'post type singular name', 'codeless'),
		'add_new' => _x('Add New', 'staff', 'codeless'),
		'add_new_item' => __('Add New Staff Entry', 'codeless'),
		'edit_item' => __('Edit Staff Entry', 'codeless'),
		'new_item' => __('New Staff Entry', 'codeless'),
		'view_item' => __('View Staff Entry', 'codeless'),
		'search_items' => __('Search Staff Entries', 'codeless'),
		'not_found' =>  __('No Staff Entries found', 'codeless'),
		'not_found_in_trash' => __('No Staff Entries found in Trash', 'codeless'), 
		'parent_item_colon' => ''
	);
	
	$slugRule = "staff_trusted";
	
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
	
	
	
	register_post_type( 'staff' , $args );
	
	
	register_taxonomy("staff_entries", 
		array("staff"), 
		array(	"hierarchical" => true, 
		"label" => "Staff Categories", 
		"singular_label" => "Staff Categories", 
		"rewrite" => true,
		"query_var" => true
	));  
}

add_filter("manage_edit-staff_columns", "prod_edit_staff_columns");
add_action("manage_posts_custom_column",  "prod_custom_staff_columns");


function prod_edit_staff_columns($columns)
{
	$newcolumns = array(
		"cb" => "<input type=\"checkbox\" />",
		
		"title" => "Title",
		"staff_entries" => "Categories"
	);
	
	$columns= array_merge($newcolumns, $columns);
	
	return $columns;
}

function prod_custom_staff_columns($column)
{
	global $post;
	switch ($column)
	{
		
	
		case "description":
		
		break;
		case "price":
		
		break;
		case "staff_entries":
		echo get_the_term_list($post->ID, 'staff_entries', '', ', ','');
		break;
	}
}
?>