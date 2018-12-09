<?php
/*
 * Template Name: About Page
 */

get_header(); ?>

    <div class="wrap">
        <div id="primary" class="content-area about-page">
            <div class="container">
                <?php
                dimox_breadcrumbs();
                ?>
                <h1 class=" page-title"><?php the_title(); ?></h1>
                <?php while (have_posts()) : the_post(); ?>

                    <div class="content-about">
                        <?php the_content(); ?>
                    </div>
                    <div class="image-about">
                        <?php $image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()), 'full'); ?>
                        <img src="<?= $image ?>"/>
                    </div>
                <?php endwhile; ?>
                <h2 class=" title-section">отзывы</h2>
                <div class="row-review clearfix">
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
                        $image   = aq_resize( $img_url, 253, 358, true );
                        echo '

                        <div class="row-review-item">
                            <a href="'.$img_url.'" class="review-item">
                                <div class="overlay-review"><i class="fas fa-search-plus"></i></div>
                                <img src="'.$image.'"/>
                            </a>
                        </div>
                        
                        ';

                    endwhile;
                    ?>
                </div>


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
