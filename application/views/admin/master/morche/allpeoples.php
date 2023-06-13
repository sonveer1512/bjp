<?php $this->load->view('admin/link.php'); ?>
<!-- Begin page -->
<style>
  .cat {
    border: 1px solid #5eb806;
}

.cat label {
    line-height: 2em;
    width: 100%;
    height: 2.4em;
}

.cat label span {
    text-align: center;
    padding: 3px 0;
    display: block;
}

.cat label input {
    position: absolute;
    display: none;
    color: #fff !important;
}

.cat label input+span {
    color: #5eb806;
    font-weight: 600;
}

.cat input:checked+span {
    color: #ffffff;
    background: #5eb806;
}
</style>

<div id="layout-wrapper">

    <?php $this->load->view('admin/topar.php'); ?>
    <?php $this->load->view('admin/imgheader.php'); ?>
    <?php $this->load->view('admin/sidebar.php'); ?>
</div>


<div class="vertical-overlay"></div>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                      	<?php if($this->uri->segment(2) == 'morchadata') { $text = "मोर्चा"; }else{ $text = "कार्यकारिणी"; }?>
                      
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
                          	<button type="button" onclick="exportfilterdata1();" class="btn btn-primary btn-sm" id="btn_ex_export" style="float: right;">Download Data in Excel</button>
                          	&nbsp;&nbsp;
                          <span id="sms_export"></span>
                          	<a  data-bs-toggle="modal" data-bs-target="#exampleModalgrid" class="btn btn-primary btn-sm" style="float: right;">Send SMS</a>
                        </div>
                        
                        <div class="card-body border border-dashed border-end-0 border-start-0">
                          	<div class="row">
                              	<input type="hidden" value="<?php if($this->uri->segment(2) == 'morchadata') { echo "morcha_people"; }else{ echo "people_data"; }?>" id="pagedata">
                              
                                <div class="col-md-2" style="margin-bottom: 10px">
                                  <select class="form-control" id="jila_id" onchange="changetabledata(); changevidhansabha(this.value, 'vidhansabha_id', 'विधानसभा')">
                                    <option value="" disabled selected>जिला</option>
                                    <option value="">All</option>
                                    <?php 
                                    $booths = $this->Subadmin_model->list_common_where3('master_hierarchy','parent_id','0');
                                    foreach ($booths as $val1) { ?>
                                    <option value="<?= $val1['id'] ?>"><?= $val1['name'] ?></option>
                                    <?php } ?>
                                  </select>
                                </div>
                              
                              	<div class="col-md-2" style="margin-bottom: 10px; display:<?php if($this->uri->segment(3) >= 2) { echo 'block'; }else{ echo "none"; } ?>" >
                                  <select class="form-control" id="vidhansabha_id" onchange="changetabledata(); changevidhansabha(this.value, 'panchayat_id', 'पंचायत समिति/नगर पालिका')">
                                    <option value="" disabled selected>विधानसभा</option>
                                    <option value="">All</option>
                                  </select>
                                </div>
                              
                              	<div class="col-md-2" style="margin-bottom: 10px; display:<?php if($this->uri->segment(3) >= 4) { echo 'block'; }else{ echo "none"; } ?>" >
                                  <select class="form-control" id="panchayat_id" onchange="changetabledata(); changevidhansabha(this.value, 'mandal_id', 'मंडल')">
                                    <option value="" disabled selected>पंचायत समिति/नगर पालिका</option>
                                    <option value="">All</option>
                                  </select>
                                </div>
                              
                              	<div class="col-md-2" style="margin-bottom: 10px; display:<?php if($this->uri->segment(3) >= 4) { echo 'block'; }else{ echo "none"; } ?>" >
                                  <select class="form-control" id="mandal_id" onchange="changetabledata(); changevidhansabha(this.value, 'gram_id', 'ग्राम पंचायत')">
                                    <option value="" disabled selected>मंडल</option>
                                    <option value="">All</option>
                                  </select>
                                </div>
                              
                              	<div class="col-md-2" style="margin-bottom: 10px; display:<?php if($this->uri->segment(3) >= 6) { echo 'block'; }else{ echo "none"; } ?>" >
                                  <select class="form-control" id="gram_id" onchange="changetabledata(); changevidhansabha(this.value, 'booth_id', 'बूथ')">
                                    <option value="" disabled selected>ग्राम पंचायत</option>
                                    <option value="">All</option>
                                  </select>
                                </div>
                              
                              	<div class="col-md-2" style="margin-bottom: 10px; display:<?php if($this->uri->segment(3) >= 6) { echo 'block'; }else{ echo "none"; } ?>" >
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
                          	<form method="post" id="sendsms">
                                                            
                              <div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalgridLabel">SMS Templates </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            
                                          <div class="row g-3">
                                            <div class="col-xxl-12">
                                               <select class="form-control" name="sms_template" onchange="showmsg(this.value)">
                                                 	<option value="" selected disabled>Select</option>
                                                   <?php 
                                                   $gets = $this->Subadmin_model->list_common('sms_templates');
                                                   if(!empty($gets)) { 
                                                     foreach($gets as $value) { ?>
                                                   <option value="<?=$value['id']?>"><?=$value['template_name']?></option>
                                                   <?php }
                                                   }
                                                   ?>
                                              </select>
                                            </div>    
                                            
                                            <div id="msgdisplay"></div>
                                            
                                            <!--<div class="cat action">
                                              <label>
                                                <input type="radio" name="sms_template" value="<?=$value['id']?>" id="timeslot"><span><?=$value['message']?></span>
                                              </label>
                                            </div> -->
                                            
                                            <!--end col-->
                                            <div class="col-lg-12">
                                              <div class="hstack gap-2 justify-content-end">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                <input type="submit" class="btn btn-primary" value="Submit">
                                              </div>
                                            </div>
                                            <!--end col-->
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                              
                              <div class="live-preview">
                                  <div class="table-responsive table-card">
                                      <table class="table align-middle table-nowrap mb-0" id="Datatable1" class="display">
                                          <thead class="table-light">
                                              <tr>
                                                  <th><input type="checkbox" name="select-all" id="select-all" /></th>
                                                  <th scope="col">ID</th>
                                                  <th scope="col">Booth</th>
                                                  <th scope="col">Name</th>
                                                  <th scope="col">दायित्व</th>
                                                  <th scope="col">Contact No.</th>
                                                  <th scope="col">DOB</th>
                                                 <th scope="col">Call</th>
                                              </tr>
                                          </thead>
                                          <tbody id="tabledata">
                                              <?php
if(!empty($item)) {
   $i=1;
foreach ($item  as  $row) {
  
?>
    <tr>
        <td><input type='checkbox' name="sendmsg[]" value="<?=$row['contact_no']?>"></td>
        <td><a href="#" class="fw-medium"><?php echo $i++  ?></a></td>
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
         <td>

      <i class="ri-phone-line" style="color: blue;" class="" data-bs-toggle="modal" onclick="show_call(<?php echo $row['contact_no']; ?>)" data-bs-target="#editsubadmin" data-call="<?php echo $row['contact_no']; ?>"></i>
     
  </td>
    </tr>
<?php
} } ?>
                                          </tbody>
                                        <div id="load_data_message"></div>
                                      </table>
                                  </div>
                                
                              </div>
                            </form>
                          
                        </div><!-- end card-body -->
                      <span class="error" style="color:red;"></span>
                      <!-- Buttons Grid -->
                      <style>
                        #load_more_btn{
                        display:none;
                        }
                      </style>
                        <div class="d-grid gap-2" >
                            <button class="btn btn-primary" type="button" id="load_more_btn" data-val="0">Click For More Data</button>
                        </div>
                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div>
      
        <!-- container-fluid -->
      <div class="modal fade" id="editsubadmin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-body text-center p-5">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
    </div>
    <?php $this->load->view('admin/footer.php'); ?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script src="<?=base_url()?>assets/js/table2excel.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

<script>
  // lazy loading images
function lazyLoad_data() {
    var images = document.querySelectorAll('img[data-src]');

    for (var i = 0; i < images.length; i++) {
        var image = images[i];
        var rect = image.getBoundingClientRect();

        // Check if the image is in the viewport
        if (rect.top >= 0 && rect.top <= window.innerHeight) {
            // Load the image
            image.src = image.getAttribute('data-src');
            image.removeAttribute('data-src');
        }
    }
}

window.addEventListener('scroll', lazyLoad_data);
lazyLoad_data();
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
  
  function changetabledata() {
      var jila_id = $("#jila_id").val();
      var vidhansabha_id = $("#vidhansabha_id").val();
      var pachayat_id = $("#pachayat_id").val();
      var mandal_id = $("#mandal_id").val();
      var gram_id = $("#gram_id").val();
      var booth_id = $("#booth_id").val();
      var dayitv = $("#dayitv").val();
      var pagedata = $("#pagedata").val();
    
    
    
      $.ajax({
        url: "<?=base_url()?>master/changetabledata",
        type: "POST",
        data: {
        	booth_id : booth_id,
          	dayitv : dayitv,
          	pagedata : pagedata,
          	jila_id : jila_id,
          	vidhansabha_id : vidhansabha_id,
          	pachayat_id : pachayat_id,
          	mandal_id : mandal_id,
          	gram_id : gram_id,
          	level : <?=$this->uri->segment(3)?>,
        },
        success: function(result) {
          $("#tabledata").html(result);
        },
      })
  }
  
             
  function exportfilterdata() {
      var jila_id = $("#jila_id").val();
      var vidhansabha_id = $("#vidhansabha_id").val();
      var pachayat_id = $("#pachayat_id").val();
      var mandal_id = $("#mandal_id").val();
      var gram_id = $("#gram_id").val();
      var booth_id = $("#booth_id").val();
      var dayitv = $("#dayitv").val();
      var pagedata = $("#pagedata").val();
    
      $.ajax({
        url: "<?=base_url()?>master/exportfilterdata",
        type: "POST",
        data: {
        	booth_id : booth_id,
          	dayitv : dayitv,
          	pagedata : pagedata,
          	jila_id : jila_id,
          	vidhansabha_id : vidhansabha_id,
          	pachayat_id : pachayat_id,
          	mandal_id : mandal_id,
          	gram_id : gram_id,
          	level : <?=$this->uri->segment(3)?>,
        },
        success: function(result) {
          $("#tabledata").html(result);
        },
      })
  }        
  
  
  $(document).ready(function() {
      $("#sendsms").on('submit', (function(e) {

        e.preventDefault();
        err = 0;
        var formData = new FormData(this);

        if (err == 0) {
          $.ajax({
            url: "<?= base_url() ?>master/sendsms",
            type: "POST",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function(result) {
              var response = JSON.parse(result);
              if (response.done == 1) {

              } else {
                alert(response.error);
              }
            }
          });
        }
      }));
    });
  
  
  
  function showmsg(id) {
  	 $.ajax({
        url: "<?=base_url()?>master/showmsg",
        type: "POST",
        data: {
        	id : id
        },
        success: function(result) {
          $("#msgdisplay").html(result);
        },
     })
  }
  
  
  $('#select-all').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $(':checkbox').each(function() {
            this.checked = true;                        
        });
    } else {
        $(':checkbox').each(function() {
            this.checked = false;                       
        });
    }
}); 
  
  
  function hitfunction(id) {
    $(".block1").css('background','#97bc77');
  	$("#block_"+id).css('background','#ff9933');
  }
  
</script>
<script>
  function exportfilterdata1()
  {
    $("#Datatable1").table2excel({
      filename: "Table.xls"
    });
  }
  
  function show_call(to_number)
  {
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
  
  
  $(document).ready(function(){

    var limit = 100;
    function load_data(limit)
    {
      $.ajax({
        url:"<?php echo base_url(); ?>dashboard/leveldata_scroll/6",
        method:"POST",
        data:{limit:limit},
        cache: false,
        success:function(data)
        {
          if(data == '')
          {
            $('#load_data_message').html('<h3>No More Result Found</h3>');
          }
          else
          {
            $('#tabledata').append(data);
            $('#load_data_message').html("");
          }
        }
      })
    }
    
    $(window).scroll(function(){
      //if($(document).height() - $(window).height() - $(window).scrollTop())
        if($(window).scrollTop() + $(window).height() > $("#tabledata").height())
      {
        setTimeout(function(){
          //load_data(limit);
        }, 1000);
       
      }
    });

  });

  
</script>

