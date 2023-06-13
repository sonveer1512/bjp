<?php $this->load->view('admin/link'); ?>
<!-- Begin page -->
<div id="layout-wrapper">
    <?php 
  $this->load->view('admin/topar');
   $this->load->view('admin/imgheader');
   $this->load->view('admin/sidebar');?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#Datatable1').DataTable();
    });
</script>
<style>
  .show_div{
  display:none;
  }
  
</style>
<div class="vertical-overlay"></div>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">स्टाफ</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?php base_url() ?>Dashboard">डैशबोर्ड</a></li>
                                <li class="breadcrumb-item active">स्टाफ </li>
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
                            <h4 class="card-title mb-0 flex-grow-1">स्टाफ </h4>
                            <div class="flex-shrink-0">
                                <?php if ($this->rbac->hasPrivilege('staff', 'can_add')) { ?>
                                    <button type="button" data-toggle="tooltip" data-placement="bottom" title="Add New Staff" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#exampleModalgrid1">नया स्टाफ जोड़ें </button>
                                <?php } ?>
                            </div>
                        </div><!-- end card header -->
                        <div class="modal fade" id="exampleModalgrid1" tabindex="-1" aria-labelledby="exampleModalgrid1Label" aria-modal="false">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalgrid1Label">नया स्टाफ जोड़ें</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div id="success">
                                            <div id="error">
                                            </div>
                                        </div>
                                        <form method="POST" id="addSubadmin">
                                            <div class="row g-3">
                                              
                                              <div class="col-xxl-6">
                                                    <div>
                                                        <label for="emailInput" class="form-label">उपयोगकर्ता की भूमिका</label>
                                                        <select class="form-control" name="user_role" id="user_role" onchange="for_executive(this.value)">
                                                          <option value="" selected >भूमिका चुनें </option>
                                                            <option value="Subadmin">सब एडमिन </option>
                                                          	 <option value="Supervisor">सुपरवाइजर </option>
                                                          	 <option value="Executive">एक्सिक्यूटिव </option>
                                                        </select>
                                                    </div>
                                                 <div class="error" id="role_Error"></div>
                                                </div>
                                              <div class="col-xxl-6 show_div" id="jila">
                                                    <div>
                                                        <label for="firstName" class="form-label">जिला चुनें </label>
                                                        <select class="form-control" name="jila" id="jila_id" onchange="changevidhansabha(this.value, 'vidhansabha_id', 'विधानसभा')">
                                                          <option value="" selected>जिला चुनें</option>
                                                           <?php 
                                                            $booths = $this->Caller_model->list_common_where3('master_hierarchy','parent_id','0');
                                                            foreach ($booths as $val1) { ?>
                                                            <option value="<?= $val1['id'] ?>"><?= $val1['name'] ?></option>
                                                            <?php } ?> 
                                                        </select>
                                                    </div>
                                                    <div class="error" id="jila_Error"></div>
                                                </div>
                                              
                                              <div class="col-xxl-6 show_div" id="vidhansabha">
                                                    <div>
                                                        <label for="firstName" class="form-label">विधानसभा चुनें </label>
                                                        <select class="form-control" name="vidhansabha_id" id="vidhansabha_id" onchange="changevidhansabha(this.value, 'panchayat_id', 'पंचायत समिति/नगर पालिका')">>
                                                          <option value="" selected>विधानसभा चुनें </option>
                                                          
                                                        </select>
                                                    </div>
                                                    <div class="error" id="vidhanshabha_Error"></div>
                                                </div>
                                              
                                              <div class="col-xxl-6 show_div" id="panchayat_nagar">
                                                    <div>
                                                        <label for="firstName" class="form-label">पंचायत / नगर पालिका चुनें</label>
                                                        <select class="form-control" name="panchayat_id" id="panchayat_id" onchange="changevidhansabha(this.value, 'mandal_id', 'मंडल');">
                                                          <option value="" selected>पंचायत / नगर पालिका</option>
                                                          
                                                        </select>
                                                    </div>
                                                    <div class="error" id="pan_nagar_Error"></div>
                                                </div>
                                              
                                               <div class="col-xxl-6 show_div" id="mandal">
                                                    <div>
                                                        <label for="firstName" class="form-label">मंडल चुनें </label>
                                                        <select class="form-control" name="mandal_id" id="mandal_id" onchange="changevidhansabha(this.value, 'gram_id', 'ग्राम पंचायत');">
                                                          <option value="" selected>मंडल चुनें </option>
                                                           
                                                        </select>
                                                    </div>
                                                    <div class="error" id="mandal_Error"></div>
                                                </div>
                                              
                                               <div class="col-xxl-6 show_div" id="gram_panchayat">
                                                    <div>
                                                        <label for="firstName" class="form-label">ग्राम पंचायत चुनें </label>
                                                        <select class="form-control" name="gram_id" id="gram_id" onchange="changevidhansabha(this.value, 'booth_id', 'बूथ');">
                                                          <option value="" selected>ग्राम पंचायत  चुनें </option>
                                                            
                                                        </select>
                                                    </div>
                                                    <div class="error" id="gram_Error"></div>
                                                </div>
                                              
                                              <div class="col-xxl-6 show_div" id="booth">
                                                    <div>
                                                        <label for="firstName" class="form-label">बूथ चुनें </label>
                                                        <select class="form-control" name="booth_id" id="booth_id">
                                                          <option value="" selected>बूथ चुनें </option>
                                                           
                                                        </select>
                                                    </div>
                                                    <div class="error" id="booth_Error"></div>
                                                </div>
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="firstName" class="form-label"> नाम </label>
                                                        <input type="text" class="form-control" name="sub_name" id="sub_name" placeholder="नाम लिखें ">
                                                    </div>
                                                    <div class="error" id="subnameError"></div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="lastName" class="form-label">ई-मेल </label>
                                                        <input type="email" class="form-control" name="sub_email" id="sub_email" placeholder="ई-मेल लिखें">
                                                    </div>
                                                    <div class="error" id="subemailError"></div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="lastName" class="form-label">पासवर्ड </label>
                                                        <input type="password" class="form-control" name="sub_password" id="sub_password" placeholder="पासवर्ड लिखें">
                                                    </div>
                                                    <div class="error" id="subpassError"></div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="emailInput" class="form-label">मोबाइल नंबर </label>
                                                        <input type="number" class="form-control" name="sub_contact" id="sub_contact" placeholder="मोबाइल नंबर लिखें">
                                                    </div>
                                                    <div class="error" id="subcontactError"></div>
                                                </div>
                                                <!--end col-->
                                               
                                                <!--end col-->
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="passwordInput" class="form-label">पता </label>
                                                        <textarea class="form-control" name="sub_address" id="sub_address" placeholder="पता लिखें"></textarea>
                                                    </div>
                                                    <div class="error" id="subaddressError"></div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-lg-12">
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">बंद करें </button>
                                                        <input type="submit" class="btn btn-primary" value="सेव करें ">
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
                                                <th scope="col">क्रमांक </th>
                                              	<th scope="col">भूमिका</th>
                                                <th scope="col">नाम</th>
                                                <th scope="col">ई-मेल</th>
                                                <th scope="col">मोबाइल नंबर </th>
                                                <th scope="col">पता</th>
                                                <th scope="col">दिनांक </th>
                                                <th scope="col" colspan="4" style=" text-align: center;">कार्य</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($staff as $row) {
                                            ?>
                                                <tr id="delete<?php echo $row['admin_user_id']; ?>">
                                                    <td><a href="#" class="fw-medium"><?php echo $i; ?></a></td>
                                                  	<td> <?php if (!empty($row['admin_role'])) 
                                            		{ 
                                              		if($row['admin_role'] == 'Executive'){ ?>
                                                  	 
                                                     <a href="#" > <span onclick="show_access_1('<?=$row['admin_user_id']?>','<?=$row['admin_name']?>')" class="badge badge-soft-success" data-toggle="tooltip" data-placement="bottom" title="View Access" data-bs-toggle="modal" data-bs-target="#openaccess" ><?=$row['admin_role']?></span> </a>
                                                      <?php }else if($row['admin_role'] == 'Subadmin') {?>
                                                      <span class="badge badge-soft-primary"><?=$row['admin_role']?></span>
                                                  <?php } else if($row['admin_role'] == 'Supervisor'){ ?>	
                                                     <span class="badge badge-soft-danger"><?=$row['admin_role']?></span> 
                                                      <?php } } ?> 
                                                  </td>
                                                    <td> <?php if (!empty($row['admin_name'])) { ?><?php echo $row['admin_name']; ?> <?php } ?></td>
                                                    <td> <?php if (!empty($row['admin_email'])) { ?><?php echo $row['admin_email']; ?> <?php } ?></td>
                                                    <td><?php if (!empty($row['admin_contact'])) { ?><?php echo $row['admin_contact']; ?> <?php } ?></td>
                                                    <td><?php if (!empty($row['admin_address'])) { ?><?php echo $row['admin_address']; ?> <?php } ?></td>
                                                    <td><?php echo $row['created_at']; ?></td>
                                                    <?php if ($this->rbac->hasPrivilege('staff', 'can_edit')) { ?>
                                                        <td>
                                                            <i class="ri-edit-box-line editmodel" style="color: blue;" class="" data-bs-toggle="modal" data-bs-target="#editsubadmin" data-id="<?php echo $row['admin_user_id']; ?>" data-role="<?php echo $row['admin_role']; ?>"></i>
                                                        </td>
                                                    <?php } ?>
                                                    <?php if ($this->rbac->hasPrivilege('staff', 'can_delete')) { ?>
                                                        <td>
                                                            <i class="ri-delete-bin-line" name="archive" class="remove" type="submit" onclick="archiveFunction('<?php echo $row['admin_user_id'] ?>','<?=$row['admin_email']?>')" data-toggle="tooltip" data-placement="bottom" style="color: red;"></i>
                                                        </td>
                                                    <?php } ?>
                                                    <?php if ($row['admin_status'] == "Enable") {
                                                    ?>
                                                        <td>
                                                            <i class="ri-checkbox-circle-line" data-toggle="tooltip" data-placement="bottom" title="Disable Your Account" name="archive" class="remove" type="submit" onclick="disableaccount('<?php echo $row['admin_user_id'] ?>','Disabled')" data-toggle="tooltip" data-placement="bottom" style="color: green;"></i>
                                                        </td>
                                                    <?php } else { ?>
                                                        <td>
                                                            <i class="ri-alert-line" data-toggle="tooltip" data-placement="bottom" title="Enable Your Account" name="archive" class="remove" type="submit" onclick="disableaccount('<?php echo $row['admin_user_id'] ?>','Enable')" data-toggle="tooltip" data-placement="bottom" style="color: red;"></i>
                                                        </td>
                                                    <?php } ?>
                                                    <?php if ($this->rbac->hasPrivilege('staff', 'can_change_pass')) { ?>
                                                        <td>
                                                            <i class="ri-lock-password-line" style="color: blue;" data-bs-toggle="modal" data-bs-target="#changepassword" data-id="<?php echo $row['admin_user_id']; ?>"></i>
                                                        </td><?php } ?>
                                                </tr>
                                                <input type="hidden" name="admin_user_id" value="<?php echo $row['admin_user_id']; ?>">
                                            <?php $i++;
                                            } ?>
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
    <div class="modal fade" id="changepassword" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changepassword">Change Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" class="changepassword" id="changepasswordsubadmin">
                        <div class="row g-3">
                            <div class="col-xxl-6">
                            </div>
                            <!--end col-->
                            <div class="col-xxl-6">
                                <label class="form-label" for="password-input">Current Password</label>
                                <div class="position-relative auth-pass-inputgroup mb-3">
                                    <input type="password" class="form-control pe-5" placeholder="Enter Current password" name="cur_password" id="password-input">
                                    <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-6">
                                <div>
                                    <label for="emailInput" class="form-label">New Password</label>
                                    <input type="password" name="new_password" class="form-control" id="new_password" placeholder="Enter your Password">
                                </div>
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
                        <input type="hidden" name="admin_user_id" value="<?php echo $row['admin_user_id']; ?>">
                    </form>
                </div>
            </div>
        </div>
    </div>

  <div class="modal zoomIn" id="openaccess" tabindex="-1" aria-labelledby="openaccess" aria-modal="false">
        <div class="modal-dialog modal-lg  modal-dialog-centered">
            <div class="modal-content">
                
            </div>
        </div>
    </div>
    <!-- End Page-content -->
    <div class="modal fade" id="editsubadmin" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                
            </div>
        </div>
    </div>
    <?php 
   $this->load->view('admin/footer');?>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script>
  function for_executive(val)
  { 
  	if(val == 'Executive')
    {
    	$('.show_div').css('display','block');
    }
    else{
    	$('.show_div').css('display','none');
    }
  }
</script>
<script>
  function show_access_1(id,name)
  {
     $.ajax({
        url: "<?=base_url()?>Staff/show_user_access",
        type: "POST",
       	data:{id:id,name:name},
       	beforeSend: function() {
            $(".modal-content").html('<center><p style="color:green; padding: 50px;">Please Wait for response........</p></center>');
        	
       },
        success: function(result) {
          $('.modal-content').html(result);
          
        },
      })
  }
</script>
  <script>
   function changevidhansabha(id, changeid, text) {      
      $.ajax({
        url: "<?=base_url()?>master/changedropdown",
        type: "POST",
        data: {
        	id : id,
          	text: text
        },
        success: function(result) {
          $("#"+changeid).html(result);
        },
      })
  }
</script>
 
<script type="text/javascript">
    function archiveFunction(admin_user_id,admin_email) {
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
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: "<?= base_url() ?>Staff/deletestaff",
                        type: "post",
                        data: {
                            admin_user_id: admin_user_id
                        },
                        success: function() {
                            swal('Record Deleted 🙂', ' ', 'success');
							  setTimeout(function() {
                            location.reload(true);
                        }, 1000);
                        },
                        error: function() {
                            swal('Record Not Deleted ☹️', 'error');
                        }
                    });
                } else {
                    swal("Cancelled", "User Account is safe 🙂", "error");
                }
            });
    }
</script>
<script type="text/javascript">
    function holdModal(exampleModalgrid) {
        $('#' + exampleModalgrid).modal({
            backdrop: 'static',
            keyboard: false,
            show: true
        });
    }
</script>
<script>
    //  add modal
    $(document).on('submit', '#addSubadmin', function(ev) {
        $('.error').html('');
        ev.preventDefault(); // Prevent browers default submit.
        var formData = new FormData(this);
        var error = false;
        var subname = $('#sub_name').val();
        var subemail = $('#sub_email').val();
        var subpassword = $('#sub_password').val();
        var subcontact = $('#sub_contact').val();
      	var jila_id = $('#jila_id').val();
        var user_role = $('#user_role').val();
      	 if (user_role == '') {
            $('#role_Error').html('भूमिका चुनना अनिवार्य है |');
            $('.error').css('color', 'red');
            error = true;
            // alert("hi");
        }
      	if(user_role == 'Executive')
        {
        	if (jila_id == '') {
            $('#jila_Error').html('जिला चुनना अनिवार्य है |');
            $('.error').css('color', 'red');
            error = true;
            // alert("hi");
        }
        
        }
      	
        if (subname == '') {
            $('#subnameError').html('नाम अनिवार्य है |');
            $('.error').css('color', 'red');
            error = true;
            // alert("hi");
        }
        if (subemail == '') {
            $('#subemailError').html('ईमेल अनिवार्य है |');
            $('.error').css('color', 'red');
            error = true;
            // alert("hi");
        }
        if (subpassword == '') {
            $('#subpassError').html('पासवर्ड अनिवार्य है |');
            $('.error').css('color', 'red');
            error = true;
            // alert("hi");
        }
        if (subcontact == '') {
            $('#subcontactError').html('मोबाइल नंबर अनिवार्य है |');
            $('.error').css('color', 'red');
            error = true;
            // alert("hi");
        }
       
        if (error == false) {
            $.ajax({
                url: "<?= base_url('staff/addsubadmin'); ?>",
                type: 'post',
                data: formData,
                success: function(result) {
                    var dataResult = JSON.parse(result);

                    // if(dataResult.done == '1'){
                    //     alert("hello");
                    // }
                    if (dataResult.done == '1') {

                        swal('Subadmin Added Successfully 🙂', ' ', 'success');
                        setTimeout(function() {
                            location.reload(true);
                        }, 1000);
                    }
                    if (dataResult == '0') {

                        swal('Subadmin Not Added ☹️', ' ', 'success');
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
    $(document).ready(function() {
        $('.editmodel').click(function() {
            var id = $(this).data('id');
			var role = $(this).data('role');
          $.ajax({
                url: "<?= base_url('Staff/staff_edit'); ?>",
                type: "post",
                data: {
                    id: id,
                  	role:role
                },
                success: function(response) {
                    $('.modal-content').html(response);
                    
                }
            })
        });
    });
</script>
<script type="text/javascript">
    // update modal
    $(document).on('submit', '#bannerModelSubmits', function(ev) {
        ev.preventDefault(); // Prevent browers default submit.
        var formData = new FormData(this);
        $.ajax({
            url: "<?= base_url() ?>Subadmin/updatesubadmi/",
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
                } else {}
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
    function disableaccount(admin_user_id,status) {
        event.preventDefault(); // prevent form submit
        var form = event.target.form; // storing the form
        swal({
                title: "Are you sure?",
                text: status + "Account",
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
                        url: "<?= base_url() ?>Staff/updatestatus",
                        type: "post",
                        data: {
                            admin_user_id: admin_user_id,
                          	status:status
                        },
                        success: function() {
                            swal('Account '+status+ '🙂', ' ', 'success');
                            $("#delete" + admin_user_id).fadeTo("slow", 0.7, function() {
                                $(this).remove();
                            })
                            setTimeout(function() {
                                location.reload(true);
                            }, 1000);
                        },
                        error: function() {
                            swal('Satus Not Updated ☹️', 'error');
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
            url: "<?= base_url() ?>staff/changesubpass",
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