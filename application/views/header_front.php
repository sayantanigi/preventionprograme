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

    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
    <?php if ($this->session->userdata('loguserId') && $this->session->userdata('is_login')) { ?>
        <script>
            var OneSignal = window.OneSignal || [];
            var initConfig = {
                //appId: "0369ee8b-9c16-4873-9d03-f7985989b631",
                appId: "361882f3-ac2c-40fe-aaa9-65192c0e8267",
                notifyButton: {
                    enable: true
                },
            };

            OneSignal.push(function () {
                OneSignal.SERVICE_WORKER_PARAM = { scope: '/push/onesignal/' };
                OneSignal.SERVICE_WORKER_PATH = 'push/onesignal/OneSignalSDKWorker.js'
                OneSignal.SERVICE_WORKER_UPDATER_PATH = 'push/onesignal/OneSignalSDKWorker.js'
                OneSignal.init(initConfig);
            });

            OneSignal.push(function () {
                OneSignal.getUserId(function (userId) {
                    console.log("OneSignal User ID:", userId);
                    $.ajax({
                        type: 'POST',
                        async: false,
                        url: '<?php echo base_url('dashboard/updateplayerId'); ?>',
                        data: { 'player_id': userId },
                        success: function (response) {
                            if (response == "1") {
                                console.log('playerId updated Successfully.');
                            } else {
                                console.log('playerId not updated!!!');
                            }

                        }

                    });

                });

            });
        </script>
    <?php } ?>
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
                                <li>
                                    <a href="<?= base_url('preventingpain')?>">Preventing Pain</a>
                                </li>
                                <li>
                                    <a href="#">For You</a>
                                </li>
                                <li>
                                    <a href="#">For Employers</a>
                                </li>
                                <li>
                                    <a href="#">For Health Professionals</a>
                                </li>
                                <li>
                                    <a href="#">About Health Coaching </a>
                                </li>
                                <li>
                                    <a href="#">Course Overview</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('about-us'); ?>">About Us</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('contact-us'); ?>">Contact</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('login'); ?>" class="mediox-btn main-header__btn">
                                        <span>Login</span>
                                        <span class="mediox-btn__icon"><i class="icon-up-right-arrow"></i></span>
                                    </a>
                                </li>
                            </ul>
                        </nav><!-- /.main-header__nav -->
                        <div class="mobile-nav__btn mobile-nav__toggler">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
        </header>