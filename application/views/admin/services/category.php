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
                                <h4 class="mb-sm-0">Category</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                        <li class="breadcrumb-item active">Services</li><li class="breadcrumb-item active">Category</li>
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
                                        <h4 class="card-title mb-0 flex-grow-1">All Category</h4>

                                        <div class="flex-shrink-0">     <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#exampleModalgrid"><i class="ri-dashboard-line"></i></button>
                                        <a href="<?php base_url();?>Services"><button type="button" class="btn btn-primary waves-effect waves-light"><i class="ri-draft-line"></i></button></a>                                       
                                          
                                        </div>
                                    </div><!-- end card header -->
                                    <div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Add New Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="addCategory">
                    <div class="row g-3">
                        <div class="col-xxl-6">
                            <div>
                                <label for="cat_name" class="form-label">Category Name</label>
                                <input type="text" class="form-control" name="cat_name" id="cat_name" placeholder="Enter Category Name">
                            </div>
                            <div class="error" id="catnameError"></div>
                        </div><!--end col-->
                       
                       
                       <!--end col-->
                        
                       
                      
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
                                                           
                                                            <th scope="col">Categry ID</th>
                                                             <!-- <th scope="col">Department</th> -->
                                                            <th scope="col">Category Name</th>
                                                           
                                                           
                                                            <th scope="col">Date</th>
                                                           
                                                            <th scope="col" colspan="3" style=" text-align: center;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                            
                                            <?php 
                                           
                                            foreach($servCatData->result() as $row)

                                            { 
                                               
                                                
                                               
                                                ?>
                                            <tr id="delete<?php echo $row->serv_cat_id;?>">
                                                
                                                <td><a href="#" class="fw-medium"><?php echo $row->serv_cat_id;?></a></td>
                                                <td><?php echo $row->ser_cat_name;?></td>
                                                
                                                <td><?php echo $row->created_at;?></td>
                                               
                                                <td>
                                                     <?php if($this->rbac->hasPrivilege('category','can_edit')) { ?>

                                                    
                                                    <i class="ri-edit-box-line cateditmodel" data-bs-toggle="modal" data-bs-target="#editcategory" data-id="<?php echo $row->serv_cat_id; ?>" style="color: blue;"></i>
                                                   
                                                </td>
                                            <?php } ?>
                                                <?php if($this->rbac->hasPrivilege('category','can_delete')) { ?>
                                                <td>
                                                    

                                                    <i class="ri-delete-bin-line"  name="archive" class="remove" type="submit" onclick="archiveFunction(<?php echo $row->serv_cat_id ?>)" data-toggle="tooltip" data-placement="bottom"  style="color: red;"></i>
                                                   
                  
                                                </td>
                                            <?php } ?>

                                            <?php if ($row->serv_cat_status=="Enable") {
                                                
                                            ?>

                                          <td>
                                                     <i class="ri-checkbox-circle-line" data-toggle="tooltip" data-placement="bottom" title="Disable Your Services" name="archive" class="remove" type="submit" onclick="disableservices(<?php echo $row->serv_cat_id ?>)" data-toggle="tooltip" data-placement="bottom"  style="color: green;"></i>
                                                   
                  
                                                </td>
                                            <?php } 
                                            else { ?>
                                               <td>
                                                   <i class="ri-alert-line" data-toggle="tooltip" data-placement="bottom" title="Enable Your Services" name="archive" class="remove" type="submit" onclick="enableservices(<?php echo $row->serv_cat_id ?>)" data-toggle="tooltip" data-placement="bottom"  style="color: red;"></i>
                                                   
                  
                                                </td>
                                            <?php } ?>
                                            
                                            </tr>
                                           <input type="hidden" name="serv_cat_id" value="<?php echo $row->serv_cat_id; ?>">
                                            <input type="hidden" name="serv_cat_id" value="<?php echo $row->serv_cat_id; ?>">
                                           
                                            <?php } ?>
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
             <div class="modal fade" id="editcategory" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editcategory">Edit Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
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
    function archiveFunction(serv_cat_id) {
        event.preventDefault(); // prevent form submit
        
        var form = event.target.form; // storing the form
        swal({
                title: "Are you sure?",
                text: "Delete Subadmin Record <?php echo $row->serv_cat_id; ?>",
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
          url: "<?=base_url()?>Category/deletecategory/serv_cat_id",
          type: "post",
          data: {serv_cat_id:serv_cat_id},
          success:function(){
            swal('Category Deleted 🙂', ' ', 'success');
            $("#delete"+serv_cat_id).fadeTo("slow", 0.7, function(){
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
    $(document).on('submit', '#addCategory', function(ev) {
        $('.error').html('');

        ev.preventDefault(); // Prevent browers default submit.
        var formData = new FormData(this);
        var error = false;
        var cat_name = $('#cat_name').val();
       
        

        if (cat_name == '') {
            $('#catnameError').html('Enter Your Category Name');
            $('.error').css('color', 'red');
            error = true;
            // alert("hi");

        }
        
        if (error == false) {
            $.ajax({
                url: "<?= base_url('Category/addcategory'); ?>",
                type: 'post',
                data: formData,
                success: function(result) {
                    // json data
                    var dataResult = JSON.parse(result);
                    if (dataResult.done == '1') {
                       swal('Category Added 🙂', ' ', 'success');
                        setTimeout(function() {
                            location.reload(true);
                        }, 1000);
                    }

                    if (dataResult.done == '0') {
                       swal('Category Not Added ☹️', ' ', 'error');
                      
                        setTimeout(function() {
                            location.reload(true);
                        }, 1000);

                    }

                    //  if (dataResult.email == '0') {
                    //    swal('Category Already Exist ☹️', ' ', 'error');
                      
                        

                    // }
                    

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
            $('.cateditmodel').click(function() {
               
                var userid = $(this).data('id');
                
                $.ajax({
                    url: "<?= base_url('Category/categoryedit'); ?>",
                    type: "post",
                    data: {
                        id: userid
                    },
                    success: function(response) {
                        
                        $('.modal-body').html(response);
                        $('.CategoryData').modal('show');

                    }
                })


            });
        });
</script>

<script type="text/javascript">
      // update modal
        $(document).on('submit', '#editcategoryModal', function(ev) {
            ev.preventDefault(); // Prevent browers default submit.
            var formData = new FormData(this);
            $.ajax({
                url: "<?=base_url()?>Category/updatecategory/",
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
    function enableservices(serv_cat_id) {
        event.preventDefault(); // prevent form submit
        
        var form = event.target.form; // storing the form
        swal({
                title: "Are you sure?",
                text: "Enable Category",
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
          url: "<?=base_url()?>Category/update/serv_cat_id",
          type: "post",
          data: {serv_cat_id:serv_cat_id},
          success:function(){
            swal('Category Enable 🙂', ' ', 'success');
            $("#delete"+serv_cat_id).fadeTo("slow", 0.7, function(){
              $(this).remove();
            })
            setTimeout(function() {
                            location.reload(true);
                        }, 1000);

          },
          error:function(){
            swal('Category Still Disable ☹️', 'error');
          }
      });
  }
  else {
               swal("Cancelled", "User Category is safe 🙂", "error");
            }
      
    });
    }
</script>

<script type="text/javascript">
    function disableservices(serv_cat_id) {
        event.preventDefault(); // prevent form submit
        
        var form = event.target.form; // storing the form
        swal({
                title: "Are you sure?",
                text: "Disable Category",
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
          url: "<?=base_url()?>Category/updatedisable/serv_cat_id",
          type: "post",
          data: {serv_cat_id:serv_cat_id},
          success:function(){
            swal('Category Disable 🙂', ' ', 'success');
            $("#delete"+serv_cat_id).fadeTo("slow", 0.7, function(){
              $(this).remove();
            })
            setTimeout(function() {
                            location.reload(true);
                        }, 1000);

          },
          error:function(){
            swal('Category Still Enable ☹️', 'error');
          }
      });
  }
  else {
               swal("Cancelled", "User Category is safe 🙂", "error");
            }
      
    });
    }
</script>
</body>


<!-- Mirrored from themesbrand.com/velzon/html/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 11 Mar 2022 09:52:42 GMT -->
</html>