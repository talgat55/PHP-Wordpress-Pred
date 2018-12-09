<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $product;
$related = $product->get_related( $posts_per_page );

if ( sizeof( $related ) == 0 ) return;

$args = apply_filters( 'woocommerce_related_products_args', array(
    'post_type'            => 'product',
    'ignore_sticky_posts'  => 1,
    'no_found_rows'        => 1,
    'posts_per_page'       => '3',
    'orderby'              => $orderby,
    'post__in'             => $related,
    'post__not_in'         => array( $product->id )
) );

$products = new WP_Query( $args );

$woocommerce_loop['columns'] = $columns;

if ( $products->have_posts() ) : ?>

    <div class="related products">

        <h2><?php _e( 'Также рекомендуем', 'woocommerce' ); ?></h2>

        <?php woocommerce_product_loop_start(); ?>

        <?php while ( $products->have_posts() ) : $products->the_post(); ?>

            <?php
            global $product;
            global $post;
            $terms = get_the_terms($post->ID, 'product_tag');
            if(is_array($terms)) {
                foreach ($terms as $term) {
                    $product_tag_name = $term->name;
                    break;
                }
            }
// Ensure visibility.
            if (empty($product) || !$product->is_visible()) {
                return;
            }
            ?>

            <li class="product-item">
                <a href="<?php echo get_the_permalink($post->ID); ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                <div class="imagewrapper">
                <?php


                if ( has_post_thumbnail() ) {
                    $post_thumbnail_id = $product->get_image_id();

                    ?>
                    <img src="<?php the_post_thumbnail_url($post_thumbnail_id); ?>" alt="<?php echo get_the_title(); ?>">
                    <?php
                }



                ?>
                </div>
                </a>
                <?php
                /**
                 * woocommerce_before_shop_loop_item_title hook
                 *
                 * @hooked woocommerce_show_product_loop_sale_flash - 10
                 * @hooked woocommerce_template_loop_product_thumbnail - 10
                 */
                do_action('woocommerce_before_shop_loop_item_title');

                ?>


                <div class="content-product-item">
                    <div class="sub-item-product">
                        <?php
                        if($product_tag_name){
                            echo $product_tag_name;
                        }else{
                            echo '<div class="space-tag"></div>';
                        }
                        ?>
                    </div>
                    <div class="title-item-product"><?php the_title(); ?></div>

                    <?php
                    /**
                     * woocommerce_after_shop_loop_item_title hook
                     *
                     * @hooked woocommerce_template_loop_rating - 5
                     * @hooked woocommerce_template_loop_price - 10
                     */
                    do_action('woocommerce_after_shop_loop_item_title');
                    ?>


                    <?php

                    /**
                     * woocommerce_after_shop_loop_item hook
                     *
                     * @hooked woocommerce_template_loop_add_to_cart - 10
                     */
                    do_action('woocommerce_after_shop_loop_item');

                    ?>
                </div>
            </li>




        <?php endwhile; // end of the loop. ?>

        <?php woocommerce_product_loop_end(); ?>

    </div>

<?php endif;

wp_reset_postdata();