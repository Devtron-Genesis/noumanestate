<?php
 
global $cl_redata, $cl_current_view;
do_action( 'codeless_routing_template' , 'page' );
$cl_current_view = 'page';

$id = codeless_get_post_id(); 
$replaced = redux_post_meta('cl_redata',(int) $id);

if(!empty($replaced))
    foreach($replaced as $key => $value){
        $cl_redata[$key] = $value;
    }
$layout = $cl_redata['page_overall_layout'];
if($cl_redata['overwrite_layout'])
    $layout = $cl_redata['layout'];

if($layout == 'fullwidth')
    $spancontent = 12;
else if($layout == 'dual')
    $spancontent = 6;
else
    $spancontent = 9;


get_header();

get_template_part('includes/view/page_header'); ?>

<?php if(!$cl_redata['fullscreen_sections_active']): ?>    
    
<section id="content" class="composer_content" style="background-color:<?php echo (!empty($cl_redata['page_content_background']))?esc_attr($cl_redata['page_content_background']):'#ffffff'; ?>;">
        <?php if($spancontent != 12 || !is_vc()){ ?>
        <div class="container <?php  echo esc_attr($layout) ?>" id="blog">
            <div class="row">
            <?php if($layout == 'sidebar_left' || $layout == 'dual') get_sidebar() ?>   
                <div class="span<?php echo $spancontent ?>">
                    
                    <?php get_template_part( 'includes/view/loop', 'page' ); ?>

                </div>
                <?php
                
                wp_reset_query();    
    
                if($layout == 'sidebar_right' || $layout == 'dual') if($layout != 'dual') get_sidebar(); else get_sidebar('dual');

                ?>

            </div>
        </div>
        <?php }else{ ?>

            <?php get_template_part( 'includes/view/loop', 'page' ); wp_reset_query(); ?>            
             
        <?php } ?>

</section>

<?php else: ?>
    
    <div id="fullpage">
        <?php get_template_part( 'includes/view/loop', 'page' ); wp_reset_query(); ?>
    </div>

<?php endif; ?>


<?php get_footer(); ?>