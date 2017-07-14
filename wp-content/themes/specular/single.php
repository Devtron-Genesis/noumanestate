<?php

global $cl_redata, $cl_current_view;
$cl_current_view = 'single_blog';
$spancontent = 12;

$layout = $cl_redata['singlebloglayout'];

if($cl_redata['overwrite_layout'])
    $layout = $cl_redata['layout'];

if($layout == 'fullwidth')
    $spancontent = 12;
else if($layout == 'dual')
    $spancontent = 6;
else
    $spancontent = 9;


$blog_page = $cl_redata['blogpage'];

get_header();

?>
   
<?php get_template_part('includes/view/page_header'); ?>
<?php if(!$cl_redata['fullscreen_post_style']): ?>
<section id="content" class="<?php echo esc_attr($layout) ?>"  style="background-color:<?php echo (!empty($cl_redata['page_content_background']))?esc_attr($cl_redata['page_content_background']):'#ffffff'; ?>;">
        
        <div class="container" id="blog">
            <div class="row">

            <?php if($layout == 'sidebar_left' || $layout == 'dual') get_sidebar() ?>    

                <div class="span<?php echo esc_attr($spancontent) ?>">
                    
                    <?php get_template_part( 'includes/view/blog/loop', 'index' ); ?>
                    <?php //codeless_author_box(); ?>
                    <?php wp_link_pages() ?>
                    <?php comments_template( '/includes/view/blog/comments.php');  ?>
                </div>

            <?php wp_reset_query(); ?> 

            <?php if($layout == 'sidebar_right' || $layout == 'dual') if($layout != 'dual') get_sidebar(); else get_sidebar('dual'); ?>   

            </div>
        </div>
        
        

</section>
<?php endif; ?>
<?php if($cl_redata['fullscreen_post_style']): ?>
    <?php get_template_part('includes/view/blog/single', 'fullscreen'); ?>
<?php endif; ?>

        <div class="nav-growpop">
            <?php if(is_object(get_previous_post())): ?>
            <a class="prev" href="<?php echo esc_url(get_permalink(get_previous_post()->ID)); ?>">
                <span class="icon-wrap"><i class="icon-angle-left"></i></span>
                <div>
                    <h3><?php echo esc_html(get_previous_post()->post_title); ?></h3>
                    <?php if(has_post_thumbnail(get_previous_post()->ID)): ?>
                    <img src="<?php echo esc_url(codeless_image_by_id(get_post_thumbnail_id(get_previous_post()->ID), 'blog_grid', 'url')) ?>" alt="Previous thumb"/>
                    <?php endif; ?>
                </div>
            </a>

            <?php endif; ?>
            <?php if(is_object(get_next_post())): ?>
            <a class="next" href="<?php echo get_permalink(get_next_post()->ID); ?>">
                <span class="icon-wrap"><i class="icon-angle-right"></i></span>
                <div>
                    <h3><?php echo esc_html(get_next_post()->post_title); ?></h3>
                    <?php if(has_post_thumbnail(get_next_post()->ID)): ?>
                    <img src="<?php echo esc_url(codeless_image_by_id(get_post_thumbnail_id(get_next_post()->ID), 'blog_grid', 'url')) ?>" alt="Next thumb"/>
                    <?php endif; ?>
                </div>
            </a>
            <?php endif; ?> 
        </div>

<?php get_footer(); ?>