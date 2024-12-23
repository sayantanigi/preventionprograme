<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>    
<link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" />
<link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet"/>
<script src="https://unpkg.com/dropzone"></script>
<script src="https://unpkg.com/cropperjs"></script>
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
/*crop*/

.image_area {
  position: relative;
}

img {
	display: block;
	max-width: 100%;
}

.preview {
	overflow: hidden;
	width: 160px; 
	height: 160px;
	margin: 10px;
	border: 1px solid red;
}


.modal-lg{
	max-width: 1000px !important;
}

.overlay {
  position: absolute;
  bottom: 10px;
  left: 0;
  right: 0;
  background-color: rgba(255, 255, 255, 0.5);
  overflow: hidden;
  height: 0;
  transition: .5s ease;
  width: 100%;
}

.image_area:hover .overlay {
  height: 50%;
  cursor: pointer;
}

.text {
  color: #333;
  font-size: 20px;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  text-align: center;
}

#img-container {
  border: 1px solid red;
  width: 75vw;
  height: 75vw;
  background: #666;
}
img {
  display: block;
  max-width: 100%;
}
/*cover Image*/

/* input type file */

.files input {
    outline: 2px dashed #92b0b3;
    outline-offset: -10px;
    -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
    transition: outline-offset .15s ease-in-out, background-color .15s linear;
    /*padding: 120px 0px 85px 35%;*/
	padding: 52px 0px 46px 32%;
    text-align: center !important;
    margin: 0;
    width: 100% !important;
}
.files input:focus{     outline: 2px dashed #92b0b3;  outline-offset: -10px;
    -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
    transition: outline-offset .15s ease-in-out, background-color .15s linear; border:1px solid #92b0b3;
 }
.files{ position:relative}
.files:after {  pointer-events: none;
    position: absolute;
    top: 60px;
    left: 0;
    width: 50px;
    right: 0;
    height: 56px;
    content: "";
    background-image: url(https://image.flaticon.com/icons/png/128/109/109612.png);
    display: block;
    margin: 0 auto;
    background-size: 100%;
    background-repeat: no-repeat;
}
.color input{ background-color:#f1f1f1;}
.files:before {
    position: absolute;
    bottom: 10px;
    left: 0;  pointer-events: none;
    width: 100%;
    right: 0;
    height: 57px;
    /*content: " or drag it here. ";*/
    display: block;
    margin: 0 auto;
    color: #2ea591;
    font-weight: 600;
    text-transform: capitalize;
    text-align: center;
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
                    <h4 class="mb-0"><?= $title ?></h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?=base_url('dashboard')?>">Dashboard</a></li>
                            <li class="breadcrumb-item active"><?= $title ?></li>
                        </ol>
                    </div>

                </div>
            </div>
           </div>

            <div class="row">

                <div class="col-lg-6 mb-3">
                  <div class="card shadow rounded">
                     <div class="card-body">    
                        <form id="submitform" method="post" enctype="multipart/form-data" >
                            

                            <div class="form-group mb-2">
                                <label class="fw-semibold  text-black">Heading</label>
                                <input type="text" class="form-control" name="heading"  id="heading1" autocomplete="off" value="<?=@$news->heading?>">
                            </div>
							<small id="heading_error"></small>
							
							<div class="form-group mb-2">
                                <label class="fw-semibold  text-black">Description</label>
                                <textarea type="text" class="form-control editor summermote" name="description"  id="description" autocomplete="off"><?=@$news->description?></textarea>
                            </div>
							<small id="description_error"></small>
						
                            
							<div class="form-group mb-2 files">
                                <label class="fw-semibold  text-black">Profile Image</label>
                                <input type="file" class="form-control" name="upload_image"  id="upload_image" >
                                <input type="hidden" class="form-control" name="newsImg"  id="newsImg" >
                                <input type="hidden" class="form-control" name="id"  id="id" value="<?=@$news->id?>">
                            </div>
							<small id="image_error"></small>
							<br/><br/>
								
							<div class="form-group mb-2 files">
								<img src="<?php echo !empty($news->image) ? base_url('uploads/news/'.$news->image.'') : base_url('uploads/noimage.jpg'); ?>" style="width: 20%;" id="blah">
							</div><br/>
								
							<div class="form-group mb-2">
                                <label class="fw-semibold  text-black">Status</label>
                                <select class="form-control" name="status" id="userstatus">
                                    <option value="">Select Status</option>
                                    <option value="1" <?=($news->status == 1) ? 'selected' : ''?>>Active</option>
                                    <option value="0" <?=($news->status == 0) ? 'selected' : ''?>>Inactive</option>
                                </select>
                            </div>
							<small id="status_error"></small>
							
                            <div class="form-group mt-3 mb-2">
                                <button class="btn btn-success text-uppercase px-5 shadow">Submit</button>
                                <a class="btn btn-danger waves-effect waves-light m-l-30" href="javascript:history.go(-1)">Back</a>
                            </div>
                        </form>
                     </div>
                  </div>      
                </div>
            </div>
        </div>
     </section>
   </div>
 </div>
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Crop Image Before Upload</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="profile_closeModal();">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="img-container">
					<div class="row">
						<div class="col-md-8">
							<img src="" id="sample_image" />
						</div>
						<div class="col-md-4">
							<div class="preview"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" id="crop" class="btn btn-primary">Crop</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="profile_closeModal();">Cancel</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
document.getElementById("upload_image").onchange = function(event) {
let file = event.target.files[0];
	let blobURL = URL.createObjectURL(file);
	document.getElementById("blah").src = blobURL;
}
</script>

<script>
var owl_image_Arr = [];
function preview_image(upload_type) {
	if(upload_type == 'upload'){
	    var total_file = document.getElementById("upload_image").files.length;   
	}else{
	    var total_file = owl_image_Arr.length;   
	}
	var owl_image = '';
	if(total_file==0){
		owl_image += '<div class="item">'+
		'<img src="<?= base_url('dist/images/noimage.jpg') ?>" class="owl-img-fluid">'+
		'</div>';   
	}else{
		for(var i=0;i<total_file;i++){
			if(upload_type == 'upload'){
				//console.log(event.target.files[i].name);
				owl_image_Arr.push(URL.createObjectURL(event.target.files[i]));
				var image_src = URL.createObjectURL(event.target.files[i]);
			}else{
			    var image_src = owl_image_Arr[i];
			}
			/*owl_image += '<div class="item">'+
			'<img src="'+image_src+'" class="owl-img-fluid">'+
			'<a href="javascript:void(0);" class="closeimg" data-index="'+i+'"><i class="fa fa-times"></i></a>'+
			'</div>';*/

			owl_image += '<div class="item">'+
			'<img src="'+image_src+'" class="owl-img-fluid">'+
			'</div>';                        
		}
	}
	owl.trigger('replace.owl.carousel', [owl_image]);
	owl.trigger('refresh.owl.carousel');
}
   

//HANDLING CHECKOUT FORM
 $(document).on('submit', '#manage_deal_form', function(e){
	 e.preventDefault();
	 var from = $("input[name=deal_start_date]").val(); 
	 var to =$("input[name=deal_end_date]").val(); 

			if(Date.parse(from) > Date.parse(to)){
				var errorRspnsArr = ["Deal End Date must be greater than Start Date!",'error','#DD6B55'];
					alert_func(errorRspnsArr);
				return false;
			}
	 var deal_normal_price = parseFloat($('[name=deal_normal_price]').val());
	 if(deal_normal_price == 0.00){
	  var errorRspnsArr = ["Deal normal price must be greater than 0!",'error','#DD6B55'];
		alert_func(errorRspnsArr);
	  return false;
	 }
	var deal_price = parseFloat($('[name=deal_price]').val());
	if(deal_normal_price < deal_price){
	  var errorRspnsArr = ["Deal normal price must be greater than deal price!",'error','#DD6B55'];
		alert_func(errorRspnsArr);
	  return false;
	}

	 var textareaContent = $('.summernote').summernote('code');
	 var compareEmptyContentFirstCase =strcmp(textareaContent,'<ul><li><br></li></ul>');
	 var compareEmptyContentSecondCase =strcmp(textareaContent,'<p><br></p>');

	 if(compareEmptyContentFirstCase == 1 || compareEmptyContentSecondCase == 1 || textareaContent.length == 0){
		var errorRspnsArr = ["Deal Details can't be empty!",'error','#DD6B55'];
		alert_func(errorRspnsArr);
		return false;
	 }else{

		 //Throwing ajax request in server 
		 $.ajax({
		  url: adminUrl+'deals/create',
		  method:'POST',
		  data: new FormData(this),
		  contentType:false,
		  processData:false,
		  beforeSend: function() {
			 
		  },
		  success:function(resposeData){
			 var data = JSON.parse(resposeData);
			 //console.log(data);
			 if(data.check == 'success'){
			   var responseArr = [data.msg,'success','#A5DC86'];
			   //var redirectURL = adminUrl+'vendors/edit/'+data.vendorId;    
			   var redirectURL = adminUrl+'deals/lists';
			   alert_response(responseArr,redirectURL);
			   return true; 
			 }else{
				var responseArr = [data.msg,'error','#DD6B55'];
				//var redirectURL = adminUrl+'vendors/edit/'+data.vendorId;
				var redirectURL = adminUrl+'deals/lists';   
				alert_response(responseArr,redirectURL);
				return false;
			 }
		  }
		});
	 }    
});
$(document).ready(function(){
	$("#submitform").on('submit', function(e){
		e.preventDefault();
	//	var form_data = new FormData(); 	
		$.ajax({
		type: 'POST',
		url: '<?php echo base_url('admin/news/editnews'); ?>',
		data: new FormData(this),
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
				
				if(data.heading_error != ''){
					$('#heading_error').html(data.heading_error);
				}else{
					$('#heading_error').html('');
				}
				
				if(data.description_error != ''){
					$('#description_error').html(data.description_error);
				}else{
					$('#description_error').html('');
				}
				
				if(data.image_error != ''){
					$('#image_error').html(data.image_error);
				}else{
					$('#image_error').html('');
				}
				
				if(data.status_error != ''){
					$('#status_error').html(data.status_error);
				}else{
					$('#status_error').html('');
				}
				
			}
		}
		});
	});

});

 $(document).on('keyup','#fname',function(e){
        var fname = $(this).val();
        
        if(fname){
          $("#first_name").text(fname);
          $("#f-name").text(fname);
        }else{
         
          $("#first_name").text('First Name');
        }
    });
	 $(document).on('keyup','#lname',function(e){
        var lname = $(this).val();
        
        if(lname){
          $("#last_name").text(lname);
          $("#l-name").text(lname);
        }else{
         
          $("#last_name").text('Last Name');
        }
    });
	
	$(document).on('keyup','#email',function(e){
        var email = $(this).val();
        
        if(email){
          $("#coach_email").text(email);
        }else{
         
          $("#coach_email").text('Email');
        }
    });
	
	$(document).on('keyup','#phone',function(e){
        var phone = $(this).val();
        
        if(phone){
          $("#coach_phone").text(phone);
        }else{
         
          $("#coach_phone").text('phone');
        }
    });
	$(document).on('change','#sport',function(e){
        var sport = $(this).val();
		
       $.ajax({
		type: 'POST',
		url: '<?php echo base_url('admin/users/getSport_byId'); ?>',
		data: {sportId : sport},
		success: function(data){
			$("#coach_sport").text(data);
		}
		});
        
    });
	
	$(document).on('change','#userstatus',function(e){
        var status = $(this).val();
        
        if(status == 1){
          $("#coach_status").text('Active');
        }
		if(status == 0){
          $("#coach_status").text('Inactive');
        }
    });
	
	$(document).on('keyup','#team_name',function(e){
        var team_name = $(this).val();
        
        if(team_name){
          $("#coach_team_name").text(team_name);
        }else{
         
          $("#coach_team_name").text('');
        }
    });
	
	$(document).on('keyup','#team_description',function(e){
        var team_description = $(this).val();
        
        if(team_description){
          $("#coach_team_desc").text(team_description);
        }else{
         
          $("#coach_team_desc").text('');
        }
    });
// upload_image.onchange = evt => {
// const [file] = upload_image.files
// if (file) {
// blah.src = URL.createObjectURL(file)
// }
// }
 </script> 
 <script src="<?= base_url()?>assets/plugins/smt-img-upld/js/singleimage-uploader.js"></script>
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtg6oeRPEkRL9_CE-us3QdvXjupbgG14A&libraries=places"></script>
  <script>
	$(document).ready(function() {
	$("#lat_area").addClass("d-none");
	$("#long_area").addClass("d-none");
	});
	google.maps.event.addDomListener(window, 'load', initialize);
	function initialize() {
	var input = document.getElementById('autocomplete');
	var autocomplete = new google.maps.places.Autocomplete(input);
	autocomplete.addListener('place_changed', function() {
	var place = autocomplete.getPlace();
	var address = place.formatted_address;
	$("#coach_address").text(address);
	$('#latitude').val(place.geometry['location'].lat());
	$('#longitude').val(place.geometry['location'].lng());
	// --------- show lat and long ---------------
	$("#lat_area").removeClass("d-none");
	$("#long_area").removeClass("d-none");
	});
	}
</script>

<script>

$(document).ready(function(){

	var $modal = $('#modal');

	var image = document.getElementById('sample_image');

	var cropper;

	$('#upload_image').change(function(event){
		var files = event.target.files;

		var done = function(url){
			image.src = url;
			$modal.modal('show');
		};

		if(files && files.length > 0)
		{
			reader = new FileReader();
			reader.onload = function(event)
			{
				done(reader.result);
			};
			reader.readAsDataURL(files[0]);
		}
	});

	$modal.on('shown.bs.modal', function() {
		cropper = new Cropper(image, {
			aspectRatio: 1,
            viewMode: 1,
             minCanvasWidth: 50,
            minCanvasHeight: 50,
            minCropBoxWidth: 50,
            minCropBoxHeight: 50,
			preview:'.preview'
		});
	}).on('hidden.bs.modal', function(){
		cropper.destroy();
   		cropper = null;
	});

	$('#crop').click(function(){
		canvas = cropper.getCroppedCanvas({
			width:400,
			height:400
		});

		canvas.toBlob(function(blob){
			url = URL.createObjectURL(blob);
			var reader = new FileReader();
			reader.readAsDataURL(blob);
			reader.onloadend = function(){
				var base64data = reader.result;
				$.ajax({
					url:'<?php echo base_url("admin/news/cropImage")?>',
					method:'POST',
					data:{image:base64data},
					success:function(data)
					{
						$modal.modal('hide');
						console.log(data)
						
						//$('#blah').attr('src', '<?php echo base_url()?>'+data+'');
						$('#item img').attr('src', '<?php echo base_url(); ?>uploads/profile_image/' + data);
						
						$('#newsImg').val(data);
					}
				});
			};
		});
	});
	
});
$(document).ready(function() {
	$('.editor').summernote({
		placeholder: '',
		height: 200
	});
});
</script>