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
                                        <h4 class="card-title mb-0 flex-grow-1">Payments</h4>
                                        <div class="col-md-2">
                                        <div class="flex-shrink-0">     
                                            <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#exampleModalgrid">Today Payments</button>                                       
                                          
                                        </div>
                                        </div>
                                       
                                        <div class="col-md-2">

                                        <input type="date" name="" class="form-control">
                                        </div>
                                         <div class="col-md-2">

                                        <input type="date" name="" class="form-control">
                                        </div>
                                       
                                       
                                          <div class="col-md-2">
                                        
                                            <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#exampleModalgrid">Filter BY Date</button>                                       
                                          
                                       
                                        </div>

                                    </div><!-- end card header -->
                                   
                                    <div class="card-body">
                                       
                                        
                                        <div class="live-preview">
                                            <div class="table-responsive table-card">
                                                <table class="table align-middle table-nowrap mb-0">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th scope="col" style="width: 46px;">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="cardtableCheck">
                                                                    <label class="form-check-label" for="cardtableCheck"></label>
                                                                </div>
                                                            </th>
                                                            <th scope="col">ID</th>
                                                             <!-- <th scope="col">Department</th> -->
                                                            <th scope="col">Customer Name</th>
                                                            <th scope="col">Custoer Email</th>
                                                            <th scope="col">Customer Contact</th>
                                                            <th scope="col">Pay Mode</th>
                                                            <th scope="col">Transaction ID</th>
                                                            <th scope="col">Date</th>
                                                            <th scope="col">Status</th>
                                                        </tr>
                                                    </thead>
                                                   <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="cardtableCheck01">
                                                                    <label class="form-check-label" for="cardtableCheck01"></label>
                                                                </div>
                                                            </td>
                                                            <td><a href="#" class="fw-medium">#VL2110</a></td>
                                                             <!--  <td>CS / IT</td> -->
                                                            <td>William Elmore</td>
                                                            <td>calleradmin@gmail.com</td>
                                                            <td>+9198989898</td>
                                                            <td>Cash</td>
                                                            <td>VADE0B248932</td>
                                                           <td>07 Oct, 2021</td>
                                                            <td>
                                                                    <span class="badge badge-soft-success">Paid</span>
                                                                </td>
                                                            
                                                           
                                                             
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="cardtableCheck02">
                                                                    <label class="form-check-label" for="cardtableCheck02"></label>
                                                                </div>
                                                            </td>
                                                            <td><a href="#" class="fw-medium">#VL2109</a></td>
                                                           <!--  <td>Machanical</td> -->
                                                            <td>Georgie Winters</td>
                                                             <td>calleradmin@gmail.com</td>
                                                            <td>+9198989898</td>
                                                            <td>Cash</td>
                                                            <td>VADE0B248932</td>
                                                            <td>07 Oct, 2021</td>
                                                             <td>
                                                                    <span class="badge badge-soft-success">Paid</span>
                                                                </td>
                                                            
                                                            
                                                             
                                                        </tr>
                                                       <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="cardtableCheck02">
                                                                    <label class="form-check-label" for="cardtableCheck02"></label>
                                                                </div>
                                                            </td>
                                                            <td><a href="#" class="fw-medium">#VL2109</a></td>
                                                          <!--   <td>Science</td> -->
                                                            <td>Georgie Winters</td>
                                                             <td>calleradmin@gmail.com</td>
                                                            <td>+9198989898</td>
                                                            <td>Cash</td>
                                                            <td>VADE0B248932</td>
                                                            <td>07 Oct, 2021</td>
                                                             <td>
                                                                    <span class="badge badge-soft-success">Paid</span>
                                                                </td>
                                                            
                                                             
                                                        </tr>
                                                       <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="cardtableCheck02">
                                                                    <label class="form-check-label" for="cardtableCheck02"></label>
                                                                </div>
                                                            </td>
                                                            <td><a href="#" class="fw-medium">#VL2109</a></td>
                                                           <!--  <td>MBA</td> -->
                                                            <td>Georgie Winters</td>
                                                             <td>calleradmin@gmail.com</td>
                                                            <td>+9198989898</td>
                                                            <td>Cash</td>
                                                            <td>VADE0B248932</td>
                                                            <td>07 Oct, 2021</td>
                                                             <td>
                                                                    <span class="badge badge-soft-success">Paid</span>
                                                                </td>
                                                            
                                                              
                                                        </tr>
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
             <div class="modal fade" id="editsubadmin" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Edit Exhibitors</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0);">
                    <div class="row g-3">
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
                                <input type="text" class="form-control" id="firstName" placeholder="Enter Organization">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div>
                                <label for="firstName" class="form-label">Chief Executive</label>
                                <input type="text" class="form-control" id="firstName" placeholder="Enter Chief Executive">
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div>
                                <label for="firstName" class="form-label">Designation</label>
                                <input type="text" class="form-control" id="firstName" placeholder="Enter Designation">
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div>
                                <label for="firstName" class="form-label">Contact Executive</label>
                                <input type="number" class="form-control" id="firstName" placeholder="Enter Contact Executive">
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-md-6">
                            <div>
                                <label for="lastName" class="form-label">Email</label>
                                <input type="email" class="form-control" id="lastName" placeholder="Enter Email">
                            </div>
                        </div><!--end col-->
                      
                        <div class="col-md-6">
                            <div>
                                <label for="emailInput" class="form-label">Contact</label>
                                <input type="number" class="form-control" id="emailInput" placeholder="Enter your Contact">
                            </div>
                        </div><!--end col-->
                         <div class="col-md-6">
                            <div>
                                <label for="emailInput" class="form-label">Website</label>
                                <input type="url" class="form-control" id="emailInput" placeholder="Enter your Contact">
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-md-6">
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