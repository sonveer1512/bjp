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
                                <h4 class="mb-sm-0">Projects Member List</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?php base_url()?>Dashboard">Dashboards</a></li>
                                        <li class="breadcrumb-item active">Projects List</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                   
                                   

                                    <div class="card-body">
                                       
                                        
                                        <div class="live-preview">
                                            <div class="table-responsive table-card">
                                                <table class="table align-middle table-nowrap mb-0">
                                                    <thead class="table-light">
                                                        <tr>
                                                            
                                                            <th scope="col">ID</th>
                                                             <!-- <th scope="col">Department</th> -->
                                                         
                                                            <th scope="col">Project Name</th>
                                                           
                                                           
                                                            <th scope="col">Assigned By</th>
                                                      
                                                            <th scope="col">Assigned to</th>
                                                             <th scope="col">Status</th>
                                                           
                                                            
                                                            <th scope="col" colspan="5" style=" text-align: center;">Action</th>
                                                        </tr>
                                                    </thead>
                                                     <tbody>
                                            
                                            <?php 
                                            if($projectalloted->num_rows() > 0){
                                            $i = 1;
                                            foreach($projectalloted->result() as $row)

                                            { 
                                                
                                               
                                                ?>
                                            <tr id="delete<?php echo $row->admin_user_id;?>">
                                                
                                                <td><a href="#" class="fw-medium"><?php echo $i;?></a></td>
                                               
                                                <td><?php 
                                                    echo  $row->p_name;

                                              ?>
                                                 </td>
                                          
                                             
                                                <td><?php 
                                                      $assigned =  $row->created_by;
                                                      $this->db->select('*');
                                                  $this->db->from('master_admin');
                                                  $this->db->where('admin_user_id',$assigned);
                                                  $rows1 = $this->db->get()->row();
                                                  if ($rows1 > '0') {
                                                       echo $rows1->admin_name; 

                                                  }
                                                  ?> (<?php                                                      echo $rows1->admin_role; ?>
)
                                             </td>
                                         
                                                <td><?php $assto = $row->admin_user_id;
                                                    
                                                     $this->db->select('*');
                                                  $this->db->from('master_admin');
                                                  $this->db->where('admin_user_id',$assto);
                                                  $rows1 = $this->db->get()->row();
                                                  if ($rows1 > '0') {
                                                       echo $rows1->admin_name; 

                                                  }
                                                  ?> (<?php                                                      echo $rows1->admin_role; ?>)
                                                </td>
                                                <td><?php echo  $row->p_member_status;?></td>
                                               <?php if($this->rbac->hasPrivilege('project_member','can_edit')) { ?>
                                                <!-- <td>
                                                 <i class="ri-edit-box-line editmodel"  data-bs-toggle="modal" data-bs-target="#editsubadmin" data-id="<?php echo $row->p_member_id ; ?>" style="color: blue;"></i>
                                                 </td> -->
                                                <?php } ?>

                                                <?php if($this->rbac->hasPrivilege('project_member','can_delete')) { ?>
                                                <td>
                                                   <i class="ri-delete-bin-line"  name="archive" class="remove" type="submit" onclick="archiveFunction(<?php echo $row->p_member_id  ?>)" data-toggle="tooltip" data-placement="bottom"  style="color: red;"></i>
                                                </td>
                                                <?php } ?>

                                                <?php if ($row->p_member_status=="Pending") {
                                                
                                                ?>

                                                <td>
                                                    <i class="ri-checkbox-circle-line" data-toggle="tooltip" data-placement="bottom" title="Mark to complete" name="archive" class="remove" type="submit" onclick="enableaccount(<?php echo $row->p_member_id  ?>)" data-toggle="tooltip" data-placement="bottom"  style="color: green;"></i>
                                                   
                  
                                                </td>
                                            <?php } 
                                            else { ?>
                                               <td>
                                                    <i class="ri-alert-line" data-toggle="tooltip" data-placement="bottom" title="Disable Your Account" name="archive" class="remove" type="submit" onclick="disableaccount(<?php echo $row->p_member_id  ?>)" data-toggle="tooltip" data-placement="bottom"  style="color: red;"></i>
                                                   
                  
                                                </td>
                                            <?php } ?>
                                            <td>
                                                    <i class="ri-alert-line" data-toggle="tooltip" data-placement="bottom" title="Cancelled By Admin" name="archive" class="remove" type="submit" onclick="disableaccount(<?php echo $row->p_member_id  ?>)" data-toggle="tooltip" data-placement="bottom"  style="color: red;"></i>
                                                   
                  
                                                </td>

                                           
                                            </tr>
                                           
                                            
                                           
                                            <?php $i++; } 
                                            }
                                            
                                            ?>
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
                    <?php
                    if($projectalloted->num_rows() > 0){?>
                    
                     <input type="hidden" name="admin_user_id" value="<?php echo $row->admin_user_id; ?>">
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>
</div>
                <div class="modal fade" id="editsubadmin" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalgridLabel">Edit Operation Admin</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                
                            </div>
                        </div>
                    </div>
                </div>


            

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>document.write(new Date().getFullYear())</script> © Velzon.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by Themesbrand
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
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
    function archiveFunction(admin_user_id) {
        event.preventDefault(); // prevent form submit
        
        var form = event.target.form; // storing the form
        swal({
                title: "Are you sure?",
                text: "Delete Subadmin Record <?php echo isset($row->admin_email) ? $row->admin_email:'' ; ?>",
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
          url: "<?=base_url()?>Operation/deleteoperation/admin_user_id",
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
    <script>
    //  add modal
    $(document).on('submit', '#addprojects', function(ev) {
        $('.error').html('');

        ev.preventDefault(); // Prevent browers default submit.
        var formData = new FormData(this);
        var error = false;
        var pname = $('#pname').val();
        var pdes = $('#pdes').val();
        var pvenue = $('#pvenue').val();
        var pstart_date = $('#pstart_date').val();
        var pend_date = $('#pend_date').val();
         var pprojectm = $('#pprojectm').val();
        

        if (pname == '') {
            $('#pnameError').html('Enter Project Name');
            $('.error').css('color', 'red');
            error = true;
            // alert("hi");

        }
        if (pdes == '') {
            $('#pdescError').html('Enter Project Description');
            $('.error').css('color', 'red');
            error = true;

            // alert("hi");

        }
        if (pvenue == '') {
            $('#pvenueError').html('Enter Project Venue');
            $('.error').css('color', 'red');
            error = true;

            // alert("hi");

        }
        if (pstart_date == '') {
            $('#startError').html('Enter Project start Date');
            $('.error').css('color', 'red');
            error = true;

            // alert("hi");

        }
        if (pend_date == '') {
            $('#endError').html('Enter Project End Date');
            $('.error').css('color', 'red');
            error = true;


        }
        if (pprojectm == '') {
            $('#pmError').html('Select Project Manager');
            $('.error').css('color', 'red');
            error = true;


        }
        if (error == false) {
            $.ajax({
                url: "<?= base_url('projects/addproject'); ?>",
                type: 'post',
                data: formData,
                success: function(result) {
                    // json data
                    var dataResult = JSON.parse(result);
                    if (dataResult.done == '1') {
                       swal('Project Added 🙂', ' ', 'success');
                      setTimeout(function() {
                            location.reload(true);
                        }, 1000);
                    }

                    if (dataResult.done == '0') {
                       swal('Project Not Added ☹️', ' ', 'error');
                      
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
            $('.editmodel').click(function() {
               
                var userid = $(this).data('id');
                
                $.ajax({
                    url: "<?= base_url('Operation/operationedit'); ?>",
                    type: "post",
                    data: {
                        id: userid
                    },
                    success: function(response) {
                        
                        $('.modal-body').html(response);
                        $('.editoperation').modal('show');

                    }
                })


            });
        });
</script>
<script type="text/javascript">
      // update modal
        $(document).on('submit', '#EditOperationadmin', function(ev) {
            ev.preventDefault(); // Prevent browers default submit.
            var formData = new FormData(this);
            $.ajax({
                url: "<?=base_url()?>Operation/updateoperation/",
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
                text: "Enable Operation Account <?php echo isset($row->admin_email) ?? '' ; ?>",
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
          url: "<?=base_url()?>Operation/update/admin_user_id",
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
                text: "Disable Operation Account <?php echo isset($row->admin_email) ?? ''; ?>",
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
          url: "<?=base_url()?>Operation/updatedisable/admin_user_id",
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
<script type="text/javascript">
    
     function fetchdata(userid) {
        var userid = userid;
        $.ajax({
            url: "<?php echo  base_url('Projects/userdetail'); ?>",
            type: "POST",
            data: {
                userid: userid
            },
            success: function(response) {
                var dataResult = JSON.parse(response);
                $('#pprojectm').html(dataResult);
               
            }
        })
    }
</script>

</body>


<!-- Mirrored from themesbrand.com/velzon/html/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 11 Mar 2022 09:52:42 GMT -->
</html>