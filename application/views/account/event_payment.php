<style>
input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
	-webkit-appearance: none;
	-moz-appearance: none;
	appearance: none;
	margin: 0; 
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

        <div class="py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="bg-light p-5 shadow border">
                            <form class="contact-form" action="" method="POST" id="paymentForm">
                                <h3 class="text-center h4 fw-bold mb-5 text-capitalize"><?=@$page?></h3>
								
								
								
                                <div class="mb-4">
                                    <label class="fw-semibold">Name of Card Holder</label>
                                    <input type="text" class="form-control" name="card_name" id="card_name" placeholder="Name of Card Holder" value="<?=@$user->fname .' '. @$user->lname?>">
									<small id="card_name_err"></small>
                                </div>
								
								<div class="mb-4">
                                    <label class="fw-semibold">Address</label>
									<input type="text" class="form-control"  placeholder="Full Address" name="card_address" id="card_address" value="<?=@$user->address?>">
									<small id="card_address_err"></small>
                                </div>
								
								<div class="row">
                                    <div class="col-lg-6 mb-4">
                                        <label class="fw-semibold">Country</label>
                                        <input type="text" class="form-control" placeholder="Country" name="card_country" id="card_country">
										<small id="card_country_err"></small>
                                    </div>
									
									<div class="col-lg-6 mb-4">
                                        <label class="fw-semibold">State</label>
                                        <input type="text" class="form-control" placeholder="State" name="card_state" id="card_state">
										<small id="card_state_err"></small>
                                    </div>
									
									<div class="col-lg-6 mb-4">
                                        <label class="fw-semibold">City</label>
                                        <input type="text" class="form-control" placeholder="City" name="card_city" id="card_city">
										<small id="card_city_err"></small>
                                    </div>
									
									<div class="col-lg-6 mb-4">
                                        <label class="fw-semibold">Zipcode</label>
                                        <input type="text" class="form-control" placeholder="Zipcode" name="card_zipcode" id="card_zipcode">
										<small id="card_zipcode_err"></small>
                                    </div>
									
									<div class="col-lg-12 mb-4">
                                        <label class="fw-semibold">Payment In</label>
                                        <select class="form-control" name="payment_in" id="payment_in">
										   <option value="Full Payment">Full Payment</option>
										   <option value="Part Payment">Partial Payment</option>
										</select>
                                    </div>
                                </div>
								
								<div class="mb-4">
                                    <label class="fw-semibold">Amount</label>
									<span style="position: absolute;font-size: 20px;margin: 6px 5px;font-weight: 600;">$</span>
									<input type="number" class="form-control"  placeholder="Amount" name="card_amount" id="card_amount" value="<?=base64_decode($_GET['amo'])?>" disabled style="width: 95%;margin: 0px 23px;">
									<input type="hidden" name="card_amount_1" id="card_amount_1" value="<?=@base64_decode(@$_GET['amo'])?>">
									<input type="hidden" name="card_user_id" id="card_user_id" value="<?=@$this->session->userdata('loguserId')?>">
									<input type="hidden" name="card_email" id="card_email" value="<?=@$user->email?>">
									<small id="card_amount_err"></small>
                                </div>
								
								<div class="mb-4">
                                    <label class="fw-semibold">Card Number</label>
									<input type="text" class="form-control"  placeholder="Card Number" name="card_number" id="card_number">
									<small id="card_number_err"></small>
                                </div>
								
								<div class="row">
                                    <div class="col-lg-5 mb-4">
                                        <label class="fw-semibold">Expiry (MM)</label>
                                        <input type="text" class="form-control" placeholder="Expiry (MM)" name="card_expiry_month" id="card_expiry_month">
										<small id="card_expiry_month_err"></small>
                                    </div>
									
									<div class="col-lg-4 mb-4">
                                        <label class="fw-semibold">Expiry (YYYY)</label>
                                        <input type="text" class="form-control" placeholder="Expiry (YYYY)" name="card_expiry_year" id="card_expiry_year">
										<small id="card_expiry_year_err"></small>
                                    </div>
									
									<div class="col-lg-3 mb-4">
                                        <label class="fw-semibold">CVC</label>
                                        <input type="text" class="form-control" placeholder="CVC" name="card_cvc" id="card_cvc">
										<small id="card_cvc_err"></small>
                                    </div>
									
                                </div>
								
                                <div class="text-center">
                                    <button class="btn" type="submit">Proceed to Pay</button>
                                </div>
                            </form>
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

$(document).on('change','#payment_in',function(e){
	var payment_in = $(this).val();
	console.log(payment_in)
	if(payment_in == 'Part Payment'){
		$("#card_amount").prop('disabled', false);
	}else{
		var amount = '<?=@base64_decode(@$_GET['amo'])?>';
		$("#card_amount_1").val(amount);
		$("#card_amount").val(amount);
		$("#card_amount").prop('disabled', true);
	}
});

$(document).on('keyup','#card_amount',function(e){
        var card_amount = $(this).val();
        if(card_amount){
          $("#card_amount_1").val(card_amount);
        }else{
          $("#card_amount_1").val('');
        }
    });
</script>
	