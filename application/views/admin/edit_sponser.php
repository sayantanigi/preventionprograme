<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<style>
small{
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
                    <h4 class="mb-0"><?= $title ?></h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active"><?= $title ?></li>
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
						<h3 class="box-title m-b-30 m-t-10"><?= $title ?></h3>
						<div class="row">
							<div class="col-sm-8">
							
								
								
								<div class="form-group mb-2 files">
									<label class="fw-semibold  text-black">Image</label>
									<input type="file" class="form-control" name="upload_image"  id="upload_image">
									<input type="hidden" class="form-control" name="id"  id="id"  value="<?php echo !empty($this->uri->segment(4)) ? $this->uri->segment(4) : ''; ?>">
								</div>
								<small id="image_error"></small>
								<br/><br/>
								
								<div class="form-group mb-2 files">
									<img src="<?php echo !empty($sponser->image) ? base_url('uploads/sponser/'.$sponser->image.'') : base_url('uploads/noimage.jpg'); ?>" style="width: 20%;" id="blah">
								</div><br/>
								
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
<script type="text/javascript">
document.getElementById("upload_image").onchange = function(event) {
let file = event.target.files[0];
	let blobURL = URL.createObjectURL(file);
	document.getElementById("blah").src = blobURL;
}
</script>

<script>
$(document).ready(function(){
	$("#submitAboutus").on('submit', function(e){
		e.preventDefault();
		$.ajax({
		type: 'POST',
		url: '<?php echo base_url('admin/sponser/editsponser'); ?>',
		data: new FormData(this),
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
			if(data.vali_error == 1)
			{
				if(data.image_error != '')
				{
				    $('#image_error').html(data.image_error);
				}else{
					$('#image_error').html('');
				}
				
			}
			
			if(data.status == 1)
			{
              swal({title: "Sucess!", text: "<strong>"+data.message+"</strong>", type: "success", showConfirmButton: true, html:true}, function(){ window.location.href = " "});
			}
			
		}
		});
	});

});
</script> 
</script> 