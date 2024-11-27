<?php
$roleName = '';
$settings = $this->Adminmodel->get('settings', true, 'settingId', 1);
//$profileData = $this->Adminmodel->getAdminProfileData();
$profileData = $this->db->query("select * from users where id = " . $this->session->userdata('USER_ID') . "")->row();
if ($profileData->user_type) {
    $role = $this->db->query("select * from role where id = " . @$profileData->user_type . "")->row();
    if (@$role) {
        if (@$role->name) {
            $roleName = @$role->name;
        }
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title><?=@$title?> | <?=@$page?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="author" />
    <link rel="shortcut icon" href="<?= base_url('uploads/logos/' . @$setting->favicon) ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/user_assets/style/style.css') ?>">
    <!--Smart image uploader css-->
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .logo-lg img {
            height: 66px !important;
            width: 88% !important;
        }

        body {
            width: 100vw;
            height: 100vh;
            margin: 0;
        }

        .nav-categories .Active {
            background-color: rgb(255 255 255);
            box-shadow: 0 10px 10px #f1f1f1;
        }

        .nav-categories .Active p {
            color: #b38a41;
            font-weight: 600;
        }

        .TabContainer {
            display: flex;
            cursor: pointer;
            border-bottom: 2px solid #8d6a30;
            padding: 0;
            background: #ffffff;
            padding-top: 15px;
            padding-left: 20px;
            padding-right: 20px;
        }

        .Tab {
            border-radius: 15px 15px 0 0;
            padding: 10px 20px;
            background: #ffffff;
            font-size: 15px;
            color: #000000;
            box-shadow: 0 0 10px #ddd;
            min-width: 150px;
            text-align: center;
        }

        .Tab.active {
            color: #fff;
            border-radius: 15px 15px 0 0;
            background: linear-gradient(90deg, #b58b42, #7a5a28);
            font-size: 15px;
            font-weight: 600;
        }

        .TabContent {
            display: none;
            padding-left: 10px;
            padding-right: 10px;
        }

        .TabContent.active {
            display: flex;
        }

        .TabBar {
            position: sticky;
            top: -20px;
            z-index: 100;
            padding-bottom: 10px;
        }
    </style>
</head>

<body>
    <nav class="sidebar">
        <div class="nav-header">
            <div class="logo-wrap">
                <a class="logo-text" href=""><?= SITENAME ?></a>
            </div>
            <a href="javascipt:void(0)" class="NavHeaderCloseIcon">
                <img src="<?= base_url('assets/user_assets/images/Icon8.png') ?>" alt="">
            </a>
        </div>
        <ul class="nav-categories ul-base">
            <li>
                <a href="" id="Home" class="Active">
                    <img src="<?= base_url('assets/user_assets/images/NavIcon1.png') ?>" alt="">
                    <p>Home</p>
                </a>
            </li>
            <li>
                <a href="" id="UpcomingEvents">
                    <img src="<?= base_url('assets/user_assets/images/NavIcon2.png') ?>" alt="">
                    <p>Upcoming Events</p>
                </a>
            </li>
            <li>
                <a href="" id="ReferralLink">
                    <img src="<?= base_url('assets/user_assets/images/NavIcon3.png') ?>" alt="">
                    <p>Referral Link</p>
                </a>
            </li>
            <li>
                <a href="" id="ManageSubscription">
                    <img src="<?= base_url('assets/user_assets/images/NavIcon4.png') ?>" alt="">
                    <p>Manage Subscription</p>
                </a>
            </li>
            <li>
                <a href="" id="SaleList">
                    <img src="<?= base_url('assets/user_assets/images/NavIcon5.png') ?>" alt="">
                    <p>Sale List</p>
                </a>
            </li>
            <li>
                <a href="" id="PurchaseHistory">
                    <img src="<?= base_url('assets/user_assets/images/NavIcon6.png') ?>" alt="">
                    <p>Purchase History</p>
                </a>
            </li>
            <li>
                <a href="" id="Wallet">
                    <img src="<?= base_url('assets/user_assets/images/NavIcon7.png') ?>" alt="">
                    <p>Wallet</p>
                </a>
            </li>
            <li>
                <a href="" id="TransactionsPayment">
                    <img src="<?= base_url('assets/user_assets/images/NavIcon7.png') ?>" alt="">
                    <p>Transactions & Payment</p>
                </a>
            </li>
            <li>
                <a href="" id="Rewards">
                    <img src="<?= base_url('assets/user_assets/images/NavIcon8.png') ?>" alt="">
                    <p>Rewards</p>
                </a>
            </li>
            <li>
                <a href="" id="TermsConditions">
                    <img src="<?= base_url('assets/user_assets/images/NavIcon9.png') ?>" alt="">
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
                    <a href=""><img alt="logo" src="<?= base_url('assets/Logo/Logo.png') ?>"></a>
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
                    <li><a href="">Profile</a></li>
                    <li><a href="Login.html">Logout</a></li>
                </ul>
            </div>
        </div>
    </header>