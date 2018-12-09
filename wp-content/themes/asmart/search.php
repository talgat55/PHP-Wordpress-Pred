<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap">
    <div class="container">
    <h1> <?php printf( __( 'Результаты поиска: %s', 'light' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
    </div>
    <div id="primary" class="content-area about-page">
        <div class="container">
        <ul class="list-search-result">
		<?php
		if ( have_posts() ) :
			/* Start the Loop */
			while ( have_posts() ) : the_post();


			echo '
			<li>  
			<a href="'.get_the_permalink().'">
			    '.get_the_title().'
            </a>
			</li>
			';

			endwhile; // End of the loop.



		else :

		endif;
		?>
        </ul>
	</div>
	</div>
	<?php get_sidebar(); ?>
</div><!-- .wrap -->

<?php get_footer();
