<?php


get_header(); ?>

    <div id="primary" class="content-area">
        <h1 class="hide-title">Главная страница</h1>

        <section class="slider-home">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-9  col-sm-12 col-xs-12">
                        <?php

                        $argsslideer = array(
                            'posts_per_page' => '10',
                            'post_type' => 'post'
                        );

                        $the_query_slider = new WP_Query($argsslideer);
                        ?>
                        <div class="home-image-slider">
                            <?php


                            while ($the_query_slider->have_posts()) :
                                $the_query_slider->the_post();
                                $post_id_slider = $the_query_slider->post->ID;

                                $img_url = wp_get_attachment_url(get_post_thumbnail_id($post_id_slider), 'full');


                                //$image   = aq_resize( $img_url, 1200, 800, true ); // Resize & crop img
                                echo '
                                    <div class="slider-item-walpaper"  style="background: url(' . $img_url . ')  no-repeat;">
                                            <div class="content-home-slider">  
                                                        <div class="first-title-slider">' . get_the_title($post_id_slider) . '</div>
                                                        <div class="second-text-slider">' . my_string_limit_words(get_the_content($post_id_slider), '24') . '</div>
                                                        <a class="link-slider" href="' . get_the_permalink($post_id_slider) . '">Читать далее</a> 
                                            </div>
                                     </div>';


                            endwhile;
                            ?>

                        </div>
                        <div class="home-text-slider">
                            <?php


                            while ($the_query_slider->have_posts()) :
                                $the_query_slider->the_post();
                                $post_id_slider = $the_query_slider->post->ID;


                                //$image   = aq_resize( $img_url, 1200, 800, true ); // Resize & crop img
                                echo '
                                    <div class="slider-text-walpaper" >
                                            <div class="content-home-slider"> 
                                                        <div class="text-slider-date">' . get_the_date('d.m.Y', $post_id_slider) . '</div>
                                                        <div class="text-slider-title">' . get_the_title($post_id_slider) . '</div> 
                                            </div>
                                     </div>';


                            endwhile;
                            ?>
                        </div>

                    </div>
                    <div class="col-lg-3 col-md-3  col-sm-12 col-xs-12">
                        <div class="anonuncer-walpaper">
                            <div class="anonuncer-walpaper-title">
                                <h3>Объявления</h3>
                            </div>
                            <div class="home-announcement-slider">
                                <?php

                                $argsslideer = array(
                                    'posts_per_page' => '10',
                                    'post_type' => 'announcement'
                                );

                                $the_query_slider = new WP_Query($argsslideer);


                                while ($the_query_slider->have_posts()) :
                                    $the_query_slider->the_post();
                                    $post_id_slider = $the_query_slider->post->ID;


                                    //$image   = aq_resize( $img_url, 1200, 800, true ); // Resize & crop img
                                    echo '
                                    <div class="slider-text-walpaper" >
                                            <div class="content-home-slider"> 
                                                        <div class="text-slider-date">' . get_the_date('d.m.Y', $post_id_slider) . '</div>
                                                        <div class="text-slider-title">' . get_the_title($post_id_slider) . '</div> 
                                            </div>
                                     </div>';


                                endwhile;
                                ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


        </section>
        <section class="our-section-predprinimatel">
            <div class="container">
                <div class="row">
                    <h2 class="page-title">
                        Наши предприниматели
                    </h2>
                    <div class="title-separate"></div>
                    <div class="clearfix margin-top-40  predprinimatel-class">
                        <div class="row">
                            <?php

                            $argsslideer = array(
                                'posts_per_page' => '3',
                                'post_type' => 'predprenimtels'
                            );

                            $the_query_slider = new WP_Query($argsslideer);


                            while ($the_query_slider->have_posts()) :
                                $the_query_slider->the_post();
                                $post_id_slider = $the_query_slider->post->ID;

                                $img_url = wp_get_attachment_url(get_post_thumbnail_id($post_id_slider), 'full');
                                echo ' 
                                     
                                    <div class="predprinimatel-block  col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="predprinimatel-img-block" style="background: url('.$img_url.') no-repeat;"></div>
                                        <div class="predprinimatel-content">
                                            <div class="date-predprinimatel">' . get_the_date('d.m.Y', $post_id_slider) . '</div>
                                            <h3 class="predprinimatel-title">' . get_the_title($post_id_slider) . '</h3>
                                            <div class="predprinimatel-excerpt">
                                                ' . my_string_limit_words(get_the_content($post_id_slider), '16') . '
                                            </div>
                                            <a href="' . get_the_permalink($post_id_slider) . '" class="link-predprinimatel-detail">Читать далее</a>
                                        </div>
        
                                    </div>
                                     ';


                            endwhile;
                            ?>

                        </div>
                    </div>
                        <div class="block-over">
                            <a href="#"  class="link-to-all">
                                Перейти ко всем новостям
                            </a>
                        </div>
                </div>
            </div>
        </section>
        <section class="service-row"
                 style="background: url(<?php echo get_theme_file_uri('/assets/images/bg-service.jpg'); ?>);">
            <h2 class="padding-top-60 title-section white" style="margin-top: 0;">наши услуги</h2>
            <div class="container">
                <div class="service-row-walp clearfix">
                    <?php

                    $argsservice = array(
                        'posts_per_page' => 4,
                        'post_type' => 'service'
                    );

                    $the_query_service = new WP_Query($argsservice);

                    if ($the_query_service->post_count == '4') {
                        $colmn = '3';
                    } elseif ($the_query_service->post_count == '3') {
                        $colmn = '4';
                    }

                    $i = 0;

                    while ($the_query_service->have_posts()) :
                        $the_query_service->the_post();
                        $post_id_service = $the_query_service->post->ID;

                        $img_url = wp_get_attachment_url(get_post_thumbnail_id($post_id_service), 'full');
                        $image = aq_resize($img_url, 190, 160, true);
                        echo '
                            <div class="col-md-' . $colmn . '">
                        ';
                        if ($i == '1' || $i == '3') {

                            $links = get_the_permalink($post_id_service);
                        } else {
                            $links = 'http://xn--80ablmatscnacsedop0q.xn--p1ai/razdel-v-razrabotke/';

                        }

                        echo '
                                <a href="' . $links . '" class="service-block">
                                    <div><h3>' . get_the_title($post_id_service) . '</h3></div>
                                    <img src="' . $image . '"/>
        
                                </a>

                            </div>
                                
                                ';

                        $i++;

                    endwhile;
                    ?>


                </div>
            </div>

        </section>
        <section class="review-row">
            <h2 class=" title-section">отзывы</h2>
            <div class="container">
                <div class="review-carousel">
                    <?php

                    $argsreview = array(
                        'posts_per_page' => -1,
                        'post_type' => 'review'
                    );

                    $the_query_review = new WP_Query($argsreview);

                    while ($the_query_review->have_posts()) :
                        $the_query_review->the_post();
                        $post_id_review = $the_query_review->post->ID;

                        $img_url = wp_get_attachment_url(get_post_thumbnail_id($post_id_review), 'full');
                        $image = aq_resize($img_url, 253, 358, true);
                        echo '

                        <div>
                            <a href="' . $img_url . '" class="review-item">
                                <div class="overlay-review"><i class="fas fa-search-plus"></i></div>
                                <img src="' . $image . '"/>
                            </a>
                        </div>
                        
                        ';

                    endwhile;
                    ?>
                </div>


            </div>
        </section>
        <?php /* <section class="partners-row"
                 style="background: url(<?php echo get_theme_file_uri('/assets/images/bg-part-compressor.jpg'); ?>);">
            <h2 class=" padding-top-60  title-section">наши партнеры</h2>
            <div class="container">
                <div class="parthers-carousel">
                    <?php

                    $argspartners = array(
                        'posts_per_page' => -1,
                        'post_type' => 'partners'
                    );

                    $the_query_partners = new WP_Query($argspartners);

                    while ($the_query_partners->have_posts()) :

                        $the_query_partners->the_post();
                        $post_id_partners = $the_query_partners->post->ID;

                        $img_url = wp_get_attachment_url(get_post_thumbnail_id($post_id_partners), 'full');
                        $image = aq_resize($img_url, 253, 358, true);
                        echo ' 
                            <div class="partner-item">
                                <img src="' . $image . '"/>
                            </div> 
                        ';

                    endwhile;
                    ?>

                </div>
            </div>
        </section> */ ?>
        <section class="social-row">
            <h2 class="  title-section">мы вконтакте</h2>
            <div class="container">
                <div id="vk_groups"></div>
            </div>
        </section>


    </div><!-- #primary -->

<?php get_footer();
