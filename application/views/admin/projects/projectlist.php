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
       <link rel="stylesheet" href="https:////code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
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
                                <h4 class="mb-sm-0">Projects List</h4>

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
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Projects List</h4>

                                        <div class="flex-shrink-0">    
                                          <?php if($this->rbac->hasPrivilege('projects','can_add')) { ?>
                                                <?php if($this->rbac->hasPrivilege('project_alloted_list','can_add')) { ?>
                                          <button type="button" data-toggle="tooltip" data-placement="bottom" title="Add New Project" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#exampleModalgrid"><i class="ri-user-add-line"></i></button>     
                                           <?php } } ?>                              
                                          
                                        </div>
                                    </div><!-- end card header -->
                                    <div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalgridLabel">Add New Project</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" id="addprojects">
                                            <div class="row g-3">
                                                 <?php if($role == 'Master') {?>
                                                <div class="col-xxl-6">

                                                    <div>
                                                        <label for="firstName" class="form-label">Select Regional Head</label>
                                                        <select class="form-select form-control" name="pregional" id="pregional" onchange="fetchdata(this.value)">
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
                                             <?php if($role == 'Master') {?>
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="firstName" class="form-label">Select Project Manager</label>
                                                        <select class="form-select form-control" id='pprojectm' name="pprojectm">
                                                        <option>Select Project Manager</option>

                                                        </select>
                                                    </div>
                                                    <div class="error" id="pmError"></div>
                                                </div><!--end col-->
                                            <?php } ?>
                                            <?php if ($role == 'Regional') { ?>
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="firstName" class="form-label">Select Project Manager</label>
                                                        <select class="form-select form-control" id='pprojectm' name="pprojectm">
                                                        <option>Select Project Manager</option>
                                                       
                                                            <?php foreach ($projectdata->result() as $data) {
                                                                ?>
                                                                <option value="<?= $data->admin_user_id; ?>"><?php echo $data->admin_name; ?></option>
                                                                                    <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="error" id="pmError"></div>
                                                </div><!--end col-->
                                        <?php    } ?>

                                            <div class="col-xxl-6">
                                                    <div>
                                                        <label for="firstName" class="form-label">Select Another Member</label>
                                                        <select class="form-control" id='alluser' name="alluser[]" class="selectpicker" multiple  >
                                                            
                                                        <option>Select Another Member</option>
                                                        <?php foreach ($allUser->result() as $data) {

                                                                ?>
                                                            <option value="<?= $data->admin_user_id; ?>"><?php echo $data->admin_name; ?> (<?php echo  $data->admin_role;?>)</option>
                                                                                    <?php } ?>
                                                        </select>
                                                    </div>

                                                    <div class="error" id="pmError"></div>
                                                </div><!--end col-->
                                               <div class="col-xxl-6">
                                                    <div>
                                                        <label for="lastName" class="form-label">Project Name</label>
                                                        <input type="text" name="pname" id="pname" class="form-control" id="lastName" placeholder="Enter Project Name">
                                                    </div>
                                                     <div class="error" id="pnameError"></div>
                                                </div><!--end col-->
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="emailInput" class="form-label">Project Description</label>
                                                        <input type="text" name="pdes" id="pdes" class="form-control" id="emailInput" placeholder="Enter your Project Description">
                                                    </div>
                                                     <div class="error" id="pdescError"></div>
                                                </div><!--end col-->
                                                 <div class="col-xxl-6">
                                                    <div>
                                                        <label for="emailInput" class="form-label">Project Venue</label>
                                                        <input type="text" name="pvenue" id="pvenue" class="form-control" id="emailInput" placeholder="Enter your Project Venue">
                                                    </div>
                                                     <div class="error" id="pvenueError"></div>
                                                </div><!--end col-->
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="emailInput" class="form-label">Project Embaded URL</label>
                                                        <textarea  name="purl" id="purl" class="form-control"  placeholder="Enter your Project Venue Map URL"></textarea>
                                                    </div>
                                                     <div class="error" id="purlError"></div>
                                                </div><!--end col-->
                                                 <div class="col-xxl-6">
                                                    <div>
                                                        <label for="emailInput" class="form-label">Start Date</label>
                                                        <input type="date" name="pstart_date" id="pstart_date" class="form-control" id="emailInput" placeholder="Enter your Project Description">
                                                    </div>
                                                     <div class="error" id="startError"></div>
                                                </div><!--end col-->
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="emailInput" class="form-label">End Date</label>
                                                        <input type="date" name="pend_date" id="pend_date" class="form-control" id="emailInput" placeholder="Enter your Project Description">
                                                    </div>
                                                     <div class="error" id="endError"></div>
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
                                                             <?php if($role == 'Master') {?>
                                                            <th scope="col">Regional Head</th>
                                                            <?php } ?>  
                                                             <?php if($role == 'Regional' OR $role == 'Master') {?>  
                                                            <th scope="col">P. Manager</th>
                                                        <?php } ?>
                                                            <th scope="col">Project Title</th>
                                                          
                                                            <th scope="col">Start Date</th>
                                                             <th scope="col">End Date</th>

                                                             <th scope="col">Created By</th>
                                                              <th scope="col">Project URL</th>
                                                              
                                                            
                                                            <th scope="col" colspan="4" style=" text-align: center;">Action</th>
                                                        </tr>
                                                    </thead>
                                                     <tbody>
                                            
                                            <?php 
                                            $i = 1;
                                            foreach($projectalloted->result() as $row)

                                            { 
                                                
                                               
                                                ?>
                                            <tr id="delete<?php echo $row->admin_user_id;?>">
                                                
                                                <td><a href="#" class="fw-medium"><?php echo $i;?></a></td>
                                                <?php if($role == 'Master') {?>
                                              	 <?php if(!empty($row->regional_head)){ ?>
                                                <td>
                                                  <?php   $rhead = $row->regional_head;

                                                 $this->db->select('*');
                                                  $this->db->from('master_admin');
                                                  $this->db->where('admin_user_id',$rhead);
                                                   $rows1 = $this->db->get()->row();
                                              if(!empty($rows1)){
                                                 	 echo $rows1->admin_name; 
                                              }?>
                                            
                                                 </td>
                                            <?php } }?>
                                             
                                             <?php if($role == 'Regional' OR $role == 'Master') {?>
                                                <td><?php 
                                                      
                                                        $pm = $row->project_manager;

                                                 $this->db->select('*');
                                                  $this->db->from('master_admin');
                                                  $this->db->where('admin_user_id',$pm);
                                                   $rows1 = $this->db->get()->row();
                                              if(!empty($rows1)){
                                                 	 echo $rows1->admin_name; 
                                              }?>
                                                  
                                             </td>
                                           <?php } ?>
                                              	
                                                <td><?php
                                              	if(!empty($row->p_name)){ 
                                              	echo $row->p_name; }?></td>
                                              
                                               
                                                <td><?php
                                              if(!empty($row->p_start_date)){ echo $row->p_start_date;}?></td>
                                                <td><?php  if(!empty($row->p_end_date)){ echo $row->p_end_date;}?></td>
                                                <td><?php  if(!empty($row->admin_name)){ echo ($row->admin_name !='')?$row->admin_name :'' . ' ' . ($row->admin_role);}?></td>
                                              <td><textarea><?php  if(!empty($row->purl)){ echo $row->purl;}?></textarea></td>
                                                  
                                                
                                                 <?php if($this->rbac->hasPrivilege('projects','can_edit')) { ?>
                                                <?php if($this->rbac->hasPrivilege('project_alloted_list','can_edit')) { ?>
                                                <td>

                                                   <i class="ri-edit-box-line editmodel"  data-bs-toggle="modal" data-bs-target="#editprojectlist" data-id="<?php echo $row->p_id; ?>" style="color: blue;"></i>
                                                   
                                                </td>
                                            <?php } ?>

                                            <?php if($this->rbac->hasPrivilege('project_alloted_list','can_delete')) { ?>
                                                <td>
                                                   <i class="ri-delete-bin-line"  name="archive" class="remove" type="submit" onclick="archiveFunction(<?php echo $row->p_id ?>)" data-toggle="tooltip" data-placement="bottom"  style="color: red;"></i>
                                                   
                  
                                                </td>
                                            <?php } ?>

                                              <?php if ($row->project_status=="Pending") {
                                                
                                                ?>

                                                <td>
                                                    <i class="ri-alert-line" data-toggle="tooltip" data-placement="bottom" title="Mark to complete" name="archive" class="remove" type="submit" onclick="complete(<?php echo $row->p_id;?>)" data-toggle="tooltip" data-placement="bottom"  style="color: red;"></i>
                                                   
                  
                                                </td>
                                            <?php } 
                                            else { ?>
                                               <td>
                                                    <i class="ri-checkbox-circle-line" data-toggle="tooltip" data-placement="bottom" title="Mark as Pending" name="archive" class="remove" type="submit" onclick="pending(<?php echo $row->p_id;?>)" data-toggle="tooltip" data-placement="bottom"  style="color: green;"></i>
                                                   
                  
                                                </td>
                                            <?php } ?>
                                            <td>
                                                    <i class="ri-alert-line" data-toggle="tooltip" data-placement="bottom" title="Cancelled By Admin" name="archive" class="remove" type="submit" onclick="cancellbyadmin(<?php echo $row->p_id;?>)" data-toggle="tooltip" data-placement="bottom"  style="color: red;"></i>
                                                   
                  
                                                </td>
                                            </tr>
                                           
                                            
                                           
                                            <?php $i++; } } ?>
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
            
                <div class="modal fade" id="editprojectlist" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalgridLabel">Edit Project</h5>
                                <button type="button" class="btn-close" onClick="window.location.reload();" data-bs-dismiss="modal" aria-label="Close"></button>
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
    function archiveFunction(p_id) {
        event.preventDefault(); // prevent form submit
        
        var form = event.target.form; // storing the form
        swal({
                title: "Are you sure?",
                text: "Delete Record",
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
          url: "<?=base_url()?>Projects/deleteprojects/p_id",
          type: "post",
          data: {p_id:p_id},
          success:function(){
            swal('Record Deleted 🙂', ' ', 'success');
            $("#delete"+admin_user_id).fadeTo("slow", 0.7, function(){
              $(this).remove();
              setTimeout(function() {
                            location.reload(true);
                        }, 500);
             
            })
            
             

          },
          error:function(){
            swal('Record Not Deleted ☹️', 'error');
          }
      });
  }
  else {
               swal("Cancelled", "Project Stil Present 🙂", "error");
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
      	var admin_name =  $('#admin_name').val();
       var purl =  $('#purl').val();
        

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
       if (purl == '') {
            $('#purlError').html('Enter Project Embaded URL');
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
                    url: "<?= base_url('Projects/projectlistedit'); ?>",
                    type: "post",
                    data: {
                        id: userid
                    },
                    success: function(response) {
                        
                        $('.modal-body').html(response);
                        $('.editprojectlist').modal('show');

                    }
                })


            });
        });
</script>
<script type="text/javascript">
      // update modal
        $(document).on('submit', '#editprojects', function(ev) {
            ev.preventDefault(); // Prevent browers default submit.
            var formData = new FormData(this);
            $.ajax({
                url: "<?=base_url()?>Projects/updateprojectlist/",
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
    function complete(p_id) {
        event.preventDefault(); // prevent form submit
        
        var form = event.target.form; // storing the form
        swal({
                title: "Are you sure?",
                text: "Complete your <?php echo $row->p_name; ?> project",
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
          url: "<?=base_url()?>Projects/update/p_id",
          type: "post",
          data: {p_id:p_id},
          success:function(){
            swal('Project Completed 🙂', ' ', 'success');
            $("#delete"+p_id).fadeTo("slow", 0.7, function(){
              $(this).remove();
            })
            setTimeout(function() {
                            location.reload(true);
                        }, 1000);

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
    function pending(p_id) {
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
          url: "<?=base_url()?>Projects/pending/p_id",
          type: "post",
          data: {p_id:p_id},
          success:function(){
            swal('Project Pending 🙂', ' ', 'success');
            $("#delete"+p_id).fadeTo("slow", 0.7, function(){
              $(this).remove();
            })
            setTimeout(function() {
                            location.reload(true);
                        }, 1000);

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
    function cancellbyadmin(p_id) {
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
          url: "<?=base_url()?>Projects/updatedisable/p_id",
          type: "post",
          data: {p_id:p_id},
          success:function(){
            swal('Project Cancelled 🙂', ' ', 'success');
            $("#delete"+p_id).fadeTo("slow", 0.7, function(){
              $(this).remove();
            })
            setTimeout(function() {
                            location.reload(true);
                        }, 1000);

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


 <script type="text/javascript">
    
     function fetchdatas(userid) {
        var userid = userid;
        $.ajax({
            url: "<?php echo  base_url('Projects/userdetailedit'); ?>",
            type: "POST",
            data: {
                userid: userid
            },
            success: function(response) {
                var dataResult = JSON.parse(response);
                $('#pprojectm1').html(dataResult);
               
            }
        })
    }
</script>

</body>


</html>