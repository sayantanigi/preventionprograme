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
                                <h2 id="heading">Add Profile</h2>
                                <p>Fill all form field to go to next step</p>
                                <form id="msform" action="" method="POST" enctype="multipart/form-data" >
                                    <!-- progressbar -->
                                    <ul id="progressbar">
                                        <li class="active" id="account">
                                            <div class="progressIcon"><i class="fa fa-user"></i></div>
                                            <strong>Profile</strong>
                                        </li>
                                        <li id="academics">
                                            <div class="progressIcon"><i class="fa fa-graduation-cap"></i></div>
                                            <strong>Academics</strong>
                                        </li>
                                        <li id="athletics">
                                            <div class="progressIcon"><i class="fa fa-futbol"></i></div>
                                            <strong>Athletics</strong>
                                        </li>
                                        <li id="exprience">
                                            <div class="progressIcon"><i class="fa fa-briefcase"></i></div>
                                            <strong>Exprience</strong>
                                        </li>
                                        <li id="reference">
                                            <div class="progressIcon"><i class="fa fa-bullhorn"></i></div>
                                            <strong>Reference</strong>
                                        </li>
                                    </ul>
                                    
                                    <fieldset id="step_1">
                                        <div class="form-card">
                                            <div class=" pt-3">
                                                <h3 class="text-uppercase text-center h4 fw-bold mb-3">Profile Info</h3>
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
													
                                                    <div class="mb-2 col-lg-12">
                                                        <label>Designation</label>
                                                        <input type="text" class="form-control" name="pro_designation" id="pro_designation" value="<?php echo !empty($profile->designation) ? $profile->designation : ''; ?>">
														<span id="error_designation" class="text-danger"></span>
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
                                                        <label>Address</label>
                                                        <input type="text" class="form-control" name="address" id="autocomplete" value="<?php echo !empty($profile->address) ? $profile->address : ''; ?>">
														<input type="hidden" placeholder="Near"  name="latitude" id="latitude" value="<?php echo !empty($profile->latitude) ? $profile->latitude : ''; ?>">
														<input type="hidden" placeholder="Near" name="longitude" id="longitude" value="<?php echo !empty($profile->longitude) ? $profile->longitude : ''; ?>">
														<span id="error_address" class="text-danger"></span>
                                                    </div> 
													 <div class="mb-2 col-lg-6">
                                                        <label>Country</label>
                                                        <!--<input type="text" class="form-control" name="country" id="country">-->
														<select  class="form-control" name="country" id="country">
															<option value="">Select Country</option>
															<?php if (is_array($countrylist) || is_object($countrylist)) {
															foreach($countrylist as $c): ?>
																<option value="<?php echo !empty($c->country_id) ? $c->country_id : ''; ?>" <?php echo ($c->country_id == $profile->country) ? 'selected' : ''; ?>><?php echo !empty($c->country_name) ? $c->country_name : ''; ?></option>
															<?php endforeach; } ?> 
														</select>
														<span id="error_country" class="text-danger"></span>
                                                    </div> 
													<div class="mb-2 col-lg-6">
                                                        <label>State</label>
                                                        <!--<input type="text" class="form-control" name="state" id="state">-->
														<select class="form-control" id="state" name="state">
														    <option value="">Select State</option>
															<?php if (is_array($statelist) || is_object($statelist)) {
															foreach($statelist as $c): ?>
																<option value="<?php echo !empty($c->state_id) ? $c->state_id : ''; ?>" <?php echo ($c->state_id == $profile->state) ? 'selected' : ''; ?>><?php echo !empty($c->state_name) ? $c->state_name : ''; ?></option>
															<?php endforeach; } ?> 
														</select>
														<span id="error_state" class="text-danger"></span>
                                                    </div>
                                                    <div class="mb-2 col-lg-6">
                                                        <label>City</label>
                                                        <!--<input type="text" class="form-control" name="city" id="city">-->
														<select class="form-control" name="city" id="city">
														    <option value="">Select City</option>
															<?php if (is_array($citylist) || is_object($citylist)) {
															foreach($citylist as $c): ?>
																<option value="<?php echo !empty($c->city_id) ? $c->city_id : ''; ?>" <?php echo ($c->city_id == $profile->city) ? 'selected' : ''; ?>><?php echo !empty($c->city_name) ? $c->city_name : ''; ?></option>
															<?php endforeach; } ?>
														</select>
														<span id="error_city" class="text-danger"></span>
                                                    </div> 
                                                     
                                                   
                                                    <div class="mb-2 col-lg-6">
                                                        <label>Pin Code</label>
                                                        <input type="text" class="form-control" name="pincode" id="pincode" value="<?php echo !empty($profile->pincode) ? $profile->pincode : ''; ?>">
														<span id="error_pincode" class="text-danger"></span>
                                                    </div> 
                                                    <div class="mb-2 col-lg-12">
                                                        <label>Profile Bio</label>
                                                        <textarea class="form-control" name="profile_bio" id="profile_bio"><?php echo !empty($profile->bio) ? $profile->bio : ''; ?></textarea>
														<span id="error_profile_bio" class="text-danger"></span>
                                                    </div> 
                                                </div>
                                                
                                            </div>
                                        </div> 
                                        <input type="button" name="next" class="next action-button" value="Next" id="first-next-button" />
                                    </fieldset>
                                    <fieldset id="step_2">
                                        <div class="form-card">
                                           <div class=" pt-3">
                                                <h3 class="text-uppercase text-center h4 fw-bold mb-3">Academics Info</h3>
                                                <div class="row">
                                                    <div class="mb-2 col-lg-6">
                                                        <label>School / College Name</label>
                                                        <input type="text" class="form-control" name="college" id="college" value="<?php echo !empty($academics->college) ? $academics->college : ''; ?>">
														<span id="error_college" class="text-danger"></span>
                                                    </div> 
                                                    <div class="mb-2 col-lg-6">
                                                        <label>Course Name</label>
                                                        <input type="text" class="form-control" name="course" id="course" value="<?php echo !empty($academics->course) ? $academics->course : ''; ?>">
														<span id="error_course" class="text-danger"></span>
                                                    </div> 
                                                    <div class="mb-2 col-lg-6">
                                                        <label>Rank</label>
                                                        <input type="text" class="form-control" name="rank" id="rank" value="<?php echo !empty($academics->rank) ? $academics->rank : ''; ?>">
														<span id="error_rank" class="text-danger"></span>
                                                    </div>
                                                    <div class="mb-2 col-lg-6">
                                                        <label>Year of Passing</label>
                                                        <input type="text" class="form-control" name="passing_year" id="passing_year" value="<?php echo !empty($academics->passing_year) ? $academics->passing_year : ''; ?>">
														<span id="error_passing_year" class="text-danger"></span>
                                                    </div>
													<div class="mb-2 col-lg-12">
                                                        <label>Achievement</label>
                                                        <input type="text" class="form-control" name="achievement" id="achievement" value="<?php echo !empty($academics->achievement) ? $academics->achievement : ''; ?>">
														<span id="error_achievement" class="text-danger"></span>
                                                    </div>
                                                </div>
                                                <!--<div class="my-3 text-center">
                                                    <a href="#" class="btn btn-secondary rounded-0 fw-bold">Add More </a>
                                                </div>-->
                                            </div>
                                        </div> 
                                        <input type="button" name="next" class="next action-button" value="Next" id="second-next-button"/> 
                                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                    </fieldset>
                                    <fieldset id="step_3">
                                        <div class="form-card">
                                            <div class=" pt-3">
                                                <h3 class="text-uppercase text-center h4 fw-bold mb-3">Athletics Info</h3>
                                                <div class="row">
                                                    <div class="mb-2 col-lg-4">
                                                        <label>Height</label>
                                                        <input type="text" class="form-control" name="height" id="height" value="<?php echo !empty($athletics->height) ? $athletics->height : ''; ?>">
														<span id="error_height" class="text-danger"></span>
                                                    </div> 
                                                    <div class="mb-2 col-lg-4">
                                                        <label>Weight</label>
                                                        <input type="text" class="form-control" name="weight" id="weight" value="<?php echo !empty($athletics->weight) ? $athletics->weight : ''; ?>">
														<span id="error_weight" class="text-danger"></span>
                                                    </div> 
                                                    <div class="mb-2 col-lg-4">
                                                        <label>Footed</label>
                                                        <select class="form-control form-select" name="footed" id="footed">
                                                            <option value="">Select</option>
                                                            <option value="Left" <?php echo (@$athletics->Footed == 'Left') ? 'selected' : ''; ?>>Left</option>
                                                            <option value="Right" <?php echo (@$athletics->Footed == 'Right') ? 'selected' : ''; ?>>Right</option>
                                                        </select>
														<span id="error_footed" class="text-danger"></span>
                                                    </div>
                                                    <div class="mb-2 col-lg-12">
                                                        <label>Strength</label>
                                                        <textarea class="form-control" name="strength" id="strength"><?php echo !empty($athletics->strength) ? $athletics->strength : ''; ?></textarea>
														<span id="error_strength" class="text-danger"></span>
                                                    </div>
                                                    <div class="mb-2 col-lg-6">
                                                        <label>High School Team</label>
                                                        <input type="text" class="form-control" name="school_team" id="school_team" value="<?php echo !empty($athletics->school_team) ? $athletics->school_team : ''; ?>">
														<span id="error_school_team" class="text-danger"></span>
                                                    </div>
                                                    <div class="mb-2 col-lg-6">
                                                        <label>Club Team</label>
                                                        <input type="text" class="form-control" name="club_team" id="club_team" value="<?php echo !empty($athletics->club_team) ? $athletics->club_team : ''; ?>">
														<span id="error_club_team" class="text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                        <input type="button" name="next" class="next action-button" value="Next" id="third-next-button"/> 
                                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                    </fieldset>
                                    <fieldset id="step_4" class="step_4">
                                        <div class="form-card">
                                            <div class=" pt-3">
                                                <h3 class="text-uppercase text-center h4 fw-bold mb-3">Exprience Info</h3>
                                                <div class="row">
                                                    <div class="mb-2 col-lg-6">
                                                        <label>Club Name</label>
                                                        <input type="text" class="form-control" name="club_name" id="club_name" value="<?php echo !empty($exprience->club_name) ? $exprience->club_name : ''; ?>">
														<span id="error_club_name" class="text-danger"></span>
                                                    </div> 
                                                    <div class="mb-2 col-lg-6">
                                                        <label>Designation</label>
                                                        <input type="text" class="form-control" name="club_designation" id="club_designation" value="<?php echo !empty($exprience->designation) ? date('m/d/Y', strtotime($exprience->designation)) : ''; ?>">
														<span id="error_club_designation" class="text-danger"></span>
                                                    </div> 
                                                    <div class="mb-2 col-lg-6">
                                                        <label>Start Date</label>
                                                        <input type="date" class="form-control" name="start_date" id="start_date" value="<?php echo !empty($exprience->start_date) ? strftime('%Y-%m-%d',strtotime(@$exprience->start_date)) : ''; ?>">
														<span id="error_start_date" class="text-danger"></span>
                                                    </div> 
                                                    <div class="mb-2 col-lg-6">
                                                        <label>End Date</label>
                                                        <input type="date" class="form-control" name="end_date" id="end_date" value="<?php echo !empty($exprience->end_date) ? strftime('%Y-%m-%d',strtotime(@$exprience->end_date)) : ''; ?>">
														<span id="error_end_date" class="text-danger"></span>
                                                    </div>
                                                    <div class="mb-2 col-lg-12">
                                                        <label>Information</label>
                                                        <textarea class="form-control" name="information" id="information"><?php echo !empty($exprience->information) ? $exprience->information : ''; ?></textarea>
														<span id="error_information" class="text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="button" name="next" class="next action-button" value="Next" id="four-next-button"/> 
                                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                    </fieldset>
                                    <fieldset id="step_5">
                                        <div class="form-card">
                                            <div class="pt-3">
                                                <h3 class="text-uppercase text-center h4 fw-bold mb-3">Reference Info</h3>
                                                <div class="row">
                                                    <div class="mb-2 col-lg-6">
                                                        <label>Coach Name</label>
                                                        <input type="text" class="form-control" name="coach_name" id="coach_name" value="<?php echo !empty($reference->coach_name) ? $reference->coach_name : ''; ?>">
														<span id="error_coach_name" class="text-danger"></span>
                                                    </div> 
                                                    <div class="mb-2 col-lg-6">
                                                        <label>Coach Email</label>
                                                        <input type="email" class="form-control" name="coach_email" id="coach_email" value="<?php echo !empty($reference->coach_email) ? $reference->coach_email : ''; ?>">
															<span id="error_coach_email" class="text-danger"></span>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
										 <input type="hidden" name="userId" id="userId" value="<?php echo !empty($profile->id) ? $profile->id : ''; ?>" /> 
                                        <input type="submit" name="next" class="next action-button" value="Submit" /> 
                                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
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
 <script>
 $(document).ready(function(){
	// var editstart_date = "<?php echo !empty($exprience->start_date) ? date('m/d/Y', strtotime($exprience->start_date)) : ''; ?>";
	// $(".step_4 #start_date").val(editstart_date);
	$('#first-next-button').click(function(){
		var mobile_validation = /^\d{10}$/;
		var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		var error_fname = '';
		var error_lname = '';
		var error_designation = '';
		var error_email = '';
		var error_phone = '';
		var error_address = '';
		var error_city = '';
		var error_country = '';
		var error_state = '';
		var error_profile_bio = '';
		var error_pincode = '';
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
		
		if($.trim($('#pro_designation').val()).length == 0){
			error_designation = 'Please enter your designation';
			$('#error_designation').text(error_designation);
			$('#pro_designation').addClass('has-error');
		}
		else
		{
			error_designation = '';
			$('#error_designation').text(error_designation);
			$('#pro_designation').removeClass('has-error');
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
		
		if(error_fname != '' || error_lname != '' || error_designation != '' || error_email != '' || error_phone != '' || error_address != '' || error_city != '' || error_state !='' || error_country != '' || error_pincode != '' || error_profile_bio != ''){
			//$(".step-1").removeAttr("style");
            //$(".step-1").css({ 'color' : ''});

			$('#step_1').css({'display':'block', 'position' : 'relative', 'opacity' : '1'});
			$('#step_2').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
			//$('#step_2').css({'display':'none'});
			//alert('hi');
			// $(".btn-success").removeAttr('disabled');
			// $("#list_personal_details").addClass("disabled");
			return false;
		}else{
			$('#step_1').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
			$('#step_2').css({'display':'block', 'position' : 'relative', 'opacity' : '1'});
			$("#academics").addClass("active");
		}
	});
	$('#second-next-button').click(function(){
		var error_college = '';
		var error_course = '';
		var error_passing_year = '';
		var error_achievement = '';
		
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
		
		if($.trim($('#passing_year').val()).length == 0){
			error_passing_year = 'Please enter passing year';
			$('#error_passing_year').text(error_passing_year);
			$('#passing_year').addClass('has-error');
		}
		else
		{
			error_passing_year = '';
			$('#error_passing_year').text(error_passing_year);
			$('#passing_year').removeClass('has-error');
		}
		
		if($.trim($('#achievement').val()).length == 0){
			error_achievement = 'Please enter achievement';
			$('#error_achievement').text(error_achievement);
			$('#achievement').addClass('has-error');
		}
		else
		{
			error_achievement = '';
			$('#error_achievement').text(error_achievement);
			$('#achievement').removeClass('has-error');
		}
		
		
		if(error_college != '' || error_course != '' || error_rank != '' || error_achievement != ''){
			$('#step_2').css({'display':'block', 'position' : 'relative', 'opacity' : '1'});
			$('#step_1').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
			
			//$('#step_2').css({'display':'none'});
			//alert('hi');
			// $(".btn-success").removeAttr('disabled');
			// $("#list_personal_details").addClass("disabled");
			return false;
		}else{
			$('#step_3').css({'display':'block', 'position' : 'relative', 'opacity' : '1'});
			$('#step_1').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
			$('#step_2').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
			
			$("#athletics").addClass("active");
		}
		
	});
	
	$('#third-next-button').click(function(){
		var error_height = '';
		var error_weight = '';
		var error_footed = '';
		var error_strength = '';
		var error_school_team = '';
		var error_club_team = '';
		
		if($.trim($('#height').val()).length == 0){
			error_height = 'Please enter your height';
			$('#error_height').text(error_height);
			$('#height').addClass('has-error');
		}
		else
		{
			error_height = '';
			$('#error_height').text(error_height);
			$('#height').removeClass('has-error');
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
		
		if(error_height != '' || error_weight != '' || error_footed != '' || error_strength != '' || error_school_team != '' || error_club_team != ''){
			$('#step_3').css({'display':'block', 'position' : 'relative', 'opacity' : '1'});
			$('#step_2').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
			$('#step_1').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
			
			//$('#step_2').css({'display':'none'});
			//alert('hi');
			// $(".btn-success").removeAttr('disabled');
			// $("#list_personal_details").addClass("disabled");
			return false;
		}else{
			$('#step_4').css({'display':'block', 'position' : 'relative', 'opacity' : '1'});
			$('#step_1').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
			$('#step_2').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
			$('#step_3').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
			
			$("#exprience").addClass("active");
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
		
		
		
		if(error_club_name != '' || error_club_designation != '' || error_start_date != '' || error_end_date != '' ){
			$('#step_4').css({'display':'block', 'position' : 'relative', 'opacity' : '1'});
			$('#step_3').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
			$('#step_2').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
			$('#step_1').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
			
			//$('#step_2').css({'display':'none'});
			//alert('hi');
			// $(".btn-success").removeAttr('disabled');
			// $("#list_personal_details").addClass("disabled");
			return false;
		}else{
			$('#step_5').css({'display':'block', 'position' : 'relative', 'opacity' : '1'});
			$('#step_4').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
			$('#step_1').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
			$('#step_2').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
			$('#step_3').css({'display':'none', 'position' : 'relative', 'opacity' : '0'});
			
			$("#reference").addClass("active");
		}
		
	});
	
	$("#msform").submit(function (event) {
 
		var  coach_name  = $('#coach_name').val(); 
		var  coach_email  = $('#coach_email').val(); 
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
		
		if($.trim($('#coach_email').val()).length == 0)
		{
			error_coach_email = 'please enter coach email';
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
		if(error_coach_name != '' || error_coach_email != '' ){
			return false;
		}

		event.preventDefault();
		$.ajax({
		type: 'POST',
		url: '<?php echo base_url('admin/users/addUserprofile');?>',
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
	
</script>	