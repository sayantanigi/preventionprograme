<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <section class="bg-light-gray">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0"><?= $page ?></h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                                        <li class="breadcrumb-item active"><?= $page ?></li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <div class="card shadow rounded">
                                <div class="card-body">
                                    <form action="<?= base_url('admin/clinic/add_clinic')?>" method="POST" enctype="multipart/form-data">
                                        <div class="form-group mb-2">
                                            <label class="fw-semibold  text-black">Clinic Name *</label>
                                            <input type="text" class="form-control" name="clinic_name" id="clinic_name" required autocomplete="off">
                                            <p id="error_clinic_name"></p>
                                        </div>
                                        <?php echo form_error('clinic_name', '<small class="" style="color:red;">', '</small>'); ?>
                                        <div class="form-group mb-2">
                                            <label class="fw-semibold  text-black">Status</label>
                                            <select class="form-control" name="clinic_status" id="clinic_status" required>
                                                <option value="">Select Status</option>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                        <?php echo form_error('clinic_status', '<small class="" style="color:red;">', '</small>'); ?>
                                        <div class="form-group mt-3 mb-2">
                                            <button class="btn btn-success text-uppercase px-5 shadow" type="submit" id="clinicSubmit">Submit</button>
                                            <a class="btn btn-danger waves-effect waves-light m-l-30" href="javascript:history.go(-1)">Back</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('#clinic_name').blur(function() {
        var clinic_name = $('#clinic_name').val();
        if(clinic_name == ''){
            $('#error_clinic_name').fadeIn().html("This field is required").css({'color':'red','margin-bottom':'5px'});
        } else {
            $.ajax({
                type: "POST",
                url: "<?= base_url('admin/clinic/check_clinic_name') ?>",
                data: {clinic_name: clinic_name},
                success: function(response) {
                    response = JSON.parse(response);
                    if(response.status == 'success') {
                        $('#error_clinic_name').fadeIn().html(response.message).css({'color':'green','margin-bottom':'5px'});
                        $("#clinicSubmit").prop("disabled", false);
                    } else {
                        $('#error_clinic_name').fadeIn().html(response.message).css({'color':'red','margin-bottom':'5px'});
                        setTimeout(function(){
                            $("#error_clinic_name").html("");
                        },10000);
                        $("#clinic_name").focus();
                        $("#clinicSubmit").prop("disabled", true);
                        return false;
                    }
                }
            })
        }
    })
})
</script>