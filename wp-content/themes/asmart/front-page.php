<?php
/*
 * Template Name: Домашняя страница
 */


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

                        <div class="home-text-slider-wallpaer">
                            <div class="overlay-slider"></div>
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

                    </div>
                    <div class="col-lg-3 col-md-3  col-sm-12 col-xs-12">
                        <div class="anonuncer-walpaper">
                            <div class="anonuncer-walpaper-title">
                                <h3>Объявления</h3>
                            </div>
                            <div class="overlay-slider"></div>
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
                                                        <a href="' . get_the_permalink($post_id_slider) . '" >  
                                                            <div class="text-slider-date">' . get_the_date('d.m.Y', $post_id_slider) . '</div>
                                                            <div class="text-slider-title">' . get_the_title($post_id_slider) . '</div> 
                                                        </a>
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
                                        <div class="predprinimatel-img-block" style="background: url(' . $img_url . ') no-repeat;"></div>
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
                        <a href="/news" class="link-to-all">
                            Перейти ко всем новостям
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="point-growth-section">

            <div class="container">
                <div class="row">
                    <div class="margin-top-60 margin-bottom-60 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="row  img-overlay">
                            <img src="<?php echo get_theme_file_uri('/assets/images/pointimage.jpg') ?>" alt="Картинка">
                        </div>
                    </div>
                    <div class="  margin-bottom-60 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="pointer-text-block">
                                <h2 class="page-title">
                                    Точка роста
                                </h2>
                                <div class="title-separate"></div>
                                <p>
                                    Узнавание бренда категорически поддерживает имидж. Практика однозначно показывает,
                                    что
                                    таргетирование программирует креатив, невзирая на действия конкурентов. Не факт, что
                                    разработка медиаплана деятельно усиливает комплексный анализ ситуации, полагаясь на
                                    инсайдерскую информацию. В соответствии с законом Ципфа, презентация консолидирует
                                    инструмент маркетинга.
                                    <br/>
                                    <br/>
                                    Искусство медиапланирования достижимо в разумные сроки. Емкость рынка концентрирует
                                    из
                                    ряда вон выходящий нестандартный подход. Рекламная заставка, суммируя приведенные
                                    примеры, слабо охватывает продвигаемый сегмент рынка.
                                </p>
                                <a href="/point-raise" class="link-predprinimatel-detail">Узнать больше</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="qa-section">

            <div class="container">
                <div class="row">
                    <div class="margin-top-60 margin-bottom-60 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="row">
                            <h2 class="page-title  margin-top-0">
                                Вопрос-ответ
                            </h2>
                            <div class="title-separate"></div>
                            <div class="qa-block">
                                <?php
                                $args = array(
                                'posts_per_page' => '4',
                                'post_type' => 'qa_type'
                                );

                                $the_query = new WP_Query($args);

                                while ($the_query->have_posts()) :
                                $the_query->the_post();
                                $post_id = $the_query->post->ID;



                                //$image   = aq_resize( $img_url, 1200, 800, true ); // Resize & crop img
                                echo '
                                <div class="block-qa-wrap">
                                    <div class="title-accordion">
                                        '.get_the_title($post_id).'<i class="fas fa-chevron-circle-down"></i>
                                    </div>
                                    <div class="content-qa">
                                        '.get_the_content($post_id).'
                                    </div>
                                </div>
                                ';


                                endwhile;
                                ?>

                            </div>

                        </div>
                    </div>
                    <div class="margin-top-60  margin-bottom-60 col-lg-6 col-md-6 col-sm-12 col-xs-12">

                        <div class="form-overlay">
                            <?= do_shortcode('[contact-form-7 id="41" title="Contact form 1"  html_class="form form-feedback" ]'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="contact-row  margin-bottom-60">
            <div class="container">
                <div class="row">
                    <div class="clearfix  margin-top-60">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <h2 class="page-title  margin-top-0">
                                Контакты
                            </h2>
                            <div class="title-separate"></div>


                            <div class="phone">
                                <img src="<?php echo get_theme_file_uri('/assets/images/phone.png') ?>"
                                     alt="Иконка телефона">
                                <a href="tel:8 800 312 55 12">8 800 312 55 12</a>
                                <p>08:00 — 18:00</p>
                            </div>
                            <div class="location">
                                <img src="<?php echo get_theme_file_uri('/assets/images/geo.png') ?>"
                                     alt="Иконка локации">
                                <div>
                                    <span>г. Омск</span>
                                    <p>
                                        ул. Лермонтова, 171А
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                            <div id="map"  class="map-holder">
                                <a href="https://yandex.ru/maps/66/omsk/?ll=73.426971%2C54.984667&mode=search&poi%5Bpoint%5D=73.362665%2C54.988775&poi%5Buri%5D=ymapsbm1%3A%2F%2Forg%3Foid%3D1171876261&sll=73.374444%2C54.987655&sspn=0.060296%2C0.021321&text=%D1%83%D0%BB.%20%D0%9B%D0%B5%D1%80%D0%BC%D0%BE%D0%BD%D1%82%D0%BE%D0%B2%D0%B0%2C%20171%D0%90%2C%20%D0%9E%D0%BC%D1%81%D0%BA&z=17"   target="_blank" class="maps-link">
                                    Посмотреть на карте
                                </a>
                            </div>
                        </div>


                    </div>

                </div>
            </div>

        </section>


    </div><!-- #primary -->

<?php get_footer();
