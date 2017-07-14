<?php
global $cl_redata;
get_header();


get_template_part('includes/view/page_header'); ?>
 
<section id="content">
	 <div class="row-fluid row-dynamic-el" style=" margin-bottom:100px;">
      <div class="container">
        <div class="row-fluid">
          
            <div class="span12 not_found">
                <h2>404</h2>
                <p><?php echo esc_html($cl_redata['404_error_message']) ?></p>
                <div class="search_field">
                    <?php get_search_form(); ?>
                </div>
            </div>
        </div>
                             
      </div>
    </div>
</section>
	
<?php get_footer(); ?>