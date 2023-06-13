 <?php $sess = $this->session->userdata('pmsadmin');
    $name = $sess['name'];
    $role = $sess['role'];
    $id = $sess['id'];

    ?>

 <form method="POST" class="editprojectlist" id="editprojects">
     <div class="row g-3">
         <?php if ($role == 'Master') { ?>
             <div class="col-xxl-6">
                 <div>
                     <label for="firstName" class="form-label">Select Regional Head</label>
                     <select class="form-select form-control" name="pregional" id="pregional" onchange="fetchdatass(this.value)">
                         <?php foreach ($subadminData->result() as $data) { ?>
                             <option value="<?= $data->admin_user_id; ?>" <?php if($content[0]['regional_head'] == $data->admin_user_id) { echo "selected"; }?>  ><?php echo $data->admin_name; ?></option>
                         <?php } ?>
                     </select>
                 </div>
                 <div class="error" id="regError"></div>
             </div>
             <!--end col-->
         <?php } ?>

         <?php if ($role == 'Master') { ?>
             <div class="col-xxl-6">
                 <div>
                     <label for="firstName" class="form-label">Select Project Manager</label>
                     <select class="form-select form-control pprojectm12" id='pprojectm12' name="pprojectm1">
                         <option>Select Project Manager</option>

                     </select>
                 </div>
                 <div class="error" id="pmError"></div>
             </div>
             <!--end col-->
         <?php } ?>
         <?php if ($role == 'Subadmin') { ?>
             <div class="col-xxl-6">
                 <div>
                     <label for="firstName" class="form-label">Select Project Manager</label>
                     <select class="form-select form-control" id='x' name="pprojectms">
                         <option><?php $admin_name =  $content[0]['project_manager'];
                                    $this->db->select('*');
                                    $this->db->from('master_admin');
                                    $this->db->where('admin_user_id', $admin_name);
                                    $rows1 = $this->db->get()->row();

                                    echo $rows1->admin_name;


                                    ?></option>

                         <?php foreach ($projectdata->result() as $data) {
                            ?>
                             <option value="<?= $data->admin_user_id; ?>"><?php echo $data->admin_name; ?></option>
                         <?php } ?>
                     </select>
                 </div>
                 <div class="error" id="pmError"></div>
             </div>
             <!--end col-->
         <?php    } ?>


         <div class="col-xxl-6">
             <div>
                 <label for="lastName" class="form-label">Project Name</label>
                 <input type="text" name="pname" id="pname" class="form-control" id="lastName" value="<?php echo $content[0]['p_name']; ?>" placeholder="Enter Project Name">
             </div>
             <div class="error" id="pnameError"></div>
         </div>
         <!--end col-->
         <div class="col-xxl-6">
             <div>
                 <label for="emailInput" class="form-label">Project Description</label>
                 <input type="text" name="pdes" id="pdes" class="form-control" id="emailInput" value="<?php echo $content[0]['p_des']; ?>" placeholder="Enter your Project Description">
             </div>
             <div class="error" id="pdescError"></div>
         </div>
         <!--end col-->
         <div class="col-xxl-6">
             <div>
                 <label for="emailInput" class="form-label">Project Venue</label>
                 <input type="text" name="pvenue" id="pvenue" class="form-control" id="emailInput" value="<?php echo $content[0]['p_venue']; ?>" placeholder="Enter your Project Venue">
             </div>
             <div class="error" id="pvenueError"></div>
         </div>
         <!--end col-->
         <div class="col-xxl-6">
             <div>
                 <label for="emailInput" class="form-label">Start Date</label>
                 <input type="date" name="pstart_date" id="pstart_date" class="form-control" value="<?php echo $content[0]['p_start_date']; ?>" id="emailInput" placeholder="Enter your Project Description">
             </div>
             <div class="error" id="startError"></div>
         </div>
         <!--end col-->
         <div class="col-xxl-6">
             <div>
                 <label for="emailInput" class="form-label">End Date</label>
                 <input type="date" name="pend_date" id="pend_date" class="form-control" id="emailInput" value="<?php echo $content[0]['p_end_date']; ?>" placeholder="Enter your Project Description">
             </div>
             <div class="error" id="endError"></div>
         </div>
         <!--end col-->
         <div class="col-lg-12">
             <div class="hstack gap-2 justify-content-end">
                 <button type="button" class="btn btn-light" onClick="window.location.reload();" data-bs-dismiss="modal">Close</button>
                 <button type="submit" class="btn btn-primary">Submit</button>
             </div>
         </div>
         <!--end col-->
     </div>
     <!--end row-->
     <input type="hidden" value="<?php echo $content[0]['p_id']; ?>" name="p_id">
 </form>
 <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


 <script type="text/javascript">

    $.ajax({
        url: "<?php echo base_url('Projects/userdetailedit'); ?>",
        type: "POST",
        data: {
            userid: <?=$content[0]['regional_head']?>
        },
        success: function(response) {
            var dataResult = JSON.parse(response);
            $('.pprojectm12').html(dataResult);
            // alert(response);
            
        }
    })
    
    function fetchdatass(userid) {
       var userid = userid;
    //    alert(userid);
       $.ajax({
           url: "<?php echo base_url('Projects/userdetailedit'); ?>",
           type: "POST",
           data: {
               userid:userid
           },
           success: function(response) {
               var dataResult = JSON.parse(response);
               $('.pprojectm12').html(dataResult);
              
           }
       })
   }
</script>