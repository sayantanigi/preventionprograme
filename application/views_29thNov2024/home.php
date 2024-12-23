


        <!-- Hero Start -->
        <div class="section exvent-hero-section d-lg-flex d-block align-items-center" style="background-image: url(<?=!empty(@$banner->image_1) ? base_url('uploads/banner/'.@$banner->image_1.'') : base_url('assets/images/bg/hero_bg1.jpg')?>);">
            <img class="shape-1 img-fluid" src="<?=base_url('assets/images/')?>shape/hero_shape1.png" alt="">
            <img class="shape-2 img-fluid" src="<?=base_url('assets/images/')?>shape/hero_shape2.png" alt="">

            <div class="container">
                <div class="row exvent-hero-row">
                    <div class="col-lg-6">
                        <!-- Hero Content Start -->
                        <div class="hero-content">
                            <h2 class="title"><?=@$banner->heading?></h2>
                            <div class="hero-btn">
                                <a class="btn w-100" href="<?=base_url('event/add')?>"><?=@$banner->button_text?></a>
                            </div>
                        </div>
                        <!-- Hero Content End -->
                    </div>
                </div>
            </div>

            <!-- Hero Image Start -->
            <div class="hero-images text-center">
                <div class="images" data-aos="fade-left" data-aos-delay="900">
                    <img src="<?=!empty(@$banner->image_2) ? base_url('uploads/banner/'.@$banner->image_2.'') : base_url('assets/images/user-bg.png')?>" alt="">
                </div>
            </div>
            <!-- Hero Image ennd -->
        </div>
        <!-- Hero End -->


        <!-- About Area Start -->
        <div class="about-section section-padding-03">
            <div class="container">
                <div class="row g-0">
                    <div class="col-lg-5 order-lg-1 order-2">
                        <div class="about-thumb-wrap">
                            <img src="<?=base_url('uploads/about_us/'.@$block->image_1.'')?>" alt="about_img1">
                            <img src="<?=base_url('uploads/about_us/'.@$block->image_2.'')?>" alt="about_img2">
                        </div>
                    </div>
                    <div class="col-lg-7 order-lg-1 order-1">
                        <div class="about-content-wrap">
                            <img src="<?=base_url('assets/images/')?>shape/about_content_shape1.png" alt="shape" class="about-box-shape">
                            <img src="<?=base_url('assets/images/')?>shape/about_shape1.png" alt="shape x" class="about-shape-x">
                            <div class="section-title">
                                <h5 class="sub-title">An event for</h5>
                                <h2 class="title"><?=@$block->heading?></h2>
                            </div>
                            <div class="section-paragraph">
                                <p><?=@$block->description?></p>
                            </div>
                            <div class="about-btn">
                                <a class="btn" href="<?=base_url('event/add')?>">Plan an Event</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
		<div class="section-padding-04 stepprocess">
            <div class="container">
                <div class="text-center">
                    <h3 class="h1 fw-bold">Event Planning Made Easy</h3>
                    <h2 class="mb-5 fw-light">Get Started for free</h2>
                </div>
                <div class="row">
				    <?php
					    if(!empty(@$process)){
							foreach($process as $k => $v){
								echo '
									<div class="col-lg-4 mb-3 text-center">
										<div class="roundedcircle">
											<img src="'.(!empty(@$v->image) ? base_url('uploads/event_process/'.@$v->image.'') : base_url('uploads/noimage.jpg')).'">
										</div>
										<h4>'.@$v->description.'</h4>
									</div>
								';
							}
						}	
					?>
                </div>
            </div>
        </div>
		
		<div class="section-padding-04" >
            <div class="container">
                <div class="row">
				    <?php
					    if(!empty(@$features)){
							foreach($features as $k => $v){
								echo '
									<div class="col-lg-4 mb-4">
										<div class="optionplan d-flex">
											<img src="'.(!empty(@$v->image) ? base_url('uploads/feature/'.@$v->image.'') : base_url('uploads/noimage.jpg')).'" alt="" class="icon">
											<div class="about-item-content">
												<h5 class="item-heading">'.@$v->heading.'</h5>
												<p class="item-description">'.@$v->description.' </p>
											</div>
										</div>
									</div> 
								';
							}
						}
					?>
                </div>
            </div>
        </div>
		
        <div class="event-agenda-area grey-bg section-padding-04">
            <img src="<?=base_url('assets/images/')?>shape/event_shape_h4_1.png" alt="shape" class="shape-1">
            <img src="<?=base_url('assets/images/')?>shape/event_shape_h4_2.png" alt="shape" class="shape-2">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title-wrap">
                            <div class="section-title text-center">
                                <!--<h2 class="title">Latest Events</h2>-->
                                <h2 class="title">Completed Events</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="owl-carousel owl-theme" id="latestevent">
				    <?php
					    if(!empty($completed_event)){
							foreach($completed_event as $k => $v){
								$eventImg = $this->db->query("select image from event_gallery where event_id = ".@$v->event_id."")->row();
								echo '
									<div class="item">
										<div class="single-event text-center">
											<a href="'.base_url('event-details?eId='.base64_encode(@$v->event_id).'').'" class="event-header">
												<img src="'.(!empty(@$eventImg->image) ? base_url('uploads/event/'.@$eventImg->image.'') : base_url('uploads/noimage.jpg')).'" alt="Thumbnail" class="event-thumb img-fluid">
												<span class="eventdate"><i class="far fa-calendar me-2"></i> '.date('d-m-Y', strtotime(@$v->event_date)).'</span>
											</a>
											<div class="event-body">
												<img src="'.base_url('assets/images/shape/event_card_bg.png').'" alt="shape" class="event-body-shape img-fluid">
												<a href="'.base_url('event-details?eId='.base64_encode(@$v->event_id).'').'">
												    <h3 class="event-title">'.@$v->event_name.'</h3>
												</a>
												<p class="event-desc">'.substr(strip_tags(@$v->event_description), 0, 100).'</p>
											</div>
										</div>
									</div>
								';
							}
						}
					?>
                   
					
                </div>
                
            </div>
        </div>

        