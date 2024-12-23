<style>
	.form-check {
	    display: flex;
	    align-items: center;
	}
	.form-check label {
	    margin-left: 10px;
	    font-size: 18px;
	    font-weight: 500;
	}
	.form-switch .form-check-input[type=checkbox] {
	    border-radius: 2em;
	    height: 50px;
	    width: 100px;
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
</style>

<div class="main-content">
   <div class="page-content">
      <div class="container-fluid">
         <!-- start page title -->
         <div class="row">
            <div class="col-12">
               <div class="page-title-box d-flex align-items-center justify-content-between">
                  <h4 class="mb-0"><?=$title?></h4>
                  <div class="page-title-right">
                     <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?=base_url('admin/dashboard')?>">Dashboard</a></li>
                        <li class="breadcrumb-item active"><?=$title?></li>
                     </ol>
                  </div>
               </div>
            </div>
         </div>

         <!-- end row -->
         <div class="row">
            <div class="col-xl-12">
               <div class="card custom-shadow rounded-lg border">
                  <div class="card-body">
                  	<div class="row">
	                  	<div class="col-sm-10">
	                     	<h4 class="card-title mb-4">Games List</h4>
	                     </div>
	                     
	                     <div class="col-sm-2 text-end" style="padding-left: 54px;">
	                     	 <a href="<?=base_url('admin/games/add')?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>&nbsp;Add Game</a>
	                     </div>
	                  </div>   	
                     <div class="">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
								   <thead class="thead-light text-center">
								      <tr>
								            <th>#</th>
											<th>Games</th>
											<th>Games Type</th>
											<th>Organiser</th>
											<th>Opponent</th>
											<th>Winner</th>
											<th>Sport</th>
											<th>Venue</th>
											<th class="text-center">Action</th>
								      </tr>
								   </thead>
								   <tbody class="text-center">
								   <?php if (is_array($gamesList) || is_object($gamesList)) { ?>
										<?php foreach ($gamesList as $key => $v): ?>
										<?php $organizer_id = $this->Adminmodel->get_by('users', 'single', array('id' => @$v->organizer_id), '', 1);?>
										<?php 
											$explodSportId = explode(',', @$v->sport_id); 
											$count = count($explodSportId);
										?>
											<tr>
												<td><?= $key+1 ?></td>
												<td><?=@$v->game_name; ?></td>
												<td><?=@$v->game_type; ?></td>
												<td><?=ucfirst(@$organizer_id->first_name); ?> <?=ucfirst(@$organizer_id->last_name); ?></td>
												<td>
													<?php
														$opponent = $this->db->query("select * from invite_opponent where sender_team = ".@$v->organizer_id." AND game_type='One to One'")->row();
														
														if(!empty($opponent)){
															$getopponentTeam = $this->db->query("select first_name, last_name, team_name from users where id = ".@$opponent->receiver_team."")->row();
															echo @$getopponentTeam->team_name.'('.ucfirst(@$getopponentTeam->first_name).' '.ucfirst(@$getopponentTeam->last_name).')';
														}else{
															echo 'Not Added any Opponent';
														}
													?>
												</td>
												
												<td>
													<?php
														$opponent1 = $this->db->query("select * from invite_opponent where sender_team = ".@$v->organizer_id." AND game_type='One to One'")->row();
														if(!empty($opponent1->winner_id)){
															$getopponentTeam1 = $this->db->query("select first_name, last_name, team_name from users where id = ".@$opponent1->winner_id."")->row();
															echo @$getopponentTeam1->team_name.'('.ucfirst(@$getopponentTeam1->first_name).' '.ucfirst(@$getopponentTeam1->last_name).')';
														}else{
															echo 'Winner not finalize';
														}
													?>
												</td>
												
												<td>
												<?php
													foreach($explodSportId as $SoprtId){
														$sportInfo = $this->Adminmodel->get_by('sports', 'single', array('id' => @$SoprtId), '', 1);
														
														if($count == 1){
															echo !empty(@$sportInfo->sports_name) ? ucfirst(@$sportInfo->sports_name) : '';
														}else{
															echo !empty(@$sportInfo->sports_name) ? ucfirst(@$sportInfo->sports_name).' ,' : '';
														}
														
													}
												?>
												</td>
												<td><?=@$v->venue; ?></td>
												
												<td class="text-center">
												    <a href="<?= base_url('admin/games/edit/'.$v->id) ?>" class="btn btn-outline-success btn-sm" data-toggle="tooltip" title="Edit">
														<i class="fas fa-edit"></i>
													</a>
													
												    <a href="<?= base_url('admin/games/view/'.@$v->id) ?>" class="btn btn-outline-success btn-sm" data-toggle="tooltip" title="View">
														<i class="fa fa-eye"></i>
													</a>
													
													<a href="<?= base_url('admin/games/invite/'.@$v->organizer_id.'?gameId='.@$v->id.'') ?>" class="btn btn-outline-success btn-sm" data-toggle="tooltip" title="Invite">
														<i class="fa fa-user-plus"></i>
													</a>
													
													<a href="javascript:void(0);"  onclick="dealDetail(<?=@$v->organizer_id?>,<?=@$opponent->id?>)"  class="btn btn-outline-success btn-sm" data-toggle="tooltip" title="Winner">
														<i class="fa fa-trophy"></i>
													</a>
												
													<a href="javascript:void(0)" class="btn btn-outline-warning btn-sm" data-toggle="tooltip" title="Delete"  onclick="deleteDeals(<?= @$v->id ?>)">
														<i class="fa fa-trash"></i>
													</a>
													
												</td>
											
											</tr>
										<?php endforeach ?>
									<?php } ?>
								   </tbody>
								</table>

								<!-- <div class="container mt-3">
  
  
  <button type="button" class="btn btn-primary hide" data-bs-toggle="modal" data-bs-target="#dealModal">
    Open modal
  </button>
</div> -->

<!-- The Modal -->
						<div class="modal" id="dealModal">
							<div class="modal-dialog modal-xl">
								<form action="" method="POST" enctype="multipart/form-data" id="submitAboutus">
									<div class="modal-content"   style="width: 65% !important; margin: 0 auto;height: 360px;top: 53px;">
										<div class="modal-body" >
											<div style="width: 100%;margin: 0 auto;padding: 71px;" id="savethedeal">
												<div style="">
												   <div class="form-group mb-2">
														<label class="fw-semibold  text-black">Select Winner</label>
														<select class="form-control" name="winner"  id="winner">
															<option value="">Select Winner</option>
														</select>
													</div>
													<small id="winner_error"></small>
													<input type="hidden" id="orgId" name="orgId">
													<input type="hidden" id="id" name="id">
												</div>
											</div>
										</div>
										<div class="modal-footer" style="-webkit-box-align: center !important; justify-content: center !important;">
											<button type="submit" class="btn btn-danger" >Submit</button>
											<button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="closeModal();">Close</button>
										</div>
									</div>
								 </form>
							</div>
						</div>
						
                     </div>
                  </div>
                  <!-- end card-body -->
               </div>
               <!-- end card -->
            </div>
            <!-- end col -->
            
         </div>
         <!-- end col -->
      </div>
   </div>
   <!-- End Page-content -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.0/FileSaver.min.js"></script>   

  <script type="text/javascript">
var adminUrl = ""
   	function myfunc(){
    // if you are using a different 'id' in the div, make sure you replace it here.
    var element = document.getElementById("savethedeal");

    html2canvas(element,{
    	allowTaint: true,

		useCORS: true}).then(function(canvas) {
        canvas.toBlob(function(blob) {
            window.saveAs(blob, "Deal.png");
        });
    });
};


   function dealDetail(orgId, Id) {
	   if(orgId){
			$.ajax({         
			url: '<?php echo base_url('admin/games/getwinnerOpt'); ?>',     
			type: 'POST',     
			data: {         
			orgId: orgId  
			},
			success: function(data){
				$('#orgId').val(orgId);
				$('#id').val(Id);
				$('#winner').html(data);
				$('#dealModal').show();
			}
			})
		   
	   }
        
    }

	function deleteDeals(dealId) 
	{
		swal({
			title: 'Are You sure want to delete this?',
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#A5DC86',
			cancelButtonColor: '#DD6B55',
			confirmButtonText: 'Yes',
			cancelButtonText: 'No',
			closeOnConfirm: true,
			closeOnCancel: true
		}, function(isConfirm){
			if (isConfirm) {
				window.location.href = '<?= base_url('admin/games/delete/') ?>'+dealId
			}
		});
	}
	
	//Article status change function
	function changeDealStatus(id, thisSwitch) {      
		var newStatus;      
		if (thisSwitch.val() == 1) {         
			thisSwitch.val('0');       
			newStatus = '0';
		} else {      
			thisSwitch.val('1');       
			newStatus = '1';
		}
      
		$.ajax({         
			url: '<?php echo base_url('admin/users/changestatus'); ?>',     
			type: 'POST',       
			dataType: 'json',       
			data: {         
				userId: String(id),        
				status: String(newStatus)        
			},
		})
		.done(function(data) {  
			// if(subpage == 'deallist'){
			// var redirectURL = adminUrl+'deals';
			// }
			// else if(subpage == 'hotdeallist'){
			// var redirectURL = adminUrl+'hotdeals';
			// }else{
			// var redirectURL = adminUrl+'unapproved-deals';
			// }

			// alert_response(data,redirectURL);   
			if(newStatus == 1){
				swal({title: "Sucess!", text: "<strong>Your status is Activate</strong>", type: "success", showConfirmButton: true, html:true}, function(){ window.location.href = " "});
			}else if(newStatus == 0){
				swal({title: "Sucess!", text: "<strong>Your status is Inctivate</strong>", type: "success", showConfirmButton: true, html:true}, function(){ window.location.href = " "});
			}
		})
		.fail(function(data) {      
			console.log(data);       
		}); 
	}

	function changeDealApproval(id, thisSwitch,subpage) {      
		var newStatus;      
		if (thisSwitch.val() == 1) {         
			thisSwitch.val('0');       
			newStatus = '0';
		} else {      
			thisSwitch.val('1');       
			newStatus = '1';
		}
      
		$.ajax({      
			url: adminUrl+'deals/approve',       
			type: 'POST',       
			dataType: 'json',       
			data: {         
				dealId: String(id),        
				status: String(newStatus)        
			},
		})
		.done(function(data) {  
			if(subpage == 'deallist'){
         	var redirectURL = adminUrl+'deals';
         }
         else if(subpage == 'hotdeallist'){
         	var redirectURL = adminUrl+'hotdeals';
         }else{
         	var redirectURL = adminUrl+'unapproved-deals';
         }
         
         alert_response(data,redirectURL);   
		})
		.fail(function(data) {      
			console.log(data);       
		}); 
	}

	//Article status change function
	function changeHotDealStatus(id, currentStatus,subpage) {      
		var newStatus;     

		if (currentStatus == 1) {         
			newStatus = '0';
			var confirmTxt = 'Remove this Deal from Hot Deals?';
		} else {      
			newStatus = '1';
			var confirmTxt = 'Mark this Deal as a Hot Deal?';
		}

      swal({
			title: confirmTxt,
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#A5DC86',
			cancelButtonColor: '#DD6B55',
			confirmButtonText: 'Yes',
			cancelButtonText: 'No',
			closeOnConfirm: true,
			closeOnCancel: true
		}, function(isConfirm){
			if (isConfirm) {

				$.ajax({      
					url: adminUrl+'deals/changehotdealstatus',       
					type: 'POST',       
					dataType: 'json',       
					data: {         
						dealId: String(id),        
						hot_deal: String(newStatus)        
					},
				})
				.done(function(data) {      
		         if(subpage == 'deallist'){
		         	var redirectURL = adminUrl+'deals';
		         }
		         else if(subpage == 'hotdeallist'){
		         	var redirectURL = adminUrl+'hotdeals';
		         }else{
		         	var redirectURL = adminUrl+'unapproved-deals';
		         }
		         
		         alert_response(data,redirectURL);
				})
				.fail(function(data) {      
					console.log(data);       
				}); 
			}
		});	
	}

	//Article status change function
	function changeFeaturedDealStatus(id, currentStatus) {      
		var newStatus;     

		if (currentStatus == 1) {         
			newStatus = '0';
			var confirmTxt = 'Remove this Deal from Featured Deals?';
		} else {      
			newStatus = '1';
			var confirmTxt = 'Mark this Deal as a Featured Deal?';
		}

      swal({
			title: confirmTxt,
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#A5DC86',
			cancelButtonColor: '#DD6B55',
			confirmButtonText: 'Yes',
			cancelButtonText: 'No',
			closeOnConfirm: true,
			closeOnCancel: true
		}, function(isConfirm){
			if (isConfirm) {

				$.ajax({      
					url: adminUrl+'deals/changefeatureddealstatus',       
					type: 'POST',       
					dataType: 'json',       
					data: {         
						dealId: String(id),        
						featured_deal: String(newStatus)        
					},
				})
				.done(function(data) {      
		         var redirectURL = adminUrl+'hotdeals';
		         alert_response(data,redirectURL);
				})
				.fail(function(data) {      
					console.log(data);       
				}); 
			}
		});	
	}
function closeModal(){
	$('#dealModal').css('display', 'none');
}
 </script>
<script>
$(document).ready(function(){
	$("#submitAboutus").on('submit', function(e){
		e.preventDefault();
		var form_data = new FormData(); 	
		$.ajax({
		type: 'POST',
		url: '<?php echo base_url('admin/games/saveWinner'); ?>',
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
				if(data.winner_error != '')
				{
				    $('#winner_error').html(data.winner_error);
				}else{
					$('#winner_error').html('');
				}
				
				if(data.orgId_error != '')
				{
				    $('#orgId_error').html(data.orgId_error);
				}else{
					$('#orgId_error').html('');
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