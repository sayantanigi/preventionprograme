<?php

	if(!empty(@$_GET['suc_msg'])){
		$msg = @$_GET['suc_msg'];
		echo '<script>swal({
			title: "Success!",
			text: "<strong>'.$msg.'</strong>",
			type: "success",
			html:true,
			showConfirmButton: true
		});</script>';
	}
?>

        <div class="section exvent-hero-section d-lg-flex d-block align-items-center inner-page-hero" style="background-image: url(<?=base_url('assets/images/')?>bg/about_page_bg.jpg);">
            <img class="shape-1 img-fluid" src="<?=base_url('assets/images/')?>shape/hero_shape1.png" alt="">
            <img class="shape-2 img-fluid" src="<?=base_url('assets/images/')?>shape/hero_shape2.png" alt="">

            <div class="container">
                <div class="row exvent-hero-row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <div class="page-title">
                            <h2 class="section-title"><?=@$_GET['title']?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="bg-light p-5 shadow border">
                            <form class="contact-form" action="" method="POST" name="myForm">
                                <h3 class="text-center h4 fw-bold mb-5 text-capitalize"><?=@$_GET['msg']?></h3>  
                            </form>
                        </div>
                    </div>
                </div><br/>
				<div class="text-center">
				<a href="<?=base_url('subscription')?>"class="btn" type="submit">Subscription</a>
				</div>
            </div>
			
			
        </div>
		
<script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button1'); //Add button selector
    var wrapper = $('.field_wrapper1'); //Input field wrapper
	
	var fieldHTML = '<div class="row"><div class="form-group mb-2"><input type="email" class="form-control email" name="email[]"  id=""  autocomplete="off"  value="" placeholder="Enter Email"></div>  <a href="javascript:void(0);" class="btn bg-success remove_button1" style="width: 20%;">Remove</a> </div>'; //New input field html 
	
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

function check_invite_limit(){
	var uemail = document.getElementById("email").value;
	if (!uemail) {
		document.getElementById("email_error").innerHTML = "Email filed is required.Please enter valid email.";
		return false;
	}else{
	var email = $("input[name='email[]']").map(function(){return $(this).val();}).get();
	$.ajax({
		type: "POST",
		url: "<?php echo site_url('event/check_invite_limit');?>",
		data: {email : email},
		dataType: "json",
		success: function (response) {
			console.log(response);
			if(response.limt_over == 0){
				//console.log('Your limit is over.');
				swal({title: "Fail!", text: "<strong>Your limit is over.</strong>", type: "error", showConfirmButton: true, html:true});
				return false;
			}else if(response.cal_limit != '' && response.cal_limit_over != 0){
				//console.log('You can invite only '+response.cal_limit+' people.');
				swal({title: "Fail!", text: "<strong>You can invite only "+response.cal_limit+" people.</strong>", type: "error", showConfirmButton: true, html:true});
				return false;
			}else{
				document.myForm.submit();
			}
			
		}
	});
}
	// console.log(email);
	// return false;
}
</script>		