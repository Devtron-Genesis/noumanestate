<?php 

/* ---------- Slider ---------------- */

wp_reset_postdata();

global $cl_redata;

if(( is_home() || is_page()) && !is_single() ){

    if($cl_redata['slider_fixed'])
        $extra_class = 'fixed_parallax';

    $slider = new codeless_slideshow(codeless_get_post_id());
    if($slider && $slider->slide_number > 0 && $slider->slide_type != '' && $slider->slide_type != 'none'){

        if($slider->options['slideshow_layout'] == 'boxed'){

            $slider->img_size = 'portfolio_bottom';

    ?>

    

    <section id="slider-fixed" class="slider <?php echo esc_attr($extra_class) ?>" style="<?php echo $extra_style ?>">

        <div class="container">

            <div class="row">

                <div class="span12">

    <?php

    }elseif($slider->options['slideshow_layout'] == 'fullwidth'){

    ?>


    <section id="slider-fullwidth"  class="slider <?php echo esc_attr($extra_class) ?>">
                                       
    <?php }  ?>

        <?php echo $slider->display(); 

        if($slider->options['slideshow_layout'] == 'boxed'){ ?>


                </div>    
            </div>
        </div>
    </section>

     <?php }else{ ?>

    </section>


    <?php }

    }else{ ?>
        <?php if(has_post_thumbnail(codeless_get_post_id()) && $cl_redata['use_featured_image_as_photo']): ?>
        
            <span class="slider-img" style="background-image:url('<?php echo esc_url(codeless_image_by_id(get_post_thumbnail_id(codeless_get_post_id()), '', 'url')) ?>');"></span>
        
        <?php endif; ?>
    <?php }

}
/* ---------- End Slider -------------- */
?>   