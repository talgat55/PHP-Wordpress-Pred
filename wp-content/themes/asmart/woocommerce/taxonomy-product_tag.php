<?php
/**
 * The Template for displaying products in a product tag. Simply includes the archive template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/taxonomy-product_tag.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


?>
<div class="wrap product-page">
    <div id="primary" class="content-area ">
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
    </div><!-- #primary -->
    <div class="content">
        <div class="container clearfix">
            <div class="col-md-5">
                <?php
                $terms = get_terms( 'product_cat' );

                if ( $terms ) {

                    echo '<ul class="cat-list">';

                    foreach ( $terms as $term ) {
                        if($term->parent == 0){
                            echo '<li class="category">';

                            //  woocommerce_subcategory_thumbnail( $term );

                            echo '<a href="' .  esc_url( get_term_link( $term ) ) . '" class="cat-item">';
                            echo $term->name;
                            echo '</a>';

                            $children = get_categories( array ('taxonomy' => 'product_cat', 'parent' => $term->term_id ));


                            if(count($children) > 0){
                                echo ' <span><i class="fas fa-caret-right"></i></span>';

                                echo '<ul class="cat-list-sub">';
                                foreach ( $children as $termchildren ) {
                                    echo '<li><a href="' .  esc_url( get_term_link( $termchildren ) ) . '" class="cat-item">'.$termchildren->name.'</a></li>';

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
                <!--<div class="bredscrumb">
                    <a href="/" class="link-tobredscrumb">главная</a>
                    <span><i class="fas fa-caret-right"></i></span>
                    <a href="/catalog" class="link-tobredscrumb">каталог товаров</a>
                    <span><i class="fas fa-caret-right"></i></span>
                    <a href="/catalog" class="link-tobredscrumb active">тренировочная обувь </a>


                </div>-->
                <?php woocommerce_breadcrumb(); ?>
                <h1 class="title-page">тренировочная обувь</h1>
                <div class="filter-rows clearfix">
                    <div class="first-row clearfix">
                        <div class="title-filter">Сортировка:</div>
                        <div class="block-filter active">По цене <i class="fas fa-caret-up"></i></div>
                        <span>/</span>
                        <div class="block-filter">По новизне</div>
                        <span>/</span>
                        <div class="block-filter">По наименованию</div>
                    </div>
                    <div class="second-row">
                        <div class="block-filter active"><i class="fas fa-sliders-h"></i> фильтр по характеристикам</div>
                    </div>


                </div>
                <div class="row">
                    <?php wc_get_template_part('content-product'); ?>
                </div>




            </div>

        </div>
    </div>


</div><!-- .wrap -->

