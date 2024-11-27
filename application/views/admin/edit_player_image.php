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
		 <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0"><?= $page ?></h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active"><?= $page ?></li>
                        </ol>
                    </div>

                </div>
            </div>
         </div>

<div class="row">
<div class="col-md-12">
<div id="page-wrapper">
	<div class="container-fluid">
		
		<form action="" method="POST" enctype="multipart/form-data" id="submitAboutus">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
                   <div class="card-body">
						<h3 class="box-title m-b-30 m-t-10"><?= $page ?></h3>
						<div class="row">
							<div class="col-sm-8">
							
							<div class="form-group mb-2 files">
								<label class="fw-semibold  text-black">Image</label>
								<input type="file" class="form-control" name="upload_image"  id="upload_image">
								<input type="hidden" class="form-control" name="imageId"  id="imageId"  value="<?php echo !empty($gallery[0]->id) ? $gallery[0]->id : ''; ?>">
								<input type="hidden" class="form-control" name="userId"  id="userId"  value="<?php echo !empty($gallery[0]->user_id) ? $gallery[0]->user_id : ''; ?>">
							</div>
							
							<div class="form-group mb-2 files uploadinfobox" id="priviewImg">

									<img src="<?=!empty($gallery[0]->image) ? base_url('uploads/gallery/image/'.$gallery[0]->image.'') :  base_url('uploads/noimage.jpg')?>" style="width: 20%;padding: 5px;border-radius: 20px;height: 120px;display:<?=($gallery[0]->file_type == 1) ? 'block' : 'none';?>" id="image_blah">

								    <video  style="width: 20%;padding: 5px;border-radius: 20px;height: 120px;display:<?=($gallery[0]->file_type == 2) ? 'block' : 'none';?>" controls id="video_blah" ><source  src="<?=!empty($gallery[0]->image) ? base_url('uploads/gallery/image/'.$gallery[0]->image.'') :  base_url('uploads/noimage.jpg')?>" class="imageall" type="video/mp4"></video>
								
								
							</div>
								
							<div class="form-group mb-2">
								<label class="fw-semibold  text-black">Status</label>
								<select class="form-control" name="status"  id="userstatus">
									<option value="">Select Status</option>
									<option value="1" <?=($gallery[0]->status == 1) ? 'selected' : '';?>>Active</option>
									<option value="0" <?=($gallery[0]->status == 0) ? 'selected' : '';?>>Inactive</option>
								</select>
							</div>
							<small id="status_error"></small>
							<div class="col-sm-6 col-sm-offset-2 mb-3" style="padding-left:30px;">
								<div class="form-group">
									<input type="submit" class="btn btn-success" name="submit" id="submit" value="Save"/>
								</div>
							</div>
						</div>
					</div>
				</div>
				</div>
			</div>
		</form>
	</div>
			  
			</div>
		</div>
	 </div> 	
  </div> 
<script>
document.getElementById("upload_image").onchange = function(event) {
	let file = event.target.files[0];
	var extension = file.name.split('.').pop().toLowerCase();
	if(extension == 'jpg' ||  extension == 'jpeg' || extension == 'gif' || extension == 'png'){
		$('#video_blah').css('display', 'none');
		$('#image_blah').css('display', 'block');
		let blobURL = URL.createObjectURL(file);
		document.getElementById("image_blah").src = blobURL;
	}else if(extension == 'mp4' ||  extension == '3gp' || extension == 'ogg' || extension == 'ogv' || extension == 'mov' || extension == 'webm'){
		console.log(extension)
		$('#video_blah').css('display', 'block');
		$('#image_blah').css('display', 'none');
		let blobURL = URL.createObjectURL(file);
		document.getElementById("video_blah").src = blobURL;
	}
}

// $(document).ready(function(){
    // $('#upload_image').on('change', function(e) {
		 // var files = e.target.files,
        // filesLength = files.length;
            // var output = $(".uploadinfobox");
            // for (i = 0; i < filesLength; i++) {
				 // var f = files[i]
				 // var extension = f.name.split('.').pop().toLowerCase();
				 // //console.log(extension);
				 // if(extension == 'jpg' ||  extension == 'jpeg' || extension == 'gif' || extension == 'png'){
					// var fileReader = new FileReader();
					// fileReader.onload = (function(e) {
					// var html = '<img src="'+ e.target.result+'" style="width: 20%;padding: 5px;border-radius: 20px;height: 120px;" >';
					// output.append(html)
					// });
					// fileReader.readAsDataURL(f);
				 // }else{
					// var fileReader = new FileReader();
					// fileReader.onload = (function(e) {
					// var html = '<video style="width: 20%;padding: 5px;border-radius: 20px;height: 120px;" controls><source  src="'+ e.target.result+'" class="imageall" type="video/mp4"></video>';
					// output.append(html)
					// });
					// fileReader.readAsDataURL(f);
				 // }
                
				
            // }
    // });
// });
  </script>
<script>
$(document).ready(function(){
	
	$("#submitAboutus").on('submit', function(e){
		var newimg=[];
		e.preventDefault();
		var form_data = new FormData();
		var totalfiles = document.getElementById('upload_image').files.length;
		//var match = ['image/jpeg', 'image/png', 'image/jpg', 'image/jpg', 'image/gif'];
        var match = ['image/jpeg', 'image/png', 'image/jpg', 'image/jpg', 'image/gif', 'video/mp4', 'video/3gpp', 'video/quicktime', 'video/avi', 'video/webm', 'video/ogg', 'audio/ogg'];		
		
        for (var index = 0; index < totalfiles; index++) {
			
			 var fileType = document.getElementById('upload_image').files[index].type;
			 if(!((fileType == match[0]) || (fileType == match[1]) || (fileType == match[2]) || (fileType == match[3]) || (fileType == match[4]) || (fileType == match[5]) || (fileType == match[6]) || (fileType == match[7]) || (fileType == match[8]) || (fileType == match[9]) || (fileType == match[10])  || (fileType == match[11]) )){
				 swal({title: "Fail", text: "<strong>Sorry only JPG, JPEG, GIF, PNG, files are allowed to upload.</strong>", type: "error", showConfirmButton: true, html:true});
				 $('#upload_image').val('');
                return false;
            }else{
				form_data.append("files[]", document.getElementById('upload_image').files[index]);
				var imageId = $('#imageId').val();
				var status = $('#userstatus').val();
				var userId = $('#userId').val();
				form_data.append("imageId", imageId);
				form_data.append("status", status);
				 newimg = document.getElementById('upload_image').files[index];
				 console.log(newimg);
			}
		     
		}
		
		$.ajax({
		type: 'POST',
		url: '<?php echo base_url('admin/gallery/editsubmitImageGallery'); ?>',
		data: form_data,
		dataType:"json",
		contentType: false,
		cache: false,
		processData:false,
		beforeSend: function(){
			$(".progress-bar").width('0%');
			//$('#uploadsuccessfully').html('<img src="images/ajaxloading.gif"/>');
		},
		error:function(){
		  $('#uploadsuccessfully').html('<p style="color:#EA4335;">File upload failed, please try again.</p>');
		},
		success: function(data){
			// var output = $(".uploadinfobox");
			
			 if(data.status == 1)
			 {
				 swal({title: "Sucess!", text: "<strong>"+data.message+"</strong>", type: "success", showConfirmButton: true, html:true}, function(){ window.location.href = "<?=base_url('admin/gallery/player_gallery/')?>"+userId+""});
			 }
				// if(data.email_error != '')
				// {
				    // $('#email_error').html(data.email_error);
				// }else{
					// $('#email_error').html('');
				// }
				
				// if(data.truck_no_error != ''){
					// $('#truck_no_error').html(data.truck_no_error);
				// }else{
					// $('#truck_no_error').html('');
				// }
				
			// }
			
			// if(data.status == 1)
			// {
              // swal({title: "Sucess!", text: "<strong>"+data.message+"</strong>", type: "success", showConfirmButton: true, html:true}, function(){ window.location.href = " "});
			// }
			
		}
		});
	});

});
</script>