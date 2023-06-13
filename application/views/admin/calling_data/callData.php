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
      


<div class="vertical-overlay"></div>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Calling Data</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?php base_url()?>Dashboard">Dashboards</a></li>
                                <li class="breadcrumb-item active">Calling Data</li>
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
                            <h4 class="card-title mb-0 flex-grow-1">Calling Data</h4>
                          	<div class="flex-shrink" style="margin-right: 10px;">
                              <select class="form-control form-select" onchange="filter_gram_pan(this.value)">
                               <option value="all" selected>All</option>

                              </select>
                          </div>
                          </div><!-- end card header -->
						 <div class="row">
                        <div class="col-lg-12">
                          <div class="card-body">
                            
                                    <div id="fixed-header_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                      <div class="row">
                                        <div class="col-sm-12">
                                          
                                          <table id="fixed-header" class="table table-bordered dt-responsive nowrap table-striped align-middle dataTable no-footer dtr-inline" aria-describedby="fixed-header_info">
                                        <thead>
                                            <tr>
                                             
                                              <th >ID</th>
                                              <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 538.4px;" aria-label="Assigned To: activate to sort column ascending">Call Status</th>
                                              <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 906.4px;" aria-label="Purchase ID: activate to sort column ascending">Call From</th>
                                              <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 538.4px;" aria-label="Title: activate to sort column ascending">Call To </th>
                                              <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 538.4px;" aria-label="User: activate to sort column ascending">Start Time</th>
                                              <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 538.4px;" aria-label="Assigned To: activate to sort column ascending">End Time</th>
                                              <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 538.4px;" aria-label="Assigned To: activate to sort column ascending">Duration</th>
                                              <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 900.4px;" aria-label="Assigned To: activate to sort column ascending">Listen Recording</th>
                                              <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="2" style="width: 538.4px;" aria-label="Action: activate to sort column ascending">Action</th> 
											</tr>
                                          
                                        </thead>
                                        <tbody id="filter_data">
                                           
                                            <?php 
                                            $i = 1;
                                          if(!empty($calling)){
                                            foreach($calling as $row)
                                            { 
                                            ?>
                                        <tr class="odd">
                                                
                                                <td><?php echo $i;?></td>
                                                <td><?php if (!empty($row['Status'])) {
                                              	if($row['Status'] == 'completed'){ ?>
                                                  <span class="badge badge-soft-success"><?=$row['Status']?></span>
                                                  <?php } else if($row['Status'] == 'busy'){ ?>
                                                 <span class="badge badge-soft-warning"><?=$row['Status']?></span>
                                                  <?php } else if($row['Status'] == 'failed'){ ?>
                                                   <span class="badge badge-soft-danger"><?=$row['Status']?></span>
                                                  <?php } else if($row['Status'] == 'no-answer'){ ?>
                                                  <span class="badge badge-soft-danger"><?=$row['Status']?></span>
                                          		<?php } }?>
                                          		</td>
                                                
                                                <td><?php if (!empty($row['call_From'])) {?><?php echo $row['call_From']?> <?php }?></td>
                                          		<td ><?php if (!empty($row['call_To'])) {?><?php echo $row['call_To']?> <?php }?></td>
                                                <td><?php if (!empty($row['StartTime'])) {?><?php echo $row['StartTime'];?> <?php }?></td>
                                          		<td><?php if (!empty($row['EndTime'])) {?><?php echo $row['EndTime'];?> <?php }?></td>
                                          		<td><?php if (!empty($row['Duration'])) {?><?php echo $row['Duration'];?> <?php }?></td>
                                          		<td><?php if (!empty($row['RecordingUrl'])) {?> <a href="<?=$row['RecordingUrl']?>" target="_blank">Click Here</a> <?php } else { echo "NA";} ?></td>
                                               
                                          		 
                                                <td>
                                                  <i class="ri-delete-bin-line" name="archive" class="remove" type="submit" onclick="archiveFunction(<?php echo $row['id']; ?>)" data-toggle="tooltip" data-placement="bottom"  style="color: red;"></i>
                                                 </td>
                                           		 <?php if($row['Status'] == 'busy' || $row['Status'] == 'failed' || $row['Status'] == 'no-answer'){ ?>
                                          		<td>

                                                    <i class="ri-phone-line" style="color: blue;" class="" data-bs-toggle="modal" onclick="show_call(<?php echo $row['call_To']; ?>)" data-bs-target="#editsubadmin" data-call="<?php echo $row['call_To']; ?>"></i>
                                                   
                                                </td>
                                          		<?php } else{ ?>
                                                <td></td>
                                                <?php } ?>
                                            </tr>
                                           <?php $i++; } }?>
                                         </tbody>
                                    </table>
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
       <div class="modal fade" id="editsubadmin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-body text-center p-5">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
    
       

        <!-- pass -->
       
    </div>
</div>

    <?php $this->load->view('admin/footer');  ?>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<!--datatable js-->
    

<!-- App js -->

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
           function(isConfirm){
             if (isConfirm) {
      $.ajax({
          url: "<?=base_url()?>CallingData/delete/id",
          type: "post",
          data: {id:id},
          success:function(){
            swal('Record Deleted 🙂', ' ', 'success');
             setTimeout(function() {
                            location.reload(true);
                        }, 1000);

          },
          error:function(){
            swal('Record Not Deleted ☹️', 'error');
          }
      });
  }
  	else{
			swal("Cancelled", "Record is safe 🙂", "error");
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

        if (error == false) {
            $.ajax({
                url: "<?= base_url(); ?>StudentData/upload",
                type: 'post',
                data: formData,
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
                url: "<?=base_url()?>manager/updateteamleader/",
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

<script>
  function filter_gram_pan(id)
  {
    $.ajax({
                method: 'post',
                url: "<?= base_url('StudentData/filter'); ?>",
                data: {
                    id: id,
                   },
                success: function(response) {
                    $('#filter_data').html(response);
                   
                }
            })
  }
</script>

<script>
   function show_call(to_number)
  {
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



</body>

</html>
