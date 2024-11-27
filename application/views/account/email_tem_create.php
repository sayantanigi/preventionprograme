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
		height:30rem !important;
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
                                
                                <div class="mb-4">
                                    <label class="fw-semibold">Subject</label>
                                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Enter Subject">
									<small id="subject_err"></small>
                                </div>
                                <div class="mb-4">
                                    <label class="fw-semibold">Body</label>
                                    <textarea class="form-control" placeholder="Event Body" name="body" id="body"></textarea>
									<small id="body_err"></small>
                                </div>

                               
								
								
								
								
								
                                <div class="mb-4">
                                    <label class="fw-semibold">Attachment</label>
                                    <input type="file" class="form-control" name="attachment" id="attachment">
									<!--<div class="eventphoto my-3 specific_preview">
                                    </div>-->
									<small id="attachment_err" style="color:red;"></small>
                                </div>
                                <div class="text-center">
                                    <button class="btn" type="submit">Save</button>
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
		var form_data = new FormData(); 
		
		// var totalfiles = document.getElementById('attachment').files.length;
		// for (var index = 0; index < totalfiles; index++) {
		   // form_data.append("attachment[]",  document.getElementById('attachment').files[index]);
		// }
		form_data.append("attachment",  document.getElementById('attachment').files[0]);
		var subject = $('#subject').val(); 
		var body =  tinyMCE.get('body').getContent(); 
		

		//form_data.append("attachment", attachment);
		form_data.append("subject", subject);
		form_data.append("body", body);
		
		$.ajax({
		type: 'POST',
		url: '<?php echo base_url('email/addTemplate'); ?>',
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
				swal({title: "Sucess!", text: "<strong>"+data.message+"</strong>", type: "success", showConfirmButton: true, html:true}, function(){ window.location.href = "<?=base_url('email/template-management')?>"});
			}
			if(data.status == 0){
				swal({title: "Fail!", text: "<strong>"+data.message+"</strong>", type: "error", showConfirmButton: true, html:true}, function(){ window.location.href = " "});
			}
			if(data.vali_error == 1){
				
				if(data.body_err != ''){
					$('#body_err').html(data.body_err);
				}else{
					$('#body_err').html('');
				}
				
				if(data.subject_err != ''){
					$('#subject_err').html(data.subject_err);
				}else{
					$('#subject_err').html('');
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
						return false;
					}else{
						var fileName = document.getElementById('event_image').files[index].name;
						var extension = fileName.split('.').pop().toLowerCase();
						if (extension == 'gif' || extension == 'png' || extension == 'jpg' || extension == 'jpeg') {
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
							var html =	'<div class="uploadlist draggable-item uploadvideo preview-image preview-show-'+[index]+'" id="preview'+[index]+'">'+
							'<a href="javascript:void(0);" class="closemedia image-cancel" data-no="'+[index]+'" id="img'+[index]+'"><i class="fas fa-times"></i></a>'+
							' <div class="image-zone"><video id="pro-img-"><source  src="'+window.URL.createObjectURL(this.files[index])+'" class="imageall"></video></div>'+
							'</div>';
							output.append(html);
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
  $('textarea#body').tinymce({
        height: 100,
        menubar: false,
        plugins: [
           'a11ychecker','advlist','advcode','advtable','autolink','checklist','export',
           'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks',
           'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount'
        ],
        toolbar: 'undo redo | a11ycheck casechange blocks | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist checklist outdent indent | removeformat | code table help'
      });
	  
	  
</script>