<?php

 /**
 * Shortcode attributes
 * @var $atts
 * @var $year
 * @var $month
 * @var $day
 * Shortcode class
 * @var $this WPBakeryShortCode_Countdown
 */
$output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

	
		$output = '<div class="wpb_content_element countdown">';

        

        $output .= '<div id="countdowndiv"></div>';

	 	$output .= "\n <script type='text/javascript'>\n /* <![CDATA[ */  \n";

    	$output .= 'jQuery(document).ready(function($){$("#countdowndiv").countdown({until: new Date('.esc_js($year).', '.esc_js(($month-1)).', '.esc_js($day).')})} );';

    	$output .= "</script>\n \n ";

 

         

        $output .= '</div>';

        echo $output; 

?>