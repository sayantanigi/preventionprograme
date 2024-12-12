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
                            <input type="text" name="insurance_provider"  id="insurance_provider" required autocomplete="off" placeholder="Enter title">
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
                                    <input type="text" name="password"  id="password" required autocomplete="off" placeholder="Enter title">
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <label class="form-label">Confirm Password <span style="color: red">*</span></label>
                                    <input type="text" name="confirm_password"  id="confirm_password" required autocomplete="off" placeholder="Enter title">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" style="margin: 0; border: none; padding: 0px 6px 0px 0px;">
                            <button type="submit" class="btn btn-primary">Add Participant</button>
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
                    <h5 class="modal-title">Edit Promotion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3">
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Category</label>
                            <select>
                                <option selected disabled value="">Choose a category</option>
                                <option>...</option>
                            </select>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Type</label>
                            <select>
                                <option selected disabled value="">Choose a type</option>
                                <option>...</option>
                            </select>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Title</label>
                            <input type="text" placeholder="Enter title">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Upload File</label>
                            <input type="file" class="form-control" id="inputGroupFile01">
                        </div>
                        <div class="row m-0 pt-4 pb-2">
                            <div class="row m-0 InnerData g-3">
                                <p class="Heading">Target Audience</p>
                                <div class="col-md-4 col-sm-12">
                                    <label class="form-label">Gender</label>
                                    <select>
                                        <option selected disabled value="">Select gender</option>
                                        <option>...</option>
                                    </select>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <label class="form-label">Age</label>
                                    <select>
                                        <option selected disabled value="">Select age range</option>
                                        <option>...</option>
                                    </select>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <label class="form-label">Parental Status</label>
                                    <select>
                                        <option selected disabled value="">Select parental status</option>
                                        <option>...</option>
                                    </select>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <label class="form-label">Household Income</label>
                                    <select>
                                        <option selected disabled value="">Select household income</option>
                                        <option>...</option>
                                    </select>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <label class="form-label">Location</label>
                                    <input type="text" placeholder="Select location">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Select Promotion Plan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Promotion Modal -->
    <div class="modal fade CustomModal" id="DeletePromotionModal" data-bs-backdrop="static"
        data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Promotion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="InfoText">Do you really want your promotion to be deleted? It cannot be undone
                        once deleted.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Details Promotion Modal -->
    <div class="modal fade CustomModal" id="DetailsPromotionModal" data-bs-backdrop="static"
        data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Promotion Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row PromotionDetail">
                        <div class="col-md-8 col-sm-12 PromotionImg">
                            <img class="w-100"
                                src="https://img.freepik.com/free-photo/people-concert_1160-737.jpg?t=st=1730050734~exp=1730054334~hmac=4785251%E2%80%A6&w=900"
                                alt="">
                        </div>
                        <div class="col-md-4 col-sm-12 PromotionData">
                            <img class="OwnerImg"
                                src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?q=80&w=1760&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                alt="">
                            <p class="TitleText">Promotion Title</p>
                            <p class="OwnerText"><b>Owner:</b> Owner Name</p>
                            <ul>
                                <li>Tag Item</li>
                                <li>Tag Item</li>
                                <li>Tag</li>
                                <li>Tag Item</li>
                                <li>Tag Item</li>
                            </ul>
                        </div>
                        <div class="col-md-12 col-sm-12 PromotionData">
                            <p class="BodyText">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod molestias nihil vero quisquam assumenda. Consequuntur fuga veritatis quasi voluptates eum soluta ea quos eaque, hic possimus ipsum? Dicta, quisquam natus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque iusto autem rerum quibusdam pariatur saepe earum, laboriosam quam ab illo quod ad ut voluptatem. Consectetur, unde. Odit, beatae? Fugiat, magni. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nemo tempora delectus, officiis corrupti perspiciatis quam temporibus! Placeat, consectetur possimus ab accusantium itaque numquam ea. Dicta deserunt quae blanditiis eaque fuga. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates perferendis illum earum tempore, voluptas, facilis ullam illo sed provident tenetur quod accusantium harum, numquam nam consectetur aut consequuntur sunt quaerat? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eaque aperiam in similique quibusdam, ex veniam. Ullam, minus! Sapiente suscipit pariatur eum aspernatur laudantium earum! Quaerat, molestias ullam! Dolorum, sit similique. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem odio iure corporis deleniti unde quo ab atque soluta quam porro commodi quae ut natus, in voluptates quia quod fugit sint.</p>
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
        <?php if(!empty($participant_list)) {
        foreach ($participant_list as $key => $data) { ?>
        <div class="Card col-lg-3 col-md-3 col-sm-6">
            <div class="CardInner" data-bs-toggle="modal" data-bs-target="#DetailsPromotionModal">
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
                    <a href="" data-bs-toggle="modal" data-bs-target="#EditPromotionModal">
                        <i class="fa fa-pencil-square" aria-hidden="true"></i>
                    </a>
                    <a href="" data-bs-toggle="modal" data-bs-target="#DeletePromotionModal">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
        <?php } } ?>
    </div>

    <div id="UnassignedParticipant" class="row m-0 TabContent">
        <?php if(!empty($participant_list)) {
        foreach ($participant_list as $key => $data) { ?>
        <div class="Card col-lg-3 col-md-3 col-sm-6">
            <div class="CardInner" data-bs-toggle="modal" data-bs-target="#DetailsPromotionModal">
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
                    <a href="" data-bs-toggle="modal" data-bs-target="#EditPromotionModal">
                        <i class="fa fa-pencil-square" aria-hidden="true"></i>
                    </a>
                    <a href="" data-bs-toggle="modal" data-bs-target="#DeletePromotionModal">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
        <?php } } ?>
    </div>

    <div id="ParticipantDeactivated" class="row m-0 TabContent">
        <?php if(!empty($participant_list)) {
        foreach ($participant_list as $key => $data) { ?>
        <div class="Card col-lg-3 col-md-3 col-sm-6">
            <div class="CardInner" data-bs-toggle="modal" data-bs-target="#DetailsPromotionModal">
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
                    <a href="" data-bs-toggle="modal" data-bs-target="#EditPromotionModal">
                        <i class="fa fa-pencil-square" aria-hidden="true"></i>
                    </a>
                    <a href="" data-bs-toggle="modal" data-bs-target="#DeletePromotionModal">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
        <?php } } ?>
    </div>
</div>
<script>
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
</script>