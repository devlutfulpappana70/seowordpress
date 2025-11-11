<?php

//Custom products layout on archive page
add_filter( 'loop_shop_columns', 'seon_loop_shop_columns', 20 ); 
function seon_loop_shop_columns() {
	$columns = isset($_GET['product-column']) ? sanitize_text_field($_GET['product-column']) : seon()->get_theme_opt('products_columns', 3);
	return $columns;
}
 

// Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'seon_loop_shop_per_page', 20 );
function seon_loop_shop_per_page( $limit ) {
	$limit = isset($_GET['product-limit']) ? sanitize_text_field($_GET['product-limit']) : seon()->get_theme_opt('product_per_page', 9);
	return $limit;
}

/* Remove result count & product ordering & item product category..... */
function seon_cwoocommerce_remove_function() {
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10, 0 );
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5, 0 );
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10, 0 );
	remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10, 0 );
	remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10, 0 );
	remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_catalog_ordering', 30 );
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

	remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_title', 5 );
	remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_rating', 10 );
	remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_price', 10 );
	remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_excerpt', 20 );
	remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_meta', 40 );
	remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_sharing', 50 );
}
add_action( 'init', 'seon_cwoocommerce_remove_function' );

/* Product Category */
add_action( 'woocommerce_before_shop_loop', 'seon_woocommerce_nav_top', 2 );
function seon_woocommerce_nav_top() { ?>
	<div class="woocommerce-topbar">
		<div class="woocommerce-result-count pxl-pr-20">
			<?php woocommerce_result_count(); ?>
		</div>
		<div class="woocommerce-topbar-ordering">
			<?php woocommerce_catalog_ordering(); ?>
		</div>
	</div>
<?php }

add_filter( 'woocommerce_after_shop_loop_item', 'seon_woocommerce_product' );
function seon_woocommerce_product() {
	global $product;
	$product_id = $product->get_id();
    $shop_featured_img_size = seon()->get_theme_opt('shop_featured_img_size');
	?>
	<div class="woocommerce-product-inner">
		<?php if (has_post_thumbnail()) {
	        $img  = pxl_get_image_by_size( array(
	            'attach_id'  => get_post_thumbnail_id($product_id),
	            'thumb_size' => $shop_featured_img_size,
	        ) );
	        $thumbnail    = $img['thumbnail'];
	        $thumbnail_url    = $img['url']; ?>
	        	<div class="woocommerce-product-header">
					<a class="woocommerce-product-details" href="<?php the_permalink(); ?>">
						<?php if(!empty($shop_featured_img_size)) { echo pxl_print_html($thumbnail); } else { woocommerce_template_loop_product_thumbnail(); } ?>
						<div class="bg-image" style="background-image: url(<?php echo esc_url($thumbnail_url); ?>);"></div>
					</a>
				</div>
		    <div class="woocommerce-product--buttons">
				<?php if ( ! $product->managing_stock() && ! $product->is_in_stock() ) { ?>
				<?php } else { ?>
					<div class="woocommerce-add-to-cart">
				    	<?php woocommerce_template_loop_add_to_cart(); ?>
					</div>
				<?php } ?>
			</div>
			<div class="woocommerce-product-content">
				<div class="woocommerce-product-meta pxl-pr-60">
					<h5 class="woocommerce-product-title"><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h5>
					<div class="woocommerce-product--price">
						<?php woocommerce_template_loop_price(); ?>
					</div>
				</div>
				<div class="woocommerce-product-view pxl-r-20">
					<a class="pxl-btn--view" href="<?php the_permalink(); ?>" ></a>
				</div>
			</div>
		<?php } ?>
	</div>
<?php }


/* Removes the "shop" title on the main shop page */
function seon_hide_page_title()
{
    return false;
}
add_filter('woocommerce_show_page_title', 'seon_hide_page_title');

/* Replace text Onsale */
add_filter('woocommerce_sale_flash', 'seon_custom_sale_text', 10, 3);
function seon_custom_sale_text($text, $post, $_product)
{
	$regular_price = get_post_meta( get_the_ID(), '_regular_price', true);
	$sale_price = get_post_meta( get_the_ID(), '_sale_price', true);

	$product_sale = '';
	if(!empty($sale_price)) {
		$product_sale = intval( ( (intval($regular_price) - intval($sale_price)) / intval($regular_price) ) * 100);
		return '<span class="onsale">' .$product_sale. '%</span>';
	}
}

add_action( 'woocommerce_before_single_product_summary', 'seon_woocommerce_single_summer_start', 0 );
function seon_woocommerce_single_summer_start() { ?>
	<?php echo '<div class="woocommerce-summary-wrap row">'; ?>
<?php }

add_action( 'woocommerce_after_single_product_summary', 'seon_woocommerce_single_summer_end', 5 );
function seon_woocommerce_single_summer_end() { ?>
	<?php echo '</div></div>'; ?>
<?php }

/* Checkout Page*/
add_action( 'woocommerce_checkout_before_order_review_heading', 'seon_checkout_before_order_review_heading_start', 5 );
function seon_checkout_before_order_review_heading_start() { ?>
	<?php echo '<div class="pxl-order-review-right"><div class="pxl-order-review-inner">'; ?>
<?php }

add_action( 'woocommerce_checkout_after_order_review', 'seon_checkout_after_order_review_end', 5 );
function seon_checkout_after_order_review_end() { ?>
	<?php echo '</div></div>'; ?>
<?php }


add_action( 'woocommerce_single_product_summary', 'seon_woocommerce_sg_product_title', 5 );
function seon_woocommerce_sg_product_title() { 
	global $product; 
	$product_title = seon()->get_theme_opt( 'product_title', false ); 
	if($product_title ) : ?>
		<div class="woocommerce-sg-product-title">
			<?php woocommerce_template_single_title(); ?>
		</div>
<?php endif; }

add_action( 'woocommerce_single_product_summary', 'seon_woocommerce_sg_product_rating', 10 );
function seon_woocommerce_sg_product_rating() { global $product; ?>
	<div class="woocommerce-sg-product-rating">
		<?php woocommerce_template_single_rating(); ?>
	</div>
<?php }

add_action( 'woocommerce_single_product_summary', 'seon_woocommerce_sg_product_price', 15 );
function seon_woocommerce_sg_product_price() { ?>
	<div class="woocommerce-sg-product-price">
		<?php woocommerce_template_single_price(); ?>
	</div>
<?php }

add_action( 'woocommerce_single_product_summary', 'seon_woocommerce_sg_product_meta', 30 );
function seon_woocommerce_sg_product_meta() { ?>
	<div class="woocommerce-sg-product-meta">
		<?php woocommerce_template_single_meta(); ?>
	</div>
<?php }


add_action( 'woocommerce_single_product_summary', 'seon_woocommerce_sg_product_excerpt', 20 );
function seon_woocommerce_sg_product_excerpt() { ?>
	<div class="woocommerce-sg-product-excerpt">
		<?php woocommerce_template_single_excerpt(); ?>
	</div>
<?php }

add_action( 'woocommerce_single_product_summary', 'seon_woocommerce_sg_social_share', 40 );
function seon_woocommerce_sg_social_share() { 
	$product_social_share = seon()->get_theme_opt( 'product_social_share', false );
	if($product_social_share) : ?>
		<div class="woocommerce-social-share">
			<label class="pxl-mr-20"><?php echo esc_html__('Share:', 'seon'); ?></label>
			<a class="fb-social pxl-mr-10" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="caseicon-facebook"></i></a>
	        <a class="tw-social pxl-mr-10" target="_blank" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>%20"><i class="caseicon-twitter"></i></a>
	        <a class="pin-social pxl-mr-10" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&description=<?php the_title(); ?>%20"><i class="caseicon-pinterest"></i></a>
	        <a class="lin-social pxl-mr-10" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>%20"><i class="caseicon-linkedin"></i></a>
    </div>
<?php endif; }

/* Product Single: Gallery */
add_action( 'woocommerce_before_single_product_summary', 'seon_woocommerce_single_gallery_start', 0 );
function seon_woocommerce_single_gallery_start() { ?>
	<?php echo '<div class="woocommerce-gallery col-xl-6 col-lg-6 col-md-6"><div class="woocommerce-gallery-inner">'; ?>
<?php }
add_action( 'woocommerce_before_single_product_summary', 'seon_woocommerce_single_gallery_end', 30 );
function seon_woocommerce_single_gallery_end() { ?>
	<?php echo '</div></div><div class="woocommerce-summary-inner col-xl-6 col-lg-6 col-md-6">'; ?>
<?php }

/* Ajax update cart item */
add_filter('woocommerce_add_to_cart_fragments', 'seon_woo_mini_cart_item_fragment');
function seon_woo_mini_cart_item_fragment( $fragments ) {
	global $woocommerce;
    ob_start();
    ?>
    <div class="widget_shopping_cart">
    	<div class="widget_shopping_head">
    		<div class="pxl-item--close pxl-close pxl-cursor--cta"></div>
	    	<div class="widget_shopping_title">
	    		<?php echo esc_html__( 'Cart', 'seon' ); ?> <span class="widget_cart_counter">(<?php echo sprintf (_n( '%d item', '%d items', WC()->cart->cart_contents_count, 'seon' ), WC()->cart->cart_contents_count ); ?>)</span>
	    	</div>
	    </div>
        <div class="widget_shopping_cart_content">
            <?php
            	$cart_is_empty = sizeof( $woocommerce->cart->get_cart() ) <= 0;
            ?>
            <ul class="cart_list product_list_widget">

			<?php if ( ! WC()->cart->is_empty() ) : ?>

				<?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
						$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
						$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

						if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {

							$product_name  = apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
							$thumbnail     = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
							$product_price = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
							?>
							<li>
								<?php if(!empty($thumbnail)) : ?>
									<div class="cart-product-image">
										<a href="<?php echo esc_url( $_product->get_permalink( $cart_item ) ); ?>">
											<?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ); ?>
										</a>
									</div>
								<?php endif; ?>
								<div class="cart-product-meta">
									<h3><a href="<?php echo esc_url( $_product->get_permalink( $cart_item ) ); ?>"><?php echo esc_html($product_name); ?></a></h3>
									<?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); ?>
									<?php
										echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
											'<a href="%s" class="remove_from_cart_button pxl-close" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s"></a>',
											esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
											esc_attr__( 'Remove this item', 'seon' ),
											esc_attr( $product_id ),
											esc_attr( $cart_item_key ),
											esc_attr( $_product->get_sku() )
										), $cart_item_key );
									?>
								</div>	
							</li>
							<?php
						}
					}
				?>

			<?php else : ?>

				<li class="empty">
					<i class="caseicon-shopping-cart-alt"></i>
					<span><?php esc_html_e( 'Your cart is empty', 'seon' ); ?></span>
					<a class="btn btn-shop" href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>"><?php echo esc_html__('Browse Shop', 'seon'); ?></a>
				</li>

			<?php endif; ?>

			</ul><!-- end product list -->
        </div>
        <?php if ( ! WC()->cart->is_empty() ) : ?>
			<div class="widget_shopping_cart_footer">
				<p class="total"><strong><?php esc_html_e( 'Subtotal', 'seon' ); ?>:</strong> <?php echo WC()->cart->get_cart_subtotal(); ?></p>

				<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

				<p class="buttons">
					<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="btn btn-shop wc-forward"><?php esc_html_e( 'View Cart', 'seon' ); ?></a>
					<a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="btn checkout wc-forward"><?php esc_html_e( 'Checkout', 'seon' ); ?></a>
				</p>
			</div>
		<?php endif; ?>
    </div>
    <?php
    $fragments['div.widget_shopping_cart'] = ob_get_clean();
    return $fragments;
}

/* Ajax update cart total number */

add_filter( 'woocommerce_add_to_cart_fragments', 'seon_woocommerce_sidebar_cart_count_number' );
function seon_woocommerce_sidebar_cart_count_number( $fragments ) {
	ob_start();
	?>
	<span class="widget_cart_counter">(<?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count, 'seon' ), WC()->cart->cart_contents_count ); ?>)</span>
	<?php
	
	$fragments['span.widget_cart_counter'] = ob_get_clean();
	
	return $fragments;
}

add_filter( 'woocommerce_output_related_products_args', 'seon_related_products_args', 20 );
  function seon_related_products_args( $args ) {
	$args['posts_per_page'] = 4;
	$args['columns'] = 4;
	return $args;
}

/* Pagination Args */
function seon_filter_woocommerce_pagination_args( $array ) { 
	$array['end_size'] = 1;
	$array['mid_size'] = 1;
    return $array; 
}; 
add_filter( 'woocommerce_pagination_args', 'seon_filter_woocommerce_pagination_args', 10, 1 ); 

/* Flex Slider Arrow */
add_filter( 'woocommerce_single_product_carousel_options', 'seon_update_woo_flexslider_options' );
function seon_update_woo_flexslider_options( $options ) {
$options['directionNav'] = true;
	return $options;
}

/* Single Thumbnail Size */
$single_img_size = seon()->get_theme_opt('single_img_size');
if(!empty($single_img_size['width']) && !empty($single_img_size['height'])) {
	add_filter('woocommerce_get_image_size_single', function ($size) {
		$single_img_size = seon()->get_theme_opt('single_img_size');
		$single_img_size_width = preg_replace('/[^0-9]/', '', $single_img_size['width']);
		$single_img_size_height = preg_replace('/[^0-9]/', '', $single_img_size['height']);
		$size['width'] = $single_img_size_width;
	    $size['height'] = $single_img_size_height;
	    $size['crop'] = 1;
	    return $size;
	});
}
add_filter('woocommerce_get_image_size_gallery_thumbnail', function ($size) {
    $size['width'] = 301;
    $size['height'] = 216;
    $size['crop'] = 1;
    return $size;
});

add_filter('woocommerce_get_image_size_thumbnail', function ($size) {
    $size['width'] = 400;
    $size['height'] = 378;
    $size['crop'] = 1;
    return $size;
});