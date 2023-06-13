<?php $this->load->view('admin/link.php'); ?>
<!-- Begin page -->
<div id="layout-wrapper">

    <?php $this->load->view('admin/topar.php'); ?>
    <?php $this->load->view('admin/imgheader.php'); ?>
    <?php $this->load->view('admin/sidebar.php'); ?>
</div>




<div class="vertical-overlay"></div>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Gram Panchayat</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?php base_url() ?>Dashboard">Dashboards</a></li>
                                <li class="breadcrumb-item active">Gram Panchayat</li>
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
                            <h4 class="card-title mb-0 flex-grow-1">Gram Panchayat</h4>
                            <div class="flex-shrink-0">
                                <?php if ($this->rbac->hasPrivilege('gram_panchayat', 'can_add')) { ?>
                                    <button type="button" data-toggle="tooltip" data-placement="bottom" title="Add New Regional Head" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#exampleModalgrid"><i class="ri-user-add-line"></i></button>
                                <?php } ?>
                            </div>
                        </div><!-- end card header -->
                        <div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalgridLabel">Add New Gram Panchayat</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div id="success">
                                            <div id="error">
                                            </div>
                                        </div>
                                        <form method="POST" id="addgrampanchayat">
                                            <div class="row g-3">
                                               <div class="col-xxl-6">
                                               
                                                <div>
                                                    <label for="firstName" class="form-label">Panchayat Samiti</label>
                                                    <select class="form-select form-control" name="pan_sam_name" id="pan_sam_name">
                                                      <option vlue="0">Select</option>
                                                    <?php foreach ($panchayatsamiti as $data) {
                                                                                ?>
                                                    <option value="<?= $data['id']; ?>"><?php echo $data['pachayatsimiti'];  ?></option>
                                                                                <?php } ?>
                                                    </select>
                                                </div>
                                          
                                                <div class="error" id="depnameError"></div>
                                            </div>
                                                <input type="hidden" class="form-control" name="panchayat" id="panchayat" value="1">
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="firstName" class="form-label">Gram Panchayat Name</label>
                                                        <input type="text" class="form-control" name="gram_pan_name" id="gram_pan_name" placeholder="Enter Gram Panchayat Name">
                                                    </div>
                                                    <div class="error" id="subnameError"></div>
                                                </div>
                                                
                                                <div class="col-lg-12">
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                        <input type="submit" class="btn btn-primary" value="Submit">
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
                                    <table class="table align-middle table-nowrap mb-0" id="data1" class="display">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Panchayat Samiti</th>
                                              <th scope="col">Gram Panchayat Name</th>
                                                
                                                <th scope="col" colspan="2">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($grampanchhayatdatapagination as $row) {
                                            ?>
                                                <tr id="delete">
                                                    <td><a href="#" class="fw-medium"><?php echo $offset++; ?></a></td>
                                                  <?php if(!empty($row['panchyatsimit'])){ ?>
                                                    <td> <?php $id =  $row['panchyatsimit']; 
                                                      	

                                                 $this->db->select('*');
                                                  $this->db->from('pachayatsimiti');
                                                  $this->db->where('id',$id);
                                                   $rows1 = $this->db->get()->row();
                                                      if(!empty($rows1)){
                                                 	 echo $rows1->pachayatsimiti;
                                                      }
                                                      
                                                      ?>
                                                  </td>
                                                  <?php } ?>
                                                  <td> <?php echo $row['gram_panchyat']; ?></td>
                                                   <?php if($this->rbac->hasPrivilege('panchayat_samiti','can_edit')) { ?>
                                                <td>

                                                    <i class="ri-edit-box-line editmodel" style="color: blue;" class="" data-bs-toggle="modal" data-bs-target="#editsubadmin" data-id="<?php echo $row['id']; ?>"></i>
                                                   
                                                </td>
                                            <?php } ?>
                                                  <?php if($this->rbac->hasPrivilege('panchayat_samiti','can_delete')) { ?>
                                                <td>
                                                    <i class="ri-delete-bin-line" name="archive" class="remove" type="submit" onclick="archiveFunction(<?php echo $row['id']; ?>)" data-toggle="tooltip" data-placement="bottom"  style="color: red;"></i>
                                                   
                  
                                                </td>
                                            <?php } ?>
                                                 
                                                   
                                                   
                                                    
                                                  
                                                </tr>
                                               
                                            <?php 
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                               <div class="align-items-center mt-4 pt-2 justify-content-between d-flex">
                                                    <div class="flex-shrink-0">
                                                        <div class="text-muted">
                                                            Showing <span class="fw-semibold"><?=count($grampanchhayatdatapagination)?> - <?= isset($count) ? $count : ''; ?></span> Results
                                                        </div>
                                                    </div>
                                                    <ul class="pagination pagination-separated pagination-sm mb-0">
                                                      	<?php $uri = $this->uri->segment(3);  if($uri > 1) { ?>
                                                          <li class="page-item">
                                                              <a href="<?=base_url()?>grampanchayat/index/<?=$uri - 1?>" class="page-link">←</a>
                                                          </li>
                                                      	<?php } ?>
                                                      
                                                      	<?php for($i = 0; $i < ceil($count/50); $i++) { ?>
                                                          <li class="page-item">
                                                              <a href="<?=base_url()?>grampanchayat/index/<?=$i+1?>" class="page-link"><?=$i+1?></a>
                                                          </li>
													  	<?php } ?>
                                                        
                                                      	<?php if($i > $uri) { ?>
                                                          <li class="page-item">
                                                              <a href="<?=base_url()?>grampanchayat/index/<?=$uri + 1;?>" class="page-link">→</a>
                                                          </li>
                                                      	<?php } ?>
                                                      
                                                    </ul>
                                                </div>
                            </div>
                        </div><!-- end card-body -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div>
        <!-- container-fluid -->
    </div>
    <div class="modal fade" id="changepassword" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changepassword">Change Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" class="changepassword" id="changepasswordsubadmin">
                        <div class="row g-3">
                            <div class="col-xxl-6">
                            </div>
                            <!--end col-->
                            <div class="col-xxl-6">
                                <label class="form-label" for="password-input">Current Password</label>
                                <div class="position-relative auth-pass-inputgroup mb-3">
                                    <input type="password" class="form-control pe-5" placeholder="Enter Current password" name="cur_password" id="password-input">
                                    <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-6">
                                <div>
                                    <label for="emailInput" class="form-label">New Password</label>
                                    <input type="password" name="new_password" class="form-control" id="new_password" placeholder="Enter your Password">
                                </div>
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
    <!-- End Page-content -->
    <div class="modal fade" id="editsubadmin" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">Edit Gram Panchayat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" onClick="window.location.reload();" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="successs">
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $this->load->view('admin/footer.php'); ?>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

<script type="text/javascript">
    function archiveFunction(id) {
        event.preventDefault(); // prevent form submit
        var form = event.target.form; // storing the form
        swal({
                title: "Are you sure?",
                text: "Delete Gram Panchayat Record ",
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
                        url: "<?= base_url() ?>grampanchayat/deletesubadmin/id",
                        type: "post",
                        data: {
                            id: id
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
<script type="text/javascript">
    function holdModal(exampleModalgrid) {
        $('#' + exampleModalgrid).modal({
            backdrop: 'static',
            keyboard: false,
            show: true
        });
    }
</script>
<script>
    //  add modal
    $(document).on('submit', '#addgrampanchayat', function(ev) {
        $('.error').html('');
        ev.preventDefault(); // Prevent browers default submit.
        var formData = new FormData(this);
        var error = false;
        var panchayatsamiti = $('#pan_sam_name').val();
      var gram_pan_name = $('#gram_pan_name').val();
       
        if (panchayatsamiti == '') {
            $('#subnameError').html('Enter Panchayat Samiti Name');
            $('.error').css('color', 'red');
            error = true;
            // alert("hi");
        }
       
      
      
        if (error == false) {
            $.ajax({
                url: "<?= base_url('grampanchayat/addgrampanchayat'); ?>",
                type: 'post',
                data: formData,
                success: function(result) {
                    // json data
                    var dataResult = JSON.parse(result);
                    if (dataResult.done == '1') {
                        swal('Gram Panchayat Added 🙂', ' ', 'success');
                        setTimeout(function() {
                            location.reload(true);
                        }, 1000);
                    }
                    if (dataResult.done == '0') {
                        swal('Panchayat Samiti Not Added ☹️', ' ', 'success');
                        setTimeout(function() {
                            location.reload(true);
                        }, 1000);
                    }
                    if (dataResult.email == '0') {
                        swal('Panchayat Samiti Already Exist ☹️', ' ', 'error');
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
    $(document).ready(function() {
        $('.editmodel').click(function() {
            var userid = $(this).data('id');
            $.ajax({
                url: "<?= base_url('grampanchayat/edit'); ?>",
                type: "post",
                data: {
                    id: userid
                },
                success: function(response) {
                    $('.modal-body').html(response);
                    $('.bannerData').modal('show');
                }
            })
        });
    });
</script>
<script type="text/javascript">
    // update modal
    $(document).on('submit', '#bannerModelSubmits', function(ev) {
        ev.preventDefault(); // Prevent browers default submit.
        var formData = new FormData(this);
        $.ajax({
            url: "<?= base_url() ?>grampanchayat/update/",
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
</script>
<script type="text/javascript">
    function enableaccount(admin_user_id,admin_email) {
        event.preventDefault(); // prevent form submit
        var form = event.target.form; // storing the form
        swal({
                title: "Are you sure?",
                text: "Enable supervisor Account "+admin_email,
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
                        url: "<?= base_url() ?>Supervisor/update/admin_user_id",
                        type: "post",
                        data: {
                            admin_user_id: admin_user_id
                        },
                        success: function() {
                            swal('Account Enable 🙂', ' ', 'success');
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
    function disableaccount(admin_user_id,admin_email) {
        event.preventDefault(); // prevent form submit
        var form = event.target.form; // storing the form
        swal({
                title: "Are you sure?",
                text: "Disable supervisor Account "+admin_email,
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
                        url: "<?= base_url() ?>Supervisor/updatedisable/admin_user_id",
                        type: "post",
                        data: {
                            admin_user_id: admin_user_id
                        },
                        success: function() {
                            swal('Account Disable 🙂', ' ', 'success');
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
    // update modal
    $(document).on('submit', '#changepasswordsubadmin', function(ev) {
        ev.preventDefault(); // Prevent browers default submit.
        var formData = new FormData(this);
        $.ajax({
            url: "<?= base_url() ?>Supervisor/changesubpass",
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
                if (dataResult.inserted == '0') {
                    swal('Password Not Changed ☹️', ' ', 'success');
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
    })
   
    
</script>
<!-- filter Data -->
</body>
</html>