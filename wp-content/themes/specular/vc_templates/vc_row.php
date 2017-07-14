<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $type='in_container'
 * @var $bg_image
 * @var $bg_position
 * @var $bg_repeat
 * @var $parallax_bg
 * @var $bg_color
 * @var $overlay
 * @var $overlay_color
 * @var $video_bg
 * @var $video_webm
 * @var $video_mp4
 * @var $top_padding
 * @var $bottom_padding
 * @var $text_color
 * @var $custom_text_color
 * @var $transparency
 * @var $borders
 * @var $arrow_bottom
 * @var $arrow_top
 * @var $class
 * Shortcode class
 * @var  WPBakeryShortCode_Vc_Row
 */
$output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

	global $cl_redata;


	wp_enqueue_style( 'js_composer_front' );

	wp_enqueue_script( 'wpb_composer_front_js' );


    $style = null;

	$etxra_class = null;

	$bg_im = '';

	if(!empty($bg_image)) {

			

		if(strpos($bg_image, "http://") !== false){

				
			if(!$parallax_bg){
				$style .= 'background-image: url('. esc_url($bg_image) . '); ';

				$style .= 'background-position: '. $bg_position .'; ';
			}
			

			$bg_im = $bg_image;

		} else {

			$bg_image_src = wp_get_attachment_image_src($bg_image, 'full');

			
			if(!$parallax_bg){
				$style .= 'background-image: url('. esc_url($bg_image_src[0]). '); ';

				$style .= 'background-position: '. $bg_position .'; ';
			}
			

			$bg_im = $bg_image_src[0];

		}

		

		//for pattern bgs

		if(strtolower($bg_repeat) == 'repeat'){

			$style .= 'background-repeat: '. strtolower($bg_repeat) .'; ';

			$etxra_class = 'no-cover';

		} else {

			$style .= 'background-repeat: '. strtolower($bg_repeat) .'; ';

			$etxra_class = null;

		}

	}

	

	if(!empty($bg_color)) {

		if($bg_color == 'base'){
			$bg_color = $cl_redata['primary_color'];
		}

		$style .= 'background-color: '. $bg_color.'; ';

	}

	

	if(strtolower($parallax_bg) == 'true'){

		$parallax_class = 'parallax_section';

	} else {

		$parallax_class = '';

	}

	
	if($top_padding != '')
		$style .= 'padding-top: '. $top_padding .'px ; ';
	if($bottom_padding != '')
		$style .= 'padding-bottom: '. $bottom_padding .'px ; ';

	

	if($text_color == 'custom' && !empty($custom_text_color)) {

		$style .= 'color: '. $custom_text_color .'; ';

	}

	

	//main class

	if($type == 'in_container') {

		

		$main_class = "standard_section ";

		

	} else if($type == 'full_width_background'){

		

		$main_class = "section-style ";

		

	} else if($type == 'full_width_content'){

		

		$main_class = "full-width-content section-style ";

	}

	

	if($video_bg)

		$etxra_class .= ' video_section '; 

	 

	$video_markup = '';

	$overlay_markup = ''; 

	$parallax_markup = '';

	if($video_bg) {



		$video_markup = '<div class="video-wrap"><video id="video_background" preload="auto" autoplay="true" loop="loop" muted="muted" volume="0"> 

                                                                        <source src="'.esc_url($video_webm).'" type="video/webm"> 

                                                                        <source src="'.esc_url($video_mp4).'" type="video/mp4"> 

                                                      

                                                                        Video not supported </video></div>';

		

	} 

	$youtube_video_html = '';
	if($youtube_video_bool == 'use'){

		wp_enqueue_script( 'vc_youtube_iframe_api_js' );
		$has_video_bg = ( ! empty( $youtube_video_bool ) && ! empty( $youtube_video_url ) && vc_extract_youtube_id( $youtube_video_url ) );
		$etxra_class .= ' vc_video-bg-container ';
		$youtube_video_html .= '<div class="vc_video-bg"></div>';
		$youtube_video_attr = ' data-vc-video-bg="' . esc_attr( $youtube_video_url ) . '"';
	}





	if($overlay){
		if(strpos($overlay_color, "#") !== false)
			$overlay_color = 'rgba('.implode(',', codeless_hexToRgb($overlay_color)).',0.8 )';
		$overlay_markup = '<div class="bg-overlay" style="background:'.$overlay_color.';"></div>';

	}
	$animate_onoffset = '';
	$animate_onoffset_c = '';
	if($parallax_bg){

		$style .= ' background-image: url('.esc_url($bg_im).'); background-position: 50% 0px; ';
		$animate_onoffset_c = 'animate_onoffset';
	}else
		$animate_onoffset = 'animate_onoffset';

	

	$transparency_markup = '';
	$transparency_class = '';
	if($transparency){
		$transparency_markup = '<span class="inner_shadow"></span><div class="transparency_bg"></div>';
		$transparency_class = 'transparency_section';
	}

	$arrow_markup_bottom = '';

	if($arrow_bottom){
		$arrow_markup_bottom .= '<span class="arrow_bottom" style="border-color: '.$bg_color.' transparent transparent transparent;"></span>';
	}

	$arrow_markup_top = '';
	if($arrow_top){
		$arrow_markup_top .= '<span class="arrow_top" style="border-color: transparent transparent '.$bg_color.' transparent;"></span>';
	}

	if($borders)
		$etxra_class .= ' borders ';

	if($cl_redata['fullscreen_sections_active'])
		$etxra_class .= ' section ';



	if ( ! empty( $full_height ) ) {
		$css_classes[] = ' vc_row-o-full-height';
		if ( ! empty( $columns_placement ) ) {
			$flex_row = true;
			$etxra_class .= ' vc_row-o-columns-' . $columns_placement;
			if ( 'stretch' === $columns_placement ) {
				$etxra_class .= ' vc_row-o-equal-height';
			}
		}
	}

	if ( ! empty( $equal_height ) ) {
		$flex_row = true;
		$etxra_class .= ' vc_row-o-equal-height';
	}

	if ( ! empty( $content_placement ) ) {
		$flex_row = true;
		$etxra_class .= ' vc_row-o-content-' . $content_placement;
	}

	if ( ! empty( $flex_row ) ) {
		$etxra_class .= ' vc_row-flex';
	}


    echo'<div id="'.uniqid("fws_").'" class="vc_row vc_row-fluid '.esc_attr($transparency_class).' '.esc_attr($animate_onoffset).' row-dynamic-el '. esc_attr($main_class) . esc_attr($parallax_class) . ' ' . esc_attr($class) . ' ' . esc_attr($etxra_class).' " style="'.$style.'" '.$youtube_video_attr.'>';
    echo '<div '.( (!empty($class))?'id="'.$class.'"':'').' style="position: absolute;top: 0;"></div>';
	
    if($cl_redata['fullscreen_sections_active'])
    	echo '<div class="fullscreen_inner">';
	echo $transparency_markup;

	echo $arrow_markup_top;
   // echo $parallax_markup;

	if($type != 'full_width_content')

		$cl_class = 'container';

	else

		$cl_class = 'col span_12';

	echo $video_markup;
	echo $youtube_video_html;
	echo $overlay_markup;

    echo '<div class="'.esc_attr($cl_class).' '.esc_attr($animate_onoffset_c).' '.strtolower($text_color).'">';

    	if($cl_class == 'container')
    		echo '<div class="section_clear">';
    	

    	echo wpb_js_remove_wpautop($content);

    	if($cl_class == 'container')
    		echo '</div>';
    	

    echo '</div>';

    if($cl_redata['fullscreen_sections_active'])
    	echo '</div>';

    echo $arrow_markup_bottom;

 echo '</div>';

?>