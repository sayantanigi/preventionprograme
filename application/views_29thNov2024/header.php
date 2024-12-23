<?php
$site_setting = $this->db->query("select logo, favicon from  settings")->row();
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?=@$title?> | <?=@$page?></title>
    <meta name="robots" content="noindex, follow">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?=base_url('uploads/logos/'.@$site_setting->favicon.'')?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/')?>plugins/all.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/css/')?>plugins/flaticon.css">
    <link rel="stylesheet" href="<?=base_url('assets/css/')?>plugins/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/css/')?>plugins/swiper-bundle.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/css/')?>plugins/aos.css">
    <link rel="stylesheet" href="<?=base_url('assets/css/')?>plugins/magnific-popup.css">
    <link rel="stylesheet" href="<?=base_url('assets/css/')?>plugins/lightbox.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/css/')?>plugins/gijgo.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/css/')?>plugins/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/css/')?>style.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	
	<style>
		small > p{
			color:red;
		}
		p strong{
			font-weight: 600 !important;
			color: black !important;
		}
		.sa-confirm-button-container button{
			background-color: #f7931e !important;
			border-color: #f7931e !important;
		}
		@media only screen and (max-width: 600px) {
			.dropdown {
				top: 0px !important;
			}
			
		}
		@media only screen and (min-width: 600px) {
			.dropdown {
				top: 0px !important;
			}
			
		}
		@media only screen and (min-width: 768px) {
			.dropdown {
				top: 0px !important;
			}
			
		}
	
	    @media only screen and (min-width: 992px) {
			.dropdown {
				top: 18px !important;
			}
		}

        @media only screen and (min-width: 1200px) {
			.dropdown {
				top: 18px !important;
			}
		}


	</style>
	
<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async="" ></script>
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

    OneSignal.push(function() 
  {
  	OneSignal.getUserId(function(userId) 

  	{
  		console.log("OneSignal User ID:", userId);
  		$.ajax({
  			type: 'POST',
  			async: false,
  			url: '<?php echo base_url('dashboard/updateplayerId');?>',
  			data : {'player_id':userId},
  			success:function(response){  						
  				if(response=="1") {
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
    <div class="main-wrapper">
        <!-- Preloader start -->
        <div id="preloader">
            <div class="preloader">
                <span></span>
                <span></span>
            </div>
        </div>
        <!-- Preloader End -->

        <!-- Header Start  -->
        <div id="header" class="section exvent-header-section">
            <div class="container">
                <div class="header-wrap">
                    <div class="header-logo">
                        <a href="<?=base_url()?>"><img src="<?=!empty($site_setting->logo) ? base_url('uploads/logos/'.$site_setting->logo.'') : base_url('assets/images/logo.png')?>" alt=""></a>
                    </div>
                    <div class="d-flex">
                        <div class="header-menu d-none d-lg-block">
                            <ul class="main-menu">
                                <li class="<?=(@$page == 'Home') ? 'active-menu' : ''?>"><a href="<?=base_url()?>">Home</a></li>
                                <li class="<?=(@$page == 'About Us') ? 'active-menu' : ''?>"><a href="<?=base_url('about-us')?>">About Us </a></li>
								<?php if ($this->session->userdata('loguserId') && $this->session->userdata('is_login')) { ?>
                                    <li class="<?=(@$page == 'Subscription') ? 'active-menu' : ''?>"><a href="<?=base_url('subscription')?>">Subscription </a></li>
                                    <li class="<?=(@$page == 'Dashboard') ? 'active-menu' : ''?>"><a href="<?=base_url('dashboard')?>">Account </a></li>
								<?php } ?>
                                <li class="<?=(@$page == 'Contact Us') ? 'active-menu' : ''?>"><a href="<?=base_url('contact-us')?>">Contact Us</a></li>
                            </ul>
                        </div>
						<?php if ($this->session->userdata('loguserId') && $this->session->userdata('is_login')) { ?>
							
						<ul class="main-menu">	
							<li class="dropdown" >
								<a class="btn btn-primary dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" href="<?=base_url('dashboard')?>">Dashboard</a>
								<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" data-bs-popper="static">
									<li><a class="dropdown-item" href="<?=base_url('dashboard')?>"><i class="fas fa-house-user"></i> Dashboard</a></li>
									<li><a class="dropdown-item" href="<?=base_url('profile/edit')?>"><i class="fas fa-user"></i> Profile</a></li>
									<li><a class="dropdown-item" href="<?=base_url('setting')?>"><i class="fas fa-cog"></i> Settings</a></li>
									<li><a class="dropdown-item" href="<?=base_url('login/logout')?>"><i class="fas fa-power-off"></i> Logout</a></li>
								</ul>
							</li>
						</ul>
						<?php }else{ ?>
						    <div class="header-meta">
								<div class="header-btn d-none d-xl-block">
									<a class="btn" href="<?=base_url('login')?>">Sign up / Login</a>
								</div>
								<div class="header-toggle d-lg-none">
									<button data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample">
										<span></span>
										<span></span>
										<span></span>
									</button>
								</div>
							</div>
						<?php } ?>
						
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->

        <!-- Offcanvas Start-->
        <div class="offcanvas offcanvas-start" id="offcanvasExample">
            <div class="offcanvas-header">
                <!-- Offcanvas Logo Start -->
                <div class="offcanvas-logo">
                    <a href="index.html"><img src="<?=!empty($site_setting->logo) ? base_url('uploads/logos/'.$site_setting->logo.'') : base_url('assets/images/logo.png')?>" alt=""></a>
                </div>
                <!-- Offcanvas Logo End -->
                <button type="button" class="close-btn" data-bs-dismiss="offcanvas"><i class="flaticon-close"></i></button>
            </div>

            <!-- Offcanvas Body Start -->
            <div class="offcanvas-body">
                <div class="offcanvas-menu">
                    <ul class="main-menu">
                        <li class="<?=(@$page == 'Home') ? 'active-menu' : ''?>"><a href="<?=base_url()?>">Home</a></li>
                        <li class="<?=(@$page == 'About Us') ? 'active-menu' : ''?>"><a href="<?=base_url('about-us')?>">About Us  </a></li>
                        <li class="<?=(@$page == 'Dashboard') ? 'active-menu' : ''?>"><a href="<?=base_url('dashboard')?>">Account </a></li>
                        <li class="<?=(@$page == 'Contact Us') ? 'active-menu' : ''?>"><a href="<?=base_url('contact-us')?>">Contact Us</a></li>
                        <li class="<?=(@$page == 'Login') ? 'active-menu' : ''?>"><a href="<?=base_url('login')?>">Login/Sign Up</a></li>
                    </ul>
                </div>
            </div>
            <!-- Offcanvas Body End -->
        </div>
        <!-- Offcanvas End -->