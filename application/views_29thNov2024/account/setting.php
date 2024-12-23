<style>
.setting-menu {
  list-style-type: none;
  margin: 0;
  padding: 0;
}
.setting-menu > li a {
  display: block;
  width: 60px;
  
}


</style>


<!------ Include the above in your HEAD tag ---------->
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
							
								<div class="col-md-8">
								
									<div class="info-single">
										<h5 class="title"><a href="<?=base_url('setting/changepassword')?>">Change Password <span class="fa fa-chevron-right" style="padding: 10px 75px;"></span></a></h5>
									</div>
									
									<div class="info-single">
										<h5 class="title"><a href="<?=base_url('setting/customize-payment')?>">Customize Payment <span class="fa fa-chevron-right" style="padding: 10px 60px;"></span></a></h5>
									</div>
									
									<div class="info-single">
										<h5 class="title"><a href="<?=base_url('setting/payment-method')?>">Payment Method<span class="fa fa-chevron-right" style="padding: 10px 81px;"></span></a></h5>
									</div>
									
									<div class="info-single">
										<h5 class="title"><a href="<?=base_url('event-and-participant')?>">Event And Participant <span class="fa fa-chevron-right" style="padding: 10px 45px;"></span></a></h5>
									</div>							
									<div class="info-single">
										<h5 class="title"><a href="<?=base_url('transaction')?>">Transaction History <span class="fa fa-chevron-right" style="padding: 10px 61px;"></span></a></h5>									  
									</div>
									
									<div class="info-single">
										<!--<h5 class="title"><a href="<?=base_url('transaction')?>">Email Management <span class="fa fa-chevron-right" style="padding: 10px 49px;"></span></a></h5>-->	

										<ul class="main-menu">	
											<li class="dropdown" >
												<a class="btn_1 btn-primary_1 dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" href="#"><h5 class="title">Email Management</h5></a>
												<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" data-bs-popper="static">
													<li><a class="dropdown-item" href="<?=base_url('email/template-management')?>"><i class="far fa-circle nav-icon"></i> Template Creation</a></li>
													
													<li><a class="dropdown-item" href="<?=base_url('mailer')?>"><i class="far fa-circle nav-icon"></i> Mailer</a>
													</li>
												</ul>	
											</li>
										</ul>										
									</div>
									
									<div class="info-single">
										<h5 class="title"><a href="javascript:void(0);" onclick="closeaccount(<?php echo !empty($this->session->userdata('loguserId')) ? $this->session->userdata('loguserId') : ''?>)">Close Account </a></h5>
									</div> 
									
									
									
									
									
								</div>
								
								
							</div>
                        </div>
						
						
                    </div>			
                </div>
            </div>
        </div>
<script>
function closeaccount(id) 
{
	var textMsg = 'Closing your account is permanent. Your personal information and content will be deleted. In the future, you may rejoin by creating a new account.We are sorry to see you leave.';
	swal({
		title: 'Are You sure want to delete account?',
		text : '<p style="color:black;text-align:justify;font-family: sans-serif;">'+textMsg+'</p>',
		type: 'warning',
		html:true,
		showCancelButton: true,
		confirmButtonColor: '#00007D',
		cancelButtonColor: '#DD6B55',
		confirmButtonText: 'Yes',
		cancelButtonText: 'No',
		closeOnConfirm: true,
		closeOnCancel: true
	}, function(isConfirm){
	if (isConfirm) {
	    window.location.href = '<?php echo base_url('setting/delete_account/')?>'+id
	}
	});
}
</script>		