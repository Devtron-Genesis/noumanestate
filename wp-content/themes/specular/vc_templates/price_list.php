<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $title
 * @var $price
 * @var $currency
 * @var $period
 * @var $bg_color
 * @var $type
 * @var $button_link
 * @var $button_title
 * Shortcode class
 * @var  WPBakeryShortCode_Price_list
 */
global $cl_redata;

$output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
		
   

		$output = '<div class="wpb_content_element price_table '.esc_attr($type).'">';  


      $output .='<div class="title" style="background-color:'.esc_attr($bg_color).';"><h1>'.$title.'</h1></div>';

      $output .='<div class="price">';
                  
        $output .= '<span class="p"><sup>'.$currency.'</sup>'.$price. '</span><span class="period">'.$period.'</span>';

      $output .= '</div>';

      $output .='<div class="list" style="background-color:'.esc_attr($bg_color).';"><ul>';

        $output .= "\n\t\t\t\t".wpb_js_remove_wpautop($content);

      $output .='</ul>';

      $output .= '</div>';

      if(!empty($button_title))

        $output .= '<div class="price_button" style="background-color:'.esc_attr($bg_color).';"><a class="btn-bt '.esc_attr($cl_redata['overall_button_style'][0]).'"href="'.esc_url($button_link).'">'.$button_title.'</a></div>';
  


    $output .= '</div>';

    echo $output;


?>