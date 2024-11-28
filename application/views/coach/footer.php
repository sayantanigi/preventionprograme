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
</script>
</body>
</html>