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
global $cl_redata;

        $output = '';
        if(isset($staff)){
        $output .= '<div class="wpb_content_element">';
       
        $query_post = array( 'p' => $staff, 'posts_per_page'=>1, 'post_type'=> 'staff' );
        $additional_loop = new WP_Query($query_post);
        if($additional_loop->have_posts())
        {
            
            while ($additional_loop->have_posts())
            { 
                $additional_loop->the_post();
                
                
                $content = get_the_content();
                 
                 
                $featured = codeless_image_by_id(get_post_thumbnail_id(), 'staff', 'url');
                $position = $cl_redata['staff_position'];
                $output .= '<div class="single_staff '.esc_attr($style).'">';
                            $output .= '<div class="he-wrap tpl2">';
                                $output .= '<div class="featured_img">';
                                
                                    $output .= '<img src="'.esc_url($featured).'" alt="">';
                                    if($style == 'style_1'):
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
                                    endif;
                                $output .= '</div>';
                            
				
                            $output .= '<div class="content">';
                                $output .= '<h5>'.esc_html(get_the_title()).'</h5>';
                                $output .= '<span class="position">'.esc_attr($position).'</span>';
                            	$output .= '<p>'.codeless_text_limit(get_the_excerpt(), 25).'</p>';
                            $output .= '</div>';

                            $output .= "</div>";

                 $output .= '</div>';
                
            }
            
        }
        
        $output .= '</div>';
        wp_reset_query();
        }
    
        echo $output;
?>