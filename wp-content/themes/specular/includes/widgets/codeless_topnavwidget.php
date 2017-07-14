<?php

class CodelessTopNavWidget extends WP_Widget{



    function CodelessTopNavWidget(){

        $options = array('classname' => 'widget_topnav', 'description' => 'A widget that can be used only for the top navigation widgetized area' );

		parent::__construct( 'widget_topnav', THEMENAME.' Widget Top Navigation', $options );

    }



    function widget($atts, $instance){

        extract($atts, EXTR_SKIP);

		echo $before_widget;

        

      

        $serialize_ = empty($instance['serialize_']) ? '' :  $instance['serialize_'];

        


        

        $selected = unserialize($serialize_);
        
        $output = '';
        if(in_array("mail", $selected)){
	    
	        echo '<div class="mail small_widget">';
	        	echo '<a href="#" data-box="mail"><i class="moon-envelope-alt"></i>'.__('Mailing List', 'codeless').'</a>';
	        	echo '<div class="top_nav_sub mail">';
	        	mailchimpSF_signup_form();
	        	echo '</div>';
	    	echo'</div>';


	    }

	    if(in_array("search", $selected)){
	    
	        echo '<div class="search small_widget">';
	        	echo '<a href="#" class="getdata" data-box="search"><i class="moon-search-3"></i>'.__('Search', 'codeless').'</a>';
	        	echo '<div class="top_nav_sub search">';
	        	get_search_form();
	        	echo '</div>';
	    	echo '</div>';



	    }

	    if(in_array("login", $selected)){
	    
	        echo '<div class="login small_widget">';
	        	echo '<a href="#" data-box="login"><i class="moon-user"></i>'.__('Login', 'codeless').'</a>';
	        	echo '<div class="top_nav_sub login">';
	        	if (!is_user_logged_in()){

		?>
               <div class="sub-loggin"> 
                 <form action="<?php echo home_url(); ?>/wp-login.php" method="post">
		  	<input type="text" name="log" id="log" value="<?php echo esc_html(stripslashes($user_login)) ?>" size="20" placeholder="<?php _e('Username', 'codeless') ?>" />
			<input type="password" name="pwd" id="pwd" size="20" placeholder="<?php _e('Password', 'codeless') ?>"/>
			<input type="submit" name="submit" value="Send" class="button" />
    		<p>
    		 <div class="check-login">	
       			<label for="rememberme"><input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" /> Remember me</label>
       		</div>
       			<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
    		</p>
		  </form>
		  <a href="<?php echo esc_url(home_url()); ?>/wp-login.php?action=lostpassword">Recover password</a> </div><?php
			} else { ?>
			<div class="aaaa">
			<a href="<?php echo esc_url(wp_logout_url()); ?>"> Logout </a>
			<a href="<?php echo esc_url(home_url()); ?>/wp-admin/"> Administration  </a>
                     </div>
                     <?php
			 }
	        	echo '</div>';
	    	echo '</div>';



	   

	    
			 
			 }
		if(in_array("multilanguage", $selected)){
	    
	        echo '<div class="multilanguage small_widget">';
	        	echo '<a href="#" data-box="multilanguage"><i class="moon-flag"></i>'.__('Select Language', 'codeless').'</a>';
	        	echo '<div class="top_nav_sub multilanguage aaaa">';
	        	echo qtrans_generateLanguageSelectCode('image');
	        	echo '</div>';
	    	echo '</div>';



	    }	




	    







        ?>


        <?php

        

        echo $after_widget;

    }

    



    function update($new_instance, $old_instance){

        $instance = array();

       

        $instance['serialize_'] = serialize($new_instance['serialize_']);


        return $instance;

    }



    function form($instance){

        $instance = wp_parse_args( (array) $instance, array(  'serialize_' => '') );

        

        $serialize_ = isset($instance['serialize_']) ? $instance['serialize_']: "";
        $serialize_ = unserialize($serialize_);
        $all = array("mail", 'search', 'login', 'multilanguage');
       

        ?>


        

        <p>

    		<label for="<?php echo $this->get_field_id('serialize_'); ?>">Select the features you want to activate: 

    		<select  id="<?php echo $this->get_field_id('serialize_'); ?>" name="<?php echo $this->get_field_name('serialize_'); ?>[]" multiple="multiple">

				<?php 

				$elements = "";

				foreach($all as $e)

				{

					$selected = "";

					if(is_array($serialize_) && in_array($e, $serialize_)) $selected = 'selected="selected"';

				

					$elements .= "<option $selected value='$e'>$e</option>";

				}

				$elements .= "</select>";

				echo $elements;

				?>


        </p>

        <?php

    }

}
?>