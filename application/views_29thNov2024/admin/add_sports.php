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
                                <input type="text" class="form-control" name="sports"  id="sports"  autocomplete="off">
                            </div>
							<small id="sports_error"></small>
							
							
                            <!--<div class="form-group mb-2">
                                <label class="fw-semibold  text-black">Deal Limit</label>
                                <input type="number" class="form-control" name="deal_limit" placeholder="Enter Deal Limit">
                            </div>-->

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
                
                <div class="col-lg-6 mb-3">
                    <div class="card shadow rounded">
                       <!-- <div class="card-body">
                            <div class="row">
                                <div class="col-lg-7 mb-3">
                                    <h2 class="fs-5 fw-semibold mb-0" id="ven_name">Vendor Name</h2>
                                    <p class="mb-3 mt-2" id="ven_adrs">Vendor Address</p>
                                    
                                    <strong><sapn class="fs-6 fw-semibold mt-3" id="deal_title_preview">Deal Headline</sapn></strong>
                                    
                                    <p class="mb-2 mt-2"><strong>Started On:</strong> <span class="text-success fw-semibold" id="deal_start_date">Deal Start Date</span></p>
                                    
                                    <p class="mb-2"><strong>Valid Till:</strong> <span class="text-warning fw-semibold" id="deal_end_date">Deal End Date</span></p>
                                    
                                    <p class="mb-2"><strong>Zone:</strong> <span class=" fw-semibold" id="deal_zones">Deal's Zones</span></p>

                                    <p class="mb-2"><strong>Category:</strong> <span class=" fw-semibold" id="deal_category">Deal Category</span></p>

                                    <p class="mb-2"><strong>Sub-category:</strong> <span class=" fw-semibold" id="deal_subCat">Deal Sub Category</span></p>
                                </div>
                                <div class="col-lg-5">
                                    <div class="owl-carousel owl-theme" id="dealslide">
                                        <div class="item">
                                            <img src="<?= base_url('dist/images/noimage.jpg') ?>" class="owl-img-fluid">
                                            <!--<a href="javascript:void(0);" class="closeimg"><i class="fa fa-times"></i></a>
                                        </div>
                                    </div>
                                    <p class="fs-6 text-center mb-2"><span id="deal_normal_price">DNP</span><span class="fw-bold text-success ms-1" id="deal_price"> DP </span> <span class="percentoff fw-bold ms-1 text-orange" id="deal_discount">DDSP</span></p>
                                    <button class="btn btn-warning fw-semibold shadow">Click to Activate Deal & Save in Deal Folder (There in no cost)</button>
                                </div>
                                <div class="col-lg-12">
                                  <h4 class="fs-5 fw-semibold"> Deal Details & Terms and Conditions </h4>
                                  <div id="deal_desc"></div>
                                  <ul class="pt-0">
                                    <li>This vendor has complete responsibility for the quality and accuracy of their advertised products and services</li>
                                  </ul> 
                                </div>
                                <hr>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <p><span class="fw-semibold"><strong>About Us:</strong></span> <span id="ven_desc"></span></p>
                                    <div>      
                                        <p><span class="fw-semibold"><strong>Business Phone:</strong></span> <span id="business_phone"></span></p>
                                        <p><span class="fw-semibold"><strong>Business URL:</strong></span> <span id="business_url"></span></p>
                                    </div>    
                                </div>    
                                <!--<div class="col-lg-12 col-md-12 col-sm-12">
                                    <div id="image_preview"></div> 
                                </div> 
                            </div>
                        </div>-->
                    </div>

                     <div class="col-lg-12 col-md-12 d-none" id="form_error">
                        <div class="alert alert-danger fade show" role="alert">
                            <i class="mdi mdi-block-helper me-2"></i>
                            <span id="form_error_txt">A simple danger alert—check it out!</span>
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

		form_data.append("sports", sports);
		form_data.append("status", status);
		$.ajax({
		type: 'POST',
		url: '<?php echo base_url('admin/sports/addSports'); ?>',
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

