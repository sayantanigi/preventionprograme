<?php $settings = $this->Adminmodel->get('settings', true, 'settingId', 1); ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= @$title ?> | <?= @$page ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css'>
    <link rel="stylesheet" href="<?= base_url('assets/users_assets/style/responsive.css'); ?> ">
    <link rel="stylesheet" href="<?= base_url('assets/users_assets/style/style.css'); ?>">
    <style>
        body,html{width:100vw;height:100vh;margin:0}.Tab,.Tab.active{border-radius:15px 15px 0 0;font-size:15px}
        .OTPBlock{display:none}.nav-categories .Active{background-color:rgb(255 255 255);box-shadow:0 10px 10px #f1f1f1}.nav-categories .Active p{color:#b38a41;font-weight:600}.TabContainer{display:flex;cursor:pointer;border-bottom:2px solid #8d6a30;padding:15px 20px 0;background:#fff}.Tab{padding:10px 20px;background:#fff;color:#000;box-shadow:0 0 10px #ddd;min-width:150px;text-align:center}.Tab.active{color:#fff;background:linear-gradient(90deg,#b58b42,#7a5a28);font-weight:600}.TabContent{display:none;padding-left:10px;padding-right:10px}.TabContent.active{display:flex}.TabBar{position:sticky;top:-20px;z-index:100;padding-bottom:10px}small>p{color:red}p strong{font-weight:600!important;color:#000!important}.sa-confirm-button-container button{background-color:#f7931e!important;border-color:#f7931e!important}@media only screen and (max-width:600px){.dropdown{top:0!important}}@media only screen and (min-width:600px){.dropdown{top:0!important}}@media only screen and (min-width:768px){.dropdown{top:0!important}}@media only screen and (min-width:992px){.dropdown{top:18px!important}}@media only screen and (min-width:1200px){.dropdown{top:18px!important}}
    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
    <script src="<?= base_url('assets/users_assets/js/dataarea.js'); ?>"></script>
    <script src="<?= base_url('assets/users_assets/js/extrapage.js'); ?>"></script>
    <script src="<?= base_url('assets/users_assets/js/slider.js'); ?>"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js'></script>

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

<body>
    <?php if ($this->session->userdata('loguserId') && $this->session->userdata('is_login')) { ?>
    <nav class="sidebar">
        <div class="nav-header">
            <div class="logo-wrap">
                <a class="logo-text" href=""><?= @$title ?></a>
            </div>
            <a href="javascipt:void(0)" class="NavHeaderCloseIcon">
                <img src="<?= base_url('assets/users_assets/images/Icon8.png'); ?>" alt="">
            </a>
        </div>
        <ul class="nav-categories ul-base">
            <li>
                <a href="" id="Home" class="Active">
                    <img src="<?= base_url('assets/users_assets/images/NavIcon1.png'); ?>" alt="">
                    <p>Home</p>
                </a>
            </li>
            <li>
                <a href="" id="UpcomingEvents">
                    <img src="<?= base_url('assets/users_assets/images/NavIcon2.png'); ?>" alt="">
                    <p>Upcoming Events</p>
                </a>
            </li>
            <li>
                <a href="" id="ReferralLink">
                    <img src="<?= base_url('assets/users_assets/images/NavIcon3.png'); ?>" alt="">
                    <p>Referral Link</p>
                </a>
            </li>
            <li>
                <a href="" id="ManageSubscription">
                    <img src="<?= base_url('assets/users_assets/images/NavIcon4.png'); ?>" alt="">
                    <p>Manage Subscription</p>
                </a>
            </li>
            <li>
                <a href="" id="SaleList">
                    <img src="<?= base_url('assets/users_assets/images/NavIcon5.png'); ?>" alt="">
                    <p>Sale List</p>
                </a>
            </li>
            <li>
                <a href="" id="PurchaseHistory">
                    <img src="<?= base_url('assets/users_assets/images/NavIcon6.png'); ?>" alt="">
                    <p>Purchase History</p>
                </a>
            </li>
            <li>
                <a href="" id="Wallet">
                    <img src="<?= base_url('assets/users_assets/images/NavIcon7.png'); ?>" alt="">
                    <p>Wallet</p>
                </a>
            </li>
            <li>
                <a href="" id="TransactionsPayment">
                    <img src="<?= base_url('assets/users_assets/images/NavIcon7.png'); ?>" alt="">
                    <p>Transactions & Payment</p>
                </a>
            </li>
            <li>
                <a href="" id="Rewards">
                    <img src="<?= base_url('assets/users_assets/images/NavIcon8.png'); ?>" alt="">
                    <p>Rewards</p>
                </a>
            </li>
            <li>
                <a href="" id="TermsConditions">
                    <img src="<?= base_url('assets/users_assets/images/NavIcon9.png'); ?>" alt="">
                    <p>Terms & Conditions</p>
                </a>
            </li>
        </ul>
    </nav>
    <header>
        <div class="header-inner">
            <div class="header-first-inner">
                <div class="nav-btn nav-slider">
                    <i class="material-icons">menu</i>
                </div>
                <div class="header-logo">
                    <a href=""><img alt="logo" src="<?= base_url('uploads/logos/' . @$settings->logo) ?>"></a>
                </div>
                <div class="header-search">
                    <div class="search">
                        <i class="material-icons">search</i>
                        <input type="search" name="search" placeholder="Search">
                    </div>
                </div>
            </div>
            <div class="header-menu">
                <ul class="ul-base">
                    <!-- <li><a href="<?= base_url('profile/edit') ?>">Profile</a></li> -->
                    <li><a href="#">Profile</a></li>
                    <li><a href="<?= base_url('login/logout') ?>">Logout</a></li>
                </ul>
            </div>
        </div>
    </header>
    <?php } ?>