 <form method="POST" class="CategoryData" id="editcategoryModal">
                    <div class="row g-3">
                        <div class="col-xxl-6">
                            <div>
                                <label for="cat_name" class="form-label">Category Name</label>
                                <input type="text" class="form-control" value="<?php echo $content[0]['ser_cat_name'];?>" name="cat_name" id="cat_name" placeholder="Enter Category Name">
                            </div>
                            <div class="error" id="catnameError"></div>
                        </div><!--end col-->
                       
                       
                       <!--end col-->
                        
                       
                      
                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                    <input type="hidden" value="<?php echo $content[0]['serv_cat_id'];?>" name="serv_cat_id">
                </form>