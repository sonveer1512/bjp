 <?php

    ?>
 <form method="POST" class="exhibitdata" id="exhibitModelEdit" enctype="multipart/form-data">
     <div class="row g-3">
         <div class="col-md-6">
             <div>
                 <label for="firstName" class="form-label">Title</label>
                 <select class="form-select form-control">
                     <option>Dr.</option>
                     <option>Mr.</option>
                     <option>Mrs.</option>
                     <option>Miss</option>
                     <option>Ms</option>
                 </select>
             </div>
         </div>
         <div class="col-md-6">
             <div>
                 <label for="firstName" class="form-label">Organization</label>
                 <input type="text" name="admin_exhibitor_organization" id="admin_exhibitor_organization" class="form-control" placeholder="Enter Organization" value="<?php echo $content[0]['ex_organization']; ?>">
             </div>
             <div class="error" id="exorgError"></div>
         </div>
         <div class="col-md-6">
             <div>
                 <label for="firstName" class="form-label">Exhibitor Name</label>
                 <input type="text" name="ex_name" id="ex_name" class="form-control" placeholder="Enter Exhibitor Name" value="<?php echo $content[0]['ex_name']; ?>">
             </div>
             <div class="error" id="exnameError"></div>
         </div>


         <div class="col-md-6">
             <div>
                 <label for="firstName" class="form-label">Chief Executive</label>
                 <input type="text" class="form-control" name="admin_exhibitor_chief_executive" id="admin_exhibitor_chief_executive" value="<?php echo $content[0]['ex_ch_executive']; ?>" placeholder="Enter Chief Executive">
             </div>
             <div class="error" id="exchexError"></div>
         </div>
         <div class="col-md-6">
             <div>
                 <label for="firstName" class="form-label">Designation</label>
                 <input type="text" class="form-control" name="admin_exhibitors_designation" id="admin_exhibitors_designation" placeholder="Enter Designation" value="<?php echo $content[0]['ex_designation']; ?>">
             </div>
             <div class="error" id="exdesError"></div>
         </div>
         <div class="col-md-6">
             <div>
                 <label for="firstName" class="form-label">Contact Executive</label>
                 <input type="number" class="form-control" name="admin_exhibit_contact_executive" id="admin_exhibit_contact_executive" placeholder="Enter Contact Executive" value="<?php echo $content[0]['ex_contact']; ?>">
             </div>
             <div class="error" id="excontactexError"></div>
         </div>
         <!--end col-->
         <div class="col-md-6">
             <div>
                 <label for="lastName" class="form-label">Email</label>
                 <input type="email" class="form-control" name="admin_email" id="admin_email" value="<?php echo $content[0]['ex_email']; ?>" placeholder="Enter Email" readonly>
             </div>
             <div class="error" id="exemailError"></div>
         </div>
         <!--end col-->

         <div class="col-md-6">
             <div>
                 <label for="emailInput" class="form-label">Admin Type</label>
                 <select class="form-control" name="admin_role">
                     <option value="Exhibitor">Exhibitor</option>
                 </select>
             </div>
         </div>
         <div class="col-md-6">
             <div>
                 <label for="emailInput" class="form-label">Select Image</label>
                 <input type="file" class="form-control" name="ex_image" id="ex_image" placeholder="Select Image" value="<?= $content[0]['ex_image']; ?>">
             </div>
             <?php
                if ($content[0]['ex_image'] != "") {
                ?> <center>
                     <img src="<?php echo base_url() ?>/webupload/<?= $content[0]['ex_image'] ?>" style="width:100px; height:100px;" border="0" />
                 </center>
             <?php } ?>
             <input type="hidden" id="spe_image" name="ex_image" value="<?= $content[0]['ex_image'] ?>">


             <div class="error" id="exwebError"></div>
         </div>
         <div class="col-md-6">
             <div>
                 <label for="emailInput" class="form-label">Contact</label>
                 <input type="number" name="admin_contact" class="form-control" id="admin_contact" value="<?php echo $content[0]['ex_contact']; ?>" placeholder="Enter your Contact">
             </div>
             <div class="error" id="excontactError"></div>
         </div>
         <!--end col-->
         <div class="col-md-6">
             <div>
                 <label for="emailInput" class="form-label">Website</label>
                 <input type="url" class="form-control" name="admin_exhibit_website" id="admin_exhibit_website" value="<?php echo $content[0]['ex_website']; ?>" placeholder="Enter your Contact">
             </div>

             <div class="error" id="exwebError"></div>
         </div>
         <div class="col-md-6">
             <div>
                 <label for="emailInput" class="form-label">Exhibitors Title</label>
                 <input type="text" class="form-control" name="ex_title" id="ex_title" value="<?php echo $content[0]['ex_title']; ?>" placeholder="Enter your Title">
             </div>

             <div class="error" id="exwebError"></div>
         </div>


         <div class="col-md-3">
             <div>
                 <label for="emailInput" class="form-label">Select Service</label>
                 <select class="form-select form-control" id="service" name="ex_services[]" onchange="multipleValue(this)" data-choices data-choices-removeItem multiple>
                     <option value="">Select Services</option>
                     <?php
                        foreach ($servicesData->result() as $data) {
                        ?>
                         <option value="<?= $data->service_id; ?>+<?= $data->serv_price; ?>" <?php if (in_array($data->service_id, $services)) {
                                                                                                    echo "selected";
                                                                                                } ?>><?php echo $data->service_name; ?></option>

                     <?php
                        } ?>

                 </select>




             </div>

             <script>
                 function multipleValue(sel) {
                     var opts = [],
                         opt;
                     var len = sel.options.length;
                     var total = 0;

                     for (var i = 0; i < len; i++) {
                         opt = sel.options[i];

                         if (opt.selected) {
                             opts.push(opt);
                             var nes = opt.value.split('+');
                             total += Number(nes[1]);
                             console.log(total);
                             if (total != 0) {
                                 $('.show').val(total);


                             }


                         }
                     }

                 }
             </script>
             <div class="error" id="exwebError"></div>
         </div>
         <div class="col-md-3">
             <label for="emailInput" class="form-label">Your Amount</label>
             <input type="text" class="form-control show" id="showPrice" name="totalamount" value="<?php echo $content[0]['ex_services_amount']; ?>" readonly>
         </div>

         <div class="col-md-6">
             <div>
                 <label for="passwordInput" class="form-label">Address</label>
                 <textarea class="form-control" id="admin_address" name="admin_address" placeholder="Enter Your Address"><?php echo $content[0]['ex_address']; ?></textarea>
             </div>
             <div class="error" id="exaddressError"></div>
         </div>
         <!--end col-->
         <div class="col-md-6">
             <div>
                 <label for="emailInput" class="form-label">Exhibitors Content</label>
                 <textarea class="form-control" name="ex_content" id="ex_content" placeholder="Enter your Content"><?php echo  $content[0]['ex_content']; ?></textarea>
             </div>

             <div class="error" id="exwebError"></div>
         </div>
         <div class="col-lg-12">
             <div class="hstack gap-2 justify-content-end">
                 <button type="button" class="btn btn-light" onClick="window.location.reload();" data-bs-dismiss="modal">Close</button>
                 <button type="submit" class="btn btn-primary">Submit</button>
             </div>
         </div>
         <input type="hidden" value="<?php echo $content[0]['exhibitors_id']; ?>" name="exhibitors_id">
         <input type="hidden" value="<?php echo $content[0]['master_admin_id']; ?>" name="master_admin_id">

         <!--end col-->

     </div>
     <!--end row-->
 </form>