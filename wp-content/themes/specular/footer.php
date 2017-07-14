<?php

global  $cl_redata;
wp_reset_query();

?>

    <a href="#" class="scrollup">Scroll</a> 

<?php // TOP wapper closed ?> 
<?php if((int) codeless_get_post_id() && !redux_post_meta('cl_redata',(int) codeless_get_post_id(), 'fullscreen_post_style')): ?>
</div>
<?php endif;?>
<!-- Footer -->

    <div class="footer_wrapper">
        
        <footer id="footer" class="">
            
            <?php if($cl_redata['show_footer']): ?>
        	<div class="inner">
    	    	<div class="container">
    	        	<div class="row-fluid ff">
                    	<!-- widget -->
    		        	<?php
                        
                        $columns = esc_attr($cl_redata['footer_columns']);
                        for($i = 1; $i <= $columns; $i++): ?>
                            <div class="span<?php echo 12/$columns ?>">
                            
                                <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer - column'.$i) ) : else : echo "<div class='widget'>Add Widget Column $i</div>"; endif; ?>
                                
                            </div>
                        <?php endfor; ?>
    	            </div>
    	        </div>
            </div>
            <?php endif; ?>

            <?php if($cl_redata['show_copyright']): ?>
            <div id="copyright">
    	    	<div class="container">
    	        	<div class="row-fluid">
    		        	<div class="span12 desc"><div class="copyright_text"><?php echo $cl_redata['copyright_text']; ?></div>
                            <div class="pull-right">
                               <?php dynamic_sidebar('Copyright Footer Sidebar') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- #copyright -->
            <?php endif; ?>
        </footer>
    </div>
    <!-- #footer -->

<?php if($cl_redata['site_layout'] == 'boxed'): ?> 
</div>
<?php endif; ?>
</div>
<?php wp_footer(); ?>

</body>
</html>