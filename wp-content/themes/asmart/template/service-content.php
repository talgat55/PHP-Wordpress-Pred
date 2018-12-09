<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<div class="single-service">
    <div class="container">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php dimox_breadcrumbs(); ?>
            <h1 class=" page-title"><?php the_title(); ?></h1>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php $url = get_field('image_detail'); ?>
                <img src="<?php echo $url; ?>"/>
                <div class="entry-content">
                    <div class="news-single-block">
                        <h3>Другие услуги</h3>
                        <ul class="list-related">
                        <?php
                        $args = array(
                            'posts_per_page' => -1,
                            'post__not_in' => array(get_the_ID()),
                            'post_type' => 'service'
                        );
                            $my_query = new WP_Query($args);
                            if ($my_query->have_posts()) {
                                while ($my_query->have_posts()) : $my_query->the_post(); ?>
                                    <a href="<?php the_permalink() ?>" rel="bookmark"
                                       title=" <?php the_title_attribute(); ?>">- <span><?php the_title(); ?></span></a>

                                <?php
                                endwhile;
                            }
                            wp_reset_query();
                        ?>
                        </ul>

                    </div>
                    <?php the_content(); ?>
                </div><!-- .entry-content -->
            </article><!-- #post-## -->
        <?php endwhile; endif; ?>
    </div>
</div>