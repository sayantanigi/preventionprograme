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
                                <label class="fw-semibold  text-black">Subscription Name</label>
                                <input type="text" class="form-control" name="pck_name"  id="pck_name"  autocomplete="off" value="<?=@$pcklist->name;?>">
                                <input type="hidden" class="form-control" name="pck_id"  id="pck_id"  autocomplete="off" value="<?=@$pcklist->id;?>">
                            </div>
							<small id="pck_name_error"></small>
							
							<div class="form-group mb-2">
                                <label class="fw-semibold  text-black">Subscription Description</label>
                                <textarea type="text" class="form-control editor summermote" name="pck_desc"  id="pck_desc"  autocomplete="off"><?=@$pcklist->description;?></textarea>
                            </div>
							<small id="pck_desc_error"></small>
							
							<div class="form-group mb-2">
                                <label class="fw-semibold  text-black">Subscription Type</label>
                                <select class="form-control" name="pck_type" id="pck_type">
									<option value="Free" <?=(@$pcklist->pck_type == 'Free') ? 'selected' : ''; ?>>Free</option>
									<option value="Paid" <?=(@$pcklist->pck_type == 'Paid') ? 'selected' : ''; ?>>Paid</option>
								</select>
                            </div>
							<small id="pck_type_error"></small>
							
							
							<div id="amount_type" style="display:<?=((!empty(@$pcklist->pck_type) AND @$pcklist->pck_type == 'Paid') ? 'block' : 'none')?>;">
							<div class="form-group mb-2">
                                <label class="fw-semibold  text-black">Subscription Amount</label>
                                <input type="text" class="form-control" name="pck_amount"  id="pck_amount"  autocomplete="off" value="<?=@$pcklist->amount;?>">
                            </div>
							<small id="pck_amount_error"></small>
							</div>
							
							
							<?php
							$duration = explode('-', @$pcklist->duration);
							$num = $duration[0];
							$plan = $duration[1];
							?>
							<div class="form-group mb-2">
                                <label class="fw-semibold  text-black">Subscription Duration</label>
								<div class="row">
								  <div class="col-sm-6">
								      <!--<input type="number" class="form-control" name="pck_name"  id="pck_name"  autocomplete="off">-->
									  <select class="form-control" name="pck_duration_1" id="pck_duration_1">
											<option value="">Select Duration</option>
											<?php for($i = 1; $i<=12; $i++){ ?>
											    <option value="<?php echo $i; ?>" <?=($num == $i) ? 'selected' : ''; ?>><?php echo $i; ?></option>
											<?php } ?>
									  </select>
								  </div>
								  <div class="col-sm-6">
								       <select class="form-control" name="pck_duration_2" id="pck_duration_2">
											<option value="" >Select</option>
											<option value="Month" <?=($plan == 'Month') ? 'selected' : ''; ?>>Month</option>
											<option value="Year"  <?=($plan == 'Year') ? 'selected' : ''; ?>>Year</option>
									  </select>
								  </div>
								</div>
                               
                            </div>
							<small id="pck_duration_1_error"></small>
							<small id="pck_duration_2_error"></small>
							
							<div class="form-group mb-2">
                                <label class="fw-semibold  text-black">Invitation Limit</label>
								<div class="row">
								  <div class="col-sm-4" >
								      <input type="number" class="form-control" name="invite_limit"  id="invite_limit"  autocomplete="off" value="<?=@$pcklist->invitation_limit;?>">
								  </div>
								  
								   <div class="col-sm-1" style="margin: 0px -19px;font-size: 38px;margin-top: -15px;">
								  /
								  </div>
								  <div class="col-sm-5" style="margin: 0px -2px;">
								    
								    <div class="col-sm-6">
								        <select class="form-control" name="invite_duration" id="invite_duration">
											<option value="">Select</option>
											<option value="Per Month" <?=(@$pcklist->invitation_limit_duaration == 'Per Month') ? 'selected' : ''?>>Monthly</option>
									   </select>
								    </div>
								  </div>
								 
								</div>
                               
                            </div>
							
							<div class="form-group mb-2">
                                <label class="fw-semibold  text-black">Status</label>
                                <select class="form-control" name="pckstatus"  id="pckstatus">
                                    <option value="">Select Status</option>
                                    <option value="1" <?=(@$pcklist->status == '1') ? 'selected' : ''; ?>>Active</option>
                                    <option value="0" <?=(@$pcklist->status == '0') ? 'selected' : ''; ?>>Inactive</option>
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
                
                <div class="col-lg-6 mb-3">
                    <div class="card shadow rounded">
                       <div class="card-body">
                            <div class="row">
                               
								
								 <div class="col-lg-12 mb-3">
									<div class="card rounded">
									<div class="card-body">
									
									<div class="mt-3"> <label class="tx-11 font-weight-bold mb-0 "><h6>User Type</h6></label><p class="text-muted" id="user-type"></p></div>
									
									<div class="mt-3"> <label class="tx-11 font-weight-bold mb-0 "><h6>Subscription Name</h6></label><p class="text-muted" id="package-name"><?=@$pcklist->name;?></p></div>
									
									<div class="mt-3"> <label class="tx-11 font-weight-bold mb-0 "><h6>Subscription Description</h6></label><p class="text-muted" id="package-description"><?=@$pcklist->description;?></p></div>
									
									<div class="mt-3"> <label class="tx-11 font-weight-bold mb-0 "><h6>Subscription Type</h6></label><p class="text-muted" id="package-type"><?=@$pcklist->pck_type; ?></p></div>
									
									<div class="mt-3" id="pac-amount" style="display:<?=((!empty(@$pcklist->pck_type) AND @$pcklist->pck_type == 'Paid') ? 'block' : 'none')?>;"> <label class="tx-11 font-weight-bold mb-0 "><h6>Subscription Amount</h6></label><p class="text-muted" id="package-amount"><?='$'.@$pcklist->amount;?></p></div>
									
									
									
									<div class="mt-3"> <label class="tx-11 font-weight-bold mb-0 "><h6>Subscription Duration</h6> </label><br/><span class="text-muted" id="package-duraction_1"><?=@$num; ?></span> <span class="text-muted" id="package-duraction_2"><?=@$plan; ?></span></div>
									<?php if(@$pcklist->status == 1) {
										$status = 'Active';
									}else{
										$status = 'Inactive';
									}?>
									<div class="mt-3"> <label class="tx-11 font-weight-bold mb-0 "><h6>Status</h6></label><p class="text-muted" id="package-status"><?=@$status; ?></p></div>

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
<script>
$(document).ready(function(){
	$("#submitform").on('submit', function(e){
		e.preventDefault();
		//var form_data = new FormData(); 	
		$.ajax({
		type: 'POST',
		url: '<?php echo base_url('admin/subscription/editsub'); ?>',
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
				if(data.pck_name_error != ''){
					$('#pck_name_error').html(data.pck_name_error);
				}else{
					$('#pck_name_error').html('');
				}
				
				if(data.pck_desc_error != ''){
					$('#pck_desc_error').html(data.pck_desc_error);
				}else{
					$('#pck_desc_error').html('');
				}
				
				if(data.pck_amount_error != ''){
					$('#pck_amount_error').html(data.pck_amount_error);
				}else{
					$('#pck_amount_error').html('');
				}
				
				if(data.pck_duration_1_error != ''){
					$('#pck_duration_1_error').html(data.pck_duration_1_error);
				}else{
					$('#pck_duration_1_error').html('');
				}
				
				if(data.pck_duration_2_error != ''){
					$('#pck_duration_2_error').html(data.pck_duration_2_error);
				}else{
					$('#pck_duration_2_error').html('');
				}
				
				if(data.status_error != ''){
					$('#status_error').html(data.status_error);
				}else{
					$('#status_error').html('');
				}
				
				if(data.user_type_error != ''){
					$('#user_type_error').html(data.user_type_error);
				}else{
					$('#user_type_error').html('');
				}
				
				if(data.pck_type_error != ''){
					$('#pck_type_error').html(data.pck_type_error);
				}else{
					$('#pck_type_error').html('');
				}
				
			}
		}
		});
	});

});

 $(document).on('keyup','#pck_name',function(e){
        var pck_name = $(this).val();
        
        if(pck_name){ 
          $("#package-name").text(pck_name);
        }else{
         
          $("#package-name").text('Package Name');
        }
    });
	$("#pck_desc").on("summernote.change", function (e) {   // callback as jquery custom event 
		var pckstatus = $(this).val();
		var pck = pckstatus.replace(/(<([^>]+)>)/ig,"");
		if(pck){
		  $("#package-description").text(pck);
		}else{
		  $("#package-description").text('Package Description');
		}
	});
	
	$(document).on('keyup','#pck_amount',function(e){
        var pck_amount = $(this).val();
        
        if(pck_amount){
          $("#package-amount").text('$'+pck_amount);
        }else{
         
          $("#package-amount").text('Package Amount');
        }
    });
	
	$(document).on('keyup','#pck_amount',function(e){
        var pck_amount = $(this).val();
        
        if(pck_amount){
          $("#package-amount").text('$'+pck_amount);
        }else{
         
          $("#package-amount").text('Package Amount');
        }
    });
	
	
	
	$(document).on('change','#pck_duration_1',function(e){
        var pck_duration_1 = $('#pck_duration_1').val();
       
         if(pck_duration_1){
           $("#package-duraction_1").text(pck_duration_1);
         }
    });
	
	$(document).on('change','#pck_duration_2',function(e){
        var pck_duration_2 = $('#pck_duration_2').val();
       
         if(pck_duration_2){
           $("#package-duraction_2").text(pck_duration_2);
         }
    });
	
	$(document).on('change','#pckstatus',function(e){
        var pckstatus = $(this).val();
        
        if(pckstatus == 1){
          $("#package-status").text('Active');
        }
		if(pckstatus == 0){
          $("#package-status").text('Inactive');
        }
    });
	
	$(document).on('change','#user_type',function(e){
        var pckstatus = $(this).val();
        
        if(pckstatus){
          $("#user-type").text(pckstatus);
        }else{
		  ("#user-type").text('');	
		}
		
    });
	
	$(document).on('change','#pck_type',function(e){
        var pck_type = $('#pck_type').val();
        
		if(pck_type){
          $("#package-type").text(pck_type);
        }else{
		  ("#package-type").text('');	
		}
		
        if(pck_type == 'Paid'){
           $("#amount_type").css('display', 'block');
           $("#pac-amount").css('display', 'block');
        }else if(pck_type == 'Free'){
		   $("#amount_type").css('display', 'none');	
		   $("#pac-amount").css('display', 'none');
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