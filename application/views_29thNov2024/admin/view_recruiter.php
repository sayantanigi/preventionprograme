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
/*Crop*/
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
                            <li class="breadcrumb-item"><a href="<?=base_url('admin/dashboard')?>">Dashboard</a></li>
                            <li class="breadcrumb-item active"><?= $title ?></li>
                        </ol>
                    </div>

                </div>
            </div>
           </div>

            <div class="row">

                <div class="col-lg-8 mb-3">
                  <div class="card shadow rounded">
                     <div class="card-body">    
                        <div class="row">
								<div class="container">
									<div class="col-md-12">
										<div class="profile clearfix">                            
											<div class="image item" id="Cover-Image">
											    <img src="<?= !empty(@$user->cover_image) ? base_url('uploads/cover_image/'.@$user->cover_image.'') : base_url('uploads/bnr.jpg'); ?>" class="img-cover">
											</div>                            
											<div class="user clearfix">
												<div class="avatar item" id="itemImage">
													<img src="<?= !empty(@$user->profile_image) ? base_url('uploads/profile_image/'.@$user->profile_image.'') : base_url('uploads/unnamed.jpg'); ?>" class="img-thumbnail img-profile">
												</div>                                
												<h2><span id="f-name"><?=@$user->first_name; ?></span> <span id="l-name"><?=@$user->last_name; ?></span></h2>                             
												<!--<div class="actions">
												<div class="btn-group">
												<button class="btn btn-default btn-sm tip btn-responsive" title="" data-original-title="Add to friends"><span class="glyphicon glyphicon-plus glyphicon glyphicon-white"></span> Friends</button>
												<button class="btn btn-default btn-sm tip btn-responsive" title="" data-original-title="Send message"><span class="glyphicon glyphicon-envelope glyphicon glyphicon-white"></span> Message</button>
												<button class="btn btn-default btn-sm tip btn-responsive" title="" data-original-title="Recommend"><span class="glyphicon glyphicon-share-alt glyphicon glyphicon-white"></span> Recommend</button>
												</div>
												</div>-->                                                                                                
											</div>                          
											<div class="info">
												<p><span class="glyphicon glyphicon-globe"></span> <span class="title">Address:</span>  <?=@$user->address; ?></p>                                    
												<!--<p><span class="glyphicon glyphicon-gift"></span> <span class="title">Date of birth:</span> 14.02.1989</p>-->											
											</div>                              
										</div>
									</div>
								</div>
                                <div class="col-lg-12 mb-3">
                                    
									<!--<p class="mb-2 mt-2"><strong>First Name:</strong> <span class="text-success fw-semibold" id="first_name"><?=@$user->first_name; ?></span></p>
									<p class="mb-2 mt-2"><strong>Last Name:</strong> <span class="text-success fw-semibold" id="last_name"><?=@$user->last_name; ?></span></p>
                                    <p class="mb-2 mt-2"><strong>Email:</strong> <span class="text-success fw-semibold" id="individual_email"><?=@$user->email; ?></span></p>
                                    <p class="mb-2 mt-2"><strong>Phone:</strong> <span class="text-success fw-semibold" id="individual_phone"><?=@$user->phone; ?></span></p>
                                    <p class="mb-2 mt-2"><strong>Address:</strong> <span class="text-success fw-semibold" id="individual_address"><?=@$user->address; ?></span></p>
									<?php
									   //$sports = $this->db->query("select * from sports where id = ".@$user->sport_id."")->row();
									   if(@$user->status == '1'){
										 $status = 'Active'; 
									   }else{
										 $status = 'Inactive';   
									   }
									?>
                                    <p class="mb-2 mt-2"><strong>Sport:</strong> <span class="text-success fw-semibold" id="individual_sport"><?=@$sports->sports_name; ?></span></p>
                                    <p class="mb-2 mt-2"><strong>Status:</strong> <span class="text-success fw-semibold" id="individual_status"><?=@$status; ?></span></p>-->
									
									<div class="card rounded">
									<div class="card-body">
									
									<div class="mt-3"> <label class="tx-11 font-weight-bold mb-0 "><h6>First Name</h6></label><p class="text-muted" id="first_name"><?=@$user->first_name; ?></p></div>
									
									<div class="mt-3"> <label class="tx-11 font-weight-bold mb-0 "><h6>Last Name</h6></label><p class="text-muted" id="last_name"><?=@$user->last_name; ?></p></div>
									
									<div class="mt-3"> <label class="tx-11 font-weight-bold mb-0 "><h6>Email</h6></label><p class="text-muted" id="recruiter_email"><?=@$user->email; ?></p></div>
									
									<div class="mt-3"> <label class="tx-11 font-weight-bold mb-0 "><h6>Phone</h6></label><p class="text-muted" id="recruiter_phone"><?=@$user->phone; ?></p></div>
									
									<?php
									   //$sports = $this->db->query("select * from sports where id = ".@$user->sport_id."")->row();
									   if(@$user->status == '1'){
										 $status = 'Active'; 
									   }else{
										 $status = 'Inactive';   
									   }
									?>
									
									<!--<div class="mt-3"> <label class="tx-11 font-weight-bold mb-0"><h6>Sport</h6></label><p class="text-muted" id="coach_sport"><?=@$sports->sports_name; ?></p></div>-->
									
									
									
									<div class="mt-3"> <label class="tx-11 font-weight-bold mb-0 "><h6>Status</h6></label><p class="text-muted" id="recruiter_status"><?=@$status; ?></p></div>
									
									<div class="d-flex align-items-center justify-content-between mb-2">
									<h6 class="card-title mb-0">Address</h6>
									</div>
									
									<p id="recruiter_address"><?=@$user->address; ?></p>
									
									<!--<div class="mt-3 d-flex social-links">
									<a href="javascript:;" class="btn d-flex align-items-center justify-content-center border mr-2 btn-icon github"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github" data-toggle="tooltip" title="" data-original-title="github.com/nobleui"> <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path> </svg> </a>
									<a href="javascript:;" class="btn d-flex align-items-center justify-content-center border mr-2 btn-icon twitter"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter" data-toggle="tooltip" title="" data-original-title="twitter.com/nobleui"> <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path> </svg> </a> 
									<a href="javascript:;" class="btn d-flex align-items-center justify-content-center border mr-2 btn-icon instagram"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram" data-toggle="tooltip" title="" data-original-title="instagram.com/nobleui"> <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect> <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path> <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line> </svg> </a>
									</div>-->
									
									</div>
									</div>
									
									
                                    
                                   
                                </div>
                                <!--<div class="col-lg-5">
                                    <div class="owl-carousel owl-theme" id="dealslide">
                                        <div class="item" id="itemImage">
                                            <img src="<?= !empty(@$user->profile_image) ? base_url('uploads/profile_image/'.@$user->profile_image.'') : base_url('uploads/unnamed.jpg'); ?>" class="owl-img-fluid" style="width:70%;height:150px;">
                                            
                                        </div>
                                    </div>
                                    <p class="fs-6 text-center mb-2"> <span style="margin-left: -3.75rem !important;"class="percentoff fw-bold ms-1 text-orange" >Profile Image</span></p>
                                   
                                </div>-->
                              
                                  
                                
                            </div>
                     </div>
                  </div>      
                </div>
                
                <!--<div class="col-lg-6 mb-3">
                    <div class="card shadow rounded">
                       <div class="card-body">
                            <div class="row">
                                <div class="col-lg-7 mb-3">
                                    <h2 class="fs-5 fw-semibold mb-0" id="ven_name">Player Name : <?=ucfirst(@$user->first_name); ?> &nbsp; <?=ucfirst(@$user->last_name); ?></h2>
                                   
                                    <p class="mb-2 mt-2"><strong>Email :</strong> <span class="text-success fw-semibold"><?=@$user->email; ?></span></p>
                                    <p class="mb-2 mt-2"><strong>Phone :</strong> <span class="text-success fw-semibold"><?=@$user->phone; ?></span></p>
                                    <p class="mb-2 mt-2"><strong>Address :</strong> <span class="text-success fw-semibold"><?=@$user->address; ?></span></p>
                                    <p class="mb-2 mt-2"><strong>Status :</strong> <span class="text-success fw-semibold"><?php echo (@$user->status == 1) ? 'Active' : 'Inactive'?></span></p>
                                    
                                   
                                </div>
                                <div class="col-lg-5">
                                    <div class="owl-carousel owl-theme" id="dealslide">
                                        <div class="item">
                                            <img src="<?= !empty(@$user->profile_image) ? base_url('uploads/profile_image/'.@$user->profile_image.'') : base_url('uploads/unnamed.jpg'); ?>" class="owl-img-fluid">
                                            <a href="javascript:void(0);" class="closeimg"><i class="fa fa-times"></i></a>
                                        </div>
                                    </div>
                                    <p class="fs-6 text-center mb-2"><span ></span><span class="fw-bold text-success ms-1" >  </span> <span class="percentoff fw-bold ms-1 text-orange"><?=ucfirst(@$user->first_name); ?> &nbsp; <?=ucfirst(@$user->last_name); ?></span></p>

                                </div>
                               
                                <hr>
                                <!--<div class="col-lg-12 col-md-12 col-sm-12">
                                    <p><span class="fw-semibold"><strong>About Us:</strong></span> <span id="ven_desc"></span></p>
                                    <div>      
                                        <p><span class="fw-semibold"><strong>Business Phone:</strong></span> <span id="business_phone"></span></p>
                                        <p><span class="fw-semibold"><strong>Business URL:</strong></span> <span id="business_url"></span></p>
                                    </div>    
                                </div>  -->  
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div id="image_preview"></div> 
                                </div> 
                            </div>
                        </div>
                    </div>

                     <div class="col-lg-12 col-md-12 d-none" id="form_error">
                        <div class="alert alert-danger fade show" role="alert">
                            <i class="mdi mdi-block-helper me-2"></i>
                            <span id="form_error_txt">A simple danger alert—check it out!</span>
                        </div>
                    </div>    
                </div>-->


            </div>
        </div>
     </section>
   </div>
 </div>

 <script>
    var owl_image_Arr = [];

    function preview_image(upload_type) {
        if(upload_type == 'upload'){
           var total_file = document.getElementById("upload_image").files.length;   
        }else{
           var total_file = owl_image_Arr.length;   
        }
        
        var owl_image = '';
        
        if(total_file==0){
           owl_image += '<div class="item">'+
                            '<img src="<?= base_url('dist/images/noimage.jpg') ?>" class="owl-img-fluid">'+
                        '</div>';   
        }else{
           for(var i=0;i<total_file;i++){
              if(upload_type == 'upload'){
                 //console.log(event.target.files[i].name);
                 owl_image_Arr.push(URL.createObjectURL(event.target.files[i]));
                 var image_src = URL.createObjectURL(event.target.files[i]);
              }else{
                 var image_src = owl_image_Arr[i];
              }
              
              /*owl_image += '<div class="item">'+
                                '<img src="'+image_src+'" class="owl-img-fluid">'+
                                '<a href="javascript:void(0);" class="closeimg" data-index="'+i+'"><i class="fa fa-times"></i></a>'+
                            '</div>';*/

              owl_image += '<div class="item">'+
                                '<img src="'+image_src+'" class="owl-img-fluid">'+
                            '</div>';                        
           }
        }
        
        owl.trigger('replace.owl.carousel', [owl_image]);
        owl.trigger('refresh.owl.carousel');
   }
   

    //HANDLING CHECKOUT FORM
     $(document).on('submit', '#manage_deal_form', function(e){
         e.preventDefault();
         var from = $("input[name=deal_start_date]").val(); 
         var to =$("input[name=deal_end_date]").val(); 

                if(Date.parse(from) > Date.parse(to)){
                    var errorRspnsArr = ["Deal End Date must be greater than Start Date!",'error','#DD6B55'];
                        alert_func(errorRspnsArr);
                    return false;
                }
         var deal_normal_price = parseFloat($('[name=deal_normal_price]').val());
         if(deal_normal_price == 0.00){
          var errorRspnsArr = ["Deal normal price must be greater than 0!",'error','#DD6B55'];
            alert_func(errorRspnsArr);
          return false;
         }
        var deal_price = parseFloat($('[name=deal_price]').val());
        if(deal_normal_price < deal_price){
          var errorRspnsArr = ["Deal normal price must be greater than deal price!",'error','#DD6B55'];
            alert_func(errorRspnsArr);
          return false;
        }

         var textareaContent = $('.summernote').summernote('code');
         var compareEmptyContentFirstCase =strcmp(textareaContent,'<ul><li><br></li></ul>');
         var compareEmptyContentSecondCase =strcmp(textareaContent,'<p><br></p>');

         if(compareEmptyContentFirstCase == 1 || compareEmptyContentSecondCase == 1 || textareaContent.length == 0){
            var errorRspnsArr = ["Deal Details can't be empty!",'error','#DD6B55'];
            alert_func(errorRspnsArr);
            return false;
         }else{

             //Throwing ajax request in server 
             $.ajax({
              url: adminUrl+'deals/create',
              method:'POST',
              data: new FormData(this),
              contentType:false,
              processData:false,
              beforeSend: function() {
                 
              },
              success:function(resposeData){
                 var data = JSON.parse(resposeData);
                 //console.log(data);
                 if(data.check == 'success'){
                   var responseArr = [data.msg,'success','#A5DC86'];
                   //var redirectURL = adminUrl+'vendors/edit/'+data.vendorId;    
                   var redirectURL = adminUrl+'deals/lists';
                   alert_response(responseArr,redirectURL);
                   return true; 
                 }else{
                    var responseArr = [data.msg,'error','#DD6B55'];
                    //var redirectURL = adminUrl+'vendors/edit/'+data.vendorId;
                    var redirectURL = adminUrl+'deals/lists';   
                    alert_response(responseArr,redirectURL);
                    return false;
                 }
              }
            });
         }    
    });
 </script> 

 

