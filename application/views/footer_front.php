<?php $settings = $this->Adminmodel->get('settings', true, 'settingId', 1); ?>
<?php if (!$this->session->userdata('loguserId') && !$this->session->userdata('is_login')) { ?>
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
                Copyrights  &copy;   2024. All rights reserved.
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
<?php } ?>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script>
$('.dropdown-toggle').on('click', function (e) {
    e.stopPropagation();
    e.preventDefault();

    var self = $(this);
    if (self.is('.disabled, :disabled')) {
        return false;
    }
    self.parent().toggleClass("open");
});

$(document).on('click', function (e) {
    if ($('.dropdown').hasClass('open')) {
        $('.dropdown').removeClass('open');
    }
});

$('.nav-btn.nav-slider').on('click', function () {
    $('nav').toggleClass("open");
});

$('.NavHeaderCloseIcon').on('click', function () {
    if ($('.sidebar').hasClass('open')) {
        $('.sidebar').removeClass('open');
    }
});
$(document).ready(function () {
    $('#Home').click(function (e) {
        e.preventDefault();
        $('.Section.Home').toggle();
        $('.Section.UpcomingEvents').hide();
        $('.Section.ReferralLink').hide();
        $('.Section.ManageSubscription').hide();
        $('.Section.SaleList').hide();
        $('.Section.PurchaseHistory').hide();
        $('.Section.Wallet').hide();
        $('.Section.TransactionsPayment').hide();
        $('.Section.Rewards').hide();
        $('.Section.TermsConditions').hide();
    });

    $('#UpcomingEvents').click(function (e) {
        e.preventDefault();
        $('.Section.Home').hide();
        $('.Section.UpcomingEvents').toggle();
        $('.Section.ReferralLink').hide();
        $('.Section.ManageSubscription').hide();
        $('.Section.SaleList').hide();
        $('.Section.PurchaseHistory').hide();
        $('.Section.Wallet').hide();
        $('.Section.TransactionsPayment').hide();
        $('.Section.Rewards').hide();
        $('.Section.TermsConditions').hide();
    });

    $('#ReferralLink').click(function (e) {
        e.preventDefault();
        $('.Section.Home').hide();
        $('.Section.UpcomingEvents').hide();
        $('.Section.ReferralLink').toggle();
        $('.Section.ManageSubscription').hide();
        $('.Section.SaleList').hide();
        $('.Section.PurchaseHistory').hide();
        $('.Section.Wallet').hide();
        $('.Section.TransactionsPayment').hide();
        $('.Section.Rewards').hide();
        $('.Section.TermsConditions').hide();
    });

    $('#ManageSubscription').click(function (e) {
        e.preventDefault();
        $('.Section.Home').hide();
        $('.Section.UpcomingEvents').hide();
        $('.Section.ReferralLink').hide();
        $('.Section.ManageSubscription').toggle();
        $('.Section.SaleList').hide();
        $('.Section.PurchaseHistory').hide();
        $('.Section.Wallet').hide();
        $('.Section.TransactionsPayment').hide();
        $('.Section.Rewards').hide();
        $('.Section.TermsConditions').hide();
    });

    $('#SaleList').click(function (e) {
        e.preventDefault();
        $('.Section.Home').hide();
        $('.Section.UpcomingEvents').hide();
        $('.Section.ReferralLink').hide();
        $('.Section.ManageSubscription').hide();
        $('.Section.SaleList').toggle();
        $('.Section.PurchaseHistory').hide();
        $('.Section.Wallet').hide();
        $('.Section.TransactionsPayment').hide();
        $('.Section.Rewards').hide();
        $('.Section.TermsConditions').hide();
    });

    $('#PurchaseHistory').click(function (e) {
        e.preventDefault();
        $('.Section.Home').hide();
        $('.Section.UpcomingEvents').hide();
        $('.Section.ReferralLink').hide();
        $('.Section.ManageSubscription').hide();
        $('.Section.SaleList').hide();
        $('.Section.PurchaseHistory').toggle();
        $('.Section.Wallet').hide();
        $('.Section.TransactionsPayment').hide();
        $('.Section.Rewards').hide();
        $('.Section.TermsConditions').hide();
    });

    $('#Wallet').click(function (e) {
        e.preventDefault();
        $('.Section.Home').hide();
        $('.Section.UpcomingEvents').hide();
        $('.Section.ReferralLink').hide();
        $('.Section.ManageSubscription').hide();
        $('.Section.SaleList').hide();
        $('.Section.PurchaseHistory').hide();
        $('.Section.Wallet').toggle();
        $('.Section.TransactionsPayment').hide();
        $('.Section.Rewards').hide();
        $('.Section.TermsConditions').hide();
    });

    $('#TransactionsPayment').click(function (e) {
        e.preventDefault();
        $('.Section.Home').hide();
        $('.Section.UpcomingEvents').hide();
        $('.Section.ReferralLink').hide();
        $('.Section.ManageSubscription').hide();
        $('.Section.SaleList').hide();
        $('.Section.PurchaseHistory').hide();
        $('.Section.Wallet').hide();
        $('.Section.TransactionsPayment').toggle();
        $('.Section.Rewards').hide();
        $('.Section.TermsConditions').hide();
    });

    $('#Rewards').click(function (e) {
        e.preventDefault();
        $('.Section.Home').hide();
        $('.Section.UpcomingEvents').hide();
        $('.Section.ReferralLink').hide();
        $('.Section.ManageSubscription').hide();
        $('.Section.SaleList').hide();
        $('.Section.PurchaseHistory').hide();
        $('.Section.Wallet').hide();
        $('.Section.TransactionsPayment').hide();
        $('.Section.Rewards').toggle();
        $('.Section.TermsConditions').hide();
    });

    $('#UpcomingEvents').click(function (e) {
        e.preventDefault();
        $('.Section.Home').hide();
        $('.Section.UpcomingEvents').hide();
        $('.Section.ReferralLink').hide();
        $('.Section.ManageSubscription').hide();
        $('.Section.SaleList').hide();
        $('.Section.PurchaseHistory').hide();
        $('.Section.Wallet').hide();
        $('.Section.TransactionsPayment').hide();
        $('.Section.Rewards').hide();
        $('.Section.TermsConditions').toggle();
    });

    $('#Promotion').click(function (e) {
        e.preventDefault();
        $('.Section.Home').hide();
        $('.Section.UpcomingEvents').hide();
        $('.Section.ReferralLink').hide();
        $('.Section.ManageSubscription').hide();
        $('.Section.SaleList').hide();
        $('.Section.PurchaseHistory').hide();
        $('.Section.Wallet').hide();
        $('.Section.TransactionsPayment').hide();
        $('.Section.Rewards').hide();
        $('.Section.TermsConditions').hide();
        $('.Section.Promotion').toggle();
        $('.Section.Appearance').hide();
        $('.Section.Event').hide();
        $('.Section.Business').hide();
        $('.Section.Network').hide();
        $('.Section.Subscription').hide();
    });

    $('#Appearance').click(function (e) {
        e.preventDefault();
        $('.Section.Home').hide();
        $('.Section.UpcomingEvents').hide();
        $('.Section.ReferralLink').hide();
        $('.Section.ManageSubscription').hide();
        $('.Section.SaleList').hide();
        $('.Section.PurchaseHistory').hide();
        $('.Section.Wallet').hide();
        $('.Section.TransactionsPayment').hide();
        $('.Section.Rewards').hide();
        $('.Section.TermsConditions').hide();
        $('.Section.Promotion').hide();
        $('.Section.Appearance').toggle();
        $('.Section.Event').hide();
        $('.Section.Business').hide();
        $('.Section.Network').hide();
        $('.Section.Subscription').hide();
    });

    $('#Event').click(function (e) {
        e.preventDefault();
        $('.Section.Home').hide();
        $('.Section.UpcomingEvents').hide();
        $('.Section.ReferralLink').hide();
        $('.Section.ManageSubscription').hide();
        $('.Section.SaleList').hide();
        $('.Section.PurchaseHistory').hide();
        $('.Section.Wallet').hide();
        $('.Section.TransactionsPayment').hide();
        $('.Section.Rewards').hide();
        $('.Section.TermsConditions').hide();
        $('.Section.Promotion').hide();
        $('.Section.Appearance').hide();
        $('.Section.Event').toggle();
        $('.Section.Business').hide();
        $('.Section.Network').hide();
        $('.Section.Subscription').hide();
    });

    $('#Business').click(function (e) {
        e.preventDefault();
        $('.Section.Home').hide();
        $('.Section.UpcomingEvents').hide();
        $('.Section.ReferralLink').hide();
        $('.Section.ManageSubscription').hide();
        $('.Section.SaleList').hide();
        $('.Section.PurchaseHistory').hide();
        $('.Section.Wallet').hide();
        $('.Section.TransactionsPayment').hide();
        $('.Section.Rewards').hide();
        $('.Section.TermsConditions').hide();
        $('.Section.Promotion').hide();
        $('.Section.Appearance').hide();
        $('.Section.Event').hide();
        $('.Section.Business').toggle();
        $('.Section.Network').hide();
        $('.Section.Subscription').hide();
    });

    $('#Network').click(function (e) {
        e.preventDefault();
        $('.Section.Home').hide();
        $('.Section.UpcomingEvents').hide();
        $('.Section.ReferralLink').hide();
        $('.Section.ManageSubscription').hide();
        $('.Section.SaleList').hide();
        $('.Section.PurchaseHistory').hide();
        $('.Section.Wallet').hide();
        $('.Section.TransactionsPayment').hide();
        $('.Section.Rewards').hide();
        $('.Section.TermsConditions').hide();
        $('.Section.Promotion').hide();
        $('.Section.Appearance').hide();
        $('.Section.Event').hide();
        $('.Section.Business').hide();
        $('.Section.Network').toggle();
        $('.Section.Subscription').hide();
    });

    $('#Subscription').click(function (e) {
        e.preventDefault();
        $('.Section.Home').hide();
        $('.Section.UpcomingEvents').hide();
        $('.Section.ReferralLink').hide();
        $('.Section.ManageSubscription').hide();
        $('.Section.SaleList').hide();
        $('.Section.PurchaseHistory').hide();
        $('.Section.Wallet').hide();
        $('.Section.TransactionsPayment').hide();
        $('.Section.Rewards').hide();
        $('.Section.TermsConditions').hide();
        $('.Section.Promotion').hide();
        $('.Section.Appearance').hide();
        $('.Section.Event').hide();
        $('.Section.Business').hide();
        $('.Section.Network').hide();
        $('.Section.Subscription').toggle();
    });
});
function openTab(event, tabName) {
    const contents = document.querySelectorAll(".TabContent");
    contents.forEach(content => content.classList.remove("active"));

    const tabs = document.querySelectorAll(".Tab");
    tabs.forEach(tab => tab.classList.remove("active"));

    document.getElementById(tabName).classList.add("active");
    event.currentTarget.classList.add("active");
}
window.onload = function () {
    document.querySelector('.Home').style.display = 'block';
    document.getElementById('Home').classList.add('Active');

    const menuItems = document.querySelectorAll('ul.nav-categories li a');
    menuItems.forEach(item => {
        item.addEventListener('click', function (event) {
            event.preventDefault();
            menuItems.forEach(link => link.classList.remove('Active'));
            item.classList.add('Active');
            document.querySelectorAll('.container-fluid.m-0.Section').forEach(section => {
                section.style.display = 'none';
            });
            const sectionClass = `.container-fluid.m-0.Section.${item.id}`;
            const targetSection = document.querySelector(sectionClass);
            if (targetSection) {
                targetSection.style.display = 'block';
            }
        });
    });
};
document.querySelectorAll(".LearnMoreBtn").forEach(button => {
    button.addEventListener("click", function (event) {
        event.preventDefault();
        const targetId = this.getAttribute("data-target");
        const content = document.querySelector(`.LearnMoreData[data-content="${targetId}"]`);

        document.querySelectorAll(".LearnMoreData").forEach(item => {
            if (item !== content) item.style.display = "none";
        });
        document.querySelectorAll(".LearnMoreBtn").forEach(btn => {
            if (btn !== this) btn.textContent = "Learn More";
        });

        if (content.style.display === "none" || content.style.display === "") {
            content.style.display = "block";
            this.textContent = "Close";
        } else {
            content.style.display = "none";
            this.textContent = "Learn More";
        }
    });
});
document.addEventListener("DOMContentLoaded", function () {
    const sections = {
        business: {
            data: document.querySelector(".AddBusinessData"),
            footer: document.querySelector(".BusinessAddFooter"),
            title: "Add Business",
        },
        category: {
            data: document.querySelector(".AddCategoryData"),
            footer: document.querySelector(".BusinessCategoryFooter"),
            title: "Add Category",
        },
        product: {
            data: document.querySelector(".AddProduct"),
            footer: document.querySelector(".BusinessProductDataFooter"),
            title: "Add Product",
        },
        service: {
            data: document.querySelector(".AddService"),
            footer: document.querySelector(".BusinessServiceDataFooter"),
            title: "Add Service",
        },
        final: {
            data: document.querySelector(".AddProductData"),
            footer: document.querySelector(".BusinessProductFooter"),
            title: "Add Product / Service",
        },
    };

    const modalTitle = document.querySelector("#AddBusinessModal .modal-title");
    const proceedBtn = document.querySelector(".BusinessAddFooter .btn-primary");
    const categoryBackBtn = document.querySelector(".BusinessCategoryFooter .CategoryBackBtn");
    const saveContinueBtn = document.querySelector(".BusinessCategoryFooter .CategoryNextBtn");
    const addAProductBtn = document.querySelector(".AddProductData .AddAProduct");
    const addAServiceBtn = document.querySelector(".AddProductData .AddAService");
    const productDataBackBtn = document.querySelector(".BusinessProductDataFooter .ProductBackBtn");
    const productDataNextBtn = document.querySelector(".BusinessProductDataFooter .ProductNextBtn");
    const serviceDataBackBtn = document.querySelector(".BusinessServiceDataFooter .ServiceBackBtn");
    const serviceDataNextBtn = document.querySelector(".BusinessServiceDataFooter .ServiceNextBtn");
    const productBackBtn = document.querySelector(".BusinessProductFooter .ProductFinalBtn");

    function switchSection(target) {
        Object.values(sections).forEach((section) => {
            section.data.style.display = "none";
            section.footer.style.display = "none";
        });

        const targetSection = sections[target];
        if (targetSection) {
            targetSection.data.style.display = "flex";
            targetSection.footer.style.display = "flex";
            modalTitle.textContent = targetSection.title;
        }
    }

    switchSection("business");

    proceedBtn.addEventListener("click", () => switchSection("category"));
    categoryBackBtn.addEventListener("click", () => switchSection("business"));
    saveContinueBtn.addEventListener("click", () => switchSection("final"));
    addAProductBtn.addEventListener("click", () => switchSection("product"));
    addAServiceBtn.addEventListener("click", () => switchSection("service"));
    productDataBackBtn.addEventListener("click", () => switchSection("final"));
    productDataNextBtn.addEventListener("click", () => switchSection("final"));
    serviceDataBackBtn.addEventListener("click", () => switchSection("final"));
    serviceDataNextBtn.addEventListener("click", () => switchSection("final"));
    productBackBtn.addEventListener("click", () => switchSection("category"));
});
function moveToNext(current, nextFieldID) {
    if (current.value.length === 1) {
        document.getElementById(nextFieldID)?.focus();
    }
}

function showOTPBlock() {
    const button = document.querySelector(".OTPSendBtn");
    if (button.textContent === "Send") {
        document.getElementById("emailField").style.display = "none";
        document.getElementById("otpBlock").style.display = "block";
        button.textContent = "Verify";
    } else {
        window.location.href = "Login.html";
    }
}
</script>
</body>
</html>