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
                        <h4 class="mb-sm-0">Project Show Admin</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?php base_url()?>Dashboard">Dashboards</a></li>
                                <li class="breadcrumb-item active">Project Show Admin</li>
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
                            <h4 class="card-title mb-0 flex-grow-1">Project Show Admin</h4>

                            <div class="flex-shrink-0"> <button type="button" data-toggle="tooltip" data-placement="bottom" title="Add New Project Show Admin" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#exampleModalgrid"><i class="ri-user-add-line"></i></button>
                               <a href="<?php base_url()?>ProjectShowAdmin/showadminproject"> <button type="button" data-toggle="tooltip" data-placement="bottom" title="Project Assign Show Admin List" class="btn btn-primary waves-effect waves-light" ><i class="ri-play-list-add-line"></i></button></a>

                            </div>
                        </div><!-- end card header -->

                        <div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">

                                        <h5 class="modal-title" id="exampleModalgridLabel">Add New Project Show Admin</h5>

                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                    </div>

                                    <div class="modal-body">
                                        <div id="success">
                                            <div id="error">
                                            </div>

                                        </div>
                                        <form method="POST" id="addpshow">
                                            <div class="row g-3">
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="firstName" class="form-label">Name</label>
                                                        <input type="text" class="form-control" name="sub_name" id="sub_name" placeholder="Enter Name">
                                                    </div>
                                                    <div class="error" id="subnameError"></div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="lastName" class="form-label">Email</label>
                                                        <input type="email" class="form-control" name="sub_email" id="sub_email" placeholder="Enter Email">
                                                    </div>
                                                    <div class="error" id="subemailError"></div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="lastName" class="form-label">Password</label>
                                                        <input type="password" class="form-control" name="sub_password" id="sub_password" placeholder="Enter Password">
                                                    </div>
                                                    <div class="error" id="subpassError"></div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="emailInput" class="form-label">Contact</label>
                                                        <input type="number" class="form-control" name="sub_contact" id="sub_contact" placeholder="Enter your Contact">
                                                    </div>
                                                    <div class="error" id="subcontactError"></div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-xxl-6">
                                                    <div>
                                                          <label for="emailInput" class="form-label">Admin Type</label>
                                                        <select class="form-control" name="sub_select">
                                                            <option value="ProjectShowAdmin">Project Show Admin</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="passwordInput" class="form-label">Address</label>
                                                        <textarea class="form-control" name="sub_address" id="sub_address" placeholder="Enter Your Address"></textarea>
                                                    </div>
                                                    <div class="error" id="subaddressError"></div>
                                                </div>
                                                <!--end col-->
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
                                    <table class="table align-middle table-nowrap mb-0" id="datatable">
                                        <thead class="table-light">
                                            <tr>
                                                
                                                <th scope="col">ID</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Contact</th>
                                                <th scope="col">Date</th>
                                                
                                                <th scope="col" colspan="4" style=" text-align: center;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php 
                                            $i = 1;
                                            foreach($projectshowadmin->result() as $row)

                                            { 
                                                
                                               
                                                ?>
                                            <tr id="delete<?php echo $row->admin_user_id;?>">
                                                
                                                <td><a href="#" class="fw-medium"><?php echo $i;?></a></td>
                                                <td><?php echo $row->admin_name;?></td>
                                                <td><?php echo $row->admin_email;?></td>
                                                <td><?php echo $row->admin_contact;?></td>
                                                <td><?php echo $row->created_at;?></td>
                                                <!-- <td>
                                                                  <input type="hidden" name="admin_user_id" id="admin_user_id<?=$row->admin_user_id?>"  value="<?=$row->admin_user_id;?>" />
                                <input type="hidden" name="tval" id="tval"  value="" />
                            <select class="form-control" name="accept_status" id="accept_status<?=$row->admin_user_id;?>"  onChange="return get(<?=$row->admin_user_id?>);">
                                
                                <option <?php if($row->admin_status=="Enable"){ echo 'selected';} ?>  value="Enable">Enable</option>
                                <option <?php if($row->admin_status=="Disable"){ echo 'selected';} ?> value="Disable">Disable</option>
                            </select>
                                                            </td> -->
                                                            <?php if($this->rbac->hasPrivilege('project_show_admin','can_edit')) { ?>
                                                <td>

                                                    <i class="ri-edit-box-line editmodel" style="color: blue;" class="" data-bs-toggle="modal" data-bs-target="#editsubadmin" data-id="<?php echo $row->admin_user_id; ?>"></i>
                                                   
                                                </td>
                                            <?php } ?>

                                            <?php if($this->rbac->hasPrivilege('project_show_admin','can_delete')) { ?>
                                                <td>
                                                    <i class="ri-delete-bin-line" name="archive" class="remove" type="submit" onclick="archiveFunction(<?php echo $row->admin_user_id ?>)" data-toggle="tooltip" data-placement="bottom"  style="color: red;"></i>
                                                   
                  
                                                </td>
                                            <?php } ?>

                                            <?php if ($row->admin_status=="Disable") {
                                                
                                            ?>

                                          <td>
                                                    <i class="ri-alert-line" data-toggle="tooltip" data-placement="bottom" title="Enable Your Account" name="archive" class="remove" type="submit" onclick="enableaccount(<?php echo $row->admin_user_id ?>)" data-toggle="tooltip" data-placement="bottom"  style="color: red;"></i>
                                                   
                  
                                                </td>
                                            <?php } 
                                            else { ?>
                                               <td>
                                                    <i class="ri-checkbox-circle-line" data-toggle="tooltip" data-placement="bottom" title="Disable Your Account" name="archive" class="remove" type="submit" onclick="disableaccount(<?php echo $row->admin_user_id ?>)" data-toggle="tooltip" data-placement="bottom"  style="color: green;"></i>
                                                   
                  
                                                </td>
                                            <?php } ?>

                                            <?php if($this->rbac->hasPrivilege('project_show_admin','can_change_pass')) { ?>
                                                <td>
                                                   <i class="ri-lock-password-line" style="color: blue;" data-bs-toggle="modal" data-bs-target="#changepassword" data-id="<?php echo $row->admin_user_id; ?>"></i></button>
                                                   
                  
                                                </td><?php } ?>
                                            </tr>
                                           
                                             <input type="hidden" name="admin_user_id" id="admin_user_id<?=$row->admin_user_id?>"  value="<?=$row->admin_user_id;?>" />
                                           
                                            <?php $i++; } ?>
                                        </tbody>
                                    </table>
                                    <input type="hidden" name="admin_user_id" value="<?php echo $row->admin_user_id; ?>">
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
                           
                        </div><!--end col-->
                        <div class="col-xxl-6">
                            

                            <label class="form-label" for="password-input">Current Password</label>
                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                <input type="password" class="form-control pe-5" placeholder="Enter Current password" name="cur_password" id="password-input">
                                                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                            </div>
                        </div><!--end col-->
                       
                         <div class="col-xxl-6">
                            <div>
                                <label for="emailInput" class="form-label">New Password</label>
                                <input type="password" name="new_password" class="form-control" id="new_password" placeholder="Enter your Password">
                            </div>

                        </div><!--end col-->

                        
                       
                        
                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
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
                    <h5 class="modal-title" id="exampleModalgridLabel">Edit Project Show Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                </div>
            </div>
        </div>
    </div>


       <?php $this->load->view('admin/footer.php'); ?>
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
           function(isConfirm){
             if (isConfirm) {
      $.ajax({
          url: "<?=base_url()?>ProjectShowAdmin/deletepshowadmin/admin_user_id",
          type: "post",
          data: {admin_user_id:admin_user_id},
          success:function(){
            swal('Record Deleted 🙂', ' ', 'success');
            $("#delete"+admin_user_id).fadeTo("slow", 0.7, function(){
              $(this).remove();
              setTimeout(function() {
                            location.reload(true);
                        }, 1000);
            })

          },
          error:function(){
            swal('Record Not Deleted ☹️', 'error');
          }
      });
  }
  else {
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
    $(document).on('submit', '#addpshow', function(ev) {
        $('.error').html('');

        ev.preventDefault(); // Prevent browers default submit.
        var formData = new FormData(this);
        var error = false;
        var subname = $('#sub_name').val();
        var subemail = $('#sub_email').val();
        var subpassword = $('#sub_password').val();
        var subcontact = $('#sub_contact').val();
        //var subaddress = $('#sub_address').val();
        

        if (subname == '') {
            $('#subnameError').html('Enter Your Name');
            $('.error').css('color', 'red');
            error = true;
            // alert("hi");

        }
        if (subemail == '') {
            $('#subemailError').html('Enter Your Email');
            $('.error').css('color', 'red');
            error = true;

            // alert("hi");

        }
        if (subpassword == '') {
            $('#subpassError').html('Enter Your Password');
            $('.error').css('color', 'red');
            error = true;

            // alert("hi");

        }
        if (subcontact == '') {
            $('#subcontactError').html('Enter Your Mobile Number');
            $('.error').css('color', 'red');
            error = true;

            // alert("hi");

        }
       /* if (subaddress == '') {
            $('#subaddressError').html('Enter Your Address');
            $('.error').css('color', 'red');
            error = true;


        }
        */
        if (error == false) {
            $.ajax({
                url: "<?= base_url('ProjectShowAdmin/addshowadmin'); ?>",
                type: 'post',
                data: formData,
                success: function(result) {
                    // json data
                    var dataResult = JSON.parse(result);
                    if (dataResult.done == '1') {
                       swal('Project Show Admin Added 🙂', ' ', 'success');
                       setTimeout(function() {
                            location.reload(true);
                        }, 1000);
                    }

                    if (dataResult.done == '0') {
                       swal('Project Show Admin Not Added ☹️', ' ', 'success');
                      
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
//samle

 
//


    })
    // update modal
    
   
    // dynamic model
    
</script>
<script type="text/javascript">

     $(document).ready(function() {
            $('.editmodel').click(function() {
               
                var id = $(this).data('id');
                
                $.ajax({
                    url: "<?= base_url('ProjectShowAdmin/pshowadminedit'); ?>",
                    type: "post",
                    data: {
                        id: id
                    },
                    success: function(response) {
                        
                        $('.modal-body').html(response);
                        $('.editprojectshowadmin').modal('show');

                    }
                })


            });
        });
</script>
<script type="text/javascript">
      // update modal
        $(document).on('submit', '#editshowadmin', function(ev) {
            ev.preventDefault(); // Prevent browers default submit.
            var formData = new FormData(this);
            $.ajax({
                url: "<?=base_url()?>ProjectShowAdmin/updatepshowadmin/",
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


<script type="text/javascript">
    function enableaccount(admin_user_id) {
        event.preventDefault(); // prevent form submit
        
        var form = event.target.form; // storing the form
        swal({
                title: "Are you sure?",
                text: "Enable Project Show Admin Account <?php echo $row->admin_email; ?>",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Enable Please",
                cancelButtonText: "No, cancel Please!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
           function(isConfirm){
             if (isConfirm) {
      $.ajax({
          url: "<?=base_url()?>ProjectShowAdmin/update/admin_user_id",
          type: "post",
          data: {admin_user_id:admin_user_id},
          success:function(){
            swal('Account Enable 🙂', ' ', 'success');
            $("#delete"+admin_user_id).fadeTo("slow", 0.7, function(){
              $(this).remove();
            })
            setTimeout(function() {
                            location.reload(true);
                        }, 1000);

          },
          error:function(){
            swal('Account Still Disable ☹️', 'error');
          }
      });
  }
  else {
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
                text: "Disable Project Show Admin Account <?php echo $row->admin_email; ?>",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Disable Please",
                cancelButtonText: "No, cancel Please!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
           function(isConfirm){
             if (isConfirm) {
      $.ajax({
          url: "<?=base_url()?>ProjectShowAdmin/updatedisable/admin_user_id",
          type: "post",
          data: {admin_user_id:admin_user_id},
          success:function(){
            swal('Account Disable 🙂', ' ', 'success');
            $("#delete"+admin_user_id).fadeTo("slow", 0.7, function(){
              $(this).remove();
            })
            setTimeout(function() {
                            location.reload(true);
                        }, 1000);

          },
          error:function(){
            swal('Account Still Enable ☹️', 'error');
          }
      });
  }
  else {
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
                url: "<?=base_url()?>ProjectShowAdmin/changepshowpass",
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

</body>

</html>