<style>
.form-check {display: flex; align-items: center; }
.form-check label {margin-left: 10px; font-size: 18px; font-weight: 500;}
.form-switch .form-check-input[type=checkbox] {border-radius: 2em; height: 50px; width: 100px;}
small>p {color: red;}
p strong {font-weight: 600 !important; color: black !important;}
.sa-confirm-button-container button {background-color: #146c43 !important; border-color: #146c43 !important;}
</style>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0"><?= $title ?></h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></li>
                                <li class="breadcrumb-item active"><?= @$page ?></li>
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
                                    <h4 class="card-title mb-4"><?= @$page ?></h4>
                                </div>
                                <div class="col-sm-2 text-end" style="padding-left: 54px;">
                                    <a href="<?= base_url('admin/clinic/add_clinic') ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>&nbsp;Add</a>
                                </div>
                            </div>
                            <div class="">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                                    <thead class="thead-light text-center">
                                        <tr>
                                            <th>#</th>
                                            <th>Added By</th>
                                            <th>Code</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php if (is_array($clinic_list) || is_object($clinic_list)) {
                                        foreach ($clinic_list as $key => $v) { ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td>
                                                <?php if(@$v->added_by == '0'){
                                                    echo 'Admin';
                                                } else {
                                                    $getuserData = $this->db->query("SELECT * FROM users WHERE id = '".@$v->added_by."'")->row();
                                                    echo ucfirst(@$getuserData->fname." ".@$getuserData->lname);
                                                } ?>
                                                </td>
                                            <td><?= ucfirst(@$v->clinic_code); ?></td>
                                            <td><?= ucfirst(@$v->name); ?></td>
                                            <td>
                                                <div class="form-check mb-3 mt-3">
                                                    <input type="checkbox" class="form-check-input small" id="statusChange_<?= $key ?>" switch="bool" value="<?= @$v->status ?>" <?= (@$v->status == 1) ? 'checked' : '' ?> onchange="changeClinicStatus(<?= @$v->id ?>, $(this))">
                                                    <label class="form-check-label" for="statusChange_<?= $key ?>"></label>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?= base_url('admin/clinic/edit_clinic/' . $v->id) ?>" class="btn btn-outline-success btn-sm" data-toggle="tooltip" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="javascript:void(0)" class="btn btn-outline-warning btn-sm" data-toggle="tooltip" title="Delete" onclick="deleteClinic(<?= @$v->id ?>)">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php } } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.0/FileSaver.min.js"></script>
<script type="text/javascript">
function changeClinicStatus(id, thisSwitch) {
    var newStatus;
    if (thisSwitch.val() == 1) {
        thisSwitch.val('0');
        newStatus = '0';
    } else {
        thisSwitch.val('1');
        newStatus = '1';
    }

    $.ajax({
        url: '<?php echo base_url('admin/clinic/change_clinic_status'); ?>',
        type: 'POST',
        dataType: 'json',
        data: {
            id: String(id),
            status: String(newStatus)
        },
    })
    .done(function (data) {
        if (newStatus == 1) {
            swal({
                title: "Sucess!",
                text: "<strong>Clinic status is Activate</strong>",
                type: "success",
                showConfirmButton: true,
                html: true
            }, function () {
                window.location.href = " "
            });
        } else if (newStatus == 0) {
            swal({
                title: "Sucess!",
                text: "<strong>Your status is Inctivate</strong>",
                type: "success",
                showConfirmButton: true,
                html: true
            }, function () {
                window.location.href = " "
            });
        }
    })
    .fail(function (data) {
        console.log(data);
    });
}

function deleteClinic(dealId) {
    swal({
        title: 'Are You sure want to delete this clinic?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#A5DC86',
        cancelButtonColor: '#DD6B55',
        confirmButtonText: 'Yes',
        cancelButtonText: 'No',
        closeOnConfirm: true,
        closeOnCancel: true
    }, function (isConfirm) {
        if (isConfirm) {
            window.location.href = '<?= base_url('admin/clinic/delete_clinic/') ?>' + dealId
        }
    });
}
</script>