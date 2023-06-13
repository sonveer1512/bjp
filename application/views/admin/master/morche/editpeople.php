<div class="live-preview">
    <form method="POST" id="editformpoepleinmorcha" class="editresetform" enctype="multipart/form-data">
        <div class="row g-3">
            <div class="col-xxl-6">
                <div>
                    <label for="firstName" class="form-label">नाम</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="नाम" value="<?= isset($people_list[0]['name']) ? $people_list[0]['name'] : '' ?>">
                </div>
                <div class="error" id="nameError"></div>
            </div>
            <!--end col-->
            <div class="col-xxl-6">
                <div>
                    <label for="lastName" class="form-label">दायित्व</label>
                  	<select class="form-control" name="liability" id="liability">
                      <?php
                      $query = $this->api_model->list_common('dayitv');
                      foreach($query as $row) { ?>
                              <option value="<?=$row['title']?>/<?=$row['id']?>" <?php if(!empty($people_list[0]['dayitv_id'])) { if($people_list[0]['dayitv_id'] == $row['id']) { echo 'selected'; } } ?> ><?=$row['title']?></option>
                      <?php } ?>	
                  	</select>
                </div>
                <div class="error" id="lError"></div>
            </div>
            <!--end col-->
            <div class="col-xxl-6">
                <div>
                    <label for="lastName" class="form-label">जन्म दिनांक </label>
                    <input type="date" class="form-control" name="dob" id="dob" placeholder="जन्म दिनांक" value="<?= isset($people_list[0]['dob']) ? $people_list[0]['dob'] : '' ?>">
                </div>
                <div class="error" id="dobError"></div>
            </div>
            <!--end col-->
            <div class="col-xxl-6">
                <div>
                    <label for="emailInput" class="form-label">दूरभाष </label>
                    <input type="number" class="form-control" name="contact" id="contact" placeholder="दूरभाष " value="<?= isset($people_list[0]['contact_no']) ? $people_list[0]['contact_no'] : '' ?>">
                </div>
                <div class="error" id="contactError"></div>
            </div>
            <div class="col-xxl-6">
                <div>
                    <label for="emailInput" class="form-label">फोटो चुनें</label>
                    <input type="file" class="form-control" name="image" id="image" placeholder="फोटो चुनें " value="<?= isset($people_list[0]['image']) ? $people_list[0]['image'] : '' ?>">
                    
                </div>
                
                <div class="error" id="imageError"></div>
            </div>
            <div class="col-md-4">
                    <img class="rounded-start img-fluid h-100 object-cover" src="<?= base_url() ?>assets/images/people_image/<?= $people_list[0]['image'];?>" alt="Card image">
                </div>

                <input type="hidden" id="id" name="id" value="<?= isset($people_list[0]['id']) ? $people_list[0]['id'] : '' ?>">
            <!--end col-->

            <!--end col-->

            <!--end col-->
            <div class="col-lg-12">
                <div class="hstack gap-2 justify-content-end">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Submit">
                </div>
                
            </div>
            <!--end col-->
            <div class="eqres2"></div>
        </div>
        <!--end row-->
    </form>
</div>

