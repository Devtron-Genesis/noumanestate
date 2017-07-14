<?php

global $cl_redata;

global $cl_current_view;

$sidebar_style = "";



if($cl_redata['layout'] != 'fullwidth' || $cl_redata['bloglayout'] != 'fullwidth' || $cl_redata['singlebloglayout'] != 'fullwidth'):  ?>

    

    <aside class="span3 sidebar" id="widgetarea-sidebar">

        <?php dynamic_sidebar($cl_redata['right_sidebar_dual']); ?>

    </aside>



<?php endif; ?>