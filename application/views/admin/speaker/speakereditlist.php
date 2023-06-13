<form method="POST" id="editspeaker" class="editspeaker">
    <div class="row g-3">
        <div class="col-xxl-6">
            <div>
                <label for="firstName" class="form-label">Speaker Name</label>
                <input type="text" class="form-control" name="spe_name" id="spe_name" value="<?php echo $content[0]['speaker_name']; ?>" placeholder="Speaker Name">
            </div>
            <div class="error" id="spnameError"></div>
        </div>
        <!--end col-->
        <div class="col-xxl-6">
            <div>
                <label for="firstName" class="form-label">Speaker Email</label>
                <input type="text" class="form-control" name="spe_email" id="spe_email" value="<?php echo $content[0]['speaker_email']; ?>" placeholder="Speaker Email">
            </div>
            <div class="error" id="spemailError"></div>
        </div>
        <!--end col-->

        <div class="col-xxl-6">
            <div>
                <label for="firstName" class="form-label">Speaker Designation</label>
                <input type="text" class="form-control" name="spe_desi" id="spe_desi" value="<?php echo $content[0]['speaker_designation']; ?>" placeholder="Speaker Designation">
            </div>
            <div class="error" id="sdesError"></div>
        </div>
        <div class="col-xxl-6">
            <div>
                <label for="firstName" class="form-label">Speaker Contatct</label>
                <input type="number" class="form-control" name="spe_contact" value="<?php echo $content[0]['speaker_contact']; ?>" id="spe_contact" placeholder="Speaker Contatct">
            </div>
            <div class="error" id="sdcontactError"></div>
        </div>
        
        <div class="col-xxl-6">
            <div>
                <label for="firstName" class="form-label">Select Project</label>
                <select class="form-select form-control" name="spe_project[]" id="spe_project" multiple>
                    <option value=''>select Project</option>
                    <?php foreach ($projectdata->result() as $data) {
                    ?>
                        <option value="<?= $data->p_id; ?>" <?php if (in_array($data->p_id, $allotedproject)) {
                                                                                                    echo "selected";
                                                                                                } ?>><?php echo $data->p_name; ?></option>
                    <?php } ?>

                </select>
                <div class="error" id="spprojectError"></div>
            </div>
        </div>
        <div class="col-xxl-6">
            <div>
                <label for="firstName" class="form-label">Speaker Image</label>
                <input type="file" class="form-control" id="spe_image" name="spe_image" tabindex="1">
                <input type="hidden" id="spe_image" name="spe_image" value="<?= $content[0]['speaker_image'] ?>">
                <br>
                <?php
                if ($content[0]['speaker_image'] != "") {
                ?> <center>
                        <img src="<?php echo base_url() ?>/webupload/<?= $content[0]['speaker_image'] ?>" style="width:100px; height:100px;" border="0" />
                    </center>
                <?php
                }
                ?>

            </div>
            <div class="error" id="spimageError"></div>
        </div>
        <input type="hidden" name="admin_role" id="admin_role" value="Speaker">
        <input type="hidden" name="speaker_id"  value="<?=$content[0]['speaker_id'];?> ">


        <div class="col-lg-12">
            <div class="hstack gap-2 justify-content-end">
                <button type="button" class="btn btn-light" onClick="window.location.reload();" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->
</form>