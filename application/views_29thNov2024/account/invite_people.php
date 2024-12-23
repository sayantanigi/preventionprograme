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
		$this->session->unset_userdata('msg');
	}
?>
<style>
	input[type=number]::-webkit-inner-spin-button, 
	input[type=number]::-webkit-outer-spin-button { 
		-webkit-appearance: none;
		-moz-appearance: none;
		appearance: none;
		margin: 0; 
	}
	.fade:not(.show) {
        opacity: 1 !important;
    }

	.modal-dialog {
		max-width: 830px !important;
		margin: 1.75rem auto !important;
	}
</style>
        <div class="section exvent-hero-section d-lg-flex d-block align-items-center inner-page-hero" style="background-image: url(<?=base_url('assets/images/')?>bg/about_page_bg.jpg);">
            <img class="shape-1 img-fluid" src="<?=base_url('assets/images/')?>shape/hero_shape1.png" alt="">
            <img class="shape-2 img-fluid" src="<?=base_url('assets/images/')?>shape/hero_shape2.png" alt="">

            <div class="container">
                <div class="row exvent-hero-row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <div class="page-title">
                            <h2 class="section-title">Let's invite people to this event</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-5">
		
            <div class="container">
			     <button  style="float: right;width: 14%;background: #f7931e;color: #fff;border: 1px solid #f7931e;height: 32px;border-radius: 5px;font-weight: 600;" onclick="invite_guest()">Invite guest by csv</button> <br/><br/>
				 <span style="float: right;width: 20%;margin: 0px -67px;"><i class="fas fa-paperclip"></i> &nbsp; &nbsp;<a href="<?=base_url('assets/images/upload_invite_list.csv')?>" download>Download csv demo file</a></span>
				 <br/><br/><br/><br/>
                <div class="row justify-content-center">
				   
                    <div class="col-lg-12">
                        <div class="bg-light p-5 shadow border">
                            <form class="contact-form" action="" method="POST" name="myForm">
                                <h3 class="text-center h4 fw-bold mb-5 text-capitalize1">Enter the emails of the people you are inviting</h3>
								<?php if(!empty(@$check_custoPay->customize_payment) && @$check_custoPay->customize_payment == 1){ ?>
								    <div class="field_wrapper1">
										<div class="row">
											<div class="col-sm-6">
												<div class="form-group mb-2">
												    <label class="fw-semibold  text-black" style="float: left;">Enter Email Id</label>
												    <input type="email" class="form-control" name="email[]"  id="email"  autocomplete="off"  value="" placeholder="Enter Email">
													<small id="email_error" style="color:red;"></small>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group mb-2">
													<label class="fw-semibold  text-black" style="float: left;">Event Amount</label>
													<input type="number" class="form-control" name="amount[]"  id="amount" autocomplete="off"  value="" placeholder="Event Amount">
													<small id="amount_error" style="color:red;"></small>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group mb-2">
													<label class="fw-semibold  text-black" style="float: left;"> Mobile</label>
													<input type="text" class="form-control" name="mobile[]"  id="mobile" autocomplete="off"  value="" placeholder="Enter Mobile Ex.(+919876543210)">
													<small id="mobile_error" style="color:red;"></small>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-6">
												<div class="form-group mb-2">
												    <label class="fw-semibold  text-black" style="float: left;">Enter Email Id</label>
												    <input type="email" class="form-control" name="email[]"  autocomplete="off"  value="" placeholder="Enter Email">
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group mb-2">
													<label class="fw-semibold  text-black" style="float: left;">Event Amount</label>
													<input type="number" class="form-control" name="amount[]"    autocomplete="off"  value="" placeholder="Event Amount">
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group mb-2">
													<label class="fw-semibold  text-black" style="float: left;"> Mobile</label>
													<input type="text" class="form-control" name="mobile[]"  id="mobile" autocomplete="off"  value="" placeholder="Enter Mobile Ex.(+919876543210)">

												</div>
											</div>
											
										</div>
										<?php
										//$userId = $this->session->userdata('loguserId');
										$event_user_id = $this->Mymodel->get_single_row_info('user_id', 'event', 'event_id='.@$_GET['eId'].'', '', 1);
										$userId = $event_user_id->user_id;
										$check_subscription = $this->db->query("select id, sub_id, subscription from transaction where user_id = ".$userId." ORDER BY id DESC LIMIT 1")->row();
										
										if(!empty(@$check_subscription)){
											if(@$check_subscription->subscription == 'Free'){
												$subscription = 'free subscription';
											}else{
												$subscription = 'paid subscription';
											}
										}else{
											$subscription = '';
										}
										?>
									    <input type="hidden"  name="event_id" value="<?=@$_GET['eId']?>">
									    <input type="hidden"  name="subscription" value="<?=@$subscription?>">
										<!--<div class="mb-3">
											<input type="email" class="form-control email" name="email[]" placeholder="Enter Email" id="email">
											<small id="email_error" style="color:red;"></small>
										</div>
										<div class="mb-3">
											<input type="email" class="form-control email" name="email[]" placeholder="Enter Email">
										</div>
										<div class="mb-3">
											<input type="email" class="form-control email" name="email[]" placeholder="Enter Email">
										</div>
										<div class="mb-3">
											<input type="email" class="form-control email" name="email[]" placeholder="Enter Email">
											<input type="hidden"  name="event_id" value="<?=@$_GET['eId']?>">
										</div>-->
									</div>
								<?php }else{ ?>
								
									<div class="field_wrapper1">
										<div class="row">
										<div class="col-sm-7">
											<div class="form-group mb-2">
											    <input type="email" class="form-control email" name="email[]" placeholder="Enter Email" id="email">
											    <small id="email_error" style="color:red;"></small>
											</div>
										</div>
										
										<div class="col-sm-5">
												<div class="form-group mb-2">
													<input type="text" class="form-control" name="mobile[]"  id="mobile" autocomplete="off"  value="" placeholder="Enter Mobile Ex.(+919876543210)">

												</div>
											</div>
									</div>
									
									<div class="row">
										<div class="col-sm-7">
											<div class="form-group mb-2">
											    <input type="email" class="form-control email" name="email[]" placeholder="Enter Email" id="email">
											    <small id="email_error" style="color:red;"></small>
											</div>
										</div>
										
										<div class="col-sm-5">
												<div class="form-group mb-2">
													<input type="text" class="form-control" name="mobile[]"  id="mobile" autocomplete="off"  value="" placeholder="Enter Mobile Ex.(+919876543210)">
                                                  <input type="hidden"  name="event_id" value="<?=@$_GET['eId']?>">
												</div>
											</div>
									</div>
										
										<?php
										//$userId = $this->session->userdata('loguserId');
										$event_user_id = $this->Mymodel->get_single_row_info('user_id', 'event', 'event_id='.@$_GET['eId'].'', '', 1);
										$userId = $event_user_id->user_id;
										
										$check_subscription = $this->db->query("select id, sub_id, subscription from transaction where user_id = ".$userId." ORDER BY id DESC LIMIT 1")->row();
										
										if(!empty(@$check_subscription)){
											if(@$check_subscription->subscription == 'Free'){
												$subscription = 'free subscription';
											}else{
												$subscription = 'paid subscription';
											}
										}else{
											$subscription = '';
										}
										?>
										<input type="hidden"  name="subscription" value="<?=@$subscription?>">
									</div>
									
								<?php } ?>
								
								<br/>
								<p style="font-size: 13px;font-weight: 500;"><input type="checkbox" name="disclaimer" id="disclaimer" > &nbsp; By entering a guest's phone number and email, you confirm that you have obtained their consent to receive an invitation to the event via text message and email. Standard message and data rates may apply.</p>
								<small id="disclaimer_err" style="color:red;"></small>
								<br/>
								
                                <div class="text-center">
                                    <a href="javascript:void(0);" class="btn bg-success add_button1">Add More</a>
                                    <button class="btn"  type="button" onclick="check_invite_limit()">Save and Continue</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
		
<div class="modal fade" id="upload_csvModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="top: 42px;width: 40%;">
    <div class="modal-content">
      <div class="modal-header border-0">
        <h5 class="modal-title" id="exampleModalLabel">Invite guest by csv </h5>
        <button type="button" class="close" id='closepopup' data-dismiss="modal" aria-label="Close" style="width: 4%;color: white;background: red;border: 1px red solid;font-weight: 900;">
          <span aria-hidden="true">X</span>
        </button>
      </div>
        <div class="modal-body" id="viewBank">
			<form method="POST" id="uploadCSV">
			    <div class="row">
				    <div class="col-sm-8">
					    <label class="modal-title" style="font-weight: bolder;">Upload CSV</label>				    
						<input type="file" class="form-control" name="csv_file" id="csv_file" style="border: 1px solid #6e6262;">
						<small id="file_err" style="color:red;"></small>
					</div>
					
					<div class="col-sm-4" style="margin: 20px 0px;">
					   <button type="submit" class="btn" >upload</button>
					</div>
				</div>
			</form>    
        </div>
   </div>
  </div>
</div>
		
<script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button1'); //Add button selector
    var wrapper = $('.field_wrapper1'); //Input field wrapper

	<?php if(!empty(@$check_custoPay->customize_payment) && @$check_custoPay->customize_payment == 1){ ?>
		//var fieldHTML = '<div class="row"><div class="col-sm-8"><div class="form-group mb-2"><label class="fw-semibold  text-black" style="float: left;">Enter Email Id</label><input type="email" class="form-control" name="email[]"  autocomplete="off"  value="" placeholder="Enter Email"></div> </div><div class="col-sm-4"><div class="form-group mb-2"><label class="fw-semibold  text-black" style="float: left;">Event Amount</label><input type="number" class="form-control" name="amount[]"   autocomplete="off"  value="" placeholder="Event Amount"></div> </div> <a href="javascript:void(0);" class="btn bg-success remove_button1" style="width: 20%;">Remove</a></div>';
		
		var fieldHTML = '<div class="row"><div class="col-sm-6"><div class="form-group mb-2"><label class="fw-semibold  text-black" style="float: left;">Enter Email Id</label><input type="email" class="form-control" name="email[]"  autocomplete="off"  value="" placeholder="Enter Email"></div> </div><div class="col-sm-3"><div class="form-group mb-2"><label class="fw-semibold  text-black" style="float: left;">Event Amount</label><input type="number" class="form-control" name="amount[]"   autocomplete="off"  value="" placeholder="Event Amount"></div> </div><div class="col-sm-3"><div class="form-group mb-2"><label class="fw-semibold  text-black" style="float: left;">Enter Mobile</label><input type="text" class="form-control phone3" name="mobile[]"   autocomplete="off"  value="" placeholder="Enter Mobile Ex.(+919876543210)"></div> </div> <a href="javascript:void(0);" class="btn bg-success remove_button1" style="width: 20%;">Remove</a></div>';
	<?php }else{ ?>
		//var fieldHTML = '<div class="row"><div class="form-group mb-2"><input type="email" class="form-control email" name="email[]"  id=""  autocomplete="off"  value="" placeholder="Enter Email"></div>  <a href="javascript:void(0);" class="btn bg-success remove_button1" style="width: 20%;">Remove</a> </div>'; //New input field html 
		
		var fieldHTML = '<div class="row"><div class="col-sm-7"><div class="form-group mb-2"><input type="email" class="form-control" name="email[]"  autocomplete="off"  value="" placeholder="Enter Email"></div> </div><div class="col-sm-5"><div class="form-group mb-2"><input type="text" class="form-control phone3" name="mobile[]"   autocomplete="off"  value="" placeholder="Enter Mobile Ex.(+919876543210)"></div> </div> <a href="javascript:void(0);" class="btn bg-success remove_button1" style="width: 20%;">Remove</a></div>';
	<?php } ?>
	
    var x = 1; //Initial field counter is 1
    

    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
			$(wrapper).find('.textarea').summernote();
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button1', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
var check_email_already_exist;

function email_already_exist(email){
	

	emailstr = email.filter(function(el) { return el; });
	var result = $.ajax({
		type: "POST",
		url: "<?php echo site_url('event/email_already_exist');?>",
		data: {email : emailstr, event_id : '<?=@$_GET['eId']?>'},
		dataType: "json",
		//contentType: 'application/json',
		async: false,
		done: function (data) {
			// if(response.status == false){
				// result = response.status;
			// }else{
				// result = response.status;
			// }
			//check_my_response(response);
			//check_email_already_exist = response;
			return data;
		}
	});
	return result.responseJSON;
}
<?php if(!empty(@$check_custoPay->customize_payment) && @$check_custoPay->customize_payment == 1){ ?>
function check_invite_limit(){
	
	if ($('#disclaimer').is(':checked')) {
	   $('#disclaimer_err').html('');
	}else{
		$('#disclaimer_err').html('Please check this box if you want to proceed.');
		return false;
	}
	
	var uemail = document.getElementById("email").value;
	var uamount = document.getElementById("amount").value;
	if (!uemail) {
		document.getElementById("email_error").innerHTML = "Email filed is required.Please enter valid email.";
		return false;
	}else if(!uamount){
		document.getElementById("amount_error").innerHTML = "Amount filed is required.Please enter amount.";
		return false;
	}else{
		
	var email = $("input[name='email[]']").map(function(){return $(this).val();}).get();
	var amount = $("input[name='amount[]']").map(function(){return $(this).val();}).get();
	var check_email = validateEmail(email);
	//console.log(check_email);return;
	if(check_email == false){		
		//swal({title: "Fail!", text: "<strong>Please enter the valid email.</strong>", type: "error", showConfirmButton: true, html:true});
		return false;
	}
	
	var duplicates = $.grep(email, function(element, index){
		return $.inArray(element, email) !== index;
	});
	
	if(duplicates.length > 0){
		swal({title: "Fail!", text: "<strong>Following are the duplicate email <span style='color: red;text-decoration: underline;'>"+duplicates.join(", ")+"</span></strong>", type: "error", showConfirmButton: true, html:true});
			return false;
	}
	// if (duplicates.length === 0) {
		// //console.log("The array does not contain duplicate strings.");
		// return true;
	// } else {
		// //console.log("The array contains the following duplicate strings: " + duplicates.join(", "));
		// swal({title: "Fail!", text: "<strong>Following are the duplicate email <span style='color: red;text-decoration: underline;'>"+duplicates.join(", ")+"</span> is invalid</strong>", type: "error", showConfirmButton: true, html:true});
			// return false;
	// }
	
	var exist_email = email_already_exist(email);
	if(exist_email.status == false){
		swal({title: "Fail!", text: "<strong>This email address <span style='color: red;text-decoration: underline;'>"+exist_email.email+"</span> is already invited for this event.</strong>", type: "error", showConfirmButton: true, html:true});
		return false;
	}
	
	
	$.ajax({
		type: "POST",
		url: "<?php echo site_url('event/check_invite_limit_amount');?>",
		data: {email : email, amount : amount, event_id : '<?=@$_GET['eId']?>'},
		dataType: "json",
		success: function (response) {
			//console.log(response);
			if(response.limt_over == 0){
				//console.log('Your limit is over.');
				swal({title: "Fail!", text: "<strong>Your limit is over for this month.</strong>", type: "error", showConfirmButton: true, html:true});
				return false;
			}else if(response.large_amount){
				swal({title: "Fail!", text: "<strong>"+response.large_amount+"</strong>", type: "error", showConfirmButton: true, html:true});
			}else if(response.cal_limit != '' && response.cal_limit_over != 0){
				//console.log('You can invite only '+response.cal_limit+' people.');
				swal({title: "Fail!", text: "<strong>You can invite only "+response.cal_limit+" people.</strong>", type: "error", showConfirmButton: true, html:true});
				return false;
			}else{
				document.myForm.submit();
			}
			// $("#like_"+storyid).html(response.like);
			// $("#dislike1_"+storyid).html(response.dislike);
			// if( response.userlikeCount == 1){
				// $("#dislikethumb_"+storyid).css("color", "blue");
				// $("#likethumb_"+storyid).css("color", "#82828e");
			// }else{
			    // $("#dislikethumb_"+storyid).css("color", "#82828e");
			// }
		}
	});
}
	// console.log(email);
	// return false;
}
<?php }else{ ?>
function check_invite_limit(){
	
	if ($('#disclaimer').is(':checked')) {
	   $('#disclaimer_err').html('');
	}else{
		$('#disclaimer_err').html('Please check this box if you want to proceed.');
		return false;
	}
	
	var uemail = document.getElementById("email").value;
	if (!uemail) {
		document.getElementById("email_error").innerHTML = "Email filed is required.Please enter valid email.";
		return false;
	}else{
		
	var email = $("input[name='email[]']").map(function(){return $(this).val();}).get();
	
	
	var check_email = validateEmail(email);
	//console.log(check_email);return;
	if(check_email == false){		
		//swal({title: "Fail!", text: "<strong>Please enter the valid email.</strong>", type: "error", showConfirmButton: true, html:true});
		return false;
	}
	var str = email.filter(function(el) { return el; });
	var duplicates = $.grep(str, function(element, index){
		return $.inArray(element, str) !== index;
	});
	
	console.log(duplicates);
	if(duplicates.length > 0){
		swal({title: "Fail!", text: "<strong>Following are the duplicate email <span style='color: red;text-decoration: underline;'>"+duplicates.join(", ")+"</span></strong>", type: "error", showConfirmButton: true, html:true});
			return false;
	}
	
	var exist_email = email_already_exist(email);
	if(exist_email.status == false){
		swal({title: "Fail!", text: "<strong>This email address <span style='color: red;text-decoration: underline;'>"+exist_email.email+"</span> is already invited for this event.</strong>", type: "error", showConfirmButton: true, html:true});
		return false;
	}
	
	
	$.ajax({
		type: "POST",
		url: "<?php echo site_url('event/check_invite_limit');?>",
		data: {email : email, event_id : '<?=@$_GET['eId']?>'},
		dataType: "json",
		success: function (response) {
			//console.log(response);
			if(response.limt_over == 0){
				//console.log('Your limit is over.');
				swal({title: "Fail!", text: "<strong>Your limit is over for this month.</strong>", type: "error", showConfirmButton: true, html:true});
				return false;
			}else if(response.cal_limit != '' && response.cal_limit_over != 0){
				//console.log('You can invite only '+response.cal_limit+' people.');
				swal({title: "Fail!", text: "<strong>You can invite only "+response.cal_limit+" people.</strong>", type: "error", showConfirmButton: true, html:true});
				return false;
			}else{
				document.myForm.submit();
			}
			// $("#like_"+storyid).html(response.like);
			// $("#dislike1_"+storyid).html(response.dislike);
			// if( response.userlikeCount == 1){
				// $("#dislikethumb_"+storyid).css("color", "blue");
				// $("#likethumb_"+storyid).css("color", "#82828e");
			// }else{
			    // $("#dislikethumb_"+storyid).css("color", "#82828e");
			// }
		}
	});
}
	// console.log(email);
	// return false;
}
<?php } ?>
	  
function validateEmail(email)
{  
	var emailRegEx = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	str = email.filter(function(el) { return el; });
	//var array = str.split(',');  
	//return array;       
	for(var i =0;i<str.length;i++)
	{ 
		var email = str[i];                
		if(!email.match(emailRegEx))
		{
			//alert('The email address '+ ' "' +email+ '" '+ ' is invalid');
			swal({title: "Fail!", text: "<strong>The email address <span style='color: red;text-decoration: underline;'>"+email+"</span> is invalid</strong>", type: "error", showConfirmButton: true, html:true});
			return false;
		}
	}
	return true;           
}

function invite_guest()
{
    $('#upload_csvModel').css('display', 'block');	       
}

$('#closepopup').click(function () {
   $('#upload_csvModel').css('display', 'none');  
});



$(document).ready(function(){
		$(document.body).on('submit', '#uploadCSV' ,function(e){ 
		e.preventDefault();
		var form_data = new FormData(); 
        var file = document.getElementById('csv_file').files[0];		
		form_data.append("file",  document.getElementById('csv_file').files[0]);
		form_data.append("eventId",  '<?=@$_GET['eId']?>');
		form_data.append("subscription",  '<?=@$subscription?>');
		
		
		var exist_email = check_bulk_upload_email_exist(file, '<?=@$_GET['eId']?>');
		if(exist_email.status == false){
			swal({title: "Fail!", text: "<strong>This email address <span style='color: red;text-decoration: underline;'>"+exist_email.email+"</span> is already invited for this event.</strong>", type: "error", showConfirmButton: true, html:true});
			return false;
		}
		var check_limit = check_bulk_limit(exist_email.email, '<?=@$_GET['eId']?>');
		
		if(check_limit.limt_over == 0){
			//console.log('Your limit is over.');
			swal({title: "Fail!", text: "<strong>Your limit is over for this month.</strong>", type: "error", showConfirmButton: true, html:true});
			return false;
		}else if(check_limit.cal_limit != '' && check_limit.cal_limit_over != 0){
			//console.log('You can invite only '+response.cal_limit+' people.');
			swal({title: "Fail!", text: "<strong>You can invite only "+check_limit.cal_limit+" people.</strong>", type: "error", showConfirmButton: true, html:true});
			return false;
		}
		
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('event/upload_csv'); ?>',
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
				    swal({title: "Sucess!", text: "<strong>"+response.message+"</strong>", type: "success", showConfirmButton: true, html:true}, function(){ window.location.href = "<?=base_url('event/details?eId='.base64_encode(@$_GET['eId']).'')?>"});
					
					$.ajax({
						type: "POST",
						url: "<?php echo site_url('event/send_mail_via_bulk_upload');?>",
						data: {email : response.bulkemail, event_id : response.event_id},
						dataType: "json",
						done: function (data) {
							
						}
					});
					
					$.ajax({
						type: "POST",
						url: "<?php echo site_url('event/send_mobile_sms');?>",
						data: {mobile : response.bulkmobile, event_id : response.event_id},
						dataType: "json",
						done: function (data) {
							
						}
					});
					
					
				}
				
				if(response.status == 0){
				    swal({title: "Fail!", text: "<strong>"+response.message+"</strong>", type: "error", showConfirmButton: true, html:true}, function(){ window.location.href = ""});
				}
				if(response.dublicate == 0){
					swal({title: "Fail!", text: "<strong>This email address <span style='color: red;text-decoration: underline;'>"+response.dublicateEmail+"</span> is dublicate.</strong>", type: "error", showConfirmButton: true, html:true});
				}
				
				if(response.invalid_email_status == 0){
					swal({title: "Fail!", text: "<strong>The email address <span style='color: red;text-decoration: underline;'>"+response.invalidEmail+"</span> is invalid.</strong>", type: "error", showConfirmButton: true, html:true});
				}
				
				if(response.status == 'file_not_support'){
					$('#file_err').html(response.message);
				}else{
					$('#file_err').html(response.message);
				}
				
				if(response.status == 'file_empty'){
					$('#file_err').html(response.message);
				}else{
					$('#file_err').html(response.message);
				}
				 //else{
				    // swal({title: "Fail!", text: "<strong>"+response.message+"</strong>", type: "error", showConfirmButton: true, html:true}, function(){ window.location.href = ""});
				// }
			}
		});
	});

});

function check_bulk_upload_email_exist(file, event_id){
	
	
	   var form_data = new FormData(); 
        var bulkfile = file;		
        var event_id = event_id;		
		form_data.append("file",  bulkfile);
		form_data.append("event_id",  event_id);
		
	var result = $.ajax({
		type: "POST",
		url: "<?php echo site_url('event/check_bulk_upload_email_exist');?>",
		data:form_data,
		dataType: "json",
		async: false,
		contentType: false,
		processData: false,
		//processData: false,
		//contentType: false,
		done: function (data) {
			// if(response.status == false){
			// result = response.status;
			// }else{
			// result = response.status;
			// }
			//check_my_response(response);
			//check_email_already_exist = response;
			return data;
		}
	});
	return result.responseJSON;
}

function check_bulk_limit(email, event_id){
	
	
	    var form_data = new FormData(); 
        var email_check = email;
        for(var i =0;i<email_check.length;i++){
			form_data.append("email[]",  email_check[i]);
		}
		
        var event_id = event_id;		
		form_data.append("event_id",  event_id);
		
	var result = $.ajax({
		type: "POST",
		url: "<?php echo site_url('event/check_invite_limit');?>",
		data:form_data,
		dataType: "json",
		async: false,
		contentType: false,
		processData: false,
		done: function (data) {
			return data;
		}
	});
	return result.responseJSON;
}
</script>		