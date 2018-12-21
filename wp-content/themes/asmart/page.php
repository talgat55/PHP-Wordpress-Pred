<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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
                    <?php
                    while (have_posts()) : the_post();

                        the_content();

                    endwhile;  ?>
                </div>
            </div>
        </div><!-- #primary -->
    </div><!-- .wrap -->

<?php get_footer();
