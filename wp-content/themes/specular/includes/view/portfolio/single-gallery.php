<?php

global $cl_redata;
do_action('codeless_excecute_query_var_action','loop-single_portfolio_bottom');

?>

<div class="container">
    <div class="gallery row">
        <?php if(!empty($cl_redata['single_portfolio_gallery'])): foreach($cl_redata['single_portfolio_gallery'] as $slide): ?>
        <a class="lightbox-gallery" href="<?php echo esc_url($slide['image']) ?>" title="">
            <div class="visual lightbox">
                <img src="<?php echo esc_url(codeless_image_by_id($slide['attachment_id'], 'port3', 'url'))  ?>" alt="">
                <span class="moon-zoom"></span>
            </div>
        </a>
        <?php endforeach; ?>
        <?php endif; ?>
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
    <?php if($cl_redata['single_portfolio_active_comments']) comments_template( '/includes/view/blog/comments.php');  ?>
</div>