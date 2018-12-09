<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

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
    <?php do_action('woocommerce_before_shop_loop_item'); ?>


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
