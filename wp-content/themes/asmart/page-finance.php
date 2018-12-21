<?php
/*
 * Template Name: Страница  Финансовая поддержка
 */

get_header(); ?>

    <div id="primary" class="content-area qa-page">
        <div class="container">
            <div class="row">
                <?php dimox_breadcrumbs(); ?>
                <h1 class="page-title">
                    <?php echo get_the_title(); ?>
                </h1>
                <div class="title-separate"></div>
                <div class="clearfix">
                    <section class="finance-first">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="finanace-block-img img-overlay">

                                    <?php
                                    $sub_img = get_field('subsidii_img');

                                    ?>
                                    <?php if ($sub_img) { ?>

                                        <h2> Субсидии</h2>


                                        <img src="<?php echo $sub_img; ?>" alt="картинка Субсидии"/>

                                    <?php } ?>

                                </div>
                            </div>
                             <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="finanace-block-text">
                                    <h2 class="page-title  margin-top-0">
                                        Субсидии — это
                                    </h2>
                                    <div class="title-separate"></div>
                                    <?php
                                    $sub_text = get_field('subsidii_text');
                                    echo $sub_text;
                                    ?>
                                    <a href="/finansovaya-poderzhka-2/subcidii" class="link-predprinimatel-detail">Подробнее о субсидиях</a>

                                </div>
                            </div>


                        </div>
                    </section>
                    <section class="finance-second">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="finanace-block-text">
                                    <h2 class="page-title  margin-top-0">
                                        Грантовая поддержка
                                    </h2>
                                    <div class="title-separate"></div>
                                    <?php
                                    $grant_text = get_field('grant-text');
                                    echo $grant_text;
                                    ?>

                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="finanace-block-img img-overlay">

                                    <?php
                                    $grant_img = get_field('grant-img');

                                    ?>
                                    <?php if ($grant_img) { ?>

                                        <h2> Грантовая поддержка</h2>


                                        <img src="<?php echo $grant_img; ?>" alt="картинка Грантовая поддержка"/>

                                    <?php } ?>

                                </div>
                            </div>



                        </div>
                    </section>
                    <section class="finance-third">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="finanace-block-img img-overlay">

                                    <?php
                                    $premia_img = get_field('premia_img');

                                    ?>
                                    <?php if ($premia_img) { ?>

                                        <h2> Премия главы</h2>


                                        <img src="<?php echo $premia_img; ?>" alt="картинка Премия главы"/>

                                    <?php } ?>

                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="finanace-block-text">
                                    <h2 class="page-title  margin-top-0">
                                        Премия главы
                                    </h2>
                                    <div class="title-separate"></div>
                                    <?php

                                    $premia_text = get_field('premia_text');

                                    echo $premia_text;
                                    ?>

                                </div>
                            </div>




                        </div>
                    </section>
                </div>


            </div>
        </div>

    </div>

<?php get_footer();
