<?php $site_setting = $this->db->query("select facebook, twitter, instagram, linkedin from  settings")->row(); ?>
<!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script> -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/notifyjs-browser/dist/notify.js"></script>
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
        $('.Section.BuyNowSection').hide();
        $('.Section.Subscription').hide();
        $('.Section.NetworkProfile').hide();
        $('.Section.Profile').hide();
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
        $('.Section.BuyNowSection').hide();
        $('.Section.Subscription').hide();
        $('.Section.NetworkProfile').hide();
        $('.Section.Profile').hide();
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
        $('.Section.BuyNowSection').hide();
        $('.Section.Subscription').hide();
        $('.Section.NetworkProfile').hide();
        $('.Section.Profile').hide();
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
        $('.Section.BuyNowSection').hide();
        $('.Section.Subscription').hide();
        $('.Section.NetworkProfile').hide();
        $('.Section.Profile').hide();
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
        $('.Section.BuyNowSection').hide();
        $('.Section.Subscription').hide();
        $('.Section.NetworkProfile').hide();
        $('.Section.Profile').hide();
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
        $('.Section.BuyNowSection').hide();
        $('.Section.Subscription').hide();
        $('.Section.NetworkProfile').hide();
        $('.Section.Profile').hide();
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
        $('.Section.BuyNowSection').hide();
        $('.Section.Subscription').hide();
        $('.Section.NetworkProfile').hide();
        $('.Section.Profile').hide();
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
        $('.Section.BuyNowSection').hide();
        $('.Section.Subscription').hide();
        $('.Section.NetworkProfile').hide();
        $('.Section.Profile').hide();
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
        $('.Section.BuyNowSection').hide();
        $('.Section.Subscription').hide();
        $('.Section.NetworkProfile').hide();
        $('.Section.Profile').hide();
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
        $('.Section.BuyNowSection').hide();
        $('.Section.NetworkProfile').hide();
        $('.Section.Profile').hide();
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
        $('.Section.BuyNowSection').hide();
        $('.Section.NetworkProfile').hide();
        $('.Section.Profile').hide();
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
        $('.Section.BuyNowSection').hide();
        $('.Section.NetworkProfile').hide();
        $('.Section.Profile').hide();
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
        $('.Section.BuyNowSection').hide();
        $('.Section.NetworkProfile').hide();
        $('.Section.Profile').hide();
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
        $('.Section.BuyNowSection').hide();
        $('.Section.NetworkProfile').hide();
        $('.Section.Profile').hide();
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
        $('.Section.BuyNowSection').hide();
        $('.Section.NetworkProfile').hide();
        $('.Section.Profile').hide();
    });

    $('#Subscription').click(function (e) {
        e.preventDefault();
        $('.Section').hide();
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
        $('.Section.BuyNowSection').hide();
        $('.Section.NetworkProfile').hide();
        $('.Section.Profile').hide();
    });

    $('#BuyNowSection').click(function (e) {
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
        $('.Section.Subscription').hide();
        $('.Section.NetworkProfile').hide();
        $('.Section.BuyNowSection').toggle();
        $('#FavProductDetailsModal').modal('hide');
        $('.Section.Profile').hide();
    });

    $('#NetworkProfile').click(function (e) {
        e.preventDefault();
        $('.Section').hide();
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
        $('.Section.Subscription').hide();
        $('.Section.BuyNowSection').hide();
        $('.Section.NetworkProfile').toggle();
        $('.Section.Profile').hide();
    });
    $('.AddToCartNotify').click(function () {
        $.notify("Hooray! 1 item added to your cart", {
            className: "success",
            position: "bottom right",
            autoHide: true,
            autoHideDelay: 3000,
        });
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

const counterElement = document.getElementsByClassName("counter")[0];
const incrementButton = document.getElementsByClassName("increment")[0];
const decrementButton = document.getElementsByClassName("decrement")[0];
let counterValue = 0;
function updateCounter() {
    counterElement.textContent = counterValue;
}

incrementButton.addEventListener("click", () => {
    counterValue++;
    updateCounter();
});

decrementButton.addEventListener("click", () => {
    if (counterValue > 0) {
        counterValue--;
        updateCounter();
    }
});

updateCounter();

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

document.addEventListener("DOMContentLoaded", function () {
    const sections = {
        advertisement: {
            data: document.querySelector(".AddAdvertisement"),
            footer: document.querySelector(".AddAdvertisementFooter"),
            title: "Add Advertisement",
        },
        plan: {
            data: document.querySelector(".AddAdvertisementPlan"),
            footer: document.querySelector(".AddAdvertisementPlanFooter"),
            title: "Select Plan",
        },
        plandetails: {
            data: document.querySelector(".AddAdvertisementPlanDetails"),
            footer: document.querySelector(".AddAdvertisementPlanDetailsFooter"),
            title: "Plan Details",
        },
    };

    const modalTitle = document.querySelector("#AdvertiseModal .modal-title");
    const selectPlanBtn = document.querySelector(".AddAdvertisementFooter .SelectPlanBtn");
    const selectPlanDetailsBtn = document.querySelector(".AddAdvertisementPlanFooter .SelectPlanDetailsBtn");
    const selectPlanDetailsBtnBack = document.querySelector(".AddAdvertisementPlanFooter .SelectPlanDetailsBtnBack");
    const selectPlanWholeDetailsBtnBack = document.querySelector(".AddAdvertisementPlanDetailsFooter .SelectPlanWholeDetailsBtnBack");

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

    switchSection("advertisement");

    selectPlanBtn.addEventListener("click", () => switchSection("plan"));
    selectPlanDetailsBtn.addEventListener("click", () => switchSection("plandetails"));
    selectPlanDetailsBtnBack.addEventListener("click", () => switchSection("advertisement"));
    selectPlanWholeDetailsBtnBack.addEventListener("click", () => switchSection("plan"));
});
</script>
</body>
</html>