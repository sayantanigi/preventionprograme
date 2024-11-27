
<style>
	body{margin-top:20px !important;
	background:#eee !important;
	}

	/* WRAPPERS */
	#wrapper {
	  width: 100% !important;
	  overflow-x: hidden !important;
	}
	.wrapper {
	  padding: 0 20px !important;
	}
	.wrapper-content {
	  padding: 20px 10px 40px !important;
	}
	#page-wrapper {
	  padding: 0 15px !important;
	  min-height: 568px !important;
	  position: relative !important;
	}
	@media (min-width: 768px) {
	  #page-wrapper {
		position: inherit !important;
		margin: 0 0 0 240px !important;
		min-height: 2002px !important;
	  }
	}

	/* Payments */
	.payment-card {
	  background: #ffffff !important;
	  padding: 20px !important;
	  margin-bottom: 25px !important;
	  border: 1px solid #e7eaec !important;
	}
	.payment-icon-big {
	  font-size: 60px !important;
	  color: #d1dade !important;
	}
	.payments-method.panel-group .panel + .panel {
	  margin-top: -1px !important;
	}
	.payments-method .panel-heading {
	  padding: 15px !important;
	}
	.payments-method .panel {
	  border-radius: 0 !important;
	}
	.payments-method .panel-heading h5 {
	  margin-bottom: 5px !important;
	}
	.payments-method .panel-heading i {
	  font-size: 26px !important;
	}

	.payment-icon-big {
		font-size: 60px !important;
		color: #d1dade !important;
	}

	.form-control,
	.single-line {
	  background-color: #FFFFFF !important;
	  background-image: none !important;
	  border: 1px solid #e5e6e7 !important;
	  border-radius: 1px !important;
	  color: inherit !important;
	  display: block !important;
	  padding: 6px 12px !important;
	  transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s !important;
	  width: 100% !important;
	  font-size: 14px !important;
	}
	.text-navy {
		color: #1ab394 !important;
	}
	.text-success {
		color: #1c84c6 !important;
	}
	.text-warning {
		color: #f8ac59 !important;
	}
	.ibox {
	  clear: both !important;
	  margin-bottom: 25px !important;
	  margin-top: 0 !important;
	  padding: 0 !important;
	}
	.ibox.collapsed .ibox-content {
	  display: none !important;
	}
	.ibox.collapsed .fa.fa-chevron-up:before {
	  content: "\f078" !important;
	}
	.ibox.collapsed .fa.fa-chevron-down:before {
	  content: "\f077" !important;
	}
	.ibox:after,
	.ibox:before {
	  display: table !important;
	}
	.ibox-title {
	  -moz-border-bottom-colors: none !important;
	  -moz-border-left-colors: none !important;
	  -moz-border-right-colors: none !important;
	  -moz-border-top-colors: none !important;
	  background-color: #ffffff !important;
	  border-color: #e7eaec !important;
	  border-image: none !important;
	  border-style: solid solid none !important;
	  border-width: 3px 0 0 !important;
	  color: inherit !important;
	  margin-bottom: 0 !important;
	  padding: 14px 15px 7px !important;
	  min-height: 48px !important;
	}
	.ibox-content {
	  background-color: #ffffff !important;
	  color: inherit !important;
	  padding: 15px 20px 20px 20px !important;
	  border-color: #e7eaec !important;
	  border-image: none !important;
	  border-style: solid solid none !important;
	  border-width: 1px 0 !important;
	}
	.ibox-footer {
	  color: inherit !important;
	  border-top: 1px solid #e7eaec !important;
	  font-size: 90% !important;
	  background: #ffffff !important;
	  padding: 10px 15px !important;
	}
	.text-danger {
		color: #ed5565 !important;
	}
	.exvent-hero-section{
		top :-21px !important;
	}
	.text-navy_1 > ul{
		list-style: unset !important;
	}
</style>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
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

        <div class="py-5">
            
			
			
<div class="container">
	<div class="wrapper wrapper-content animated fadeInRight">
		<div class="row">
			<div class="col-lg-12">
				<div class="ibox">
					<div class="ibox-title"> 
					</div>
					<div class="ibox-content">
						<div class="panel-group payments-method" id="accordion">
						
							
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<div class="pull-right">
										<i class="fa fa-cc-amex text-success"></i>
										<i class="fa fa-cc-mastercard text-warning"></i>
										<i class="fa fa-cc-discover text-danger"></i>
									</div>
									<h5 class="panel-title">
										<!--<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Credit Card</a>-->
									</h5>
								</div>
								<div id="collapseTwo_1" class="panel-collapse_1 collapse_1 in_1">
									<div class="panel-body">

										<div class="row">
											<div class="col-md-5">
												<h2>Summary</h2>
												<strong>Product:</strong>: <?=@$subscription->name?> <br>
												<strong>Price:</strong>: <span class="text-navy"><?='$'.@$subscription->amount?></span><br>
												
                                                <strong>Description:</strong>: <span class="text-navy_1">
													<p style="text-align:justify;"><?=@$subscription->description?></p>
												</span>
												
												
											</div>
											<div class="col-md-7">

												<form role="form" class="contact-form" action="" method="POST" id="paymentForm">
												
													<div class="row">
														<div class="col-xs-12">
															<div class="form-group">
																<label class="fw-semibold">NAME OF CARD HOLDER</label>
																<input type="text" class="form-control" name="card_name" id="card_name" placeholder="Name of Card Holder" value="<?=@$user->fname .' '. @$user->lname?>">
															</div>
															<small id="card_name_err"></small>
															<?='<small>'.form_error('card_name').'</small>';?>
														</div>
													</div><br>
													
													<div class="row">
														<div class="col-xs-12">
															<div class="form-group">
																<label class="fw-semibold">ADDRESS</label>
																<input type="text" class="form-control" name="card_address" id="card_address" placeholder="Full Address" value="<?=@$user->address?>">
															</div>
															<small id="card_address_err"></small>
															<?='<small>'.form_error('card_address').'</small>';?>
														</div>
													</div><br>
													
													<div class="row">
														<div class="col-xs-4 col-md-4">
															<div class="form-group">
																<label class="fw-semibold">COUNTRY</label>
																<input type="text" class="form-control" placeholder="Country" name="card_country" id="card_country" value="<?=set_value('card_country')?>">
															</div>
															<small id="card_country_err"></small>
															<?='<small>'.form_error('card_country').'</small>';?>
														</div>
														<div class="col-xs-4 col-md-4 pull-right">
															<div class="form-group">
																<label class="fw-semibold">STATE</label>
																<input type="text" class="form-control" placeholder="State" name="card_state" id="card_state" value="<?=set_value('card_state')?>">
															</div>
															<small id="card_state_err"></small>
															<?='<small>'.form_error('card_state').'</small>';?>
														</div>
														
														<div class="col-xs-4 col-md-4 pull-right">
															<div class="form-group">
																<label class="fw-semibold">CITY</label>
																<input type="text" class="form-control" placeholder="City" name="card_city" id="card_city" value="<?=set_value('card_city')?>">
															</div>
															<small id="card_city_err"></small>
															<?='<small>'.form_error('card_city').'</small>';?>
														</div>
													</div><br>
													
													<div class="row">
														<div class="col-xs-12">
															<div class="form-group">
																<label class="fw-semibold">ZIPCODE</label>
																<input type="text" class="form-control" placeholder="Zipcode" name="card_zipcode" id="card_zipcode" value="<?=set_value('card_zipcode')?>">
															</div>
															<small id="card_zipcode_err"></small>
															<?='<small>'.form_error('card_zipcode').'</small>';?>
														</div>
													</div><br>
													
													<div class="row">
														<div class="col-xs-12">
															<div class="form-group">
																<label class="fw-semibold">AMOUNT</label>
																<input type="text" class="form-control" placeholder="Amount" name="card_amount" id="card_amount" value="<?='$'.@base64_decode($_GET['amo'])?>">
																<input type="hidden" name="card_amount_1" id="card_amount_1" value="<?=@base64_decode(@$_GET['amo'])?>">
																<input type="hidden" name="card_user_id" id="card_user_id" value="<?=@base64_decode(@$_GET['uId'])?>">
																<input type="hidden" name="card_sub_id" id="card_sub_id" value="<?=@base64_decode(@$_GET['subId'])?>">
																<input type="hidden" name="card_email" id="card_email" value="<?=@$user->email?>">
															</div>
															<small id="card_amount_err"></small>
															<?='<small>'.form_error('card_amount').'</small>';?>
														</div>
													</div><br>
													
													<div class="row">
														<div class="col-xs-12">
															<div class="form-group">
																<label class="fw-semibold">CARD NUMBER</label>
																<div class="input-group">
																	<input type="text" class="form-control" placeholder="Valid Card Number" name="card_number" id="card_number" value="<?=set_value('card_number')?>">
																	<!--<span class="input-group-addon"><i class="fa fa-credit-card"></i></span>-->
																</div>
																<small id="card_number_err"></small>
																<?='<small>'.form_error('card_number').'</small>';?>
															</div>
														</div>
													</div><br>
													
													<div class="row">
													
														<div class="col-xs-4 col-md-4">
															<div class="form-group">
																<label class="fw-semibold">EXPIRATION MONTH</label>
																<input type="text" class="form-control" name="card_expiry_month" id="card_expiry_month" placeholder="Expiry (MM)" value="<?=set_value('card_expiry_month')?>">
															</div>
															<small id="card_expiry_month_err"></small>
															<?='<small>'.form_error('card_expiry_month').'</small>';?>
														</div>
														
														<div class="col-xs-4 col-md-4 pull-right">
															<div class="form-group">
																<label class="fw-semibold">EXPIRATION YEAR</label>
																<input type="text" class="form-control" placeholder="Expiry (YYYY)" name="card_expiry_year" id="card_expiry_year" value="<?=set_value('card_expiry_year')?>">
															</div>
															<small id="card_expiry_year_err"></small>
															<?='<small>'.form_error('card_expiry_year').'</small>';?>
														</div>
														
														<div class="col-xs-4 col-md-4 pull-right">
															<div class="form-group">
																<label class="fw-semibold">CVC CODE</label>
																<input type="text" class="form-control" placeholder="CVC" name="card_cvc" id="card_cvc" value="<?=set_value('card_cvc')?>">
															</div>
															<small id="card_cvc_err"></small>
															<?='<small>'.form_error('card_cvc').'</small>';?>
														</div>
													</div><br>
													
													
													
													<div class="row">
														<div class="col-xs-12">
															<button class="btn btn-primary" type="submit">Make a payment!</button>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
        </div>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script> 
<script>
Stripe.setPublishableKey('pk_test_51MPhgSIuZrwn6gWggTu5pxq41l6ZODzSg2zZ1kjKynv3yR61OZDey3AcNm2iwioDVJqSuJ3TCXJCdOAJn1VaNfyk00QkWY7DPT');
$(document).ready(function() {
    $("#paymentForm").submit(function(event) {
        //$('#makePayment').attr("disabled", "disabled");
        // create stripe token to make payment
        Stripe.createToken({
            number: $('#card_number').val(),
            cvc: $('#card_cvc').val(),
            exp_month: $('#card_expiry_month').val(),
            exp_year: $('#card_expiry_year').val()
        }, handleStripeResponse); 
        return false;
    });
});

function handleStripeResponse(status, response) {
	//console.log(JSON.stringify(response));
	var geterror = JSON.stringify(response);
	console.log(response.error);
	if(response.error){
	if(response.error.code == 'missing_payment_information'){
		//$('#card_no_error').html(response.error.message);
		$('#card_number_err').html(response.error.message);
		
	}
	 if(response.error.code == 'invalid_cvc'){
		 //$('#cvc_error').html(response.error.message);
		 $('#card_cvc_err').html(response.error.message);
	 }
	
	if(response.error.code == 'invalid_expiry_year'){
		//$('#expe_error').html(response.error.message);
		$('#card_expiry_year_err').html(response.error.message);
	}
	
	if(response.error.code == 'invalid_number'){
		//$('#card_no_error').html(response.error.message);
		$('#card_number_err').html(response.error.message);
	}
	
	if(response.error.code == 'incorrect_number'){
		//$('#card_no_error').html(response.error.message);
		$('#card_number_err').html(response.error.message);
	}
	
	if(response.error.code == 'invalid_expiry_month'){
		//$('#card_no_error').html(response.error.message);
		$('#card_expiry_month_err').html(response.error.message);
	}
	
	}
	
    if (response.error) {
  
        $(".paymentErrors").html(response.error.message);
    } else {
		var payForm = $("#paymentForm");
        
        var stripeToken = response['id'];
       
        payForm.append("<input type='hidden' name='stripeToken' value='" + stripeToken + "' />");
		payForm.get(0).submit();			
    }
}
</script>
	