
<form method="POST" class="bannerData" id="bannerModelSubmits">
                        <div class="row g-3">
                            <div class="col-xxl-6">
                                <div>
                                    <label for="firstName" class="form-label">Panchayat Samiti Name</label>
                                    <input type="text" value="<?php echo $content[0]['pachayatsimiti'];?>" class="form-control" name="pan_sam_name" id="pan_sam_name" placeholder="Enter Panchayat Samiti Name">
                                      <div class="error" id="subnameError"></div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" onClick="window.location.reload();" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id="add-btn">Edit</button>
                                </div>
                            </div>
                            <!--end col-->
                            
                            <!--end col-->
                            
  </div>
                        <input type="hidden" value="<?php echo $content[0]['id'];?>" name="id">
                        <!--end row-->
                    </form>
                    