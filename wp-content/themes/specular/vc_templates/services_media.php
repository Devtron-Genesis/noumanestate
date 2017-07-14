<?php        
 /**
 * Shortcode attributes
 * @var $atts
 * @var $title
 * @var $type
 * @var $photo
 * @var $video
 * @var $style
 * @var $link
 * Shortcode class
 * @var  WPBakeryShortCode_Services_Media
 */
$output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

        $output = '<div class="wpb_content_element services_media '.$style.'">';

        
        if($type == 'img'){
            if(!empty($photo)) { 
            
                if(strpos($photo, "http://") !== false){
                    $photo = $photo;
                } else {
                    $bg_image_src = wp_get_attachment_image_src($photo, 'staff');
                    $photo = $bg_image_src[0];
                }
            }
            $output .= '<a href="'.esc_url($link).'"><div class="overlay">';
                $output .= '<img src="'.esc_url($photo).'" alt="" />';
                $output .= '<span></span>';
                if($style == 'style_2')
                    $output .= '<h5><a href="'.esc_url($link).'">'.esc_html($title).'</a></h5>';
            $output .= '</div></a>';
        }
	   
	    else
        if($type == 'video'){
            if(isset($video)){
                global $wp_embed;
                $output .= $wp_embed->run_shortcode('[embed]'.trim($video).'[/embed]');
            }
        }
        
        if($style == 'style_1'){
            $output .= '<h5><a href="'.esc_url($link).'">'.esc_html($title).'</a></h5>';
            $output .= '<p>'.do_shortcode($content).'</p>';
        }
        
        
        $output .= '</div>';
        echo $output;
?>