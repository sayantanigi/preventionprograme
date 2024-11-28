<?php $settings = $this->Adminmodel->get('settings', true, 'settingId', 1); ?>
<footer class="main-footer pt-5">
    <div class="container">
        <div class="row gutter-y-40">
            <div class="col-xl-4 col-lg-4 col-md-12 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                <div class="footer-widget footer-widget--about">
                    <div class="footer-widget__logo logo-retina">
                        <a href="<?= base_url('home')?>">
                            <img src="<?= base_url('uploads/logos/'.@$settings->logo) ?>" alt="" width="164">
                        </a>
                    </div>

                    <a href="<?= base_url('contact-us')?>" class="footer-widget__btn">
                        <span>Contact Us</span>
                        <span class="footer-widget__btn__icon"><i class="icon-up-right-arrow"></i></span>
                    </a>
                    <div class="social-links">
                        <a href="https://facebook.com/">
                            <i class="fab fa-facebook-f" aria-hidden="true"></i>
                            <span class="sr-only">Facebook</span>
                        </a>
                        <a href="https://twitter.com/">
                            <i class="fab fa-twitter" aria-hidden="true"></i>
                            <span class="sr-only">Twitter</span>
                        </a>
                        <a href="https://instagram.com/">
                            <i class="fab fa-instagram" aria-hidden="true"></i>
                            <span class="sr-only">Instagram</span>
                        </a>
                        <a href="https://youtube.com/">
                            <i class="fab fa-youtube" aria-hidden="true"></i>
                            <span class="sr-only">Youtube</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="100ms">
                <div class="footer-widget footer-widget--links">
                    <h2 class="footer-widget__title">Quick  <span>Links</span></h2>
                    <ul class="list-unstyled footer-widget__links">
                        <li><a href="<?= base_url('preventionprogram')?>"> Preventing Pain</a></li>
                        <li><a href="#"> Course Overview</a></li>
                        <li><a href="<?= base_url('about-us')?>"> About Us </a></li>
                        <li><a href="#"> Terms Of Use </a></li>
                        <li><a href="#"> Terms Of Service </a></li>
                        <li><a href="#"> Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="200ms">
                <div class="footer-widget footer-widget--links">
                    <h2 class="footer-widget__title">Our <span>Solutions</span></h2>
                    <ul class="list-unstyled footer-widget__links">
                        <li><a href="#"> For You</a></li>
                        <li><a href="#"> For Employers      </a></li>
                        <li><a href="#"> For Health Professionals</a></li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="main-footer__bottom">
            <p class="main-footer__copyright">
                Copyrights &copy; <?= date('Y')?>. All rights reserved.
            </p>
        </div>
    </div>
</footer>
</div>
<div class="mobile-nav__wrapper">
    <div class="mobile-nav__overlay mobile-nav__toggler"></div>
    <div class="mobile-nav__content">
        <span class="mobile-nav__close mobile-nav__toggler"><i class="icon-close"></i></span>

        <div class="logo-box logo-retina">
            <a href="index.html" aria-label="logo image"><img src="<?= base_url('assets/front_assets/images/logo-white.png') ?>" width="164" alt="" /></a>
        </div>
        <div class="mobile-nav__container"></div>
    </div>
</div>
<a href="#" data-target="html" class="scroll-to-target scroll-to-top">
    <span class="scroll-to-top__text">back top</span>
    <span class="scroll-to-top__wrapper"><span class="scroll-to-top__inner"></span></span>
</a>
<script src="<?= base_url('assets/front_assets/vendors/jquery/jquery-3.7.0.min.js'); ?>"></script>
<script src="<?= base_url('assets/front_assets/vendors/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?= base_url('assets/front_assets/vendors/bootstrap-select/bootstrap-select.min.js'); ?>"></script>
<script src="<?= base_url('assets/front_assets/vendors/jarallax/jarallax.min.js'); ?>"></script>
<script src="<?= base_url('assets/front_assets/vendors/jquery-ui/jquery-ui.js'); ?>"></script>
<script src="<?= base_url('assets/front_assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js'); ?>"></script>
<script src="<?= base_url('assets/front_assets/vendors/jquery-appear/jquery.appear.min.js'); ?>"></script>
<script src="<?= base_url('assets/front_assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js'); ?>"></script>
<script src="<?= base_url('assets/front_assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js'); ?>"></script>
<script src="<?= base_url('assets/front_assets/vendors/jquery-validate/jquery.validate.min.js'); ?>"></script>
<script src="<?= base_url('assets/front_assets/vendors/nouislider/nouislider.min.js'); ?>"></script>
<script src="<?= base_url('assets/front_assets/vendors/tiny-slider/tiny-slider.js'); ?>"></script>
<script src="<?= base_url('assets/front_assets/vendors/wnumb/wNumb.min.js'); ?>"></script>
<script src="<?= base_url('assets/front_assets/vendors/owl-carousel/js/owl.carousel.min.js'); ?>"></script>
<script src="<?= base_url('assets/front_assets/vendors/slick/js/slick.min.js'); ?>"></script>
<script src="<?= base_url('assets/front_assets/vendors/wow/wow.js'); ?>"></script>
<script src="<?= base_url('assets/front_assets/vendors/imagesloaded/imagesloaded.min.js'); ?>"></script>
<script src="<?= base_url('assets/front_assets/vendors/isotope/isotope.js'); ?>"></script>
<script src="<?= base_url('assets/front_assets/vendors/countdown/countdown.min.js'); ?>"></script>
<script src="<?= base_url('assets/front_assets/vendors/jquery-circleType/jquery.circleType.js'); ?>"></script>
<script src="<?= base_url('assets/front_assets/vendors/jquery-lettering/jquery.lettering.min.js'); ?>"></script>
<!-- template js -->
<script src="<?= base_url('assets/front_assets/js/mediox.js'); ?>"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script>
$(document).on('click', function (e) {
    if ($('.dropdown').hasClass('open')) {
        $('.dropdown').removeClass('open');
    }
});
</script>
</body>
</html>