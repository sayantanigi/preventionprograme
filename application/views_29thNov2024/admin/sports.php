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
	                     	<h4 class="card-title mb-4">Players List</h4>
	                     </div>
	                     
	                     <div class="col-sm-2 text-end" style="padding-left: 54px;">
	                     	 <a href="<?=base_url('admin/sports/add')?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>&nbsp;Add Sports</a>
	                     </div>
	                  </div>   	
                     <div class="">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
								   <thead class="thead-light text-center">
								      <tr>
								            <th>#</th>
											<th>Sports</th>
											<th>Status</th>
											<th class="text-center">Action</th>
								      </tr>
								   </thead>
								   <tbody class="text-center">
								   <?php if (is_array($sportslist) || is_object($sportslist)) { ?>
										<?php foreach ($sportslist as $key => $v): ?>
											<tr>
												<td><?= $key+1 ?></td>
												<td><?=ucfirst(@$v->sports_name); ?></td>
												
												<td>
													<div class="form-check mb-3 mt-3">
														<input type="checkbox" class="form-check-input small" id="statusChange_<?=$key?>" switch="bool" value="<?= @$v->status ?>" <?= (@$v->status == 1)? 'checked':'' ?>  onchange="changeSportStatus(<?=@$v->id?>, $(this))">
														<label class="form-check-label" for="statusChange_<?=$key?>"></label>
													</div>
												</td>
												
												<td class="text-center">
													
													<a href="<?= base_url('admin/sports/edit/'.$v->id) ?>" class="btn btn-outline-success btn-sm" data-toggle="tooltip" title="Edit">
														<i class="fas fa-edit"></i>
													</a>
													
													
													<a href="javascript:void(0)" class="btn btn-outline-warning btn-sm" data-toggle="tooltip" title="Delete"  onclick="deleteSports(<?= @$v->id ?>)">
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
    <div class="modal-content" style="width: 28% !important; margin: 0 auto;">

      <!-- Modal Header -->
	      <!-- <div class="modal-header">
	        <h4 class="modal-title">Deal Detail</h4>
	        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
	      </div> -->

      <!-- Modal body -->
      <div class="modal-body" >
        <div style="width: 100%;margin: 0 auto" id="savethedeal">
        <div style="box-shadow:0px 0px 5px #ccc;">
            <div>
                <img src="http://localhost/dealzook/uploads/deals/deal_171662442642.jpg" alt="" style="width: 100%;height:170px; object-fit: cover;">
            </div>

            <div style="padding:15px; padding-bottom: 0;">
                <h3 style="margin: 0;font-size: 16px;"><a href="" style="color: #111;text-decoration: none;">Full Set Volume Eyelash</a></h3>
                <h3 style="margin: 0;font-size: 16px;"><a href="" style="color: #111;text-decoration: none;">Extensions - Great Discounts & High Quality</a></h3>
            </div>
            <div style="padding: 15px;padding-top: 0;">
                <p style="margin: 0;margin-top: 15px;font-size: 15px;">DEKALASH CAMPBELL</p>
                <p style="margin: 0;margin-top: 5px;font-size: 14px;">715 W Hamilton Ave, suite 1100 , Campbell</p>
                <h3 style="margin: 0;margin-top: 14px;font-size: 16px;">
                    <span><del>$280.00</del></span>
                    <span style="color: #8cb724;margin-left: 8px;margin-right: 8px;">$159.00</span>
                    <span style="color: #ffb51b;">43% Off</span>
                </h3>
                <p style="color: #dc3545;margin: 0;margin-top: 8px;">Expires in 51 Days</p>
            </div>
        </div>
    </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer" style="-webkit-box-align: center !important; justify-content: center !important;">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="myfunc()">Download</button>
      </div>

    </div>
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
function deleteSports(id) 
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
			window.location.href = '<?= base_url('admin/sports/delete/') ?>'+id
		}
	});
}
	
//Article status change function
function changeSportStatus(id, thisSwitch) {      
	var newStatus;      
	if (thisSwitch.val() == 1) {         
		thisSwitch.val('0');       
		newStatus = '0';
	} else {      
		thisSwitch.val('1');       
		newStatus = '1';
	}
  
	$.ajax({         
		url: '<?php echo base_url('admin/sports/changestatus'); ?>',     
		type: 'POST',       
		dataType: 'json',       
		data: {         
			sportsId: String(id),        
			status: String(newStatus)        
		},
	})
	.done(function(data) {  
		
		if(newStatus == 1){
			swal({title: "Sucess!", text: "<strong>sports status is Activate</strong>", type: "success", showConfirmButton: true, html:true}, function(){ window.location.href = " "});
		}else if(newStatus == 0){
			swal({title: "Sucess!", text: "<strong>sports status is Inctivate</strong>", type: "success", showConfirmButton: true, html:true}, function(){ window.location.href = " "});
		}
	})
	.fail(function(data) {      
		console.log(data);       
	}); 
}
 </script>
 