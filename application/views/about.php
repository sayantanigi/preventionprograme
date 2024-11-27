<section class="page-header">
    <div>
        <div class="page-header__inner">
            <div class="container">
                <div class="page-header__content">
                    <h2 class="page-header__title">About Us</h2>
                    <ul class="mediox-breadcrumb list-unstyled">
                        <li>
                            <span class="mediox-breadcrumb__icon"><i class="icon-home"></i></span>
                            <a href="<?= base_url('home')?>">Home</a>
                        </li>
                        <li><span>About Us</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-space">
    <div class="container">
        <h2 class="text-center fw-bold mb-4 text-primary"><?=$about->heading?></h2>
        <p><?= $about->description; ?></p>
    </div>
</section>
<div class="client-carousel @@extraClassName bg-light">
    <div class="container">
        <div class="client-carousel__one mediox-owl__carousel owl-theme owl-carousel" data-owl-options='{
        "items": 5,
        "margin": 65,
        "smartSpeed": 700,
        "loop":true,
        "autoplay": 6000,
        "nav":false,
        "dots":false,
        "navText": ["<span class=\"icon-left-arrow\"></span>","<span class=\"icon-right-arrow\"></span>"],
        "responsive":{
            "0":{
                "items": 1,
                "margin": 30
            },
            "361":{
                "items": 2,
                "margin": 40
            },
            "576":{
                "items": 3,
                "margin": 60
            },
            "768":{
                "items": 3,
                "margin": 60
            },
            "992":{
                "items": 4,
                "margin": 60
            },
            "1200":{
                "items": 4,
                "margin": 30
            }
        }
        }'>
            <div class="client-carousel__one__item">
                <img src="<?= base_url('assets/front_assets/images/uni1.jpg')?>" alt="" class="client-carousel__one__image">
            </div>
            <div class="client-carousel__one__item">
                <img src="<?= base_url('assets/front_assets/images/uni2.jpg')?>" alt="" class="client-carousel__one__image">
            </div>
            <div class="client-carousel__one__item">
                <img src="<?= base_url('assets/front_assets/images/uni3.jpg')?>" alt="" class="client-carousel__one__image">
            </div>
            <div class="client-carousel__one__item">
                <img src="<?= base_url('assets/front_assets/images/uni4.jpg')?>" alt="" class="client-carousel__one__image">
            </div>
        </div>
    </div>
</div>