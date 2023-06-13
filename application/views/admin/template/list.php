<?php $this->load->view('admin/link.php'); ?>
<!-- Begin page -->
<div id="layout-wrapper">
    <?php $this->load->view('admin/topar.php'); ?>
    <?php $this->load->view('admin/imgheader.php'); ?>
    <?php $this->load->view('admin/sidebar.php'); ?>
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
                        <h4 class="mb-sm-0">SMS Template</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?php base_url() ?>Dashboard">Dashboards</a></li>
                                <li class="breadcrumb-item active">SMS Template</li>
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
                            <h4 class="card-title mb-0 flex-grow-1">SMS Template</h4>
                            <div class="flex-shrink-0">
                                 <button type="button" data-toggle="tooltip" data-placement="bottom" title="Add New Regional Head" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#exampleModalgrid"><i class="ri-user-add-line"></i></button>
                            </div>
                        </div><!-- end card header -->
                        
                        <div class="card-body">
                            <div class="live-preview">
                                <div class="table-responsive table-card">
                                    <table class="table align-middle table-nowrap mb-0" id="Datatable1" class="display">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Template Name</th>
                                                <th scope="col">Template ID</th>
                                                <th scope="col">Message</th>
                                                <th scope="col" colspan="4" style=" text-align: center;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($items as $key => $row) {
                                            ?>
                                                <tr id="delete<?php echo $row['id']; ?>">
                                                    <td><a href="#" class="fw-medium"><?php echo $key+1; ?></a></td>
                                                    <td> <?php if (!empty($row['template_name'])) { ?><?php echo $row['template_name']; ?> <?php } ?></td>
                                                    <td> <?php if (!empty($row['template_id'])) { ?><?php echo $row['template_id']; ?> <?php } ?></td>
                                                    <td><?php if (!empty($row['message'])) { ?><?php echo $row['message']; ?> <?php } ?></td>
                                                    
                                                    <td>
                                                      <i class="ri-edit-box-line editmodel" style="color: blue;" class="" data-bs-toggle="modal" data-bs-target="#editsubadmin" data-id="<?php echo $row['id']; ?>"></i>
                                                    </td>
                                                </tr>
                                                <input type="hidden" name="admin_user_id" value="<?php echo $row['id']; ?>">
                                            <?php } ?>
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
  
  	<div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalgridLabel">Add New Template</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div id="success">
              <div id="error">
              </div>
            </div>
            <form method="POST" id="addSubadmin">
              <div class="row g-3">
                <div class="col-xxl-12">
                  <div>
                    <label for="firstName" class="form-label">Template Title</label>
                    <input type="text" class="form-control" name="template_name" id="template_name">
                  </div>
                </div>
                <!--end col-->
                <div class="col-xxl-12">
                  <div>
                    <label for="lastName" class="form-label">Template Text</label>
                    <textarea class="form-control" name="message" id="message"></textarea>
                  </div>
                  <div class="error" id="subemailError"></div>
                </div>
                
                <div class="col-xxl-12">
                  <div>
                    <label for="firstName" class="form-label">Template ID</label>
                    <input type="text" class="form-control" name="template_id" id="template_id">
                  </div>
                </div>
                
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
  
  
  
    <div class="modal fade" id="editsubadmin" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">Edit Template</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" onClick="window.location.reload();" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="editstaffdetails">

                      <div id="editstaffdiv"></div>

                      <div class="row">
                        <div class="col-lg-12">
                          <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Edit </button>
                          </div>
                        </div>
                      </div>

                  </form>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('admin/footer');?>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">


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
        
        $.ajax({
          url: "<?= base_url('templates/add'); ?>",
          type: 'post',
          data: formData,
          success: function(result) {
            if (result.code == '200') {
              swal(result.message, ' ', 'success');
              setTimeout(function() {
                location.reload(true);
              }, 1000);
            }else{
              swal(result.message, ' ', 'error');
            }
          },
          cache: false,
          contentType: false,
          processData: false,
        })
    })
  
  
  
  	$(document).on('submit', '#editstaffdetails', function(ev) {
        $('.error').html('');
        ev.preventDefault(); // Prevent browers default submit.
        var formData = new FormData(this);
        
        $.ajax({
          url: "<?= base_url('templates/update'); ?>",
          type: 'post',
          data: formData,
          success: function(result) {
            if (result.code == '200') {
              swal(result.message, ' ', 'success');
              setTimeout(function() {
                location.reload(true);
              }, 1000);
            }else{
              swal(result.message, ' ', 'error');
            }
          },
          cache: false,
          contentType: false,
          processData: false,
        })
    })
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.editmodel').click(function() {
            var userid = $(this).data('id');
            $.ajax({
                url: "<?= base_url('templates/edit'); ?>",
                type: "post",
                data: {
                    id: userid
                },
                success: function(response) {
                    $('#editstaffdiv').html(response);
                }
            })
        });
    });
</script>
</body>
</html>