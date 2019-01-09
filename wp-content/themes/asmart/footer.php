</div><!-- #content -->

<footer class="site-footer">
    <div class="wrap clearfix">
        <div class="container clearfix">
            <div class="top-footer">

                <?php wp_nav_menu('menu_id=menu-main&menu_class=top-main-container clearfix&theme_location=top_menu'); ?>

            </div>
            <div class="bottom-footer">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <p class="first">
                            <span>Развитие малого и среднего бизнеса</span> на территории омского района
                        </p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-lg-6custom col-md-7 col-sm-12 col-xs-12">
                                <p>predprenimatel.ru © 2018. Все права защищены.</p>
                            </div>
                            <div class="col-lg-5custom col-md-5 col-sm-12 col-xs-12  padding-right-0" >
                                <a target="_blank" class="bootom-copyright" title="Перейти на сайт разработчика" href="http://asmart-group.ru/">Разработка сайта: <span>Asmart Group</span></a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="modal-main">
            <i class="fas fa-times"></i>
            <?= do_shortcode('[contact-form-7 id="119" title="модальное окно"   html_class="form form-feedback-modal" ]'); ?>
        </div>
        <div class="overlay-modal-layer"></div>
    </div><!-- .wrap -->
</footer><!-- #colophon -->
</div><!-- .site-content-contain -->
</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>
