<form method="POST" class="calleredit" id="editCaller">
                    <div class="row g-3">
                        <div class="col-xxl-6">
                            <div>
                                <label for="firstName" class="form-label">Name</label>
                                <input type="text" name="caller_name"  value="<?php echo $content[0]['admin_name'];?>" id="caller_name" class="form-control" id="firstName" placeholder="Enter Name">
                            </div>
                            
                        </div><!--end col-->
                        <div class="col-xxl-6">
                            <div>
                                <label for="lastName" class="form-label">Email</label>
                                <input type="email" value="<?php echo $content[0]['admin_email'];?>" name="caller_email" id="caller_email" class="form-control" id="lastName" placeholder="Enter Email">
                            </div>
                           
                        </div><!--end col-->
                      
                        <div class="col-xxl-6">
                            <div>
                                <label for="emailInput" class="form-label">Contact</label>
                                <input type="number" value="<?php echo $content[0]['admin_contact'];?>" name="caller_contact" id="caller_contact" class="form-control" id="emailInput" placeholder="Enter your Contact">
                            </div>
                            
                        </div><!--end col-->
                         <div class="col-xxl-6">
                            <div>
                                
                                <select class="form-control" name="caller_select">
                                    <option value="Caller" >Caller Admin</option>
                                </select>
                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-6">
                            <div>
                                <label for="passwordInput" class="form-label">Address</label>
                                <textarea class="form-control"  value="<?php echo $content[0]['admin_address'];?>" name="caller_address" id="caller_address" placeholder="Enter Your Address"><?php echo $content[0]['admin_address'];?></textarea>
                            </div>
                           
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" onClick="window.location.reload();" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                     <input type="hidden" value="<?php echo $content[0]['admin_user_id'];?>" name="admin_user_id">
                </form>