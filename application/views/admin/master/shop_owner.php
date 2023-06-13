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

                            <li class="breadcrumb-item"></li>
                            <li class="breadcrumb-item active">Shop Owner</li>
                        </ol>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
              
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">दूकान का मालिक</h4>
                          	<!-- <a href="<?=base_url()?>welcome/generateinvoicepdf/" target="_blank" class="btn btn-primary btn-sm" style="float: right;">Download Data</a> -->

                        </div><!-- end card header -->

                        <div class="card-body" id="showpeopledata">
                            <div class="row">
                            <?php
                            
                                foreach ($parent_list as $value) {  ?>
                                <div class="col-xl-6">
                                    <div class="card">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <img class="rounded-start img-fluid  object-cover" src="https://axepertexhibits.com/bjploksabhachittorgarh/shopowner/images/<?=$value['image']?>" alt="Card image" style="margin-top: 50px;">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-header">
                                                    <h5 class="card-title mb-0">नाम : <?= $value['name']?> </h5>
                                                </div>
                                                <div class="card-body">
                                                    <p class="card-text mb-2">व्यवसाय का प्रकार : <?= $value['business_type']?></p>
                                                    <p class="card-text mb-2">प्रतिष्ठान का नाम : <?= $value['firm_name']?></p>
                                                    <p class="card-text mb-2">पता : <?= $value['address']?></p>
                                                    <p class="card-text mb-2">दूरभाष : <?= $value['mobile']?></p>
                                                </div>
                                                <div class="btn-group" style="float: right;">
                                                            <a class="btn btn-light dropdown-toggle msgbot" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item editpeople" data-id="2">Edit</a>
                                                                <a class="dropdown-item" onclick="archiveFunction(<?= $value['id']?>)">Delete</a>
                                                            </div>
                                                        </div> 
                                            </div>
                                        </div>

                                    </div><!-- end card -->
                                </div><!-- end col -->
                                <?php } ?>
                            </div>
                                
                        </div>



                        </div><!-- end card-body -->


                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div>
        <!-- container-fluid -->
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
          url: "<?=base_url()?>master/deleteshopowner/"+id,
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