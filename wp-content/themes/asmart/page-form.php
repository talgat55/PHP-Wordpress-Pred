<?php
/*
 * Template Name: Page builder
 */

get_header(); ?>

    <div class="wrap">
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
        <div class="content  page-build-form">
            <div class="container clearfix">
                <div class="col-md-12 clearfix">
                    <?php $terms = get_terms('product_cat'); ?>
                    <?php dimox_breadcrumbs(); ?>
                    <h1 class="title-page page-title">конструктор формы</h1>
                    <ul class="filter-form-row">
                        <li>
                            <a class="form-tab active" href="#">Форма</a>
                        </li>
                        <li>
                            <a class="kostum-tab" href="#">Костюмы</a>
                        </li>
                    </ul>
                    <?php


                    $id_top = intVal(26);
                    $id_center = intVal(27);
                    $id_bottom = intVal(23);
                    $categories_top = get_terms(array(
                        'taxonomy' => 'product_cat',
                        'parent' => intVal($id_top)
                    ));
                    $categories_center = get_terms(array(
                        'taxonomy' => 'product_cat',
                        'parent' => intVal($id_center)
                    ));
                    $categories_bottom = get_terms(array(
                        'taxonomy' => 'product_cat',
                        'parent' => intVal($id_bottom)
                    ));

                    ?>
                    <div class="row ">
                        <div class="form-part form active-tab-form-page clearfix">

                            <div class="left-form-block">
                                <div class="cat-form-block">
                                    <h3>Футболки</h3>
                                    <ul class="clearfix">

                                        <?php foreach ($categories_top as $key => $cat) {
                                            if ($key == 0) {
                                                $active = 'active';
                                            } else {
                                                $active = '';
                                            }
                                            echo '
                                        <li >
                                            <a href="#" class="link-form-item ' . $active . '" data-type="top" data-idcat="' . $id_top . '"  data-slug="' . $cat->slug . '">
                                                ' . $cat->name . '
                                            </a>
                                        </li>
                                        ';

                                        } ?>
                                    </ul>
                                </div>
                                <div class="cat-form-block">
                                    <h3>Шорты</h3>
                                    <ul class="clearfix">

                                        <?php foreach ($categories_center as $key => $cat) {
                                            if ($key == 0) {
                                                $active = 'active';
                                            } else {
                                                $active = '';
                                            }
                                            echo '
                                        <li >
                                            <a href="#" class="link-form-item ' . $active . '" data-type="center"  data-idcat="' . $id_center . '"   data-slug="' . $cat->slug . '">
                                                ' . $cat->name . '
                                            </a>
                                        </li>
                                        ';

                                        } ?>
                                    </ul>
                                </div>
                                <div class="cat-form-block">
                                    <h3>гетры</h3>
                                    <ul class="clearfix">

                                        <?php foreach ($categories_bottom as $key => $cat) {
                                            if ($key == 0) {
                                                $active = 'active';
                                            } else {
                                                $active = '';
                                            }
                                            echo '
                                        <li >
                                            <a href="#" class="link-form-item ' . $active . '"  data-idcat="' . $id_bottom . '"   data-type="bottom"  data-slug="' . $cat->slug . '">
                                                ' . $cat->name . '
                                            </a>
                                        </li>
                                        ';

                                        } ?>
                                    </ul>
                                </div>


                            </div>

                            <div class="center-form-block">
                                <?php
                                //    foreach ($categories_top[0] as $key => $cat) {
                                //                            echo '<pre>';
                                //                            print_r( $categories_top[0]);
                                //                            echo '</pre>';
                                $args = [
                                    'post_type' => 'product',
                                    'tax_query' => array(
                                        'relation' => 'AND',
                                        array(
                                            'taxonomy' => 'product_cat',
                                            'field' => 'slug',
                                            'terms' => $categories_top[0]->slug
                                        )
                                    ),
                                    'posts_per_page' => -1,
                                ];

                                $query = new WP_Query($args);

                                if ($query->have_posts()) :

                                    echo '<div class="content-top-slider-center display ' . $categories_top[0]->slug . '" data-slug="' . $categories_top[0]->slug . '">
                                                <ul class="top-slider" data-slider="top-slider">';
                                    while ($query->have_posts()) :
                                        $query->the_post();
                                        $post_id = $query->post->ID;

                                        $img_url = wp_get_attachment_url(get_post_thumbnail_id($post_id), 'full');
                                        $img_url = aq_resize($img_url, 200, 250, true);

                                        echo ' 
                                                    <li data-title="' . get_the_title($post_id) . '" data-url="' . get_the_permalink($post_id) . '">
                                                        <img src="' . $img_url . '" alt="' . get_the_title($post_id) . '"/>
                                                    </li> 
                                        ';

                                    endwhile;

                                    echo '  </ul>
                                            </div>';
                                endif;


                                //     }
                                //
                                // Center
                                //
                                //   foreach ($categories_center[0] as $key => $cat) {

                                $args = [
                                    'post_type' => 'product',
                                    'tax_query' => array(
                                        'relation' => 'AND',
                                        array(
                                            'taxonomy' => 'product_cat',
                                            'field' => 'slug',
                                            'terms' => $categories_center[0]->slug
                                        )
                                    ),
                                    'posts_per_page' => -1,
                                ];

                                $query = new WP_Query($args);

                                if ($query->have_posts()) :

                                    echo '<div class="content-center-slider-center display ' . $categories_center[0]->slug . '" data-slug="' . $categories_center[0]->slug . '">
                                                <ul class="center-slider" data-slider="center-slider">';
                                    while ($query->have_posts()) :
                                        $query->the_post();

                                        $post_id = $query->post->ID;
                                        $img_url = wp_get_attachment_url(get_post_thumbnail_id($post_id), 'full');
                                        //   $img_url = aq_resize($img_url, 200, 250, true);
                                        $img_url = aq_resize($img_url, 200, 210, true);

                                        echo '
                                            
                
                                                    <li data-title="' . get_the_title($post_id) . '" data-url="' . get_the_permalink($post_id) . '">
                                                        <img src="' . $img_url . '" alt="' . get_the_title($post_id) . '"/>
                                                    </li>
                                                   
                                              
                                        ';

                                    endwhile;

                                    echo '  </ul>
                                            </div>';
                                endif;


                                //    }
                                //
                                // Bottom
                                //
                                //     foreach ($categories_bottom[0] as $key => $cat) {

                                $args = [
                                    'post_type' => 'product',
                                    'tax_query' => array(
                                        'relation' => 'AND',
                                        array(
                                            'taxonomy' => 'product_cat',
                                            'field' => 'slug',
                                            'terms' => $categories_bottom[0]->slug
                                        )
                                    ),
                                    'posts_per_page' => -1,
                                ];

                                $query = new WP_Query($args);

                                if ($query->have_posts()) :

                                    echo '<div class="content-bottom-slider-center display ' . $categories_bottom[0]->slug . '" data-slug="' . $categories_bottom[0]->slug . '">
                                                <ul class="bottom-slider" data-slider="bottom-slider">';
                                    while ($query->have_posts()) :
                                        $query->the_post();

                                        $post_id = $query->post->ID;
                                        $img_url2 = wp_get_attachment_url(get_post_thumbnail_id($post_id), 'full');
                                        $img_url = aq_resize($img_url2, 200, 250, true);
                                        echo '
                                            
                
                                                    <li data-title="' . get_the_title($post_id) . '" data-url="' . get_the_permalink($post_id) . '">
                                                        <img src="' . $img_url . '" alt="' . get_the_title($post_id) . '"/>
                                                    </li>
                                                   
                                              
                                        ';

                                    endwhile;

                                    echo '  </ul>
                                            </div>';
                                endif;


                                // }
                                ?>


                            </div>

                            <div class="right-form-block">
                                <div class="block-right  right-top">
                                    <?php

                                    //   foreach ($categories_top[0] as $key => $cat) {

                                    $args = [
                                        'post_type' => 'product',
                                        'tax_query' => array(
                                            'relation' => 'AND',
                                            array(
                                                'taxonomy' => 'product_cat',
                                                'field' => 'slug',
                                                'terms' => $categories_top[0]->slug
                                            )
                                        ),
                                        'posts_per_page' => -1,
                                    ];

                                    $query = new WP_Query($args);

                                    if ($query->have_posts()) :


                                        echo '<div class="content-top-slider-center-nav display ' . $categories_top[0]->slug . '" data-slug="' . $categories_top[0]->slug . '">
                                                 <div class="title-section-sub-section">
                                                    
                                                </div>
                                                
                                                <ul class="top-slider-nav clearfix" data-slider="top-slider">';
                                        $i = 0;
                                        while ($query->have_posts()) :
                                            $query->the_post();

                                            $post_id = $query->post->ID;
                                            $img_url = wp_get_attachment_url(get_post_thumbnail_id($post_id), 'full');
                                            $img_url = aq_resize($img_url, 50, 62, true);
                                            if ($i == 0) {
                                                $classactive = 'class="active"';
                                            } else {
                                                $classactive = '';
                                            }

                                            echo ' 
                                                    <li  ' . $classactive . '>
                                                        <img src="' . $img_url . '" alt="' . get_the_title($post_id) . '"/>
                                                    </li> 
                                            ';
                                            $i++;
                                        endwhile;

                                        echo '  </ul>
                                            </div>';
                                    endif;


                                    //    }


                                    ?>

                                </div>
                                <?php
                                //
                                // Center
                                //
                                ?>

                                <div class="block-right">

                                    <?php
                                    //   foreach ($categories_center[0] as $key => $cat) {

                                    $args = [
                                        'post_type' => 'product',
                                        'tax_query' => array(
                                            'relation' => 'AND',
                                            array(
                                                'taxonomy' => 'product_cat',
                                                'field' => 'slug',
                                                'terms' => $categories_center[0]->slug
                                            )
                                        ),
                                        'posts_per_page' => -1,
                                    ];

                                    $query = new WP_Query($args);

                                    if ($query->have_posts()) :


                                        echo '<div class="content-center-slider-center-nav display ' . $categories_center[0]->slug . '" data-slug="' . $categories_center[0]->slug . '">
                                                 <div class="title-section-sub-section">
                                                    
                                                </div>
                                                
                                                <ul class="center-slider-nav clearfix" data-slider="center-slider">';
                                        $i = 0;
                                        while ($query->have_posts()) :
                                            $query->the_post();

                                            $post_id = $query->post->ID;
                                            $img_url = wp_get_attachment_url(get_post_thumbnail_id($post_id), 'full');
                                            $img_url = aq_resize($img_url, 50, 62, true);
                                            if ($i == 0) {
                                                $classactive = 'class="active"';
                                            } else {
                                                $classactive = '';
                                            }

                                            echo ' 
                                                    <li  ' . $classactive . '>
                                                        <img src="' . $img_url . '" alt="' . get_the_title($post_id) . '"/>
                                                    </li> 
                                            ';
                                            $i++;
                                        endwhile;

                                        echo '  </ul>
                                            </div>';
                                    endif;


                                    //    }

                                    ?>
                                </div>
                                <?php
                                //
                                // Bottom
                                //
                                ?>
                                <div class="block-right">
                                    <?php
                                    //    foreach ($categories_bottom[0] as $key => $cat) {

                                    $args = [
                                        'post_type' => 'product',
                                        'tax_query' => array(
                                            'relation' => 'AND',
                                            array(
                                                'taxonomy' => 'product_cat',
                                                'field' => 'slug',
                                                'terms' => $categories_bottom[0]->slug
                                            )
                                        ),
                                        'posts_per_page' => -1,
                                    ];

                                    $query = new WP_Query($args);

                                    if ($query->have_posts()) :


                                        echo '<div class="content-bottom-slider-center-nav display ' . $categories_bottom[0]->slug . '" data-slug="' . $categories_bottom[0]->slug . '">
                                                 <div class="title-section-sub-section">
                                                    
                                                </div>
                                                
                                                <ul class="bottom-slider-nav clearfix" data-slider="bottom-slider">';
                                        $i = 0;
                                        while ($query->have_posts()) :
                                            $query->the_post();

                                            $post_id = $query->post->ID;
                                            $img_url = wp_get_attachment_url(get_post_thumbnail_id($post_id), 'full');
                                            $img_url = aq_resize($img_url, 50, 62, true);
                                            if ($i == 0) {
                                                $classactive = 'class="active"';
                                            } else {
                                                $classactive = '';
                                            }

                                            echo ' 
                                                    <li  ' . $classactive . '>
                                                        <img src="' . $img_url . '" alt="' . get_the_title($post_id) . '"/>
                                                    </li> 
                                            ';
                                            $i++;
                                        endwhile;

                                        echo '  </ul>
                                            </div>';
                                    endif;


                                    //      }

                                    ?>
                                </div>

                            </div>


                        </div>
                        <div class="form-part kostum clearfix">

                            <div class="left-form-block">
                                <div class="cat-form-block">
                                    <h3>Футболки 2</h3>
                                    <ul class="clearfix">

                                        <?php foreach ($categories_top as $key => $cat) {
                                            if ($key == 0) {
                                                $active = 'active';
                                            } else {
                                                $active = '';
                                            }
                                            echo '
                                        <li >
                                            <a href="#" class="link-form-item ' . $active . '" data-type="top" data-idcat="' . $id_top . '"  data-slug="' . $cat->slug . '">
                                                ' . $cat->name . '
                                            </a>
                                        </li>
                                        ';

                                        } ?>
                                    </ul>
                                </div>
                                <div class="cat-form-block">
                                    <h3>Шорты 2</h3>
                                    <ul class="clearfix">

                                        <?php foreach ($categories_center as $key => $cat) {
                                            if ($key == 0) {
                                                $active = 'active';
                                            } else {
                                                $active = '';
                                            }
                                            echo '
                                        <li >
                                            <a href="#" class="link-form-item ' . $active . '" data-type="center"  data-idcat="' . $id_center . '"   data-slug="' . $cat->slug . '">
                                                ' . $cat->name . '
                                            </a>
                                        </li>
                                        ';

                                        } ?>
                                    </ul>
                                </div>
                                <div class="cat-form-block">
                                    <h3>гетры</h3>
                                    <ul class="clearfix">

                                        <?php foreach ($categories_bottom as $key => $cat) {
                                            if ($key == 0) {
                                                $active = 'active';
                                            } else {
                                                $active = '';
                                            }
                                            echo '
                                        <li >
                                            <a href="#" class="link-form-item ' . $active . '"  data-idcat="' . $id_bottom . '"   data-type="bottom"  data-slug="' . $cat->slug . '">
                                                ' . $cat->name . '
                                            </a>
                                        </li>
                                        ';

                                        } ?>
                                    </ul>
                                </div>


                            </div>

                            <div class="center-form-block">
                                <?php
                                //    foreach ($categories_top[0] as $key => $cat) {
                                //                            echo '<pre>';
                                //                            print_r( $categories_top[0]);
                                //                            echo '</pre>';
                                $args = [
                                    'post_type' => 'product',
                                    'tax_query' => array(
                                        'relation' => 'AND',
                                        array(
                                            'taxonomy' => 'product_cat',
                                            'field' => 'slug',
                                            'terms' => $categories_top[0]->slug
                                        )
                                    ),
                                    'posts_per_page' => -1,
                                ];

                                $query = new WP_Query($args);

                                if ($query->have_posts()) :

                                    echo '<div class="content-top-slider-center display ' . $categories_top[0]->slug . '" data-slug="' . $categories_top[0]->slug . '">
                                                <ul class="top-slider" data-slider="top-slider">';
                                    while ($query->have_posts()) :
                                        $query->the_post();
                                        $post_id = $query->post->ID;

                                        $img_url = wp_get_attachment_url(get_post_thumbnail_id($post_id), 'full');
                                        $img_url = aq_resize($img_url, 200, 250, true);

                                        echo ' 
                                                    <li data-title="' . get_the_title($post_id) . '" data-url="' . get_the_permalink($post_id) . '">
                                                        <img src="' . $img_url . '" alt="' . get_the_title($post_id) . '"/>
                                                    </li> 
                                        ';

                                    endwhile;

                                    echo '  </ul>
                                            </div>';
                                endif;


                                //     }
                                //
                                // Center
                                //
                                //   foreach ($categories_center[0] as $key => $cat) {

                                $args = [
                                    'post_type' => 'product',
                                    'tax_query' => array(
                                        'relation' => 'AND',
                                        array(
                                            'taxonomy' => 'product_cat',
                                            'field' => 'slug',
                                            'terms' => $categories_center[0]->slug
                                        )
                                    ),
                                    'posts_per_page' => -1,
                                ];

                                $query = new WP_Query($args);

                                if ($query->have_posts()) :

                                    echo '<div class="content-center-slider-center display ' . $categories_center[0]->slug . '" data-slug="' . $categories_center[0]->slug . '">
                                                <ul class="center-slider" data-slider="center-slider">';
                                    while ($query->have_posts()) :
                                        $query->the_post();

                                        $post_id = $query->post->ID;
                                        $img_url = wp_get_attachment_url(get_post_thumbnail_id($post_id), 'full');
                                        //   $img_url = aq_resize($img_url, 200, 250, true);
                                        $img_url = aq_resize($img_url, 200, 210, true);

                                        echo '
                                            
                
                                                    <li data-title="' . get_the_title($post_id) . '" data-url="' . get_the_permalink($post_id) . '">
                                                        <img src="' . $img_url . '" alt="' . get_the_title($post_id) . '"/>
                                                    </li>
                                                   
                                              
                                        ';

                                    endwhile;

                                    echo '  </ul>
                                            </div>';
                                endif;


                                //    }
                                //
                                // Bottom
                                //
                                //     foreach ($categories_bottom[0] as $key => $cat) {

                                $args = [
                                    'post_type' => 'product',
                                    'tax_query' => array(
                                        'relation' => 'AND',
                                        array(
                                            'taxonomy' => 'product_cat',
                                            'field' => 'slug',
                                            'terms' => $categories_bottom[0]->slug
                                        )
                                    ),
                                    'posts_per_page' => -1,
                                ];

                                $query = new WP_Query($args);

                                if ($query->have_posts()) :

                                    echo '<div class="content-bottom-slider-center display ' . $categories_bottom[0]->slug . '" data-slug="' . $categories_bottom[0]->slug . '">
                                                <ul class="bottom-slider" data-slider="bottom-slider">';
                                    while ($query->have_posts()) :
                                        $query->the_post();

                                        $post_id = $query->post->ID;
                                        $img_url2 = wp_get_attachment_url(get_post_thumbnail_id($post_id), 'full');
                                        $img_url = aq_resize($img_url2, 200, 250, true);
                                        echo '
                                            
                
                                                    <li data-title="' . get_the_title($post_id) . '" data-url="' . get_the_permalink($post_id) . '">
                                                        <img src="' . $img_url . '" alt="' . get_the_title($post_id) . '"/>
                                                    </li>
                                                   
                                              
                                        ';

                                    endwhile;

                                    echo '  </ul>
                                            </div>';
                                endif;


                                // }
                                ?>


                            </div>

                            <div class="right-form-block">
                                <div class="block-right  right-top">
                                    <?php

                                    //   foreach ($categories_top[0] as $key => $cat) {

                                    $args = [
                                        'post_type' => 'product',
                                        'tax_query' => array(
                                            'relation' => 'AND',
                                            array(
                                                'taxonomy' => 'product_cat',
                                                'field' => 'slug',
                                                'terms' => $categories_top[0]->slug
                                            )
                                        ),
                                        'posts_per_page' => -1,
                                    ];

                                    $query = new WP_Query($args);

                                    if ($query->have_posts()) :


                                        echo '<div class="content-top-slider-center-nav display ' . $categories_top[0]->slug . '" data-slug="' . $categories_top[0]->slug . '">
                                                 <div class="title-section-sub-section">
                                                    
                                                </div>
                                                
                                                <ul class="top-slider-nav clearfix" data-slider="top-slider">';
                                        $i = 0;
                                        while ($query->have_posts()) :
                                            $query->the_post();

                                            $post_id = $query->post->ID;
                                            $img_url = wp_get_attachment_url(get_post_thumbnail_id($post_id), 'full');
                                            $img_url = aq_resize($img_url, 50, 62, true);
                                            if ($i == 0) {
                                                $classactive = 'class="active"';
                                            } else {
                                                $classactive = '';
                                            }

                                            echo ' 
                                                    <li  ' . $classactive . '>
                                                        <img src="' . $img_url . '" alt="' . get_the_title($post_id) . '"/>
                                                    </li> 
                                            ';
                                            $i++;
                                        endwhile;

                                        echo '  </ul>
                                            </div>';
                                    endif;


                                    //    }


                                    ?>

                                </div>
                                <?php
                                //
                                // Center
                                //
                                ?>

                                <div class="block-right">

                                    <?php
                                    //   foreach ($categories_center[0] as $key => $cat) {

                                    $args = [
                                        'post_type' => 'product',
                                        'tax_query' => array(
                                            'relation' => 'AND',
                                            array(
                                                'taxonomy' => 'product_cat',
                                                'field' => 'slug',
                                                'terms' => $categories_center[0]->slug
                                            )
                                        ),
                                        'posts_per_page' => -1,
                                    ];

                                    $query = new WP_Query($args);

                                    if ($query->have_posts()) :


                                        echo '<div class="content-center-slider-center-nav display ' . $categories_center[0]->slug . '" data-slug="' . $categories_center[0]->slug . '">
                                                 <div class="title-section-sub-section">
                                                    
                                                </div>
                                                
                                                <ul class="center-slider-nav clearfix" data-slider="center-slider">';
                                        $i = 0;
                                        while ($query->have_posts()) :
                                            $query->the_post();

                                            $post_id = $query->post->ID;
                                            $img_url = wp_get_attachment_url(get_post_thumbnail_id($post_id), 'full');
                                            $img_url = aq_resize($img_url, 50, 62, true);
                                            if ($i == 0) {
                                                $classactive = 'class="active"';
                                            } else {
                                                $classactive = '';
                                            }

                                            echo ' 
                                                    <li  ' . $classactive . '>
                                                        <img src="' . $img_url . '" alt="' . get_the_title($post_id) . '"/>
                                                    </li> 
                                            ';
                                            $i++;
                                        endwhile;

                                        echo '  </ul>
                                            </div>';
                                    endif;


                                    //    }

                                    ?>
                                </div>
                                <?php
                                //
                                // Bottom
                                //
                                ?>
                                <div class="block-right">
                                    <?php
                                    //    foreach ($categories_bottom[0] as $key => $cat) {

                                    $args = [
                                        'post_type' => 'product',
                                        'tax_query' => array(
                                            'relation' => 'AND',
                                            array(
                                                'taxonomy' => 'product_cat',
                                                'field' => 'slug',
                                                'terms' => $categories_bottom[0]->slug
                                            )
                                        ),
                                        'posts_per_page' => -1,
                                    ];

                                    $query = new WP_Query($args);

                                    if ($query->have_posts()) :


                                        echo '<div class="content-bottom-slider-center-nav display ' . $categories_bottom[0]->slug . '" data-slug="' . $categories_bottom[0]->slug . '">
                                                 <div class="title-section-sub-section">
                                                    
                                                </div>
                                                
                                                <ul class="bottom-slider-nav clearfix" data-slider="bottom-slider">';
                                        $i = 0;
                                        while ($query->have_posts()) :
                                            $query->the_post();

                                            $post_id = $query->post->ID;
                                            $img_url = wp_get_attachment_url(get_post_thumbnail_id($post_id), 'full');
                                            $img_url = aq_resize($img_url, 50, 62, true);
                                            if ($i == 0) {
                                                $classactive = 'class="active"';
                                            } else {
                                                $classactive = '';
                                            }

                                            echo ' 
                                                    <li  ' . $classactive . '>
                                                        <img src="' . $img_url . '" alt="' . get_the_title($post_id) . '"/>
                                                    </li> 
                                            ';
                                            $i++;
                                        endwhile;

                                        echo '  </ul>
                                            </div>';
                                    endif;


                                    //      }

                                    ?>
                                </div>

                            </div>


                        </div>

                    </div>


                </div>
                <div class="clearfix margin-top-20">
                    <div class="col-md-custom-bot">
                        <p>
                            Размеры и количество просим согласовывать
                            с <a href="#">менеджером по экипировке.</a>
                        </p>
                    </div>

                    <div class="col-md-custom-bot-2">

                        <a href="#" class="link-order-forms">Заказать такую форму</a>

                    </div>
                    <div class="overlay-layer-form-builder"></div>
                    <div class="modal-block-builder-form">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Заказать форму</h4>
                        <form id="orderform" method="post">
                            <div class="form-group one-but-bottom">
                                <input type="text" name="phonenumber" class="form-control one-but-phone"
                                       placeholder="Введите номер телефона" required>
                                <input type="hidden" name="topfield" class="top-field form-control">
                                <input type="hidden" name="centerfield" class="center-field form-control">
                                <input type="hidden" name="bottomfield" class="bottom-field form-control">


                                <button name="BUY_SUBMIT" class="btn btn-primary modal-btn-order-form" value="Y">
                                    Заказать
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="clearfix margin-top-2 bottom-table-form">
                    <p>
                        На командную экипировку при заказе <b>более 10 комплектов действует скидка:</b>
                    </p>
                    <div class="col-md-table">
                        <p>
                            До 30 000 р. — скидка 0%<br>
                            От 30 001 р. до 75 000 р. — скидка 35%<br>
                            От 75 001 р. до 150 000 р. — скидка 40%
                        </p>
                    </div>
                    <div class="col-md-table">
                        <p>
                            От 150 001 р. до 200 000 р. — скидка 45%<br>
                            От 200 001 р. и более — скидка 50%
                        </p>
                    </div>

                </div>


            </div>
        </div>


    </div><!-- .wrap -->

<?php get_footer();
