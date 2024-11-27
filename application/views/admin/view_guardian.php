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
											    <img src="<?= !empty(@$guardian[0]->cover_image) ? base_url('uploads/guardian/'.@$guardian[0]->cover_image.'') : base_url('uploads/bnr.jpg'); ?>" class="img-cover">
											</div>                            
											<div class="user clearfix">
												<div class="avatar item" id="itemImage">
													<img src="<?= !empty(@$guardian[0]->profile_image) ? base_url('uploads/guardian/'.@$guardian[0]->profile_image.'') : base_url('uploads/unnamed.jpg'); ?>" class="img-thumbnail img-profile">
												</div>                                
												<h2><span id="f-name"><?=@$guardian[0]->first_name; ?></span> <span id="l-name"><?=@$guardian[0]->last_name; ?></span></h2>                                                                       
											</div>                          
											<div class="info">
												<p><span class="glyphicon glyphicon-globe"></span> <span class="title">Address:</span>  <?=@$guardian[0]->address; ?></p>                                    										
											</div>                              
										</div>
									</div>
								</div>
								<div class="col-lg-12 mb-3">
									<div class="card rounded">
										<div class="card-body">
											<div class="mt-3"> <label class="tx-11 font-weight-bold mb-0 "><h6>Guardian Name</h6></label><p class="text-muted" id="game_name"><?=@$guardian[0]->first_name; ?> <?=@$guardian[0]->last_name; ?></p></div>
											
											<div class="mt-3"> <label class="tx-11 font-weight-bold mb-0 "><h6>Guardian Email</h6></label><p class="text-muted" id="game_description"><?=@$guardian[0]->email; ?></p></div>
											
											<div class="mt-3"> <label class="tx-11 font-weight-bold mb-0 "><h6>Guardian Phone</h6></label><p class="text-muted" id="game_type"><?=@$guardian[0]->phone; ?></p></div>
											
											<div class="mt-3"> <label class="tx-11 font-weight-bold mb-0 "><h6>Address</h6></label><p class="text-muted" id="sport"><?=@$guardian[0]->address; ?></p></div>
											<?php
											    if(@$guardian[0]->status == 1){
													$status = 'Active';
												}else{
													$status = 'Inactive';
												}
											?>
											<div class="mt-3"> <label class="tx-11 font-weight-bold mb-0 "><h6>Status</h6></label><p class="text-muted" id="organizer"><?=ucfirst(@$status); ?></p></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>      
				</div>
            </div>
        </div>
     </section>
   </div>
 </div>
<script></script> 