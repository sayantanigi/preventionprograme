<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" />
<link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet" />
<script src="https://unpkg.com/dropzone"></script>
<script src="https://unpkg.com/cropperjs"></script>

<style>
.files:before,.profile .image,.text{text-align:center}small>p{color:red}p strong{font-weight:600!important;color:#000!important}.sa-confirm-button-container button{background-color:#146c43!important;border-color:#146c43!important}.files,.image_area{position:relative}.overlay,.text{position:absolute}.preview,.preview1{overflow:hidden;width:160px;height:160px;margin:10px;border:1px solid red}.modal-lg{max-width:1000px!important}.overlay{bottom:10px;left:0;right:0;background-color:rgba(255,255,255,.5);overflow:hidden;height:0;transition:.5s;width:100%}.image_area:hover .overlay{height:50%;cursor:pointer}.text{color:#333;font-size:20px;top:50%;left:50%;-webkit-transform:translate(-50%,-50%);-ms-transform:translate(-50%,-50%);transform:translate(-50%,-50%)}#img-container{border:1px solid red;width:75vw;height:75vw;background:#666}img{display:block;max-width:100%}body{margin-top:20px}.profile{width:100%;position:relative;background:#fff;border:1px solid #d5d5d5;padding-bottom:5px;margin-bottom:20px}.profile .image{display:block;position:relative;z-index:1;overflow:hidden;border:5px solid #fff}.profile .user{position:relative;padding:0 5px 5px}.profile .user .avatar{position:absolute;left:20px;top:-85px;z-index:2}.profile .user h2{font-size:16px;line-height:20px;display:block;float:left;margin:4px 0 0 135px;font-weight:700}.profile .user .actions{float:right}.profile .user .actions .btn{margin-bottom:0}.profile .info{float:left;margin-left:20px}.files:after,.files:before{position:absolute;left:0;pointer-events:none;right:0;display:block;margin:0 auto}.img-profile{height:100px;width:100px}.img-cover{width:800px;height:300px}@media (max-width:768px){.btn-responsive{padding:2px 4px;font-size:80%;line-height:1;border-radius:3px}}@media (min-width:769px) and (max-width:992px){.btn-responsive{padding:4px 9px;font-size:90%;line-height:1.2}}.files input{outline:#92b0b3 dashed 2px;outline-offset:-10px;-webkit-transition:outline-offset .15s ease-in-out,background-color .15s linear;transition:outline-offset .15s ease-in-out,background-color .15s linear;padding:52px 0 46px 32%;text-align:center!important;margin:0;width:100%!important}.files input:focus{outline:#92b0b3 dashed 2px;outline-offset:-10px;-webkit-transition:outline-offset .15s ease-in-out,background-color .15s linear;transition:outline-offset .15s ease-in-out,background-color .15s linear;border:1px solid #92b0b3}.files:after{top:60px;width:50px;height:56px;content:"";background-image:url(https://image.flaticon.com/icons/png/128/109/109612.png);background-size:100%;background-repeat:no-repeat}.color input{background-color:#f1f1f1}.files:before{bottom:10px;width:100%;height:57px;color:#2ea591;font-weight:600;text-transform:capitalize}
</style>
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
                                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a>
                                        </li>
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
                                    <form action="<?= base_url('admin/clinic/add_clinic_admin')?>" method="POST" enctype="multipart/form-data">
                                        <div class="form-group mb-2">
                                            <label class="fw-semibold  text-black">First Name *</label>
                                            <input type="text" class="form-control" name="fname" id="fname" required autocomplete="off">
                                        </div>
                                        <?php echo form_error('fname', '<small class="" style="color:red;">', '</small>'); ?>
                                        <div class="form-group mb-2">
                                            <label class="fw-semibold  text-black">Last Name *</label>
                                            <input type="text" class="form-control" name="lname" id="lname" required autocomplete="off">
                                        </div>
                                        <?php echo form_error('lname', '<small class="" style="color:red;">', '</small>'); ?>
                                        <div class="form-group mb-2">
                                            <label class="fw-semibold  text-black">Email *</label>
                                            <input type="email" class="form-control" name="email" id="email" required autocomplete="off">
                                            <small id="error_clinic_admin_email"></small>
                                        </div>
                                        <?php echo form_error('email', '<small class="" style="color:red;">', '</small>'); ?>
                                        <div class="form-group mb-2">
                                            <label class="fw-semibold  text-black">Phone *</label>
                                            <input type="number" class="form-control" name="phone" id="phone" required autocomplete="off">
                                        </div>
                                        <?php echo form_error('phone', '<small class="" style="color:red;">', '</small>'); ?>
                                        <div class="form-group mb-2">
                                            <label class="fw-semibold  text-black">Address </label>
                                            <input type="text" class="form-control" name="address" id="address" autocomplete="off">
                                        </div>
                                        <small id="address_error"></small>
                                        <div class="form-group mb-2">
                                            <label class="fw-semibold  text-black">City </label>
                                            <input type="text" class="form-control" name="city" id="city" autocomplete="off">
                                        </div>
                                        <small id="city_error"></small>
                                        <div class="form-group mb-2">
                                            <label class="fw-semibold  text-black">Zipcode </label>
                                            <input type="text" class="form-control" name="zipcode" id="zipcode" autocomplete="off">
                                        </div>
                                        <small id="zipcode_error"></small>
                                        <div class="form-group mb-2">
                                            <label class="fw-semibold  text-black">Select Clinic</label>
                                            <select class="form-control" name="clinic"  id="clinic">
                                                <option value="">Select Clinic</option>
                                                <?php
                                                if (@$clinic) {
                                                    foreach (@$clinic as $k => $v) {
                                                        echo "<option value='" . $v->id . "'>" . @$v->name . "</option>";
                                                    }
                                                } ?>
                                            </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="fw-semibold  text-black">Certificates </label>
                                            <input type="text" class="form-control" name="certificate" id="certificate" autocomplete="off">
                                        </div>
                                        <small id="certificate_error"></small>
                                        <div class="form-group mb-2">
                                            <label class="fw-semibold  text-black">Languages </label>
                                            <input type="text" class="form-control" name="language" id="language" autocomplete="off">
                                        </div>
                                        <small id="language_error"></small>
                                        <div class="form-group mb-2">
                                            <label class="fw-semibold  text-black">Status</label>
                                            <select class="form-control" name="status" required id="userstatus">
                                                <option value="">Select Status</option>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                            <small id="status_error"></small>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="fw-semibold  text-black">Password * </label>
                                            <input type="password" class="form-control" name="password" id="password" required autocomplete="off">
                                        </div>
                                        <?php echo form_error('password', '<small class="" style="color:red;">', '</small>'); ?>
                                        <div class="form-group mb-2">
                                            <label class="fw-semibold  text-black">Confirm Password * </label>
                                            <input type="password" class="form-control" name="confirm_password" id="confirm_password" required autocomplete="off">
                                            <small id="password_error"></small>
                                        </div>
                                        <?php echo form_error('confirm_password', '<small class="" style="color:red;">', '</small>'); ?>
                                        <div class="form-group mt-3 mb-2">
                                            <button class="btn btn-success text-uppercase px-5 shadow" type="submit" id="clinicAdminSubmit">Submit</button>
                                            <a class="btn btn-danger waves-effect waves-light m-l-30" href="javascript:history.go(-1)">Back</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div class="card shadow rounded">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="container">
                                            <div class="col-md-12">
                                                <div class="profile clearfix">
                                                    <div class="image item" id="Cover-Image">
                                                        <img src="<?= !empty(@$user->cover_image) ? base_url('uploads/cover_image/' . @$user->cover_image . '') : base_url('uploads/bnr.jpg'); ?>" class="img-cover">
                                                    </div>
                                                    <div class="user clearfix">
                                                        <div class="avatar item" id="item">
                                                            <img src="<?= base_url('uploads/unnamed.jpg') ?>" class="img-thumbnail img-profile" id="blah">
                                                        </div>
                                                        <h2>
                                                            <span id="f-name"><?= @$user->first_name; ?></span>
                                                            <span id="l-name"><?= @$user->last_name; ?></span>
                                                        </h2>
                                                    </div>
                                                    <div class="info"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mb-3">
                                            <div class="card rounded">
                                                <div class="card-body">
                                                    <div class="mt-3">
                                                        <label class="tx-11 font-weight-bold mb-0 ">
                                                            <h6>First Name</h6>
                                                        </label>
                                                        <p class="text-muted" id="first_name"></p>
                                                    </div>
                                                    <div class="mt-3">
                                                        <label class="tx-11 font-weight-bold mb-0 ">
                                                            <h6>Last Name</h6>
                                                        </label>
                                                        <p class="text-muted" id="last_name"></p>
                                                    </div>
                                                    <div class="mt-3">
                                                        <label class="tx-11 font-weight-bold mb-0 ">
                                                            <h6>Email</h6>
                                                        </label>
                                                        <p class="text-muted" id="individual_email"></p>
                                                    </div>
                                                    <div class="mt-3">
                                                        <label class="tx-11 font-weight-bold mb-0 ">
                                                            <h6>Status</h6>
                                                        </label>
                                                        <p class="text-muted" id="individual_status"></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crop Image Before Upload</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="profile_closeModal();">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="img-container">
                        <div class="row">
                            <div class="col-md-8">
                                <img src="" id="sample_image" />
                            </div>
                            <div class="col-md-4">
                                <div class="preview"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="crop" class="btn btn-primary">Crop</button>
                    <button type="button" class="btn btn-secondary" onclick="profile_closeModal();">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crop Image Before Upload</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cover_closeModal();">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="img-container">
                        <div class="row">
                            <div class="col-md-8">
                                <img src="" id="sample_image1" />
                            </div>
                            <div class="col-md-4">
                                <div class="preview1"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="crop1" class="btn btn-primary">Crop</button>
                    <button type="button" class="btn btn-secondary" onclick="cover_closeModal();">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
<link href='<?php echo base_url(); ?>assets/chosen/chosen.min.css' rel='stylesheet' type='text/css'>
<script src='<?php echo base_url(); ?>assets/chosen/chosen.jquery.min.js' type='text/javascript'></script>
<script>
    $(document).on('keyup', '#fname', function (e) {
        var fname = $(this).val();
        if (fname) {
            $("#first_name").text(fname);
            $("#f-name").text(fname);
        } else {
            $("#first_name").text('First Name');
        }
    });

    $(document).on('keyup', '#lname', function (e) {
        var lname = $(this).val();
        if (lname) {
            $("#last_name").text(lname);
            $("#l-name").text(lname);
        } else {
            $("#last_name").text('Last Name');
        }
    });

    $(document).on('keyup', '#email', function (e) {
        var email = $(this).val();
        if (email) {
            $("#individual_email").text(email);
        } else {
            $("#individual_email").text('Email');
        }
    });

    $(document).on('keyup', '#phone', function (e) {
        var phone = $(this).val();
        if (phone) {
            $("#individual_phone").text(phone);
        } else {
            $("#individual_phone").text('phone');
        }
    });

    $(document).on('change', '#sport', function (e) {
        var sport = $(this).val();
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('admin/users/getSport_byId'); ?>',
            data: { sportId: sport },
            success: function (data) {
                $("#individual_sport").text(data);
            }
        });
    });

    $(document).on('change', '#userstatus', function (e) {
        var status = $(this).val();
        if (status == 1) {
            $("#individual_status").text('Active');
        }
        if (status == 0) {
            $("#individual_status").text('Inactive');
        }
    });

    $(document).ready(function() {
        $('#confirm_password').on('keyup', function () {
            if ($('#password').val() == $('#confirm_password').val()) {
                $('#password').focus().css('border', '2px solid green');
                $('#password_error').html('Password match').css('color', 'green');
                $('#confirm_password').focus().css('border', '2px solid green');
                document.getElementById('clinicAdminSubmit').disabled = false;
            } else {
                $('#password').focus().css('border', '2px solid red');
                $('#confirm_password').focus().css('border', '2px solid red');
                $('#password_error').html('Password Mismatch').css('color', 'red');
                document.getElementById('clinicAdminSubmit').disabled = true;
            }
        });
        $('#email').blur(function() {
            var email = $('#email').val();
            if(email != "") {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('admin/clinic/check_clinic_admin_email') ?>",
                    data: {clinic_admin_email: email},
                    success: function(response) {
                        response = JSON.parse(response);
                        if(response.status == 'success') {
                            $('#error_clinic_admin_email').fadeIn().html(response.message).css({'color':'green','margin-bottom':'5px'});
                            $("#clinicAdminSubmit").prop("disabled", false);
                        } else {
                            $('#error_clinic_admin_email').fadeIn().html(response.message).css({'color':'red','margin-bottom':'5px'});
                            setTimeout(function(){
                                $("#error_clinic_admin_email").html("");
                            },10000);
                            $("#clinic_admin_email").focus();
                            $("#clinicAdminSubmit").prop("disabled", true);
                            return false;
                        }
                    }
                })
            }
        })
    })
</script>
<script src="<?= base_url() ?>assets/plugins/smt-img-upld/js/singleimage-uploader.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtg6oeRPEkRL9_CE-us3QdvXjupbgG14A&libraries=places"></script>
<script>
    $(document).ready(function () {
        $("#lat_area").addClass("d-none");
        $("#long_area").addClass("d-none");
    });
    google.maps.event.addDomListener(window, 'load', initialize);
    function initialize() {
        var input = document.getElementById('autocomplete');
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.addListener('place_changed', function () {
            var place = autocomplete.getPlace();
            var address = place.formatted_address;
            $("#individual_address").text(address);
            $('#latitude').val(place.geometry['location'].lat());
            $('#longitude').val(place.geometry['location'].lng());
            // --------- show lat and long ---------------
            $("#lat_area").removeClass("d-none");
            $("#long_area").removeClass("d-none");
        });
    }
</script>
<script>
    $(document).ready(function () {
        var $modal = $('#modal');
        var image = document.getElementById('sample_image');
        var cropper;
        $('#upload_image').change(function (event) {
            var files = event.target.files;
            var done = function (url) {
                image.src = url;
                $modal.modal('show');
            };
            if (files && files.length > 0) {
                reader = new FileReader();
                reader.onload = function (event) {
                    done(reader.result);
                };
                reader.readAsDataURL(files[0]);
            }
        });
        $modal.on('shown.bs.modal', function () {
            cropper = new Cropper(image, {
                aspectRatio: 1,
                viewMode: 1,
                minCanvasWidth: 50,
                minCanvasHeight: 50,
                minCropBoxWidth: 50,
                minCropBoxHeight: 50,
                preview: '.preview'
            });
        }).on('hidden.bs.modal', function () {
            cropper.destroy();
            cropper = null;
        });
        $('#crop').click(function () {
            canvas = cropper.getCroppedCanvas({
                width: 400,
                height: 400
            });
            canvas.toBlob(function (blob) {
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function () {
                    var base64data = reader.result;
                    $.ajax({
                        url: '<?php echo base_url("admin/users/cropImage") ?>',
                        method: 'POST',
                        data: { image: base64data },
                        success: function (data) {
                            $modal.modal('hide');
                            console.log(data)

                            //$('#blah').attr('src', '<?php echo base_url() ?>'+data+'');
                            $('#item img').attr('src', '<?php echo base_url(); ?>uploads/profile/' + data);
                            $('#profileImg').val(data);
                        }
                    });
                };
            });
        });
    });
</script>
<script>
    $(document).ready(function () {
        var $modal = $('#modal1');
        var image = document.getElementById('sample_image1');
        var cropper;
        $('#cover_image').change(function (event) {
            var files = event.target.files;
            var done = function (url) {
                image.src = url;
                $modal.modal('show');
            };
            if (files && files.length > 0) {
                reader = new FileReader();
                reader.onload = function (event) {
                    done(reader.result);
                };
                reader.readAsDataURL(files[0]);
            }
        });
        $modal.on('shown.bs.modal', function () {
            cropper = new Cropper(image, {
                aspectRatio: 1,
                viewMode: 1,
                minCanvasWidth: 50,
                minCanvasHeight: 50,
                minCropBoxWidth: 50,
                minCropBoxHeight: 50,
                preview: '.preview1'
            });
        }).on('hidden.bs.modal', function () {
            cropper.destroy();
            cropper = null;
        });
        $('#crop1').click(function () {
            canvas = cropper.getCroppedCanvas({
                width: 400,
                height: 400
            });
            canvas.toBlob(function (blob) {
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function () {
                    var base64data = reader.result;
                    $.ajax({
                        url: '<?php echo base_url("admin/users/crop_CoverImage") ?>',
                        method: 'POST',
                        data: { image: base64data },
                        success: function (data) {
                            $modal.modal('hide');
                            console.log(data)

                            //$('#blah').attr('src', '<?php echo base_url() ?>'+data+'');
                            $('#Cover-Image img').attr('src', '<?php echo base_url(); ?>uploads/cover_image/' + data);

                            $('#coverImg').val(data);
                        }
                    });
                };
            });
        });
    });
    function profile_closeModal() {
        $('#modal').modal('hide');
    }
    function cover_closeModal() {
        $('#modal1').modal('hide');
    }
    $(document).on('change', '#health_etity', function (e) {
        var health_etity = $(this).val();
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('admin/users/health_etity'); ?>',
            data: { health_etity: health_etity },
            success: function (data) {
                $("#clinic").html(data);
            }
        });
    });
    $(document).on('change', '#clinic', function (e) {
        var clinic = $(this).val();
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('admin/users/get_clinic'); ?>',
            data: { clinic: clinic },
            success: function (data) {
                $("#provider").html(data);
            }
        });
    });
</script>