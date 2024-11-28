<div class="container-fluid m-0 Section ProfileTab">
    <div class="row m-0 TabBar">
        <div class="TabBar">
            <div class="Pagination">
                <a href="" id="Home"><i class="fa fa-angle-left" aria-hidden="true"></i> Home / Profile</a>
            </div>
            <div class="row m-0" style="background: #fff;">
                <div class="col-lg-9 col-md-9 col-sm-12 UserProfileDataContainer">
                    <img class="AddBanner" src="<?= base_url('assets/users_assets/images/AddBaner.png'); ?>" alt="">
                    <div class="ProfileImageContainer">
                        <img class="ProfileImage" src="<?= base_url('assets/users_assets/images/User1.png'); ?>" alt="">
                        <div class="ChangeImgBtnContainer">
                            <input type="file" class="ImgInputField">
                            <div class="ChangeImgBtnCover">
                                <img src="<?= base_url('assets/users_assets/images/Icon32.png'); ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 UserDataContainer">
                    <p class="m-0 UserName"><?= $userData->fname." ".$userData->lname; ?></p>
                    <div class="ProfileBtnContainer">
                        <a href="" data-bs-toggle="modal" data-bs-target="#AddPromotionModal">
                            <img class="ProfileBtnImg" src="<?= base_url('assets/users_assets/images/Icon30.png'); ?>" alt="">
                            <p class="m-0 ProfileBtnText">Edit Profile</p>
                        </a>
                        <a href="">
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
                    <p class="m-0 SubHeadingText mb-1"><b>Address:</b> 720 Liberty Ave, Staten Island, NY 10305, USA</p>
                    <p class="m-0 SubHeadingText mb-1"><b>Phone:</b> <?= @$userData->phone; ?></p>
                    <p class="m-0 SubHeadingText mb-1"><b>Email:</b> <?= @$userData->email; ?></p>
                    <p class="m-0 SubHeadingText mb-1"><b>Birthday:</b> 15th July 1991</p>
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
                    <form class="row g-3" action="<?= base_url('coach/update_profile')?>" enctype="multipart/form-data" method="post">
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">First Name</label>
                            <input type="text" id="fname" name="fname" placeholder="Enter First Name" value="<?= $userData->fname; ?>">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Last Name</label>
                            <input type="text" id="lname" name="lname" placeholder="Enter Last Name" value="<?= $userData->lname; ?>">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Email</label>
                            <input type="text" id="email" value="<?= $userData->email; ?>" readonly>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Phone</label>
                            <input type="text" placeholder="Enter Phone Number" value="<?= $userData->phone; ?>">
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
                                <option value="<?= $value->name; ?>"><?= $value->name; ?></option>
                                <?php } } ?>
                            </select>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">State</label>
                            <select name="state" id="state" onchange="getCity(this.value);">
                                <option value="">Select State</option>
                            </select>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">City</label>
                            <select name="city" id="city">
                                <option value="">Select City</option>
                            </select>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Zip Code</label>
                            <input type="text" id="zipcode" name="zipcode" placeholder="Enter your nearby location" value="<?= $userData->zipcode; ?>">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Upload Profile Picture</label>
                            <input type="file" name="profilePic" class="form-control" id="inputGroupFile01">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Upload Cover Picture</label>
                            <input type="file" name="backgroundPic" class="form-control" id="inputGroupFile01">
                        </div>
                        <div class="row m-0 pt-4 pb-2">
                            <div class="row m-0 InnerData g-3">
                                <p class="Heading">About</p>
                                <div class="col-md-12 col-sm-12">
                                    <textarea name="about" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update Profile</button>
                            <input type="hidden" name="uid" id="uid" value="<?= $userData->id; ?>">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
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
</script>