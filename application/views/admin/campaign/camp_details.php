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
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>assets/js/pages/datatables.init.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#Datatable1').DataTable();
    });
</script>

<style>
    .campaign_class {
        display: none;
    }
  .hide_msg{
  	  display: none;
  }
  .hide_msg_1{
  	display: none;
  }
  .tab-content>.active {
    display: contents;
}
  .not_verified{
  display: none;
  }
  .verified{
  display: none;
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
                        <h4 class="mb-sm-0"> <?=$name;?> कैंपेन</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?php base_url() ?>Dashboard">डैशबोर्ड </a></li>
                                <li class="breadcrumb-item active"><?=$name;?> कैंपेन के मोबाइल नंबर की सूची  </li>
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
                            <h4 class="card-title mb-0 flex-grow-1 fs-14"><?=$name;?> कैंपेन के मोबाइल नंबर की सूची  </h4>
                          	<div class="flex-shrink" style="margin-right: 10px;">

                                <div class="input-group input-group-sm">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">कॉल स्थिति </span>
                                    <select class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="call_satus" onchange="call_filter()">
                                    <option value="all" selected>सभी </option>
                                  	<option value="busy">व्यस्त</option>
                                      <option value="not available">उपलब्ध नहीं</option>
                                      <option value="wrong number">संख्या अमान्</option>
                                      <option value="fake">नकली</option>
                                      <option value="identity">गलत पहचान</option>
                                    
                                </select>
                                </div>
                            </div>
                            <div class="flex-shrink" style="margin-right: 10px;">
								<!-- Input Group Sizing -->
                                <div class="input-group input-group-sm">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">नंबर की स्थिति</span>
                                    <select class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="is_verify" onchange="call_filter(); check_verification(this.value);">
                                     <option value="all" selected>सभी </option>
                                  	<option value="Verify">सत्यापित </option>
                                  	<option value="Not Verify">असत्यापित </option>
                                  
                                  
                                </select>
                                </div>
                                
                            </div>
                          
                          	<div class="flex-shrink verified" style="margin-right: 10px;">
								<!-- Input Group Sizing -->
                                <div class="input-group input-group-sm">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">सत्यापित की स्थिति चुनें</span>
                                    <select class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="verify_status" onchange="call_filter();">
                                     <option value="all" selected>सभी </option>
									 <option value="Suppoter">समर्थक है।</option>
                                     <option value="Neutral">न्यूट्रल है।</option>
                                     <option value="Suppoter not">समर्थक नहीं है।</option>
                                   </select>
                                </div>
                                
                            </div>
                          
                          	<div class="flex-shrink not_verified" style="margin-right: 10px;">
								<!-- Input Group Sizing -->
                                <div class="input-group input-group-sm">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">असत्यापित की स्थिति चुनें</span>
                                    <select class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="not_verify_status" onchange="call_filter();">
                                     <option value="all" selected>सभी </option>
                                  	<option value="busy">व्यस्त</option>
                                    <option value="not available">उपलब्ध नहीं</option>
                                    <option value="wrong number">संख्या अमान्</option>
                                    <option value="fake">नकली</option>
                                    <option value="identity">गलत पहचान</option>
                                  
                                </select>
                                </div>
                                
                            </div>

                            

                            <div class="flex-shrink" style="margin-right: 10px;">
                              
                              <!-- Input Group Sizing -->
                                <div class="input-group input-group-sm">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">सर्च करें </span>
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="मोबाइल नंबर लिखें  " id="numbersearch">
                                </div>

                            </div>

                            <div class="flex-shrink-0">

                               <!-- <?php if ($this->rbac->hasPrivilege('student_data', 'can_add')) { ?>
                                    <button type="button" data-toggle="tooltip" data-placement="bottom" title="Upload New Excel" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#staticBackdrop">एक्सेल अपलोड करें </button>
                                <?php } ?> -->
                              	<!-- <button type="button" class="btn btn-primary btn-label btn-sm waves-effect waves-light"><span class="label-icon align-middle fs-10 me-2">0</span>Call Resume</button> -->
                              <?php if($count_call_abort > 0){ ?>
                              <button type="button" class="btn btn-info btn-label btn-sm waves-effect right waves-light"><span class="label-icon align-middle fs-10 ms-2">(<?=$count_call_abort;?>)</span>रद्द कॉल फिर से  शुरू करें </button>
                             <?php } ?>
                              <button type="button" class="btn btn-success btn-label btn-sm waves-effect right waves-light" data-bs-toggle="modal" data-bs-target="#editsubadmin" onclick="initiate_call();" <?php if($count_call_status_not == $count_call_initiate){echo 'disabled';} ?>><span class="label-icon align-middle fs-10 ms-2">(<?=$count_call_status_not?>/<?=$count_call_initiate;?>)</span>कॉल आरम्भ करें</button>
                             <!-- <button class="btn btn-sm btn-info edit-item-btn" data-bs-toggle="modal" data-bs-target="#showModal" style="border-radius: 50%;"><i class="las la-sync" style="font-size: 20px;"></i></button> -->
							<input type="hidden" id="id" name="id" value="<?=$id;?>">
                              <input type="hidden" id="call_type" name="call_type" value="initiate_call">
                            </div>
                           </div><!-- end card header -->
                      	
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-body">
									
                                    <div class="table-responsive">
                                        <div class="row">
                                            <div class="col-sm-12">
												
                                                <table class="table table-bordered dt-responsive nowrap table-striped align-middle dataTable no-footer dtr-inline" aria-describedby="fixed-header_info">
                                                    <thead>
                                                        <tr>
                                                           <!-- <th scope="col">
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input select_all" id="select_all" />
                                                                    <label class="form-check-label" for="select_all"></label>
                                                                </div>
                                                            </th> -->

                                                   		 <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 606.4px;" aria-label="SR No.: activate to sort column ascending">क्रमांक</th>
                                                            <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 538.4px;" aria-label="ID: activate to sort column ascending">मोबाइल नंबर</th>
                                                            <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 906.4px;" aria-label="Purchase ID: activate to sort column ascending">कॉल की दिनांक व समय </th>
                                                            <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 538.4px;" aria-label="User: activate to sort column ascending">कॉल की SID</th>
                                                            <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 538.4px;" aria-label="Assigned To: activate to sort column ascending">कॉल किसे की गयी </th>
                                                            <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 538.4px;" aria-label="Assigned To: activate to sort column ascending">कॉल किस से की गयी</th>
                                                            <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 538.4px;" aria-label="Assigned To: activate to sort column ascending">कॉल की स्थिति</th>
                                                            <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 538.4px;" aria-label="Assigned To: activate to sort column ascending">कॉल प्रारम्भ का समय</th>
                                                            <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 538.4px;" aria-label="Assigned To: activate to sort column ascending">कॉल अंत समय</th>
                                                            <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 538.4px;" aria-label="Assigned To: activate to sort column ascending">कॉल की अवधि</th>
                                                            <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 538.4px;" aria-label="Assigned To: activate to sort column ascending">कॉल की कीमत</th>
                                                            <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 538.4px;" aria-label="Assigned To: activate to sort column ascending">पाथ</th>
                                                            <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 538.4px;" aria-label="Assigned To: activate to sort column ascending">रिकॉर्डिंग पाथ</th>
                                                            <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 538.4px;" aria-label="Assigned To: activate to sort column ascending">सत्यापित / असत्यापित </th>
                                                            <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 538.4px;" aria-label="Assigned To: activate to sort column ascending">सत्यापित / असत्यापित की स्थिति</th>
                                                            <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 538.4px;" aria-label="Assigned To: activate to sort column ascending">टिप्पणी</th>

                                                        </tr>

                                                    </thead>
                                                    <tbody id="filter_data">

                                                        <?php
                                                        $i = 1;
                                                        if (!empty($content)) {
                                                            foreach ($content as $row) {
                                                        ?>
                                                       
                                                                <tr class="odd" style="background-color: <?php if($row['Status'] == 'completed') { echo '#11942e'; } else { echo 'white';} ?>">
                                                                   <!-- <td scope="col">
                                                                        <div class="form-check">
                                                                            <input type="checkbox" class="form-check-input check_class checkbox" id="id_1" name="camp_id[]" value="<?= $row['id'] ?>">
                                                                            <label class="form-check-label" for="cardtableCheck01"></label>
                                                                        </div>
                                                                    </td> -->
                                                                    <td><?php echo $i; ?></td>
                                                                    <td><?php if (!empty($row['mobile'])) { ?><?php echo $row['mobile'] ?> <?php } ?></td>
                                                                  	<td><?php if (!empty($row['DateCreated'])) { ?><?php echo $row['DateCreated'] ?> <?php } ?></td>
                                                                    <td><?php if (!empty($row['Sid'])) { ?><?php echo $row['Sid'] ?> <?php } ?></td>
                                                                    <td><?php if (!empty($row['call_To'])) { ?><?php echo $row['call_To'] ?> <?php } ?></td>
                                                                    <td><?php if (!empty($row['call_From'])) { ?><?php echo $row['call_From'] ?> <?php } ?></td>
                                                                  	<td><?php if (!empty($row['Status'])) { ?><?php echo $row['Status'] ?> <?php } ?></td>
                                                                    <td><?php if (!empty($row['StartTime'])) { ?><?php echo $row['StartTime']; ?> <?php } ?></td>
                                                                    <td><?php if (!empty($row['EndTime'])) { ?><?php echo $row['EndTime']; ?> <?php } ?></td>
                                                                    <td><?php if (!empty($row['Duration'])) { ?><?php echo $row['Duration']; ?> <?php } ?></td>
                                                                    <td><?php if (!empty($row['Price'])) { ?><?php echo $row['Price']; ?> <?php } ?></td>
                                                                    <td><?php if (!empty($row['Uri'])) { ?><?php echo $row['Uri']; ?> <?php } ?></td>
                                                                    <td><?php if (!empty($row['RecordingUrl'])) { ?><?php echo $row['RecordingUrl']; ?> <?php } ?></td>
                                                                    <td><?php if (!empty($row['is_verified'])) { ?><?php echo $row['is_verified']; ?> <?php } ?></td>
                                                                    <td><?php if (!empty($row['is_verify_satus'])) { ?><?php echo $row['is_verify_satus']; ?> <?php } ?></td>
                                                                    <td><?php if (!empty($row['remark'])) { ?><?php echo $row['remark']; ?> <?php } ?></td>
                                                                    
                                                                </tr>
                                                        <?php $i++;
                                                            }
                                                        } ?>
                                                    </tbody>
                                                </table>
                                                <!-- pagination start -->
                                               <div class="align-items-center mt-2 row g-3 text-center text-sm-start">
                                                    <div class="col-sm">
                                                        <div class="text-muted">Showing<span class="fw-semibold"> <?= isset($count) ?> -
                                                                <?= isset($count) ? $count : ''; ?></span> Results
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-auto">
                                                        <ul class="pagination mb-0" >
                                                            <?php  $id = $this->uri->segment(3);
                                                          	$uri = $this->uri->segment(4); ?>

                                                            <?php for ($i = 0; $i < ($count / 10); $i++) { ?>
                                                                <li class="page-item <?php if (($uri == '') && ($i + 1 == 1)) {
                                                                                            echo 'active';
                                                                                        } else if ($uri == ($i + 1)) {
                                                                                            echo 'active';
                                                                                        } ?>">

                                                                    <a href="<?= base_url() ?>Campaign/camp_details/<?=$id?>/<?= $i + 1 ?>" class="page-link" style="<?php if ($uri == '') {
                                                                                                                                                                if ($i + 1 == 1) {
                                                                                                                                                                    echo 'pointer-events: none;';
                                                                                                                                                                }
                                                                                                                                                            } else if ($uri == $i + 1) {
                                                                                                                                                                echo 'pointer-events: none;';
                                                                                                                                                            } ?>"><?= $i + 1 ?></a>
                                                                </li>
                                                            <?php } ?>

                                                            <?php if ($i > $uri) { ?>
                                                                <li class="page-item">
                                                                    <a href="<?= base_url() ?>Campaign/camp_details/<?=$id?>/<?= $uri + 1 ?>" class="page-link">→</a>
                                                                </li>
                                                            <?php } ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!-- paginaton end -->
                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>




                        <div class="card-body">
                            <div class="live-preview">

                            </div><!-- end card -->
                        </div><!-- end col -->
                    </div><!-- end row -->


                </div>
                <!-- container-fluid -->
            </div>



            <!-- pass -->

        </div>
    </div>

    <div class="modal fade" id="editsubadmin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-center p-5">

                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('admin/footer');  ?>
</div>

<!--<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<!--datatable js-->


<!-- App js -->
<script src="https://themesbrand.com/velzon/html/default/assets/js/pages/notifications.init.js"></script>
<script src="https://themesbrand.com/velzon/html/default/assets/libs/prismjs/prism.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script type="text/javascript">
    function archiveFunction(id) {
        event.preventDefault(); // prevent form submit

        var form = event.target.form; // storing the form
        swal({
                title: "Are you sure?",
                text: "Delete Team Leader ",
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
                        url: "<?= base_url() ?>team_leader/delete/id",
                        type: "post",
                        data: {
                            id: id
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
    $(document).on('submit', '#upload_excel', function(ev) {
        $('.error').html('');

        ev.preventDefault(); // Prevent browers default submit.
        var formData = new FormData(this);
        var error = false;
        var gram_panchayat = $('#gram_panchayat').val();
        var booth_no = $('#booth_no').val();
        var uploadFile = $('#uploadFile').val();
        if (uploadFile == '') {
            $('#uploadError').html('Select Excel for upload');
            $('.error').css('color', 'red');
            error = true;
        }

        if (gram_panchayat == '') {
            $('#gram_Error').html('Select Gram Panchayat');
            $('.error').css('color', 'red');
            error = true;
        }
        if (booth_no == '') {
            $('#booth_Error').html('Select Booth no');
            $('.error').css('color', 'red');
            error = true;
        }

        if (error == false) {
            $.ajax({
                url: "<?= base_url(); ?>Newuploadeddata/upload",
                type: 'post',
                data: formData,
                beforeSend: function() {
                    $(".datasend").html('<lord-icon src="https://cdn.lordicon.com/xjovhxra.json" trigger="loop" colors="primary:#109121" style="width:50px;height:50px;"></lord-icon>');

                },
                success: function(result) {
                    var dataResult = JSON.parse(result);
                    if (dataResult.inserted == 1) {
                        swal('Excel Uploaded 🙂', ' ', 'success');
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
        $('.editmodel').click(function() {

            var id = $(this).data('id');

            $.ajax({
                url: "<?= base_url('manager/openeditmodel'); ?>",
                type: "post",
                data: {
                    id: id
                },
                success: function(response) {

                    $('.modal-body').html(response);
                    $('.bannerData').modal('show');

                }
            })


        });
    });
</script>
<script type="text/javascript">
    // update modal
    $(document).on('submit', '#editteamleader', function(ev) {
        ev.preventDefault(); // Prevent browers default submit.
        var formData = new FormData(this);
        $.ajax({
            url: "<?= base_url() ?>manager/updateteamleader/",
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
</script>

<script>
    function call_filter() {
      var is_verify = $('#is_verify').val();
      var verify_status = $('#verify_status').val();
      if(verify_status == 'all')
      {
        var_st = '';
      }
      else{
      	var_st = verify_status;
      }
      var not_verify_status = $('#not_verify_status').val();
      if(not_verify_status == 'all')
      {
        var_st_not = '';
      }
      else{
      	var_st_not = not_verify_status;
      }
      var is_verify_satus = $('#is_verify_satus').val();
      var id = $('#id').val();
        $.ajax({
            method: 'post',
            url: "<?= base_url('Campaign/call_filter_data'); ?>",
            data: {
                is_verify: is_verify,is_verify_satus:is_verify_satus,id:id,var_st:var_st,var_st_not:var_st_not
            },
            success: function(response) {
                $('#filter_data').html(response);

            }
        })
    }

    function get_booth(id) {
        $.ajax({
            url: '<?= base_url() ?>Newuploadeddata/getbooth/' + id,
            success: function(res) {

                $(".get_booth").html(res.output);

            },
            error: function() {
                alert("Fail")
            }
        });
    }

    function filter_booth_no(booth_no) {
        var gram_pan_id = $('#gram_pan_id').val();
        $.ajax({
            url: '<?= base_url() ?>Newuploadeddata/filter',
            type: "post",
            data: {
                gram_pan_id: gram_pan_id,
                booth_no: booth_no
            },
            success: function(response) {
                $('#filter_data').html(response);

            },
            error: function() {
                alert("Fail")
            }
        });

    }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
<script>
    $('.search_1').typeahead({
        source: function(query, result) {
            var gram_pan_id = $('#gram_pan_id').val();
            var booth_no = $('#booth_no').val();
            $.ajax({
                url: "<?= base_url() ?>Newuploadeddata/get_name_contact",
                method: "POST",
                data: {
                    query: query,
                    gram_pan_id: gram_pan_id,
                    booth_no: booth_no
                },
                dataType: "json",
                success: function(data) {
                    result($.map(data, function(item) {
                        return item;
                    }));

                },
            })
        },
        afterSelect: function(item) {
            var items = JSON.parse(JSON.stringify(item));
            var gram_pan_id = $('#gram_pan_id').val();
            var booth_no = $('#booth_no').val();

            $.ajax({
                url: "<?= base_url('Newuploadeddata/get_data_after_search'); ?>",
                type: "post",
                data: {
                    items: items,
                    gram_pan_id: gram_pan_id,
                    booth_no: booth_no
                },
                success: function(response) {
                    $('#filter_data').html(response);

                }
            })
        }
    });

    function show_call(to_number) {
        $.ajax({
            url: "<?= base_url('master/calling'); ?>",
            type: "post",
            data: {
                to_number: to_number
            },
            success: function(response) {
                $('.modal-body').html(response);

            }
        })
    }
</script>

<script>
  let fruits = [];
    $('#select_all').on('click', function() {
        if (this.checked) {
            $('.check_class').each(function() {
              	 fruits.push($(this).val());
                this.checked = true;
            });
			
            $("#sel_data").html(fruits.length);
        } else {
            $('.check_class').each(function() {
              	var index = fruits.indexOf($(this).val());
            if (index !== -1) {
              fruits.splice(index, 1);
            }
                this.checked = false;
            });

            $("#sel_data").html('0');
        }
    });
  
 
    
    $('.checkbox').on('click', function() {
        if ($('.checkbox:checked').length == $('.checkbox').length) {
            $('#select_all').prop('checked', true);
        } else {
            $('#select_all').prop('checked', false);
        }
        
        
        if ($(this).is(':checked')) {
            fruits.push($(this).val());
          	$("#sel_data").html(fruits.length);
        }else{
            var index = fruits.indexOf($(this).val());
            if (index !== -1) {
              fruits.splice(index, 1);
              
            }
        }
		
    });
</script>

<script>
  function initiate_call()
  {
    var id = $('#id').val();
    var call_type = $('#call_type').val();
  	$.ajax({
            url: "<?= base_url('master/calling_1'); ?>",
            type: "post",
            data: {
                call_type: call_type,
              	id:id
            },
            success: function(response) {
              	 $('.modal-body').html(response);
            }
        })
  
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
      
      	formData.append('fruits', JSON.stringify(fruits));
      	
        if (error == false) {
            $.ajax({
                url: "<?= base_url('Newuploadeddata/addcamp'); ?>",
                type: 'post',
                data: formData,
                success: function(result) {
                    var dataResult = JSON.parse(result);
                    if (dataResult.done == '1') {
						$('.collapse').collapse('hide');
                      	$('.hide_msg').css('display','block');
                      	$('.hide_msg').css('display','block');
                        $('.msg_add').html(dataResult.msg);
                        $('.msg_add2').html(dataResult.msg2);
                        setTimeout(function() {
                          $('.hide_msg').css('display','none');
                          $('.msg_add').html('');
                        }, 3000);
                        get_compaign();
                      	
                      	

                    }else
                   	  {
                      	$('.hide_msg').css('display','none');
                      	$('.hide_msg').css('display','block');
                        $('.msg_add2').html(dataResult.msg);
                      	setTimeout(function() {
                          $('.hide_msg').css('display','none');
                          $('.msg_add2').html('');
                        }, 3000);
                       
                    }
                },
                cache: false,
                contentType: false,
                processData: false,
            })
        }
    })
</script>

<script>
  function add_to_compaign(id)
  {
   	$.ajax({
            url: "<?= base_url('Newuploadeddata/add_to_compaign'); ?>",
            type: "post",
            data: {
                fruits: fruits,
              	id:id
            },
            success: function(response) {
              	var dataResult = JSON.parse(response);
              	if (dataResult.done == '1') {
              		$('.hide_msg').css('display','block');
                  	$('.msg_add').html(dataResult.msg);
                  	$('.msg_add2').html(dataResult.msg2);
              		setTimeout(function() {
                      $('.hide_msg').css('display','none');
                      $('.msg_add').html('');
                      window.location.href = '<?=base_url() ?>Campaign/'+id;
                    }, 3000);
                  
                }
            }
        })
  }
  
  function check_verification(val)
  {
  	if(val == 'Verify')
    {
    	$('.verified').css('display','block');
      	$('.not_verified').css('display','none');
    }
    else{
    	$('.not_verified').css('display','block');
      	$('.verified').css('display','none');
    }
    if(val=='all')
    {
    	$('.not_verified').css('display','none');
      	$('.verified').css('display','none');
    }
  
  
  }
  
  </script>

</body>

</html>