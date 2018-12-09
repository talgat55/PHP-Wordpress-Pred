</div><!-- #content -->

<footer class="site-footer">
    <div class="wrap clearfix">
        <div class="container clearfix">
            <div class="col-md-7">
                <div class="first-block">
                    <h3>навигация</h3>
                    <?php wp_nav_menu('menu_id=menu-main&menu_class=footer-main-container clearfix&theme_location=footer_one_menu'); ?>
                </div>
                <div class="second-block">
                    <h3>каталог</h3>
                    <?php wp_nav_menu('menu_id=menu-main&menu_class=footer-main-container clearfix&theme_location=footer_two_menu'); ?>
                </div>


            </div>
            <div class="col-md-5 footer-copyright">
                <a href="<?php echo home_url(); ?>" class="logo-footer">
                    <img src="<?php echo get_theme_file_uri('/assets/images/footer-logo.png') ?>" alt="Logo">
                </a>
                <p>
                    Территория футбола © 2018.<br>
                    Все права защищены
                </p>
            </div>

        </div>
        <div class="container clearfix">
            <p class="footer-text-copyright"><a target="_blank" class="bootom-copyright" title="Перейти на сайт разработчика" href="http://asmart-group.ru/">Разработка и дизайн: <span>Asmart Group</span></a></p>
        </div>

    </div><!-- .wrap -->
</footer><!-- #colophon -->
</div><!-- .site-content-contain -->
</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>
