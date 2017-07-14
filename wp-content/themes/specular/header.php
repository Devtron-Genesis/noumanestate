<?php global $cl_redata; ?>

<!DOCTYPE html>

<html <?php language_attributes(); ?> class="css3transitions">
 
<head>

    <meta charset="<?php esc_attr(bloginfo( 'charset' )); ?>" />

    <?php  if (function_exists('codeless_favicon'))    { echo codeless_favicon($cl_redata['favicon']['url']); } ?>

    <!-- Title -->

    <?php
    if ( ! function_exists( '_wp_render_title_tag' ) ) {
        function theme_slug_render_title() {
    ?>
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <?php
        }
        add_action( 'wp_head', 'theme_slug_render_title' );
    }else{ ?>
        <title><?php wp_title( '|', true, 'right' ); ?></title>
    <?php }
    ?>

    <!-- Responsive Meta -->
    <?php if($cl_redata['responsive_bool']): ?> <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> <?php endif; ?>

    <!-- Pingback URL -->
    <link rel="pingback" href="<?php esc_url(bloginfo( 'pingback_url' )); ?>" />

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->

	<!--[if lt IE 9]>

	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>

	<![endif]-->

    <?php
    
    //Generated css from options
    include('includes/register/register_styles.php'); 
    
    // Loaded all others styles and scripts.
     	
    ?>

    <?php 
    // Google analytics
    $google_analytics = $cl_redata['tracking_code'];
    ?>
    <script type="text/javascript">
        <?php echo $google_analytics; ?>
    </script>
    
    <?php 
        $custom_js = $cl_redata['custom_js'];
        if(!empty($custom_js)):
    ?>
    
    <script type="text/javascript">
        <?php echo $custom_js ?>
    </script>
    
    <?php endif; ?>
    

    <?php 

    // Loaded all others styles and scripts.
    wp_head(); 

    ?>

</head>

<!-- End of Header -->

<body  <?php body_class(); ?>>

<?php if($cl_redata['show_search']): ?>
    <div class="search_bar"><div class="container"><?php get_search_form() ?></div></div>
<?php endif; ?>

<?php if($cl_redata['extra_navigation']): ?>
    <div class="extra_navigation <?php echo esc_attr($cl_redata['extra_navigation_position']) ?>">
        <a href="#" class="close"></a>
        <div class="content"><?php dynamic_sidebar( "Extra Side Navigation" ); ?></div>
    </div>
<?php endif; ?>

<div class="viewport">

<!-- Used for boxed layout -->
<?php if($cl_redata['site_layout'] == 'boxed'): ?>
<!-- Boxed Layout Wrapper -->
<div class="boxed_layout">
<?php endif; ?>
    

    <!-- Start Top Navigation -->
    <?php if($cl_redata['top_navigation']): ?>
    <div class="top_nav">
        
        <div class="container">
            <div class="row-fluid">
                <div class="span6">
                    <div class="pull-left">
                        <?php dynamic_sidebar( "Top Header Left" ); ?>
                    </div>
                </div>
                <div class="span6">
                    <div class="pull-right">
                        <?php dynamic_sidebar( "Top Header Right" ); ?>
                    </div>
                </div>
               
            </div>
        </div>

    </div>
    <?php endif; ?>

    <!-- End of Top Navigation -->

        
    <?php $header_class = $cl_redata['header_style'];?>

    <?php if($cl_redata['header_style'] == 'header_1' || $cl_redata['header_style'] == 'header_4' || $cl_redata['header_style'] == 'header_5' || $cl_redata['header_style'] == 'header_11'){
        

        if((int) codeless_get_post_id() != 0){
            $page_header_menu_color = redux_post_meta('cl_redata',(int) codeless_get_post_id(), 'page_header_menu_color');
        }
            
        if(isset($page_header_menu_color) && !empty($page_header_menu_color))
            $bgCheck = ($page_header_menu_color =='auto') ? '' : 'background--'.$page_header_menu_color; 
        else
            $bgCheck = 'background--light';
    } 
    ?>

    <?php if($cl_redata['header_6_transparent'] && $header_class == 'header_6'): ?>    
    
    <!-- Header 6 Wrapper -->
    <div class="header_6_wrapper">
     
    <?php endif; ?> 
<?php if($cl_redata['header_transparency'])
    $transparent='transparent';
else $transparent='';
?>

    <!-- Header BEGIN -->
    <div  class="header_wrapper <?php echo $transparent;?> <?php echo esc_attr($header_class) ?> <?php echo esc_attr($bgCheck) ?> <?php if($header_class == 'header_7') echo 'pos--'.esc_attr($cl_redata['header_7_position']) ?>">
        <header id="header" class=" <?php echo $transparent;?>">
            <?php if(!$cl_redata['header_container_full']): ?>
            <div class="container">
            <?php endif; ?>
        	   <div class="row-fluid">
                    <div class="span12">
                        

                        <?php if($header_class == 'header_11'): ?>
                        <div class="centered_header">
                            <nav class="left">
                                <?php 
                                    $args = array("theme_location" => "left", "container" => false, "fallback_cb" => 'codeless_default_menu');
                                    wp_nav_menu($args);  
                                ?> 
                            </nav>
                        <?php endif; ?>

                        <!-- Logo -->
                        <?php if(!isset($css_class)) $css_class=''; ?>
                        <div id="logo" class="<?php echo esc_attr($css_class) ?>">
                            <?php echo codeless_logo() ?>  
                        </div>
                        <!-- #logo END -->

                        <?php if($header_class == 'header_11'): ?>
                            <nav class="right">
                                <?php 
                                    $args = array("theme_location" => "right", "container" => false, "fallback_cb" => 'codeless_default_menu');
                                    wp_nav_menu($args);  
                                ?> 
                            </nav>
                        </div>
                        <?php endif; ?>

                        <?php if($header_class == 'header_5' || $cl_redata['show_search'] || class_exists('Woocommerce') || $cl_redata['extra_navigation']): ?>
                        <!-- Tools -->
                            <div class="header_tools">
                                <div class="vert_mid">
                                    <?php if($header_class == 'header_5'): ?>
                                    <a class="open_full_menu" id="trigger-overlay" href="#">
                                        <i class="icon-bars"></i>
                                    </a>  
                                    <?php endif; ?>

                                    <?php if($cl_redata['show_search']): ?>
                                    <a class="right_search open_search_button" href="#">
                                       <i class="icon-search"></i>
                                    </a>
                                    <?php endif; ?>

                                    <?php if(class_exists('Woocommerce')): ?>
                                    
                                        <?php get_template_part('includes/view/woocommerce', 'cart'); ?>

                                    <?php endif; ?>

                                    <?php if($cl_redata['extra_navigation']): ?>
                                    <a class="extra_navigation_button" href="#">
                                        <i class="icon-bars"></i>
                                    </a>  
                                    <?php endif; ?>  
                                </div>
                            </div>
                        <!-- End Tools-->
                        <?php endif; ?>

                        <?php if($cl_redata['show_button']): ?>
                        <!-- Header Button -->
                        
                            <a href="<?php echo esc_attr($cl_redata['header_button_link']) ?>" class="btn-bt <?php echo esc_attr($cl_redata['overall_button_style'][0]) ?> header_button"><?php echo esc_attr($cl_redata['header_button']) ?></a> 

                        <!-- End Header Button -->
                        <?php endif; ?>

                        <!-- Navigation -->

    			        <?php if($header_class == 'header_5'): ?>
                            <div class="header_5_fullwrapper overlay_menu overlay-hugeinc">
                                <button type="button" class="overlay-close">Close</button>
                                <nav>
                                        <?php 
                                            $args = array("theme_location" => "main", "container" => false, "fallback_cb" => 'codeless_default_menu');
                                            wp_nav_menu($args);  
                                        ?> 
                                </nav>
                            </div>
                        <?php endif; ?> 
                        
                        <?php if($header_class == 'header_1' || $header_class == 'header_2' || $header_class == 'header_3' || $header_class == 'header_4' || $header_class == 'header_7' || $header_class == 'header_8' || $header_class == 'header_9'): ?>	
                        
                        <?php if($header_class == 'header_7') $css_class .= ' pos_'.$cl_redata['header_7_position'].' ' ?>
                        <div id="navigation" class="nav_top pull-right  <?php echo esc_attr($css_class) ?>">
                            <nav>
                            <?php 
                                $args = array("theme_location" => "main", "container" => false, "fallback_cb" => 'codeless_default_menu');
                                wp_nav_menu($args);  
                            ?> 
                            </nav>
                        </div>
                        <?php endif; ?> 

                        <!-- #navigation -->

                         <!-- End custom menu here -->
                        <?php if($cl_redata['responsive_menu_dropdown']): ?>
    		    	         <a href="#" class="mobile_small_menu open"></a>
                        <?php endif; ?>
                        
                        <?php if($header_class == 'header_6' || $header_class == 'header_7' || $header_class == 'header_12'): ?>
                            <div class="header_widgetized">
                                <?php dynamic_sidebar('Header Widgetized Area'); ?>
                            </div>
                        <?php endif; ?>
                        


                    </div>
                </div>
                <?php if($header_class == 'header_3'): ?>
                    <?php if($cl_redata['responsive_menu_dropdown']): ?>
                    <!-- Responsive Menu -->
                    <div class="row-fluid">
                        <?php get_template_part('includes/view/menu', 'small'); ?> 
                    </div>
                    <!-- End Responsive Menu -->
                    <?php endif; ?>
                <?php endif; ?>
                
            <?php if(!$cl_redata['header_container_full']): ?>
            </div>  
            <?php endif; ?>
            <?php if($header_class != 'header_3'): ?>
            
            <?php if($cl_redata['responsive_menu_dropdown']): ?>
            <!-- Responsive Menu -->
                <div class="row-fluid">
                    <?php get_template_part('includes/view/menu', 'small'); ?> 
                </div>
            <!-- End Responsive Menu -->
            <?php endif; ?>
            <?php endif; ?>
        </header>

    </div>
    <?php if($header_class == 'header_6' || $header_class == 'header_10' || $header_class == 'header_12'): ?> 
    <div class="full_nav_menu">  
        <div class="container">
            <div id="navigation" class="nav_top pull-right  <?php echo esc_attr($css_class) ?>">
                <nav>
                    <?php 
                        $args = array("theme_location" => "main", "container" => false, "fallback_cb" => 'codeless_default_menu');
                        wp_nav_menu($args);  
                    ?> 
                </nav>
            </div>
            <?php if($header_class == 'header_12'): ?>
                <div class="after_navigation_widgetized">
                    <?php dynamic_sidebar('After Navigation Area'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>

    <?php if($cl_redata['header_6_transparent'] && $header_class == 'header_6'): ?>    
    </div>
    <!-- Close Header 6 Wrapper -->
    <?php endif; ?> 

    <?php if( (int) codeless_get_post_id() != 0 && !redux_post_meta('cl_redata',(int) codeless_get_post_id(), 'fullscreen_post_style')): ?>
    
    <div class="top_wrapper">
    <?php endif; ?>
        <?php get_template_part('includes/view/sliders_output'); ?>

<!-- .header -->