<?php /* Template Name: Home */ ?>

<?php get_header(); ?>

    <!-- Back to top button -->
    <a id="scrollUp"></a>

    <section id="home">
        <?php $query_home = new WP_Query(array(
            'post_status' => 'publish',
            'post_type' => 'post',
            'p' => 10
        ));
        // The Loop
        if ($query_home->have_posts()) {
            $query_home->the_post(); ?>
            <div class="container">
                <div class="blog-slide-img">
                    <?= the_post_thumbnail('', array('class' => 'img-home')); ?>
                    <div class="centered wow fadeIn" data-wow-delay="1s">
                        <?= get_the_title(); ?> <br/>
                        <a href="<?php echo esc_url(home_url('map')); ?>">Commencer maintenant</a>
                    </div>
                </div>
            </div> <?php
        } else {
            ?> <h2>No post found</h2> <?php
        }
        /* Restore original Post Data */
        wp_reset_postdata();
        ?>
    </section>

    <div class="wrap">

        <section id="about">
            <h1 class="title wow fadeInUp" data-wow-duration="1s">À propos</h1>
            <hr/>
            <div class="container-box wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
                <?php $query = new WP_Query(array(
                    'post_status' => 'publish',
                    'post_type' => 'post',
                    'p' => 24
                ));
                // The Loop
                if ($query->have_posts()) {
                    $query->the_post(); ?>
                    <div class="center-img">
                        <?= the_post_thumbnail('', array('class' => 'svg')); ?>
                    </div>
                    <h1><?= get_the_title(); ?></h1>
                    <div class="text-about"><?= get_the_content(); ?></div>
                    <?php

                } else {
                    ?> <h2>No post about found</h2> <?php
                }
                /* Restore original Post Data */
                wp_reset_postdata();
                ?>
            </div>

            <div class="container-box wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s">
                <?php $query = new WP_Query(array(
                    'post_status' => 'publish',
                    'post_type' => 'post',
                    'p' => 26
                ));
                // The Loop
                if ($query->have_posts()) {
                    $query->the_post(); ?>
                    <div class="center-img">
                        <?= the_post_thumbnail('', array('class' => 'svg')); ?>
                    </div>
                    <h1><?= get_the_title(); ?></h1>
                    <div class="text-about"><?= get_the_content(); ?></div>
                    <?php

                } else {
                    ?> <h2>No post about found</h2> <?php
                }
                /* Restore original Post Data */
                wp_reset_postdata();
                ?>
            </div>

            <div class="container-box wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">
                <?php $query = new WP_Query(array(
                    'post_status' => 'publish',
                    'post_type' => 'post',
                    'p' => 28
                ));
                // The Loop
                if ($query->have_posts()) {
                    $query->the_post(); ?>
                    <div class="center-img">
                        <?= the_post_thumbnail('', array('class' => 'svg')); ?>
                    </div>
                    <h1><?= get_the_title(); ?></h1>
                    <div class="text-about"><?= get_the_content(); ?></div>
                    <?php

                } else {
                    ?> <h2>No post about found</h2> <?php
                }
                /* Restore original Post Data */
                wp_reset_postdata();
                ?>
            </div>
            <div class="clear"></div>
        </section>
    </div>

    <section id="benzai">
        <div id="parallax-world-of-ugg">
            <div class="parallax-one">
                <div class="parallax-hash">
                    <div class="parallax-infos">
                        <h2 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">Qu'est-ce que Benzai
                            ? </h2>
                        <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s">
                            <span class="bold">Benzai</span> est une application web
                            qui permet de trouver facilement un point de centre de tri de
                            bouteille en verre près de votre localisation.
                            Il suffit de cliquer sur <span class="bold">COMMENCER</span>
                            et d'accepter ou non la géolocalisation. Une carte
                            apparaîtra
                            pour vous montrer les poubelles disponibles.</p>
                        <br/>
                        <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">
                            <a href="#">Essayez dès maintenant !</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="gallery">
        <div class="wrap">
            <h1 class="title wow fadeInUp" data-wow-duration="1s">Galerie</h1>
            <hr/>
            <div class="images">
                <?php $query = new WP_Query(
                    array(
                        'post_status' => 'publish',
                        'orderby' => 'date',
                        'post_type' => 'gallery',
                        'order' => 'DESC',
                    )
                ); ?>
                <?php if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                        $datas = get_post_meta(get_the_ID());
                        //image ?>

                        <div class="img-solo wow fadeInUp" data-wow-duration="1s" data-wow-delay="
<!--                        --><?php
                        //                        for ($i = 200; $i < 1000; $i = $i + 200) {
                        //                            echo $i;
                        //                        } ?>
                        ms>">
                            <div class="clear"></div>
                            <div class="hovereffect">
                                <?= wp_get_attachment_image($datas['_image'][0], 'img-gallery'); ?>
                                <div class="overlay">
                                    <div class="rotate">
                                        <p class="group1">
                                            <a href="https://twitter.com/">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                            <a href="https://fr-fr.facebook.com/">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </p>
                                        <hr>
                                        <hr>
                                        <p class="group2">
                                            <a href="https://www.instagram.com/?hl=fr">
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                            <a href="https://dribbble.com/">
                                                <i class="fa fa-dribbble"></i>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div> <?php
                    }
                } else {
                    ?> <h1>Error</h1> <?php
                }
                /* Restore original Post Data */
                wp_reset_postdata();

                ?>
                <div class="clear"></div>

            </div>
        </div>
    </section>


    <section id="clients">
        <div class="wrap">
            <h1 class="title wow fadeInUp" data-wow-duration="1s">Des clients satisfaits</h1>
            <hr/>
            <div class="container-box wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
                <?php $query = new WP_Query(array(
                    'post_status' => 'publish',
                    'post_type' => 'post',
                    'p' => 46
                ));
                // The Loop
                if ($query->have_posts()) {
                    $query->the_post(); ?>
                    <div class="center-img">
                        <?= the_post_thumbnail('users', array('class' => 'ppUsers')); ?>
                    </div>
                    <div class="text-about-clients"><?= get_the_content(); ?>
                        <br/>
                        <p class="author">— <?= get_the_title(); ?></p>
                    </div>
                    <?php

                } else {
                    ?> <h2>No post about found</h2> <?php
                }
                /* Restore original Post Data */
                wp_reset_postdata();
                ?>
            </div>

            <div class="container-box wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s">
                <?php $query = new WP_Query(array(
                    'post_status' => 'publish',
                    'post_type' => 'post',
                    'p' => 44
                ));
                // The Loop
                if ($query->have_posts()) {
                    $query->the_post(); ?>
                    <div class="center-img">
                        <?= the_post_thumbnail('users', array('class' => 'ppUsers')); ?>
                    </div>
                    <div class="text-about-clients"><?= get_the_content(); ?>
                        <br/>
                        <p class="author">— <?= get_the_title(); ?></p>
                    </div>
                    <?php

                } else {
                    ?> <h2>No post about found</h2> <?php
                }
                /* Restore original Post Data */
                wp_reset_postdata();
                ?>
            </div>

            <div class="container-box wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">
                <?php $query = new WP_Query(array(
                    'post_status' => 'publish',
                    'post_type' => 'post',
                    'p' => 48
                ));
                // The Loop
                if ($query->have_posts()) {
                    $query->the_post() ?>
                    <div class="center-img">
                        <?= the_post_thumbnail('users', array('class' => 'ppUsers')); ?>
                    </div>
                    <div class="text-about-clients"><?= get_the_content(); ?>
                        <br/>
                        <p class="author">— <?= get_the_title(); ?></p>
                    </div>
                    <?php

                } else {
                    ?> <h2>No post about found</h2> <?php
                }
                /* Restore original Post Data */
                wp_reset_postdata();
                ?>
            </div>

        </div>
        <div class="clear"></div>
    </section>

    <section id="contact">
        <div class="wrap">
            <h1 class="title wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">Nous contacter</h1>
            <hr/>
            <form class="main-form" method="post">
                <label for="email" class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s">Adresse
                    mail</label>
                <input class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s" name="email" id="email"
                       type="text" placeholder="Email" value=""/>
                <label class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s"
                       for="textarea">Commentaire</label>
                <textarea class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s" id="textarea"
                          name="textarea" placeholder="Commentaire"></textarea>
                <div class="submit wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">
                    <input type="submit" name="submitted" value="Envoyer" id="button"/>
                </div>
            </form>
    </section>


<?php get_footer();