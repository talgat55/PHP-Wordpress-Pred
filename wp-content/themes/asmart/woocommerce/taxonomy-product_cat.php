<?php
/**
 * The Template for displaying products in a product category. Simply includes the archive template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/taxonomy-product_cat.php.
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
                <h1 class="title-page"><?php the_title(); ?></h1>
                <div class="filter-rows clearfix">
                    <div class="first-row clearfix">
                        <div class="title-filter">Сортировка:</div>
                        <div class="block-filter first  <?php   if( $_REQUEST['SET_PRICE_SORT']){ echo 'active'; } ?> " data-type="price">По цене <i class="fas fa-caret-up"></i></div>
                        <span>/</span>
                        <div class="block-filter first <?php   if( $_REQUEST['SET_BY_DATE']){ echo 'active'; } ?> " data-type="new">По новизне <i class="fas fa-caret-up"></i></div>
                        <span>/</span>
                        <div class="block-filter first <?php   if( $_REQUEST['SET_BY_NAME']){ echo 'active'; } ?> " data-type="name">По наименованию <i class="fas fa-caret-up"></i></div>
                    </div>
                    <div class="second-row">
                        <?php

                        $sizes = get_terms( 'pa_size' );


                        $terms = get_terms('product_tag' );

                        ?>
                        <div class="block-filter active"><i class="fas fa-sliders-h"></i> фильтр по характеристикам</div>
                        <div class="main-block-filters">
                            <i class="fas fa-times"></i>
                            <p>Бренды</p>
                            <select class="brend" name="brend">

                                <?php
                                foreach ($terms as $term ){
                                    if($_REQUEST['SET_BY_RAZMER'] ){
                                        if($_REQUEST['SET_BY_RAZMER'] == $term->slug){
                                            echo ' <option   value="'.$term->slug.'"    selected="selected">'.$term->name.'</option>';
                                        }else {
                                            echo ' <option value="'.$term->slug.'">'.$term->name.'</option>';
                                        }
                                    } else{
                                        echo ' <option value="'.$term->slug.'">'.$term->name.'</option>';
                                    }

                                }
                                ?>

                            </select>

                            <?php


                            /*
                             * <?php
                            $result = wc_get_attribute_taxonomies();
                            foreach ($result as $value){
                                ?>
                                <p><?=$value->attribute_label;?></p>
                                <select  data-params="SET_BY_<?=strtoupper($value->attribute_name);?>" class="select2  <?=$value->attribute_name;?>" name="<?=$value->attribute_name;?>">




                                    <?php
                                    $attr_ = get_terms('pa_'.$value->attribute_name);
                                    foreach ($attr_ as $attr_value ){
                                            echo ' <option value="'.$attr_value->slug.'">'.$attr_value->name.'</option>';

                                    }
                                    ?>

                                </select>
                                <?php
                            }
                            ?>

                             */
                            ?>



                            <p>Размер</p>
                            <select class="razmer" name="razmer">

                                <?php
                                foreach ($sizes as $size ){
                                    if($_REQUEST['SET_BY_BREND'] ){
                                        if($_REQUEST['SET_BY_BREND'] == $size->slug){
                                            echo ' <option   value="'.$size->slug.'"   selected="selected">'.$size->name.'</option>';
                                        }else {
                                            echo ' <option value="'.$size->slug.'">'.$size->name.'</option>';
                                        }
                                    }else{
                                        echo ' <option value="'.$size->slug.'">'.$size->name.'</option>';
                                    }
                                }
                                ?>

                            </select>

                            <a href="#" class="apply-fliter"><i class="fas fa-sliders-h"></i> Применить фильтр</a>
                            <a href="#" class="clean-fliter"><i class="fas fa-times"></i> Очистить</a>

                        </div>
                    </div>


                </div>
                <div class="row">
                    <?php woocommerce_product_loop_start(); ?>


                    <?php
                    $addparams = [];
                    $addparams1 = [];


                    if (!$_REQUEST['SET_PRICE_SORT']) {
                        $_REQUEST['SET_PRICE_SORT'] = 'ASC';
                    }
                    if (!$_REQUEST['SET_BY_DATE']) {
                        $_REQUEST['SET_BY_DATE'] = 'ASC';
                    }
                    if (!$_REQUEST['SET_BY_NAME']) {
                        $_REQUEST['SET_BY_NAME'] = 'ASC';
                    }
                    $argArray = [];
                    $tmpArray = [];
                    if($_REQUEST['SET_BY_RAZMER']){
                        $tmpArray = array(
                            array(
                                'taxonomy' => 'pa_size',
                                'field' => 'slug',
                                'terms' => $_REQUEST['SET_BY_BREND'],
                                'operator' => 'AND',
                            ),
                        );
                        array_push($argArray, $tmpArray);
                    }
                    if ($_REQUEST['SET_BY_BREND']) {
                        $tmpArray =  array(
                            'taxonomy' => 'product_tag',
                            'field' => 'slug',
                            'terms' => $_REQUEST['SET_BY_BREND'],
                            'operator' => 'AND',
                        );
                        array_push($argArray, $tmpArray);
                    }

                    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;


                    $page_object = get_queried_object();


                    $args = [
                        'post_type' => 'product',
                        'post_status' => 'publish',
                        'orderby' => array(
                            'title' => $_REQUEST['SET_BY_NAME'], 'date' => $_REQUEST['SET_BY_DATE']
                        ),
                        'orderby' => 'meta_value_num',
                        'order'   => $_REQUEST['SET_PRICE_SORT'],
                        'meta_key'  => '_price',
                        'tax_query' => array (
                            array (
                                'taxonomy' => $page_object->taxonomy,
                                'field' => 'slug',
                                'terms' => $page_object->slug,
                            ),
                            array(
                                'taxonomy' => 'product_tag',
                                'field' => 'slug',
                                'terms' => $_REQUEST['SET_BY_BREND'],
                                'operator' => 'AND',
                            ),
                            array(
                                'taxonomy' => 'pa_size',
                                'field' => 'slug',
                                'terms' => $_REQUEST['SET_BY_RAZMER'],
                                'operator' => 'AND',
                            ),
                        ),
                        'paged' => $paged
                    ];

                    $query = new WP_Query($args);



                    while ( $query->have_posts() ) : $query->the_post(); ?>
                    <?php
                        /**
                         * Hook: woocommerce_shop_loop.
                         *
                         * @hooked WC_Structured_Data::generate_product_data() - 10
                         */
                        do_action('woocommerce_shop_loop');

                        wc_get_template_part('content', 'product');?>

                    <?php endwhile; // end of the loop. ?>
                    <?php 	woocommerce_product_loop_end(); ?>
                </div>




            </div>

        </div>
    </div>


</div><!-- .wrap -->
