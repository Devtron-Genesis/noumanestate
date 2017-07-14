<?php

global $cl_redata;

global $cl_current_view;

$sidebar_style = "";



if($cl_redata['layout'] != 'fullwidth' || $cl_redata['bloglayout'] != 'fullwidth' || $cl_redata['singlebloglayout'] != 'fullwidth'):  ?>

    

    <aside class="span3 sidebar" id="widgetarea-sidebar">

        <?php
        if( ( $cl_redata['overwrite_layout'] && $cl_redata['layout'] != 'dual' ) || !$cl_redata['overwrite_layout'] ){
            if ($cl_current_view == 'blog' || $cl_current_view == 'single_blog')
                dynamic_sidebar(__('Sidebar Blog', 'codeless'));
            
            if ($cl_current_view == 'portfolio')
                dynamic_sidebar(__('Sidebar Portfolio', 'codeless'));

            if ($cl_current_view == 'page' && dynamic_sidebar(__('Sidebar Pages','codeless'))) : $use_defailt = false; endif;

            if ($cl_current_view == 'woocommerce' && dynamic_sidebar(__('Sidebar Woocommerce','codeless'))) : $use_defailt = false; endif;

            $page_title = codeless_check_custom_sidebar('page');

            if (function_exists('dynamic_sidebar') &&  dynamic_sidebar(__('Page','codeless').': '.$page_title) ) : $use_defailt = false; endif;

            $cat_title = codeless_check_custom_sidebar('cat');

            if (function_exists('dynamic_sidebar') && dynamic_sidebar(__('Category','codeless').': '.$cat_title) ) : $use_defailt = false; endif;
        }else if($cl_redata['overwrite_layout'] && $cl_redata['layout'] == 'dual'){
                dynamic_sidebar($cl_redata['left_sidebar_dual']);
        }
        


        ?>

    </aside>



<?php endif; ?>

