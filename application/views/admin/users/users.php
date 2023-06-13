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
                                <h4 class="mb-sm-0">Customer</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                        <li class="breadcrumb-item active">Customer</li>
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
                                        <h4 class="card-title mb-0 flex-grow-1">Login Customer</h4>

                                        <div class="flex-shrink-0"> 
                                         <button type="button" data-toggle="tooltip" data-placement="bottom" title="View Customer Documents" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#viewcusdocs"><i class="ri-menu-add-line"></i></button>                                                                          
                                        <button type="button" data-toggle="tooltip" data-placement="bottom" title="Add New Customer" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#exampleModalgrid"><i class="ri-user-add-line"></i></button>                                                                          
                                        <button type="button" data-toggle="tooltip" data-placement="bottom" title="Upload Customer Data" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#customerupload"><i class="ri-upload-cloud-2-line"></i></button>                                                                            
                                        </div>
                                        
                                    </div><!-- end card header -->
                                    
                                   <div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Add New Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
                                        <div id="success">
                                            <div id="error">
                                            </div>

                                        </div>
                                        <form method="POST" id="addCustomer">
                                            <div class="row g-3">
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="firstName" class="form-label">Name</label>
                                                        <input type="text" class="form-control" name="cus_name" id="cus_name" placeholder="Enter Name">
                                                    </div>
                                                    <div class="error" id="cusnameError"></div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="lastName" class="form-label">Email</label>
                                                        <input type="email" class="form-control" name="cus_email" id="cus_email" placeholder="Enter Email">
                                                    </div>
                                                    <div class="error" id="cusemailError"></div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="lastName" class="form-label">Password</label>
                                                        <input type="password" class="form-control" name="cus_password" id="cus_password" placeholder="Enter Password">
                                                    </div>
                                                    <div class="error" id="cuspassError"></div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="emailInput" class="form-label">Contact</label>
                                                        <input type="number" class="form-control" name="cus_contact" id="cus_contact" placeholder="Enter your Contact">
                                                    </div>
                                                    <div class="error" id="cuscontactError"></div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-xxl-6">
                                                    <div>
                                                          <label for="emailInput" class="form-label">Admin Type</label>
                                                        <select class="form-control" name="cus_select">
                                                            <option value="Customer">Customer</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="passwordInput" class="form-label">Address</label>
                                                        <textarea class="form-control" name="cus_address" id="cus_address" placeholder="Enter Your Address"></textarea>
                                                    </div>
                                                    <div class="error" id="cusaddressError"></div>
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
                                  
                                  
                                  <div class="modal fade" id="customerupload" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Upload Customer Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
                                        <div id="success">
                                            <div id="error">
                                            </div>

                                        </div>
                                        <form method="POST" id="upload_cus_data">
                                            <div class="row g-3">
                                               <?php if($role == 'Master') {?>
                                                <div class="col-xxl-6">

                                                    <div>
                                                        <label for="firstName" class="form-label">Select Customer</label>
                                                        <select class="form-select form-control" name="cus_up_nme" id="cus_up_nme">
                                                            <option value=''>Select Customer</option>
                                                            <?php foreach ($customerlist->result() as $data) {
                                                                ?>
                                                            <option value="<?= $data->admin_user_id; ?>"><?php echo $data->admin_name; ?></option>
                                                                                    <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="error" id="cus_name_err"></div>
                                                </div><!--end col-->
                                            <?php } ?>
                                                <!--end col-->
                                               <div class="col-xxl-6">
                                                    <div>
                                                        <label for="lastName" class="form-label">Documents Name</label>
                                                        <input type="text" class="form-control" name="cus_up_data_name" id="cus_up_data_name" placeholder="Document Name">
                                                    </div>
                                                    <div class="error" id="cus_data_name_err"></div>
                                                </div>
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="lastName" class="form-label">Upload Documents</label>
                                                        <input type="file" class="form-control" name="cus_up_data" id="cus_up_data" placeholder="Upload Data">
                                                    </div>
                                                    <div class="error" id="cus_data_err"></div>
                                                </div>
                                              
                                                <!--end col-->
                                                
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
                                  
                                   <div class="modal fade" id="viewcusdocs" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-body text-center p-5">
              	
                
                <div class="mt-4">
                    <h4 class="mb-3">Customer Documents</h4>
                 
                    <form  method="POST" action="<?php base_url()?>followleaddata" enctype="multipart/form-data">
                       <br><br>
                    	<table class="table table-borderless table-centered align-middle table-nowrap mb-0" id="example" class="display">
                                                        <thead class="text-muted table-light">
                                                            <tr>
                                                                <th scope="col">ID</th>
                                                                <th scope="col">Customer Name</th>
                                                                
                                                                <th scope="col">Documents Name</th>
                                                                <th scope="col">Document</th>
                                                               
                                                               
                                                              	  
                                                               
                                                               
                                                            </tr>
                                                        </thead>
                                                     	<tbody>
                                            
                                            <?php 
                                            
                                            foreach($customerdocs->result() as $row)

                                            { 
                                                
                                               
                                                ?>
                                            <tr id="delete<?php echo $row->customer_id  ;?>">
                                                
                                                <td><a href="#" class="fw-medium"><?php echo $row->customer_id ;?></a></td> 
                                                <td><?php $customer_id =  $row->customer_id;
                                                   $this->db->select('*');
                                                  $this->db->from('master_admin');
                                                  $this->db->where('admin_user_id',$customer_id);
                                                  $rows1 = $this->db->get()->row();
                                                  if ($rows1 > '0') {
                                                       echo $rows1->admin_name;
                                                  }
                                                  
                                                  ?></td>
                                                <td><?php echo $row->cu_docs_name;?></td>
                                                <td><a href = "<?php base_url()?>webupload/customerdata<?php  echo $row->customer_docs; ?>" target="_blank"><img src ="<?php base_url()?>webupload/customerdata<?php  echo $row->customer_docs; ?>" style = "width:50px;" download></a>
                                                  
                                                  </td>
                                              
                                              </tr>
                                           
                                            
                                           
                                            <?php } ?>
                                        </tbody>
                                                        
                          							
                                                    </table>
                      <br>
                    <div class="hstack gap-2 justify-content-center">
                         <a href="#" class="btn btn-danger" data-bs-dismiss="modal"> Close</a>
                      
                        
                    </div>
                     </form>     

                </div>
            </div>
        </div>
    </div>
</div>

                                     <div class="card-body">
                                                <div class="table-responsive table-card">
                                                    <table
                                                        class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                                        <thead class="text-muted table-light">
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
                                            foreach($subadminData->result() as $row)

                                            { 
                                                
                                               
                                                ?>
                                            <tr id="delete<?php echo $row->admin_user_id;?>">
                                                
                                                <td><a href="#" class="fw-medium"><?php echo $i;?></a></td>
                                                <td><?php echo $row->admin_name;?></td>
                                                <td><?php echo $row->admin_email;?></td>
                                                <td><?php echo $row->admin_contact;?></td>
                                                <td><?php echo $row->created_at;?></td>
                                                
                                                
                                            
                                                 <?php if($this->rbac->hasPrivilege('customer','can_edit')) { ?>
                                                <td>

                                                    <i class="ri-edit-box-line editmodel" style="color: blue;" class="" data-bs-toggle="modal" data-bs-target="#editsubadmin" data-id="<?php echo $row->admin_user_id; ?>"></i>
                                                   
                                                </td>
                                            <?php } ?>

                                            <?php if($this->rbac->hasPrivilege('customer','can_delete')) { ?>
                                                <td>
                                                    <i class="ri-delete-bin-line" name="archive" class="remove" type="submit" onclick="archiveFunction(<?php echo $row->admin_user_id;?>)" data-toggle="tooltip" data-placement="bottom"  style="color: red;"></i>
                                                   
                  
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

                                           
                                              
                                            </tr>
                                           
                                            
                                           
                                            <?php $i++; } ?>
                                        </tbody>
                                    </table>
                                    <input type="hidden" name="admin_user_id" value="<?php echo $row->admin_user_id; ?>"><!-- end tbody -->
                                                    </table><!-- end table -->
                                                </div>
                                            </div>
                                </div><!-- end card -->
                            </div><!-- end col -->
                        </div><!-- end row -->

                       

<div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">User Uploaded Data</h4>

                                        <div class="flex-shrink-0">
                                        
                                         <button type="button" data-toggle="tooltip" data-placement="bottom" title="Upload Data" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="ri-upload-cloud-2-line"></i></button>
                                        <button type="button" data-toggle="tooltip" data-placement="bottom" title="Add Single User" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#exampleModalgrid"><i class="ri-user-add-line"></i></button>                                                                          
                                          
                                        </div>
                                        
                                    </div><!-- end card header -->
                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center p-5">
               <lord-icon
    src="https://cdn.lordicon.com/qduilmpq.json"
    trigger="loop"
    style="width:100px;height:100px">
</lord-icon>
                
                <div class="mt-4">
                    <h4 class="mb-3">Upload Your Excel Here</h4>
                  <a href = "<?php base_url();?>Sample/SampleData .xlsx" download>  <button type="button" data-toggle="tooltip" data-placement="bottom" title="Upload Sample Data" class="btn btn-primary waves-effect waves-light" ><i class="ri-download-cloud-2-line"></i></button></a><br><br>
                    <form  method="POST" action="<?php base_url()?>Users/uploaddata" enctype="multipart/form-data">
                    <div class="col-md-12">
                     <input type="file" class="form-control" id="uploadFile" name="uploadFile" placeholder="Select Your File" required accept=".xls, .xlsx">
                     </div><br>   
                    <div class="hstack gap-2 justify-content-center">
                         <a href="#" class="btn btn-danger" data-bs-dismiss="modal"> Close</a>
                      
                         <input type="submit" name="fileuploadsubmit" class="btn btn-primary" value="Upload">
                    </div>
                     </form>     

                </div>
            </div>
        </div>
    </div>
</div>
                                    <div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Add New User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
            </div>
        </div>
    </div>
</div>
                                  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
           
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
      
} );
  
  
  
  
  
</script>
     

                                     <div class="card-body">
                                                <div class="table-responsive table-card">
                                                    <table
                                                        class="table table-borderless table-centered align-middle table-nowrap mb-0" id="example" class="display">
                                                        <thead class="text-muted table-light">
                                                            <tr>
                                                                <th scope="col">User ID</th>
                                                                <th scope="col">Name</th>
                                                                <th scope="col">Email</th>
                                                                <th scope="col">Contact</th>
                                                                <th scope="col">Address</th>
                                                               
                                                                 <th scope="col" colspan="3" style=" text-align: center;">Action</th>
                                                               
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                            
                                            <?php 
                                            
                                            foreach($useruploaddata->result() as $row)

                                            { 
                                                
                                               
                                                ?>
                                            <tr id="delete<?php echo $row->user_upload_id ;?>">
                                                
                                                <td><a href="#" class="fw-medium"><?php echo $row->user_upload_id ;?></a></td>
                                                <td><?php echo $row->user_upload_name;?></td>
                                                <td><?php echo $row->user_upload_email;?></td>
                                                <td><?php echo $row->user_upload_contact;?></td>
                                               <td><?php echo $row->user_upload_address;?></td>
                                                <td><?php echo $row->user_upload_created_at;?></td>
                                                
                                                
                                            
                                                 <?php if($this->rbac->hasPrivilege('customer','can_edit')) { ?>
                                                <td>

                                                    <i class="ri-edit-box-line editmodel" style="color: blue;" class="" data-bs-toggle="modal" data-bs-target="#editsubadmin" data-id="<?php echo $row->user_upload_id; ?>"></i>
                                                   
                                                </td>
                                            <?php } ?>

                                            <?php if($this->rbac->hasPrivilege('customer','can_delete')) { ?>
                                                <td>
                                                    <i class="ri-delete-bin-line" name="archive" class="remove" type="submit" onclick="archiveFunction(<?php echo $row->user_upload_id ?>)" data-toggle="tooltip" data-placement="bottom"  style="color: red;"></i>
                                                   
                  
                                                </td>
                                            <?php } ?>

                                            

                                           
                                            </tr>
                                           
                                            
                                           
                                            <?php } ?>
                                        </tbody>                                                         
                                                    </table><!-- end table -->
                                                </div>
                                            </div>
                                </div><!-- end card -->
                            </div><!-- end col -->
                        </div>

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
             <div class="modal fade" id="editsubadmin" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Edit Customer Admin</h5>
                <button type="button" class="btn-close" onClick="window.location.reload();" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
            </div>
        </div>
    </div>
</div>
<input type="hidden" name="user_upload_id" value="<?php echo $row->user_upload_id; ?>">
        <!-- end main content-->

 

            <?php $this->load->view('admin/footer.php'); ?>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="<?= base_url() ?>/assets/js/pages/password-addon.init.js"></script>
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
                text: "Delete Customer Record",
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
          url: "<?=base_url()?>Users/deletecusadmin/admin_user_id",
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
    $(document).on('submit', '#addCustomer', function(ev) {
        $('.error').html('');

        ev.preventDefault(); // Prevent browers default submit.
        var formData = new FormData(this);
        var error = false;
        var cusname = $('#cus_name').val();
        var cusemail = $('#cus_email').val();
        var cuspassword = $('#cus_password').val();
        var cuscontact = $('#cus_contact').val();
        var cusaddress = $('#cus_address').val();
        

        if (cusname == '') {
            $('#cusnameError').html('Enter Your Name');
            $('.error').css('color', 'red');
            error = true;
            // alert("hi");

        }
        if (cusemail == '') {
            $('#cusemailError').html('Enter Your Email');
            $('.error').css('color', 'red');
            error = true;

            // alert("hi");

        }
        if (cuspassword == '') {
            $('#cuspassError').html('Enter Your Password');
            $('.error').css('color', 'red');
            error = true;

            // alert("hi");

        }
        if (cuscontact == '') {
            $('#cuscontactError').html('Enter Your Mobile Number');
            $('.error').css('color', 'red');
            error = true;

            // alert("hi");

        }
        if (cusaddress == '') {
            $('#cusaddressError').html('Enter Your Address');
            $('.error').css('color', 'red');
            error = true;


        }
        if (error == false) {
            $.ajax({
                url: "<?= base_url('Users/addcustomer'); ?>",
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

<script>
    //  add modal
    $(document).on('submit', '#upload_cus_data', function(ev) {
        $('.error').html('');

        ev.preventDefault(); // Prevent browers default submit.
        var formData = new FormData(this);
        var error = false;
        var cusupname = $('#cus_up_nme').val();
       var cusupdocsname = $('#cus_up_data_name').val();
        var cusupdata = $('#cus_up_data').val();
        
        

        if (cusupname == '') {
            $('#cus_name_err').html('Select Customer Name');
            $('.error').css('color', 'red');
            error = true;
            // alert("hi");

        }
        if (cusupdata == '') {
            $('#cus_data_err').html('Select Your Data');
            $('.error').css('color', 'red');
            error = true;


        }
       if (cusupdocsname == '') {
            $('#cus_data-name_err').html('Enter Document Name');
            $('.error').css('color', 'red');
            error = true;

        }
      
        if (error == false) {
            $.ajax({
                url: "<?= base_url('Users/useruploaddata'); ?>",
                type: 'post',
                data: formData,
                success: function(result) {
                    // json data
                    var dataResult = JSON.parse(result);
                    if (dataResult.done == '1') {
                       swal('Data Uploaded 🙂', ' ', 'success');
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
      // update modal
        $(document).on('submit', '#changepasswordmodel', function(ev) {
            ev.preventDefault(); // Prevent browers default submit.
            var formData = new FormData(this);
            $.ajax({
                url: "<?=base_url()?>Users/updatecusadmin/",
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
        })
</script>

<script type="text/javascript">

     $(document).ready(function() {
            $('.editmodel').click(function() {
               
                var userid = $(this).data('id');
                
                $.ajax({
                    url: "<?= base_url('Users/customeredit'); ?>",
                    type: "post",
                    data: {
                        id: userid
                    },
                    success: function(response) {
                        
                        $('.modal-body').html(response);
                        $('.editcus').modal('show');

                    }
                })


            });
        });
</script>
<script type="text/javascript">
      // update modal
        $(document).on('submit', '#EditCustomer', function(ev) {
            ev.preventDefault(); // Prevent browers default submit.
            var formData = new FormData(this);
            $.ajax({
                url: "<?=base_url()?>Users/updatecustomer/",
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
                text: "Enable Regional Head Account <?php echo $row->admin_email; ?>",
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
          url: "<?=base_url()?>Subadmin/update/admin_user_id",
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
                text: "Disable Customer Account",
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
          url: "<?=base_url()?>Subadmin/updatedisable/admin_user_id",
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
                url: "<?=base_url()?>Subadmin/changesubpass",
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