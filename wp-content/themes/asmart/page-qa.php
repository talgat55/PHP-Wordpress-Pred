<?php
/*
 * Template Name: Страница вопрос ответ
 */

get_header(); ?>

    <div id="primary" class="content-area qa-page">
        <div class="container">
            <div class="row">
                <?php dimox_breadcrumbs(); ?>
                <h1 class="page-title">
                    <?php echo get_the_title(); ?>
                </h1>
                <div class="title-separate"></div>
                <div class="clearfix">
                    <?php   while (have_posts()) : the_post();

                        the_content();

                    endwhile; // End of the loop.
                    ?>
                </div>
                <div class="qa-block">
                    <?php

                    $args = array(
                        'posts_per_page' => '10',
                        'post_type' => 'qa_type',
                        'paged'          => ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1
                    );

                    $the_query = new WP_Query($args);

                    if ( $the_query->have_posts() ) :
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
                        $GLOBALS['wp_query'] = $the_query;
                        the_posts_pagination([
                            'show_all'     => false,
                            'prev_text'          => __( 'Предыдущая страница', 'light' ),
                            'next_text'          => __( 'Следующая страница', 'light' ),
                            'end_size'     => '2',     // количество страниц на концах
                            'mid_size'     => '2',
                            'screen_reader_text' => __( ' ' , 'light'),
                        ] );
                    endif;
                    ?>


                </div>

            </div>
        </div>

    </div>

<?php get_footer();
