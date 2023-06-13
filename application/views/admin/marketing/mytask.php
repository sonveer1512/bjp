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
                                    <h4 class="mb-sm-0">Tasks List - <?php echo $this->session->set_userdata('name');?> </h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tasks</a></li>
                                            <li class="breadcrumb-item active">Tasks List</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xxl-3 col-sm-6">
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <p class="fw-medium text-muted mb-0">Total Tasks</p>
                                                <h2 class="mt-4 ff-secondary fw-semibold"><?php echo $total[0]['total']; ?></h2>
                                               
                                            </div>
                                            <div>
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-soft-info text-info rounded-circle fs-4">
                                                        <i class="ri-ticket-2-line"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div> <!-- end card-->
                            </div><!--end col-->
                            <div class="col-xxl-3 col-sm-6">
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <p class="fw-medium text-muted mb-0">Pending Tasks</p>
                                                <h2 class="mt-4 ff-secondary fw-semibold"><?php echo $pendingdata[0]['pending']; ?></span></h2>
                                                
                                            </div>
                                            <div>
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-soft-warning text-warning rounded-circle fs-4">
                                                       <i class="mdi mdi-timer-sand"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div>
                            </div><!--end col-->
                            <div class="col-xxl-3 col-sm-6">
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <p class="fw-medium text-muted mb-0">Completed Tasks</p>
                                                <h2 class="mt-4 ff-secondary fw-semibold"><?php echo $complete[0]['complete']; ?></h2>
                                                
                                            </div>
                                            <div>
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-soft-success text-success rounded-circle fs-4">
                                                        <i class="ri-checkbox-circle-line"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div>
                            </div><!--end col-->
                            <div class="col-xxl-3 col-sm-6">
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <p class="fw-medium text-muted mb-0">Rejected Tasks</p>
                                                <h2 class="mt-4 ff-secondary fw-semibold"><?php echo $reject[0]['reject']; ?></h2>
                                                
                                            </div>
                                            <div>
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-soft-danger text-danger rounded-circle fs-4">
                                                        <i class="ri-delete-bin-line"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card"  id="tasksList">
                                    <div class="card-header border-0">
                                        <div class="d-flex align-items-center">
                                            <h5 class="card-title mb-0 flex-grow-1">All Tasks</h5>
                                           
                                        </div>
                                    </div>
                                    <div class="card-body border border-dashed border-end-0 border-start-0">
                                        <form>
                                            <div class="row g-3">
                                                <div class="col-xxl-5 col-sm-12">
                                                    <div class="search-box">
                                                        <input type="text" class="form-control search bg-light border-light" placeholder="Search for tasks or something...">
                                                        <i class="ri-search-line search-icon"></i>
                                                    </div>
                                                </div><!--end col-->
                                                
                                                <div class="col-xxl-3 col-sm-4">
                                                    <input type="text" class="form-control bg-light border-light" id="demo-datepicker" data-provider="flatpickr" data-date-format="d M, Y" data-range-date="true" placeholder="Select date range">
                                                </div><!--end col-->

                                                <div class="col-xxl-3 col-sm-4">
                                                    <div class="input-light">
                                                        <select class="form-control" data-choices data-choices-search-false name="choices-single-default"  id="idStatus">
                                                            <option value="">Status</option>
                                                            <option value="all" selected>All</option>
                                                            <option value="New">New</option>
                                                            <option value="Pending">Pending</option>
                                                            <option value="Inprogress">Inprogress</option>
                                                            <option value="Completed">Completed</option>
                                                        </select>
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-xxl-1 col-sm-4">
                                                    <button type="button" class="btn btn-primary w-100" onclick="SearchData();"> <i class="ri-equalizer-fill me-1 align-bottom"></i>
                                                        Filters
                                                    </button>
                                                </div><!--end col-->
                                            </div><!--end row-->
                                        </form>
                                    </div><!--end card-body-->
                                    <div class="card-body">
                                        <div class="table-responsive table-card mb-4">
                                            <table class="table align-middle table-nowrap mb-0" id="tasksTable">
                                                <thead class="table-light text-muted">
                                                    <tr>
                                                        
                                                      
                                                        <th class="sort" data-sort="project_name">Name</th>
                                                        <th class="sort" data-sort="tasks_name">Email</th>
                                                        <th class="sort" data-sort="client_name">Contact</th>
                                                        <th class="sort" data-sort="assignedto">Remark</th>
                                                        <th class="sort" data-sort="due_date"> Date</th>
                                                        <th class="sort" data-sort="status">Status</th>
                                                        <th class="sort" data-sort="priority">Priority</th>
                                                    </tr>
                                                </thead>
                                               <tbody>
                                            
                                            <?php 
                                           if(count($content) > 0) {
                                               
                                            
                                            foreach($content as $row) { 
                                              
                                                ?>

                                            <tr id="delete<?php echo $row['work_allot_id'];?>">
                                                
                                                
                                                <td><?php echo $row['marketing_name'];?></td>
                                                <td><?php echo $row['marketer_email'] ?></td>
                                                <td><?php echo $row['marketer_contact'];?></td>
                                                <td><textarea class="form-control"><?php echo $row['work'];?></textarea></td>
                                                <td><?php echo $row['created_at'];?></td>
                                                <td>
                                                                  <input type="hidden" name="work_allot_id" id="work_allot_id<?php echo $row['work_allot_id'];?>"  value="<?php echo $row['work_allot_id'];?>" />
                                <input type="hidden" name="tval" id="tval"  value="" />
                            <select class="form-control" name="accept_status" id="accept_status<?php echo $row['work_allot_id'];?>"  onChange="return get(<?php echo $row['work_allot_id'];?>);">
                                
                                <option <?php if($row['status']=="Pending"){ echo 'selected';} ?>  value="Enable">Pending</option>
                                <option <?php if($row['status']=="Completed"){ echo 'selected';} ?> value="Disable">Completed</option>
                                <option <?php if($row['status']=="Cancelled By Admin"){ echo 'selected';} ?> value="Disable">Cancelled By Admin</option>
                            </select>
                                                            </td>
                                                            
                        <td class="priority"><span class="badge bg-danger text-uppercase"><?php echo $row['task_priority'];?></span></td>
                                            
                                            </tr>
                                           
                                            
                                           
                                            <?php } ?>
                                        </tbody>
                                        <input type="hidden" name="work_allot_id" value="<?php echo $row['work_allot_id']; ?>">
                                    <?php } ?>
                                            </table><!--end table-->
                                            <div class="noresult" style="display: none">
                                                <div class="text-center">
                                                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                                                    <h5 class="mt-2">Sorry! No Result Found</h5>
                                                    <p class="text-muted mb-0">We've searched more than 200k+ tasks We did not find any tasks for you search.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end mt-2">
                                            <div class="pagination-wrap hstack gap-2">
                                                <a class="page-item pagination-prev disabled" href="#">
                                                    Previous
                                                </a>
                                                <ul class="pagination listjs-pagination mb-0"></ul>
                                                <a class="page-item pagination-next" href="#">
                                                    Next
                                                </a>
                                            </div>
                                        </div>
                                    </div><!--end card-body-->
                                </div><!--end card-->
                            </div><!--end col-->
                        </div><!--end row-->

                        <div class="modal fade flip" id="deleteOrder" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body p-5 text-center">
                                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#405189,secondary:#f06548" style="width:90px;height:90px"></lord-icon>
                                        <div class="mt-4 text-center">
                                            <h4>You are about to delete a task ?</h4>
                                            <p class="text-muted fs-14 mb-4">Deleting your task will remove all of
                                                your information from our database.</p>
                                            <div class="hstack gap-2 justify-content-center remove">
                                                <button class="btn btn-link btn-ghost-success fw-medium text-decoration-none" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Close</button>
                                                <button class="btn btn-danger" id="delete-record">Yes, Delete It</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!--end delete modal -->

                        <div class="modal fade zoomIn" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content border-0">
                                    <div class="modal-header p-3 bg-soft-info">
                                        <h5 class="modal-title" id="exampleModalLabel">Create Task</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                                    </div>
                                    <form action="#">
                                        <div class="modal-body">
                                            <input type="hidden" id="tasksId" />
                                            <div class="row g-3">
                                                <div class="col-lg-12">
                                                    <label for="projectName-field" class="form-label">Project Name</label>
                                                    <input type="text" id="projectName-field" class="form-control" placeholder="Project name" required />
                                                </div><!--end col-->
                                                <div class="col-lg-12">
                                                    <div>
                                                        <label for="tasksTitle-field" class="form-label">Title</label>
                                                        <input type="text" id="tasksTitle-field" class="form-control" placeholder="Title" required />
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-lg-12">
                                                    <label for="clientName-field" class="form-label">Client Name</label>
                                                    <input type="text" id="clientName-field" class="form-control" placeholder="Client name" required />
                                                </div><!--end col-->
                                                <div class="col-lg-12">
                                                    <label class="form-label">Assigned To</label>
                                                    <div data-simplebar style="height: 95px;">
                                                        <ul class="list-unstyled vstack gap-2 mb-0">
                                                            <li>
                                                                <div class="form-check d-flex align-items-center">
                                                                    <input class="form-check-input me-3" type="checkbox" name="assignedTo[]" value="avatar-1.jpg" id="anna-adame">
                                                                    <label class="form-check-label d-flex align-items-center" for="anna-adame">
                                                                        <span class="flex-shrink-0">
                                                                            <img src="assets/images/users/avatar-1.jpg" alt="" class="avatar-xxs rounded-circle">
                                                                        </span>
                                                                        <span class="flex-grow-1 ms-2">
                                                                            Anna Adame
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </li> 
                                                            <li>
                                                                <div class="form-check d-flex align-items-center">
                                                                    <input class="form-check-input me-3" type="checkbox" name="assignedTo[]" value="avatar-3.jpg" id="frank-hook">
                                                                    <label class="form-check-label d-flex align-items-center" for="frank-hook">
                                                                        <span class="flex-shrink-0">
                                                                            <img src="assets/images/users/avatar-3.jpg" alt="" class="avatar-xxs rounded-circle">
                                                                        </span>
                                                                        <span class="flex-grow-1 ms-2">
                                                                            Frank Hook
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </li> 
                                                            <li>
                                                                <div class="form-check d-flex align-items-center">
                                                                    <input class="form-check-input me-3" type="checkbox" name="assignedTo[]" value="avatar-6.jpg" id="alexis-clarke">
                                                                    <label class="form-check-label d-flex align-items-center" for="alexis-clarke">
                                                                        <span class="flex-shrink-0">
                                                                            <img src="assets/images/users/avatar-6.jpg" alt="" class="avatar-xxs rounded-circle">
                                                                        </span>
                                                                        <span class="flex-grow-1 ms-2">
                                                                            Alexis Clarke
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </li> 
                                                            <li>
                                                                <div class="form-check d-flex align-items-center">
                                                                    <input class="form-check-input me-3" type="checkbox" name="assignedTo[]" value="avatar-2.jpg" id="herbert-stokes">
                                                                    <label class="form-check-label d-flex align-items-center" for="herbert-stokes">
                                                                        <span class="flex-shrink-0">
                                                                            <img src="assets/images/users/avatar-2.jpg" alt="" class="avatar-xxs rounded-circle">
                                                                        </span>
                                                                        <span class="flex-grow-1 ms-2">
                                                                            Herbert Stokes
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </li> 
                                                            <li>
                                                                <div class="form-check d-flex align-items-center">
                                                                    <input class="form-check-input me-3" type="checkbox" name="assignedTo[]" value="avatar-7.jpg" id="michael-morris">
                                                                    <label class="form-check-label d-flex align-items-center" for="michael-morris">
                                                                        <span class="flex-shrink-0">
                                                                            <img src="assets/images/users/avatar-7.jpg" alt="" class="avatar-xxs rounded-circle">
                                                                        </span>
                                                                        <span class="flex-grow-1 ms-2">
                                                                            Michael Morris
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </li> 
                                                            <li>
                                                                <div class="form-check d-flex align-items-center">
                                                                    <input class="form-check-input me-3" type="checkbox" name="assignedTo[]" value="avatar-5.jpg" id="nancy-martino">
                                                                    <label class="form-check-label d-flex align-items-center" for="nancy-martino">
                                                                        <span class="flex-shrink-0">
                                                                            <img src="assets/images/users/avatar-5.jpg" alt="" class="avatar-xxs rounded-circle">
                                                                        </span>
                                                                        <span class="flex-grow-1 ms-2">
                                                                            Nancy Martino
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </li> 
                                                            <li>
                                                                <div class="form-check d-flex align-items-center">
                                                                    <input class="form-check-input me-3" type="checkbox" name="assignedTo[]" value="avatar-8.jpg" id="thomas-taylor">
                                                                    <label class="form-check-label d-flex align-items-center" for="thomas-taylor">
                                                                        <span class="flex-shrink-0">
                                                                            <img src="assets/images/users/avatar-8.jpg" alt="" class="avatar-xxs rounded-circle">
                                                                        </span>
                                                                        <span class="flex-grow-1 ms-2">
                                                                            Thomas Taylor
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </li> 
                                                            <li>
                                                                <div class="form-check d-flex align-items-center">
                                                                    <input class="form-check-input me-3" type="checkbox" name="assignedTo[]" value="avatar-10.jpg" id="tonya-noble">
                                                                    <label class="form-check-label d-flex align-items-center" for="tonya-noble">
                                                                        <span class="flex-shrink-0">
                                                                            <img src="assets/images/users/avatar-10.jpg" alt="" class="avatar-xxs rounded-circle">
                                                                        </span>
                                                                        <span class="flex-grow-1 ms-2">
                                                                            Tonya Noble
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </li> 
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-lg-6">
                                                    <label for="duedate-field" class="form-label">Due Date</label>
                                                    <input type="text" id="duedate-field" class="form-control" data-provider="flatpickr" placeholder="Due date" required />
                                                </div><!--end col-->
                                                <div class="col-lg-6">
                                                    <label for="ticket-status" class="form-label">Status</label>
                                                    <select class="form-control" data-choices data-choices-search-false id="ticket-status">
                                                        <option value="">Status</option>
                                                        <option value="New">New</option>
                                                        <option value="Inprogress">Inprogress</option>
                                                        <option value="Pending">Pending</option>
                                                        <option value="Completed">Completed</option>
                                                    </select>
                                                </div><!--end col-->
                                                <div class="col-lg-12">
                                                    <label for="priority-field" class="form-label">Priority</label>
                                                    <select class="form-control" data-choices data-choices-search-false id="priority-field">
                                                        <option value="">Priority</option>
                                                        <option value="High">High</option>
                                                        <option value="Medium">Medium</option>
                                                        <option value="Low">Low</option>
                                                    </select>
                                                </div><!--end col-->
                                            </div><!--end row-->
                                        </div>
                                        <div class="modal-footer">
                                            <div class="hstack gap-2 justify-content-end">
                                                <button type="button" class="btn btn-light" id="close-modal" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success" id="add-btn">Add Task</button>
                                                <button type="button" class="btn btn-success" id="edit-btn">Update Task</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div><!--end modal-->
                        
                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

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
    

    <!-- JAVASCRIPT -->
    <script src="<?=base_url()?>/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url()?>/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?=base_url()?>/assets/libs/node-waves/waves.min.js"></script>
    <script src="<?=base_url()?>/assets/libs/feather-icons/feather.min.js"></script>
    <script src="<?=base_url()?>/assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="<?=base_url()?>/assets/js/plugins.js"></script>

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
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="<?=base_url()?>/assets/js/app.js"></script>
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
          url: "<?=base_url()?>Marketing/deletemarketing/admin_user_id",
          type: "post",
          data: {admin_user_id:admin_user_id},
          success:function(){
            swal('Record Deleted 🙂', ' ', 'success');
            $("#delete"+admin_user_id).fadeTo("slow", 0.7, function(){
              $(this).remove();
            })

          },
          error:function(){
            swal('Record Not Deleted', 'error');
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
    $(document).on('submit', '#marketingadmin', function(ev) {
        $('.error').html('');

        ev.preventDefault(); // Prevent browers default submit.
        var formData = new FormData(this);
        var error = false;
        var market_name = $('#market_name').val();
        var market_email = $('#market_email').val();
        var market_password = $('#market_password').val();
        var market_contact = $('#market_contact').val();
        var market_address = $('#market_address').val();
         var market_des = $('#market_des').val();
        

        if (market_name == '') {
            $('#mnameError').html('Enter Your Name');
            $('.error').css('color', 'red');
            error = true;
            // alert("hi");

        }
        if (market_email == '') {
            $('#memailError').html('Enter Your Email');
            $('.error').css('color', 'red');
            error = true;

            // alert("hi");

        }
        if (market_password == '') {
            $('#mpassError').html('Enter Your Password');
            $('.error').css('color', 'red');
            error = true;

            // alert("hi");

        }
        if (market_contact == '') {
            $('#subcontactError').html('Enter Your Mobile Number');
            $('.error').css('color', 'red');
            error = true;

            // alert("hi");

        }
        if (market_address == '') {
            $('#maddressError').html('Enter Your Address');
            $('.error').css('color', 'red');
            error = true;


        }
         if (market_des == '') {
            $('#mdesError').html('Enter Your Designation');
            $('.error').css('color', 'red');
            error = true;


        }
        if (error == false) {
            $.ajax({
                url: "<?= base_url('marketing/addmarketing'); ?>",
                type: 'post',
                data: formData,
                success: function(result) {
                    // json data
                    var dataResult = JSON.parse(result);
                    if (dataResult.done == '1') {
                       swal('Marketing Admin Added 🙂', ' ', 'success');
                      
                       

                    }

                    if (dataResult.done == '0') {
                       swal('Marketing Admin Not Added ☹️', ' ', 'success');
                      
                      

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
  function get(id)
  {
 var accuid = document.getElementById('admin_user_id'+id).value; 
 
  var accept_status = document.getElementById('accept_status'+id).value;
 // alert(accept_status);
  document.getElementById("tval").value=10;
  window.location.href="<?php echo base_url()?>Marketing/update?admin_user_id="+accuid+"&accept_status="+accept_status;


  return true;
  }
</script>
</body>


<!-- Mirrored from themesbrand.com/velzon/html/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 11 Mar 2022 09:52:42 GMT -->
</html>