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
.chosen-single{
	height: 39px !important;
	padding: 7px !important;
	color: black !important;
	font-size: 15px !important;
	background: #fff !important;
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
.chosen-choices{
	display: block !important;
    width: 100% !important;
    padding: 0.375rem 0.75rem !important;
    font-size: 14px !important;
    font-weight: 400 !important;
    line-height: 1.5 !important;
    color: #212529 !important;
    background-color: #fff !important;
    background-clip: padding-box !important;
    border: 1px solid #ced4da !important;
	border-radius: 6px !important;
	height:37px !important;
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
                                <label class="fw-semibold  text-black">Organizer</label>
                                <input type="text" class="form-control" name="orgname"  id="orgname" autocomplete="off" value="<?=@$org[0]->first_name?> <?=@$org[0]->last_name?>">
								 <input type="hidden" class="form-control" name="orgid"  id="orgid" autocomplete="off" value="<?=@$org[0]->id?>">
                            </div>
							<small id="orgname_error"></small>
							
							<?php
								if(!empty(@$opponentTeam)){
									$exOpponent = explode(',',@$opponentTeam->receiver_team);
									foreach($exOpponent as $opp){
										@$newOpp[] = @$opp;
									}
								}
							?>
							<div class="form-group mb-2">
                                <label class="fw-semibold  text-black">Select Opponent </label>
								<select id='opponent' data-placeholder="Select Opponent" name="opponent[]" id="opponent"  multiple>
								<option value=""></option>
								<?php if (is_array($opponent) || is_object($opponent)) {
								foreach($opponent as $value): ?>
								<option value="<?=!empty($value->id) ? $value->id : ''; ?>" <?php echo (@in_array(@$value->id, @$newOpp) ? 'selected' : '')?>><?=!empty($value->team_name) ? $value->team_name : ''; ?>(<?=!empty($value->first_name) ? $value->first_name : ''; ?> <?=!empty($value->last_name) ? $value->last_name : ''; ?>)</option>
								<?php endforeach; }?>
								</select>
                            </div>
							
							<small id="opponent_error"></small>
                            <div class="form-group mt-3 mb-2">
                                <button class="btn btn-success text-uppercase px-5 shadow">Send Invitation</button>
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
											<div class="mt-3"> <label class="tx-11 font-weight-bold mb-0 "><h6>Organizer</h6></label><p class="text-muted" id="orgName"><?=@$org[0]->first_name?> <?=@$org[0]->last_name?></p></div>
											<div class="mt-3"> <label class="tx-11 font-weight-bold mb-0 "><h6>Opponent</h6></label></div>
											<?php
											 if(!empty(@$newOpp)){
												foreach(@$newOpp as $key=>$value){
													$teamInfo = $this->db->query("select first_name, last_name, team_name from users where id = ".$value."")->row();
													?>
													  <p class="text-muted" id=""><?=!empty($teamInfo->team_name) ? $teamInfo->team_name : ''; ?>(<?=!empty($teamInfo->first_name) ? $teamInfo->first_name : ''; ?> <?=!empty($teamInfo->last_name) ? $teamInfo->last_name : ''; ?>)</p>
													<?php 
												}
											}
											?>
											
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

<link href='<?php echo base_url('assets/chosen/chosen.min.css'); ?>' rel='stylesheet' type='text/css'>
<script src='<?php echo base_url('assets/chosen/chosen.jquery.min.js'); ?>' type='text/javascript'></script>
<script>
$(document).ready(function(){
	$("#submitform").on('submit', function(e){
		e.preventDefault();
		var form_data = new FormData(); 	
		//var profile_image = $("#upload_image").prop("files")[0]; 
		
		var orgname = $('#orgname').val(); 
		var orgid = $('#orgid').val(); 
		var opponent = $('#opponent').val(); 
		// var totalOpponent = document.getElementById('opponent').length;
        // for (var index = 0; index < totalOpponent; index++) {
			// form_data.append("opponent[]", document.getElementById('opponent').index); 
		// }
		form_data.append("orgname", orgname);
		form_data.append("orgid", orgid);
		form_data.append("opponent[]", opponent);
		
		$.ajax({
		type: 'POST',
		url: '<?php echo base_url('admin/tournament/sendInvite'); ?>',
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
			if(data.vali_error == 1){
				if(data.orgname_error != ''){
					$('#orgname_error').html(data.orgname_error);
				}else{
					$('#orgname_error').html('');
				}
				
				if(data.orgid_error != ''){
					$('#orgid_error').html(data.orgid_error);
				}else{
					$('#orgid_error').html('');
				}
				
				if(data.opponent_error != ''){
					$('#opponent_error').html(data.opponent_error);
				}else{
					$('#opponent_error').html('');
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
	
	
	$(document).on('change','#opponent',function(e){
        var user_id = $(this).val();
		
       $.ajax({
		type: 'POST',
		url: '<?php echo base_url('admin/games/get_teamName'); ?>',
		data: {user_id : user_id},
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
//$('#opponent').chosen({allow_single_deselect:true,width:'100%'});	
$('#opponent').chosen({max_selected_options:5,width:'100%'});
});
</script>
