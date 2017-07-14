<?php
/**
  ReduxFramework Sample Config File
  For full documentation, please visit: https://github.com/ReduxFramework/ReduxFramework/wiki
 * */
if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "cl_redata";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );


    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
                // TYPICAL -> Change these values as you need/desire
                'opt_name' => 'cl_redata', // This is where your data is stored in the database and also becomes your global variable name.
                'display_name' => $theme->get('Name'), // Name that appears at the top of your panel
                'display_version' => $theme->get('Version'), // Version that appears at the top of your panel
                'menu_type' => 'menu', //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
                'allow_sub_menu' => true, // Show the sections below the admin menu item or not
                'menu_title' => __('Specular', 'codeless-admin'),
                'page_title' => __('Specular', 'codeless-admin'),
                // You will need to generate a Google API key to use this feature.
                // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
                'async_typography'  => false,      
                'google_api_key' => 'AIzaSyDNS4R2BxpPspB31mZPnGvelSPSXvggI4I', // Must be defined to add google fonts to the typography module
                //'admin_bar' => false, // Show the panel pages on the admin bar
                'global_variable' => '', // Set a different name for your global variable other than the opt_name
                'dev_mode' => false, // Show the time the page took to load, etc
                'customizer' => true, // Enable basic customizer support
                // OPTIONAL -> Give you extra features
                'page_priority' => null, // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
                'page_parent' => 'themes.php', // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
                'page_permissions' => 'manage_options', // Permissions needed to access the options panel.
                'menu_icon' => '', // Specify a custom URL to an icon
                'last_tab' => '', // Force your panel to always open to a specific tab (by id)
                'page_icon' => 'icon-themes', // Icon displayed in the admin panel next to your menu_title
                'page_slug' => '_options', // Page slug used to denote the panel
                'save_defaults' => true, // On load save the defaults to DB before user clicks save or not
                'default_show' => false, // If true, shows the default value next to each field that is not the default value.
                'default_mark' => '', // What to print by the field's title if the value shown is default. Suggested: *
                // CAREFUL -> These options are for advanced use only
                'transient_time' => 60 * MINUTE_IN_SECONDS,
                'output' => true, // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
                'output_tag' => true, // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
                //'domain'              => 'redux-framework', // Translation domain key. Don't change this unless you want to retranslate all of Redux.
                //'footer_credit'       => '', // Disable the footer credit of Redux. Please leave if you can help it.
                // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
                'database' => '', // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
                'show_import_export' => false, // REMOVE
                'system_info' => false, // REMOVE
                'help_tabs' => array(),
                'help_sidebar' => '', // __( '', $this->args['domain'] );        
                'hints' => array(
                    'icon'          => 'icon-question-sign',
                    'icon_position' => 'right',
                    'icon_color'    => 'lightgray',
                    'icon_size'     => 'normal',
                    'tip_style'     => array(
                        'color'         => 'light',
                        'shadow'        => true,
                        'rounded'       => false,
                        'style'         => '',
                    ),
                    'tip_position'  => array(
                        'my' => 'top left',
                        'at' => 'bottom right',
                    ),
                    'tip_effect'    => array(
                        'show'          => array(
                            'effect'        => 'slide',
                            'duration'      => '500',
                            'event'         => 'mouseover',
                        ),
                        'hide'      => array(
                            'effect'    => 'slide',
                            'duration'  => '500',
                            'event'     => 'click mouseleave',
                        ),
                    ),
                )
    
            );


            // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.     
            $args['share_icons'][] = array(
                'url' => 'https://github.com/ReduxFramework/ReduxFramework',
                'title' => 'Visit us on GitHub',
                'icon' => 'el-icon-github'
                    // 'img' => '', // You can use icon OR img. IMG needs to be a full URL.
            );
            $args['share_icons'][] = array(
                'url' => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
                'title' => 'Like us on Facebook',
                'icon' => 'el-icon-facebook'
            );
            $args['share_icons'][] = array(
                'url' => 'http://twitter.com/reduxframework',
                'title' => 'Follow us on Twitter',
                'icon' => 'el-icon-twitter'
            );
            $args['share_icons'][] = array(
                'url' => 'http://www.linkedin.com/company/redux-framework',
                'title' => 'Find us on LinkedIn',
                'icon' => 'el-icon-linkedin'
            );



            // Panel Intro text -> before the form
            if (!isset($args['global_variable']) || $args['global_variable'] !== false) {
                if (!empty($args['global_variable'])) {
                    $v = $args['global_variable'];
                } else {
                    $v = str_replace("-", "_", $args['opt_name']);
                }
                $args['intro_text'] = sprintf('<p>'.__('Codeless has been quietly but consistently building a powerhouse portfolio of web site design and marketing success.', 'codeless-admin').' </p>', $v);
            } else {
                $args['intro_text'] = '<p>'.__('Codeless has been quietly but consistently building a powerhouse portfolio of web site design and marketing success. ', 'codeless-admin').'</p>';
            }

            // Add content after the form.
            $args['footer_text'] = __('', 'codeless-admin');

            Redux::setArgs( $opt_name, $args );

            // ACTUAL DECLARATION OF SECTIONS

            Redux::setSection( $opt_name, array(
                'title' => __('General Options', 'codeless-admin'),
                'desc' => __('In this section you can customize basic options like logo, responsive etc...', 'codeless-admin'),
                'icon' => 'el-icon-cogs',
                // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                'fields' => array(
                    
                    array(
                        'id' => 'responsive_bool',
                        'type' => 'switch',
                        'title' => __('Responsive Layout', 'codeless-admin'),
                        'subtitle' => __('Switch on to active responsive layout', 'codeless-admin'),
                        "default" => 1,
                    ),

                    array(
                        'id' => 'logo',
                        'type' => 'media',
                        'title' => __('Upload Logo', 'codeless-admin'),
                        'desc' => __('Upload here the logo that is placed in top of the page ', 'codeless-admin'),
                        'subtitle' => __('Upload any media using the WordPress native uploader', 'codeless-admin'),
                        'default' => array('url' => get_template_directory_uri().'/img/logo.png'),
                    ),

                    array(
                        'id' => 'logo_light',
                        'type' => 'media',
                        'title' => __('Upload Logo Light', 'codeless-admin'),
                        'desc' => __('Upload here the logo that is placed in top of the page (Light Version) ', 'codeless-admin'),
                        'subtitle' => __('', 'codeless-admin'),
                        'default' => array('url' => get_template_directory_uri().'/img/logo_light.png'),
                    ),

                    array(
                        'id' => 'logo_height',
                        'type' => 'dimensions', 
                        'output' => array('#logo img'),
                        'units' => 'px', // You can specify a unit value. Possible: px, em, %
                        //'units_extended' => 'true', // Allow users to select any type of unit
                        'width' => false,
                        'title' => __('Logo Height', 'codeless-admin'),
                        'subtitle' => __('units: px', 'codeless-admin'),
                        'desc' => __('', 'codeless-admin'),
                        'default' => array('height' => 50)
                    ),

               

                    array(
                        'id' => 'favicon',
                        'type' => 'media',
                        'title' => __('Favicon for your website', 'codeless-admin'),
                        'desc' => __('', 'codeless-admin'),
                        'subtitle' => __('', 'codeless-admin'),
                        'default' => array('url' => get_template_directory_uri().'/img/favicon.png'),
                    ),


                    array(
                        'id' => 'nicescroll',
                        'type' => 'switch',
                        'title' => __('Smooth Scroll', 'codeless-admin'),
                        'subtitle' => __('Switch on to active smooth scrolling', 'codeless-admin'),
                        "default" => 0,
                    ),

                    array(
                        'id' => 'section-special-pages-start',
                        'type' => 'section',
                        'title' => __('Select Special Pages', 'codeless-admin'),
                        'indent' => true // Indent all options below until the next 'section' option is set.
                    ),


                    array(
                        'id' => 'frontpage',
                        'type' => 'select',
                        'data' => 'pages',
                        'default' => '0',
                        'title' => __('Select Frontpage', 'codeless-admin'),
                        'subtitle' => __('Frontpage is the page that you want to show in the home', 'codeless-admin'),
                        'desc' => __('Select one of the created pages to use it as frontpage', 'codeless-admin'),
                    ),


                    array(
                        'id' => 'blogpage',
                        'type' => 'select',
                        'data' => 'pages',
                        'default' => '0',
                        'title' => __('Select Blog Page', 'codeless-admin'),
                        'subtitle' => __('Blogpage is the page that you want to show the blog posts', 'codeless-admin'),
                        'desc' => __('Select one of the created pages to use as blog', 'codeless-admin'),
                    ),

                    array(
                        'id' => 'comingsoon_page',
                        'type' => 'select',
                        'data' => 'pages',
                        'default' => '0',
                        'title' => __('Select Coming Soon Page', 'codeless-admin'),
                        'subtitle' => __('Select one page that you want to use as comingsoon or maintenance page', 'codeless-admin'),
                        'desc' => __('', 'codeless-admin'),
                    ),

                    array(
                        'id' => 'section-special-pages-end',
                        'type' => 'section',
                        'indent' => false // Indent all options below until the next 'section' option is set.
                    ),

                    array(
                        'id' => '404_error_message',
                        'type' => 'editor',
                        'title' => __('404 error message', 'codeless-admin'),
                        'subtitle' => __('Text to be placed in 404 page', 'codeless-admin'),
                        'default' => 'Sorry but the page you are looking for has not been found. Try checking the URL for errors, then hit the refresh button on your browser',
                    ),

                    array(
                        'id' => 'section-code-start',
                        'type' => 'section',
                        'title' => __('Tracking Code / Custom CSS / Custom JS', 'codeless-admin'),
                        'indent' => true // Indent all options below until the next 'section' option is set.
                    ),


                    array(
                        'id' => 'tracking_code',
                        'type' => 'ace_editor',
                        'title' => __('Tracking Code', 'codeless-admin'),
                        'subtitle' => __('Paste your JS code here.', 'codeless-admin'),
                        'mode' => 'javascript',
                        'theme' => 'chrome',
                        'desc' => 'Paste your Google Analytics or other tracking code here. This will be added into the footer.',
                        'default' => "/*jQuery(document).ready(function(){\n\n});*/"
                    ),

                    array(
                        'id' => 'custom_css',
                        'type' => 'ace_editor',
                        'title' => __('Custom CSS Code', 'codeless-admin'),
                        'subtitle' => __('Paste your CSS code here.', 'codeless-admin'),
                        'mode' => 'css',
                        'theme' => 'monokai',
                        'desc' => 'Add custom css code to theme.',
                        'default' => "/*#header{\nmargin: 0 auto;\n}*/"
                    ),
                    array(
                        'id' => 'custom_js',
                        'type' => 'ace_editor',
                        'title' => __('Custom JS Code', 'codeless-admin'),
                        'subtitle' => __('Paste your JS code here.', 'codeless-admin'),
                        'mode' => 'text',
                        'theme' => 'chrome',
                        'desc' => '.',
                        'default' => "/*jQuery(document).ready(function(){\n\n});*/"
                    ),

                    array(
                        'id' => 'section-code-end',
                        'type' => 'section',
                        'indent' => false // Indent all options below until the next 'section' option is set.
                    ),

                ),
            ));

            

            Redux::setSection( $opt_name, array(
                'type' => 'divide',
            ));



            Redux::setSection( $opt_name, array(
                'icon' => 'el-icon-website',
                'title' => __('Header Options', 'codeless-admin'),
                'fields' => array(
                    
                    array(
                        'id' => 'section-header-opts-start',
                        'type' => 'section',
                        'title' => __('General', 'codeless-admin'),
                        'indent' => true // Indent all options below until the next 'section' option is set.
                    ),


                    /*array(
                        'id' => 'header_presets',
                        'type' => 'image_select',
                        'title' => __('Header Predefined Styles', 'codeless-admin'),
                        'presets'  => true,
                        'subtitle' => __('Select one of our predefined header styles and some options will change', 'codeless-admin'),
                        'options' => array(
                            'h1' => array(
                                'alt' => 'Header 1', 
                                'img' => '',
                                'presets' => array(
                                    
                                    'header_style' => 'header_4'
                                )

                            ),
                            'h2' => array(
                                'alt' => 'Header 2', 
                                'img' => 'http://localhost/test/wp-content/themes//images/patterns/header1.jpg',
                                'presets' => array(
                                    
                                    'header_style' => 'header_6'
                                )

                            )  
                        ),
                        'default' => 'header_1'
                    ),*/

                    array(
                        'id' => 'header_style',
                        'type' => 'select',
                        'title' => __('Header Style', 'codeless-admin'),
                        'subtitle' => __('Select the style for the header', 'codeless-admin'),
                        'options' => array('header_1' => 'Simple style', 'header_2' => 'With border top', 'header_3' => 'Modern Style', 'header_4' => 'Menu Item with BG', 'header_5' => 'Fullscreen Overlay', 'header_6' => 'Below the logo navigation with bg', 'header_7' => 'Left / Right Side Header', 'header_8' => 'Menu Item with border bottom', 'header_9' => 'Menu link underline', 'header_10' => 'Centered Logo and Navigation', 'header_11' => 'Logo in center and 2 navigations in sides', 'header_12' => 'Navigation with border separators, below logo'), //Must provide key => value pairs for select options
                        'default' => 'header_1'
                    ), 

                    array(
                        'id' => 'header_transparency',
                        'type' => 'switch',
                        'title' => __('Make Transparency Header', 'codeless-admin'),
                        'subtitle' => 'If you active this option the header should be shown on top of the slider',
                        'default' => 1,
                        'required' => array('header_style', 'equals', array('header_1', 'header_4', 'header_5', 'header_11') ),
                    ),

                    array(
                        'id' => 'header_overlay_color',
                        'type' => 'color_rgba',
                        'output' => array('.overlay_menu'),
                        'title' => __('Menu Overlay Fullscreen BG Color', 'codeless-admin'),
                        'mode' => 'background-color', 
                        'default'  => array(
                            'color' => '#000000', 
                            'alpha' => '0.95'
                        ),
                        'required' => array('header_style', 'equals', 'header_5'),
                        'validate' => 'colorrgba',
                    ),

                    array(
                        'id' => 'header_navigation',
                        'type' => 'color_rgba',
                        'output' => array('.header_6 #navigation'),
                        'title' => __('Header 6 Navigation BG Color', 'codeless-admin'),
                        'mode' => 'background-color',  
                        'default'  => array(
                            'color' => '#000000', 
                            'alpha' => '1.00'
                        ),
                        'required' => array('header_style', 'equals', 'header_6'),
                        'validate' => 'colorrgba',
                    ),

                    array(
                        'id' => 'header_6_nav_height',
                        'type' => 'dimensions',
                        'output' => array('.header_6 #navigation'), 
                        'units' => 'px', // You can specify a unit value. Possible: px, em, %
                        //'units_extended' => 'true', // Allow users to select any type of unit
                        'width' => false,
                        'title' => __('Header 6 Navigation Height', 'codeless-admin'),
                        'required' => array('header_style', 'equals', 'header_6'),
                        'subtitle' => __('units: px', 'codeless-admin'),
                        'desc' => __('', 'codeless-admin'),
                        'default' => array('height' => 45)
                    ),

                    array(
                        'id' => 'header_6_transparent',
                        'type' => 'switch',
                        'title' => __('Make transparent this header', 'codeless-admin'),
                        'subtitle' => __('Switch On to enable transparency', 'codeless-admin'),
                        'default' => 0,
                        'required' => array('header_style', 'equals', 'header_6'),
                    ),



                    array(
                        'id' => 'header_7_width',
                        'type' => 'dimensions',
                        'units' => 'px', // You can specify a unit value. Possible: px, em, %
                        //'units_extended' => 'true', // Allow users to select any type of unit
                        'width' => true,
                        'height' => false,
                        'title' => __('Header 7 Side Menu Width', 'codeless-admin'),
                        'required' => array('header_style', 'equals', 'header_7'),
                        'subtitle' => __('units: px', 'codeless-admin'),
                        'desc' => __('', 'codeless-admin'),
                        'default' => array('width' => 280)
                    ),

                    array(
                        'id' => 'header_7_padding',
                        'type' => 'spacing',
                        'mode' => 'padding', // absolute, padding, margin, defaults to padding
                        'units' => 'px', // You can specify a unit value. Possible: px, em, %
                        //'units_extended' => 'true', // Allow users to select any type of unit
                        //'display_units' => 'false', // Set to false to hide the units if the units are specified
                        'title' => __('Header 7 Side Menu Inner Padding', 'codeless-admin'),
                        'subtitle' => __('Adjust side menu padding ', 'codeless-admin'),
                        'required' => array('header_style', 'equals', 'header_7'),
                        'desc' => __('Unit: px', 'codeless-admin'),
                        'default' => array('padding-left' => '20px', 'padding-right' => "20px", 'padding-top' => "20px", 'padding-bottom' => "20px")
                    ),
                    
                    array( 
                        'id' => 'header_7_margin',
                        'type' => 'spacing',
                        'mode' => 'margin', // absolute, padding, margin, defaults to padding
                        'units' => 'px', // You can specify a unit value. Possible: px, em, %
                        'bottom' => false,
                        'left' => false,
                        'right' => false,
                        //'units_extended' => 'true', // Allow users to select any type of unit
                        //'display_units' => 'false', // Set to false to hide the units if the units are specified
                        'title' => __('Header 7 Side Menu Inner Margin beetwen logo/menu/widgets', 'codeless-admin'),
                        'subtitle' => __('Adjust margin beetween side menu elements logog/menu/widgets ', 'codeless-admin'),
                        'required' => array('header_style', 'equals', 'header_7'),
                        'desc' => __('Unit: px', 'codeless-admin'),
                        'default' => array('margin-top' => '40px')
                    ),

                    array(
                        'title'     => __( 'Header 7 Side Menu Position', 'codeless-admin' ),
                        'desc'      => __( 'Select the fixed position for the side navigation', 'codeless-admin' ),
                        'id'        => 'header_7_position',
                        'type'      => 'image_select',
                        'required' => array('header_style', 'equals', 'header_7'),
                        'customizer'=> array(),
                        'default' => 'left',
                        'options'   => array(
                            'left' => ReduxFramework::$_url . 'assets/img/2cl.png',
                            'right'  => ReduxFramework::$_url . 'assets/img/2cr.png'
                        )
                    ),


                    array(
                        'id' => 'header_7_border', 
                        'type' => 'switch',
                        'title' => __('Add border to side header style', 'codeless-admin'),
                        'subtitle' => __('Border for side left/right header style', 'codeless-admin'),
                        'desc' => __('', 'codeless-admin'),
                        'required' => array('header_style', 'equals', 'header_7'),
                        'default' => 0// 1 = on | 0 = off
                    ),

                    array(
                        'id' => 'header_7_border_top', 
                        'type' => 'switch',
                        'title' => __('Add colored border in top of Header', 'codeless-admin'),
                        'subtitle' => __('Border with theme color in top of Left/Right header', 'codeless-admin'),
                        'desc' => __('', 'codeless-admin'),
                        'required' => array('header_style', 'equals', 'header_7'),
                        'default' => 0// 1 = on | 0 = off
                    ),


                    array(
                        'id' => 'header_10_border', 
                        'type' => 'switch',
                        'title' => __('Border Top & bottom for navigation', 'codeless-admin'),
                        'subtitle' => __('', 'codeless-admin'),
                        'desc' => __('', 'codeless-admin'),
                        'required' => array('header_style', 'equals', 'header_10'),
                        'default' => 1// 1 = on | 0 = off
                    ),
                    



                    array(
                        'id' => 'header_height',
                        'type' => 'dimensions',
                        'output' => array('header#header .row-fluid .span12', '.header_wrapper'),
                        'units' => 'px', // You can specify a unit value. Possible: px, em, %
                        //'units_extended' => 'true', // Allow users to select any type of unit
                        'width' => false,
                        'title' => __('Header Height', 'codeless-admin'),
                        'subtitle' => __('units: px', 'codeless-admin'),
                        'desc' => __('', 'codeless-admin'),
                        'default' => array('height' => 80)
                    ),
                    
                    
                    array(
                        'id' => 'header_background',
                        'type' => 'color_rgba', 
                        'mode' => 'background-color',
                        'transparent' => true,
                        'validate' => 'colorrgba',
                        'output' => array('.header_1 header#header:not(.transparent), .header_2 header#header, .header_3.header_wrapper header > .container,  .header_4 header#header:not(.transparent),  .header_5 header#header:not(.transparent), .header_6 header#header, .header_6 .full_nav_menu, .header_7.header_wrapper, .header_8.header_wrapper, .header_9.header_wrapper, .header_10.header_wrapper, .header_10 .full_nav_menu, .header_11.header_wrapper:not(.transparent)'),
                        'title' => __('Background', 'codeless-admin'),
                        'subtitle' => __('Header background with image, color, etc.', 'codeless-admin'),
                        'default' => array(
                            'color' => '#fff',
                            'alpha' => '1.00'
                        ),
                    ),

                    array(
                        'id' => 'show_search', 
                        'type' => 'checkbox',
                        'title' => __('Show Search', 'codeless-admin'),
                        'subtitle' => __('Show search in the right of header', 'codeless-admin'),
                        'desc' => __('Check this if you want the search field in the right part of the header', 'codeless-admin'),
                        'default' => '1'// 1 = on | 0 = off
                    ),

                    array(
                        'id' => 'header_container_full', 
                        'type' => 'checkbox',
                        'title' => __('Remove container from header', 'codeless-admin'),
                        'subtitle' => __('Cant use with left menu', 'codeless-admin'),
                        'desc' => __('By checking this the header container should be removed and transformed in fullwidth header', 'codeless-admin'),
                        'default' => '0'// 1 = on | 0 = off
                    ),

                    array(
                        'id' => 'show_button', 
                        'type' => 'checkbox',
                        'title' => __('Add button to header', 'codeless-admin'),
                        'subtitle' => __('Add a button in header after the menu', 'codeless-admin'),
                        'desc' => __('', 'codeless-admin'),
                        'default' => '0'// 1 = on | 0 = off
                    ),

                    array(
                        'id' => 'header_button',
                        'type' => 'text',
                        'title' => __('Header Button', 'codeless-admin'),
                        'required' => array('show_button', 'equals', '1'),
                        'default' => 'Donate Now'
                    ),

                    array(
                        'id' => 'header_button_link',
                        'type' => 'text', 
                        'title' => __('Header Button Link', 'codeless-admin'),
                        'required' => array('show_button', 'equals', '1'),
                        'default' => '#'
                    ),

                    array( 
                        'id'       => 'header_border_bottom',
                        'type'     => 'border',
                        'title'    => __('Header Border Bottom', 'codeless-admin'),
                        'subtitle' => __('', 'codeless-admin'),
                        'output'   => array('.header_wrapper'),
                        'right'    => false,
                        'top'   => false,  
                        'left'     => false,
                        'color'    => true,
                        'style'    => true,
                        'desc'     => __('Add Border bottom for header', 'codeless-admin'),
                        'default'  => array(
                            'color'  => '', 
                            'border-style'  => 'solid',
                            'border-bottom'    => '0px'
                        )
                    ),

                    array(
                        'id' => 'header_shadow', 
                        'type' => 'select',
                        'title' => __('Header Shadow', 'codeless-admin'),
                        'subtitle' => __('Select one shadow style or leave it without shadow', 'codeless-admin'),
                        'desc' => __('Isnt compatible with all headers', 'codeless-admin'),
                        'options' => array('no_shadow' => 'Without Shadow', 'full' => 'Fullwidth light shadow', 'shadow1' => 'Shadow1', 'shadow2' => 'Shadow2', 'shadow3' => 'Shadow3'), //Must provide key => value pairs for select options
                        'required' => array('header_style', 'equals', array('header_2', 'header_8', 'header_12')),
                        'default' => 'no_shadow'// 1 = on | 0 = off
                    ),

                    array(
                        'id' => 'responsive_menu_dropdown',
                        'type' => 'switch',
                        'title' => __('Show Responsive Menu Dropdown', 'codeless-admin'),
                        'subtitle' => __('', 'codeless-admin'),
                        "default" => 1,
                    ),

                    array(
                        'id' => 'header_responsive_tools',
                        'type' => 'switch',
                        'title' => __('Show header tools in responsive (Mobile)', 'codeless-admin'),
                        'subtitle' => __('Extra Nav, Shop Cart etc...', 'codeless-admin'),
                        "default" => 0,

                    ),
                )
            ));

                    Redux::setSection( $opt_name, array(
                        'icon' => 'el-icon-website',
                        'title' => __('Menu Options', 'codeless-admin'),
                        'fields' => array(
                            array(
                                'id' => 'menu_font_style',
                                'type' => 'typography',
                                'title' => __('Menu Item Typography', 'codeless-admin'),
                                //'compiler'=>true, // Use if you want to hook in your own CSS compiler
                                'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
                                'font-backup' => false, // Select a backup non-google font in addition to a google font
                                'font-style'=>false, // Includes font-style and weight. Can use font-style or font-weight to declare
                                'font-weight'=>true,
                                'subsets'=>false, // Only appears if google is true and subsets not set to false
                                //'font-size'=>false,
                                'line-height'=>true,
                                //'word-spacing'=>true, // Defaults to false
                                'letter-spacing'=>true, // Defaults to false
                                //'color'=>false,
                                //'preview'=>false, // Disable the previewer 
                                'text-align' => true,
                                'text-transform' => true,
                                'output' => array('nav .menu > li > a, nav .menu > li.hasSubMenu:after', 'header#header .header_tools .vert_mid > a:not(#trigger-overlay), header#header .header_tools .cart .cart_icon'), // An array of CSS selectors to apply this font style to dynamically
                                'units' => 'px', // Defaults to px
                                'subtitle' => __('Select the appropiate font style for the menu', 'codeless-admin'),
                                'default' => array(
                                    'color' => "#222",
                                    'font-weight' => '600',
                                    'font-family' => 'Open Sans',
                                    'google' => true,
                                    'font-size' => '13px',
                                    'line-height' => '20px',
                                    'text-align' => 'center',
                                    'text-transform' => 'uppercase',
                                    'letter-spacing' => '1px'
                                ),
                            ),

                            array(
                                'id' => 'menu_padding',
                                'type' => 'spacing',
                                'output' => array('nav .menu > li'), // An array of CSS selectors to apply this font style to
                                'mode' => 'padding', // absolute, padding, margin, defaults to padding
                                'top' => false, // Disable the top
                                //'right' => false, // Disable the right
                                'bottom' => false, // Disable the bottom
                                //'left' => false, // Disable the left
                                //'all' => true, // Have one field that applies to all
                                'units' => 'px', // You can specify a unit value. Possible: px, em, %
                                //'units_extended' => 'true', // Allow users to select any type of unit
                                //'display_units' => 'false', // Set to false to hide the units if the units are specified
                                'title' => __('Menu Items padding', 'codeless-admin'),
                                'subtitle' => __('Adjust padding beetwen menu items ', 'codeless-admin'),
                                'desc' => __('Unit: px', 'codeless-admin'),
                                'default' => array('padding-left' => '5px', 'padding-right' => "5px")
                            ),


                            array(
                                'id' => 'menu_margin',
                                'type' => 'spacing',
                                'output' => array('nav .menu > li'), // An array of CSS selectors to apply this font style to
                                'mode' => 'margin', // absolute, padding, margin, defaults to padding
                                'top' => false, // Disable the top
                                //'right' => false, // Disable the right
                                'bottom' => false, // Disable the bottom
                                //'left' => false, // Disable the left
                                //'all' => true, // Have one field that applies to all
                                'units' => 'px', // You can specify a unit value. Possible: px, em, %
                                //'units_extended' => 'true', // Allow users to select any type of unit
                                //'display_units' => 'false', // Set to false to hide the units if the units are specified
                                'title' => __('Menu Items Margin', 'codeless-admin'),
                                'subtitle' => __('Adjust margin beetwen menu items ', 'codeless-admin'),
                                'desc' => __('Unit: px', 'codeless-admin'),
                                'default' => array('margin-left' => '0px', 'margin-right' => "0px")
                            ), 
                        ),
                        'subsection' => true
                    ));

                    
                    Redux::setSection( $opt_name, array(
                        'icon' => 'el-icon-website',
                        'title' => __('Dropdown Options & Mobile Menu', 'codeless-admin'),
                        'fields' => array(
                            array(
                                'id' => 'dropdown_width',
                                'type' => 'dimensions',
                                'output' => array('nav .menu > li > ul.sub-menu', 'nav .menu > li > ul.sub-menu ul'),
                                'units' => 'px', // You can specify a unit value. Possible: px, em, %
                                //'units_extended' => 'true', // Allow users to select any type of unit
                                'height' => false,
                                'title' => __('Dropdown Width', 'codeless-admin'),
                                'subtitle' => __('units: px', 'codeless-admin'),
                                'desc' => __('', 'codeless-admin'),
                                'default' => array('width' => 220)
                            ),

                            array(
                                'id' => 'background_dropdown',
                                'type' => 'color',
                                'mode' => 'background-color',
                                'output' => array('nav .menu li > ul', '.codeless_custom_menu_mega_menu', '.menu-small', '.header_tools .cart .content'),
                                'title' => __('Dropdown Background Color', 'codeless-admin'),
                                'subtitle' => __('Background Color for the dropdown in the menu', 'codeless-admin'),
                                'default' => '#222222'  
                            ),

                            array(
                                'id' => 'dropdown_border_color',
                                'type' => 'color',
                                'output' => array('nav .menu li > ul.sub-menu li'),
                                'title' => __('Dropdown Border color', 'codeless-admin'),
                                'subtitle' => __('Dropdown border color for navigation', 'codeless-admin'),
                                'default' => '#222222'
                            ),

                            array( 
                                'id' => 'dropdown_font',
                                'type' => 'typography',
                                'title' => __('Dropdown typography', 'codeless-admin'),
                                'font-family' => false,
                                'google' => false, // Disable google fonts. Won't work if you haven't defined your google api key
                                'font-backup' => false, // Select a backup non-google font in addition to a google font
                                'font-size'=>true,
                                'line-height'=>false,
                                'font-weight' => false,
                                'font-style' => false,
                                'letter-spacing'=>true, // Defaults to false
                                'color'=>true,
                                'preview' => false,
                                'text-align' => false,
                                'text-transform' => true,
                                'units' => 'px', // Defaults to px
                                'subtitle' => __('Select the appropiate font style for the megamenu column title', 'codeless-admin'),
                                'output' => 'nav .menu li > ul.sub-menu li, .menu-small ul li a',
                                'default' => array(
                                    'color' => "#888",
                                    'font-size' => '11px',
                                    'letter-spacing' => '0.3px',
                                    'text-transform' => 'uppercase'
                                ),
                            ),

                            array( 
                                'id' => 'megamenu_title',
                                'type' => 'typography',
                                'title' => __('Megamenu title', 'codeless-admin'),
                                'font-family' => false,
                                'google' => false, // Disable google fonts. Won't work if you haven't defined your google api key
                                'font-backup' => false, // Select a backup non-google font in addition to a google font
                                'font-size'=>true,
                                'line-height'=>false,
                                'font-weight' => true,
                                'font-style' => false,
                                'letter-spacing'=>true, // Defaults to false
                                'color'=>true,
                                'preview' => false,
                                'text-align' => false,
                                'text-transform' => true,
                                'units' => 'px', // Defaults to px
                                'subtitle' => __('Select the appropiate font style for the megamenu column title', 'codeless-admin'),
                                'output' => 'nav .codeless_custom_menu_mega_menu ul>li h6, .menu-small ul.menu .codeless_custom_menu_mega_menu h6, .menu-small ul.menu > li > a ',
                                'default' => array(
                                    'color' => "#fff",
                                    'font-size' => '14px',
                                    'font-weight' => '600',
                                    'letter-spacing' => '1px',
                                    'text-transform' => 'uppercase'
                                ),
                            ),

                            array(
                                'id' => 'cart_dropdown_button',
                                'type' => 'select',
                                'title' => __('Cart Dropdown in header button style', 'codeless-admin'),
                                'subtitle' => __('', 'codeless-admin'),
                                'options' => array('dark' => 'Dark', 'light' => 'Light'), //Must provide key => value pairs for select options
                                'default' => 'light'
                            ),
                        ),
                        'subsection' => true
                    ));

                    Redux::setSection( $opt_name, array(
                        'icon' => 'el-icon-website',
                        'title' => __('Top Widgetized Area', 'codeless-admin'),
                        'fields' => array(
                            array(
                                'id' => 'top_navigation',
                                'type' => 'switch',
                                'title' => __('Show Top Navigation', 'codeless-admin'),
                                'subtitle' => __('Switch On to enable top navigation', 'codeless-admin'),
                                'default' => 0// 1 = on | 0 = off
                            ),

                            array(
                                'id' => 'topnav_bg',
                                'type' => 'color',
                                'mode' => 'background-color',
                                'output' => array('.top_nav'),
                                'title' => __('Background Color', 'codeless-admin'),
                                'subtitle' => __('', 'codeless-admin'),
                                'default' => '#f5f5f5',
                                'validate' => 'color',
                            ),


                            array( 
                                'id'       => 'topnav_border_top',
                                'type'     => 'border',
                                'title'    => __('Top Navigation Border Top', 'codeless-admin'),
                                'subtitle' => __('', 'codeless-admin'),
                                'output'   => array('.top_nav'),
                                'right'    => false,
                                'bottom'   => false, 
                                'left'     => false,
                                'color'    => true,
                                'style'    => true,
                                'desc'     => __('Add Border top for the top navigation', 'codeless-admin'),
                                'default'  => array(
                                    'color'  => '', 
                                    'border-style'  => 'solid',
                                    'border-top'    => '0px',
                                )
                            ),

                            array( 
                                'id'       => 'topnav_border_bottom',
                                'type'     => 'border',
                                'title'    => __('Top Navigation Border Bottom', 'codeless-admin'),
                                'subtitle' => __('', 'codeless-admin'),
                                'output'   => array('.top_nav'),
                                'right'    => false,
                                'top'   => false, 
                                'left'     => false,
                                'color'    => true,
                                'style'    => true,
                                'desc'     => __('Add Border bottom for the top navigation', 'codeless-admin'),
                                'default'  => array(
                                    'color'  => '', 
                                    'border-style'  => 'solid',
                                    'border-bottom'    => '0px',
                                )
                            ),

                            array(
                                'id' => 'topnav_font_style',
                                'type' => 'typography',
                                'title' => __('Typography', 'codeless-admin'),
                                //'compiler'=>true, // Use if you want to hook in your own CSS compiler
                                'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
                                'font-backup' => true, // Select a backup non-google font in addition to a google font
                                //'font-style'=>false, // Includes font-style and weight. Can use font-style or font-weight to declare
                                //'subsets'=>false, // Only appears if google is true and subsets not set to false
                                //'font-size'=>false,
                                'line-height'=>false,
                                //'word-spacing'=>true, // Defaults to false
                                //'letter-spacing'=>true, // Defaults to false 
                                //'color'=>false,
                                //'preview'=>false, // Disable the previewer
                                'text-align' => false,
                                'output' => array('.top_nav'),
                                'units' => 'px', // Defaults to px
                                'subtitle' => __('Select the appropiate font style for top nav', 'codeless-admin'),
                                'default' => array(
                                    'color' => "#999",
                                    'font-family' => 'Open Sans',
                                    'google' => true,
                                    'font-size' => '11px'
                                ),
                            ),

                            array(
                                'id' => 'topnav_height',
                                'type' => 'dimensions', 
                                'output' => array('.top_nav, .top_nav .widget'),
                                'units' => 'px', // You can specify a unit value. Possible: px, em, %
                                //'units_extended' => 'true', // Allow users to select any type of unit
                                'width' => false,
                                'title' => __('Top Nav Height', 'codeless-admin'),
                                'subtitle' => __('units: px', 'codeless-admin'),
                                'desc' => __('', 'codeless-admin'),
                                'default' => array('height' => 40)
                            ),
                        ),
                        'subsection' => true
                    ));

                    Redux::setSection( $opt_name, array(
                        'icon' => 'el-icon-website',
                        'title' => __('Default Page Header', 'codeless-admin'),
                        'fields' => array(
                            array(
                                'id' => 'page_header_bool',
                                'type' => 'switch',
                                'title' => __('Active Page Header', 'codeless-admin'),
                                'subtitle' => __('Switch On to enable page header for pages, posts (For each post or page you can add custom options)', 'codeless-admin'),
                                'default' => 1// 1 = on | 0 = off
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
                                'default' => array('height' => 80)
                            ),

                            array(
                                'id' => 'page_header_style',
                                'type' => 'select',
                                'title' => __('Page header style', 'codeless-admin'),
                                'subtitle' => __('Select the style for the default page header', 'codeless-admin'),
                                'options' => array('normal' => 'Basic (Left with breadcrumbs)', 'centered' => 'Centered'), //Must provide key => value pairs for select options
                                'default' => 'normal'
                            ),

                            array(
                                'id' => 'page_header_f_color',
                                'type' => 'color',
                                'output' => array('.header_page'),
                                'title' => __('Page header font color', 'codeless-admin'),
                                'subtitle' => __('Select the color for the title or breadcrumbs in page header', 'codeless-admin'),
                                'default' => '#444',
                                'validate' => 'color',
                            ),

                            array(
                                'id' => 'page_header_background',
                                'type' => 'background',
                                'output' => array('.header_page'),
                                'title' => __('Page header background', 'codeless-admin'),
                                'subtitle' => __('Page Header background with image, color, etc.', 'codeless-admin'),
                                'default' => array('background-color' => '#f5f5f5')
                            ),

                            array( 
                                'id'       => 'page_header_border',
                                'type'     => 'border',
                                'title'    => __('Page header Border Bottom', 'codeless-admin'),
                                'subtitle' => __('', 'codeless-admin'),
                                'output'   => array('.header_page, #slider-fullwidth'),
                                'right'    => false,
                                'top'   => false, 
                                'left'     => false,
                                'color'    => true,
                                'style'    => true,
                                'desc'     => __('Add Border bottom for page header', 'codeless-admin'),
                                'default'  => array(
                                    'color'  => '', 
                                    'border-style'  => 'solid',
                                    'border-bottom'    => '0px'
                                )
                            ),
                        ),
                        'subsection' => true
                    ));
                    Redux::setSection( $opt_name, array(
                        'icon' => 'el-icon-website',
                        'title' => __('Sticky Nav', 'codeless-admin'),
                        'fields' => array(
                            array(
                                'id' => 'sticky',
                                'type' => 'switch',
                                'title' => __('Sticky Header', 'codeless-admin'),
                                'subtitle' => __('Switch on to active sticky header (fixed position on header)', 'codeless-admin'),
                                "default" => 0,
                            ),
                            array(
                                'id' => 'sticky_header_height',
                                'type' => 'dimensions',
                                'output' => array('.sticky_header header#header .row-fluid .span12', '.sticky_header .header_wrapper'),
                                'units' => 'px', // You can specify a unit value. Possible: px, em, %
                                //'units_extended' => 'true', // Allow users to select any type of unit
                                'width' => false,
                                'title' => __('Sticky Header Height', 'codeless-admin'),
                                'subtitle' => __('units: px', 'codeless-admin'),
                                'desc' => __('', 'codeless-admin'),
                                'default' => array('height' => 60)
                            ),
                            
                            array(
                                'id' => 'sticky_header_background',
                                'type' => 'color_rgba',
                                'mode' => 'background-color',
                                'transparent' => true,
                                'validate' => 'colorrgba',
                                'output' => array('.sticky_header header#header'),
                                'title' => __('Sticky Background', 'codeless-admin'),
                                'subtitle' => __('Header background with image, color, etc.', 'codeless-admin'),
                                'default' => array(
                                    'color' => '#fff',
                                    'alpha' => '0.80'
                                ),
                            ),

                            array(
                                'id' => 'sticky_logo',
                                'type' => 'switch',
                                'title' => __('Sticky Logo', 'codeless-admin'),
                                'subtitle' => __('Remove the Logo from the main Header and shows only on stiky', 'codeless-admin'),
                                "default" => 0,
                                'required' => array('sticky', 'equals', 1),
                            ),
                        ),
                        'subsection' => true
                    ));
            

            Redux::setSection( $opt_name, array(
                'icon' => 'el-icon-adjust-alt',
                'title' => __('Styling Options', 'codeless-admin'),
                'fields' => array(
                    array(
                        'id' => 'primary_color', 
                        'type' => 'color',
                        'output' => array('.header_11 nav li > a:hover, .header_11 nav li.current-menu-item > a, .header_11 nav li.current-menu-parent > a ','.header_10 nav li > a:hover, .header_10 nav li.current-menu-item > a, .header_10 nav li.current-menu-parent > a ','.header_9 nav li > a:hover, .header_9 nav li.current-menu-item > a, .header_9 nav li.current-menu-parent > a ','.header_8 nav li > a:hover, .header_8 nav li.current-menu-item > a, .header_8 nav li.current-menu-parent > a ','.header_7 nav li > a:hover, .header_7 nav li.current-menu-item > a, .header_7 nav li.current-menu-parent > a ','.header_6 nav li > a:hover, .header_6 nav li.current-menu-item > a, .header_6 nav li.current-menu-parent > a ','.header_5 nav li > a:hover, .header_5 nav li.current-menu-item > a, .header_5 nav li.current-menu-parent > a ','.header_3 nav li > a:hover, .header_3 nav li.current-menu-item > a, .header_3 nav li.current-menu-parent > a ','.header_2 nav li > a:hover, .header_2 nav li.current-menu-item > a, .header_2 nav li.current-menu-parent > a ', '.codeless_slider .swiper-slide .buttons.colors-light a.colored:hover *',  '.services_steps .icon_wrapper i', '.testimonial_carousel .item .param span', '.services_large .icon_wrapper i', '.animated_counter i', '.services_medium.style_1 i', '.services_small dt i', '.single_staff .social_widget li a:hover i', '.single_staff .position', '.list li.titledesc dl dt i', '.list li.simple i', '.page_parents li a:hover', '#portfolio-filter ul li.active a','.content_portfolio.fullwidth #portfolio-filter ul li.active a', 'a:hover', '.header_1 nav li.current-menu-item > a','.blog-article h1 a:hover, .blog-article.timeline-style .content .quote i', '.header_1 nav li.current-menu-item:after', '.header_1 nav li > a:hover', '.header_1 nav li:hover:after', 'header#header .header_tools > a:hover', 'footer#footer a:hover', 'aside ul li:hover:after', '.highlights'),
                        'title' => __('Primary Color', 'codeless-admin'),
                        'subtitle' => __('Color for links on hover, highlighted text and other', 'codeless-admin'),
                        'default' => '#10b8c7',
                        'validate' => 'color',
                    ),

                    array(
                        'id' => 'link_color', 
                        'type' => 'color',
                        'title' => __('Content Links Color', 'codeless-admin'),
                        'subtitle' => __('Color for links', 'codeless-admin'),
                        'default' => '#10b8c7',
                        'validate' => 'color',
                    ),

                    array(
                        'id' => 'body_font_color',
                        'type' => 'color',
                        'output' => array('body'),
                        'title' => __('Body Font Color', 'codeless-admin'),
                        'subtitle' => __('Base font color for the main content, in light sections', 'codeless-admin'),
                        'default' => '#777777',
                        'validate' => 'color',
                    ),

                    array(
                        'id' => 'headings_font_color',
                        'type' => 'color',
                        'output' => array('h1,h2,h3,h4,h5,h6', '.portfolio_single ul.info li .title, .skill_title'),
                        'title' => __('Headings Font Color', 'codeless-admin'),
                        'subtitle' => __('Base font color for headings, in light sections', 'codeless-admin'),
                        'default' => '#444444',
                        'validate' => 'color',
                    ),

                    array(
                        'id' => 'base_border_color',
                        'type' => 'color',
                        'title' => __('Base Border Color', 'codeless-admin'),
                        'subtitle' => __('Base border color around the theme', 'codeless-admin'), 
                        'default' => '#e7e7e7',
                        'validate' => 'color',
                    ),

                    array(
                        'id' => 'highlighted_background_main',
                        'type' => 'color',
                        'output' => array('.p_pagination .pagination span, .pagination a','.testimonial_cycle .item p', '#portfolio-filter ul li.active, #faq-filter ul li.active, .accordion.style_2 .accordion-heading .accordion-toggle, .services_medium.style_1 .icon_wrapper, .skill'),
                        'title' => __('Highlighted Background', 'codeless-admin'),
                        'subtitle' => __('Highlighted Background in main content, white sections', 'codeless-admin'), 
                        'mode' => 'background-color',
                        'default' => '#f5f5f5',
                        'validate' => 'color',
                    ),

                    array(
                        'id' => 'body_background',
                        'type' => 'background',
                        'output' => array('body, html', '.viewport'),
                        'title' => __('Background', 'codeless-admin'),
                        'subtitle' => __('Add a background to body', 'codeless-admin'),
                        'default' => 'transparent',
                    ),

                    array(
                        'id' => 'page_content_background_overall',
                        'type' => 'color',
                        'mode' => 'background-color',
                        'output' => array('#content'),
                        'title' => __('Content Background', 'codeless-admin'),
                        'subtitle' => __('Add a background to content', 'codeless-admin'),
                        'default' => 'transparent',
                    ),
                    



                )
            ));
            
            Redux::setSection( $opt_name, array(
                'icon' => 'el-icon-adjust-alt',
                'title' => __('Default Page Header', 'codeless-admin'),
                'fields' => array(
                        array( 
                            'id' => 'page_header_normal_typography',
                            'type' => 'typography',
                            'title' => __('Normal Style No Subtitle Title Typography', 'codeless-admin'),
                            'font-family' => false,
                            'google' => false, // Disable google fonts. Won't work if you haven't defined your google api key
                            'font-backup' => false, // Select a backup non-google font in addition to a google font
                            'font-size'=>true,
                            'line-height'=>false,
                            'font-weight' => true,
                            'font-style' => false,
                            'letter-spacing'=>false, // Defaults to false
                            'color'=>false,
                            'preview' => false,
                            'text-align' => false,
                            'text-transform' => true,
                            'units' => 'px', // Defaults to px
                            'output' => '.header_page.normal h1',
                            'default' => array(
                                'font-size' => '24px',
                                'font-weight' => '600',
                                'text-transform' => 'uppercase'
                            ),
                        ),

                        array( 
                            'id' => 'page_header_normal_typography_subtitle_title',
                            'type' => 'typography',
                            'title' => __('Normal Style With Subtitle Title Typography', 'codeless-admin'),
                            'font-family' => false,
                            'google' => false, // Disable google fonts. Won't work if you haven't defined your google api key
                            'font-backup' => false, // Select a backup non-google font in addition to a google font
                            'font-size'=>true,
                            'line-height'=>false,
                            'font-weight' => true,
                            'font-style' => false,
                            'letter-spacing'=>false, // Defaults to false
                            'color'=>false,
                            'preview' => false,
                            'text-align' => false,
                            'text-transform' => true,
                            'units' => 'px', // Defaults to px
                            'output' => '.header_page.with_subtitle.normal .titles h1',
                            'default' => array(
                                'font-size' => '20px',
                                'font-weight' => '600',
                                'text-transform' => 'uppercase' 
                            ),
                        ),
                        
                        array( 
                            'id' => 'page_header_normal_typography_subtitle_subtitle',
                            'type' => 'typography',
                            'title' => __('Normal Style With Subtitle Subtitle Typography', 'codeless-admin'),
                            'font-family' => false,
                            'google' => false, // Disable google fonts. Won't work if you haven't defined your google api key
                            'font-backup' => false, // Select a backup non-google font in addition to a google font
                            'font-size'=>true,
                            'line-height'=>false,
                            'font-weight' => true,
                            'font-style' => false,
                            'letter-spacing'=>false, // Defaults to false
                            'color'=>false,
                            'preview' => false,
                            'text-align' => false,
                            'text-transform' => true,
                            'units' => 'px', // Defaults to px
                            'output' => '.header_page.with_subtitle.normal .titles h3',
                            'default' => array(
                                'font-size' => '13px',
                                'font-weight' => '400',
                                'text-transform' => 'none' 
                            ),
                        ),

                        array( 
                            'id' => 'page_header_centered_typography_nosub_title',
                            'type' => 'typography',
                            'title' => __('Centered Style No Subtitle Title Typography', 'codeless-admin'),
                            'font-family' => false,
                            'google' => false, // Disable google fonts. Won't work if you haven't defined your google api key
                            'font-backup' => false, // Select a backup non-google font in addition to a google font
                            'font-size'=>true,
                            'line-height'=>false,
                            'font-weight' => true,
                            'font-style' => false,
                            'letter-spacing'=>false, // Defaults to false
                            'color'=>false,
                            'preview' => false,
                            'text-align' => false,
                            'text-transform' => true,
                            'units' => 'px', // Defaults to px
                            'output' => '.header_page.centered h1',
                            'default' => array(
                                'font-size' => '38px',
                                'font-weight' => '300', 
                                'text-transform' => 'none'
                            ),
                        ),

                        array( 
                            'id' => 'page_header_centered_typography_subtitle_title',
                            'type' => 'typography',
                            'title' => __('Centered Style With Subtitle Title Typography', 'codeless-admin'),
                            'font-family' => false,
                            'google' => false, // Disable google fonts. Won't work if you haven't defined your google api key
                            'font-backup' => false, // Select a backup non-google font in addition to a google font
                            'font-size'=>true,
                            'line-height'=>false,
                            'font-weight' => true,
                            'font-style' => false,
                            'letter-spacing'=>true, // Defaults to false
                            'color'=>false,
                            'preview' => false,
                            'text-align' => false,
                            'text-transform' => true, 
                            'units' => 'px', // Defaults to px
                            'output' => '.header_page.with_subtitle.centered .titles h1',
                            'default' => array(
                                'font-size' => '48px',
                                'font-weight' => '600',
                                'text-transform' => 'uppercase',
                                'letter-spacing' => '4px' 
                            ),
                        ),

                        array( 
                            'id' => 'page_header_centered_typography_subtitle_subtitle',
                            'type' => 'typography',
                            'title' => __('Centered Style With Subtitle Subtitle Typography', 'codeless-admin'),
                            'font-family' => false,
                            'google' => false, // Disable google fonts. Won't work if you haven't defined your google api key
                            'font-backup' => false, // Select a backup non-google font in addition to a google font
                            'font-size'=>true,
                            'line-height'=>false, 
                            'font-weight' => true,
                            'font-style' => false,
                            'letter-spacing'=>false, // Defaults to false
                            'color'=>false,
                            'preview' => false,
                            'text-align' => false,
                            'text-transform' => true,
                            'units' => 'px', // Defaults to px
                            'output' => '.header_page.with_subtitle.centered .titles h3',
                            'default' => array(
                                'font-size' => '26px',
                                'font-weight' => '300', 
                                'text-transform' => 'none',
                            ),
                        ),
                        
                        array(
                                'id' => 'page_header_design_style',
                                'type' => 'select',
                                'title' => __('Page Header Design Style', 'codeless-admin'),
                                'subtitle' => __('Select the design style for the default page header', 'codeless-admin'),
                                'options' => array('normal' => 'Basic no padding and background, with little border', 'padd' => 'With padding and background'), //Must provide key => value pairs for select options
                                'default' => 'normal'
                        ),

                        array(
                            'id' => 'page_header_padd_bg_title',
                            'title' => __('Page Header with padding style title bg color', 'codeless-admin'),
                            'mode' => 'background-color',
                            'type' => 'color_rgba',
                            'default'  => array(
                                'color' => '#000', 
                                'alpha' => '0.70'
                            ),
                            'required' => array('page_header_design_style', 'equals', 'padd'),
                            'validate' => 'colorrgba',
                        ),
                        array(
                            'id' => 'page_header_padd_bg_subtitle',
                            'title' => __('Page Header with padding style subtitle bg color', 'codeless-admin'),
                            'mode' => 'background-color',
                            'type' => 'color_rgba',
                            'default'  => array(
                                'color' => '#fff', 
                                'alpha' => '0.70'
                            ),
                            'required' => array('page_header_design_style', 'equals', 'padd'),
                            'validate' => 'colorrgba',
                        ),
                        array(
                            'id' => 'page_header_padd_bg_subtitle_font',
                            'title' => __('Page Header with padding style subtitle font color', 'codeless-admin'),
                            'mode' => 'color',
                            'type' => 'color',
                            'default'  => '#222',
                            'required' => array('page_header_design_style', 'equals', 'padd'),
                            'validate' => 'color',
                        )
                ),
                'subsection' => true
            ));

             Redux::setSection( $opt_name, array(
                'icon' => 'el-icon-adjust-alt',
                'title' => __('Footer Styling', 'codeless-admin'),
                'fields' => array(
                    array( 
                        'id' => 'fppter_headings_typography',
                        'type' => 'typography',
                        'title' => __('Footer Headings Typography', 'codeless-admin'),
                        'font-family' => false,
                        'google' => false, // Disable google fonts. Won't work if you haven't defined your google api key
                        'font-backup' => false, // Select a backup non-google font in addition to a google font
                        'font-size'=>true,
                        'line-height'=>false, 
                        'font-weight' => true, 
                        'font-style' => false,
                        'letter-spacing'=>true, // Defaults to false
                        'color'=>true,
                        'preview' => false,
                        'text-align' => false,
                        'text-transform' => true,
                        'units' => 'px', // Defaults to px
                        'output' => 'footer#footer .widget-title',
                        'default' => array(
                            'color' => '#cdcdcd',
                            'font-weight' => '700',
                            'font-size' => '14px', 
                            'text-transform' => 'uppercase',
                            'letter-spacing' => '1px'
                        ),
                    ),

                    array(
                        'id' => 'footer_body_color',
                        'type' => 'color',
                        'output' => array('footer#footer, footer#footer .contact_information dd .title'),
                        'title' => __('Footer Body Font Color', 'codeless-admin'),
                        'subtitle' => __('Select the font color for text in footer' ,  'codeless-admin'),
                        'default' => '#818181',
                        'validate' => 'color',
                    ),

                    array(
                        'id' => 'footer_links_color',
                        'type' => 'color',
                        'output' => array('footer#footer a, footer#footer .contact_information dd p'),
                        'title' => __('Footer links font Color', 'codeless-admin'),
                        'subtitle' => __('Select the font color for links' ,  'codeless-admin'),
                        'default' => '#cdcdcd',
                        'validate' => 'color',
                    ),
                    
                    array(
                        'id' => 'footer_background_color',
                        'type' => 'color',
                        'output' => array('footer#footer .inner'),
                        'title' => __('Footer Background Color', 'codeless-admin'),
                        'subtitle' => __('Color for the footer main part' ,  'codeless-admin'), 
                        'mode' => 'background-color',
                        'default' => '#1c1c1c',
                        'validate' => 'color',
                    ),
                    array(
                        'id' => 'copyright_background_color',
                        'type' => 'color',
                        'output' => array('#copyright, footer .widget_recent_comments li, footer .tagcloud a'),
                        'title' => __('Copyright Background Color', 'codeless-admin'),
                        'subtitle' => __('Color for the latest part of the footer' ,  'codeless-admin'), 
                        'mode' => 'background-color',
                        'default' => '#222222',
                        'validate' => 'color',
                    ),

                    array( 
                        'id'       => 'footer_border_top',
                        'type'     => 'border',
                        'title'    => __('Footer Border Top', 'codeless-admin'),
                        'subtitle' => __('', 'codeless-admin'),
                        'output'   => array('footer#footer'),
                        'right'    => false,
                        'top'      => true, 
                        'left'     => false,
                        'bottom'   => false,
                        'color'    => true,
                        'style'    => true, 
                        'desc'     => __('Add Border top for footer', 'codeless-admin'),
                        'default'  => array(
                            'color'  => '', 
                            'border-style'  => 'solid',
                            'border-top'    => '0px'
                        )
                    ),

                    array(
                        'id' => 'footer_social_icons_bg',
                        'type' => 'color',
                        'mode' => 'background-color',
                        'output' => array('.footer_social_icons.circle li'),
                        'title' => __('Social Icons Circle BG', 'codeless-admin'),
                        'subtitle' => __('Circle background color' ,  'codeless-admin'),
                        'default' => '#222222',
                        'validate' => 'color',
                    ),

                    array(
                        'id' => 'footer_social_icons_icon',
                        'type' => 'color',
                        'output' => array('.footer_social_icons.circle li a i'),
                        'title' => __('Social Icons Circle Icon Color', 'codeless-admin'),
                        'subtitle' => __('Circle icon color' ,  'codeless-admin'),
                        'default' => '#ffffff',
                        'validate' => 'color',
                    ),


                ),
                'subsection' => true
            ));

            Redux::setSection( $opt_name, array(
                'icon' => 'el-icon-adjust-alt',
                'title' => __('Blog Styling', 'codeless-admin'),
                'fields' => array(
                    array( 
                        'id' => 'blog_title_typography',
                        'type' => 'typography',
                        'title' => __('Blog Title Typography', 'codeless-admin'),
                        'font-family' => false,
                        'google' => false, // Disable google fonts. Won't work if you haven't defined your google api key
                        'font-backup' => false, // Select a backup non-google font in addition to a google font
                        'font-size'=>true,
                        'line-height'=>true, 
                        'font-weight' => true, 
                        'font-style' => false,
                        'letter-spacing'=>false, // Defaults to false
                        'color' => true,
                        'preview' => false,
                        'text-align' => false,
                        'text-transform' => true,
                        'units' => 'px', // Defaults to px
                        'output' => '.blog-article.standard-style .content h1, .blog-article.alternative-style .content h1, .blog-article.timeline-style .content h1',
                        'default' => array(
                            'font-weight' => '700',
                            'color' => '#444444',
                            'text-transform' => 'uppercase', 
                            'line-height' => '30px',
                            'font-size' => '20px'
                        ),
                    ),
                    
                    array( 
                        'id' => 'blog_info_typography',
                        'type' => 'typography',
                        'title' => __('Blog Info List Typography', 'codeless-admin'),
                        'font-family' => false,
                        'google' => false, // Disable google fonts. Won't work if you haven't defined your google api key
                        'font-backup' => false, // Select a backup non-google font in addition to a google font
                        'font-size'=>true,
                        'line-height'=>true,  
                        'font-weight' => false, 
                        'font-style' => false,
                        'letter-spacing'=>false, // Defaults to false
                        'color' => true,
                        'preview' => false, 
                        'text-align' => false,
                        'text-transform' => false, 
                        'units' => 'px', // Defaults to px
                        'output' => '.blog-article.alternate-style .info, .blog-article.timeline-style .info, .blog-article.standard-style .info, .blog-article.grid-style .info, .fullscreen-single .info, .recent_news .blog-item .info, .latest_blog .blog-item .info ',
                        'default' => array(
                            'color' => '#999999',
                            'font-size' => '12px',
                            'line-height' => '20px' 
                        ),
                    ),

                    array( 
                        'id' => 'blog_info_typography_icon',
                        'type' => 'typography',
                        'title' => __('Blog Info List Icon Size', 'codeless-admin'),
                        'font-family' => false,
                        'google' => false, // Disable google fonts. Won't work if you haven't defined your google api key
                        'font-backup' => false, // Select a backup non-google font in addition to a google font
                        'font-size'=>true,
                        'line-height'=>false,  
                        'font-weight' => false, 
                        'font-style' => false,
                        'letter-spacing'=>false, // Defaults to false
                        'color' => false,
                        'preview' => false, 
                        'text-align' => false,
                        'text-transform' => false, 
                        'units' => 'px', // Defaults to px
                        'output' => '.blog-article.alternate-style .info i, .blog-article.timeline-style .info i, .blog-article.standard-style .info i, .blog-article.grid-style .info, .fullscreen-single .info i, .latest_blog .blog-item .info i, .recent_news .blog-item .info i ',
                        'default' => array(
                            'font-size' => '15px'
                        ),
                    ),

                    array(
                        'id' => 'timeline_box_shadow',
                        'type' => 'switch',
                        'title' => __('Active Timeline (or for masonry) Box Shadow', 'codeless-admin'),
                        "default" => 1,
                    ),
                    array(
                        'id' => 'timeline_bg_color',
                        'type' => 'color',
                        'output' => array('.blog-article.timeline-style .post_box, .blog-article.grid-style .gridbox'),
                        'title' => __('Timeline (or masonry) post box bg color', 'codeless-admin'),
                        'mode' => 'background-color',
                        'default' => '#ffffff',
                        'validate' => 'color',
                    ),
                    array(
                        'id' => 'fullscreen_blog_box_bg', 
                        'output' => array('.fullscreen-blog-article .content'),
                        'title' => __('Fullscreen Blog Content Box BG', 'codeless-admin'),
                        'mode' => 'background-color',
                        'type' => 'color_rgba',
                        'default'  => array(
                            'color' => '#ffffff', 
                            'alpha' => '0.00'
                        ),
                        'validate' => 'colorrgba',
                    )
                ),
                'subsection' => true
            ));

            Redux::setSection( $opt_name, array(
                'icon' => 'el-icon-adjust-alt',
                'title' => __('Sidebar Styling', 'codeless-admin'),
                'fields' => array(
                    array( 
                        'id' => 'sidebar_widget_title',
                        'type' => 'typography',
                        'title' => __('Widget Title', 'codeless-admin'),
                        'font-family' => false,
                        'google' => false, // Disable google fonts. Won't work if you haven't defined your google api key
                        'font-backup' => false, // Select a backup non-google font in addition to a google font
                        'font-size'=>true,
                        'line-height'=>true, 
                        'font-weight' => true, 
                        'font-style' => false,
                        'letter-spacing'=>true, // Defaults to false
                        'color' => true,
                        'preview' => false,
                        'text-align' => false,
                        'text-transform' => true,
                        'units' => 'px', // Defaults to px
                        'output' => 'aside .widget-title, .portfolio_single h4',
                        'default' => array(
                            'font-weight' => '700',
                            'color' => '#444444',
                            'font-size' => '15px',
                            'text-transform' => 'uppercase', 
                            'line-height' => '20px',
                            'letter-spacing' => '1px'
                        ),
                    ),
                    
                    array(
                        'id' => 'sidebar_widget_title_margin',
                        'type' => 'spacing',
                        'output' => array('aside .widget-title'), // An array of CSS selectors to apply this font style to
                        'mode' => 'margin', // absolute, padding, margin, defaults to padding
                        'top' => false, // Disable the top
                        'right' => false, // Disable the right
                        'bottom' => true, // Disable the bottom
                        'left' => false, // Disable the left
                        //'all' => true, // Have one field that applies to all 
                        'units' => 'px', // You can specify a unit value. Possible: px, em, %
                        //'units_extended' => 'true', // Allow users to select any type of unit
                        //'display_units' => 'false', // Set to false to hide the units if the units are specified
                        'title' => __('Widget Title Margin Bottom', 'codeless-admin'),
                        'desc' => __('Unit: px', 'codeless-admin'),
                        'default' => array('margin-bottom' => '24px')
                    ),

                    array(
                        'id' => 'sidebar_widget_margin',
                        'type' => 'spacing',
                        'output' => array('aside .widget'), // An array of CSS selectors to apply this font style to
                        'mode' => 'margin', // absolute, padding, margin, defaults to padding
                        'top' => false, // Disable the top
                        'right' => false, // Disable the right
                        'bottom' => true, // Disable the bottom
                        'left' => false, // Disable the left
                        //'all' => true, // Have one field that applies to all
                        'units' => 'px', // You can specify a unit value. Possible: px, em, %
                        //'units_extended' => 'true', // Allow users to select any type of unit
                        //'display_units' => 'false', // Set to false to hide the units if the units are specified
                        'title' => __('Widget Margin Bottom', 'codeless-admin'),
                        'desc' => __('Unit: px', 'codeless-admin'),
                        'default' => array('margin-bottom' => '35px')
                    ),
                    
                    array(
                        'id' => 'sidebar_tagcloud_bg',
                        'type' => 'color',
                        'output' => array('aside .tagcloud a'),
                        'title' => __('Sidebar Tagcloud Background', 'codeless-admin'),
                        'mode' => 'background-color',
                        'default' => '#222',
                        'validate' => 'color',
                    ),

                    array(
                        'id' => 'sidebar_tagcloud_color',
                        'type' => 'color',
                        'output' => array('aside .tagcloud a'),
                        'title' => __('Sidebar Tagcloud Font color', 'codeless-admin'),
                        'mode' => 'color',
                        'default' => '#fff',
                        'validate' => 'color',
                    )

                ), 
                'subsection' => true
            ));

            Redux::setSection( $opt_name, array(
                'icon' => 'el-icon-adjust-alt',
                'title' => __('Sliders Styling', 'codeless-admin'),
                'fields' => array(
                    array(
                        'id' => 'codeless_slider_wrapper_bg',
                        'type' => 'color',
                        'output' => array('.codeless_slider_wrapper'),
                        'title' => __('Codeless Slider Wrapper Background Color', 'codeless-admin'),
                        'mode' => 'background-color',
                        'default' => '#222',
                        'validate' => 'color'
                    ),
                ),
                'subsection' => true
            ));

            Redux::setSection( $opt_name, array(
                'icon' => 'el-icon-adjust-alt',
                'title' => __('Filters Styling', 'codeless-admin'),
                'fields' => array(
                    array( 
                        'id' => 'portfolio_filter_basic_typography',
                        'type' => 'typography',
                        'title' => __('Portfolio Filter & FAQ Filter Basic Typography', 'codeless-admin'),
                        'font-family' => false,
                        'google' => false, // Disable google fonts. Won't work if you haven't defined your google api key
                        'font-backup' => false, // Select a backup non-google font in addition to a google font
                        'font-size'=>false,
                        'line-height'=>false, 
                        'font-weight' => true, 
                        'font-style' => false,
                        'letter-spacing'=>true, // Defaults to false
                        'color' => true,
                        'preview' => false,
                        'text-align' => false,
                        'text-transform' => true,
                        'units' => 'px', // Defaults to px
                        'output' => '#portfolio-filter ul li a, #faq-filter ul li a',
                        'default' => array(
                            'font-weight' => '600',
                            'color' => '#bebebe',
                            'text-transform' => 'uppercase',
                            'letter-spacing' => '1px'
                        ),
                    ),
                    
                    array(
                        'id' => 'portfolio_filter_basic_typography_active',
                        'type' => 'color',
                        'output' => array('#portfolio-filter ul li.active a, #portfolio-filter ul li a:hover, #faq-filter ul li.active a, #faq-filter ul li a:hover'),
                        'title' => __('Portfolio Filter & FAQ Filter Basic Typography (Active)', 'codeless-admin'),
                        'mode' => 'color',
                        'default' => '#222',
                        'validate' => 'color',
                    ),

                    array(
                        'id' => 'portfolio_filter_full_bg',
                        'type' => 'color',
                        'output' => array('.content_portfolio.fullwidth .filter-row'),
                        'title' => __('Portfolio Filter Fullwidth Background Color', 'codeless-admin'),
                        'mode' => 'background-color',
                        'default' => '#222',
                        'validate' => 'color',
                    ),

                    array(
                        'id' => 'portfolio_filter_full_link_color',
                        'type' => 'color_rgba',
                        'output' => array('.content_portfolio.fullwidth #portfolio-filter ul li a'),
                        'title' => __('Portfolio Filter Fullwidth Item color', 'codeless-admin'),
                        'mode' => 'color',
                        'default'  => array(
                            'color' => '#ffffff', 
                            'alpha' => '0.80'
                        ),
                        'validate' => 'colorrgba',
                    ),

                    array(
                        'id' => 'portfolio_filter_full_link_color_hover',
                        'type' => 'color_rgba',
                        'output' => array('.content_portfolio.fullwidth #portfolio-filter ul li a:hover'),
                        'title' => __('Portfolio Filter Fullwidth Item hover color ', 'codeless-admin'),
                        'mode' => 'color',
                        'default'  => array(
                            'color' => '#ffffff', 
                            'alpha' => '1.00'
                        ),
                        'validate' => 'colorrgba',
                    ),

                ),
                'subsection' => true,
            ));

            Redux::setSection( $opt_name, array(
                'icon' => 'el-icon-adjust-alt',
                'title' => __('Portfolio Styling', 'codeless-admin'),
                'fields' => array(
                    array(
                        'id' => 'portfolio_overlay_bg',
                        'type' => 'color_rgba',
                        'output' => array('.portfolio-item.overlayed .tpl2 .bg'),
                        'title' => __('Portfolio Overlay BG Color ', 'codeless-admin'),
                        'mode' => 'background-color',
                        'default'  => array(
                            'color' => '#10b8c7',  
                            'alpha' => '0.90'
                        ),
                        'validate' => 'colorrgba',
                    ),
                    array( 
                        'id' => 'portfolio_overlay_title',
                        'type' => 'typography',
                        'title' => __('Portfolio Overlay Title Typography', 'codeless-admin'),
                        'font-family' => false,
                        'google' => false, // Disable google fonts. Won't work if you haven't defined your google api key
                        'font-backup' => false, // Select a backup non-google font in addition to a google font
                        'font-size'=>false,
                        'line-height'=>false, 
                        'font-weight' => true, 
                        'font-style' => false,
                        'letter-spacing'=>true, // Defaults to false
                        'color' => true,
                        'preview' => false,
                        'text-align' => false,
                        'text-transform' => true,
                        'units' => 'px', // Defaults to px
                        'output' => '.portfolio-item.overlayed h4',
                        'default' => array(
                            'font-weight' => '600',
                            'color' => '#fff',
                            'text-transform' => 'uppercase',
                            'letter-spacing' => ''
                        ),
                    ),

                    array( 
                        'id' => 'portfolio_overlay_subtitle',
                        'type' => 'typography',
                        'title' => __('Portfolio Overlay Subtitle Typography', 'codeless-admin'),
                        'font-family' => false,
                        'google' => false, // Disable google fonts. Won't work if you haven't defined your google api key
                        'font-backup' => false, // Select a backup non-google font in addition to a google font
                        'font-size'=>true,
                        'line-height'=>false, 
                        'font-weight' => true, 
                        'font-style' => false,
                        'letter-spacing'=>false, // Defaults to false
                        'color' => true, 
                        'preview' => false,
                        'text-align' => false,
                        'text-transform' => true,
                        'units' => 'px', // Defaults to px
                        'output' => '.portfolio-item.overlayed h6',
                        'default' => array(
                            'font-size' => '14px',
                            'font-weight' => '300',
                            'color' => '#fff',
                            'text-transform' => 'none'
                        ),
                    ),
                    
                    array(
                        'id' => 'portfolio_grayscale_bg',
                        'type' => 'color',
                        'output' => array('.portfolio-item.grayscale .project'),
                        'title' => __('Portfolio Grayscale Background', 'codeless-admin'),
                        'mode' => 'background-color',
                        'default' => '#fff',
                        'validate' => 'color',
                    ),

                    array( 
                        'id' => 'portfolio_grayscale_title',
                        'type' => 'typography',
                        'title' => __('Portfolio Grayscale Title Typography', 'codeless-admin'),
                        'font-family' => false,
                        'google' => false, // Disable google fonts. Won't work if you haven't defined your google api key
                        'font-backup' => false, // Select a backup non-google font in addition to a google font
                        'font-size'=>false,
                        'line-height'=>false, 
                        'font-weight' => true, 
                        'font-style' => false,
                        'letter-spacing'=>false, // Defaults to false
                        'color' => true, 
                        'preview' => false,
                        'text-align' => false,
                        'text-transform' => false,
                        'units' => 'px', // Defaults to px
                        'output' => '.portfolio-item.grayscale .project h5',
                        'default' => array(
                            'color' => '',
                            'font-weight' => '600'
                        ),
                    ),
 
                    array(
                        'id' => 'portfolio_grayscale_subtitle',
                        'type' => 'color',
                        'output' => array('.portfolio-item.grayscale .project h6'),
                        'title' => __('Portfolio Grayscale Subtitle Color', 'codeless-admin'),
                        'mode' => 'color',
                        'default' => '#bebebe',
                        'validate' => 'color',
                    ),

                    array(
                        'id' => 'portfolio_basic_overlay_bg',
                        'type' => 'color_rgba',
                        'output' => array('.portfolio-item.basic .bg'),
                        'title' => __('Portfolio Basic Overlay Background', 'codeless-admin'),
                        'mode' => 'background-color',
                        'default' => array(
                            'color' => '#fff',
                            'alpha' => '0.90'
                        ),
                        'validate' => 'colorrgba',
                    ),

                    array(
                        'id' => 'portfolio_basic_overlay_icon_color',
                        'type' => 'color',
                        'output' => '.portfolio-item.basic .link',
                        'title' => __('Portfolio Basic Icon Color', 'codeless-admin'),
                        'mode' => 'color',
                        'default' => '#fff',
                        'validate' => 'color',
                    ),

                    array( 
                        'id' => 'portfolio_basic_title',
                        'type' => 'typography',
                        'title' => __('Portfolio Basic Title Typography', 'codeless-admin'),
                        'font-family' => false,
                        'google' => false, // Disable google fonts. Won't work if you haven't defined your google api key
                        'font-backup' => false, // Select a backup non-google font in addition to a google font
                        'font-size'=>false,
                        'line-height'=>false, 
                        'font-weight' => true, 
                        'font-style' => false,
                        'letter-spacing'=>true, // Defaults to false
                        'color' => true, 
                        'preview' => false,
                        'text-align' => true,
                        'text-transform' => true,
                        'units' => 'px', // Defaults to px
                        'output' => '.portfolio-item.basic .show_text h5',
                        'default' => array(
                            'color' => '#222',
                            'font-weight' => '600',
                            'text-transform' => 'uppercase',
                            'letter-spacing' => '1px',
                            'text-align' => 'center'
                        ),
                    ),

                    array( 
                        'id' => 'portfolio_basic_subtitle',
                        'type' => 'typography',
                        'title' => __('Portfolio Basic Subtitle Typography', 'codeless-admin'),
                        'font-family' => false,
                        'google' => false, // Disable google fonts. Won't work if you haven't defined your google api key
                        'font-backup' => false, // Select a backup non-google font in addition to a google font
                        'font-size'=>false,
                        'line-height'=>false, 
                        'font-weight' => true, 
                        'font-style' => false,
                        'letter-spacing'=>false, // Defaults to false
                        'color' => true, 
                        'preview' => false,
                        'text-align' => true,
                        'text-transform' => false,
                        'units' => 'px', // Defaults to px
                        'output' => '.portfolio-item.basic .show_text h6',
                        'default' => array(
                            'color' => '#888',
                            'font-weight' => '400',
                            'text-align' => 'center'
                        ),
                    ),

                    

                ),
                'subsection' => true,
            ));

            Redux::setSection( $opt_name, array(
                'icon' => 'el-icon-adjust-alt',
                'title' => __('Elements Styling', 'codeless-admin'),
                'fields' => array(
                    array( 
                        'id' => 'toggle_title_typography',
                        'type' => 'typography',
                        'title' => __('Toggle title typography', 'codeless-admin'),
                        'font-family' => false,
                        'google' => false, // Disable google fonts. Won't work if you haven't defined your google api key
                        'font-backup' => false, // Select a backup non-google font in addition to a google font
                        'font-size'=>true,
                        'line-height'=>false, 
                        'font-weight' => true, 
                        'font-style' => false,
                        'letter-spacing'=>true, // Defaults to false
                        'color' => true, 
                        'preview' => false,
                        'text-align' => false,
                        'text-transform' => true,
                        'units' => 'px', // Defaults to px
                        'output' => '.accordion.style_2 .accordion-heading .accordion-toggle, .accordion.style_1 .accordion-heading .accordion-toggle',
                        'default' => array(
                            'color' => '#555',
                            'font-weight' => '600',
                            'font-size' => '15px',
                            'text-transform' => 'uppercase',
                            'letter-spacing' => '1px'
                        ),
                    ),
                    array(
                        'id' => 'toggle_active_color',
                        'type' => 'color',
                        'output' => '.accordion.style_1 .accordion-heading.in_head .accordion-toggle, .accordion.style_2 .accordion-heading.in_head .accordion-toggle',
                        'title' => __('Activated Toggle Font Color', 'codeless-admin'),
                        'mode' => 'color',
                        'default' => '#222',
                        'validate' => 'color',
                    ),

                    array( 
                        'id' => 'block_title_column_title',
                        'type' => 'typography',
                        'title' => __('Block Title Element (Column) Title', 'codeless-admin'),
                        'font-family' => false,
                        'google' => false, // Disable google fonts. Won't work if you haven't defined your google api key
                        'font-backup' => false, // Select a backup non-google font in addition to a google font
                        'font-size'=>false,
                        'line-height'=>false, 
                        'font-weight' => true, 
                        'font-style' => false,
                        'letter-spacing'=>true, // Defaults to false
                        'color' => true, 
                        'line-height' => true,
                        'preview' => false,
                        'text-align' => true,
                        'text-transform' => true,
                        'units' => 'px', // Defaults to px
                        'output' => '.block_title.column_title h1',
                        'default' => array(
                            'color' => '#222',
                            'font-weight' => '600',
                            'text-transform' => 'uppercase',
                            'letter-spacing' => '1px',
                            'line-height' => '24px',
                            'text-align' => 'left'
                        ),
                    ),
                    
                    array( 
                        'id' => 'block_title_column_subtitle',
                        'type' => 'typography',
                        'title' => __('Block Title Element (Column) Subtitle', 'codeless-admin'),
                        'font-family' => false,
                        'google' => false, // Disable google fonts. Won't work if you haven't defined your google api key
                        'font-backup' => false, // Select a backup non-google font in addition to a google font
                        'font-size'=>false,
                        'line-height'=>false, 
                        'font-weight' => true, 
                        'font-style' => false,
                        'letter-spacing'=>false, // Defaults to false
                        'color' => true, 
                        'preview' => false,
                        'text-align' => true,
                        'text-transform' => true,
                        'units' => 'px', // Defaults to px
                        'output' => '.block_title.column_title h2',
                        'default' => array(
                            'color' => '#888',
                            'font-weight' => '300',
                            'text-transform' => 'none',
                            'text-align' => 'left'
                        ),
                    ),
                    
                    array( 
                        'id' => 'block_title_section_title',
                        'type' => 'typography',
                        'title' => __('Block Title Element (Section) Title', 'codeless-admin'),
                        'font-family' => false,
                        'google' => false, // Disable google fonts. Won't work if you haven't defined your google api key
                        'font-backup' => false, // Select a backup non-google font in addition to a google font
                        'font-size'=>false,
                        'line-height'=>false, 
                        'font-weight' => true, 
                        'font-style' => false,
                        'letter-spacing'=>true, // Defaults to false
                        'color' => true, 
                        'preview' => false,
                        'line-height' => true,
                        'text-align' => false,
                        'text-transform' => true,
                        'units' => 'px', // Defaults to px
                        'output' => '.block_title.section_title h1',
                        'default' => array(
                            'color' => '',
                            'font-size' => '20px',
                            'font-weight' => '700',
                            'text-transform' => 'uppercase',
                            'line-height' => '38px',
                            'letter-spacing' => '1.5px'
                        ),
                    ),
                    
                    array( 
                        'id' => 'block_title_section_desc',
                        'type' => 'typography',
                        'title' => __('Block Title Element (Section) Desc', 'codeless-admin'),
                        'font-family' => false,
                        'google' => false, // Disable google fonts. Won't work if you haven't defined your google api key
                        'font-backup' => false, // Select a backup non-google font in addition to a google font
                        'font-size'=>true,
                        'line-height'=>false, 
                        'font-weight' => true, 
                        'font-style' => false,
                        'letter-spacing'=>false, // Defaults to false
                        'color' => true, 
                        'preview' => false,
                        'line-height' => true,
                        'text-align' => false,
                        'text-transform' => true,
                        'units' => 'px', // Defaults to px
                        'output' => '.block_title.section_title p',
                        'default' => array(
                            'color' => '#555',
                            'font-weight' => '400',
                            'text-transform' => '',
                            'line-height' => '20px',
                            'font-size' => '14px'
                        ),
                    ),

                    array( 
                        'id' => 'animated_counter_typ',
                        'type' => 'typography',
                        'title' => __('Animated Counters Typography', 'codeless-admin'),
                        'font-family' => false,
                        'google' => false, // Disable google fonts. Won't work if you haven't defined your google api key
                        'font-backup' => false, // Select a backup non-google font in addition to a google font
                        'font-size'=>true,
                        'line-height'=>false, 
                        'font-weight' => true, 
                        'font-style' => false,
                        'letter-spacing'=>true, // Defaults to false
                        'color' => true, 
                        'preview' => false,
                        'line-height' => true,
                        'text-align' => false,
                        'text-transform' => false,
                        'units' => 'px', // Defaults to px
                        'output' => '.odometer',
                        'default' => array(
                            'color' => '#444',
                            'font-weight' => '600',
                            'font-size' => '48px',
                            'line-height' => '48px',
                            'letter-spacing' => '-1px'
                        ),
                    ),
                    array( 
                        'id' => 'testimonial_text',
                        'type' => 'typography',
                        'title' => __('Testimonial typography', 'codeless-admin'),
                        'font-family' => false,
                        'google' => false, // Disable google fonts. Won't work if you haven't defined your google api key
                        'font-backup' => false, // Select a backup non-google font in addition to a google font
                        'font-size'=>true,
                        'line-height'=>false, 
                        'font-weight' => true, 
                        'font-style' => false,
                        'letter-spacing'=>false, // Defaults to false
                        'color' => true, 
                        'preview' => false,
                        'text-align' => false,
                        'text-transform' => false,
                        'line-height' => true,
                        'units' => 'px', // Defaults to px
                        'output' => '.testimonial_carousel .item p',
                        'default' => array(
                            'color' => '#444',
                            'font-weight' => '300',
                            'font-size' => '18px',
                            'line-height' => '30px'
                        ),
                    ),

                    array( 
                        'id' => 'textbar_title_typography',
                        'type' => 'typography',
                        'title' => __('Textbar title typography', 'codeless-admin'),
                        'font-family' => false,
                        'google' => false, // Disable google fonts. Won't work if you haven't defined your google api key
                        'font-backup' => false, // Select a backup non-google font in addition to a google font
                        'font-size'=>true,
                        'line-height'=>false, 
                        'font-weight' => true, 
                        'font-style' => false,
                        'letter-spacing'=>true, // Defaults to false
                        'color' => true, 
                        'preview' => false,
                        'text-align' => false,
                        'text-transform' => true,
                        'units' => 'px', // Defaults to px
                        'output' => '.textbar h2',
                        'default' => array(
                            'color' => '#222',
                            'font-weight' => '600',
                            'font-size' => '24px',
                            'text-transform' => 'none',
                            'letter-spacing' => '0px'
                        ),
                    ),
                    array(
                        'id' => 'contact_border',
                        'type' => 'color',
                        'output' => '',
                        'title' => __('Contact Form Elements Border', 'codeless-admin'),
                        'default' => 'transparent',
                        'validate' => 'color',
                    )
                ),
                'subsection' => true
            ));

            Redux::setSection( $opt_name, array(
                'icon' => 'el-icon-adjust-alt',
                'title' => __('Buttons Styling', 'codeless-admin'),
                'fields' => array(
                    array(
                        'id'       => 'overall_button_style',
                        'type'     => 'select',
                        'multi'    => true,
                        'options'  => array(
                            'default' => 'Default (Border and Effect)',
                            'business' => 'Business',
                            'no_padding' => 'Without padding',
                            'rounded' => 'Rounded',
                            'big' => 'Big and Shadow',
                            'with_icon' => 'With Icon in the left',
                            'gradient' => 'Gradient'
                        ),
                        'default'  => array('default'),
                        'title'    => __('Overall Button Style', 'codeless-admin')
                    ),


                    array( 
                        'id' => 'button_typography',
                        'type' => 'typography',
                        'title' => __('Overall button typography', 'codeless-admin'),
                        'font-family' => false,
                        'google' => false, // Disable google fonts. Won't work if you haven't defined your google api key
                        'font-backup' => false, // Select a backup non-google font in addition to a google font
                        'font-size'=>true,
                        'line-height'=>false, 
                        'font-weight' => true, 
                        'font-style' => false,
                        'letter-spacing'=>true, // Defaults to false
                        'color' => true, 
                        'preview' => false,
                        'text-align' => false,
                        'text-transform' => true,
                        'units' => 'px', // Defaults to px
                        'output' => '',
                        'default' => array(
                            'color' => '#222',
                            'font-weight' => '600',
                            'font-size' => '13px',
                            'text-transform' => 'uppercase',
                            'letter-spacing' => '1.5px'
                        )
                    ),
                    array(
                        'id' => 'button_background_color',
                        'type' => 'color_rgba',
                        'output' => '',
                        'title' => __('Overall button background', 'codeless-admin'),
                        'default'  => array(
                            'color' => '#ffffff',  
                            'alpha' => '0.00'
                        ),
                        'validate' => 'colorrgba'
                    ),
                    array(
                        'id' => 'button_border_color',
                        'type' => 'color_rgba',
                        'output' => '',
                        'title' => __('Overall button border', 'codeless-admin'),
                        'default'  => array(
                            'color' => '#444444', 
                            'alpha' => '0.20'
                        ),
                        'validate' => 'colorrgba'
                    ),
                    array(
                        'id' => 'button_hover_font_color',
                        'type' => 'color',
                        'output' => '',
                        'title' => __('Overall button hover Font Color', 'codeless-admin'),
                        'default' => '#222',
                        'validate' => 'color'
                    ),

                    array(
                        'id' => 'button_hover_background',
                        'type' => 'color_rgba',
                        'output' => '',
                        'title' => __('Overall button hover bg', 'codeless-admin'),
                        'default'  => array(
                            'color' => '#ffffff', 
                            'alpha' => '0.00'
                        ),
                        'validate' => 'colorrgba'
                    ), 

                    array(
                        'id' => 'button_hover_border',
                        'type' => 'color_rgba',
                        'output' => '',
                        'title' => __('Overall button hover border', 'codeless-admin'),
                        'default'  => array(
                            'color' => '#444', 
                            'alpha' => '1.00'
                        ),
                        'validate' => 'colorrgba'
                    ),

                    array(
                        'id' => 'button_light_font_color',
                        'type' => 'color',
                        'output' => '',
                        'title' => __('Light button Font Color', 'codeless-admin'),
                        'default' => '#fff',
                        'validate' => 'color'
                    ),

                    array(
                        'id' => 'button_light_background',
                        'type' => 'color_rgba',
                        'output' => '',
                        'title' => __('Light button bg', 'codeless-admin'),
                        'default'  => array(
                            'color' => '#fff', 
                            'alpha' => '0.00'
                        ),
                        'validate' => 'colorrgba'
                    ), 

                    array(
                        'id' => 'button_light_border',
                        'type' => 'color_rgba',
                        'output' => '',
                        'title' => __('Light button border', 'codeless-admin'),
                        'default'  => array(
                            'color' => '#fff', 
                            'alpha' => '0.40'
                        ),
                        'validate' => 'colorrgba'
                    ),

                    array(
                        'id' => 'button_light_hover_font_color',
                        'type' => 'color',
                        'output' => '',
                        'title' => __('Light button hover Font Color', 'codeless-admin'),
                        'default' => '#fff',
                        'validate' => 'color'
                    ),

                    array(
                        'id' => 'button_light__hover_background',
                        'type' => 'color_rgba',
                        'output' => '',
                        'title' => __('Light button hover bg', 'codeless-admin'),
                        'default'  => array(
                            'color' => '#fff', 
                            'alpha' => '0.00'
                        ),
                        'validate' => 'colorrgba'
                    ), 

                    array(
                        'id' => 'button_light_hover_border',
                        'type' => 'color_rgba',
                        'output' => '',
                        'title' => __('Light button hover border', 'codeless-admin'),
                        'default'  => array(
                            'color' => '#fff', 
                            'alpha' => '1.00'
                        ),
                        'validate' => 'colorrgba'
                    ),
                ),
                'subsection' => true
            ) );     

            Redux::setSection( $opt_name, array(
                'icon' => 'el-icon-adjust-alt',
                'title' => __('Shop Styling', 'codeless-admin'),
                'fields' => array(
                    
                    array(
                        'id' => 'shop_single_title',
                        'type' => 'typography',
                        'title' => __('Shop Single Product Title', 'codeless-admin'),
                        'compiler'=>false, // Use if you want to hook in your own CSS compiler
                        'google' => false, // Disable google fonts. Won't work if you haven't defined your google api key
                        'font-backup' => false, // Select a backup non-google font in addition to a google font
                        'font-style'=>false, // Includes font-style and weight. Can use font-style or font-weight to declare
                        //'subsets'=>false, // Only appears if google is true and subsets not set to false
                        'font-size'=>false,
                        'font-family' => false,
                        'text-transform' => true,
                        'line-height'=>false,
                        //'word-spacing'=>true, // Defaults to false
                        'letter-spacing'=>true, // Defaults to false
                        'color'=>false,
                        //'preview'=>false, // Disable the previewer
                        'text-align' => false,
                        'font-weight' => true,
                        'all-styles' => true, // Enable all Google Font style/weight variations to be added to the page
                        'output' => array('.woocommerce #content div.product .product_title, .woocommerce div.product .product_title, .woocommerce-page #content div.product .product_title, .woocommerce-page div.product .product_title, .woocommerce ul.products li.product h6, .woocommerce-page ul.products li.product h6'), 
                        'units' => 'px',
                        'subtitle' => __('Select the appropiate font style for single product title', 'codeless-admin'),
                        'default' => array(
                            'font-weight' => '700',
                            'letter-spacing' => '1.5',
                            'text-transform' => 'uppercase'
                        ),
                    ),

                    array(
                        'id' => 'shop_product_overlay',
                        'type' => 'color_rgba',
                        'title' => __('Shop item overlay', 'codeless-admin'),
                        'mode' => 'background-color', 
                        'default'  => array(
                            'color' => '#10b8c7', 
                            'alpha' => '0.90'
                        ),
                        'validate' => 'colorrgba',
                    ),
                ),
                'subsection' => true
            ));
                   
            Redux::setSection( $opt_name, array(
                'icon' => 'el-icon-text-width',
                'title' => __('Typography Options', 'codeless-admin'),
                'fields' => array(
                    array(
                        'id' => 'body_typography',
                        'type' => 'typography',
                        'title' => __('Body Font Style', 'codeless-admin'),
                        'compiler'=>false, 
                        'google' => true, 
                        'font-backup' => true,
                        'font-style'=>true, 
                        'line-height'=>true,
                        'text-align' => false,
                        'font-weight' => true,
                        'all-styles' => true,
                        'output' => array('body'), 
                        'units' => 'px',
                        'subtitle' => __('Select the appropiate font style for the body text', 'codeless-admin'),
                        'default' => array(
                            'color' => "#777",
                            'font-family' => 'Open Sans',
                            'google' => true,
                            'line-height' => '20px',
                            'font-size' => '13px',
                            'font-weight' => '400' 
                        ),
                    ),

                    
                    array(
                        'id' => 'headings_font_type',
                        'type' => 'typography',
                        'title' => __('Headings font type', 'codeless-admin'),
                        'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
                        'font-backup' => false, // Select a backup non-google font in addition to a google font
                        'font-weight' => true,
                        'font-style' => true,
                        'subsets' => false,
                        'font-size' => false,
                        'line-height'=>false,
                        'color'=>false,
                        'font-family' => true,
                        'text-align' => false,
                        'all-styles' => true,
                        'compiler' => false,
                        'output' => array('h1,h2,h3,h4,h5,h6', '.skill_title'), 
                        'units' => 'px',
                        'subtitle' => __('Select the appropiate font style for the body text', 'codeless-admin'),
                        'default' => array(
                            'font-family' => 'Open Sans',
                            'google' => true,
                            'font-weight' => '600'
                        ),
                    ),


                    array(
                        'id' => 'heading_1_font',
                        'type' => 'typography',
                        'title' => __('Heading 1 Font style', 'codeless-admin'),
                        'google' => false, // Disable google fonts. Won't work if you haven't defined your google api key
                        'font-backup' => false, // Select a backup non-google font in addition to a google font
                        'font-weight' => false,
                        'font-style' => false,
                        'line-height'=>true,
                        'color'=>false,
                        'font-family' => false,
                        'preview'=>false,
                        'text-align' => false,
                        'output' => array('h1'), 
                        'units' => 'px',
                        'subtitle' => __('Select the appropiate font style for the h1 text', 'codeless-admin'),
                        'default' => array(
                            'line-height' => '24px',
                            'google' => true,
                            'font-size' => '20px'
                        ),
                    ),
                    array(
                        'id' => 'heading_2_font',
                        'type' => 'typography',
                        'title' => __('Heading 2 Font style', 'codeless-admin'),
                        //'compiler'=>true, // Use if you want to hook in your own CSS compiler
                        'google' => false, // Disable google fonts. Won't work if you haven't defined your google api key
                        'font-backup' => false, // Select a backup non-google font in addition to a google font
                        'font-weight' => false,
                        'font-style' => false,
                        'line-height'=>true,
                        'color'=>false,
                        'font-family' => false,
                        'text-align' => false,
                        'preview'=>false,
                        'output' => array('h2'), 
                        'units' => 'px',
                        'subtitle' => __('Select the appropiate font style for this heading', 'codeless-admin'),
                        'default' => array(
                            'line-height' => '30px',
                            'google' => true,
                            'font-size' => '24px'
                        ),
                    ),
                    array(
                        'id' => 'heading_3_font',
                        'type' => 'typography',
                        'title' => __('Heading 3 Font style', 'codeless-admin'),
                        //'compiler'=>true, // Use if you want to hook in your own CSS compiler
                        'google' => false, // Disable google fonts. Won't work if you haven't defined your google api key
                        'font-backup' => false, // Select a backup non-google font in addition to a google font
                        'font-weight' => false,
                        'line-height'=>true,
                        'font-style' => false,
                        'color'=>false,
                        'preview'=>false,
                        'font-family' => false,
                        'text-align' => false,
                        'output' => array('h3'), 
                        'units' => 'px',
                        'subtitle' => __('Select the appropiate font style for this heading', 'codeless-admin'),
                        'default' => array(
                            'line-height' => '26px',
                            'google' => true,
                            'font-size' => '18px'
                        ),
                    ),
                    array(
                        'id' => 'heading_4_font',
                        'type' => 'typography',
                        'title' => __('Heading 4 Font style', 'codeless-admin'),
                        //'compiler'=>true, // Use if you want to hook in your own CSS compiler
                        'google' => false, // Disable google fonts. Won't work if you haven't defined your google api key
                        'font-backup' => false, // Select a backup non-google font in addition to a google font
                        'font-weight' => false,
                        'line-height'=>true,
                        'font-style' => false,
                        'color'=>false,
                        'font-family' => false,
                        'preview'=>false,
                        'text-align' => false,
                        'output' => array('h4'), 
                        'units' => 'px',
                        'subtitle' => __('Select the appropiate font style for this heading', 'codeless-admin'),
                        'default' => array(
                            'line-height' => '24px',
                            'google' => true,
                            'font-size' => '16px'
                        ),
                    ),
                    array(
                        'id' => 'heading_5_font',
                        'type' => 'typography',
                        'title' => __('Heading 5 Font style', 'codeless-admin'),
                        //'compiler'=>true, // Use if you want to hook in your own CSS compiler
                        'google' => false, // Disable google fonts. Won't work if you haven't defined your google api key
                        'font-backup' => false, // Select a backup non-google font in addition to a google font
                        'font-weight' => false,
                        'line-height'=>true,
                        'font-style' => false,
                        'color'=>false,
                        'font-family' => false,
                        'preview'=>false,
                        'text-align' => false,
                        'output' => array('h5'), 
                        'units' => 'px',
                        'subtitle' => __('Select the appropiate font style for this heading', 'codeless-admin'),
                        'default' => array(
                            'line-height' => '22px',
                            'google' => true,
                            'font-size' => '15px'
                        ),
                    ),
                    array(
                        'id' => 'heading_6_font',
                        'type' => 'typography',
                        'title' => __('Heading 6 Font style', 'codeless-admin'),
                        //'compiler'=>true, // Use if you want to hook in your own CSS compiler
                        'google' => false, // Disable google fonts. Won't work if you haven't defined your google api key
                        'font-backup' => false, // Select a backup non-google font in addition to a google font
                        'font-weight' => false,
                        'line-height'=>true,
                        'font-style' => false,
                        'color'=>false,
                        'font-family' => false,
                        'text-align' => false,
                        'preview'=>false,
                        'output' => array('h6'), 
                        'units' => 'px',
                        'subtitle' => __('Select the appropiate font style for this heading', 'codeless-admin'),
                        'default' => array(
                            'line-height' => '20px',
                            'google' => true,
                            'font-size' => '14px'
                        ),
                    ),
                )
            ));

            Redux::setSection( $opt_name, array(
                'icon' => 'el-icon-adjust-alt',
                'title' => __('Footer Options', 'codeless-admin'),
                'fields' => array(
                    array(
                        'id'       => 'footer_columns',
                        'type'     => 'image_select',
                        'title'    => __('Footer Columns', 'codeless-admin'), 
                        'subtitle' => __('Select how many columns do you want for the footer. Choose between 1, 2, 3 or 4 column layout.', 'codeless-admin'),
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
                            )
                        ),
                        'default' => '2'
                    ),
                    
                    array(
                        'id' => 'copyright_text',
                        'type' => 'editor',
                        'title' => __('Copyright Text in the end of footer', 'codeless-admin'),
                        'subtitle' => __('Text have to be placed in the copyright bar', 'codeless-admin'),
                        'default' => '@2014 Specular - Multi-Purpose theme from <a href="http://codeless.co">Code-less</a>, builded with <a href="#">Wordpress</a>, <a href="#">Visual Composer</a> and <a href="#">Redux</a>',
                    ),

                    array(
                        'id' => 'show_footer',
                        'type' => 'switch',
                        'title' => __('Show Footer', 'codeless-admin'),
                        'subtitle' => __('', 'codeless-admin'),
                        "default" => 1,
                    ),

                    array(
                        'id' => 'show_copyright',
                        'type' => 'switch',
                        'title' => __('Show Copyright', 'codeless-admin'),
                        'subtitle' => __('', 'codeless-admin'),
                        "default" => 1,
                    ),

                )
            ));
            

            

            Redux::setSection( $opt_name, array(
                'icon' => 'el-icon-file-edit',
                'title' => __('Blog Config', 'codeless-admin'),
                'fields' => array(
                    array(
                        'id' => 'blog_style',
                        'type' => 'select',
                        'title' => __('Blog Style', 'codeless-admin'),
                        'subtitle' => __('Select the blog style to be used', 'codeless-admin'),
                        'options' => array('normal' => 'Normal', 'timeline' => 'Timeline', 'alternate' => 'Alternate', 'grid' => 'Masonry', 'fullscreen' => 'Fullscreen Innovative'), //Must provide key => value pairs for select options
                        'default' => 'normal'
                    ),

                    array(
                        'id' => 'blog_grid_col',
                        'title' => __( 'Blog Masonry Columns', 'codeless' ),
                        'desc' => 'Number of columns for the layout',
                        'type' => 'image_select',
                        'options'  => array(
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
                            ),
                        'default' => '3',
                        'required' => array('blog_style', 'equals', 'grid')
                    ),

                    array(
                        'title'     => __( 'Layout', 'codeless-admin' ),
                        'desc'      => __( 'Select main content and sidebar arrangement.', 'codeless-admin' ),
                        'id'        => 'bloglayout',
                        'default'   => 'fullwidth',
                        'type'      => 'image_select',
                        'customizer'=> array(),
                        'options'   => array( 
                            'fullwidth'     => ReduxFramework::$_url . 'assets/img/1c.png',
                            'sidebar_right' => ReduxFramework::$_url . 'assets/img/2cr.png',
                            'sidebar_left'  => ReduxFramework::$_url . 'assets/img/2cl.png'
                        )
                    ),

                    array(
                        'title'     => __( 'Single Post Layout', 'codeless-admin' ),
                        'desc'      => __( 'Select the default single post sidebar position', 'codeless-admin' ),
                        'id'        => 'singlebloglayout',
                        'default'   => 'sidebar_right',
                        'type'      => 'image_select',
                        'customizer'=> array(),
                        'options'   => array( 
                            'fullwidth'     => ReduxFramework::$_url . 'assets/img/1c.png',
                            'sidebar_right' => ReduxFramework::$_url . 'assets/img/2cr.png',
                            'sidebar_left'  => ReduxFramework::$_url . 'assets/img/2cl.png'
                        )
                    ),
                    array(
                        'id' => 'post_like',
                        'type' => 'switch',
                        'title' => __('Active Post Like', 'codeless-admin'),
                        'subtitle' => __('', 'codeless-admin'),
                        "default" => 1,
                    ),

                    array(
                        'id' => 'social_shares',
                        'type' => 'switch',
                        'title' => __('Social Shares on Posts', 'codeless-admin'),
                        'subtitle' => __('', 'codeless-admin'),
                        "default" => 0,
                    ),

                    array(
                        'id' => 'blog_pagination',
                        'type' => 'select',
                        'title' => __('Select the pagination method', 'codeless-admin'),
                        'options' => array('no_pagination' => 'Without pagination', 'with_pagination' => 'With Pagination', 'infinite_scroll' => 'Infinite Scroll'),
                        'default' => 'with_pagination'
                    ),

                    array(
                        'id' => 'blog_info_author',
                        'type' => 'switch',
                        'title' => __('Show author at blog post', 'codeless-admin'),
                        'subtitle' => __('', 'codeless-admin'),
                        "default" => 1,
                    ),
                    array(
                        'id' => 'blog_info_date',
                        'type' => 'switch',
                        'title' => __('Show date at blog post', 'codeless-admin'),
                        'subtitle' => __('', 'codeless-admin'),
                        "default" => 1,
                    ),
                    array(
                        'id' => 'blog_info_comments',
                        'type' => 'switch',
                        'title' => __('Show comments count at blog post', 'codeless-admin'),
                        'subtitle' => __('', 'codeless-admin'),
                        "default" => 1,
                    ),
                    array(
                        'id' => 'blog_info_tags',
                        'type' => 'switch',
                        'title' => __('Show tags at blog post', 'codeless-admin'),
                        'subtitle' => __('', 'codeless-admin'),
                        "default" => 1,
                    ),

                )
            ));

            
            Redux::setSection( $opt_name, array(
                'icon' => 'el-icon-view-mode',
                'title' => __('Portfolio Config', 'codeless-admin'),
                'fields' => array(
                    array(
                        'id' => 'portfolio_slug',
                        'type' => 'text',
                        'title' => __('Portfolio Slug', 'codeless-admin'),
                        'default' => 'codeless_portfolio'
                    ),
                    array(
                        'id'=>'single_portfolio_custom_params',
                        'type' => 'multi_text',
                        'title' => __('Custom fields Parameters', 'codeless-admin'),
                        'subtitle' => __('Create unlimited custom fields. Add values in respetive single portfolio', 'codeless-admin') 
                    ),
                    array(
                        'id' => 'portfolio_post_like',
                        'type' => 'switch',
                        'title' => __('Active Portfolio Item Like', 'codeless-admin'),
                        'subtitle' => __('', 'codeless-admin'),
                        "default" => 0,
                    ),
                )
            ));


            Redux::setSection( $opt_name, array(
                'icon' => 'el-icon-fullscreen',
                'title' => __('Layout', 'codeless-admin'),
                'fields' => array(
                    array(
                        'id' => 'site_layout',
                        'type' => 'select',
                        'title' => __('Overall site layout', 'codeless-admin'),
                        'subtitle' => __('Select overall ste pages layout', 'codeless-admin'),
                        'options' => array('fullwidth' => 'Fullwidth', 'boxed' => 'Boxed'), //Must provide key => value pairs for select options
                        'default' => 'fullwidth'
                    ),

                    array(
                        'title'     => __( 'Pages Default Layout', 'codeless-admin' ),
                        'desc'      => __( 'Select default layout for pages. You can overwrite it in Page Options', 'codeless-admin' ),
                        'id'        => 'page_overall_layout',
                        'default'   => 'fullwidth',
                        'type'      => 'image_select',
                        'customizer'=> array(),
                        'options'   => array( 
                            'fullwidth'     => ReduxFramework::$_url . 'assets/img/1c.png',
                            'sidebar_right' => ReduxFramework::$_url . 'assets/img/2cr.png',
                            'sidebar_left'  => ReduxFramework::$_url . 'assets/img/2cl.png'
                        )
                    ),
                    

                    array(
                        'id' => 'page_container_width',
                        'type' => 'dimensions', 
                        'units' => 'px', // You can specify a unit value. Possible: px, em, %
                                //'units_extended' => 'true', // Allow users to select any type of unit
                        'width' => true,
                        'height' => false,
                        'title' => __('Page Container Width', 'codeless-admin'),
                        'subtitle' => __('units: px', 'codeless-admin'),
                        'desc' => __('', 'codeless-admin'),
                        'default' => array('width' => '1100px')
                    ),

                    array(
                        'id' => 'page_container_width_percent',
                        'type' => 'dimensions',
                        'units' => '%', // You can specify a unit value. Possible: px, em, %
                                //'units_extended' => 'true', // Allow users to select any type of unit
                        'width' => true,
                        'height' => false,
                        'title' => __('Page Container Width with percentage', 'codeless-admin'),
                        'subtitle' => __('units: px', 'codeless-admin'),
                        'desc' => __('If you set the width in percentage, the page container width in pixel should be used as max-width', 'codeless-admin'),
                        'default' => array('width' => '87%')
                    ),

                    array(
                        'id' => 'boxed_container_width',
                        'type' => 'dimensions', 
                        'units' => 'px', // You can specify a unit value. Possible: px, em, %
                                //'units_extended' => 'true', // Allow users to select any type of unit
                        'width' => true,
                        'height' => false,
                        'title' => __('Boxed Container Width', 'codeless-admin'),
                        'subtitle' => __('units: px', 'codeless-admin'),
                        'desc' => __('', 'codeless-admin'),
                        'required' => array('site_layout', 'equals', 'boxed'),
                        'default' => array('width' => '1100px'),

                    ),

                    array(
                        'id' => 'boxed_container_width_percent',
                        'type' => 'dimensions',
                        'units' => '%', // You can specify a unit value. Possible: px, em, %
                                //'units_extended' => 'true', // Allow users to select any type of unit
                        'width' => true,
                        'height' => false,
                        'title' => __('Boxed Container Width with percentage', 'codeless-admin'),
                        'subtitle' => __('units: px', 'codeless-admin'),   
                        'required' => array('site_layout', 'equals', 'boxed'),
                        'desc' => __('If you set the width in percentage, the boxed container width in pixel should be used as max-width', 'codeless-admin'),
                        'default' => array('width' => '87%')
                    ),

                    array(
                        'title'=> __( 'Boxed Container Margin', 'codeless-admin' ),
                        'desc' => __( 'Boxed Container Top/Bottom Margin', 'codeless-admin' ),
                        'id'   => 'boxed_container_margin',
                        'type' => 'spacing',
                        'mode' => 'margin', // absolute, padding, margin, defaults to padding
                        'right' => false, // Disable the right
                        'left' => false, // Disable the left
                        //'all' => true, // Have one field that applies to all
                        'units' => 'px', // You can specify a unit value. Possible: px, em, %
                        //'units_extended' => 'true', // Allow users to select any type of unit
                        //'display_units' => 'false', // Set to false to hide the units if the units are specified
                        'default' => array('margin-bottom' => '30px', 'margin-top' => '30px'),
                        'required' => array('site_layout', 'equals', 'boxed')
                    ),

                    array(
                        'id' => 'boxed_shadow',
                        'type' => 'switch',
                        'title' => __('Boxed Container Shadow', 'codeless-admin'),
                        'subtitle' => __('', 'codeless-admin'),
                        'required' => array('site_layout', 'equals', 'boxed'),
                        "default" => 1,
                    ),

                    array(
                        'id'       => 'boxed_border',
                        'type'     => 'border',
                        'title'    => __('Boxed Container Border', 'codeless-admin'),
                        'subtitle' => __('', 'codeless-admin'),
                        'output'   => array('.boxed_layout'),
                        'all'      => true,
                        'color'    => true,
                        'style'    => true, 
                        'required' => array('site_layout', 'equals', 'boxed'),
                        'desc'     => __('Add Border for boxed container', 'codeless-admin'),
                        'default'  => array(
                            'color'  => '#e7e7e7', 
                            'border-style'  => 'solid',
                            'border'    => '0px'
                        )
                    ),

                    array(
                        'id' => 'extra_navigation',
                        'type' => 'switch',
                        'title' => __('Extra Side Navigation', 'codeless-admin'),
                        'subtitle' => __('', 'codeless-admin'),
                        "default" => 1,
                    ),

                    array(
                        'title'     => __( 'Extra Navigation Position', 'codeless-admin' ),
                        'desc'      => __( 'Select the default single post sidebar position', 'codeless-admin' ),
                        'id'        => 'extra_navigation_position',
                        'default'   => 'right',
                        'type'      => 'image_select',
                        'customizer'=> array(), 
                        'options'   => array( 
                            'left'     => ReduxFramework::$_url . 'assets/img/2cl.png',
                            'right' => ReduxFramework::$_url . 'assets/img/2cr.png'
                        ),
                        'required' => array('extra_navigation', 'equals', 1),
                    ),

                    array(
                        'title'=> __( 'Page Builder Row Margin Bottom', 'codeless-admin' ),
                        'desc' => __( 'Margin bottom for the ROW in Page builder', 'codeless-admin' ),
                        'id'   => 'row_margin_bottom',
                        'type' => 'spacing',
                        'output' => array('.vc_row.section-style, .vc_row.standard_section'),
                        'mode' => 'margin', // absolute, padding, margin, defaults to padding
                        'top' => false, // Disable the top
                        'right' => false, // Disable the right
                        'bottom' => true, // Disable the bottom
                        'left' => false, // Disable the left
                        //'all' => true, // Have one field that applies to all
                        'units' => 'px', // You can specify a unit value. Possible: px, em, %
                        //'units_extended' => 'true', // Allow users to select any type of unit
                        //'display_units' => 'false', // Set to false to hide the units if the units are specified
                        'default' => array('margin-bottom' => '85px')
                    ),

                    array(
                        'title'=> __( 'Inner Page Content Padding', 'codeless-admin' ),
                        'desc' => __( 'Change padding of the inner page content', 'codeless-admin' ),
                        'id'   => 'content_padding',
                        'type' => 'spacing',
                        'output' => array('#content'), 
                        'mode' => 'padding', // absolute, padding, margin, defaults to padding
                        'top' => true, // Disable the top
                        'right' => false, // Disable the right
                        'bottom' => true, // Disable the bottom
                        'left' => false, // Disable the left
                        //'all' => true, // Have one field that applies to all
                        'units' => 'px', // You can specify a unit value. Possible: px, em, %
                        //'units_extended' => 'true', // Allow users to select any type of unit
                        //'display_units' => 'false', // Set to false to hide the units if the units are specified
                        'default' => array('padding-bottom' => '85px','padding-top' => '85px')
                    )
                    
                )
            ));


            Redux::setSection( $opt_name, array(
                'icon' => 'el-icon-heart',
                'title' => __('Clients', 'codeless-admin'),
                'fields' => array(
                    array(
                        'id'       => 'clients_dark',
                        'type'     => 'slides',
                        'title'    => __('Add/Edit Clients Dark Version', 'codeless-admin'),
                        'subtitle' => __('Upload clients logo here', 'codeless-admin')
                    ),

                    array(
                        'id'       => 'clients_light',
                        'type'     => 'slides',
                        'title'    => __('Add/Edit Clients Light Version', 'codeless-admin'),
                        'subtitle' => __('Upload clients logo here', 'codeless-admin')
                    ),

                )
            ));


            Redux::setSection( $opt_name, array(
                'icon' => 'el-icon-twitter',
                'title' => __('Social Media', 'codeless-admin'),
                'fields' => array(
                    array(
                        'id'       => 'facebook',
                        'type'     => 'text',
                        'title'    => __('Facebook Link', 'codeless-admin')
                    ),
                    array(
                        'id'       => 'twitter',
                        'type'     => 'text',
                        'title'    => __('Twitter Link', 'codeless-admin')
                    ),
                    array(
                        'id'       => 'flickr',
                        'type'     => 'text',
                        'title'    => __('Flickr Link', 'codeless-admin')
                    ),
                    array(
                        'id'       => 'foursquare',
                        'type'     => 'text',
                        'title'    => __('Foursquare Link', 'codeless-admin')
                    ),
                    array(
                        'id'       => 'google',
                        'type'     => 'text',
                        'title'    => __('Google Plus Link', 'codeless-admin')
                    ),
                    array(
                        'id'       => 'dribbble',
                        'type'     => 'text',
                        'title'    => __('Dribbble Link', 'codeless-admin')
                    ),
                    array(
                        'id'       => 'linkedin',
                        'type'     => 'text',
                        'title'    => __('Linkedin Link', 'codeless-admin')
                    ),

                    array(
                        'id'       => 'youtube',
                        'type'     => 'text',
                        'title'    => __('Youtube Link', 'codeless-admin')
                    ),

                    array(
                        'id'       => 'instagram',
                        'type'     => 'text',
                        'title'    => __('Instagram Link', 'codeless-admin')
                    ),
                    array(
                        'id'       => 'vimeo',
                        'type'     => 'text',
                        'title'    => __('Vimeo Link', 'codeless-admin')
                    ),

                    array(
                        'id'       => 'email',
                        'type'     => 'text',
                        'title'    => __('Email Link', 'codeless-admin')
                    ),
                )
            ));

            Redux::setSection( $opt_name, array( 
                'icon' => 'el-icon-indent-right',
                'title' => __('Custom Sidebars', 'codeless-admin'),
                'fields' => array(
                    array(
                        'id'       => 'pages_sidebar',
                        'type'     => 'select',
                        'multi'    => true,
                        'data'     => 'pages',
                        'title'    => __('Pages custom sidebars', 'codeless-admin'),
                        'subtitle' => __('Select all pages that you want a custom sidebar (widgetized area)', 'codeless-admin')
                    ),

                    array(
                        'id'       => 'categories_sidebar',
                        'type'     => 'select',
                        'multi'    => true,
                        'data'     => 'categories',
                        'title'    => __('Categories custom sidebars', 'codeless-admin'),
                        'subtitle' => __('Select all categories that you want a custom sidebar (widgetized area)', 'codeless-admin')
                    ),

                )
            ));

            Redux::setSection( $opt_name, array( 
                'icon' => 'el-icon-magic',
                'title' => __('Import / Export (Dummy Data)', 'codeless-admin'),
                'fields' => array(
                    array(
                        'id'       => 'codeless_import_export',
                        'type'     => 'codeless_import', 
                        'data'     => array(
                            array('name' => 'Default', 'image' => CODELESS_BASE_URL . 'includes/dummy_data/img/default.jpg', 'folder' => 'default', 'parts' => '2'),
                            array('name' => 'Agency', 'image' => CODELESS_BASE_URL . 'includes/dummy_data/img/agency.jpg', 'folder' => 'agency', 'parts' => '1'),
                            array('name' => 'Agency 2', 'image' => CODELESS_BASE_URL . 'includes/dummy_data/img/agency2.jpg', 'folder' => 'agency2', 'parts' => '1'),
                            array('name' => 'Business', 'image' => CODELESS_BASE_URL . 'includes/dummy_data/img/business.jpg', 'folder' => 'business', 'parts' => '1'),
                            array('name' => 'Business 2', 'image' => CODELESS_BASE_URL . 'includes/dummy_data/img/business2.jpg', 'folder' => 'business2', 'parts' => '1'),
                            array('name' => 'Business 3', 'image' => CODELESS_BASE_URL . 'includes/dummy_data/img/business3.jpg', 'folder' => 'business3', 'parts' => '1'),
                            array('name' => 'Business 4', 'image' => CODELESS_BASE_URL . 'includes/dummy_data/img/business4.jpg', 'folder' => 'business4', 'parts' => '1'),
                            array('name' => 'Business 5', 'image' => CODELESS_BASE_URL . 'includes/dummy_data/img/business5.jpg', 'folder' => 'business5', 'parts' => '1'),
                            array('name' => 'Creative', 'image' => CODELESS_BASE_URL . 'includes/dummy_data/img/creative.jpg', 'folder' => 'creative', 'parts' => '1'),
                            array('name' => 'Church', 'image' => CODELESS_BASE_URL . 'includes/dummy_data/img/church.jpg', 'folder' => 'church', 'parts' => '1'),
                            array('name' => 'Estate', 'image' => CODELESS_BASE_URL . 'includes/dummy_data/img/estate.jpg', 'folder' => 'estate', 'parts' => '1'),
                            array('name' => 'Magazine', 'image' => CODELESS_BASE_URL . 'includes/dummy_data/img/magazine.jpg', 'folder' => 'magazine', 'parts' => '1'),
                            array('name' => 'Marketing', 'image' => CODELESS_BASE_URL . 'includes/dummy_data/img/marketing.jpg', 'folder' => 'marketing', 'parts' => '1'),
                            array('name' => 'Medicine', 'image' => CODELESS_BASE_URL . 'includes/dummy_data/img/medicine.jpg', 'folder' => 'medicine', 'parts' => '1'),
                            array('name' => 'Minimal', 'image' => CODELESS_BASE_URL . 'includes/dummy_data/img/minimal.jpg', 'folder' => 'minimal', 'parts' => '1'),
                            array('name' => 'Minimal 2', 'image' => CODELESS_BASE_URL . 'includes/dummy_data/img/minimal2.jpg', 'folder' => 'minimal2', 'parts' => '1'),
                            array('name' => 'Micro', 'image' => CODELESS_BASE_URL . 'includes/dummy_data/img/micro.jpg', 'folder' => 'micro', 'parts' => '1'),
                            array('name' => 'One Page', 'image' => CODELESS_BASE_URL . 'includes/dummy_data/img/onepage.jpg', 'folder' => 'onepage', 'parts' => '1'),
                            array('name' => 'Parallax', 'image' => CODELESS_BASE_URL . 'includes/dummy_data/img/parallax.jpg', 'folder' => 'parallax', 'parts' => '1'),
                            array('name' => 'Personal', 'image' => CODELESS_BASE_URL . 'includes/dummy_data/img/personal.jpg', 'folder' => 'personal', 'parts' => '1'),
                            array('name' => 'Photography', 'image' => CODELESS_BASE_URL . 'includes/dummy_data/img/photography.jpg', 'folder' => 'photography', 'parts' => '1'),
                            array('name' => 'Portfolio', 'image' => CODELESS_BASE_URL . 'includes/dummy_data/img/portfolio.jpg', 'folder' => 'portfolio', 'parts' => '1'),
                            array('name' => 'Portfolio 2', 'image' => CODELESS_BASE_URL . 'includes/dummy_data/img/portfolio2.jpg', 'folder' => 'portfolio_2', 'parts' => '1'),
                            array('name' => 'Portfolio 3', 'image' => CODELESS_BASE_URL . 'includes/dummy_data/img/portfolio3.jpg', 'folder' => 'portfolio_3', 'parts' => '1'),
                            array('name' => 'Restaurant', 'image' => CODELESS_BASE_URL . 'includes/dummy_data/img/restaurant.jpg', 'folder' => 'restaurant', 'parts' => '1'),
                            array('name' => 'Shop', 'image' => CODELESS_BASE_URL . 'includes/dummy_data/img/shop.jpg', 'folder' => 'shop', 'parts' => '1'),
                            array('name' => 'Sliding', 'image' => CODELESS_BASE_URL . 'includes/dummy_data/img/sliding.jpg', 'folder' => 'sliding', 'parts' => '1'),
                            array('name' => 'Gallery', 'image' => CODELESS_BASE_URL . 'includes/dummy_data/img/gallery.jpg', 'folder' => 'gallery', 'parts' => '1'),
                            array('name' => 'Fullscreen', 'image' => CODELESS_BASE_URL . 'includes/dummy_data/img/fullscreen.jpg', 'folder' => 'fullscreen', 'parts' => '1')

                            
                        ),
                        'title'    => __('Codeless Import', 'codeless-admin'),
                        'subtitle' => __('', 'codeless-admin'),
                        'default' => 'default'
                    )
                )
            ));


            if (file_exists(trailingslashit(dirname(__FILE__)) . 'README.html')) {
                $tabs['docs'] = array(
                    'icon' => 'el-icon-book',
                    'title' => __('Documentation', 'codeless-admin'),
                    'content' => nl2br(file_get_contents(trailingslashit(dirname(__FILE__)) . 'README.html'))
                );
            }
       

       add_action( 'redux/loaded', 'remove_demo' );

            if ( ! function_exists( 'remove_demo' ) ) {
                function remove_demo() {
                    // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
                    if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                        remove_filter( 'plugin_row_meta', array(
                            ReduxFrameworkPlugin::instance(),
                            'plugin_metalinks'
                        ), null, 2 );

                        // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                        remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
                    }
                }
            }

