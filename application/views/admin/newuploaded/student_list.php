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
</style>

<div class="vertical-overlay"></div>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">नए डाले हुए डाटा </h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?php base_url() ?>Dashboard">डैशबोर्ड </a></li>
                                <li class="breadcrumb-item active">नए डाले हुए डाटा </li>
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
                            <h4 class="card-title mb-0 flex-grow-1">नए डाले हुए डाटा</h4>
                            <div class="flex-shrink" style="margin-right: 10px;">

                                <select class="form-control form-select" id="gram_pan_id" onchange="filter_gram_pan(this.value),get_booth(this.value)">
                                    <option value="all" selected>सभी ग्राम </option>
                                    <?php if (!empty($filter_gram)) {
                                        foreach ($filter_gram as $val) {
                                            $sql = $this->student_model->list_common_where3('grampanchyat', 'id', $val['gram_panchayat_id']); ?>
                                            <option value="<?= $sql[0]['id'] ?>"><?= $sql[0]['gram_panchyat'] ?></option>
                                    <?php }
                                    } ?>
                                </select>
                            </div>

                            <div class="flex-shrink" style="margin-right: 10px;">

                                <select class="form-control form-select get_booth" id="booth_no" onchange="filter_booth_no(this.value)">
                                    <option value="all" selected>सभी बूथ </option>
                                    <?php if (!empty($filter_booth)) {
                                        foreach ($filter_booth as $val) { ?>
                                            <option value="<?= $val['booth_select'] ?>"><?= $val['booth_select'] ?></option>
                                    <?php }
                                    } ?>
                                </select>
                            </div>

                            <div class="flex-shrink" style="margin-right: 10px;">

                                <input type="text" class="form-control search_1" placeholder="नाम या मोबाइल नंबर लिखें  ">
                            </div>

                            <div class="flex-shrink-0">

                                <?php if ($this->rbac->hasPrivilege('student_data', 'can_add')) { ?>
                                    <button type="button" data-toggle="tooltip" data-placement="bottom" title="Upload New Excel" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#staticBackdrop">एक्सेल अपलोड करें </button>
                                <?php } ?>

                            </div>
                            <div class="flex-shrink" style="margin-left: 10px;">
                                <button type="button" class="btn btn-primary waves-effect waves-light campaign_class" data-bs-toggle="modal" data-bs-target="#open_campaign_popup">कैंपेन में जोड़ें </button>
                            </div>

                        </div><!-- end card header -->


                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-body text-center p-5">
                                        <lord-icon src="https://cdn.lordicon.com/qduilmpq.json" trigger="loop" style="width:100px;height:100px">
                                        </lord-icon>

                                        <div class="mt-4">
                                            <h4 class="mb-3">अपनी एक्सेल यहाँ अपलोड करें </h4>
                                            <a href="<?php echo base_url(); ?>Sample/sample_student_data.xlsx" download> <button type="button" data-toggle="tooltip" data-placement="bottom" title="Upload Sample Data" class="btn btn-primary waves-effect waves-light">एक्सेल का प्रारूप </button></a><br><br>
                                            <form method="POST" id="upload_excel" enctype="multipart/form-data">
                                                <div class="col-md-12">

                                                    <select class="form-control form-select" id="gram_panchayat" name="gram_panchayat">
                                                        <option value="" selected>ग्राम पंचायत चुनें </option>
                                                        <?php if (!empty($gram_panchayat)) {
                                                            foreach ($gram_panchayat as $val) { ?>
                                                                <option value="<?= $val['id'] ?>"><?= $val['gram_panchyat'] ?></option>
                                                        <?php }
                                                        } ?>
                                                    </select>
                                                    <div class="error" id="gram_Error"></div>
                                                </div><br>
                                                <div class="col-md-12">
                                                    <select class="form-control form-select" id="booth_no" name="booth_no">
                                                        <option value="" selected>बूथ नंबर चुनें </option>
                                                        <?php if (!empty($booth_no)) {
                                                            foreach ($booth_no as $val2) { ?>
                                                                <option value="<?= $val2['booth_no'] ?>"><?= $val2['booth_no'] ?></option>
                                                        <?php }
                                                        } ?>
                                                    </select>
                                                    <div class="error" id="booth_Error"></div>
                                                </div><br>
                                                <div class="col-md-12">
                                                    <input type="file" class="form-control" id="uploadFile" name="uploadFile" placeholder="Select Your File" accept=".xls, .xlsx">
                                                    <div class="error" id="uploadError"></div>
                                                </div><br>
                                                <div class="hstack gap-2 datasend justify-content-center">
                                                    <a href="#" class="btn btn-danger " data-bs-dismiss="modal"> रद्द करें </a>

                                                    <input type="submit" name="fileuploadsubmit" class="btn btn-primary " value="अपलोड करें ">
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="modal fade" id="open_campaign_popup" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl modal-dialog-centered  modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <div class="alert alert-success rounded-0 mb-0 hide_msg" style="margin-left: 198px;">
                                       <p class="mb-0 msg_add"></p>
                                     </div>
                                    <div class="alert alert-danger rounded-0 mb-0 hide_msg" >
                                       <p class="mb-0 msg_add2" style="color:red;"></p>
                                     </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onClick="window.location.reload();"></button>
                                    </div>
                                  
                                    <div class="modal-body text-center p-5">
                                        <div class="row" style="margin-top: -44px;">
                                            <div class="col-xl-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="tab-content">
                                                            <div class="tab-pane fade show active" id="pills-gen-info" role="tabpanel" aria-labelledby="pills-gen-info-tab">
                                                                <div>
                                                                    <!-- Collapse Example -->
                                                                    <div class="hstack gap-2 flex-wrap mb-3">
                                                                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                                                            नया कैंपेन जोड़ें
                                                                        </button>
                                                                    </div>
																	
                                                                    <div class="collapse" id="collapseExample">
                                                                        <div class="card mb-0">
                                                                            <div class="card-body">

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
                                                                                                <label for="firstName" class="form-label">कैंपेन की दिनांक व समय </label>
                                                                                                <input type="datetime-local" class="form-control" name="date_time" id="date_time" placeholder="कैंपेन का नाम">
                                                                                            </div>
                                                                                            <div class="error" id="date_timeError"></div>
                                                                                        </div>

                                                                                        <!--end col-->
                                                                                        <div class="col-xxl-12">
                                                                                            <div>
                                                                                                <label for="lastName" class="form-label">कैंपेन का विवरण</label>
                                                                                                <textarea name="description" class="blog_desc form-control" placeholder="कैंपेन का विवरण"></textarea>
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
																<div class="row">
                                                                      <div class="col-md-12" >
                                                                        <div class="live-preview">
                                                                              <div class="table-responsive">
                                                                                  <table class="table table-striped table-nowrap align-middle mb-0">
                                                                                      <thead>
                                                                                          <tr>
                                                                                              <th scope="col">क्रमांक</th>
                                                                                              <th scope="col">कैंपेन का नाम</th>
                                                                                              <th scope="col">कैंपेन की दिनांक व समय</th>
                                                                                              <th scope="col">कैंपेन का विवरण</th>
                                                                                              <th scope="col">कार्य </th>
                                                                                          </tr>
                                                                                      </thead>
                                                                                      <tbody id="list_compaign">
                                                                                       <script>
                                                                                         get_compaign()
                                                                                         function get_compaign()
                                                                                         {
                                                                                         	$.ajax({
                                                                                                  method: 'post',
                                                                                                  url: "<?= base_url('Newuploadeddata/get_comp'); ?>",
                                                                                                  success: function(response) {
                                                                                                      $('#list_compaign').html(response);

                                                                                                  }
                                                                                              })
                                                                                         
                                                                                         }
                                                                                        </script>
                                                                                      </tbody>
                                                                                  </table>
                                                                              </div>
                                                                          </div>
                                                                      </div>
                                                                  	</div>
                                                                
                                                            </div>
                                                            <!-- end tab pane -->

                                                            <div class="tab-pane fade" id="pills-info-desc" role="tabpanel" aria-labelledby="pills-info-desc-tab">
                                                                <div>
                                                                    <div class="text-center">
                                                                    </div>

                                                                </div>
                                                                <div class="d-flex align-items-start gap-3 mt-4">
                                                                    <button type="button" class="btn btn-primary btn-label right ms-auto nexttab nexttab" data-nexttab="pills-info-desc-tab"><i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>सेव करें और आगे बढ़ें </button>
                                                                </div>
                                                            </div>
                                                            <!-- end tab pane -->

                                                            <div class="tab-pane fade" id="pills-success" role="tabpanel" aria-labelledby="pills-success-tab">
                                                                <div>
                                                                    <div class="text-center">

                                                                        <div class="mb-4">
                                                                            <lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop" colors="primary:#0ab39c,secondary:#405189" style="width:120px;height:120px"></lord-icon>
                                                                        </div>
                                                                        <h5>Well Done !</h5>
                                                                        <p class="text-muted">You have Successfully Signed Up</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end tab pane -->
                                                        </div>
                                                        <!-- end tab content -->

                                                    </div>
                                                    <!-- end card body -->
                                                </div>
                                                <!-- end card -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-body">

                                    <div class="table-responsive">
                                        <div class="row">
                                            <div class="col-sm-12">

                                                <table class="table table-bordered dt-responsive nowrap table-striped align-middle dataTable no-footer dtr-inline" aria-describedby="fixed-header_info">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input select_all" id="select_all" />
                                                                    <label class="form-check-label" for="select_all"></label>
                                                                </div>
                                                            </th>

                                                   		 <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 606.4px;" aria-label="SR No.: activate to sort column ascending">क्रमांक</th>
                                                            <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 538.4px;" aria-label="ID: activate to sort column ascending">ग्राम पंचायत </th>
                                                            <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 906.4px;" aria-label="Purchase ID: activate to sort column ascending">बूथ नंबर</th>
                                                            <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 538.4px;" aria-label="Title: activate to sort column ascending">नाम</th>
                                                            <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 538.4px;" aria-label="User: activate to sort column ascending">पिता का नाम</th>
                                                            <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 538.4px;" aria-label="Assigned To: activate to sort column ascending">लिंग </th>
                                                            <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 538.4px;" aria-label="Assigned To: activate to sort column ascending">उम्र </th>
                                                            <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 538.4px;" aria-label="Assigned To: activate to sort column ascending">मोबाइल नंबर</th>
                                                            <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 538.4px;" aria-label="Assigned To: activate to sort column ascending">पता</th>
                                                            <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 538.4px;" aria-label="Assigned To: activate to sort column ascending">मुख्य ग्राम</th>
                                                            <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 538.4px;" aria-label="Assigned To: activate to sort column ascending">वार्ड नंबर</th>
                                                            <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 538.4px;" aria-label="Assigned To: activate to sort column ascending">वार्ड ग्राम </th>
                                                            <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 538.4px;" aria-label="Assigned To: activate to sort column ascending">मोहल्ला </th>
                                                            <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 538.4px;" aria-label="Assigned To: activate to sort column ascending">वोटर क्रमांक </th>
                                                            <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 538.4px;" aria-label="Assigned To: activate to sort column ascending">उप जाति</th>
                                                            <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 538.4px;" aria-label="Assigned To: activate to sort column ascending">जाति </th>

                                                            <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 538.4px;" aria-label="Action: activate to sort column ascending">कॉल करें </th>
                                                        </tr>

                                                    </thead>
                                                    <tbody id="filter_data">

                                                        <?php
                                                        $i = 1;
                                                        if (!empty($student)) {
                                                            foreach ($student as $row) {
                                                        ?>
                                                                <tr class="odd">
                                                                    <td scope="col">
                                                                        <div class="form-check">
                                                                            <input type="checkbox" class="form-check-input check_class checkbox" id="id_1" name="camp_id[]" value="<?= $row['id'] ?>">
                                                                            <label class="form-check-label" for="cardtableCheck01"></label>
                                                                        </div>
                                                                    </td>
                                                                    <td><?php echo $i; ?></td>
                                                                    <td><?php if (!empty($row['gram_panchayat_id'])) {
                                                                            $sql = $this->student_model->list_common_where3('grampanchyat', 'id', $row['gram_panchayat_id']); ?> <?php echo $sql[0]['gram_panchyat'] ?> <?php } ?></td>
                                                                    <td><?php if (!empty($row['booth_no'])) { ?><?php echo $row['booth_no'] ?> <?php } ?></td>
                                                                    <td><?php if (!empty($row['name'])) { ?><?php echo $row['name'] ?> <?php } ?></td>
                                                                    <td><?php if (!empty($row['father_name'])) { ?><?php echo $row['father_name'] ?> <?php } ?></td>
                                                                    <td><?php if (!empty($row['gender'])) { ?><?php echo $row['gender'] ?> <?php } ?></td>
                                                                    <td><?php if (!empty($row['age'])) { ?><?php echo $row['age'] ?> <?php } ?></td>
                                                                    <td><?php if (!empty($row['contact'])) { ?><?php echo $row['contact'] ?> <?php } ?></td>
                                                                    <td><?php if (!empty($row['address'])) { ?><?php echo $row['address'] ?> <?php } ?></td>
                                                                    <td><?php if (!empty($row['mukhya_gram'])) { ?><?php echo $row['mukhya_gram']; ?> <?php } ?></td>
                                                                    <td><?php if (!empty($row['ward_no'])) { ?><?php echo $row['ward_no']; ?> <?php } ?></td>
                                                                    <td><?php if (!empty($row['ward_gram'])) { ?><?php echo $row['ward_gram']; ?> <?php } ?></td>
                                                                    <td><?php if (!empty($row['mohalla'])) { ?><?php echo $row['mohalla']; ?> <?php } ?></td>
                                                                    <td><?php if (!empty($row['voter_sr_no'])) { ?><?php echo $row['voter_sr_no']; ?> <?php } ?></td>
                                                                    <td><?php if (!empty($row['sub_caste'])) { ?><?php echo $row['sub_caste']; ?> <?php } ?></td>
                                                                    <td><?php if (!empty($row['caste'])) { ?><?php echo $row['caste']; ?> <?php } ?></td>
                                                                    <td>

                                                                        <i class="ri-phone-line" style="color: blue;" class="" data-bs-toggle="modal" onclick="show_call(<?php echo $row['contact']; ?>)" data-bs-target="#editsubadmin" data-call="<?php echo $row['contact']; ?>"></i>

                                                                    </td>

                                                                    <!--	 <?php if ($this->rbac->hasPrivilege('school_data', 'can_edit')) { ?>
                                                <td>

                                                    <i class="ri-edit-box-line editmodel" style="color: blue;" class="" data-bs-toggle="modal" data-bs-target="#editsubadmin" data-id="<?php echo $row['id']; ?>"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                  <i class="ri-delete-bin-line" name="archive" class="remove" type="submit" onclick="archiveFunction(<?php echo $row['id']; ?>)" data-toggle="tooltip" data-placement="bottom"  style="color: red;"></i>
                                                   
                                                </td>
                                            <?php } ?> -->



                                                                </tr>
                                                        <?php $i++;
                                                            }
                                                        } ?>
                                                    </tbody>
                                                </table>
                                                <!-- pagination start -->
                                                <div class="align-items-center mt-2 row g-3 text-center text-sm-start">
                                                    <div class="col-sm">
                                                        <div class="text-muted">Showing<span class="fw-semibold"> <?= count($student) ?> -
                                                                <?= isset($count) ? $count : ''; ?></span> Results
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-auto">
                                                        <ul class="pagination mb-0" style="overflow: scroll;">
                                                            <?php $uri = $this->uri->segment(3); ?>

                                                            <?php for ($i = 0; $i < ($count / 500); $i++) { ?>
                                                                <li class="page-item <?php if (($uri == '') && ($i + 1 == 1)) {
                                                                                            echo 'active';
                                                                                        } else if ($uri == ($i + 1)) {
                                                                                            echo 'active';
                                                                                        } ?>">

                                                                    <a href="<?= base_url() ?>Newuploadeddata/index/<?= $i + 1 ?>" class="page-link" style="<?php if ($uri == '') {
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
                                                                    <a href="<?= base_url() ?>Newuploadeddata/index/<?= $uri + 1 ?>" class="page-link">→</a>
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
    function filter_gram_pan(gram_pan_id) {
        $.ajax({
            method: 'post',
            url: "<?= base_url('Newuploadeddata/filter'); ?>",
            data: {
                gram_pan_id: gram_pan_id,
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
            url: "<?= base_url('master/calling_1'); ?>",
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
			
            $(".campaign_class").css('display', 'block');
        } else {
            $('.check_class').each(function() {
              	var index = fruits.indexOf($(this).val());
            if (index !== -1) {
              fruits.splice(index, 1);
            }
                this.checked = false;
            });

            $(".campaign_class").css('display', 'none');
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
        }else{
            var index = fruits.indexOf($(this).val());
            if (index !== -1) {
              fruits.splice(index, 1);
            }
        }
		 
        if ($('.checkbox:checked').length >= 1) {
            $(".campaign_class").css('display', 'block');
        } else {
            $(".campaign_class").css('display', 'none');
        }
    
        
    });
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
                      window.location.href = '<?=base_url() ?>Campaign/camp_details/'+id;
                    }, 3000);
                  
                }
            }
        })
  }
  
  function get_call_module()
  {
  
  
  
  }
  </script>

</body>

</html>