                <form method="post" id="sevicecat" class="serviceclass">
                    <div class="row g-3">
                        <div class="col-xxl-6">
                            <div>
                                <label for="firstName" class="form-label">Service Name</label>
                                <input type="text" class="form-control"  value="<?php echo $content[0]['service_name'];?>" id="service_name" name="service_name" placeholder="Enter Service Name">
                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-6">
                            <div>
                                <label for="lastName" class="form-label">Service Category</label>
                               <select class="form-control" id="service_category" name="service_category" readonly>
                                    <option  value="<?php echo $content[0]['service_category'];?>" ><?php echo $content[0]['service_category'];?></option>
                                     
                                </select>
                            </div>
                        </div><!--end col-->
                       <div class="col-xxl-6">
                            <div>
                                <label for="lastName" class="form-label">Service Description</label>
                                <input type="text" class="form-control" id="service_description" value="<?php echo $content[0]['service_desc'];?>"  name="service_description" placeholder="Enter Description">
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light"  onClick="window.location.reload();" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                    <input type="hidden" value="<?php echo $content[0]['service_id'];?>" name="service_id">
                </form>
