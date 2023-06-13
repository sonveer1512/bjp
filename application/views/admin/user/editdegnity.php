							  <div class="row g-3">
                            <div class="col-xxl-6">
                                <div>
                                    <label for="firstName" class="form-label">Name</label>
                                    <input type="text" value="<?php echo $edititem[0]['name'];?>" class="form-control" name="name" id="name" placeholder="Enter Name" readonly>
                                    <div class="error" id="subnameError"></div>
                                </div>
                            </div>
 					<div class="col-xxl-6">
                                <div>
                                    <label for="firstName" class="form-label">Father's Name</label>
                                    <input type="text" value="<?php echo $edititem[0]['f_name'];?>" class="form-control" name="f_name" id="f_name" placeholder="Enter Fathre's Name" readonly>
                                    <div class="error" id="subnameError"></div>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-6">
                                <div>
                                    <label for="lastName" class="form-label">Designation</label>
                                    <input type="text"  class="form-control" value="<?php echo $edititem[0]['ex_man'];?>" name="designation" id="designation" placeholder="Enter Designation">
                                </div>
                            </div>
                                 <div class="col-xxl-6">
                                <div>
                                     <label for="lastName" class="form-label">Year</label>
                                    <input type="text"  class="form-control" value="<?php echo $edititem[0]['year_ex_man'];?>" name="year" id="year" placeholder="Enter Year">
                                </div>
                            </div>
                                 <div class="col-xxl-6">
                                <div>
                                    <label for="lastName" class="form-label">Remark</label>
                                    <textarea type="text"  class="form-control" value="<?php echo $edititem[0]['remark_ex_man'];?>" name="remark" id="remark" placeholder="Enter Remark"><?php echo $edititem[0]['remark_ex_man'];?></textarea>
                                </div>
                            </div>
                            <!--end col-->
                            
                            <!--end col-->
                         
                           
                        <input type="hidden" value="<?php echo $edititem[0]['id'];?>" name="id">
</div>
                        <!--end row-->
                    
                    