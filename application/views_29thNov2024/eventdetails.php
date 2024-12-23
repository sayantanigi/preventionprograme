<?php
	if(!empty($this->session->flashdata('msg'))){
		$msg = $this->session->flashdata('msg');
		echo '<script>swal({
			title: "Success!",
			text: "<strong>'.$msg.'</strong>",
			type: "success",
			html:true,
			showConfirmButton: true
		});</script>';
	}
?>
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

        <div class="event-single-page section-padding-02">
            <div class="container">
                <div class="row justify-content-between gx-5">
                    <div class="col-lg-8">
                        <div class="single-event mb-3">
                            <div class="event-header">
                                <h4 class="event-title"><?=@$event->event_name?></h4>
								
                                <div class="event-thumbnail event-slide">
                                    <div class="owl-carousel owl-theme" id="eventdetailsslide">
										<?php  
										$Sliderquery = $this->db->query("select image from event_gallery where event_id = ".@$event->event_id." ORDER BY id DESC")->result();
										if(!empty($Sliderquery)){  
										    if (is_array($Sliderquery) || is_object($Sliderquery)) {
												foreach($Sliderquery as $k => $v){
													echo '<div class="item"><img src="'.(!empty(@$v->image) ? base_url('uploads/event/'.@$v->image.'') : '').'" style="aspect-ratio: 7/2;object-fit: contain;background-color: #000;height: 500px;"></div>';
												}
											}
										}
										?>
                                    </div>
                                </div>
								
                            </div>
                            <div class="event-body">

                                <p><?=@$event->event_description?></p>
                                
                            </div>
                        </div>
						
                        
						
                    </div>
                    <!-- Sidebar Starts -->
                    <div class="col-lg-4">
                        <div class="exvent-sidebar">
                            
                            <div class="sidebar-widget">
                                <div class="event-price-details">
                                    <div class="price">
                                        <h3><?=!empty(@$event->event_price) ? '<sup>$</sup>'.@$event->event_price.'' : '';?></h3>
                                    </div>
									
									<?php
									   // $login_user_email = $this->Mymodel->get_single_row_info('email', 'users', 'id = '.@$this->session->userdata('loguserId').' and status = "1"', '', 1);
									   // $check_event_participent = $this->Mymodel->get_single_row_info('*', 'event_invited_people', 'event_id = '.base64_decode(@$_GET['eId']).' and email = "'.@$login_user_email->email.'"', '', 1);
									   
									    // if(!empty($check_event_participent)){
											
											// $check_tran = $this->Mymodel->get_single_row_info('id', 'transaction', 'user_id = '.@$this->session->userdata('loguserId').' and status = "succeeded" and payment_type = "2" and event_id = '.base64_decode(@$_GET['eId']).'', 'id DESC', 1);
											
											// if(!empty($check_tran)){
												// echo '<div class="purchase-button">
												    // <a href="#" class="submit_btn">Paid</a>
												// </div>';
											// }else{
												// echo '<div class="purchase-button">
												    // <a href="'.base_url('payment/event?eId='.@$_GET['eId'].'&amo='.base64_encode($inviteGuest[0]->distributed_event_price).'').'" class="submit_btn">Buy Your Ticket</a>
												// </div>';
											// }
									    // }
									?>
                                    
									
                                    <div class="all-details">
                                        <h4 class="title">Event Information</h4>
										<?php
										    $userQuery = $this->db->query("select fname, lname, image from users where id = ".@$event->user_id." LIMIT 1")->row();
										?>
                                        <div class="event-host mb-3 px-3 d-flex align-items-center">
                                            <div class="hostimg"><a href="#"><img src="<?=!empty(@$userQuery->image) ? base_url('uploads/profile/'.@$userQuery->image.'') : base_url('uploads/unnamed.jpg')?>"></a></div>
                                            <div>
                                                <p class="mb-0">Hosted By:</p>
                                                <h4 class="mb-0"><a href="#"><?=@$userQuery->fname?> <?=@$userQuery->lname?></a></h4>
                                            </div>
                                        </div>
                                        <div class="single-details">
                                            <div class="label">Start:</div>
                                            <p class="details"><?=date('F', strtotime(@$event->event_date))?> <?=date('d', strtotime(@$event->event_date))?> @ <?=@$event->event_time?></p>
                                        </div>
                                        <!--<div class="single-details">
                                            <div class="label">Location :</div>
                                            <p class="details"><?=@$event->event_address?></p>
                                        </div>-->
                                    </div>
                                </div>
                            </div>
                            <!--<div class="sidebar-widget mb-4">
                                <div class="widget-title">
                                    <h4>Location Map</h4>
                                </div>
                                <div class="sidebar-google-map">
                                    <iframe src="<?='https://www.google.com/maps?q='.$event->event_latitude.','.$event->event_longitude.'&output=embed'?>" loading="lazy"></iframe>
                                </div>
                            </div>-->
							
                        </div>
                    </div>
                    <!-- Sidebar Starts -->
                </div>
            </div>
        </div>