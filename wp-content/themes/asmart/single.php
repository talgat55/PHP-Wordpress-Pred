<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

    <div class="wrap">
        <div id="primary" class="content-area  basic-page">
            <div class="container">

                <div class="row">
                    <?php dimox_breadcrumbs(); ?>

                    <h1 class=" page-title"><?php the_title(); ?></h1>

                    <div class="title-separate"></div>
                    <?php  while (have_posts()) : the_post();  ?>

                        <img  class="single-img" src="<?= wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()), 'full'); ?>"  alt="<?php the_title(); ?>" />

                        <?php the_content();  ?>

                    <?php endwhile;  ?>

                </div>

            </div>
        </div><!-- #primary -->
    </div><!-- .wrap -->

<?php get_footer();
