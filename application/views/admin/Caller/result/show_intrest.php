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
                                <h4 class="mb-sm-0">Intrested Data</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                        <li class="breadcrumb-item active">Intrested Data</li>
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
                                        <h4 class="card-title mb-0 flex-grow-1">Intrested Data</h4>

                                        <div class="flex-shrink-0">     <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-primary btn-label waves-effect right waves-light"><i class="ri-upload-cloud-2-line label-icon align-middle fs-16 ms-2"></i> Upload User Excel</button>
                                                                                                                
                                          
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
                    <div class="col-md-12">
                     <input type="file" class="form-control" id="emailInput" placeholder="Select Your File">
                     </div><br>        
                    <div class="hstack gap-2 justify-content-center">
                         <a href="javascript:void(0);" class="btn btn-danger" data-bs-dismiss="modal"> Close</a>
                      
                        <a href="javascript:void(0);" class="btn btn-primary">Upload</a>
                    </div>
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
                                                                
                                                                <th scope="col">Contact</th>
                                                                <th scope="col">Service</th>
                                                                <th scope="col">Address</th>
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
                                                                 <td>
                                                                   +9112345678
                                                                </td>
                                                                <td>Service One</td>
                                                               
                                                                <td>Zoetic Fashion</td>
                                                               <td>
                                                              Intrested
                                                            </td>
                                                                  <td>
                                                                <form><button type="button" class="btn btn-danger" name="archive" type="submit" onclick="archiveFunction()"><i class="ri-delete-bin-line"  style="color: white;"></i></button></form></td>
                                                                
                                                            </tr><!-- end tr -->
                                                            <tr>
                                                                <td>
                                                                    <a href="apps-ecommerce-order-details.html"
                                                                        class="fw-medium link-primary">#VZ2111</a>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="flex-shrink-0 me-2">
                                                                            <img src="<?=base_url()?>/assets/images/users/avatar-2.jpg"
                                                                                alt=""
                                                                                class="avatar-xs rounded-circle" />
                                                                        </div>
                                                                        <div class="flex-grow-1">Jansh Brown</div>
                                                                    </div>
                                                                </td>
                                                               <td>
                                                                   +9112345678
                                                                </td>
                                                                <td>Service One</td>
                                                               
                                                                <td>Zoetic Fashion</td>
                                                               <td>
                                                              Intrested
                                                            </td>
                                                                  
                                                             <td>
                                                                <form><button type="button" class="btn btn-danger" name="archive" type="submit" onclick="archiveFunction()"><i class="ri-delete-bin-line"  style="color: white;"></i></button></form></td>
                                                                
                                                            </tr><!-- end tr -->
                                                            <tr>
                                                                <td>
                                                                    <a href="apps-ecommerce-order-details.html"
                                                                        class="fw-medium link-primary">#VZ2109</a>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="flex-shrink-0 me-2">
                                                                            <img src="<?=base_url()?>/assets/images/users/avatar-3.jpg"
                                                                                alt=""
                                                                                class="avatar-xs rounded-circle" />
                                                                        </div>
                                                                        <div class="flex-grow-1">Ayaan Bowen</div>
                                                                    </div>
                                                                </td>
                                                               <td>
                                                                   +9112345678
                                                                </td>
                                                                <td>Service One</td>
                                                               
                                                                <td>Zoetic Fashion</td>
                                                               <td>
                                                              Intrested
                                                            </td>
                                                                 
                                                             <td>
                                                                <form><button type="button" class="btn btn-danger" name="archive" type="submit" onclick="archiveFunction()"><i class="ri-delete-bin-line"  style="color: white;"></i></button></form></td>
                                                            </tr><!-- end tr -->
                                                            <tr>
                                                                <td>
                                                                    <a href="apps-ecommerce-order-details.html"
                                                                        class="fw-medium link-primary">#VZ2108</a>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="flex-shrink-0 me-2">
                                                                            <img src="<?=base_url()?>/assets/images/users/avatar-4.jpg"
                                                                                alt=""
                                                                                class="avatar-xs rounded-circle" />
                                                                        </div>
                                                                        <div class="flex-grow-1">Prezy Mark</div>
                                                                    </div>
                                                                </td>
                                                               <td>
                                                                   +9112345678
                                                                </td>
                                                                <td>Service One</td>
                                                               
                                                                <td>Zoetic Fashion</td>
                                                               <td>
                                                              Intrested
                                                            </td>
                                                               
                                                             <td>
                                                                <form><button type="button" class="btn btn-danger" name="archive" type="submit" onclick="archiveFunction()"><i class="ri-delete-bin-line"  style="color: white;"></i></button></form></td>
                                                            </tr><!-- end tr -->
                                                            <tr>
                                                                <td>
                                                                    <a href="apps-ecommerce-order-details.html"
                                                                        class="fw-medium link-primary">#VZ2107</a>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="flex-shrink-0 me-2">
                                                                            <img src="<?=base_url()?>/assets/images/users/avatar-6.jpg"
                                                                                alt=""
                                                                                class="avatar-xs rounded-circle" />
                                                                        </div>
                                                                        <div class="flex-grow-1">Vihan Hudda</div>
                                                                    </div>
                                                                </td>
                                                               <td>
                                                                   +9112345678
                                                                </td>
                                                                <td>Service One</td>
                                                               
                                                                <td>Zoetic Fashion</td>
                                                               <td>
                                                              Intrested
                                                            </td>
                                                                  
                                                             <td>
                                                                <form><button type="button" class="btn btn-danger" name="archive" type="submit" onclick="archiveFunction()"><i class="ri-delete-bin-line"  style="color: white;"></i></button></form></td>
                                                            </tr><!-- end tr -->
                                                        </tbody><!-- end tbody -->
                                                    </table><!-- end table -->
                                                </div>
                                            </div>
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
                <h5 class="modal-title" id="exampleModalgridLabel">Edit Finance Admin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0);">
                    <div class="row g-3">
                        <div class="col-xxl-6">
                            <div>
                                <label for="firstName" class="form-label">Name</label>
                                <input type="text" class="form-control" id="firstName" placeholder="Enter Name">
                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-6">
                            <div>
                                <label for="lastName" class="form-label">Email</label>
                                <input type="email" class="form-control" id="lastName" placeholder="Enter Email">
                            </div>
                        </div><!--end col-->
                       <div class="col-xxl-6">
                            <div>
                                <label for="lastName" class="form-label">Password</label>
                                <input type="password" class="form-control" id="lastName" placeholder="Enter Password">
                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-6">
                            <div>
                                <label for="emailInput" class="form-label">Contact</label>
                                <input type="number" class="form-control" id="emailInput" placeholder="Enter your Contact">
                            </div>
                        </div><!--end col-->
                         <div class="col-xxl-6">
                            <div>
                                
                                <select class="form-control" disabled>
                                    <option value="Finance" >Finance Admin</option>
                                </select>
                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-6">
                            <div>
                                <label for="passwordInput" class="form-label">Address</label>
                                <textarea class="form-control" placeholder="Enter Your Address"></textarea>
                            </div>
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
        <!-- end main content-->

 

              <?php include 'footer.php';?>
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