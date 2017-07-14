<?php

global $cl_redata;
do_action('codeless_excecute_query_var_action','loop-single_portfolio_bottom');

?>

<div class="container">
    

    <?php if($cl_redata['single_portfolio_content_position_container'] != 'bottom' && $cl_redata['single_portfolio_content_position_container'] != 'top'): ?>
    <div class="row-fluid">
            
        <?php if($cl_redata['single_portfolio_content_position_container'] == 'left'): ?>
            <div class="span3">
                <div class="description">
                    <h4><?php _e('Project Description', 'codeless') ?></h4>
                    <?php the_content(); ?>
                </div>
                <div class="details">
                    <h4><?php _e('Project Details', 'codeless') ?></h4>

                    <ul class="info">
                        <?php if(!empty($cl_redata['single_portfolio_custom_params']) ): for($i = 0; $i < count($cl_redata['single_portfolio_custom_params']); $i++): ?>
                            <?php if(isset($cl_redata['single_portfolio_custom_fields'][$i]) && !empty($cl_redata['single_portfolio_custom_fields'][$i]) ): ?>
                                <li><span class="title"><?php echo esc_attr($cl_redata['single_portfolio_custom_params'][$i]) ?></span><span><?php echo esc_attr($cl_redata['single_portfolio_custom_fields'][$i]) ?></span></li>
                            <?php endif; ?>
                        <?php endfor;  endif; ?>
                        <?php if($cl_redata['portfolio_post_like']): ?>   
                            <li class="share_link"><a href="javascript:void(0)"><i class="steadysets-icon-share"></i></a></li>
                            <li class="post-like"><?php echo getPostLikeLink( get_the_ID() ); ?></li> 
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        
        <?php endif; ?> 
        
        <div class="span9">
            <div class="media">
                
                <?php if($cl_redata['single_portfolio_media'] == 'featured'): ?>
                    <img src="<?php echo esc_url(codeless_image_by_id(get_post_thumbnail_id(), '', 'url'))  ?>" alt="">
                <?php endif; ?>
                <?php 
                    if($cl_redata['single_portfolio_media'] == 'slideshow'): 
                        $slider = new codeless_slideshow(get_the_ID(), 'flexslider');
                            $slider->slides = $cl_redata['single_portfolio_gallery'];
                            $slider->slide_number = count($cl_redata['single_portfolio_gallery']);
                            if($slider && $slider->slide_number > 0){  
                                $slider->img_size = '';
                                $sliderHtml = $slider->render_slideshow();
                                echo $sliderHtml;
                            }
                    endif; 
                ?>
                <?php 
                    if($cl_redata['single_portfolio_media'] == 'video'){
                            $video = ""; 

                            if(codeless_backend_is_file( $cl_redata['single_portfolio_video'], 'html5video')){

                                $video = codeless_html5_video_embed($cl_redata['single_portfolio_video']);

                            }
                            else if(strpos($cl_redata['single_portfolio_video'],'<iframe') !== false)
                            {
                                $video = $cl_redata['single_portfolio_video'];
                            }
                            else
                            {
                                global $wp_embed;
                                $video = $wp_embed->run_shortcode("[embed]".trim($cl_redata['single_portfolio_video'])."[/embed]");
                            }

                            if(strpos($video, '<a') === 0)
                            {
                                $video = '<iframe src="'.esc_url($cl_redata['single_portfolio_video']).'"></iframe>';
                            } 

                            echo $video;               
                    }
                ?>
            </div>
        </div>
   
    <!------------ end single portfolio item with content at left-->


<!------------ single portfolio item with content at right-->
        <?php if($cl_redata['single_portfolio_content_position_container'] == 'right'): ?>
            <div class="span3">
                <div class="description">
                    <h4><?php _e('Project Description', 'codeless') ?></h4>
                    <?php the_content(); ?>
                </div>
                <div class="details">
                    <h4><?php _e('Project Details', 'codeless') ?></h4>

                    <ul class="info">
                        <?php if(!empty($cl_redata['single_portfolio_custom_params']) ): for($i = 0; $i < count($cl_redata['single_portfolio_custom_params']); $i++): ?>
                            <?php if(isset($cl_redata['single_portfolio_custom_fields'][$i]) && !empty($cl_redata['single_portfolio_custom_fields'][$i]) ): ?>
                                <li><span class="title"><?php echo esc_attr($cl_redata['single_portfolio_custom_params'][$i]) ?></span><span><?php echo esc_attr($cl_redata['single_portfolio_custom_fields'][$i]) ?></span></li>
                            <?php endif; ?>
                        <?php endfor;  endif; ?>
                        <?php if($cl_redata['portfolio_post_like']): ?>   
                            <li class="shares"><a href="javascript:void(0)"><i class="steadysets-icon-share"></i></a></li>
                            <li class="share_link"><a href="javascript:void(0)"><i class="steadysets-icon-share"></i></a></li>
                            <li class="post-like"><?php echo getPostLikeLink( get_the_ID() ); ?></li> 
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?> 
    </div>
    <?php endif; ?>
    <!------------end single portfolio item with content at right-->


<!------------ single portfolio item with content in bottom-->

    <?php if($cl_redata['single_portfolio_content_position_container'] == 'bottom'): ?>
    <div class="media">
        <?php if($cl_redata['single_portfolio_media'] == 'featured'): ?>
            <img src="<?php echo esc_url(codeless_image_by_id(get_post_thumbnail_id(), '', 'url'))  ?>" alt="">
        <?php endif; ?>
        <?php 
            if($cl_redata['single_portfolio_media'] == 'slideshow'): 
                $slider = new codeless_slideshow(get_the_ID(), 'flexslider');
                    $slider->slides = $cl_redata['single_portfolio_gallery'];
                    $slider->slide_number = count($cl_redata['single_portfolio_gallery']);
                    if($slider && $slider->slide_number > 0){  
                        $slider->img_size = 'blog';
                        $sliderHtml = $slider->render_slideshow();
                        echo $sliderHtml;
                    }
            endif; 
        ?>
        <?php 
                    if($cl_redata['single_portfolio_media'] == 'video'){
                            $video = ""; 

                            if(codeless_backend_is_file( $cl_redata['single_portfolio_video'], 'html5video')){

                                $video = codeless_html5_video_embed($cl_redata['single_portfolio_video']);

                            }
                            else if(strpos($cl_redata['single_portfolio_video'],'<iframe') !== false)
                            {
                                $video = $cl_redata['single_portfolio_video'];
                            }
                            else
                            {
                                global $wp_embed;
                                $video = $wp_embed->run_shortcode("[embed]".trim($cl_redata['single_portfolio_video'])."[/embed]");
                            }

                            if(strpos($video, '<a') === 0)
                            {
                                $video = '<iframe src="'.esc_url($cl_redata['single_portfolio_video']).'"></iframe>';
                            } 

                            echo $video;               
                    }
        ?>

    </div>
    <div class="row-fluid content"> 
        <div class="span9">
            <h4><?php _e('Project Description', 'codeless') ?></h4>
            <?php the_content(); ?>
        </div>
        <div class="span3">
            <h4><?php _e('Project Details', 'codeless') ?></h4>

            <ul class="info">
                <?php if(!empty($cl_redata['single_portfolio_custom_params']) ): for($i = 0; $i < count($cl_redata['single_portfolio_custom_params']); $i++): ?>
                    <?php if(isset($cl_redata['single_portfolio_custom_fields'][$i]) && !empty($cl_redata['single_portfolio_custom_fields'][$i]) ): ?>
                        <li><span class="title"><?php echo esc_attr($cl_redata['single_portfolio_custom_params'][$i]) ?></span><span><?php echo esc_attr($cl_redata['single_portfolio_custom_fields'][$i]) ?></span></li>
                    <?php endif; ?>
                <?php endfor;  endif; ?>
                <?php if($cl_redata['portfolio_post_like']): ?>   
                    <li class="post-like"><?php echo getPostLikeLink( get_the_ID() ); ?></li> 
                <?php endif; ?>
            </ul>
        </div>
    </div>
    <?php endif; ?>
<!------------end single portfolio item with content in bottom-->


<!------------single portfolio item with content on top-->

    <?php if($cl_redata['single_portfolio_content_position_container'] == 'top'): ?>
    
    <div class="row-fluid content"> 
        <div class="span9">
            <h4><?php _e('Project Description', 'codeless') ?></h4>
            <?php the_content(); ?>
        </div>
        <div class="span3">
            <h4><?php _e('Project Details', 'codeless') ?></h4>

            <ul class="info">
                <?php if(!empty($cl_redata['single_portfolio_custom_params']) ): for($i = 0; $i < count($cl_redata['single_portfolio_custom_params']); $i++): ?>
                    <?php if(isset($cl_redata['single_portfolio_custom_fields'][$i]) && !empty($cl_redata['single_portfolio_custom_fields'][$i]) ): ?>
                        <li><span class="title"><?php echo esc_attr($cl_redata['single_portfolio_custom_params'][$i]) ?></span><span><?php echo esc_attr($cl_redata['single_portfolio_custom_fields'][$i]) ?></span></li>
                    <?php endif; ?>
                <?php endfor;  endif; ?>
                <?php if($cl_redata['portfolio_post_like']): ?>   
                    <li class="post-like"><?php echo getPostLikeLink( get_the_ID() ); ?></li> 
                <?php endif; ?>
            </ul>
        </div>
    </div>

    <div class="media">
        <?php if($cl_redata['single_portfolio_media'] == 'featured'): ?>
            <img src="<?php echo esc_url(codeless_image_by_id(get_post_thumbnail_id(), '', 'url'))  ?>" alt="">
        <?php endif; ?>
        <?php 
            if($cl_redata['single_portfolio_media'] == 'slideshow'): 
                $slider = new codeless_slideshow(get_the_ID(), 'flexslider');
                    $slider->slides = $cl_redata['single_portfolio_gallery'];
                    $slider->slide_number = count($cl_redata['single_portfolio_gallery']);
                    if($slider && $slider->slide_number > 0){  
                        $slider->img_size = 'blog';
                        $sliderHtml = $slider->render_slideshow();
                        echo $sliderHtml;
                    }
            endif; 
        ?>
        <?php 
                    if($cl_redata['single_portfolio_media'] == 'video'){
                            $video = ""; 

                            if(codeless_backend_is_file( $cl_redata['single_portfolio_video'], 'html5video')){

                                $video = codeless_html5_video_embed($cl_redata['single_portfolio_video']);

                            }
                            else if(strpos($cl_redata['single_portfolio_video'],'<iframe') !== false)
                            {
                                $video = $cl_redata['single_portfolio_video'];
                            }
                            else
                            {
                                global $wp_embed;
                                $video = $wp_embed->run_shortcode("[embed]".trim($cl_redata['single_portfolio_video'])."[/embed]");
                            }

                            if(strpos($video, '<a') === 0)
                            {
                                $video = '<iframe src="'.esc_url($cl_redata['single_portfolio_video']).'"></iframe>';
                            } 

                            echo $video;               
                    }
        ?>

    </div>

    <?php endif; ?>
<!------------end single portfolio item with content on top-->

    <?php if($cl_redata['single_portfolio_active_comments']) comments_template( '/includes/view/blog/comments.php');  ?>
</div>