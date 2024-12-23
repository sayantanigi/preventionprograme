
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

                <div class="col-lg-6 mb-3">
                  <div class="card shadow rounded">
                     <div class="card-body">    
                        <form id="submitform" method="post" enctype="multipart/form-data" >
                            
                            <!--<div class="form-group mb-2">
                                <label class="fw-semibold  text-black">Select Vendor</label>
                                <select class="form-control vendorId" name="vendorId" required>
                                    <option></option>
                                    <?php if (!empty($vendorList) && (count($vendorList) > 0)) { ?>
                                        <?php foreach ($vendorList as $key => $v): ?>
                                            <option value="<?= $v->vendorId ?>" data-name="<?= $v->business_name ?>">
                                                <?= $v->business_name ?>
                                            </option>
                                        <?php endforeach ?>
                                    <?php } else { ?>
                                        <option value="">No vendor found</option>
                                    <?php } ?>
                                </select>
                            </div>-->

                            <div class="form-group mb-2">
                                
								 <label class="fw-semibold  text-black">Sports Name</label>
                                <input type="text" class="form-control" name="sports"  id="sports"  autocomplete="off" value="<?=@$sports->sports_name; ?>">
                            </div>
                            <small id="sports_error"></small>
                            <div class="form-group mb-2">
                                <label class="fw-semibold  text-black">Status</label>
                                <select class="form-control" name="status" required id="userstatus">
                                    <option value="">Select Status</option>
                                    <option value="1" <?php echo (@$sports->status == 1) ? 'selected' : ''?>>Active</option>
                                    <option value="0" <?php echo (@$sports->status == 0) ? 'selected' : ''?>>Inactive</option>
                                </select>
                            </div>
							<small id="status_error"></small>
                            <input type="hidden" class="form-control" name="sportsid" id="sportsid" value="<?=@$sports->id; ?>">
                           
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

 <script>

$(document).ready(function(){
	$("#submitform").on('submit', function(e){
		e.preventDefault();
		var form_data = new FormData(); 	

		var sports = $('#sports').val(); 
		var status = $('#userstatus').val();
		var sportsId = $('#sportsid').val();
		form_data.append("sports", sports);
		form_data.append("status", status);
		form_data.append("sportsId", sportsId);

		$.ajax({
		type: 'POST',
		url: '<?php echo base_url('admin/sports/editSports'); ?>',
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
				swal({title: "Sucess!", text: "<strong>"+data.message+"</strong>", type: "success", showConfirmButton: true, html:true}, function(){ window.location.href = "<?php echo base_url('admin/sports')?>"});
				
				$('#sports').val(''); 
				$('#status').val(''); 
			}
			if(data.status == 0){
				swal({title: "Fail!", text: "<strong>"+data.message+"</strong>", type: "error", showConfirmButton: true, html:true}, function(){ window.location.href = " "});
			}
			
			if(data.vali_error == 1){
				if(data.sports_error != ''){
					$('#sports_error').html(data.sports_error);
				}else{
					$('#sports_error').html('');
				}
				
				if(data.status_error != ''){
					$('#status_error').html(data.status_error);
				}else{
					$('#status_error').html('');
				}
				
				
			}
			
		}
		});
	});

});
upload_image.onchange = evt => {
  const [file] = upload_image.files
  if (file) {
    blah.src = URL.createObjectURL(file)
  }
}
</script> 



