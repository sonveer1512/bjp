<?php $this->load->view('admin/link.php'); ?>
<!-- Begin page -->
<div id="layout-wrapper">

    <?php $this->load->view('admin/topar.php'); ?>
    <?php $this->load->view('admin/imgheader.php'); ?>
    <?php $this->load->view('admin/sidebar.php'); ?>
</div>


<div class="vertical-overlay"></div>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable({
            dom: 'Bfrtip',
            buttons: [

                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        });

    });
</script>
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
                        <h4 class="mb-sm-0">Follow Lead Data</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                <li class="breadcrumb-item active">Follow Lead Data</li>
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
                            <h4 class="card-title mb-0 flex-grow-1">Follow Lead Data</h4>

                            <div class="flex-shrink-0"> <button type="button" data-toggle="tooltip" data-placement="bottom" title="Upload Data" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="ri-upload-cloud-2-line"></i></button>

                                <button type="button" class="btn btn-primary waves-effect waves-light btn-icon waves-effect waves-light"><i class="ri-mail-send-line"></i></button>
                                <button type="button" class="btn btn-primary waves-effect waves-light btn-icon waves-effect waves-light" data-toggle="tooltip" data-placement="bottom" title="Click here for lead data" data-bs-toggle="modal" data-bs-target="#followdata"><i class="ri-menu-add-line"></i></button>

                            </div>
                        </div><!-- end card header -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-body text-center p-5">
                                        <lord-icon src="https://cdn.lordicon.com/qduilmpq.json" trigger="loop" style="width:100px;height:100px">
                                        </lord-icon>

                                        <div class="mt-4">
                                            <h4 class="mb-3">Upload Your Excel Here</h4>
                                            <a href="<?php echo base_url(); ?>Sample/follow lead sample.xlsx" download> <button type="button" data-toggle="tooltip" data-placement="bottom" title="Upload Sample Data" class="btn btn-primary waves-effect waves-light"><i class="ri-download-cloud-2-line"></i></button></a><br><br>
                                            <form method="POST" action="<?php base_url() ?>followleaddata" enctype="multipart/form-data">
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


                        <div class="modal fade" id="followdata" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                    <div class="modal-body text-center p-5">


                                        <div class="mt-4">
                                            <h4 class="mb-3">Follow Up Updated Data</h4>

                                            <form method="POST" action="<?php base_url() ?>followleaddata" enctype="multipart/form-data">
                                                <br><br>
                                                <table class="table table-borderless table-centered align-middle table-nowrap mb-0" id="example" class="display">
                                                    <thead class="text-muted table-light">
                                                        <tr>
                                                            <th scope="col">ID</th>
                                                            <th scope="col">Name</th>

                                                            <th scope="col">Remarks</th>
                                                            <th scope="col">Next Date</th>
                                                            <th scope="col">Status</th>

                                                            <th scope="col">Created At</th>


                                                        </tr>
                                                    </thead>

                                                    <tbody>

                                                        <?php

                                                        foreach ($follow->result() as $row) {
                                                        ?>
                                                            <tr id="delete<?php echo $row->follow_id; ?>">

                                                                <td><a href="#" class="fw-medium"><?php echo $row->follow_id; ?></a></td>
                                                                <td><?php $follow_name =  $row->follow_user_id;
                                                                    $this->db->select('*');
                                                                    $this->db->from('caller_follow_lead');
                                                                    $this->db->where('c_follow_id', $follow_name);
                                                                    $rows1 = $this->db->get()->row();
                                                                    if ($rows1 > '0') {
                                                                        echo $rows1->c_follow_name;
                                                                    }
                                                                    ?></td>
                                                                <td><?php echo $row->follow_remarks; ?></td>
                                                                <td><?php echo $row->follow_up_date; ?></td>
                                                                <td><?php echo $row->follow_up_status; ?></td>

                                                                <td>

                                                                    <?php echo $row->follow_up_created_at; ?></td>
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
                                <form>
                                    <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                        <thead class="text-muted table-light">
                                            <tr>
                                                <th>ID</th>
                                                <th>नाम</th>
                                                <th>पिता का नाम</th>
                                                <th>धर्म</th>
                                                <th>जाति</th>
                                                <th>मोबाइल न.</th>
                                                <th>व्हाट्सएप नंबर</th>
                                                <th>पहचान प्रमाण</th>
                                                <th>आधार कार्ड नंबर</th>
                                                <th>वोटर आईडी नंबर</th>
                                                <th>विवाहित</th>
                                                <th>विवाह की तिथि</th>
                                                <th>जन्म तिथि</th>
                                                <th>सदस्यता वर्ष</th>
                                                <th>वर्तमान में पार्टी में पद</th>
                                                <th>पूर्व में पार्टी में पद</th>
                                                <th>वर्तमान में आप वल्लभ नगर विधान सभा में रहते है?</th>
                                                <th>अगर नहीं, तो किस शहर में रहते है?</th>
                                                <th>गतिविधि</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php

                                            foreach ($useruploaddata->result() as $row) {


                                            ?>
                                                <tr id="delete<?php echo $row->c_follow_id; ?>">

                                                    <td><a href="#" class="fw-medium"><?php echo $row->c_follow_id; ?></a></td>
                                                    <td><?php echo $row->c_follow_name; ?></td>
                                                    <td><?php echo $row->c_follow_email; ?></td>
                                                    <td><?php echo $row->c_follow_contact; ?></td>
                                                    <td><?php echo $row->c_follow_address; ?></td>
                                                    <td>
                                                        <select class="form-select form-control" name="followstatus" onchange="followstatus1(this.value, <?= $row->c_follow_id ?>)">
                                                            <option value="Responding"><?php echo $row->c_follow_status; ?></option>
                                                            <option value="Not Responding">Not Responding</option>
                                                            <option value="Follow Up">Follow Up</option>
                                                            <option value="Send Quotaion">Send Quotation</option>
                                                            <option value="Call Later">Call Later</option>

                                                        </select>
                                                    </td>
                                                    <td>

                                                        <?php echo $row->c_follow_created_at; ?></td>



                                                    <?php if ($this->rbac->hasPrivilege('customer', 'can_edit')) { ?>
                                                        <td>

                                                            <i class="ri-edit-box-line editmodel" style="color: blue;" class="" data-bs-toggle="modal" data-bs-target="#editsubadmin" data-id="<?php echo $row->c_follow_id; ?>"></i>

                                                        </td>
                                                    <?php } ?>

                                                    <?php if ($this->rbac->hasPrivilege('customer', 'can_delete')) { ?>
                                                        <td>
                                                            <i class="ri-delete-bin-line" name="archive" class="remove" type="submit" onclick="archiveFunction(<?php echo $row->c_follow_id ?>)" data-toggle="tooltip" data-placement="bottom" style="color: red;"></i>


                                                        </td>
                                                    <?php } ?>




                                                </tr>



                                            <?php } ?>
                                        </tbody>
                                    </table><!-- end table -->
                                </form>
                            </div>
                        </div>
                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->



        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
    <div class="modal fade" id="responding_modal" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">Customer Response</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" onClick="window.location.reload();" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="successs"></div>
                    <form method="POST" id="resremark">
                        <input type="hidden" id="hidden_id" name="follow_id">
                        <label for="passwordInput" class="form-label">Remark</label>
                        <textarea class="form-control" placeholder="Enter Here Responding Remark" name="resremark"></textarea><br>

                        <input type="hidden" name="status" class="form-control" id="status" value="str">
                        <label for="passwordInput" class="form-label">Next Follow Up Date</label>
                        <input type="date" class="form-control" name="date"><br>

                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="callLater" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">Call Later</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" onClick="window.location.reload();" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="successs"></div>
                    <form method="POST" id="callLaterRemark">
                        <textarea class="form-control" placeholder="Enter Here Responding Remark" name="callLaterRemark"></textarea><br>

                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editsubadmin" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">Edit Confirm Intrested Data</h5>
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
                            </div>
                            <!--end col-->

                            <div class="col-xxl-6">
                                <div>
                                    <label for="emailInput" class="form-label">Contact</label>
                                    <input type="number" class="form-control" id="emailInput" placeholder="Enter your Contact">
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-6">
                                <div>
                                    <label for="lastName" class="form-label">Service</label>
                                    <select class="form-select form-control" name="">
                                        <option>Service One</option>
                                        <option>Service One</option>
                                        <option>Service One</option>
                                        <option>Service One</option>
                                        <option>Service One</option>
                                    </select>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-6">
                                <div>
                                    <label for="lastName" class="form-label">Status</label>
                                    <select class="form-select form-control" name="">
                                        <option>Follow Up</option>
                                        <option>Follow Up</option>
                                        <option>Follow Up</option>
                                        <option>Follow Up</option>
                                        <option>Follow Up</option>
                                    </select>
                                </div>
                            </div>
                            <!--end col-->

                            <div class="col-xxl-6">
                                <div>
                                    <label for="passwordInput" class="form-label">Address</label>
                                    <textarea class="form-control" placeholder="Enter Your Address"></textarea>
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
<script src="<?= base_url() ?>/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>/assets/libs/simplebar/simplebar.min.js"></script>
<script src="<?= base_url() ?>/assets/libs/node-waves/waves.min.js"></script>
<script src="<?= base_url() ?>/assets/libs/feather-icons/feather.min.js"></script>
<script src="<?= base_url() ?>/assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
<script src="<?= base_url() ?>/assets/js/plugins.js"></script>

<!-- apexcharts -->
<script src="<?= base_url() ?>/assets/libs/apexcharts/apexcharts.min.js"></script>

<!-- Vector map-->
<script src="<?= base_url() ?>/assets/libs/jsvectormap/js/jsvectormap.min.js"></script>
<script src="<?= base_url() ?>/assets/libs/jsvectormap/maps/world-merc.js"></script>

<!--Swiper slider js-->
<script src="<?= base_url() ?>/assets/libs/swiper/swiper-bundle.min.js"></script>

<!-- Dashboard init -->
<script src="<?= base_url() ?>/assets/js/pages/dashboard-ecommerce.init.js"></script>

<!-- App js -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="<?= base_url() ?>/assets/js/app.js"></script>
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
            function(isConfirm) {
                if (isConfirm) {
                    swal("Deleted", "Your Record is deleted :)", "success");
                } else {
                    swal("Cancelled", "Oops!!! Try Again :)", "error");
                }
            });
    }


    function followstatus1(str, rowid) {

        if (str == 'Responding') {
            var id = $("#hidden_id").val(rowid);
            $("#status").val(str);


            $("#responding_modal").modal('show');
            $(document).on('submit', '#resremark', function(ev) {
                ev.preventDefault(); // Prevent browers default submit.
                var formData = new FormData(this);
                $.ajax({
                    url: "<?= base_url() ?>CallerAdmin/addrespond/",
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

                        } else {

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
        if (str == 'Not Responding') {

            var id = $("#hidden_id").val(rowid);
            $("#status").val(str);


            $("#responding_modal").modal('show');
            $(document).on('submit', '#resremark', function(ev) {
                ev.preventDefault(); // Prevent browers default submit.
                var formData = new FormData(this);
                $.ajax({
                    url: "<?= base_url() ?>CallerAdmin/addrespond/",
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

                        } else {

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
        if (str == 'Call Later') {
            $("#callLater").modal('show');
        }
        if (str == 'Follow Up') {


            var id = $("#hidden_id").val(rowid);
            $("#status").val(str);


            $("#responding_modal").modal('show');
            $(document).on('submit', '#resremark', function(ev) {
                ev.preventDefault(); // Prevent browers default submit.
                var formData = new FormData(this);
                $.ajax({
                    url: "<?= base_url() ?>CallerAdmin/addrespond/",
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

                        } else {

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
        if (str == 'Call Later') {
            $("#callLater").modal('show');
        }


        // update modal




    }
</script>
</body>


<!-- Mirrored from themesbrand.com/velzon/html/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 11 Mar 2022 09:52:42 GMT -->

</html>