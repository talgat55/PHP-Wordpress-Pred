<?php
/*
 * Template Name: Contact Page
 */

get_header(); ?>

    <div class="wrap">
        <div id="primary" class="content-area contact-page">
            <div class="container">
                <?php
                dimox_breadcrumbs();
                ?>
                <h1 class=" page-title"><?php the_title(); ?></h1>
                <div class="contact-page-first-row">
                    <div class="center-sub-block">
                        <div class="center-sub-block-walp fisrt">
                            <div class="icon-block-header">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="text-block-header">
                                ТК "Казачья Слобода", 1 этаж
                                ул. Пушкина 59.
                            </div>

                        </div>
                    </div>
                    <div class="center-sub-block">
                        <div class="center-sub-block-walp">
                            <div class="icon-block-header">
                                <i class="far fa-clock"></i>
                            </div>
                            <div class="text-block-header">
                                Ежедневно<br>
                                10:00 — 18:00
                            </div>

                        </div>
                    </div>

                    <div class="center-sub-block">
                        <div class="center-sub-block-walp">
                            <div class="icon-block-header">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="text-block-header">
                                <a href="tel:8 (923) 676-33-89">8 (923) 676-33-89</a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="map-walp">
                    <div id="map"></div>
                </div>
                <h2 class=" title-section">реквизиты</h2>
                <?php

                $chet = get_field('chet', 'option');
                $full_name_bank = get_field('full_name_bank', 'option');
                $korespond_chet_bak = get_field('korespond_chet_bak', 'option');
                $bik = get_field('bik', 'option');
                ?>
                <ul class="rekvezit-row">
                    <li><span>Расчетный счет</span> <?php echo  $chet; ?></li>
                    <li><span>Полное наименование банка</span> <?php echo  $full_name_bank; ?></li>
                    <li><span>Корреспондентский счет банка</span> <?php echo  $korespond_chet_bak; ?></li>
                    <li><span>БИК</span> <?php echo  $bik; ?></li>

                </ul>


                <h2 class=" title-section">партнеры</h2>
                <div class="row-partners clearfix">
                    <?php

                    $argsreview = array(
                        'posts_per_page' => -1,
                        'post_type' => 'partners'
                    );

                    $the_query_review = new WP_Query($argsreview);

                    while ($the_query_review->have_posts()) :
                        $the_query_review->the_post();
                        $post_id_review = $the_query_review->post->ID;

                        $img_url = wp_get_attachment_url(get_post_thumbnail_id($post_id_review), 'full');

                        echo ' 
                            <div class="partner-item-row">
                                <img src="'.$img_url.'"/>
                            </div> 
                        ';

                    endwhile;
                    ?>
                </div>
                <h2 class=" title-section">связаться с нами</h2>

                <?php echo do_shortcode('[contact-form-7 id="157"  html_class="form-feedback clearfix" title="Контактная форма 1"]'); ?>


            </div>
        </div>
    </div>

<?php get_footer();
