<?php global $woocommerce, $cl_redata; ?>

<div class="cart">

		<?php if(!$woocommerce->cart->cart_contents_count): ?>

		<a class="cart_icon" href="<?php echo esc_url(get_permalink(get_option('woocommerce_cart_page_id'))); ?>"><i class="moon-cart"></i></a>
		
		<div class="content">
			<span class="empty"><?php _e('Cart is empty', 'codeless'); ?></span>
			<div class="checkout">

                <div class="view_cart  <?php echo esc_attr($cl_redata['cart_dropdown_button']) ?>"><a href="<?php echo esc_url(get_permalink(get_option('woocommerce_cart_page_id'))); ?>" class="btn-bt <?php echo esc_attr($cl_redata['overall_button_style'][0]) ?>"><?php _e('View Cart', 'codeless'); ?></a></div>

				<div class="subtotal"> 
                           <span class="subtotal_title"><?php _e('Subtotal:', 'codeless'); ?> </span>
                           <?php $cart_subtotal = $woocommerce->cart->get_cart_subtotal(); 
                              echo $cart_subtotal;?>
                </div>

			</div>
		</div>

		<?php else: ?> 

		<a class="cart_icon cart_icon_active" href="<?php echo esc_url(get_permalink(get_option('woocommerce_cart_page_id'))); ?>"><i class="moon-cart"></i></a>

		<div class="content">

			<div class="items">

			<?php foreach($woocommerce->cart->cart_contents as $key => $cart_item): ?>

			

				<div class="cart_item">

					<a href="<?php echo esc_url(get_permalink($cart_item['product_id'])); ?>">

					<?php echo get_the_post_thumbnail($cart_item['product_id'], 'post_thumbnail'); ?>

					<div class="description">

						<span class="title"><?php echo esc_html($cart_item['data']->post->post_title); ?></span>

						<span class="price"><?php echo $cart_item['quantity']; ?> x <?php echo $woocommerce->cart->get_product_subtotal($cart_item['data'], $cart_item['quantity']); ?></span>

					</div>

					</a>

					<a class="remove" href="<?php echo esc_url($woocommerce->cart->get_remove_url($key)) ?>"></a>

				</div>

			<?php endforeach; ?>

			</div>

			<div class="checkout">
				
                <div class="view_cart <?php echo esc_attr($cl_redata['cart_dropdown_button']) ?>"><a href="<?php echo esc_url(get_permalink(get_option('woocommerce_cart_page_id'))); ?>" class="btn-bt <?php echo esc_attr($cl_redata['overall_button_style'][0]) ?>"><?php _e('View Cart', 'codeless'); ?></a></div>

				<div class="subtotal"> 
                           <span class="subtotal_title"><?php _e('Subtotal:', 'codeless'); ?> </span>
                           <?php $cart_subtotal = $woocommerce->cart->get_cart_subtotal(); 
                              echo $cart_subtotal;?>
                </div>

			</div>

		</div>

		<?php endif; ?>

</div>