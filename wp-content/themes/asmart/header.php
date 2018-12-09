<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <title>
        <?php
        if (is_home()) {
            bloginfo('name');
        } else {
            wp_title('');
        }
        ?>
    </title>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="shortcut icon" href="<?php echo get_theme_file_uri('/assets/images/favicon.ico') ?>"
          type="image/x-icon"/>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

    <header id="masthead" class="site-header clearfix">
        <div class="top-header">
            <div class="container">
                <div class="row-top-header clearfix">
                    <div class="row">
                        <div class="top-header-left-block col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <a href="<?php echo home_url(); ?>" class="logo">
                                <img src="<?php echo get_theme_file_uri('/assets/images/logo.png') ?>" alt="Logo">
                            </a>
                            <p class="logo-slogan">
                                <span>Развитие малого и среднего бизнеса</span><br/>
                                на территории Омского района
                            </p>
                        </div>
                        <div class="top-header-right-block  col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="phone">
                                <img src="<?php echo get_theme_file_uri('/assets/images/phone.png') ?>"
                                     alt="Иконка телефона">
                                <a href="tel:8 800 312 55 12">8 800 312 55 12</a>
                                <p>08:00 — 18:00</p>
                            </div>
                            <div class="location">
                                <img src="<?php echo get_theme_file_uri('/assets/images/geo.png') ?>"
                                     alt="Иконка локации">
                                <div>
                                    <span>г. Омск</span>
                                    <p>
                                        ул. Ленина, 34
                                    </p>
                                </div>
                            </div>
                            <div class="call">
                                <a href="#" class="call-link">
                                    Заказать звонок
                                </a>
                                <p>
                                    Перезвоним за 15 минут
                                </p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <div class="bottom-header clearfix">
            <div class="container">
                <div class="row">
                    <?php wp_nav_menu('menu_id=menu-main&menu_class=top-main-container clearfix&theme_location=top_menu'); ?>

                    <div class="search-form">
                        <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <button type="submit" class="search-submit"><i class="fas fa-search"></i></button>
                            <input type="search"  class="search-field" placeholder="<?php echo esc_attr_x( 'Поиск по сайту', 'placeholder', 'light' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />

                        </form>
                    </div>

                </div>
            </div>
        </div>


    </header><!-- #masthead -->


    <div class="site-content-contain">
        <div id="content" class="site-content">
