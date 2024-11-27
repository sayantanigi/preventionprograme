

        <div class="section exvent-hero-section d-lg-flex d-block align-items-center inner-page-hero" style="background-image: url(<?=base_url('assets/images/')?>bg/about_page_bg.jpg);">
            <img class="shape-1 img-fluid" src="<?=base_url('assets/images/')?>shape/hero_shape1.png" alt="">
            <img class="shape-2 img-fluid" src="<?=base_url('assets/images/')?>shape/hero_shape2.png" alt="">

            <div class="container">
                <div class="row exvent-hero-row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <div class="page-title">
                            <h2 class="section-title"><?=@$page?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="single-speaker-page">
            <div class="container">
                <div class="row justify-content-between">
				
                    <?php $this->load->view('account/dashboard_menu')?>
					
                    <div class="col-lg-8">
                       
						
                        <div class="speaker-informations bg-light">
                            <h3 class="mb-4 fw-semibold">Change Password</h3>
                            <div class="row">
                                <div class="col-lg-7">
                                    <form id="change_password">
                                        <div class="mb-3">
                                            <label class="fw-semibold">Enter Current Password</label>
                                            <input type="password" class="form-control" name="current_pass" id="current_pass">
											<small id="current_pass_error"></small>
                                        </div>
                                        <div class="mb-3">
                                            <label class="fw-semibold">Enter New Password</label>
                                            <input type="password" class="form-control" name="new_pass" id="new_pass">
											<small id="new_pass_error"></small>
                                        </div>
                                        <div class="mb-3">
                                            <label class="fw-semibold">Re-enter New Password</label>
                                            <input type="password" class="form-control" name="cnf_pass" id="cnf_pass">
											<small id="cnf_pass_error"></small>
                                        </div>
                                        <div class="mt-4">
                                            <button class="btn btn-primary" type="submit">Update Password</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtg6oeRPEkRL9_CE-us3QdvXjupbgG14A&libraries=places"></script>		
<script>			
$(document).ready(function(){
	$("#change_password").on('submit', function(e){
		e.preventDefault();
		//var form_data = new FormData(); 	
		
		$.ajax({
		type: 'POST',
		url: '<?php echo base_url('profile/change_password'); ?>',
		data: new FormData(this) ,
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
				
				
				if(data.current_pass_error != ''){
					$('#current_pass_error').html(data.current_pass_error);
				}else{
					$('#current_pass_error').html('');
				}
				
				if(data.new_pass_error != ''){
					$('#new_pass_error').html(data.new_pass_error);
				}else{
					$('#new_pass_error').html('');
				}
				
				if(data.cnf_pass_error != ''){
					$('#cnf_pass_error').html(data.cnf_pass_error);
				}else{
					$('#cnf_pass_error').html('');
				}
				
				
				
			}
		}
		});
	});

});
</script>		
		
		