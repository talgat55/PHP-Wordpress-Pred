<?php
/*
 * Template Name: News Page
 */

get_header(); ?>

    <div class="wrap">
        <div id="primary" class="content-area news-page">
            <div class="container">
                <?php
                dimox_breadcrumbs();
                ?>
                <h1 class=" page-title">Новости</h1>
                <?php
                $args = [
                    'post_type' => 'post',
                ];

                $query = new WP_Query($args);

                echo '<ul class="news-list">';
                while ($query->have_posts()) : $query->the_post();
                    $post_id = $query->post->ID;

                    $img_url = wp_get_attachment_url( get_post_thumbnail_id($post_id),'full');
                    ?>
                    <li class="news-item" style="background: url(<?php echo $img_url; ?>);">

                        <div class="content-news-item">
                                <div class="date"><?=get_the_date('d.m.Y') ?></div>
                                <div class="title"><?= get_the_title($post_id) ?></div>
                                <a href="<?= get_the_permalink($post_id) ?>" class="link-to-news">Читать новость</a>
                        </div>
                        <div class="overlay-news"></div>

                    </li>
                    <?php
                endwhile; // End of the loop.
                echo "</ul>";
                ?>
                    <p class="last-block-news">
                        Показано <b><span class="news-count"><?= count($query->posts) ?></span>  новостей</b>  за период с <b><?= date('d.m', strtotime($query->posts[0]->post_date)); ?>  по  <span class="news-date-end"><?= date('d.m', strtotime($query->posts[count($query->posts)-1]->post_date)); ?></span></b>
                    </p>
                <div class="block-load-more">
                    <a href="#" class="load-more-news"><i class="fas fa-sync-alt"></i> показать еще</a>
                </div>
            </div>
        </div>
    </div>

<?php get_footer();
