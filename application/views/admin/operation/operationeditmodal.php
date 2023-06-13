 <form method="POST" class="editoperation" id="EditOperationadmin">
                    <div class="row g-3">
                        <div class="col-xxl-6">
                            <div>
                                <label for="firstName" class="form-label">Name</label>
                                <input type="text" value="<?php echo $content[0]['admin_name'];?>" name="oper_name" id="oper_name" class="form-control" id="firstName" placeholder="Enter Name">
                            </div>
                            <div class="error" id="opernameError"></div>
                        </div><!--end col-->
                        <div class="col-xxl-6">
                            <div>
                                <label for="lastName" class="form-label">Email</label>
                                <input type="email" value="<?php echo $content[0]['admin_email'];?>" name="oper_email" id="oper_email" class="form-control" id="lastName" placeholder="Enter Email">
                            </div>
                             <div class="error" id="operemailError"></div>
                        </div><!--end col-->
                       
                        <div class="col-xxl-6">
                            <div>
                                <label for="emailInput" class="form-label">Contact</label>
                                <input type="number" value="<?php echo $content[0]['admin_contact'];?>" name="oper_contact" id="oper_contact" class="form-control" id="emailInput" placeholder="Enter your Contact">
                            </div>
                             <div class="error" id="opercontactError"></div>
                        </div><!--end col-->
                         <div class="col-xxl-6">
                            <div>
                                
                                <select class="form-control" name="oper_select" readonly>
                                    <option value="Operation" >Operation Admin</option>
                                </select>
                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-6">
                            <div>
                                <label for="passwordInput" class="form-label">Address</label>
                                <textarea class="form-control" value="<?php echo $content[0]['admin_address'];?>" name="oper_address" id="oper_address" placeholder="Enter Your Address"><?php echo $content[0]['admin_address'];?></textarea>
                            </div>
                             <div class="error" id="operaddressError"></div>
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" onClick="window.location.reload();" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                    <input type="hidden" name="admin_user_id" value="<?php echo $content[0]['admin_user_id'];?>">
                </form>