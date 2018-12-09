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
<?php
if (is_product_category()) {

    wc_get_template_part('taxonomy-product_cat');

} else {

    ?>
    <div class="wrap">
        <div id="primary" class="content-area main-page  basic-page">
            <div class="container">
                <?php


                dimox_breadcrumbs();
                ?>
                <h1 class=" page-title"><?php the_title(); ?></h1>
                <?php
                while (have_posts()) : the_post();

                    the_content();

                endwhile; // End of the loop.
                ?>

            </div><!-- #main -->
        </div><!-- #primary -->
    </div><!-- .wrap -->
    <?php
}
?>
<?php get_footer();
