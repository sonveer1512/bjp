<?php $this->load->view('admin/link.php'); ?>
<!-- Begin page -->
<div id="layout-wrapper">

    <?php $this->load->view('admin/topar.php'); ?>
    <?php $this->load->view('admin/imgheader.php'); ?>
    <?php $this->load->view('admin/sidebar.php'); ?>
  <?php $sess = $this->session->userdata('pmsadmin');
            $name = $sess['name'];
            $role = $sess['role'];
            $id = $sess['id'];

            ?>
</div>

<div class="vertical-overlay"></div>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Speakers</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?php base_url() ?>Dashboard">Dashboards</a></li>
                                <li class="breadcrumb-item active">Speakers</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Speakers</h4>

                            <div class="flex-shrink-0">
                               <?php if($this->rbac->hasPrivilege('speakers','can_add')) { ?>
                              <button type="button" data-toggle="tooltip" data-placement="bottom" title="Add New Speaker" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#speaker"><i class="ri-user-add-line"></i></button>
								<?php } ?>
                            </div>
                        </div><!-- end card header -->
                        <div class="modal fade" id="speaker" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="speaker">Add New Speaker</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" id="addspeaker">
                                            <div class="row g-3">
                                              <?php if($role == 'Master') {?>
                                                <div class="col-xxl-6">

                                                    <div>
                                                        <label for="firstName" class="form-label">Select Regional Head</label>
                                                        <select class="form-select form-control" name="pregional" id="pregional">
                                                            <option value=''>Select Regional Head</option>
                                                            <?php foreach ($subadminData->result() as $data) {
                                                                ?>
                                                            <option value="<?= $data->admin_user_id; ?>"><?php echo $data->admin_name; ?></option>
                                                                                    <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="error" id="regError"></div>
                                                </div><!--end col-->
                                            <?php } ?>
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="firstName" class="form-label">Speaker Name</label>
                                                        <input type="text" class="form-control" name="spe_name" id="spe_name" placeholder="Speaker Name">
                                                    </div>
                                                    <div class="error" id="spnameError"></div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="firstName" class="form-label">Speaker Email</label>
                                                        <input type="text" class="form-control" name="spe_email" id="spe_email" placeholder="Speaker Email">
                                                    </div>
                                                    <div class="error" id="spemailError"></div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="firstName" class="form-label">Speaker Password</label>
                                                        <input type="password" class="form-control" name="spe_pass" id="spe_pass" placeholder="Speaker Password">
                                                    </div>
                                                    <div class="error" id="sppassError"></div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="firstName" class="form-label">Speaker Designation</label>
                                                        <input type="text" class="form-control" name="spe_desi" id="spe_desi" placeholder="Speaker Designation">
                                                    </div>
                                                    <div class="error" id="sdesError"></div>
                                                </div>
                                                  <div class="col-xxl-6">
                                                    <div>
                                                        <label for="firstName" class="form-label">Speaker Company Name</label>
                                                        <input type="text" class="form-control" name="spe_com_name" id="spe_com_name" placeholder="Speaker Company Name">
                                                    </div>
                                                    <div class="error" id="scomnError"></div>
                                                </div>
                                               <div class="col-xxl-6">
                                                    <div>
                                                        <label for="firstName" class="form-label">Speaker Company Address</label>
                                                        <input type="text" class="form-control" name="spe_com_add" id="spe_com_add" placeholder="Speaker Company Address">
                                                    </div>
                                                    <div class="error" id="scomaError"></div>
                                                </div>
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="firstName" class="form-label">Speaker Contatct</label>
                                                        <input type="number" class="form-control" name="spe_contact" id="spe_contact" placeholder="Speaker Contatct">
                                                    </div>
                                                    <div class="error" id="sdcontactError"></div>
                                                </div>
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="firstName" class="form-label">Select Project</label>
                                                        <select class="form-select form-control" name="spe_project[]" id="spe_project" multiple>
                                                            <option>Select Project</option>
                                                            <?php foreach ($projectdata->result() as $data) {
                                                            ?>
                                                                <option value="<?= $data->p_id; ?>"><?php echo $data->p_name; ?></option>
                                                            <?php } ?>

                                                        </select>
                                                        <div class="error" id="spprojectError"></div>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="firstName" class="form-label">Speaker Image</label>
                                                        <input type="file" class="form-control" name="spe_image" id="spe_image" placeholder="Select Your File">
                                                    </div>
                                                    <div class="error" id="spimageError"></div>
                                                </div>
                                                <input type="hidden" name="admin_role" id="admin_role" value="Speaker">


                                                <div class="col-lg-12">
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                            </div>
                                            <!--end row-->
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">


                            <div class="live-preview">
                                <div class="table-responsive table-card">
                                    <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                        <thead class="text-muted table-light">
                                            <tr>
                                                <th scope="col">S.No</th>
                                                <!-- <th scope="col">Department</th> -->
                                                <th scope="col"> Name</th>
                                                <th scope="col"> Email</th>
                                                <th scope="col"> Designation</th>
                                               <th scope="col"> Regional Head</th>
                                              <th scope="col"> Speaker Company Name</th>
                                                <th scope="col"> Contact</th>
                                              	<th scope="col"> Project Details</th>
                                                <!-- <th scope="col">Allotted Project</th> -->
                                                <!-- <th scope="col">Project Start Date</th> -->
                                                <!-- <th scope="col">Project End Date</th> -->
                                                <th scope="col" colspan="4" style=" text-align: center;">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($speakersdata->result() as $row) {


                                            ?>
                                                <tr>
                                                    <td>
                                                        <a href="apps-ecommerce-order-details.html" class="fw-medium link-primary"><?php echo $i; ?></a>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0 me-2">
                                                                <img src="webupload/<?php echo $row->speaker_image; ?>" alt="" class="avatar-xs rounded-circle" />
                                                            </div>
                                                            <div class="flex-grow-1"><?php echo $row->speaker_name; ?></div>
                                                        </div>
                                                    </td>
                                                    <td><?php echo $row->speaker_email; ?></td>
                                                    <td><?php echo $row->speaker_designation; ?></td>
                                                  <td><?php $admin_user_id =  $row->user_regional_head;
                                                   $this->db->select('*');
                                                  $this->db->from('master_admin');
                                                  $this->db->where('admin_user_id',$admin_user_id);
                                                  $rows1 = $this->db->get()->row();
                                              		echo isset($rows1->admin_name) ?$rows1->admin_name:'';
                                            ?>
                                                  
                                              	</td>
                                                   <td><?php echo $row->spe_com_name; ?></td>
                                                    <td><?php echo $row->speaker_contact; ?></td>
                                                   <td>
                                                     <i class="ri-edit-box-line showprojectdetails" style="color: blue;" class="" data-bs-toggle="modal" data-bs-target="#projectdetails" data-id="<?php echo $row->speaker_id; ?>"></i>
                                                     </td>
                                                   
                                                  <?php
                                                    /*
                                                    <td>
                                                    
                                                        <?php $pid = $row->speaker_project_id;
                                                        $this->db->select('*');
                                                        $this->db->from('speaker_project');
                                                        $this->db->where('speaker_id', $pid);
                                                        $rows1 = $this->db->get()->row();
                                                        if (array($rows1) > 0) {
                                                            echo $rows1->p_start_date;
                                                        }


                                                        ?>

                                                    </td>
                                                    */
                                                    ?>
                                                    <?php
                                                    /*
                                                    <td>
                                                        <?php $pid = $row->speaker_project_id;
                                                        $this->db->select('*');
                                                        $this->db->from('speaker_project');
                                                        $this->db->where('speaker_id', $pid);
                                                        $rows1 = $this->db->get()->row();
                                                        if (array($rows1) > 0) {
                                                            echo $rows1->p_end_date;
                                                        }


                                                        ?>
                                                        

                                                    </td>
                                                    */
                                                    ?>


                                                    <?php if ($this->rbac->hasPrivilege('speakers', 'can_edit')) { ?>
                                                        <td>

                                                            <i class="ri-edit-box-line editmodel" style="color: blue;" class="" data-bs-toggle="modal" data-bs-target="#editsubadmin" data-id="<?php echo $row->speaker_id; ?>"></i>

                                                        </td>
                                                    <?php } ?>

                                                    <?php if ($this->rbac->hasPrivilege('speakers', 'can_delete')) { ?>
                                                        <td>
                                                            <i class="ri-delete-bin-line" name="archive" class="remove" type="submit" onclick="archiveFunction(<?php echo $row->admin_user_id;  ?>)" data-toggle="tooltip" data-placement="bottom" style="color: red;"></i>


                                                        </td>
                                                    <?php } ?>

                                                    <?php if ($row->admin_status == "Disable") {

                                                    ?>

                                                        <td>
                                                            <i class="ri-checkbox-circle-line" data-toggle="tooltip" data-placement="bottom" title="Enable Your Account" name="archive" class="remove" type="submit" onclick="enableaccount(<?php echo $row->admin_user_id  ?>)" data-toggle="tooltip" data-placement="bottom" style="color: green;"></i>


                                                        </td>
                                                    <?php } else { ?>
                                                        <td>
                                                            <i class="ri-alert-line" data-toggle="tooltip" data-placement="bottom" title="Disable Your Account" name="archive" class="remove" type="submit" onclick="disableaccount(<?php echo $row->admin_user_id  ?>)" data-toggle="tooltip" data-placement="bottom" style="color: red;"></i>


                                                        </td>
                                                    <?php } ?>

                                                    <?php if ($this->rbac->hasPrivilege('speakers', 'can_change_pass')) { ?>
                                                        <td>
                                                            <i class="ri-lock-password-line" style="color: blue;" data-bs-toggle="modal" data-bs-target="#changepassword" data-id="<?php echo $row->admin_user_id; ?>"></i>


                                                        </td><?php } ?>

                                                </tr><!-- end tr -->
                                            <?php $i++;
                                            } ?>

                                        </tbody><!-- end tbody -->
                                    </table><!-- end table -->
                                </div>
                            </div>

                        </div><!-- end card-body -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->



        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
    <div class="modal fade" id="editsubadmin" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editsubadmin">Edit Speaker</h5>
                    <button type="button" class="btn-close" onClick="window.location.reload();" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>
  
  
   <div class="modal fade" id="projectdetails" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                   <center> <h5 class="modal-title" id="projectdetails">Your Allotted Projects</h5></center>
                    <button type="button" class="btn-close" onClick="window.location.reload();" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
					
                </div>
            </div>
        </div>
    </div>

    <!-- end main content-->



    <?php $this->load->view('admin/footer.php'); ?>
</div>
</div>


<!-- change password modal -->
<div class="modal fade" id="changepassword" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="changepassword">Change Password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" class="changepassword" id="changepasswordmodel">
                            <div class="row g-3">
                                <div class="col-xxl-6">

                                </div>
                                <!--end col-->
                                <div class="col-xxl-6">


                                    <label class="form-label" for="password-input">Current Password</label>
                                    <div class="position-relative auth-pass-inputgroup mb-3">
                                        <input type="password" class="form-control pe-5" placeholder="Enter Current password" name="cur_password" id="current_password">
                                        <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                    </div>
                                    <div class="text-danger error" id="currentpassworderror"></div>
                                </div>
                                <!--end col-->

                                <div class="col-xxl-6">
                                    <div>
                                        <label for="emailInput" class="form-label">New Password</label>
                                        <input type="password" name="new_password" class="form-control" id="new_password" placeholder="Enter your Password">
                                    </div>
                                    <div class="text-danger error" id="newpassworderror"></div>

                                </div>
                                <!--end col-->




                                <div class="col-lg-12">
                                    <div class="hstack gap-2 justify-content-end">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                            <input type="hidden" name="admin_user_id" value="<?php echo $row->admin_user_id; ?>">
                        </form>
                    </div>
                </div>
            </div>
        </div>

<!-- JAVASCRIPT -->
<script src="<?= base_url() ?>/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>/assets/libs/simplebar/simplebar.min.js"></script>
<script src="<?= base_url() ?>/assets/libs/node-waves/waves.min.js"></script>
<script src="<?= base_url() ?>/assets/libs/feather-icons/feather.min.js"></script>
<script src="<?= base_url() ?>/assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
<script src="<?= base_url() ?>/assets/js/plugins.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


<!-- apexcharts -->
<script src="<?= base_url() ?>/assets/libs/apexcharts/apexcharts.min.js"></script>

<!-- Vector map-->
<script src="<?= base_url() ?>/assets/libs/jsvectormap/js/jsvectormap.min.js"></script>
<script src="<?= base_url() ?>/assets/libs/jsvectormap/maps/world-merc.js"></script>

<!--Swiper slider js-->
<script src="<?= base_url() ?>/assets/libs/swiper/swiper-bundle.min.js"></script>

<!-- Dashboard init -->
<script src="<?= base_url() ?>/assets/js/pages/dashboard-ecommerce.init.js"></script>

<!-- App js -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="<?= base_url() ?>/assets/js/app.js"></script>
<script type="text/javascript">
    function archiveFunction(admin_user_id) {
        event.preventDefault(); // prevent form submit

        var form = event.target.form; // storing the form
        swal({
                title: "Are you sure?",
                text: "Delete Speaker Record <?php echo $row->admin_email; ?>",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Delete Please",
                cancelButtonText: "No, cancel Please!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: "<?= base_url() ?>Speaker/deletespeaker/admin_user_id",
                        type: "post",
                        data: {
                            admin_user_id: admin_user_id
                        },
                        success: function() {
                            swal('Record Deleted 🙂', ' ', 'success');
                            $("#delete" + admin_user_id).fadeTo("slow", 0.7, function() {
                                $(this).remove();
                                setTimeout(function() {
                                    location.reload(true);
                                }, 1000);
                            })

                        },
                        error: function() {
                            swal('Record Not Deleted ☹️', 'error');
                        }
                    });
                } else {
                    swal("Cancelled", "User Account is safe 🙂", "error");
                }

            });
    }
</script>
<script>
    //  add modal
    $(document).on('submit', '#addspeaker', function(ev) {
        $('.error').html('');

        ev.preventDefault(); // Prevent browers default submit.
        var formData = new FormData(this);
        var error = false;
        var spe_name = $('#spe_name').val();
        var spe_email = $('#spe_email').val();
        var spe_desi = $('#spe_desi').val();
        var spe_contact = $('#spe_contact').val();
        var spe_project = $('#spe_project').val();
        var spe_image = $('#spe_image').val();
        var spe_com_name = $('#spe_com_name').val();
       	var spe_com_add = $('#spe_com_add').val();



        if (spe_name == '') {
            $('#spnameError').html('Enter Speaker Name');
            $('.error').css('color', 'red');
            error = true;
            // alert("hi");

        }
        if (spe_email == '') {
            $('#spemailError').html('Enter Your Email');
            $('.error').css('color', 'red');
            error = true;

            // alert("hi");

        }
        if (spe_desi == '') {
            $('#sdesError').html('Enter Speaker Designation');
            $('.error').css('color', 'red');
            error = true;

            // alert("hi");

        }
        if (spe_contact == '') {
            $('#sdcontactError').html('Enter Speaker Contact');
            $('.error').css('color', 'red');
            error = true;

            // alert("hi");

        }
        if (spe_project == '') {
            $('#spprojectError').html('Select Project For Speaker');
            $('.error').css('color', 'red');
            error = true;


        }
        if (spe_image == '') {
            $('#spimageError').html('Select Your Image');
            $('.error').css('color', 'red');
            error = true;


        }
        if (spe_com_name == '') {
            $('#scomnError').html('Enter Speaker Company Name');
            $('.error').css('color', 'red');
            error = true;


        }
		
      	if (spe_com_add == '') {
            $('#scomaError').html('Enter Speaker Company Address');
            $('.error').css('color', 'red');
            error = true;


        }

        if (error == false) {
            $.ajax({
                url: "<?= base_url('Speaker/addspeaker'); ?>",
                type: 'post',
                data: formData,
                success: function(result) {
                    // json data
                    var dataResult = JSON.parse(result);
                    if (dataResult.done == '1') {
                        swal('Speaker Added 🙂', ' ', 'success');
                        setTimeout(function() {
                            location.reload(true);
                        }, 1000);
                    }

                    if (dataResult.done == '0') {
                        swal('Speaker Not Added ☹️', ' ', 'success');

                        setTimeout(function() {
                            location.reload(true);
                        }, 1000);

                    }

                    if (dataResult.email == '0') {
                        swal('Email Already Exist ☹️', ' ', 'error');



                    }


                },
                cache: false,
                contentType: false,
                processData: false,
            })

        }

    })
</script>

<script type="text/javascript">
    function enableaccount(admin_user_id) {
        event.preventDefault(); // prevent form submit

        var form = event.target.form; // storing the form
        swal({
                title: "Are you sure?",
                text: "Enable Speaker <?php echo $row->admin_email; ?>",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Enable Please",
                cancelButtonText: "No, cancel Please!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: "<?= base_url() ?>Speaker/update/admin_user_id",
                        type: "post",
                        data: {
                            admin_user_id: admin_user_id
                        },
                        success: function() {
                            swal('Account Enable 🙂', ' ', 'success');
                            $("#delete" + admin_user_id).fadeTo("slow", 0.7, function() {
                                $(this).remove();
                            })
                            setTimeout(function() {
                                location.reload(true);
                            }, 1000);

                        },
                        error: function() {
                            swal('Account Still Disable ☹️', 'error');
                        }
                    });
                } else {
                    swal("Cancelled", "User Account is safe 🙂", "error");
                }

            });
    }
</script>
<script type="text/javascript">
    function disableaccount(admin_user_id) {
        event.preventDefault(); // prevent form submit

        var form = event.target.form; // storing the form
        swal({
                title: "Are you sure?",
                text: "Disable Speaker Account <?php echo $row->admin_email; ?>",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Disable Please",
                cancelButtonText: "No, cancel Please!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: "<?= base_url() ?>Speaker/updatedisable/admin_user_id",
                        type: "post",
                        data: {
                            admin_user_id: admin_user_id
                        },
                        success: function() {
                            swal('Account Disable 🙂', ' ', 'success');
                            $("#delete" + admin_user_id).fadeTo("slow", 0.7, function() {
                                $(this).remove();
                            })
                            setTimeout(function() {
                                location.reload(true);
                            }, 1000);

                        },
                        error: function() {
                            swal('Account Still Enable ☹️', 'error');
                        }
                    });
                } else {
                    swal("Cancelled", "User Account is safe 🙂", "error");
                }

            });
    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.editmodel').click(function() {

            var userid = $(this).data('id');

            $.ajax({
                url: "<?= base_url('Speaker/speakeredit'); ?>",
                type: "post",
                data: {
                    id: userid
                },
                success: function(response) {

                    $('.modal-body').html(response);
                    $('.editspeaker').modal('show');

                }
            })


        });
    });

    $(document).on('submit', '#editspeaker', function(ev) {
        ev.preventDefault(); // Prevent browers default submit.
        var formData = new FormData(this);
        $.ajax({
            url: "<?= base_url() ?>Speaker/updatespeaker/",
            type: 'post',
            data: formData,
            success: function(result) {
                //json data

                // alert(result);
                var dataResult = JSON.parse(result);
                if (dataResult.inserted == '1') {
                    swal('Record Updated 🙂', ' ', 'success');

                    setTimeout(function() {
                        location.reload(true);
                    }, 1000);

                } else {

                }
                if (dataResult.inserted == '1') {
                    $('#success').html("Category Added Succefully!");
                    $('#success').css('color', 'green');

                }


            },
            cache: false,
            contentType: false,
            processData: false,
        })
    })



    // change password
    $(document).on('submit', '#changepasswordmodel', function(ev) {
        ev.preventDefault(); // Prevent browers default submit.
        var formData = new FormData(this);
        $('.error').html('');
        var current = $('#current_password').val();
        var newPass = $('#new_password').val();
        var error  =  false;
        if(current == ''){
            $('#currentpassworderror').html('Please Enter Current Password');
            error  = true;

        }
        if(newPass == ''){
            $('#newpassworderror').html('Please Enter New Password');
            error  = true;

        }
        if(error  == false){

            $.ajax({
                url: "<?= base_url() ?>Speaker/changesubpass/",
                type: 'post',
                data: formData,
                success: function(result) {
                    //json data
    
                    var dataResult = JSON.parse(result);
                    if (dataResult.inserted == '1') {
                        swal('Password Changed 🙂', ' ', 'success');
                        
                        setTimeout(function() {
                            location.reload(true);
                        }, 1000);
    
                    }
    
                    if (dataResult.password == '0') {
                        swal('Current Password Mismatch ☹️', ' ', 'error');
    
    
    
                    }
    
    
                    // if (dataResult.inserted == '1') {
                    //     $('#success').html("Category Added Succefully!");
                    //     $('#success').css('color', 'green');
    
                    // }
    
    
                },
                cache: false,
                contentType: false,
                processData: false,
            })
        }
    })
</script>

  <script type="text/javascript">
    $(document).ready(function() {
        $('.showprojectdetails').click(function() {

            var id = $(this).data('id');
          

            $.ajax({
                url: "<?= base_url('Speaker/getprojectdetails'); ?>",
                type: "post",
                data: {
                    id: id
                },
                success: function(response) {

                    $('.modal-body').html(response);
                    $('.projectdetailsmodal').modal('show');

                }
            })


        });
    });
</script>

</body>


<!-- Mirrored from themesbrand.com/velzon/html/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 11 Mar 2022 09:52:42 GMT -->

</html>