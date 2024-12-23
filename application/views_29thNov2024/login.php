<style>
.style.facebookloginbtn {
    background: #4267B2;
    color: #fff;
    border-color: #4267B2;
}
.style {
    border-color: #3b5998;
    color: #3b5998;
    display: block;
    width: 100%;
    position: relative;
    border: 1px solid #088dd3;
    background-color: transparent;
    transition: .5s;
    padding: 12px 30px;
    border-radius: 2px;
    box-shadow: unset;
    font-weight: 600;
    font-size: 14.5px;
    text-transform: uppercase;
}

.connect-with-social button i {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    left: 15px;
    font-size: 20px;
}
.bx {
    font-family: 'boxicons'!important;
    font-weight: normal;
    font-style: normal;
    font-variant: normal;
    line-height: 1;
    display: inline-block;
    text-transform: none;
    speak: none;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

.style.googleloginbtn {
    background: #DB4437;
    color: #fff;
    border-color: #DB4437;
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

        <div class="login-register-area section-padding-02">
            <div class="container">
                <div class="row justify-content-center g-5">
                    <div class="col-lg-6 col-md-8">
                        <div class="hero-form mt-0 grey-bg h-100">
                            <h3 class="form-title black">Login</h3>
							
							<?php if (!empty($this->session->flashdata('already_account'))): ?>
							<?=$this->session->flashdata('already_account') ?>
							<?php endif ?> 
							
							<?php if (!empty($msg)): ?>
							<?=$msg ?>
							<?php endif ?> 
							
                            <form action="" method="POST" class="exvent-form">
                                <div class="row gy-4">
                                    <div class="col-12">
                                        <div class="single-input white-bg">
                                            <input type="email" placeholder="Email" class="form-control" name="username" id="username" autocomplete="off" value="<?php if(!empty($_COOKIE["loginId"])) { echo $_COOKIE["loginId"]; } ?>">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="single-input white-bg">
                                            <input type="password" placeholder="Password" class="form-control" name="password" id="password" autocomplete="off" value="<?php if(!empty($_COOKIE["loginPass"])) { echo $_COOKIE["loginPass"]; } ?>">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="flexCheckDefault"  name="remember" value="1" <?php if(!empty($_COOKIE["loginId"])) { ?> checked <?php } ?>>
                                            <label class="form-check-label" for="flexCheckDefault">Remember Me</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-5 text-center">
                                        <button type="submit" class="submit_btn fw-semibold">Log in</button>
                                    </div>
                                    <div class="col-12">
                                        <a href="<?=base_url('forgetpassword')?>" class="forgot-pass">Forgot your password?</a>
                                    </div>
                                </div>
								
								<div class="connect-with-social" style="margin-top: 20px;text-align: center;">

								<a href="<?php echo $this->facebook->login_url(); ?>" style="width:100%"> <button type="button" class="facebook style facebookloginbtn" style=""><i class="fab fa-facebook"></i> Connect with Facebook</button></a><br><br>
								
									<a href="<?=base_url('user_authentication')?>" style="width:100%">  <button type="button" class="twitter style googleloginbtn"><i class="fab fa-google"></i> Connect with Google</button></a>

								</div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-8">
                        <div class="hero-form mt-0 grey-bg">
                            <h3 class="form-title black">Sign up</h3>
                            <form action="#" class="exvent-form" id="submitform">
                                <div class="row gy-4">
                                    <div class="col-12">
                                        <div class="single-input white-bg">
                                            <input type="text" placeholder="First Name" class="form-control" name="fname" id="fname" autocomplete="off">
                                        </div>
										<small id="fname_error"></small>
                                    </div>
									
									<div class="col-12">
                                        <div class="single-input white-bg">
                                            <input type="text" placeholder="Last Name" class="form-control" name="lname" id="lname" autocomplete="off">
                                        </div>
										<small id="lname_error"></small>
                                    </div>
									
                                    <div class="col-12">
                                        <div class="single-input white-bg">
                                            <input type="email" placeholder="Email" class="form-control" name="email" id="email" autocomplete="off">
                                        </div>
										<small id="email_error"></small>
                                    </div>
									
                                    <div class="col-12">
                                        <div class="single-input white-bg">
                                            <input type="password" placeholder="Password" class="form-control" name="password" id="password" autocomplete="off">
                                        </div>
										<small id="pass_error"></small>
                                    </div>
									
                                    <div class="col-12">
                                        <div class="single-input white-bg">
                                            <input type="password" placeholder="Confrim Password" class="form-control" name="confirmpassword" id="confirmpassword" autocomplete="off">
                                        </div>
										<small id="cnfpass_error"></small>
                                    </div>
                                    <div class="col-12">
                                        <label><input type="checkbox" required> By signing up, I agree to the Privacy Policy and the Terms of Services.</label>
                                    </div>
                                    <div class="col-sm-5 text-center">
                                        <button type="submit" class="submit_btn fw-semibold">Sign up</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<script>
$(document).ready(function(){
	$("#submitform").on('submit', function(e){
		e.preventDefault();
		//var form_data = new FormData(); 	
		
		$.ajax({
		type: 'POST',
		url: '<?php echo base_url('login/register'); ?>',
		data: new FormData(this) ,
		dataType:"json",
		contentType: false,
		cache: false,
		processData:false,
		error:function(){
		  $('#uploadsuccessfully').html('<p style="color:#EA4335;">File upload failed, please try again.</p>');
		},
		success: function(data){
			if(data.status == 1){
				swal({title: "Sucess!", text: "<strong>"+data.message+"</strong>", type: "success", showConfirmButton: true, html:true}, function(){ window.location.href = " "});
			}
			if(data.status == 0){
				swal({title: "Fail!", text: "<strong>"+data.message+"</strong>", type: "error", showConfirmButton: true, html:true}, function(){ window.location.href = " "});
			}
			if(data.vali_error == 1){
				
				if(data.pass_error != ''){
					$('#pass_error').html(data.pass_error);
				}else{
					$('#pass_error').html('');
				}
				
				if(data.cnfpass_error != ''){
					$('#cnfpass_error').html(data.cnfpass_error);
				}else{
					$('#cnfpass_error').html('');
				}
				
				if(data.email_error != ''){
					$('#email_error').html(data.email_error);
				}else{
					$('#email_error').html('');
				}
				
				if(data.fname_error != ''){
					$('#fname_error').html(data.fname_error);
				}else{
					$('#fname_error').html('');
				}
				
				if(data.lname_error != ''){
					$('#lname_error').html(data.lname_error);
				}else{
					$('#lname_error').html('');
				}
				
			}
		}
		});
	});

});
</script>		