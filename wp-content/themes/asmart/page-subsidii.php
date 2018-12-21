<?php
/*
 * Template Name: Страница Субсидий
 */

get_header(); ?>

    <div id="primary" class="content-area subcidii-page">
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
                <div class="subcidii-block">
                    <h3>
                        Скачать документы
                    </h3>
                    <?php
//
//                    $args = array(
//                        'posts_per_page' => '10',
//                        'post_type' => 'qa_type',
//                        'paged'          => ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1
//                    );
//
//                    $the_query = new WP_Query($args);
//
//                    if ( $the_query->have_posts() ) :
//                    while ($the_query->have_posts()) :
//                        $the_query->the_post();
//                        $post_id = $the_query->post->ID;
//
//
//
//
//
//                    endwhile;
//
//                    endif;
                    ?>


                </div>

            </div>
        </div>

    </div>

<?php get_footer();
