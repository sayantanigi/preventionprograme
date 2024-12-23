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
	body{
		margin-top:20px;
	}

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
                    <h4 class="mb-0"><?= $page ?></h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?=base_url('admin/dashboard')?>">Dashboard</a></li>
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
                        <div class="row">
						
								<!--<div class="container">
									<div class="col-md-12">
										<div class="profile clearfix">                            
											<div class="image item" id="Cover-Image">
											    <img src="<?= !empty(@$user->cover_image) ? base_url('uploads/cover_image/'.@$user->cover_image.'') : base_url('uploads/bnr.jpg'); ?>" class="img-cover">
											</div>                            
											<div class="user clearfix">
												<div class="avatar item" id="itemImage">
													<img src="<?= !empty(@$user->image) ? base_url('uploads/profile/'.@$user->image.'') : base_url('uploads/unnamed.jpg'); ?>" class="img-thumbnail img-profile">
												</div>                                
												<h2><span id="f-name"><?=@$user->fname; ?></span> <span id="l-name"><?=@$user->lname; ?></span></h2>                             
												                                                                                               
											</div>                          
											<div class="info">
												<p><span class="glyphicon glyphicon-globe"></span> <span class="title">Address:</span>  <?=@$user->address; ?></p>                                    									
											</div>                              
										</div>
									</div>
								</div>--->
								
                                <div class="col-lg-12 mb-3">
									
									<div class="card rounded">
										<div class="card-body">
											<?php
											    //print_r($result);
												if(!empty(@$result[0]->user_id)){
													$user_info = $this->db->query("select fname, lname from users where id = ".@$result[0]->user_id."")->row();
													 $uname = @$user_info->fname .' '. @$user_info->lname;
												}else{
												     $uname = '';
												}
												
												if(!empty(@$result[0]->event_id)){
													$event = $this->db->query("select event_name, user_id from event where event_id = ".@$result[0]->event_id."")->row();
													$eventname = @$event->event_name;
													$event_host_id = @$event->user_id;
												}else{
												    $eventname = '';
												    $event_host_id = '';
												}
												
												if(@$result[0]->payment_mode == 2){
													$payment_mode = '<span style="background: #2ab52a;padding: 5px; font-size: 13px;font-weight: 700;color: #fff;border-radius: 6px;">Paypal</span>';
												}else{
													$payment_mode = '<span style="background: #eb1414;padding: 5px; font-size: 13px;font-weight: 700;color: #fff;border-radius: 6px;">Stripe</span>';
												}
											?>
											
											<div class="mt-3"> <label class="tx-11 font-weight-bold mb-0 "><h6>Paid By</h6></label><p class="text-muted" id="first_name"><?=@$uname; ?></p></div>
											
											<div class="mt-3"> <label class="tx-11 font-weight-bold mb-0 "><h6>Event Name</h6></label><p class="text-muted" id="last_name"><?=@$eventname; ?></p></div>
											
											<?php
												if(!empty(@$event_host_id)){
													$host_info = $this->db->query("select fname, lname from users where id = ".@$event_host_id."")->row();
													$hostname = @$host_info->fname .' '. @$host_info->lname;
												}else{
													$hostname = '';
												}
											?>	
											
											<div class="mt-3"> <label class="tx-11 font-weight-bold mb-0 "><h6>Event Host</h6></label><p class="text-muted" id="last_name"><?=@$hostname; ?></p></div>
											
											<div class="mt-3"> <label class="tx-11 font-weight-bold mb-0 "><h6>Amount</h6></label><p class="text-muted" id="recruiter_email"><?='$'.@$result[0]->amount; ?></p></div>
											
											<div class="mt-3"> <label class="tx-11 font-weight-bold mb-0 "><h6>Payment Mode</h6></label><p class="text-muted" id="recruiter_phone"><?=@$payment_mode; ?></p></div>
											
											<?php 
												if(@$result[0]->payment_mode == 2){
													$payout = $this->db->query("select * from payout_report where tran_id = ".@$result[0]->id."")->num_rows();
												}else{
													$payout = 0;
												}
											?>
											<?php if($payout > 0){
												$payout_status = "<span style='font-size: 15px;font-weight: 700;'>Paid</span>";
											}else{
												$payout_status = "<span style='font-size: 15px;font-weight: 700;'>Not Paid</span>";
											}?>	
											
											<div class="mt-3"> <label class="tx-11 font-weight-bold mb-0 "><h6>Payout Status</h6></label><p class="text-muted" id="recruiter_phone"><?=@$payout_status; ?></p></div>
											<?php
												if(@$user->status == '1'){
													$status = 'Active'; 
												}else{
													$status = 'Inactive';   
												}
											?>
											<div class="mt-3"> <label class="tx-11 font-weight-bold mb-0 "><h6>Payment Status</h6></label><p class="text-muted" id="recruiter_status"><?=@$result[0]->status ?></p></div>
											
											<div class="mt-3"> <label class="tx-11 font-weight-bold mb-0 "><h6>Address</h6></label><p class="text-muted" id="recruiter_status"><?=@$result[0]->address ?></p></div>
											
											<div class="mt-3"> <label class="tx-11 font-weight-bold mb-0 "><h6>Zipcode</h6></label><p class="text-muted" id="recruiter_status"><?=@$result[0]->zipcode ?></p></div>
											
											<div class="mt-3"> <label class="tx-11 font-weight-bold mb-0 "><h6>Transaction Id</h6></label><p class="text-muted" id="recruiter_status"><?=@$result[0]->tran_id ?></p></div>
											
											<div class="mt-3"> <label class="tx-11 font-weight-bold mb-0 "><h6>Order Id</h6></label><p class="text-muted" id="recruiter_status"><?=@$result[0]->order_id ?></p></div>
											
											
										</div><br/>
										
										<!--<div class="container-fluid">
										    <h4>Social</h4>
											<div class="row">
												<div class="sicon" style="display: inline-flex;">
													<div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 text-center">
														<div class="icon-circle">
														    <a href="<?=@$user->facebook; ?>" class="ifacebook" title="Facebook"><i class="fab fa-facebook" style="font-size: 30px;"></i></a>
														</div>
													</div>
													<div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 text-center">
														<div class="icon-circle">
														    <a href="<?=@$user->twitter; ?>" class="itwittter" title="Twitter"><i class="fab fa-twitter" style="font-size: 30px;"></i></a>
														</div>
													</div>
													<div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 text-center">
														<div class="icon-circle">
														    <a href="<?=@$user->pinterest; ?>" class="igoogle" title="Google+"><i class="fab fa-pinterest-p" style="font-size: 30px;"></i></a>
														</div>
													</div>
												</div>
											</div>
										</div>-->
									
									</div> 

									
                                </div>
                            </div>
                     </div>
                  </div>      
                </div>
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