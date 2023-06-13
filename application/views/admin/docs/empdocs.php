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
                                <h4 class="mb-sm-0">Employee Documents</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                        <li class="breadcrumb-item active">Employee Documents</li>
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
                                        <h4 class="card-title mb-0 flex-grow-1">Employee Documents</h4>

                                        <div class="flex-shrink-0">     <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#exampleModalgrid">Add New Documents</button>                                       
                                          
                                        </div>
                                    </div><!-- end card header -->
                                    <div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Add New Document</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0);">
                    <div class="row g-3">
                         <div class="col-xxl-6">
                            <div>
                                <label for="firstName" class="form-label">Select Employee</label>
                                <select name="" class="form-control" class="form-select">
                                    <option value="1">Employee Name One</option>
                                     <option value="2">Employee Name Two</option>
                                      <option value="3">Employee Name Three</option>
                                       <option value="4">Employee Name Four</option>
                                </select>
                                
                            </div>
                        </div>
                        <div class="col-xxl-6">
                            <div>
                                <label for="firstName" class="form-label">Documents Name</label>
                                <input type="text" class="form-control" id="firstName" placeholder="Enter Name">
                            </div>
                        </div><!--end col-->
                         <div class="col-xxl-6">
                            <div>
                                <label for="firstName" class="form-label">Select Documents</label>
                                <input type="file" class="form-control" id="emailInput" placeholder="Select Your File">
                            </div>
                        </div>
                      
                     
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
                                                <table
                                                        class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                                        <thead class="text-muted table-light">
                                                            <tr>
                                                                <th scope="col">Emp ID</th>
                                                             <!-- <th scope="col">Department</th> -->
                                                            <th scope="col">Emp Name</th>
                                                            <th scope="col">Document Name</th>
                                                            <th scope="col">Document</th>
                                                           
                                                            <th scope="col">Status</th>
                                                            <th scope="col" colspan="2" style=" text-align: center;">Action</th>
                                                               
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <a href="apps-ecommerce-order-details.html"
                                                                        class="fw-medium link-primary">#VZ2112</a>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="flex-shrink-0 me-2">
                                                                            <img src="<?=base_url()?>/assets/images/users/avatar-1.jpg"
                                                                                alt=""
                                                                                class="avatar-xs rounded-circle" />
                                                                        </div>
                                                                        <div class="flex-grow-1">Alex Smith</div>
                                                                    </div>
                                                                </td>
                                                                <td>Docs One</td>
                                                                <td>
                                                                    <span class="text-success"> <img src="test.jfif" class="img-fluid" style="width:100px; height:auto;"></span>
                                                                </td>
                                                               
                                                              <td>
                                                               <select class="form-select" class="form-control" aria-label="Default select example">
  <option selected>Enable</option>
 
  <option value="1">Disable</option>
  
</select>
                                                            </td>
                                                                  <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editsubadmin"><i class="ri-edit-box-line"  style="color: white;"></i></button></td>
                                                             <td>
                                                                <form><button type="button" class="btn btn-danger" name="archive" type="submit" onclick="archiveFunction()"><i class="ri-delete-bin-line"  style="color: white;"></i></button></form></td>
                                                                
                                                            </tr><!-- end tr -->
                                                            <tr>
                                                                <td>
                                                                    <a href="apps-ecommerce-order-details.html"
                                                                        class="fw-medium link-primary">#VZ2112</a>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="flex-shrink-0 me-2">
                                                                            <img src="<?=base_url()?>/assets/images/users/avatar-1.jpg"
                                                                                alt=""
                                                                                class="avatar-xs rounded-circle" />
                                                                        </div>
                                                                        <div class="flex-grow-1">Alex Smith</div>
                                                                    </div>
                                                                </td>
                                                                <td>Docs One</td>
                                                                <td>
                                                                    <span class="text-success"> <img src="test.jfif" class="img-fluid" style="width:100px; height:auto;"></span>
                                                                </td>
                                                               
                                                              <td>
                                                               <select class="form-select" class="form-control" aria-label="Default select example">
  <option selected>Enable</option>
 
  <option value="1">Disable</option>
  
</select>
                                                            </td>
                                                                  <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editsubadmin"><i class="ri-edit-box-line"  style="color: white;"></i></button></td>
                                                             <td>
                                                                <form><button type="button" class="btn btn-danger" name="archive" type="submit" onclick="archiveFunction()"><i class="ri-delete-bin-line"  style="color: white;"></i></button></form></td>
                                                                
                                                            </tr><!-- end tr -->
                                                            <tr>
                                                                <td>
                                                                    <a href="apps-ecommerce-order-details.html"
                                                                        class="fw-medium link-primary">#VZ2112</a>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="flex-shrink-0 me-2">
                                                                            <img src="<?=base_url()?>/assets/images/users/avatar-1.jpg"
                                                                                alt=""
                                                                                class="avatar-xs rounded-circle" />
                                                                        </div>
                                                                        <div class="flex-grow-1">Alex Smith</div>
                                                                    </div>
                                                                </td>
                                                                <td>Docs One</td>
                                                                <td>
                                                                    <span class="text-success"> <img src="test.jfif" class="img-fluid" style="width:100px; height:auto;"></span>
                                                                </td>
                                                               
                                                              <td>
                                                               <select class="form-select" class="form-control" aria-label="Default select example">
  <option selected>Enable</option>
 
  <option value="1">Disable</option>
  
</select>
                                                            </td>
                                                                  <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editsubadmin"><i class="ri-edit-box-line"  style="color: white;"></i></button></td>
                                                             <td>
                                                                <form><button type="button" class="btn btn-danger" name="archive" type="submit" onclick="archiveFunction()"><i class="ri-delete-bin-line"  style="color: white;"></i></button></form></td>
                                                                
                                                            </tr><!-- end tr -->
                                                            <tr>
                                                                <td>
                                                                    <a href="apps-ecommerce-order-details.html"
                                                                        class="fw-medium link-primary">#VZ2112</a>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="flex-shrink-0 me-2">
                                                                            <img src="<?=base_url()?>/assets/images/users/avatar-1.jpg"
                                                                                alt=""
                                                                                class="avatar-xs rounded-circle" />
                                                                        </div>
                                                                        <div class="flex-grow-1">Alex Smith</div>
                                                                    </div>
                                                                </td>
                                                                <td>Docs One</td>
                                                                <td>
                                                                    <span class="text-success"> <img src="test.jfif" class="img-fluid" style="width:100px; height:auto;"></span>
                                                                </td>
                                                               
                                                              <td>
                                                               <select class="form-select" class="form-control" aria-label="Default select example">
  <option selected>Enable</option>
 
  <option value="1">Disable</option>
  
</select>
                                                            </td>
                                                                  <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editsubadmin"><i class="ri-edit-box-line"  style="color: white;"></i></button></td>
                                                             <td>
                                                                <form><button type="button" class="btn btn-danger" name="archive" type="submit" onclick="archiveFunction()"><i class="ri-delete-bin-line"  style="color: white;"></i></button></form></td>
                                                                
                                                            </tr><!-- end tr -->
                                                            <tr>
                                                                <td>
                                                                    <a href="apps-ecommerce-order-details.html"
                                                                        class="fw-medium link-primary">#VZ2112</a>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="flex-shrink-0 me-2">
                                                                            <img src="<?=base_url()?>/assets/images/users/avatar-1.jpg"
                                                                                alt=""
                                                                                class="avatar-xs rounded-circle" />
                                                                        </div>
                                                                        <div class="flex-grow-1">Alex Smith</div>
                                                                    </div>
                                                                </td>
                                                                <td>Docs One</td>
                                                                <td>
                                                                    <span class="text-success"> <img src="test.jfif" class="img-fluid" style="width:100px; height:auto;"></span>
                                                                </td>
                                                               
                                                              <td>
                                                               <select class="form-select" class="form-control" aria-label="Default select example">
  <option selected>Enable</option>
 
  <option value="1">Disable</option>
  
</select>
                                                            </td>
                                                                  <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editsubadmin"><i class="ri-edit-box-line"  style="color: white;"></i></button></td>
                                                             <td>
                                                                <form><button type="button" class="btn btn-danger" name="archive" type="submit" onclick="archiveFunction()"><i class="ri-delete-bin-line"  style="color: white;"></i></button></form></td>
                                                                
                                                            </tr><!-- end tr -->
                                                        </tbody><!-- end tbody -->
                                                    </table><!-- end table -->
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
            <div class="modal fade" id="editsubadmin" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editsubadmin">Add New Document</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0);">
                    <div class="row g-3">
                         <div class="col-xxl-6">
                            <div>
                                <label for="firstName" class="form-label">Select Employee</label>
                                <select name="" class="form-control" class="form-select" disabled>
                                    <option value="1">Employee Name One</option>
                                     <option value="2">Employee Name Two</option>
                                      <option value="3">Employee Name Three</option>
                                       <option value="4">Employee Name Four</option>
                                </select>
                                
                            </div>
                        </div>
                        <div class="col-xxl-6">
                            <div>
                                <label for="firstName" class="form-label">Documents Name</label>
                                <input type="text" class="form-control" id="firstName" placeholder="Enter Name">
                            </div>
                        </div><!--end col-->
                         <div class="col-xxl-6">
                            <div>
                                <label for="firstName" class="form-label">Select Documents</label>
                                <input type="file" class="form-control" id="emailInput" placeholder="Select Your File">
                            </div>
                        </div>
                          <div class="col-xxl-6">
                            <div>
                                <label for="firstName" class="form-label">Your Documents</label>
                                <img src="test.jfif" style="width:100%;">
                            </div>
                        </div>
                     
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

        <!-- end main content-->

 

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
    function archiveFunction() {
event.preventDefault(); // prevent form submit
var form = event.target.form; // storing the form
        swal({
  title: "Are you sure?",
  text: "But you will still be able to retrieve this file.",
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
    swal("Deleted", "Your Record is deleted :)", "success");     
  } else {
    swal("Cancelled", "Oops!!! Try Again :)", "error");
  }
});
}
    </script>
</body>


<!-- Mirrored from themesbrand.com/velzon/html/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 11 Mar 2022 09:52:42 GMT -->
</html>