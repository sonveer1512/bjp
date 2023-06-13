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
                        <ol class="breadcrumb m-0">

                            <li class="breadcrumb-item"><?= $parent_list[0]['name'] ?? '' ?></li>
                            <li class="breadcrumb-item active">Add People</li>
                        </ol>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">प्रवासी जोड़ें </h4>

                        </div><!-- end card header -->

                        <div class="card-body editpeopledata">
                            <div class="live-preview">
                                <form method="POST" id="addpoeple" enctype="multipart/form-data">
                                  	<input type='hidden' name='level_id' value="<?=$this->uri->segment('4') ?? '1'; ?>">
                                    <div class="row g-3">
                                        <div class="col-xxl-6">
                                            <div>
                                                <label for="firstName" class="form-label">नाम</label>
                                                <input type="text" class="form-control" name="name" id="name" placeholder="नाम">
                                            </div>
                                            <div class="error" id="nameError"></div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-xxl-6">
                                            <div>
                                                <label for="lastName" class="form-label">दायित्व</label>
                                              	<select class="form-control" name="liability" id="liability">
                                                  <option>select</option>
                                                  <?php
  												  $query = $this->api_model->list_common('morcha_dayitv');
                                                  foreach($query as $row) { ?>
                                                    <option value="<?=$row['title']?>/<?=$row['id']?>"> <?=$row['title']?></option>
                                                  <?php } ?>
                                                </select>
                                            </div>
                                            <div class="error" id="lError"></div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-xxl-6">
                                            <div>
                                                <label for="lastName" class="form-label">जन्म दिनांक </label>
                                                <input type="date" class="form-control" name="dob" id="dob" placeholder="जन्म दिनांक">
                                            </div>
                                            <div class="error" id="dobError"></div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-xxl-6">
                                            <div>
                                                <label for="emailInput" class="form-label">दूरभाष </label>
                                                <input type="number" class="form-control" name="contact" id="contact" placeholder="दूरभाष ">
                                            </div>
                                            <div class="error" id="contactError"></div>
                                        </div>
                                        <div class="col-xxl-6">
                                            <div>
                                                <label for="emailInput" class="form-label">फोटो चुनें</label>
                                                <input type="file" class="form-control" name="image" id="image" placeholder="फोटो चुनें ">
                                                <input type="hidden" class="form-control" name="id" id="id" value="<?= $id; ?>">
                                            </div>
                                            <div class="error" id="imageError"></div>
                                        </div>
                                        <!--end col-->

                                        <!--end col-->

                                        <!--end col-->
                                        <div class="col-lg-12">
                                            <div class="hstack gap-2 justify-content-end">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                <input type="submit" class="btn btn-primary" value="Submit">
                                            </div>
                                            <div class="eqres1"></div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </form>
                            </div>
                        </div><!-- end card-body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">जुड़े प्रवासी </h4>
                          	<a href="#" data-bs-toggle="modal" data-bs-target="#import_excel_people" class="btn btn-primary btn-sm" style="float: right;">Import Excel</a> &nbsp;&nbsp;&nbsp;
                          	<a href="<?=base_url()?>master/exportexcel/<?=$id?>" class="btn btn-primary btn-sm" style="float: right;">Download Data in Excel</a> &nbsp;&nbsp;&nbsp;
                          	<a href="<?=base_url()?>welcome/generateinvoicepdf/<?=$id?>" target="_blank" class="btn btn-primary btn-sm" style="float: right;">Download Data</a>

                        </div><!-- end card header -->

                        <div class="card-body" id="showpeopledata">

                        </div><!-- end card-body -->

                        <?php if (!empty($id)) {  ?>
                            <script>
                                getpeople(<?= $id ?>)

                                function getpeople(id) {

                                    sessionStorage.setItem('parent_id',id);

                                    $.ajax({
                                        url: "<?= base_url() ?>getpeoplelist/" + id,
                                        type: 'get',
                                        cache: true,
                                        contentType: false,
                                        processData: false,
                                        success: function(result) {
                                            $("#showpeopledata").html(result);
                                        },
                                    })
                                }
                            </script>

                        <?php } ?>

                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div>
        <!-- container-fluid -->
    </div>
  
  	<div class="modal fade" id="import_excel_people" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-body text-center p-5">
                                        <lord-icon src="https://cdn.lordicon.com/qduilmpq.json" trigger="loop" style="width:100px;height:100px">
                                        </lord-icon>

                                        <div class="mt-4">
                                            <h4 class="mb-3">Upload Your Excel Here</h4>
                                            <a href="<?php echo base_url(); ?>Sample/sample.xlsx" download> <button type="button" data-toggle="tooltip" data-placement="bottom" title="Upload Sample Data" class="btn btn-primary waves-effect waves-light">Sample Excel</button></a><br><br>
                                            <form method="POST" id="upload_excel" enctype="multipart/form-data">
                                                <div class="col-md-12">
                                                  	<input type="hidden" name="reffer_id" value="<?=$id?>">
                                                  	<input type="hidden" name="level_id" value="<?=$level_id?>">
                                                    <input type="file" class="form-control" id="uploadFile" name="uploadFile" placeholder="Select Your File" required accept=".xls, .xlsx">
                                                    <div class="error" id="uploadError"></div>
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


    <?php $this->load->view('admin/footer.php'); ?>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script>
    $(document).ready(function() {
        $("#addpoeple").on('submit', (function(e) {

            e.preventDefault();
            err = 0;
            var formData = new FormData(this);

            if (err == 0) {
                $.ajax({
                    url: "<?= base_url() ?>add_people",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(result) {
                        var response = JSON.parse(result);
                        if (response.done == 1) {

                            $(".eqres1").html("<span style='color: green'>प्रवासी सफलता पूर्वक जुड़ गए। </span>");
                            getpeople(sessionStorage.getItem('parent_id'));
                            $("#addpoeple")[0].reset();
                           
                        } else {
                            alert(response.error);
                        }
                    }
                });
            }
        }));
    });
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $('.editpeople').click(function() {


            var id = $(this).data('id');

            $.ajax({
                url: "<?= base_url('master/editpeople/'); ?>" + id,
                type: "post",
                data: {
                    id: id
                },
                success: function(response) {


                    $('.editpeopledata').html(response);



                }
            })


        });
    });

    $(document).on('submit', '#editformpoeple', function(ev) {
        ev.preventDefault(); // Prevent browers default submit.
        var formData = new FormData(this);
        $.ajax({
            url: "<?= base_url() ?>master/updatepeople/",
            type: 'post',
            data: formData,
            success: function(result) {
                //json data

                var dataResult = JSON.parse(result);
                
                if (dataResult.done == 1) {
                   
                            getpeople(sessionStorage.getItem('parent_id'));

                            $(".eqres2").html("<span style='color: green'>प्रवासी की जानकारी सफलता पूर्वक सम्पादित हो चुकी है।</span>");
                           // $("#editformpoeple")[0].reset();
                            document.getElementById("editformpoeple").reset();

                        } else {
                            alert(response.error);
                        }
             },
            cache: false,
            contentType: false,
            processData: false,
        })
    })
</script>

<script type="text/javascript">
    function archiveFunction(id) {
        event.preventDefault(); // prevent form submit
        
        var form = event.target.form; // storing the form
        swal({
                title: "कृपया सुनिश्चित कर ले ?",
                text: "कि आप इस रिकॉर्ड को मिटाना चाहते हैं ?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "हाँ , मिटाना चाहते हैं ",
                cancelButtonText: "नहीं , रखना है !",
                closeOnConfirm: false,
                closeOnCancel: false
            },
           function(isConfirm){
             if (isConfirm) {
      $.ajax({
          url: "<?=base_url()?>master/deletepeople/"+id,
          type: "post",
          data: {id:id},
          success:function(){
            swal('रिकॉर्ड मिटाया गया 🙂', ' ', 'success');
            getpeople(sessionStorage.getItem('parent_id'));
            $("#delete"+admin_user_id).fadeTo("slow", 0.7, function(){
              $(this).remove();
            })
           

          },
          error:function(){
            swal('रिकॉर्ड नहीं  मिटाया गया  ☹️', 'error');
          }
      });
  }
  else {
               swal("Cancelled", "आपका रिकॉर्ड सुरक्षित है 🙂", "error");
            }
      
    });
    }
</script>

<script>
    $(document).on('submit', '#upload_excel', function(ev) {
        $('.error').html('');
        ev.preventDefault(); // Prevent browers default submit.
        var formData = new FormData(this);
        var error = false;
        var uploadFile = $('#uploadFile').val();
        if (uploadFile == '') {
            $('#uploadError').html('Select Excel for upload');
            $('.error').css('color', 'red');
            error = true;


        }

        if (error == false) {
            $.ajax({
                url: "<?= base_url(); ?>master/imp_excel",
                type: 'post',
                data: formData,
                success: function(result) {

                    var dataResult = JSON.parse(result);
                    if (dataResult.done == 1) {
                       swal('Excel Uploaded 🙂', ' ', 'success');
                       getpeople(sessionStorage.getItem('parent_id'));
                    }

                    if (dataResult.inserted == 0) {
                       alert(dataResult.not_exisiting);
                      
                        

                    }
                    

                },
                cache: false,
                contentType: false,
                processData: false,
            })

        }

    })
</script>