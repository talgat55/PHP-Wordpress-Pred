<?php
/*
 * Template Name:  О нас
 */

get_header(); ?>

   <div id="primary" class="content-area about-page">
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


           </div>
       </div>

    </div>

<?php get_footer();
