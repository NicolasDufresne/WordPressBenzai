<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Benzai
 */

?>
<footer>
    <div class="footer-hash">
        <div class="wrap">
            <div class="columns">
                <div class="column wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
                    <h2>Infos utiles</h2>
                    <!--                    <img src="-->
                    <?php //echo get_template_directory_uri(); ?><!--/assets/img/benzai_bouteille.svg">-->
                    <p class="usefull">Aucune information vous concernant n'est stockée dans nos bases de donnée. Pour
                        plus d'informations, merci de consulter le liens suivant : <a target="_blank"
                                                                                      href="https://www.cnil.fr/fr/respecter-les-droits-des-personnes">respecter
                            les droits des
                            personnes</a>.</p>
                </div>
            </div>
            <div class="columns">
                <div class="column wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s">
                    <h2>Réseaux sociaux</h2>
                    <ul class="social">
                        <li><a href="https://fr-fr.facebook.com/"><img
                                        src="<?php echo get_template_directory_uri(); ?>/assets/img/social/facebook.svg"
                                        alt="Facebook"></a>
                        </li>
                        <li><a href="https://twitter.com/"><img
                                        src="<?php echo get_template_directory_uri(); ?>/assets/img/social/twitter.svg"
                                        alt="Twitter"></a>
                        </li>
                        <li><a href="https://dribbble.com/"><img
                                        src="<?php echo get_template_directory_uri(); ?>/assets/img/social/dribble.svg"
                                        alt="Dribbble"></a>
                        </li>
                        <li><a href="https://www.instagram.com/?hl=fr"><img
                                        src="<?php echo get_template_directory_uri(); ?>/assets/img/social/instagram.svg"
                                        alt="Instagram"></a>
                        </li>
                        <div class="clear"></div>
                    </ul>
                </div>
            </div>
            <div class="columns">
                <div class="column wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">
                    <h2>Liens utiles</h2>
                    <ul class="links">
                        <li><a href="#about">À propos</a></li>
                        <li><a href="#benzai">Qu'est-ce que Benzai ?</a></li>
                        <li><a href="#gallery">Gallerie</a></li>
                        <li><a href="#clients">Avis utilisateur</a></li>
                        <li><a href="#contact">Nous contacter</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="copyright">
    <p><a href="#"> Copyright ©2019 All rights reserved </a> | Benzai </p>
</div>
<?php wp_footer(); ?>


<!--Show and Hide password login form-->
<script>
    function myFunction() {
        var x = document.getElementById("password_show");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
        var x = document.getElementById("password_confirmed_show");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>

<!--Scroll indicator animation-->
<script>
    // When the user scrolls the page, execute myFunction
    window.onscroll = function () {
        myFunctionScroll()
    };

    function myFunctionScroll() {
        var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        var scrolled = (winScroll / height) * 100;
        document.getElementById("myBar").style.width = scrolled + "%";
    }
</script>

<!--Navbar active when scroll-->
<script>
    $(window).scroll(function () {
        if ($(document).scrollTop() > 50) {
            $('.nav').addClass('affix');
            console.log("OK");
        } else {
            $('.nav').removeClass('affix');
        }
    });

    $('.navTrigger').click(function () {
        $(this).toggleClass('active');
        console.log("Clicked menu");
        $("#mainListDiv").toggleClass("show_list");
        $("#mainListDiv").fadeIn();

    });
</script>

<!--Scroll to the top button-->
<script>
    var btn = $('#scrollUp');

    $(window).scroll(function () {
        if ($(window).scrollTop() > 50) {
            btn.addClass('show');
        } else {
            btn.removeClass('show');
        }
    });

    btn.on('click', function (e) {
        e.preventDefault();
        $('html, body').animate({scrollTop: 0}, '300');
    });
</script>

<!--Change img while click on it-->
<script>
    function changeImage() {

        if (document.getElementById("imgClickAndChange").src === "<?= get_template_directory_uri() . '/assets/img/icons/hide.png'; ?>") {
            document.getElementById("imgClickAndChange").src = "<?= get_template_directory_uri() . '/assets/img/icons/show.png'; ?>";
        } else {
            document.getElementById("imgClickAndChange").src = "<?= get_template_directory_uri() . '/assets/img/icons/hide.png'; ?>";
        }
    }
</script>

<!--Loading page-->
<script>
   $(window).on("load", function () {
       setTimeout(function () {
           $(".loader-wrapper").fadeOut("slow");
       }, 1500);
   });

   $(function () {
       setTimeout(function () {
           $('html, body')
               .css({
                   'overflow': 'auto'
               })
               .animate({
                   scrollTop: $('.myDiv').offset().top
               }, 1500);
       }, 1500);
   });

   $(document).ready(function () {
       $(this).scrollTop(0);
   });
</script>

</body>

</html>
