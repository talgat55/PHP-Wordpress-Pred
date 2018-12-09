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
	<div id="primary" class="content-area">


			<?php
			/* Start the Loop */
            if ( is_singular( 'product' ) ) {
                wc_get_template_part( 'single-product' );

            }else if(is_singular( 'post' ) ){

                wc_get_template_part( 'template/single-content' );
            }else if(is_singular( 'service' ) ){

                wc_get_template_part( 'template/service-content' );
            }else{
                while ( have_posts() ) : the_post();

                    the_content();


                endwhile; // End of the loop.
            }

			?>

	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- .wrap -->

<?php get_footer();
