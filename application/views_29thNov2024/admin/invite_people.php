<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
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


body
{
    margin-top: 20px;
}
.panel
{
    text-align: center;
}
.panel:hover { box-shadow: 0 1px 5px rgba(0, 0, 0, 0.4), 0 1px 5px rgba(130, 130, 130, 0.35); }
.panel-body
{
    padding: 0px;
    text-align: center;
}

.the-price
{
    background-color: rgba(220,220,220,.17);
    box-shadow: 0 1px 0 #dcdcdc, inset 0 1px 0 #fff;
    padding: 20px;
    margin: 0;
}

.the-price h1
{
    line-height: 1em;
    padding: 0;
    margin: 0;
}

.subscript
{
    font-size: 25px;
}

/* CSS-only ribbon styles    */
.cnrflash
{
    /*Position correctly within container*/
    position: absolute;
    top: -9px;
    right: 4px;
    z-index: 1; /*Set overflow to hidden, to mask inner square*/
    overflow: hidden; /*Set size and add subtle rounding  		to soften edges*/
    width: 100px;
    height: 100px;
    border-radius: 3px 5px 3px 0;
}
.cnrflash-inner
{
    /*Set position, make larger then 			container and rotate 45 degrees*/
    position: absolute;
    bottom: 0;
    right: 0;
    width: 145px;
    height: 145px;
    -ms-transform: rotate(45deg); /* IE 9 */
    -o-transform: rotate(45deg); /* Opera */
    -moz-transform: rotate(45deg); /* Firefox */
    -webkit-transform: rotate(45deg); /* Safari and Chrome */
    -webkit-transform-origin: 100% 100%; /*Purely decorative effects to add texture and stuff*/ /* Safari and Chrome */
    -ms-transform-origin: 100% 100%;  /* IE 9 */
    -o-transform-origin: 100% 100%; /* Opera */
    -moz-transform-origin: 100% 100%; /* Firefox */
    background-image: linear-gradient(90deg, transparent 50%, rgba(255,255,255,.1) 50%), linear-gradient(0deg, transparent 0%, rgba(1,1,1,.2) 50%);
    background-size: 4px,auto, auto,auto;
    background-color: #aa0101;
    box-shadow: 0 3px 3px 0 rgba(1,1,1,.5), 0 1px 0 0 rgba(1,1,1,.5), inset 0 -1px 8px 0 rgba(255,255,255,.3), inset 0 -1px 0 0 rgba(255,255,255,.2);
}
.cnrflash-inner:before, .cnrflash-inner:after
{
    /*Use the border triangle trick to make  				it look like the ribbon wraps round it's 				container*/
    content: " ";
    display: block;
    position: absolute;
    bottom: -16px;
    width: 0;
    height: 0;
    border: 8px solid #800000;
}
.cnrflash-inner:before
{
    left: 1px;
    border-bottom-color: transparent;
    border-right-color: transparent;
}
.cnrflash-inner:after
{
    right: 0;
    border-bottom-color: transparent;
    border-left-color: transparent;
}
.cnrflash-label
{
    /*Make the label look nice*/
    position: absolute;
    bottom: 0;
    left: 0;
    display: block;
    width: 100%;
    padding-bottom: 5px;
    color: #fff;
    text-shadow: 0 1px 1px rgba(1,1,1,.8);
    font-size: 0.95em;
    font-weight: bold;
    text-align: center;
}

/* Hiding the checkbox, but allowing it to be focused */
.badgebox
{
  opacity: 0;
}

.badgebox + .badge
{
	text-indent: -999999px;
	width: 27px;
}

.badgebox:focus + .badge
{
  box-shadow: inset 0px 0px 5px;
}

.badgebox:checked + .badge
{
  text-indent: 0;
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

                <div class="col-lg-8 mb-3">
                  <div class="card shadow rounded">
                     <div class="card-body"> 
					 
						<form action="" method="POST" enctype="multipart/form-data" >
							<div class="form-group mb-2">
								<label class="fw-semibold  text-black"><?= $page ?></label><br/><br>
								<br>
								<div class="container">
									<div class="row text-center field_wrapper1" >
										<br>
										<br>
										<div class="row">
										    <!--<div class="col-sm-8">-->
										        <div class="form-group mb-2">
													<label class="fw-semibold  text-black" style="float: left;">Enter Email Id</label>
													<input type="email" class="form-control" name="email[]"  id="email"  autocomplete="off"  value="" placeholder="Enter Email">
											    </div> 
										    <!--</div>-->
											<!--<div class="col-sm-4">
										        <div class="form-group mb-2">
													<label class="fw-semibold  text-black" style="float: left;">Event Amount</label>
													<input type="text" class="form-control" name="amount[]"  id="amount"  autocomplete="off"  value="" placeholder="Event Amount">
											    </div> 
										    </div>-->
											
											<input type="hidden" name="event_id"  id="event_id" value="<?=@$_GET['eId']?>">
										</div>
										
										<div class="my-3 text-center">
                                            <a href="javascript:void(0);" title="Add field" class="btn btn-secondary rounded-0 fw-bold add_button1">Add More </a>
                                        </div>
									</div>
								</div>
							</div>
							<small id="pck_error"></small><br/><br/>
							<div class="container">
								<div class="row" id="display_basepck">
								</div>
							</div>
							
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

<link href='<?php echo base_url(); ?>assets/chosen/chosen.min.css' rel='stylesheet' type='text/css'>
<script src='<?php echo base_url(); ?>assets/chosen/chosen.jquery.min.js' type='text/javascript'></script> 
 <script>
 
$(document).ready(function(){
	$("#submitform").on('submit', function(e){
		e.preventDefault();
		
		var arr =[];
		$.each($("input[name='addon']:checked"), function(){
		arr.push($(this).val());
		});
		var userId = $('#userId').val();
		var form_data = new FormData();
		form_data.append('pck', arr);
		form_data.append('userId', userId);
		$.ajax({
		type: 'POST',
		url: '<?php echo base_url('admin/users/add_addon'); ?>',
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
				window.location.href = "<?php echo base_url()?>admin/users/addon_payment?pck="+data.pck+"&&userId="+data.userId+"";
			}
			
			if(data.status == 0){
				swal({title: "Fail!", text: "<strong>"+data.message+"</strong>", type: "error", showConfirmButton: true, html:true}, function(){ window.location.href = " "});
			}
			if(data.vali_error == 1){
				
				if(data.pck_error != ''){
					$('#pck_error').html(data.pck_error);
				}else{
					$('#pck_error').html('');
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
          $("#individual_email").text(email);
        }else{
         
          $("#individual_email").text('Email');
        }
    });
	
	$(document).on('keyup','#truck_no',function(e){
        var phone = $(this).val();
        
        if(phone){
          $("#individual_phone").text(phone);
        }else{
         
          $("#individual_phone").text('phone');
        }
    });
	$(document).on('change','#sport',function(e){
        var sport = $(this).val();
		
       $.ajax({
		type: 'POST',
		url: '<?php echo base_url('admin/users/getSport_byId'); ?>',
		data: {sportId : sport},
		success: function(data){
			$("#individual_sport").text(data);
		}
		});
        
    });
	
	$(document).on('change','#userstatus',function(e){
        var status = $(this).val();
        
        if(status == 1){
          $("#individual_status").text('Active');
        }
		if(status == 0){
          $("#individual_status").text('Inactive');
        }
    });
	
upload_image.onchange = evt => {
const [file] = upload_image.files
if (file) {
blah.src = URL.createObjectURL(file)
}
}

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
	$("#individual_address").text(address);
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
$('.addonpck').click(function(){
	var arr =[];
	$.each($("input[name='addon']:checked"), function(){
	arr.push($(this).val());
	});
	console.log(arr)
	 var userId = '<?php echo $this->uri->segment(4)?>';
	 
		 $.ajax({
			 url:"<?php echo base_url(); ?>admin/users/get_addonpackage",
			 method:"POST",
			 data:{addonpck:arr, userId:userId},
			 success:function(data)
			 {
				  $('#display_basepck').html(data);
			 }
		 });
});
});

$(document).ready(function(){
	$('#sel1').chosen({disable_search_threshold: 10,width:'200px'});
	$('#sel2').chosen({width:'200px'});
	$('#sel3').chosen({no_results_text:"Not found",width:'200px'});
	$('#sel4').chosen({max_selected_options:4,width:'100%'});
	$('#sel5').chosen({allow_single_deselect:true,width:'200px'});
});
</script>
<script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button1'); //Add button selector
    var wrapper = $('.field_wrapper1'); //Input field wrapper
	
	var fieldHTML = '<div class="row"><div class="form-group mb-2"><label class="fw-semibold  text-black" style="float: left;">Enter Email Id</label><input type="email" class="form-control" name="email[]"  id="email"  autocomplete="off"  value="" placeholder="Enter Email"></div>  <a href="javascript:void(0);" class="btn btn-secondary rounded-0 fw-bold remove_button1" style="width: 14%;">Remove</a> </div>'; //New input field html 
	
	//var fieldHTML = '<div class="row"><div class="col-sm-8"><div class="form-group mb-2"><label class="fw-semibold  text-black" style="float: left;">Enter Email Id</label><input type="email" class="form-control" name="email[]"  id="email"  autocomplete="off"  value="" placeholder="Enter Email"></div> </div><div class="col-sm-4"><div class="form-group mb-2"><label class="fw-semibold  text-black" style="float: left;">Event Amount</label><input type="text" class="form-control" name="amount[]"  id="amount"  autocomplete="off"  value="" placeholder="Event Amount"></div> </div> <a href="javascript:void(0);" class="btn btn-secondary rounded-0 fw-bold remove_button1" style="width: 14%;">Remove</a></div>';
    var x = 1; //Initial field counter is 1
    

    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
			$(wrapper).find('.textarea').summernote();
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button1', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>