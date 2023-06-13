
<form method="POST" id="editshowadmin" class="editprojectshowadmin">
                    <div class="row g-3">
                           <div class="col-xxl-6">
                            <div>
                                 <label for="firstName" class="form-label">Select Show Admin</label>
                                                        <select class="form-select form-control" name="showadmin" id="showadmin" >
                                                            <option value=''>Select Show Admin</option>
                                                            <?php foreach ($projectshowadmin->result() as $data) {
                                                                ?>
                                                            <option value="<?= $data->admin_user_id; ?>"><?php echo $data->admin_name; ?></option>
                                                                                    <?php } ?>
                                                        </select>
                            </div>
                            <div class="error" id="showadminError"></div>
                        </div><!--end col-->
                        <div class="col-xxl-6">
                            <div>
                                <label for="firstName" class="form-label">Select Project</label>
                                                        <select class="form-select form-control" name="project[]" id="project" multiple>
                                                            <option value=''>Select Project</option>
                                                            <?php foreach ($projectlist->result() as $data) {
                                                                ?>
                                                            <option value="<?= $data->p_id ; ?>"><?php echo $data->p_name; ?></option>
                                                                                    <?php } ?>
                                                        </select>
                            </div>
                             <div class="error" id="projectError"></div>
                        </div><!--end col-->
                        </div>
                        <input type="hidden" value="<?php echo $content[0]['admin_user_id'];?>" name="admin_user_id">
                        <!--end row-->
                </form>