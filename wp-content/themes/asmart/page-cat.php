<?php
/*
 * Template Name: Product Page
 */

get_header(); ?>

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
                                                echo ' <option   value="'.$term->slug.'"   selected>'.$term->name.'</option>';
                                            }else {
                                                echo ' <option value="'.$term->slug.'">'.$term->name.'</option>';
                                            }
                                        } else{
                                            echo ' <option value="'.$term->slug.'">'.$term->name.'</option>';
                                        }

                                    }
                                    ?>

                                </select>
                                <p>Размер</p>
                                <select class="razmer" name="razmer">

                                    <?php
                                    foreach ($sizes as $size ){
                                        if($_REQUEST['SET_BY_BREND'] ){
                                            if($_REQUEST['SET_BY_BREND'] == $size->slug){
                                                echo ' <option   value="'.$size->slug.'"  selected>'.$size->name.'</option>';
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
                        <?php wc_get_template_part('archive-product'); ?>
                    </div>




                </div>

            </div>
        </div>


    </div><!-- .wrap -->

<?php get_footer();
