<?php 
$this->load->view('admin/link'); 
?>
<!-- Begin page -->
<div id="layout-wrapper">

    <?php
	$this->load->view('admin/topar'); 
  	$this->load->view('admin/imgheader'); 
  	$this->load->view('admin/sidebar'); 
     ?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#Datatable1').DataTable();
    });
</script>
<div class="vertical-overlay"></div>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">कैंपेन <?= $ip = $_SERVER['REMOTE_ADDR'];?> </h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?php base_url() ?>Dashboard">Dashboards</a></li>
                                <li class="breadcrumb-item active">कैंपेन </li>
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
                            <h4 class="card-title mb-0 flex-grow-1">कैंपेन </h4>
                            <div class="flex-shrink-0">
                                <?php if ($this->rbac->hasPrivilege('regional', 'can_add')) { ?>
                                    <button type="button"  class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#exampleModalgrid">नया कैंपेन जोड़ें </button>
                                <?php } ?>
                            </div>
                        </div><!-- end card header -->
                        <div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalgridLabel">नया कैंपेन जोड़ें  </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div id="success">
                                            <div id="error">
                                            </div>
                                        </div>
                                        <form method="POST" id="addcamp">
                                            <div class="row g-3">
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="firstName" class="form-label">कैंपेन का नाम</label>
                                                        <input type="text" class="form-control" name="title" id="title" placeholder="कैंपेन का नाम">
                                                    </div>
                                                    <div class="error" id="titleError"></div>
                                                </div>
                                              
                                              	<div class="col-xxl-6">
                                                    <div>
                                                        <label for="firstName" class="form-label">कैंपेन की दिनांक व समय  </label>
                                                        <input type="datetime-local" class="form-control" name="date_time" id="date_time" placeholder="कैंपेन का नाम">
                                                    </div>
                                                    <div class="error" id="date_timeError"></div>
                                                </div>
                                              
                                                <!--end col-->
                                                <div class="col-xxl-12">
                                                    <div>
                                                        <label for="lastName" class="form-label">कैंपेन का विवरण</label>
                                                        <textarea name="description" class="blog_desc" class="form-control" id="editor3" placeholder="कैंपेन का विवरण"></textarea>
                                                    </div>
                                                    <div class="error" id="subemailError"></div>
                                                </div>
                                              
                                               <script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
                                              <script>
                                                  CKEDITOR.replace('editor3');
                                              </script>
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
                        <div class="card-body">
                            <div class="live-preview">
                                <div class="table-responsive table-card">
                                     <table class="table align-middle table-nowrap mb-0" id="Datatable1" class="display">
                                        <thead class="table-light">
                                            <tr>
                                             
                                              <th>क्रमांक</th>
                                              <th>कैंपेन का नाम</th>
                                              <th>कैंपेन का विवरण </th>
                                              <th>कैंपेन का स्टेटस</th>
                                              <th>दिनांक</th>
                                              <th colspan = 3 >कार्य</th>
											</tr>
                                          
                                        </thead>
                                        <tbody id="filter_data">
                                           
                                            <?php 
                                            $i = 1;
                                          if(!empty($item)){
                                            foreach($item as $row)
                                            { 
                                            ?>
                                        <tr class="odd">
                                                
                                                <td><?php echo $i;?></td>
                                          
                                                 <td >
                                                  
                                                   <a href="<?=base_url()?>Campaign/camp_details/<?=$row['id']?>"><?php if (!empty($row['title'])) {?><?php echo $row['title']?> <?php }?></a>
                                          			
                                          		</td>
                                        
                                          			<td >
                                                  
                                                   <a href="<?=base_url()?>Campaign/camp_details/<?=$row['id']?>"><?php if (!empty($row['title'])) {?><?php echo $row['title']?> <?php }?></a>
                                          			
                                          		</td>
                                      
                                          
                                                <td><?php if (!empty($row['discription'])) {?><?php echo $row['discription']?> <?php }?></td>
                                                <td><?php 
                                              	if($row['flag'] == 1) { ?>
                                          		 <span class="badge badge-soft-danger">निष्क्रिय</span>
                                                  <?php }
                                              	if($row['flag'] == 0){ ?>
                                          		 <span class="badge badge-soft-success">सक्रिय</span>
                                                  <?php } ?>
                                          		</td>
                                                <td><?php if (!empty($row['date_time'])) {?><?php echo $row['date_time']?> <?php }?></td>
                                          		
                                          		<?php if ($this->rbac->hasPrivilege('campaign', 'can_edit')) { ?>
                                                        <td>
                                                            <i class="ri-edit-box-line editmodel" style="color: blue;" class="" data-bs-toggle="modal" data-bs-target="#editsubadmin" data-id="<?php echo $row['id']; ?>"></i>
                                                        </td>
                                                    <?php } ?>
                                                    <?php if ($this->rbac->hasPrivilege('campaign', 'can_delete')) { ?>
                                                        <td>
                                                            <i class="ri-delete-bin-line" name="archive" class="remove" type="submit" onclick="archiveFunction('<?php echo $row['id']; ?>','Delete')" data-toggle="tooltip" data-placement="bottom" style="color: red;"></i>
                                                        </td>
                                          				 
                                                    <?php } ?>
                                          
                                          			<?php if ($row['flag'] == 0) {
                                                    ?>
                                                        <td>
                                                            <i class="ri-checkbox-circle-line" data-toggle="tooltip" data-placement="bottom" title="Disable Your Account" name="archive" class="remove" type="submit" onclick="archiveFunction('<?php echo $row['id']; ?>','InActive')" data-toggle="tooltip" data-placement="bottom" style="color: green;"></i>
                                                        </td>
                                                    <?php } 
                                              		if ($row['flag'] == 1) { ?>
                                                        <td>
                                                            <i class="ri-alert-line" data-toggle="tooltip" data-placement="bottom" title="Enable Your Account" name="archive" class="remove" type="submit" onclick="archiveFunction('<?php echo $row['id']; ?>','Active')" data-toggle="tooltip" data-placement="bottom" style="color: red;"></i>
                                                        </td>
                                                    <?php } ?>
                                                   

                                            
                                               
                                            </tr>
                                           <?php $i++; } }?>
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
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">कैंपेन सम्पादित करें </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" onClick="window.location.reload();" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="successs">
                    </div>
                </div>
            </div>
        </div>
    </div>
     <?php $this->load->view('admin/footer');  ?>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script type="text/javascript">
    function archiveFunction(id,status) {
        event.preventDefault(); // prevent form submit
        var form = event.target.form; // storing the form
      	if(status == 'Delete'){
        	var text = 'मिटाना ';
        }
      	if(status == 'InActive'){
        	var text = 'निष्क्रिय';
        }
      	if(status == 'Active'){
        	var text = 'सक्रिय';
        }
        swal({
                title: "कृपया सुनिश्चित कर ले ?",
                text: " कि आप इस रिकॉर्ड को " + text + " चाहते हैं ?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "हाँ , "+ text +" चाहते हैं",
                cancelButtonText: "नहीं , रखना है !",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: "<?= base_url() ?>Campaign/update_status",
                        type: "post",
                        data: {
                            id: id,
                          	status:status
                        },
                        success: function() {
                            swal('कैंपेन ' +text+ ' 🙂', ' ', 'success');
                          	setTimeout(function() {
                            location.reload(true);
                        }, 1000);

                        },
                        error: function() {
                            swal('कुछ गलत हुआ है। ☹️', 'error');
                        }
                    });
                } else {
                    swal("रद्द ", "कैंपेन रद्द किया गया | 🙂", "error");
                }
            });
    }
</script>

<script>
    //  add modal
    $(document).on('submit', '#addcamp', function(ev) {
        $('.error').html('');
        ev.preventDefault(); // Prevent browers default submit.
        var formData = new FormData(this);
        var error = false;
        var title = $('#title').val();
        var date_time = $('#date_time').val();
       
        if (title == '') {
            $('#titleError').html('कैंपेन का नाम अनिवार्य है |');
            $('.error').css('color', 'red');
            error = true;
            // alert("hi");
        }
        if (date_time == '') {
            $('#date_timeError').html('कैंपेन की दिनांक व समय अनिवार्य है |');
            $('.error').css('color', 'red');
            error = true;
            // alert("hi");
        }
      
       
        if (error == false) {
            $.ajax({
                url: "<?= base_url('Campaign/addcamp'); ?>",
                type: 'post',
                data: formData,
                success: function(result) {
                    var dataResult = JSON.parse(result);
                    if (dataResult.done == '1') {

                        swal('कैंपेन सफलता पूर्वक जुड़ गया। 🙂', ' ', 'success');
                        setTimeout(function() {
                            location.reload(true);
                        }, 1000);
                    }
                    if (dataResult == '0') {

                        swal('कुछ गलत हो गया | ☹️', ' ', 'success');
                        setTimeout(function() {
                            location.reload(true);
                        }, 1000);
                    }
                    if (dataResult.exist == '0') {

                        swal('कैंपेन पहले से जुड़ा है।  ☹️', ' ', 'error');
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
        $('.editmodel').click(function() {
            var userid = $(this).data('id');
            $.ajax({
                url: "<?= base_url('Campaign/edit'); ?>",
                type: "post",
                data: {
                    id: userid
                },
                success: function(response) {
                    $('.modal-body').html(response);
                 }
            })
        });
    });
</script>
<script type="text/javascript">
    // update modal
    $(document).on('submit', '#editcamp', function(ev) {
        ev.preventDefault(); // Prevent browers default submit.
        var formData = new FormData(this);
        $.ajax({
            url: "<?= base_url() ?>Campaign/update/",
            type: 'post',
            data: formData,
            success: function(result) {
                //json data
                var dataResult = JSON.parse(result);
                if (dataResult.inserted == '1') {
                    swal('कैंपेन सम्पादित हो गया है।  🙂', ' ', 'success');
                    setTimeout(function() {
                        location.reload(true);
                    }, 1000);
                } else {}
               
            },
            cache: false,
            contentType: false,
            processData: false,
        })
    })
</script>
<script type="text/javascript">
    function enableaccount(admin_user_id,admin_email) {
        event.preventDefault(); // prevent form submit
        var form = event.target.form; // storing the form
        swal({
                title: "Are you sure?",
                text: "Enable subadmin Account "+admin_email,
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
                        url: "<?= base_url() ?>Subadmin/update/admin_user_id",
                        type: "post",
                        data: {
                            admin_user_id: admin_user_id
                        },
                        success: function() {
                            swal('Account Enable 🙂', ' ', 'success');

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
    function disableaccount(admin_user_id,admin_email) {
        event.preventDefault(); // prevent form submit
        var form = event.target.form; // storing the form
        swal({
                title: "Are you sure?",
                text: "Disable subadmin Account "+admin_email,
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
                        url: "<?= base_url() ?>Subadmin/updatedisable/admin_user_id",
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
    // update modal
    $(document).on('submit', '#changepasswordsubadmin', function(ev) {
        ev.preventDefault(); // Prevent browers default submit.
        var formData = new FormData(this);
        $.ajax({
            url: "<?= base_url() ?>Subadmin/changesubpass",
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
<!-- filter Data -->
</body>

</html>