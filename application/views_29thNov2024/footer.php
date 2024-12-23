<?php
$site_setting = $this->db->query("select facebook, twitter, instagram, linkedin from  settings")->row();
?>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content" style="bottom: 30px;margin: 23px;">
		<!--<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		</div>-->
		
		<div class="modal-footer">
			<div class="modal-body" id="msg_noti_text">
			  
			</div>
				<a href="javascript:void(0)" id="viewPost" class="btn btn-default update-Post" style="border-color: #adadad !important;">View</a>
				<a href="javascript:void(0);" id="okPost" class="btn btn-default update-Post" data-dismiss="modal" style="border-color: #adadad !important;">Ok</a>
		   
		</div>
	  </div>
	</div>
</div>
<!-- Footer Section Start -->
        <div class="footer-section" style="background-image: url(<?=base_url('assets/images/')?>bg/footer_bg1.jpg);">
            <div class="container">
                <div class="footer-newsletter">
                    <div class="row">
                        <div class="col-lg-5 col-12 text-sm-start text-center">
                            <div class="footer-title">
                                <span>Subscribe To Newsletter</span>
                                <h4>Subscribe to receive updates and promotions</h4>
                            </div>
                        </div>
                        <div class="col-lg-7 col-12">
                            <div class="footer-newsletter-form">
                                <form id="subscribeForm" method="POST">
                                    <input type="text" placeholder="Your Email" id="email" name="email">
									<small id="email_err"></small>
                                    <button class="btn btn-primary" type="submit">Subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-widget-social">
                <div class="container">
                    <div class="row text-center">
                        <div class="col-12">
                            <div class="social-title">
                                <h4 class="title">Connect With Us</h4>
                            </div>
                        </div>
                        <div class="col-12">
                            <ul class="social-list">
                                <li><a href="<?=@$site_setting->facebook?>"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="<?=@$site_setting->twitter?>"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="<?=@$site_setting->instagram?>"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="<?=@$site_setting->linkedin?>"><i class="fab fa-linkedin"></i></a></li>
                                <!--<li><a href="www.dribbble.html"><i class="fab fa-dribbble"></i></a></li>
                                <li><a href="www.behance.html"><i class="fab fa-behance"></i></a></li>-->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-widget-navigation text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="footer-navigation">
                                <ul>
                                    <li><a href="<?=base_url('event/add')?>">Plan an Event</a></li>
									<?php if ($this->session->userdata('loguserId') && $this->session->userdata('is_login')) { ?>
                                        <li><a href="<?=base_url('dashboard')?>">My Account</a></li>
										<li><a href="<?=base_url('event/my-event')?>">My Events</a></li>
									<?php } ?>
                                    <li><a href="<?=base_url('contact-us')?>">Contact Us</a></li>
                                    <li><a href="<?=base_url('help')?>">Help</a></li>
                                    <li><a href="<?=base_url('frequently-asked-questions')?>">Faqs</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Copyright Start -->
            <div class="footer-copyright-area">
                <div class="container">
                    <div class="footer-copyright-wrap">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="copyright-text">
                                    <p class="text-white">&copy; <?=date('Y')?> Made to Split . All Rights Reserved</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <ul class="text-center text-lg-end">
                                    <li class="d-inline-block"><a href="<?=base_url('terms-and-condition')?>" class="text-white">Terms & Conditions</a></li>
                                    <li class="d-inline-block ps-4"><a href="<?=base_url('privacy-policy')?>" class="text-white">Privacy Policy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer Copyright End -->
        </div>
        <!-- Footer Section End -->

        <!-- back to top start -->
        <div class="progress-wrap">
            <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </div>
        <!-- back to top end -->

    </div>

    <!-- JS
    ============================================ -->
    <script src="<?=base_url('assets/js/')?>vendor/jquery-1.12.4.min.js"></script>
    <script src="<?=base_url('assets/js/')?>vendor/modernizr-3.11.2.min.js"></script>
    <script src="<?=base_url('assets/js/')?>plugins/popper.min.js"></script>
    <script src="<?=base_url('assets/js/')?>plugins/bootstrap.min.js"></script>
    <script src="<?=base_url('assets/js/')?>plugins/swiper-bundle.min.js"></script>
    <script src="<?=base_url('assets/js/')?>plugins/aos.js"></script>
    <script src="<?=base_url('assets/js/')?>plugins/waypoints.min.js"></script>
    <script src="<?=base_url('assets/js/')?>plugins/back-to-top.js"></script>
    <script src="<?=base_url('assets/js/')?>plugins/jquery.counterup.min.js"></script>
    <script src="<?=base_url('assets/js/')?>plugins/appear.min.js"></script>
    <script src="<?=base_url('assets/js/')?>plugins/jquery.magnific-popup.min.js"></script>
    <script src="<?=base_url('assets/js/')?>plugins/lightbox.min.js"></script>
    <script src="<?=base_url('assets/js/')?>plugins/gijgo.min.js"></script>
    <script src="<?=base_url('assets/js/')?>plugins/owl.carousel.min.js"></script>
    <script src="<?=base_url('assets/js/')?>main.js"></script>
	<script>
		// $(document).ready(function(){
			// // setInterval(function(){ 
			// // $.post("<?php echo base_url();?>notification/get_notification", {data : 'get'}, function(data){
			// // //alert(data);
			// // if(data > 0){
			// // $('#noti').show();
			// // $('#noti').text(data);
			// // }else{
			// // $('#noti').hide();
			// // }
			// // });
			// // },5000);

			// setInterval(function(){ 
				// $.post("<?php echo base_url();?>event/get_msgnotification", {data : 'get'}, function(data){
					// //alert(data);
					// if(data > 0){
					  // //$('#msgnoti').show();
					 // // $('#msgnoti').text(data);
					 // $('#myModal').modal('show');
					// }else{
					  // $('#myModal').hide();
					// }
				// });
			// },5000);
		// });	

        function newPostUpdate(){
			jQuery.ajax({
				url:'<?php echo base_url(); ?>event/get_msgnotification',
				dataType:'json',
				success:function(data){
					if(data.status == 1){
						// if(window.location.href == 'https://kodfans.com/' || window.location.href == 'https://kodfans.com/home'){
							// //location.reload(); 
							// $.ajax({
								// url : "<?php echo base_url(); ?>home/hidepostModel",
								// data:{post_id : data.postId},
								// method:'POST',
								// success:function(response) {
									// location.reload(); 
								// }
							// });
						// }else{
							
						// }
						if(data.group_msg == 1){
							$('#msg_noti_text').html('<h4 style="font-size:14px;"><span class="fa fa-bell" id="msg_noti_text"></span> &nbsp; &nbsp; You have New Group Message notification.</h4>');
						}else{
							$('#msg_noti_text').html('<h4 style="font-size:14px;"><span class="fa fa-bell" id="msg_noti_text"></span> &nbsp; &nbsp; You have new message notification.</h4>');
						}
						$('#myModal').modal('show');
						$('#viewPost').attr('data-id', data.chat_id);
						$('#viewPost').attr('event-id', data.event_id);
						$('#okPost').attr('data-id', data.chat_id);
						$('#okPost').attr('event-id', data.event_id);
						//$("#uploadForm").css({"pointer-events":"visible","opacity":"1.4"});
					}else{
						$('#myModal').modal('hide');
					}
					
				}
			});
		}

		setInterval(function(){
			newPostUpdate();
		},5000);

        $(document).ready(function() {
			//$('.send_tip').click(function(){
            $(document).on('click', '#viewPost', function() { 
				var chat_id = $(this).attr('data-id'); //get the attribute value
				var event_id = $(this).attr('event-id'); //get the attribute value
               
				$.ajax({
					url : "<?php echo base_url(); ?>event/updatemsg_notification",
					data:{chat_id : chat_id, event_id :event_id},
					method:'POST',
					success:function(response) {
						if(response == 1){
							$('#myModal').modal('hide');
							window.location.href = "<?=base_url('event/details?eId=')?>"+event_id+"";
						}
					 
					}
				});
			});
		});		
		
		$(document).ready(function() {
			//$('.send_tip').click(function(){
            $(document).on('click', '#okPost', function() { 
				var chat_id = $(this).attr('data-id'); //get the attribute value
				var event_id = $(this).attr('event-id'); //get the attribute value
               
				$.ajax({
					url : "<?php echo base_url(); ?>event/updatemsg_notification",
					data:{chat_id : chat_id, event_id :event_id},
					method:'POST',
					success:function(response) {
						if(response == 1){
							$('#myModal').modal('hide');
							//window.location.href = "<?=base_url('event/details?eId=')?>"+event_id+"";
						}
					 
					}
				});
			});
		});
		
		
$(document).ready(function(){
	$("#subscribeForm").on('submit', function(e){
		e.preventDefault();
		//var form_data = new FormData(); 	
		var form_data = new FormData(); 
		
		
		var email = $('#email').val(); 
		form_data.append("email", email);

		$.ajax({
		type: 'POST',
		url: '<?php echo base_url('subscribe/addSubscriber'); ?>',
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
				$('#email').val('');
				swal({title: "Sucess!", text: "<strong>"+data.message+"</strong>", type: "success", showConfirmButton: true, html:true});
			}
			if(data.status == 0){
				swal({title: "Fail!", text: "<strong>"+data.message+"</strong>", type: "error", showConfirmButton: true, html:true});
			}
			if(data.vali_error == 1){
				if(data.email_err != ''){
					$('#email_err').html(data.email_err);
				}else{
					$('#email_err').html('');
				}

			}else{
				$('#email_err').html('');
			}
			
		}
		});
	});

});

	</script>
</body>
</html>