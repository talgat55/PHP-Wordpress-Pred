<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
    <div id="primary" class="content-area search-page">
        <div class="container">
            <div class="row">
                <?php dimox_breadcrumbs(); ?>
                <h1 class="page-title">
                    <?php _e( 'Oops! That page can&rsquo;t be found.', 'light' ); ?>
                </h1>
                <div class="title-separate"></div>
                <div class="clearfix">
                    <p><?php _e( 'It looks like nothing was found at this location', 'light' ); ?></p>
                </div>


            </div>
        </div>

    </div>


<?php get_footer();
