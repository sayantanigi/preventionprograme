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
                    <form class="row g-3" action="<?= base_url('clinic_admin/add_provider')?>" method="POST" enctype="multipart/form-data">
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
                            <input type="email" name="email" id="provider_email " required autocomplete="off" placeholder="Enter Provider Email Id">
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
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Select Provider Type <span style="color: red">*</span></label>
                            <select class="form-control" name="provider_type" required id="userprovider_type">
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

                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Primary Location</label>
                            <input type="text" name="address" id="address" autocomplete="off" placeholder="Enter Primary Location">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Address</label>
                            <input type="text" name="address_2" id="address_2" autocomplete="off" placeholder="Enter Address">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Country</label>
                            <input type="text" name="country" id="country" autocomplete="off" placeholder="Enter Country">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">City</label>
                            <input type="text" name="city" id="city" autocomplete="off" placeholder="Enter City">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">State</label>
                            <input type="text" name="state" id="state" autocomplete="off" placeholder="Enter State">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Zip Code</label>
                            <input type="text" name="zipcode" id="zipcode" autocomplete="off" placeholder="Enter Zip Code">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Degree</label>
                            <input type="text" name="degree" id="degree" autocomplete="off" placeholder="Enter Degree">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Specializations</label>
                            <input type="text" name="specializations" id="specializations" autocomplete="off" placeholder="Enter Specializations">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Certificates</label>
                            <input type="text" name="certificates" id="certificates" autocomplete="off" placeholder="Enter Certificates">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Licenses</label>
                            <input type="text" name="license" id="license" autocomplete="off" placeholder="Enter Licenses">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Status <span style="color: red">*</span></label>
                            <select class="form-control" name="status" required id="userstatus">
                                <option value="">Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <div class="modal-footer" style="margin: 0; border: none; padding: 0px 6px 0px 0px;">
                            <p id="passerrormsg" style="margin-right: 55px; color: green;"></p>
                            <p id="resultclinicmsg" style="margin-right: 55px;"></p>
                            <button type="submit" class="btn btn-primary" id="addproviderButton">Add Provider</button>
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
                    <form class="row g-3" action="<?= base_url('clinic_admin/update_provider')?>" method="POST" enctype="multipart/form-data">
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
                            <input type="email" name="edit_email" id="edit_provider_email" required autocomplete="off" placeholder="Enter Provider Email Id">
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
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Select Provider Type <span style="color: red">*</span></label>
                            <select class="form-control" name="edit_provider_type" required id="edit_userprovider_type">
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
                            <select class="form-control" name="edit_health_etity" required id="edit_health_etity">
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
                            <select class="form-control" name="edit_clinic" id="edit_clinic" required>
                                <option value="">Select Clinic</option>
                            </select>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Primary Location</label>
                            <input type="text" name="edit_address" id="edit_address" autocomplete="off" placeholder="Enter Primary Location">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Address</label>
                            <input type="text" name="edit_address_2" id="edit_address_2" autocomplete="off" placeholder="Enter Address">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Country</label>
                            <input type="text" name="edit_country" id="edit_country" autocomplete="off" placeholder="Enter Country">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">City</label>
                            <input type="text" name="edit_city" id="edit_city" autocomplete="off" placeholder="Enter City">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">State</label>
                            <input type="text" name="edit_state" id="edit_state" autocomplete="off" placeholder="Enter State">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Zip Code</label>
                            <input type="text" name="edit_zipcode" id="edit_zipcode" autocomplete="off" placeholder="Enter Zip Code">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Degree</label>
                            <input type="text" name="edit_degree" id="edit_degree" autocomplete="off" placeholder="Enter Degree">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Specializations</label>
                            <input type="text" name="edit_specializations" id="edit_specializations" autocomplete="off" placeholder="Enter Specializations">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Certificates</label>
                            <input type="text" name="edit_certificates" id="edit_certificates" autocomplete="off" placeholder="Enter Certificates">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Licenses</label>
                            <input type="text" name="edit_license" id="edit_license" autocomplete="off" placeholder="Enter Licenses">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Status <span style="color: red">*</span></label>
                            <select class="form-control" name="edit_status" required id="edit_userstatus">
                                <option value="">Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <div class="modal-footer" style="margin: 0; border: none; padding: 0px 6px 0px 0px;">
                            <p id="passerrormsg" style="margin-right: 55px; color: green;"></p>
                            <p id="resultclinicmsg" style="margin-right: 55px;"></p>
                            <button type="submit" class="btn btn-primary" id="updateproviderButton">Update Provider</button>
                            <input type="hidden" name="provider_id" id="provider_id" value="<?= $this->session->userdata('loguserId'); ?>">
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
    <!-- <div class="modal fade CustomModal" id="DetailsPromotionModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
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
    </div> -->

    <div class="row m-0 TabBar">
        <div class="Pagination">
            <a href="<?= base_url('clinic_admin/dashboard')?>" id="Home" style="float: left"><i class="fa fa-angle-left" aria-hidden="true"></i> Home / </a>
            <a href="<?= base_url('clinic_admin/providers')?>" id="Home">&nbsp;Provider Management</a>
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
            <!-- <div class="Tab" onclick="openTab(event, 'UnassignedParticipant')">Unassigned Provider</div> -->
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
                <p class="SubHeading"><strong style="color: #ffffff !important;">Provider Type: </strong><?= @$data->provider_type;?></p>
                <p class="SubHeading"><strong style="color: #ffffff !important;">Age: </strong><?= (date('Y') - date('Y',strtotime(@$data->dob)));?>Y</p>
                <div class="IconContainer">
                    <a href="" data-bs-toggle="modal" data-bs-target="#EditPromotionModal" onclick="editProvider('<?= $data->id; ?>')">
                        <i class="fa fa-pencil-square" aria-hidden="true"></i>
                    </a>
                    <a href="" data-bs-toggle="modal" data-bs-target="#DeletePromotionModal" onclick="deleteProvider('<?= $data->id; ?>')">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                    <a href="<?= base_url('clinic_admin/participants/'.$data->id)?>">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
        <?php } } ?>
    </div>

    <!-- <div id="UnassignedParticipant" class="row m-0 TabContent">
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
    </div> -->

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
        url: '<?php echo base_url('clinic_admin/Dashboard/detailsProvider'); ?>',
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
        url: '<?php echo base_url('clinic_admin/Dashboard/editProvider'); ?>',
        data: {u_id : uid},
        success: function(data){
            var response =JSON.parse(data);
            console.log(response);
            $('#edit_fname').val(response.fname);
            $('#edit_lname').val(response.lname);
            $('#edit_provider_email').val(response.email);
            $('#edit_gender').val(response.gender);
            $('#edit_dob').val(response.dob);
            $('#edit_phone').val(response.phone);
            $('#edit_userprovider_type').val(response.provider_type);
            $('#edit_health_etity').val(response.health_etity);
            $('#edit_clinic').val(response.clinic);
            $('#edit_address').val(response.address);
            $('#edit_address_2').val(response.address_2);
            $('#edit_country').val(response.country);
            $('#edit_city').val(response.city);
            $('#edit_state').val(response.state);
            $('#edit_zipcode').val(response.zipcode);
            $('#edit_degree').val(response.degree);
            $('#edit_specializations').val(response.specializations);
            $('#edit_certificates').val(response.certificates);
            $('#edit_license').val(response.license);
            $('#edit_userstatus').val(response.status);
            $('#provider_id').val(response.id);

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
        url: '<?php echo base_url('clinic_admin/Dashboard/deleteProvider'); ?>',
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

$('#provider_email').blur(function(e) {
    var email = $(this).val();
    if(email != '') {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('clinic_admin/dashboard/check_provider_email'); ?>',
            data: {email : email},
            success: function(response){
                responseData =JSON.parse(response);
                if(responseData.status == 'success') {
                    $('#resultclinicmsg').html('<p style="color:green; margin: 8px 0 0 0">'+responseData.message+'</p>');
                    $('#addproviderButton').prop('disabled', false);
                } else {
                    $('#resultclinicmsg').html('<p style="color:red; margin: 8px 0 0 0">'+responseData.message+'</p>');
                    $('#addproviderButton').prop('disabled', true);
                }
            }
        });
    }
});

$('#edit_provideremail').keyup(function(e) {
    var clinic_name = $(this).val();
    if(clinic_name != '') {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('clinic_admin/dashboard/check_provider_email'); ?>',
            data: {clinic_name : clinic_name},
            success: function(response){
                responseData =JSON.parse(response);
                if(responseData.status == 'success') {
                    $('#resulteditprovidermsg').html('<p style="color:green; margin: 8px 0 0 0">'+responseData.message+'</p>');
                    $('#updateproviderButton').prop('disabled', false);
                } else {
                    $('#resulteditprovidermsg').html('<p style="color:red; margin: 8px 0 0 0">'+responseData.message+'</p>');
                    $('#updateproviderButton').prop('disabled', true);
                }
            }
        });
    }
});
</script>