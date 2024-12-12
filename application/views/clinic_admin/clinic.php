<style>
    .Section.Promotion .Card .CardInner .SubHeading {font-size: 12px !important; font-weight: unset !important;}
    table {font-family: arial, sans-serif; border-collapse: collapse;width: 100%;}
    td, th {border: 1px solid #dddddd; text-align: left; padding: 8px;}
    tr:nth-child(even) {background-color: #dddddd;}
    .checkbox-inline.checbox-switch,.checkbox.checbox-switch label{display:inline-block;position:relative;padding-left:0}
    .checkbox-inline.checbox-switch input,.checkbox.checbox-switch label input{display:none}
    .checkbox-inline.checbox-switch span,.checkbox.checbox-switch label span{width:35px;border-radius:20px;height:22px;border:1px solid #dfdfdf;background-color:#fff;box-shadow:#dfdfdf 0 0 0 0 inset;transition:border .4s,box-shadow .4s;display:inline-block;vertical-align:middle;margin-right:5px}
    .checkbox-inline.checbox-switch span:before,.checkbox.checbox-switch label span:before{display:inline-block;width:16px;height:16px;border-radius:50%;background:#fff;content:" ";top:0;position:relative;left:0;transition:.3s;box-shadow:0 1px 4px rgba(0,0,0,.4)}
    .checkbox-inline.checbox-switch>input:checked+span:before,.checkbox.checbox-switch label>input:checked+span:before{left:17px}
    .checkbox-inline.checbox-switch>input:checked+span,.checkbox.checbox-switch label>input:checked+span{background-color:#b4b6b7;border-color:#b4b6b7;box-shadow:#b4b6b7 0 0 0 8px inset;transition:border .4s,box-shadow .4s,background-color 1.2s}
    .checkbox-inline.checbox-switch>input:checked:disabled+span,.checkbox.checbox-switch label>input:checked:disabled+span{background-color:#dcdcdc;border-color:#dcdcdc;box-shadow:#dcdcdc 0 0 0 8px inset;transition:border .4s,box-shadow .4s,background-color 1.2s}
    .checkbox-inline.checbox-switch>input:disabled+span,.checkbox.checbox-switch label>input:disabled+span{background-color:#e8ebee;border-color:#fff}
    .checkbox-inline.checbox-switch>input:disabled+span:before,.checkbox.checbox-switch label>input:disabled+span:before{background-color:#f8f9fa;border-color:#f3f3f3;box-shadow:0 1px 4px rgba(0,0,0,.1)
    }.checkbox-inline.checbox-switch.switch-light>input:checked+span,.checkbox.checbox-switch.switch-light label>input:checked+span{background-color:#f8f9fa;border-color:#f8f9fa;box-shadow:#f8f9fa 0 0 0 8px inset;transition:border .4s,box-shadow .4s,background-color 1.2s}
    .checkbox-inline.checbox-switch.switch-dark>input:checked+span,.checkbox.checbox-switch.switch-dark label>input:checked+span{background-color:#343a40;border-color:#343a40;box-shadow:#343a40 0 0 0 8px inset;transition:border .4s,box-shadow .4s,background-color 1.2s}
    .checkbox-inline.checbox-switch.switch-dark>input:checked:disabled+span,.checkbox.checbox-switch.switch-dark label>input:checked:disabled+span{background-color:#646668;border-color:#646668;box-shadow:#646668 0 0 0 8px inset;transition:border .4s,box-shadow .4s,background-color 1.2s}
    .checkbox-inline.checbox-switch.switch-success>input:checked+span,.checkbox.checbox-switch.switch-success label>input:checked+span{background-color:#28a745;border-color:#28a745;box-shadow:#28a745 0 0 0 8px inset;transition:border .4s,box-shadow .4s,background-color 1.2s}
    .checkbox-inline.checbox-switch.switch-success>input:checked:disabled+span,.checkbox.checbox-switch.switch-success label>input:checked:disabled+span{background-color:#99d9a8;border-color:#99d9a8;box-shadow:#99d9a8 0 0 0 8px inset}
    .checkbox-inline.checbox-switch.switch-danger>input:checked+span,.checkbox.checbox-switch.switch-danger label>input:checked+span{background-color:#c82333;border-color:#c82333;box-shadow:#c82333 0 0 0 8px inset;transition:border .4s,box-shadow .4s,background-color 1.2s}
    .checkbox-inline.checbox-switch.switch-danger>input:checked:disabled+span,.checkbox.checbox-switch.switch-danger label>input:checked:disabled+span{background-color:#d87781;border-color:#d87781;box-shadow:#d87781 0 0 0 8px inset;transition:border .4s,box-shadow .4s,background-color 1.2s}
    .checkbox-inline.checbox-switch.switch-primary>input:checked+span,.checkbox.checbox-switch.switch-primary label>input:checked+span{background-color:#0069d9;border-color:#0069d9;box-shadow:#0069d9 0 0 0 8px inset;transition:border .4s,box-shadow .4s,background-color 1.2s}
    .checkbox-inline.checbox-switch.switch-primary>input:checked:disabled+span,.checkbox.checbox-switch.switch-primary label>input:checked:disabled+span{background-color:#6da3dd;border-color:#6da3dd;box-shadow:#6da3dd 0 0 0 8px inset;transition:border .4s,box-shadow .4s,background-color 1.2s}
    .checkbox-inline.checbox-switch.switch-info>input:checked+span,.checkbox.checbox-switch.switch-info label>input:checked+span{background-color:#17a2b8;border-color:#17a2b8;box-shadow:#17a2b8 0 0 0 8px inset;transition:border .4s,box-shadow .4s,background-color 1.2s}
    .checkbox-inline.checbox-switch.switch-info>input:checked:disabled+span,.checkbox.checbox-switch.switch-info label>input:checked:disabled+span{background-color:#66c0ce;border-color:#66c0ce;box-shadow:#66c0ce 0 0 0 8px inset;transition:border .4s,box-shadow .4s,background-color 1.2s}
    .checkbox-inline.checbox-switch.switch-warning>input:checked+span,.checkbox.checbox-switch.switch-warning label>input:checked+span{background-color:#ffc107;border-color:#ffc107;box-shadow:#ffc107 0 0 0 8px inset;transition:border .4s,box-shadow .4s,background-color 1.2s}
    .checkbox-inline.checbox-switch.switch-warning>input:checked:disabled+span,.checkbox.checbox-switch.switch-warning label>input:checked:disabled+span{background-color:#e2c366;border-color:#e2c366;box-shadow:#e2c366 0 0 0 8px inset;transition:border .4s,box-shadow .4s,background-color 1.2s}
</style>
<div class="container-fluid m-0 Section Promotion">
    <!-- Add Clinic Button -->
    <button type="button" class="AddButton" data-bs-toggle="modal" data-bs-target="#AddClinicModal" style="margin-right: 220px;">
        <i class="fa fa-plus" aria-hidden="true"></i>
        <p>Add Clinic</p>
    </button>

    <button type="button" class="AddButton" data-bs-toggle="modal" data-bs-target="#AddClinicAdminModal">
        <i class="fa fa-plus" aria-hidden="true"></i>
        <p>Add Clinic Admin</p>
    </button>

    <!-- Start Add/ Edit/ Delete function Clinic Modal -->
    <div class="modal fade CustomModal" id="AddClinicModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-l">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Clinic</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" action="<?= base_url('clinic_admin/add_clinic')?>" method="POST">
                        <div class="col-md-12 col-sm-12">
                            <label class="form-label">Clinic Name <span style="color: red">*</span></label>
                            <input type="text" name="clinic_name" id="clinic_name" required autocomplete="off" placeholder="Clinic Name">
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <label class="form-label">Status <span style="color: red">*</span></label>
                            <select class="form-control" name="clinic_status" required id="clinic_status">
                                <option value="">Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <div class="modal-footer" style="margin: 0; border: none; padding: 0px 6px 0px 0px;">
                            <p id="resultclinicmsg" style="margin-right: 55px;"></p>
                            <button type="submit" class="btn btn-primary" id="addclinicButton">Add Clinic</button>
                            <input type="hidden" name="uid" id="uid" value="<?= $this->session->userdata('loguserId'); ?>">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade CustomModal" id="EditClinicModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-l">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Clinic</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" action="<?= base_url('clinic_admin/update_clinic')?>" method="POST" enctype="multipart/form-data">
                        <div class="col-md-12 col-sm-12">
                            <label class="form-label">Clinic Name <span style="color: red">*</span></label>
                            <input type="text" name="edit_clinicname" id="edit_clinicname" required autocomplete="off">
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <label class="form-label">Status <span style="color: red">*</span></label>
                            <select class="form-control" name="edit_clinicstatus" required id="edit_clinicstatus">
                                <option value="">Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <div class="modal-footer" style="margin: 0; border: none; padding: 0px 6px 0px 0px;">
                            <p id="resulteditclinicmsg" style="margin-right: 55px;"></p>
                            <button type="submit" class="btn btn-primary" id="updateclinicButton">Update Clinic</button>
                            <input type="hidden" name="edit_cid" id="edit_cid" value="">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade CustomModal" id="DeleteClinicModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Participant</h5>
                </div>
                <div class="modal-body">
                    <p class="InfoText">Do you really want your clinic data to be deleted? Once deleted it cannot be undone.</p>
                </div>
                <div class="modal-footer">
                    <p id="message" style="margin-right: 55px; color: green; "></p>
                    <button type="button" class="btn btn-primary" onclick="onDeleteClinicAdmin()">Delete</button>
                    <input type="hidden" id="caidToDelete" value="">
                </div>
            </div>
        </div>
    </div>
    <!-- End Add/ Edit/ Delete function Clinic Modal -->

    <!-- Add Clinic Admin Modal -->
    <div class="modal fade CustomModal" id="AddClinicAdminModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Clinic Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" action="<?= base_url('clinic_admin/add_clinic_admin')?>" method="POST">
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Select Clinic Name <span style="color: red">*</span></label>
                            <select class="form-control" name="health_group_id" required id="health_group_id">
                                <option value="">Select Clinic Name</option>
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
                            <label class="form-label">Clinic Admin First Name <span style="color: red">*</span></label>
                            <input type="text" name="fname" id="fname" required autocomplete="off" placeholder="Clinic Admin First Name">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Clinic Admin Last Name <span style="color: red">*</span></label>
                            <input type="text" name="lname" id="lname" required autocomplete="off" placeholder="Clinic Admin Last Name">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Clinic Admin Email</label>
                            <input type="email" name="email" id="email" autocomplete="off" placeholder="Clinic Admin Email">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Status <span style="color: red">*</span></label>
                            <select class="form-control" name="status" required id="status">
                                <option value="">Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <div class="modal-footer" style="margin: 0; border: none; padding: 0px 6px 0px 0px;">
                            <p id="passerrormsg" style="margin-right: 55px; color: green; "></p>
                            <button type="submit" class="btn btn-primary" id="addParticipantButton">Add Clinic Admin</button>
                            <input type="hidden" name="uid" id="uid" value="<?= $this->session->userdata('loguserId'); ?>">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Clinic Admin Modal -->
    <div class="modal fade CustomModal" id="EditClinicAdminModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Clinic Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" action="<?= base_url('clinic_admin/update_clinic_admin')?>" method="POST" enctype="multipart/form-data">
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Select Clinic Name <span style="color: red">*</span></label>
                            <select class="form-control" name="edit_health_group_id" required id="edit_health_group_id">
                                <option value="">Select Clinic Name</option>
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
                            <label class="form-label">Clinic Admin First Name <span style="color: red">*</span></label>
                            <input type="text" name="edit_clinicadminfname" id="edit_clinicadminfname" required autocomplete="off" placeholder="Clinic Admin First Name">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Clinic Admin Last Name <span style="color: red">*</span></label>
                            <input type="text" name="edit_clinicadminlname" id="edit_clinicadminlname" required autocomplete="off" placeholder="Clinic Admin Last Name">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Clinic Admin Email</label>
                            <input type="email" name="edit_clinicadminemail" id="edit_clinicadminemail" autocomplete="off" placeholder="Clinic Admin Email">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label class="form-label">Status <span style="color: red">*</span></label>
                            <select class="form-control" name="edit_clinicadminstatus" required id="edit_clinicadminstatus">
                                <option value="">Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <div class="modal-footer" style="margin: 0; border: none; padding: 0px 6px 0px 0px;">
                            <button type="submit" class="btn btn-primary">Update Participant</button>
                            <input type="hidden" name="edit_caid" id="edit_caid" value="">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row m-0 TabBar">
        <div class="Pagination">
            <a href="<?= base_url('clinic_admin/dashboard')?>" id="Home" style="float: left"><i class="fa fa-angle-left" aria-hidden="true"></i> Home / </a>
            <a href="<?= base_url('clinic_admin/clinic')?>" id="Home">&nbsp;Clinic Management</a>
        </div>
        <?php if($this->session->flashdata('message')) { ?>
        <div class="alert alert-<?php echo $this->session->flashdata('message_type'); ?>1" style="background-color:<?php echo $this->session->flashdata('message_color'); ?>; text-align: center; padding: 5px; display: block;">
            <strong style="color:#063; display: block;">
                <?php
                echo @$this->session->flashdata('message');
                unset($_SESSION['message']);
                ?>
            </strong>
        </div>
        <?php } ?>
        <div class="TabContainer">
            <div class="Tab active" onclick="openTab(event, 'AllParticipant')">Manage Clinic</div>
            <div class="Tab" onclick="openTab(event, 'ParticipantDeactivated')">Clinic Deactivated</div>
        </div>
    </div>

    <div id="AllParticipant" class="row m-0 TabContent active">
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>Clinic ID</th>
                    <th>Clinic Name</th>
                    <th>Clinic Admin Name</th>
                    <th>Action</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            <?php if(!empty($allClinicAdminList)) {
                foreach ($allClinicAdminList as $key => $data) { ?>
                <tr>
                    <td><a href="<?= base_url('clinic_admin/providers/'.$data['clinic_id'])?>"><?= $data['clinic_id']?></a></td>
                    <td>
                        <?= $data['clinic_name']?>
                        <i class="fa fa-edit fa-1x text-danger removeClinic" data-bs-toggle="modal" data-bs-target="#EditClinicModal" onclick="editClinic('<?= $data['cid']?>')"></i>
                    </td>
                    <td><?= $data['clinic_admin_name']?></td>
                    <td>
                        <i class="fa fa-edit fa-1x text-danger removeClinic" data-bs-toggle="modal" data-bs-target="#EditClinicAdminModal" onclick="editClinicAdmin('<?= $data['caid']?>')"></i>
                        <i class="fa fa-trash fa-1x text-danger removeClinic" data-bs-toggle="modal" data-bs-target="#DeleteClinicModal" onclick="deleteClinicAdmin('<?= $data['caid']?>')"></i>
                    </td>
                    <td>
                        <div class="checkbox checbox-switch switch-success">
                            <label>
                                <input type="checkbox" value="<?= $data['clinic_admin_status']?>" <?= (@$data['clinic_admin_status'] == 1) ? 'checked="checked"' : ''; ?> onchange="changeClinicadminStatus(<?= @$data['caid'] ?>, $(this))">
                                <span></span>
                            </label>
                        </div>
                    </td>
                </tr>
                <?php } } else { ?>
                <tr>
                    <td colspan="5" style="text-align: center;">No data found</td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <div id="ParticipantDeactivated" class="row m-0 TabContent">
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>Clinic ID</th>
                    <th>Clinic Name</th>
                    <th>Clinic Admin Name</th>
                    <th>Action</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            <?php if(!empty($allDeactivatedClinicAdminList)) {
                foreach ($allDeactivatedClinicAdminList as $key => $data) { ?>
                <tr>
                    <td><?= $data['clinic_id']?></td>
                    <td>
                        <?= $data['clinic_name']?>
                    </td>
                    <td><?= $data['clinic_admin_name']?></td>
                    <td>
                        <i class="fa fa-trash fa-1x text-danger removeClinic" data-bs-toggle="modal" data-bs-target="#DeleteClinicModal" onclick="deleteClinicAdmin('<?= $data['caid']?>')"></i>
                    </td>
                    <td>
                        <div class="checkbox checbox-switch switch-success">
                            <label>
                                <input type="checkbox" value="<?= $data['clinic_admin_status']?>" <?= (@$data['clinic_admin_status'] == 1) ? 'checked="checked"' : ''; ?> onchange="changeClinicadminStatus(<?= @$data['caid'] ?>, $(this))">
                                <span></span>
                            </label>
                        </div>
                    </td>
                </tr>
                <?php } } else { ?>
                <tr>
                    <td colspan="5" style="text-align: center;">No data found</td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>
<style>
#profileImagePreview{width: 55px; height: 55px; border-radius: 30px; float: left; margin-top: 15px;}
#coverImagePreview{width: 55px; height: 55px; border-radius: 30px; float: left; margin-top: 15px;}
</style>
<script>
function alert_func(data) {
    swal({
        type: data[1],
        title: data[0],
    }, function() {
        location.reload();
    });
}

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

$('#clinic_name').blur(function(e) {
    var clinic_name = $(this).val();
    if(clinic_name != '') {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('clinic_admin/dashboard/check_clinic_name'); ?>',
            data: {clinic_name : clinic_name},
            success: function(response){
                responseData =JSON.parse(response);
                if(responseData.status == 'success') {
                    $('#resultclinicmsg').html('<p style="color:green; margin: 8px 0 0 0">'+responseData.message+'</p>');
                    $('#addclinicButton').prop('disabled', false);
                } else {
                    $('#resultclinicmsg').html('<p style="color:red; margin: 8px 0 0 0">'+responseData.message+'</p>');
                    $('#addclinicButton').prop('disabled', true);
                }
            }
        });
    }
});

$('#edit_clinicname').keyup(function(e) {
    var clinic_name = $(this).val();
    if(clinic_name != '') {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('clinic_admin/dashboard/check_clinic_name'); ?>',
            data: {clinic_name : clinic_name},
            success: function(response){
                responseData =JSON.parse(response);
                if(responseData.status == 'success') {
                    $('#resulteditclinicmsg').html('<p style="color:green; margin: 8px 0 0 0">'+responseData.message+'</p>');
                    $('#updateclinicButton').prop('disabled', false);
                } else {
                    $('#resulteditclinicmsg').html('<p style="color:red; margin: 8px 0 0 0">'+responseData.message+'</p>');
                    $('#updateclinicButton').prop('disabled', true);
                }
            }
        });
    }
});

function editClinic(id) {
    var cid = id;
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url('clinic_admin/Dashboard/edit_Clinic'); ?>',
        data: {c_id : cid},
        success: function(data){
            var responce =JSON.parse(data);
            $('#edit_clinicname').val(responce.name);
            $('#edit_clinicstatus').val(responce.status);
            $('#edit_cid').val(responce.id);
        }
    })
}

function deleteClinicAdmin(id) {
    $('#caidToDelete').val(id);
}

function onDeleteClinicAdmin() {
    var caid = $('#caidToDelete').val();
    $.ajax({
        url: '<?php echo base_url('clinic_admin/Dashboard/deleteclinicadmin'); ?>',
        type: 'POST',
        dataType: 'json',
        data: {
            ca_id : String(caid)
        },
    })
    .done(function (data) {
        alert_func(data);
    })
    .fail(function (data) {
        console.log(data);
    });
}

function changeClinicadminStatus(id, thisSwitch) {
    var newStatus;
    if (thisSwitch.val() == 1) {
        thisSwitch.val('0');
        newStatus = '0';
    } else {
        thisSwitch.val('1');
        newStatus = '1';
    }
    $.ajax({
        url: '<?= base_url('clinic_admin/Dashboard/changeClinicAdminStatus') ?>',
        type: 'POST',
        dataType: 'json',
        data: {
            id: String(id),
            status: String(newStatus)
        },
    })
    .done(function (data) {
        alert_func(data);
    })
    .fail(function (data) {
        console.log(data);
    });
}

function editClinicAdmin(caid){
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url('clinic_admin/Dashboard/edit_clinic_admin'); ?>',
        data: {ca_id : caid},
        success: function(data){
            var response =JSON.parse(data);
            console.log(response);
            $('#edit_health_group_id').val(response.health_group_id);
            $('#edit_clinicadminfname').val(response.fname);
            $('#edit_clinicadminlname').val(response.lname);
            $('#edit_clinicadminemail').val(response.email);
            $('#edit_clinicadminstatus').val(response.status);
            $('#edit_caid').val(response.id);
        }
    })
}

</script>