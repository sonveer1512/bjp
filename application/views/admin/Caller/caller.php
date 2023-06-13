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
                                <h4 class="mb-sm-0">Caller Admin</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?php base_url()?>Dashboard">Dashboards</a></li>
                                        <li class="breadcrumb-item active">Caller Admin</li>
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
                                        <h4 class="card-title mb-0 flex-grow-1">Caller Admin</h4>

                                        <div class="flex-shrink-0">
                                           <?php if($this->rbac->hasPrivilege('caller','can_add')) { ?>
                                        <button type="button" data-toggle="tooltip" data-placement="bottom" title="Add New Caller Admin" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#exampleModalgrid"><i class="ri-user-add-line"></i></button>
                                          <?php } ?>
                                        <a href="<?=base_url()?>Workallotment">
                                        <button type="button" data-toggle="tooltip" data-placement="bottom" title="View Work Alloted List" class="btn btn-primary waves-effect waves-light"><i class="ri-eye-line"></i></button></a>                                      
                                          
                                        </div>
                                    </div><!-- end card header -->
                                    <div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Add New Caller Admin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="addCaller">
                    <div class="row g-3">
                       <?php if($role == 'Master' || $role == 'Regional') {?>
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
                                <label for="firstName" class="form-label">Name</label>
                                <input type="text" name="caller_name" id="caller_name" class="form-control" id="firstName" placeholder="Enter Name">
                            </div>
                            <div class="error" id="callernameError"></div>
                        </div><!--end col-->
                        <div class="col-xxl-6">
                            <div>
                                <label for="lastName" class="form-label">Email</label>
                                <input type="email" name="caller_email" id="caller_email" class="form-control" id="lastName" placeholder="Enter Email">
                            </div>
                            <div class="error" id="calleremailError"></div>
                        </div><!--end col-->
                       <div class="col-xxl-6">
                            <div>
                                <label for="lastName" class="form-label">Password</label>
                                <input type="password" name="caller_password" id="caller_password" class="form-control" id="lastName" placeholder="Enter Password">
                            </div>
                            <div class="error" id="callerpassError"></div>
                        </div><!--end col-->
                        <div class="col-xxl-6">
                            <div>
                                <label for="emailInput" class="form-label">Contact</label>
                                <input type="number" name="caller_contact" id="caller_contact" class="form-control" id="emailInput" placeholder="Enter your Contact">
                            </div>
                            <div class="error" id="callercontactError"></div>
                        </div><!--end col-->
                         <div class="col-xxl-6">
                            <div>
                                
                                <select class="form-control" name="caller_select">
                                    <option value="Caller" >Caller Admin</option>
                                </select>
                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-6">
                            <div>
                                <label for="passwordInput" class="form-label">Address</label>
                                <textarea class="form-control" name="caller_address" id="caller_address" placeholder="Enter Your Address"></textarea>
                            </div>
                            <div class="error" id="calleraddressError"></div>
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
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
                                                            
                                                            <th scope="col">ID</th>
                                                             <!-- <th scope="col">Department</th> -->
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Email</th>
                                                          <th scope="col">Regional Head</th>
                                                            <th scope="col">Contact</th>
                                                            <th scope="col">Date</th>
                                                           
                                                            <th scope="col" colspan="4" style=" text-align: center;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                            
                                            <?php 
                                            $i = 1;
                                            foreach($calleradminData->result() as $row)

                                            { 
                                                
                                               
                                                ?>
                                            <tr id="delete<?php echo $row->admin_user_id;?>">
                                                
                                                <td><a href="#" class="fw-medium"><?php echo $i;?></a></td>
                                                <td><?php if(!empty($row->admin_name)){  echo $row->admin_name;}?></td>
                                                <td><?php if(!empty($row->admin_email)){ echo $row->admin_email;}?></td>
                                               <?php 
                                              		 if(!empty($row->user_regional_head)){ ?>
                                                <td>
                                                  
                                                 
                                                    <?php  $admin_user_id = $row->user_regional_head;

                                                 $this->db->select('*');
                                                  $this->db->from('master_admin');
                                                  $this->db->where('admin_user_id',$admin_user_id);
                                                   $rows1 = $this->db->get()->row();
                                              if(!empty($rows1)){
                                                 	 echo $rows1->admin_name; 
                                              }?>
                                                   





                                            <?php  }
                                              
                                                  ?>   </td>
                                              <?php 
                                              		 if(!empty($row->project_manager_created_by)){ ?>
                                                <td>
                                                  
                                                 
                                                    <?php  $rhead = $row->project_manager_created_by;

                                                 $this->db->select('*');
                                                  $this->db->from('master_admin');
                                                  $this->db->where('admin_user_id',$rhead);
                                                   $rows1 = $this->db->get()->row();
                                              if(!empty($rows1)){
                                                 	 echo $rows1->admin_name; 
                                              }?>
                                                   





                                            <?php  }
                                              
                                                  ?>   </td>
                                                <td><?php echo $row->admin_contact;?></td>
                                                <td><?php echo $row->created_at;?></td>
                                                
                                                <td>
                                                     <?php if($this->rbac->hasPrivilege('caller','can_edit')) { ?>

                                                    <i class="ri-edit-box-line editmodel" data-bs-toggle="modal" data-bs-target="#editcalleradmin" data-id="<?php echo $row->admin_user_id; ?>" style="color: blue;"></i>
                                                   
                                                </td>
                                            <?php } ?>
                                                <?php if($this->rbac->hasPrivilege('caller','can_delete')) { ?>
                                                <td>
                                                    <i class="ri-delete-bin-line" name="archive" class="remove" type="submit" onclick="archiveFunction(<?php echo $row->admin_user_id ?>)" data-toggle="tooltip" data-placement="bottom"  style="color: red;"></i>
                                                   
                  
                                                </td>
                                            <?php } ?>
                                              <?php if($this->rbac->hasPrivilege('caller','can_delete')) { 
                                             if ($row->admin_status=="Disable") {
                                                
                                            ?>

                                          <td>
                                                    <i class="ri-alert-line" data-toggle="tooltip" data-placement="bottom" title="Enable Your Account" name="archive" class="remove" type="submit" onclick="enableaccount(<?php echo $row->admin_user_id ?>)" data-toggle="tooltip" data-placement="bottom"  style="color: red;"></i>
                                                   
                  
                                                </td>
                                            <?php } 
                                            else { ?>
                                                
                                               <td>
                                                    <i class="ri-checkbox-circle-line" data-toggle="tooltip" data-placement="bottom" title="Disable Your Account" name="archive" class="remove" type="submit" onclick="disableaccount(<?php echo $row->admin_user_id ?>)" data-toggle="tooltip" data-placement="bottom"  style="color: green;"></i>
                                                   
                  
                                                </td>
                                            <?php } }?>
                                            <?php if($this->rbac->hasPrivilege('caller','can_change_pass')) { ?>
                                                <td>
                                                    <i class="ri-lock-password-line" data-bs-toggle="modal" data-bs-target="#changepassword" data-id="<?php echo $row->admin_user_id; ?>" style="color: blue;"></i>
                                                   
                  
                                                </td><?php } ?>
                                            </tr>
                                           <input type="hidden" name="admin_user_id" value="<?php echo $row->admin_user_id; ?>">
                                            
                                           
                                            <?php $i++; } ?>
                                        </tbody>
                                        
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
            <div class="modal fade" id="changepassword" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="changepassword">Change Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" class="changepassword" id="changepasswordcaller">
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

             <div class="modal fade" id="editcalleradmin" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editcalleradmin">Edit Caller Admin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" onClick="window.location.reload();" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
            </div>
        </div>
    </div>
</div>

              <?php include 'footer.php';?>
        </div>
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
          url: "<?=base_url()?>CallerAdmin/deletecalleradmin/admin_user_id",
          type: "post",
          data: {admin_user_id:admin_user_id},
          success:function(){
            swal('Record Deleted 🙂', ' ', 'success');
            $("#delete"+admin_user_id).fadeTo("slow", 0.7, function(){
              $(this).remove();
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
    <script>
    //  add modal
    $(document).on('submit', '#addCaller', function(ev) {
        $('.error').html('');

        ev.preventDefault(); // Prevent browers default submit.
        var formData = new FormData(this);
        var error = false;
        var callername = $('#caller_name').val();
        var calleremail = $('#caller_email').val();
        var callerpassword = $('#caller_password').val();
        var callercontact = $('#caller_contact').val();
       // var calleraddress = $('#caller_address').val();
        

        if (callername == '') {
            $('#callernameError').html('Enter Your Name');
            $('.error').css('color', 'red');
            error = true;
            // alert("hi");

        }
        if (calleremail == '') {
            $('#calleremailError').html('Enter Your Email');
            $('.error').css('color', 'red');
            error = true;

            // alert("hi");

        }
        if (callerpassword == '') {
            $('#callerpassError').html('Enter Your Password');
            $('.error').css('color', 'red');
            error = true;

            // alert("hi");

        }
        if (callercontact == '') {
            $('#callercontactError').html('Enter Your Mobile Number');
            $('.error').css('color', 'red');
            error = true;

            // alert("hi");

        }
      /*  if (calleraddress == '') {
            $('#calleraddressError').html('Enter Your Address');
            $('.error').css('color', 'red');
            error = true;


        }*/
        if (error == false) {
            $.ajax({
                url: "<?= base_url('CallerAdmin/addcaller'); ?>",
                type: 'post',
                data: formData,
                success: function(result) {
                    // json data
                    var dataResult = JSON.parse(result);
                    if (dataResult.done == '1') {
                       swal('Customer Added 🙂', ' ', 'success');
                        setTimeout(function() {
                            location.reload(true);
                        }, 1000);
                      
                    }

                    if (dataResult.done == '0') {
                       swal('Customer Not Added ☹️', ' ', 'error');
                      
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
      // update modal
        $(document).on('submit', '#changepasswordcaller', function(ev) {
            ev.preventDefault(); // Prevent browers default submit.
            var formData = new FormData(this);
            $.ajax({
                url: "<?=base_url()?>CallerAdmin/changecallerpass",
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

<script type="text/javascript">

     $(document).ready(function() {
            $('.editmodel').click(function() {
               
                var userid = $(this).data('id');
                
                $.ajax({
                    url: "<?= base_url('CallerAdmin/calleredit'); ?>",
                    type: "post",
                    data: {
                        id: userid
                    },
                    success: function(response) {
                        
                        $('.modal-body').html(response);
                        $('.calleredit').modal('show');

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
                url: "<?=base_url()?>CallerAdmin/updatecaller/",
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
                text: "Enable Caller Account <?php echo $row->admin_email; ?>",
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
          url: "<?=base_url()?>CallerAdmin/update/admin_user_id",
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
                text: "Disable Caller Account <?php echo $row->admin_email; ?>",
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
          url: "<?=base_url()?>CallerAdmin/updatedisable/admin_user_id",
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
</body>


<!-- Mirrored from themesbrand.com/velzon/html/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 11 Mar 2022 09:52:42 GMT -->
</html>