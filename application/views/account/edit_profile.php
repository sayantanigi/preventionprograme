<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

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
                        <div class="speaker-informations bg-light mb-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="mb-4">Update Profile</h3>
                                    <form  id="submitform" >
                                        <div class="row">
                                            <div class="col-lg-6 mb-3">
                                                <label class="fw-semibold">First Name</label>
                                                <input type="text" class="form-control" name="fname" id="fname" value="<?=@$user->fname?>">
												<small id="fname_error"></small>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label class="fw-semibold">Last Name</label>
                                                <input type="text" class="form-control" name="lname" id="lname" value="<?=@$user->lname?>">
												<small id="lname_error"></small>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label class="fw-semibold">Email</label>
                                                <input type="email" class="form-control" name="email" id="email" value="<?=@$user->email?>">
												<small id="email_error"></small>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label class="fw-semibold">Contact Number</label>
                                                <input type="text" class="form-control" name="phone" id="phone" value="<?=@$user->phone?>">
												<small id="phone_error"></small>
                                            </div>
                                            <div class="col-lg-12 mb-3">
                                                <label class="fw-semibold">Address</label>
                                                <textarea class="form-control" name="address" id="address" ><?=@$user->address?></textarea>
												<input type="hidden"  name="latitude" id="latitude" value="<?=@$user->latitude?>">
												<input type="hidden"  name="longitude" id="longitude" value="<?=@$user->longitude?>">
												<input type="hidden"  name="country" id="country" value="<?=@$user->country?>">
												<input type="hidden"  name="state" id="state" value="<?=@$user->state?>">
												<input type="hidden"  name="city" id="city" value="<?=@$user->city?>">
												<input type="hidden"  name="zipcode" id="zipcode" value="<?=@$user->zipcode?>">
                                            </div>
                                            <div class="col-lg-12 mb-3">
                                                <label class="fw-semibold">About Bio</label>
                                                <textarea class="form-control" name="about" id="about" ><?=@$user->about?></textarea>
                                            </div>
											
											<div class="col-lg-12 mb-3">
                                                <label class="fw-semibold">Profile Image</label>
                                                <input type="file" class="form-control" name="profileImg" id="profileImg">
                                            </div>
											
                                            <div class="col-lg-12">
                                                <label class="fw-semibold">Social Network</label>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="input-group mb-3">
                                                          <span class="input-group-text border-0 bg-white"><i class="fab fa-facebook-square"></i></span>
                                                          <input type="text" class="form-control" placeholder="Enter url" name="facebook" id="facebook" value="<?=@$user->facebook?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="input-group mb-3">
                                                          <span class="input-group-text border-0 bg-white"><i class="fab fa-twitter"></i></span>
                                                          <input type="text" class="form-control" placeholder="Enter url" name="twitter" id="twitter" value="<?=@$user->twitter?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="input-group mb-3">
                                                          <span class="input-group-text border-0 bg-white"><i class="fab fa-pinterest-p"></i></span>
                                                          <input type="text" class="form-control" placeholder="Enter url" name="pinterest" id="pinterest" value="<?=@$user->pinterest?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="input-group mb-3">
                                                          <span class="input-group-text border-0 bg-white"><i class="fab fa-instagram"></i></span>
                                                          <input type="text" class="form-control" placeholder="Enter url" name="instagram" id="instagram" value="<?=@$user->instagram?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
											
											<div class="col-lg-12"><br>
                                                <label class="fw-semibold">Payment Service Information</label><br>
                                                <div class="row">
                                                    <div class="col-lg-6">
													    <label class="fw-semibold">Cashapp</label>
                                                        <div class="input-group mb-3">
                                                          <span class="input-group-text border-0 bg-white"><img src="<?=base_url('assets/images/cashapp.png')?>" style="width: 9%;position: absolute;margin: -14px;"></span>
                                                          <input type="text" class="form-control"  name="cashapp" id="cashapp" value="<?=@$user->cashapp?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
													    <label class="fw-semibold">Zelle</label>
                                                        <div class="input-group mb-3">
                                                          <span class="input-group-text border-0 bg-white"><img src="<?=base_url('assets/images/zelle.png')?>"style="width: 6%;position: absolute;margin: -9px;"></span>
                                                          <input type="text" class="form-control" name="zelle" id="zelle" value="<?=@$user->zelle?>">
                                                        </div>
                                                    </div>
													
													<div class="col-lg-6">
													    <label class="fw-semibold">Venmo</label>
                                                        <div class="input-group mb-3">
                                                          <span class="input-group-text border-0 bg-white"><img src="<?=base_url('assets/images/venmo.png')?>" style="width: 9%;position: absolute;margin: -14px;"></span>
                                                          <input type="text" class="form-control"  name="venmo" id="venmo" value="<?=@$user->venmo?>">
                                                        </div>
                                                    </div>
													
													<div class="col-lg-6">
													    <label class="fw-semibold">Apple Pay</label>
                                                        <div class="input-group mb-3">
                                                          <span class="input-group-text border-0 bg-white"><img src="<?=base_url('assets/images/apple-pay.png')?>" style="width: 9%;position: absolute;margin: -14px;"></span>
                                                          <input type="text" class="form-control"  name="apple_pay" id="apple_pay" value="<?=@$user->apple_pay?>">
                                                        </div>
                                                    </div>
                                                    
                                                   
                                                </div>
                                            </div>
											
                                            <div class="col-lg-12 mt-4">
                                                <button class="btn btn-primary">Update Profile</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                        <div class="speaker-informations bg-light">
                            <h3 class="mb-4 fw-semibold">Change Password</h3>
                            <div class="row">
                                <div class="col-lg-7">
                                    <form id="change_password">
                                        <div class="mb-3">
                                            <label class="fw-semibold">Enter Current Password</label>
                                            <input type="password" class="form-control" name="current_pass" id="current_pass">
											<small id="current_pass_error"></small>
                                        </div>
                                        <div class="mb-3">
                                            <label class="fw-semibold">Enter New Password</label>
                                            <input type="password" class="form-control" name="new_pass" id="new_pass">
											<small id="new_pass_error"></small>
                                        </div>
                                        <div class="mb-3">
                                            <label class="fw-semibold">Re-enter New Password</label>
                                            <input type="password" class="form-control" name="cnf_pass" id="cnf_pass">
											<small id="cnf_pass_error"></small>
                                        </div>
                                        <div class="mt-4">
                                            <button class="btn btn-primary" type="submit">Update Password</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtg6oeRPEkRL9_CE-us3QdvXjupbgG14A&libraries=places"></script>		
<script>			
google.maps.event.addDomListener(window, 'load', function () {
        var places = new google.maps.places.Autocomplete(document.getElementById('address'));
        google.maps.event.addListener(places, 'place_changed', function () {
            var place = places.getPlace();
            var address = place.formatted_address;
            var latitude = place.geometry.location.lat();
            var longitude = place.geometry.location.lng();
			$('#latitude').val(place.geometry['location'].lat());
			$('#longitude').val(place.geometry['location'].lng());
            var latlng = new google.maps.LatLng(latitude, longitude);
            var geocoder = geocoder = new google.maps.Geocoder();
            geocoder.geocode({ 'latLng': latlng }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        var address = results[0].formatted_address;
                        var pin = results[0].address_components[results[0].address_components.length - 1].long_name;
                        var country = results[0].address_components[results[0].address_components.length - 2].long_name;
                        var state = results[0].address_components[results[0].address_components.length - 3].long_name;
                        var city = results[0].address_components[results[0].address_components.length - 4].long_name;
                        document.getElementById('country').value = country;
                        document.getElementById('state').value = state;
                        document.getElementById('city').value = city;
                        document.getElementById('zipcode').value = pin;
                    }
                }
            });
        });
    });
document.getElementById("profileImg").onchange = function(event) {
let file = event.target.files[0];
	let blobURL = URL.createObjectURL(file);
	document.getElementById("blah").src = blobURL;
}

$(document).ready(function(){
	$("#submitform").on('submit', function(e){
		e.preventDefault();
		// //var form_data = new FormData(); 	
		// var code = $("#number").val();
        // console.log(code);
		//return;
		
			

			
			var full_number = phone_number.getNumber(intlTelInputUtils.numberFormat.E164);
			$("input[name='phone_number[full]'").val(full_number);
			//alert(full_number)

			
		$.ajax({
		type: 'POST',
		url: '<?php echo base_url('profile/editProfile'); ?>',
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
				
				
				if(data.phone_error != ''){
					$('#phone_error').html(data.phone_error);
				}else{
					$('#phone_error').html('');
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


$(document).ready(function(){
	$("#change_password").on('submit', function(e){
		e.preventDefault();
		//var form_data = new FormData(); 	
		
		$.ajax({
		type: 'POST',
		url: '<?php echo base_url('profile/change_password'); ?>',
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
				
				
				if(data.current_pass_error != ''){
					$('#current_pass_error').html(data.current_pass_error);
				}else{
					$('#current_pass_error').html('');
				}
				
				if(data.new_pass_error != ''){
					$('#new_pass_error').html(data.new_pass_error);
				}else{
					$('#new_pass_error').html('');
				}
				
				if(data.cnf_pass_error != ''){
					$('#cnf_pass_error').html(data.cnf_pass_error);
				}else{
					$('#cnf_pass_error').html('');
				}
				
				
				
			}
		}
		});
	});

});
</script>		
<script>
   // const phoneInputField = document.querySelector("#phone");
   // const phoneInput = window.intlTelInput(phoneInputField, {
	// initialCountry: "in", 
    // utilsScript:
    // "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
   // });
   
   
   
    // var telInput = $("#phone"),
   // errorMsg = $("#error-msg"),
   // validMsg = $("#valid-msg");

   // // initialise plugin
   // telInput.intlTelInput({

   // allowExtensions: true,
   // formatOnDisplay: true,
   // autoFormat: true,
   // autoHideDialCode: true,
   // autoPlaceholder: true,
   // defaultCountry: "in",
   // ipinfoToken: "yolo",

   // nationalMode: false,
   // numberType: "MOBILE",
   // //onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
   // preferredCountries: ['sa', 'ae', 'qa','om','bh','kw','ma'],
   // preventInvalidNumbers: true,
   // separateDialCode: false,
   // initialCountry: "in",
   
    // utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/utils.js"
 // });
 
var phone_number = window.intlTelInput(document.querySelector("#phone"), {
	initialCountry: "us",
	separateDialCode: true,
	preferredCountries:["us"],
	hiddenInput: "full",
	utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
});
 </script>		
		