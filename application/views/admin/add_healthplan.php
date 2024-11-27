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
                                <label class="fw-semibold  text-black">Health Plan Name *</label>
                                <input type="text" class="form-control" name="plan_name"  id="plan_name"  autocomplete="off" required>
                            </div>
							<small id="plan_name_error"></small>
							
							<div class="form-group mb-2">
                                <label class="fw-semibold  text-black">Health Plan Desc *</label>
                                <!--<input type="text" class="form-control" name="plan_desc"  id="plan_desc"  autocomplete="off" required>-->
								<textarea class="form-control" name="plan_desc"  id="plan_desc"  autocomplete="off" required></textarea>
                            </div>
							<small id="plan_desc_error"></small>
							
							
							<div class="form-group mb-2">
                                <label class="fw-semibold  text-black">Health Email Id *</label>
                                <input type="text" class="form-control" name="plan_email"  id="plan_email"  autocomplete="off" required>
                            </div>
							<small id="email_error"></small>
							
							<div class="form-group mb-2">
                                <label class="fw-semibold  text-black">Status</label>
                                <select class="form-control" name="status"  id="userstatus">
                                    <option value="">Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
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
		url: '<?php echo base_url('admin/healthplan/saveHealthplan'); ?>',
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
				swal({title: "Sucess!", text: "<strong>"+data.message+"</strong>", type: "success", showConfirmButton: true, html:true}, function(){ window.location.href = "<?=base_url('admin/healthplan')?>"});
				
			}
			
			if(data.status == 0){
				swal({title: "Fail!", text: "<strong>"+data.message+"</strong>", type: "error", showConfirmButton: true, html:true}, function(){ window.location.href = " "});
			}
			
			if(data.vali_error == 1){
				if(data.plan_name_error != ''){
					$('#plan_name_error').html(data.plan_name_error);
				}else{
					$('#plan_name_error').html('');
				}
				
				if(data.plan_desc_error != ''){
					$('#plan_desc_error').html(data.plan_desc_error);
				}else{
					$('#plan_desc_error').html('');
				}
				
				if(data.plan_email_error != ''){
					$('#plan_email_error').html(data.plan_email_error);
				}else{
					$('#plan_email_error').html('');
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