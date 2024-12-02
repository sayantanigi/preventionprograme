<style>
    .Section.Promotion .Card .CardInner .SubHeading {font-size: 12px !important; font-weight: unset !important;}
</style>
<div class="container-fluid m-0 Section Promotion">
    <!-- Add Promotion Button -->
    <button type="button" class="AddButton" data-bs-toggle="modal" data-bs-target="#AddParticipantModal">
        <i class="fa fa-plus" aria-hidden="true"></i>
        <p>Add Participant</p>
    </button>

    <!-- Add Participant Modal -->
    <div class="modal fade CustomModal" id="AddParticipantModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Participant</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" action="<?= base_url('coach/add_participant')?>" method="POST" enctype="multipart/form-data">
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Participant First Name <span style="color: red">*</span></label>
                            <input type="text" name="fname" id="fname" required autocomplete="off" placeholder="Enter Participant First Name">
                      </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Participant Last Name <span style="color: red">*</span></label>
                            <input type="text" name="lname" id="lname" required autocomplete="off" placeholder="Enter Participant Last Name">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Participant Email Id <span style="color: red">*</span></label>
                            <input type="email" name="email" id="email" required autocomplete="off" placeholder="Enter Participant Email Id">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Participant Date of birth <span style="color: red">*</span></label>
                            <input type="date" name="dob" id="dob" required autocomplete="off" placeholder="Enter title">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Participant Phone No 1 <span style="color: red">*</span></label>
                            <input type="text" name="phone" id="phone" required autocomplete="off" placeholder="Enter Participant Phone No 1">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Participant Phone No 2</label>
                            <input type="text" name="phone_2" id="phone_2" autocomplete="off" placeholder="Enter Participant Phone No 2">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Select Health Entity <span style="color: red">*</span></label>
                            <select class="form-control" name="health_etity" required id="health_etity">
                                <option value="">Select Health Entity</option>
                                <?php
                                if(@$entity){
                                    foreach(@$entity as $k => $v){
                                        echo '<option value="'.@$v->id.'">'.@$v->name.'</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Select Clinic Admin <span style="color: red">*</span></label>
                            <select class="form-control" name="clinic" id="clinic" required>
                                <option value="">Select Clinic</option>
                            </select>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Select Provider <span style="color: red">*</span></label>
                            <select class="form-control" name="provider" required id="provider">
                                <option value="">Select Provider</option>
                            </select>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Insurance Provider <span style="color: red">*</span></label>
                            <input type="text" name="insurance_provider"  id="insurance_provider" required autocomplete="off" placeholder="Enter Insurance Provider Name">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Upload Profile Picture</label>
                            <input type="file" name="profilePic" class="form-control" id="inputGroupFile01">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Upload Cover Picture</label>
                            <input type="file" name="backgroundPic" class="form-control" id="inputGroupFile02">
                        </div>
                        <div class="row m-0 pt-4 pb-2">
                            <div class="row m-0 InnerData g-3">
                                <div class="col-md-4 col-sm-12">
                                    <label class="form-label">Status <span style="color: red">*</span></label>
                                    <select class="form-control" name="status" required id="userstatus">
                                        <option value="">Select Status</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <label class="form-label">Password <span style="color: red">*</span></label>
                                    <input type="password" name="password"  id="password" required autocomplete="off" placeholder="Enter Password">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text" style="border-radius: 0;height: 36px;border-left: none;border-top-right-radius: 10px;border-bottom-right-radius: 10px;background-color: #f5f5f5;width: 40px;position: absolute;top: 411px;bottom: 0;left: 698px;border: none;">
                                            <i class="fa fa-eye-slash" id="eye"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <label class="form-label">Confirm Password <span style="color: red">*</span></label>
                                    <input type="password" name="confirm_password"  id="confirm_password" required autocomplete="off" placeholder="Enter Password">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text" style="border-radius: 0;height: 36px;border-left: none;border-top-right-radius: 10px;border-bottom-right-radius: 10px;background-color: #f5f5f5;width: 40px;position: absolute;top: 411px;bottom: 0;right: 41px;border: none;">
                                            <i class="fa fa-eye-slash" id="eyecon"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" style="margin: 0; border: none; padding: 0px 6px 0px 0px;">
                            <p id="passerrormsg" style="margin-right: 55px; color: green; "></p>
                            <button type="submit" class="btn btn-primary" id="addParticipantButton">Add Participant</button>
                            <input type="hidden" name="uid" id="uid" value="<?= $this->session->userdata('loguserId'); ?>">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Promotion Modal -->
    <div class="modal fade CustomModal" id="EditPromotionModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Participant</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" action="<?= base_url('coach/update_participant')?>" method="POST" enctype="multipart/form-data">
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Participant First Name <span style="color: red">*</span></label>
                            <input type="text" name="edit_fname" id="edit_fname" required autocomplete="off" placeholder="Enter Participant First Name">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Participant Last Name <span style="color: red">*</span></label>
                            <input type="text" name="edit_lname" id="edit_lname" required autocomplete="off" placeholder="Enter Participant Last Name">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Participant Email Id <span style="color: red">*</span></label>
                            <input type="email" name="edit_email" id="edit_email" required autocomplete="off" placeholder="Enter Participant Email Id">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Participant Date of birth <span style="color: red">*</span></label>
                            <input type="date" name="edit_dob" id="edit_dob" required autocomplete="off" placeholder="Enter title">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Participant Phone No 1 <span style="color: red">*</span></label>
                            <input type="text" name="edit_phone" id="edit_phone" required autocomplete="off" placeholder="Enter Participant Phone No 1">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Participant Phone No 2</label>
                            <input type="text" name="edit_phone_2" id="edit_phone_2" autocomplete="off" placeholder="Enter Participant Phone No 2">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Select Health Entity <span style="color: red">*</span></label>
                            <select class="form-control" name="edit_health_etity" required id="edit_health_etity">
                                <option value="">Select Health Entity</option>
                                <?php
                                if(@$entity){
                                    foreach(@$entity as $k => $v){
                                        echo '<option value="'.@$v->id.'">'.@$v->name.'</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Select Clinic Admin <span style="color: red">*</span></label>
                            <select class="form-control" name="edit_clinic" id="edit_clinic" required>
                                <option value="">Select Clinic</option>
                            </select>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Select Provider <span style="color: red">*</span></label>
                            <select class="form-control" name="edit_provider" required id="edit_provider">
                                <option value="">Select Provider</option>
                            </select>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Insurance Provider <span style="color: red">*</span></label>
                            <input type="text" name="edit_insurance_provider" id="edit_insurance_provider" required autocomplete="off" placeholder="Enter Insurance Provider Name">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Status <span style="color: red">*</span></label>
                            <select class="form-control" name="edit_status" required id="edit_userstatus">
                                <option value="">Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <div class="row m-0 pt-4 pb-2">
                            <div class="col-md-4 col-sm-12">
                                <label class="form-label">Upload Profile Picture</label>
                                <input type="file" name="edit_profilePic" class="form-control" id="inputGroupFile01">
                                <input type="hidden" name="old_image" id="old_image">
                                <img src="<?= base_url('assets/users_assets/images/no_user.png')?>" id="profileImagePreview">
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <label class="form-label">Upload Cover Picture</label>
                                <input type="file" name="edit_backgroundPic" class="form-control" id="inputGroupFile02">
                                <input type="hidden" name="old_bimage" id="old_bimage">
                                <img src="<?= base_url('assets/users_assets/images/no_bimage.png')?>" id="coverImagePreview">
                            </div>
                        </div>
                        <div class="modal-footer" style="margin: 0; border: none; padding: 0px 6px 0px 0px;">
                            <button type="submit" class="btn btn-primary">Update Participant</button>
                            <input type="hidden" name="edit_uid" id="edit_uid" value="">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Promotion Modal -->
    <div class="modal fade CustomModal" id="DeletePromotionModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Participant</h5>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                </div>
                <div class="modal-body">
                    <p class="InfoText">Do you really want your participant to be deleted? It cannot be undone once deleted.</p>
                </div>
                <div class="modal-footer">
                    <p id="message" style="margin-right: 55px; color: green; "></p>
                    <button type="button" class="btn btn-primary" onclick="onDeleteParticipant()">Delete</button>
                    <input type="hidden" id="idToDelete" value="">
                </div>
            </div>
        </div>
    </div>

    <!-- Details Promotion Modal -->
    <div class="modal fade CustomModal" id="DetailsPromotionModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Participant Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row PromotionDetail">
                        <div class="col-md-8 col-sm-12 PromotionImg">
                            <img class="w-100" id="detailsImage" src="https://img.freepik.com/free-photo/people-concert_1160-737.jpg?t=st=1730050734~exp=1730054334~hmac=4785251%E2%80%A6&w=900" alt="">
                        </div>
                        <div class="col-md-4 col-sm-12 PromotionData">
                            <img class="OwnerImg" id="OwnerImg" src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?q=80&w=1760&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                            <p class="TitleText" id="TitleText"></p>
                            <ul>
                                <li id="tag1">Participant ID: </li>
                                <li id="tag2">Clinic: </li>
                                <li id="tag3">Provider:</li>
                                <li id="tag4">Coach:</li>
                                <li id="tag5">Enrolled By: </li>
                            </ul>
                        </div>
                        <div class="col-md-12 col-sm-12 PromotionData">
                            <p class="BodyText" id="BodyText"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row m-0 TabBar">
        <div class="Pagination">
            <a href="" id="Home"><i class="fa fa-angle-left" aria-hidden="true"></i> Home / Participant Management</a>
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
    <div class="TabContainer">
            <div class="Tab active" onclick="openTab(event, 'AllParticipant')">All Participant</div>
            <div class="Tab" onclick="openTab(event, 'UnassignedParticipant')">Unassigned Participant</div>
            <div class="Tab" onclick="openTab(event, 'ParticipantDeactivated')">Participant Deactivated</div>
        </div>
    </div>

    <div id="AllParticipant" class="row m-0 TabContent active">
        <?php if(!empty($allParticipant_list)) {
        foreach ($allParticipant_list as $key => $data) { ?>
        <div class="Card col-lg-3 col-md-3 col-sm-6">
            <?php
            if(!empty($data->image) && file_exists('uploads/profile/'.$data->image)) {
                $image = base_url('/uploads/profile/'.@$data->coverImage);
            } else {
                $image = base_url('assets/users_assets/images/no_bimage.png');
            } ?>
            <div class="CardInner" data-bs-toggle="modal" data-bs-target="#DetailsPromotionModal" style="background: url(<?= $image?>); background-size: cover; background-repeat: no-repeat;" onclick="detailParticipant('<?= $data->id; ?>')">
                <div class="Cover"></div>
                <p class="Heading"><?= @$data->fname." ".@$data->lname?></p>
                <p class="SubHeading">Participant ID: <?= @$data->participant_code;?></p>
                <p class="SubHeading">Clinic:
                    <?php
                    $getClinic = $this->db->query("SELECT * FROM clinic_admin WHERE id = '".@$data->clinic."'")->row();
                    echo @$getClinic->name;
                    ?>
                </p>
                <p class="SubHeading">Provider:
                    <?php
                    $getProvider = $this->db->query("SELECT * FROM provider WHERE id = '".@$data->provider."'")->row();
                    echo @$getProvider->name;
                    ?>
                </p>
                <p class="SubHeading">Coach:
                    <?php
                    $getHealthEntity = $this->db->query("SELECT * FROM health_entity WHERE id = '".@$data->health_etity."'")->row();
                    echo $getHealthEntity->name;
                    ?>
                </p>
                <p class="SubHeading">Enrolled By:
                    <?php
                    $getEnrolledBy = $this->db->query("SELECT * FROM users WHERE id = '".@$data->added_by."'")->row();
                    echo @$getEnrolledBy->fname." ".@$getEnrolledBy->lname;
                    ?>
                </p>
                <div class="IconContainer">
                    <a href="" data-bs-toggle="modal" data-bs-target="#EditPromotionModal" onclick="editParticipant('<?= $data->id; ?>')">
                        <i class="fa fa-pencil-square" aria-hidden="true"></i>
                    </a>
                    <a href="" data-bs-toggle="modal" data-bs-target="#DeletePromotionModal" onclick="deleteParticipant('<?= $data->id; ?>')">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                </div>
                <!-- <div style="position: absolute; z-index: 10; top: 50px; right: 12px; display: flex; flex-direction: row; align-items: center; justify-content: center; height: 35px; gap: 10px; ">
                    <button class="btn btn-primary">Assign</button>
                </div> -->
            </div>
        </div>
        <?php } } ?>
    </div>

    <div id="UnassignedParticipant" class="row m-0 TabContent">
        <?php if(!empty($allunassignedParticipant_list)) {
        foreach ($allunassignedParticipant_list as $key => $data) { ?>
        <div class="Card col-lg-3 col-md-3 col-sm-6">
            <?php
            if(!empty($data->image) && file_exists('uploads/profile/'.$data->image)) {
                $image = base_url('/uploads/profile/'.@$data->coverImage);
            } else {
                $image = base_url('assets/users_assets/images/no_bimage.png');
            } ?>
            <div class="CardInner" data-bs-toggle="modal" data-bs-target="#DetailsPromotionModal" style="background: url(<?= $image?>); background-size: cover; background-repeat: no-repeat;">
                <div class="Cover"></div>
                <p class="Heading"><?= @$data->fname." ".@$data->lname?></p>
                <p class="SubHeading">Participant ID: <?= @$data->participant_code;?></p>
                <p class="SubHeading">Clinic:
                    <?php
                    $getClinic = $this->db->query("SELECT * FROM clinic_admin WHERE id = '".@$data->clinic."'")->row();
                    echo @$getClinic->name;
                    ?>
                </p>
                <p class="SubHeading">Provider:
                    <?php
                    $getProvider = $this->db->query("SELECT * FROM provider WHERE id = '".@$data->provider."'")->row();
                    echo @$getProvider->name;
                    ?>
                </p>
                <p class="SubHeading">Coach:
                    <?php
                    $getHealthEntity = $this->db->query("SELECT * FROM health_entity WHERE id = '".@$data->health_etity."'")->row();
                    echo $getHealthEntity->name;
                    ?>
                </p>
                <p class="SubHeading">Enrolled By:
                    <?php
                    $getEnrolledBy = $this->db->query("SELECT * FROM users WHERE id = '".@$data->added_by."'")->row();
                    echo @$getEnrolledBy->fname." ".@$getEnrolledBy->lname;
                    ?>
                </p>
                <div class="IconContainer">
                    <a href="" data-bs-toggle="modal" data-bs-target="#EditPromotionModal" onclick="editParticipant('<?= $data->id; ?>')">
                        <i class="fa fa-pencil-square" aria-hidden="true"></i>
                    </a>
                    <a href="" data-bs-toggle="modal" data-bs-target="#DeletePromotionModal" onclick="deleteParticipant('<?= $data->id; ?>')">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
        <?php } } ?>
    </div>

    <div id="ParticipantDeactivated" class="row m-0 TabContent">
        <?php if(!empty($alldeactivatedParticipant_list)) {
        foreach ($alldeactivatedParticipant_list as $key => $data) { ?>
        <div class="Card col-lg-3 col-md-3 col-sm-6">
            <?php
            if(!empty($data->image) && file_exists('uploads/profile/'.$data->image)) {
                $image = base_url('/uploads/profile/'.@$data->coverImage);
            } else {
                $image = base_url('assets/users_assets/images/no_bimage.png');
            } ?>
            <div class="CardInner" data-bs-toggle="modal" data-bs-target="#DetailsPromotionModal" style="background: url(<?= $image?>); background-size: cover; background-repeat: no-repeat;">
                <div class="Cover"></div>
                <p class="Heading"><?= @$data->fname." ".@$data->lname?></p>
                <p class="SubHeading">Participant ID: <?= @$data->participant_code;?></p>
                <p class="SubHeading">Clinic:
                    <?php
                    $getClinic = $this->db->query("SELECT * FROM clinic_admin WHERE id = '".@$data->clinic."'")->row();
                    echo @$getClinic->name;
                    ?>
                </p>
                <p class="SubHeading">Provider:
                    <?php
                    $getProvider = $this->db->query("SELECT * FROM provider WHERE id = '".@$data->provider."'")->row();
                    echo @$getProvider->name;
                    ?>
                </p>
                <p class="SubHeading">Coach:
                    <?php
                    $getHealthEntity = $this->db->query("SELECT * FROM health_entity WHERE id = '".@$data->health_etity."'")->row();
                    echo $getHealthEntity->name;
                    ?>
                </p>
                <p class="SubHeading">Enrolled By:
                    <?php
                    $getEnrolledBy = $this->db->query("SELECT * FROM users WHERE id = '".@$data->added_by."'")->row();
                    echo @$getEnrolledBy->fname." ".@$getEnrolledBy->lname;
                    ?>
                </p>
                <div class="IconContainer">
                    <a href="" data-bs-toggle="modal" data-bs-target="#EditPromotionModal" onclick="editParticipant('<?= $data->id; ?>')">
                        <i class="fa fa-pencil-square" aria-hidden="true"></i>
                    </a>
                    <a href="" data-bs-toggle="modal" data-bs-target="#DeletePromotionModal" onclick="deleteParticipant('<?= $data->id; ?>')">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
        <?php } } ?>
    </div>
</div>
<style>
    #profileImagePreview{width: 55px; height: 55px; border-radius: 30px; float: left; margin-top: 15px;}
    #coverImagePreview{width: 55px; height: 55px; border-radius: 30px; float: left; margin-top: 15px;}
</style>
<script>
$(document).ready(function() {
    $('#confirm_password').on('keyup', function () {
        if ($('#password').val() == $('#confirm_password').val()) {
            $('#passerrormsg').html('Password Match').css('color', 'green');
            $('#password').focus().css('border', '2px solid green');
            $('#confirm_password').focus().css('border', '2px solid green');
            document.getElementById('addParticipantButton').disabled = false;
        } else {
            $('#password').focus().css('border', '2px solid red');
            $('#confirm_password').focus().css('border', '2px solid red');
            $('#passerrormsg').html('Password Mismatch').css('color', 'red');
            document.getElementById('addParticipantButton').disabled = true;
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

$(document).on('change','#health_etity',function(e){
	var health_etity = $(this).val();
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url('Home/health_etity'); ?>',
        data: {health_etity : health_etity},
        success: function(data){
            $("#clinic").html(data);
        }
    });
});

$(document).on('change','#clinic',function(e){
    var clinic = $(this).val();
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url('Home/get_clinic'); ?>',
        data: {clinic : clinic},
        success: function(data){
            $("#provider").html(data);
        }
	});
});

$(document).on('change','#edit_health_etity',function(e){
	var health_etity = $(this).val();
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url('Home/health_etity'); ?>',
        data: {health_etity : health_etity},
        success: function(data){
            $("#edit_clinic").html(data);
        }
    });
});

$(document).on('change','#edit_clinic',function(e){
    var clinic = $(this).val();
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url('Home/get_clinic'); ?>',
        data: {clinic : clinic},
        success: function(data){
            $("#edit_provider").html(data);
        }
	});
});

function detailParticipant(id) {
    var uid = id;
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url('coach/Dashboard/detailsParticipant'); ?>',
        data: {u_id : uid},
        success: function(data){
            var responce =JSON.parse(data);
            $('#tag1').text('Participant ID: '+responce.participant_code);
            $('#tag2').text('Clinic: '+responce.clinic);
            $('#tag3').text('Provider:' +responce.provider);
            $('#tag4').text('Coach:' +responce.health_etity);
            $('#tag5').text('Enrolled By:' +responce.added_by);
            $('#BodyText').text(responce.about);
            //$('#edit_uid').val(responce.id);
            // Set the profile and cover image preview (display images if applicable)
            if (responce.image) {
                $('#detailsImage').attr('src', '<?= base_url('/uploads/profile/')?>' + responce.image);
            }
            if (responce.coverImage) {
                $('#OwnerImg').attr('src', '<?= base_url('/uploads/profile/')?>' + responce.coverImage);
            }
        }
    })
}

function editParticipant(id) {
    var uid = id;
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url('coach/Dashboard/editParticipant'); ?>',
        data: {u_id : uid},
        success: function(data){
            var responce =JSON.parse(data);
            $('#edit_fname').val(responce.fname);
            $('#edit_lname').val(responce.lname);
            $('#edit_email').val(responce.email);
            $('#edit_dob').val(responce.dob);
            $('#edit_phone').val(responce.phone);
            if (responce.phone_2) {
                $('#edit_phone_2').val(responce.phone_2);
            } else {
                $('#edit_phone_2').val('');
            }
            // Set other fields
            $('#edit_health_etity').val(responce.health_etity);
            $('#edit_clinic').val(responce.clinic);
            $('#edit_provider').val(responce.provider);
            $('#edit_insurance_provider').val(responce.insurance_provider);
            $('#edit_userstatus').val(responce.status);
            $('#edit_uid').val(responce.id);
            // Set the profile and cover image preview (display images if applicable)
            if (responce.image) {
                $('#profileImagePreview').attr('src', '<?= base_url('/uploads/profile/')?>' + responce.image);
            }
            if (responce.coverImage) {
                $('#coverImagePreview').attr('src', '<?= base_url('/uploads/profile/')?>' + responce.coverImage);
            }

            $('#old_image').val(responce.image);
            $('#old_bimage').val(responce.coverImage);
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('Home/health_etity'); ?>',
                data: {health_etity : responce.health_etity},
                success: function(data){
                    $("#edit_clinic").html(data);
                    $("#edit_clinic").val(responce.clinic);
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url('Home/get_clinic'); ?>',
                        data: {clinic : responce.clinic},
                        success: function(data){
                            $("#edit_provider").html(data);
                            $("#edit_provider").val(responce.provider);
                        }
                    })
                }
            })
        }
    })
}

function deleteParticipant(id) {
    $('#idToDelete').val(id);
}

function onDeleteParticipant() {
    var uid = $('#idToDelete').val();
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url('coach/Dashboard/deleteParticipant'); ?>',
        data: {u_id : uid},
        success: function(data){
            var responce =JSON.parse(data);
            if(responce[0] == 'success'){
                $('#errormsg').html(responce[1]).css({'margin-right': '55px', 'color': 'green'});
                $('#errormsg').fadeOut(3000);
                setTimeout(() => {
                    location.reload();
                }, 3500);
            } else {
                $('#errormsg').html(responce[1]).css({'margin-right': '55px', 'color': 'red'});
            }
        }
    })
}

</script>