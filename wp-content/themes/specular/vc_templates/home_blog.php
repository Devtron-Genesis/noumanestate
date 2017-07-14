<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $style
 * @var $posts_per_page
 * @var $dynamic_from_where
 * @var $dynamic_cat
 * Shortcode class
 * @var  WPBakeryShortCode_Home_Blog
 */
$output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

      

        ob_start();

        
        if($dynamic_from_where == 'all_cat')
          query_posts('posts_per_page='.(int)$posts_per_page.'&paged='.get_query_var( 'paged' ) ); 
        else
          query_posts('posts_per_page='.(int)$posts_per_page.'&cat='.$dynamic_cat.'&paged='.get_query_var( 'paged' ) );
        
        

        global $for_element;
        $for_element = true;
        get_template_part( 'includes/view/blog/loop', $style);

        wp_reset_query();
        $output .= ob_get_clean();
        echo  $output;
?>