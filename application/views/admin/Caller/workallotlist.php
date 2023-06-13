<?php $this->load->view('admin/link.php'); ?>
<!-- Begin page -->
<div id="layout-wrapper">
    <?php $this->load->view('admin/topar.php'); ?>
    <?php $this->load->view('admin/imgheader.php'); ?>
    <?php $this->load->view('admin/sidebar.php'); ?>
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
                        <h4 class="mb-sm-0">Work Allotment List</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                <li class="breadcrumb-item active">Caller</li>
                                <li class="breadcrumb-item active">Work Allotment List</li>
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
                            <h4 class="card-title mb-0 flex-grow-1">Work Allotment List</h4>
                            <div class="flex-shrink-0"> <a href="<?php base_url()?>CallerAdmin"><button type="button" class="btn btn-primary waves-effect waves-light"><i class="ri-arrow-go-back-line"></i></button></a>
                                <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#exampleModalgrid"><i class="ri-file-edit-line"></i></button>
                            </div>
                        </div><!-- end card header -->
                        <div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalgridLabel">Assign New Task </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" id="addwork">
                                            <div class="row g-3">
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="firstName" class="form-label">Select Marketer Name</label>
                                                        <select class="form-select form-control" id="marketer_name" onchange="fetchdata(this.value)" name="marketer_name">
                                                            <option value=''>Select Marketer Name</option>
                                                            <?php foreach ($marketingData->result() as $data) {
                                                            ?>
                                                                <option value="<?= $data->admin_user_id; ?>"><?php echo $data->admin_name; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="error" id="marketernameError"></div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="lastName" class="form-label">Marketer Email</label>
                                                        <input type="email" name="marketer_email" id="marketer_email" class="form-control" placeholder="Enter Email" readonly>
                                                    </div>
                                                    <div class="error" id="marketeremailError"></div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="emailInput" class="form-label">Marketer Contact</label>
                                                        <input type="number" name="marketer_contact" id="marketer_contact" class="form-control" id="emailInput" placeholder="Enter your Contact" readonly>
                                                    </div>
                                                    <div class="error" id="marketercontactError"></div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="passwordInput" class="form-label">Remark</label>
                                                        <textarea class="form-control" name="marketer_remark" id="marketer_remark" placeholder="Enter Your Task"></textarea>
                                                    </div>
                                                    <div class="error" id="marketerremarkError"></div>
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
                                            <input type="hidden" name="work_allot_id" id="marketer_id">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="live-preview">
                                <div class="table-responsive table-card">
                                    <table class="table align-middle table-nowrap mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <!-- <th scope="col">Department</th> -->
                                                <th scope="col">Marketer Name</th>
                                                <th scope="col">Marketer Email</th>
                                                <th scope="col">Marketer Contact</th>
                                                <th scope="col">Marketer Remark</th>
                                                <th scope="col">Assign Date</th>
                                               
                                                <th scope="col" colspan="3" style=" text-align: center;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            if (count($workallotData) > 0) {
                                                foreach ($workallotData as $row) {
                                            ?>
                                                    <tr id="delete<?php echo $row['work_allot_id']; ?>">

                                                        <td><?php echo $row['marketing_name']; ?></td>
                                                        <td><?php echo $row['marketer_email'] ?></td>
                                                        <td><?php echo $row['marketer_contact']; ?></td>
                                                        <td><textarea class="form-control"><?php echo $row['work']; ?></textarea></td>
                                                        <td><?php echo $row['created_at']; ?></td>
                                                        
                                                        <td>
                                                            <?php if ($this->rbac->hasPrivilege('mytask', 'can_edit')) { ?>
                                                                <button type="button" class="btn btn-primary workallot" data-bs-toggle="modal" data-bs-target="#editworkallotment" data-id="<?php echo $row['work_allot_id']; ?>"><i class="ri-edit-box-line" style="color: white;"></i></button>
                                                        </td>
                                                        <?php } ?>
                                                            <?php if ($this->rbac->hasPrivilege('mytask', 'can_delete')) { ?>
                                                        <td>
                                                            <button type="button" class="btn btn-danger" name="archive" class="remove" type="submit" onclick="archiveFunction(<?php echo $row['work_allot_id'] ?>)" data-toggle="tooltip" data-placement="bottom"><i class="ri-delete-bin-line" style="color: white;"></i></button>
                                                        </td>
                                                <?php } ?>
                                                    </tr>
                                            <?php  }
                                            }
                                            
                                            ?>
                                        </tbody>

                                         <input type="hidden" name="work_allot_id" value="<?php echo $row['work_allot_id']; ?>">
                                    </table>
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
   
    
     
    <input type="hidden" name="work_allot_id" value="<?php echo $row['work_allot_id']; ?>">
    <div class="modal fade" id="editworkallotment" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editworkallotment">Edit Caller Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>
   
    <?php include 'footer.php'; ?>
</div>

<!-- JAVASCRIPT -->
<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/libs/node-waves/waves.min.js"></script>
<script src="assets/libs/feather-icons/feather.min.js"></script>
<script src="assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<!-- apexcharts -->
<script src="assets/libs/apexcharts/apexcharts.min.js"></script>
<!-- Vector map-->
<script src="assets/libs/jsvectormap/js/jsvectormap.min.js"></script>
<script src="assets/libs/jsvectormap/maps/world-merc.js"></script>
<!--Swiper slider js-->
<script src="assets/libs/swiper/swiper-bundle.min.js"></script>
<!-- Dashboard init -->
<script src="assets/js/pages/dashboard-ecommerce.init.js"></script>
<!-- App js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="assets/js/app.js"></script>
<script type="text/javascript">
    function archiveFunction(admin_user_id) {
        event.preventDefault(); // prevent form submit
        var form = event.target.form; // storing the form
        swal({
                title: "Are you sure?",
                text: "Delete Subadmin Record <?php echo $row->admin_email; ?>",
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
                        url: "<?= base_url() ?>CallerAdmin/deletecalleradmin/admin_user_id",
                        type: "post",
                        data: {
                            admin_user_id: admin_user_id
                        },
                        success: function() {
                            swal('Record Deleted 🙂', ' ', 'success');
                            $("#delete" + admin_user_id).fadeTo("slow", 0.7, function() {
                                $(this).remove();
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
    $(document).on('submit', '#addwork', function(ev) {
        $('.error').html('');
        ev.preventDefault(); // Prevent browers default submit.
        var formData = new FormData(this);
        var error = false;
        var marketer_name = $('#marketer_name').val();
        var marketer_email = $('#marketer_email').val();
        var marketer_contact = $('#marketer_contact').val();
        var marketer_remark = $('#marketer_remark').val();
        if (marketer_name == '') {
            $('#marketernameError').html('Select Marketer Name');
            $('.error').css('color', 'red');
            error = true;
            // alert("hi");
        }
        if (marketer_remark == '') {
            $('#marketerremarkError').html('Enter Your Remark');
            $('.error').css('color', 'red');
            error = true;
            // alert("hi");
        }
        if (error == false) {
            $.ajax({
                url: "<?= base_url('Workallotment/addwork'); ?>",
                type: 'post',
                data: formData,
                success: function(result) {
                    // json data
                    var dataResult = JSON.parse(result);
                    if (dataResult.done == '1') {
                        swal('Work Allotment Done 🙂', ' ', 'success');
                        setTimeout(function() {
                            location.reload(true);
                        }, 1000);
                    }
                    if (dataResult.done == '0') {
                        swal('Work Allotment Failed!! ☹️', ' ', 'error');
                        setTimeout(function() {
                            location.reload(true);
                        }, 1000);
                    }
                },
                cache: false,
                contentType: false,
                processData: false,
            })
        }
        //samle
        //
    })
    // update modal
    // dynamic model
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.workallot').click(function() {
            var userid = $(this).data('id');
            $.ajax({
                url: "<?= base_url('Workallotment/workedit'); ?>",
                type: "post",
                data: {
                    id: userid
                },
                success: function(response) {
                    $('.modal-body').html(response);
                    $('.editmodal').modal('show');
                }
            })
        });
    });
</script>
<script type="text/javascript">
    // update modal
    $(document).on('submit', '#editCaller', function(ev) {
        ev.preventDefault(); // Prevent browers default submit.
        var formData = new FormData(this);
        $.ajax({
            url: "<?= base_url() ?>CallerAdmin/updatecaller/",
            type: 'post',
            data: formData,
            success: function(result) {
                //json data
                var dataResult = JSON.parse(result);
                if (dataResult.inserted == '1') {
                    swal('Record Updated 🙂', ' ', 'success');
                    setTimeout(function() {
                        location.reload(true);
                    }, 1000);
                } else {
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
    })
    function fetchdata(userid) {
        var userid = userid;
        $.ajax({
            url: "<?php echo  base_url('Workallotment/userdetail'); ?>",
            type: "POST",
            data: {
                userid: userid
            },
            success: function(result) {
                var dataResult = JSON.parse(result);
                $('#marketer_email').val(dataResult.marketeremail);
                $('#marketer_contact').val(dataResult.marketercontact);
                $('#marketer_id').val(dataResult.marketerID);
            }
        })
    }
</script>
<script type="text/javascript">
      // update modal
        $(document).on('submit', '#editworkallot', function(ev) {
            ev.preventDefault(); // Prevent browers default submit.
            var formData = new FormData(this);
            $.ajax({
                url: "<?=base_url()?>workallotment/updatework/",
                type: 'post',
                data: formData,
                success: function(result) {
                    //json data

                      var dataResult = JSON.parse(result);
                    if (dataResult.inserted == '1') {
                       swal('Record Updated 🙂', ' ', 'success');
                      
                        setTimeout(function() {
                            location.reload(true);
                        }, 1000);
                         
                    }
                    else
                    {

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
        })
</script>
