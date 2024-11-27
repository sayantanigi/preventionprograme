
<div class="section exvent-hero-section d-lg-flex d-block align-items-center inner-page-hero" style="background-image: url(<?=base_url('assets/images/')?>bg/about_page_bg.jpg);">
    <img class="shape-1 img-fluid" src="<?=base_url('assets/images/')?>shape/hero_shape1.png" alt="">
    <img class="shape-2 img-fluid" src="<?=base_url('assets/images/')?>shape/hero_shape2.png" alt="">
    <div class="container">
        <div class="row exvent-hero-row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="page-title">
                    <h2 class="section-title"><?=@$page?></h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="single-speaker-page">
    <div class="container">
        <div class="row justify-content-between">

            <?php $this->load->view('account/dashboard_menu')?>

            <div class="col-lg-8">
                <div class="speaker-informations">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="info-single">
                                <h5 class="title">Email ID: </h5>
                                <p class="desc"><?=@$user->email?></p>
                            </div>
                            <div class="info-single">
                                <h5 class="title">Mobile Number: </h5>
                                <p class="desc"><?=@$user->phone?></p>
                            </div>
                            <div class="info-single">
                                <h5 class="title">Address : </h5>
                                <p class="desc"><?=@$user->address?></p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="persoal-info">
                    <h3 class="title">Personal Information</h3>
                    <p><?=@$user->about?></p>
                </div>
                <div class="speaker-upcoming">
                    <h3 class="title">Latest Events</h3>
                    <div class="row g-2">
                        <?php
                            if(!empty($latest_event)){
                                foreach($latest_event as $k => $v){
                                    $image = $this->db->query("select image from event_gallery where event_id = ".@$v->event_id."")->row();
                                    echo '
                                    <div class="col-md-4">
                                        <div class="single-speaker-event">
                                            <div class="date-details">
                                                <h3 class="date">'.date('d', strtotime(@$v->event_date)).'</h3>
                                                <div class="month-time">
                                                    <span class="month">'.date('F', strtotime(@$v->event_date)).'</span>
                                                    <p class="time">'.@$v->event_time.'</p>
                                                </div>
                                            </div>
                                            <a href="'.base_url('event/details?eId='.base64_encode(@$v->event_id)).'" class="thumbnail">
                                                <img src="'.(!empty(@$image->image) ? base_url('uploads/event/'.@$image->image.'') : base_url('uploads/noimage.jpg')).'" alt="Thumbnail">
                                            </a>
                                            <div class="location">
                                                <p><i class="fas fa-map-marker-alt"></i> '.@$v->event_address.'</p>
                                            </div>
                                            <a href="'.base_url('event/details?eId='.base64_encode(@$v->event_id)).'" class="title">
                                                <h3>'.@$v->event_name.'</h3>
                                            </a>
                                        </div>
                                    </div>';
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>