<?php  
/**
 * Shortcode attributes
 * @var $atts
 * @var $staff
 * @var $staff_position
 * @var $style
 * Shortcode class
 * @var  WPBakeryShortCode_Staff
 */

global $cl_redata;

$output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

        $output = '';

        if((int) $test_cat == 0)
            $query_post = array('posts_per_page'=> 9999, 'post_type'=> 'staff' );                          
        else{
            $query_post = array('posts_per_page'=> 9999, 
                                'post_type'=> 'staff',
                                'tax_query' => array(   array(  'taxonomy'  => 'staff_entries', 
                                                                                    'field'     => 'id', 
                                                                                    'terms'     => (int) $test_cat,  
                                                                                    'operator'  => 'IN')) );
        }
        $additional_loop = new WP_Query($query_post);

        $output .= '<div class="wpb_content_element staff_carousel">';
            $output .= '<div class="codeless-slider-container swiper-parent swiper_slider staff_slider"  data-slidenr="'.esc_attr($slide_per_view).'">';
                if($pagination == 'yes')
                    $output .= '<div class="swiper_pagination pagination-parent nav-fillpath"><a href="#" class="prev"><span class="icon-wrap"></span></a><a href="#" class="next"><span class="icon-wrap"></span></a></div>';
                $output .= '<div class="swiper-wrapper">';

                if($additional_loop->have_posts())
                {
                     
                    while ($additional_loop->have_posts())
                    { 
                        $additional_loop->the_post();
                        
                        
                        $content = get_the_content();
                         
                         
                        $featured = esc_url(codeless_image_by_id(get_post_thumbnail_id(), 'staff_full' , 'url'));
                        $position = $cl_redata['staff_position'];

                        $ext_style = '';

                        $output .= '<div class="swiper-slide " style=" '.$ext_style.'" >';
                            $output .= '<div class="single_staff modern">';
                                        $output .= '<div class="he-wrap tpl2">';
                                            $output .= '<div class="featured_img">';
                                            
                                                $output .= '<img src="'.esc_url($featured).'" alt="">';
                                                $output .= '<div class="overlay he-view">';
                                                    $output .= '<div class="bg a0" data-animate="fadeIn">';
                                                        $output .= '<div class="center-bar">';

                                                            if($cl_redata['facebook_link'] != '')
                                                                $output .= '<a href="'.esc_url($cl_redata['facebook_link']).'" class="a1" data-animate="fadeInUp" title="Facebook"><i class="moon-facebook"></i></a>';
                                                            if($cl_redata['twitter_link'] != '')
                                                                $output .= '<a href="'.esc_url($cl_redata['twitter_link']).'" class="a1" data-animate="fadeInUp" title="Twitter"><i class="moon-twitter"></i></a>';
                                                            if($cl_redata['google_link'] != '')
                                                                $output .= '<a href="'.esc_url($cl_redata['google_link']).'" class="a1" data-animate="fadeInUp" title="Google Plus"><i class="moon-google_plus"></i></a>';
                                                            if($cl_redata['pinterest_link'] != '')
                                                                $output .= '<a href="'.esc_url($cl_redata['pinterest_link']).'" class="a1" data-animate="fadeInUp" title="pinterest"><i class="moon-pinterest"></i></a>';
                                                            if($cl_redata['linkedin_link'] != '')
                                                                $output .= '<a href="'.esc_url($cl_redata['linkedin_link']).'" class="a1" data-animate="fadeInUp" title="linkedin"><i class="moon-linkedin"></i></a>';
                                                            if($cl_redata['instagram_link'] != '')
                                                                $output .= '<a href="'.esc_url($cl_redata['instagram_link']).'" class="a1" data-animate="fadeInUp" title="instagram"><i class="moon-instagram"></i></a>';
                                                            if($cl_redata['mail_link']!= '')
                                                                $output .= '<a href="'.esc_url($cl_redata['mail_link']).'" class="a1" data-animate="fadeInUp" title="mail"><i class="moon-mail"></i></a>';
                                                          
                                                        $output .= '</div>';
                                                    $output .= '</div>';
                                                $output .= '</div>';
                                            $output .= '</div>';
                                        
            				
                                        $output .= '<div class="content '.esc_attr($cl).'">';
                                            $output .= '<h5>'.esc_html(get_the_title()).'</h5>';
                                            $output .= '<span class="position">'.$position.'</span>';
                                        	$output .= '<p>'.codeless_text_limit(get_the_excerpt(), 25).'</p>';
                                        $output .= '</div>';

                                        $output .= "</div>";

                             $output .= '</div>';
                        $output .= '</div>';
                        
                    }
                    
                }

                $output .= '</div>';

            $output .= '</div>';
        
        $output .= '</div>';
        wp_reset_query();
    
        echo $output;
?>