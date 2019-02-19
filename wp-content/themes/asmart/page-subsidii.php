<?php
/*
 * Template Name: Страница Субсидий
 */

get_header(); ?>

    <div id="primary" class="content-area subcidii-page">
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
                <div class="subcidii-block">
                    <h3>
                        Скачать документы
                    </h3>
                    <ul class="list-doc">
                    <?php


                    $files = get_field('files');

                    foreach ($files as $file){

                        if(!empty($file['doc'])){
                            echo '
                                <li> <i class="far fa-file"></i> <a target="_blank" href="'.$file['doc']['url'].'"  > <span>'.$file['doc']['title'].'</span> ('. (getRemoteFileSize($file['doc']['url'] ) / 1000).' кб.)</a></li>
                            ';
                        }

                    }

                    ?>
                    </ul>

                </div>

            </div>
        </div>

    </div>

<?php get_footer();
