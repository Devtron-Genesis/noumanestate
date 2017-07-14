<?php


if(!function_exists('codeless_routing_frontpage')){
    
    add_action('init', 'codeless_routing_frontpage');

    function codeless_routing_frontpage(){
        
        global $cl_redata;

        if(!empty($cl_redata['frontpage'])){
        	add_filter('pre_option_show_on_front', 'codeless_show_on_front_filter');
			add_filter('pre_option_page_on_front', 'codeless_page_on_front_filter');

			if(!empty($cl_redata['blogpage'])){
				add_filter('pre_option_page_for_posts', 'codeless_page_for_posts_filter');
			}
        }

	}

	function codeless_show_on_front_filter($attr) { return 'page'; }
	function codeless_page_on_front_filter($attr) { 
		global $cl_redata; 
		return $cl_redata['frontpage']; 
	}
	function codeless_page_for_posts_filter($attr){ 
		global $cl_redata; 
		return $cl_redata['blogpage']; 
	}
    
}


if(!function_exists('codeless_routing_template'))
{

	add_action('codeless_routing_template', 'codeless_routing_template');

	function codeless_routing_template( $current_template = false )
	{
		global $codeless_config, $for_online, $cl_redata, $post;
		$dynamic_id = "";
		

		if(isset($post)) $dynamic_id = $post->ID;
		$frontpage = $cl_redata['frontpage'];
        $blogpage = $cl_redata['blogpage'];
        
        /* FRONTPAGE QUERY */
        if($frontpage && isset($codeless_config['new_query']) && $codeless_config['new_query']['page_id'] == $frontpage)
		{
			$dynamic_id = $frontpage;

		}

		/* BLOG QUERY */
        if(isset($post) && $blogpage == $post->ID && !isset($codeless_config['new_query']))
		{ 	
			$codeless_config['new_query'] = array( 	'paged' => get_query_var( 'paged' ), 
												    'posts_per_page' => get_option('posts_per_page'));	
											
			get_template_part( 'template', 'blog' ); exit();
		}
		
	}
}

if(!function_exists('codeless_set_portfolio_query')){
    function codeless_set_portfolio_query()
	{
		global $cl_redata;
		
		$terms = $cl_redata['portfolio_categories'];

		$p_per_page = 6;
		switch($cl_redata['portfolio_columns']){
			case '1':
				$p_per_page = 3;
			    break;
			case '2':
				$p_per_page = 6;
				break;
			case '3':
				$p_per_page = 9;
				break;
			case '4':
				$p_per_page = 12;
				break;
			case '5':
				$p_per_page = 10;
				break;
		}

		if($cl_redata['portfolio_pagination'] == 'no_pagination'){
			$p_per_page = -1;
		}

		if(isset($terms[0]) && !empty($terms[0]) && !is_null($terms[0]) && $terms[0] != "null")
		{	
			$new_query = array(	'orderby' 	=> 'ID', 
												    'order' 	=> 'DESC', 
												    'paged' 	=> get_query_var( 'paged' ), 
												    'posts_per_page' => $p_per_page,  
												    'tax_query' => array( 	array( 	'taxonomy' 	=> 'portfolio_entries', 
																				    'field' 	=> 'id', 
																				    'terms' 	=> $terms, 	
																				    'operator' 	=> 'IN')));
		}
		else
		{
			$new_query = array(	'paged' 		 => get_query_var( 'paged' ),  
												    'posts_per_page' => -1,  
												    'post_type' 	 => 'portfolio'); 
		}

		query_posts($new_query);
		
	}
}

if(!function_exists('codeless_execute_query')){
    add_action('codeless_excecute_query_var_action', 'codeless_execute_query');

    function codeless_execute_query($temp = false){
        global $codeless_config;
        if(isset($codeless_config['new_query'])){
            query_posts($codeless_config['new_query']);
        }
    }
}

function is_vc(){
	preg_match_all('/\[vc_row(.*?)\]/', get_the_content((int) codeless_get_post_id()), $matches );
	if ( isset($matches[0]) && !empty($matches[0]) )
		return true;
	return false;
}
?>