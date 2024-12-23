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

 </style>
 <div class="main-content">
   <div class="page-content">
      <div class="container-fluid">  
       <section class="bg-light-gray">
        <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0"><?= $page ?></h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?=base_url('dashboard')?>">Dashboard</a></li>
                            <li class="breadcrumb-item active"><?= $page ?></li>
                        </ol>
                    </div>

                </div>
            </div>
           </div>

            <div class="row">

                <div class="col-lg-12 mb-3">
                  <div class="card shadow rounded">
                     <div class="card-body">    
                        <form id="submitform" method="post" enctype="multipart/form-data" >
                            <div class="form-group mb-2">
                                <label class="fw-semibold  text-black">Health Group *</label>
								<select class="form-control" name="group"  id="group"  required>
								    <option value="">SELECT</option>
									<?php
									    if(@$healthgroup){
											foreach(@$healthgroup as $k => $v){
												echo '<option value="'.@$v->id.'" '.((@$v->id == @$result->health_group_id) ? 'selected' : '').'>'.@$v->name.'</option>';
											}
										}
									?>
								</select>
                            </div>
							<small id="group_error"></small>
							
							<div class="form-group mb-2">
                                <label class="fw-semibold  text-black">Health Group Admin First Name *</label>
                                <input type="text" class="form-control" name="fname"  id="fname"  autocomplete="off" required value="<?=@$result->fname?>">
                                <input type="hidden" class="form-control" name="id"  id="id"  autocomplete="off" required value="<?=@$result->id?>">
                            </div>
							<small id="fname_error"></small>
							
							<div class="form-group mb-2">
                                <label class="fw-semibold  text-black">Health Group Admin Last Name *</label>
                                <input type="text" class="form-control" name="lname"  id="lname"  autocomplete="off" required value="<?=@$result->lname?>">
                            </div>
							<small id="lname_error"></small>
							
							
							<div class="form-group mb-2">
                                <label class="fw-semibold  text-black">Health Group Email Id *</label>
                                <input type="text" class="form-control" name="email"  id="email"  autocomplete="off" required value="<?=@$result->email?>">
                            </div>
							<small id="email_error"></small>
							
							<div class="form-group mb-2">
                                <label class="fw-semibold  text-black">Status</label>
                                <select class="form-control" name="status"  id="userstatus">
                                    <option value="">Select Status</option>
                                    <option value="1" <?=((@$result->status == 1) ? 'selected' : '')?>>Active</option>
                                    <option value="0" <?=((@$result->status == 0) ? 'selected' : '')?>>Inactive</option>
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
            </div>
        </div>
     </section>
   </div>
 </div>


 <script>
$(document).ready(function(){
	$("#submitform").on('submit', function(e){
		e.preventDefault();

		$.ajax({
		type: 'POST',
		url: '<?php echo base_url('admin/healthgroup/updateHealthgroup_admin'); ?>',
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
				swal({title: "Sucess!", text: "<strong>"+data.message+"</strong>", type: "success", showConfirmButton: true, html:true}, function(){ window.location.href = "<?=base_url('admin/healthgroup/health_group_admin')?>"});
				
			}
			
			if(data.status == 0){
				swal({title: "Fail!", text: "<strong>"+data.message+"</strong>", type: "error", showConfirmButton: true, html:true}, function(){ window.location.href = " "});
			}
			
			if(data.vali_error == 1){
				if(data.group_error != ''){
					$('#group_error').html(data.group_error);
				}else{
					$('#group_error').html('');
				}
				
				if(data.fname_error != ''){
					$('#fname_error').html(data.fname_error);
				}else{
					$('#fname_error').html('');
				}
				
				if(data.lname_error != ''){
					$('#lname_error').html(data.lname_error);
				}else{
					$('#lname_error').html('');
				}
				
				if(data.email_error != ''){
					$('#email_error').html(data.email_error);
				}else{
					$('#email_error').html('');
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
$(document).ready(function() {
	$('.editor').summernote({
		placeholder: '',
		height: 200
	});
});
</script>