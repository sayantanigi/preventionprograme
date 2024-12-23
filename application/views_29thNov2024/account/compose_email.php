<script src="<?php echo base_url('assets/editor/')?>tinymce.min.js"></script>
<script src="<?php echo base_url('assets/editor/')?>tinymce-jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<style>
.setting-menu {
  list-style-type: none;
  margin: 0;
  padding: 0;
}

.setting-menu > li a {
  display: block;
  width: 60px;
  
}

.onoffswitch {
    position: relative; width: 90px;
    -webkit-user-select:none; -moz-user-select:none; -ms-user-select: none;
}

.onoffswitch-checkbox {
    display: none;
}

.onoffswitch-label {
    display: block; overflow: hidden; cursor: pointer;
    border: 2px solid #999999; border-radius: 20px;
}

.onoffswitch-inner {
    display: block; width: 200%; margin-left: -100%;
    -moz-transition: margin 0.3s ease-in 0s; -webkit-transition: margin 0.3s ease-in 0s;
    -o-transition: margin 0.3s ease-in 0s; transition: margin 0.3s ease-in 0s;
}

.onoffswitch-inner:before, .onoffswitch-inner:after {
    display: block; float: left; width: 50%; height: 30px; padding: 0; line-height: 30px;
    font-size: 14px; color: white; font-family: Trebuchet, Arial, sans-serif; font-weight: bold;
    -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box;
}

.onoffswitch-inner:before {
    content: "ON";
    padding-left: 10px;
    background-color: #2FCCFF; color: #FFFFFF;
}

.onoffswitch-inner:after {
    content: "OFF";
    padding-right: 10px;
    background-color: #EEEEEE; color: #999999;
    text-align: right;
}

.onoffswitch-switch {
    display: block; width: 18px; margin: 6px;
    background: #FFFFFF;
    border: 2px solid #999999; border-radius: 20px;
    position: absolute; top: 0; bottom: 0; right: 56px;
    -moz-transition: all 0.3s ease-in 0s; -webkit-transition: all 0.3s ease-in 0s;
    -o-transition: all 0.3s ease-in 0s; transition: all 0.3s ease-in 0s; 
}

.onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-inner {
    margin-left: 0;
}

.onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-switch {
    right: 0px; 
}
.fade:not(.show) {
    opacity: 1 !important;
}

.modal-dialog {
    max-width: 70%!important;
    margin: 1.75rem auto !important;
}

.tox-notifications-container{
	display:none !important;
}
.tox-statusbar__branding{
	display:none !important;
}
.tox-tinymce{
	height:30rem !important;
}
</style>
<?php
if(!empty(@$result)){
	$get_result = @$result;
}
?>
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
				
                    <?php $this->load->view('account/compose_menu')?>
					
                    <div class="col-lg-8">
                        <div class="speaker-informations1">
							  
                        <div class="bg-light p-5 shadow border">
                            <form class="contact-form" id="productForm_1" method="POST" action="<?=base_url('mailer/send_new_mail')?>" enctype="multipart/form-data">
                                
                                <div class="mb-4">
                                    <label class="fw-semibold">Subject</label>
                                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Enter Subject" value="<?=!empty(@$get_result->subject) ? @$get_result->subject : ''?>">
									
									<input type="hidden" class="form-control" name="id" id="id"  value="<?=!empty(@$get_result->id) ? @$get_result->id : ''?>">
									<small id="subject_err"></small>
                                </div>
                                <div class="mb-4">
                                    <label class="fw-semibold">Body</label>
                                    <textarea class="form-control" placeholder=" Body" name="body" id="body"><?=!empty(@$get_result->body) ? @$get_result->body : ''?></textarea>
									<small id="body_err"></small>
                                </div>

                                <div class="mb-4">
                                    <label class="fw-semibold">Attachment</label>
                                    <input type="file" class="form-control" name="attachment" id="attachment">
									<!--<div class="eventphoto my-3 specific_preview">
                                    </div>-->
									<small id="attachment_err" style="color:red;"></small>
									<?php if(!empty($get_result->attachment)){ ?>
									    <i class="fas fa-paperclip"></i><a href="<?=base_url('uploads/email/'.@$get_result->attachment.'')?>" download><?=@$get_result->attachment?></a>
									<?php } ?>
                                </div>
								
								
								
								
								<div class="mb-4">
                                    <label class="fw-semibold">Select Event</label>
                                    <select class="form-control" id="event" name="event">
									    <option>Select Event</option>
										<?php
										    if(!empty($event)){
												foreach($event as $k => $v){
													echo '<option value="'.@$v->event_id.'" >'.@$v->event_name.'</option>';
												}
											}
										?>
									</select>
                                </div>
								
								<div class="mb-4">
                                    <label class="fw-semibold">Select Guest</label>
                                    <select multiple="multiple" class="form-control select2" id="guest" name="guest[]">
									    <option>Select Event</option>
									</select>
                                </div>
								
								<div >
                                    <button class="btn" type="submit" style="text-align:left" name="save_and_draft" id="save_and_draft" value="save_and_draft">Save & Draft</button>
									<button class="btn" type="submit" style="text-align:right" name="sent" id="sent" value="send">Send</button>
                                </div>
								
                                
                            </form>
                        </div>
                   
			
		
							
							
                        </div>
							
						
                    </div>
					
					
                </div>
            </div>
        </div>
		
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="top: 42px;">
    <div class="modal-content">
      <div class="modal-header border-0">
        <h5 class="modal-title" id="exampleModalLabel">Recipients</h5>
        <button type="button" class="close" id='closepopup' data-dismiss="modal" aria-label="Close" style="width: 4%;color: white;background: red;border: 1px red solid;font-weight: 900;">
          <span aria-hidden="true">X</span>
        </button>
      </div>
      <div class="modal-body" id="viewBank">
         
      </div>
   </div>
  </div>
</div>	
	
<script>

function duplicate(id)
{
	//var list = '';
	$.ajax({
		type: "POST", 
		url:  '<?= base_url('email/duplicate_template/') ?>',  
		data: {id:id}, 
		beforeSend: function(){
		},
		success: function(response){
			if(response == 1){
				swal({title: "Sucess!", text: "<strong>Duplicate template created Successfully!</strong>", type: "success", showConfirmButton: true, html:true}, function(){ window.location.href = " "});
			}
		}
	});   
}

function getDelete(id)
{
	//var list = '';
	$.ajax({
		type: "POST", 
		url:  '<?= base_url('email/delete_template/') ?>',  
		data: {id:id}, 
		beforeSend: function(){
		},
		success: function(response){
			if(response == 1){
				swal({title: "Sucess!", text: "<strong>template deleted Successfully!</strong>", type: "success", showConfirmButton: true, html:true}, function(){ window.location.href = " "});
			}
		}
	});   
}
   
$('#closepopup').click(function () {
   $('#exampleModal').css('display', 'none');  
});   
		//Article status change function
	function changeDealStatus(id, thisSwitch) {      
		var newStatus;      
		if (thisSwitch.val() == 1) {         
			thisSwitch.val('0');       
			newStatus = '0';
		} else {      
			thisSwitch.val('1');       
			newStatus = '1';
		}
      
		$.ajax({         
			url: '<?php echo base_url('setting/change_paystatus'); ?>',     
			type: 'POST',       
			dataType: 'json',       
			data: {         
				userId: String(id),        
				status: String(newStatus)        
			},
		})
		.done(function(data) {  
			if(data.status == 1){
				swal({title: "Sucess!", text: "<strong>"+data.message+"</strong>", type: "success", showConfirmButton: true, html:true}, function(){ window.location.href = " "});
			}else if(data.status == 0){
				swal({title: "Sucess!", text: "<strong>"+data.message+"</strong>", type: "success", showConfirmButton: true, html:true}, function(){ window.location.href = " "});
			}
		})
		.fail(function(data) {      
			console.log(data);       
		}); 
	}
	
$(document).ready(  function() {
    //$(".substatusClass").change(function(event) {
		$(document.body).on('change', '.substatusClass' ,function(){ 
		event.preventDefault();
		var user_id = $(this).data('value');
		if(user_id == ''){
			swal({title: "Fail!", text: "<strong>User not register yet.</strong>", type: "error", showConfirmButton: true, html:true}, function(){ window.location.href = ""});
			return false;
		}
		var transaction = $(this).val();
		var event_id = $(this).attr('relid');
		var id = $(this).attr('id_attr');
		
		console.log(status);
		jQuery.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>" + "event/update_event_payment",
			dataType: 'json',
			data: {event_id:event_id, user_id:user_id, transaction:transaction, id:id},
			success: function(response){
				if(response.status == 1){
				    swal({title: "Sucess!", text: "<strong>"+response.message+"</strong>", type: "success", showConfirmButton: true, html:true}, function(){ window.location.href = ""});
				}else{
				    swal({title: "Fail!", text: "<strong>"+response.message+"</strong>", type: "error", showConfirmButton: true, html:true}, function(){ window.location.href = ""});
				}
			}
		});
	});
});

$('textarea#body').tinymce({
	height: 100,
	menubar: false,
	plugins: [
	   'a11ychecker','advlist','advcode','advtable','autolink','checklist','export',
	   'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks',
	   'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount'
	],
	toolbar: 'undo redo | a11ycheck casechange blocks | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist checklist outdent indent | removeformat | code table help'
});

$(document.body).on('change', '#event' ,function(){ 
    var id = $(this).val();
	console.log(id)
    $.ajax({
		type: "POST", 
		url:  '<?= base_url('mailer/get_guest/') ?>',  
		data: {id:id}, 
		dataType:'json',
		beforeSend: function(){
		},
		success: function(response){
			$('#guest').html(response.output)
		}
	});
});

$('.select2[multiple]').select2({
    width: '100%',
    closeOnSelect: false
})

</script>			