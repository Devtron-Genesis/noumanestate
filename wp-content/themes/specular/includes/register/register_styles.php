<?php

global $cl_redata;


$styles = $cl_redata;


extract($styles);

?>

<style type="text/css">
  	 p a{color: <?php echo ((!empty($link_color))?$link_color:$primary_color) ?> !important;}
  	 p a:hover{color: <?php echo $primary_color ?>}
	 aside ul li{border-bottom:1px solid <?php echo $base_border_color ?>;}
	 aside .tagcloud a:hover, .nav-growpop .icon-wrap, .woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce-page .widget_price_filter .ui-slider .ui-slider-range, .woocommerce #content .quantity .minus:hover, .woocommerce #content .quantity .plus:hover, .woocommerce .quantity .minus:hover, .woocommerce .quantity .plus:hover, .woocommerce-page #content .quantity .minus:hover, .woocommerce-page #content .quantity .plus:hover, .woocommerce-page .quantity .minus:hover, .woocommerce-page .quantity .plus:hover{background:<?php echo $primary_color ?>;} 
	 .nav-growpop .icon-wrap{border:0px solid <?php echo $primary_color ?>;}
	 .accordion.style_1 .accordion-heading.in_head .accordion-toggle:before, .accordion.style_2 .accordion-heading.in_head .accordion-toggle:before, .accordion.style_3 .accordion-heading.in_head .accordion-toggle:before, .footer_social_icons.circle li:hover{background-color:<?php echo $primary_color ?>;} 
	 nav .menu li > ul.sub-menu li{border-bottom:1px solid <?php echo $dropdown_border_color ?>;}
	 .codeless_slider .swiper-slide .buttons a.bordered:hover, .header_12 .full_nav_menu nav ul > li:hover, .header_12 .full_nav_menu nav ul > li.current-menu-item, .header_12 .full_nav_menu nav ul > li.current-menu-parent, .header_12 .full_nav_menu nav ul > li:hover{background:<?php echo $primary_color ?>;}
	 .services_steps .icon_wrapper, .accordion.style_1 .accordion-heading.in_head .accordion-toggle:before{border:1px solid <?php echo $primary_color ?>;}
	 .blog-article.timeline-style .timeline .date, aside #s, #respond textarea, #respond input[type="text"], .recent_news.events .blog-item, .sticky,.post-password-form input[type="password"]{border:1px solid <?php echo $base_border_color ?>;}
	 .recent_news.events .link, .header_12 .full_nav_menu nav ul > li{border-left:1px solid <?php echo $base_border_color ?>;}
	 .header_12 .full_nav_menu nav ul > li:last-child{border-right:1px solid <?php echo $base_border_color ?>; padding-right:<?php echo $menu_padding['padding-right'] ?> !important;}
	 .timeline-border{background:<?php echo $base_border_color ?>;}
	 <?php $primary_hex = codeless_hexToRgb($primary_color); ?>
	 .portfolio-item.basic .link, .skill .prog, .codeless_slider .swiper-slide .buttons.colors-light a.colored, .recent_news.events .blog-item:hover .link{background:<?php echo $primary_color ?>;}
	 .services_medium.style_1:hover .icon_wrapper, .services_medium.style_3:hover .icon_wrapper{background:<?php echo $primary_color ?> !important;}
	 .services_medium.style_3:hover .icon_wrapper{border:2px solid <?php echo $primary_color ?> !important;}
	 .blog-article .media .overlay{background:rgba(<?php echo $primary_hex['r'] ?>, <?php echo $primary_hex['g'] ?>, <?php echo $primary_hex['b'] ?>, 0.8);}
	 .list li.titledesc dl dt .circle, .header_12 .after_navigation_widgetized #s{border:1px solid <?php echo $base_border_color ?>;}
	 .blockquote{border-left:2px solid <?php echo $primary_color ?>;}
	 .header_page h1{line-height:<?php echo (int) $page_header_height['height'] ?>px;}
	 .services_media.style_2 h5{ 
		background:<?php echo $primary_color ?>;
	 }
	 .services_small .content div, .comment .comment_text{line-height: <?php echo $body_typography['line-height'] ?>;}
	  <?php if($cl_redata['page_header_design_style'] == 'padd'): ?>
	 .header_page.with_padding_style.with_subtitle.centered .titles h1{background:rgba(<?php echo implode(',', codeless_hexToRgb($page_header_padd_bg_title['color'])); ?>, <?php echo $page_header_padd_bg_title['alpha'] ?> );}
	 .header_page.with_padding_style.with_subtitle.centered .titles h3{background:rgba(<?php echo implode(',', codeless_hexToRgb($page_header_padd_bg_subtitle['color'])); ?>, <?php echo $page_header_padd_bg_subtitle['alpha'] ?> ); color:<?php echo $page_header_padd_bg_subtitle_font ?>;}
	  <?php endif; ?>
	 .services_large:hover .icon_wrapper, .services_steps:hover .icon_wrapper {background: <?php echo $primary_color ?> ;}
	 .section-style.borders, .header_12 .full_nav_menu{border-top:1px solid <?php echo $base_border_color ?>; border-bottom:1px solid <?php echo $base_border_color ?>}
	 #comments{border-top:1px solid <?php echo $base_border_color ?>;}
	 .not_found .search_field input[type="text"]{border:1px solid <?php echo $base_border_color ?>;}
	 .background--dark nav .menu > li > a:hover, .background--dark header#header .header_tools .vert_mid > a:hover, .background--dark header#header .header_tools .vert_mid .cart .cart_icon:hover, .tabbable.style_1.tabs-left .nav-tabs li.active a, .contact_information dt i{color:<?php echo $primary_color ?> !important;}
	 .social_icons_sc i:hover, .tabbable.tabs-top.style_1 .nav.nav-tabs li.active a{color:<?php echo $primary_color ?>;}
	 <?php if(!$header_transparency): ?> 
	 .header_1.fullwidth_slider_page .top_wrapper, .header_4.fullwidth_slider_page .top_wrapper, .header_5.fullwidth_slider_page .top_wrapper,.header_5.page_header_yes .top_wrapper, .header_11.fullwidth_slider_page .top_wrapper{
	 	padding-top:<?php echo $header_height['height']; ?>;
	 }
	 <?php endif; ?>
	 .header_2 nav .menu>li.current-menu-item, .header_2 nav .menu>li.current-menu-parent, .header_2 nav .menu>li:hover{border-top:3px solid <?php echo $primary_color ?>;}
	 .header_2 nav .codeless_custom_menu_mega_menu{border-top:2px solid <?php echo $primary_color ?>;}
	 .header_2 nav .menu > li > ul.sub-menu{border-top:2px solid <?php echo $primary_color ?>;}

	 .header_3 nav .menu>li.current-menu-item, .header_3 nav .menu>li.current-menu-parent, .header_3 nav .menu>li:hover{border-top:3px solid <?php echo $primary_color ?>;}
	 .header_3 nav .codeless_custom_menu_mega_menu{border-top:2px solid <?php echo $primary_color ?>;}
	 .header_3 nav .menu > li > ul.sub-menu{border-top:2px solid <?php echo $primary_color ?>;} 
	 <?php $bd_hex = codeless_hexToRgb($background_dropdown); ?>  
	 .header_4 nav .menu li > ul, .header_4 nav .menu>li:hover, .header_4 nav .menu>li.current-menu-item, .header_4 nav .menu>li.current-menu-parent, .header_4 .codeless_custom_menu_mega_menu, .header_4 .codeless_custom_menu_mega_menu{background:rgba(<?php echo $bd_hex['r'] ?>, <?php echo $bd_hex['g'] ?>, <?php echo $bd_hex['b'] ?>, 0.90) !important;}
	 <?php $dbc = codeless_hexToRgb($dropdown_border_color); ?>   
	 .header_4 .codeless_custom_menu_mega_menu ul.sub-menu{
	 	background:transparent !important; 
	 }
	 .header_4 nav .menu>li:hover a, .header_4 nav .menu>li.current-menu-item a, .header_4 nav .menu>li.current-menu-parent a{color:<?php echo $megamenu_title['color'] ?>;}
	 .header_4 nav .menu li > ul.sub-menu li{border-bottom:1px solid rgba(<?php echo $dbc['r'] ?>,<?php echo $dbc['g'] ?>,<?php echo $dbc['b'] ?>,0);}
	 .header_4 .header_page.with_subtitle .titles{margin-top:<?php echo ($header_height['height']/2) ?>px;}
	 
	 .header_8 nav .menu>li.current-menu-item, .header_8 nav .menu>li.current-menu-parent, .header_8 nav .menu>li:hover{border-bottom:3px solid <?php echo $primary_color ?>;}
	 .header_9 nav .menu>li.current-menu-item > a, .header_9 nav .menu>li.current-menu-parent > a , .header_9 nav .menu>li > a:hover{border-bottom:1px solid <?php echo $primary_color ?>;}
	 
	 .header_10 .full_nav_menu .container{border-top:1px solid <?php echo $base_border_color ?>;border-bottom:1px solid <?php echo $base_border_color ?>;}
	 <?php if($header_10_border): ?>
	 .header_10 .full_nav_menu .container{border-top:1px solid <?php echo $base_border_color ?>;border-bottom:1px solid <?php echo $base_border_color ?>;}
	 <?php endif; ?>
	 .header_11.sticky_header nav.left .menu > li:last-child{padding-right:<?php echo $menu_padding['padding-right'] ?>; margin-right:<?php echo $menu_margin['margin-right'] ?>; }
	 <?php if($header_7_border): ?>
		 <?php if($header_7_position == "left") $e = "border-right:1px solid "; else $e = "border-left:1px solid "; ?> 
		.header_7 .header_wrapper{ <?php echo $e.$base_border_color ?> }
	 <?php endif; ?>

	 <?php if($header_7_border_top): ?>
		.header_7.header_wrapper {
			border-top: 6px solid <?php echo $primary_color ?>;
		}
	 <?php endif; ?>
	 .woocommerce ul.products li.product:hover .overlay, .woocommerce-page ul.products li.product:hover .overlay{background:rgba(<?php echo implode(',', codeless_hexToRgb($shop_product_overlay['color'])); ?>, <?php echo $shop_product_overlay['alpha'] ?> );}
	 .woocommerce #content div.product p.price, .woocommerce #content div.product span.price, .woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce-page #content div.product p.price, .woocommerce-page #content div.product span.price, .woocommerce-page div.product p.price, .woocommerce-page div.product span.price, .woocommerce .star-rating span, .woocommerce-page .star-rating span, .recent_news.events .link i{color: <?php echo $primary_color ?>;}
	 .header_tools .cart .checkout{
	 	border-top:1px solid <?php echo $dropdown_border_color ?>;
	 }
	 .header_tools .cart_icon i:before{line-height:<?php echo $menu_font_style['line-height'] ?>;}
	  .header_tools .cart .content .cart_item{
	  	border-bottom:1px solid <?php echo $dropdown_border_color ?>;
	  }
	   .header_tools .cart .content .cart_item .description .price, .header_tools .cart .content .cart_item .description .price .amount, .header_tools .cart .cart_item .remove:after{
	  	color:<?php echo $dropdown_font['color'] ?>;
	  }
	  .header_tools .cart .content .cart_item .description .title, .header_tools .cart .checkout .subtotal{
	  	color:<?php echo $megamenu_title['color'] ?>;
	  }
	  .header_tools .cart .content .cart_item .description .title:hover, .header_tools .cart .cart_item .remove:hover:after{color:<?php echo $primary_color ?>;}
	 .tabbable.style_1 .nav-tabs li a{font-weight: <?php echo $headings_font_type['font-weight'] ?>}
	 .portfolio-item.grayscale .project:after{
  		border-color: transparent transparent <?php echo $portfolio_grayscale_bg ?> transparent;
	 }

	 #logo img{margin-top:<?php echo '-'.( (int) $logo_height['height']/2) ?>px; }
	 .portfolio_single ul.info li .title{
	 	text-transform: <?php echo $sidebar_widget_title['text-transform'] ?>;
	 	font-weight: <?php echo $sidebar_widget_title['font-weight'] ?>
	 }

	 .tabbable.tabs-top.style_1 .nav.nav-tabs li a{
	 	text-transform: <?php echo $sidebar_widget_title['text-transform'] ?>;
	 }
	 .woocommerce #review_form #respond textarea, .woocommerce-page #review_form #respond textarea,.side-nav,.wpcf7-form-control-wrap input, .wpcf7-form-control-wrap textarea, .select2-drop-active, .woocommerce .woocommerce-ordering, .woocommerce-page .woocommerce-ordering, .woocommerce .woocommerce-error, .woocommerce .woocommerce-info, .woocommerce .woocommerce-message, .woocommerce-page .woocommerce-error, .woocommerce-page .woocommerce-info, .woocommerce-page .woocommerce-message, #mc_signup_form .mc_input{
		border:1px solid <?php echo $contact_border ?> !important;
	 }

	 .side-nav li{
	 	border-bottom:1px solid <?php echo $contact_border ?>;
	 }

	 footer .widget_search input[type="text"]{
	 	background:<?php echo $copyright_background_color ?>;
	 	color:<?php echo $footer_body_color ?>;
	 }

	 .codeless_news_slider .swiper-slide h1, .codeless_news_slider .featured_posts .featured h4{
	 	background:rgba(<?php echo $primary_hex['r'] ?>, <?php echo $primary_hex['g'] ?>, <?php echo $primary_hex['b'] ?>, 0.8);
	 }

	 .extra_navigation h5.widget-title{
	 	text-transform:<?php echo $sidebar_widget_title['text-transform'] ?>;
	 	font-weight:<?php echo $sidebar_widget_title['font-weight'] ?>;
	 	font-size:<?php echo $sidebar_widget_title['font-size'] ?>;
	 	letter-spacing: :<?php echo $sidebar_widget_title['letter-spacing'] ?>;
	 	line-height:<?php echo $sidebar_widget_title['line-height'] ?>;
	 }

	 .blog-article.grid-style .content h1, .latest_blog .blog-item .content h4, .recent_news .blog-item h4, .recent_news.events .blog-item dt .date{text-transform: <?php echo $blog_title_typography['text-transform'] ?>}

	 .latest_blog .blog-item .content h4{font-weight:<?php echo $blog_title_typography['font-weight'] ?>;}
	 
	 .price_table  h1, .price_table .list ul li:before{color:<?php echo $primary_color ?>;}

	 .price_table.highlighted .price, .side-nav li.current_page_item, .p_pagination .pagination .current, .p_pagination .pagination a:hover{background:<?php echo $primary_color ?>;}
	
	 .btn-bt.<?php echo $cl_redata['overall_button_style'][0] ?>{
	 	<?php if(!empty($button_typography['color'])): ?>
			color: <?php echo $button_typography['color'] ?> ;
		<?php endif; ?>
		
		<?php if(!empty($button_background_color)): ?>
			<?php if(is_array($button_background_color)){ ?>
				<?php $rgb = implode(',', codeless_hexToRgb($button_background_color['color'])); ?>
				background: rgba(<?php echo $rgb ?>, <?php echo ((isset($button_background_color['alpha']))? $button_background_color['alpha']:1); ?>) ;
			<?php }else{ ?>
				background: <?php echo $button_background_color ?> ;
			<?php } ?>
		<?php endif; ?>
		
		<?php if($cl_redata['overall_button_style'][0] == 'gradient'): ?>
		
			background-image: linear-gradient(bottom, <?php echo $button_background_color['color'] ?> 0%, <?php echo codeless_adjustBrightness($button_background_color, 35) ?> 100%);
			background-image: -o-linear-gradient(bottom, <?php echo $button_background_color['color'] ?>  0%, <?php echo codeless_adjustBrightness($button_background_color, 35) ?> 100%);
			background-image: -moz-linear-gradient(bottom, <?php echo $button_background_color['color'] ?>  0%, <?php echo codeless_adjustBrightness($button_background_color, 35) ?> 100%);
			background-image: -webkit-linear-gradient(bottom, <?php echo $button_background_color['color'] ?>  0%, <?php echo codeless_adjustBrightness($button_background_color, 35) ?> 100%);
			background-image: -ms-linear-gradient(bottom, <?php echo $button_background_color['color'] ?>  0%, <?php echo codeless_adjustBrightness($button_background_color, 35) ?> 100%);
			background-color: <?php echo $button_background_color['color'] ?> ;
			text-shadow: 1px 1px 0px <?php echo $button_background_color['color'] ?>;
			filter: dropshadow(color=<?php echo $button_background_color['color'] ?>, offx=1, offy=1);

		<?php endif; ?>

		<?php if(!empty($button_border_color)): ?>
			<?php if(is_array($button_border_color)){ ?>
				<?php $rgb = implode(',', codeless_hexToRgb($button_border_color['color'])); ?>
				border-color: rgba(<?php echo $rgb ?>, <?php echo $button_border_color['alpha'] ?>) ;
			<?php }else{ ?>
				border-color: <?php echo $button_border_color ?> ;
			<?php } ?>
		<?php endif; ?>

		<?php if(!empty($button_typography['font-size'])): ?>
			font-size: <?php echo $button_typography['font-size'] ?> ;
		<?php endif; ?>

		<?php if(!empty($button_typography['font-weight'])): ?>
			font-weight: <?php echo $button_typography['font-weight'] ?> ;
		<?php endif; ?>

		<?php if(!empty($button_typography['text-transform'])): ?>
			text-transform: <?php echo $button_typography['text-transform'] ?> ;
		<?php endif; ?>

		<?php if(!empty($button_typography['letter-spacing'])): ?>
			letter-spacing: <?php echo $button_typography['letter-spacing'] ?> ;
		<?php endif; ?>
	 }
	 
	 .btn-bt.<?php echo $cl_redata['overall_button_style'][0] ?>:hover{
	 	<?php if(!empty($button_hover_font_color)): ?>
	 		color: <?php echo $button_hover_font_color ?> ;
		<?php endif; ?>

	 	<?php if(!empty($button_hover_background)): ?> 
	 		<?php if(is_array($button_hover_background)){ ?>
		 		<?php $rgb = implode(',', codeless_hexToRgb($button_hover_background['color'])); ?>
				background: rgba(<?php echo $rgb ?>, <?php echo $button_hover_background['alpha'] ?>) ;
			<?php }else{ ?>
				background: <?php echo $button_hover_background ?>;
			<?php } ?>

		<?php endif; ?>

		<?php if($cl_redata['overall_button_style'][0] == 'gradient'): ?>
		
			background-image: linear-gradient(bottom, <?php echo $button_hover_background['color'] ?> 0%, <?php echo codeless_adjustBrightness($button_hover_background, -35) ?> 100%);
			background-image: -o-linear-gradient(bottom, <?php echo $button_hover_background['color'] ?>  0%, <?php echo codeless_adjustBrightness($button_hover_background, -35) ?> 100%);
			background-image: -moz-linear-gradient(bottom, <?php echo $button_hover_background['color'] ?>  0%, <?php echo codeless_adjustBrightness($button_hover_background, -35) ?> 100%);
			background-image: -webkit-linear-gradient(bottom, <?php echo $button_hover_background['color'] ?>  0%, <?php echo codeless_adjustBrightness($button_hover_background, -35) ?> 100%);
			background-image: -ms-linear-gradient(bottom, <?php echo $button_hover_background['color'] ?>  0%, <?php echo codeless_adjustBrightness($button_hover_background, -35) ?> 100%);
			background-color: <?php echo $button_hover_background['color'] ?> ;
			text-shadow: 1px 1px 0px <?php echo $button_hover_background['color'] ?>;
			filter: dropshadow(color=<?php echo $button_hover_background['color'] ?>, offx=1, offy=1);

		<?php endif; ?>

		<?php if(!empty($button_hover_border)): ?>
			<?php if(is_array($button_hover_border)){ ?>
				<?php $rgb = implode(',', codeless_hexToRgb($button_hover_border['color'])); ?>
				border-color: rgba(<?php echo $rgb ?>, <?php echo $button_hover_border['alpha'] ?>) ;
			<?php }else{ ?>
				border-color: <?php echo $button_hover_border ?> ;
			<?php } ?>	
		<?php endif; ?>
	 }

	 .light .btn-bt.<?php echo $cl_redata['overall_button_style'][0] ?>, .fullscreen-blog-article .content.background--dark .btn-bt{
		
		<?php if(!empty($button_light_font_color)): ?>
	 		color: <?php echo $button_light_font_color ?> ;
		<?php endif; ?>

		<?php if(!empty($button_light_background)): ?>
			<?php if(is_array($button_light_background)){ ?>
				<?php $rgb = implode(',', codeless_hexToRgb($button_light_background['color'])); ?>
				<?php if(!isset($button_light_background['alpha'])) $button_light_background['alpha'] = 1 ?>
				background: rgba(<?php echo $rgb ?>, <?php echo $button_light_background['alpha'] ?>) ;
			<?php }else{ ?>
				background: <?php echo $button_light_background ?> ;
			<?php } ?>
		<?php endif; ?>

		<?php if(!empty($button_light_border)): ?>
			<?php if(is_array($button_light_border)){ ?>
				<?php $rgb = implode(',', codeless_hexToRgb($button_light_border['color'])); ?>
				border-color: rgba(<?php echo $rgb ?>, <?php echo $button_light_border['alpha'] ?>) ;
			<?php }else{ ?>
				border-color: <?php echo $button_light_border ?> ;
			<?php } ?>
		<?php endif; ?>

	 }

	 .light .btn-bt.<?php echo $cl_redata['overall_button_style'][0] ?>:hover, .fullscreen-blog-article .content.background--dark .btn-bt:hover{
		
		<?php if(!empty($button_light_hover_font_color)): ?>
	 		color: <?php echo $button_light_hover_font_color ?> ;
		<?php endif; ?>

		<?php if(!empty($button_light__hover_background)): ?>
			<?php if(is_array($button_light__hover_background)){ ?>
				<?php $rgb = implode(',', codeless_hexToRgb($button_light__hover_background['color'])); ?>
				background: rgba(<?php echo $rgb ?>, <?php echo $button_light__hover_background['alpha'] ?>) ;
			<?php }else{ ?>
				background: <?php echo $button_light__hover_background ?> ;
			<?php } ?>
		<?php endif; ?>

		<?php if(!empty($button_light_hover_border)): ?>
			<?php if(is_array($button_light_hover_border)){ ?>
				<?php $rgb = implode(',', codeless_hexToRgb($button_light_hover_border['color'])); ?>
				border-color: rgba(<?php echo $rgb ?>, <?php echo $button_light_hover_border['alpha'] ?>) ;
			<?php }else{ ?>
				border-color: <?php echo $button_light_hover_border ?> ;
			<?php } ?>
		<?php endif; ?>

	 }


	 <?php if(isset($fullscreen_blog_box_bg) && (float) $fullscreen_blog_box_bg['alpha'] > 0): ?>
	 	.fullscreen-blog-article .content{padding:4%;}
	 <?php endif; ?>


	 <?php if($cl_redata['header_style'] == 'header_7'): ?>
		.header_7.header_wrapper{
			width: <?php echo $cl_redata['header_7_width']['width']; ?>;
			<?php if($cl_redata['header_7_position'] == 'left'): ?>
			left:0;
			<?php else: ?>
			right:0;
			<?php endif; ?>
			padding-left:<?php echo $cl_redata['header_7_padding']['padding-left']; ?>;
			padding-right:<?php echo $cl_redata['header_7_padding']['padding-right']; ?>;
			padding-top:<?php echo $cl_redata['header_7_padding']['padding-top']; ?>;
			padding-bottom:<?php echo $cl_redata['header_7_padding']['padding-bottom']; ?>;
		}
		.header_7 .viewport{padding-<?php echo $cl_redata['header_7_position'] ?>:<?php echo $cl_redata['header_7_width']['width']; ?> ;}
		.header_7.header_wrapper #navigation, .header_7 .header_widgetized{margin-top:<?php echo $cl_redata['header_7_margin']['margin-top'] ?>;}
		.header_7 #navigation.pos_left nav .menu > li > ul.sub-menu,.header_7 #navigation.pos_left nav .menu > li > ul.sub-menu ul,.header_7 #navigation.pos_left nav .codeless_custom_menu_mega_menu {
  			left:<?php echo $cl_redata['header_7_width']['width']; ?>;
  			margin-left:-<?php echo $cl_redata['header_7_padding']['padding-right']; ?> !important;
		}

		.header_7 #navigation.pos_right nav .menu > li > ul.sub-menu,.header_7 #navigation.pos_right nav .menu > li > ul.sub-menu ul,.header_7 #navigation.pos_right nav .codeless_custom_menu_mega_menu  {
  			right:<?php echo $cl_redata['header_7_width']['width']; ?>;
  			margin-right:-<?php echo $cl_redata['header_7_padding']['padding-right']; ?> !important;
		}
		.header_7 #navigation.pos_left nav .menu > li{
			padding-right:<?php echo $cl_redata['header_7_padding']['padding-right']; ?>;
		}
		.header_7 #navigation.pos_right nav .menu > li{
			/*padding-left:<?php echo $cl_redata['header_7_padding']['padding-left']; ?>;*/
		}
		.header_7 .nav-growpop a.prev{left:<?php echo $cl_redata['header_7_width']['width']; ?>;}
	 	
	 	<?php if($cl_redata['header_7_position'] == 'left'): ?>
		.header_7 .nav-growpop a.prev{left:<?php echo $cl_redata['header_7_width']['width']; ?>;}
		<?php endif; ?>

		<?php if($cl_redata['header_7_position'] == 'right'): ?>
		.header_7 .nav-growpop a.next{right:<?php echo $cl_redata['header_7_width']['width']; ?>;}
		<?php endif; ?>
	 <?php endif; ?>

	@media (max-width: 979px) {
		 .header_5 .background--dark nav .menu > li > a{
		 	color: <?php echo $menu_font_style['color'] ?> !important;
		 }
	}

	<?php if($header_style == 'header_6'): ?>
		.header_6 nav .menu > li{
			border-bottom:3px solid <?php echo $header_navigation['color'] ?>;
		}
		.header_6 nav .menu > li.current-menu-item{border-bottom:3px solid <?php echo $primary_color ?>;}
		.header_6 nav .menu > li:hover{border-bottom:3px solid <?php echo $primary_color ?>;}
		.header_6 nav .menu > li:last-child{
  			padding-right:<?php echo $menu_padding['padding-right'] ?>;
		}
		.header_6 nav .menu > li:first-child{
		  	padding-left:<?php echo $menu_padding['padding-left'] ?>;
		}
	<?php endif; ?>


	/* Layout Inner Container */

	<?php if(!empty($page_container_width_percent['width'])): ?>
	@media (min-width: 981px) and (max-width: 1100px) {
		.container{	width:<?php echo $page_container_width_percent['width'] ?> !important ; }
	}
	@media (min-width: 768px){
		.container{			
			max-width: <?php echo $page_container_width['width'] ?> !important;
		}
		.row .span12{
			width:100%; 
			margin-left:0 !important;
			padding-left:20px;
			box-sizing: border-box;
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
		}
	}

	
	<?php endif; ?>

	@media (min-width: 1101px) {
		.container{
			<?php if(!empty($page_container_width_percent['width'])): ?>
				width:<?php echo $page_container_width_percent['width'] ?>;
				max-width: <?php echo $page_container_width['width'] ?> !important;
			<?php else: ?>
				width:<?php echo $page_container_width['width'] ?>;
			<?php endif; ?>
		}

		.row .span12{
			
			<?php if(!empty($page_container_width_percent['width'])): ?>
				width:100%;
				margin-left:0 !important;
				padding-left:20px;
				box-sizing: border-box;
				-webkit-box-sizing: border-box;
				-moz-box-sizing: border-box;
			<?php else: ?> 
				width:<?php echo $page_container_width['width'] ?>;
			<?php endif; ?>
		}
		.testimonial_carousel .item{width:<?php echo $page_container_width['width'] ?>;}
	}

	/* End Layout Inner Container */


	/* Layout Boxed */
	.boxed_layout{
		margin-top:<?php echo $boxed_container_margin['margin-top'] ?> !important;
		margin-bottom:<?php echo $boxed_container_margin['margin-bottom'] ?> !important;
		<?php if($cl_redata['boxed_shadow'] || !isset($cl_redata['boxed_shadow'] )): ?>
		  -webkit-box-shadow:0 5px 19px 2px rgba(0,0,0,0.1);
		  -moz-box-shadow:0 5px 19px 2px rgba(0,0,0,0.1);
		  box-shadow:0 5px 19px 2px rgba(0,0,0,0.1);
		<?php endif; ?>
	}
	<?php if(!empty($boxed_container_width_percent['width'])): ?>
	
	
	.boxed_layout{			
		width:<?php echo $boxed_container_width_percent['width'] ?> !important ;
		max-width: <?php echo $boxed_container_width['width'] ?> !important;
	}
	

	<?php endif; ?>
	
	<?php if(empty($boxed_container_width_percent['width'])): ?>

	@media (min-width: 1101px) {
		.container{ width:<?php echo $boxed_container_width['width'] ?>; }
	}

	<?php endif; ?>

	/* End Layout Boxed */

	@media (max-width: 480px){
		<?php if(!$header_responsive_tools): ?>
		.header_tools{display:none !important;}
		<?php endif; ?>
	}

</style> 

<style type="text/css">
<?php echo $cl_redata['custom_css'] ?>
</style>
