<?php

if(function_exists('register_sidebar')){
    
    function codeless_register_sidebars_init(){
        global $cl_redata;
        
        register_sidebar(array(
            'id'=>'sidebar-1',
            'name' => __('Sidebar Blog', 'codeless'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">', 
            'after_widget' => '</div>', 
            'before_title' => '<h5 class="widget-title">', 
            'after_title' => '</h5>'
        ));
      
        register_sidebar(array(
                'id'=>'sidebar-2',
                'name' => __('Sidebar Pages', 'codeless'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">', 
                'after_widget' => '</div>', 
                'before_title' => '<h5 class="widget-title">', 
                'after_title' => '</h5>'
        ));
        register_sidebar(array(
                'id'=>'sidebar-3',
                'name' => __('Sidebar Portfolio', 'codeless'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">', 
                'after_widget' => '</div>', 
                'before_title' => '<h5 class="widget-title">', 
                'after_title' => '</h5>'
        ));

        register_sidebar(array( 
                'id'=>'sidebar-4',
                'name' => __('Top Header Left', 'codeless'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">', 
                'after_widget' => '</div>', 
                'before_title' => '', 
                'after_title' => ''
        ));

        register_sidebar(array(
                'id'=>'sidebar-5',
                'name' => __('Top Header Right', 'codeless'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">', 
                'after_widget' => '</div>', 
                'before_title' => '', 
                'after_title' => ''
        ));

        if(isset($cl_redata['footer_columns'])):
            $footer_columns = $cl_redata['footer_columns'];
            
         for ($i = 1; $i <= $footer_columns; $i++)
            {
                register_sidebar(array(
                    'name' => 'Footer - column'.$i,
                    'id' => 'footer-column-'.$i,
                    'before_widget' => '<div id="%1$s" class="widget %2$s">', 
                    'after_widget' => '</div>', 
                    'before_title' => '<h5 class="widget-title">', 
                    'after_title' => '</h5>', 
                ));
            }
        endif;

        register_sidebar(array(
                'id'=>'sidebar-7',
                'name' => __('Copyright Footer Sidebar', 'codeless'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">', 
                'after_widget' => '</div>', 
                'before_title' => '', 
                'after_title' => ''
        ));
        
            

        if(isset($cl_redata['pages_sidebar'])):    
            $id_array = $cl_redata['pages_sidebar'];
                if(isset($id_array[0]))
                {
                    foreach ($id_array as $page_id)
                    {   
                        
                        if($page_id != "")
                        register_sidebar(array(
                            'id' => 'page-'.get_the_title($page_id),
                            'name' => __('Page','codeless').': '.get_the_title($page_id).'',
                            'before_widget' => '<div id="%1$s" class="widget %2$s">', 
                            'after_widget' => '</div>', 
                            'before_title' => '<h6 class="widget-title">', 
                    'after_title' => '</h6>'
                        ));
                    
                    
                    }
                }
        endif;
                
            
            
        if(isset($cl_redata['categories_sidebar'])):       
            $id_array = $cl_redata['categories_sidebar'];
        
            if(isset($id_array[0]))
            {
                foreach ($id_array as $cat_id)
                {   
                    
                    if($cat_id != "")
                    register_sidebar(array(
                        'id' => 'category-'.get_the_category_by_ID($cat_id),
                        'name' => __('Category','codeless').': '.get_the_category_by_ID($cat_id).'',
                        'before_widget' => '<div id="%1$s" class="widget %2$s">', 
                        'after_widget' => '</div>', 
                        'before_title' => '<h6 class="widget-title">', 
                        'after_title' => '</h6>'        )); 
                
                
              }
           }
        endif;




        if(isset($cl_redata['extra_navigation']) && $cl_redata['extra_navigation']){
            register_sidebar(array(
                'id'=>'sidebar-10',
                'name' => __('Extra Side Navigation', 'codeless'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">', 
                'after_widget' => '</div>', 
                'before_title' => '<h5 class="widget-title">', 
                'after_title' => '</h5>'
            ));
        }

        if(class_exists('Woocommerce')){
            register_sidebar(array(
                'id'=>'sidebar-11',
                'name' => __('Sidebar Woocommerce', 'codeless'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">', 
                'after_widget' => '</div>', 
                'before_title' => '<h5 class="widget-title">',   
                'after_title' => '</h5>'
            ));
        }

        if(isset($cl_redata['header_style']) && ($cl_redata['header_style'] == 'header_6' || $cl_redata['header_style'] == 'header_7' || $cl_redata['header_style'] == 'header_12') ){
            register_sidebar(array(
                'id'=>'sidebar-12',
                'name' => __('Header Widgetized Area', 'codeless'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">', 
                'after_widget' => '</div>', 
                'before_title' => '<h5 class="widget-title">',   
                'after_title' => '</h5>'
            ));
        }

        if(isset($cl_redata['header_style']) && ($cl_redata['header_style'] == 'header_12') ){
            register_sidebar(array(
                'id'=>'sidebar-13',
                'name' => __('After Navigation Area', 'codeless'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">', 
                'after_widget' => '</div>', 
                'before_title' => '<h5 class="widget-title">',   
                'after_title' => '</h5>'
            ));
        }

    }
	add_action( 'widgets_init', 'codeless_register_sidebars_init' );
		
}

?>