<form method="POST" class="bannerData" id="bannerModelSubmits">
                    <div class="row g-3">
                        <div class="col-xxl-6">
                            <div>
                                <label for="firstName" class="form-label">Name</label>
                               <input type="text" value="<?php echo $content[0]['admin_name'];?>" class="form-control" name="admin_name" id="firstName" placeholder="Enter Name">
                                    <div class="error" id="subnameError"></div>
                            </div>
                        </div><!--end col-->
                        
                        <div class="col-xxl-6">
                            <div>
                                <label for="lastName" class="form-label">Email</label>
                                 <input type="text" value="<?php echo $content[0]['admin_email'];?>" class="form-control" name="admin_email" id="firstName" placeholder="Enter Name">
                                    <div class="error" id="departmentError"></div>
                            </div>
                        </div><!--end col-->
                       
                        <div class="col-xxl-6">
                            <div>
                                <label for="emailInput" class="form-label">Contact</label>
                                <input type="number" value="<?php echo $content[0]['admin_contact'];?>" class="form-control" name="admin_contact" id="firstName" placeholder="Enter Name">
                            </div>
                        </div><!--end col-->
                         <div class="col-xxl-6">
                            <div>
                                 <label for="emailInput" class="form-label">Regional Head</label>
                                 <input type="number" value="<?php echo $content[0]['project_manager_created_by'];?>" class="form-control" name="projectadmin" id="projectadmin" placeholder="Enter Name" readonly>
                            </div>
                        </div><!--end col-->
                         <div class="col-xxl-6">
                            <div>
                                 <label for="emailInput" class="form-label">Select Your Admin</label>
                               <select class="form-control" name="admin_role" value="<?php echo $content[0]['admin_role'];?>">
                                        <option value="Project Manager">Project Manager</option>
                                    </select>
                            </div>
                        </div><!--end col-->

                        <div class="col-xxl-6">
                            <div>
                                <label for="passwordInput" class="form-label">Address</label>
                                <textarea class="form-control" name="admin_address" value="" placeholder="Enter Your Address"><?php echo $content[0]['admin_address'];?></textarea>
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" onClick="window.location.reload();" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" id="add-btn">Submit</button>
                            </div>
                        </div><!--end col-->
                         <input type="hidden" value="<?php echo $content[0]['admin_user_id'];?>" name="admin_user_id">
                    </div><!--end row-->
                </form>