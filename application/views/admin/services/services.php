<?php $this->load->view('admin/link.php'); ?>
    <div id="layout-wrapper">
       <?php $this->load->view('admin/topar.php'); ?>
       <?php $this->load->view('admin/imgheader.php'); ?>
       <?php $this->load->view('admin/sidebar.php'); ?>
    </div>
    <div class="vertical-overlay"></div>
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Services</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                        <li class="breadcrumb-item active">Services</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">All Services</h4>
                                        <div class="flex-shrink-0">    
                                           
                                            <button type="button" data-toggle="tooltip" data-placement="bottom" title="Add New Services" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#exampleModalgrid"><i class="ri-draft-line"></i></button>
                                            <a href="<?php base_url();?>Category"><button type="button" data-placement="bottom" title="Add New Category"  class="btn btn-primary waves-effect waves-light"><i class="ri-play-list-add-line"></i></button></a>                                       
                                        </div>
                                    </div>
                                    <div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalgridLabel">Add New Services</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form  method="post" id="addService">
                                                        <div class="row g-3">
                                                            <div class="col-xxl-6">
                                                                <div>
                                                                    <label for="firstName" class="form-label">Service Name</label>
                                                                    <input type="text" class="form-control" id="service_name" name="service_name" placeholder="Enter Service Name">
                                                                </div>
                                                            </div>
                                                            <div class="col-xxl-6">
                                                                <label for="lastName"  class="form-label">Service Category</label>
                                                                <select class="form-control" id="service_category" name="service_category">
                                                                    <option value="">Select Service Category</option>
                                                                    <?php 
                                                                        foreach($servicesData->result() as $row)
                                                                        { 
                                                                    ?>
                                                                    <option value="<?php echo $row->serv_cat_id;?>"><?php  echo $row->ser_cat_name; ?></option>
                                                                    <?php
                                                                        } 
                                                                    ?>  
                                                                </select>
                                                            </div>
                                                            <div class="col-xxl-6">
                                                                <div>
                                                                    <label for="lastName" class="form-label">Service Description</label>
                                                                    <input type="text" class="form-control" id="service_description" name="service_description" placeholder="Enter Description">
                                                                </div>
                                                            </div>
                                                            <div class="col-xxl-6">
                                                                <div>
                                                                    <label for="lastName" class="form-label">Service Price</label>
                                                                    <input type="number" class="form-control" id="service_description" name="service_price" placeholder="Enter Service Price">
                                                                </div>
                                                            </div>
                                                            <div class="error" id="servicenameError"></div>
                                                            <div class="error" id="servicenameError1"></div>
                                                            <div class="error" id="servicenameError2"></div>
                                                            <div class="col-lg-12">
                                                                <div class="hstack gap-2 justify-content-end">
                                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                                </div>
                                                            </div>
                                                        </div>
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
                                                           
                                                            <th scope="col">Service ID</th>
                                                            <th scope="col">Service Name</th>
                                                            <th scope="col">Service Category</th>
                                                            <th scope="col">Service Price</th>
                                                             <th scope="col">Service Description</th>
                                                            <th scope="col">Date</th>
                                                           
                                                            <th scope="col" colspan="4" style=" text-align: center;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php  foreach($servicesDatashow->result() as $row)  {    ?>
                                                        <tr id="delete" id="delete<?php echo $row->service_id;?>">     
                                                           
                                                            <td><a href="#" class="fw-medium"><?php echo $row->service_id;?></a></td>
                                                            <td><?php echo $row->service_name;?></td>
                                                            <td><?php echo $row->ser_cat_name;?></td>
                                                             <td><?php echo $row->serv_price;?></td>
                                                           <td><?php echo $row->service_desc;?></td>
                                                            <td><?php echo $row->ser_created_at;?></td>
                                                            
                                                            <td>
                                                <?php if($this->rbac->hasPrivilege('services','can_edit')) { ?>

                                            

                                                   <i class="ri-edit-box-line serviceeditmodel" data-bs-toggle="modal" data-bs-target="#editsubadmin" data-id="<?php echo $row->service_id; ?>" style="color: blue;"></i>

                                            
                                            </td>
                                        <?php } ?>
                                            <?php if($this->rbac->hasPrivilege('services','can_delete')) { ?>
                                            <td>
                                               

                                                <i class="ri-delete-bin-line"  name="archive" class="remove" type="submit" onclick="archiveFunction(<?php echo $row->service_id ?>)" data-toggle="tooltip" data-placement="bottom"  style="color: red;"></i>
                                            
            
                                            </td>
                                        <?php } ?>


                                         <?php if ($row->service_status=="Enable") {
                                                
                                            ?>

                                          <td>
                                                     <i class="ri-checkbox-circle-line" data-toggle="tooltip" data-placement="bottom" title="Disable Your Services" name="archive" class="remove" type="submit" onclick="disableservices(<?php echo $row->service_id  ?>)" data-toggle="tooltip" data-placement="bottom"  style="color: green;"></i>
                                                   
                  
                                                </td>
                                            <?php } 
                                            else { ?>
                                               <td>
                                                   <i class="ri-alert-line" data-toggle="tooltip" data-placement="bottom" title="Enable Your Services" name="archive" class="remove" type="submit" onclick="enableservices(<?php echo $row->service_id  ?>)" data-toggle="tooltip" data-placement="bottom"  style="color: red;"></i>
                                                   
                  
                                                </td>
                                            <?php } ?>
                                        
                                                           
                                                        </tr>
                                                    <?php }   ?>
                                                    </tbody>
                                                </table>     
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
             <div class="modal fade" id="editsubadmin" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editsubadmin">Edit Serices</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"  onClick="window.location.reload();" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               
            </div>
        </div>
    </div>
</div>
              <?php $this->load->view('admin/footer.php'); ?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="<?=base_url()?>/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url()?>/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?=base_url()?>/assets/libs/node-waves/waves.min.js"></script>
    <script src="<?=base_url()?>/assets/libs/feather-icons/feather.min.js"></script>
    <script src="<?=base_url()?>/assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="<?=base_url()?>/assets/js/plugins.js"></script>
    <script src="<?=base_url()?>/assets/libs/apexcharts/apexcharts.min.js"></script>
    <script src="<?=base_url()?>/assets/libs/jsvectormap/js/jsvectormap.min.js"></script>
    <script src="<?=base_url()?>/assets/libs/jsvectormap/maps/world-merc.js"></script>
    <script src="<?=base_url()?>/assets/libs/swiper/swiper-bundle.min.js"></script>
    <script src="<?=base_url()?>/assets/js/pages/dashboard-ecommerce.init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="<?=base_url()?>/assets/js/app.js"></script>
    <script type="text/javascript">
    function archiveFunction(service_id) {
        event.preventDefault(); // prevent form submit
        
        var form = event.target.form; // storing the form
        swal({
                title: "Are you sure?",
                text: "Delete Subadmin Record <?php echo $row->service_id; ?>",
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
          url: "<?=base_url()?>Services/deleteservicesss/service_id",
          type: "post",
          data: {service_id:service_id},
          success:function(){
            swal('Service Deleted 🙂', ' ', 'success');
            $("#delete"+service_id).fadeTo("slow", 0.7, function(){
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
$(document).on('submit', '#addService', function(ev) {
    $('.error').html('');
    ev.preventDefault(); 
    var formData = new FormData(this);
    var error = false;
    var service_name = $('#service_name').val();
    var service_category = $('#service_category').val();
    var service_description = $('#service_description').val();
    if (service_name == '') {
        $('#servicenameError').html('Enter Your Service Name');
        $('.error').css('color', 'red');
        error = true;
    }
    if (service_category == '') {
        $('#servicenameError1').html('Enter Your Service category');
        $('.error').css('color', 'red');
        error = true;
    }
    if (service_description == '') {
        $('#servicenameError2').html('Enter Your Service Description');
        $('.error').css('color', 'red');
        error = true;
    }
    if (error == false) {
        $.ajax({
            url: "<?= base_url('Services/addservice'); ?>",
            type: 'post',
            data: formData,
            success: function(result) {
                // json data
                var dataResult = JSON.parse(result);
                if (dataResult.done == '1') {
                   swal('Service Added 🙂', ' ', 'success');
                    setTimeout(function() {
                        location.reload(true);
                    }, 1000);
                }
                if (dataResult.done == '0') {
                   swal('Service Not Added ☹️', ' ', 'error');
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
}) 
</script>
<script type="text/javascript">
     $(document).ready(function() {
            $('.serviceeditmodel').click(function() {
                var userid = $(this).data('id');
                $.ajax({
                    url: "<?= base_url('Services/serviceedit'); ?>",
                    type: "post",
                    data: {
                        id: userid
                    },
                    success: function(response) {
                        $('.modal-body').html(response);
                        $('.serviceclass').modal('show');
                    }
                })
            });
        });
</script>
<script type="text/javascript">
        $(document).on('submit', '#sevicecat', function(ev) {
            ev.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: "<?=base_url()?>Services/updateservice/",
                type: 'post',
                data: formData,
                success: function(result) {
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
                },
                cache: false,
                contentType: false,
                processData: false,
            })
        })
</script>

<script type="text/javascript">
    function archiveFunction(service_id) {
        event.preventDefault(); // prevent form submit
        
        var form = event.target.form; // storing the form
        swal({
                title: "Are you sure?",
                text: "Delete Services Record <?php echo $row->service_name ?>",
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
          url: "<?=base_url()?>Services/deleteservicesss/service_id",
          type: "post",
          data: {service_id:service_id},
          success:function(){
            swal('Service Deleted 🙂', ' ', 'success');
            $("#delete"+service_id).fadeTo("slow", 0.7, function(){
              $(this).remove();
             
            })
            setTimeout(function() {
                            location.reload(true);
                        }, 1000);

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

<script type="text/javascript">
    function enableservices(service_id) {
        event.preventDefault(); // prevent form submit
        
        var form = event.target.form; // storing the form
        swal({
                title: "Are you sure?",
                text: "Enable Service",
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
          url: "<?=base_url()?>Services/update/service_id",
          type: "post",
          data: {service_id :service_id },
          success:function(){
            swal('Service Enable 🙂', ' ', 'success');
            $("#delete"+service_id).fadeTo("slow", 0.7, function(){
              $(this).remove();
            })
            setTimeout(function() {
                            location.reload(true);
                        }, 1000);

          },
          error:function(){
            swal('Service Still Disable ☹️', 'error');
          }
      });
  }
  else {
               swal("Cancelled", "User Service is safe 🙂", "error");
            }
      
    });
    }
</script>

<script type="text/javascript">
    function disableservices(service_id) {
        event.preventDefault(); // prevent form submit
        
        var form = event.target.form; // storing the form
        swal({
                title: "Are you sure?",
                text: "Disable Service",
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
          url: "<?=base_url()?>Services/updatedisable/service_id",
          type: "post",
          data: {service_id:service_id},
          success:function(){
            swal('Service Disable 🙂', ' ', 'success');
            $("#delete"+service_id).fadeTo("slow", 0.7, function(){
              $(this).remove();
            })
            setTimeout(function() {
                            location.reload(true);
                        }, 1000);

          },
          error:function(){
            swal('Service Still Enable ☹️', 'error');
          }
      });
  }
  else {
               swal("Cancelled", "User Service is safe 🙂", "error");
            }
      
    });
    }
</script>

</body>
</html>