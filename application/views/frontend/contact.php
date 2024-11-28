<section class="page-header">
    <div>
        <div class="page-header__inner">
            <div class="container">
                <div class="page-header__content">
                    <h2 class="page-header__title">Contact Us</h2>
                    <ul class="mediox-breadcrumb list-unstyled">
                        <li>
                            <span class="mediox-breadcrumb__icon"><i class="icon-home"></i></span>
                            <a href="<?= base_url('home')?>">Home</a>
                        </li>
                        <li><span>Contact Us</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="contact-page">
    <div class="contact-page__inner section-space">
        <div class="container">
            <h2 class="text-center fw-bold mb-5">Welcome! Please fill out form to schedule your consult and get started!</h2>
            <div class="row gutter-y-40 align-items-center">
                <div class="col-xl-7 col-lg-6 order-1 order-lg-0 wow fadeInUp" data-wow-duration="1500ms">
                    <div class="contact-page__form border">
                        <form method="POST" class="contact-form-validated form-one">
                            <div class="form-one__group">
                                <div class="form-one__control form-one__control--full">
                                    <input type="text" placeholder="Full Name" id="name" name="name">
                                    <small id="name_error"></small>
                                </div>
                                <div class="form-one__control form-one__control--full">
                                    <input type="email" placeholder="Email Address" id="email" name="email">
                                    <small id="email_error"></small>
                                </div>
                                <div class="form-one__control form-one__control--full">
                                    <input type="tel" placeholder="Phone Number" id="phone" name="phone">
                                    <small id="phone_error"></small>
                                </div>
                                <div class="form-one__control form-one__control--full">
                                    <input type="text" placeholder="Subject" id="subject" name="subject">
                                    <small id="subject_error"></small>
                                </div>
                                <div class="form-one__control form-one__control--full">
                                    <textarea name="message" placeholder="Write Message . . ."></textarea>
                                </div>
                                <div class="form-one__control form-one__control--full">
                                    <button type="submit" class="mediox-btn">
                                        <span>send message</span>
                                        <span class="mediox-btn__icon"><i class="icon-up-right-arrow"></i></span>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="result"></div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 order-0 order-lg-1">
                    <div class="contact-page__info">
                        <div class="sec-title @@extraClassName wow fadeInUp" data-wow-duration="1500ms">
                            <div class="sec-title__top">
                                <img src="<?= base_url('assets/front_assets/images/shapes/sec-title-s-1-1.png')?>" alt="contact us" class="sec-title__img">
                                <h6 class="sec-title__tagline">contact us</h6>
                            </div>
                            <h3 class="sec-title__title">Quick <span>Contact!</span></h3>
                        </div>
                        <div class="contact-page__info__inner wow fadeInUp" data-wow-duration="1500ms">
                            <div class="contact-page__info__item">
                                <span class="contact-page__info__icon">
                                    <i class="icon-telephone-2"></i>
                                </span>
                                <div class="contact-page__info__content">
                                    <h4 class="contact-page__info__title">call now</h4>
                                    <a href="#" class="contact-page__info__link">+91 5698 0036 420</a>
                                </div>
                            </div>
                            <div class="contact-page__info__item">
                                <span class="contact-page__info__icon">
                                    <i class="icon-paper-plane"></i>
                                </span>
                                <div class="contact-page__info__content">
                                    <h4 class="contact-page__info__title">email</h4>
                                    <a href="#" class="contact-page__info__link"><?=@$setting->email?></a>
                                </div>
                            </div>
                            <div class="contact-page__info__item">
                                <span class="contact-page__info__icon">
                                    <i class="icon-location"></i>
                                </span>
                                <div class="contact-page__info__content">
                                    <h4 class="contact-page__info__title">address</h4>
                                    <a href="#" class="contact-page__info__link">26 Manor St, Braintree UK</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <img src="<?= base_url('assets/front_assets/images/shapes/contact-shape-1-1.png')?>" alt="shape" class="contact-page__shape">
    </div>
</section>