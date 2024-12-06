<style>
    .Section.Promotion .Card .CardInner .SubHeading {font-size: 12px !important; font-weight: unset !important;}
</style>
<div class="container-fluid m-0 Section Promotion">
    <!-- Add Promotion Button -->
    <button type="button" class="AddButton" data-bs-toggle="modal" data-bs-target="#AddParticipantModal">
        <i class="fa fa-plus" aria-hidden="true"></i>
        <p>Add Provider</p>
    </button>

    <!-- Add Participant Modal -->
    <div class="modal fade CustomModal" id="AddParticipantModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Provider</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" action="<?= base_url('coach/add_provider')?>" method="POST" enctype="multipart/form-data">
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Provider First Name <span style="color: red">*</span></label>
                            <input type="text" name="fname" id="fname" required autocomplete="off" placeholder="Enter Provider First Name">
                      </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Provider Last Name <span style="color: red">*</span></label>
                            <input type="text" name="lname" id="lname" required autocomplete="off" placeholder="Enter Provider Last Name">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Provider Email Id <span style="color: red">*</span></label>
                            <input type="email" name="email" id="email" required autocomplete="off" placeholder="Enter Provider Email Id">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Provider Date of birth <span style="color: red">*</span></label>
                            <input type="date" name="dob" id="dob" required autocomplete="off" placeholder="Enter title">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Gender <span style="color: red">*</span></label>
                            <select class="form-control" name="gender" required id="gender">
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Provider Phone No <span style="color: red">*</span></label>
                            <input type="text" name="phone" id="phone" required autocomplete="off" placeholder="Enter Provider Phone No 1">
                        </div>
                        <!-- <div class="col-md-4 col-sm-12">
                            <label class="form-label">Provider Phone No 2</label>
                            <input type="text" name="phone_2" id="phone_2" autocomplete="off" placeholder="Enter Provider Phone No 2">
                        </div> -->
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Select Provider Type <span style="color: red">*</span></label>
                            <select class="form-control" name="specializations" required id="userspecializations">
                                <option value="">Select Provider Type</option>
                                <option value="Allergists/Immunologists">Allergists/Immunologists</option>
                                <option value="Anesthesiologists">Anesthesiologists</option>
                                <option value="Cardiologists">Cardiologists</option>
                                <option value="Colon and Rectal Surgeons">Colon and Rectal Surgeons</option>
                                <option value="Critical Care Medicine Specialists">Critical Care Medicine Specialists</option>
                                <option value="Dermatologists">Dermatologists</option>
                                <option value="Endocrinologists">Endocrinologists</option>
                                <option value="Emergency Medicine Specialists">Emergency Medicine Specialists</option>
                                <option value="Family Physicians">Family Physicians</option>
                                <option value="Gastroenterologists">Gastroenterologists</option>
                                <option value="Geriatric Medicine Specialists">Geriatric Medicine Specialists</option>
                                <option value="Hematologists">Hematologists</option>
                                <option value="Hospice and Palliative Medicine Specialists">Hospice and Palliative Medicine Specialists</option>
                                <option value="Infectious Disease Specialists">Infectious Disease Specialists</option>
                                <option value="Internists">Internists</option>
                                <option value="Medical Geneticists">Medical Geneticists</option>
                                <option value="Nephrologists">Nephrologists</option>
                                <option value="Neurologists">Neurologists</option>
                                <option value="Obstetricians and Gynecologists">Obstetricians and Gynecologists</option>
                                <option value="Oncologists">Oncologists</option>
                                <option value="Ophthalmologists">Ophthalmologists</option>
                                <option value="Osteopaths ">Osteopaths </option>
                                <option value="Otolaryngologists">Otolaryngologists</option>
                                <option value="Pathologists">Pathologists</option>
                                <option value="Pediatricians">Pediatricians</option>
                                <option value="Physiatrists">Physiatrists</option>
                                <option value="Plastic Surgeons">Plastic Surgeons</option>
                                <option value="Podiatrists">Podiatrists</option>
                                <option value="Preventive Medicine Specialists">Preventive Medicine Specialists</option>
                                <option value="Psychiatrists">Psychiatrists</option>
                                <option value="Pulmonologists">Pulmonologists</option>
                                <option value="Radiologists">Radiologists</option>
                                <option value="Rheumatologists">Rheumatologists</option>
                                <option value="Sleep Medicine Specialists">Sleep Medicine Specialists</option>
                                <option value="General Surgeons">General Surgeons</option>
                                <option value="Urologists">Urologists</option>
                            </select>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Select Health Group <span style="color: red">*</span></label>
                            <select class="form-control" name="health_etity" required id="health_etity">
                                <option value="">Select Health Group</option>
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
                            <label class="form-label">Select Clinic <span style="color: red">*</span></label>
                            <select class="form-control" name="clinic" id="clinic" required>
                                <option value="">Select Clinic</option>
                            </select>
                        </div>
                        <!-- <div class="col-md-4 col-sm-12">
                            <label class="form-label">Select Provider Type<span style="color: red">*</span></label>
                            <select class="form-control" name="provider" required id="provider">
                                <option value="">Select Provider Type</option>
                            </select>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Insurance Provider <span style="color: red">*</span></label>
                            <input type="text" name="insurance_provider"  id="insurance_provider" required autocomplete="off" placeholder="Enter Insurance Provider Name">
                        </div> -->
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
                            <button type="submit" class="btn btn-primary" id="addProviderButton">Add Provider</button>
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
                    <h5 class="modal-title">Edit Provider</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" action="<?= base_url('coach/update_provider')?>" method="POST" enctype="multipart/form-data">
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Provider First Name <span style="color: red">*</span></label>
                            <input type="text" name="edit_fname" id="edit_fname" required autocomplete="off" placeholder="Enter Provider First Name">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Provider Last Name <span style="color: red">*</span></label>
                            <input type="text" name="edit_lname" id="edit_lname" required autocomplete="off" placeholder="Enter Provider Last Name">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Provider Email Id <span style="color: red">*</span></label>
                            <input type="email" name="edit_email" id="edit_email" required autocomplete="off" placeholder="Enter Provider Email Id">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Provider Date of birth <span style="color: red">*</span></label>
                            <input type="date" name="edit_dob" id="edit_dob" required autocomplete="off" placeholder="Enter title">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Gender <span style="color: red">*</span></label>
                            <select class="form-control" name="edit_gender" required id="edit_gender">
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Provider Phone No <span style="color: red">*</span></label>
                            <input type="text" name="edit_phone" id="edit_phone" required autocomplete="off" placeholder="Enter Provider Phone No 1">
                        </div>
                        <!-- <div class="col-md-4 col-sm-12">
                            <label class="form-label">Provider Phone No 2</label>
                            <input type="text" name="edit_phone_2" id="edit_phone_2" autocomplete="off" placeholder="Enter Provider Phone No 2">
                        </div> -->
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Specializations <span style="color: red">*</span></label>
                            <select class="form-control" name="edit_specializations" required id="edit_specializations">
                                <option value="">Select Specializations</option>
                                <option value="Allergists/Immunologists">Allergists/Immunologists</option>
                                <option value="Anesthesiologists">Anesthesiologists</option>
                                <option value="Cardiologists">Cardiologists</option>
                                <option value="Colon and Rectal Surgeons">Colon and Rectal Surgeons</option>
                                <option value="Critical Care Medicine Specialists">Critical Care Medicine Specialists</option>
                                <option value="Dermatologists">Dermatologists</option>
                                <option value="Endocrinologists">Endocrinologists</option>
                                <option value="Emergency Medicine Specialists">Emergency Medicine Specialists</option>
                                <option value="Family Physicians">Family Physicians</option>
                                <option value="Gastroenterologists">Gastroenterologists</option>
                                <option value="Geriatric Medicine Specialists">Geriatric Medicine Specialists</option>
                                <option value="Hematologists">Hematologists</option>
                                <option value="Hospice and Palliative Medicine Specialists">Hospice and Palliative Medicine Specialists</option>
                                <option value="Infectious Disease Specialists">Infectious Disease Specialists</option>
                                <option value="Internists">Internists</option>
                                <option value="Medical Geneticists">Medical Geneticists</option>
                                <option value="Nephrologists">Nephrologists</option>
                                <option value="Neurologists">Neurologists</option>
                                <option value="Obstetricians and Gynecologists">Obstetricians and Gynecologists</option>
                                <option value="Oncologists">Oncologists</option>
                                <option value="Ophthalmologists">Ophthalmologists</option>
                                <option value="Osteopaths ">Osteopaths </option>
                                <option value="Otolaryngologists">Otolaryngologists</option>
                                <option value="Pathologists">Pathologists</option>
                                <option value="Pediatricians">Pediatricians</option>
                                <option value="Physiatrists">Physiatrists</option>
                                <option value="Plastic Surgeons">Plastic Surgeons</option>
                                <option value="Podiatrists">Podiatrists</option>
                                <option value="Preventive Medicine Specialists">Preventive Medicine Specialists</option>
                                <option value="Psychiatrists">Psychiatrists</option>
                                <option value="Pulmonologists">Pulmonologists</option>
                                <option value="Radiologists">Radiologists</option>
                                <option value="Rheumatologists">Rheumatologists</option>
                                <option value="Sleep Medicine Specialists">Sleep Medicine Specialists</option>
                                <option value="General Surgeons">General Surgeons</option>
                                <option value="Urologists">Urologists</option>
                            </select>
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
                        <!-- <div class="col-md-4 col-sm-12">
                            <label class="form-label">Select Provider <span style="color: red">*</span></label>
                            <select class="form-control" name="edit_provider" required id="edit_provider">
                                <option value="">Select Provider</option>
                            </select>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Insurance Provider <span style="color: red">*</span></label>
                            <input type="text" name="edit_insurance_provider" id="edit_insurance_provider" required autocomplete="off" placeholder="Enter Insurance Provider Name">
                        </div> -->
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
                                <input type="file" name="edit_profilePic" class="form-control" id="inputGroupFile03">
                                <input type="hidden" name="old_image" id="old_image">
                                <img src="<?= base_url('assets/users_assets/images/no_user.png')?>" id="profileImagePreview">
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <label class="form-label">Upload Cover Picture</label>
                                <input type="file" name="edit_backgroundPic" class="form-control" id="inputGroupFile04">
                                <input type="hidden" name="old_bimage" id="old_bimage">
                                <img src="<?= base_url('assets/users_assets/images/no_bimage.png')?>" id="coverImagePreview">
                            </div>
                        </div>
                        <div class="modal-footer" style="margin: 0; border: none; padding: 0px 6px 0px 0px;">
                            <button type="submit" class="btn btn-primary">Update Provider</button>
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
                    <h5 class="modal-title">Delete Provider</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="InfoText">Do you really want your Provider to be deleted? It cannot be undone once deleted.</p>
                </div>
                <div class="modal-footer">
                    <p id="message" style="margin-right: 55px; color: green; "></p>
                    <button type="button" class="btn btn-primary" onclick="onDeleteProvider()">Delete</button>
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
                    <h5 class="modal-title">Provider Details</h5>
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
                                <li id="tag1">Provider ID: </li>
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
            <a href="<?= base_url('coach/dashboard')?>" id="Home" style="float: left"><i class="fa fa-angle-left" aria-hidden="true"></i> Home / </a>
            <a href="<?= base_url('coach/providers')?>" id="Home">&nbsp;Provider Management</a>
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
            <div class="Tab active" onclick="openTab(event, 'AllParticipant')">All Provider</div>
            <div class="Tab" onclick="openTab(event, 'UnassignedParticipant')">Unassigned Provider</div>
            <div class="Tab" onclick="openTab(event, 'ParticipantDeactivated')">Provider Deactivated</div>
        </div>
    </div>

    <div id="AllParticipant" class="row m-0 TabContent active">
        <?php if(!empty($allProvider_list)) {
        foreach ($allProvider_list as $key => $data) { ?>
        <div class="Card col-lg-3 col-md-3 col-sm-6">
            <?php
            if(!empty($data->image) && file_exists('uploads/profile/'.$data->image)) {
                $image = base_url('/uploads/profile/'.@$data->coverImage);
            } else {
                $image = base_url('assets/users_assets/images/no_bimage.png');
            } ?>
            <div class="CardInner" data-bs-toggle="modal" data-bs-target="#DetailsPromotionModal" style="background: url(<?= $image?>); background-size: cover; background-repeat: no-repeat;" onclick="detailProvider('<?= $data->id; ?>')">
                <div class="Cover"></div>
                <p class="Heading"><?= strtoupper(@$data->fname[0]).". ".@$data->lname?></p>
                <p class="SubHeading"><strong style="color: #ffffff !important;">Provider ID: </strong><?= @$data->participant_code;?></p>
                <p class="SubHeading"><strong style="color: #ffffff !important;">Age: </strong><?= (date('Y') - date('Y',strtotime(@$data->dob)));?>Y</p>
                <div class="IconContainer">
                    <a href="" data-bs-toggle="modal" data-bs-target="#EditPromotionModal" onclick="editProvider('<?= $data->id; ?>')">
                        <i class="fa fa-pencil-square" aria-hidden="true"></i>
                    </a>
                    <a href="" data-bs-toggle="modal" data-bs-target="#DeletePromotionModal" onclick="deleteProvider('<?= $data->id; ?>')">
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
        <?php if(!empty($allunassignedProvider_list)) {
        foreach ($allunassignedProvider_list as $key => $data) { ?>
        <div class="Card col-lg-3 col-md-3 col-sm-6">
            <?php
            if(!empty($data->image) && file_exists('uploads/profile/'.$data->image)) {
                $image = base_url('/uploads/profile/'.@$data->coverImage);
            } else {
                $image = base_url('assets/users_assets/images/no_bimage.png');
            } ?>
            <div class="CardInner" data-bs-toggle="modal" data-bs-target="#DetailsPromotionModal" style="background: url(<?= $image?>); background-size: cover; background-repeat: no-repeat;">
                <div class="Cover"></div>
                <p class="Heading"><?= strtoupper(@$data->fname[0]).". ".@$data->lname?></p>
                <p class="SubHeading"><strong style="color: #ffffff !important;">Provider ID: </strong><?= @$data->participant_code;?></p>
                <p class="SubHeading"><strong style="color: #ffffff !important;">Age: </strong><?= (date('Y') - date('Y',strtotime(@$data->dob)));?>Y</p>
                <div class="IconContainer">
                    <a href="" data-bs-toggle="modal" data-bs-target="#EditPromotionModal" onclick="editProvider('<?= $data->id; ?>')">
                        <i class="fa fa-pencil-square" aria-hidden="true"></i>
                    </a>
                    <a href="" data-bs-toggle="modal" data-bs-target="#DeletePromotionModal" onclick="deleteProvider('<?= $data->id; ?>')">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
        <?php } } ?>
    </div>

    <div id="ParticipantDeactivated" class="row m-0 TabContent">
        <?php if(!empty($alldeactivatedProvider_list)) {
        foreach ($alldeactivatedProvider_list as $key => $data) { ?>
        <div class="Card col-lg-3 col-md-3 col-sm-6">
            <?php
            if(!empty($data->image) && file_exists('uploads/profile/'.$data->image)) {
                $image = base_url('/uploads/profile/'.@$data->coverImage);
            } else {
                $image = base_url('assets/users_assets/images/no_bimage.png');
            } ?>
            <div class="CardInner" data-bs-toggle="modal" data-bs-target="#DetailsPromotionModal" style="background: url(<?= $image?>); background-size: cover; background-repeat: no-repeat;">
                <div class="Cover"></div>
                <p class="Heading"><?= strtoupper(@$data->fname[0]).". ".@$data->lname?></p>
                <p class="SubHeading"><strong style="color: #ffffff !important;">Provider ID: </strong><?= @$data->participant_code;?></p>
                <p class="SubHeading"><strong style="color: #ffffff !important;">Age: </strong><?= (date('Y') - date('Y',strtotime(@$data->dob)));?>Y</p>
                <div class="IconContainer">
                    <a href="" data-bs-toggle="modal" data-bs-target="#EditPromotionModal" onclick="editProvider('<?= $data->id; ?>')">
                        <i class="fa fa-pencil-square" aria-hidden="true"></i>
                    </a>
                    <a href="" data-bs-toggle="modal" data-bs-target="#DeletePromotionModal" onclick="deleteProvider('<?= $data->id; ?>')">
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
            document.getElementById('addProviderButton').disabled = false;
        } else {
            $('#password').focus().css('border', '2px solid red');
            $('#confirm_password').focus().css('border', '2px solid red');
            $('#passerrormsg').html('Password Mismatch').css('color', 'red');
            document.getElementById('addProviderButton').disabled = true;
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

function detailProvider(id) {
    var uid = id;
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url('coach/Dashboard/detailsProvider'); ?>',
        data: {u_id : uid},
        success: function(data){
            var response =JSON.parse(data);
            $('#tag1').text('Participant ID: '+response.participant_code);
            $('#tag2').text('Clinic: '+response.clinic);
            $('#tag3').text('Provider:' +response.provider);
            $('#tag4').text('Coach:' +response.health_etity);
            $('#tag5').text('Enrolled By:' +response.added_by);
            $('#BodyText').text(response.about);

            if (response.image != null) {
                $('#OwnerImg').attr('src', '<?= base_url('/uploads/profile/')?>' + response.image);
            } else {
                $('#OwnerImg').attr('src', '<?= base_url('assets/users_assets/images/no_user.png') ?>');
            }

            if (response.image != null) {
                $('#detailsImage').attr('src', '<?= base_url('/uploads/profile/')?>' + response.coverImage);
            } else {
                $('#detailsImage').attr('src', '<?= base_url('assets/users_assets/images/no_bimage.png') ?>');
            }
        }
    })
}

function editProvider(id) {
    var uid = id;
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url('coach/Dashboard/editProvider'); ?>',
        data: {u_id : uid},
        success: function(data){

            var response =JSON.parse(data);
            console.log(response.image);
            $('#edit_fname').val(response.fname);
            $('#edit_lname').val(response.lname);
            $('#edit_email').val(response.email);
            $('#edit_gender').val(response.gender);
            $('#edit_dob').val(response.dob);
            $('#edit_phone').val(response.phone);
            $('#edit_health_etity').val(response.health_etity);
            $('#edit_clinic').val(response.clinic);
            $('#edit_specializations').val(response.specializations);
            $('#edit_provider').val(response.provider);
            $('#edit_insurance_provider').val(response.insurance_provider);
            $('#edit_userstatus').val(response.status);
            $('#edit_uid').val(response.id);

            if (response.image != null) {
                $('#profileImagePreview').attr('src', '<?= base_url('/uploads/profile/')?>' + response.image);
            } else {
                $('#profileImagePreview').attr('src', '<?= base_url('assets/users_assets/images/no_user.png') ?>');
            }

            if (response.coverImage != null) {
                $('#coverImagePreview').attr('src', '<?= base_url('/uploads/profile/')?>' + response.coverImage);
            } else {
                $('#coverImagePreview').attr('src', '<?= base_url('assets/users_assets/images/no_bimage.png') ?>');
            }

            $('#old_image').val(response.image);
            $('#old_bimage').val(response.coverImage);
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('Home/health_etity'); ?>',
                data: {health_etity : response.health_etity},
                success: function(data){
                    $("#edit_clinic").html(data);
                    $("#edit_clinic").val(response.clinic);
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url('Home/get_clinic'); ?>',
                        data: {clinic : response.clinic},
                        success: function(data){
                            $("#edit_provider").html(data);
                            $("#edit_provider").val(response.provider);
                        }
                    })
                }
            })
        }
    })
}

function deleteProvider(id) {
    $('#idToDelete').val(id);
}

function onDeleteProvider() {
    var uid = $('#idToDelete').val();
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url('coach/Dashboard/deleteProvider'); ?>',
        data: {u_id : uid},
        success: function(data){
            var response =JSON.parse(data);
            if(response[0] == 'success'){
                $('#errormsg').html(response[1]).css({'margin-right': '55px', 'color': 'green'});
                $('#errormsg').fadeOut(3000);
                setTimeout(() => {
                    location.reload();
                }, 3500);
            } else {
                $('#errormsg').html(response[1]).css({'margin-right': '55px', 'color': 'red'});
            }
        }
    })
}
</script>