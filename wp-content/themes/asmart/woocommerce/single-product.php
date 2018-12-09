<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     1.6.4
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

get_header('shop'); ?>
    <div class="wrap product-page">
        <div class="actions"
             style="background: url(<?php echo get_theme_file_uri('/assets/images/bg-bred-compressor.jpg'); ?>);">
            <div class="container">
                <div class="action-title">
                    Скидка <span>-30%</span>
                </div>
                <div class="action-text">
                    На всю футбольную тематическую атрибутику ЧМ 2018.
                </div>
                <a class="link-actions" href="#">К товарам</a>
            </div>
        </div>
        <div class="container single-product-row clearfix">
            <div class="col-md-5">
                <?php
                $terms = get_terms('product_cat');

                if ($terms) {

                    echo '<ul class="cat-list">';

                    foreach ($terms as $term) {
                        if ($term->parent == 0) {
                            echo '<li class="category">';

                            //  woocommerce_subcategory_thumbnail( $term );

                            echo '<a href="' . esc_url(get_term_link($term)) . '" class="cat-item">';
                            echo $term->name;
                            echo '</a>';

                            $children = get_categories(array('taxonomy' => 'product_cat', 'parent' => $term->term_id));


                            if (count($children) > 0) {
                                echo ' <span><i class="fas fa-caret-right"></i></span>';

                                echo '<ul class="cat-list-sub">';
                                foreach ($children as $termchildren) {
                                    echo '<li><a href="' . esc_url(get_term_link($termchildren)) . '" class="cat-item">' . $termchildren->name . '</a></li>';

                                }

                                echo '</ul>';

                            }


                            echo '</li>';

                        }
                    }

                    echo '</ul>';

                }


                ?>

            </div>
            <div class="col-md-7">
                <?php
                /**
                 * woocommerce_before_main_content hook.
                 *
                 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
                 * @hooked woocommerce_breadcrumb - 20
                 */
                do_action('woocommerce_before_main_content');
                ?>

                <?php while (have_posts()) : the_post(); ?>

                    <?php wc_get_template_part('content', 'single-product'); ?>

                <?php endwhile; // end of the loop. ?>

                <?php
                /**
                 * woocommerce_after_main_content hook.
                 *
                 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
                 */
                do_action('woocommerce_after_main_content');
                ?>

                <?php
                /**
                 * woocommerce_sidebar hook.
                 *
                 * @hooked woocommerce_get_sidebar - 10
                 */
                do_action('woocommerce_sidebar');
                ?>
                <div class="overlay-layer-form-builder"></div>
                <div class="modal-block-builder-form">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Заказать товар</h4>
                    <p class="title-form-product">
                        <?=get_the_title()?>
                    </p>
                    <form id="orderform"  method="post">
                        <div class="form-group one-but-bottom">
                            <input type="text" name="phonenumbers" class="form-control one-but-phone"
                                   placeholder="Введите номер телефона" required>
                            <input type="hidden" name="topfield" class="top-field form-control">


                            <button name="BUY_SUBMIT" class="btn btn-primary modal-btn-order-form" value="Y">
                                Заказать
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php get_footer('shop');

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
