<div class="container-fluid m-0 Section ProfileTab">
    <div class="row m-0 TabBar">
        <div class="TabBar">
            <div class="Pagination">
                <a href="" id="Home"><i class="fa fa-angle-left" aria-hidden="true"></i> Home / Profile</a>
            </div>
            <?php if($this->session->flashdata('message')) { ?>
            <div class="alert alert-success1" style="background-color:#98E0D5; text-align: center; padding: 5px; display: block;">
                <strong style="color:#063; display: block;">
                    <?php
                    echo @$this->session->flashdata('message');
                    unset($_SESSION['message']);
                    ?>
                </strong>
            </div>
            <?php } ?>

            <div class="row m-0" style="background: #fff;">
                <div class="col-lg-9 col-md-9 col-sm-12 UserProfileDataContainer">
                    <?php
                    if(!empty($userData->coverImage) && file_exists('uploads/provider/coverPic/'.$userData->coverImage)) { ?>
                    <img class="AddBanner" src="<?= base_url('uploads/provider/coverPic/'.$userData->coverImage); ?>" alt="">
                    <?php } else { ?>
                    <img class="AddBanner" src="<?= base_url('assets/users_assets/images/cover.png'); ?>" alt="">
                    <?php } ?>
                    <div class="ProfileImageContainer">
                        <?php
                        if(!empty($userData->image) && file_exists('uploads/provider/profilePic/'.$userData->image)) { ?>
                        <img class="ProfileImage" src="<?= base_url('uploads/provider/profilePic/'.$userData->image); ?>" alt="">
                        <?php } else { ?>
                        <img class="AddBanner" src="<?= base_url('assets/users_assets/images/user.png'); ?>" alt="">
                        <?php } ?>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 UserDataContainer">
                    <p class="m-0 UserName"><?= $userData->fname." ".$userData->lname; ?></p>
                    <div class="ProfileBtnContainer">
                        <a href="" data-bs-toggle="modal" data-bs-target="#AddPromotionModal" id="showdropdownvalue">
                            <img class="ProfileBtnImg" src="<?= base_url('assets/users_assets/images/Icon30.png'); ?>" alt="">
                            <p class="m-0 ProfileBtnText">Edit Profile</p>
                        </a>
                        <a href="" data-bs-toggle="modal" data-bs-target="#ChangePasswordModal">
                            <img class="ProfileBtnImg" src="<?= base_url('assets/users_assets/images/Icon31.png'); ?>" alt="">
                            <p class="m-0 ProfileBtnText">Change Password</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="TabContainer">
                <div class="Tab active" onclick="openTab(event, 'ProfileInfo')">Info</div>
            </div>
        </div>

        <div id="ProfileInfo" class="row m-0 TabContent active">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="ProfileDataBlock">
                    <p class="m-0 HeadingText">About me</p>
                    <p class="m-0 SubHeadingText"><?= @$userData->about; ?></p>
                </div>
                <div class="ProfileDataBlock">
                    <p class="m-0 HeadingText">Basic info</p>
                    <p class="m-0 SubHeadingText mb-1"><b>Address:</b>
                    <?php
                    if(!empty($userData->address)) {
                        echo $userData->address.", ";
                    }
                    if(!empty($userData->address_2)) {
                        echo $userData->address_2.", ";
                    }
                    if(!empty($userData->city)) {
                        echo $userData->city.", ";
                    }
                    if(!empty($userData->state)) {
                        echo $userData->state." ";
                    }
                    if(!empty($userData->zipcode)) {
                        echo $userData->zipcode.", ";
                    }
                    if(!empty($userData->country)) {
                        echo $userData->country;
                    } ?>
                    <p class="m-0 SubHeadingText mb-1"><b>Phone:</b> <?= @$userData->phone; ?></p>
                    <p class="m-0 SubHeadingText mb-1"><b>Email:</b> <?= @$userData->email; ?></p>
                    <p class="m-0 SubHeadingText mb-1"><b>Birthday:</b> <?= date('dS M Y', strtotime(@$userData->dob)); ?> </p>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade CustomModal" id="AddPromotionModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Profile Settings</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" action="<?= base_url('provider/update_profile')?>" enctype="multipart/form-data" method="post">
                        <div class="col-md-3 col-sm-12">
                            <label class="form-label">First Name</label>
                            <input type="text" id="fname" name="fname" placeholder="Enter First Name" value="<?= $userData->fname; ?>">
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <label class="form-label">Last Name</label>
                            <input type="text" id="lname" name="lname" placeholder="Enter Last Name" value="<?= $userData->lname; ?>">
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <label class="form-label">Email</label>
                            <input type="text" id="email" value="<?= $userData->email; ?>" readonly>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <label class="form-label">Date of birth</label>
                            <input type="date" id="dob" name="dob" value="<?= $userData->dob; ?>">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Phone</label>
                            <input type="text" id="phone" name="phone" placeholder="Enter Phone Number" value="<?= $userData->phone; ?>">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Address 1</label>
                            <input type="text" id="address" name="address" placeholder="Enter your address" value="<?= $userData->address; ?>" required>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Nearby Location</label>
                            <input type="text" id="nearby_location" name="nearby_location" placeholder="Enter your nearby location" value="<?= $userData->address_2; ?>">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Country</label>
                            <select name="country" id="country" onchange="getState(this.value)">
                                <option selected disabled value="">Select Country</option>
                                <?php if(!empty($country)) {
                                foreach ($country as $key => $value) { ?>
                                <option value="<?= $value->name; ?>" <?php if(@$value->name == @$userData->country) {echo "selected"; }?>><?= $value->name; ?></option>
                                <?php } } ?>
                            </select>
                            <input type="hidden" id="select_country_dropdown" value="<?= $userData->country; ?>">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">State</label>
                            <select name="state" id="state" onchange="getCity(this.value);">
                                <option value="">Select State</option>
                            </select>
                            <input type="hidden" id="select_state_dropdown" value="<?= $userData->state; ?>">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">City</label>
                            <select name="city" id="city">
                                <option value="">Select City</option>
                            </select>
                            <input type="hidden" id="select_city_dropdown" value="<?= $userData->city; ?>">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Zip Code</label>
                            <input type="text" id="zipcode" name="zipcode" placeholder="Enter your nearby location" value="<?= $userData->zipcode; ?>">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <?php
                            if(!empty($userData->image) && file_exists('uploads/provider/profilePic/'.$userData->image)) {
                            $style = "width: 80%; margin-left: 72px;";
                            ?>
                            <img style="width: 55px; height: 55px; border-radius: 30px; position: absolute; bottom: 263px; float: left;" src="<?= base_url('uploads/provider/profilePic/'.$userData->image); ?>" />
                            <input type="hidden" name="old_image" value="<?= $userData->image ?>">
                            <?php } ?>
                            <label class="form-label" style="<?= $style; ?>">Upload Profile Picture</label>
                            <input type="file" name="profilePic" class="form-control" id="inputGroupFile01" style="<?= $style; ?>">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <?php
                            if(!empty($userData->coverImage) && file_exists('uploads/provider/coverPic/'.$userData->coverImage)) {
                            $style1 = "width: 80%; margin-left: 72px;";
                            ?>
                            <img style="width: 55px; height: 55px; border-radius: 30px; position: absolute; bottom: 263px; float: left;" src="<?= base_url('uploads/provider/coverPic/'.$userData->coverImage); ?>" />
                            <input type="hidden" name="old_bimage" value="<?= $userData->coverImage ?>">
                            <?php } ?>
                            <label class="form-label" style="<?= $style1; ?>">Upload Cover Picture</label>
                            <input type="file" name="backgroundPic" class="form-control" id="inputGroupFile02" style="<?= $style1; ?>">
                        </div>
                        <div class="row m-0 pt-4 pb-2">
                            <div class="row m-0 InnerData g-3">
                                <p class="Heading">About</p>
                                <div class="col-md-12 col-sm-12">
                                    <textarea name="about" class="form-control"><?= $userData->about; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" style="margin: 0; border: none; padding: 0px 6px 0px 0px;">
                            <button type="submit" class="btn btn-primary">Update Profile</button>
                            <input type="hidden" name="uid" id="uid" value="<?= $userData->id; ?>">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade CustomModal" id="ChangePasswordModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Change Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" action="<?= base_url('provider/change_password')?>" method="post">
                        <div class="col-md-12 col-sm-12">
                            <label class="form-label">New Password</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <input type="password" id="password" name="password" placeholder="Enter New Password" autocomplete="password" style="width: 90%;" required>
                                <div class="input-group-prepend">
                                    <div class="input-group-text" style="border-radius: 0;height: 40px;border-left: none;border-top-right-radius: 10px;border-bottom-right-radius: 10px;background-color: #f5f5f5;">
                                        <i class="fa fa-eye-slash" id="eye"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <label class="form-label">Confirm Password</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <input type="password" id="confirm_password" name="confirm_password" placeholder="Enter Confirm Password" autocomplete="confirm_password" style="width: 90%;" required>
                                <div class="input-group-prepend">
                                    <div class="input-group-text" style="border-radius: 0;height: 40px;border-left: none;border-top-right-radius: 10px;border-bottom-right-radius: 10px;background-color: #f5f5f5;">
                                        <i class="fa fa-eye-slash" id="eyecon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div id="message" style="text-align: center;"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="changePassword">Change Password</button>
                            <input type="hidden" name="u_id" id="u_id" value="<?= $userData->id; ?>">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#confirm_password').on('keyup', function () {
        if ($('#password').val() == $('#confirm_password').val()) {
            $('#message').html('Password Match').css('color', 'green');
            $('#password').focus().css('border', '2px solid green');
            $('#confirm_password').focus().css('border', '2px solid green');
            document.getElementById('changePassword').disabled = false;
        } else {
            $('#password').focus().css('border', '2px solid red');
            $('#confirm_password').focus().css('border', '2px solid red');
            $('#message').html('Password Mismatch').css('color', 'red');
            document.getElementById('changePassword').disabled = true;
        }
    });

    $('#eye').click(function() {
        if($(this).hasClass('fa-eye-slash')) {
            $(this).removeClass('fa-eye-slash');
            $(this).addClass('fa-eye');
            $('#password').attr('type','text');
        } else {
            $(this).removeClass('fa-eye');
            $(this).addClass('fa-eye-slash');
            $('#password').attr('type','password');
        }
    });

    $('#eyecon').click(function() {
        if($(this).hasClass('fa-eye-slash')) {
            $(this).removeClass('fa-eye-slash');
            $(this).addClass('fa-eye');
            $('#confirm_password').attr('type','text');
        } else {
            $(this).removeClass('fa-eye');
            $(this).addClass('fa-eye-slash');
            $('#confirm_password').attr('type','password');
        }
    });
});
function getState(val) {
    var id = val;
    $.ajax({
        type:"post",
        cache:false,
        url:"<?= base_url('Home/states_by_country') ?>",
        data:{
            country_name:id
        },
        beforeSend:function(){},
        success:function(returndata) {
            $('.state_field').show();
            $('#state').html(returndata);
            $('#city').html('<option value="">Select State First</option>');
        }
    });
}

function getCity(val) {
    var id = val;
    $.ajax({
        type:"post",
        cache:false,
        url:"<?= base_url('Home/cities_by_state') ?>",
        data:{
            state_name:id
        },
        beforeSend:function(){},
        success:function(returndata) {
            $('.city_field').show();
            $('#city').html(returndata);
        }
    });
}

$('#showdropdownvalue').click(function() {
    if($('#select_country_dropdown').val() != '') {
        var state_name = $('#select_state_dropdown').val();
        var country_name = $('#select_country_dropdown').val();
        $.ajax({
            url: "<?php echo base_url()?>Home/states_by_country",
            type: "POST",
            data: {
                country_name: country_name
            },
            cache: false,
            success: function(result){
                //console.log(result);
                $("#state").html(result);
                $("#state").val(state_name);
            }
        });
    }

    if($('#select_state_dropdown').val() != '') {
        var city_name = $('#select_city_dropdown').val();
        var state_name = $('#select_state_dropdown').val();
        $.ajax({
            url: "<?php echo base_url()?>Home/cities_by_state",
            type: "POST",
            data: {
                state_name: state_name
            },
            cache: false,
            success: function(result) {
                $("#city").html(result);
                $("#city").val(city_name);
            }
        });
    }
})
</script>