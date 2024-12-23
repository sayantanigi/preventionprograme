<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>    
<link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" />
<link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet"/>
<script src="https://unpkg.com/dropzone"></script>
<script src="https://unpkg.com/cropperjs"></script>
<link href='<?php echo base_url(); ?>assets/chosen/chosen.min.css' rel='stylesheet' type='text/css'>
<script src='<?php echo base_url(); ?>assets/chosen/chosen.jquery.min.js' type='text/javascript'></script>
<style>
small > p{
  color:red;
}
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
.chosen-single{
	height: 38px !important;
	/* padding: 6px;*/
	background: white !important;
	/* border: 1px solid white; */
	border: 1px solid #ced4da !important;
	padding: 0.375rem 0.75rem !important;
	font-size: 1rem !important;
	font-weight: 400 !important;
}

.chosen-choices{
	height: 38px !important;
	/* padding: 6px;*/
	background: white !important;
	/* border: 1px solid white; */
	border: 1px solid #ced4da !important;
	padding: 0.375rem 0.75rem !important;
	font-size: 1rem !important;
	font-weight: 400 !important;
	border-radius: 5px !important;
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
                                <label class="fw-semibold  text-black">Tournament Name</label>
                                <input type="text" class="form-control" name="tournament_name"  id="tournament_name"  autocomplete="off" value="<?=@$tournament->tournament_name?>">
                            </div>
							<small id="game_name_error"></small>
							
							<div class="form-group mb-2">
                                <label class="fw-semibold  text-black">Tournament Description</label>
                                <textarea type="text" class="form-control editor summermote" name="tournament_description"  id="tournament_description"  autocomplete="off"><?=@$tournament->tournament_name?></textarea>
                            </div>
							<small id="game_description_error"></small>
							
							<!--<div class="form-group mb-2">
                                <label class="fw-semibold  text-black">Game Type</label>
                                <select class="form-control" name="game_type"  id="game_type">
                                    <option value="">Select Type</option>
                                    <option value="One to One">One to One</option>
                                    <option value="Tournament">Tournament</option>
                                </select>
                            </div>
							<small id="game_type_error"></small>-->
							
							<div class="form-group mb-2" >
                                <label class="fw-semibold  text-black">No. of Participant Teams</label>
								<input type="number" class="form-control" name="no_teams"  id="no_teams" autocomplete="off" value="<?=@$tournament->no_participant_teams?>">
                            </div>
							<small id="no_teams_error"></small>
							
							<div class="form-group mb-2" id="" >
                                <label class="fw-semibold  text-black">Tournament Start Date</label>
								<input type="date" class="form-control" name="t_startdate"  id="t_startdate" autocomplete="off" value="<?php echo !empty($tournament->tournament_start_date) ? strftime('%Y-%m-%d',strtotime($tournament->tournament_start_date)) : ''; ?>">
                            </div>
							<small id="t_startdate_error"></small>
							
							<div class="form-group mb-2" id="tournament_end_date" >
                                <label class="fw-semibold  text-black">Tournament End Date</label>
								<input type="date" class="form-control" name="t_enddate"  id="t_enddate" autocomplete="off" value="<?php echo !empty($tournament->tournament_end_date) ? strftime('%Y-%m-%d',strtotime($tournament->tournament_end_date)) : ''; ?>">
                            </div>
							<small id="t_enddate_error"></small>
							
							<?php
								$selectedSportId= array();
								$exSportId = explode(',', $tournament->sport_id);
								foreach ($exSportId as $sportId){
								$selectedSportId[]= $sportId;
								}
								//print_r($selectedSportId);
							?>
							
							<div class="form-group mb-2" >
                                <label class="fw-semibold  text-black">Sport</label>
                                <select class="form-control" name="multiplesport[]"  id="multiplesport" multiple data-placeholder="Select Sport" >
                                   <option value="">Select Sport</option>
									<?php if (is_array($sportslist) || is_object($sportslist)) { ?>
									   <?php foreach ($sportslist as $key => $v): ?>
									        <option value="<?php echo @$v->id; ?>" <?php echo (in_array($v->id, $selectedSportId) ? 'selected' : '') ;?>><?php echo @$v->sports_name; ?></option>
									   <?php endforeach ?>
									<?php } ?>
                                </select>
                            </div>
							<small id="multiplesport_error"></small>
							
							<div class="form-group mb-2">
                                <label class="fw-semibold  text-black">Organizer</label>
                                  <select class="form-control" name="organizer"  id="organizer" >
									<option value="">Select Organizer</option>
									<?php if (is_array($organiser) || is_object($organiser)) { ?>
									<?php foreach ($organiser as $key => $v): ?>
									    <option value="<?php echo @$v->id; ?>" <?php echo (@$tournament->organizer_id == @$v->id) ? 'selected' : '' ; ?>><?php echo @$v->first_name; ?> <?php echo @$v->last_name; ?></option>
									<?php endforeach ?>
									<?php } ?>
                                </select>
                            </div>
							<small id="organizer_error"></small>
							
							<div class="form-group mb-2">
                                <label class="fw-semibold  text-black">Venue</label>
								<input type="text" class="form-control" name="address"  id="autocomplete" autocomplete="off" value="<?php echo @$tournament->venue; ?>">
                            </div>
							<small id="venue_error"></small>
							
							<div class="form-group mb-2 files">
                                <label class="fw-semibold  text-black">Image</label>
                                <input type="file" class="form-control" name="upload_image"  id="upload_image" >
                                <input type="hidden" class="form-control" name="tournamentImg"  id="tournamentImg" >
                            </div>
							<input type="hidden" class="form-control" name="id"  id="id" value="<?php echo @$tournament->id; ?>">
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

 <script>
$(document).ready(function(){
	$("#submitform").on('submit', function(e){
		e.preventDefault();
		
		var gameType = $('#game_type').val();
		if(gameType == 'Tournament'){
			var noTeams = $('#no_teams').val();
			if(noTeams == ''){
				$('#noTeams').html("Please enter no. of participant teams");
				return false;
			}else{
				$('#noTeams').html("");
				
			}
			
			var t_startdate = $('#t_startdate').val();
			if(t_startdate == ''){
				$('#Tstartdate').html("Please select tournament start date.");
				return false;
			}else{
				$('#Tstartdate').html("");
				
			}
			
			var t_enddate = $('#t_enddate').val();
			if(t_enddate == ''){
				$('#Tenddate').html("Please select tournament end date.");
				return false;
			}else{
				$('#Tenddate').html("");
					
			}
		}
		
		$.ajax({
		type: 'POST',
		url: '<?php echo base_url('admin/tournament/editTournament'); ?>',
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
				if(data.game_name_error != ''){
					$('#game_name_error').html(data.game_name_error);
				}else{
					$('#game_name_error').html('');
				}
				
				if(data.game_description_error != ''){
					$('#game_description_error').html(data.game_description_error);
				}else{
					$('#game_description_error').html('');
				}
				
				if(data.game_type_error != ''){
					$('#game_type_error').html(data.game_type_error);
				}else{
					$('#game_type_error').html('');
				}
				
				if(data.sport_error != ''){
					$('#sport_error').html(data.sport_error);
				}else{
					$('#sport_error').html('');
				}
				
				if(data.organizer_error != ''){
					$('#organizer_error').html(data.organizer_error);
				}else{
					$('#organizer_error').html('');
				}
				
				if(data.venue_error != ''){
					$('#venue_error').html(data.venue_error);
				}else{
					$('#venue_error').html('');
				}
				
				if(data.multiplesport_error != ''){
					$('#multiplesport_error').html(data.multiplesport_error);
				}else{
					$('#multiplesport_error').html('');
				}
				
				if(data.no_teams_error != ''){
					$('#no_teams_error').html(data.no_teams_error);
				}else{
					$('#no_teams_error').html('');
				}
				
				if(data.t_startdate_error != ''){
					$('#t_startdate_error').html(data.t_startdate_error);
				}else{
					$('#t_startdate_error').html('');
				}
				
				if(data.t_enddate_error != ''){
					$('#t_enddate_error').html(data.t_enddate_error);
				}else{
					$('#t_enddate_error').html('');
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
	// $(document).on('change','#sport',function(e){
        // var sport = $(this).val();
		
       // $.ajax({
		// type: 'POST',
		// url: '<?php echo base_url('admin/users/getSport_byId'); ?>',
		// data: {sportId : sport},
		// success: function(data){
			// $("#coach_sport").text(data);
		// }
		// });
        
    // });
	
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
					url:'<?php echo base_url("admin/games/cropImage")?>',
					method:'POST',
					data:{image:base64data},
					success:function(data)
					{
						$modal.modal('hide');
						console.log(data)
						
						//$('#blah').attr('src', '<?php echo base_url()?>'+data+'');
						//$('#item img').attr('src', '<?php echo base_url(); ?>uploads/games/' + data);
						
						$('#tournamentImg').val(data);
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

// $(document).ready(function(){
// // $('#sport').change(function(){
	// // var sport_id = $('#sport').val();
	// // if(sport_id != '')
	// // {
		// // $.ajax({
			// // url:"<?php echo base_url(); ?>admin/games/getrganiser_bysport",
			// // method:"POST",
			// // data:{sport_id:sport_id},
			// // success:function(data)
			// // {
				// // $('#organizer').html(data);
			// // }
		// // });
	// // }
	// // else
	// // {
		// // $('#organizer').html('<option value="">Select Organizer</option>');
	// // }
// // });
 // $('#organizer').chosen({allow_single_deselect:true,width:'100%'});
// });



$(document).ready(function(){
	$('#game_type').change(function() {
	var parti_teams = $('#game_type').val();
	console.log(parti_teams);
	if(parti_teams == 'Tournament'){
		
		$('#participant_teams').css('display', 'block');
		$('#tournament_start_date').css('display', 'block');
		$('#tournament_end_date').css('display', 'block');
		$('#multiple_sports').css('display', 'block');
		$('#single_sports').css('display', 'none');
	}else{
		
		$('#participant_teams').css('display', 'none'); 
		$('#tournament_start_date').css('display', 'none');
		$('#tournament_end_date').css('display', 'none');
		$('#multiple_sports').css('display', 'none');
		$('#single_sports').css('display', 'block');
	}
	
});
$('#multiplesport').chosen({max_selected_options:5,width:'100%'});

});
</script>