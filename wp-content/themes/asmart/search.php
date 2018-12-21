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
    <div id="primary" class="content-area search-page">
        <div class="container">
            <div class="row">
                <?php dimox_breadcrumbs(); ?>
                <h1 class="page-title">
                    <?php printf( __( 'Результаты поиска: %s', 'light' ), '<span>' . get_search_query() . '</span>' ); ?>
                </h1>
                <div class="title-separate"></div>
                <div class="clearfix">
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
                            echo '<p>По данномму запросу ничего не найдено</p>';
                        endif;
                        ?>
                    </ul>
                </div>


            </div>
        </div>

    </div>


<?php get_footer();
