<?php $this->load->view('admin/link.php'); ?>
    <!-- Begin page -->
    <div id="layout-wrapper">

       <?php $this->load->view('admin/topar.php'); ?>
       <?php $this->load->view('admin/imgheader.php'); ?>
      <?php $this->load->view('admin/sidebar.php'); ?>
        </div>
        <?php $sess = $this->session->userdata('pmsadmin');
            $name = $sess['name'];
            $role = $sess['role'];
            $id = $sess['id'];

            ?>
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
                                <h4 class="mb-sm-0">Allotted Project List to Show Admin</h4>

                               <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?php base_url()?>Dashboard">Dashboards</a></li>
                                        <li class="breadcrumb-item active">Project Allotted List</li>
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
                                         <h4 class="card-title mb-0 flex-grow-1">Project Allotted List</h4>
                                         <?php if ($role == 'Master' OR $role == 'Subadmin' OR $role == 'ProjectMAdmin') {?>
                                            
                                         
                                        <div class="flex-shrink-0">     <button type="button" data-toggle="tooltip" data-placement="bottom" title="Allot New Project" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#exampleModalgrid"><i class="ri-user-add-line"></i></button>  
                                     <?php    } ?>
                                                                               
                                          
                                        </div>
                                    </div><!-- end card header -->
                                    <div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Allot Project to Show Admin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="allotproject">
                    <div class="row g-3">
                        <div class="col-xxl-6">
                            <div>
                                 <label for="firstName" class="form-label">Select Show Admin</label>
                                                        <select class="form-select form-control" name="showadmin" id="showadmin" >
                                                            <option value=''>Select Show Admin</option>
                                                            <?php foreach ($projectshowadmin->result() as $data) {
                                                                ?>
                                                            <option value="<?= $data->admin_user_id; ?>"><?php echo $data->admin_name; ?></option>
                                                                                    <?php } ?>
                                                        </select>
                            </div>
                            <div class="error" id="showadminError"></div>
                        </div><!--end col-->
                        <div class="col-xxl-6">
                            <div>
                                <label for="firstName" class="form-label">Select Project</label>
                                                        <select class="form-select form-control" name="project[]" id="project" multiple>
                                                            <option value=''>Select Project</option>
                                                            <?php foreach ($projectlist->result() as $data) {
                                                                ?>
                                                            <option value="<?= $data->p_id ; ?>"><?php echo $data->p_name; ?></option>
                                                                                    <?php } ?>
                                                        </select>
                            </div>
                             <div class="error" id="projectError"></div>
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
                                                          <th scope="col">Project Name</th>
                                                            <th scope="col">Allotted Admin</th>
                                                            <th scope="col">Allotted By</th>
                                                            <th scope="col">Date</th>
                                                            <th scope="col">Project Status</th>
                                                            
                                                            <th scope="col" colspan="4" style=" text-align: center;">Action</th>
                                                        </tr>
                                                    </thead>
                                                     <tbody>
                                            
                                            <?php 
                                            $i = 1;
                                            foreach($allotprojectshowadmin->result() as $row)

                                            { 
                                                
                                               
                                                ?>
                                                      
                                            <tr  <?php if($row->p_show_status == "Complete") { echo " style=' background-color: #ddd;cursor: not-allowed;'"; }?> id="delete<?php echo $row->p_allot_id ;?>">
                                                
                                                <td><a href="#" class="fw-medium"><?php echo $i;?></a></td>
                                              <?php if(!empty( $row->project_id)){ ?>
                                                <td><?php $pid = $row->project_id;
                                                    
                                                $this->db->select('p_name');
                                                  $this->db->from('projects');
                                                  $this->db->where('p_id',$pid);
                                                  $rows1 = $this->db->get()->row();
                                                 if(!empty($rows1)){
                                                       echo $rows1->p_name; 

                                                  }
                                                  ?>
                                                   

                                                </td>
                                              <?php } ?>
                                              	 <?php if(!empty( $row->show_admin_id)){ ?>
                                                 <td><?php $id= $row->show_admin_id;

                                                     $this->db->select('*');
                                                  $this->db->from('master_admin');
                                                  $this->db->where('admin_user_id',$id);
                                                   $rows1 = $this->db->get()->row();
                                              if(!empty($rows1)){
                                                 	 echo $rows1->admin_name; 
                                              }?></td>
                                              <?php } ?>
                                                <td><?php $admin_id =  $row->created_by;

                                                    $this->db->select('*');
                                                  $this->db->from('master_admin');
                                                  $this->db->where('admin_user_id',$admin_id);
                                                  $rows = $this->db->get()->row();
                                                    echo $rows->admin_name;


                                            ?></td>
                                                <td><?php echo $row->created_at;?></td>
                                                <td><?php echo $row->p_show_status;?></td>
                                                
                                                            <?php if($this->rbac->hasPrivilege('project_allotted_list','can_edit')) { ?>
                                                <td>

                                                   <i <?php if($row->p_show_status == "Complete") { echo " style='display:none'"; }?> class="ri-edit-box-line editmodel"  data-bs-toggle="modal" data-bs-target="#editprojectshow" data-id="<?php echo $row->p_allot_id; ?>" style="color: blue;"></i>
                                                   
                                                </td>
                                            <?php } ?>

                                            <?php if($this->rbac->hasPrivilege('project_allotted_list','can_delete')) { ?>
                                                <td>
                                                   <i <?php if($row->p_show_status == "Complete") { echo " style='display:none'"; }?> class="ri-delete-bin-line" name="archive" class="remove" type="submit" onclick="deletedata(<?php echo $row->p_allot_id;?>)" data-toggle="tooltip" data-placement="bottom"  style="color: red;"></i>
                                                   
                  
                                                </td>
                                            <?php } ?>

                                              <?php if ($row->p_show_status=="Pending") {
                                                
                                                ?>

                                               <td>
                                                    <i <?php if($row->p_show_status == "Complete") { echo " style='display:none'"; }?> class="ri-alert-line" data-toggle="tooltip" data-placement="bottom" title="Complete Your Project" name="archive" class="remove" type="submit" onclick="com(<?php echo $row->p_allot_id;?>)" data-toggle="tooltip" data-placement="bottom"  style="color: red;"></i>
                                                   
                
                                                </td>
                                            <?php } 
                                            else { ?>
                                               <td>
                                                    <i <?php if($row->p_show_status == "Complete") { echo " style='display:none'"; }?> class="ri-checkbox-circle-line" data-toggle="tooltip" data-placement="bottom" title="Mark as Pending" name="archive" class="remove" type="submit" onclick="pending(<?php echo $row->p_allot_id;?>)" data-toggle="tooltip" data-placement="bottom"  style="color: green;"></i>
                                                   
                  
                                                </td>
                                            <?php } ?>
                                            
                                            <td>
                                                    <i <?php if($row->p_show_status == "Complete") { echo " style='display:none'"; }?> class="ri-alert-line" data-toggle="tooltip" data-placement="bottom" title="Cancelled By Admin" name="archive" class="remove" type="submit" onclick="cancellbyadmin(<?php echo $row->p_allot_id;?>)" data-toggle="tooltip" data-placement="bottom"  style="color: red;"></i>
                                                   
                  
                                                </td>
                                            </tr>
                                           
                                            
                                           <input type="hidden" name="p_allot_id" id="p_allot_id" value="<?php echo $row->p_allot_id;?>">
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
                <form method="POST" class="changepassword" id="changepasswordoperation">
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
                    <input type="hidden" name="p_allot_id" value="<?php echo $row->p_allot_id; ?>">
                </form>
            </div>
        </div>
    </div>
</div>
             <div class="modal fade" id="editprojectshow" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Edit Allotted Project</h5>
                <button type="button" onClick="window.location.reload();" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
            </div>
        </div>
    </div>
</div>

           
        </div>
        <!-- end main content-->

    </div>

              <?php $this->load->view('admin/footer.php'); ?>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="<?=base_url()?>/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url()?>/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?=base_url()?>/assets/libs/node-waves/waves.min.js"></script>
    <script src="<?=base_url()?>/assets/libs/feather-icons/feather.min.js"></script>
    <script src="<?=base_url()?>/assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="<?=base_url()?>/assets/js/plugins.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- apexcharts -->
    <script src="<?=base_url()?>/assets/libs/apexcharts/apexcharts.min.js"></script>

    <!-- Vector map-->
    <script src="<?=base_url()?>/assets/libs/jsvectormap/js/jsvectormap.min.js"></script>
    <script src="<?=base_url()?>/assets/libs/jsvectormap/maps/world-merc.js"></script>

    <!--Swiper slider js-->
    <script src="<?=base_url()?>/assets/libs/swiper/swiper-bundle.min.js"></script>

    <!-- Dashboard init -->
    <script src="<?=base_url()?>/assets/js/pages/dashboard-ecommerce.init.js"></script>

    <!-- App js -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="<?=base_url()?>/assets/js/app.js"></script>
    <script type="text/javascript">
    function deletedata(p_allot_id) {
        
        event.preventDefault(); // prevent form submit
        
        var form = event.target.form; // storing the form
        swal({
                title: "Are you sure?",
                text: "Delete Allotted Project",
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
          url: "<?=base_url()?>ProjectAllotedList/deleteallottedproject/p_allot_id",
          type: "post",
          data: {p_allot_id:p_allot_id},
          success:function(){
            swal('Record Deleted 🙂', ' ', 'success');
            $("#delete"+p_allot_id).fadeTo("slow", 0.7, function(){
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
    $(document).on('submit', '#allotproject', function(ev) {
        $('.error').html('');

        ev.preventDefault(); // Prevent browers default submit.
        var formData = new FormData(this);
        var error = false;
        var showadmin = $('#showadmin').val();
        var project = $('#project').val();
        
        

        if (showadmin == '') {
            $('#showadminError').html('Select Show Admin');
            $('.error').css('color', 'red');
            error = true;
            // alert("hi");

        }
        if (project == '') {
            $('#projectError').html('Select Project');
            $('.error').css('color', 'red');
            error = true;

            // alert("hi");

        }
        
        if (error == false) {
            $.ajax({
                url: "<?= base_url('ProjectShowAdmin/allotprojectshow'); ?>",
                type: 'post',
                data: formData,
                success: function(result) {
                    // json data
                    var dataResult = JSON.parse(result);
                    if (dataResult.done == '1') {
                       swal('Project Allotted  🙂', ' ', 'success');
                      setTimeout(function() {
                            location.reload(true);
                        }, 1000);
                    }

                    if (dataResult.done == '0') {
                       swal('Project Not Allotted ☹️', ' ', 'success');
                      
                        setTimeout(function() {
                            location.reload(true);
                        }, 1000);

                    }

                    if (dataResult.project == '0') {
                       swal('Project Alraedy Allotted ☹️', ' ', 'error');
                      
                        

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
               
                var userid = $(this).data('id');
                
                $.ajax({
                    url: "<?= base_url('ProjectShowAdmin/pshowadminedit'); ?>",
                    type: "post",
                    data: {
                        id: userid
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
        $(document).on('submit', '#updateallotproject', function(ev) {
            ev.preventDefault(); // Prevent browers default submit.
            var formData = new FormData(this);
            $.ajax({
                url: "<?=base_url()?>ProjectShowAdmin/updateallottedproject/",
                type: 'post',
                data: formData,
                success: function(result) {
                    //json data

                      var dataResult = JSON.parse(result);
                    if (dataResult.done == '1') {
                       swal('Record Updated 🙂', ' ', 'success');
                      
                        setTimeout(function() {
                            location.reload(true);
                        }, 1000);
                         
                    }
                    else
                    {

                    }
                    if (dataResult.inserted == '0') {
                        swal('Record Not Updated 🙂', ' ', 'success');
                       
                    }
                   

                },
                cache: false,
                contentType: false,
                processData: false,
            })
        })
</script>

<script type="text/javascript">
    function com(p_allot_id)
    {
        event.preventDefault(); // prevent form submit
        
        var form = event.target.form; // storing the form
        swal({
                title: "Are you sure?",
                text: "Complete your project",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Please",
                cancelButtonText: "No, cancel !",
                closeOnConfirm: false,
                closeOnCancel: false
            },
           function(isConfirm){
             if (isConfirm) {
      $.ajax({
          url: "<?=base_url()?>ProjectAllotedList/update/p_allot_id",
          type: "post",
          data: {p_allot_id:p_allot_id},
          success:function(){
            swal('Project Completed 🙂', ' ', 'success');
            $("#delete"+p_allot_id).fadeTo("slow", 0.7, function(){
              $(this).remove();
               setTimeout(function() {
                            location.reload(true);
                        }, 1000);
            })
           

          },
          error:function(){
            swal('Project Still Pending ☹️', 'error');
          }
      });
  }
  else {
               swal("Cancelled", "Project Still Pending 🙂", "error");
            }
      
    });
    }
</script>



<script type="text/javascript">
    function pending(p_allot_id) {
        event.preventDefault(); // prevent form submit
        
        var form = event.target.form; // storing the form
        swal({
                title: "Are you sure?",
                text: "Pending your project",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Please",
                cancelButtonText: "No, cancel !",
                closeOnConfirm: false,
                closeOnCancel: false
            },
           function(isConfirm){
             if (isConfirm) {
      $.ajax({
          url: "<?=base_url()?>ProjectAllotedList/pending/p_allot_id",
          type: "post",
          data: {p_allot_id:p_allot_id},
          success:function(){
            swal('Project Pending 🙂', ' ', 'success');
            $("#delete"+p_allot_id).fadeTo("slow", 0.7, function(){
              $(this).remove();
               setTimeout(function() {
                            location.reload(true);
                        }, 1000);
            })
           

          },
          error:function(){
            swal('Project Still Completed ☹️', 'error');
          }
      });
  }
  else {
               swal("Cancelled", "Project Still Completed 🙂", "error");
            }
      
    });
    }
</script>

<script type="text/javascript">
    function cancellbyadmin(p_allot_id) {
        event.preventDefault(); // prevent form submit
        
        var form = event.target.form; // storing the form
        swal({
                title: "Are you sure?",
                text: "This Project Cancelled By Admin?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Confirm Please",
                cancelButtonText: "No, cancel Please!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
           function(isConfirm){
             if (isConfirm) {
      $.ajax({
          url: "<?=base_url()?>ProjectAllotedList/updatedisable/p_allot_id",
          type: "post",
          data: {p_allot_id:p_allot_id},
          success:function(){
            swal('Project Cancelled 🙂', ' ', 'success');
            $("#delete"+p_id).fadeTo("slow", 0.7, function(){
              $(this).remove();
            })
            

          },
          error:function(){
            swal('Project Is not cancelled ☹️', 'error');
          }
      });
  }
  else {
               swal("Cancelled", "Project Is not cancelled 🙂", "error");
            }
      
    });
    }
</script>

<script type="text/javascript">
      // update modal
        $(document).on('submit', '#changepasswordoperation', function(ev) {
            ev.preventDefault(); // Prevent browers default submit.
            var formData = new FormData(this);
            $.ajax({
                url: "<?=base_url()?>Subadmin/changeoperpass",
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


<!-- Mirrored from themesbrand.com/velzon/html/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 11 Mar 2022 09:52:42 GMT -->
</html>