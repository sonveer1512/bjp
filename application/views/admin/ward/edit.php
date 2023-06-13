<form method="POST" id="bannerModelSubmits">
                                            <div class="row g-3">
                                               <div class="col-xxl-6">
                                               
                                                <div>
                                                    <label for="firstName" class="form-label">Nagar Palika</label>
                                                    <select class="form-select form-control" name="pan_sam_name" id="pan_sam_name">
                                                      
                                                      
                                                    <?php foreach ($nagarpalika as $data) {
                                                                                ?>
                                                      <option value="<?= $data['id']; ?>" <?php if (!empty($content[0]['panchyatsimit'])) { if ($content[0]['id'] == $data['id']) { echo "selected"; } } ?>><?= $data['pachayatsimiti'] ?></option>
                                                   
                                                                                <?php } ?>
                                                    </select>
                                                </div>
                                          
                                                <div class="error" id="depnameError"></div>
                                            </div>
                                                <input type="hidden" class="form-control" name="panchayat" id="panchayat" value="2">
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="firstName" class="form-label">Ward Name</label>
                                                        <input type="text" class="form-control" name="gram_pan_name" id="gram_pan_name" placeholder="Enter Ward Name" value="<?=$content[0]['gram_panchyat']?>">
                                                    </div>
                                                    <div class="error" id="subnameError"></div>
                                                </div>
                                                <input type="hidden" name="id" value="<?=$content[0]['id']?>">
                                                
                                                <div class="col-lg-12">
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                        <input type="submit" class="btn btn-primary" value="Submit">
                                                    </div>
                                                </div>
                                                <!--end col-->
                                            </div>
                                            <!--end row-->
                                        </form>