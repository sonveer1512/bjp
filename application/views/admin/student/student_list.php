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
      <script src="<?=base_url()?>assets/js/pages/datatables.init.js"></script>
<script type="text/javascript">
    $(document).ready( function () {
    $('#Datatable1').DataTable();
} );
</script>


<div class="vertical-overlay"></div>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Student New Voter Data</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?php base_url()?>Dashboard">Dashboards</a></li>
                                <li class="breadcrumb-item active">Student Data</li>
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
                            <h4 class="card-title mb-0 flex-grow-1">Student New Voter Data</h4>
                          	<div class="flex-shrink" style="margin-right: 10px;">
                              <select class="form-control form-select" onchange="filter_gram_pan(this.value)">
                               <option value="all" selected>All</option>
                                                    <?php if(!empty($filter_gram)){ foreach($filter_gram as $val){ $sql = $this->student_model->list_common_where3('grampanchyat','id',$val['gram_panchayat_id']);?>
                                                    <option value="<?=$sql[0]['id']?>"><?=$sql[0]['gram_panchyat']?></option>
                                                    <?php } } ?>
                              </select>
                          </div>
                            <div class="flex-shrink-0">
                              	
                                <?php if($this->rbac->hasPrivilege('student_data','can_add')) { ?>
                               <button type="button" data-toggle="tooltip" data-placement="bottom" title="Upload New Excel" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Upload Excel</button>
								<?php } ?>
								
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
                                            <a href="<?php echo base_url(); ?>Sample/sample_student_data.xlsx" download> <button type="button" data-toggle="tooltip" data-placement="bottom" title="Upload Sample Data" class="btn btn-primary waves-effect waves-light">Sample Excel</button></a><br><br>
                                            <form method="POST" id="upload_excel" enctype="multipart/form-data">
                                              	<div class="col-md-12">
                                                    
                                                  <select class="form-control form-select" id="gram_panchayat" name="gram_panchayat">
                                                    <option value="" selected>Select Gram Panchayat</option>
                                                    <?php if(!empty($gram_panchayat)){ foreach($gram_panchayat as $val){ ?>
                                                    <option value="<?=$val['id']?>"><?=$val['gram_panchyat']?></option>
                                                    <?php } } ?>
                                                  </select>
                                                    <div class="error" id="gram_Error"></div>
                                                </div><br>
                                                <div class="col-md-12">
                                                    <input type="file" class="form-control" id="uploadFile" name="uploadFile" placeholder="Select Your File"  accept=".xls, .xlsx">
                                                    <div class="error" id="uploadError"></div>
                                                </div><br>
                                                <div class="hstack datasend gap-2 justify-content-center">
                                                    <a href="#" class="btn btn-danger" data-bs-dismiss="modal"> Close</a>

                                                    <input type="submit" name="fileuploadsubmit" class="btn btn-primary" value="Upload">
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                      
                      
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="card-body">
                            
                                    <div id="fixed-header_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                      <div class="row">
                                        <div class="col-sm-12">
                                          
                                          <table id="fixed-header" class="table table-bordered dt-responsive nowrap table-striped align-middle dataTable no-footer dtr-inline" aria-describedby="fixed-header_info">
                                        <thead>
                                            <tr>
                                             
                                              <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 606.4px;" aria-label="SR No.: activate to sort column ascending">ID</th>
                                              <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 538.4px;" aria-label="ID: activate to sort column ascending">Gram Panchayat</th>
                                              <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 906.4px;" aria-label="Purchase ID: activate to sort column ascending">Name</th>
                                              <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 538.4px;" aria-label="Title: activate to sort column ascending">Father`s Name </th>
                                              <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 538.4px;" aria-label="User: activate to sort column ascending">Class / Section</th>
                                              <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 538.4px;" aria-label="Assigned To: activate to sort column ascending">Contact</th>
                                              <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 538.4px;" aria-label="Assigned To: activate to sort column ascending">School</th>
                                              <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 538.4px;" aria-label="Action: activate to sort column ascending">Call</th>
											</tr>
                                          
                                        </thead>
                                        <tbody id="filter_data">
                                           
                                            <?php 
                                            $i = 1;
                                          if(!empty($student)){
                                            foreach($student as $row)
                                            { 
                                            ?>
                                        <tr class="odd">
                                                
                                                <td><?php echo $i;?></td>
                                                <td><?php if (!empty($row['gram_panchayat_id'])) { $sql = $this->student_model->list_common_where3('grampanchyat','id',$row['gram_panchayat_id']);?> <?php echo $sql[0]['gram_panchyat']?> <?php }?></td>
                                                <td><?php if (!empty($row['name'])) {?><?php echo $row['name']?> <?php }?></td>
                                                <td><?php if (!empty($row['father_name'])) {?><?php echo $row['father_name']?> <?php }?></td>
                                                <td><?php if (!empty($row['class_section'])) {?><?php echo $row['class_section']?> <?php }?></td>
                                          		<td><?php if (!empty($row['contact'])) {?><?php echo $row['contact']?> <?php }?></td>
                                                <td><?php if (!empty($row['school'])) {?><?php echo $row['school'];?> <?php }?></td>
                                          		<td>
                                                <i class="ri-phone-line" style="color: blue;" class="" data-bs-toggle="modal" onclick="show_call(<?php echo $row['contact']; ?>)" data-bs-target="#editsubadmin" data-call="<?php echo $row['contact']; ?>"></i>
                                                </td>
                                               
                                          	<!-- <?php if($this->rbac->hasPrivilege('school_data','can_edit')) { ?>
                                                <td>

                                                    <i class="ri-edit-box-line editmodel" style="color: blue;" class="" data-bs-toggle="modal" data-bs-target="#editsubadmin" data-id="<?php echo $row['id']; ?>"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                  <i class="ri-delete-bin-line" name="archive" class="remove" type="submit" onclick="archiveFunction(<?php echo $row['id']; ?>)" data-toggle="tooltip" data-placement="bottom"  style="color: red;"></i>
                                                   
                                                </td>
                                            <?php } ?> -->

                                            
                                               
                                            </tr>
                                           <?php $i++; } }?>
                                         </tbody>
                                    </table>
                                             
                                          <div id="loadingIndicator" style="display: none;">Loading...</div>

                                        </div>
                                      </div>
                                      
                            	</div>
                                </div>
                        </div>
                        
                      </div>
                      
                      
                      
                      
                        <!--<div class="card-body">
                         <div class="live-preview">-->
                         
                          
                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->
            

        </div>
        <!-- container-fluid -->
        </div>
       <div class="modal fade" id="editsubadmins" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">Edit Tean Leader</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" onClick="window.location.reload();" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                     <div id="successs">

                                        </div>
                </div>
            </div>
        </div>
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

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

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
          url: "<?=base_url()?>team_leader/delete/id",
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
              beforeSend: function() {
            $(".datasend").html('<lord-icon src="https://cdn.lordicon.com/xjovhxra.json" trigger="loop" colors="primary:#109121" style="width:20px;height:20px;"></lord-icon>');
        	
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
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
        let currentPage = 2; // Assuming initial data is already loaded on page load

        function fetchData() {
            const loadingIndicator = document.getElementById('loadingIndicator');
            loadingIndicator.style.display = 'block';

            axios.get('<?php echo site_url("StudentData/fetchData"); ?>', {
                params: {
                    page: currentPage,
                }
            })
            .then(response => {
                const newData = response.data;
                const table = document.getElementById('fixed-header');
                const tbody = table.getElementsByTagName('tbody')[0];
                newData.forEach(item => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td><?php echo $i;?></td>
                        <td><?php if (!empty($row['gram_panchayat_id'])) { $sql = $this->student_model->list_common_where3('grampanchyat','id',$row['gram_panchayat_id']);?> <?php echo $sql[0]['gram_panchyat']?> <?php }?></td>
                        <td><?php if (!empty($row['name'])) {?><?php echo $row['name']?> <?php }?></td>
                        <td><?php if (!empty($row['father_name'])) {?><?php echo $row['father_name']?> <?php }?></td>
                        <td><?php if (!empty($row['class_section'])) {?><?php echo $row['class_section']?> <?php }?></td>
                        <td><?php if (!empty($row['contact'])) {?><?php echo $row['contact']?> <?php }?></td>
                        <td><?php if (!empty($row['school'])) {?><?php echo $row['school'];?> <?php }?></td>
                        <td>
                            <i class='ri-phone-line' style='color: blue;' class='' data-bs-toggle='modal' onclick="show_call(<?php echo $row['contact']; ?>)" data-bs-target="#editsubadmin" data-call="<?php echo $row['contact']; ?>"></i>
                        </td>
                    `;
                  
                    tbody.appendChild(row);
                  	
                });

                loadingIndicator.style.display = 'none';
                currentPage++;
            })
            .catch(error => {
                console.error('Error:', error);
                loadingIndicator.style.display = 'none';
            });
        }

        // Attach a scroll event listener to trigger loading more data
        window.addEventListener('scroll', () => {
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                fetchData();
            }
        });

        // Initial data load (already loaded on page load)
        window.addEventListener('load', () => {
            fetchData();
        });
</script>


</body>

</html>
