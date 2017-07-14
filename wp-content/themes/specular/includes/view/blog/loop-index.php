<?php

global $cl_redata;

do_action('codeless_excecute_query_var_action','loop-index');

if (have_posts()) :



    while (have_posts()) : the_post();



        $post_id    = get_the_ID();

        $title      = get_the_title();

        $content    = get_the_content();

        $content    = str_replace(']]>', ']]&gt;', apply_filters('the_content', $content ));

                

        $post_format = get_post_format($post_id);

        if(strlen($post_format) == 0)

            $post_format = 'standart';

        $count = 0;

        $comment_entries = get_comments(array( 'type'=> 'comment', 'post_id' => $post->ID ));

        if(count($comment_entries) > 0){

            foreach($comment_entries as $comment){

                if($comment->comment_approved)

                    $count++;

            }

        }


        $tags = get_the_tags();
        $tag_out = ''; $num=count($tags); $i=0; if($tags) foreach($tags as $tag): if(++$i === $num){$tag_out .= $tag->name;} else {$tag_out .= $tag->name.', ';}  endforeach;
                                   

        ?>

        

        <article id="post-<?php echo the_ID(); ?>" <?php echo post_class('row-fluid blog-article standard-style normal'); ?>>                    

            
         <?php if($post_format == 'standart'){
                $icon_class="pencil";
            }elseif($post_format == 'audio'){
                $icon_class="music";
            }elseif($post_format == 'soundcloud'){
                $icon_class="music";
            }elseif($post_format == 'video'){
                $icon_class="play";
            }elseif($post_format == 'quote'){
                $icon_class="quote-left";
            }elseif($post_format == 'gallery'){
                $icon_class="image";
            }elseif($post_format == 'image'){
                $icon_class="images";
            }


         ?>



                <div class="media">
                    <!-- <div class="post_type"><i class="moon-<?php echo $icon_class ?>"></i></div> -->
                    <?php if($post_format == 'audio'){

                        $link = $cl_redata['media_post_link'];

                        echo do_shortcode('[soundcloud]'.$link.'[/soundcloud]');

                    
                    }elseif($post_format == 'gallery'){

                            $slider = new codeless_slideshow(get_the_ID(), 'flexslider');

                            if($slider && $slider->slide_number > 0){
                                
                                $slider->img_size = 'blog';
                                $sliderHtml = $slider->render_slideshow();
                                echo $sliderHtml;

                            }

                    }elseif($post_format == 'video'){

                            $video = ""; 

                            $link = $cl_redata['media_post_link'];

                            if(codeless_backend_is_file( $link, 'html5video')){

                                $video = codeless_html5_video_embed($link);

                            }
                            else if(strpos($link,'<iframe') !== false)
                            {
                                $video = $link;
                            }
                            else
                            {
                                global $wp_embed;
                                $video = $wp_embed->run_shortcode("[embed]".trim($link)."[/embed]");
                            }

                            if(strpos($video, '<a') === 0)
                            {
                                $video = '<iframe src="'.esc_url($link).'"></iframe>';
                            } 

                            echo $video;

                    }elseif(get_post_thumbnail_id()){ ?>
                        <?php if(!is_single()): ?>
                            <a href="<?php echo esc_url(get_permalink()) ?>"><div class="overlay"><div class="post_type_circle"><i class="icon-chevron-right"></i></div></div></a>
                        <?php endif; ?>

                        <?php if(!is_single() || (is_single() && $cl_redata['use_featured_image_as_photo']) ): ?>
                            <img src="<?php echo esc_url(codeless_image_by_id(get_post_thumbnail_id(), 'blog', 'url')) ?>" alt="">
                        <?php endif; ?>
                    <?php } ?>                                    
                
                </div>

                <div class="content">
                    <?php if($post_format == 'quote'){ ?>

                        <ul class="info">
                            <?php if($cl_redata['blog_info_author']): ?>
                            <li><i class="linecon-icon-user"></i><?php _e('Posted by', 'codeless') ?> <?php echo get_the_author() ?></li> 
                            <?php endif; ?>
                            <?php if($cl_redata['blog_info_date']): ?>  
                            <li><i class="linecon-icon-calendar"></i><?php _e('On', 'codeless') ?> <?php echo get_the_date() ?></li>
                            <?php endif; ?>   
                            <?php if($cl_redata['blog_info_comments']): ?>                   
                            <li><i class="icon-comment-alt"></i><?php echo $count ?> <?php _e('Comments', 'codeless') ?></li> 
                            <?php endif; ?>
                            <?php if($cl_redata['blog_info_tags']): ?>
                            <?php if(!empty($tag_out) ): ?>
                                    <li><i class="linecon-icon-tag"></i><?php echo $tag_out ?></li>
                            <?php endif; ?>
                            <?php endif; ?>
                            <?php if($cl_redata['post_like']): ?>   
                            <li class="post-like"><?php echo getPostLikeLink( get_the_ID() ); ?></li> 
                            <?php endif; ?>

                            <?php if($cl_redata['social_shares']): ?>
                            <?php 
                                
                                $google_plus_shares = '<a href="https://plus.google.com/share?url='.esc_url(get_permalink()).'" target="_blank">'; 
                                $facebook_shares = '<a href="http://www.facebook.com/sharer.php?u='.esc_url(get_permalink()).'" target="_blank">';
                                $twitter_shares = '<a href="http://twitter.com/home?status='.get_the_title().' '.esc_url(get_permalink()).'" target="_blank">';
                                $linkedin_shares = '<a href="http://linkedin.com/shareArticle?mini=true&amp;url='.esc_url(get_permalink()).'&title='.get_the_title().'" target="_blank">';
                                $reddit_shares = '<a href="http://reddit.com/submit?url='.esc_url(get_permalink()).'&title='.get_the_title().'" target="_blank">';
                                $tumblr_shares = '<a href="http://www.tumblr.com/share/link?url='.esc_url(get_permalink()).'&name='.get_the_title().'&description='.str_replace('"',"'",get_the_content()).'" target="_blank">';
                                $pinterest_shares ='<a href="http://pinterest.com/pin/create/button/?url='.esc_url(get_permalink()).'&description='.get_the_title().'&media='.esc_url(wp_get_attachment_url(get_post_thumbnail_id())).'" target="_blank">';
                                $digg_shares ='<a href="http://www.digg.com/submit?url='.esc_url(get_permalink()).' " target="_blank">';
                                $mail_shares = '<a href="mailto:?subject='.get_the_title().'&body='.esc_url(get_permalink()).'">';

                                ?>
                                <div class="shares_container">
                                    <ul class="shares">                 
                                        <li class="facebook"><?php echo $facebook_shares; ?><i class="moon-facebook"></i></a></li>
                                        <li class="twitter"><?php echo $twitter_shares; ?><i class="moon-twitter"></i></a></li>
                                        <li class="google"><?php echo $google_plus_shares; ?><i class="moon-google"></i></a></li>
                                        <li class="tumblr"><?php echo $tumblr_shares; ?><i class="moon-tumblr"></i></a></li>    
                                    </ul>
                                    <li class="shares"><a href="javascript:void(0)"><i class="steadysets-icon-share"></i></a></li>
                                </div>
                            <?php endif; ?>
                            

                            
                        </ul>

                        <div class="quote">
                            <i class="icon-quote-left"></i>
                            <p><?php echo get_the_content() ?></p>
                            <span class="author"><?php echo esc_html(get_the_title()) ?></span>
                        </div>

                    <?php }else{ ?>

                    <h1><a href="<?php echo esc_url(get_permalink()) ?>"><?php echo esc_html(get_the_title()) ?></a></h1>
                    <ul class="info">
                        <?php if($cl_redata['blog_info_author']): ?>
                        <li><i class="linecon-icon-user"></i><?php _e('Posted by', 'codeless') ?> <?php echo get_the_author() ?></li> 
                        <?php endif; ?>
                        <?php if($cl_redata['blog_info_date']): ?>
                        <li><i class="linecon-icon-calendar"></i><?php _e('On', 'codeless') ?> <?php echo get_the_date() ?></li>                           
                        <?php endif; ?>
                        <?php if($cl_redata['blog_info_comments']): ?>
                        <li><i class="icon-comment-o"></i><?php echo $count ?> <?php _e('Comments', 'codeless') ?></li> 
                        <?php endif; ?>
                        <?php if($cl_redata['blog_info_tags']): ?>
                        <?php if(!empty($tag_out) ): ?>
                                <li><i class="linecon-icon-tag"></i><?php echo $tag_out ?></li>
                        <?php endif; ?>     
                        <?php endif; ?>
                        
                    </ul>
 
                    <div class="text">
                        <?php   
                            if(is_single()){
                                the_content();
                            }else{
                                if($post_format == 'video' || $post_format == 'audio')
                                    echo codeless_text_limit(get_the_content(), 60);
                                else
                                    echo get_the_excerpt();
                            }
                                    
                        ?>
                    </div>
                    <?php if(!is_single()): ?>
                    <a href="<?php echo get_permalink() ?>" class="btn-bt <?php echo esc_attr($cl_redata['overall_button_style'][0]) ?>"><span><?php _e('Read More', 'codeless') ?></span><i class="moon-arrow-right-5"></i></a>
                    <?php endif; ?>
                    <?php if($cl_redata['post_like']): ?>  
                    <div class="post-like"><?php echo getPostLikeLink( get_the_ID() ); ?></div>
                    <?php endif; ?>
                        <?php if($cl_redata['social_shares']): ?>
                            <?php 
                                
                                $google_plus_shares = '<a href="https://plus.google.com/share?url='.esc_url(get_permalink()).'" target="_blank">'; 
                                $facebook_shares = '<a href="http://www.facebook.com/sharer.php?u='.esc_url(get_permalink()).'" target="_blank">';
                                $twitter_shares = '<a href="http://twitter.com/home?status='.get_the_title().' '.esc_url(get_permalink()).'" target="_blank">';
                                $linkedin_shares = '<a href="http://linkedin.com/shareArticle?mini=true&amp;url='.esc_url(get_permalink()).'&title='.get_the_title().'" target="_blank">';
                                $reddit_shares = '<a href="http://reddit.com/submit?url='.esc_url(get_permalink()).'&title='.get_the_title().'" target="_blank">';
                                $tumblr_shares = '<a href="http://www.tumblr.com/share/link?url='.esc_url(get_permalink()).'&name='.get_the_title().'&description='.str_replace('"',"'",get_the_content()).'" target="_blank">';
                                $pinterest_shares ='<a href="http://pinterest.com/pin/create/button/?url='.esc_url(get_permalink()).'&description='.get_the_title().'&media='.esc_url(wp_get_attachment_url(get_post_thumbnail_id())).'" target="_blank">';
                                $digg_shares ='<a href="http://www.digg.com/submit?url='.esc_url(get_permalink()).' " target="_blank">';
                                $mail_shares = '<a href="mailto:?subject='.get_the_title().'&body='.esc_url(get_permalink()).'">';

                                ?>
                                
                                <div class="shares_container">
                                    <ul class="shares">                 
                                        <li class="facebook"><?php echo $facebook_shares; ?><i class="moon-facebook"></i></a></li>
                                        <li class="twitter"><?php echo $twitter_shares; ?><i class="moon-twitter"></i></a></li>
                                        <li class="google"><?php echo $google_plus_shares; ?><i class="moon-google"></i></a></li>
                                        <li class="tumblr"><?php echo $tumblr_shares; ?><i class="moon-tumblr"></i></a></li>    
                                    </ul>
                                    <div class="share_link"><a href="javascript:void(0)"><i class="steadysets-icon-share"></i></a></div>
                                </div>
                        <?php endif; ?>
                    
                    <?php } ?>

                </div>
                <?php if(is_single()) paginate_links(); ?>
        </article>

    <?php endwhile; ?>
    
    <?php if(!is_single()): ?>
    
        <?php codeless_pagination_display() ?>
    
    <?php endif; ?>

<?php endif;

?>