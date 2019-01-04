<?php
/*
 * Template Name: Страница новостей
 */

get_header(); ?>

    <div id="primary" class="content-area news-page">
        <div class="container">
            <div class="row">
                <?php dimox_breadcrumbs(); ?>
                <h1 class="page-title">
                    <?php echo get_the_title(); ?>
                </h1>
                <div class="title-separate"></div>
                <div class="clearfix  margin-top-40  predprinimatel-class">
                    <div class="row">
                        <?php
                        $args = array(
                            'posts_per_page' => '10',
                            'post_type' => 'post',
                            'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1
                        );
                        $the_query = new WP_Query($args);

                        if ($the_query->have_posts()) :
                            while ($the_query->have_posts()) :
                                $the_query->the_post();
                                $post_id = $the_query->post->ID;

                                $img_url = wp_get_attachment_url(get_post_thumbnail_id($post_id), 'full');
                                echo ' 
                                     
                                    <div class="predprinimatel-block  col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="predprinimatel-img-block" style="background: url(' . $img_url . ') no-repeat;"></div>
                                        <div class="predprinimatel-content">
                                            <div class="date-predprinimatel">' . get_the_date('d.m.Y', $post_id) . '</div>
                                            <h3 class="predprinimatel-title">' . get_the_title($post_id) . '</h3>
                                            <div class="predprinimatel-excerpt">
                                                ' . my_string_limit_words(get_the_content($post_id), '16') . '
                                            </div>
                                            <a href="' . get_the_permalink($post_id) . '" class="link-predprinimatel-detail">Читать далее</a>
                                        </div>
        
                                    </div>
                                     ';


                            endwhile;
                            $GLOBALS['wp_query'] = $the_query;
                            the_posts_pagination([
                                'show_all' => false,
                                'prev_text' => __('Предыдущая страница', 'light'),
                                'next_text' => __('Следующая страница', 'light'),
                                'end_size' => '2',     // количество страниц на концах
                                'mid_size' => '2',
                                'screen_reader_text' => __(' ', 'light'),
                            ]);
                        endif;
                        ?>

                    </div>
                </div>


            </div>
        </div>

    </div>

<?php get_footer();
