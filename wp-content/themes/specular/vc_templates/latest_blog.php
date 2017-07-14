<?php 
    /**
 * Shortcode attributes
 * @var $atts
 * @var $dynamic_from_where
 * @var $carousel
 * @var $post_selected
 * @var $dynamic_cat
 * @var $style
 * @var $posts_per_page
 * Shortcode class
 * @var  WPBakeryShortCode_Latest_blog
 */
$output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );


        $output = '<div class="latest_blog wpb_content_element">';


        if($style == 'simple')
            $text_limit = 23;
        else
            $text_limit = 20;

       if($dynamic_from_where == 'all_cat'){
            $query_post = array('posts_per_page'=> $posts_per_page, 'post_type'=> 'post'  );    

        }elseif($dynamic_from_where == 'one_post'){
           $query_post = array('p'=> $post_selected);   

        }else{
           $query_post = array('posts_per_page'=> $posts_per_page, 'post_type'=> 'post', 'cat' => $dynamic_cat ); 
        }
        
        query_posts($query_post);

        if(have_posts()){
            if($carousel == 'yes'){
                $output .= '<div class="codeless-slider-container swiper-parent swiper_slider blog_slider"  data-slidenr="3">'; 
                    $output .= '<div class="swiper_pagination pagination-parent nav-fillpath"><a href="#" class="prev"><span class="icon-wrap"></span></a><a href="#" class="next"><span class="icon-wrap"></span></a></div>';
                    $output .= '<div class="swiper-wrapper">';
            }else{
                $output .= '<div class="row no_carousel">';
            }
            while (have_posts()) : the_post();
                    if( (has_post_thumbnail() && get_post_format() != 'video') || get_post_format() === false ){
                        
                        $tags = get_the_tags();
                        $tag_out = ''; $num=count($tags); $i=0; if($tags) foreach($tags as $tag): if(++$i === $num){$tag_out .= $tag->name;} else {$tag_out .= $tag->name.', ';}  endforeach;
               
                        $output .= '<div class="'.( ($carousel == 'yes')?'swioer-slide':'' ).' blog-item '.esc_attr($style).' '.(($dynamic_from_where == 'one_post')?'single':'').'">'; 
                            if( has_post_thumbnail() )
                                $output .= '<img src="'.esc_url(codeless_image_by_id(get_post_thumbnail_id(), 'port2', 'url')).'" alt="">';
                            $output .= '<div class="content">';
                                $output .= '<h4><a href="'.esc_attr(get_permalink()).'">'.esc_html(get_the_title()).'</a></h4>';
                                $output .= '<ul class="info">';
                                    $output .= '<li><i class="linecon-icon-user"></i>'.__('Posted by', 'codeless').' '.get_the_author().'</li>'; 
                                    $output .= '<li><i class="linecon-icon-calendar"></i>'.__('On', 'codeless').' '.get_the_date().'</li>';   
                                $output .= '</ul>';
                                $output .= '<p>'.codeless_text_limit(get_the_excerpt(), $text_limit).'</p>';
                                $output .= '<div class="after">';
                                    $output .= '<ul class="info">';
                                         
                                        $output .= '<li><i class="linecon-icon-tag"></i>'.$tag_out.'</li>';                        
                                    $output .= '</ul>';
                                    $output .= '<div class="post-like">'.getPostLikeLink( get_the_ID() ).'</div>';
                                $output .= '</div>';  
                            $output .= '</div>'; 

                        $output .= '</div>';
                    }
                     else if( (has_post_thumbnail() && get_post_format() == 'video') || get_post_format() === false ){
                        
                        $tags = get_the_tags();
                        $tag_out = ''; $num=count($tags); $i=0; if($tags) foreach($tags as $tag): if(++$i === $num){$tag_out .= $tag->name;} else {$tag_out .= $tag->name.', ';}  endforeach;
               
                        $output .= '<div class="'.( ($carousel == 'yes')?'swioer-slide':'' ).' blog-item '.esc_attr($style).' '.(($dynamic_from_where == 'one_post')?'single':'').'">'; 
                            if( has_post_thumbnail() )
                                $output .= '<img src="'.esc_url(codeless_image_by_id(get_post_thumbnail_id(), 'port2', 'url')).'" alt="">';
                            $output .= '<div class="content">';
                                $output .= '<h4><a href="'.esc_attr(get_permalink()).'">'.esc_html(get_the_title()).'</a></h4>';
                                $output .= '<ul class="info">';
                                    $output .= '<li><i class="linecon-icon-user"></i>'.__('Posted by', 'codeless').' '.get_the_author().'</li>'; 
                                    $output .= '<li><i class="linecon-icon-calendar"></i>'.__('On', 'codeless').' '.get_the_date().'</li>';   
                                $output .= '</ul>';
                                $output .= '<p>'.codeless_text_limit(get_the_excerpt(), $text_limit).'</p>';
                                $output .= '<div class="after">';
                                    $output .= '<ul class="info">';
                                         
                                        $output .= '<li><i class="linecon-icon-tag"></i>'.$tag_out.'</li>';                        
                                    $output .= '</ul>';
                                    $output .= '<div class="post-like">'.getPostLikeLink( get_the_ID() ).'</div>';
                                $output .= '</div>';  
                            $output .= '</div>'; 

                        $output .= '</div>';
                    }
                    

            endwhile;
            if($carousel == 'yes'){
                $output .= '</div>';
            $output .= '</div>';
            }else{
                $output .= '</div>';
            }
        }

        $output .= '</div>';

        wp_reset_query();

        echo $output;
?>