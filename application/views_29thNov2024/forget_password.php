

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

        <div class="login-register-area section-padding-02">
            <div class="container">
                <div class="row justify-content-center g-5">
                    <div class="col-lg-6 col-md-8">
                        <div class="hero-form mt-0 grey-bg h-100">
                            <h3 class="form-title black"><?=@$page?></h3>
							<?php if(!empty($this->session->flashdata('suc_msg'))){?>
								<div class="alert alert-success" style="padding: 1.25rem 1.25rem;color: #ffffff;background-color: #1e70b2;">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									<strong><?php echo $this->session->flashdata('suc_msg'); ?></strong>
								</div>
							<?php 
							    $this->session->unset_userdata('suc_msg');
							} 
							?>
                            <form action="" method="POST" class="exvent-form">
                                <div class="row gy-4">
                                    <div class="col-12">
                                        <div class="single-input white-bg">
                                            <input type="email" placeholder="Email" class="form-control" name="email" id="email" autocomplete="off">
                                        </div>
										<?php echo form_error('email','<small class="" style="color:red;">','</small>'); ?>
                                    </div>
                                    
                                    <!--<div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">Remember Me</label>
                                        </div>
                                    </div>-->
                                    <div class="col-sm-5 text-center">
                                        <button type="submit" class="submit_btn fw-semibold">Get My Password</button>
                                    </div>
                                    <div class="col-12">
                                        <a href="<?=base_url('login')?>" class="forgot-pass">Back to Login</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
					
                   
                </div>
            </div>
        </div>