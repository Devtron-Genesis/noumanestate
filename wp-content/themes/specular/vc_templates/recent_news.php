<?php
global $cl_redata;
 /**
 * Shortcode attributes
 * @var $atts
 * @var $posts_per_page
 * @var $dynamic_from_where
 * @var $dynamic_cat
 * @var $style
 * Shortcode class
 * @var  WPBakeryShortCode_Recent_News
 */
$output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

        $output = '<div class="recent_news '.$style.' wpb_content_element">';

        if($dynamic_from_where == 'all_cat'){
            $query_post = array('posts_per_page'=> $posts_per_page, 'post_type'=> 'post' );                          
        }else{
           $query_post = array('posts_per_page'=> $posts_per_page, 'post_type'=> 'post', 'cat' => $dynamic_cat ); 
        }
        
        $loop = new WP_Query($query_post);
                                    
        if($loop->have_posts()){
            while($loop->have_posts()){
                $loop->the_post();

                if($style == 'inline'){
                    if(has_post_thumbnail()){
                        $output .= '<div class="blog-item">';
                            $output .= '<h4>'.esc_html(get_the_title()).'</h4>';
                            $output .= '<img src="'.esc_url(codeless_image_by_id(get_post_thumbnail_id(), 'blog', 'url')).'" alt="">';
                            $output .= '<ul class="info">';
                                $output .= '<li><i class="linecon-icon-user"></i>'.__('Posted by', 'codeless').' '.esc_html(get_the_author()).'</li>'; 
                                $output .= '<li><i class="linecon-icon-calendar"></i>'. __('On', 'codeless').' '.esc_html(get_the_date()).'</li>';                                                   
                            $output .= '</ul>';
                        $output .= '<a href="'.esc_url(get_permalink()).'"></a></div>';
                    }
                }else if($style == 'events'){
                        $output .= '<dl class="blog-item dl-horizontal">';
                            $output .= '<a href="'.esc_url(get_permalink()).'"></a>';
                            $dt = get_the_time('j').' '.get_the_time('M');
                            if(!empty($cl_redata['future_date_events']) )
                                $dt = $cl_redata['future_date_events'];
                            $output .= '<dt><span class="date">'.$dt.'</span></dt>';
                            $output .= '<dd><h5>'.esc_html(get_the_title()).'</h5><span class="time">'.get_the_time('h:i a').'</span><a class="link" href="'.esc_url(get_permalink()).'"><i class="moon-arrow-right-5"></i></a></dd>';
                        $output .= '</dl>';
                }else if($style == 'vertical'){
                        $output .= '<dl class="blog-item dl-horizontal">';
                            $output .= '<dt><img src="'.esc_url(codeless_image_by_id(get_post_thumbnail_id(), 'blog_grid', 'url')).'" alt=""></dt>';
                            $output .= '<dd><h5><a href="'.esc_url(get_permalink()).'">'.esc_attr(get_the_title()).'</a></h5><span class="date">'.get_the_time('j M h:i a').'</span><p>'.codeless_text_limit(get_the_excerpt(), 18).'</p></dd>';
                        $output .= '</dl>';
                }
                
            }
        } 

        $output .= '</div>';

        echo $output;
        
?>