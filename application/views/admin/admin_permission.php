<?php include 'link.php'; ?>
<!-- Begin page -->
<div id="layout-wrapper">

    <?php include 'topar.php'; ?>

    <?php include 'imgheader.php'; ?>
    <?php include 'sidebar.php'; ?>
</div>

<div class="vertical-overlay"></div>

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Admin Permission</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                <li class="breadcrumb-item active">Admin Permission</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
             <form method="POST" id="addpermission">
              <label for="emailInput" class="form-label">Select Admin Role</label>
             <select class="form-select mb-3" name="admin_select"  id="admin_select" onchange="fetchdata(this.value)" aria-label="Default select example">
                <option  value="">Select Admin Role</option>
                <?php foreach ($admin->result() as $row) { ?>
                
                <option value="<?php echo $row->role_id; ?>"><?php echo $row->role_name; ?></option>
                
            <?php } ?>
            </select>
             <div class="card-body">


                            <div class="live-preview">
                                <div class="table-responsive table-card">
                                   
                                    <table class="table align-middle table-nowrap mb-0" id="datatable">
                                        <thead class="table-light">
                                            <tr>
                                                
                                                <th scope="col">ID</th>
                                                <th scope="col">Category</th>
                                                 <th scope="col">Can Create</th>
                                                <th scope="col">Can Edit</th>
                                                <th scope="col">Can Delete</th>
                                                <th scope="col">Can View</th>
                                                <th scope="col">Change Password</th>
                                               
                                              
                                                
                                            </tr>
                                        </thead>
                                        <tbody id="changedata">
                                            
                                            <?php 
                                            $i=1;
                                            foreach($category->result() as $rows)

                                            { 
                                                
                                            ?>
                                           
                                            <?php  $i++; } ?>
                                        </tbody>
                                    </table>
                                    <input type="submit" name="submit" class="btn btn-primary" id="submit">
                                    
                                    <input type="hidden" name="subtree_id" value="<?php echo $rows->subtree_id; ?>">
                                </div>
                            </div>

                        </div><!-- end card-body -->
                    </form>


        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
   

    <?php include 'footer.php'; ?>
</div>
</div>

<!-- JAVASCRIPT -->
<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/libs/node-waves/waves.min.js"></script>
<script src="assets/libs/feather-icons/feather.min.js"></script>
<script src="assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<!-- apexcharts -->
<script src="assets/libs/apexcharts/apexcharts.min.js"></script>

<!-- Vector map-->
<script src="assets/libs/jsvectormap/js/jsvectormap.min.js"></script>
<script src="assets/libs/jsvectormap/maps/world-merc.js"></script>

<!--Swiper slider js-->
<script src="assets/libs/swiper/swiper-bundle.min.js"></script>

<!-- Dashboard init -->
<script src="assets/js/pages/dashboard-ecommerce.init.js"></script>

<!-- App js -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="assets/js/app.js"></script>


<script type="text/javascript">
    
    function fetchdata(adminid) {        
        var adminid = adminid;
        $.ajax({
            url: "<?php echo  base_url('AdminPermission/getpermissiondata'); ?>",
            type: "POST",
            data: {
                adminid: adminid
            },
            success: function(result) {
                $("#changedata").html(result);
            }
        })
    }
</script>

<script type="text/javascript">
      // update modal
        $(document).on('submit','#addpermission', function(ev) {
            
            ev.preventDefault(); // Prevent browers default submit.
            var formData = new FormData(this);
            
         
            $.ajax({
                url: "<?php base_url()?>AdminPermission/updatepermission",
                type: 'post',
                data: formData,
                success: function(result) {
                    //json data

                      var dataResult = JSON.parse(result);
                     
                    if (dataResult.done == '1') {
                       swal('Role Permission Added Successfully 🙂', ' ', 'success');
                      
                        setTimeout(function() {
                            location.reload(true);
                        }, 1000);
                         
                    }

                     if (dataResult.done == '0') {
                       swal('Role Permission Not Added ☹️', ' ', 'error');
                      
                         
                    }

                   

                },
                cache: false,
                contentType: false,
                processData: false,
            })
        })
</script>

</body>

</html>