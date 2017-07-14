<?php
global $cl_redata;
/**
 * Shortcode attributes
 * @var $atts
 * @var $title
 * @var $link
 * @var $icon
 * @var $align
 * @var $button_bool
 * @var $button_2_title
 * @var $button_2_link
 * @var $new_tab
 * Shortcode class
 * @var $this WPBakeryShortCode_Button
 */
$output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$extra_class = '';

if($button_bool == 'yes'){
	$extra_class .= 'buttons_two al_'.$align;
	$align = '';
}

$target = '';
if($new_tab == 'yes')
	$target= ' target="_blank" ';

$output = '<div class="wpb_content_element button '.$extra_class.'">';
    
    $output .= '<a '.$target.' class="btn-bt align-'.esc_attr($align).' '.esc_attr($cl_redata['overall_button_style'][0]).'" href="'.esc_url($link).'"><span>'.esc_attr($title).'</span><i class="'.esc_attr($icon).'"></i></a>';
    if($button_bool =='yes'):
    	$output .='<a class="btn-bt '.esc_attr($cl_redata['overall_button_style'][0]).'" href="'.esc_url($button_2_link).'"><span>'.esc_attr($button_2_title).'</span><i class="'.esc_attr($icon).'"></i></a>';
    endif;

$output .= '</div>';

echo  $output;

?>