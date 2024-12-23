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

.preview1 {
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
                        <?php if(!empty($_GET['add']) AND $_GET['add'] == 'existing-players') { ?>						
                        <form id="submitform" method="post" enctype="multipart/form-data" >
                            <div class="form-group mb-2">
                                <label class="fw-semibold  text-black">Sports</label>
                                <select class="form-control" name="sport"  id="sport" required>
                                       <option value="">Select Sports</option>
									   <?php if (is_array($sportslist) || is_object($sportslist)) { ?>
										   <?php foreach ($sportslist as $key => $v): ?>
												<option value="<?php echo @$v->id; ?>"><?php echo @$v->sports_name; ?></option>
										   <?php endforeach ?>
										<?php } ?>
                                </select>
								<p id="err_sport"><p>
                            </div>
							
							<div class="form-group mb-2">
                                <label class="fw-semibold  text-black">Users</label>
                                <select class="form-control" name="user_id"  id="user_id" required >
                                       <option value="">Select Users</option>
                                </select>
								<p id="err_user"><p>
								<p id="user_exist" style="color:red;"><p>
                            </div>
							
							<div class="form-group mb-2">
                                <label class="fw-semibold  text-black">Coach</label>
                                <input type="text" class="form-control" name="coach"  id="coach" required autocomplete="off" value="<?=@$userInfo->first_name; ?> <?=@$userInfo->last_name; ?>">
                            </div>
							
                            <input type="hidden" class="form-control" name="coach_id"  id="coach_id"  autocomplete="off" value="<?=@$userInfo->id; ?>">
                            <div class="form-group mt-3 mb-2">
                                <button class="btn btn-success text-uppercase px-5 shadow">Submit</button>
                                <a class="btn btn-danger waves-effect waves-light m-l-30" href="javascript:history.go(-1)">Back</a>
                            </div>
                        </form>
						<?php } ?>
						
						
						<?php if(!empty($_GET['add']) AND $_GET['add'] == 'new-players') { ?>						
							<form id="newsubmitform" method="post" enctype="multipart/form-data" >
								<!--<div class="form-group mb-2">
								<label class="fw-semibold  text-black">First Name</label>
								<input type="text" class="form-control" name="fname"  id="fname" required autocomplete="off">
								</div>
								<div class="form-group mb-2">
								<label class="fw-semibold  text-black">Last Name</label>
								<input type="text" class="form-control" name="lname"  id="lname" required autocomplete="off">
								</div>-->
								
								<div class="field_wrapper1"> 
									<div class="form-group mb-2">
										<label class="fw-semibold  text-black">Email</label>
										<input type="email" class="form-control" name="email"  id="email" required autocomplete="off">
									</div>
								    <small id="email_error"></small>
								
									<div class="form-group mb-2">
										<label class="fw-semibold  text-black">Unique Player Code</label>
										<input type="text" class="form-control" name="unique_code"  id="unique_code" required autocomplete="off">
									</div>
									<small id="unique_error"></small>
								
									<!--<div class="form-group mb-2">
									<label class="fw-semibold  text-black">Phone</label>
									<input type="number" class="form-control" name="phone"  id="phone" required autocomplete="off">
									</div>
									<div class="form-group mb-2">
									<label class="fw-semibold  text-black">Address</label>
									<input type="text" class="form-control" name="address"  id="autocomplete" required autocomplete="off">
									<input type="hidden" placeholder="Near"  name="latitude" id="latitude">
									<input type="hidden" placeholder="Near" name="longitude" id="longitude">
									</div>-->
									
									<!--<div class="form-group mb-2">
									<label class="fw-semibold  text-black">Deal Limit</label>
									<input type="number" class="form-control" name="deal_limit" placeholder="Enter Deal Limit">
									</div>-->
									<!--<div class="form-group mb-2">
									<label class="fw-semibold  text-black">Sport</label>
									<select class="form-control" name="sport" required id="sport" >
									<option value="">Select Sport</option>
									<?php if (is_array($sportslist) || is_object($sportslist)) { ?>
									<?php foreach ($sportslist as $key => $v): ?>
									<option value="<?php echo @$v->id; ?>"><?php echo @$v->sports_name; ?></option>
									<?php endforeach ?>
									<?php } ?>
									</select>
									</div>-->
									
									<!--<div class="form-group mb-2">
									<label class="fw-semibold  text-black">Status</label>
									<select class="form-control" name="status" required id="userstatus">
									<option value="">Select Status</option>
									<option value="1">Active</option>
									<option value="0">Inactive</option>
									</select>
									</div>-->
									
									<!---<div class="form-group mb-2">
									<label class="fw-semibold  text-black">Profile Image</label>
									<div class="input-images"></div>
									</div>-->
									
									<!--<div class="form-group mb-2 files">
									<label class="fw-semibold  text-black">Profile Image</label>
									<input type="file" class="form-control" name="upload_image"  id="upload_image" >
									<input type="hidden" class="form-control" name="profileImg"  id="profileImg" >
									</div>
									<div class="form-group mb-2 files">
									<label class="fw-semibold  text-black">Cover Image</label>
									<input type="file" class="form-control" name="cover_image"  id="cover_image" >
									<input type="hidden" class="form-control" name="coverImg"  id="coverImg" >
									</div>
									<div class="form-group mb-2">
									<label class="fw-semibold  text-black">Password</label>
									<input type="password" class="form-control" name="password"  id="password" required autocomplete="off">
									</div>
									<small id="pass_error"></small>
									<div class="form-group mb-2">
									<label class="fw-semibold  text-black">Confirm Password</label>
									<input type="password" class="form-control" name="confirm_password"  id="confirm_password" required autocomplete="off">
									</div>
									<small id="cnfpass_error"></small>-->
									
									<!--<div class="my-3" style="float:right;">
									   <a href="javascript:void(0);" title="Add field" class="btn btn-secondary rounded-0 fw-bold add_button1">Add More </a>
									</div><br/><br/>-->
								</div>
								<div class="form-group mt-3 mb-2">
									<button class="btn btn-success text-uppercase px-5 shadow">Send Invitation</button>
									<a class="btn btn-danger waves-effect waves-light m-l-30" href="javascript:history.go(-1)">Back</a>
								</div>
								<input type="hidden" class="form-control" name="coach_id"  id="coach_id"  autocomplete="off" value="<?=@$userInfo->id; ?>">
								
							</form>
						<?php } ?>
						
                     </div>
                  </div>      
                </div>
                <?php if(!empty($_GET['add']) AND $_GET['add'] == 'new-players') { ?>	
                <div class="col-lg-6 mb-3">
                    <div class="card shadow rounded">
                     <div class="card-body">
                            <div class="row">
							
                                <div class="container">
									<div class="col-md-12">
										<!--<div class="profile clearfix"> -->                           
											<!--<div class="image item" id="Cover-Image">
											    <img src="<?= !empty(@$user->cover_image) ? base_url('uploads/cover_image/'.@$user->cover_image.'') : base_url('uploads/bnr.jpg'); ?>" class="img-cover">
											</div>-->                            
											<!--<div class="user clearfix">
												<div class="avatar item" id="item">
													<img src="<?= base_url('uploads/unnamed.jpg') ?>" class="img-thumbnail img-profile" id="blah">
												</div>                                
												<h2><span id="f-name"><?=@$user->first_name; ?></span> <span id="l-name"><?=@$user->last_name; ?></span></h2>                                
												<div class="actions">
												<div class="btn-group">
												<button class="btn btn-default btn-sm tip btn-responsive" title="" data-original-title="Add to friends"><span class="glyphicon glyphicon-plus glyphicon glyphicon-white"></span> Friends</button>
												<button class="btn btn-default btn-sm tip btn-responsive" title="" data-original-title="Send message"><span class="glyphicon glyphicon-envelope glyphicon glyphicon-white"></span> Message</button>
												<button class="btn btn-default btn-sm tip btn-responsive" title="" data-original-title="Recommend"><span class="glyphicon glyphicon-share-alt glyphicon glyphicon-white"></span> Recommend</button>
												</div>
												</div>                                                                                             
											</div>-->                          
											<div class="info">
												<!--<p><span class="glyphicon glyphicon-globe"></span> <span class="title">Address:</span>  <?=@$user->address; ?></p>-->                                    
												<!--<p><span class="glyphicon glyphicon-gift"></span> <span class="title">Date of birth:</span> 14.02.1989</p>-->											
											</div>                              
										<!--</div>-->
										
									</div>
								</div>
								
								 <div class="col-lg-12 mb-3">
                                    <!--<h2 class="fs-5 fw-semibold mb-0" id="first_name">First Name</h2><br/>
                                    <h2 class="fs-5 fw-semibold mb-0" id="last_name">Last Name</h2>
                                    <p class="mb-2 mt-2"><strong>Email:</strong> <span class="text-success fw-semibold" id="individual_email"></span></p>
                                    <p class="mb-2 mt-2"><strong>Phone:</strong> <span class="text-success fw-semibold" id="individual_phone"></span></p>
                                    <p class="mb-2 mt-2"><strong>Address:</strong> <span class="text-success fw-semibold" id="individual_address"></span></p>
                                    <p class="mb-2 mt-2"><strong>Sport:</strong> <span class="text-success fw-semibold" id="individual_sport"></span></p>
                                    <p class="mb-2 mt-2"><strong>Status:</strong> <span class="text-success fw-semibold" id="individual_status"></span></p>-->
									
									<div class="card rounded">
									<div class="card-body">
									
									<!--<div class="mt-3"> <label class="tx-11 font-weight-bold mb-0 "><h6>First Name</h6></label><p class="text-muted" id="first_name"></p></div>
									
									<div class="mt-3"> <label class="tx-11 font-weight-bold mb-0 "><h6>Last Name</h6></label><p class="text-muted" id="last_name"></p></div>-->
									
									<div class="mt-3"> <label class="tx-11 font-weight-bold mb-0 "><h6>Email</h6></label><p class="text-muted" id="coach_email"></p></div>
									
									<div class="mt-3"> <label class="tx-11 font-weight-bold mb-0 "><h6>Unique Player Code</h6></label><p class="text-muted" id="text_unique_code"></p></div>
									
									<!--<div class="mt-3"> <label class="tx-11 font-weight-bold mb-0 "><h6>Phone</h6></label><p class="text-muted" id="coach_phone"></p></div>
									
									
									
									<div class="mt-3"> <label class="tx-11 font-weight-bold mb-0"><h6>Sport</h6></label><p class="text-muted" id="coach_sport"></p></div>
									
									<div class="mt-3"> <label class="tx-11 font-weight-bold mb-0"><h6>Team Name</h6></label><p class="text-muted" id="coach_team_name"></p></div>
									
									<div class="mt-3"> <label class="tx-11 font-weight-bold mb-0"><h6>Team Description</h6></label><p class="text-muted" id="coach_team_desc"></p></div>
									
									<div class="mt-3"> <label class="tx-11 font-weight-bold mb-0 "><h6>Status</h6></label><p class="text-muted" id="coach_status"></p></div>
									
									<div class="d-flex align-items-center justify-content-between mb-2">
									<h6 class="card-title mb-0">Address</h6>
									</div>
									
									<p id="coach_address"></p>-->
									
									<!--<div class="mt-3 d-flex social-links">
									<a href="javascript:;" class="btn d-flex align-items-center justify-content-center border mr-2 btn-icon github"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github" data-toggle="tooltip" title="" data-original-title="github.com/nobleui"> <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path> </svg> </a>
									<a href="javascript:;" class="btn d-flex align-items-center justify-content-center border mr-2 btn-icon twitter"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter" data-toggle="tooltip" title="" data-original-title="twitter.com/nobleui"> <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path> </svg> </a> 
									<a href="javascript:;" class="btn d-flex align-items-center justify-content-center border mr-2 btn-icon instagram"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram" data-toggle="tooltip" title="" data-original-title="instagram.com/nobleui"> <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect> <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path> <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line> </svg> </a>
									</div>-->
									
									</div>
									</div>
									
                                </div>
                                <!--<div class="col-lg-5">
                                    <div class="owl-carousel owl-theme" id="dealslide">
                                        <div class="item" id="item">
                                            <img src="<?= base_url('uploads/unnamed.jpg') ?>" class="owl-img-fluid" id="blah" style="width:70%;height:150px;">
                                            
                                        </div>
                                    </div>
                                    <p class="fs-6 text-center mb-2"> <span style="margin-left: -3.75rem !important;"class="percentoff fw-bold ms-1 text-orange" >Profile Image</span></p>
                                   
                                </div>-->
								
								
                                
                                
                                
                                   
                               
                            </div>   	
                     </div>
                    </div>

                         
                </div>
				<?php } ?>


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
<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title">Crop Image Before Upload</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cover_closeModal();">
				<span aria-hidden="true">×</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="img-container">
				<div class="row">
					<div class="col-md-8">
						<img src="" id="sample_image1" />
					</div>
					<div class="col-md-4">
						<div class="preview1"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" id="crop1" class="btn btn-primary">Crop</button>
			<button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="cover_closeModal();">Cancel</button>
		</div>
	</div>
</div>
</div>
<link href='<?php echo base_url(); ?>assets/chosen/chosen.min.css' rel='stylesheet' type='text/css'>
<script src='<?php echo base_url(); ?>assets/chosen/chosen.jquery.min.js' type='text/javascript'></script> 
<script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button1'); //Add button selector
    var wrapper = $('.field_wrapper1'); //Input field wrapper
	
    var fieldHTML = '<div class="form-group mb-2"> <label class="fw-semibold  text-black">Email</label><input type="email"  name="email[]" class="form-control"></div> <div class="form-group mb-2"><label  class="fw-semibold  text-black">Unique Player Code</label> <input type="text"  name="unique_code[]" class="form-control" ></div> <a href="javascript:void(0);" class="btn btn-secondary rounded-0 fw-bold remove_button1">Remove</a> '; //New input field html 
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
		var form_data = new FormData(); 	
	
		
		var sport_id = $('#sport').val(); 
		var user_id = $('#user_id').val(); 
		var coach_id = $('#coach_id').val();
		form_data.append("sport_id", sport_id);
		form_data.append("user_id", user_id);
		form_data.append("coach_id", coach_id);

		$.ajax({
		type: 'POST',
		url: '<?php echo base_url('admin/users/addTeamplayer'); ?>',
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
				swal({title: "Sucess!", text: "<strong>"+data.message+"</strong>", type: "success", showConfirmButton: true, html:true}, function(){ window.location.href = " "});
				
			}
			if(data.status == 0){
				swal({title: "Fail!", text: "<strong>"+data.message+"</strong>", type: "error", showConfirmButton: true, html:true}, function(){ window.location.href = " "});
			}
			if(data.status == 'err_false'){
				$('#user_exist').html(data.message);
			}else{
				$('#user_exist').html();
			}
			
		}
		});
	});

});

 $(document).ready(function(){
	$("#newsubmitform").on('submit', function(e){
		e.preventDefault();
		// var form_data = new FormData(); 	
		// var email = $('#email').val();
		// var unique_code = $('#unique_code').val();
		// var coach_id = $('#coach_id').val();

		// form_data.append("email", email);
		// form_data.append("unique_code", unique_code);
		// form_data.append("coach_id", coach_id);
		
		$.ajax({
		type: 'POST',
		//url: '<?php echo base_url('admin/users/addnewTeamplayer'); ?>',
		url: '<?php echo base_url('admin/users/addnew_teamplayer'); ?>',
		data:  new FormData(this),
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
				$('#unique_code').val(''); 
				$('#email').val('');
				
			}
			
			if(data.count21 == 4){
				swal({title: "Fail!", text: "<strong>"+data.message+"</strong>", type: "error", showConfirmButton: true, html:true}, function(){ window.location.href = " "});
				
			}
			
			if(data.status == 0){
				swal({title: "Fail!", text: "<strong>"+data.message+"</strong>", type: "error", showConfirmButton: true, html:true}, function(){ window.location.href = " "});
			}
			if(data.vali_error == 1){
				
				if(data.email_error != ''){
					$('#email_error').html(data.email_error);
				}else{
					$('#email_error').html('');
				}
				
				if(data.unique_error != ''){
					$('#unique_error').html(data.unique_error);
				}else{
					$('#unique_error').html('');
				}
				
			}
		}
		});
	});

});
  
 // $(document).ready(function(){
	// $("#newsubmitform").on('submit', function(e){
		// e.preventDefault();
		// var form_data = new FormData(); 	
		// //var profile_image = $("#upload_image").prop("files")[0]; 
		
		// var fname = $('#fname').val(); 
		// var lname = $('#lname').val(); 
		// var email = $('#email').val();
		// var status = $('#userstatus').val();
		// var phone = $('#phone').val();
		// var address = $('#autocomplete').val();
		// var latitude = $('#latitude').val(); 
		// var longitude = $('#longitude').val(); 
		// var confirm_password = $('#confirm_password').val(); 
		// var password = $('#password').val(); 
		// var sportid = $('#sport').val(); 
		// var coach_id = $('#coach_id').val();
		// var profileImg = $('#profileImg').val(); 
		// var coverImg = $('#coverImg').val(); 
		
		// form_data.append("coverImg", coverImg);
		// form_data.append("profileImg", profileImg);
		// //form_data.append("profile_image", profile_image);
		// form_data.append("fname", fname);
		// form_data.append("lname", lname);
		// form_data.append("email", email);
		// form_data.append("status", status);
		// form_data.append("phone", phone);
		// form_data.append("address", address);
		// form_data.append("latitude", latitude);
		// form_data.append("longitude", longitude);
		// form_data.append("longitude", longitude);
		// form_data.append("password", password);
		// form_data.append("confirm_password", confirm_password);
		// form_data.append("sport_id", sportid);
		// form_data.append("coach_id", coach_id);
		// $.ajax({
		// type: 'POST',
		// url: '<?php echo base_url('admin/users/addnewTeamplayer'); ?>',
		// data: form_data,
		// dataType:"json",
		// contentType: false,
		// cache: false,
		// processData:false,
		// error:function(){
		  // $('#uploadsuccessfully').html('<p style="color:#EA4335;">File upload failed, please try again.</p>');
		// },
		// success: function(data){
			// if(data.status == 1){
				// swal({title: "Sucess!", text: "<strong>"+data.message+"</strong>", type: "success", showConfirmButton: true, html:true}, function(){ window.location.href = " "});
				// $("#upload_image").va(''); 
				// $('#fname').val(''); 
				// $('#lname').val(''); 
				// $('#email').val('');
				// $('#phone').val('');
				// $('#autocomplete').val('');
				// $('#latitude').val(''); 
				// $('#longitude').val(''); 
			// }
			// if(data.status == 0){
				// swal({title: "Fail!", text: "<strong>"+data.message+"</strong>", type: "error", showConfirmButton: true, html:true}, function(){ window.location.href = " "});
			// }
			// if(data.vali_error == 1){
				// if(data.pass_error != ''){
					// $('#pass_error').html(data.pass_error);
				// }else{
					// $('#pass_error').html('');
				// }
				
				// if(data.cnfpass_error != ''){
					// $('#cnfpass_error').html(data.cnfpass_error);
				// }else{
					// $('#cnfpass_error').html('');
				// }
				
				// if(data.email_error != ''){
					// $('#email_error').html(data.email_error);
				// }else{
					// $('#email_error').html('');
				// }
				
			// }
		// }
		// });
	// });

// });

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
	$(document).on('keyup','#unique_code',function(e){
        var team_name = $(this).val();
        
        if(team_name){
          $("#text_unique_code").text(team_name);
        }else{
         
          $("#text_unique_code").text('');
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
	
$('#sport').change(function(){
	var sport_id = $('#sport').val();
	if(sport_id != '')
	{
		$.ajax({
			url:"<?php echo base_url(); ?>admin/users/getuser_bysport",
			method:"POST",
			data:{sport_id:sport_id},
			success:function(data)
			{
				$('#user_id').html(data);
				//$('#city').html('<option value="">Select City</option>');
			}
		});
	}
	else
	{
		$('#user_id').html('<option value="">Select User</option>');
		//$('#city').html('<option value="">Select City</option>');
	}
});

});
</script>	
<!--<script type="text/javascript">
	$(document).ready(function(){
		$('#sel1').chosen({disable_search_threshold: 10,width:'200px'});
		$('#sel2').chosen({width:'200px'});
		$('#sel3').chosen({no_results_text:"Not found",width:'200px'});
		$('#sport').chosen({max_selected_options:3,width:'100%'});
		$('#sel5').chosen({allow_single_deselect:true,width:'200px'});
	});
</script>-->
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
					url:'<?php echo base_url("admin/users/cropImage")?>',
					method:'POST',
					data:{image:base64data},
					success:function(data)
					{
						$modal.modal('hide');
						console.log(data)
						
						//$('#blah').attr('src', '<?php echo base_url()?>'+data+'');
						$('#item img').attr('src', '<?php echo base_url(); ?>uploads/profile_image/' + data);
						
						$('#profileImg').val(data);
					}
				});
			};
		});
	});
	
});
</script>
<script>

$(document).ready(function(){
	var $modal = $('#modal1');
	var image = document.getElementById('sample_image1');
	var cropper;
	$('#cover_image').change(function(event){
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
			preview:'.preview1'
		});
	}).on('hidden.bs.modal', function(){
		cropper.destroy();
   		cropper = null;
	});

	$('#crop1').click(function(){
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
					url:'<?php echo base_url("admin/users/crop_CoverImage")?>',
					method:'POST',
					data:{image:base64data},
					success:function(data)
					{
						$modal.modal('hide');
						console.log(data)
						
						//$('#blah').attr('src', '<?php echo base_url()?>'+data+'');
						$('#Cover-Image img').attr('src', '<?php echo base_url(); ?>uploads/cover_image/' + data);
						
						$('#coverImg').val(data);
					}
				});
			};
		});
	});
	
});
function profile_closeModal(){
	$('#modal').modal('hide');
}
function cover_closeModal(){
	$('#modal1').modal('hide');
}
</script>

