<?php $this->load->view('admin/link.php'); ?>
<!-- Begin page -->
<div id="layout-wrapper">

    <?php $this->load->view('admin/topar.php'); ?>
    <?php $this->load->view('admin/imgheader.php'); ?>
    <?php $this->load->view('admin/sidebar.php');
    date_default_timezone_set('Asia/Kolkata');
    $date = date('Y-m-d');
    ?>
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
                        <h4 class="mb-sm-0">User Data</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                <li class="breadcrumb-item active">User Data</li>
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
                            <h4 class="card-title mb-0 flex-grow-1">User Data</h4>



                            <div class="flex-shrink-0 showdata">
                              <span type="button" class="badge align-middle ms-1 delete" data-id="2" style="border: 2px solid red; color:red;">Delete</span>
								<span type="button" class="badge align-middle ms-1 varify" data-id="varified" style="border: 2px solid blue; color:blue;">Varify</span>
                                <!--<button type="button" data-toggle="tooltip" data-placement="bottom" title="Upload Data" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="ri-upload-cloud-2-line"></i></button>-->
                                <span type="button" class="badge align-middle ms-1 dataactinact" data-title="bjp" data-toggle="tooltip" data-placement="bottom" title="Upload Data" class="badge align-middle ms-1" data-bs-toggle="modal" data-bs-target="#databjpcongress" style=" border: 2px solid #F97D09; color:#F97D09;">BJP</span>

                                <span type="button" class="badge align-middle ms-1 dataactinact" data-title="congress" data-toggle="tooltip" data-placement="bottom" title="Upload Data" class="badge align-middle ms-1" data-bs-toggle="modal" data-bs-target="#databjpcongress" style=" border: 2px solid #278D27; color:#278D27;">Congress</span>
                                <span type="button" class="badge align-middle ms-1 active" data-id="fakedata" style="border: 2px solid red; color:red;">Fake</span>






                                <!-- <button type="button" class="btn btn-primary waves-effect waves-light btn-icon waves-effect waves-light"><i class="ri-mail-send-line"></i></button>-->
                                <!--<button type="button" class="btn btn-primary waves-effect waves-light btn-icon waves-effect waves-light" data-toggle="tooltip" data-placement="bottom" title="Click here for lead data" data-bs-toggle="modal" data-bs-target="#followdata"><i class="ri-menu-add-line"></i></button>-->

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
                                            <a href="<?php echo base_url(); ?>Sample/follow lead sample.xlsx" download>
                                                <button type="button" data-toggle="tooltip" data-placement="bottom" title="Download Sample Data" class="btn btn-primary waves-effect waves-light"><i class="ri-download-cloud-2-line"></i></button></a><br><br>
                                            <form method="POST" action="<?php base_url() ?>userdata/importexcel" enctype="multipart/form-data">
                                                <div class="col-md-12">
                                                    <input type="file" class="form-control" id="uploadFile" name="uploadFile" placeholder="Select Your File" required accept=".xls, .xlsx">
                                                </div><br>
                                                <div class="hstack gap-2 justify-content-center">
                                                    <a href="#" class="btn btn-danger" data-bs-dismiss="modal">
                                                        Close</a>

                                                    <input type="submit" name="fileuploadsubmit" class="btn btn-primary" value="Upload">
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="databjpcongress" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="databjpcongress">User Activity </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body bjpcongressupdate123">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body border border-dashed border-end-0 border-start-0">

                            <div class="row g-3">

                                <!--end col-->
                                <div class="col-md-6 col-sm-6">
                                    <div>
                                        <input type="date" class="form-control" name="start_date" id="start_date" onchange="datefilter();" placeholder="Select Start date">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div>
                                        <input type="date" class="form-control" name="end_date" value="<?= $date ?>" id="end_date" onchange="datefilter();" placeholder="Select End date">
                                    </div>
                                </div>

                                <!--end col-->
                                <div class="col-md-2 col-sm-4">
                                    <div>
                                        <select class="form-control" name="is_panchayat" id="is_panchayat" onchange="fecth_grampanchayat(this.value);is_panchayat_data(this.value)">

                                            <option value="all" selected>Select Panchayat Samiti</option>
                                            <?php foreach ($is_panchayat as $val1) { ?>
                                                <option value="<?= $val1['id'] ?>"><?= $val1['pachayatsimiti'] ?></option>

                                            <?php } ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-4">
                                    <div>
                                        <select class="form-control gram_panchayat" name="gram_panchayat" id="gram_panchayat" onchange="fetch_gram(this.value);gram_panchayat_data(this.value)">



                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-4">
                                    <div>
                                        <select class="form-control gram" name="gram" id="gram" onchange="fetch_mohalla(this.value);gram_data(this.value)">



                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-4">
                                    <div>
                                        <select class="form-control mohalla" name="mohalla" id="mohalla" onchange="mohalla_data(this.value)">



                                        </select>
                                    </div>
                                </div>
                              <div class="col-md-2 col-sm-4">
                                    <div>
                                        <select class="form-control" name="sel_filter" id="sel_filter"
                                            onchange="filterdata(this.value)">

                                            <option value="all" selected>All</option>
                                           <option value="varified">Varified Data</option>
                                            <option value="activebjp">Active BJP Data</option>
                                            <option value="inactivebjp">Inactive BJP Data</option>
                                          <option value="activecongress">Active Congress Data</option>
                                            <option value="inactivecongress">Inactive Congress Data</option>
                                            

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-6">
                                    <div class="search-box">
                                        <input type="text" id="search" name="search" class="form-control search" onkeyup="searchdata(this.value)" onkeydown="searchdata(this.value)" placeholder="Enter Keyword for Search">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div>

                                <!--end col-->

                                <!--end col-->

                                <!--end col-->
                            </div>
                            <!--end row-->

                        </div>


                        <div class="modal fade" id="followdata" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                    <div class="modal-body text-center p-5">


                                        <div class="mt-4">
                                            <h4 class="mb-3">User data</h4>

                                            <form method="POST" action="<?php base_url() ?>followleaddata" enctype="multipart/form-data">
                                                <br><br>
                                                <table class="table table-borderless table-centered align-middle table-nowrap mb-0" id="example" class="display">
                                                    <thead class="text-muted table-light">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>ID</th>
                                                            <th>नाम</th>
                                                            <th>पिता का नाम</th>
                                                            <th>मोबाइल न.</th>
                                                            <th>आधार कार्ड नंबर</th>
                                                            <th>वोटर आईडी नंबर</th>
                                                            <th>स्टेटस</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>

                                                        <?php
                                                        $sn = 1;

                                                        if ($useritem) {
                                                            foreach ($useritem as $value1) {
                                                        ?>
                                                                <tr>

                                                                    <td>
                                                                        <?= $sn++ ?>
                                                                    </td>
                                                                    <td>
                                                                        <?= $value1['name'] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?= $value1['f_name'] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?= $value1['mobile'] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?= $value1['aadharno'] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?= $value1['voteridno'] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php
                                                                        if ($value1['flag'] == 0) {
                                                                            echo "<divApproved";
                                                                        } else {
                                                                            echo "Unapproved";
                                                                        }

                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                        <?php }
                                                        } ?>
                                                    </tbody>
                                                </table>
                                                <br>
                                                <div class="hstack gap-2 justify-content-center">
                                                    <a href="#" class="btn btn-danger" data-bs-dismiss="modal">
                                                        Close</a>


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
                                                <th>#</th>
                                                <th colspan="2">गतिविधि</th>
                                              	<th></th>
                                                <th>ID</th>
                                                <th>पंचायत समिति/नगर पालिका</th>
                                                <th>ग्राम पंचायत/वार्ड</th>
                                                <th>ग्राम</th>
                                                <th>तहसील</th>
                                                <th>मोहल्ला</th>
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
                                                
                                            </tr>
                                        </thead>
                                        <tbody id="productdetailsdiv" class="filterdata">
                                            <?php

                                            if (!empty($useritem)) {
                                                foreach ($useritem as $value) {
                                                   
                                            ?>
                                                    <tr <?php if ($value['bjp_congress'] == 'bjp' && $value['is_supporter'] == 'support') { ?> style="background:#F97D09;color:white;" <?php } ?> <?php if ($value['bjp_congress'] == 'bjp' && $value['is_supporter'] == 'notsupport') { ?> style="background:red;color:white;" <?php }
                                                                                                                                                                                                                                                                                                                if ($value['bjp_congress'] == 'congress'  && $value['is_supporter'] == 'support') { ?> style="background:#F97D09;color:white;" <?php } if ($value['bjp_congress'] == 'congress'  && $value['datastatus'] == 'active') {?>style="background:#278D27;color:white;"<?php } ?>>
                                                        <th scope="row">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="checkAll" id="flexSwitchCheckChecked" value="<?= $value['id'] ?>">
                                                            </div>
                                                        </th>
                                                      	<td>
                                                            <a href="<?= base_url() ?>editbjp/<?= $value['id'] ?>"><i class="ri-edit-box-line " style="color: blue;"></i></a>
                                                        </td>
                                                      <?php if($this->rbac->hasPrivilege('all_user_data','can_delete')) { ?>
                                                            <td>
                                                                <i class="ri-delete-bin-line" name="archive" class="remove" type="submit" onclick="archiveFunction(<?= $value['id'] ?>)" data-toggle="tooltip" data-placement="bottom"  style="color: red;"></i>


                                                            </td>
                                                        <?php } ?>
                                                        <?php if (!empty($value['bjp_congress'])) { ?>
                                                            <td>
                                                                <?php if ($value['bjp_congress'] == 'congress') { ?>
                                                                    <img src="<?= base_url() ?>assets/images/cong_logo.png" alt="" data-toggle="tooltip" data-placement="bottom" title="<?= $value['ex_man'] ?>" class="avatar-xs rounded-circle me-2 shadow">
                                                                <?php } else { ?>
                                                                    <img src="<?= base_url() ?>assets/images/14.png" alt="" data-toggle="tooltip" data-placement="bottom" title="<?= $value['ex_man'] ?>" class="avatar-xs rounded-circle me-2 shadow">
                                                                <?php } ?>
                                                                   
                                                      </td>
                                                        <?php } else { ?>
                                                            <td></td>
                                                        <?php } ?>

                                                        <td>
                                                            <?php echo $offset++; ?>
                                                        </td>

                                                        <td>

                                                            <?php

                                                            $c12 = $value['panchayatsimit'];
                                                            $this->db->select('*');
                                                            $this->db->from('pachayatsimiti');
                                                            $this->db->where('id', $c12);
                                                            $rows3 = $this->db->get()->row();

                                                            ?>
                                                            <?php if (!empty($rows3->pachayatsimiti)) {
                                                                echo $rows3->pachayatsimiti;
                                                            } else {
                                                                echo '';
                                                            } ?>


                                                        </td>
                                                        <td>
                                                            <?php

                                                            $c13 = $value['gram_panchanyat'];
                                                            $this->db->select('*');
                                                            $this->db->from('grampanchyat');
                                                            $this->db->where('id', $c13);
                                                            $rows4 = $this->db->get()->row();

                                                            ?>

                                                            <?php if (!empty($rows4->gram_panchyat)) {
                                                                echo $rows4->gram_panchyat;
                                                            } else {
                                                                echo '';
                                                            } ?>


                                                        </td>
                                                        <td>
                                                            <?php

                                                            $c14 = $value['gram'];
                                                            $this->db->select('*');
                                                            $this->db->from('gramdetail');
                                                            $this->db->where('id', $c14);
                                                            $rows5 = $this->db->get()->row();

                                                            ?>
                                                            <?php if (!empty($rows5->gramname)) {
                                                                echo $rows5->gramname;
                                                            } else {
                                                                echo '';
                                                            } ?>


                                                        </td>

                                                        <td>
                                                            <?php
                                                            $c13 = $value['tashsil'];
                                                            $this->db->select('*');
                                                            $this->db->from('tahseel_data');
                                                            $this->db->where('id', $c13);
                                                            $rows4 = $this->db->get()->row();
                                                            ?>

                                                            <?php if (!empty($rows4->tahseel)) {
                                                                echo $rows4->tahseel;
                                                            } else {
                                                                echo '';
                                                            } ?>
                                                        </td>
                                                        <td>
                                                            <?php

                                                            $mohalla = $value['moholla'];
                                                            $this->db->select('*');
                                                            $this->db->from('mohalla');
                                                            $this->db->where('id', $mohalla);
                                                            $rows6 = $this->db->get()->row();

                                                            ?>
                                                            <?php if (!empty($rows6->mohalla)) {
                                                                echo $rows6->mohalla;
                                                            } else {
                                                                echo '';
                                                            } ?>
                                                        </td>
                                                        <td>
                                                            <?= $value['name']; ?>
                                                        </td>
                                                        <td>
                                                            <?= $value['f_name'] ?>
                                                        </td>
                                                        <td>
                                                            <?php

                                                            $c = $value['dharm'];
                                                            $this->db->select('*');
                                                            $this->db->from('dharm');
                                                            $this->db->where('id', $c);
                                                            $rows1 = $this->db->get()->row();

                                                            ?>
                                                            <?php if (!empty($rows1->dharm)) {
                                                                echo $rows1->dharm;
                                                            } else {
                                                                echo '';
                                                            } ?>
                                                        </td>
                                                        <td>
                                                            <?= $value['caste'] ?>
                                                        </td>
                                                        <td>
                                                            <?= $value['mobile'] ?>
                                                        </td>
                                                        <td>
                                                            <?= $value['whtup'] ?>
                                                        </td>
                                                        <td>
                                                            <?= $value['verify'] ?>
                                                        </td>
                                                        <td>
                                                            <?= $value['aadharno'] ?>
                                                        </td>
                                                        <td>
                                                            <?= $value['voteridno'] ?>
                                                        </td>
                                                        <td>
                                                            <?= $value['marriedstatus'] ?>
                                                        </td>
                                                        <td>
                                                            <?= $value['dateofmarriage'] ?>
                                                        </td>
                                                        <td>
                                                            <?= $value['birthd'] ?>
                                                        </td>
                                                        <td>
                                                            <?= $value['sadasha_varsh'] ?>
                                                        </td>
                                                        <td>
                                                            <?= $value['vartaman_pad'] ?>
                                                        </td>
                                                        <td>
                                                            <?= $value['purv_pad'] ?>
                                                        </td>
                                                        <td>
                                                            <?= $value['vidhan_sabha'] ?>
                                                        </td>
                                                        <td>
                                                            <?= $value['cities_id'] ?>
                                                        </td>
                                                        
                                                       
                                                    </tr>
                                            <?php $sn++;
                                                }
                                            } ?>


                                        </tbody>
                                    </table><!-- end table -->

                                </form>
                            </div>

                            <div class="row align-items-center mt-4 pt-2 justify-content-between d-flex">
                                <div class="col-md-4">
                                    <div class="flex-shrink-0">
                                        <div class="text-muted">
                                            Showing <span class="fw-semibold">
                                          <?php if (!empty($useritem)){ ?>
                                                <?= count($useritem) ?> -
                                                <?= isset($count) ? $count : ''; ?>
                                          <?php } ?>
                                            </span> Results
                                        </div>
                                    </div>
                                </div>
                                <!-- <ul class="pagination pagination-separated pagination-sm mb-0"> -->

                                <style>
                                    .page-link {
                                        width: 30px;
                                        display: inline-flex;
                                    }
                                </style>

                                <div class="col-md-8">
									 <?php if (!empty($count)){ ?>
                                    <?php $uri = $this->uri->segment(3);
                                    if ($uri > 1) { ?>
                                        <a href="<?= base_url() ?>alluserdata/index/<?= $uri - 1 ?>" class="page-link">←</a>
                                    <?php } ?>

                                    <?php for ($i = 0; $i < ($count / 500); $i++) { ?>
                                        <a href="<?= base_url() ?>alluserdata/index/<?= $i + 1 ?>" class="page-link">
                                            <?= $i + 1 ?>
                                        </a>
                                    <?php } ?>

                                    <?php if ($i > $uri) { ?>
                                        <a href="<?= base_url() ?>alluserdata/index/<?= $uri + 1 ?>" class="page-link">→</a>
                                    <?php } ?>
                                  <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->



        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <div class="modal fade" id="addexmembers" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">Add Ex Office Bearer Designation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="addexdegnity">

                        <div id="addsextaffdiv"></div>

                        <div class="row">
                            <div class="col-lg-12 mt-3">

                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Add Designation</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editexmembers" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">Edit Ex Office Bearer Designation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="editexdegnity">

                        <div id="editsextaffdiv"></div>

                        <div class="row">
                            <div class="col-lg-12 mt-3">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Edit Designation</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- end main content-->



    <?php $this->load->view('admin/footer.php'); ?>
</div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

<script type="text/javascript">
    function enableaccount(user_id) {
        event.preventDefault(); // prevent form submit

        var form = event.target.form; // storing the form
        swal({
                title: "Are you sure?",
                text: "Enable user Account",
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
                        url: "<?= base_url() ?>userdata/update/user_id",
                        type: "post",
                        data: {
                            user_id: user_id
                        },
                        success: function() {
                            swal('Account Enable 🙂', ' ', 'success');

                            window.location.reload(true);

                            setTimeout(function() {
                                window.location.reload(true);
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
    function disableaccount1(user_id) {
        event.preventDefault(); // prevent form submit

        var form = event.target.form; // storing the form
        swal({
                title: "Are you sure?",
                text: "Disable user Account",
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
                        url: "<?= base_url() ?>userdata/updatedisable/user_id",
                        type: "post",
                        data: {
                            user_id: user_id
                        },
                        success: function() {
                            swal('Account Disable 🙂', ' ', 'success');

                            window.location.reload(true);

                            setTimeout(function() {
                                window.location.reload(true);
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
    $(document).ready(function() {
        $('.editmodel').click(function() {

            var userid = $(this).data('id');

            $.ajax({
                url: "<?= base_url('userdata/subadminedit'); ?>",
                type: "post",
                data: {
                    id: userid
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
    $(document).on('submit', '#bjpcongressupdate', function(ev) {
        ev.preventDefault(); // Prevent browers default submit.
        var formData = new FormData(this);
        $.ajax({
            url: "<?= base_url() ?>Userdata/bjpcongressupdate/",
            type: 'post',
            data: formData,
            success: function(result) {
                //json data

                var dataResult = JSON.parse(result);
                if (dataResult.done == 1) {
                    alert('Your Selected data is updated');
                    location.reload();
                } else {
                    alert('Failed,Try Again');
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
    function shownextpage(id) {

        $.ajax({
            url: "<?= base_url() ?>Userdata/shoppagination",
            type: 'POST',
            data: {
                id: id,
            },
            success: function(result) {
                $("#productdetailsdiv").html(result);
                $(".page-link").removeClass('active');
                $("#page_" + id).addClass('active');
                var t = (((id - 1) * 9) + 1) + '-' + (id * 9)
                $(".counttext").html(t);
            },
        })
    }
</script>

<script>
    $(document).ready(function() {
        $('#vidh').change(function() {
            if ($('#vidh').val() == 'नहीं') {
                $('#showfield').css("display", "block");
            }
        })

    })




    $(document).ready(function() {
        $('#verify').change(function() {

            if ($('#verify').val() == 'आधार कार्ड न.') {
                $('#voter').removeAttr("required", "false");
                $('#addh').attr("required", "true");
                $('#addh').css("display", "block");
                $('#voter').css("display", "none");
            }
        })
        $('#verify1').change(function() {
            if ($('#verify1').val() == 'वोटर ID न.') {
                $('#addh').removeAttr("required");
                $('#voter').attr("required", "true");
                $('#voter').css("display", "block");
                $('#addh').css("display", "none");
            }
        })
    })
    $(document).ready(function() {
        $('#marriedstatus1').change(function() {

            if ($('#marriedstatus1').val() == 'हां') {
                $('#hidefieldvivah').attr("required", "true");
                $('#hidefieldvivah').css("display", "block");

            }
        })
        $('#marriedstatus').change(function() {
            if ($('#marriedstatus').val() == 'नहीं') {
                $('#hidefieldvivah').removeAttr("required");

                $('#hidefieldvivah').css("display", "none");
            }
        })
    })
</script>


<?php if (isset($msg)) { ?>
    <script>
        var x = document.getElementById("snackbar");
        x.className = "show";
        setTimeout(function() {
            x.className = x.className.replace("show", "");
        }, 3000);
    </script>
<?php } ?>

<script>
    $('.grampanchanyat123').change(function() {
        $('#gram').css("display", "block");
    })
    $('.warddetail').change(function() {
        $('#warddetailhide').css("display", "block");
    })

    $("input[name='marriedstatus']").change(function() {
        /*console.log($("input[name='marriedstatus']:checked").val())*/
        if ($("input[name='marriedstatus']:checked").val() == 'हां') {
            $('#hidefieldvivah').css("display", "block");
        } else if ($("input[name='marriedstatus']:checked").val() == 'नहीं') {
            $('#hidefieldvivah').css("display", "none");
        }

    })
    $("input[name='verify']").change(function() {
        /*console.log($("input[name='marriedstatus']:checked").val())*/
        if ($("input[name='verify']:checked").val() == 'आधार कार्ड न.') {
            $('#addh').css("display", "block");
            $('#voter').css("display", "none");
        } else if ($("input[name='verify']:checked").val() == 'वोटर ID न.') {
            $('#voter').css("display", "block");
            $('#addh').css("display", "none");
        }

    })

    $('#checkwhatsapp').change(function() {
        if ($("#checkwhatsapp:checked").val() == '1') {
            $("#whtup").val($("#mobile").val());
        } else {
            $("#whtup").val('');
        }
    })
</script>
<script>
    function allgram() {
        $('#hidetehsil').css("display", "block");
        $('#tehsilhide').css("display", "block");
        $("#tehsilhide").val(sessionStorage.getItem('tehsil'));
    }
</script>










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




    $(document).ready(function() {
        $(".active").click(function() {

            var action = $(this).data('id');


            if (confirm("are you sure you want to " + action)) {
                var arr_id = [];

                $(":checkbox:checked").each(function(i) {
                    arr_id[i] = $(this).val();
                })
                if (arr_id.length == 0) {
                    alert("atleast check one");
                } else {



                    $.ajax({
                        url: "<?= base_url('userdata/updateactivedata'); ?>",
                        type: 'post',
                        data: {
                            action: action,
                            id: arr_id
                        },
                        cache: false,
                        success: function(result) {
                            var dataResult = JSON.parse(result);
                            if (dataResult.done == 1) {
                                alert('Your Selected data is updated as ' + action);
                                location.reload();
                            } else {
                                alert('Failed,Try Again');
                            }
                        },
                    })




                }

            } else {
                return false;
            }
        })

    })
  
  	
  $(document).ready(function() {
        $(".varify").click(function() {

            var action = $(this).data('id');


            if (confirm("are you sure you want to " + action)) {
                var arr_id = [];

                $(":checkbox:checked").each(function(i) {
                    arr_id[i] = $(this).val();
                })
                if (arr_id.length == 0) {
                    alert("atleast check one");
                } else {



                    $.ajax({
                        url: "<?= base_url('userdata/varifydata'); ?>",
                        type: 'post',
                        data: {
                            action: action,
                            id: arr_id
                        },
                        cache: false,
                        success: function(result) {
                            var dataResult = JSON.parse(result);
                            if (dataResult.done == 1) {
                                alert('Your Selected data is Varified as ' + action);
                                location.reload();
                            } else {
                                alert('Failed,Try Again');
                            }
                        },
                    })




                }

            } else {
                return false;
            }
        })

    })




    $(document).ready(function() {
        $(".dataactinact").click(function() {

            var action = $(this).data('id');
            var title = $(this).data('title');



            var arr_id = [];

            $(":checkbox:checked").each(function(i) {
                arr_id[i] = $(this).val();
            })
            if (arr_id.length == 0) {
                alert("atleast check one");
            } else {



                $.ajax({
                    url: "<?= base_url('userdata/dataactinact'); ?>",
                    type: 'post',
                    data: {
                        action: action,
                        title: title,
                        id: arr_id
                    },
                    cache: false,
                    success: function(result) {



                        $('.bjpcongressupdate123').html(result);

                    },
                })




            }


        })

    })

    function add_ex_deginity(id) {
        $.ajax({
            url: "<?= base_url('userdata/adddegnitymodel'); ?>",
            type: "post",
            data: {
                id: id
            },
            success: function(response) {
                $('#addsextaffdiv').html(response);
            }
        })
    }

    function edit_ex_deginity(id) {
        $.ajax({
            url: "<?= base_url('userdata/editdegnitymodel'); ?>",
            type: "post",
            data: {
                id: id
            },
            success: function(response) {
                $('#editsextaffdiv').html(response);
            }
        })
    }
</script>

<script type="text/javascript">
    // update modal
    $(document).on('submit', '#addexdegnity', function(ev) {
        ev.preventDefault(); // Prevent browers default submit.
        var formData = new FormData(this);
        $.ajax({
            url: "<?= base_url() ?>Userdata/adddegnitydata/",
            type: 'post',
            data: formData,
            success: function(result) {
                //json data

                var dataResult = JSON.parse(result);
                if (dataResult.inserted == '1') {
                    swal('Designation Added 🙂', ' ', 'success');

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

<script type="text/javascript">
    // update modal
    $(document).on('submit', '#editexdegnity', function(ev) {
        ev.preventDefault(); // Prevent browers default submit.
        var formData = new FormData(this);
        $.ajax({
            url: "<?= base_url() ?>Userdata/adddegnitydata/",
            type: 'post',
            data: formData,
            success: function(result) {
                //json data

                var dataResult = JSON.parse(result);
                if (dataResult.inserted == '1') {
                    swal('Designation Updated 🙂', ' ', 'success');

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
    function filterdata(action) {
		 var is_panchayat_id = $('#is_panchayat').val();
            var gram_panchayat = $('#gram_panchayat').val();
            var gram = $('#gram').val();
      var mohalla = $('#mohalla').val();
        $.ajax({
            url: "<?= base_url('userdata/filterdata'); ?>",
            type: "post",
            data: {
                action: action,
              	is_panchayat_id:is_panchayat_id,
              	gram_panchayat:gram_panchayat,
              gram:gram,
              mohalla:mohalla
            },
            success: function(response) {
                $('.filterdata').html(response);
            }
        })
    }

    function datefilter() {
        var startdate = $('#start_date').val();
        var enddate = $('#end_date').val();

        $.ajax({
            url: "<?= base_url('userdata/datefilter'); ?>",
            type: "post",
            data: {
                startdate: startdate,
                enddate: enddate
            },
            success: function(response) {
                $('.filterdata').html(response);
            }
        })
    }

    function searchdata(content) {
        $.ajax({
            url: "<?= base_url('userdata/searchdata'); ?>",
            type: "post",
            data: {
                content: content

            },
            success: function(response) {
                $('.filterdata').html(response);
            }
        })
    }

    function is_panchayat_data(id) {

        if (id != '') {
            $.ajax({
                url: '<?= base_url() ?>filter/is_panchayat_filter_data/' + id,
                success: function(res) {

                    $(".filterdata").html(res);
                },
                error: function() {
                    alert("Fail")
                }
            });
        }
    }

    function fecth_grampanchayat(id) {

        if (id != '') {
            $.ajax({
                url: '<?= base_url() ?>filter/fetch_grampanchayat/' + id,
                success: function(res) {

                    $(".gram_panchayat").html(res.output);
                },
                error: function() {
                    alert("Fail")
                }
            });
        }
    }

    function fetch_gram(id) {

        if (id != '') {
            $.ajax({
                url: '<?= base_url() ?>filter/fetch_gram/' + id,
                success: function(res) {

                    $(".gram").html(res.output);
                },
                error: function() {
                    alert("Fail")
                }
            });
        }
    }

    function gram_panchayat_data(id) {

        if (id != '') {
            var is_panchayat_id = $('#is_panchayat').val();
            $.ajax({
                url: '<?= base_url() ?>filter/gram_panchayat_filter_data/' + id,
                type: 'post',
                data: {
                    is_panchayat_id: is_panchayat_id
                },
                success: function(res) {

                    $(".filterdata").html(res);
                },
                error: function() {
                    alert("Fail")
                }
            });
        }
    }

    function fetch_mohalla(id) {

        if (id != '') {
            $.ajax({
                url: '<?= base_url() ?>filter/fetch_mohalla/' + id,
                success: function(res) {

                    $(".mohalla").html(res.output);
                },
                error: function() {
                    alert("Fail")
                }
            });
        }
    }

    function gram_data(id) {

        if (id != '') {
            var is_panchayat_id = $('#is_panchayat').val();
            var gram_panchayat = $('#gram_panchayat').val();
            $.ajax({
                url: '<?= base_url() ?>filter/gram_data/' + id,
                type: 'post',
                data: {
                    is_panchayat_id: is_panchayat_id,
                    gram_panchayat: gram_panchayat
                },
                success: function(res) {

                    $(".filterdata").html(res);
                },
                error: function() {
                    alert("Fail")
                }
            });
        }
    }


    function mohalla_data(id) {

        if (id != '') {
            var is_panchayat_id = $('#is_panchayat').val();
            var gram_panchayat = $('#gram_panchayat').val();
            var gram = $('#gram').val();
            $.ajax({
                url: '<?= base_url() ?>filter/mohalla_data/' + id,
                type: 'post',
                data: {
                    is_panchayat_id: is_panchayat_id,
                    gram_panchayat: gram_panchayat,
                    gram: gram
                },
                success: function(res) {

                    $(".filterdata").html(res);
                },
                error: function() {
                    alert("Fail")
                }
            });
        }
    }
</script>
<script type="text/javascript">
    function archiveFunction(id) {
      alert(id);
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
           function(isConfirm){
             if (isConfirm) {
      $.ajax({
          url: "<?=base_url()?>userdata/deleterecord/"+id,
          type: "post",
          data: {id:id},
          success:function(){	
            swal('Record Deleted 🙂', ' ', 'success');
            $("#delete"+id).fadeTo("slow", 0.7, function(){
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
  
  
  $(document).ready(function() {
        $(".delete").click(function() {

            var action = $(this).data('id');


            if (confirm("are you sure you want to delete selected data")) {
                var arr_id = [];

                $(":checkbox:checked").each(function(i) {
                    arr_id[i] = $(this).val();
                })
                if (arr_id.length == 0) {
                    alert("atleast check one");
                } else {



                    $.ajax({
                        url: "<?= base_url('userdata/deleteselected'); ?>",
                        type: 'post',
                        data: {
                            action: action,
                            id: arr_id
                        },
                        cache: false,
                        success: function(result) {
                            var dataResult = JSON.parse(result);
                            if (dataResult.done == 1) {
                                alert('Your Selected data is Deleted ');
                                location.reload();
                            } else {
                                alert('Failed,Try Again');
                            }
                        },
                    })




                }

            } else {
                return false;
            }
        })

    })
</script>

</body>


</html>