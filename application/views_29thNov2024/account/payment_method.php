<?php
if(!empty($this->session->flashdata('disconnect'))){
	$msg = $this->session->flashdata('disconnect');
	echo '<script>swal({
		title: "Success!",
		text: "<strong>'.$msg.'</strong>",
		type: "success",
		html:true,
		showConfirmButton: true
	});</script>';
}
?>
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

.onoffswitch {
    position: relative; width: 90px;
    -webkit-user-select:none; -moz-user-select:none; -ms-user-select: none;
}

.onoffswitch-checkbox {
    display: none;
}

.onoffswitch-label {
    display: block; overflow: hidden; cursor: pointer;
    border: 2px solid #999999; border-radius: 20px;
}

.onoffswitch-inner {
    display: block; width: 200%; margin-left: -100%;
    -moz-transition: margin 0.3s ease-in 0s; -webkit-transition: margin 0.3s ease-in 0s;
    -o-transition: margin 0.3s ease-in 0s; transition: margin 0.3s ease-in 0s;
}

.onoffswitch-inner:before, .onoffswitch-inner:after {
    display: block; float: left; width: 50%; height: 30px; padding: 0; line-height: 30px;
    font-size: 14px; color: white; font-family: Trebuchet, Arial, sans-serif; font-weight: bold;
    -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box;
}

.onoffswitch-inner:before {
    content: "ON";
    padding-left: 10px;
    background-color: #2FCCFF; color: #FFFFFF;
}

.onoffswitch-inner:after {
    content: "OFF";
    padding-right: 10px;
    background-color: #EEEEEE; color: #999999;
    text-align: right;
}

.onoffswitch-switch {
    display: block; width: 18px; margin: 6px;
    background: #FFFFFF;
    border: 2px solid #999999; border-radius: 20px;
    position: absolute; top: 0; bottom: 0; right: 56px;
    -moz-transition: all 0.3s ease-in 0s; -webkit-transition: all 0.3s ease-in 0s;
    -o-transition: all 0.3s ease-in 0s; transition: all 0.3s ease-in 0s; 
}

.onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-inner {
    margin-left: 0;
}

.onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-switch {
    right: 0px; 
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

        <div class="single-speaker-page">
            <div class="container">
                <div class="row justify-content-between">
                    <?php $this->load->view('account/dashboard_menu')?>
                    <div class="col-lg-8">
                        <div class="speaker-informations">
						   <?php  if(@$check_stripe_connect > 0){ ?>
								<div class="row">
									<div class="col-md-8">      
										<h4>Stripe</h4>
									</div>
									<div class="col-md-4">
										<div class="onoffswitch">
											<button  class="btn"   id="connected" style="pointer-events: none;">Connected &nbsp; &nbsp; </button>
											<a href="javascript:void(0)" style="margin:0px 30px;" onclick="stripedisconnect()">Disconnect</a>
										</div>
									</div> 
								</div>
						   <?php }elseif($check_paypal_connect > 0){ ?>
								<div class="row">
									<div class="col-md-8">      
										<h4>Paypal</h4>
									</div>
									<div class="col-md-4">
										<div class="onoffswitch">
											<button  class="btn"   id="connected" style="pointer-events: none;">Connected &nbsp; &nbsp; </button>
											<a href="javascript:void(0)" style="margin:0px 30px;" onclick="paypaldisconnect()">Disconnect</a>
										</div>
									</div> 
								</div>
						   <?php } ?>
						   
						    <?php if(($check_paypal_connect == 0) AND (@$check_stripe_connect == 0)){ ?>
							   <div class="row">
									<div class="col-md-8">      
										<p> Not connected stripe or paypal payment gateway</p>
									</div>
									
								</div>
						    <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<script>
		//Article status change function
	function changeDealStatus(id, thisSwitch) {      
		var newStatus;      
		if (thisSwitch.val() == 1) {         
			thisSwitch.val('0');       
			newStatus = '0';
		} else {      
			thisSwitch.val('1');       
			newStatus = '1';
		}
      
		$.ajax({         
			url: '<?php echo base_url('setting/change_paystatus'); ?>',     
			type: 'POST',       
			dataType: 'json',       
			data: {         
				userId: String(id),        
				status: String(newStatus)        
			},
		})
		.done(function(data) {  
			if(data.status == 1){
				swal({title: "Sucess!", text: "<strong>"+data.message+"</strong>", type: "success", showConfirmButton: true, html:true}, function(){ window.location.href = " "});
			}else if(data.status == 0){
				swal({title: "Sucess!", text: "<strong>"+data.message+"</strong>", type: "success", showConfirmButton: true, html:true}, function(){ window.location.href = " "});
			}
		})
		.fail(function(data) {      
			console.log(data);       
		}); 
	}
	</script>
	
	<script>
function stripedisconnect() 
{
	var textMsg = 'Are you sure want to disconnect the stripe payment.';
	swal({
		title: 'Are you sure want to disconnect the stripe payment?',
		//text : '<p style="color:black;text-align:justify;font-family: sans-serif;">'+textMsg+'</p>',
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
	    window.location.href = '<?php echo base_url('setting/disconnectstripe/')?>'
	}
	});
}
function paypaldisconnect() 
{
	var textMsg = 'Are you sure want to disconnect the paypal payment.';
	swal({
		title: 'Are you sure want to disconnect the paypal payment?',
		//text : '<p style="color:black;text-align:justify;font-family: sans-serif;">'+textMsg+'</p>',
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
	    window.location.href = '<?php echo base_url('setting/disconnectpaypal/')?>'
	}
	});
}

</script>	