<?php

global $cl_redata;
global $used_for_element;

$columns = (isset($used_for_element)) ? $used_for_element['columns'] : $cl_redata['portfolio_columns'];
$sidebar = $cl_redata['layout'];
$style = (isset($used_for_element)) ? $used_for_element['style'] : $cl_redata['portfolio_style'];

$extra_class = '';
if(isset($used_for_element) && $used_for_element['carousel'] == 'yes')
    $extra_class .= ' swiper-slide';

if(!isset($used_for_element))
    codeless_set_portfolio_query();  

if(have_posts()){
    $item_grid_class = '';
    
    switch($columns){
        case "1": $item_grid_class = 12; break;
        case "2": $item_grid_class = 6; break;
        case "3": $item_grid_class = 4; break;
        case "4": $item_grid_class = 3; break;
        case "5": $item_grid_class = 5; break;
    }
    
    ?>

        <div class="row masonry"> 
            
            <div class="grid-size"></div>

    <?php

    $the_id = 0;
    $loop_counter = 0;

    $masonry_order[4] = array('3', '1', '1', '1', '1', '1', '1', '1', '2', '1', '1', '2', '1', '1', '1', '1');

    $masonry_order[3] = array('1', '1', '1', '2', '1', '1', '2', '1', '1', '1', '1', '1', '3', '1', '1', '2');

    $masonry_order[2] = array('1', '1', '2', '1', '1', '2', '2', '1', '1', '2', '1', '1', '2', '1', '1', '2');

    $masonry_order[5] = array('2', '2', '1', '1', '3', '1', '1', '2', '1', '1', '1', '1', '1', '2', '3', '1');

    while (have_posts()) : the_post();  
    
        
        $the_id     = get_the_ID();


        $sort_classes = "";
        $item_categories = get_the_terms( $the_id, 'portfolio_entries' );
    
        if(is_object($item_categories) || is_array($item_categories))
        {
            foreach ($item_categories as $cat)
            {
                $sort_classes .= $cat->slug.' ';
            }
        }

        $cats = wp_get_object_terms(get_the_ID(), 'portfolio_entries');

        switch($columns){
            case "2": $probability = array('1' => 80, '2' => 20); break;
            case "3": $probability = array('1' => 75, '2' => 16, '3' => 9); break;
            case "4": $probability = array('1' => 75, '2' => 15); break; 
            case "5": $probability = array('1' => 83, '2' => 17); break;
        }

        $link = get_permalink();
        if($cl_redata['single_custom_link_switch'] && !empty($cl_redata['single_custom_link']))
            $link = $cl_redata['single_custom_link'];
        
    ?>
        
       <!-- Portfolio Normal Mode -->
       <?php if($style == 'overlayed'){ ?>
    <!-- item -->
                
                            <div class="portfolio-item mix w<?php echo esc_attr($masonry_order[$columns][$loop_counter%15]); ?> <?php echo esc_attr($sort_classes) ?> <?php echo esc_attr($extra_class) ?> <?php echo $style ?>" data-id="<?php echo get_the_ID() ?>">
                                        <div class="he-wrap tpl2">
                                        <a href="<?php echo $link ?>"></a>
                                        <img src="<?php echo esc_url(codeless_image_by_id(get_post_thumbnail_id(), 'port3', 'url')) ?>" alt="">
                                   
                                       <div class="overlay he-view">
                                            <div class="bg a0" data-animate="fadeIn">
                                                <div class="center-bar v1">
                                                    <h4 data-animate="fadeInUp" class="a1"><?php echo get_the_title() ?></h4>
                                                    <h6 data-animate="fadeInUp" class="a2"><?php echo $sort_classes ?></h6>
                                                </div>
                                            </div>
                                             
                                        </div>   
                                            
                                            
                                                
                                     </div>      
                                           
                        </div>
            <?php }else if($style == 'grayscale'){ ?>
              <div class="portfolio-item mix w<?php echo esc_attr($masonry_order[$columns][$loop_counter%15]); ?> <?php echo esc_attr($sort_classes) ?> <?php echo $extra_class ?> <?php echo $style ?>" data-id="<?php echo get_the_ID() ?>">
                                        <div class="">
                                            
                                            <img src="<?php echo esc_url(codeless_image_by_id(get_post_thumbnail_id(), 'port3', 'url')) ?>" alt="">
                                           
                                          
                                           <div class="project">
                                                <h5><a href="<?php echo $link ?>"><?php echo get_the_title() ?></a></h5>
                                                <h6><?php echo $sort_classes ?></h6>
                                            </div>   
                                            
                                            
                                                
                                        </div>          
                                        
                                           
                        </div>



            <?php }else if($style == 'basic'){ ?>

                 <div class="portfolio-item mix  w<?php echo esc_attr($masonry_order[$columns][$loop_counter%15]); ?> <?php echo esc_attr($sort_classes) ?> <?php echo esc_attr($extra_class) ?> <?php echo $style ?>" data-id="<?php echo get_the_ID() ?>">
                    <div class="he-wrap tpl2">
                                        
                        <img src="<?php echo esc_url(codeless_image_by_id(get_post_thumbnail_id(), 'port3', 'url')) ?>" alt="">
                                     
                        <div class="overlay he-view">
                            <div class="bg a0" data-animate="fadeIn">
                                <div class="center-bar v1">
                                    <a href="<?php echo esc_url(codeless_image_by_id(get_post_thumbnail_id(), array("width"=> 1200, "height" => 1200), "url")) ?>" class="link a2 lightbox-gallery lightbox" data-animate="fadeInRight"><i class="moon-search-3"></i></a></a>
                                    <a href="<?php echo $link ?>" class="link a1" data-animate="fadeInLeft"><i class="moon-link-4"></i></a></a>
                                </div>
                             </div> 
                        </div>                           
                    </div>   

                                     
                    <div class="show_text">
                        <h5><a href="<?php echo $link ?>"><?php echo get_the_title() ?></a></h5>
                        <h6><?php echo esc_html($sort_classes) ?></h6>
                    </div>     
                 
                </div>
        
            <?php }else if($style == 'chrome'){ ?>
                
                <div class="portfolio-item mix   w<?php echo esc_attr($masonry_order[$columns][$loop_counter%15]); ?>  <?php echo esc_attr($sort_classes) ?> <?php echo esc_attr($extra_class) ?>  <?php echo esc_attr($style) ?>" data-id="<?php echo get_the_ID() ?>">
                    <div class="overlay">
                        <div class="bar"></div>
                        <img src="<?php echo esc_url(codeless_image_by_id(get_post_thumbnail_id(), 'staff_full', 'url')) ?>" alt="">
                        <span>
                            <a href="<?php echo $link ?>" class="btn-bt <?php echo $cl_redata['overall_button_style'][0] ?>"><?php _e('View', 'codeless') ?></a>
                        </span>
                    </div>
                          
                    <div class="show_text">
                        <h5><a href="<?php echo $link ?>"><?php echo get_the_title() ?></a></h5>
                    </div>         
                 
                </div>

            <?php } ?>
        <!-- Portfolio Normal Mode End -->

    <?php $loop_counter++; ?>
<?php endwhile;  ?>


    </div>


<?php } ?> 

<?php if(!isset($used_for_element)): ?>
<?php codeless_pagination_display(); ?>
<?php endif; ?>