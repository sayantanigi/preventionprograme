<?php $settings = $this->Adminmodel->get('settings', true, 'settingId', 1); ?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= @$title ?> | <?= @$page ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png"  href="<?= base_url('assets/front_assets/images/favicon.png'); ?>" />
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&amp;display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('assets/front_assets/vendors/bootstrap/css/bootstrap.min.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/front_assets/vendors/bootstrap-select/bootstrap-select.min.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/front_assets/vendors/animate/animate.min.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/front_assets/vendors/fontawesome/css/all.min.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/front_assets/vendors/jquery-ui/jquery-ui.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/front_assets/vendors/jarallax/jarallax.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/front_assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/front_assets/vendors/nouislider/nouislider.min.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/front_assets/vendors/nouislider/nouislider.pips.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/front_assets/vendors/tiny-slider/tiny-slider.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/front_assets/vendors/mediox-icons/style.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/front_assets/vendors/owl-carousel/css/owl.carousel.min.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/front_assets/vendors/owl-carousel/css/owl.theme.default.min.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/front_assets/vendors/slick/css/slick.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/front_assets/css/style.css'); ?>" />
</head>

<body class="custom-cursor">
    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>
    <div class="preloader">
        <div class="preloader__image" style="background-image: url(<?= base_url('uploads/logos/'.@$settings->logo) ?>);"></div>
    </div>
    <div class="page-wrapper">
        <header class="main-header main-header--two sticky-header sticky-header--normal">
            <div class="container-fluid">
                <div class="main-header__inner">
                    <div class="main-header__logo logo-retina">
                        <a href="<?= base_url('home')?>">
                            <img src="<?= base_url('uploads/logos/'.@$settings->logo) ?>" alt="" width="164">
                        </a>
                    </div>
                    <div class="main-header__right">
                        <nav class="main-header__nav main-menu">
                            <ul class="main-menu__list">
                                <li><a href="<?= base_url('preventingpain')?>">Preventing Pain</a></li>
                                <li><a href="#">For You</a></li>
                                <li><a href="#">For Employers</a></li>
                                <li><a href="#">For Health Professionals</a></li>
                                <li><a href="#">About Health Coaching </a></li>
                                <li><a href="#">Course Overview</a></li>
                                <li><a href="<?= base_url('about-us'); ?>">About Us</a></li>
                                <li><a href="<?= base_url('contact-us'); ?>">Contact</a></li>
                                <li style="margin-left: 15px;">
                                    <?php if (!$this->session->userdata('loguserId') && !$this->session->userdata('is_login')) { ?>
                                    <a href="<?= base_url('login'); ?>" class="mediox-btn main-header__btn">
                                        <span>Login</span>
                                    <?php } else { ?>
                                        <?php if($this->session->userdata('logusertype') == '2') { ?>
                                        <a href="<?= base_url('coach/dashboard'); ?>" class="mediox-btn main-header__btn">
                                        <span>Dashboard</span>
                                        <?php } else { ?>
                                        <a href="<?= base_url('dashboard'); ?>" class="mediox-btn main-header__btn">
                                        <span>Dashboard</span>
                                        <?php } ?>
                                    <?php } ?>
                                        <span class="mediox-btn__icon"><i class="icon-up-right-arrow"></i></span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <div class="mobile-nav__btn mobile-nav__toggler">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
        </header>