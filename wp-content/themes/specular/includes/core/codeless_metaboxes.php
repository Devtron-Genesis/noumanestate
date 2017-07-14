<?php

// You may replace $redux_opt_name with a string if you wish. If you do so, change loader.php
// as well as all the instances below.
$redux_opt_name = "cl_redata";


/*--------------------------------------SINGLE PORTFOLIO METABOXES------------------------------------------*/
/*----------------------------------------------------------------------------------------------------------*/

if ( !function_exists( "cl_add_single_portfolio_metaboxes" ) ):
    function cl_add_single_portfolio_metaboxes($metaboxes) {
        global $cl_redata;
        $custom_fieldss = $cl_redata['single_portfolio_custom_params'];

        $portfolio_options = array();

        $page_style = array(
            'title'         => __('Page Style', 'codeless-admin'),
            'icon_class'    => 'icon-large',
            'icon'          => 'el-icon-home',
            'fields'        => array(
                array(
                    'id' => 'single_custom_link_switch',
                    'type' => 'switch',
                    'title' => __('Overwrite the link with your custom link', 'codeless-admin'),
                    'default' => 0// 1 = on | 0 = off
                ),
                array(
                    'id' => 'single_custom_link',
                    'title' => __( 'Add Custom Link', 'codeless' ),
                    'type' => 'text',
                    'required' => array('single_custom_link_switch', '=', 1 )
                ), 
                array(
                    'id' => 'single_portfolio_style',
                    'title' => __( 'Select the style of the single portfolio', 'codeless' ),
                    'desc' => 'Please select the style for the portfolio',
                    'type' => 'select',
                    'multi' => false,
                    'default' => 'container',
                    'options' => array('gallery' => 'Gallery Grid', 'floating' => 'Floating Sidebar', 'fullwidth' => 'Fullwidth Slider / Image / Video', 'container' => 'In Container Slider / Image / Video')
                ),
                array(
                    'id' => 'single_portfolio_content_position_floating',
                    'title' => __( 'Content Position', 'codeless' ),
                    'desc' => 'Select the position for the content',
                    'type' => 'select',
                    'options' => array('left' => 'Left', 'right' => 'Right'),
                    'default' => 'right',
                    'required' => array('single_portfolio_style','=', 'floating')
                ),
                array(
                    'id' => 'single_portfolio_content_position_container',
                    'title' => __( 'Content Position', 'codeless' ),
                    'desc' => 'Select the position for the content',
                    'type' => 'select',
                    'options' => array('left' => 'Left', 'right' => 'Right', 'bottom' => 'Bottom', 'top' => 'Top'),
                    'default' => 'right',
                    'required' => array('single_portfolio_style','=', 'container')
                ),
                array(
                    'id' => 'single_portfolio_media',
                    'title' => __( 'Media Type', 'codeless' ),
                    'desc' => 'use feature image, video or slideshow. If you choose slideshow, add images in the gallery below',
                    'type' => 'select',
                    'options' => array('featured' => 'Featured Image', 'video' => 'Video', 'slideshow' => 'Slideshow'),
                    'default' => 'featured',
                    'required' => array('single_portfolio_style', '=', array('fullwidth', 'container') )
                ),
                array(
                    'id' => 'single_portfolio_video',
                    'title' => __( 'Video', 'codeless' ),
                    'desc' => 'Youtube or vimeo video link or iframe',
                    'type' => 'text',
                    'required' => array('single_portfolio_media', '=', 'video' )
                ), 

                array(
                    'id' => 'single_portfolio_gallery',
                    'type' => 'slides',
                    'title' => __('Add/Edit Slides', 'codeless-admin'),
                    'subtitle' => __('Add new or edit existing slider images', 'codeless-admin'),
                    
                ),

                array(
                    'id' => 'single_portfolio_active_comments',
                    'type' => 'switch',
                    'title' => __('Switch On if you want comments functionality', 'codeless-admin'),
                    'default' => 0// 1 = on | 0 = off
                ),


                 
            ),
        );
        $description_fields = codeless_getPortfolioFields();

        $custom_fields = array(
            'title'         => __('Custom Fields', 'codeless-admin'),
            'icon_class'    => 'icon-large',
            'icon'          => 'el-icon-home',
            'fields'        => array(
                array(
                    'id'=>'single_portfolio_custom_fields',
                    'type' => 'multi_text',
                    'title' => __('Custom fields Values', 'codeless-admin'),
                    'subtitle' => __('Create unlimited custom fields in Theme Options. Leave empty if you dont want to display this custom field', 'codeless-admin').'<br /><br />Fields:<br />'.trim($description_fields)
                ),
                 
            ),
        );


        $portfolio_options[] = $page_style;
        $portfolio_options[] = $custom_fields;


        $metaboxes[] = array(
            'id'            => 'portfolio-options',
            'title'         => __( 'Single Portfolio Options', 'codeless' ),
            'post_types'    => array( 'portfolio'),
            'position'      => 'normal', // normal, advanced, side
            'priority'      => 'high', // high, core, default, low
            'sidebar'       => false, // enable/disable the sidebar in the normal/advanced positions
            'sections'      => $portfolio_options,
        );
        return $metaboxes;
    }
    add_action('redux/metaboxes/'.$redux_opt_name.'/boxes', 'cl_add_single_portfolio_metaboxes');
endif;

/*--------------------------------------END SINGLE PORTFOLIO METABOXES--------------------------------------*/
/*----------------------------------------------------------------------------------------------------------*/




/*--------------------------------------PORTFOLIO METABOXES-------------------------------------------------*/
/*----------------------------------------------------------------------------------------------------------*/

if ( !function_exists( "cl_add_portfolio_metaboxes" ) ):
    function cl_add_portfolio_metaboxes($metaboxes) {
        
        $portfolio_options = array();

        $portfolio_options[] = array(
            //'title'         => __('General Settings', 'codeless-admin'),
            'icon_class'    => 'icon-large',
            'icon'          => 'el-icon-home',
            'fields'        => array(
                array(
                    'id' => 'portfolio_categories',
                    'title' => __( 'Portfolio Categories', 'codeless' ),
                    'desc' => 'Please select the categories of portfolio items to connect with this page',
                    'type' => 'select',
                    'multi' => true,
                    'data' => 'categories',
                    'args' => array('orderby'=>'name', 'hide_empty'=> 0, 'taxonomy' => 'portfolio_entries')
                ),
                array(
                    'id' => 'portfolio_mode',
                    'title' => __( 'Portfolio Mode', 'codeless' ),
                    'desc' => 'Select one mode to display items',
                    'type' => 'select',
                    'options' => array('grid' => 'Grid', 'masonry' => 'masonry'),
                    'default' => 'grid'
                ),
                array(
                    'id' => 'portfolio_columns',
                    'title' => __( 'Portfolio Columns', 'codeless' ),
                    'desc' => 'Number of columns for the layout',
                    'type' => 'image_select',
                    'options'  => array(
                            '1'      => array(
                                'alt'   => '1 Column', 
                                'img'   => ReduxFramework::$_url.'assets/img/1col.png'
                            ),
                            '2'      => array(
                                'alt'   => '2 Columns', 
                                'img'   => ReduxFramework::$_url.'assets/img/2-col-portfolio.png'
                            ),
                            '3'      => array(
                                'alt'   => '3 Columns', 
                                'img'  => ReduxFramework::$_url.'assets/img/3-col-portfolio.png'
                            ),
                            '4'      => array(
                                'alt'   => '4 Columns', 
                                'img'   => ReduxFramework::$_url.'assets/img/4-col-portfolio.png'
                            ),
                            '5'      => array(
                                'alt'   => '5 Columns', 
                                'img'   => ReduxFramework::$_url.'assets/img/5-col-portfolio.png'
                            )
                        ),
                    'default' => '3'
                ),
                array(
                    'id' => 'portfolio_style',
                    'title' => __( 'Portfolio Style', 'codeless' ),
                    'desc' => 'Select one style to display items',
                    'type' => 'select',
                    'options' => array('overlayed' => 'Overlayed with base color and zoom effect', 'grayscale' => 'Grayscale (Colored on hover)', 'basic' => 'Basic with Title and Description', 'chrome' => 'With Chrome Browser PNG'),
                    'default' => 'overlayed'
                ),
                array(
                    'id' => 'portfolio_layout',
                    'title' => __( 'Portfolio Layout', 'codeless' ),
                    'desc' => 'The grid layout',
                    'type' => 'select',
                    'options' => array('in_container' => 'Centered grid in container', 'fullwidth' => 'Fullwidth'),
                    'default' => 'in_container'
                ),
                array(
                    'id' => 'portfolio_space',
                    'title' => __( 'Portfolio Space', 'codeless' ),
                    'desc' => 'Space beetwen portfolio items',
                    'type' => 'select',
                    'options' => array( 'normal' => 'Normal grid space', 'no_space' => 'Without space'),
                    'default' => 'normal'
                ),
                array(
                    'id' => 'portfolio_content',
                    'title' => __( 'Portfolio Content Position', 'codeless' ),
                    'desc' => 'Add this page content (Visual Composer Content) on top or bottom of grid ?',
                    'type' => 'select',
                    'options' => array('top' => 'Top', 'bottom' => 'Bottom'),
                    'default' => 'top'
                ),
                array(
                    'id' => 'portfolio_pagination',
                    'type' => 'select',
                    'title' => __('Select the pagination method', 'codeless-admin'),
                    'options' => array('no_pagination' => 'Without pagination', 'with_pagination' => 'With Pagination'),
                    'default' => 'with_pagination'
                )
            ),
        );


        $metaboxes[] = array(
            'id'            => 'portfolio-options',
            'title'         => __( 'Portfolio Options', 'codeless' ),
            'post_types'    => array( 'page'),
            'page_template' => array('portfolio.php'),
            'position'      => 'normal', // normal, advanced, side
            'priority'      => 'high', // high, core, default, low
            'sidebar'       => false, // enable/disable the sidebar in the normal/advanced positions
            'sections'      => $portfolio_options,
        );
        return $metaboxes;
    }
    add_action('redux/metaboxes/'.$redux_opt_name.'/boxes', 'cl_add_portfolio_metaboxes');
endif;

/*--------------------------------------END PORTFOLIO METABOXES---------------------------------------------*/
/*----------------------------------------------------------------------------------------------------------*/


/*------------------------------------------LAYOUT OPTIONS--------------------------------------------------*/
/*----------------------------------------------------------------------------------------------------------*/

if ( !function_exists( "cl_add_layout_metaboxes" ) ):
    function cl_add_layout_metaboxes($metaboxes) {
        
        $layoutOptions = array();
        $layoutOptions[] = array(
            //'title' => __('Home Settings', 'codeless-admin'),
            'icon_class' => 'icon-large',
            'icon' => 'el-icon-home',
            'fields' => array(
                array(
                    'id' => 'overwrite_layout',
                    'type' => 'switch',
                    'title' => __('Overwrite the default post layout', 'codeless-admin'),
                    'subtitle' => __('Do you want to overwrite the default layout for this post?', 'codeless-admin'),
                    'default' => 0// 1 = on | 0 = off
                ),
                array(
                    'title'     => __( 'Layout', 'codeless-admin' ),
                    'desc'      => __( 'Select main content and sidebar arrangement.', 'codeless-admin' ),
                    'id'        => 'layout',
                    'default'   => 'fullwidth',
                    'type'      => 'image_select',
                    'customizer'=> array(),
                    'options'   => array( 
                        'fullwidth'     => ReduxFramework::$_url . 'assets/img/1c.png',
                        'sidebar_right' => ReduxFramework::$_url . 'assets/img/2cr.png',
                        'sidebar_left'  => ReduxFramework::$_url . 'assets/img/2cl.png',
                        'dual'          => ReduxFramework::$_url . 'assets/img/dual.png'
                    ),
                    'required' => array('overwrite_layout', 'equals', 1)
                ),

                array(
                    'id' => 'left_sidebar_dual',
                    'type' => 'select',
                    'title' => __('Left Sidebar', 'codeless-admin'),
                    'subtitle' => __('', 'codeless-admin'),
                    'data' => 'sidebar',
                    'required' => array('layout','=','dual')
                ),

                array(
                    'id' => 'right_sidebar_dual',
                    'type' => 'select',
                    'title' => __('Right Sidebar', 'codeless-admin'),
                    'subtitle' => __('', 'codeless-admin'),
                    'data' => 'sidebar',
                    'required' => array('layout','=','dual')
                ),


            )
        );
      
        $metaboxes[] = array(
            'id' => 'demo-layout2',
            //'title' => __('Cool Options', 'codeless-admin'),
            'post_types' => array('page', 'post'),
            //'page_template' => array('page-test.php'),
            //'post_format' => array('image'),
            'position' => 'side', // normal, advanced, side
            'priority' => 'high', // high, core, default, low
            'sections' => $layoutOptions
        );
        return $metaboxes;
    }
    add_action('redux/metaboxes/'.$redux_opt_name.'/boxes', 'cl_add_layout_metaboxes');
endif;

/*------------------------------------------END LAYOUT OPTIONS----------------------------------------------*/
/*----------------------------------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------GENERAL SETTINGS----------------------------------------------------------------*/
/*-------------------------------------------------------------------------------------------------------------------------------------------------------*/

if ( !function_exists( "cl_add_general_metaboxes" ) ):
    function cl_add_general_metaboxes($metaboxes) {
        global $cl_redata;
        $sections = array();


        /*----------------------------------------------PAGE HEADER-------------------------------------------------*/
        /*----------------------------------------------------------------------------------------------------------*/

        $page_header_section = array(
            'title' => __('Page Header Options', 'codeless-admin'),
            'desc' => __('In this section you can create custom page header only for this page. If you want to change or to view the default page header options', 'codeless-admin').' <a href="'.admin_url().'admin.php?page=_options&tab=2">click here</a>',
            'icon' => 'el-icon-home',
            'fields' => array(  

                            array(
                                'id' => 'page_header_overwrite',
                                'type' => 'switch',
                                'title' => __('Overwrite the default page options', 'codeless-admin'),
                                'subtitle' => __('Do you want to overwrite the default page options in Theme Options ?', 'codeless-admin'),
                                'default' => 0// 1 = on | 0 = off
                            ),

                            array(
                                'id' => 'page_header_bool',
                                'type' => 'switch',
                                'title' => __('Active Page Header', 'codeless-admin'),
                                'subtitle' => __('Switch On to enable page header for pages, posts (For each post or page you can add custom options)', 'codeless-admin'),
                                'default' => $cl_redata['page_header_bool'],// 1 = on | 0 = off
                                'required' => array('page_header_overwrite','=','1')
                            ),

                            array(
                                'id' => 'page_header_height',
                                'type' => 'dimensions',
                                'output' => array('.header_page'),
                                'units' => 'px', // You can specify a unit value. Possible: px, em, %
                                //'units_extended' => 'true', // Allow users to select any type of unit
                                'width' => false,
                                'title' => __('Page Header Height', 'codeless-admin'),
                                'subtitle' => __('units: px', 'codeless-admin'),
                                'desc' => __('', 'codeless-admin'),
                                'default' => $cl_redata['page_header_height'],
                                'required' => array('page_header_overwrite','=','1')
                            ),

                            array(
                                'id' => 'page_header_style',
                                'type' => 'select',
                                'title' => __('Page header style', 'codeless-admin'),
                                'subtitle' => __('Select the style for the default page header', 'codeless-admin'),
                                'options' => array('normal' => 'Basic (Left with breadcrumbs)', 'centered' => 'Centered'), //Must provide key => value pairs for select options
                                'default' =>  $cl_redata['page_header_style'],
                                'required' => array('page_header_overwrite','=','1')
                            ),

                            array(
                                'id' => 'subtitle_bool',
                                'type' => 'switch',
                                'title' => __('SUbtitle for this page ?', 'codeless-admin'),
                                'default' => 0,
                                'required' => array('page_header_overwrite','=','1')
                            ),

                            array(
                                'id' => 'subtitle',
                                'type' => 'text',
                                'title' => __('SUbtitle for this page', 'codeless-admin'),
                                'subtitle' => __('Add a subtitle here', 'codeless-admin'),
                                'desc' => __('Show after the main title  ', 'codeless-admin'),
                                'default' => 'A sample page description',
                                'required' => array(array('page_header_overwrite','=','1'), array('subtitle_bool','=', '1'))
                            ),

                            array(
                                'id' => 'page_header_f_color',
                                'type' => 'color',
                                'output' => array('.header_page'),
                                'title' => __('Page header font color', 'codeless-admin'),
                                'subtitle' => __('Select the color for the title or breadcrumbs in page header', 'codeless-admin'),
                                'default' => $cl_redata['page_header_f_color'],
                                'validate' => 'color',
                                'required' => array('page_header_overwrite','=','1')
                            ),

                            array(
                                'id' => 'page_header_background',
                                'type' => 'background',
                                'output' => array('.header_page'),
                                'title' => __('Page header background', 'codeless-admin'),
                                'subtitle' => __('Page Header background with image, color, etc.', 'codeless-admin'),
                                'default' => $cl_redata['page_header_background'],
                                'required' => array('page_header_overwrite','=','1')
                            )

            )
         );


        /*----------------------------------------------END PAGE HEADER---------------------------------------------*/
        /*----------------------------------------------------------------------------------------------------------*/


        /*----------------------------------------------SLIDER OPTIONS----------------------------------------------*/
        /*----------------------------------------------------------------------------------------------------------*/

        $layers = array();
        // Get WPDB Object
        global $wpdb;
     
        // Table name
        $table_name = $wpdb->prefix . "layerslider";
        $sql = $wpdb->prepare('show tables like %s', array($table_name));
        if($wpdb->get_var($sql) == $table_name) {
        // Get sliders
            $sliders = $wpdb->get_results( "SELECT * FROM $table_name
                                        WHERE flag_hidden = '0' AND flag_deleted = '0'
                                        ORDER BY date_c ASC LIMIT 100" );
           

        
            foreach($sliders as $key => $item) {
         
                $layers[$item->id-1] = $item->name;
            }
        }



        $revsliders = array();
        // Get WPDB Object
        global $wpdb;
     
        // Table name
        $table_name = $wpdb->prefix . "revslider_sliders";
     
        $sql = $wpdb->prepare('show tables like %s', array($table_name));
        if($wpdb->get_var($sql) == $table_name) {
           
            $sliders = $wpdb->get_results( "SELECT * FROM $table_name
                                            ORDER BY id ASC LIMIT 100" );   
            if(count($sliders) > 0):
                foreach($sliders as $key => $item) {
                    $revsliders[$item->alias] = $item->title;
                }

            endif;
        }


        $slider_section = array(

            'title' => __('Sliders Options', 'codeless-admin'),
            'icon' => 'el-icon-home',
            'fields' => array(
                            array(
                                'id' => 'slider_type',
                                'type' => 'select',
                                'title' => __('Select Slider Type', 'codeless-admin'),
                                'subtitle' => __('Select one of the listed sliders', 'codeless-admin'),
                                'options' => array('none'=>'None', 'codeless' => 'Codeless Slider', 'flexslider' => 'Flexslider', 'revolution' => 'Revolution Slider', 'layerslider' => 'Layerslider', 'codeless_news' => 'News Slider', 'gallery_carousel' => 'Gallery Carousel'), //Must provide key => value pairs for select options
                                'default' =>  'none'
                            ),

                            array(
                                'id' => 'gallery',
                                'type' => 'slides',
                                'title' => __('Add/Edit Slides', 'codeless-admin'),
                                'subtitle' => __('Add new or edit existing slider images', 'codeless-admin'),
                                'required' => array('slider_type', '=', array('flexslider', 'gallery_carousel'))
                            ),

                            array(
                                'id' => 'gallery_effect',
                                'type' => 'select',
                                'title' => __('Gallery Carousel Effect', 'codeless-admin'),
                                'subtitle' => __('', 'codeless-admin'),
                                'default' => 'simple',
                                'options' => array('simple' => 'Simple', 'grayscale' => 'Grayscale', 'opacity' => 'With Opacity'),
                                'required' => array('slider_type', '=', 'gallery_carousel')
                            ),

                            array( 
                                'id' => 'revslider',
                                'type' => 'select',
                                'title' => __('Select one of the created revolution sliders.', 'codeless-admin'),
                                'subtitle' => __('', 'codeless-admin'),
                                'options' => $revsliders, //Must provide key => value pairs for select options
                                'default' =>  'none',
                                'required' => array('slider_type', '=', 'revolution')
                            ),

                            array(
                                'id' => 'layerslider',
                                'type' => 'select',
                                'title' => __('Select one of the created layer sliders.', 'codeless-admin'),
                                'subtitle' => __('', 'codeless-admin'),
                                'options' => $layers, //Must provide key => value pairs for select options
                                'default' =>  'none',
                                'required' => array('slider_type', '=', 'layerslider')
                            ),

                            array(
                                'id' => 'codeless_slider',
                                'type' => 'select',
                                'title' => __('Select one of the created codelessliders.', 'codeless-admin'),
                                'subtitle' => __('', 'codeless-admin'),
                                'data' => 'categories',
                                'args' => array('orderby'=>'date', 'hide_empty'=> 0, 'taxonomy' => 'slider'),
                                'required' => array('slider_type', '=', 'codeless')
                            ),

                            array(
                                'id' => 'codeless_slider_speed',
                                'type' => 'text',
                                'title' => __('Codeless Slider Speed', 'codeless-admin'),
                                'subtitle' => __('', 'codeless-admin'),
                                'default' => '800',
                                'required' => array('slider_type', '=', 'codeless' )
                            ),

                            array(
                                'id' => 'codeless_slider_height',
                                'type' => 'text',
                                'title' => __('Slider height', 'codeless-admin'),
                                'subtitle' => __('Write 100% for fullscreen or for example 600 (without px) for custom', 'codeless-admin'),
                                'required' => array('slider_type', '=', array('codeless', 'gallery_carousel') )
                            ),

                            array(
                                'id' => 'codeless_news_featured_1',
                                'type' => 'select',
                                'title' => __('Select the first featured post', 'codeless-admin'),
                                'subtitle' => __('', 'codeless-admin'),
                                'data' => 'post',
                                'args' => array('orderby'=>'date', 'posts_per_page' => -1),
                                'required' => array('slider_type', '=', 'codeless_news')
                            ),

                            array(
                                'id' => 'codeless_news_featured_2',
                                'type' => 'select',
                                'title' => __('Select the second featured post', 'codeless-admin'),
                                'subtitle' => __('', 'codeless-admin'),
                                'data' => 'post',
                                'args' => array('orderby'=>'date', 'posts_per_page' => -1),
                                'required' => array('slider_type', '=', 'codeless_news')
                            ),

                            array(
                                'id' => 'slider_layout',
                                'type' => 'select',
                                'title' => __('Select Slider layout', 'codeless-admin'),
                                'subtitle' => __('', 'codeless-admin'),
                                'options' => array('boxed'=>'Boxed', 'fullwidth' => 'Fullwidth'), //Must provide key => value pairs for select options
                                'default' =>  'fullwidth',
                                'required' => array('slider_type', '!=', 'none')
                            ),
                            array(
                                'id' => 'slider_fixed',
                                'type' => 'switch',
                                'title' => __('Active Fixed Slider', 'codeless-admin'),
                                'subtitle' => __('', 'codeless-admin'),
                                'default' =>  0,
                                'required' => array('slider_type', '!=', 'none')
                            ),  

                            array(
                                'id'=>'slider_parallax',
                                'type' => 'switch', 
                                'title' => __('Active Parallax', 'codeless-admin'),
                                'subtitle'=> __('Look, it\'s on!', 'codeless-admin'),
                                "default"       => 0,
                            ), 

                            array(
                                'id'=>'slider_onmobile_remove',
                                'type' => 'switch', 
                                'title' => __('Remove Sliders from Mobile Phone View', 'codeless-admin'),
                                'subtitle'=> __('Check this option if you want to remove sliders from mobile view for this page.', 'codeless-admin'),
                                "default"       => 0,
                            ),     
            )

        );

        /*----------------------------------------------END SLIDER OPTIONS------------------------------------------*/
        /*----------------------------------------------------------------------------------------------------------*/


        /*----------------------------------------------PAGE OPTIONS & STYLE----------------------------------------*/
        /*----------------------------------------------------------------------------------------------------------*/

        $page_opt_style = array(

            'title' => __('Page Options & Style', 'codeless-admin'),
            'icon' => 'el-icon-home',
            'fields' => array(
                            array(
                                'id' => 'page_content_background',
                                'type' => 'color',
                                'output' => array('#content', '.fullscreen-single', '.fullscreen-single .content'),
                                'title' => __('Page Content Background', 'codeless-admin'),
                                'subtitle' => __('Background color of content in this page ' , 'codeless-admin'), 
                                'mode' => 'background-color',
                                'default' => $cl_redata['page_content_background'],
                                'validate' => 'color',
                            ),
                            array(
                                'id' => 'page_header_menu_color',
                                'type' => 'select',
                                'title' => __('Header Color Style for Header 1', 'codeless-admin'),
                                'subtitle' => __('Select Light for light colors in header and white logo', 'codeless-admin'),
                                'options' => array('light' => 'Dark version header', 'dark' => 'Light version header', 'auto' => 'Auto check (Works only with background images)' ), //Must provide key => value pairs for select options
                                'default' =>  'light'
                            ),

                            array(
                                'id' => 'one_page_active', 
                                'type' => 'switch',
                                'title' => __('Use menu as one page menu', 'codeless-admin'),
                                'subtitle' => __('Check this to activate one page menu', 'codeless-admin'),
                                'desc' => __('After activate this, to the sections of visual composer add a class attribute for ex: "services" and set the link of the menu item: #services', 'codeless-admin'),
                                'default' => '0'// 1 = on | 0 = off
                            ),

                            array(
                                'id' => 'fullscreen_sections_active', 
                                'type' => 'switch',
                                'title' => __('Fullscreen Sections Sliding', 'codeless-admin'),
                                'subtitle' => __('Check to use visual sections as fullscreen sections', 'codeless-admin'),
                                'desc' => __('', 'codeless-admin'),
                                'default' => '0'// 1 = on | 0 = off
                            ),

                            array(
                                'id'=>'use_featured_image_as_photo',
                                'type' => 'switch', 
                                'title' => __('Use Featured Image as Photo', 'codeless-admin'),
                                'subtitle'=> __('', 'codeless-admin'),
                                "default"       => 1,
                            )



            )

        );


        /*----------------------------------------------END PAGE OPTIONS & STYLE------------------------------------*/
        /*----------------------------------------------------------------------------------------------------------*/


        $sections[] = $page_header_section;   // PAge Header Added
        $sections[] = $slider_section;   // Slider Added
        $sections[] = $page_opt_style; // Page Options and Style Added

        $single_portfolio = array();
        $single_portfolio[] = $page_header_section;
        $single_portfolio[] = $page_opt_style;

        $metaboxes[] = array(
            'id' => 'general_settings',
            'title' => __('General Settings', 'codeless-admin'),
            'post_types' => array('page','post'),
            'position' => 'normal', // normal, advanced, side
            'priority' => 'high', // high, core, default, low
            'sections' => $sections
        );
        $metaboxes[] = array(
            'id' => 'general_settings',
            'title' => __('General Settings', 'codeless-admin'),
            'post_types' => array('portfolio'),
            'position' => 'normal', // normal, advanced, side
            'priority' => 'high', // high, core, default, low
            'sections' => $single_portfolio 
        );
        return $metaboxes;
    }
    add_action('redux/metaboxes/'.$redux_opt_name.'/boxes', 'cl_add_general_metaboxes');
endif;

/*----------------------------------------------END GENERAL SETTINGS-----------------------------------------*/
/*----------------------------------------------------------------------------------------------------------*/


/*---------------------------------------------------- STAFF -----------------------------------------------*/
/*----------------------------------------------------------------------------------------------------------*/

if ( !function_exists( "cl_add_staff_metaboxes" ) ):
    function cl_add_staff_metaboxes($metaboxes) {

        $staff_options = array();

        $staff_options[] = array(
            //'title'         => __('General Settings', 'codeless-admin'),
            'icon_class'    => 'icon-large',
            'icon'          => 'el-icon-home',
            'fields'        => array(
                array(
                    'id' => 'staff_position',
                    'title' => __( 'Staff Position', 'codeless' ),
                    'desc' => 'Write here the position for this staff member into your business',
                    'type' => 'text'
                ),
                array(
                    'id' => 'facebook_link',
                    'title' => __( 'Facebook Link', 'codeless' ),
                    'desc' => '',
                    'type' => 'text',
                    'default' => '#'
                ),
                array(
                    'id' => 'twitter_link',
                    'title' => __( 'Twitter Link', 'codeless' ),
                    'desc' => '',
                    'type' => 'text',
                    'default' => '#'
                ),
                array(
                    'id' => 'google_link',
                    'title' => __( 'Google Link', 'codeless' ),
                    'desc' => '',
                    'type' => 'text',
                    'default' => '#'
                ),
                array(
                    'id' => 'pinterest_link',
                    'title' => __( 'Pinterest Link', 'codeless' ),
                    'desc' => '',
                    'type' => 'text',
                    'default' => ''
                ),
                array(
                    'id' => 'linkedin_link',
                    'title' => __( 'Linkedin Link', 'codeless' ),
                    'desc' => '',
                    'type' => 'text',
                    'default' => ''
                ),
                array(
                    'id' => 'instagram_link',
                    'title' => __( 'Instagram Link', 'codeless' ),
                    'desc' => '',
                    'type' => 'text',
                    'default' => ''
                ),
                array(
                    'id' => 'mail_link',
                    'title' => __( 'Mail Link', 'codeless' ),
                    'desc' => '',
                    'type' => 'text',
                    'default' => ''
                ),
            ),
        );


        $metaboxes[] = array(
            'id'            => 'staff-options',
            'title'         => __( 'Portfolio Options', 'codeless' ),
            'post_types'    => array( 'staff'),
            'position'      => 'normal', // normal, advanced, side
            'priority'      => 'high', // high, core, default, low
            'sidebar'       => false, // enable/disable the sidebar in the normal/advanced positions
            'sections'      => $staff_options,
        );
        return $metaboxes;
    }
    add_action('redux/metaboxes/'.$redux_opt_name.'/boxes', 'cl_add_staff_metaboxes');
endif;

/*-------------------------------------------------- END STAFF ---------------------------------------------*/
/*----------------------------------------------------------------------------------------------------------*/


/*------------------------------------------------- TESTIMONIAL --------------------------------------------*/
/*----------------------------------------------------------------------------------------------------------*/

if ( !function_exists( "cl_add_testimonial_metaboxes" ) ):
    function cl_add_testimonial_metaboxes($metaboxes) {

        $testimonial_options = array();

        $testimonial_options[] = array(
            //'title'         => __('General Settings', 'codeless-admin'),
            'icon_class'    => 'icon-large',
            'icon'          => 'el-icon-home',
            'fields'        => array(
                array(
                    'id' => 'staff_position',
                    'title' => __( 'Staff Position', 'codeless' ),
                    'desc' => 'Write here the position for this testimonial post',
                    'type' => 'text'
                )
            ),
        );


        $metaboxes[] = array(
            'id'            => 'testimonial-options',
            'title'         => __( 'Testimonial Options', 'codeless' ),
            'post_types'    => array( 'testimonial'),
            'position'      => 'normal', // normal, advanced, side
            'priority'      => 'high', // high, core, default, low
            'sidebar'       => false, // enable/disable the sidebar in the normal/advanced positions
            'sections'      => $testimonial_options,
        );
        return $metaboxes;
    }
    add_action('redux/metaboxes/'.$redux_opt_name.'/boxes', 'cl_add_testimonial_metaboxes');
endif;

/*-------------------------------------------------- END Testimonial ---------------------------------------------*/
/*----------------------------------------------------------------------------------------------------------------*/


/*--------------------------------------BLOG POST METABOXES--------------------------------------------------*/
/*-----------------------------------------------------------------------------------------------------------*/
if ( !function_exists( "cl_add_blog_post_metaboxes" ) ):
    function cl_add_blog_post_metaboxes($metaboxes) {
        $blog_options = array();
        
        $blog_options[] = array(
            'icon_class'    => 'icon-large',
            'icon'          => 'el-icon-home',
            'fields'        => array(
                array(
                    'id' => 'fullscreen_post_style',
                    'title' => __( 'Active Fullscreen Innovative Single Post', 'codeless' ),
                    'desc' => 'Use this option if you active the fullscreen blog',
                    'type' => 'switch', 
                    'default' => 0 
                ),
                array(
                    'id' => 'fullscreen_post_effect',
                    'title' => __( 'Fullscreen Post Effect', 'codeless' ),
                    'desc' => 'Use this option if you active the fullscreen blog',
                    'type' => 'select',
                    'options' => codeless_animations(), 
                    'default' => 'fadeInLeft' 
                ),
                array(
                    'id' => 'fullscreen_post_delay',
                    'type' => 'text',
                    'title' => __('Fullscreen Post Effect Delay', 'codeless-admin'),
                    'default' => '200'
                ),
                array(
                    'id' => 'fullscreen_post_position',
                    'title' => __( 'Fullscreen Post Position', 'codeless' ),
                    'desc' => 'Position of the content in the fullscreen section',
                    'type' => 'select',
                    'default' => 'left',
                    'options' => array('left' => 'Left', 'right' => 'Right')
                ),
                array(
                    'id' => 'future_date_events',
                    'title' => __( 'Future date for upcoming events', 'codeless' ),
                    'desc' => '',
                    'type' => 'text',
                    'placeholder' => 'Click to enter a date'
                )      
            ) 
        );



        $metaboxes[] = array(
            'id'            => 'blog-options',
            'title'         => __( 'Blog Options', 'codeless' ),
            'post_types'    => array( 'post'),
            'position'      => 'normal', // normal, advanced, side
            'priority'      => 'low', // high, core, default, low
            'sidebar'       => false, // enable/disable the sidebar in the normal/advanced positions
            'sections'      => $blog_options
        );

        $post_format = array();
        
        $post_format[] = array(
            'icon_class'    => 'icon-large',
            'icon'          => 'el-icon-home',
            'fields'        => array(
                array(
                    'id' => 'media_post_link',
                    'title' => __( 'Video / Audio Link or Iframe', 'codeless' ),
                    'desc' => 'Insert here link / Iframe for video or audio',
                    'type' => 'textarea', 
                    'default' => '' 
                )          
            ) 
        );

        $metaboxes[] = array(
            'id'            => 'blog-post-format',
            'title'         => __( 'Blog Post Format', 'codeless' ),
            'post_types'    => array( 'post'),
            'post_format'   => array('video', 'audio'),
            'position'      => 'normal', // normal, advanced, side
            'priority'      => 'high', // high, core, default, low
            'sidebar'       => false, // enable/disable the sidebar in the normal/advanced positions
            'sections'      => $post_format
        );
        return $metaboxes;
    }
    add_action('redux/metaboxes/'.$redux_opt_name.'/boxes', 'cl_add_blog_post_metaboxes');
endif;

/*--------------------------------------END BLOG POST METABOXES---------------------------------------------*/
/*----------------------------------------------------------------------------------------------------------*/

// The loader will load all of the extensions automatically based on your $redux_opt_name
require_once(dirname(__FILE__).'/../../admin/loader/loader.php');