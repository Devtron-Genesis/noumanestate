<?php
/*
Template Name: Archive
*/

global $cl_redata, $cl_current_view;
$cl_current_view = 'blog';
$spancontent = 12;

if($cl_redata['bloglayout'] == 'fullwidth')
    $spancontent = 12;
else
    $spancontent = 9;

$blog_page = $cl_redata['blogpage'];

get_header();

?>
 
<?php $blog_style = $cl_redata['blog_style']; ?>
   
<?php get_template_part('template_inc/page_header'); ?>
    
<section id="content" class="<?php echo esc_attr($cl_redata['bloglayout']) ?>"  style="background-color:<?php echo (!empty($cl_redata['page_content_background']))?esc_attr($cl_redata['page_content_background']):'#ffffff'; ?>;">
        <div class="container" id="blog">
            <div class="row">

            <?php if($cl_redata['bloglayout'] == 'sidebar_left') get_sidebar() ?>   

                <div class="span<?php echo $spancontent ?>">
                <?php
                    if($blog_style == 'grid')
                        get_template_part( 'includes/view/blog/loop', 'grid' ); 
                    elseif($blog_style == 'alternate')
                        get_template_part( 'includes/view/blog/loop', 'second-style' );
                    elseif($blog_style == 'masonry')
                        get_template_part( 'includes/view/blog/loop', 'masonry' );
                    elseif($blog_style == 'timeline')
                        get_template_part( 'includes/view/blog/loop', 'timeline' );
                    else
                        get_template_part( 'includes/view/blog/loop', 'index' );
                ?>

            </div>

            <?php wp_reset_query(); ?> 

            <?php if($cl_redata['bloglayout'] == 'sidebar_right') get_sidebar() ?>  

            </div>
        </div>
</section>

<?php get_footer(); ?>