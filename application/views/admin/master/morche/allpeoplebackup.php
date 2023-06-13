<?php $this->load->view('admin/link.php'); ?>
<!-- Begin page -->
<div id="layout-wrapper">

    <?php $this->load->view('admin/topar.php'); ?>
    <?php $this->load->view('admin/imgheader.php'); ?>
    <?php $this->load->view('admin/sidebar.php');

    ?>
</div>


<div class="vertical-overlay"></div>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                      	<?php if($this->uri->segment(2) == 'morchadata') { $text = "मोर्चा"; }else{ $text = "कार्यकारिण"; }?>
                      
                        <h4 class="mb-sm-0"><?=$level[0]['title']." ".$text ?? $text ?></h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?php base_url() ?>Dashboard">Master</a></li>
                                <li class="breadcrumb-item active"><?=$level[0]['title']." ".$text ?? $text ?></li>
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
                            <h4 class="card-title mb-0 flex-grow-1"><?=$level[0]['title']." ".$text ?? $text ?></h4>
                          	<span><b>Total Items: <?=count($item)?></b></span> &nbsp;&nbsp;
                          	<a onchange="exportfilterdata()" class="btn btn-primary btn-sm" style="float: right;">Download Data in Excel</a>
                        </div>
                        
                        <div class="card-body border border-dashed border-end-0 border-start-0">
                          	<div class="row">
                              	<input type="hidden" value="<?php if($this->uri->segment(2) == 'morchadata') { echo "morcha_people"; }else{ echo "people_data"; }?>" id="pagedata">
                              
                                <div class="col-md-2">
                                  <select class="form-control" id="booth_id" onchange="changetabledata(); changevidhansabha(this.value, 'vidhansabha_id', 'विधानसभा')">
                                    <option value="" disabled selected>जिला</option>
                                    <option value="">All</option>
                                    <?php 
                                    $booths = $this->Subadmin_model->list_common_where3('master_hierarchy','parent_id','0');
                                    foreach ($booths as $val1) { ?>
                                    <option value="<?= $val1['id'] ?>"><?= $val1['name'] ?></option>
                                    <?php } ?>
                                  </select>
                                </div>
                              
                              	<div class="col-md-2" style="display:<?php if($this->uri->segment(3) >= 2) { echo 'block'; }else{ echo "none"; } ?>" >
                                  <select class="form-control" id="vidhansabha_id" onchange="changetabledata(); changevidhansabha(this.value, 'panchayat_id', 'पंचायत समिति/नगर पालिका')">
                                    <option value="" disabled selected>विधानसभा</option>
                                    <option value="">All</option>
                                  </select>
                                </div>
                              
                              	<div class="col-md-2" style="display:<?php if($this->uri->segment(3) >= 4) { echo 'block'; }else{ echo "none"; } ?>" >
                                  <select class="form-control" id="panchayat_id" onchange="changetabledata(); changevidhansabha(this.value, 'mandal_id', 'मंडल')">
                                    <option value="" disabled selected>पंचायत समिति/नगर पालिका</option>
                                    <option value="">All</option>
                                  </select>
                                </div>
                              
                              	<div class="col-md-2" style="display:<?php if($this->uri->segment(3) >= 4) { echo 'block'; }else{ echo "none"; } ?>" >
                                  <select class="form-control" id="mandal_id" onchange="changetabledata(); changevidhansabha(this.value, 'gram_id', 'ग्राम पंचायत')">
                                    <option value="" disabled selected>मंडल</option>
                                    <option value="">All</option>
                                  </select>
                                </div>
                              
                              	<div class="col-md-2" style="display:<?php if($this->uri->segment(3) >= 6) { echo 'block'; }else{ echo "none"; } ?>" >
                                  <select class="form-control" id="gram_id" onchange="changetabledata(); changevidhansabha(this.value, 'booth_id', 'बूथ')">
                                    <option value="" disabled selected>ग्राम पंचायत</option>
                                    <option value="">All</option>
                                  </select>
                                </div>
                              
                              	<div class="col-md-2" style="display:<?php if($this->uri->segment(3) >= 6) { echo 'block'; }else{ echo "none"; } ?>" >
                                  <select class="form-control" id="booth_id" onchange="changetabledata();">
                                    <option value="" disabled selected>बूथ</option>
                                    <option value="">All</option>
                                  </select>
                                </div>
                              
                                
                                <?php if($this->uri->segment(2) == 'morchadata') { ?>
                                
                                  <div class="col-md-2 col-sm-4" style="display:<?php if($this->uri->segment(3) == 6) { echo 'none'; } ?>">
                                    <select class="form-control" id="booth_id" onchange="changetabledata()">
                                      <option value="" disabled selected>मोर्चा</option>
                                      <option value="">All</option>
                                      <?php 
                                      $booths = $this->Subadmin_model->list_common('morche');
                                      foreach ($booths as $val1) { ?>
                                      <option value="<?= $val1['id'] ?>"><?= $val1['title'] ?></option>
                                      <?php } ?>
                                    </select>
                                  </div>
                              
                                <?php } ?>
                              
                              	<div class="col-md-2 col-sm-4">
                                    <select class="form-control" id="dayitv" onchange="changetabledata()">
                                      <option value="" disabled selected>दायित्व</option>
                                      <option value="">All</option>
                                      
                                      <?php 
  									  $booths = $this->Subadmin_model->list_common('dayitv');
  								      foreach ($booths as $val1) { ?>
                                      <option value="<?= $val1['id'] ?>"><?= $val1['title'] ?></option>
                                      <?php } ?>
                                    </select>
                                </div>
                              
                            </div>
                          
                          	<br><br>
                          
                            <div class="live-preview">
                                <div class="table-responsive table-card">
                                    <table class="table align-middle table-nowrap mb-0" id="Datatable1" class="display">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Image</th>
                                              	<th scope="col">Booth</th>
                                              	<th scope="col">Name</th>
                                              	<th scope="col">Liability</th>
                                              	<th scope="col">Contact No.</th>
                                                <th scope="col">DOB</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tabledata">
                                            <?php
                                          	if(!empty($item)) {
                                            foreach ($item as $key => $row) {
                                            ?>
                                                <tr>
                                                    <td><a href="#" class="fw-medium"><?php echo $key+1; ?></a></td>
                                                    <td>
                                                      <?php if (!empty($row['image'])) { ?> 
                                                      	<?php if($row['uploaded_from'] == 'front') { ?>
                                                       	 	<img class="rounded-start img-fluid  object-cover" src="https://axepertexhibits.com/bjploksabhachittorgarh/people/<?=$row['image']?>" style='width: 70px'>
                                                        <?php }else{ ?>
                                                        	<img class="rounded-start img-fluid  object-cover" src="<?= base_url() ?>assets/images/people_image/<?=$row['image']?>" style='width: 70px'>
                                                        <?php } ?>
                                                      <?php } ?>
                                                  	</td>
                                                  	<td>
                                                      	<?php if (!empty($row['refrence_id'])) {
                                                      		$refrence = $this->Subadmin_model->list_common_where3('master_hierarchy','id',$row['refrence_id']);
                                              				if(!empty($refrence)) {
                                                            	echo $refrence[0]['name'];
                                                            }
                                                      	} ?>
                                                  	</td>
                                                  	<td><?php if (!empty($row['name'])) { ?><?php echo $row['name'] ?> <?php } ?></td>
                                                    <td><?php if (!empty($row['liability'])) { ?><?php echo $row['liability'] ?> <?php } ?></td>
                                                    <td><?php if (!empty($row['contact_no'])) { ?><?php echo $row['contact_no'] ?> <?php } ?></td>
                                                    <td><?php if (!empty($row['dob'])) { ?><?php echo $row['dob'] ?> <?php } ?></td>
                                                </tr>
                                            <?php
                                            } } ?>
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
                        <input type="hidden" name="admin_user_id" value="<?php echo $row->admin_user_id; ?>">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page-content -->
    <div class="modal fade" id="editsubadmin" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">Edit Supervisor Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" onClick="window.location.reload();" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="successs">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('admin/footer.php'); ?>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

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
  
  function changetabledata() {
      var id = $("#booth_id").val();
      var dayitv = $("#dayitv").val();
      var pagedata = $("#pagedata").val();
    
      $.ajax({
        url: "<?=base_url()?>master/changetabledata",
        type: "POST",
        data: {
        	refrence_id : id,
          	dayitv : dayitv,
          	pagedata : pagedata,
          	level : <?=$this->uri->segment(3)?>,
        },
        success: function(result) {
          $("#tabledata").html(result);
        },
      })
  }
             
  function exportfilterdata() {
      var id = $("#booth_id").val();
      var dayitv = $("#dayitv").val();
      var pagedata = $("#pagedata").val();
        
      $.ajax({
        url: "<?=base_url()?>master/exportfilterdata",
        type: "POST",
        data: {
        	refrence_id : id,
          	dayitv : dayitv,
          	pagedata : pagedata,
          	level : <?=$this->uri->segment(3)?>
        },
        success: function(result) {
          $("#tabledata").html(result);
        },
      })
  }           
  
</script>