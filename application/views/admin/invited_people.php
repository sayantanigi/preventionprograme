<style>
	.form-check {
	    display: flex;
	    align-items: center;
	}
	.form-check label {
	    margin-left: 10px;
	    font-size: 18px;
	    font-weight: 500;
	}
	.form-switch .form-check-input[type=checkbox] {
	    border-radius: 2em;
	    height: 50px;
	    width: 100px;
	}
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
	a.morelink {
		text-decoration:none;
		outline: none ;
	}
	.morecontent span {
	    display: none;
	}
	.comment {
	    margin: 10px;
	}
	.tableDes{
		word-wrap: break-word;
		word-break: break-all;
	}
</style>

<div class="main-content">
   <div class="page-content">
      <div class="container-fluid">
         <!-- start page title -->
         <div class="row">
            <div class="col-12">
               <div class="page-title-box d-flex align-items-center justify-content-between">
                  <h4 class="mb-0"><?=$page?></h4>
                  <div class="page-title-right">
                     <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?=base_url('admin/dashboard')?>">Dashboard</a></li>
                        <li class="breadcrumb-item active"><?=@$page?></li>
                     </ol>
                  </div>
               </div>
            </div>
         </div>

         <!-- end row -->
         <div class="row">
            <div class="col-xl-12">
               <div class="card custom-shadow rounded-lg border">
                  <div class="card-body">
                  	<div class="row">
	                  	<div class="col-sm-10">
	                     	<h4 class="card-title mb-4"><?=@$page?></h4>
	                     </div>
	                     
	                        <div class="col-sm-2 text-end" style="padding-left: 54px;">
	                     	    <!--<a href="<?=base_url('admin/event/add')?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>&nbsp;Add Event</a>-->
	                        </div>
	                  </div>   	
                     <div class="">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
								   <thead class="thead-light text-center">
								        <tr>
								            <th>#</th>
											<th>User Name</th>
											<th>Email</th>
											<th style="width: 40%;">Event Distribute Amount</th>
											<th>Transaction</th>
											<th>Status</th>
											<!--<th class="text-center">Action</th>-->
								        </tr>
								   </thead>
								   <tbody class="text-center">
								   <?php if (is_array($user) || is_object($user)) { ?>
										<?php foreach ($user as $key => $v): 
										//echo strip_tags(@$v->event_description);
										    if(!empty(@$v->fname) || !empty(@$v->lname)){
												$uname = ucfirst(@$v->fname) .' '. ucfirst(@$v->lname);
											}else{
												$uname = 'New User - Awaiting user registration';
											}
											
											if(!empty(@$v->fname) || !empty(@$v->lname)){
												$status = '<div style="color: white;background: green;width: 64%;padding: 5px;font-weight: 700;border-radius: 5px;">Register</div>';
												//$status = '<div style="color: white;background: green;width: 64%;padding: 5px;font-weight: 700;border-radius: 5px;">Not register yet.</div>';
											}else{
												$status = '<div style="color: white;background: red;width: 100%;padding: 5px;font-weight: 700;border-radius: 5px;">Not register yet.</div>';
											}
										?>
										
											<tr>
												<td><?= $key+1 ?></td>
												<td><?=@$uname ?></td>
												<td><?=@$v->email ?></td>
												<td><?='$'.@$v->distributed_event_price ?></td>
												<td>
												    <select data-value="<?=@$v->userId?>" relid="<?=@$v->event_id?>" id_attr="<?=@$v->id?>" name="sub_status" row="12px" id="sub_status" class="substatusClass form-control" style="width: 70%;margin: 0px 30px;">
														<option value="">Select</option>
														<option value="Paid" <?=(@$v->transaction == 'Paid') ? 'selected' : ''?>>Paid</option>
														<option value="Not Paid" <?=(@$v->transaction == 'Not Paid') ? 'selected' : ''?>>Not Paid</option>
													</select><br/>
												    <?=@$v->transaction ?>
												</td>
												<td><?=@$status ?></td>
											</tr>
										<?php endforeach ?>
									<?php } ?>
								   </tbody>
								</table>

								<!-- <div class="container mt-3">
  
  
  <button type="button" class="btn btn-primary hide" data-bs-toggle="modal" data-bs-target="#dealModal">
    Open modal
  </button>
</div> -->

<!-- The Modal -->
<div class="modal" id="dealModal">
  <div class="modal-dialog modal-xl">
    <div class="modal-content" style="width: 28% !important; margin: 0 auto;">

      <!-- Modal Header -->
	      <!-- <div class="modal-header">
	        <h4 class="modal-title">Deal Detail</h4>
	        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
	      </div> -->

      <!-- Modal body -->
      <div class="modal-body" >
        <div style="width: 100%;margin: 0 auto" id="savethedeal">
        <div style="box-shadow:0px 0px 5px #ccc;">
            <div>
                <img src="http://localhost/dealzook/uploads/deals/deal_171662442642.jpg" alt="" style="width: 100%;height:170px; object-fit: cover;">
            </div>

            <div style="padding:15px; padding-bottom: 0;">
                <h3 style="margin: 0;font-size: 16px;"><a href="" style="color: #111;text-decoration: none;">Full Set Volume Eyelash</a></h3>
                <h3 style="margin: 0;font-size: 16px;"><a href="" style="color: #111;text-decoration: none;">Extensions - Great Discounts & High Quality</a></h3>
            </div>
            <div style="padding: 15px;padding-top: 0;">
                <p style="margin: 0;margin-top: 15px;font-size: 15px;">DEKALASH CAMPBELL</p>
                <p style="margin: 0;margin-top: 5px;font-size: 14px;">715 W Hamilton Ave, suite 1100 , Campbell</p>
                <h3 style="margin: 0;margin-top: 14px;font-size: 16px;">
                    <span><del>$280.00</del></span>
                    <span style="color: #8cb724;margin-left: 8px;margin-right: 8px;">$159.00</span>
                    <span style="color: #ffb51b;">43% Off</span>
                </h3>
                <p style="color: #dc3545;margin: 0;margin-top: 8px;">Expires in 51 Days</p>
            </div>
        </div>
    </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer" style="-webkit-box-align: center !important; justify-content: center !important;">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="myfunc()">Download</button>
      </div>

    </div>
  </div>
</div>
                     </div>
                  </div>
                  <!-- end card-body -->
               </div>
               <!-- end card -->
            </div>
            <!-- end col -->
            
         </div>
         <!-- end col -->
      </div>
   </div>
   <!-- End Page-content -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.0/FileSaver.min.js"></script>   

  <script type="text/javascript">
var adminUrl = ""
   	function myfunc(){
    // if you are using a different 'id' in the div, make sure you replace it here.
    var element = document.getElementById("savethedeal");

    html2canvas(element,{
    	allowTaint: true,

		useCORS: true}).then(function(canvas) {
        canvas.toBlob(function(blob) {
            window.saveAs(blob, "Deal.png");
        });
    });
};


   function dealDetail(dealId) {
        var baseUrl = "<?=base_url('admin/deals/detailsDeal')?>";

        $.ajax({
            url: baseUrl,
            type: 'POST',
            data: {
                dealId: dealId
            },
            beforeSend: function() {
                $.blockUI({

                    // blockUI code with custom 
                    // message and styling
                    message: "<h4>Just a moment...<h4>",
                    css: {
                        color: '#048700',
                        borderColor: '#048700'
                    }
                });
            },
            success: function(data) {
                $("#dealModal .modal-body").html(data);
                $.unblockUI();
                $("#dealModal").modal('show');
            }
        });
    }

	function deleteDeals(dealId) 
	{
		swal({
			title: 'Are You sure want to delete this?',
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#A5DC86',
			cancelButtonColor: '#DD6B55',
			confirmButtonText: 'Yes',
			cancelButtonText: 'No',
			closeOnConfirm: true,
			closeOnCancel: true
		}, function(isConfirm){
			if (isConfirm) {
				window.location.href = '<?= base_url('admin/event/delete_event/') ?>'+dealId
			}
		});
	}
	
	function generateQr(userId){
		$.ajax({      
		url: '<?=base_url('admin/users/qrcode')?>',       
		type: 'POST',            
		data:{userId:userId},
		success: function(data){
			if(data == '1'){
				swal({title: "Sucess!", text: "<strong>Your qrcode is generated sucessfully.</strong>", type: "success", showConfirmButton: true, html:true}, function(){ window.location.href = " "});
			}
		}
		});
	}
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
			url: '<?php echo base_url('admin/event/changestatus'); ?>',     
			type: 'POST',       
			dataType: 'json',       
			data: {         
				userId: String(id),        
				status: String(newStatus)        
			},
		})
		.done(function(data) {  
			// if(subpage == 'deallist'){
			// var redirectURL = adminUrl+'deals';
			// }
			// else if(subpage == 'hotdeallist'){
			// var redirectURL = adminUrl+'hotdeals';
			// }else{
			// var redirectURL = adminUrl+'unapproved-deals';
			// }

			// alert_response(data,redirectURL);   
			if(newStatus == 1){
				swal({title: "Sucess!", text: "<strong>Your status is Activate</strong>", type: "success", showConfirmButton: true, html:true}, function(){ window.location.href = " "});
			}else if(newStatus == 0){
				swal({title: "Sucess!", text: "<strong>Your status is Inctivate</strong>", type: "success", showConfirmButton: true, html:true}, function(){ window.location.href = " "});
			}
		})
		.fail(function(data) {      
			console.log(data);       
		}); 
	}

	function changeDealApproval(id, thisSwitch,subpage) {      
		var newStatus;      
		if (thisSwitch.val() == 1) {         
			thisSwitch.val('0');       
			newStatus = '0';
		} else {      
			thisSwitch.val('1');       
			newStatus = '1';
		}
      
		$.ajax({      
			url: adminUrl+'deals/approve',       
			type: 'POST',       
			dataType: 'json',       
			data: {         
				dealId: String(id),        
				status: String(newStatus)        
			},
		})
		.done(function(data) {  
			if(subpage == 'deallist'){
         	var redirectURL = adminUrl+'deals';
         }
         else if(subpage == 'hotdeallist'){
         	var redirectURL = adminUrl+'hotdeals';
         }else{
         	var redirectURL = adminUrl+'unapproved-deals';
         }
         
         alert_response(data,redirectURL);   
		})
		.fail(function(data) {      
			console.log(data);       
		}); 
	}

	//Article status change function
	function changeHotDealStatus(id, currentStatus,subpage) {      
		var newStatus;     

		if (currentStatus == 1) {         
			newStatus = '0';
			var confirmTxt = 'Remove this Deal from Hot Deals?';
		} else {      
			newStatus = '1';
			var confirmTxt = 'Mark this Deal as a Hot Deal?';
		}

      swal({
			title: confirmTxt,
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#A5DC86',
			cancelButtonColor: '#DD6B55',
			confirmButtonText: 'Yes',
			cancelButtonText: 'No',
			closeOnConfirm: true,
			closeOnCancel: true
		}, function(isConfirm){
			if (isConfirm) {

				$.ajax({      
					url: adminUrl+'deals/changehotdealstatus',       
					type: 'POST',       
					dataType: 'json',       
					data: {         
						dealId: String(id),        
						hot_deal: String(newStatus)        
					},
				})
				.done(function(data) {      
		         if(subpage == 'deallist'){
		         	var redirectURL = adminUrl+'deals';
		         }
		         else if(subpage == 'hotdeallist'){
		         	var redirectURL = adminUrl+'hotdeals';
		         }else{
		         	var redirectURL = adminUrl+'unapproved-deals';
		         }
		         
		         alert_response(data,redirectURL);
				})
				.fail(function(data) {      
					console.log(data);       
				}); 
			}
		});	
	}

	//Article status change function
	function changeFeaturedDealStatus(id, currentStatus) {      
		var newStatus;     

		if (currentStatus == 1) {         
			newStatus = '0';
			var confirmTxt = 'Remove this Deal from Featured Deals?';
		} else {      
			newStatus = '1';
			var confirmTxt = 'Mark this Deal as a Featured Deal?';
		}

      swal({
			title: confirmTxt,
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#A5DC86',
			cancelButtonColor: '#DD6B55',
			confirmButtonText: 'Yes',
			cancelButtonText: 'No',
			closeOnConfirm: true,
			closeOnCancel: true
		}, function(isConfirm){
			if (isConfirm) {

				$.ajax({      
					url: adminUrl+'deals/changefeatureddealstatus',       
					type: 'POST',       
					dataType: 'json',       
					data: {         
						dealId: String(id),        
						featured_deal: String(newStatus)        
					},
				})
				.done(function(data) {      
		         var redirectURL = adminUrl+'hotdeals';
		         alert_response(data,redirectURL);
				})
				.fail(function(data) {      
					console.log(data);       
				}); 
			}
		});	
	}
$(document).ready(function() {
	var showChar = 50;
	var ellipsestext = "...";
	var moretext = "Read More";
	var lesstext = "Read Less";
	$('.more').each(function() {
		var content = $(this).html();
		if(content.length > showChar) {
			var c = content.substr(0, showChar);
			var h = content.substr(showChar-1, content.length - showChar);
			var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';
			$(this).html(html);
		}
	});
	$(".morelink").click(function(){
		if($(this).hasClass("less")) {
			$(this).removeClass("less");
			$(this).html(moretext);
		} else {
			$(this).addClass("less");
			$(this).html(lesstext);
		}
		$(this).parent().prev().toggle();
		$(this).prev().toggle();
		return false;
	});
});

$(document).ready(  function() {
    $(".substatusClass").change(function(event) {
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
			url: "<?php echo base_url(); ?>" + "admin/users/update_event_payment",
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
 