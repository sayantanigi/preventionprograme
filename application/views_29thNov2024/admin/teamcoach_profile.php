<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>    
<link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" />
<link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet"/>
<script src="https://unpkg.com/dropzone"></script>
<script src="https://unpkg.com/cropperjs"></script>
<style>
 /* input type file */

.files input {
    outline: 2px dashed #92b0b3 !important;
    outline-offset: -10px !important;
    -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear !important;
    transition: outline-offset .15s ease-in-out, background-color .15s linear !important;
    /*padding: 120px 0px 85px 35%;*/
	padding: 52px 0px 46px 32% !important;
    text-align: center !important;
    margin: 0 !important;
    width: 100% !important;
}
.files input:focus{     outline: 2px dashed #92b0b3;  outline-offset: -10px !important;
    -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear !important;
    transition: outline-offset .15s ease-in-out, background-color .15s linear; border:1px solid #92b0b3 !important;
 }
.files{ position:relative}
.files:after {  pointer-events: none !important;
    position: absolute !important;
    top: 60px !important;
    left: 0 !important;
    width: 50px !important;
    right: 0 !important;
    height: 56px !important;
    content: "" !important;
    background-image: url(https://image.flaticon.com/icons/png/128/109/109612.png) !important;
    display: block !important;
    margin: 0 auto !important;
    background-size: 100% !important;
    background-repeat: no-repeat !important;
}
.color input{ background-color:#f1f1f1;}
.files:before {
    position: absolute !important;
    bottom: 10px !important;
    left: 0;  pointer-events: none !important;
    width: 100% !important;
    right: 0 !important;
    height: 57px !important;
    /*content: " or drag it here. ";*/
    display: block !important;
    margin: 0 auto !important;
    color: #2ea591 !important;
    font-weight: 600 !important;
    text-transform: capitalize !important;
    text-align: center !important;
}

/*Crop*/
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

.preview2 {
	overflow: hidden;
	height: 160px;
	margin: 10px;
	border: 1px solid red;
}	width: 160px; 


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
#progressbar li {
	width: 33% !important;
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
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 text-center p-20 mt-3 mb-2">
                            <div class="card p-4">
                                <h2 id="heading">Profile</h2>
                                <p>Fill all form field to go to next step</p>
                                <form id="msform" action="" method="POST" enctype="multipart/form-data" >
                                    <!-- progressbar -->
                                    <ul id="progressbar">
									    <!--<li class="active" id="account-photo">
                                            <div class="progressIcon"><i class="fa fa-user"></i></div>
                                            <strong>Profile</strong>
                                        </li>-->
										
                                        <li id="account" class="<?php echo !empty($profile) ? 'active' : 'active'; ?>">
                                            <div class="progressIcon"><i class="fa fa-user"></i></div>
                                            <strong>Profile</strong>
                                        </li>
										<?php
										
										    if(!empty($contact[0]->address) && !empty($contact[0]->country) && !empty($contact[0]->state) && !empty($contact[0]->city) && !empty($contact[0]->pincode)){
											   $contact = 'active';
										    }else{
											   $contact = '';
											}
										?>
										<li id="contact" class="<?php echo @$contact; ?>">
                                            <div class="progressIcon"><i class="fa fa-user"></i></div>
                                            <strong>Contact Info</strong>
                                        </li>
										
										<?php
										  
										    if(!empty($team[0]->team_name) && !empty($team[0]->team_description) && !empty($team[0]->team_image) && !empty($team[0]->teamcover_image)){
											   $team_1= 'active';
										    }else{
											   $team_1 = '';
											}
										?>
										
										<li id="team" class="<?php echo @$team_1; ?>">
                                            <div class="progressIcon"><i class="fa fa-user"></i></div>
                                            <strong>Team Info</strong>
                                        </li>
										
                                       <!-- <li id="academics" class="<?php echo !empty($academics) ? 'active' : ''; ?>">
                                            <div class="progressIcon"><i class="fa fa-graduation-cap"></i></div>
                                            <strong>Academics</strong>
                                        </li>
                                        <li id="athletics" class="<?php echo !empty($athletics) ? 'active' : ''; ?>">
                                            <div class="progressIcon"><i class="fa fa-futbol"></i></div>
                                            <strong>Athletics</strong>
                                        </li>
                                        <li id="exprience" class="<?php echo !empty($exprience) ? 'active' : ''; ?>">
                                            <div class="progressIcon"><i class="fa fa-briefcase"></i></div>
                                            <strong>Exprience</strong>
                                        </li>
                                        <li id="reference" class="<?php echo !empty($reference) ? 'active' : ''; ?>">
                                            <div class="progressIcon"><i class="fa fa-bullhorn"></i></div>
                                            <strong>Reference</strong>
                                        </li>-->
										
										
                                    </ul>
                                    
									 <!--<fieldset id="step_0" class="pro-Photo">
                                        <div class="form-card">
                                            <div class=" pt-3">
                                                <h3 class="text-uppercase text-center h4 fw-bold mb-3">Coach Profile</h3>
                                                <div class="row">
                                                    <div class="form-group mb-2 col-lg-6 files">
                                                        <label>Upload Cover Picture</label>
                                                        <input type="file" class="form-control" name="cover_image"  id="cover_image" >
														
															<input type="hidden" class="form-control" name="coverImg"  id="coverImg" >
														<span id="error_cover_image" class="text-danger"></span>
                                                    </div> 	
                                                    <div class="form-group mb-2 col-lg-6 files">
                                                        <label>Upload Profile Picture</label>
                                                        <input type="file" class="form-control" name="profile_image"  id="profile_image" >
													<input type="hidden" class="form-control" name="profileImg"  id="profileImg" >
														<span id="error_profile_image" class="text-danger"></span>
                                                    </div> 														
                                                </div>
                                                
                                            </div>
                                        </div> 
                                        <input type="button" name="next" class="next action-button" value="Next" id="zero-next-button" /><br/><br/>
										<p id="profileimage_err"></p>
										
                                    </fieldset>-->
									
                                    <fieldset id="step_1" class="<?php echo !empty($profile) ? 'pro-Info' : 'pro-Info'; ?>">
                                        <div class="form-card">
                                            <div class=" pt-3">
                                                <h3 class="text-uppercase text-center h4 fw-bold mb-3">Coach Profile Info</h3>
                                                <div class="row">
                                                    <div class="mb-2 col-lg-6">
                                                        <label>First Name</label>
                                                        <input type="text" class="form-control" name="fname" id="fname" value="<?php echo !empty($profile->first_name) ? $profile->first_name : ''; ?>"> 
														
														<span id="error_fname" class="text-danger"></span>
                                                    </div> 
													
                                                    <div class="mb-2 col-lg-6">
                                                        <label>Last Name</label>
                                                        <input type="text" class="form-control" name="lname" id="lname" value="<?php echo !empty($profile->last_name) ? $profile->last_name : ''; ?>">
														
														<span id="error_lname" class="text-danger"></span>
                                                    </div> 
													
                                                  
													
                                                    <div class="mb-2 col-lg-6">
                                                        <label>Email</label>
                                                        <input type="email" class="form-control" name="email" id="email" value="<?php echo !empty($profile->email) ? $profile->email : ''; ?>">		
														<span id="error_email" class="text-danger"></span>
                                                    </div> 
													
                                                    <div class="mb-2 col-lg-6">
                                                        <label>Contact Number</label>
                                                        <input type="text" class="form-control" name="phone"  id="phone" value="<?php echo !empty($profile->phone) ? $profile->phone : ''; ?>">
														<span id="error_phone" class="text-danger"></span>
                                                    </div> 
													
                                                    <div class="mb-2 col-lg-12">
                                                        <label>About the Coach</label>
                                                        <textarea class="form-control editor summermote" name="profile_bio" id="profile_bio"><?php echo !empty($profile->bio) ? $profile->bio : ''; ?></textarea>
														<span id="error_profile_bio" class="text-danger"></span>
                                                    </div>   
 													
													<div class="form-group mb-2 col-lg-8 files">
														<label>Upload Profile Picture</label>
														<input type="file" class="form-control" name="profile_image"  id="profile_image" >
														<input type="hidden" class="form-control" name="profileImg"  id="profileImg" value="<?=@$profile->profile_image?>">
														<span id="error_profile_image" class="text-danger"></span>
													</div> 
													<div class="form-group mb-2 col-lg-4">
														<div class="container">
															<div class="user clearfix" style="margin: 25px 62px">
																<div class="avatar item" id="Profile-Img">
																	<img src="<?= !empty(@$profile->profile_image) ? base_url('uploads/profile_image/'.@$profile->profile_image.'') : base_url('uploads/unnamed.jpg'); ?>" class="img-thumbnail img-profile">
																</div>                                
															</div>							 
															
															
														</div>
													</div> 
													 													
                                                </div>
                                                
                                            </div>
                                        </div> 
                                        <input type="button" name="next" class="next action-button" value="Next" id="first-next-button" /><br/><br/>
										<p id="userinfo_err"></p>
										
                                    </fieldset>
									
									
									<fieldset id="step_cotact" class="contact-Info">
                                        <div class="form-card">
                                            <div class=" pt-3">
                                                <h3 class="text-uppercase text-center h4 fw-bold mb-3">Contact Info</h3>
                                                <div class="row">
                                                   
													<?php 
													if (!empty($academics)) {
													foreach($academics as $academic) { 
													?>
														<div class="mb-2 col-lg-12">
															<label>School / College Name</label>
															<input type="text" class="form-control" name="college[]" id="college" value="<?php echo !empty($academic->college) ? $academic->college : ''; ?>">
															<span id="error_college" class="text-danger"></span>
														</div> 
													<?php } } ?>
													
                                                    <div class="mb-2 col-lg-12">
                                                        <label>Address</label>
                                                        <input type="text" class="form-control" name="address" id="autocomplete" value="<?php echo !empty($profile->address) ? $profile->address : ''; ?>">
														<input type="hidden" placeholder="Near"  name="latitude" id="latitude" value="<?php echo !empty($profile->latitude) ? $profile->latitude : ''; ?>">
														<input type="hidden" placeholder="Near" name="longitude" id="longitude" value="<?php echo !empty($profile->longitude) ? $profile->longitude : ''; ?>">
														<span id="error_address" class="text-danger"></span>
                                                    </div> 
													
													 <div class="mb-2 col-lg-6">
                                                        <label>Country</label>
                                                      <input type="text" class="form-control" name="country" id="country" value="<?php echo !empty($profile->country) ? $profile->country : ''; ?>">
														<!--<select  class="form-control" name="country" id="country">
															<option value="">Select Country</option>
															<?php if (is_array($countrylist) || is_object($countrylist)) {
															foreach($countrylist as $c): ?>
																<option value="<?php echo !empty($c->country_id) ? $c->country_id : ''; ?>" <?php echo ($c->country_id == $profile->country) ? 'selected' : ''; ?>><?php echo !empty($c->country_name) ? $c->country_name : ''; ?></option>
															<?php endforeach; } ?> 
														</select>-->
														<span id="error_country" class="text-danger"></span>
                                                    </div> 
													
													<div class="mb-2 col-lg-6">
                                                        <label>State</label>
                                                        <input type="text" class="form-control" name="state" id="state" value="<?php echo !empty($profile->state) ? $profile->state : ''; ?>">
														<!--<select class="form-control" id="state" name="state">
														    <option value="">Select State</option>
															<?php if (is_array($statelist) || is_object($statelist)) {
															foreach($statelist as $c): ?>
																<option value="<?php echo !empty($c->state_id) ? $c->state_id : ''; ?>" <?php echo ($c->state_id == $profile->state) ? 'selected' : ''; ?>><?php echo !empty($c->state_name) ? $c->state_name : ''; ?></option>
															<?php endforeach; } ?> 
														</select>-->
														<span id="error_state" class="text-danger"></span>
                                                    </div>
													
                                                    <div class="mb-2 col-lg-6">
                                                        <label>City</label>
                                                         <input type="text" class="form-control" name="city" id="city" value="<?php echo !empty($profile->city) ? $profile->city : ''; ?>">
														<!--<select class="form-control" name="city" id="city">
														    <option value="">Select City</option>
															<?php if (is_array($citylist) || is_object($citylist)) {
															foreach($citylist as $c): ?>
																<option value="<?php echo !empty($c->city_id) ? $c->city_id : ''; ?>" <?php echo ($c->city_id == $profile->city) ? 'selected' : ''; ?>><?php echo !empty($c->city_name) ? $c->city_name : ''; ?></option>
															<?php endforeach; } ?>
														</select>-->
														<span id="error_city" class="text-danger"></span>
                                                    </div> 
                                                     
                                                   
                                                    <div class="mb-2 col-lg-6">
                                                        <label>Zip Code</label>
                                                        <input type="text" class="form-control" name="pincode" id="pincode" value="<?php echo !empty($profile->pincode) ? $profile->pincode : ''; ?>">
														<span id="error_pincode" class="text-danger"></span>
                                                    </div> 
                                                    													
                                                </div>
                                                
                                            </div>
                                        </div> 
                                        <input type="button" name="next" class="next action-button" value="Next" id="step_cotact-next-button" /><br/><br/>
                                    </fieldset>
									
									
									
									<fieldset id="step_team" class="team-Info">
                                        <div class="form-card">
                                            <div class=" pt-3">
                                                <h3 class="text-uppercase text-center h4 fw-bold mb-3">Team Info</h3>
                                                <div class="row">
                                                  
													<div class="container">
														<div class="col-md-5">
															<div class="profile clearfix" >                            
																<div class="image item" id="teamCover-Img">
																	<img src="<?=!empty(@$team[0]->teamcover_image) ? base_url('uploads/team_image/'.@$team[0]->teamcover_image.'') : base_url('uploads/bnr.jpg'); ?>" class="img-cover" style="width: 100%;object-fit: contain;background-color: #eee;height: auto;">
																</div>                            
																<div class="user clearfix">
																	<div class="avatar item" id="teamProfile-Img">
																		<img src="<?= !empty(@$team[0]->team_image) ? base_url('uploads/team_image/'.@$team[0]->team_image.'') : base_url('uploads/unnamed.jpg'); ?>" class="img-thumbnail img-profile">
																	</div>                                
																	</div>							 
															</div>
														</div>
													</div>
								
													
													<div class="mb-2 col-lg-6 files">
														<label >Team Image</label>
														<input type="file" class="form-control" name="team_image"  id="team_image" >
														<input type="hidden" class="form-control" name="teamImg"  id="teamImg" value="<?php echo !empty(@$team[0]->team_image) ? @$team[0]->team_image : ''; ?>">
														<span id="error_teamImg" class="text-danger"></span>
													</div>
														
													<div class="mb-2 col-lg-6 files">
														<label >Team Cover Image</label>
														<input type="file" class="form-control" name="teamcover_image"  id="teamcover_image" >
														<input type="hidden" class="form-control" name="teamcoverImg"  id="teamcoverImg" value="<?php echo !empty(@$team[0]->teamcover_image) ? @$team[0]->teamcover_image : ''; ?>">
														<span id="error_teamcoverImg" class="text-danger"></span>
													</div>
													
													<?php
													$selected_sportId= array();
													$exsportId = explode(',', @$profile->sport_id);
													foreach ($exsportId as $sport_Id){
													$selected_sportId[]= $sport_Id;
													}
													?>
													<div class="mb-2 col-lg-6">
														<label>Sport</label>
														<select class="form-control form-select" name="sport" id="sport">
															<option value="">Select</option>
															<?php if (is_array($sportslist) || is_object($sportslist)) { ?>
																<?php foreach ($sportslist as $key => $v): ?>
																    <option value="<?php echo @$v->id; ?>" <?php echo (in_array(@$v->id,$selected_sportId) ? 'selected' : '') ;?>><?php echo @$v->sports_name; ?></option>
																<?php endforeach ?>
															<?php } ?>
														</select>
														<span id="error_sport" class="text-danger"></span>
													</div>
													
													<div class="mb-2 col-lg-6">
														<label>Team Type</label>
														<select class="form-control form-select" name="team_type" id="team_type">
															<option value="">Select Team Type</option>
															<option value="High School Team" <?php echo (@$athletics->team_type == 'High School Team') ? 'selected' : ''; ?>>High School Team</option>
															<option value="Club Team" <?php echo (@$athletics->team_type == 'Club Team') ? 'selected' : ''; ?>>Club Team</option>
														</select>
														<span id="error_team_type" class="text-danger"></span>
													</div>
													
                                                    <div class="mb-2 col-lg-12">
                                                        <label>Team Name</label>
                                                        <input type="text" class="form-control" name="team_name"  id="team_name" value="<?php echo !empty(@$team[0]->team_name) ? @$team[0]->team_name : ''; ?>">
														<span id="error_team_name" class="text-danger"></span>
                                                    </div> 
													
                                                    <div class="mb-2 col-lg-12">
													<label>Team Description</label>
                                                      <textarea class="form-control editor summermote" name="team_desc" id="team_desc"><?php echo !empty(@$team[0]->team_description) ? @$team[0]->team_description : ''; ?></textarea>
														<span id="error_team_desc" class="text-danger"></span>
                                                    </div> 
																						
                                                </div>
                                                
                                            </div>
                                        </div> 
                                        <!--<input type="button" name="next" class="next action-button" value="Next" id="step_team-next-button" /><br/><br/>-->
										<input type="hidden" name="userId" id="userId" value="<?php echo !empty($profile->id) ? $profile->id : ''; ?>" /> 
                                        <!--<input type="submit" name="next" class="next action-button" value="Submit" /> -->
										<input type="button" name="next" class="next action-button" value="Next" id="step_team-next-button" />
                                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
										<br><br/>
                                    </fieldset>
									
									
									
									
                                </form>
                            </div>
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

<div class="modal fade" id="modal_teamImg" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title">Crop Image Before Upload</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="teamimg_closeModal();">
				<span aria-hidden="true">×</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="img-container">
				<div class="row">
					<div class="col-md-8">
						<img src="" id="teamImage" />
					</div>
					<div class="col-md-4">
						<div class="preview2"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" id="crop_team_image" class="btn btn-primary">Crop</button>
			<button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="teamimg_closeModal();">Cancel</button>
		</div>
	</div>
</div>
</div>


<div class="modal fade" id="modal_coverteamImg" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title">Crop Image Before Upload</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="coverimg_closeModal();">
				<span aria-hidden="true">×</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="img-container">
				<div class="row">
					<div class="col-md-8">
						<img src="" id="coverteamImage" />
					</div>
					<div class="col-md-4">
						<div class="preview2"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" id="cropcover_team_image" class="btn btn-primary">Crop</button>
			<button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="coverimg_closeModal();">Cancel</button>
		</div>
	</div>
</div>
</div>

 <script>
 $(document).ready(function(){
	// var editstart_date = "<?php echo !empty($exprience->start_date) ? date('m/d/Y', strtotime($exprience->start_date)) : ''; ?>";
	// $(".step_4 #start_date").val(editstart_date);
	
	$('#zero-next-button').click(function(){
		var mobile_validation = /^\d{10}$/;
		var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		
		var error_cover_image = '';
		var error_profile_image = '';
		
		
			
		
		if(error_cover_image != '' || error_profile_image != ''){
			$('#step_0').css({'display':'block', 'position' : 'relative', 'opacity' : '1'});
			$('#step_1').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
			$('#profileimage_err').html('<div style="background: #972424;width: 66%;color: white;padding: 8px 67px;margin: 4px 152px;border-radius: 5px;"><small style="color: white;">One or more mandatory fields have not been populated. Please check and resubmit.</small></div>');
			return false;
		}else{
			var profileImg = $('#profileImg').val();	
			var cover_image = $('#coverImg').val();	
            var userId = $('#userId').val();			
			$.ajax({
				type: 'POST',
				url: '<?php echo base_url('admin/users/updateProfileCoach');?>',
				data: {profileImg : profileImg, cover_image : cover_image, userId : userId},
				success: function(data){

				}
			});
			$('#step_0').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
			$('#step_1').css({'display':'block', 'position' : 'relative', 'opacity' : '1'});
			$("#account").addClass("active");
			$('#profileimage_err').html('<small style="color:red;"></small>');
		}
	});
	
	
	$('#first-next-button').click(function(){
		var mobile_validation = /^\d{10}$/;
		var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		var error_fname = '';
		var error_lname = '';
		var error_email = '';
		var error_phone = '';
		var error_profile_bio = '';        			
		var  error_profile_image = '';   			
		if($.trim($('#fname').val()).length == 0){
			error_fname = 'Please enter first name';
			$('#error_fname').text(error_fname);
			$('#fname').addClass('has-error');
		}
		else
		{
			error_fname = '';
			$('#error_fname').text(error_fname);
			$('#fname').removeClass('has-error');
		}
		
		if($.trim($('#lname').val()).length == 0){
			error_lname = 'Please enter last name';
			$('#error_lname').text(error_lname);
			$('#lname').addClass('has-error');
		}
		else
		{
			error_lname = '';
			$('#error_lname').text(error_lname);
			$('#lname').removeClass('has-error');
		}
		
		
		
		if($.trim($('#email').val()).length == 0)
		{
			error_email = 'please enter email';
			$('#error_email').text(error_email);
			$('#email').addClass('has-error');
		}
		else
		{
			if (!filter.test($('#email').val()))
			{
				error_email = 'Invalid email';
				$('#error_email').text(error_email);
				$('#email').addClass('has-error');
			}
			else
			{
				error_email = '';
				$('#error_email').text(error_email);
				$('#email').removeClass('has-error');
			}
		}
		
		if($.trim($('#phone').val()).length == 0)
		{
			error_phone = 'Please enter phone number';
			$('#error_phone').text(error_phone);
			$('#phone').addClass('has-error');
		}
		else
		{
			if (!mobile_validation.test($('#phone').val()))
			{
				error_phone = 'Invalid phone number';
				$('#error_phone').text(error_phone);
				$('#phone').addClass('has-error');
			}
			else
			{
				error_phone = '';
				$('#error_phone').text(error_phone);
				$('#phone').removeClass('has-error');
			}
		}
		
	
		if($.trim($('#profile_bio').val()).length == 0){
			error_profile_bio = 'Please enter your bio';
			$('#error_profile_bio').text(error_profile_bio);
			$('#profile_bio').addClass('has-error');
		}
		else
		{
			error_profile_bio = '';
			$('#error_profile_bio').text(error_profile_bio);
			$('#profile_bio').removeClass('has-error');
		}
		
		
		if($.trim($('#profileImg').val()).length == 0){
			error_profile_image = 'Please choose the profile Image';
			$('#error_profile_image').text(error_profile_image);
			$('#profileImg').addClass('has-error');
		}
		else
		{
			error_profile_image = '';
			$('#error_profile_image').text(error_profile_image);
			$('#profileImg').removeClass('has-error');
		}
		
		
		if(error_fname != '' || error_lname != '' || error_email != '' || error_phone != '' || error_profile_bio != '' || error_profile_image != ''){
			//$(".step-1").removeAttr("style");
            //$(".step-1").css({ 'color' : ''});

			$('#step_1').css({'display':'block', 'position' : 'relative', 'opacity' : '1'});
			$('#step_2').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
			$('#userinfo_err').html('<div style="background: #972424;width: 66%;color: white;padding: 8px 67px;margin: 4px 152px;border-radius: 5px;"><small style="color: white;">One or more mandatory fields have not been populated. Please check and resubmit.</small></div>');
			return false;
		}else{
				var fname = $('#fname').val();	
				var lname = $('#lname').val();	
				var email = $('#email').val();	
				var phone = $('#phone').val();	
				var profile_bio = $('#profile_bio').val();
                var profileImg = $('#profileImg').val();					
				var userId = $('#userId').val();

				$.ajax({
				type: 'POST',
				url: '<?php echo base_url('admin/users/updateProfileCoach');?>',
				data: {fname : fname, lname : lname, email : email, phone : phone, profile_bio : profile_bio, profileImg : profileImg, userId : userId},
				dataType: 'text',
				success: function(data){

				}
				});
			$('#step_1').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
			$('#step_cotact').css({'display':'block', 'position' : 'relative', 'opacity' : '1'});
			$("#contact").addClass("active");
			$('#userinfo_err').html('<small style="color:red;"></small>');
		}
	});
	
	$('#step_cotact-next-button').click(function(){
		var mobile_validation = /^\d{10}$/;
		var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

		var error_college = '';
		var error_address = '';
		var error_city = '';
		var error_country = '';
		var error_state = '';	
		var error_pincode = '';
		
		if($.trim($('#college').val()).length == 0){
			error_college = 'Please enter college name';
			$('#error_college').text(error_college);
			$('#college').addClass('has-error');
		}
		else
		{
			error_college = '';
			$('#error_college').text(error_college);
			$('#college').removeClass('has-error');
		}
		
		if($.trim($('#autocomplete').val()).length == 0){
			error_address = 'Please enter your address';
			$('#error_address').text(error_address);
			$('#autocomplete').addClass('has-error');
		}
		else
		{
			error_address = '';
			$('#error_address').text(error_address);
			$('#autocomplete').removeClass('has-error');
		}
		
		if($.trim($('#city').val()).length == 0){
			error_city = 'Please enter your city';
			$('#error_city').text(error_city);
			$('#city').addClass('has-error');
		}
		else
		{
			error_city = '';
			$('#error_city').text(error_city);
			$('#city').removeClass('has-error');
		}
		
		if($.trim($('#country').val()).length == 0){
			error_country = 'Please enter your country';
			$('#error_country').text(error_country);
			$('#country').addClass('has-error');
		}
		else
		{
			error_country = '';
			$('#error_country').text(error_country);
			$('#country').removeClass('has-error');
		}
		
		if($.trim($('#state').val()).length == 0){
			error_state = 'Please enter your state';
			$('#error_state').text(error_state);
			$('#state').addClass('has-error');
		}
		else
		{
			error_state = '';
			$('#error_state').text(error_state);
			$('#state').removeClass('has-error');
		}
		
		
		if($.trim($('#pincode').val()).length == 0){
			error_pincode = 'Please enter your pin code';
			$('#error_pincode').text(error_pincode);
			$('#pincode').addClass('has-error');
		}
		else
		{
			error_pincode = '';
			$('#error_pincode').text(error_pincode);
			$('#pincode').removeClass('has-error');
		}
		
				
		
		if(error_address != '' || error_city != '' || error_country != '' || error_state != '' || error_pincode != ''){
			//$(".step-1").removeAttr("style");
            //$(".step-1").css({ 'color' : ''});

			$('#step_cotact').css({'display':'block', 'position' : 'relative', 'opacity' : '1'});
			$('#step_team').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
			$('#contactinfo_err').html('<div style="background: #972424;width: 66%;color: white;padding: 8px 67px;margin: 4px 152px;border-radius: 5px;"><small style="color: white;">One or more mandatory fields have not been populated. Please check and resubmit.</small></div>');
			return false;
		}else{
			    college = [];
				$("input[name='college[]']").each(function() {
				college.push($(this).val());
				});
				
				var autocomplete = $('#autocomplete').val();	
				var country = $('#country').val();	
				var state= $('#state').val();	
				var city = $('#city').val();	
				var pincode = $('#pincode').val();	
				var userId = $('#userId').val();

				$.ajax({
				type: 'POST',
				url: '<?php echo base_url('admin/users/updateProfileCoach');?>',
				data: {address : autocomplete, country : country, state : state, city : city, pincode : pincode, college: college, userId : userId},
				dataType: 'text',
				success: function(data){

				}
				});
				
			$('#step_cotact').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
			$('#step_team').css({'display':'block', 'position' : 'relative', 'opacity' : '1'});
			$("#team").addClass("active");
			$('#contactinfo_err').html('<small style="color:red;"></small>');
		}
	});
	
	
	
	$('#step_team-next-button').click(function(){
		var mobile_validation = /^\d{10}$/;
		var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		var error_teamImg = '';
		var error_teamcoverImg = '';
		var error_team_name = '';
		var error_team_desc = '';	
		var error_sport = '';	
		var error_team_type = '';	
	
		
		if($.trim($('#teamImg').val()).length == 0){
			error_teamImg = 'Please choose the team Image';
			$('#error_teamImg').text(error_teamImg);
			$('#teamImg').addClass('has-error');
		}
		else
		{
			error_teamImg = '';
			$('#error_teamImg').text(error_teamImg);
			$('#teamImg').removeClass('has-error');
		}
		
		if($.trim($('#teamcoverImg').val()).length == 0){
			error_teamcoverImg = 'Please choose team cover image';
			$('#error_teamcoverImg').text(error_teamcoverImg);
			$('#teamcoverImg').addClass('has-error');
		}
		else
		{
			error_teamcoverImg = '';
			$('#error_teamcoverImg').text(error_teamcoverImg);
			$('#teamcoverImg').removeClass('has-error');
		}
		
		if($.trim($('#team_name').val()).length == 0){
			error_team_name = 'Please enter team name';
			$('#error_team_name').text(error_team_name);
			$('#team_name').addClass('has-error');
		}
		else
		{
			error_team_name = '';
			$('#error_team_name').text(error_team_name);
			$('#team_name').removeClass('has-error');
		}
		
		if($.trim($('#team_desc').val()).length == 0){
			error_team_desc = 'Please enter team description';
			$('#error_team_desc').text(error_team_desc);
			$('#team_desc').addClass('has-error');
		}
		else
		{
			error_team_desc = '';
			$('#error_team_desc').text(error_team_desc);
			$('#team_desc').removeClass('has-error');
		}
		
		
		if($.trim($('#sport').val()).length == 0){
			error_sport = 'Please select sport';
			$('#error_sport').text(error_sport);
			$('#sport').addClass('has-error');
		}
		else
		{
			error_sport = '';
			$('#error_sport').text(error_sport);
			$('#sport').removeClass('has-error');
		}
		
		if($.trim($('#team_type').val()).length == 0){
			error_team_type = 'Please select team type';
			$('#error_team_type').text(error_team_type);
			$('#team_type').addClass('has-error');
		}
		else
		{
			error_team_type = '';
			$('#error_team_type').text(error_team_type);
			$('#team_type').removeClass('has-error');
		}

		
		if(error_teamImg != '' || error_teamcoverImg != '' || error_team_name != '' || error_team_desc != '' || error_sport != '' || error_team_type != ''){
			//$(".step-1").removeAttr("style");
            //$(".step-1").css({ 'color' : ''});

			$('#step_team').css({'display':'block', 'position' : 'relative', 'opacity' : '1'});
			$('#step_2').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
			$('#teaminfo_err').html('<div style="background: #972424;width: 66%;color: white;padding: 8px 67px;margin: 4px 152px;border-radius: 5px;"><small style="color: white;">One or more mandatory fields have not been populated. Please check and resubmit.</small></div>');
			return false;
		}else{
					
				var teamImg = $('#teamImg').val();	
				var teamcoverImg = $('#teamcoverImg').val();	
				var team_name= $('#team_name').val();	
				var team_desc = $('#team_desc').val();		
				var userId = $('#userId').val();
				var sport = $('#sport').val();	
				var team_type = $('#team_type').val();
				
				$.ajax({
				type: 'POST',
				url: '<?php echo base_url('admin/users/updateProfileCoach');?>',
				data: {teamImg : teamImg, teamcoverImg : teamcoverImg, team_name : team_name, team_desc : team_desc, userId : userId, sport : sport, team_type : team_type},
				dataType: 'json',
				success: function(data){
					if(data.status == 1){
					    swal({title: "Sucess!", text: "<strong>"+data.message+"</strong>", type: "success", showConfirmButton: true, html:true}, function(){  window.location.href = " "});

					}
					if(data.status == 0){
					    swal({title: "Fail!", text: "<strong>"+data.message+"</strong>", type: "error", showConfirmButton: true, html:true}, function(){ window.location.href = " "});
					}
				}
				});
				
			//$('#step_team').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
			//$('#step_2').css({'display':'block', 'position' : 'relative', 'opacity' : '1'});
			$("#academics").addClass("active");
			$('#teaminfo_err').html('<small style="color:red;"></small>');
		}
	});
	
	
	
	$('#second-next-button').click(function(){
		var error_college = '';
		var error_course = '';
		//var error_passing_year = '';		//var error_achievement = '';		var error_graduation_year = '';		var error_gpa = '';		var error_act_score = '';
		
		if($.trim($('#college').val()).length == 0){
			error_college = 'Please enter college name';
			$('#error_college').text(error_college);
			$('#college').addClass('has-error');
		}
		else
		{
			error_college = '';
			$('#error_college').text(error_college);
			$('#college').removeClass('has-error');
		}
		
		if($.trim($('#course').val()).length == 0){
			error_course = 'Please enter course name';
			$('#error_course').text(error_course);
			$('#course').addClass('has-error');
		}
		else
		{
			error_course = '';
			$('#error_course').text(error_course);
			$('#course').removeClass('has-error');
		}
		
		if($.trim($('#rank').val()).length == 0){
			error_rank = 'Please enter rank name';
			$('#error_rank').text(error_rank);
			$('#rank').addClass('has-error');
		}
		else
		{
			error_rank = '';
			$('#error_rank').text(error_rank);
			$('#rank').removeClass('has-error');
		}
		
		if($.trim($('#graduation_year').val()).length == 0){			
		error_graduation_year = 'Please enter graduation year';	
		$('#error_graduation_year').text(error_graduation_year);
		
		$('#graduation_year').addClass('has-error');	
		}else{		
		
		error_graduation_year = '';		
		$('#error_graduation_year').text(error_graduation_year);
		$('#graduation_year').removeClass('has-error');	
		}
		
		if($.trim($('#gpa').val()).length == 0){
			error_gpa = 'Please enter GPA';		
			$('#error_gpa').text(error_gpa);		
			$('#gpa').addClass('has-error');		
			}else{		
			error_gpa = '';		
			$('#error_gpa').text(error_gpa);	
			$('#gpa').removeClass('has-error');	
			}
			
			if($.trim($('#act_score').val()).length == 0){	
			error_act_score = 'Please enter ACT Score';		
			$('#error_act_score').text(error_act_score);	
			$('#act_score').addClass('has-error');		
			}else{	
			error_act_score = '';
			$('#error_act_score').text(error_act_score);	
			$('#act_score').removeClass('has-error');	
			}
		
		
		if(error_college != ''){
			$('#step_2').css({'display':'block', 'position' : 'relative', 'opacity' : '1'});
			$('#step_1').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
            $('#academicinfo_err').html('<div style="background: #972424;width: 66%;color: white;padding: 8px 67px;margin: 4px 152px;border-radius: 5px;"><small style="color: white;">One or more mandatory fields have not been populated. Please check and resubmit.</small></div>');
			return false;
		}else{
				college = [];
				$("input[name='college[]']").each(function() {
				college.push($(this).val());
				});
				
				var course = '';
				$("input[name='course[]']").each(function() {
				course.push($(this).val());
				});
				
				rank = [];
				$("input[name='rank[]']").each(function() {
				rank.push($(this).val());
				});
				
				graduation_year = [];
				$("input[name='graduation_year[]']").each(function() {
				graduation_year.push($(this).val());
				});
				
				gpa = [];
				$("input[name='gpa[]']").each(function() {
				gpa.push($(this).val());
				});
				
				act_score = [];
				$("input[name='act_score[]']").each(function() {
				act_score.push($(this).val());
				});
				
				var userId = $('#userId').val();
				
				$.ajax({
				type: 'POST',
				url: '<?php echo base_url('admin/users/updateProfileCoach');?>',
				data: {college : college, course : course, rank : rank, graduation_year : graduation_year, gpa : gpa, act_score : act_score, userId : userId},
				dataType: 'text',
				success: function(data){
				}
				});
			$('#step_3').css({'display':'block', 'position' : 'relative', 'opacity' : '1'});
			$('#step_1').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
			$('#step_2').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
			$("#athletics").addClass("active");
			$('#academicinfo_err').html('<small style="color:red;"></small>');
		}
		
	});
	
	$('#third-next-button').click(function(){
		var error_feet = '';
		var error_weight = '';
		var error_footed = '';
		var error_strength = '';
		var error_school_team = '';
		var error_club_team = '';
		var error_position = '';
		var error_sport = '';
		
		if($.trim($('#feet').val()).length == 0){
			error_height = 'Please enter feet';
			$('#error_feet').text(error_height);
			$('#feet').addClass('has-error');
		}
		else
		{
			error_feet = '';
			$('#error_feet').text(error_feet);
			$('#feet').removeClass('has-error');
		}
		
		if($.trim($('#weight').val()).length == 0){
			error_weight = 'Please enter your weight';
			$('#error_weight').text(error_weight);
			$('#weight').addClass('has-error');
		}
		else
		{
			error_weight = '';
			$('#error_weight').text(error_weight);
			$('#weight').removeClass('has-error');
		}
		
		
		if($.trim($('#footed').val()).length == 0){
			error_footed = 'Please enter your footed';
			$('#error_footed').text(error_footed);
			$('#footed').addClass('has-error');
		}
		else
		{
			error_footed = '';
			$('#error_footed').text(error_footed);
			$('#footed').removeClass('has-error');
		}
		
		
		if($.trim($('#strength').val()).length == 0){
			error_strength = 'Please enter your strength';
			$('#error_strength').text(error_strength);
			$('#strength').addClass('has-error');
		}
		else
		{
			error_strength = '';
			$('#error_strength').text(error_strength);
			$('#strength').removeClass('has-error');
		}
		
		
		if($.trim($('#school_team').val()).length == 0){
			error_school_team = 'Please enter school team';
			$('#error_school_team').text(error_school_team);
			$('#school_team').addClass('has-error');
		}
		else
		{
			error_school_team = '';
			$('#error_school_team').text(error_school_team);
			$('#school_team').removeClass('has-error');
		}
		
		if($.trim($('#club_team').val()).length == 0){
			error_club_team = 'Please enter club team';
			$('#error_club_team').text(error_club_team);
			$('#club_team').addClass('has-error');
		}
		else
		{
			error_club_team = '';
			$('#error_club_team').text(error_club_team);
			$('#club_team').removeClass('has-error');
		}
		
			if($.trim($('#position').val()).length == 0){
			error_position = 'Please enter position';
			$('#error_position').text(error_position);
			$('#position').addClass('has-error');
		}
		else
		{
			error_position = '';
			$('#error_position').text(error_position);
			$('#position').removeClass('has-error');
		}
		
		if($.trim($('#sport').val()).length == 0){
			error_sport = 'Please select sport';
			$('#error_sport').text(error_sport);
			$('#sport').addClass('has-error');
		}
		else
		{
			error_sport = '';
			$('#error_sport').text(error_sport);
			$('#sport').removeClass('has-error');
		}
		
		if($.trim($('#team_type').val()).length == 0){
			error_team_type = 'Please select team type';
			$('#error_team_type').text(error_team_type);
			$('#team_type').addClass('has-error');
		}
		else
		{
			error_team_type = '';
			$('#error_team_type').text(error_team_type);
			$('#team_type').removeClass('has-error');
		}
		
		if( error_sport != '' || error_team_type !=''){
			$('#step_3').css({'display':'block', 'position' : 'relative', 'opacity' : '1'});
			$('#step_2').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
			$('#step_1').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
            $('#athleticsinfo_err').html('<div style="background: #972424;width: 66%;color: white;padding: 8px 67px;margin: 4px 152px;border-radius: 5px;"><small style="color: white;">One or more mandatory fields have not been populated. Please check and resubmit.</small></div>');
			return false;
		}else{
			
			    var feet = $('#feet').val();	
				var inches = $('#inches').val();	
				var weight = $('#weight').val();	
				var footed = $('#footed').val();	
				var position = $('#position').val();	
				var sport = $('#sport').val();	
				var strength = $('#strength').val();	
				var school_team = $('#school_team').val();
				var club_team = $('#club_team').val();
				var userId = $('#userId').val();
				var team_type = $('#team_type').val();

				$.ajax({
				type: 'POST',
				url: '<?php echo base_url('admin/users/updateProfileCoach');?>',
				data: {feet : feet, inches : inches, weight : weight, footed : footed, position : position, sport : sport, strength : strength, school_team : school_team, club_team : club_team, userId : userId, team_type : team_type},
				dataType: 'text',
				success: function(data){

				}
				});
			$('#step_4').css({'display':'block', 'position' : 'relative', 'opacity' : '1'});
			$('#step_1').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
			$('#step_2').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
			$('#step_3').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
			$("#exprience").addClass("active");
			$('#athleticsinfo_err').html('<small style="color:red;"></small>');
		}
		
	});
	
	$('#four-next-button').click(function(){
		var error_club_name = '';
		var error_club_designation = '';
		var error_start_date = '';
		var error_end_date = '';
		
		if($.trim($('#club_name').val()).length == 0){
			error_club_name = 'Please enter your club name';
			$('#error_club_name').text(error_club_name);
			$('#club_name').addClass('has-error');
		}
		else
		{
			error_club_name = '';
			$('#error_club_name').text(error_club_name);
			$('#club_name').removeClass('has-error');
		}
		
		if($.trim($('#club_designation').val()).length == 0){
			error_club_designation = 'Please enter your designation';
			$('#error_club_designation').text(error_club_designation);
			$('#club_designation').addClass('has-error');
		}
		else
		{
			error_club_designation = '';
			$('#error_club_designation').text(error_club_designation);
			$('#club_designation').removeClass('has-error');
		}
		
		
		if($.trim($('#start_date').val()).length == 0){
			error_start_date = 'Please enter start date';
			$('#error_start_date').text(error_start_date);
			$('#start_date').addClass('has-error');
		}
		else
		{
			error_start_date = '';
			$('#error_start_date').text(error_start_date);
			$('#start_date').removeClass('has-error');
		}
		
		if($.trim($('#end_date').val()).length == 0){
			error_end_date = 'Please enter end date';
			$('#error_end_date').text(error_end_date);
			$('#end_date').addClass('has-error');
		}
		else
		{
			error_end_date = '';
			$('#error_end_date').text(error_end_date);
			$('#end_date').removeClass('has-error');
		}
		
		
		
		if(error_club_name != '' ){
			$('#step_4').css({'display':'block', 'position' : 'relative', 'opacity' : '1'});
			$('#step_3').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
			$('#step_2').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
			$('#step_1').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
			$('#experienceinfo_err').html('<div style="background: #972424;width: 66%;color: white;padding: 8px 67px;margin: 4px 152px;border-radius: 5px;"><small style="color: white;">One or more mandatory fields have not been populated. Please check and resubmit.</small></div>');
			return false;
		}else{
			
			club_name = [];
			$("input[name='club_name[]']").each(function() {
			club_name.push($(this).val());
			});
			
			club_designation = [];
			$("input[name='club_designation[]']").each(function() {
			club_designation.push($(this).val());
			});
			
			start_date = [];
			$("input[name='start_date[]']").each(function() {
			start_date.push($(this).val());
			});
			
			end_date = [];
			$("input[name='end_date[]']").each(function() {
			end_date.push($(this).val());
			});
		
			information = [];
			$(".information").each(function() {
			information.push($(this).val());
			});
            console.log(information)
			var userId = $('#userId').val();
			
			$.ajax({
			type: 'POST',
			url: '<?php echo base_url('admin/users/updateProfileCoach');?>',
			data: {club_name : club_name, club_designation : club_designation, start_date : start_date, end_date : end_date, information : information, userId : userId},
			dataType: 'text',
			success: function(data){
			}
			});
			
			$('#step_5').css({'display':'block', 'position' : 'relative', 'opacity' : '1'});
			$('#step_4').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
			$('#step_1').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
			$('#step_2').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
			$('#step_3').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
			$("#reference").addClass("active");
			$('#experienceinfo_err').html('<small style="color:red;"></small>');
		}
		
	});
	
	
	
	$("#msform").submit(function (event) {
 
		var error_coach_name = '';
		var error_coach_email = '';
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		
		if($.trim($('#coach_name').val()).length == 0){
			error_coach_name = 'Please enter coach name';
			$('#error_coach_name').text(error_coach_name);
			$('#coach_name').addClass('has-error');
		}
		else
		{
			error_coach_name = '';
			$('#error_coach_name').text(error_coach_name);
			$('#coach_name').removeClass('has-error');
		}
		
		if($.trim($('#coach_email').val()).length == 0){
			error_coach_email = 'Please enter coach email';
			$('#error_coach_email').text(error_coach_email);
			$('#coach_email').addClass('has-error');
		}
		else
		{
			
			if (!filter.test($('#coach_email').val()))
			{
				error_coach_email = 'Invalid email';
				$('#error_coach_email').text(error_coach_email);
				$('#coach_email').addClass('has-error');
			}
			else
			{
				error_coach_email = '';
				$('#error_coach_email').text(error_coach_email);
				$('#coach_email').removeClass('has-error');
			}
		}
        
		if(error_coach_email != '' || error_coach_name != '' ){
			$('#referenceinfo_err').html('<div style="background: #972424;width: 66%;color: white;padding: 8px 67px;margin: 4px 152px;border-radius: 5px;"><small style="color: white;">One or more mandatory fields have not been populated. Please check and resubmit.</small></div>');
			return false;
		}else{
			$('#referenceinfo_err').html('<small style="color:red;"></small>');
		}
		
		event.preventDefault();
		$.ajax({
		type: 'POST',
		url: '<?php echo base_url('admin/users/updateProfileCoach');?>',
		data: new FormData(this),
		dataType: 'json', 
		cache: false,
		contentType: false,
		processData: false,
		success: function(data){ 
			if(data.status == 1){
				swal({title: "Sucess!", text: "<strong>"+data.message+"</strong>", type: "success", showConfirmButton: true, html:true}, function(){ window.location.href = " "});
				
			}
			if(data.status == 0){
				swal({title: "Fail!", text: "<strong>"+data.message+"</strong>", type: "error", showConfirmButton: true, html:true}, function(){ window.location.href = " "});
			}
		}
		});

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
		var profile_image = $("#upload_image").prop("files")[0]; 
		
		var fname = $('#fname').val(); 
		var lname = $('#lname').val(); 
		var email = $('#email').val();
		var status = $('#userstatus').val();
		var phone = $('#phone').val();
		var address = $('#autocomplete').val();
		var latitude = $('#latitude').val(); 
		var longitude = $('#longitude').val(); 
		var confirm_password = $('#confirm_password').val(); 
		var password = $('#password').val(); 
		
		form_data.append("profile_image", profile_image);
		form_data.append("fname", fname);
		form_data.append("lname", lname);
		form_data.append("email", email);
		form_data.append("status", status);
		form_data.append("phone", phone);
		form_data.append("address", address);
		form_data.append("latitude", latitude);
		form_data.append("longitude", longitude);
		form_data.append("longitude", longitude);
		form_data.append("password", password);
		form_data.append("confirm_password", confirm_password);
		$.ajax({
		type: 'POST',
		url: '<?php echo base_url('admin/users/addIndividuals'); ?>',
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
				$("#upload_image").va(''); 
				$('#fname').val(''); 
				$('#lname').val(''); 
				$('#email').val('');
				$('#phone').val('');
				$('#autocomplete').val('');
				$('#latitude').val(''); 
				$('#longitude').val(''); 
			}
			if(data.status == 0){
				swal({title: "Fail!", text: "<strong>"+data.message+"</strong>", type: "error", showConfirmButton: true, html:true}, function(){ window.location.href = " "});
			}
			if(data.vali_error == 1){
				if(data.pass_error != ''){
					$('#pass_error').html(data.pass_error);
				}else{
					$('#pass_error').html('');
				}
				
				if(data.cnfpass_error != ''){
					$('#cnfpass_error').html(data.cnfpass_error);
				}else{
					$('#cnfpass_error').html('');
				}
				
				if(data.email_error != ''){
					$('#email_error').html(data.email_error);
				}else{
					$('#email_error').html('');
				}
				
			}
		}
		});
	});
});
   
 
 </script> 
 <script src="<?= base_url()?>assets/plugins/smt-img-upld/js/singleimage-uploader.js"></script>
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtg6oeRPEkRL9_CE-us3QdvXjupbgG14A&libraries=places"></script>
<script type="text/javascript">
    google.maps.event.addDomListener(window, 'load', function () {
        var places = new google.maps.places.Autocomplete(document.getElementById('autocomplete'));
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
                        document.getElementById('pincode').value = pin;
                    }
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function(){
    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;
    var current = 1;
    var steps = $("fieldset").length;
    setProgressBar(current);
    // $(".next").click(function(){
    // current_fs = $(this).parent();
    // next_fs = $(this).parent().next();
    // //Add Class Active
    // $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
    // //show the next fieldset
    // next_fs.show();
    // //hide the current fieldset with style
    // current_fs.animate({opacity: 0}, {
    // step: function(now) {
    // // for making fielset appear animation
    // opacity = 1 - now;
    // current_fs.css({
   // // 'display': 'none',
    // 'position': 'relative'
    // });
    // next_fs.css({'opacity': opacity});
    // },
    // duration: 500
    // });
    // setProgressBar(++current);
    // });
    $(".previous").click(function(){
    current_fs = $(this).parent();
    previous_fs = $(this).parent().prev();
    //Remove class active
    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
    //show the previous fieldset
    previous_fs.show();
    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
    step: function(now) {
    // for making fielset appear animation
    opacity = 1 - now;
    current_fs.css({
    'display': 'none',
    'position': 'relative'
    });
    previous_fs.css({'opacity': opacity});
    },
    duration: 500
    });
    setProgressBar(--current);
    });
    function setProgressBar(curStep){
    var percent = parseFloat(100 / steps) * curStep;
    percent = percent.toFixed();
    $(".progress-bar")
    .css("width",percent+"%")
    }
    $(".submit").click(function(){
    return false;
    })
    });
</script>
<script>
$(document).ready(function(){
	
$('#country').change(function(){
	var country_id = $('#country').val();
	if(country_id != '')
	{
		$.ajax({
			url:"<?php echo base_url(); ?>admin/users/state",
			method:"POST",
			data:{country_id:country_id},
			success:function(data)
			{
				$('#state').html(data);
				$('#city').html('<option value="">Select City</option>');
			}
		});
	}
	else
	{
		$('#state').html('<option value="">Select State</option>');
		$('#city').html('<option value="">Select City</option>');
	}
});

$('#state').change(function(){
	var state_id = $('#state').val();
	if(state_id != '')
	{
		$.ajax({
			url:"<?php echo base_url(); ?>admin/users/city",
			method:"POST",
			data:{state_id:state_id},
			success:function(data)
			{
			  $('#city').html(data);
			}
		});
	}
	else
	{
	    $('#city').html('<option value="">Select City</option>');
	}
});

//document.getElementById("resquestion").innerHTML  = ""+question+"";
});
$(document).ready(function() {
	$('.editor').summernote({
		placeholder: '',
		height: 200
	});
});	

$(document).on('keyup','#feet',function(e){
	var feet = $(this).val();
	
	if(feet){
		//console.log(feet)
	  $("#feet").val(feet+"'");
	}
});	
$(document).on('change','#inches',function(e){
	var inches = $(this).val();
	
	if(inches){

	  $("#inches").val(inches+'"');
	}
});
</script>	
</script>	

<script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
	
    var fieldHTML = '<div class="row"><div class="mb-2 col-lg-12"> <label>School / College Name</label><input type="text"  name="college[]" class="form-control"></div>  <a href="javascript:void(0);" class="btn btn-secondary rounded-0 fw-bold remove_button" style="width:100px;">Remove</a> </div>'; //New input field html 
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
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>

<script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button1'); //Add button selector
    var wrapper = $('.field_wrapper1'); //Input field wrapper
	
    var fieldHTML = '<div class="row"><div class="mb-2 col-lg-12"> <label>Club Name</label><input type="text"  name="club_name[]" class="form-control"></div> <div class="mb-2 col-lg-12"><label>Information</label><textarea type="text" class="form-control textarea information" name="information[]" ></textarea> </div> <a href="javascript:void(0);" class="btn btn-secondary rounded-0 fw-bold remove_button1" style="width:100px;">Remove</a> </div>'; //New input field html 
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

<script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button2'); //Add button selector
    var wrapper = $('.field_wrapper2'); //Input field wrapper
	
    var fieldHTML = '<div class="row"><div class="mb-2 col-lg-6"> <label>Coach Name</label><input type="text"  name="coach_name[]" class="form-control"></div> <div class="mb-2 col-lg-6"><label>Coach Email</label> <input type="text"  name="coach_email[]" class="form-control" ></div>  <a href="javascript:void(0);" class="btn btn-secondary rounded-0 fw-bold remove_button2" style="width: 100px;">Remove</a> </div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    

    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button2', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});

$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button3'); //Add button selector
    var wrapper = $('.field_wrapper3'); //Input field wrapper
	
    var fieldHTML = '<div class="row"><div class="mb-2 col-lg-6"> <label>Guardian Name</label><input type="text"  name="guardian_name[]" class="form-control"></div> <div class="mb-2 col-lg-6"><label>Guardian Email</label> <input type="email"  name="guardian_email[]" class="form-control" ></div>  <div class="mb-2 col-lg-6"><label>Guardian Phone</label> <input type="text"  name="guardian_phone[]" class="form-control" ></div><div class="mb-2 col-lg-6"><label>Guardian Relation</label> <input type="text"  name="guardian_relation[]" class="form-control" ></div><a href="javascript:void(0);" class="btn btn-secondary rounded-0 fw-bold remove_button3" style="width: 100px;">Remove</a> </div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    

    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button3', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>


<script>
function confirmDelete(id) {
var userId = $("a#hiddenuserid_"+id).data().value; 
    swal({
        title: "Are you sure you want to hide this data?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes",
        closeOnConfirm: false
    }, function (isConfirm) {
        if (!isConfirm) return;
        $.ajax({
            url: "<?php echo base_url(); ?>admin/users/deleteUser_academicInfo",
            type: "POST",
            data: {
                academic: id, userId:userId
            },
            dataType: "html",
            success: function () {
                swal({title: "Sucess!", text: "<strong>You have successfully deleted this data.</strong>", type: "success", showConfirmButton: true, html:true});
				$('.academicUserinfo_'+id).remove();
            }
			
            
        });
    });
}

function expDelete(id) {
var userId = $("a#expuserid_"+id).data().value; 
    swal({
        title: "Are you sure you want to hide this data?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes",
        closeOnConfirm: false
    }, function (isConfirm) {
        if (!isConfirm) return;
        $.ajax({
            url: "<?php echo base_url(); ?>admin/users/deleteUser_expInfo",
            type: "POST",
            data: {
                experience: id, userId:userId
            },
            dataType: "html",
            success: function () {
                swal({title: "Sucess!", text: "<strong>You have successfully deleted this data.</strong>", type: "success", showConfirmButton: true, html:true});
				$('.experienceUserinfo_'+id).remove();
            }
			
            
        });
    });
}

function refDelete(id) {
var userId = $("a#refuserid_"+id).data().value; 
    swal({
        title: "Are you sure you want to hide this data?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes",
        closeOnConfirm: false
    }, function (isConfirm) {
        if (!isConfirm) return;
        $.ajax({
            url: "<?php echo base_url(); ?>admin/users/deleteUser_refInfo",
            type: "POST",
            data: {
                reference: id, userId:userId
            },
            dataType: "html",
            success: function () {
                swal({title: "Sucess!", text: "<strong>You have successfully deleted this data.</strong>", type: "success", showConfirmButton: true, html:true});
				$('.referenceUserinfo_'+id).remove();
            }
			
            
        });
    });
}

function guarDelete(id) {
var userId = $("a#guaruserid_"+id).data().value; 
    swal({
        title: "Are you sure you want to hide this data?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes",
        closeOnConfirm: false
    }, function (isConfirm) {
        if (!isConfirm) return;
        $.ajax({
            url: "<?php echo base_url(); ?>admin/users/deleteUser_guarInfo",
            type: "POST",
            data: {
                reference: id, userId:userId
            },
            dataType: "html",
            success: function () {
                swal({title: "Sucess!", text: "<strong>You have successfully deleted this data.</strong>", type: "success", showConfirmButton: true, html:true});
				$('.guardianUserinfo_'+id).remove();
            }
			
            
        });
    });
}

$("#progressbar").on("click", "#account-photo", function(event){
	$('.pro-Photo').css({'display':'block', 'position' : 'relative', 'opacity' : '1'});
	$('.pro-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.contact-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.team-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.academic-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.athletics-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.expriences-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.references-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.guardian-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$("#account-photo").addClass("active");
	$("#team").removeClass("active");
	
	$("#academics").removeClass("active");
	$("#athletics").removeClass("active");
	$("#exprience").removeClass("active");
	$("#reference").removeClass("active");
	$("#guardian").removeClass("active");
	 
});

$("#progressbar").on("click", "#account", function(event){
	$('.pro-Info').css({'display':'block', 'position' : 'relative', 'opacity' : '1'});
	$('.contact-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
		$('.team-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.pro-Photo').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.academic-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.athletics-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.expriences-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.references-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.guardian-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$("#account").addClass("active");
	$("#account-photo").removeClass("active");
	$("#team").removeClass("active");
	$("#academics").removeClass("active");
	$("#athletics").removeClass("active");
	$("#exprience").removeClass("active");
	$("#reference").removeClass("active");
	$("#guardian").removeClass("active");
	 
});

$("#progressbar").on("click", "#contact", function(event){
	$('.contact-Info').css({'display':'block', 'position' : 'relative', 'opacity' : '1'});
		$('.team-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.pro-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.pro-Photo').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.academic-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.athletics-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.expriences-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.references-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.guardian-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$("#contact").addClass("active");
	$("#team").removeClass("active");
	$("#account-photo").removeClass("active");
	$("#account").removeClass("active");
	$("#academics").removeClass("active");
	$("#athletics").removeClass("active");
	$("#exprience").removeClass("active");
	$("#reference").removeClass("active");
	$("#guardian").removeClass("active");
	 
});


$("#progressbar").on("click", "#team", function(event){
	$('.team-Info').css({'display':'block', 'position' : 'relative', 'opacity' : '1'});
	$('.contact-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.pro-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.pro-Photo').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.academic-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.athletics-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.expriences-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.references-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.guardian-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$("#team").addClass("active");
	$("#account-photo").removeClass("active");
	$("#contact").removeClass("active");
	$("#account").removeClass("active");
	$("#academics").removeClass("active");
	$("#athletics").removeClass("active");
	$("#exprience").removeClass("active");
	$("#reference").removeClass("active");
	$("#guardian").removeClass("active");
	 
});

 $("#progressbar").on("click", "#academics", function(event){
	// console.log('clicked');
	$('.academic-Info').css({'display':'block', 'position' : 'relative', 'opacity' : '1'});
	$('.pro-Photo').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.pro-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.contact-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
		$('.team-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.athletics-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.expriences-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.references-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.guardian-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$("#academics").addClass("active");
	$("#account-photo").removeClass("active");
	$("#team").removeClass("active");
	$("#athletics").removeClass("active");
	$("#exprience").removeClass("active");
	$("#reference").removeClass("active");
	$("#guardian").removeClass("active");
	$("#account").removeClass("active");
 });
 
  $("#progressbar").on("click", "#athletics", function(event){
	// console.log('clicked');
	$('.athletics-Info').css({'display':'block', 'position' : 'relative', 'opacity' : '1'});
	$('.academic-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.pro-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.contact-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.team-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.pro-Photo').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.expriences-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.references-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.guardian-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$("#athletics").addClass("active");
	$("#account-photo").removeClass("active");
	$("#team").removeClass("active");
	$("#exprience").removeClass("active");
	$("#reference").removeClass("active");
	$("#guardian").removeClass("active");
	$("#academics").removeClass("active");
	$("#account").removeClass("active");
 });
 
  $("#progressbar").on("click", "#exprience", function(event){
	// console.log('clicked');
	$('.expriences-Info').css({'display':'block', 'position' : 'relative', 'opacity' : '1'});
	$('.athletics-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.academic-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.pro-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.contact-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.team-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.pro-Photo').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.references-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.guardian-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$("#exprience").addClass("active");
	$("#account-photo").removeClass("active");
	$("#team").removeClass("active");
	$("#reference").removeClass("active");
	$("#guardian").removeClass("active");
	$("#athletics").removeClass("active");
	$("#academics").removeClass("active");
	$("#account").removeClass("active");
 });
 
  $("#progressbar").on("click", "#reference", function(event){
	// console.log('clicked');
	$('.references-Info').css({'display':'block', 'position' : 'relative', 'opacity' : '1'});
	$('.guardian-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.expriences-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.athletics-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.academic-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.pro-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.contact-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.team-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.pro-Photo').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$("#reference").addClass("active");
	$("#account-photo").removeClass("active");
	$("#team").removeClass("active");
	$("#guardian").removeClass("active");
	$("#exprience").removeClass("active");
	$("#athletics").removeClass("active");
	$("#academics").removeClass("active");
	$("#account").removeClass("active");
});

$("#progressbar").on("click", "#guardian", function(event){
	// console.log('clicked');
	$('.guardian-Info').css({'display':'block', 'position' : 'relative', 'opacity' : '1'});
	$('.references-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.expriences-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.athletics-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.academic-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.pro-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.contact-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.team-Info').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$('.pro-Photo').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
	$("#guardian").addClass("active");
	$("#account-photo").removeClass("active");
	$("#team").removeClass("active");
	$("#reference").removeClass("active");
	$("#exprience").removeClass("active");
	$("#athletics").removeClass("active");
	$("#academics").removeClass("active");
	$("#account").removeClass("active");
});
</script>

<script>

$(document).ready(function(){

	var $modal = $('#modal');

	var image = document.getElementById('sample_image');

	var cropper;

	$('#profile_image').change(function(event){
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
						$('#Profile-Img img').attr('src', '<?php echo base_url(); ?>uploads/profile_image/' + data);
						
						$('#profileImg').val(data);
					}
				});
			};
		});
	});
	
});

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
						//$('#Cover-Image img').attr('src', '<?php echo base_url(); ?>uploads/cover_image/' + data);
						
						$('#coverImg').val(data);
					}
				});
			};
		});
	});
	
});

$(document).ready(function(){
	var $modal = $('#modal_teamImg');
	var image = document.getElementById('teamImage');
	var cropper;
	$('#team_image').change(function(event){
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
			preview:'.preview2'
		});
	}).on('hidden.bs.modal', function(){
		cropper.destroy();
   		cropper = null;
	});

	$('#crop_team_image').click(function(){
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
					url:'<?php echo base_url("admin/users/cropTeamimage")?>',
					method:'POST',
					data:{image:base64data},
					success:function(data)
					{
						$modal.modal('hide');
						console.log(data)
						
						//$('#blah').attr('src', '<?php echo base_url()?>'+data+'');
						$('#teamProfile-Img img').attr('src', '<?php echo base_url(); ?>uploads/team_image/' + data);
						
						$('#teamImg').val(data);
					}
				});
			};
		});
	});
	
});


$(document).ready(function(){
	var $modal = $('#modal_coverteamImg');
	var image = document.getElementById('coverteamImage');
	var cropper;
	$('#teamcover_image').change(function(event){
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
			viewMode: 1,
			aspectRatio: 50 /20,
            minCanvasWidth: 100,
            minCanvasHeight: 100,
            minCropBoxWidth: 100,
            minCropBoxHeight: 100,
			preview:'.preview2'
		});
	}).on('hidden.bs.modal', function(){
		cropper.destroy();
   		cropper = null;
	});

	$('#cropcover_team_image').click(function(){
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
					url:'<?php echo base_url("admin/users/cropTeamimage")?>',
					method:'POST',
					data:{image:base64data},
					success:function(data)
					{
						$modal.modal('hide');
						console.log(data)
						
						//$('#blah').attr('src', '<?php echo base_url()?>'+data+'');
						$('#teamCover-Img img').attr('src', '<?php echo base_url(); ?>uploads/team_image/' + data);
						
						$('#teamcoverImg').val(data);
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
function teamimg_closeModal(){
	$('#modal_teamImg').modal('hide');
}
function coverimg_closeModal(){
	$('#modal_coverteamImg').modal('hide');
}
</script>