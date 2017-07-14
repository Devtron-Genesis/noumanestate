<?php



if(!function_exists('codeless_sc_noshortcode')){
    /**

     * codeless_sc_noshortcode()

     * This shortcode help you to show the usage of each shortcode.

     * @param mixed $atts

     * @param mixed $content

     * @param string $shortcodename

     * @return

     */
    function codeless_sc_noshortcode($atts, $content=null, $shortcodename =""){

        $output = '<div class="code">'.$content.'</div>';
        return $output;
    }

        add_shortcode('noshortcode', 'codeless_sc_noshortcode');

}


if(!function_exists('codeless_sc_blockquote')){

     /**

     * codeless_sc_blockquote()

     * This shortcode generate blockqoutes

     * @param mixed $atts

     * @param mixed $content

     * @param string $shortcodename

     * @return

     */

    function codeless_sc_blockquote($atts, $content=null, $shortcodename =""){

        extract(shortcode_atts(array('source' => '', 'background' => ''), $atts));
        $bg ='';

        if(!empty($background)){

            $bg = 'style="background-color: '.esc_attr($background).'"';
        }
        
        $output = '<div class="codeless_sc">';

        $output .='<div class="blockquote" '.$bg.'>';
        
        $output .= do_shortcode($content);

        $output .='<br /><span class="source">'.esc_attr($source).'</span>';
        
        $output .='</div></div>';  
        

        return $output;

    }

    add_shortcode('blockquote', 'codeless_sc_blockquote');

}



if(!function_exists('codeless_sc_social_icons')){

    /**

     * codeless_sc_social_icons()

     * 

     * @param mixed $atts

     * @param mixed $content

     * @param string $shortcodename

     * @return

     */


    function codeless_sc_social_icons($atts, $content=null, $shortcodename =""){

       extract(shortcode_atts(array('icon' => '', 'link'=>'' ), $atts));

       $output =  '<div class="social_icons_sc">'; 
       $output .= '<a href="'.esc_url($link).'">'; 
       $output .= '<i class="moon-'.esc_attr($icon).'">';
       $output .= '</i>';
       $output .= '</a>';
       $output .='</div>';
       return $output; 

    }

    add_shortcode( 'social_icons', 'codeless_sc_social_icons' );


}    




if(!function_exists('codeless_sc_imagestyle')){

    /**

     * codeless_sc_imagestyle()

     * Set image shape forms

     * @param mixed $atts

     * @param mixed $content

     * @param string $shortcodename

     * @return

     */

    function codeless_sc_imagestyle($atts, $content=null, $shortcodename =""){

        extract(shortcode_atts(array('style' => ''), $atts));

        $output = '<img src="'.esc_url(do_shortcode($content)).'" class="img-'.esc_attr($style).'">';

        return $output;

    }

    add_shortcode('imagestyle', 'codeless_sc_imagestyle');

}



if(!function_exists('codeless_sc_label_badget')){

    /**

     * codeless_sc_label_badget()

     * Shortcode generator labels and badgets

     * @param mixed $atts

     * @param mixed $content

     * @param string $shortcodename

     * @return

     */

    function codeless_sc_label_badget($atts, $content=null, $shortcodename =""){

        extract(shortcode_atts(array('style' => '', 'type' => ''), $atts));

        $style = ($style == 'default')?'':$style;

        

        $output = '<span class="'.esc_attr($type).' '.$type.'-'.esc_attr($style).'">'.do_shortcode($content).'</span>'; 

        return $output;

    }

    add_shortcode('label_badget', 'codeless_sc_label_badget');

}


if(!function_exists('codeless_sc_alert')){

    /**

     * codeless_sc_alert()

     * This functions generate all alert boxes

     * @param mixed $atts

     * @param mixed $content

     * @param string $shortcodename

     * @return

     */

    function codeless_sc_alert($atts, $content=null, $shortcodename =""){

        extract(shortcode_atts(array('title' => '', 'style' => ''), $atts));

        $style = ($style == 'default')?'':$style;

        $output = '<div class="alert alert-'.esc_attr($style).'">';

        $output .= '<h1>'.esc_attr($title).'</h1> '.'<div class="alert_content">'.do_shortcode($content).'</div>';

       

        $output .= '</div>';

        return $output;

    }

    add_shortcode('alert', 'codeless_sc_alert');

}


if(!function_exists('codeless_sc_tooltip')){

    /**

     * codeless_sc_tooltip()

     * Tooltip to show some annotation

     * @param mixed $atts

     * @param mixed $content

     * @param string $shortcodename

     * @return

     */

    function codeless_sc_tooltip($atts, $content=null, $shortcodename =""){

        extract(shortcode_atts(array('title' => ''), $atts));

        $output = '<a href="#" rel="tooltip" title="'.esc_attr($title).'">'.do_shortcode($content).'</a>';

        return $output;

    }

    add_shortcode('tooltip', 'codeless_sc_tooltip');

}



if(!function_exists('codeless_sc_h1')){

    /**

     * codeless_sc_h1()

     * 

     * @param mixed $atts

     * @param mixed $content

     * @param string $shortcodename

     * @return

     */

    function codeless_sc_h1($atts, $content = null, $shortcodename=""){

        return '<h1 class="shortcode_h1">'.do_shortcode($content).'</h1>';

    }

    add_shortcode('h1_heading', 'codeless_sc_h1');

}

if(!function_exists('codeless_sc_h2')){

    /**

     * codeless_sc_h2()

     * 

     * @param mixed $atts

     * @param mixed $content

     * @param string $shortcodename

     * @return

     */

    function codeless_sc_h2($atts, $content = null, $shortcodename=""){

        return '<h2 class="shortcode_h2">'.do_shortcode($content).'</h2>';

    }

    add_shortcode('h2_heading', 'codeless_sc_h2');

}

if(!function_exists('codeless_sc_h3')){

    /**

     * codeless_sc_h3()

     * 

     * @param mixed $atts

     * @param mixed $content

     * @param string $shortcodename

     * @return

     */

    function codeless_sc_h3($atts, $content = null, $shortcodename=""){

        return '<h3 class="shortcode_h3">'.do_shortcode($content).'</h3>';

    }

    add_shortcode('h3_heading', 'codeless_sc_h3');

}

if(!function_exists('codeless_sc_h4')){

    /**

     * codeless_sc_h4()

     * 

     * @param mixed $atts

     * @param mixed $content

     * @param string $shortcodename

     * @return

     */

    function codeless_sc_h4($atts, $content = null, $shortcodename=""){

        return '<h4 class="shortcode_h4">'.do_shortcode($content).'</h4>';

    }

    add_shortcode('h4_heading', 'codeless_sc_h4');

}

if(!function_exists('codeless_sc_h5')){

    /**

     * codeless_sc_h5()

     * 

     * @param mixed $atts

     * @param mixed $content

     * @param string $shortcodename

     * @return

     */

    function codeless_sc_h5($atts, $content = null, $shortcodename=""){

        return '<h4 class="shortcode_h5">'.do_shortcode($content).'</h5>';

    }

    add_shortcode('h5_heading', 'codeless_sc_h5');

}

if(!function_exists('codeless_sc_h6')){

    /**

     * codeless_sc_h6()

     * 

     * @param mixed $atts

     * @param mixed $content

     * @param string $shortcodename

     * @return

     */

    function codeless_sc_h6($atts, $content = null, $shortcodename=""){

        return '<h6 class="shortcode_h6">'.do_shortcode($content).'</h6>';

    }

    add_shortcode('h6_heading', 'codeless_sc_h6');

}
if(!function_exists('codeless_sc_dropcaps')){

    /**

     * codeless_sc_dropcaps()

     * Dropcaps typography

     * @param mixed $atts

     * @param mixed $content

     * @param string $shortcodename

     * @return

     */

    function codeless_sc_dropcaps($atts, $content = null, $shortcodename=""){
         
         extract(shortcode_atts(array('form' => '', 'color' => '', 'fontcolor' => ''), $atts));
         if($form == 'no-form') 
            $color = '';
         return '<span class="dropcaps '.esc_attr($form).'" style="background:'.esc_attr($color).'; color:'.esc_attr($fontcolor).'!important">'.do_shortcode($content).'</span>';

    }

    add_shortcode('dropcaps', 'codeless_sc_dropcaps');

}


if(!function_exists('codeless_sc_player_audio')){

    /**

     * codeless_sc_player()

     * Sound player

     * @param mixed $atts

     * @param mixed $content

     * @param string $shortcodename

     * @return

     */

    function codeless_sc_player_audio($atts, $content = null, $shortcodename=""){

        extract(shortcode_atts(array('title' => '', 'link' => '', 'audio_type'=>''), $atts));

            $output.='<audio id="player2" src="'.esc_url($link).'" type="audio/'.esc_attr($audio_type).'" controls="controls" style="width:100% !important">';       

            $output.='</audio>';

            return $output;   

    }

    add_shortcode('player_audio', 'codeless_sc_player_audio');

}

if(!function_exists('codeless_sc_lightbox')){

    
    /**

     * codeless_sc_Lightbox()

     * Lightbox with images and videos

     * @param mixed $atts

     * @param mixed $content

     * @param string $shortcodename

     * @return

     */

    function codeless_sc_lightbox($atts, $content = null, $shortcodename=""){

        extract(shortcode_atts(array("image_link" => "", 'video' => ''), $atts));

            $output = '';

            if($video != ''){

                    $output .= '<a class="lightbox-media" href="'.esc_url($video).'">';

            }else{

                    $output .= '<a class="lightbox-gallery" href="'.esc_url($image_link).'" title="">';

            }

            $output .= '<div class="visual lightbox">';
               
                $output .= '<img src="'.esc_url($image_link).'" />';
                $output .= '<span class="moon-zoom"></span>';     

            $output .='</div></a>';

            return $output;   

    }

    add_shortcode('lightbox', 'codeless_sc_lightbox');

}



if(!function_exists('codeless_sc_highlights')){ 


    /**

     * codeless_sc_highlights()

     * Highlights for texts

     * @param mixed $atts

     * @param mixed $content

     * @param string $shortcodename

     * @return

     */


    function codeless_sc_highlights($atts, $content = null, $shortcodename=""){

           
        $output .= '<strong class="highlights">'.$content.'</strong>';   
       
        return $output;
         
    }
         
    add_shortcode('highlights', 'codeless_sc_highlights');

}


if(!function_exists('codeless_sc_icon_text')){

    function codeless_sc_icon_text($atts, $content = null, $shortcodename=""){

        extract(shortcode_atts(array("icon" => ""), $atts));
           
        $output .= '<div class="icon_text"><i class="'.esc_attr($icon).'"></i><span>'.$content.'</span></div>';   
       
        return $output;
         
    }
         
    add_shortcode('icon_text', 'codeless_sc_icon_text');
}
    

if(!function_exists('codeless_sc_shortcode_button')){

    function codeless_sc_shortcode_button($atts, $content = null, $shortcodename=""){

         extract(shortcode_atts(array("link" => "", "icon" => "", "type" => "", "target"=>"", "align" => "", "bordercolor" => "", "bordercolor_hover", "color"=>"", "bg_color_hover"=> "","font_color"=>"", "icon_color" => "", "icon_color_hover" =>"", "font_color_hover" =>""), $atts));

            if(!empty($bordercolor))
                $border_c = 'border-color:'.$bordercolor.'; ';
            if(!empty($color))
                $background_c ='background-color:'.$color. '; ';
            if(!empty($font_color))
                $font_c = 'color:'.$font_color.'; ';
            if(!empty($icon_color))
                $icon_c = 'color:'.$icon_color.'; ';
            if(!empty($font_color_hover))
                $font_c_h = 'color:'.$font_color_hover.'; ';
            if(!empty($bg_color_hover))
                $bg_c_h = 'background:'.$bg_color_hover.'; ';
            if(!empty($bordercolor_hover))
                $border_c_h = 'border-color:'.$bordercolor_hover.'; ';
            if(!empty($icon_color_hover))
                $icon_c_h = 'color:'.$icon_color_hover.'; ';

                $id = 'cl'.rand();

                $output .= '<style type="text/css">';

                $output .= '.button #'.$id.'{';

                $output .= $border_c.$background_c.$font_c.$icon_c;

                $output .=  '}';

                $output .= ' .button #'.$id.':hover{';

                $output .= $font_c_h.$bg_c_h.$border_c_h;

                $output .= '}';

                $output .= ' .button #'.$id.' i{';

                $output .= $icon_c;

                $output .='}';

                $output .= ' .button #'.$id.':hover i{';

                $output .= $icon_c_h;

                $output .='}';

                $output .= '.button .gradient {';

                $output .= 'background-image: linear-gradient(bottom, '.$color.' 0%,  '.codeless_adjustBrightness($color, 35).' 100%);';
                $output .= 'background-image: -o-linear-gradient(bottom, '.$color.'  0%, '.codeless_adjustBrightness($color, 35).' 100%);';
                $output .= 'background-image: -moz-linear-gradient(bottom, '.$color.'  0%, '.codeless_adjustBrightness($color, 35).'  100%);';
                $output .= 'background-image: -webkit-linear-gradient(bottom, '.$color.'  0%, '.codeless_adjustBrightness($color, 35).' 100%);';
                $output .= 'background-image: -ms-linear-gradient(bottom, '.$color.'  0%, '.codeless_adjustBrightness($color, 35).'  100%);';
                $output .= 'background-color: '.$color.' ;';
                $output .= 'text-shadow: 1px 1px 0px '.$color.';';
                $output .= 'filter: dropshadow(color='.$color.', offx=1, offy=1);';

                $output .='}';

                $output .='.button .gradient:hover{';

                $output .= 'background-image: linear-gradient(bottom, '.$color.' 0%, '.codeless_adjustBrightness($color, -35).'  100%);';
                $output .= 'background-image: -o-linear-gradient(bottom, '.$color.' 0%, '.codeless_adjustBrightness($color, -35).' 100%);';
                $output .= 'background-image: -moz-linear-gradient(bottom, '.$color.' 0%, '.codeless_adjustBrightness($color, -35).'  100%);';
                $output .= 'background-image: -webkit-linear-gradient(bottom, '.$color.'  0%, '.codeless_adjustBrightness($color, -35).' 100%);';
                $output .= 'background-image: -ms-linear-gradient(bottom, '.$color.'  0%, '.codeless_adjustBrightness($color, -35).' 100%);';
                $output .= 'background-color: '.$color.'';
                $output .= 'text-shadow: 1px 1px 0px '.$color.';';
                $output .= 'filter: dropshadow(color='.$color.', offx=1, offy=1);';
                
                $output .= '}';       

                $output .= '</style>';

                $output .= '<div class="wpb_content_element button">';
                    
                    $output .= '<a id="'.$id.'" class="btn-bt align-'.$align.' '.$type.'" href="'.$link.'" target="'.$target.'" ><span>'.$content.'</span><i class="'.$icon.'"></i></a>';

                $output .= '</div>';

            return $output;

    }

    add_shortcode('shortcode_button', 'codeless_sc_shortcode_button');

}


if(!function_exists('codeless_sc_contact_info')){

    function codeless_sc_contact_info($atts, $content = null, $shortcodename=""){

        extract(shortcode_atts(array("tel" => "", 'addr' => '', 'email' => '', 'bbm' => ''), $atts));
           
        $output .= '<div class="contact_information">';

            if(!empty($addr)):
                $output .= '<dl class="item dl-horizontal addr">';
                    $output .= '<dt><i class="icon-location-arrow"></i></dt>';
                    $output .= '<dd><span class="title">'.__('Our Locations', 'codeless').'</span><p>'.$addr.'</p></dd>';
                $output .= '</dl>';
            endif;

            if(!empty($tel)):
                $output .= '<dl class="item dl-horizontal">';
                    $output .= '<dt><i class="moon-phone"></i></dt>';
                    $output .= '<dd><span class="title">'.__('Telephone Number', 'codeless').'</span><p>'.$tel.'</p></dd>';
                $output .= '</dl>';
            endif;
            
            if(!empty($email)):
                $output .= '<dl class="item dl-horizontal">';
                    $output .= '<dt><i class="icon-envelope"></i></dt>';
                    $output .= '<dd><span class="title">'.__('Email Address', 'codeless').'</span><p>'.$email.'</p></dd>';
                $output .= '</dl>';
            endif;

            if(!empty($bbm)):
                $output .= '<dl class="item dl-horizontal">';
                    $output .= '<dt><span class="bbm_channels"></span></dt>';
                    $output .= '<dd><span class="title">'.__('BBM Channels', 'codeless').'</span><p>'.$bbm.'</p></dd>';
                $output .= '</dl>';
            endif;

        $output .= '</div>';  
       
        return $output;
         
    }
         
    add_shortcode('contact_information', 'codeless_sc_contact_info');
}


?>