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
<div class="single-news">
    <div class="container">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php dimox_breadcrumbs(); ?>
            <h1 class=" page-title"><?php the_title(); ?></h1>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php if (has_post_thumbnail()) { ?>
                    <?php the_post_thumbnail(); ?>
                <?php } ?>
                <div class="entry-content">
                    <div class="news-single-block">
                        <h3>Дата новости</h3>
                        <p>
                            <?php echo get_the_date('d.m.Y'); ?>
                        </p>
                        <h3>Вам будет интересно</h3>
                        <ul class="list-related">
                        <?php
                        $tags = wp_get_post_tags($post->ID);
                        if ($tags) {
                            $first_tag = $tags[0]->term_id;
                            $args = array(
                                'tag__in' => array($first_tag),
                                'post__not_in' => array($post->ID),
                                'posts_per_page' => 5,
                                'caller_get_posts' => 1
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
                        }
                        ?>
                        </ul>

                    </div>
                    <?php the_content(); ?>
                </div><!-- .entry-content -->
            </article><!-- #post-## -->
        <?php endwhile; endif; ?>
    </div>
</div>