<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<style>
small > p{
  color:red;
}
p strong{
	font-weight: 600 !important;
	color: black !important;
}
.sa-confirm-button-container button{
	background-color: #146c43 !important;
	border-color: #146c43 !important;
}

body{margin-top:20px;}

.profile {
	width: 100%;
	position: relative;
	background: #FFF;
	border: 1px solid #D5D5D5;
	padding-bottom: 5px;
	margin-bottom: 20px;
}

.profile .image {
	display: block;
	position: relative;
	z-index: 1;
	overflow: hidden;
	text-align: center;
	border: 5px solid #FFF;
}

.profile .user {
	position: relative;
	padding: 0px 5px 5px;
}

.profile .user .avatar {
	position: absolute;
	left: 20px;
	top: -85px;
	z-index: 2;
}

.profile .user h2 {
	font-size: 16px;
	line-height: 20px;
	display: block;
	float: left;
	margin: 4px 0px 0px 135px;
	font-weight: bold;
}

.profile .user .actions {
    float: right;
}

.profile .user .actions .btn {
    margin-bottom: 0px;
}

.profile .info {
	float: left;
	margin-left: 20px;
}

.img-profile{
	height:100px;
	width:100px;
}

.img-cover{
	width:800px;
	height:300px;
}

@media (max-width: 768px) {
	.btn-responsive {
		padding:2px 4px;
		font-size:80%;
		line-height: 1;
		border-radius:3px;
	}
}

@media (min-width: 769px) and (max-width: 992px) {
	.btn-responsive {
		padding:4px 9px;
		font-size:90%;
		line-height: 1.2;
	}
}
</style>
 <div class="main-content">
   <div class="page-content">
      <div class="container-fluid">  
       <section class="bg-light-gray">
        <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0"><?= $page ?></h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?=base_url('dashboard')?>">Dashboard</a></li>
                            <li class="breadcrumb-item active"><?= $page ?></li>
                        </ol>
                    </div>

                </div>
            </div>
           </div>

            <div class="row">

                <div class="col-lg-6 mb-3">
                  <div class="card shadow rounded">
                     <div class="card-body">    
                        <form id="submitform" method="POST" enctype="multipart/form-data" >
                            
                            

                            <div class="form-group mb-2">
                                <label class="fw-semibold  text-black">Event Name</label>
                                <input type="text" class="form-control" name="event_name"  id="event_name"  autocomplete="off">
                            </div>
							<small id="event_name_err"></small>
							
							
							<div class="form-group mb-2">
                                <label class="fw-semibold  text-black">Event Description</label>
                                <textarea type="text" class="form-control editor summermote" name="event_description"  id="event_description"  autocomplete="off"></textarea>
                            </div>
							<small id="event_description_err"></small>
							
							
							<div class="form-group mb-2">
                                <label class="fw-semibold  text-black">Event Address</label>
								<input type="text" class="form-control" name="event_address"  id="event_address"  autocomplete="off">
								<input type="hidden" placeholder="Near"  name="event_latitude" id="event_latitude" >
								<input type="hidden" placeholder="Near" name="event_longitude" id="event_longitude" >
								<input type="hidden" placeholder="Near" name="event_country" id="event_country" >
								<input type="hidden" placeholder="Near" name="event_state" id="event_state" >
								<input type="hidden" placeholder="Near" name="event_city" id="event_city" >
								<input type="hidden" placeholder="Near" name="event_zipcode" id="event_zipcode" >
                            </div>
							<small id="event_address_err"></small>
							
							<div class="form-group mb-2">
								<div class="form-group mb-2" >
									<label class="fw-semibold  text-black">Cost</label>
									<input type="text" class="form-control" name="event_price"  id="event_price"  autocomplete="off">
								</div>
								<small id="event_price_err"></small>
							</div>
							
							<div class="form-group mb-2">
								<div class="form-group mb-2" >
									<label class="fw-semibold  text-black">Event Date</label>
									<input type="date" class="form-control" name="event_date"  id="event_date"  autocomplete="off">
								</div>
								<small id="event_date_err"></small>
							</div>
							
							<div class="form-group mb-2">
								<div class="form-group mb-2" >
									<label class="fw-semibold  text-black">Event Time</label>
									<input type="time" class="form-control" name="event_time"  id="event_time"  autocomplete="off">
								</div>
								<small id="event_time_err"></small>
							</div>
							
							<div class="form-group mb-2">
								<div class="form-group mb-2" >
									<label class="fw-semibold  text-black">Event Image</label>
									<input type="file" class="form-control" name="event_image"  id="event_image"  autocomplete="off" multiple>
								</div>
								<small id="event_image_err"></small>
							</div>
							
							<div class="container">
								<div class="uploadinfobox connected-sortable droppable-area1 specific_preview" id="sortable" style="display: flex;">
								</div>
								<br/><br/>
							</div>
						
							
							<div class="form-group mb-2">
                                <label class="fw-semibold  text-black">Status</label>
                                <select class="form-control" name="event_status"  id="event_status">
                                    <option value="">Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
							<small id="event_status_err"></small>
							
                            <div class="form-group mt-3 mb-2">
                                <button class="btn btn-success text-uppercase px-5 shadow">Submit</button>
                                <a class="btn btn-danger waves-effect waves-light m-l-30" href="javascript:history.go(-1)">Back</a>
                            </div>
                        </form>
                     </div>
                  </div>      
                </div>
                
                <div class="col-lg-6 mb-3">
                    <div class="card shadow rounded">
                       <div class="card-body">
                            <div class="row">
                               
								
								 <div class="col-lg-12 mb-3">
									<div class="card rounded">
										<div class="card-body">
										
											<div class="mt-3"> <label class="tx-11 font-weight-bold mb-0 "><h6>Event Name</h6></label><p class="text-muted" id="event-name"></p></div>
											
											<div class="mt-3"> <label class="tx-11 font-weight-bold mb-0 "><h6>Event Description</h6></label><p class="text-muted" id="event-description"></p></div>
											
											<div class="mt-3"> <label class="tx-11 font-weight-bold mb-0 "><h6>Event Address</h6></label><p class="text-muted" id="event-address"></p></div>
											
											<div class="mt-3"> <label class="tx-11 font-weight-bold mb-0 "><h6>Cost</h6></label><p class="text-muted" id="event-price"></p></div>
											
											
											<div class="mt-3"> <label class="tx-11 font-weight-bold mb-0 "><h6>Event Date</h6> </label><br/><span class="text-muted" id="event-date"></span></div>
											
											<div class="mt-3"> <label class="tx-11 font-weight-bold mb-0 "><h6>Event Time</h6> </label><br/><span class="text-muted" id="event-time"></span></div>
											
											<div class="mt-3"> <label class="tx-11 font-weight-bold mb-0 "><h6>Status</h6></label><p class="text-muted" id="event-status"></p></div>

										</div>
									</div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </section>
   </div>
 </div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtg6oeRPEkRL9_CE-us3QdvXjupbgG14A&libraries=places"></script> 
<script>
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
							var html =	'<div class="uploadlist draggable-item preview-image preview-show-'+[index]+'" id="preview'+[index]+'">'+
							'<a href="javascript:void(0);" class="closemedia image-cancel" data-no="'+[index]+'"  id="img'+[index]+'"><i class="fas fa-times"></i></a>'+
							' <div class="image-zone" ><img id="pro-img-" src="'+window.URL.createObjectURL(this.files[index])+'" class="imageall" style="width: 70%;height: 70px;border-radius: 10px;"></div>'+
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
			
		
		updateOrder();
        input.files = dataTransfer.files;
	});
	
const updateOrder = () => {
  let orderInputs = document.querySelectorAll('input[name^="images_order"]');
   let deleteButtons = document.querySelectorAll('a[data-no]');
   let deleteButtons1 = document.querySelectorAll('div.preview-image');
  for (let i = 0; i < orderInputs.length; i++) {
    orderInputs[i].value = [i]
    deleteButtons[i].id = 'img'+[i]
    deleteButtons1[i].id = 'preview'+[i]
    deleteButtons[i].dataset.no = [i]
	
  }
}

 $(document.body).on('click', '.image-cancel' ,function(){ 
        var item = $(this).attr('data-no');
		console.log(item)
		dataTransfer.items.remove(item)
		input.files = dataTransfer.files
		// Delete element from DOM and update order
		//item.parentNode.remove()
		$('#preview'+item+'').remove();
		updateOrder();
 });
 $(document.body).on('click', 'input:radio[name=post_content]' ,function(){ 
        for (var index = 0; index < 10; index++) {
				dataTransfer.items.remove(index)
				input.files = dataTransfer.files
		}
		updateOrder();
 }); 
});


google.maps.event.addDomListener(window, 'load', function () {
        var places = new google.maps.places.Autocomplete(document.getElementById('event_address'));
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
                        document.getElementById('event_country').value = country;
                        document.getElementById('event_state').value = state;
                        document.getElementById('event_city').value = city;
                        document.getElementById('event_zipcode').value = pin;
                        //document.getElementById('event-address').text = address;
						$("#event-address").text(address);
						
                    }
                }
            });
        });
    });

	
$(document).ready(function(){
	$("#submitform").on('submit', function(e){
		e.preventDefault();
		//var form_data = new FormData(); 	
		var form_data = new FormData(); 
		
		var totalfiles = document.getElementById('event_image').files.length;
		for (var index = 0; index < totalfiles; index++) {
		   form_data.append("event_image[]",  document.getElementById('event_image').files[index]);
		}
		
		var event_name = $('#event_name').val(); 
		var event_description = $('#event_description').val(); 
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
		var event_status = $('#event_status').val();

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
		form_data.append("event_status", event_status);
		$.ajax({
		type: 'POST',
		url: '<?php echo base_url('admin/event/addEvent'); ?>',
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
				swal({title: "Sucess!", text: "<strong>"+data.message+"</strong>", type: "success", showConfirmButton: true, html:true}, function(){ window.location.href = "<?=base_url('admin/event/invite_people?eId=')?>"+data.eventId+""});
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
				
				if(data.event_status_err != ''){
					$('#event_status_err').html(data.event_status_err);
				}else{
					$('#event_status_err').html('');
				}
				
			}
		}
		});
	});

});

 $(document).on('keyup','#event_name',function(e){
        var event_name = $(this).val();
        
        if(event_name){ 
          $("#event-name").text(event_name);
        }else{
         
          $("#event-name").text('Event Name');
        }
 });
 
  $(document).on('change','#event_date',function(e){
        var event_date = $(this).val();
        console.log(event_date);
        if(event_date){ 
          $("#event-date").text(event_date);
        }else{
         
          $("#event-date").text('Event Date');
        }
 });
 
  $(document).on('change','#event_time',function(e){
        var event_time = $(this).val();
        if(event_time){ 
          $("#event-time").text(event_time);
        }else{
         
          $("#event-time").text('Event Time');
        }
 });
 
 
$("#event_description").on("summernote.change", function (e) {   // callback as jquery custom event 
	var event_description = $(this).val();
	var event_description_1 = event_description.replace(/(<([^>]+)>)/ig,"");
	if(event_description_1){
	   $("#event-description").text(event_description_1);
	}else{
	   $("#event-description").text('Event Description');
	}
});
	
$(document).on('keyup','#event_price',function(e){
	var event_price = $(this).val();
	if(event_price){
	    $("#event-price").text('$'+event_price);
	}else{
	    $("#event-price").text('Cost');
	}
});

$(document).on('keyup','#event_address',function(e){
	var event_address = $(this).val();
	if(event_address){
	    $("#event-address").text(event_address);
	}else{
	    $("#event-address").text('Event Address');
	}
});
	
$(document).on('change','#event_status',function(e){
	var event_status = $(this).val();
	if(event_status == 1){
	    $("#event-status").text('Active');
	}
	if(event_status == 0){
	    $("#event-status").text('Inactive');
	}
});
</script> 
<script>
$(document).ready(function() {
	$('.editor').summernote({
		placeholder: '',
		height: 200
	});
});
</script>