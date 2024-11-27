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
</style>

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
                        <div class="speaker-informations">
						
                            
							
							<div class="blockpadding paymentform">
								<div class="row align-items-center">
									<div class="col-lg-8">					
									    <legend><?=@$page?></legend>
									</div>
									<div class="col-lg-4 text-right mb-3">
									<!--<a href="#" class="btn btn-warning" data-toggle="modal" data-target="#reqpay">Request Payout</a>-->
									</div>
								</div>
								<table  class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Event Date </th>
											<th>Event Name </th>
											<th>Event Desc</th>
											<th>Event Price</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
									<?php 
									if(!empty(@$list)){
										foreach(@$list as $v): 
									?>
											<tr>
												<td><?=date('d M, Y', strtotime(@$v->event_date)).' '.date('h:i A', strtotime(@$v->event_time))?></td>
												<td style="text-align: justify;"><?=@$v->event_name?></td>
												<td style="text-align: justify;"><?=substr(@$v->event_description, 0, 100)?></td>
												<td><?='$'.@$v->event_price?></td>
												<td>
													<a href="javascript:void(0);"  title="View Participant" onclick="getInfo(<?=@$v->event_id?>)" ><i class="far fa-eye"></i> </a>	
												</td>
											</tr>
									    <?php endforeach; ?>
									<?php }else{ ?> 
									<tr><td colspan="8">No Data Found!</td></tr>
									<?php } ?>
									</tbody>
								</table>
								
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
        <h5 class="modal-title" id="exampleModalLabel">Event Participant</h5>
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

function getInfo(eId)
   {
	   var list = '';
      $.ajax({
         type: "POST", 
         url:  '<?= base_url('event/fetchBank/') ?>'+eId,  
         data: {eId:eId}, 
         dataType : 'json',
         beforeSend: function(){
         },
         success: function(response){
            console.log(response);          
			$('#viewBank').html(response.html);
			$('#exampleModal').css('display', 'block'); 
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
	</script>			