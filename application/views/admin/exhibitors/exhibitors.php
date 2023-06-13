

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
                        <h4 class="mb-sm-0">Exhibitors</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                <li class="breadcrumb-item active">Exhibitors</li>
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
                            <h4 class="card-title mb-0 flex-grow-1">Exhibitors</h4>

                            <div class="flex-shrink-0">
                               <?php if($this->rbac->hasPrivilege('exhibitors','can_add')) { ?>
                              <button type="button" data-toggle="tooltip" data-placement="bottom" title="Add New Exhibitors Admin" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#exampleModalgrid"><i class="ri-user-add-line"></i></button>
								<?php } ?>
                            </div>
                        </div><!-- end card header -->
                        <div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalgridLabel">Add New Exhibitors</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" id="addExhibitors">
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
                                                <div class="col-md-6">
                                                    <div>
                                                        <label for="firstName" class="form-label">Title</label>
                                                        <select class="form-select form-control">
                                                            <option>Dr.</option>
                                                            <option>Mr.</option>
                                                            <option>Mrs.</option>
                                                            <option>Miss</option>
                                                            <option>Ms</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div>
                                                        <label for="firstName" class="form-label">Organization</label>
                                                        <input type="text" name="admin_exhibitor_organization" id="admin_exhibitor_organization" class="form-control" placeholder="Enter Organization">
                                                    </div>
                                                    <div class="error" id="exorgError"></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div>
                                                        <label for="firstName" class="form-label">Exhibitor Name</label>
                                                        <input type="text" name="ex_name" id="ex_name" class="form-control" placeholder="Enter Exhibitor Name">
                                                    </div>
                                                    <div class="error" id="exnameError"></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div>
                                                        <label for="firstName" class="form-label">Chief Executive</label>
                                                        <input type="text" class="form-control" name="admin_exhibitor_chief_executive" id="admin_exhibitor_chief_executive" placeholder="Enter Chief Executive">
                                                    </div>
                                                    <div class="error" id="exchexError"></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div>
                                                        <label for="firstName" class="form-label">Designation</label>
                                                        <input type="text" class="form-control" name="admin_exhibitors_designation" id="admin_exhibitors_designation" placeholder="Enter Designation">
                                                    </div>
                                                    <div class="error" id="exdesError"></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div>
                                                        <label for="firstName" class="form-label">Contact Executive</label>
                                                        <input type="number" class="form-control" name="admin_exhibit_contact_executive" id="admin_exhibit_contact_executive" placeholder="Enter Contact No Of Executive">
                                                    </div>
                                                    <div class="error" id="excontactexError"></div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-md-6">
                                                    <div>
                                                        <label for="lastName" class="form-label">Email</label>
                                                        <input type="email" class="form-control" name="admin_email" id="admin_email" placeholder="Enter Email">
                                                    </div>
                                                    <div class="error" id="exemailError"></div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-md-6">
                                                    <div>
                                                        <label for="lastName" class="form-label">Password</label>
                                                        <input type="password" class="form-control" name="admin_password" id="admin_password" placeholder="Enter Password">
                                                    </div>
                                                    <div class="error" id="expassError"></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div>
                                                        <label for="emailInput" class="form-label">Admin Type</label>
                                                        <select class="form-control" name="admin_role">
                                                            <option value="Exhibitor">Exhibitor</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div>
                                                        <label for="emailInput" class="form-label">Contact</label>
                                                        <input type="number" name="admin_contact" class="form-control" id="admin_contact" placeholder="Enter your Contact">
                                                    </div>
                                                    <div class="error" id="excontactError"></div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-md-6">
                                                    <div>
                                                        <label for="emailInput" class="form-label">Website</label>
                                                        <input type="url" class="form-control" name="admin_exhibit_website" id="admin_exhibit_website" placeholder="Enter your Website">
                                                    </div>

                                                    <div class="error" id="exwebError"></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div>
                                                        <label for="emailInput" class="form-label">Exhibitors Title</label>
                                                        <input type="text" class="form-control" name="ex_title" id="ex_title" placeholder="Enter your Title">
                                                    </div>

                                                    <div class="error" id="exwebError"></div>
                                                </div>
                                              <div class="col-md-6">
                                                <div>
                                                    <label for="firstName" class="form-label">Select Project</label>
                                                                            <select class="form-select form-control" name="projectlist[]" id="projectlist" multiple>
                                                                                <option value=''>Select Project</option>
                                                                                <?php foreach ($projectlist->result() as $data) {
                                                                                    ?>
                                                                                <option value="<?= $data->p_id ; ?>"><?php echo $data->p_name; ?></option>
                                                                                                        <?php } ?>
                                                                            </select>
                                                </div>
                                                 <div class="error" id="projectError"></div>
                                            </div><!--end col-->

                                                <div class="col-md-6">
                                                    <div>
                                                        <label for="emailInput" class="form-label">Select Logo</label>
                                                        <input type="file" class="form-control" name="ex_image" id="ex_image" placeholder="Select Image">
                                                    </div>

                                                    <div class="error" id="exwebError"></div>
                                                </div>
                                              
                                               

                                                <div class="col-md-3">
                                                    <div>
                                                        <label for="emailInput" class="form-label">Select Service</label>

                                                        <select class="form-select form-control" id="service" name="ex_services[]" onchange="multipleValue(this)" data-choices data-choices-removeItem multiple>
                                                            <option value="">Select Services</option>
                                                            <?php
                                                            foreach ($servicesData->result() as $data) {
                                                            ?>
                                                                <option value="<?= $data->service_id; ?>+<?= $data->serv_price; ?>"><?php echo $data->service_name; ?></option>

                                                            <?php
                                                            } ?>

                                                        </select>



                                                    </div>

                                                    <script>
                                                        function multipleValue(sel) {
                                                            var opts = [],
                                                                opt;
                                                            var len = sel.options.length;
                                                            var total = 0 ;

                                                            for (var i = 0; i < len; i++) {
                                                                opt = sel.options[i];

                                                                if (opt.selected) {
                                                                    opts.push(opt);
                                                                        var nes  = opt.value.split('+');
                                                                         total += Number(nes[1]);
                                                                         console.log(total);
                                                                    $('#showPrice').val(total);
    
                                                                }
                                                            }

                                                                                                                   }
                                                    </script>
                                                    <div class="error" id="exwebError"></div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="emailInput" class="form-label">Your Amount</label>
                                                    <input type="text" class="form-control" id="showPrice" name="totalamount" readonly>
                                                </div>

                                                <div class="col-md-6">
                                                    <div>
                                                        <label for="passwordInput" class="form-label">Address</label>
                                                        <textarea class="form-control" id="admin_address" name="admin_address" placeholder="Enter Your Address"></textarea>
                                                    </div>
                                                    <div class="error" id="exaddressError"></div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-md-6">
                                                    <div>
                                                        <label for="emailInput" class="form-label">Exhibitors Content</label>
                                                        <textarea class="form-control" name="ex_content" id="ex_content" placeholder="Enter your Content"></textarea>
                                                    </div>

                                                    <div class="error" id="exwebError"></div>
                                                </div>
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
                                    <table class="table align-middle table-nowrap mb-0">
                                                    <thead class="table-light">
                                                        <tr>
                                                            
                                                            <th scope="col">ID</th>
                                                             <!-- <th scope="col">Department</th> -->

                                                             <!-- service , payment status -->
                                                            <th scope="col">Organization</th>
                                                            <th scope="col">Exhibitor Name</th>
                                                            <th scope="col">Chief Executive</th>
                                                            <!-- <th scope="col">Purchased Service</th> -->
                                                            <th scope="col">Regional Head</th>
                                                            <th scope="col">Email</th>
                                                            <!-- <th scope="col">Amount</th> -->
                                                            <th scope="col">Payment Status</th>
                                                            <th scope="col">Date</th>
                                                             <!--<th scope="col">Contact</th>-->
                                                             

                                                            <th scope="col" colspan="6" style=" text-align: center;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                            
                                            <?php 

                                            
                                            $i=1;
                                            foreach($exhibitorsData->result() as $row)
                                            // echo "<pre>";
                                            // print_r($row);
                                                                                                                   

                                            { 
                                                	
                                               
                                                ?>
                                            <tr id="delete<?php echo $row->admin_user_id;?>">
                                                <td><a href="#" class="fw-medium"><?php echo $i;?></a></td>
                                                <td><?php echo $row->ex_organization;?></td>
                                                <td><?php echo $row->ex_name;?></td>
                                                <td><?php echo $row->ex_ch_executive;?></td>
                                                <!-- <td><?php echo $row->service_name;?></td> -->
                                               <td><?php $admin_user_id =  $row->user_regional_head;
                                                  $this->db->select('*');
                                                  $this->db->from('master_admin');
                                                  $this->db->where('admin_user_id',$admin_user_id);
                                                  $rows1 = $this->db->get()->row();
                                              		echo isset($rows1->admin_name) ?$rows1->admin_name:'';
                                                   ?>
                                                  
                                              	</td>
                                                <td ><?php echo $row->ex_email;?></td>
                                               <!-- <td><?php echo $row->serv_price;?></td> -->
                                               <td><?php echo $row->payment_status;?></td>
                                               <td><?php echo $row->ex_created_at;?></td>
                                               
                                                <td>
                                                     <?php if($this->rbac->hasPrivilege('exhibitors','can_edit')) { ?>

                                                   <i class="ri-edit-box-line editmodel" data-bs-toggle="modal" data-bs-target="#editexhiadmin" data-id="<?php echo $row->exhibitors_id ; ?>" style="color: blue;"></i>


                                                   
                                                </td>
                                            <?php } ?>
                                                <?php if($this->rbac->hasPrivilege('exhibitors','can_delete')) { ?>
                                                <td>
                                                    <i class="ri-delete-bin-line"  name="archive" class="remove" type="submit" onclick="archiveFunction(<?php echo $row->admin_user_id ?>)" data-toggle="tooltip" data-placement="bottom"  style="color: red;"></i>
                                                   
                  
                                                </td>
                                            <?php } ?>
                                                
                                                <?php if ($row->admin_status=="Enable") {
                                                
                                            ?>

                                          <td>
                                                     <i class="ri-checkbox-circle-line" data-toggle="tooltip" data-placement="bottom" title="Disable Your Account" name="archive" class="remove" type="submit" onclick="disableaccount(<?php echo $row->admin_user_id ?>)" data-toggle="tooltip" data-placement="bottom"  style="color: green;"></i>
                                                   
                  
                                                </td>
                                            <?php } 
                                            else { ?>
                                               <td>
                                                   <i class="ri-alert-line" data-toggle="tooltip" data-placement="bottom" title="Enable Your Account" name="archive" class="remove" type="submit" onclick="enableaccount(<?php echo $row->admin_user_id ?>)" data-toggle="tooltip" data-placement="bottom"  style="color: red;"></i>
                                                   
                  
                                                </td>
                                            <?php } ?>

                                                <?php if($this->rbac->hasPrivilege('exhibitors','can_change_pass')) { ?>
                                                    <td>
                                                    <i class="ri-lock-password-line" style="color: blue;" data-bs-toggle="modal" data-bs-target="#changepassword" data-id="<?php echo $row->admin_user_id; ?>"></i></button>
                                                    
                    
                                                    </td><?php } ?>

                                                    <?php if($this->rbac->hasPrivilege('exhibitors','can_update_payment')) { ?>
                                                    <td>
                                                    <div class="dropdown card-header-dropdown">
                                                        <a class="text-reset dropdown-btn" href="#"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <span class="text-muted" data-toggle="tooltip" data-placement="bottom" title="Payment Status" id="payment_status"><?php echo $row->payment_status; ?><i
                                                                    class="mdi mdi-chevron-down ms-1"></i></span>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                           <a class="dropdown-item" onclick="changePayment(<?php echo $row->admin_user_id; ?>, 'Failed')" href="#">Failed</a>
                                                            <a class="dropdown-item" onclick="changePayment(<?php echo $row->admin_user_id; ?>, 'Completed')" href="#">Completed</a>
                                                           
                                                           <a class="dropdown-item" onclick="changePayment(<?php echo $row->admin_user_id; ?>, 'Pending')" href="#">Pending</a>
                                                           <input type="hidden" name="ex_name" id="ex_name_<?php echo $row->admin_user_id; ?>" value="<?php echo $row->ex_name;?>">
                                                        </div>
                                                    </div>
                                               </td>
                                           <?php } ?>
                                                </tr>
                                           
                                            
                                           
                                            <?php $i++; 
                                        } ?>
                                        </tbody>
                        
                                    </table>
                                    <!-- end tbody -->
                                    <!-- end table -->
                                </div>
                            </div>
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
                        <form method="POST" class="changepassword" id="changepasswordmodel">
                            <div class="row g-3">
                                <div class="col-xxl-6">

                                </div>
                                <!--end col-->
                                <div class="col-xxl-6">


                                    <label class="form-label" for="password-input">Current Password</label>
                                    <div class="position-relative auth-pass-inputgroup mb-3">
                                        <input type="password" class="form-control pe-5" placeholder="Enter Current password" name="cur_password" id="cur_password">
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
        <div class="modal fade" id="editexhiadmin" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalgridLabel">Edit Exhibitors</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" onClick="window.location.reload();" aria-label="Close"></button>
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
<script src="<?= base_url() ?>/assets/js/pages/password-addon.init.js"></script>

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
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

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
                        url: "<?= base_url() ?>Exhibitors/deleteexeadmin/admin_user_id",
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
                    swal('Cancelled', 'User Account is safe 🙂', 'error');
                }

            });
    }
</script>

<script>
    //  add modal
    $(document).on('submit', '#addExhibitors', function(ev) {
        $('.error').html('');

        ev.preventDefault(); // Prevent browers default submit.
        var formData = new FormData(this);
        var error = false;
        var exorg = $('#admin_exhibitor_organization').val();
        var ex_name = $('#ex_name').val();
        var exchex = $('#admin_exhibitor_chief_executive').val();
        var exdes = $('#admin_exhibitors_designation').val();
        var exchexcontact = $('#admin_exhibit_contact_executive').val();
        var exadminemail = $('#admin_email').val();
        var exadmincontact = $('#admin_contact').val();
        var exadminweb = $('#admin_exhibit_website').val();
        var exadminadd = $('#admin_address').val();
        var exadminpass = $('#admin_password').val();
      	var projectlist = $('#projectlist').val();


        if (exorg == '') {
            $('#exorgError').html('Enter Your Organization Name');
            $('.error').css('color', 'red');
            error = true;
            // alert("hi");

        }
        if (ex_name == '') {
            $('#exnameError').html('Enter Exhibitor  Name');
            $('.error').css('color', 'red');
            error = true;
            // alert("hi");

        }
        if (exchex == '') {
            $('#exchexError').html('Enter Your Chief Executive');
            $('.error').css('color', 'red');
            error = true;

            // alert("hi");

        }
        if (exdes == '') {
            $('#exdesError').html('Enter Your Designation');
            $('.error').css('color', 'red');
            error = true;

            // alert("hi");

        }
        if (exchexcontact == '') {
            $('#excontactexError').html('Enter Your Executive Contact');
            $('.error').css('color', 'red');
            error = true;

            // alert("hi");

        }
        if (exadminemail == '') {
            $('#exemailError').html('Enter Your Email');
            $('.error').css('color', 'red');
            error = true;


        }
        if (exadmincontact == '') {
            $('#excontactError').html('Enter Your Contact');
            $('.error').css('color', 'red');
            error = true;


        }
        if (exadminweb == '') {
            $('#exwebError').html('Enter Your Website URL');
            $('.error').css('color', 'red');
            error = true;


        }
        if (exadminpass == '') {
            $('#expassError').html('Enter Your Password');
            $('.error').css('color', 'red');
            error = true;


        }
        if (exadminadd == '') {
            $('#exaddressError').html('Enter Your Address');
            $('.error').css('color', 'red');
            error = true;


        }
        if (error == false) {
            $.ajax({
                url: "<?= base_url('Exhibitors/addexhibitors'); ?>",
                type: 'post',
                data: formData,
                success: function(result) {
                    // json data
                    var dataResult = JSON.parse(result);
                    if (dataResult.done == '1') {
                        swal('Exhibitor Added 🙂', ' ', 'success');
                        setTimeout(function() {
                            location.reload(true);
                        }, 1000);
                    }

                    if (dataResult.done == '0') {
                        swal('Exhibitor Not Added ☹️', ' ', 'error');

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
    // update modal
    $(document).on('submit', '#changepasswordmodel', function(ev) {
        ev.preventDefault(); // Prevent browers default submit.
        var formData = new FormData(this);


        $('.error').html('');
        var current = $('#cur_password').val();
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
        if(error ==  false ){
            $.ajax({
                url: "<?= base_url() ?>Exhibitors/updateexhadminpass/",
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
        $('.editmodel').click(function() {

            var userid = $(this).data('id');

            $.ajax({
                url: "<?= base_url('Exhibitors/exhibitorsedit'); ?>",
                type: "post",
                data: {
                    id: userid
                },
                success: function(response) {

                    $('.modal-body').html(response);
                    $('.exhibitdata').modal('show');


                }
            })


        });
    });
</script>
<script type="text/javascript">
    // update modal
    $(document).on('submit', '#exhibitModelEdit', function(ev) {
        ev.preventDefault(); // Prevent browers default submit.
        var formData = new FormData(this);
        $.ajax({
            url: "<?= base_url() ?>Exhibitors/updateexhibit/",
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
                text: "Enable Subadmin Account <?php echo $row->admin_email; ?>",
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
                        url: "<?= base_url() ?>Exhibitors/update/admin_user_id",
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
                text: "Disable Subadmin Account <?php echo $row->admin_email; ?>",
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
                        url: "<?= base_url() ?>Exhibitors/updatedisable/admin_user_id",
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
    function changePayment(admin_user_id, paymentstatus) {
        event.preventDefault(); // prevent form submit

        var ex_name = $("#ex_name_"+admin_user_id).val();

        var form = event.target.form; // storing the form
        swal({
                title: "Are you sure?",
                text: "Update Payment Status is "+paymentstatus,
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, "+paymentstatus+" Please",
                cancelButtonText: "No, cancel Please!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: "<?= base_url() ?>Exhibitors/paymentcomplete/admin_user_id",
                        type: "post",
                        data: {
                            admin_user_id: admin_user_id,
                            paymentstatus: paymentstatus,
                            ex_name: ex_name

                        },
                        success: function() {
                            swal('Payment '+paymentstatus+' 🙂', ' ', 'success');
                            $("#delete" + admin_user_id).fadeTo("slow", 0.7, function() {
                                $(this).remove();
                            })
                            setTimeout(function() {
                                location.reload(true);
                            }, 1000);

                        },
                        error: function() {
                            swal('Payment Still Pending ☹️', 'error');
                        }
                    });
                } else {
                    swal("Cancelled", "Payment is pending", "error");
                }

            });
    }
  
  if(str == 'Pending')
    {
      
     	
       var id= $("#hidden_id").val(rowid);
      $("#status").val(str);
     
     
     	$("#pendingpay").modal('show');
      $(document).on('submit', '#resremark', function(ev) {
            ev.preventDefault(); // Prevent browers default submit.
            var formData = new FormData(this);
            $.ajax({
                url: "<?=base_url()?>CallerAdmin/addrespond/",
                type: 'post',
                data: formData,
                success: function(result) {
                    //json data

                      var dataResult = JSON.parse(result);
                    if (dataResult.inserted == '1') {
                       swal('Record Inserted 🙂', ' ', 'success');
                      
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
    }
</script>
</body>


<!-- Mirrored from themesbrand.com/velzon/html/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 11 Mar 2022 09:52:42 GMT -->

</html>