<script src="<?php echo base_url('assets/editor/')?>tinymce.min.js"></script>
<script src="<?php echo base_url('assets/editor/')?>tinymce-jquery.min.js"></script>

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
	.tox-notifications-container{
		display:none !important;
	}
	.tox-statusbar__branding{
		display:none !important;
	}
	.tox-tinymce{
		height:12rem !important;
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
                            <form class="contact-form" id="productForm" method="POST" enctype="multipart/form-data">
                                <h3 class="text-center h4 fw-bold mb-5 text-capitalize">Lets gather the details of the event</h3>
                                <div class="mb-4">
                                    <label class="fw-semibold">Name your event</label>
                                    <input type="text" class="form-control" name="event_name" id="event_name" placeholder="Event Name">
									<small id="event_name_err"></small>
                                </div>
                                <div class="mb-4">
                                    <label class="fw-semibold">Description</label>
                                    <textarea class="form-control" placeholder="Event Description" name="event_description" id="event_description"></textarea>
									<small id="event_description_err"></small>
                                </div>
                                <div class="mb-4">
                                    <label class="fw-semibold">Address</label>
									<input type="text" class="form-control"  placeholder="Full Address" name="event_address" id="event_address">
									<input type="hidden" placeholder="Near"  name="event_latitude" id="event_latitude" >
									<input type="hidden" placeholder="Near" name="event_longitude" id="event_longitude" >
									<input type="hidden" placeholder="Near" name="event_country" id="event_country" >
									<input type="hidden" placeholder="Near" name="event_state" id="event_state" >
									<input type="hidden" placeholder="Near" name="event_city" id="event_city" >
									<input type="hidden" placeholder="Near" name="event_zipcode" id="event_zipcode" >
									<small id="event_address_err"></small>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 mb-4">
                                        <label class="fw-semibold">Cost of event</label>
                                        <input type="text" class="form-control" placeholder="$" name="event_price" id="event_price">
										<small id="event_price_err"></small>
                                    </div>
                                    <div class="col-lg-8 mb-4">
                                        <label class="fw-semibold">Event Time & Date</label>
                                        <div class="d-flex">
                                            <div>
                                                <input type="date" class="form-control" name="event_date" id="event_date">
												<small id="event_date_err"></small>
                                            </div>
                                            <div class="ps-2">
                                                <input type="time" class="form-control" name="event_time" id="event_time">
												<small id="event_time_err"></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
								<!--<div class="mb-4">
                                    <label class="fw-semibold">No. of Event Participant</label>
                                    <input type="number" class="form-control" name="event_participant" id="event_participant" placeholder="No. of Event Participant">
									<small id="event_participant_err"></small>
                                </div>-->
								
								<!--<div class="mb-4">
                                    <label class="fw-semibold">Co-Host</label>
										<select class="form-control" name="co_host" id="co_host"> 
										    <option value="">Select Co-Host</option>
										    <?php
											    if(!empty(@$get_cohost)){
													foreach(@$get_cohost as $k => $v){
														echo '<option value="'.@$v->id.'">'.@$v->fname.' '.@$v->lname.'</option>';
													}
												}
											?>
										</select>
									<small id="co_host_err"></small>
                                </div>-->
								
                                <div class="mb-4">
                                    <label class="fw-semibold">Upload Event Photo</label>
                                    <input type="file" class="form-control" name="event_image" id="event_image" multiple  accept=".jpeg,.jpg,.png,.gif">
									<div class="eventphoto my-3 specific_preview">
                                    </div>
									<small id="event_image_err" style="color:red;"></small>
                                </div>
								
								<div class="col-lg-7">
									<div class="row">
										<div class="form-group col-6">
											<input type="text" class="form-control" name="captcha" id="captcha" placeholder="Enter Captcha" style="height: 38px;">
											
											<small id="captcha_error"></small>
										</div>

										<div class="form-group col-6">
											<img src="<?=base_url('event/get_captcha')?>" alt="PHP Captcha" id="captcha_img">
										</div>
									</div>
									<p><br>Need another security code? <a href="javascript:void(0)" id="reloadCaptcha" style="color: blue;font-weight: 700;">click</a></p><br/>
								</div>
								
								<div class="col-lg-12">
									
									<p><input type="checkbox" name="disclaimer" id="disclaimer" > &nbsp; I agree to MadeToSplit.com's <a href="<?=base_url('terms-and-condition')?>" style="color: blue;font-weight: 700;">Terms & Conditions</a> and acknowledge that I have read the <a href="<?=base_url('privacy-policy')?>" style="color: blue;font-weight: 700;">Privacy Policy</a>.</p>
									<small id="disclaimer_err" style="color:red;"></small>
								</div>
							
                                <div class="text-center">
                                    <button class="btn" type="submit">Proceed to Next</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtg6oeRPEkRL9_CE-us3QdvXjupbgG14A&libraries=places"></script>
<script>
$(document).ready(function(){
	$("#productForm").on('submit', function(e){
		e.preventDefault();
		//var form_data = new FormData(); 

        if ($('#disclaimer').is(':checked')) {
		   $('#disclaimer_err').html('');
		}else{
			$('#disclaimer_err').html('Please check this box if you want to proceed.');
			return false;
		}		
		var form_data = new FormData(); 
		
		var totalfiles = document.getElementById('event_image').files.length;
		for (var index = 0; index < totalfiles; index++) {
		   form_data.append("event_image[]",  document.getElementById('event_image').files[index]);
		}
		
		var event_name = $('#event_name').val(); 
		//var event_description = $('#event_description').val();
		var event_description =  tinyMCE.get('event_description').getContent();
		//var event_description = $('#event_description').val(); 
		var event_address = $('#event_address').val();
        var event_country = $('#event_country').val(); 
		var event_state = $('#event_state').val(); 
		var event_city = $('#event_city').val(); 
		var event_zipcode = $('#event_zipcode').val();
		var event_latitude = $('#event_latitude').val();
		var event_longitude = $('#event_longitude').val();
		var event_price = $('#event_price').val();
		var event_date = $('#event_date').val();
		var event_time = $('#event_time').val();
		var event_participant = $('#event_participant').val();
		var co_host = $('#co_host').val();
		var captcha = $('#captcha').val();

		form_data.append("event_name", event_name);
		form_data.append("event_description", event_description);
		form_data.append("event_address", event_address);
		form_data.append("event_country", event_country);
		form_data.append("event_state", event_state);
		form_data.append("event_city", event_city);
		form_data.append("event_zipcode", event_zipcode);
		form_data.append("event_latitude", event_latitude);
		form_data.append("event_longitude", event_longitude);
		form_data.append("event_price", event_price);
		form_data.append("event_date", event_date);
		form_data.append("event_time", event_time);
		form_data.append("event_participant", event_participant);
		form_data.append("co_host", co_host);
		form_data.append("captcha", captcha);
		$.ajax({
		type: 'POST',
		url: '<?php echo base_url('event/addEvent'); ?>',
		data: form_data,
		dataType:"json",
		contentType: false,
		cache: false,
		processData:false,
		error:function(){
		  $('#uploadsuccessfully').html('<p style="color:#EA4335;">File upload failed, please try again.</p>');
		},
		success: function(data){
			if(data.status == 1){
				swal({title: "Sucess!", text: "<strong>"+data.message+"</strong>", type: "success", showConfirmButton: true, html:true}, function(){ window.location.href = "<?=base_url('event/invite-people?eId=')?>"+data.eventId+""});
				
				$.ajax({
					type: "POST",
					url: "<?php echo site_url('event/send_email_cohost');?>",
					data: {event_id : data.eventId, co_host_id : co_host},
					dataType: "json",
					done: function (data) {
						
					}
				});
			}
			if(data.status == 0){
				swal({title: "Fail!", text: "<strong>"+data.message+"</strong>", type: "error", showConfirmButton: true, html:true}, function(){ window.location.href = " "});
			}
			if(data.vali_error == 1){
				
				if(data.event_name_err != ''){
					$('#event_name_err').html(data.event_name_err);
				}else{
					$('#event_name_err').html('');
				}
				
				if(data.event_description_err != ''){
					$('#event_description_err').html(data.event_description_err);
				}else{
					$('#event_description_err').html('');
				}
				
				if(data.event_address_err != ''){
					$('#event_address_err').html(data.event_address_err);
				}else{
					$('#event_address_err').html('');
				}
				
				if(data.event_price_err != ''){
					$('#event_price_err').html(data.event_price_err);
				}else{
					$('#event_price_err').html('');
				}
				
				if(data.event_date_err != ''){
					$('#event_date_err').html(data.event_date_err);
				}else{
					$('#event_date_err').html('');
				}
				
				if(data.event_time_err != ''){
					$('#event_time_err').html(data.event_time_err);
				}else{
					$('#event_time_err').html('');
				}
				
				if(data.event_image_err != ''){
					$('#event_image_err').html(data.event_image_err);
				}else{
					$('#event_image_err').html('');
				}
				
				if(data.event_participant_err != ''){
					$('#event_participant_err').html(data.event_participant_err);
				}else{
					$('#event_participant_err').html('');
				}
				
				if(data.captcha_error != ''){
					$('#captcha_error').html(data.captcha_error);
				}else{
					$('#captcha_error').html('');
				}
				
				
			}
		}
		});
	});

});


var num = 0;
var dataTransfer = new DataTransfer();
const input = document.querySelector('#event_image');
$(document).ready(function(e){
	$(document).on('change','#event_image',function(e){
		//$("#sortable").css('opacity','0.05');
		var output = $(".specific_preview");
		var totalfiles = document.getElementById('event_image').files.length;
		
				var match = ['image/jpeg', 'image/png', 'image/jpg', 'image/jpg', 'image/gif'];
				for (var index = 0; index < totalfiles; index++) {
					dataTransfer.items.add(document.getElementById('event_image').files[index]);
					var fileType = document.getElementById('event_image').files[index].type;
					if(!((fileType == match[0]) || (fileType == match[1]) || (fileType == match[2]) || (fileType == match[3]) || (fileType == match[4]))){
						swal({title: "Fail", text: "<strong>Sorry only JPG, JPEG, GIF, PNG files are allowed to upload.</strong>", type: "error", showConfirmButton: true, html:true});
						dataTransfer.items.remove(index);
						input.files = dataTransfer.files;
						return false;
					}else{
						var fileName = document.getElementById('event_image').files[index].name;
						var extension = fileName.split('.').pop().toLowerCase();
						
						if (extension == 'gif' || extension == 'png' || extension == 'jpg' || extension == 'jpeg') {
							//dataTransfer.items.add(document.getElementById('event_image').files[index]);
							// var html =	'<div class="uploadlist draggable-item preview-image preview-show-'+[index]+'" id="preview'+[index]+'">'+
							// '<a href="javascript:void(0);" class="closemedia image-cancel" data-no="'+[index]+'"  id="img'+[index]+'"><i class="fas fa-times"></i></a>'+
							// ' <div class="image-zone" ><img id="pro-img-" src="'+window.URL.createObjectURL(this.files[index])+'" class="imageall" style="width: 70%;height: 70px;border-radius: 10px;"></div>'+
							// '</div>';
							var html =	'<div class="uploadedimg preview-show-'+[index]+'" id="preview'+[index]+'">'+
								'<img src="'+window.URL.createObjectURL(this.files[index])+'">'+
								'<a  href="javascript:void(0);" class="closeimg image-cancel" data-no="'+[index]+'"  id="img'+[index]+'"><i class="fa fa-times"></i></a>'+
							'</div>';
							output.append(html);
						}else{
							console.log(extension)
							dataTransfer.items.remove([index]);
							//input.files = dataTransfer.files;
							
							var html =	'<div class="uploadlist draggable-item uploadvideo preview-image preview-show-'+[index]+'" id="preview'+[index]+'">'+
							'<a href="javascript:void(0);" class="closemedia image-cancel" data-no="'+[index]+'" id="img'+[index]+'"><i class="fas fa-times"></i></a>'+
							' <div class="image-zone"><video id="pro-img-"><source  src="'+window.URL.createObjectURL(this.files[index])+'" class="imageall"></video></div>'+
							'</div>';
							//output.append(html);
						}
						num = num + 1;
					}
				}
			
        input.files = dataTransfer.files;
	});


 $(document.body).on('click', '.image-cancel' ,function(){ 
        var item = $(this).attr('data-no');
		console.log(item)
		dataTransfer.items.remove(item)
		input.files = dataTransfer.files
		console.log(input.files)
		// Delete element from DOM and update order
		//item.parentNode.remove()
		$('#preview'+item+'').remove();
		//updateOrder();
 });
  
 
});

google.maps.event.addDomListener(window, 'load', function () {
        var places = new google.maps.places.Autocomplete(document.getElementById('event_address'));
        google.maps.event.addListener(places, 'place_changed', function () {
            var place = places.getPlace();
            var address = place.formatted_address;
            var latitude = place.geometry.location.lat();
            var longitude = place.geometry.location.lng();
			$('#event_latitude').val(place.geometry['location'].lat());
			$('#event_longitude').val(place.geometry['location'].lng());
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
                        document.getElementById('event_country').value = country;
                        document.getElementById('event_state').value = state;
                        document.getElementById('event_city').value = city;
                        document.getElementById('event_zipcode').value = pin;
                    }
                }
            });
        });
 });
</script>	
<script>
  $('textarea#event_description').tinymce({
        height: 100,
        menubar: false,
        plugins: [
           'a11ychecker','advlist','advcode','advtable','autolink','checklist','export',
           'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks',
           'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount'
        ],
        toolbar: 'undo redo | a11ycheck casechange blocks | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist checklist outdent indent | removeformat | code table help'
      });
	  
	$(document).ready(function(){
		$("#reloadCaptcha").click(function(){
			var captchaImage = $('#captcha_img').attr('src');	
			$('#captcha_img').attr('src', captchaImage);
		});
	});  
</script>