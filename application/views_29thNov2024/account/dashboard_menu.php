<?php
$userId = $this->session->userdata('loguserId');
$user_sub_id = $this->Mymodel->get_single_row_info('sub_id, end_date', 'transaction', 'user_id='.$userId.' and payment_type="1"', 'id DESC', 1);
if(!empty($user_sub_id)){
	$user_sub_name = $this->Mymodel->get_single_row_info('name', 'subscription', 'id='.@$user_sub_id->sub_id.'', '', 1);
	$user_sub_name_1 = $user_sub_name->name;
}else{
	$user_sub_name_1 = '';
}


?>
<div class="col-lg-4">
                        <div class="speaker-wrapper speaker-col">
                            <div class="single-speaker">
                                <a href="#" class="speaker-thumbnail">
                                    <img src="<?=!empty($user->image) ? base_url('uploads/profile/'.@$user->image.'') : base_url('uploads/unnamed.jpg')?>" alt="Speaker 1" class="speaker-img" id="blah">
                                </a>
								
                                <div class="speaker-details">
                                    <div class="heading-shape">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="202" height="84" viewBox="0 0 202 84">
                                            <image id="Shape_29" data-name="Shape 29" width="202" height="84" xlink:href="data:img/png;base64,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"></image>
                                        </svg>
                                    </div>
                                    <a href="#" class="speaker-name-link">
                                        <h4 class="speaker-name"><?=@$user->fname?> <?=@$user->lname?></h4>
                                    </a><br/><br/>
									
									
                                    <a href="#" class="" ><span style="font-weight: 700;font-size: 15px;">Subscription</span> - <?=@$user_sub_name_1?></a>
									<?php
									    if(!empty(@$user_sub_id->end_date)){
											$expiry_date = date('M d, Y', strtotime(@$user_sub_id->end_date));
											echo '<a href="#" class=""><span style="font-weight: 700;font-size: 15px;">Expire On</span> - ('.@$expiry_date.')</a>';
											//echo '<a href="#" class=""><span style="font-weight: 700;font-size: 15px;">Total Invitations</span> - ('.@$expiry_date.')</a>';
											
											
										}
									?>
                                    
                                    
                                </div>
                            </div>
                           
                            <div class="speaker-social">
                                <ul class="social-list">
                                    <li><a href="<?=@$user->facebook?>" class="fb-bg"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="<?=@$user->twitter?>" class="tw-bg"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="<?=@$user->pinterest?>" class="pin-bg"><i class="fab fa-pinterest-p"></i></a></li>
                                </ul>
								
                            </div>
                            <ul class="profilenav mt-4">
                                <li><a href="<?=base_url('profile/edit')?>">Update Profile</a></li>
                                <li><a href="<?=base_url('event/add')?>">Create New Event</a></li>
                                <li><a href="<?=base_url('event')?>">Event List</a></li>
                                <li><a href="<?=base_url('event/my-event')?>">My Event</a></li>
                                <li><a href="<?=base_url('subscription')?>">Subscription</a></li>
                                <li><a href="<?=base_url('logout')?>">Logout</a></li>
                            </ul>
                        </div>
                    </div>