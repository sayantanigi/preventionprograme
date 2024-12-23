<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

<?php
// if(!empty($this->session->flashdata('msg'))){
	// $msg = $this->session->flashdata('msg');
	// echo '<script>swal({
		// title: "Success!",
		// text: "<strong>'.$msg.'</strong>",
		// type: "success",
		// html:true,
		// showConfirmButton: true
	// });</script>';
// }


if(!empty($this->session->flashdata('msg'))){
	$msg = $this->session->flashdata('msg');
	echo '<script>swal({
		title: "Success!",
		text: "<strong>'.$msg.'</strong>",
		type: "success",
		html:true,
		showConfirmButton: true
	});</script>';
	$this->session->unset_userdata('msg');
}

if(!empty($this->session->flashdata('host_not_connect_stripe'))){
	$msg = $this->session->flashdata('host_not_connect_stripe');
	echo '<script>swal({
		title: "Fail!",
		text: "<strong>'.$msg.'</strong>",
		type: "error",
		html:true,
		showConfirmButton: true
	});</script>';
	$this->session->unset_userdata('host_not_connect_stripe');
}

if(!empty($this->session->flashdata('paypal_login_success'))){
	$msg = $this->session->flashdata('paypal_login_success');
	echo '<script>swal({
		title: "Success!",
		text: "<strong>'.$msg.'</strong>",
		type: "success",
		html:true,
		showConfirmButton: true
	});</script>';
	$this->session->unset_userdata('paypal_login_success');
}

?>
<style>
.fade:not(.show) {
    opacity: 1 !important;
}

.modal-dialog {
    max-width: 830px !important;
    margin: 1.75rem auto !important;
}

input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
	-webkit-appearance: none;
	-moz-appearance: none;
	appearance: none;
	margin: 0; 
}


.mobile-social-share {
    background: none repeat scroll 0 0 #EEEEEE;
    display: block !important;
    min-height: 70px !important;
    margin: 50px 0;
}


.dropdown-menu {
	min-width: 6rem !important;
    padding: 0.5rem 16px !important;
}

.mobile-social-share h3 {
    color: inherit;
    float: left;
    font-size: 15px;
    line-height: 20px;
    margin: 25px 25px 0 25px;
}

.share-group {
    float: right;
    margin: 18px 25px 0 0;
}

.btn-group {
    display: inline-block;
    font-size: 0;
    position: relative;
    vertical-align: middle;
    white-space: nowrap;
}

.mobile-social-share ul {
    float: right;
    list-style: none outside none;
    margin: 0;
    min-width: 61px;
    padding: 0;
}

.share {
    min-width: 17px;
}

.mobile-social-share li {
    display: block;
    font-size: 18px;
    list-style: none outside none;
    margin-bottom: 3px;
    margin-left: 4px;
    margin-top: 3px;
}

.btn-share {
    background-color: #BEBEBE;
    border-color: #CCCCCC;
    color: #333333;
}

.btn-twitter {
    background-color: #3399CC !important;
    width: 51px;
    color:#FFFFFF!important;
}

.btn-facebook {
    background-color: #3D5B96 !important;
    width: 51px;
    color:#FFFFFF!important;
}

.btn-facebook {
    background-color: #3D5B96 !important;
    width: 51px;
    color:#FFFFFF!important;
}

.btn-google {
    background-color: #DD3F34 !important;
    width: 51px;
    color:#FFFFFF!important;
}

.btn-linkedin {
    background-color: #1884BB !important;
    width: 51px;
    color:#FFFFFF!important;
}

.btn-pinterest {
    background-color: #CC1E2D !important;
    width: 51px;
    color:#FFFFFF!important;
}

.btn-mail {
    background-color: #FFC90E !important;
    width: 51px;
    color:#FFFFFF!important;
}



#socialShare {
    max-width:59px;
    margin-bottom:18px;
}

#socialShare > a{
    padding: 6px 10px 6px 10px;
}

@media (max-width : 320px) {
    #socialHolder{
        padding-left:5px;
        padding-right:5px;
    }
    
    .mobile-social-share h3 {
        margin-left: 0;
        margin-right: 0;
    }
    
    #socialShare{
        margin-left:5px;
        margin-right:5px;
    }
    
    .mobile-social-share h3 {
        font-size: 15px;
    }
}

@media (max-width : 238px) {
    .mobile-social-share h3 {
        font-size: 12px;
    }
}

.upload-btn-wrapper input[type=file] {
  font-size: 100px;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
}
.upload-btn-wrapper {
  position: relative;
  overflow: hidden;
  display: inline-block;
}
</style>
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
                                            // if(){
												
											// }										
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
						
                        <div class="invitedtable">
                            <div class="d-md-flex justify-content-between align-items-center">
                                <h3 class="mb-2">Guest List</h3>
								<?php
								    if(!empty(@$event->co_host_id)){
								        $co_host = $this->Mymodel->get_single_row_info('id', 'users', 'id='.@$event->co_host_id.'', '', 1);
									}else{
										$co_host = '';
									}
								    if(@$this->session->userdata('loguserId') == @$event->user_id){
										
										//$return_url = 'http://127.0.0.1/madetosplit/event/return_bck';
										//$client_id = 'AaGztJn1WXb-6YV20wy2ccDOg5rl8561u-ype_05_o2rMqmwAxpw2Pt5U_Jp9Oh7XGOQVhrkVeNLGOGh';
										
										//$url ='https://www.sandbox.paypal.com/connect/?flowEntry=static&client_id='.$client_id.'&scope=email&redirect_uri='.$return_url.'';
										
										
										
										
										//echo '<a href="'.$url.'"  target="_blank" class="btn btn-primary btn btn-primary  mb-2 ms-md-2" style="margin: 0 -108px;">Login with Paypal</a>';
										
										$check_stripe_connect = $this->db->query("select * from stripe_connected_acc where user_id = ".@$event->user_id."")->num_rows();
										
										$check_paypal_connect = $this->db->query("select * from paypal_payout_verified_email where user_id = ".@$event->user_id."")->num_rows();
										
										/*if($check_stripe_connect > 0){
											
										}else{
											echo '<a href="javascript:void(0);" onclick="stripe();"  class="btn btn-primary btn btn-primary  mb-2 ms-md-2" style="margin: 0 -108px;">Connect Stripe</a>';
											
											if($check_stripe_connect > 0){
												
											}elseif($check_paypal_connect > 0){
												
											}else{
												echo '<a href="'.base_url('event/return_bck?eId='.@$_GET['eId'].'').'"  target="_blank" class="btn btn-primary btn btn-primary  mb-2 ms-md-2" style="margin: 0 -108px;">Connect Paypal</a>';
											}
											
										}*/
										    if($check_stripe_connect > 0){
												
											}elseif($check_paypal_connect > 0){
												
											}else{
												echo '<a href="'.base_url('event/return_bck?eId='.@$_GET['eId'].'').'"  target="_blank" class="btn btn-primary btn btn-primary  mb-2 ms-md-2" style="margin: 0 -108px;">Connect Paypal</a>';
												
												echo '<a href="javascript:void(0);" onclick="stripe();"  class="btn btn-primary btn btn-primary  mb-2 ms-md-2" style="margin: 0 -108px;">Connect Stripe</a>';
											}
										
										echo '<a href="'.(base_url('event/invite-people?eId='.base64_decode(@$_GET['eId']).'')).'" class="btn btn-primary  mb-2 ms-md-2">Invite Guest</a>';

									}elseif(!empty(@$event->co_host_id)){
										if(@$this->session->userdata('loguserId') == @$event->co_host_id){
											echo '<a href="'.(base_url('event/invite-people?eId='.base64_decode(@$_GET['eId']).'')).'" class="btn btn-primary  mb-2 ms-md-2">Invite Guest</a>';
										}
									}
								?>
                                
								<?php
									$event_balance_amount = $this->db->query("select sum(amount) as totalAmount from transaction where event_id = ".@$event->event_id." and payment_type = '2'")->row();
									$total_event_amount = @$event->event_price;
								?>
                            </div>
                            <table class="table table-striped border">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Invited Guest</th>
                                        <th>Email</th>
                                        <th >Per Person</th>
                                        <th >Balance</th>
                                        <th >Status</th>
										<?php if(@$this->session->userdata('loguserId') == @$event->user_id){ ?>
                                            <th>Action</th>
										<?php }elseif(!empty(@$event->co_host_id)){ 
										    if(@$this->session->userdata('loguserId') == @$event->co_host_id){
												echo '<th>Action</th>';
											}
										}
										?>
										
                                    </tr>
                                </thead>
                                <tbody>
								    <?php
										$query = $this->db->query("select * from event_invited_people where event_id = ".base64_decode(@$_GET['eId'])." and status = '1'");
										$inviteGuest = ($query->num_rows() > 0) ? $query->result() : FALSE;
										if(!empty($inviteGuest)){  
											if (is_array($inviteGuest) || is_object($inviteGuest)) {
												foreach($inviteGuest as $k => $v){
													
													$getUser = $this->db->query("select id, fname, lname from users where email = '".@$v->email."' and status = '1'")->row();
													$userName = !empty($getUser->fname) ? @$getUser->fname .' '. @$getUser->lname : 'New User - Awaiting user registration';
													if(!empty($getUser->id)){
														$query = $this->db->query("select sum(amount) as totalAmount from transaction where user_id = ".$getUser->id." and event_id = ".$v->event_id." and payment_type = '2'")->row();
														$totolAmount = $query->totalAmount;
														$balance = $v->distributed_event_price - $totolAmount;
														$userId = $getUser->id;
													}else{
														$balance = $v->distributed_event_price;
														$totolAmount = 0;
														$userId = "";
													}
													
													if($v->distributed_event_price == $totolAmount){
														$status = '<span style="background: green;color: white;padding: 5px;border-radius: 5px;font-weight: 900;font-size: 10px;">Paid</span>';
													}elseif($totolAmount == 0){
														$status = '<span style="background: #f30808;color: white;padding: 5px;border-radius: 5px;font-weight: 900;font-size: 10px;">Unpaid</span>';
													}elseif($balance < $v->distributed_event_price){
														//$status = '';
														$status = '<span style="background: #ffc107;color: white;padding: 5px;border-radius: 5px;font-weight: 900;font-size: 10px;">Partial</span>';
													}
													//echo $status;
													
													echo '<tr id="remove_row_'.@$v->id.'" >
														<td style="width:22%;">'.@$userName.'</td>
														
														
														<td>'.(((@$this->session->userdata('loguserId') == @$event->user_id) OR (@$this->session->userdata('loguserId') == @$event->co_host_id)) ? $v->email : $this->Mymodel->partiallyHideEmail($v->email)).'</td>
														
														<td>$'.$v->distributed_event_price.'</td>
														<td>$'.number_format(@$balance, 2).'</td>
														
														
														
														<td>'.@$status.'</td>
														
														'.(((@$this->session->userdata('loguserId') == @$event->user_id) OR (@$this->session->userdata('loguserId') == @$event->co_host_id)) ? '<td style="width:15%;">
														<a href="javascript:void(0);"  title="Delete Participant" onclick="deleteParticipant('.$v->id.')" ><i class="fas fa-trash"></i> </a>
														
														'.((@$event_balance_amount->totalAmount >= @$total_event_amount) ? '' : '<a href="javascript:void(0);"  title="Edit Participant" onclick="getInfo('.@$v->id.')" ><i class="far fa-edit"></i> </a>').'
														
														
														'.(!empty($getUser->id) ? '<a href="javascript:void(0);"  title="Add Offline Payment" onclick="addPayment('.@$v->id.', '.@$userId.', '.@$v->event_id.')" ><img src="'.base_url('assets/images/oflinepay.png').'" style="height: 16px;"></a>' : '').'
														
														
														</td>' : '').'
													</tr>';
												}
											}
										}
									?>
                                </tbody>
                            </table>
                        </div>
						<br/>
						<?php
						    $user_pay_service = $this->Mymodel->get_single_row_info('cashapp, zelle, apple_pay, venmo', 'users', 'id='.@$event->user_id.'', '', 1);
						?>
						 <div class="invitedtable">
                            <div class="d-md-flex justify-content-between align-items-center">
                                <h5 class="mb-2">Payment Service Information</h5>
                            </div>
							<div class="container" style="margin: 0px -46px;">
								<div class="row">
								
								    <div class="col-sm-12">
									    <div class="row">
											<div class="col-sm-3">
											    <strong>CashApp<img src="<?=base_url('assets/images/cashapp.png')?>" style="width:18%"> -</strong>
											</div>
											<div class="col-sm-9">
											    <p><?=@$user_pay_service->cashapp?></p>
											</div>   
										</div>
									</div><br/><br/>
									
									<div class="col-sm-12">
									    <div class="row">
											<div class="col-sm-3">
											    <strong>Zelle &nbsp; <img src="<?=base_url('assets/images/zelle.png')?>" style="width:12%"> &nbsp; - </strong>
											</div>
											<div class="col-sm-9">
											    <p><?=@$user_pay_service->zelle?></p>
											</div>
										</div>
									</div><br/><br/>
									
									<div class="col-sm-12">
									    <div class="row">
											<div class="col-sm-3">
											    <strong>Venmo &nbsp; <img src="<?=base_url('assets/images/venmo.png')?>" style="width:12%"> &nbsp; - </strong>
											</div>
											<div class="col-sm-9">
											    <p><?=@$user_pay_service->venmo?></p>
											</div>
										</div>
									</div><br/><br/>
									
									
									<div class="col-sm-12">
									    <div class="row">
											<div class="col-sm-3">
											    <strong>Apple Pay &nbsp; <img src="<?=base_url('assets/images/apple-pay.png')?>" style="width: 30%;height: 25px;"> &nbsp; - </strong>
											</div>
											<div class="col-sm-9">
											    <p><?=@$user_pay_service->apple_pay?></p>
											</div>
										</div>
									</div>
									
									
								</div>
							</div>
                        </div>
						
						
                    </div>
                    <!-- Sidebar Starts -->
                    <div class="col-lg-4">
                        <div class="exvent-sidebar">
                            
                            <div class="sidebar-widget">
                                <div class="event-price-details">
                                    <div class="price">
									<?php
									$myemail = $this->Mymodel->get_single_row_info('email', 'users', 'id = '.@$this->session->userdata('loguserId'));
									@$eventprice = $this->db->query("select distributed_event_price from event_invited_people where event_id = ".base64_decode(@$_GET['eId'])." and status = '1' and email = '".@$myemail->email."'")->row();?>
                                        <h3><?=!empty(@$eventprice->distributed_event_price) ? '<sup>$</sup>'.@$eventprice->distributed_event_price.'' : '';?>/<sub style="font-size: 12px;font-weight: 500;">Person</sub></h3>
                                    </div>
									
									<?php
									
										$check_stripe_connect_1 = $this->db->query("select * from stripe_connected_acc where user_id = ".@$event->user_id."")->num_rows();

										$check_paypal_connect_1 = $this->db->query("select * from paypal_payout_verified_email where user_id = ".@$event->user_id."")->num_rows();
										
									   $login_user_email = $this->Mymodel->get_single_row_info('email', 'users', 'id = '.@$this->session->userdata('loguserId').' and status = "1"', '', 1);
									   $check_event_participent = $this->Mymodel->get_single_row_info('*', 'event_invited_people', 'event_id = '.base64_decode(@$_GET['eId']).' and email = "'.@$login_user_email->email.'"', '', 1);
									   
									    if(!empty($check_event_participent)){
											
											//$check_tran = $this->Mymodel->get_single_row_info('id', 'transaction', 'user_id = '.@$this->session->userdata('loguserId').' and status = "succeeded" and payment_type = "2" and event_id = '.base64_decode(@$_GET['eId']).'', 'id DESC', 1);
											
											$check_tran = $this->db->query("select sum(amount) as totalAmount from transaction where user_id = ".@$this->session->userdata('loguserId')." and event_id = ".base64_decode(@$_GET['eId'])." and payment_type = '2' and status = 'succeeded'")->row();
											//echo $check_event_participent->distributed_event_price;
											$balance = $check_event_participent->distributed_event_price - $check_tran->totalAmount;
											if($check_tran->totalAmount == $check_event_participent->distributed_event_price){
												echo '<div class="purchase-button">
												    <a href="#" class="submit_btn">Paid</a>
												</div>';
											}elseif($balance < $check_event_participent->distributed_event_price){
												if($check_stripe_connect_1 > 0){
													echo '<div class="purchase-button">
													<a href="'.base_url('payment/event?eId='.@$_GET['eId'].'&amo='.base64_encode(@$balance).'&host='.base64_encode(@$event->user_id).'').'" class="submit_btn" style="padding: 10px 7px; border-radius: 7px;"> Pay Balance &nbsp; <i class="fa fa-credit-card" aria-hidden="true"></i> &nbsp; </a>
													</div>';
													
												}elseif($check_paypal_connect_1 > 0){
													echo '<div class="purchase-button">
													<a href="'.base_url('paypal?eId='.@$_GET['eId'].'&amo='.base64_encode(@$balance).'&host='.base64_encode(@$event->user_id).'').'" class="submit_btn" style="padding: 10px 7px; border-radius: 7px;">Pay Balance &nbsp; <i class="fa fa-credit-card" aria-hidden="true"></i> &nbsp; </a>
													</div>';
												}
												
												
												
												
											}elseif($check_tran->totalAmount == 0){
												//echo $check_paypal_connect_1;
												//echo $check_stripe_connect_1;
												if($check_stripe_connect_1 > 0){
													echo '<div class="purchase-button">
													<a href="'.base_url('payment/event?eId='.@$_GET['eId'].'&amo='.base64_encode(@$eventprice->distributed_event_price).'&host='.base64_encode(@$event->user_id).'').'" class="submit_btn" style="padding: 10px 7px; border-radius: 7px;">Pay Balance &nbsp; <i class="fa fa-credit-card" aria-hidden="true"></i> &nbsp;
													</a>
													</div>';
													
													
													
												}elseif($check_paypal_connect_1 > 0){
													echo '<div class="purchase-button">
													<a href="'.base_url('paypal?eId='.@$_GET['eId'].'&amo='.base64_encode(@$eventprice->distributed_event_price).'&host='.base64_encode(@$event->user_id).'').'" class="submit_btn" style="padding: 10px 7px; border-radius: 7px;">Pay Balance &nbsp; <i class="fa fa-credit-card" aria-hidden="true"></i> &nbsp;
													</a>
													</div>';
													
												}
												
												
												
											}
											
											// if(!empty($check_tran)){
												// echo '<div class="purchase-button">
												    // <a href="#" class="submit_btn">Paid</a>
												// </div>';
											// }else{
												// echo '<div class="purchase-button">
												    // <a href="'.base_url('payment/event?eId='.@$_GET['eId'].'&amo='.base64_encode(@$eventprice->distributed_event_price).'').'" class="submit_btn">Buy Your Ticket</a>
												// </div>';
											// }
									    }
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
										
										<?php
											if(!empty(@$event->co_host_id)){
												$co_host = $this->Mymodel->get_single_row_info('id, fname, lname, image', 'users', 'id='.@$event->co_host_id.'', '', 1);
												echo '<div class="event-host mb-3 px-3 d-flex align-items-center">
													    <div class="hostimg"><a href="#"><img src="'.(!empty(@$co_host->image) ? base_url('uploads/profile/'.@$co_host->image.'') : base_url('uploads/unnamed.jpg')).'"></a></div>
														<div>
															<p class="mb-0">Co-Host:</p>
															<h4 class="mb-0"><a href="#">'.@$co_host->fname.' '.@$co_host->lname.'</a></h4>
														</div>
												</div>';
											}
										?>
										
										
										
                                        <div class="single-details">
                                            <div class="label">Start:</div>
                                            <p class="details"><?=date('F', strtotime(@$event->event_date))?> <?=date('d', strtotime(@$event->event_date))?> @ <?=@$event->event_time?></p>
                                        </div>
                                        <div class="single-details">
                                            <div class="label">Location :</div>
                                            <p class="details"><?=@$event->event_address?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar-widget mb-4">
                                <div class="widget-title">
                                    <h4>Location Map</h4>
                                </div>
                                <div class="sidebar-google-map">
                                    <iframe src="<?='https://www.google.com/maps?q='.$event->event_latitude.','.$event->event_longitude.'&output=embed'?>" loading="lazy"></iframe>
                                </div>
                            </div>
							<?php
								if(@$this->session->userdata('loguserId') == @$event->user_id){
									echo '<a href="'.(base_url('event/edit?eId='.base64_encode(@$event->event_id).'')).'" class="btn btn-primary">Update Event</a>';echo "<br/><br/>";
									
									
									
								}elseif(!empty(@$event->co_host_id)){
									if(@$this->session->userdata('loguserId') == @$event->co_host_id){
										echo '<a href="'.(base_url('event/edit?eId='.base64_encode(@$event->event_id).'')).'" class="btn btn-primary">Update Event</a>';
									}
								}
							?>
                        </div>

                    </div>
                    <!-- Sidebar Starts -->  
                </div>
            </div>
			
        </div>
		<?php
			@$currentURL  = current_url();
			@$params   = @$_SERVER['QUERY_STRING'];
			@$fullURL = @$currentURL . '?' . @$params;
		?>
		<div class="container">
		    <div class="d-md-flex justify-content-between align-items-center">
				<h5 class="mb-2">Social Share</h5>
			</div>
			<ul  id="" style="display: flex;">
				<li style="">
					<a data-original-title="Twitter" target="_blank" href="http://twitter.com/share?url=<?=@$fullURL?>&text=<?=@$event->event_name?>" rel="tooltip"  href="#" class="btn btn-twitter" data-placement="left" style="padding: 0px 8px 0px;height: 40px;width: 30px;">
					    <i class="fa fa-twitter"></i>
					</a>
				</li>
				
				<li style="padding: 0px 4px;">
					<a data-original-title="Facebook" rel="tooltip"  target="_blank" href="https://www.facebook.com/sharer.php?u=<?=$fullURL?>" class="btn btn-facebook" data-placement="left" style="padding: 0px 8px 0px;height: 40px;width: 30px;">
					    <i class="fa fa-facebook"></i>
					</a>
				</li>
				
				<li style="padding: 0px 0px;">
					<a data-original-title="Google+" rel="tooltip"  target="_blank" href="https://plus.google.com/share?url=<?=$fullURL?>" class="btn btn-google" data-placement="left" style="padding: 0px 8px 0px;height: 40px;width: 30px;">
					    <i class="fa fa-google-plus"></i>
					</a>
				</li>
				
				<li style="padding: 0px 4px;">
					<a data-original-title="LinkedIn" rel="tooltip" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?=$fullURL?>" class="btn btn-linkedin" data-placement="left" style="padding: 0px 8px 0px;height: 40px;width: 30px;">
					    <i class="fa fa-linkedin"></i>
					</a>
				</li>
			</ul>
		</div>
        <div class="messagelist-pop">
            <div class="msgheader d-flex justify-content-between align-items-center" event_attr="<?=base64_decode(@$_GET['eId'])?>" host_user_attr="<?=@$event->user_id?>">
                <div class="flex-fill">
                    <a href="#"><img src="<?=!empty(@$userQuery->image) ? base_url('uploads/profile/'.@$userQuery->image.'') : base_url('uploads/unnamed.jpg')?>"> Messaging  <span style="margin: 0px 40px;background: red;padding: 2px 6px;border-radius: 23px;display:none;" id="all_msg_count"></span></a>
                </div>
                
                <div>
                    <ul class="listmsgheader">
                        <li><a href="#"><i class="fa fa-chevron-down"></i></a></li>
                    </ul>
                </div>
            </div>
			
            <div class="msghelistblock" id="invited_user_chat_list">
			
                <!--<div class="usermesslist">
                    <div class="d-flex align-items-center">
                        <div>
                            <img src="assets/images/testimonial_thumb1.jpg">
                        </div>
                        <div class="ps-2 flex-fill">
                            <h3>John Doe</h3>
                            <p>LAFC matches are broadcast locally in English</p>
                        </div>
                        <div>
                            <input type="checkbox" name="">
                        </div>
                    </div>
                </div>-->
				
            </div>
			
        </div>
        <div class="sidemessage-pnl single_chat_user">
		   <div id="display_chat_byuser"></div>
            <!--<div class="sidemessage-header d-flex justify-content-between align-items-center">
                <div>
                    <a href="#"><img src="<?=base_url('assets/images/')?>testimonial_thumb1.jpg"> John Doe</a>
                </div>
                <div>
                    <ul class="listmsgheader">
                        <li><a href="#" class="closemsg"><i class="fa fa-times"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="sidemessage-body" >
			 
				
            </div>-->
            <!--<div class="sidemessage-footer position-relative">
                <form>
                    <textarea class="msgtype"></textarea>
                    <button class="msgsent"><i class="fas fa-paper-plane"></i></button>
                </form>
            </div>-->
			
			<div class="sidemessage-footer position-relative">
                <form id="add_chat_msg" method="POST">
                    <textarea class="msgtype" name="message" id="message"></textarea>
					<small id="message_err"></small>
					<div class="upload-btn-wrapper">
						<i class=" fa fa-image" style="margin: 9px;color: #ad6666;"></i>
						<input type="file" name="myfile" id="myfile"/>
					</div>
					<div class="personal_preview"></div>
					<small id="image_err"></small>
                    <input type="hidden" name="sender_id" id="sender_id">
                    <input type="hidden" name="receiver_id"  id="receiver_id">
                    <button class="msgsent" type="submit"><i class="fas fa-paper-plane"></i></button>
                </form>
            </div>
        </div>
		
		  <div class="sidemessage-pnl grup_chat_user" id="sidemessage-pnl">
		   <div id="display_groupchat_byuser"></div>
		   
		   <div class="sidemessage-footer position-relative">
                <form id="add_groupchat_msg" method="POST">
                    <textarea class="msgtype" name="message" id="group_message"></textarea>
					<small id="message_group_err"></small>
					<div class="upload-btn-wrapper">
						<i class="fa fa-image" style="margin: 9px;color: #ad6666;"></i>
						<input type="file" name="myfile_group" id="myfile_group"/>
					</div>
					<div class="group_preview"></div>
					<small id="group_image_err"></small>
                    <input type="hidden" name="sender_id" id="groupchat_sender_id">
                    <!--<input type="hidden" name="receiver_id"  id="receiver_id">-->
                    <input type="hidden" name="host_id"  id="host_id">
                    <button class="msgsent" type="submit"><i class="fas fa-paper-plane"></i></button>
                </form>
            </div>
            <!--<div class="sidemessage-header d-flex justify-content-between align-items-center">
                <div>
                    <a href="#"><img src="<?=base_url('assets/images/')?>testimonial_thumb1.jpg"> John Doe</a>
                </div>
                <div>
                    <ul class="listmsgheader">
                        <li><a href="#" class="closemsg"><i class="fa fa-times"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="sidemessage-body" >
			 
				
            </div>-->
            <!--<div class="sidemessage-footer position-relative">
                <form>
                    <textarea class="msgtype"></textarea>
                    <button class="msgsent"><i class="fas fa-paper-plane"></i></button>
                </form>
            </div>-->
			
			
        </div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="top: 42px;width: 40%;">
		<div class="modal-content">
		    <div class="modal-header border-0">
				<h5 class="modal-title" id="exampleModalLabel">Edit Participant</h5>
				<button type="button" class="close" id='closepopup' data-dismiss="modal" aria-label="Close" style="width: 4%;color: white;background: red;border: 1px red solid;font-weight: 900;">
				    <span aria-hidden="true">X</span>
				</button>
		    </div>
			<div class="modal-body" id="viewBank">
				<form method="POST" id="update-invitee">
					<div class="row">
						<div class="col-sm-8">
							<label class="modal-title" style="font-weight: bolder;">Email</label>
							<input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" style="border: 1px solid #6e6262;">
							<small id="email_err" style="color:red;"></small>
						</div>
						
						<div class="col-sm-4">
							<label class="modal-title" style="font-weight: bolder;">Amount</label>
							<input type="number" class="form-control" name="amount" id="amount" placeholder="Enter Amount" style="border: 1px solid #6e6262;">
							<input type="hidden" name="id" id="id">
							<input type="hidden" name="event_id" id="event_id">
							<small id="amount_err" style="color:red;"></small>
						</div>
						<small id="large_amount" style="color:red;"></small>
						<br/><br/>
						<div class="col-sm-4" style="margin: 32px 0px;">
						    <button type="submit" class="btn" >Update</button>
						</div>
					</div>
				</form>    
			</div>
		</div>
    </div>
</div>


<div class="modal fade" id="offlineModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="top: 42px;width: 40%;">
    <div class="modal-content">
      <div class="modal-header border-0">
        <h5 class="modal-title" id="exampleModalLabel">Add Offline Payment </h5>
        <button type="button" class="close" id='closepopup_2' data-dismiss="modal" aria-label="Close" style="width: 4%;color: white;background: red;border: 1px red solid;font-weight: 900;">
          <span aria-hidden="true">X</span>
        </button>
      </div>
        <div class="modal-body" id="viewBank">
			<form method="POST" id="updated_transaction">
			    <div class="row">
				    <div class="col-sm-8">
					    <label class="modal-title" style="font-weight: bolder;"> Add Payment</label>
					    <select class="form-control" name="add_payment" id="add_payment" style="border: 1px solid #6e6262;">
						    <option value="Not Paid">Unpaid</option>
						    <option value="Paid">Paid</option>
						</select>
					</div>
					
					<div class="col-sm-4">
					    <label class="modal-title" style="font-weight: bolder;"> Amount</label>
						<input type="text" class="form-control" name="paidamount" id="paidamount" style="border: 1px solid #6e6262;">
					    <!--<select class="form-control" name="add_payment" id="add_payment" style="border: 1px solid #6e6262;">
						    <option value="Not Paid">Unpaid</option>
						    <option value="Paid">Paid</option>
						</select>-->
					</div>
					<div class="col-sm-4">
					    <input type="hidden" name='invited_id' id="invited_id">
					    <input type="hidden" name='newevent_id' id="newevent_id">
					    <input type="hidden" name='user_id' id="user_id">
					</div>
					<div class="col-sm-4" style="margin: 32px 0px;">
					   <button type="submit" class="btn" >Update</button>
					</div>
				</div>
			</form>    
        </div>
   </div>
  </div>
</div>


<div class="modal fade" id="stripeModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document" style="top: 11rem;width: 50%;">
		<div class="modal-content" style="height: 350px;border: 1px black solid;padding: 28px 27px;">
			<div class="modal-header border-0">
				<h5 class="modal-title" id="exampleModalLabel" style="margin:auto;">To receive payments paid to your event, you must register with Stripe</h5>
				<button type="button" class="close" id='closepopup_3' data-dismiss="modal" aria-label="Close" style="width: 4%;color: white;background: red;border: 1px red solid;font-weight: 900;margin: 0px -30px;margin-top: -80px;">
				    <span aria-hidden="true">X</span>
				</button>
			</div>
			<div class="modal-body" id="viewBank">
				<form method="POST" id="updated_transaction">
					<div class="row">
						<p style="text-align: center;font-size: 18px;font-weight: 700;">Register as a Host/Organizer</p><br/><br/>
						
						<button  class="btn" style="margin: auto;width: 35%;" id="connectingAcc" class="connectingAcc" relid="<?=@$this->session->userdata('loguserId')?>">Connect to Stripe &nbsp; &nbsp;<i class="fa fa-circle-o-notch fa-spin" id="connectingLoader" style="display:none;"></i> </button>
						
						
						<button  class="btn" style="margin: auto;width: 35%;"  id="connected">Connected &nbsp; &nbsp; </button>
						
						<p style="text-align: center;" id="stripe_connected" style="disply:none;"><span>Stripe ID : &nbsp;</span><i id="stripe_acc_id" style="font-size: 16px;font-weight: 700;"></i></p>
						<p style="text-align: center;" id="stripe_not_connected"><span>Stripe ID</span> Not Connected to Stripe</p><br/><br/>
						
						<p style="text-align: center;font-size: 25px;font-weight: 900;">stripe</p>
						<!--<div class="col-sm-4"> </div>
						<div class="col-sm-4">
						<button type="submit" class="btn" >Update</button>
						</div>
						<div class="col-sm-4"></div>-->
					</div>
				</form>    
			</div>
		</div>
	</div>
</div>

<script>
$(document).ready(function(){
	//$("form #add_chat_msg").on('submit', function(e){
		
		$(document.body).on('submit', '#updated_transaction' ,function(e){ 
		e.preventDefault();
		var form_data = new FormData(); 	

		var add_payment = $('#add_payment').val(); 
		var invited_id = $('#invited_id').val(); 
		var newevent_id = $('#newevent_id').val(); 
		var user_id = $('#user_id').val(); 
		var amount = $('#paidamount').val(); 

		form_data.append("transaction", add_payment);
		form_data.append("id", invited_id);
		form_data.append("event_id", newevent_id);
		form_data.append("user_id", user_id);
		form_data.append("amount", amount);

		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('event/update_event_payment'); ?>',
			data: form_data,
			dataType:"json",
			contentType: false,
			cache: false,
			processData:false,
			error:function(){
			  $('#uploadsuccessfully').html('<p style="color:#EA4335;">File upload failed, please try again.</p>');
			},
			success: function(response){
	            if(response.status == 1){
				    swal({title: "Sucess!", text: "<strong>"+response.message+"</strong>", type: "success", showConfirmButton: true, html:true}, function(){ window.location.href = ""});
				}else{
				    swal({title: "Fail!", text: "<strong>"+response.message+"</strong>", type: "error", showConfirmButton: true, html:true}, function(){ window.location.href = ""});
				}
			}
		});
	});

});


$(document).ready(function(){
	$(".msgheader").click(function(event) {
		var event_id = $(this).attr('event_attr');
		var host_user_id = $(this).attr('host_user_attr');
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('event/get_chat_user');?>',
			data:{
			event_id:event_id,
			host_user_id:host_user_id
			},
			dataType: 'text',
			success: function(data){ //console.log(response);
				$('#invited_user_chat_list').html(data);
			}
		});
	});
});

$(document).ready(function(){
	$("#connectingAcc").click(function(event) {
		$('#connectingLoader').css('display', 'inline-block');
		$("#connectingAcc").prop('disabled', true);
        //return false;
		var userid = $(this).attr('relid');
		var event_id = '<?=base64_decode(@$_GET['eId'])?>';
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('event/connectingAccount');?>',
			data:{
			    userid:userid,
			    event_id:event_id,
			},
			dataType: 'json',
			success: function(data){ //console.log(response);
				//$('#invited_user_chat_list').html(data);
				window.location.href = ""+data.url+"";
			}
		});
	});
});

// function connectingAcc(userId){
	// $.ajax({
		// type: 'POST',
		// url: '<?php echo base_url('event/connectingAccount');?>',
		// data:{
		// userId:userId
		// },
		// dataType: 'json',
		// success: function(data){ 
			
		// }
	// });
// }

$(document).ready(function() {
	$(document.body).on('click', '.usermesslist' ,function(){
		var sender_id = $(this).attr('sender_id'); //get the attribute value
		var receiver_id = $(this).attr('receiver_id'); //get the attribute value
		var event_id = '<?=base64_decode(@$_GET['eId'])?>'; 
		 //get the attribute value
		$.ajax({
			url : "<?php echo base_url(); ?>event/get_personal_chat",
			data:{sender_id : sender_id, receiver_id:receiver_id, event_id:event_id},
			dataType:"json",
			method:'POST',
			success:function(response) {
				//$('.sidemessage-pnl').show();
				$('.single_chat_user').show();
			    $('#display_chat_byuser').html(response.html); //hold the response in id and show on popup
			    $('#sender_id').val(response.sender_id); //hold the response in id and show on popup
			    $('#receiver_id').val(response.receiver_id); //hold the response in id and show on popup
				
				//update msg noti
				
				$.ajax({
					url : "<?php echo base_url(); ?>event/update_msg_noti",
					data:{sender_id : receiver_id, receiver_id:sender_id, event_id:event_id},
					dataType:"json",
					method:'POST',
					success:function(response) {
						$('#msgCount_'+receiver_id+'').css('display','none');
					}
				});
			}
		});
		
	});	
	
	$(document.body).on('click', '.closemsg' ,function(){
		//$('.sidemessage-pnl').hide();
		$('.single_chat_user').hide();
	});	
	
});	


$(document).ready(function() {
	$(document.body).on('click', '.user_group_chat' ,function(){
		var sender_id = $(this).attr('sender_id'); //get the attribute value
		var host_user_attr = $(this).attr('host_user_attr'); //get the attribute value
		var event_id = '<?=base64_decode(@$_GET['eId'])?>'; 
		// //get the attribute value
		$.ajax({
			url : "<?php echo base_url(); ?>event/get_group_chat",
			data:{event_id:event_id, sender_id:sender_id, host_user_attr:host_user_attr},
			dataType:"json",
			method:'POST',
			success:function(response) {
			// $('.sidemessage-pnl').show();
			$('#display_groupchat_byuser').html(response.html); //hold the response in id and show on popup
			 $('#groupchat_sender_id').val(response.sender_id); //hold the response in id and show on popup
			 $('#host_id').val(response.host_id); //hold the response in id and show on popup
			// //update msg noti
			// $.ajax({
			// url : "<?php echo base_url(); ?>event/update_msg_noti",
			// data:{sender_id : receiver_id, receiver_id:sender_id, event_id:event_id},
			// dataType:"json",
			// method:'POST',
			// success:function(response) {
			// $('#msgCount_'+receiver_id+'').css('display','none');
			// }
			// });
			}
		});
		
		$('.grup_chat_user').show();
		console.log('hi')
	});	
	
	 $(document.body).on('click', '.closemsg' ,function(){
		 $('.sidemessage-pnl').hide();
	 });	
	
});	
// $('.closemsg').click(function(){
    // $('.sidemessage-pnl').hide();
// });
// $('.usermesslist').click(function(){
    // $('.sidemessage-pnl').show();
// });

$(document).ready(function(){
	//$("form #add_chat_msg").on('submit', function(e){
		
		$(document.body).on('submit', '#add_chat_msg' ,function(e){ 
		e.preventDefault();
		var form_data = new FormData(); 	

		var sender_id = $('#sender_id').val(); 
		var receiver_id = $('#receiver_id').val(); 
		var message = $('#message').val(); 
		var event_id = '<?=base64_decode(@$_GET['eId'])?>'; 
        var image = $('#myfile').prop('files')[0];


		form_data.append("sender_id", sender_id);
		form_data.append("receiver_id", receiver_id);
		form_data.append("event_id", event_id);
		form_data.append("message", message);
		form_data.append("image", image);

		
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('event/send_message'); ?>',
			data: form_data,
			dataType:"json",
			contentType: false,
			cache: false,
			processData:false,
			error:function(){
			  $('#uploadsuccessfully').html('<p style="color:#EA4335;">File upload failed, please try again.</p>');
			},
			success: function(data){
				var output = $(".specific_preview");
				if(data.status == 1){
				    $('#message').val('');
				    $('#myfile').val('');
				    $('.personal_preview').remove();
					if(data.sender_file != ''){
						var file = '<div id="filename"><div id="file_0"><span class="fa-stack fa-lg"><i class="fa fa-file fa-stack-1x "></i><strong class="fa-stack-1x" style="color:#FFF; font-size:12px; margin-top:2px;"></strong></span> <span style="font-size:15px;font-weight:800">'+data.sender_file+'</span>&nbsp;&nbsp;<a href="<?=base_url('uploads/chat/')?>'+data.sender_file+'" download><span class="fa fa-download"></span></a></div></div>';
					}else{
						var file = '';
					}
					var html = '<div class="outgoing_msg d-flex justify-content-end"> <div class="messageinnerimg order-2"><img src="'+data.sender_image+'" alt=""></div><div class="sent_msg"><div><p>'+data.sender_message+'</p><span class="time_date text-right mt-0">'+data.sender_date+' | '+data.sender_time+'</span>'+file+'</div></div></div>';
					output.append(html);
				}
				
				if(data.vali_error == 1){
					if(data.message_err != ''){
						$('#message_err').html(data.message_err);
					}else{
						$('#message_err').html('');
					}
					
					if(data.image_err != ''){
						$('#image_err').html(data.image_err);
					}else{
						$('#image_err').html('');
					}
				}
			}
		});
	});

});


$(document).ready(function(){
	//$("form #add_chat_msg").on('submit', function(e){
		
		$(document.body).on('submit', '#add_groupchat_msg' ,function(e){ 
		e.preventDefault();
		var form_data = new FormData(); 	

		var sender_id = $('#groupchat_sender_id').val(); 
		var host_id = $('#host_id').val(); 
		//var receiver_id = $('#receiver_id').val(); 
		var message = $('#group_message').val(); 
		var event_id = '<?=base64_decode(@$_GET['eId'])?>'; 
        var image = $('#myfile_group').prop('files')[0];


		form_data.append("sender_id", sender_id);
		form_data.append("host_id", host_id);
		//form_data.append("receiver_id", receiver_id);
		form_data.append("event_id", event_id);
		form_data.append("message", message);
        form_data.append("image", image);
		
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('event/send_group_chat'); ?>',
			data: form_data,
			dataType:"json",
			contentType: false,
			cache: false,
			processData:false,
			error:function(){
			  $('#uploadsuccessfully').html('<p style="color:#EA4335;">File upload failed, please try again.</p>');
			},
			success: function(data){
				var output = $(".specific_preview_groupchat");
				if(data.status == 1){
				    $('#group_message').val('');
					$('#myfile_group').val('');
					 $('.group_preview').remove();
					if(data.sender_file != ''){
						var file = '<div id="filename"><div id="file_0"><span class="fa-stack fa-lg"><i class="fa fa-file fa-stack-1x "></i><strong class="fa-stack-1x" style="color:#FFF; font-size:12px; margin-top:2px;"></strong></span> <span style="font-size:15px;font-weight:800">'+data.sender_file+'</span>&nbsp;&nbsp;<a href="<?=base_url('uploads/chat/')?>'+data.sender_file+'" download><span class="fa fa-download"></span></a></div></div>';
					}else{
						var file = '';
					}
					
					var html = '<div class="outgoing_msg d-flex justify-content-end"> <div class="messageinnerimg order-2"><img src="'+data.sender_image+'" alt=""></div><div class="sent_msg"><div><p>'+data.sender_message+'</p><span class="time_date text-right mt-0">'+data.sender_date+' | '+data.sender_time+'</span>'+file+'</div></div></div>';
					output.append(html);
				}
				
				if(data.vali_error == 1){
					if(data.message_err != ''){
						$('#message_group_err').html(data.message_err);
					}else{
						$('#message_group_err').html('');
					}
					
					if(data.image_err != ''){
						$('#group_image_err').html(data.image_err);
					}else{
						$('#group_image_err').html('');
					}
				}
			}
		});
	});

});

$(document).ready(function(){
		var timerId;
		//function update_chat(){
			timerId = setInterval(function(){
				//function update_chat(){
				$.ajax({
					type: 'POST',
					url: '<?php echo base_url('event/get_personal_chat');?>',
					data:{
					sender_id:$('#sender_id').val(),
					receiver_id:$('#receiver_id').val(),
					event_id : '<?=base64_decode(@$_GET['eId'])?>'
					},
					dataType: 'json',
					success: function(data){ //console.log(response);
						// $('#msgbody').html(data);
						// $('#msgbody').scrollTop($('#msgbody')[0].scrollHeight);
						// //alert(data);
						// // setTimeout(() => { clearInterval(timerId); }, 700);
						// //setTimeout(updateOnlineList, 700);
						// //clearInterval();
						// clearInterval(timerId);
						
						//$('.sidemessage-pnl').show();
						$('#display_chat_byuser').html(data.html); //hold the response in id and show on popup
						$('#latest_insert_chat').scrollTop($('#latest_insert_chat')[0].scrollHeight);
						console.log(data.html)
					}
				});
			},4000);
		//}
		
		
		    setInterval(function(){ 
			$.post("<?php echo base_url();?>event/count_allnewmsg", {event_id : '<?=base64_decode(@$_GET['eId'])?>'}, function(data){
				//alert(data);
				if(data > 0){
					//$('#all_msg_count').show();
					$('#all_msg_count').css('display','inline-block');
					$('#all_msg_count').text(data);
				}else{
				 $('#all_msg_count').css('display','none');
				}
			});
			},5000); 	
});	


$(document).ready(function(){
		var timerId;
		//function update_chat(){
			timerId = setInterval(function(){
				//function update_chat(){
				$.ajax({
					type: 'POST',
					url: '<?php echo base_url('event/get_group_chat');?>',
					data:{
					sender_id:$('#groupchat_sender_id').val(),
					host_user_attr:$('#host_id').val(),
					event_id : '<?=base64_decode(@$_GET['eId'])?>'
					},
					

		
		
					dataType: 'json',
					success: function(data){ //console.log(response);
						// $('#msgbody').html(data);
						// $('#msgbody').scrollTop($('#msgbody')[0].scrollHeight);
						// //alert(data);
						// // setTimeout(() => { clearInterval(timerId); }, 700);
						// //setTimeout(updateOnlineList, 700);
						// //clearInterval();
						// clearInterval(timerId);
						
						//$('.sidemessage-pnl').show();
						$('#display_groupchat_byuser').html(data.html); //hold the response in id and show on popup
						$('#latest_insert_groupchat').scrollTop($('#latest_insert_groupchat')[0].scrollHeight);
						//console.log(data.html)
					}
				});
			},4000);
		//}
		
		
		   	
});	

function deleteParticipant(participantId)
{
	swal({
		title: 'Are you sure want to delete this?',
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#A5DC86',
		cancelButtonColor: '#DD6B55',
		confirmButtonText: 'Yes',
		cancelButtonText: 'No',
		closeOnConfirm: true,
		closeOnCancel: true
	}, function(isConfirm){
	if (isConfirm) {
			$.ajax({
				type: "POST", 
				url:  '<?= base_url('event/remove_event_participant/') ?>',  
				data: {participantId:participantId, eId:'<?=base64_decode($_GET['eId'])?>'}, 
				dataType : 'json',
				beforeSend: function(){
				},
				success: function(response){
					// console.log(response);          
					// $('#viewBank').html(response.html);
					// $('#exampleModal').css('display', 'block');
					$('#remove_row_'+participantId+'').remove();
					if(response.status == 1){
					    swal({title: "Sucess!", text: "<strong>"+response.message+"</strong>", type: "success", showConfirmButton: true, html:true});
					}else{
					    swal({title: "Fail!", text: "<strong>"+response.message+"</strong>", type: "error", showConfirmButton: true, html:true});
					}			
				}
			}); 
	    }
	});	
}

function getInfo(id)
{
   //$('#exampleModal').css('display', 'block'); 
   // var list = '';
    $.ajax({
	  type: "POST", 
	  url:  '<?= base_url('event/get_invited_user_info/') ?>',  
	  data: {id:id}, 
	  dataType : 'json',
	  beforeSend: function(){
	  },
	  success: function(response){
		console.log(response);          
		//$('#viewBank').html(response.html);
		$('#email').val(response.email);
		$('#amount').val(response.distributed_event_price);
		$('#id').val(id);
		$('#event_id').val('<?=base64_decode(@$_GET['eId'])?>');
		$('#exampleModal').css('display', 'block'); 
	  }
    });   
           
}
$('#closepopup').click(function () {
   $('#exampleModal').css('display', 'none');  
});
$('#closepopup_2').click(function () { 
   $('#offlineModal').css('display', 'none');  
});


function addPayment(id='', userId='', eventId='')
{
	
	if(userId == ''){
		swal({title: "Fail!", text: "<strong>This user not registered.</strong>", type: "error", showConfirmButton: true, html:true});
		return false;
	}
    $('#offlineModal').css('display', 'block');
    $('#invited_id').val(id);	
    $('#user_id').val(userId);	
    $('#newevent_id').val(eventId);	
   // // var list = '';
   // $.ajax({
	  // type: "POST", 
	  // url:  '<?= base_url('event/get_invited_user_info/') ?>',  
	  // data: {id:id}, 
	  // dataType : 'json',
	  // beforeSend: function(){
	  // },
	  // success: function(response){
		 // console.log(response);          
		 // //$('#viewBank').html(response.html);
		 // $('#email').val(response.email);
		 // $('#amount').val(response.distributed_event_price);
		 // $('#id').val(id);
		 // $('#event_id').val('<?=base64_decode(@$_GET['eId'])?>');
		 // $('#exampleModal').css('display', 'block'); 
	  // }
   // });   
           
}

$(document).ready(function(){
	$(document.body).on('submit', '#update-invitee' ,function(e){ 
		e.preventDefault();
		var form_data = new FormData(); 	
		var email = $('#email').val(); 
		var amount = $('#amount').val(); 
		var id = $('#id').val(); 
		
		var event_id = $('#event_id').val(); 
		form_data.append("email", email);
		form_data.append("amount", amount);
		form_data.append("id", id);
		form_data.append("event_id", event_id);
		
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('event/update_invitee'); ?>',
			data: form_data,
			dataType:"json",
			contentType: false,
			cache: false,
			processData:false,
			error:function(){
			    $('#uploadsuccessfully').html('<p style="color:#EA4335;">File upload failed, please try again.</p>');
			},
			success: function(data){
				
				if(data.email_exist != ''){
				    $('#email_err').html(data.email_exist);
				}else{
				    $('#email_err').html('');
				}
				
				if(data.large_amount != ''){
				    $('#large_amount').html(data.large_amount);
				}else{
				    $('#large_amount').html('');
				}
				
				if(data.vali_error == 1){
					if(data.email_err != ''){
					    $('#email_err').html(data.email_err);
					}else{
					    $('#email_err').html('');
					}
					
					if(data.amount_err != ''){
					    $('#amount_err').html(data.amount_err);
					}else{
					    $('#amount_err').html('');
					}
				}
				
				if(data.status == 1){
				    swal({title: "Sucess!", text: "<strong>"+data.message+"</strong>", type: "success", showConfirmButton: true, html:true}, function(){ window.location.href = " "});
				}
				
				if(data.status == 1){
					$.ajax({
						type: "POST",
						url: "<?php echo site_url('event/send_email_updated_invited');?>",
						data: {event_id : event_id, amount : amount, email:email},
						dataType: "json",
						async: false,
						done: function (data) {
							
						}
					});
				}
			}
		});
	});
});

$(document).ready(function () {
    $("#btn").click(function () {
        $("#Create").toggle();
        
    });
});

document.getElementById("myfile_group").onchange = function(event) {
var output = $(".group_preview");
let file = event.target.files[0];
	let blobURL = URL.createObjectURL(file);
	var html = '<div id="filename"><div id="file_0"><span class="fa-stack fa-lg"><i class="fa fa-file fa-stack-1x "></i><strong class="fa-stack-1x" style="color:#FFF; font-size:12px; margin-top:2px;"></strong></span> <span style="font-size:15px;font-weight:800">'+file.name+'</span>&nbsp;&nbsp;</div></div>'
	$(output).html(html)
}

document.getElementById("myfile").onchange = function(event) {
var output = $(".personal_preview");
let file = event.target.files[0];
	let blobURL = URL.createObjectURL(file);
	var html = '<div id="filename"><div id="file_0"><span class="fa-stack fa-lg"><i class="fa fa-file fa-stack-1x "></i><strong class="fa-stack-1x" style="color:#FFF; font-size:12px; margin-top:2px;"></strong></span> <span style="font-size:15px;font-weight:800">'+file.name+'</span>&nbsp;&nbsp;</div></div>'
	$(output).html(html)
}

function stripe(){
	$('#stripeModel').css('display', 'block');
}
$('#closepopup_3').click(function () { 
   $('#stripeModel').css('display', 'none');  
});

$(document).ready(function(){
	var id = '<?=@$this->session->userdata('loguserId')?>';
	$.ajax({
		type: "POST", 
		url:  '<?= base_url('event/check_stripe_status/') ?>',  
		data: {id:id}, 
		dataType : 'json',
		beforeSend: function(){
		},
		success: function(response){
		    if(response.connected == 1){
				$('#stripe_connected').css('display', 'block');
				$('#stripe_not_connected').css('display', 'none');
				$('#connectingAcc').css('display', 'none');
				$('#connected').css('display', 'block');
				$('#stripe_acc_id').text(response.stripe_acc_id);
				
			}
			if(response.connected == '0'){
				$('#connected').css('display', 'none');
			}
		}
	});
});
</script>		